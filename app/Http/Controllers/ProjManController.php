<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjManController extends Controller
{
    // Dummy data
    private $projman = [
        [
            'id' => 1,
            'name' => 'David Miller',
            'username' => 'david',
            'email' => 'david@example.com',
            'password' => 'pm12345',
            'permissions' => ['View Projects', 'Edit Projects', 'Assign Tasks'],
        ],
        [
            'id' => 2,
            'name' => 'Emma Wilson',
            'username' => 'emma',
            'email' => 'emma@example.com',
            'password' => 'pm23456',
            'permissions' => ['View Projects', 'Limited Access'],
        ],
        [
            'id' => 3,
            'name' => 'Frank Harris',
            'username' => 'frank',
            'email' => 'frank@example.com',
            'password' => 'pm34567',
            'permissions' => ['Read Only'],
        ],
    ];

    public function index()
    {
        $projman = $this->projman;
        return view('superadmin.project-manager.index', compact('projman'));
    }

    public function show($id)
    {
        $projman = collect($this->projman)->firstWhere('id', $id);
        if (!$projman) {
            abort(404);
        }
        return view('superadmin.project-manager.show', compact('projman'));
    }

    public function edit($id)
    {
        $projman = collect($this->projman)->firstWhere('id', $id);
        if (!$projman) {
            abort(404);
        }
        return view('superadmin.project-manager.edit', compact('projman'));
    }

    public function create()
    {
        return view('superadmin.project-manager.create');
    }

    public function destroy($id)
    {
        // Dummy delete logic
        return redirect()->route('project-manager.index');
    }
}