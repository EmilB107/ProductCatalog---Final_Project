@extends('layouts.dashboard-layout')

@section('title', 'Update Inventory')

@section('content')
    <section class="d-inventory-update">
        <div class="d-flex mb-3">
            @include('partials._return')
            <h1 class="mx-auto">Update Inventory</h1>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
                <colgroup>
                    <col style="width: 18%;">   <!-- Product Name -->
                    <col style="width: 14%;">   <!-- Image -->
                    <col style="width: 14%;">   <!-- SKU -->
                    <col style="width: 14%;">   <!-- Quantity (smaller) -->
                    <col style="width: 24%;">   <!-- Stock (bigger) -->
                    <col style="width: 16%;">   <!-- Action (bigger) -->
                </colgroup>
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
                    @for ($i = 0; $i < 3; $i++)
                        <tr>
                            <td>Sample Product</td>
                            <td class="img-col">
                                <img src="{{ asset('images/img-placeholder.png') }}" alt="Product Image">
                            </td>
                            <td>SKU-001</td>
                            <td>
                                <input type="number" class="form-control text-center" value="55" min="0">
                            </td>
                            <td>
                                <select class="form-select text-center">
                                    <option>Low Stock</option>
                                    <option>In Stock</option>
                                    <option>Out of Stock</option>
                                </select>
                            </td>
                            <td>
                                <a href="#" onclick="this.closest('form').submit(); return false;">Save</a>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </section>
@endsection