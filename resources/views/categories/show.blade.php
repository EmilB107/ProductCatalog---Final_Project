@extends('layouts.dashboard-layout')

@section('title', 'View Category')

@section('content')
    <section class="d-category-show">
        <div class="d-flex mb-3">
            @include('partials._return', ['route' => 'categories.index'])
            <h1 class="mx-auto">View Category</h1>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product['name'] }}</td>
                            <td>{{ $product['category'] }}</td>
                            <td>{{ $product['sub_category'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection