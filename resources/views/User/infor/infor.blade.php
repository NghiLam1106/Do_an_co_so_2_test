@extends('User.main')

@section('content')
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <div class="flex-w flex-tr">
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <h4 class="mtext-105 cl2 txt-center p-b-30">
                    Thông tin
                </h4>

                <div class=" m-b-20 how-pos4-parent">
                    <center><img style="height: 140px; border-radius: 50%;" src="{{ Auth::user()->hinhanh }}" alt="ICON"></center>
                </div>
                
                <button style="margin-bottom: 20px" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" name="submit" type="submit">
                    <a href="/changeinfor/{{ Auth::user()->id }}" style="color: white">Thay đổi thông tin</a>
                </button>

                <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" name="submit" type="submit">
                    <a href="{{ route('logout') }}" style="color: white">Đăng xuất</a>
                </button>
            </div>

            <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                <div class="flex-w w-full p-b-42">

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Tên:
                        </span>

                        <p class="stext-115 cl6 size-213 p-t-18">
                            {{ Auth::user()->name }}
                        </p>
                    </div>
                </div>

                <div class="flex-w w-full p-b-42">

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Email
                        </span>

                        <p class="stext-115 cl1 size-213 p-t-18">
                            {{ Auth::user()->email }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection