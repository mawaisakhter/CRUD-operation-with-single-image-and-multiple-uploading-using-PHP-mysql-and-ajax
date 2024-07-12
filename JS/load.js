$(document).ready(function() {
    //Load Data 
    function getRecords() {
        $.ajax({
            url: "../Model/load.php",
            type: "post",
            success: function (response) {
                $("#records").html(response);
            },
        });
    }
    getRecords();
    $(document).on('click', '.deleteButton', function() {
        var productId = $(this).data('product-id');
        // console.log(productId)
        $.ajax({
            url: '../Model/delete.php',
            type: 'POST',
            data: { productId: productId },
            success: function(response) {
                $('#message').html(response);
                $('#row_' + productId).remove();
                getRecords();
            },
            error: function() {
                $('#message').html('Error deleting product.');
            }
        });
    });
    
});
