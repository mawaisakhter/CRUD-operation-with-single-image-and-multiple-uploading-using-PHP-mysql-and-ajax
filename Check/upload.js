$(document).ready(function() {
    $('#uploadButton').click(function() {
        var productName = $('#productName').val();
        var singleImage = $('#singleImageFile')[0].files[0];
        var multipleImages = $('#multipleImageFiles')[0].files;

        var formData = new FormData();
        formData.append('productName', productName);
        formData.append('singleImage', singleImage);
        
        for (var i = 0; i < multipleImages.length; i++) {
            formData.append('multipleImages[]', multipleImages[i]);
        }

        $.ajax({
            url: 'upload.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#message').html(response);
            },
            error: function() {
                $('#message').html('Error uploading product.');
            }
        });
    });
});
