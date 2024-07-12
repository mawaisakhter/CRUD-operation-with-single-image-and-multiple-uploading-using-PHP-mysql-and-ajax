<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Crud Operation</title>
</head>
<body>
    <h1 class="text-center my-3">CRUD Operation in PHP with Ajax</h1>
        <div class="container">
            <a href="../View/Insert_Product.php" class="btn btn-dark my-4">Add New Product</a>
            <table class="table table-hover">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Produt Name</th>
                        <th scope="col">Produt Price</th>
                        <th scope="col">Short description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                        <th scope="col">Action</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="records"></tbody>
            </table>
        </div>
        <div id="message"></div>

    <script type="text/Javascript" src="../JS/jquery.js" ></script>
    <script type="text/Javascript" src="../JS/load.js"></script>
    <!-- <script type="text/Javascript" src="../JS/delete.js"></script> -->
</body>
</html>