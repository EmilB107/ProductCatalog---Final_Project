{{-- filepath: resources/views/categories/index.blade.php --}}
@extends('layouts.dashboard-layout')

@section('title', 'Categories')

@section('content')
    <section class="d-category">
        <div class="d-flex mb-3">
            <h1>Categories</h1>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Number of Products</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 3; $i++)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </section>
@endsection