@extends('layouts.superadmin-layout')

@section('title', 'Dashboard')

@section('content')
<section class="sa-overview">
    <div class="m-4">
        <h1>SuperAdmin</h1>
        <a class="ms-1" href="{{ route('user.index') }}">
            <img class="buttons" src="{{ asset('images/manage_users.png') }}" alt="Manage Users">
        </a>
    </div>
    <div class="row justify-content-center g-3">
        <div class="col-8">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <img class="admin-img mb-auto" src="{{ asset('images/admin.png') }}" alt="Admin Icon">
                    <div>
                        <h2 class="card-title text-center mb-3">ADMIN</h2>
                        <a href="{{ route('admin.index') }}">
                            <img class="buttons" src="{{ asset('images/manage_admin.png') }}" alt="Manage Admin Button">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <img class="pm-img mb-auto" src="{{ asset('images/pm.png') }}" alt="PM Icon">
                    <div>
                        <h2 class="card-title text-center mb-3">Product <br> Manager</h2>
                        <a href="{{ route('project-manager.index') }}">
                            <img class="buttons" src="{{ asset('images/manage_pm.png') }}" alt="Manage PM Button">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection