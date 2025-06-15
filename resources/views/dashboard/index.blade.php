{{-- filepath: resources/views/dashboard/index.blade.php --}}
@extends('layouts.dashboard-layout')

@section('title', 'Dashboard')

@section('content')
    <section class="d-home">
        <h1>Dashboard</h1>
        <div class="d-grid">
            <div class="d-item d-flex text-center">
                <img class="me-2" src="{{ asset('images/dashboard-01.png') }}" alt="Products Icon">
                <div>
                    <span class="num">500</span>
                    <span class="desc">Total Products</span>
                </div>
            </div>
            <div class="d-item d-flex text-center">
                <img class="me-2" src="{{ asset('images/dashboard-02.png') }}" alt="Items Icon">
                <div>
                    <span class="num">1000</span>
                    <span class="desc">Total Items</span>
                </div>
            </div>
            <div class="d-item d-flex text-center">
                <img class="me-2" src="{{ asset('images/dashboard-03.png') }}" alt="Sales Icon">
                <div>
                    <span class="num">Php 10,000</span>
                    <span class="desc">Total Sales</span>
                </div>
            </div>
            <div class="d-item d-flex text-center">
                <img class="me-2" src="{{ asset('images/dashboard-04.png') }}" alt="Orders Icon">
                <div>
                    <span class="num">1000</span>
                    <span class="desc">Total Orders</span>
                </div>
            </div>
        </div>
    </section>
    <section class="d-overview mt-5">
        <h2>Overview</h2>
        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>SKU</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 5; $i++)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </section>

@endsection
