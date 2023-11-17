@extends('admin.main')

@section('content')
    @include('admin.arlet')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên</th>
                <th>Hình ảnh</th>
                {{-- <th style="width: 100px">&nbsp;</th> --}}
                <th style="width: 5%">Sửa</th>
                <th style="width: 5%">Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($infor as $key => $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td><img src="{{ $item->hinhanh }}" width="150" height="150"></td>
                </tr>
                <td>
                    <a class="btn btn-primary btn-sm" href="/Admin/Menu/edit/{{ $item->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a class="btn btn-danger btn-sm" href="/Admin/Menu/delete/{{ $item->id }}">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            @endforeach
        </tbody>
    </table>
@endsection