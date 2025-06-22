<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class InventoryController extends Controller
{

    public function index()
    {
        $inventory = Product::all();
        return view('inventory.index', compact('inventory'));
    }

    public function edit()
    {
        $inventory = Product::all();
        return view('inventory.update', compact('inventory'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
        'quantity' => 'required|integer|min:0',
        'stock' => 'required|in:Low_Stock,In_Stock,Out_Of_Stock',
    ]);

    $product->update([
        'quantity' => $validated['quantity'],
        'stock_status' => $validated['stock'],
    ]);

    return redirect()->route('inventory.edit')->with('success', 'Inventory updated successfully.');


}
}
