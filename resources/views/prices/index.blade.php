{{-- filepath: resources/views/prices/index.blade.php --}}
@extends('layouts.dashboard-layout')

@section('title', 'Prices')

@section('content')
    <section class="d-prices">
        <div class="d-flex mb-3">
            <h1>Prices</h1>
            <div class="product-search-bar ms-auto">
                <form action="#" method="GET" class="search-form">
                    <div class="search-input-wrapper">
                        <img src="{{ asset('images/search.png') }}" alt="Search" class="search-icon">
                        <input type="text" name="query" class="search-input"
                            placeholder="Search Product Name, Price">
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
                        <th>Price</th>
                        <th style="width: 50px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prices as $price)
                        <tr>
                            <td>{{ $price['name'] }}</td>
                            <td>{{ $price['price'] }}</td>
                            <td class="icon-col">
                                <a href="{{ route('prices.edit', $price['name']) }}" title="Edit">
                                    <img class="icon" src="{{ asset('images/edit.png') }}" alt="Edit">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection