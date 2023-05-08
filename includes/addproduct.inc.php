<?php
$sql = 'INSERT INTO products (productname, image, price, description) VALUES (?, ?, ?, ?)';
$statement = $connection->prepare($sql);

$statement->bind_param("ssis", $_POST["productname"], $_POST["price"], $_POST["image"], $_POST["description"]);
$statement->execute();

header('Location: ../public_html/admin/products.php');
?>