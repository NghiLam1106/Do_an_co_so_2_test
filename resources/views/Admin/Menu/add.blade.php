@extends('admin.main')

@section('head')
    {{-- <script src="/ckeditor/ckeditor.js"></script> --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
@endsection

@section('content')
    @include('admin.arlet')
    <form method="post" action="" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Tên danh mục</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name">
            </div>

            <div class="form-group">
                <label class="col-form-label" for="inputError">Chọn ảnh danh mục</label>
                <input class="form-control form-control-sm" id="upload" type="file" style="height: 35px">
                <div id="img_show">

                </div>
                <input type="hidden" name="hinhanh" id="hinhanh">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
