<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategories extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('admin.subcategories.index', ['subcategories' => Subcategory::all()]);
        }
        catch (\QueryException $exception){
            return view('admin.subcategories.index', ['subcategories' => [],'error', $exception->getMessage()]);
        }
        catch (\Exception $e){
            return view('admin.subcategories.index', ['subcategories' => [],'error', $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('admin.subcategories.create', ['categories' => Category::all()]);
        }
        catch (\Exception $exception){
            return view('admin.subcategories.create', ['categories' => [],'error', $exception->getMessage()]);
        }
        catch (\QueryException $e){
            return view('admin.subcategories.create', ['categories' => [],'error', $e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
//            $category = Category::where('id', $request->input('parentCategory'))->first();

            Subcategory::create([
                'sub_category' => $request->input('subcategoryName'),
                'category' => $request->input('parentCategory')
            ]);

            return redirect()->back()->with('success', 'Subcategory created successfully');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
        catch (\QueryException $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            return view('admin.subcategories.show',['subcategories'=>Subcategory::findOrFail($id),
                'products'=>\App\Models\Products::where('products.sub_category',$id)
                    ->join('categories','products.category','=','categories.id')
                    ->select('products.*', 'categories.category_name as category_name','products.id as product_id')->get(),
                'total_products'=>\App\Models\Products::where('sub_category',$id)->count()
            ]);
        }
        catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
        catch (\QueryException $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            return view('admin.subcategories.edit',['subcategories'=>Subcategory::findOrFail($id),
                'categories'=>Category::all()]);
        }
        catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
        catch (\QueryException $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Subcategory::find($id)->update([
            'sub_category' => $request->input('categoryName'),
            'category' => $request->input('parentCategory'),
        ]);

        return redirect()->back()->with('success', 'Subcategory updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategory = Subcategory::with('products')->findOrFail($id);

        foreach ($subcategory->products as $product) {
            $imagePath = public_path("products/{$product->image}");
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $subcategory->products()->delete();


        $subcategory->delete();

        return redirect()->back()->with('success', 'Subcategory deleted successfully');
    }

}
