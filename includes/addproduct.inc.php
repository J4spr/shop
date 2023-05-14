<?php
include './connect.inc.php';
// if (isset($_FILES["fileToUpload"])){
//     $fileName = $_FILES['image']['name'];
    
//     $fileSize = $_FILES['image']['size'];
    
//     $fileType = $_FILES['image']['type'];
    
//     $fileTmp = $_FILES['image']['tmp_name'];
    
    
//     $allowed_types = array('image/jpeg', 'image/png', 'image/gif');
//     if(in_array($fileType, $allowed_types)){
//         $target_dir = "../uploads/";
//         $target_file = $target_dir . basename($fileName);
//         move_uploaded_file($fileTmp, $target_file);
        $sql = 'INSERT INTO products (productname, price, image, description) VALUES (?, ?, ?, ?)';
        var_dump($sql);
        $statement = $connection->prepare($sql);
        $statement->bind_param("ssss", $_POST["productname"], $_POST["price"], $_POST["image"], $_POST["description"]);
        $statement->execute();
    // }   
// }
$connection->close();
header('Location: ../public_html/admin/products.php');
