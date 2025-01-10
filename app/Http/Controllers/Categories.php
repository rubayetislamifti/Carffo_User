<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class Categories extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categories.index',[
            'categories'=>Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create([
            'category_name'=>$request->input('categoryName'),
        ]);

        return redirect()->back()->with('success','Upload Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.categories.show',[
            'categories'=>Category::where('id',$id)->first(),
            'products'=>\App\Models\Products::where('products.category',$id)
                ->join('subcategories','products.sub_category','=','subcategories.id')
                ->select('products.*', 'subcategories.sub_category as subcategory_name','products.id as product_id')->get(),
            'total_products'=>\App\Models\Products::where('category',$id)->count()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.categories.edit',[
            'categories'=>Category::where('id',$id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Category::where('id',$id)->update([
            'category_name'=>$request->input('categoryName'),
        ]);

        return redirect()->back()->with('success','Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::with(['subcategories', 'products'])->findOrFail($id);


        foreach ($category->products as $product) {
            $imagePath = public_path("products/{$product->image}");
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $category->subcategories()->delete();
        $category->products()->delete();
        $category->delete();

        return redirect()->back()->with('success','Delete Successfully');
    }

}
