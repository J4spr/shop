<?php
include './connect.inc.php';
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$repeatPassword = $_POST["repeat-password"];

// Check if username is already taken
$sql = 'SELECT * FROM users WHERE username = ?';
$statement = $connection->prepare($sql);

$statement->bind_param("s", $username);
$statement->execute();

$resultSet = $statement->get_result();

if ($resultSet->num_rows > 0) {
    header('Location: ../admin/adduser.php?error=usernameExists');
    return;
}


// Check if email is already taken
$sql = 'SELECT * FROM users WHERE email = ?';
$statement = $connection->prepare($sql);

$statement->bind_param("s", $email);
$statement->execute();

$resultSet = $statement->get_result();

if ($resultSet->num_rows > 0) {
    header('Location: ../public_html/register.php?error=emailTaken');
    return;
}

if ($password !== $repeatPassword) {
    header('Location:../public_html/register.php?error=passwordMatch');
    return;
}


// Create new user
$sql = 'INSERT INTO users (username, email, password) VALUES (?, ?, ?)';
$statement = $connection->prepare($sql);

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$statement->bind_param("sss", $username, $email, $hashedPassword);
$statement->execute();

header('Location: ../public_html/login.php?success=accountCreated');
return;
?>