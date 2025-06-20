@include('partials._delete')
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
                            placeholder="Search Product Name, SKU, Quantity, Stock">
                    </div>
                    <button type="submit" class="search-btn ms-3">SEARCH</button>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col col-lg-10">
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
                            <tr>
                                <td>Cat Food</td>
                                <td>Nutritious dry food for cats</td>
                                <td class="img-col">
                                    <img src="{{ asset('images/img-placeholder.png') }}" alt="Product Image">
                                </td>
                                <td>CF-001</td>
                                <td>Food</td>
                                <td>₱500</td>
                                <td>25</td>
                                <td class="icon-col">
                                    <a href="{{ route('products.show', 1) }}" title="View">
                                        <img class="icon" src="{{ asset('images/view.png') }}" alt="View"
                                            width="20">
                                    </a>
                                    <a href="{{ route('products.edit', 1) }}" title="Edit">
                                        <img class="icon" src="{{ asset('images/edit.png') }}" alt="Edit"
                                            width="20">
                                    </a>
                                    <a href="#"
                                        onclick="openDeleteModal('{{ route('products.destroy', 1) }}'); return false;">
                                        <img class="icon" src="{{ asset('images/delete.png') }}" alt="Delete">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Dog Leash</td>
                                <td>Durable nylon leash for dogs</td>
                                <td class="img-col">
                                    <img src="{{ asset('images/img-placeholder.png') }}" alt="Product Image">
                                </td>
                                <td>DL-002</td>
                                <td>Accessories</td>
                                <td>₱250</td>
                                <td>40</td>
                                <td class="icon-col">
                                    <a href="{{ route('products.show', 2) }}" title="View">
                                        <img class="icon" src="{{ asset('images/view.png') }}" alt="View"
                                            width="20">
                                    </a>
                                    <a href="{{ route('products.edit', 2) }}" title="Edit">
                                        <img class="icon" src="{{ asset('images/edit.png') }}" alt="Edit"
                                            width="20">
                                    </a>
                                    <a href="#"
                                        onclick="openDeleteModal('{{ route('products.destroy', 2) }}'); return false;">
                                        <img class="icon" src="{{ asset('images/delete.png') }}" alt="Delete">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Cat Litter</td>
                                <td>Clumping litter for odor control</td>
                                <td class="img-col">
                                    <img src="{{ asset('images/img-placeholder.png') }}" alt="Product Image">
                                </td>
                                <td>CL-003</td>
                                <td>Supplies</td>
                                <td>₱180</td>
                                <td>60</td>
                                <td class="icon-col">
                                    <a href="{{ route('products.show', 3) }}" title="View">
                                        <img class="icon" src="{{ asset('images/view.png') }}" alt="View"
                                            width="20">
                                    </a>
                                    <a href="{{ route('products.edit', 3) }}" title="Edit">
                                        <img class="icon" src="{{ asset('images/edit.png') }}" alt="Edit"
                                            width="20">
                                    </a>
                                    <a href="#"
                                        onclick="openDeleteModal('{{ route('products.destroy', 3) }}'); return false;">
                                        <img class="icon" src="{{ asset('images/delete.png') }}" alt="Delete">
                                    </a>
                                </td>
                            </tr>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td class="img-col">{{ $product->image }}</td>
                                    <td>{{ $product->sku }}</td>
                                    <td>{{ $product->category->name ?? '' }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td class="icon-col">
                                        <a href="{{ route('products.show', $product) }}" title="View">
                                            <img class="icon" src="{{ asset('images/view.png') }}" alt="View"
                                                width="20">
                                        </a>
                                        <a href="{{ route('products.edit', $product) }}" title="Edit">
                                            <img class="icon" src="{{ asset('images/edit.png') }}" alt="Edit"
                                                width="20">
                                        </a>
                                        <a href="#"
                                            onclick="openDeleteModal('{{ route('products.destroy', $product->id) }}'); return false;">
                                            <img src="{{ asset('images/delete.png') }}" alt="Delete" width="24">
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-2 text-end">
                    <a href="{{ route('products.create') }}" role="button" class="add-btn">
                        Add Product
                    </a>
                </div>
            </div>
            <div class="col-lg-2 d-none d-lg-flex flex-column ">
                <img id="filterIconShow" class="ms-auto" src="{{ asset('images/filter.png') }}" alt="Filter"
                    width="24" style="cursor:pointer;" onclick="showFilterPanel()">

                <div id="filterPanel" class="p-3 bg-white rounded shadow-sm d-none"
                    style="background: #fff; border: 1px solid #eaeaea;">
                    <div class="d-flex align-items-center mb-3">
                        <strong class="me-2">Filter By:</strong>
                        <!-- Second filter icon (close/hide) -->
                        <img id="filterIconHide" src="{{ asset('images/filter.png') }}" alt="Filter" width="24"
                            class="ms-auto" style="cursor:pointer;" onclick="hideFilterPanel()">
                    </div>
                    <form method="GET" action="{{ route('products.index') }}">
                        <div class="mb-3">
                            <div class="fw-bold mb-1">Category</div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="category[]" value="Dog Supplies"
                                    id="dogSupplies">
                                <label class="form-check-label" for="dogSupplies">Dog Supplies</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="category[]" value="Cat Supplies"
                                    id="catSupplies">
                                <label class="form-check-label" for="catSupplies">Cat Supplies</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="fw-bold mb-1">Price</div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="price[]" value="1000-5000"
                                    id="p1">
                                <label class="form-check-label" for="p1">₱ 1000 - ₱ 5000</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="price[]" value="500-999"
                                    id="p2">
                                <label class="form-check-label" for="p2">₱ 500 - ₱ 999</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="price[]" value="0-499"
                                    id="p3">
                                <label class="form-check-label" for="p3">Below ₱ 499</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="fw-bold mb-1">Stock</div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="stock[]" value="low"
                                    id="lowStock">
                                <label class="form-check-label" for="lowStock">Low Stock</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="stock[]" value="in"
                                    id="inStock">
                                <label class="form-check-label" for="inStock">In Stock</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="stock[]" value="out"
                                    id="outStock">
                                <label class="form-check-label" for="outStock">Out of Stock</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

<script src="{{ asset('js/filter.js') }}"></script>
