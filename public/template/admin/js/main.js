$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url) {
    if (confirm("Bạn có muốn xóa danh mục này không?")) {
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: {id},
            url: url,
            success: function (result) {
                if (result.error === false) {
                    alert(result.message)
                    location.reload()
                }
                else {
                    alert("Xóa lỗi vui lòng thử lại")
                }
            }
        }) 
    }
}   

// Upload file 
$('#upload').change(function (){
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/Admin/Upload/Services',
        success: function (result) {
            if (result.error === false) {
                $('#img_show').html('<a href="'+ result.url +'" target="_blank"><img src="'+ result.url +'" style="width:100px;"></a>')
                $('#hinhanh').val(result.url)
            }
            else {
                alert('Upload file lỗi')
            }
        }
    })
});

$('#upload1').change(function (){
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/Upload/Services',
        success: function (result) {
            if (result.error === false) {
                $('#img_show').html('<a href="'+ result.url +'" target="_blank"><img src="'+ result.url +'" style="width:100px;"></a>')
                $('#hinhanh').val(result.url)
            }
            else {
                alert('Upload file lỗi')
            }
        }
    })
});

// Load more
function loadMore()
{
    const page = $('#page').val();
    $.ajax({
        type : 'POST',
        dataType : 'JSON',
        data : { page },
        url : '/Service/load-product',
        success : function (result) {
            if (result.html !== '') {
                $('#loadProduct').append(result.html);
                $('#page').val(page + 1);
            } else {
                $('#NoProduct').css('display', 'block');
                $('#button-loadMore').css('display', 'none');
            }
        }
    })
}

// Gửi bình luận
$('#send_comment').click(function (ev) {
    ev.preventDefault();
    let product_id = $('#comment_product_id').val();
    let comment_name = $('#comment_user_name').val();
    let comment_content = $('#comment').val();
    let comment_avatar = $('#hinhanh').val();
    let rating = $('#rating').val();
    let user_id = $('#user_id').val();
    console.log(rating)
    

    $.ajax({
        type: 'POST',
        data : { comment_product_id: product_id,
            comment_user_name: comment_name,
            comment: comment_content,
            comment_avatar: comment_avatar,
            rating: rating,
            user_id: user_id},
        url : '/SendComment',
        success : function (res) {
            if (res.error === false) {
                $('#comment').val('');
                $('#comment_user_name').val('');
                $('#comment_show').append(
                    '<div class="flex-w flex-t p-b-68">'+
                        '<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">'+
                            '<img src="'+res.hinhanh+'" alt="AVATAR">'+
                        '</div>'+

                        '<div class="size-207">'+
                            '<div class="flex-w flex-sb-m p-b-17" >'+
                                '<span class="mtext-107 cl2 p-r-20">'+
                                    res.comment_name+
                                '</span>'+

                                '<span class="fs-18 cl11">'+
                                    generateStarIcons(res.rating)+
                                '</span>'+
                            '</div>'+

                            '<p class="stext-102 cl6">'+
                                res.comment+
                            '</p>'+
                        '</div>'+
                    '</div>');
                    
                    function generateStarIcons(rating) {
                        var stars = '';
                        for (var i = 1; i <= 5; i++) {
                            if (i <= rating) {
                                stars += '<i class="zmdi zmdi-star" style="margin-right: 5px;"></i>';
                            } else {
                                stars += '<i class="zmdi zmdi-star-outline" style="margin-right: 5px;"></i>';
                            }
                        }
                        return stars;
                    }
            }
            else {
                alert('Không đăng bình luận được')
            }
        }
    })

})