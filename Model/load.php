<?php
    include_once('../Model/connection.php');     
    $stmt = $conn->prepare("SELECT * FROM products");
    $stmt->execute();
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($items) {
        $output = '';
        foreach ($items as $product) {
            $output .='<tr>';
            $output .='<th>'.$product['id'].'</th>';
            $output .='<td>'.$product['title'].'</td>';
            $output .='<td>'.$product['price'].'</td>';
            $output .='<td>'.$product['short_desc'].'</td>';
            $output .='<td><img style="width:50px; height:50px" src="'.$product['main_image'].'"/></td>';
            $output .='<td><a href="../View/product_details.php?id='.$product['id'].'" class="view btn btn-success">View</a></td>';
            $output .='<td><a href="../View/update_product.php?id='.$product['id'].'" class="btn btn-primary btn-sm">Edit</a></td>';
            $output .= '<td><button data-product-id="'. $product['id'] . '" class="deleteButton btn btn-danger">Delete</button></td>';
            $output .= '</tr>';
            }
        echo $output;
        } else {
            echo "No records found";
        }
?>
