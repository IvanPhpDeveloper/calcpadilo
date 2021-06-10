<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\services;


class ManagerController extends Controller
{
    public function index(){


        $categories = categories::all();
        $services   = services::all();
        return view('pages.manager',compact('categories','services'));
    }

    /*
     *
     * $deal = $category->bitrixID;
     *
     */
}
