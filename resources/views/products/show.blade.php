@extends('layouts.dashboard-layout')

@section('title', 'View Product')

@section('content')
    <section class="d-product-show">
        <div class="d-flex mb-3">
            @include('partials._return')
            <h1 class="mx-auto">View Product</h1>
        </div>
        <div class="crud-card d-flex gap-4 align-items-start mx-auto">
            <div>
                <h2>Product Name</h2>
                <div class="mt-3">
                    <div><b>SKU</b> &nbsp; <span>Lorem Ipsum</span></div>
                    <div class="mt-2"><b>Description</b> &nbsp; <span>Lorem Ipsum</span></div>
                    <div class="d-flex flex-column flex-lg-row gap-lg-4">
                        <div class="mt-2"><b>Category</b> &nbsp; <span>Lorem Ipsum</span></div>
                        <div class="mt-2"><b>Sub Category</b> &nbsp; <span>Lorem Ipsum</span></div>
                    </div>
                    <div class="mt-2"><b>Price</b> &nbsp; <span>Lorem Ipsum</span></div>
                    <div class="mt-2"><b>Stock</b> &nbsp; <span>#</span></div>
                </div>
            </div>
            <div class="d-flex flex-column align-items-center">
                <img src="{{ asset('images/img-placeholder.png') }}" alt="Product Image">
                <div class="mt-auto">
                    <p class="mt-3 mb-2 text-center">Low Stock</p>
                    <a href="{{ route('products.edit', 1) }}">
                        Edit this Product
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
