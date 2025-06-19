{{-- filepath: resources/views/products/create.blade.php --}}
@extends('layouts.dashboard-layout')

@section('title', 'Create Product')

@section('content')
    <section class="d-product-create">
        <div class="d-flex mb-3">
            @include('partials._return', ['route' => 'products.index'])
            <h1 class="mx-auto">Create Product</h1>
        </div>
        <form>
            <div class="crud-card d-flex gap-4 align-items-start mx-auto">
                <div>
                    <div class="mb-3 d-flex align-items-center">
                        <input type="text" id="product_name" name="product_name" class="form-control fw-bold"
                            placeholder="Product Name">
                    </div>
                    <div class="mb-3 d-flex align-items-center">
                        <label for="sku" class="mb-0 me-2"><b>SKU</b></label>
                        <input type="text" id="sku" name="sku" class="form-control" placeholder="SKU">
                    </div>
                    <div class="mb-3 d-flex align-items-center">
                        <label for="description" class="mb-0 me-2"><b>Description</b></label>
                        <input type="text" id="description" name="description" class="form-control" placeholder="Description">
                    </div>
                    <div class="mb-3 d-flex flex-column flex-lg-row gap-3">
                        <div class="d-flex align-items-center">
                            <label for="category" class="mb-0 me-2"><b>Category</b></label>
                            <select id="category" name="category" class="form-select">
                                <option selected disabled>Select Category</option>
                                <option>Food</option>
                                <option>Accessories</option>
                                <option>Supplies</option>
                            </select>
                        </div>
                        <div class="d-flex align-items-center">
                            <label for="subcategory" class="mb-0 me-2"><b>Sub Category</b></label>
                            <select id="subcategory" name="subcategory" class="form-select">
                                <option selected disabled>Select Sub Category</option>
                                <option>Dry Food</option>
                                <option>Wet Food</option>
                                <option>Toys</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 d-flex align-items-center">
                        <label for="price" class="mb-0 me-2"><b>Price</b></label>
                        <input type="text" id="price" name="price" class="form-control" placeholder="₱0.00">
                    </div>
                    <div class="mb-3 d-flex align-items-center">
                        <label for="stock" class="mb-0 me-2"><b>Stock</b></label>
                        <select id="stock" name="stock" class="form-select">
                            <option selected disabled>Select Stock Status</option>
                            <option>Low Stock</option>
                            <option>In Stock</option>
                            <option>Out of Stock</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex flex-column align-items-center">
                    <img src="{{ asset('images/img-placeholder.png') }}" alt="Product Image">
                    <div class="d-flex align-items-center gap-2 mt-3 mb-3">
                        <span class="upload d-flex align-items-center">
                            <img src="{{ asset('images/upload.png') }}" alt="Upload">
                            <span class="ms-2 d-none d-lg-block">Upload File</span>
                        </span>
                        <input type="file" id="product_image" name="product_image" class="d-none">
                        <button type="button" class="btn btn-light"
                            onclick="document.getElementById('product_image').click();">Upload Image</button>
                    </div>
                    <div class="mt-3 d-flex gap-2">
                        <a href="#" onclick="this.closest('form').submit(); return false;">Save</a>
                        <a href="{{ route('products.index') }}">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
