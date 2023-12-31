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
    @yield('content')



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
