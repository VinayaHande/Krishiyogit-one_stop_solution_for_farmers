@extends('layouts.app')


@section('content')

    <div class="container">

        <div class="row my-4">
            @foreach ($all_news as $news)
                <div class="col-12 col-md-3">
                    <div class="card h-100">
                        <img class="card-img-top w-100 img-fluid img-thumbnail p-4 border-0 rounded"
                            src="{{ asset('storage/' . $news->thumbnail) }}" alt="">
                        <div class="card-body">
                            <h4 class="card-title">{{ $news->title }}</h4>
                        </div>

                        <div class="card-footer">
                            <a class="btn btn-primary" href="{{ route('news.show', $news->id) }}">View</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>


@endsection
