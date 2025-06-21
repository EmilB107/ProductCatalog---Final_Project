@extends('layouts.dashboard-layout')

@section('title', 'View Product')

@section('content')
    <section class="d-product-show">
        <div class="d-flex mb-3">
            @include('partials._return', ['route' => 'products.index'])
            <h1 class="mx-auto">View Product</h1>
        </div>
        <div class="crud-card d-flex gap-4 align-items-start mx-auto">
            <div>
                <h2>{{ $product['name'] }}</h2>
                <div class="mt-3">
                    <div class="text"><b>SKU</b> &nbsp; <span>{{ $product['sku'] }}</span></div>
                    <div class="text d-flex flex-column mt-2"><b>Description</b><span class="desc">{{ $product['description'] }}</span></div>
                    <div class="text d-flex flex-column flex-lg-row gap-lg-4">
                        <div class="text mt-2"><b>Category</b><span class="d-block">{{ $product['category'] }}</span></div>
                        <div class="text mt-2"><b>Sub Category</b><span class="d-block">{{ $product['subcategory'] }}</span></div>
                    </div>
                    <div class="text mt-2"><b>Price</b> &nbsp; <span>{{ $product['price'] }}</span></div>
                    <div class="text mt-2"><b>Stock</b> &nbsp; <span>{{ $product['stock'] }}</span></div>
                </div>
            </div>
            <div class="d-flex flex-column align-items-center ms-auto">
                <img src="{{ asset($product['image']) }}" alt="Product Image">
                <div class="mt-auto">
                    <p class="text-center">{{ $product['stock'] <= 5 ? 'Low Stock' : 'In Stock' }}</p>
                    <a href="{{ route('products.edit', $product['id']) }}">
                        Edit this Product
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
