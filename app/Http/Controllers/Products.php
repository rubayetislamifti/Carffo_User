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
            'images' => 'required|array|min:1|max:4',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
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
            'product'=>\App\Models\Products::where('products.id',$id)
            ->join('categories','products.category','=','categories.id')
            ->join('subcategories','products.sub_category','=','subcategories.id')
                ->select('products.*','products.id as product_id','categories.category_name as category_name','subcategories.sub_category as sub_category_name')
                ->first(),

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
    public function update(Request $request, $id)
    {
        $product = \App\Models\Products::findOrFail($id); // Fetch the product

        // Keep track of changes
        $updatedFields = [];
        $originalPrice = $product->price;
        // Update only the fields that have been modified
        if ($request->has('product_name')) {
            $product->product_name = $request->input('product_name');
            $updatedFields[] = 'product_name';
        }

        if ($request->has('description')) {
            $product->description = $request->input('description');
            $updatedFields[] = 'description';
        }

        if ($request->has('price')) {
           // $product->previous_price = $product->price; // Save current price as previous
            if ($originalPrice == $product->previous_price) {
                $product->previous_price = $originalPrice;
            }
            $product->price = $request->input('price');
            $updatedFields[] = 'price';
        }

        if ($request->has('discount')) {
            $product->discount = $request->input('discount');

            // Update price after discount
            $newPrice = $product->price - ($product->price * ($product->discount / 100));
            $product->previous_price = $product->price;
            $product->price = $newPrice;
            $updatedFields[] = 'discount';
        }

        if ($request->has('stock')) {
            $product->stock = $request->input('stock');
            $updatedFields[] = 'stock';
        }

        if ($request->hasFile('image')) {
            if ($product->image && file_exists(public_path('products/' . $product->image))) {
                unlink(public_path('products/' . $product->image));
            }
            $image = time() . '.' . $request->image->getClientOriginalExtension();
            $path = $request->image->move(public_path('products'), $image);
            $product->image = $image;
            $updatedFields[] = 'image';
        }

        if ($request->has('category')) {
            $product->category = $request->input('category');
            $updatedFields[] = 'category';
        }

        if ($request->has('sub_category')) {
            $product->sub_category = $request->input('sub_category');
            $updatedFields[] = 'sub_category';
        }

        if ($request->has('sizes')) {
            $product->size = implode(',', $request->input('sizes'));
            $updatedFields[] = 'size';
        }

        if ($request->has('colors')) {
            $product->color = implode(',', $request->input('colors'));
            $updatedFields[] = 'color';
        }

        // Save updated product
        $product->save();

        return redirect()->back()->with('success', 'Product updated successfully!');
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
