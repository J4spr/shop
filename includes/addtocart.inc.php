<?php
include './connect.inc.php';
session_start();
// check if user is logged in
if (!(isset($_SESSION["user"]))) {
    header('Location: ../public_html/index.php');
    return;
}

// check if some value is set from post
if (!(isset($_POST["add-to-cart"]))) {
    header('Location: ../public_html/index.php');
    return;
}

// add to cart table or cart column (id, id, id) -> TEXT
// get user cart
$sql = 'SELECT * FROM users WHERE id = ?';
$statement = $connection->prepare($sql);
$statement->bind_param("i", $_SESSION["user"]);
$statement->execute();

$resultSet = $statement->get_result();
$result = $resultSet->fetch_assoc();
// check if user has something in cart
// if true, we get the existing cart array and add the new product id to it
$newCart = $_POST["productid"];

var_dump($result["cart"]);
if ($result["cart"] !== "") {
    // TODO: FIX
    $currentCart = trim($result["cart"], ",");
    
    $products = explode(",", $currentCart);
    $products[] = $_POST["productid"];
    
    $newCart = implode(",", $products);
}

// Update cart column in users table with the given ID
$sql = 'UPDATE users SET cart = ? WHERE id = ?';
$statement = $connection->prepare($sql);
$statement->bind_param("si", $newCart, $_SESSION["user"]);
$statement->execute();

header('Location: ../public_html/index.php');

// whenever we exist the if statement (or never entered it) we add the array to the database
