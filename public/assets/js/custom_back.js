$(function() {
    $("#type-post").on("change", function(){
        var type = $(this).val().trim();
        if(type == 4) {
            $(".box-quote").show();
        }else {
            $(".box-quote").hide();
        }
    });
});