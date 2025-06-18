{{-- filepath: resources/views/categories/index.blade.php --}}
@extends('layouts.dashboard-layout')

@section('title', 'Categories')

@section('content')
    <section class="d-category">
        <div class="d-flex mb-3">
            <h1>Category</h1>
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
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Number of Products</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 3; $i++)
                        <tr>
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