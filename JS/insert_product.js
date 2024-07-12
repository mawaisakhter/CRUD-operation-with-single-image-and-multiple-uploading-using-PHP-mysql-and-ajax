$(document).ready(function() {
    $('#uploadButton').click(function(e) {
        e.preventDefault();
        var title = $('#title').val();
        var price = $('#price').val();
        var discount_price = $('#discount_price').val();
        var short_desc = $('#short_desc').val();
        // var status = $('#status').val();
        var long_desc = $('#summernote').val();

        var singleImage = $('#fileToUpload')[0].files[0];
        var multipleImages = $('#product_images')[0].files;

        var formData = new FormData();
        formData.append('title', title);
        formData.append('price', price);
        formData.append('discount_price', discount_price);
        formData.append('short_desc', short_desc);
        formData.append('long_desc', long_desc);
        // formData.append('status', status);

        formData.append('singleImage', singleImage);
        
        for (var i = 0; i < multipleImages.length; i++) {
            formData.append('multipleImages[]', multipleImages[i]);
        }

        $.ajax({
            url: '../Model/insert.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#message').html(response);
                // Clear input field
                $('#title').val('');
            },
            error: function() {
                $('#message').html('Error uploading product.');
            }
        });
    });
});
