<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\services;
use Illuminate\Http\Request;

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
//        return view('home');
        $categories = categories::all();
        $services   = services::all();
        return view('pages.admin',compact('categories','services'));
    }
}
