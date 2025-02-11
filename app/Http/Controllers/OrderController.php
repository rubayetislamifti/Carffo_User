<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function pendingOrders()
    {
        return view('admin.orders.pendingOrders',[
            'cart'=>Cart::where('status','Pending')->get(),
            ]);
    }
}
