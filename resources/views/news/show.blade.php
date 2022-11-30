@extends('layouts.app')


@section('content')


    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{ $news->title }}</h1>
                <p>Published on: {{ $news->created_at }}</p>
                <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="" class="img-fluid rounded p-0">
            </div>
        </div>
        <div class="row my-4 p-4 bg-white">
            <div class="col-12">
                <p>
                    {{ $news->description }}
                </p>
            </div>
        </div>
    </div>




@endsection
