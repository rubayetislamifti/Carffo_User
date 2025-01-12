<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
            'product'=>Products::where('products.id',$product)
            ->join('categories','categories.id','=','products.category')
            ->join('subcategories','subcategories.id','=','products.sub_category')
            ->select('products.*','products.id as product_id','categories.category_name as category','subcategories.sub_category as subcategory')
            ->first(),

           'related_product'=>Products::take(4)->inRandomOrder()->get()
        ]);
    }
}
