$(document).ready(function() {

    $(document).on('click', '.deleteButton', function() {
        var productId = $(this).data('product-id');
        console.log(productId)
        $.ajax({
            url: '../Model/delete.php',
            type: 'POST',
            data: { productId: productId },
            success: function(response) {
                // Display success message
                $('#message').html(response);
                // Remove the deleted row from the table
                $('#row_' + productId).remove();
            },
            error: function() {
                // Display error message
                $('#message').html('Error deleting product.');
            }
        });
    });
});
