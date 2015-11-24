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
    $("#cb-seen").on("change", function(){
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
});