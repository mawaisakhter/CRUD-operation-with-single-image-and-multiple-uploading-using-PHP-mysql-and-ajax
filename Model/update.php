<?php
include_once('db.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $title = $_POST['title'];
    $price = $_POST['price'];
    $discount_price = $_POST['discount_price'];
    $short_desc = $_POST['short_desc'];
    $long_desc = $_POST['long_desc'];

    try {
        $stmt = $pdo->prepare("UPDATE products SET title = '$name', price = '$price' where id= '$id'");
        $stmt->execute();
        echo "Data inserted successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
