<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Products Catalog</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        .product-list { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; }
        .product-card { border: 1px solid #ccc; padding: 15px; border-radius: 8px; }
        .product-card h3 { margin-top: 0; color: #333; }
        .product-card p { margin-bottom: 5px; color: #666; font-size: 0.9em; }
        .product-card .price { font-weight: bold; color: #007bff; font-size: 1.1em; }
    </style>
</head>
<body>
    <h1>Our Pet Products</h1>

    <div class="product-list">
        @forelse ($products as $product)
            <div class="product-card">
                <h3>{{ $product->name }}</h3>
                <p><strong>Category:</strong> {{ $product->category->name }}</p>
                <p><strong>SubCategory:</strong> {{ $product->subCategory->name }}</p>
                <p>{{ $product->description }}</p>
                <p class="price">Price: ${{ number_format($product->price, 2) }}</p>
            </div>
        @empty
            <p>No products found in the catalog.</p>
        @endforelse
    </div>
</body>
</html>