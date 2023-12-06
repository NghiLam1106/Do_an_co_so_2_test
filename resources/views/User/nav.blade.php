<!-- Header desktop -->
<div class="container-menu-desktop">
    <!-- Topbar -->
    <div class="wrap-menu-desktop" style="top: 0;">
        <nav class="limiter-menu-desktop container">

            <!-- Logo desktop -->
            <a href="/home" class="logo">
                <img src="/template/source_web/images/icons/logo-01.png" alt="IMG-LOGO">
            </a>

            <!-- Menu desktop -->
            <div class="menu-desktop">
                <ul class="main-menu">
                    <li>
                        <a href="/home">TRANG CHỦ</a>
                    </li>

                    <li>
                        <a href="{{ route('cuahang') }}">CỬA HÀNG</a>
                    </li>

                    <li>
                        <a href="{{ route('about') }}">VỀ COZA STORE</a>
                    </li>

                    <li>
                        <a href="{{ route('contact') }}">LIÊN HỆ</a>
                    </li>
                </ul>
            </div>

            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m">
                <div name="search" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                    <i class="zmdi zmdi-search"></i>
                </div>

                @php
                    if (is_null(Session::get('carts'))) {
                        $productQuantity = 0;
                    } else if (Auth::check()){
                        $productQuantity = count(Session::get('carts'));
                    }
                    else {
                        $productQuantity = 0;
                    }
                @endphp

                <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{ $productQuantity  }}">
                    <i class="zmdi zmdi-shopping-cart"></i>
                </div>

                @if (Auth::check())
                    <a href="/infor" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 ">
                        <i class="zmdi zmdi-account"></i>
                    </a>
                @else
                    <a href="/login" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 ">
                        <i class="zmdi zmdi-account"></i>
                    </a>
                @endif
            </div>
        </nav>
    </div>
</div>

<!-- Header Mobile -->
<div class="wrap-header-mobile">
    <!-- Logo moblie -->
    <div class="logo-mobile">
        <a href="/home"><img src="/template/source_web/images/icons/logo-01.png" alt="IMG-LOGO"></a>
    </div>

    <!-- Icon header -->
    <div class="wrap-icon-header flex-w flex-r-m m-r-15">
        <div name="search" class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
            <i class="zmdi zmdi-search"></i>
        </div>

        @php
            if (is_null(Session::get('carts'))) {
                $productQuantity = 0;
            } else {
                $productQuantity = count(Session::get('carts'));
            }
        @endphp


        <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
            <i class="zmdi zmdi-shopping-cart"></i>
        </div>

        @if (Auth::check())
            <a href="/infor" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 ">
                <i class="zmdi zmdi-account"></i>
            </a>
        @else
            <a href="/login" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 ">
                <i class="zmdi zmdi-account"></i>
            </a>
        @endif
        
    </div>

    <!-- Button show menu -->
    <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
        <span class="hamburger-box">
            <span class="hamburger-inner"></span>
        </span>
    </div>
</div>


<!-- Menu Mobile -->
<div class="menu-mobile">

    <ul class="main-menu-m">
        <li>
            <a href="/home">TRANG CHỦ</a>
        </li>

        <li>
            <a href="{{ route('cuahang') }}">Cửa hàng</a>
        </li>

        <li>
            <a href="about.html">About</a>
        </li>

        <li>
            <a href="contact.html">Liên hệ</a>
        </li>
    </ul>
</div>

<!-- Modal Search -->
<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
    <div class="container-search-header">
        <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
            <img src="/template/source_web/images/icons/icon-close2.png" alt="CLOSE">
        </button>

        <form class="wrap-search-header flex-w p-l-15">
            <button class="flex-c-m trans-04">
                <i class="zmdi zmdi-search"></i>
            </button>
            <input class="plh3" type="text" name="search" placeholder="Search...">
        </form>
    </div>
</div>
