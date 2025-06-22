<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index()
    {
        $products = Product::with(['category', 'subCategory'])->get();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        return view('products.create', compact('categories', 'subCategories'));
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'sku' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'category' => 'required|string',  // For create form
            'subcategory' => 'nullable|string',  // For create form
            'category_id' => 'nullable|exists:categories,id',  // For edit form
            'sub_category_id' => 'nullable|exists:sub_categories,id',  // For edit form
            'price' => 'required|numeric|min:0',
            'stock' => 'nullable|string',  // For create form
            'stock_status' => 'nullable|string',  // For edit form
            'product_image' => 'nullable|image|max:2048',
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('product_image')) {
            $imagePath = $request->file('product_image')->store('product_images', 'public');
        }

        // Handle different field names for create vs edit
        $categoryName = $validated['category'] ?? null;
        $subcategoryName = $validated['subcategory'] ?? null;
        $stockStatus = $validated['stock'] ?? $validated['stock_status'] ?? null;

        // Find or create category
        $category = null;
        if ($categoryName) {
            $category = Category::firstOrCreate(['name' => $categoryName]);
        } elseif ($validated['category_id'] ?? null) {
            $category = Category::find($validated['category_id']);
        }
        
        // Find or create subcategory if provided
        $subCategory = null;
        if ($subcategoryName && $category) {
            $subCategory = SubCategory::firstOrCreate([
                'name' => $subcategoryName,
                'category_id' => $category->id
            ]);
        } elseif ($validated['sub_category_id'] ?? null) {
            $subCategory = SubCategory::find($validated['sub_category_id']);
        }

        Product::create([
            'name' => $validated['product_name'],
            'sku' => $validated['sku'],
            'description' => $validated['description'],
            'category_id' => $category ? $category->id : null,
            'sub_category_id' => $subCategory ? $subCategory->id : null,
            'price' => $validated['price'],
            'stock_status' => $stockStatus,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified product.
     */
    public function show(Product $product)
    {
        $product->load(['category', 'subCategory']);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        return view('products.edit', compact('product', 'categories', 'subCategories'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'sku' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'category' => 'nullable|string',  // For create form
            'subcategory' => 'nullable|string',  // For create form
            'category_id' => 'nullable|exists:categories,id',  // For edit form
            'sub_category_id' => 'nullable|exists:sub_categories,id',  // For edit form
            'price' => 'required|numeric|min:0',
            'stock' => 'nullable|string',  // For create form
            'stock_status' => 'nullable|string',  // For edit form
            'product_image' => 'nullable|image|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('product_image')) {
            // Delete old image if it exists
            if ($product->image_path && file_exists(storage_path('app/public/' . $product->image_path))) {
                unlink(storage_path('app/public/' . $product->image_path));
            }
            
            $imagePath = $request->file('product_image')->store('product_images', 'public');
            $validated['image_path'] = $imagePath;
        }

        // Handle different field names for create vs edit
        $categoryName = $validated['category'] ?? null;
        $subcategoryName = $validated['subcategory'] ?? null;
        $stockStatus = $validated['stock'] ?? $validated['stock_status'] ?? null;

        // Find or create category
        $category = null;
        if ($categoryName) {
            $category = Category::firstOrCreate(['name' => $categoryName]);
        } elseif ($validated['category_id'] ?? null) {
            $category = Category::find($validated['category_id']);
        }
        
        // Find or create subcategory if provided
        $subCategory = null;
        if ($subcategoryName && $category) {
            $subCategory = SubCategory::firstOrCreate([
                'name' => $subcategoryName,
                'category_id' => $category->id
            ]);
        } elseif ($validated['sub_category_id'] ?? null) {
            $subCategory = SubCategory::find($validated['sub_category_id']);
        }

        $product->update([
            'name' => $validated['product_name'],
            'sku' => $validated['sku'] ?? $product->sku,
            'description' => $validated['description'] ?? $product->description,
            'category_id' => $category ? $category->id : $product->category_id,
            'sub_category_id' => $subCategory ? $subCategory->id : $product->sub_category_id,
            'price' => $validated['price'],
            'stock_status' => $stockStatus ?? $product->stock_status,
            'image_path' => $validated['image_path'] ?? $product->image_path,
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        // Delete associated image file if it exists
        if ($product->image_path && file_exists(storage_path('app/public/' . $product->image_path))) {
            unlink(storage_path('app/public/' . $product->image_path));
        }
        
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}