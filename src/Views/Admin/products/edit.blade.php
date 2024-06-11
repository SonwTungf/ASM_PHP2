@extends('layouts.master')
@section('title', 'products')
@section('main')

    <body>
        <h1>Cập nhật san pham: {{ $product['name'] }}</h1>

        @if (!empty($_SESSION['errors']))
            <div class="alert alert-warning">
                <ul>
                    @foreach ($_SESSION['errors'] as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

                @php
                    unset($_SESSION['errors']);
                @endphp
            </div>
        @endif

        <form action="{{ url("admin/products/{$product['id']}/edit") }}" enctype="multipart/form-data" method="POST">
            <div class="mb-3 mt-3">
                <label for="category_id" class="form-label">category:</label>
                <select id="category_id"name="category_id" class="form-select" >
                    @foreach ($categories as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" value="{{ $product['name'] }}"
                    name="name">
            </div>
            <div class="mb-3 mt-3">
                <label for="img_thumbnail" class="form-label">thumbnail:</label>
                <input type="file" class="form-control" id="img_thumbnail" placeholder="Enter img_thumbnail" name="img_thumbnail">
                <img src="{{ url($product['img_thumbnail']) }}" alt="" width="100px">
            </div>
            <div class="mb-3 mt-3">
                <label for="price_regular" class="form-label">PRICE REGULAR:</label>
                <input type="price_regular" class="form-control" id="price_regular" placeholder="Enter price_regular"
                    value="{{ $product['price_regular'] }}" name="price_regular">
            </div>
            <div class="mb-3 mt-3">
                <label for="PRICE_SALE" class="form-label">price sale:</label>
                <input type="PRICE_SALE" class="form-control" id="PRICE_SALE" placeholder="Enter PRICE_SALE"
                    value="{{ $product['PRICE_SALE'] }}" name="PRICE_SALE">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </body>
@endsection
