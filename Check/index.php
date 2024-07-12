<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Product</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2>Upload Product</h2>
    <input type="text" id="productName" placeholder="Product Name">
    <input type="file" id="singleImageFile">
    <input type="file" id="multipleImageFiles" multiple>
    <button id="uploadButton">Upload</button>
    <div id="message"></div>

    <script src="upload.js"></script>
</body>
</html>
