<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $crops = Auth::user()->crops;
        $news = News::latest()->get();
        $orders = Auth::user()->orders;
        return view('farmer.dashboard.index', compact('crops','news','orders'));
    }
}
