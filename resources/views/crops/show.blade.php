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


        <div class="row">
            <div class="col-12 col-md-4">
                <img src="{{ asset('storage/' . $crop->photo) }}" alt="" class="img-thumbnail">
            </div>

            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $crop->title }}</h4>
                        <p class="card-text"><i class="fa fa-inr" aria-hidden="true"></i>
                            {{ $crop->price . '/' . $crop->unit }}</p>
                        <p class="card-text">Farmer: {{ $crop->farmer->name }}</p>
                        <p>Available Quantity:
                            @if ($crop->available_quantity === 0) <span
                                class="badge badge-danger">Out of stock</span>
                            @else
                                {{ $crop->available_quantity }}
                            @endif
                        </p>

                        <form action="{{ route('carts.store') }}" method="post" class="d-inline">
                            @csrf
                            <input type="hidden" name="crop_id" value="{{ $crop->id }}">
                            @if ($crop->available_quantity === 0)
                            @else
                                <button class="btn btn-primary">Add to cart</button>
                            @endif
                        </form>

                        <a href="#details" class="btn btn-link">View details</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-4 p-4 bg-white">
            <div class="col-12">
                <h1 id="details">Product Description</h1>
                <p>
                    {{ $crop->description }}
                </p>
                <p>Provided by: {{ $crop->farmer->name }}</p>
            </div>
        </div>
    </div>




@endsection
