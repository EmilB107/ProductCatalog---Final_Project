<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
        
        if ($request->has('query') && !empty($request->query)) {
            $searchTerm = $request->query;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('sku', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('quantity', 'LIKE', "%{$searchTerm}%");
            });
        }
        
        if ($request->has('quantity') && is_array($request->quantity)) {
            $query->where(function($q) use ($request) {
                foreach ($request->quantity as $range) {
                    switch ($range) {
                        case '1-10':
                            $q->orWhereBetween('quantity', [1, 10]);
                            break;
                        case '11-20':
                            $q->orWhereBetween('quantity', [11, 20]);
                            break;
                        case '21+':
                            $q->orWhere('quantity', '>=', 21);
                            break;
                    }
                }
            });
        }
        
        if ($request->has('stock') && is_array($request->stock)) {
            $query->where(function($q) use ($request) {
                foreach ($request->stock as $status) {
                    switch ($status) {
                        case 'Low Stock':
                            $q->orWhereBetween('quantity', [1, 10]);
                            break;
                        case 'In Stock':
                            $q->orWhere('quantity', '>', 10);
                            break;
                        case 'Out of Stock':
                            $q->orWhere('quantity', 0);
                            break;
                    }
                }
            });
        }
        
        $inventory = $query->get();
        return view('inventory.index', compact('inventory'));
    }

    public function edit(Request $request, Product $product = null)
    {
        $query = Product::query();
        
        // Handle filters 
        if ($request->has('quantity') && is_array($request->quantity)) {
            $query->where(function($q) use ($request) {
                foreach ($request->quantity as $range) {
                    switch ($range) {
                        case '1-10':
                            $q->orWhereBetween('quantity', [1, 10]);
                            break;
                        case '11-20':
                            $q->orWhereBetween('quantity', [11, 20]);
                            break;
                        case '21+':
                            $q->orWhere('quantity', '>=', 21);
                            break;
                    }
                }
            });
        }
        
        if ($request->has('stock') && is_array($request->stock)) {
            $query->where(function($q) use ($request) {
                foreach ($request->stock as $status) {
                    switch ($status) {
                        case 'low':
                            $q->orWhereBetween('quantity', [1, 10]);
                            break;
                        case 'in':
                            $q->orWhere('quantity', '>', 10);
                            break;
                        case 'out':
                            $q->orWhere('quantity', 0);
                            break;
                    }
                }
            });
        }
        
        $inventory = $query->get();
        return view('inventory.update', compact('inventory'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:0',
        ]);

        // Calculate stock status based on quantity
        $stockStatus = 'In Stock';
        if ($validated['quantity'] == 0) {
            $stockStatus = 'Out Of Stock';
        } elseif ($validated['quantity'] <= 10) {
            $stockStatus = 'Low Stock';
        }

        $product->update([
            'quantity' => $validated['quantity'],
            'stock_status' => $stockStatus,
        ]);

        return redirect()->route('inventory.edit')->with('success', 'Inventory updated successfully.');
    }
}
