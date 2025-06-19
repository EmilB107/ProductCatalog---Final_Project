@extends('layouts.dashboard-layout')

@section('title', 'Inventory')

@section('content')
    <section class="d-inventory">
        <div class="d-flex mb-3">
            <h1>Inventory</h1>
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
        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>SKU</th>
                        <th>Quantity</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inventory as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>
                                <img src="{{ asset($item['image']) }}" alt="Product Image" width="40">
                            </td>
                            <td>{{ $item['sku'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>{{ $item['stock'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-2 text-end">
            <a href="{{ route('inventory.update') }}" role="button" class="add-btn">
                Update Inventory
            </a>
        </div>
    </section>
@endsection
