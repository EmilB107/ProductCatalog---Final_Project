@extends('layouts.dashboard-layout')
<script src="{{ asset('js/filter.js') }}"></script>


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
        <div class="row justify-content-center">
            <div class="col col-lg-10">
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
                                    <td class="img-col">
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
                <div class="mt-2 text-center">
                    <a href="{{ route('inventory.edit') }}" role="button" class="add-btn">
                        Update Inventory
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
                        <img id="filterIconHide" src="{{ asset('images/filter.png') }}" alt="Filter" width="24"
                            class="ms-auto" style="cursor:pointer;" onclick="hideFilterPanel()">
                    </div>
                    <form method="GET" action="{{ route('inventory.index') }}">
                        <div class="mb-3">
                            <div class="fw-bold mb-1">Quantity</div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="quantity[]" value="1-10"
                                    id="q1">
                                <label class="form-check-label" for="q1">1-10</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="quantity[]" value="11-20"
                                    id="q2">
                                <label class="form-check-label" for="q2">11-20</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="quantity[]" value="21+"
                                    id="q3">
                                <label class="form-check-label" for="q3">21 +</label>
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
