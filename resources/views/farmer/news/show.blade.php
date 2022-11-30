@extends('layouts.farmer')


@section('content')


    <div class="container card p-4">


        <h1>{{ $news->title }}</h1>
        <div class="row">
            <div class="col-12 col-md-6 p-4">
                <p>Published on: {{ $news->created_at }}</p>
                <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="" class="img-fluid rounded p-0 img-thumbnail">
            </div>

            <div class="col-12 col-md-6 p-4">
                <p>
                    {{ $news->description }}
                </p>
            </div>
        </div>

    </div>



@endsection
