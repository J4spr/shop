<?php
include './connect.inc.php';

$sql = 'DELETE FROM users WHERE id = ?';
$statement = $connection->prepare($sql);

$statement->bind_param('i', $_GET["user"]);
$statement->execute();

header('Location: ../public_html/admin/users.php');
?>