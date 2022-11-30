@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row mt4">
            <div class="col-12">
                <h1>Create new order here</h1>
            </div>
        </div>
        @if (session('success'))
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success" role="alert">
                        <strong>{{ session('success') }}</strong>
                    </div>
                </div>
            </div>
        @endif
        <div class="row mt4">
            <div class="col-12">
                <form action="{{ route('checkout.placeorder') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" aria-describedby="helpId"
                            placeholder="First name">
                        <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" aria-describedby="helpId"
                            placeholder="Last name">
                        <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>

                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="text" class="form-control" name="email" id="orders_email" aria-describedby="helpId"
                            placeholder="email">
                        <small id="helpId" class="form-text
                            text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">phone number</label>
                        <input type="text" class="form-control" name="mobile" id="orders_phone_number"
                            aria-describedby="helpId" placeholder="phone_number">
                        <small id="helpId" class="form-text
                            text-muted"></small>
                    </div>

                    <div class="form-group">
                        <label for="adderss">address</label>
                        <textarea class="form-control" name="address" id="orders_address" rows="3"
                            placeholder="write address"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="landmark">landmark</label>
                        <textarea class="form-control" name="landmark" id="orders_landmark" rows="3"
                            placeholder="write address"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="pincode">Pincode</label>
                      <input type="number"
                        class="form-control" name="pincode" id="pincode" aria-describedby="helpId" placeholder="Postal code">
                      <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Place Order</button>
                </form>
            </div>
        </div>
    </div>




@endsection
