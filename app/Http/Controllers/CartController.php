<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cart = session()->get('cart',[]);
        $cartItems=[];
        $total = 0;
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
        return view('cart',['cartItems'=>$cartItems,'total_price'=>$total]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $product_id)
    {
        $products = \App\Models\Products::findOrFail($product_id);
        $cart = session()->get('cart', []);

        if (isset($cart[$product_id])) {
            $cart[$product_id]['quantity'] += $request->input('quantity',1);
        }
        else
            $cart[$product_id] = [
                'product_id' => $products->id,
                'price' => $products->price,
                'quantity' => $request->input('quantity',1),
                'size'=>$request->input('size'),
                'color'=>$request->input('color'),
            ];
        session(['cart' => $cart]);

       // return response()->json($cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cart = session()->get('cart', []);

        if (array_key_exists($id, $cart)) {

            $validatedData = $request->only(['size', 'color', 'quantity']);

            if (isset($validatedData['size'])) {
                $request->validate(['size' => 'required|string']);
                $cart[$id]['size'] = $validatedData['size'];
            }

            if (isset($validatedData['color'])) {
                $request->validate(['color' => 'required|string']);
                $cart[$id]['color'] = $validatedData['color'];
            }

            if (isset($validatedData['quantity'])) {
                $request->validate(['quantity' => 'required|integer|min:1']);
                $cart[$id]['quantity'] = $validatedData['quantity'];
            }

            session()->put('cart', $cart);

            return back()->with('success', 'Cart updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        session()->forget('cart.' . $id);


        return redirect()->back()->with('success', 'Product removed from cart!');
    }
}
