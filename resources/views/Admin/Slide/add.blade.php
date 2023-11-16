@extends('admin.main')

@section('content')
    @include('admin.arlet')
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="0">Danh mục</option>
                            @foreach ($infor as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Giá</label>
                        <input type="number" class="form-control" name="price">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Số lượng</label>
                        <input type="number" class="form-control" name="soluong">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label" for="inputSuccess">Mô tả chi tiết</label>
                <textarea type="text" class="form-control is-warning" id="content" name="content"></textarea>
            </div>
            <div class="form-group">
                <label class="col-form-label" for="inputError">Chọn ảnh sản phẩm</label>
                <input class="form-control form-control-sm" name="thumb" id="file" type="file" style="height: 35px">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        @csrf
    </form>
@endsection

