<?php
include './connect.inc.php';

$sql = 'UPDATE users SET username = ?, email = ?, admin = ? WHERE id = ?';
$statement = $connection->prepare($sql);

$statement->bind_param("ssii", $_POST["username"], $_POST["email"], $_POST["admin"], $_POST["id"]);
$statement->execute();

header('Location: ../public_html/admin/users.php');
