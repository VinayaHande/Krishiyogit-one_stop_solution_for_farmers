@extends('layouts.app')
@section('content')



    <div class="container">
        <h2 >Your orders</h2>
        <div class="row">
            <div class="col-12">
                <table class="table table-light table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Order Number</th>
                            <th>Farmer</th>
                            <th>Crops</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <td scope="row">{{ $order->created_at->diffForHumans() }}</td>
                                <td>{{ $order->order_number }}</td>
                                <td>{{ $order->farmer->name }}</td>
                                <td>
                                        <span class="badge badge-info">{{ count($order->items) }}</span>
                                </td>
                                <td><a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary">View</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td scope="row" colspan="5">No orders yet <a href="{{ route('crops.index') }}" class="btn btn-primary">Continue Shopping</a></td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
