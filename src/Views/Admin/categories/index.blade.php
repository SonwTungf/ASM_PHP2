@extends('layouts.master')
@section('title', 'categories')
@section('main')
    <h1 class="m-0">Danh sách Loai Hang</h1>
    </div>
    </div>
    </div>
    <div class="white_card_body">

        <a class="btn btn-primary" href="{{ url('admin/categories/create') }}">Thêm mới</a>
        <h5 class="welcome-text mt-5">So Luong danh sach La : {{ $totalRecords }} danh sach</h5>

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
                        <th>ACTION</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($categories as $categorie)
                        <tr>
                            <td><?= $categorie['id'] ?></td>
                            <td><?= $categorie['name'] ?></td>
                            <td>

                                <a class="btn btn-warning"
                                    href="{{ url('admin/categories/' . $categorie['id'] . '/edit') }}">Sửa</a>
                                <a class="btn btn-danger"
                                    href="{{ url('admin/categories/' . $categorie['id'] . '/delete') }}"
                                    onclick="return confirm('Chắc chắn xóa không?')">Xóa</a>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
    </div>
    </div>
    </div>

@endsection
