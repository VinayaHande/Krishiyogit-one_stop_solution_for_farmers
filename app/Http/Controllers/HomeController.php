<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->type == "FARMER") {
            return redirect()->route('farmer.dashboard.index');
        }
        if (Auth::user()->type == "ADMIN") {
            return redirect()->route('admin.dashboard.index');
        }
        return view('home');
    }
}
