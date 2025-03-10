<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Get search and category filters from the request
        $search = $request->input('search');
        $category = $request->input('category');
    
        $products = Product::query()
            ->when($search, function ($query, $search) {
                // Apply the search filter to the name, category, and description columns
                return $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                          ->orWhere('category', 'like', "%{$search}%")
                          ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->when($category, function ($query, $category) {
                // Apply the category filter (if category is provided)
                return $query->where('category', $category);
            })
            ->paginate(10);
    
        // Fetch all distinct categories from the products table
        $categories = Product::select('category')->distinct()->get();
    
        return view('products.index', compact('products', 'categories'));
    }
    
    

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'created_date' => 'required',
            'created_time' => 'required'
        ]);


        $newProduct = Product::create($data);

        return redirect(route('product.index'));

    }

    public function edit(Product $product){
        return view('products.edit', ['product' => $product]);
    }

    public function update(Product $product, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'created_date' => 'required',
            'created_time' => 'required'
            
        ]);

        $product->update($data);

        return redirect(route('product.index'))->with('success', 'Product Updated Succesffully');

    }

    public function destroy(Product $product){
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Product deleted Succesffully');
    }
}
