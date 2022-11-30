@extends('layouts.farmer')


@section('content')

    <div class="container">
        @if (session('success'))
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>{{ session('success') }}</strong>
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <a href="{{ route('farmer.crops.create') }}" class="btn btn-primary">Add Crop</a>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-12">
                <table class="table table-light table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="200">Updated on</th>
                            <th>Title</th>
                            <th>Price/Unit</th>
                            <th>Available Qty</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($crops as $crop)
                            <tr>
                                <td scope="row">{{ $crop->updated_at }}</td>
                                <td>{{ $crop->title }}</td>
                                <td><i class="fa fa-inr" aria-hidden="true"></i>
                                    {{ $crop->price . '/' . $crop->unit }}</td>
                                <td>@if ($crop->available_quantity === 0) <span class="badge badge-danger">Out of stock</span> @else {{ $crop->available_quantity }} @endif</td>
                                <td><span class="badge badge-info h4">{{ $crop->status }}</span></td>
                                <td>
                                    <a href="{{ route('farmer.crops.edit', $crop->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('farmer.crops.destroy', $crop->id) }}" method="post"
                                        class="d-inline" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>





@endsection
