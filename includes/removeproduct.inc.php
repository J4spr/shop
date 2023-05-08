<?php
include './connect.inc.php';

$sql = 'DELETE FROM products WHERE id = ?';
$statement = $connection->prepare($sql);

$statement->bind_param('i', $_GET["product"]);
$statement->execute();

header('Location: ../public_html/admin/products.php');
