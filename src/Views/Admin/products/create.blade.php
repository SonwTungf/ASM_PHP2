@extends('layouts.master')
@section('title', 'products')
@section('main')

    <body>
        <h1>Thêm mới san pham</h1>

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

        <form action="{{ url('/admin/products/') }}" enctype="multipart/form-data" method="POST">
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
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>
            <div class="mb-3 mt-3">
                <label for="img_thumbnail" class="form-label">thumbnail:</label>
                <input type="file" class="form-control" id="img_thumbnail" placeholder="Enter img_thumbnail"
                    name="img_thumbnail">
            </div>
            <div class="mb-3 mt-3">
                <label for="price_regular" class="form-label">price:</label>
                <input type="price_regular" class="form-control" id="price_regular" placeholder="Enter price_regular"
                    name="price_regular">
            </div>
            <div class="mb-3 mt-3">
                <label for="price_sale" class="form-label">price sale:</label>
                <input type="price_sale" class="form-control" id="price_sale" placeholder="Enter price_sale"
                    name="price_sale">
            </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </body>

    </html>
@endsection
