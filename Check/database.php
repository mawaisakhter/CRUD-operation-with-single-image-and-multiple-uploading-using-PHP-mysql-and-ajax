<?php

    $db_name = "mysql:host=;dbname=";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO($db_name, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo"Database is connected successfully";
    } catch (PDOException $error) {
        echo"Database is not Connected" . $error->getMessage();
    }
    
?>
