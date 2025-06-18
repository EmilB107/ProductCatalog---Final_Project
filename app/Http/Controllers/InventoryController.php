<?php

namespace App\Http\Controllers;
// use App\Models\Inventory;

use Illuminate\Http\Request;
// use App\Models\Inventory;

class InventoryController extends Controller
{
    public function index()
    {

        return view('inventory.index');
        // return view('inventory.index', compact('inventory'));
    }

    public function update()
    {
        return view('inventory.update');
    }
}