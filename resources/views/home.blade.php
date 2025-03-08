<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Selamat Datang Di Halaman Home</h1>
    <nav>
        <ul>
            <li><a href="{{ route('products.food-beverage') }}">Food & Beverage</a></li>
            <li><a href="{{ route('products.beauty-health') }}">Beauty & Health</a></li>
            <li><a href="{{ route('products.home-care') }}">Home Care</a></li>
            <li><a href="{{ route('products.baby-kid') }}">Baby & Kid</a></li>
            <li><a href="{{ route('sales.index') }}">Sales</a></li>
        </ul>
    </nav>
</body>
</html>