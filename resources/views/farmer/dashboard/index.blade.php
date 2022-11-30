@extends('layouts.farmer')


@section('content')

<h2>Farmer Dashboard </h2>

<div class="card-deck">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Crops</h4>
            <p class="card-text">{{ $crops->count() }}</p>
            <a href="{{ route('farmer.crops.index') }}" class="btn btn-link text-warning">View</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Orders</h4>
            <p class="card-text">{{ $orders->count() }}</p>
            <a href="" class="btn btn-link text-warning">View</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">News</h4>
            <p class="card-text">{{ $news->count() }}</p>
            <a href="" class="btn btn-link text-warning">View</a>
        </div>
    </div>
</div>



@endsection
