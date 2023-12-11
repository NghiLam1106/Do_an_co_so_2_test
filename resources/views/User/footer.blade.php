<div class="container">
    <div class="row">
        <div class="col-sm-6 col-lg-3 p-b-50">
            <h4 class="stext-301 cl0 p-b-30">
                Danh mục
            </h4>

            <ul>
                @foreach ($menus as $item)
                    <li class="p-b-10">
                        <a href="/cuahang/{{ $item->id }}-{{ Str::slug($item->name) }}.html" class="stext-107 cl7 hov-cl1 trans-04">
                            {{ $item->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="col-sm-6 col-lg-3 p-b-50">
            <h4 class="stext-301 cl0 p-b-30">
                Liên hệ chúng tôi
            </h4>

            <p class="stext-107 cl7 size-201">
                Nếu có bất kì câu hỏi nào? Hãy liên hệ chúng tôi tại địa chỉ 470 Đ. Trần Đại Nghĩa, Khu đô thị, Ngũ Hành Sơn, Đà Nẵng or call us
                on (+84) 774944182
            </p>

            <div class="p-t-27">
                <a href="https://www.facebook.com/lam.nghi.5855" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                    <i class="fa fa-facebook"></i>
                </a>

                <a href="https://www.instagram.com/chinh_nghi/" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                    <i class="fa fa-instagram"></i>
                </a>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3 p-b-50">
            
        </div>

        <div class="col-sm-6 col-lg-3 p-b-50">
            <h4 class="stext-301 cl0 p-b-30">
                Đăng ký
            </h4>

            <form>
                <div class="wrap-input1 w-full p-b-4">
                    <input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email"
                        placeholder="email@example.com">
                    <div class="focus-input1 trans-04"></div>
                </div>

                <div class="p-t-18">
                    <button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                        Đăng ký
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
