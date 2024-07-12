<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['productName'];
    $singleImage = $_FILES['singleImage'];
    $multipleImages = $_FILES['multipleImages'];

    // Upload single image
    $uploadDir = '../../file/main_image/';
    $singleImagePath = $uploadDir . basename($singleImage['name']);
    move_uploaded_file($singleImage['tmp_name'], $singleImagePath);

    // Insert product name and single image path into products table
    $stmt = $conn->prepare("INSERT INTO products (title, main_image) VALUES (?, ?)");
    $stmt->execute([$productName, $singleImagePath]);

    // Get the product ID
    $productId = $conn->lastInsertId();
    $uploadDir2 = '../../file/mutliple_image/';
    // Upload multiple images
    foreach ($multipleImages['tmp_name'] as $key => $tmp_name) {
        $fileName = $uploadDir . basename($multipleImages['name'][$key]);
        move_uploaded_file($tmp_name, $fileName);
        
        // Insert each image path into product_images table
        $stmt = $conn->prepare("INSERT INTO product_images (product_id, image_path) VALUES (?, ?)");
        $stmt->execute([$productId, $fileName]);
    }

    echo "Product uploaded successfully.";
}
?>
