<!DOCTYPE html>
<html lang="en">

<head>
    @include('User.head')
</head>

<body class="animsition">

    <!-- Header -->
    <header class="header-v4">
        @include('User.nav')
    </header>

    <!-- Cart -->
    <div class="wrap-header-cart js-panel-cart">
        @include('User.cart')
    </div>


    <!-- Content page -->
    <div class="bg0 m-t-23 p-b-140">
        <div class="container">
            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">

                    <a href="/cuahang" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5"
                        style="cursor: pointer;">
                        Tất cả sản phẩm
                    </a>
                    @include('User.alert')
                    @foreach ($infor as $item)
                        <a href="/cuahang/{{ $item->id }}-{{ Str::slug($item->name) }}.html" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5"
                            style="cursor: pointer;">
                            {{ $item->name }}
                        </a>
                    @endforeach
                    {{-- <a href="cuahang/{{ $infor_product->id }}-{{ Str::slug($infor_product->name) }}.html" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5"
                        style="cursor: pointer;">
                        {{ $infor_product->name }}
                    </a> --}}

                </div>

                <div class="flex-w flex-c-m m-tb-10">
                    <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                        <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                        <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Lọc
                    </div>

                    <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                        <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                        <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Tìm kiếm
                    </div>
                </div>

                <!-- Search product -->
                <div class="dis-none panel-search w-full p-t-10 p-b-15">
                    <form class="bor8 dis-flex p-l-15">
                        <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>

                        <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search"
                            placeholder="Tìm kiếm">
                    </form>
                </div>

                <!-- Filter -->
                <div class="dis-none panel-filter w-full p-t-10">
                    <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Sort By
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <a href="{{ request()->url() }}" class="filter-link stext-106 trans-04">
                                        Mặc định
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="{{ request()->fullUrlWithQuery(['price' => 'asc']) }}"
                                        class="filter-link stext-106 trans-04">
                                        Giá thấp đến cao
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="{{ request()->fullUrlWithQuery(['price' => 'desc']) }}"
                                        class="filter-link stext-106 trans-04">
                                        Giá cao đến thấp
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="filter-col3 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Màu sắc
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #222;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="{{ request()->fullUrlWithQuery(['mausac' => 'Đen']) }}" class="filter-link stext-106 trans-04">
                                        Đen
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="{{ request()->fullUrlWithQuery(['mausac' => 'Xanh dương']) }}" class="filter-link stext-106 trans-04">
                                        Xanh dương
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="{{ request()->fullUrlWithQuery(['mausac' => 'Xám']) }}" class="filter-link stext-106 trans-04">
                                        Xám
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="{{ request()->fullUrlWithQuery(['mausac' => 'Xanh lá']) }}" class="filter-link stext-106 trans-04">
                                        Xanh lá
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="{{ request()->fullUrlWithQuery(['mausac' => 'Đỏ']) }}" class="filter-link stext-106 trans-04">
                                        Đỏ
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: pink;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="{{ request()->fullUrlWithQuery(['mausac' => 'Hồng']) }}" class="filter-link stext-106 trans-04">
                                        Hồng
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
                                        <i class="zmdi zmdi-circle-o"></i>
                                    </span>

                                    <a href="{{ request()->fullUrlWithQuery(['mausac' => 'Trắng']) }}" class="filter-link stext-106 trans-04">
                                        Trắng
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Sort By
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <a href="{{ request()->url() }}" class="filter-link stext-106 trans-04">
                                        Mặc định
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="{{ request()->fullUrlWithQuery(['price' => '1']) }}"
                                        class="filter-link stext-106 trans-04">
                                        Dưới 200,000
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="{{ request()->fullUrlWithQuery(['price' => '2']) }}"
                                        class="filter-link stext-106 trans-04">
                                        200,000 - 300.000
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="{{ request()->fullUrlWithQuery(['price' => '3']) }}"
                                        class="filter-link stext-106 trans-04">
                                        300,000 - 400.000
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div id="loadProduct">
                @if (count($infor_product) > 0)
                    @include('User.Product.list2')
                @else
                    <h3 class="text-center">Không tồn tại sản phẩm</h3>
                @endif
            </div>
        </div>
    </div>



    <!-- Footer -->
    <footer class="bg3 p-t-75 p-b-32">
        @include('User.footer')
    </footer>


    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>

    @include('User.script')

</body>

</html>
