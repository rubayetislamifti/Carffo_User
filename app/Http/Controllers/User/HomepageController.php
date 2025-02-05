<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Products;
use App\Models\User_Info;
use Carbon\Carbon;
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

    public function checkout()
    {
        $cart = session()->get('cart',[]);
        $cartItems=[];
        $total = 0;
        if (Auth::user()->userInfo->city == 'Dhaka')
            $deliveryCharge = 80;
        else
            $deliveryCharge = 120;

        foreach ($cart as $item){
            $product = \App\Models\Products::find($item['product_id']);

            if ($product){
                $totalPrice = $item['quantity'] * $item['price'];
                $total += $totalPrice;
                $cartItems[] = [
                    'product' => $product,
                    'quantity' => $item['quantity'],
                    'size' => $item['size'],
                    'color' => $item['color'],
                    'total_price' => $item['quantity'] * $item['price'],

                ];
            }
        }
        return view('checkout',['cart'=>$cartItems,'total'=>$total,'deliveryCharge' => $deliveryCharge,
            'totalAmount' => $total + $deliveryCharge]);
    }
    public function checkoutPost(Request $request){
        $productIds = $request->input('product_id');
        $quantities = $request->input('quantity');
        $totals = $request->input('total');
        $shippingAddress = $request->input('address');

        $cartData = [];

        foreach ($productIds as $index => $productId) {
            $cartData[] = [
                'user_id' => Auth::user()->id,
                'product_id' => $productId,
                'quantity' => $quantities[$index],
                'price' => $totals[$index],
                'order_no' => Carbon::now()->format('YmdHi') . Auth::user()->id,
                'status' => 'Pending',
                'shipping_address' => $shippingAddress,
            ];
            session()->forget('cart.' . $productId);
        }

        $cart = Cart::insert($cartData);


        return redirect()->route('home')->with('success','Order placed successfully');
    }

}
