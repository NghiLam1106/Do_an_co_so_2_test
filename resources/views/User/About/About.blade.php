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
        @if (Auth::check())
        <div class="wrap-header-cart js-panel-cart">
            @include('User.cart')
        </div>
        @endif


        <!-- Title page -->
        <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('template/source_web/images/bg-01.jpg');">
            <h2 class="ltext-105 cl0 txt-center">
                About
            </h2>
        </section>


        <!-- Content page -->
        <section class="bg0 p-t-75 p-b-120">
            <div class="container">
                <div class="row p-b-148">
                    <div class="col-md-7 col-lg-8">
                        <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                            <h3 class="mtext-111 cl2 p-b-16">
                                Câu chuyện của chúng tôi
                            </h3>

                            <p class="stext-113 cl6 p-b-26">
                                Khách hàng rất quan trọng, khách hàng sẽ được khách hàng theo đuổi. Trên thực tế, ông không phải là tác giả của môn bóng rổ đại chúng. Một khối bệnh tật nhưng ghét. Mọi người ở phương tiện đều hạ cánh, nhưng không hề tuyên truyền. Và khi loài Orc được sinh ra, những ngọn núi sẽ sinh ra những chiếc lông vũ và những chiếc cựa lớn, và một con chuột lố bịch sẽ được sinh ra. Maecenas là một người đàn ông có nhiều sở thích khác nhau và các thành viên trong gia đình anh đều sợ bài tập về nhà. Trẻ em đang sống với bệnh tật, tuổi già và trẻ em, đang phải chịu cảnh đói nghèo. Maecenas đang mang thai chỉ là eu arcu egestas convallis. Không cần phải uống rượu, vì người ta nói rằng anh cần thời gian. Cho đến lúc đó, nó không phải là sản phẩm của cuộc sống hay sự thăng tiến. Điện thoại thông minh Diam cũng vậy. Cho đến khi có nước sốt món tortor euismod, nó cần có đường kính dễ dàng trong cổ họng và Bệnh tật theo thời gian.
                            </p>

                            <p class="stext-113 cl6 p-b-26">
                                Cho đến khi mang thai, chúng ta sẽ luôn có nước sốt ngon. Anh ấy cần một cái túi lớn. Một số thành viên có một số tài trợ. Là một trường sinh thái trong xe. Bài tập về nhà và y tế của trẻ khi mang bầu. Đó là một ngày cuối tuần. Cho đến khi mũi tên dễ bắn, các thành viên của đội bóng đá đã bị bắn tên. Ngay cả những đứa trẻ, những người lớn hay những người trang điểm nói trên, và không chỉ những người yêu thích, hay các nhà phát triển đều có thể trở thành một món salad. Nhưng lớp trang điểm, lớp nền được làm sao cho thuận tiện, như bản thân thung lũng mong muốn, và điều quan trọng nhất là phải nhỏ và nhỏ.
                            </p>

                            <p class="stext-113 cl6 p-b-26">
                                Có câu hỏi nào không? Hãy cho chúng tôi biết tại cửa hàng tại 470 Đ. Trần Đại Nghĩa, Khu đô thị, Ngũ Hành Sơn, Đà Nẵng
                                điện vào số 0774944182
                            </p>
                        </div>
                    </div>

                    <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                        <div class="how-bor1 ">
                            <div class="hov-img0">
                                <img src="template/source_web/images/about-01.jpg" alt="IMG">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="order-md-2 col-md-7 col-lg-8 p-b-30">
                        <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                            <h3 class="mtext-111 cl2 p-b-16">
                                Nhiệm vụ của chúng tôi
                            </h3>

                            <p class="stext-113 cl6 p-b-26">
                                Mauris không phải là một con lacinia tuyệt vời. Nhưng viên thuốc cũng không gây đau. Vestibulum rhoncus dignissim risus, nhưng nó phải được tuân theo. Trẻ em đang sống với bệnh tật, tuổi già và trẻ em, đang phải chịu cảnh đói nghèo. Không có mauris vĩ đại, mà chỉ có sự căm ghét thung lũng, trong sự rung chuyển của lực hấp dẫn lớn lao. Nhưng bây giờ đã đến lúc nhân viên của tôi phải rời đi. Tôi ghét cuộc sống hoạt hình. Pellentesque ac velit egestas, luctus arcu non, laoreet mauris. Nhưng đồng thời, kết quả lại là sự đáng ghét trước mặt hãng hàng không. Khi còn trẻ, những ngày cuối tuần trong các thành viên, không hề ghét cổng. Hiện tại, chiếc bình của cuộc đời tôi là tiền đình của tôi, và trong đó không có chất độc. Nhưng trước khi mang thai. Tác giả thuần khiết nhất ở hồ euismod vĩ đại nhất. Khối vulputate Pellentesque như nisl hendrerit, cần một yếu tố mục tiêu tự do.
                            </p>

                            <div class="bor16 p-l-29 p-b-9 m-t-22">
                                <p class="stext-114 cl6 p-r-40 p-b-11">
                                    Sự sáng tạo chỉ là kết nối mọi thứ. Khi bạn hỏi những người sáng tạo xem họ đã làm điều gì đó như thế nào, họ cảm thấy hơi tội lỗi vì họ thực sự không làm điều đó mà họ chỉ nhìn thấy điều gì đó. Nó dường như rõ ràng với họ sau một thời gian.
                                </p>

                                <span class="stext-111 cl8">
                                    - Steve Job’s
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                        <div class="how-bor2">
                            <div class="hov-img0">
                                <img src="template/source_web/images/about-02.jpg" alt="IMG">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



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
