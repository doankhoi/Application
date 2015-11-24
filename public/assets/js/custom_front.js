$(function() {
	$("#delete-photo-user").click(function() {
		$("#file-photo-user").val("");
		//$("#photo-user").attr('src', );
	});

	$("#file-photo-user").on('change', function() {
        var file = this.files[0];
        if(window.FileReader) {
            reader = new FileReader();
            reader.onloadend = function() {
                if(!file.type.match('/.*\.(jpg|png|gif|bmp|svg)/')) {
                    $("#photo-user").attr('src', reader.result);
                } else {
                    alert('Please select a image !');
                }
            };

            if(file) {
                reader.readAsDataURL(file);
            } else {
                alert('Please select file !');
            }
        } else {
            alert('Browser not support!');
        }
    });
});