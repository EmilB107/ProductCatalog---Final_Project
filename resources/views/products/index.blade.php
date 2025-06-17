{{-- filepath: resources/views/products/index.blade.php --}}
@extends('layouts.dashboard-layout')

@section('title', 'Products')

@section('content')
    <section class="d-product">
        <div class="d-flex mb-3">
            <h1>Products</h1>
            <div class="product-search-bar ms-auto">
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
                    <tr>
                        <td>Cat Food</td>
                        <td>Nutritious dry food for cats</td>
                        <td></td>
                        <td>CF-001</td>
                        <td>Food</td>
                        <td>₱500</td>
                        <td>25</td>
                        <td class="icon-col">
                            <a href="{{ route('products.show', 1) }}" title="View">
                                <img class="icon" src="{{ asset('images/view.png') }}" alt="View" width="20">
                            </a>
                            <a href="{{ route('products.edit', 1) }}" title="Edit">
                                <img class="icon" src="{{ asset('images/edit.png') }}" alt="Edit" width="20">
                            </a>
                            <a href="#" title="Delete" onclick="return confirm('Are you sure?')">
                                <img class="icon" src="{{ asset('images/delete.png') }}" alt="Delete" width="20">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Dog Leash</td>
                        <td>Durable nylon leash for dogs</td>
                        <td></td>
                        <td>DL-002</td>
                        <td>Accessories</td>
                        <td>₱250</td>
                        <td>40</td>
                        <td class="icon-col">
                            <a href="{{ route('products.show', 2) }}" title="View">
                                <img class="icon" src="{{ asset('images/view.png') }}" alt="View" width="20">
                            </a>
                            <a href="{{ route('products.edit', 2) }}" title="Edit">
                                <img class="icon" src="{{ asset('images/edit.png') }}" alt="Edit" width="20">
                            </a>
                            <a href="#" title="Delete" onclick="return confirm('Are you sure?')">
                                <img class="icon" src="{{ asset('images/delete.png') }}" alt="Delete" width="20">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Cat Litter</td>
                        <td>Clumping litter for odor control</td>
                        <td></td>
                        <td>CL-003</td>
                        <td>Supplies</td>
                        <td>₱180</td>
                        <td>60</td>
                        <td class="icon-col">
                            <a href="{{ route('products.show', 3) }}" title="View">
                                <img class="icon" src="{{ asset('images/view.png') }}" alt="View" width="20">
                            </a>
                            <a href="{{ route('products.edit', 3) }}" title="Edit">
                                <img class="icon" src="{{ asset('images/edit.png') }}" alt="Edit" width="20">
                            </a>
                            <a href="#" title="Delete" onclick="return confirm('Are you sure?')">
                                <img class="icon" src="{{ asset('images/delete.png') }}" alt="Delete" width="20">
                            </a>
                        </td>
                    </tr>
                    {{-- @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->image }}</td>
                            <td>{{ $product->sku }}</td>
                            <td>{{ $product->category->name ?? '' }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->stock }}</td>
                            <td class="icon-col">
                                <a href="{{ route('products.show', $product) }}" title="View">
                                    <img class="icon" src="{{ asset('images/view.png') }}" alt="View" width="20">
                                </a>
                                <a href="{{ route('products.edit', $product) }}" title="Edit">
                                    <img class="icon" src="{{ asset('images/edit.png') }}" alt="Edit" width="20">
                                </a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background:none; border:none; padding:0;" title="Delete"
                                        onclick="return confirm('Are you sure?')">
                                        <img src="{{ asset('images/delete.png') }}" alt="Delete" width="20">
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
        <div class="mt-2 text-end">
            <a href="{{ route('products.create') }}" role="button" class="add-btn">
                Add Product
            </a>
        </div>
    </section>
@endsection
