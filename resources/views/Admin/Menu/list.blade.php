@extends('admin.main')

@section('content')
    @include('admin.arlet')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">STT</th>
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
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td><img src="{{ $item->hinhanh }}" width="150" height="150"></td>
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
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection