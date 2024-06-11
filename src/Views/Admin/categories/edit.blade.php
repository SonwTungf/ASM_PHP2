@extends('layouts.master')
@section('title', 'products')
@section('main')

    <body>
        <h1>Cập nhật Loai Hang: {{ $product['name'] }}</h1>

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

        <form action="{{ url("admin/categories/{$categories['id']}/update") }}" enctype="multipart/form-data" method="POST">
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name"
                    value="{{ $product['name'] }}" name="name">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </body>
@endsection
