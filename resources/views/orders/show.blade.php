@extends('layouts.app')
@section('content')



    <div class="container">
        <h2>Your orders</h2>
        <div class="row">
            <div class="col-12">

                <div class="list-group">
                    <div class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">
                                Order Number {{ $order->order_number }}
                            </h5>
                            <small>Farmer: {{ $order->farmer->name }}</small>
                        </div>
                    </div>
                    @foreach ($order->items as $item)
                        <div class="list-group-item flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $item->crop_title }} </h5> <small
                                    class="text-muted">{{ $order->created_at->diffForHumans() }}</small>
                            </div>
                            <p class="mb-1">
                                Amount <i class="fa fa-inr" aria-hidden="true"></i> {{ $item->crop_price }} <br>
                                Qty {{ $item->quantity }} <br>
                                Total <i class="fa fa-inr" aria-hidden="true"></i> {{ $item->total_price }}
                            </p> <small class="text-muted">Donec id elit non mi porta.</small>
                        </div>
                    @endforeach
                    <div class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Total: <i class="fa fa-inr" aria-hidden="true"></i>
                                {{ $order->items->sum('total_price') }} </h5>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
