$(function() {
    $("#type-post").on("change", function(){
        var type = $(this).val().trim();
        if(type == 4) {
            $(".box-quote").show();
        }else {
            $(".box-quote").hide();
        }
    });

    //Switch status active post
    $("#cb-published").on("change", function(){
        var url = $(this).data('url');

        $.ajax({
            url: url,
            type: 'get',
            success: function(data) {
                if(data.error) {
                    alert('Quá trình cập nhật có lỗi.');
                }
            }
        });
    });

    //Switch status seen off seen
    $(".cb-seen").on("change", function(){
        var url = $(this).data('url');

        $.ajax({
            url: url,
            type: 'get',
            success: function(data) {
                if(data.error) {
                    alert('Quá trình cập nhật có lỗi.');
                }
            }
        });
    });

    //Delete post
    $(".delete-item").click(function(){
        var ok = confirm('Bạn chắc chắn muốn xóa ?');
        if(ok)
        {
            var url = $(this).data('url');
            $.ajax({
                url:url,
                type: 'get',
                success: function(data){
                    if(data.error){
                        alert('Thao tác xóa lỗi.');
                    } else{
                        location.reload();
                    }
                }
            });
        }
    });

    //all check message
    $("#all-check-message").click(function() {
        var ok = confirm("Bạn muốn duyệt toàn bộ tin nhắn ?");

        if(ok)
        {
            var url = $(this).data('url');
            $.ajax({
                url: url,
                type: 'get',
                success: function(data) {
                    if(data.error)
                    {
                        alert('Thao tác lỗi.');
                    } else {
                        $(".cb-seen").each(function(index, element) {
                            $(this).attr('checked', 'checked');
                        });
                    }
                } 
            });
        }
    });

    //all check user
    $("#check-all-user").click(function(){
        var ok = confirm('Bạn muốn duyệt toàn bộ người dùng ?');
        if(!ok)
            return false;
    });

    $("#check-all-comment").click(function() {
        var ok = confirm('Bạn muốn duyệt toàn bộ bình luận?');
        if(!ok)
            return false;
    });
});