<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Crop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::with('crop')->where('vendor_id', Auth::user()->id)->get();

        $total_bill_amount = 0;

        foreach ($carts as $cart) {
            if ($cart->crop->available_quantity == 0) {
                $cart->delete();
            }

            $total_bill_amount += ($cart->crop->price * $cart->quantity);
        }

        // re-run so that removed items doesn't show up in cart page
        $carts = Cart::with('crop')->where('vendor_id', Auth::user()->id)->get();


        return view('carts.index', compact('carts', 'total_bill_amount'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = Cart::where('vendor_id', Auth::user()->id)->where('crop_id', $request->crop_id)->first();
        if ($cart) {
            return redirect()->back()->withError('Already in cart');
        }

        $data = $request->all();
        $data['vendor_id'] = Auth::user()->id;
        $data['seller_id'] = Crop::find($request->crop_id)->user_id;
        Cart::create($data);
        return redirect()->back()->withSuccess('Cart updated');
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $data = $request->all();

        $cart->update($data);
        return redirect()->back()->with('success', 'cart updated');
    }
}
