<?php
include_once ('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $discount_price = $_POST['discount_price'];
    $short_desc = $_POST['short_desc'];
    $long_desc = $_POST['long_desc'];

    $singleImage = $_FILES['singleImage'];
    $multipleImages = $_FILES['multipleImages'];

    $uploadDir = '../../file/main_image/';
    $singleImagePath = $uploadDir . basename($singleImage['name']);
    move_uploaded_file($singleImage['tmp_name'], $singleImagePath);

    $stmt = $conn->prepare("INSERT INTO products (title, price, discount_price, short_desc, long_desc, main_image) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$title, $price, $discount_price, $short_desc, $long_desc, $singleImagePath]);

    $productId = $conn->lastInsertId();
    $uploadDir2 = '../../file/mutliple_image/';

    foreach ($multipleImages['tmp_name'] as $key => $tmp_name) {
        $fileName = $uploadDir . basename($multipleImages['name'][$key]);
        move_uploaded_file($tmp_name, $fileName);
        
        $stmt = $conn->prepare("INSERT INTO product_images (product_id, image_path) VALUES (?, ?)");
        $stmt->execute([$productId, $fileName]);
    }

    echo "Product uploaded successfully.";
}
?>
