@extends('layouts.master')
@section('title', 'products')
@section('main')
<body>
    <h1>Chi tiết san pham: {{ $product['name'] }}</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Trường</th>
                <th>Giá trị</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($categories as $field => $value)
                <tr>
                    <td>{{ $field }}</td>
                    <td>{{ $value }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>

</html>

@endsection