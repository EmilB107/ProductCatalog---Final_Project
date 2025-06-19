@extends('layouts.dashboard-layout')

@section('title', 'Edit Price')

@section('content')
    <section class="d-prices-edit">
        <div class="d-flex mb-3">
            @include('partials._return', ['route' => 'prices.index'])
            <h1 class="mx-auto">Edit Price</h1>
        </div>
        <div class="table-responsive">
            <form>
                <table class="table table-bordered text-center align-middle">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $price['name'] }}</td>
                            <td>
                                <input type="number" name="price" class="form-control text-center" value="{{ $price['price'] }}">
                            </td>
                            <td>
                                <a href="#" onclick="this.closest('form').submit(); return false;">Save</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </section>
@endsection