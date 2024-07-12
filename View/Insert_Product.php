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
        <h1 class="text-center my-3">Add New Product</h1> 
            <div class="row d-flex justify-content-center">
                <div class="col-sm-6 border h p-4 ">
                    <form>
                        <h3 class="text-center mt-3">Product</h3>
                        <div class="row mt-4">
                            <div class="form-group col">
                                <label for="titl">Product Title</label>
                                <input type="text" class="form-control" name="productName" id="title" placeholder="Enter Product Tilte" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group col">
                                <label for="price">Product Price</label>
                                <input type="number" class="form-control" name="price" id="price" placeholder="Enter the product Price">
                            </div>
                            <div class="form-group col">
                                <label for="discount_price">Discount</label>
                                <input type="number" class="form-control" name="discount_price" id="discount_price" placeholder="Enter discount on prodcut ">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group col">
                                <label for="short_desc">Short Description</label>                            
                                <textarea class="form-control" name="short_desc" id="short_desc"cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group col">
                                <label for="long_desc">Long Description</label>
                                <textarea name="long_desc" id="summernote"></textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group col">
                                <label for="fileToUpload">Main Image</label>
                                <input class="form-control" type="file" name="singleImage" id="fileToUpload">
                            </div>
                        </div>
                        <img class='card-img-top mt-2' id="preview" style='width:24%;'/>

                        <div class="row mt-3">
                            <div class="form-group col">
                                <label for="product_images">Multiple Images:</label>
                                <input type="file"  class="form-control" name="multipleImages"  id="product_images" multiple accept="image/*" >
                            </div>
                        </div>
                        <div class="row mt-5" id="image-preview-container"></div>
                        
                        <div class="row mt-3">
                            <div class="form-group col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="true" value="" id="status" />
                                    <label class="form-check-label" for="status">Status</label>
                                </div>                            
                            </div>
                        </div> 
                
                        <div class="row">
                            <div class="text-center mt-4 col">
                                <button class="btn btn-primary w-50"  id="uploadButton">Add Product</button>
                            </div>
                        </div>
                    </Form>
                </div>
            </div>
        </div>
    </div>
    <!-- <div id="message" type="hidden"></div> -->
    
    <script type="text/Javascript" src="../JS/Summer.js" ></script> 
    <script type="text/Javascript" src="../JS/insert_product.js"></script>
    <script type="text/Javascript" src="../JS/Main_Preview.js"></script>
    <script type="text/Javascript" src="../JS/Many_Preview.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>