@extends('admin.main')

@section('content')
    @include('admin.arlet')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên khách hàng</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>Ngày đặt hàng</th>
                <th style="width: 7%">Chi tiết</th>
                <th style="width: 5%">Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customer as $key => $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/Admin/Customer/infor/{{ $item->id }}">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm" href="/Admin/Customer/delete/{{ $item->id }}">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $customer->links() }}
    </div>
@endsection