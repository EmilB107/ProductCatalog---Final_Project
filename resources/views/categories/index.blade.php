@include('partials._delete')
@extends('layouts.dashboard-layout')

@section('title', 'Categories')

@section('content')
    @php
        // Set this to 'Admin' or 'PM' to test different roles
        $role = 'Admin';
    @endphp

    <section class="d-category">
        <div class="d-flex mb-3">
            <h1>Category</h1>
            <div class="product-search-bar ms-auto">
                <form action="#" method="GET" class="search-form">
                    <div class="search-input-wrapper">
                        <img src="{{ asset('images/search.png') }}" alt="Search" class="search-icon">
                        <input type="text" name="query" class="search-input"
                            placeholder="Search Products. SKU, Category, Price, Stock">
                    </div>
                    <button type="submit" class="search-btn ms-3 ">SEARCH</button>
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Number of Products</th>
                        @if ($role === 'Admin')
                            <th>Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category['name'] }}</td>
                            <td>{{ $category['sub_category'] }}</td>
                            <td>{{ $category['products_count'] }}</td>
                            @if ($role === 'Admin')
                                <td class="icon-col">
                                    <a href="{{ route('categories.show', $category['id']) }}" title="View">
                                        <img class="icon" src="{{ asset('images/view.png') }}" alt="View"
                                            width="20">
                                    </a>
                                    <a href="{{ route('categories.edit', $category['id']) }}" title="Edit">
                                        <img class="icon" src="{{ asset('images/edit.png') }}" alt="Edit"
                                            width="20">
                                    </a>
                                    <a href=""
                                        onclick="openDeleteModal('{{ route('categories.destroy', $category['id']) }}'); return false;">
                                        <img class="icon" src="{{ asset('images/delete.png') }}" alt="Delete">
                                    </a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if ($role === 'Admin')
            <div class="mt-2 text-end">
                <a href="{{ route('categories.create') }}" role="button" class="add-btn">
                    Add Category
                </a>
        @endif
    </section>
@endsection
