<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\News;

class WelcomeController extends Controller
{
    public function index()
    {
        $crops = Crop::where('status','VERIFIED')->take(4)->latest()->get();
        $recent_news = News::where('status','PUBLISH')->take(4)->latest()->get();

        return view('welcome',compact('crops','recent_news'));
    }
}
