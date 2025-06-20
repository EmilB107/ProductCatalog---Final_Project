<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Dummy admin data with permissions
    private $admin = [
        [
            'id' => 1,
            'name' => 'Alice Smith',
            'email' => 'alice@example.com',
            'permissions' => ['View Users', 'Edit Products', 'Full Access', 'Edit Products', 'Full Access', 'Edit Products', 'Full Access'],
        ],
        [
            'id' => 2,
            'name' => 'Bob Johnson',
            'email' => 'bob@example.com',
            'permissions' => ['View Users', 'Limited Access'],
        ],
        [
            'id' => 3,
            'name' => 'Carol Lee',
            'email' => 'carol@example.com',
            'permissions' => ['Read Only'],
        ],
    ];

    public function index()
    {
        $admin = $this->admin;
        return view('superadmin.admin.index', compact('admin'));
    }

    public function show($id)
    {
        $admin = collect($this->admin)->firstWhere('id', $id);
        if (!$admin) {
            abort(404);
        }
        return view('superadmin.admin.show', compact('admin'));
    }

    public function edit($id)
    {
        $admin = collect($this->admin)->firstWhere('id', $id);
        if (!$admin) {
            abort(404);
        }
        return view('superadmin.admin.edit', compact('admin'));
    }

    public function create()
    {
        return view('superadmin.admin.create');
    }

    public function destroy($id)
    {
        // Dummy delete logic
        return redirect()->route('admin.index');
    }
}