<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function shop()
    {
        return view('shop',[
            'products'=>Products::all()
        ]);
    }

    public function shopDetails($product)
    {
        return view('shop-details',[
            'product'=>Products::find($product)
        ]);
    }
}
