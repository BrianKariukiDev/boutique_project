<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ $category->name }} Product Leaflets</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            padding: 20px;
            line-height: 1.6;
        }

        h1 {
            color: #3490dc;
        }

        .product {
            margin-bottom: 30px;
            border-bottom: 1px dashed #ccc;
            padding-bottom: 20px;
        }

        img {
            max-width: 150px;
            display: block;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <h1>{{ $category->name }} - Product Leaflet</h1>

    @foreach ($products as $product)
        <div class="product">
@php
    $imagePath = public_path('storage/products/' . $product->images[0]);
@endphp

@if(file_exists($imagePath))
    <img src="file://{{ $imagePath }}" alt="{{ $product->name }}" style="width: 200px;">
@else
    <p>Image not found</p>
@endif


            <h2 style="color: #2c3e50;">ProductID:{{ $product->id }}</h2>
            <h2>{{ $product->name }}</h2>
            <p><strong>Description:</strong> {{ $product->description ?? 'Be open to shop with us.' }}</p>
            <p><strong>Price:</strong>{{ Number::currency($product->sale_price, 'KSHS') }}</p>


        </div>
    @endforeach

    <footer style="margin-top: 40px; font-size: 0.9rem; color: #888;">
        Generated on {{ now()->toDayDateTimeString() }}
    </footer>
</body>

</html>
