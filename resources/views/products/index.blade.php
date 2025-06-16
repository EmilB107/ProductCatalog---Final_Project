{{-- filepath: resources/views/products/index.blade.php --}}
@extends('layouts.dashboard-layout')

@section('title', 'Products')

@section('content')
    <section class="d-product">
        <div class="d-flex mb-3">
            <h1>Products</h1>
            <div class="product-search-bar ms-auto">
                <form action="#" method="GET" class="search-form">
                    <div class="search-input-wrapper">
                        <img src="{{ asset('images/search.png') }}" alt="Search" class="search-icon">
                        <input type="text" name="query" class="search-input"
                            placeholder="Search Products. SKU, Category, Price, Stock">
                    </div>
                    <button type="submit" class="search-btn ms-3 ">SEARCH</button>
                </form>
            </div>
        </div>
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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 3; $i++)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="#" title="View">
                                    <img class="icon" src="{{ asset('images/view.png') }}" alt="View">
                                </a>
                                <a href="#" title="Edit">
                                    <img class="icon" src="{{ asset('images/edit.png') }}" alt="Edit">
                                </a>
                                <a href="#" title="Delete">
                                    <img class="icon" src="{{ asset('images/delete.png') }}" alt="Delete">
                                </a>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </section>
@endsection
