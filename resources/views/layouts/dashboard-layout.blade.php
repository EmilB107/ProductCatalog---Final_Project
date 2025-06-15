<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Arf & Meow Co.')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Arf & Meow Co.</a>
            <!-- Other navbar content -->
        </div>
    </nav>

    <div class="container-fluid d-flex">
        <!-- Sidebar -->
        <aside class="sidebar bg-light">
            <ul>
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('products.index') }}">Products</a></li>
                <li><a href="#">Orders</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="flex-grow-1 p-4">
            @yield('content') <!-- Page-specific content will be injected here -->
        </main>
    </div>
</body>
</html>
