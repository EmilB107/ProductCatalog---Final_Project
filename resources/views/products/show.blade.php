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
                <h2>{{ $product->name }}</h2>
                <div class="mt-3">
                    <div><b>SKU</b> &nbsp; <span>{{ $product->sku }}</span></div>
                    <div class="mt-2"><b>Description</b> &nbsp; <span>{{ $product->description }}</span></div>
                    <div class="d-flex flex-column flex-lg-row gap-lg-4">
                        <div class="mt-2"><b>Category</b> &nbsp;
                            <span>{{ $product->category->name ?? 'N/A' }}</span> {{-- Changed from $product->category to $product->category->name --}}
                        </div>
                        <div class="mt-2"><b>Sub Category</b> &nbsp;
                            <span>{{ $product->subCategory->name ?? 'N/A' }}</span> {{-- Changed from $product->subcategory to $product->subCategory->name --}}
                        </div>
                    </div>
                    <div class="mt-2"><b>Price</b> &nbsp; <span>₱{{ number_format($product->price, 2) }}</span></div>
                    <div class="mt-2"><b>Stock</b> &nbsp; <span>{{ $product->stock_status }}</span></div>
                </div>
            </div>
            <div class="d-flex flex-column align-items-center">
                <img src="{{ $product->image_path ? asset('storage/' . $product->image_path) : asset('images/img-placeholder.png') }}"
                    alt="Product Image" style="width: 200px; height: auto;">
                <div class="mt-auto">
                    <p class="mt-3 mb-2 text-center">{{ $product->stock_status }}</p>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success">
                        Edit this Product
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection