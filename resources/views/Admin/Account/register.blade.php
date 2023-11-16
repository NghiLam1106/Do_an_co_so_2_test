@extends('User.main')

@section('content')
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <div class="flex-w flex-tr justify-content-center">
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                @include('User.alert')
                <form action="" method="post"  enctype="multipart/form-data">
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        Đăng ký
                    </h4>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="name"
                            placeholder="Nhập username">
                            <i class="how-pos4 pointer-none zmdi zmdi-account-o zmdi-hc-2x" ></i>
                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email"
                            placeholder="Nhập email">
                            <i class="how-pos4 pointer-none zmdi zmdi-email zmdi-hc-2x" ></i>
                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password"
                            placeholder="Nhập mật khẩu">
                            <i class="how-pos4 pointer-none zmdi zmdi-lock zmdi-hc-2x"></i>
                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="confirmPassword"
                            placeholder="Nhập xác nhận mật khẩu">
                            <i class="how-pos4 pointer-none zmdi zmdi-lock zmdi-hc-2x"></i>
                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" style="padding: 10px;" id="upload1" type="file">
                        <div id="img_show" style="margin-left: 10px;">

                        </div>
                        <input type="hidden" name="hinhanh" id="hinhanh">
                    </div>

                    <div class="flex-w w-full p-b-42">

                        <div class="size-212 p-t-2" style="margin-left: 20px">
                            <span class="mtext-110 cl2">
                                <a href="/login" style="color: black">Bạn đã có tài khoản ?</a>
                            </span>
                        </div>
                    </div>

                    <button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        Đăng ký
                    </button>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
