@extends('layouts.farmer')


@section('content')


    <div class="container">
        <h2>News</h2>

        @if(session('success'))
        <div class="row my-3">
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

        <div class="row my-3">
            <div class="col-12">
                <table class="table table-striped table-light">
                    <thead>
                        <tr>
                            <th>Updated at</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($news as $n)
                            <tr>
                                <td scope="row" width="200">{{ $n->updated_at }}</td>
                                <td>
                                    <img src="{{ asset('storage/'.$n->thumbnail) }}" alt="" class="img-thumbnail" style="width:32px;">
                                    {{ $n->title }}
                                </td>
                                <td>
                                    <span class="badge badge-info">
                                        {{ $n->status }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('farmer.news.show', $n->id) }}" class="btn btn-primary">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>



@endsection
