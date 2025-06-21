<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    // Dummy user data with permissions
    private $users = [
        [
            'id' => 1,
            'role' => 'Admin',
            'name' => 'Alice Smith',
            'email' => 'alice@example.com',
            'username' => 'alice',
            'password' => 'admin12345',
            'permissions' => ['View Users', 'Edit Products', 'Full Access'],
        ],
        [
            'id' => 2,
            'role' => 'Project Manager',
            'name' => 'David Miller',
            'email' => 'david@example.com',
            'username' => 'david',
            'password' => 'pm12345',
            'permissions' => ['View Projects', 'Assign Tasks'],
        ],
        [
            'id' => 3,
            'role' => 'User',
            'name' => 'Eve Adams',
            'email' => 'eve@example.com',
            'username' => 'eve',
            'password' => 'user12345',
            'permissions' => ['Read Only'],
        ],
    ];

    public function index()
    {
        $users = $this->users;
        return view('superadmin.users.index', compact('users'));
    }

    public function show($id)
    {
        $user = collect($this->users)->firstWhere('id', $id);
        if (!$user) {
            abort(404);
        }
        return view('superadmin.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = collect($this->users)->firstWhere('id', $id);
        if (!$user) {
            abort(404);
        }
        return view('superadmin.users.edit', compact('user'));
    }

    public function create()
    {
        return view('superadmin.users.create');
    }

    public function destroy($id)
    {
        // Dummy delete logic
        return redirect()->route('user.index');
    }
}