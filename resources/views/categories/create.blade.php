@extends('layouts.dashboard-layout')

@section('title', 'Create Category')

@section('content')
    <section class="d-category-create">
        <div class="d-flex mb-3">
            @include('partials._return', ['route' => 'categories.index'])
            <h1 class="mx-auto">Create Category</h1>
        </div>
        <div class="card mx-auto p-4">
            <form>
                <div class="mb-4">
                    <label class="form-label">Category Name</label>
                    <div class="position-relative">
                        <select class="form-control">
                            <option selected disabled>Choose Category</option>
                            <option>Electronics</option>
                            <option>Home Appliances</option>
                            <option>Toys</option>
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
                    <input type="text" class="form-control" placeholder="Write Sub Category Name">
                </div>
                <div class="text-end">
                    <button type="submit">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
