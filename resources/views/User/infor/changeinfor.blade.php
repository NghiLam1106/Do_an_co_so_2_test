@extends('User.main')

@section('content')
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <form action="/updateinfor" method="post">
            <div class="flex-w flex-tr">
                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        Thay đổi thông tin
                    </h4>
    
                    <div class=" m-b-20 how-pos4-parent">

                    </div>
                    
                    <button style="margin-bottom: 20px" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        <a href="/infor" style="color: white">Quay lại</a>
                    </button>
    
                    <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" name="submit" type="submit">
                        {{-- <a href="{{ route('updateinfor') }}" style="color: white">Xác nhận</a> --}}
                        Xác nhận
                    </button>
                </div>
    
                <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                    @include('User.alert')
                    <div class="flex-w w-full m-b-20">
    
                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">
                                Tên:
                            </span>
    
                            <div class="bor8 m-t-20 how-pos4-parent">
                                <input class="stext-111 cl2 plh3 size-116 p-l-20" type="text" name="name"
                                    placeholder="Nhập username" value="{{ Auth::user()->name }}">
                            </div>
                        </div>
                    </div>
    
                    <div class="flex-w w-full m-b-20">
    
                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">
                                Email:
                            </span>
    
                            <div class="bor8 m-t-20 how-pos4-parent">
                                <input class="stext-111 cl2 plh3 size-116 p-l-20" type="email" name="email"
                                    placeholder="Nhập email" value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                    </div>
    
                    <div class="flex-w w-full m-b-20">
    
                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">
                                Mật khẩu mới:
                            </span>
    
                            <div class="bor8 m-t-20 how-pos4-parent">
                                <input class="stext-111 cl2 plh3 size-116 p-l-20" type="password" name="password"
                                    placeholder="Nhập mật khẩu mới">
                            </div>
                        </div>
                    </div>
    
                    <div class="flex-w w-full m-b-20">
    
                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">
                                Nhập lại mật khẩu:
                            </span>
    
                            <div class="bor8 m-t-20 how-pos4-parent">
                                <input class="stext-111 cl2 plh3 size-116 p-l-20" type="password" name="confirmPassword"
                                    placeholder="Nhập lại mật khẩu">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @csrf
        </form>
    </div>
</section>
@endsection