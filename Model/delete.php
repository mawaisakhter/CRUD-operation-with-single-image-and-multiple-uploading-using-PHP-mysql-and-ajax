<?php

    include_once ('connection.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['productId'])) {
        $productId = $_POST['productId'];
        // echo $productId;

        $stmt = $conn->prepare("DELETE FROM product_images WHERE product_id = ?");
        $stmt->execute([$productId]);

        $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$productId]);

        echo "Product deleted successfully.";
    } else {
        echo "Invalid request.";
    }
    
?>
