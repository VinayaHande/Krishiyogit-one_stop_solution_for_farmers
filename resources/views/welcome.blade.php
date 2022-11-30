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


        {{-- crops block --}}
        <div class="row my-3 bg-light p-3 rounded">
            <div class="col-12">
                <div class="clearfix">
                    <div class="float-left">
                        Recently verified
                    </div>
                    <div class="float-right">
                        <a href="{{ route('crops.index') }}" class="btn btn-outline-primary">View All</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($crops as $crop)
                <div class="col-12 col-md-3">
                    <div class="card h-100">
                        <img class="card-img-top w-100 img-fluid img-thumbnail p-4 border-0 rounded"
                            src="{{ asset('storage/' . $crop->photo) }}" alt="">
                        <div class="card-body">
                            <h4 class="card-title">{{ $crop->title }}</h4>
                            <p class="card-text">Price: <i class="fa fa-inr" aria-hidden="true"></i>
                                {{ $crop->price }} / {{ $crop->unit }}</p>
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
        {{-- end of crops block --}}

        {{-- news block --}}
        <div class="row my-3 bg-light p-3 rounded">
            <div class="col-12">
                <div class="clearfix">
                    <div class="float-left">
                        Recent news
                    </div>
                    <div class="float-right">
                        <a href="{{ route('news.index') }}" class="btn btn-outline-primary">View All</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($recent_news as $news)
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
        {{-- end of news block --}}
    </div>
@endsection
