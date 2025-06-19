@extends('layouts.dashboard-layout')

@section('title', 'Edit Category')

@section('content')
    <section class="d-category-edit">
        <div class="d-flex mb-3">
            @include('partials._return', ['route' => 'categories.index'])
            <h1 class="mx-auto">Edit Category</h1>
        </div>
        <div class="card mx-auto p-4">
            <form>
                <div class="mb-4">
                    <label class="form-label">Category Name</label>
                    <div class="position-relative">
                        <select class="form-control">
                            <option>Lorem Ipsum</option>
                            <option>Electronics</option>
                            <option>Home Appliances</option>
                        </select>
                        <span>
                            <svg viewBox="0 0 24 24">
                                <polygon points="6,9 12,15 18,9" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label">Sub Category Name</label>
                    <input type="text" class="form-control" value="Lorem Ipsum">
                </div>
                <div class="text-end">
                    <button type="submit">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
