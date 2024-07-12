<?php

    $id = $_GET['id'];
    include_once('../Model/connection.php');

    $stmt = $conn->prepare('SELECT * FROM products WHERE id = :id');
    $stmt->execute(array(':id' => $id));
    $product = $stmt->fetch();

    $stmt = $conn->prepare("SELECT * FROM product_images WHERE product_id='$id'");
	$stmt->execute();
	$images = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <!-- Summernote CSS and JS  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script> 
    <title>Crud Operation</title> 
</head>
<body>
 
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-6 border h p-4 ">
                <form action="" method="POST" enctype="multipart/form-data">
                    <h3 class="text-center mt-3">Edit Product</h3>
                    <div class="row mt-4">
                        <div class="form-group col">
                            <label for="title">Product Title</label>
                            <input type="text" class="form-control" value="<?php echo $product['title'] ?>" name="title" id="title" placeholder="Enter Product Tilte">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="form-group col">
                            <label for="price">Product Price</label>
                            <input type="number" class="form-control" value="<?php echo $product['price'] ?>" name="price" id="price" placeholder="Enter the product Price">
                        </div>
                        <div class="form-group col">
                            <label for="discount_price">Discount</label>
                            <input type="number" class="form-control" value="<?php echo $product['discount_price'] ?>" name="discount_price" id="discount_price" placeholder="Enter discount on prodcut ">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="form-group col">
                            <label for="short_desc">Short Description</label>
                            <textarea class="form-control" name="short_desc" cols=40 rows=3> <?php echo $product['short_desc'] ; ?></textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="form-group col">
                            <label for="long_desc">Long Description</label>
                            <textarea id="summernote" name="long_desc"><?php echo $product['long_desc']; ?></textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="form-group col">
                            <label for="fileToUpload">Upload Image</label>
                            <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
                        </div>
                    </div>
                    <img class='card-img-top mt-2' id="preview" src="<?php echo $product['main_image']; ?>" style='width:24%;'/>

                    <div class="row mt-3">
                        <div class="form-group col">
                            <label for="product_images">Multiple Images:</label>
                            <input type="file"  class="form-control" name="product_images[]" id="product_images" multiple accept="image/*" >
                        </div>
                    </div>                    
                    <div class="row mt-5" id="image-preview-container" ></div>
                    <div class="row mt-3">
                        <div class="container">
                            <div class="row row-cols-1 row-cols-sm-4 row-cols-md-6">
                                <?php foreach ($images as $user) {?>
                                    <div class="col py-2">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" onclick='<?="confirmDelete(\"{$user['id']}\")'"?>' class="close" data-dismiss="modal" aria-label="Close">&times;
                                                </button>
                                            </div>
                                        <!-- <div class="modal-body"> -->
                                                <img style="height:60px;  margin-le 20px; width:60px;"src="../../Crud/Model/<?php echo $user['image_path'];?>" alt="Product Image">
                                        <!-- </div> -->
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="form-group col">
                            <div class="form-check">
                                <input class="form-check-input"<?php if ($product['status'] == 1) {echo"checked";}?> type="checkbox" name="true" value="" id="" />
                                <label class="form-check-label" for=""> Status </label>
                            </div>                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="text-center mt-4 col">
                            <button type="submit" class="btn btn-primary w-50" name="submit">Update Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>   
    <script type="text/Javascript" src="../JS/Summer.js" ></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>