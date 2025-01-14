<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use App\Models\User_Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function purchaseHistory()
    {
        return view('purchaseHistory');
    }
    public function profile()
    {
        return view('profile');
    }

    public function profileEdit()
    {
        return view('editProfile');
    }

    public function insertProfile(Request $request)
    {
        $userInfo = User_Info::where('user_id', Auth::user()->id)->first();
        $userInfo->update([
            'fname'=>$request->input('fname'),
            'lname'=>$request->input('lname'),
            'semail'=>$request->input('semail'),
            'phone'=>$request->input('contact'),
            'shipaddress'=>$request->input('address'),
            'city'=>$request->input('city'),
            'country'=>$request->input('country'),
        ]);

        return redirect()->back()->with('success','Profile updated successfully');
    }
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

}
