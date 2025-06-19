@extends('layouts.dashboard-layout')

@section('title', 'Update Inventory')

@section('content')
    <section class="d-inventory-update">
        <div class="d-flex mb-3">
            @include('partials._return', ['route' => 'inventory.index'])
            <h1 class="mx-auto">Update Inventory</h1>
        </div>
        <div class="table-responsive">
            <form>
                <table class="table table-bordered text-center align-middle">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>SKU</th>
                            <th>Quantity</th>
                            <th>Stock</th>
                            <th>Action</th>
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
                                <td>
                                    <input type="number" class="form-control text-center" value="{{ $item['quantity'] }}">
                                </td>
                                <td>
                                    <select class="form-select text-center">
                                        <option {{ $item['stock'] == 'Low Stock' ? 'selected' : '' }}>Low Stock</option>
                                        <option {{ $item['stock'] == 'In Stock' ? 'selected' : '' }}>In Stock</option>
                                        <option {{ $item['stock'] == 'Out of Stock' ? 'selected' : '' }}>Out of Stock</option>
                                    </select>
                                </td>
                                <td>
                                    <a href="#" onclick="this.closest('form').submit(); return false;">Save</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </section>
@endsection