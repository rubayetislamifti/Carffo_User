<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function pendingOrders()
    {
        return view('admin.orders.pendingOrders',[
            'cart'=>Cart::where('status','Pending')
                ->join('user__infos','carts.user_id','=','user__infos.user_id')
                ->join('products','carts.product_id','=','products.id')
                ->select('user__infos.*','products.*','carts.*','carts.size as product_size','carts.color as product_color')
                ->get(),
            ]);
    }
    public function processingOrders(Request $request){
        Cart::where('order_no',$request->input('order_no'))->update([
            'status'=>'Processing',
            'delivery_date'=>$request->input('delivery_date'),
        ]);

        return redirect()->back();
    }
}
