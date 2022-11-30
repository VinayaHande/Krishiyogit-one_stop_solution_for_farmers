<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Crop;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{

    public function getaddress()
    {
        return view('checkout.getaddress');
    }



    public function placeOrder(Request $request)
    {
        $data = $request->all();
        // get cart details

        $crop_ids =  Cart::select('crop_id')->where('vendor_id', Auth::user()->id)->groupBy()->get();

        $farmer_ids =  Crop::select('user_id')->whereIn('id', $crop_ids)->groupBy('user_id')->get();

        foreach ($farmer_ids as $farmer) {
            $order_number = Str::upper(uniqid());

            $order = new Order();

            $order->order_number = $order_number;
            $order->seller_id = $farmer->user_id;
            $order->buyer_id = Auth::user()->id;
            $order->order_status = 'PENDING';

            $order->first_name = $data['first_name'];
            $order->last_name = $data['last_name'];
            $order->email = $data['email'];
            $order->mobile = $data['mobile'];
            $order->address = $data['address'];
            $order->landmark = $data['landmark'];
            $order->pincode = $data['pincode'];
            $order->save();

            $cart_items = Cart::where('vendor_id',Auth::user()->id)
                                ->where('seller_id',$farmer->user_id)->get();

            foreach ($cart_items as $cart) {
                $order_item = new OrderItem();
                $order_item->order_id = $order->id;
                $order_item->order_number = $order_number;
                $order_item->crop_id = $cart->seller_id;


                $order_item->crop_title = $cart->crop->title;
                $order_item->crop_description = $cart->crop->description;
                $order_item->crop_price = $cart->crop->price;
                $order_item->crop_unit = $cart->crop->unit;
                $order_item->quantity = $cart->quantity;
                $order_item->total_price = ($cart->quantity * $cart->crop->price);

                $order_item->payment_status = 'PENDING';
                $order_item->delivery_status ='PENDING';
                $order_item->save();

                $cart->delete();
            }
        }

        return redirect()->route('carts.index')->withSuccess('Order placed successfully');
    }
}
