@extends('layouts.master')
@section('title', 'products')
@section('main')
    <h1 class="m-0">Danh sách Product</h1>
    </div>
    </div>
    </div>
    <div class="white_card_body">

        <a class="btn btn-primary" href="{{ url('admin/products/create') }}">Thêm mới</a>
        <h5 class="welcome-text mt-5">So Luong san pham La : {{ $totalRecords }} san pham</h5>
        @if (isset($_SESSION['status']) && $_SESSION['status'])
            <div class="alert alert-success">
                {{ $_SESSION['msg'] }}
            </div>

            @php
                unset($_SESSION['status']);
                unset($_SESSION['msg']);
            @endphp
        @endif

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>IMAGE</th>
                        <th>NAME PRODUCT</th>
                        <th>PRICE REGULAR</th>
                        <th>PRICE SALE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($products as $product)
                        <tr>
                            <td><?= $product['id'] ?></td>
                            <td>
                                <img src="{{ url($product['img_thumbnail']) }}" alt="" width="100px";height="50px">
                            </td>
                            <td><?= $product['name'] ?></td>
                            <td><?= $product['price_regular'] ?></td>
                            <td><?= $product['price_sale'] ?></td>

                            <td>

                                <a class="btn btn-info"
                                    href="{{ url('admin/products/' . $product['id'] . '/show') }}">Xem</a>

                                <a class="btn btn-warning"
                                    href="{{ url('admin/products/' . $product['id'] . '/edit') }}">Sửa</a>

                                <a class="btn btn-danger" href="{{ url('admin/products/' . $product['id'] . '/delete') }}"
                                    onclick="return confirm('Chắc chắn xóa không?')">Xóa</a>

                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
            <li>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item {{ $page == 1 ? 'disabled' : '' }}">

                        </li>
                        @for ($i = 1; $i <= $totalPage; $i++)
                            <li class="page-item {{ $i == $page ? 'active' : '' }}">
                                <a class="page-link" href="{{ url('admin/products?page=' . $i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="page-item {{ $page == $totalPage ? 'disabled' : '' }}">

                        </li>
                    </ul>
                </nav>
            </li>
        </div>

    </div>
    </div>
    </div>
    </div>

@endsection
