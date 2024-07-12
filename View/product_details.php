<?php
    include_once('../Model/connection.php');
    $id = $_GET['id'];
    
    $stmt = $conn->prepare("SELECT * FROM products WHERE id='$id'");
	$stmt->execute();
	$products = $stmt->fetchAll();

    $stmt = $conn->prepare("SELECT * FROM product_images WHERE product_id='$id'");
	$stmt->execute();
	$images = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    
<!-- <h2><a href="../View/index.php">Home Page</a></h2> -->

    <?php
    foreach($products as $product) {
       
        echo"<div class='container mt-3 border-primary'>";
            echo"<h2>Product View Page</h2>";
            echo"<div class='card' style='width:400px'>";
                echo"<img class='card-img-top' style='width:100%;' src='".$product['main_image']."'/>";
                echo"<div class='card-body'>";
                echo"<h4 class='card-title'>Product id: ".$product['id']."</h4>";
                    echo"<h4 class='card-title'>Product Name: ".$product['title']."</h4>";
                    echo"<p class='card-text'>Price: ".$product['price']."</p>";
                    echo"<p class='card-text'>Discount: ".$product['discount_price']."</p>";
                    echo"<p class='card-text'>".$product['short_desc']."</p>";
                    echo"<p class='card-text'>Details: ".$product['long_desc']."</p>";
                    echo"<p class='card-text'>Status: ".$product['status']."</p>";
                    echo"<p class='card-text'>Add Product time: ".$product['created_at']."</p>";
                    echo"<p class='card-text'>Update Last time:  ".$product['updated_at']."</p>";
            echo"</div>";
        echo"</div>";
    echo"</div>";
    }
    ?>
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-4 row-cols-md-3">
            <?php foreach ($images as $image) {?>
                <div class="col py-2">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" onclick='<?="confirmDelete(\"{$image['id']}\")'"?>' class="close" data-dismiss="modal" aria-label="Close">
                                &times;
                            </button>
                        </div>
                        <!-- <div class="modal-body"> -->
                            <img style="height:160px;  margin-left: 25px; width:210px;"src="../Model/<?php echo $image['image_path'];?>" alt="Product Image">
                        <!-- </div> -->
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

</body>
</html>