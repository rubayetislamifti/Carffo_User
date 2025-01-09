<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class Products extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products.index',
        [
            'total_products'=>\App\Models\Products::count(),
            'products'=>\App\Models\Products::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create',[
            'category'=>Category::all(),
            'subcategory'=>Subcategory::all(),
        ]);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name'=>'required|string',
            'description'=>'required|string',
            'price'=>'required|numeric',
            'stock'=>'required|numeric',
            'category'=>'required|string',
            'subCategory'=>'required|string',
            'colors' => 'required|array',
            'colors.*' => 'string',
            'sizes' => 'required|array',
            'sizes.*' => 'in:S,M,L,XL,XXL,XXXL',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $sizes = implode(' ,', $request->input('sizes'));
        $colors = implode(' ,', $request->input('colors'));

        if ($request->hasFile('image')) {
            $image = time() . '.' . $request->image->getClientOriginalExtension();
            $path = $request->image->move(public_path('products'), $image);
        }

        \App\Models\Products::create([
            'product_name'=>$request->input('product_name'),
            'description'=>$request->input('description'),
            'price'=>$request->input('price'),
            'stock'=>$request->input('stock'),
            'image'=>$image,
            'category'=>$request->input('category'),
            'sub_category'=>$request->input('subCategory'),
            'size'=>$sizes,
            'color'=>$colors,
        ]);

        return redirect()->back()->with('success','Product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.products.show',[
            'product'=>\App\Models\Products::find($id),
            'previousProduct'=>\App\Models\Products::where('id', '<', $id)->orderBy('id', 'desc')->first(),
            'nextProduct'=>\App\Models\Products::where('id', '>', $id)->orderBy('id', 'asc')->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.products.edit',[
            'product'=>\App\Models\Products::find($id),
            'category'=>Category::all(),
            'subcategory'=>Subcategory::all(),
            'sizes'=>explode(', ', \App\Models\Products::find($id)->size),
            'colors'=>explode(', ', \App\Models\Products::find($id)->color)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = \App\Models\Products::findOrFail($id);
        $imagePath = public_path('products/' . $product->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
}
