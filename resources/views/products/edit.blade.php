@extends('layouts.dashboard-layout')

@section('title', 'Edit Product')

@section('content')
    <section class="d-product-edit">
        <div class="d-flex mb-3">
            @include('partials._return', ['route' => 'products.index'])
            <h1 class="mx-auto">Edit Product</h1>
        </div>
        <form>
            <div class="crud-card d-flex gap-4 align-items-start mx-auto">
                <div class="left-col">
                    <div class="mb-3 d-flex align-items-center">
                        <input type="text" id="product_name" name="product_name" value="{{ $product['name'] }}"
                            class="form-control fw-bold" placeholder="Product Name">
                    </div>
                    <div class="mb-3 d-flex align-items-center">
                        <label for="sku" class="mb-0 me-2"><b>SKU</b></label>
                        <input type="text" id="sku" name="sku" value="{{ $product['sku'] }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="mb-0"><b>Description</b></label>
                        <input type="text" id="description" name="description" value="{{ $product['description'] }}"
                            class="form-control mt-2">
                    </div>
                    <div class="mb-3 d-flex flex-column flex-lg-row gap-3">
                        <div class="d-flex flex-column  align-items-center">
                            <label for="category" class="mb-0 me-2"><b>Category</b></label>
                            <select id="category" name="category" class="form-select">
                                <option {{ $product['category'] == 'Dog Supplies' ? 'selected' : '' }}>Dog Supplies
                                </option>
                                <option {{ $product['category'] == 'Cat Supplies' ? 'selected' : '' }}>Cat Supplies
                                </option>
                                <option {{ $product['category'] == 'Grooming' ? 'selected' : '' }}>Grooming</option>
                            </select>
                        </div>
                        <div class="d-flex flex-column  align-items-center">
                            <label for="subcategory" class="mb-0 me-2"><b>Sub Category</b></label>
                            <select id="subcategory" name="subcategory" class="form-select">
                                <option {{ $product['subcategory'] == 'Food' ? 'selected' : '' }}>Food</option>
                                <option {{ $product['subcategory'] == 'Toys' ? 'selected' : '' }}>Toys</option>
                                <option {{ $product['subcategory'] == 'Dry Food' ? 'selected' : '' }}>Dry Food</option>
                                <option {{ $product['subcategory'] == 'Wet Food' ? 'selected' : '' }}>Wet Food</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 d-flex align-items-center">
                        <label for="price" class="mb-0 me-2"><b>Price</b></label>
                        <input type="text" id="price" name="price" value="{{ $product['price'] }}" class="form-control">
                    </div>
                    <div class="mb-3 d-flex align-items-center">
                        <label for="stock" class="mb-0 me-2"><b>Stock</b></label>
                        <input type="number" id="stock" name="stock" value="{{ $product['stock'] }}" class="form-control"
                            min="0">
                    </div>
                </div>
                <div class="d-flex flex-column align-items-center ms-auto">
                    <img src="{{ asset($product['image']) }}" alt="Product Image">
                    <div class="d-flex align-items-center gap-2 mt-3 mb-3">
                        <span class="upload d-flex align-items-center">
                            <img src="{{ asset('images/upload.png') }}" alt="Upload">
                            <span class="ms-2 d-none d-lg-block">Upload File</span>
                        </span>
                        <input type="file" id="product_image" name="product_image" class="d-none">
                        <button type="button" class="btn btn-light"
                            onclick="document.getElementById('product_image').click();">Change Image</button>
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
