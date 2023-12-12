@extends('admin.main')

@section('content')
    @include('admin.arlet')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">STT</th>
                <th>Tên</th>
                <th>Hình ảnh</th>
                <th>Màu sắc</th>
                <th>Size</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Danh mục</th>
                {{-- <th style="width: 100px">&nbsp;</th> --}}
                <th style="width: 5%">Sửa</th>
                <th style="width: 5%">Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($infor as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->nameproduct }}</td>
                    <td><img src="{{ $item->hinhanhproduct }}" width="150" height="150"></td>
                    <td>{{ $item->mausac }}</td>
                    <td>{{ $item->size }}</td>
                    <td>{{ number_format($item->price)}} VNĐ</td>
                    <td>{{ $item->soluong }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/Admin/Product/edit/{{ $item->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm" href="/Admin/Product/delete/{{ $item->id }}">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-end" style="margin-right: 20px">
        {{ $infor->links() }}
    </div>
@endsection