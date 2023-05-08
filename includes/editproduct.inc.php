<?php
include './connect.inc.php';

$sql = 'UPDATE products SET productname = ?, image = ?, price = ?, description = ? WHERE id = ?';
$statement = $connection->prepare($sql);

$statement->bind_param("ssisi", $_POST["productname"], $_POST["image"], $_POST["price"], $_POST["description"], $_POST["id"]);
$statement->execute();

header('Location: ../public_html/admin/products.php');
