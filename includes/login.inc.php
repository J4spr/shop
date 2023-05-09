<?php
include './connect.inc.php';

$username = $_POST["username"];
$password = $_POST["password"];

// Check if username is already made
$sql = 'SELECT * FROM users WHERE username = ?';
$statement = $connection->prepare($sql);

$statement->bind_param("s", $username);
$statement->execute();

$resultSet = $statement->get_result();

if ($resultSet->num_rows < 0) {
    header('Location: ../public_html/login.php?error=wrongcredentials');
    return;
}

// Verify password with hashed password
$result = $resultSet->fetch_assoc();

$hashedPassword = $result["password"];
$checkPassword = password_verify($_POST["password"], $hashedPassword);

// == check if value is same
// === check if value & type is same
if ($checkPassword === false) {
    header('Location: ../public_html/login.php?error=wrongcredentials');
    return;
}

if ($result["admin"] === 1) {
    header('Location: ../public_html/admin/index.php?success=loggedin');
    return;
}

session_start();
$_SESSION["user"] = $result["id"];
header('Location: ../public_html/index.php?success=loggedin');
