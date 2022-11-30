@extends('layouts.app')


@section('content')

    <div class="container">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>Success</strong> {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>!</strong> {{ session('error') }}
            </div>
        @endif

        <div class="row my-4">
            @foreach ($crops as $crop)
                <div class="col-12 col-md-3">
                    <div class="card h-100">
                        <img class="card-img-top w-100 img-fluid img-thumbnail p-4 border-0 rounded"
                            src="{{ asset('storage/' . $crop->photo) }}" alt="">
                        <div class="card-body">
                            <h4 class="card-title">{{ $crop->title }}</h4>
                            <p class="card-text">Price: <i class="fa fa-inr" aria-hidden="true"></i> {{ $crop->price }} /
                                {{ $crop->unit }}</p>
                            <p>Provider: {{ $crop->farmer->name }}</p>
                        </div>

                        <div class="card-footer">
                            <a class="btn btn-primary" href="{{ route('crops.show', $crop->id) }}">View</a>

                            <form action="{{ route('carts.store') }}" method="post" class="d-inline">
                                @csrf
                                <input type="hidden" name="crop_id" value="{{ $crop->id }}">
                                @if ($crop->available_quantity === 0) <span
                                    class="badge badge-danger">Out of stock</span> @else
                                    <button class="btn btn-primary">Add to cart</button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>


@endsection
