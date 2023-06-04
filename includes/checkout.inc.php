<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/index.css">
    <title>Document</title>
</head>
<body>
    
    
    <?php
session_start();
include './connect.inc.php';
include './pdf.inc.php';

$user_id = $_SESSION['user'];
// if (!(isset($_POST['checkout']))) {
//     $user_id = $_SESSION['user'];
// }

// Retrieve the cart items for the current user
$sql = "SELECT * FROM users WHERE id = ?";
$statement = $connection->prepare($sql);
$statement->bind_param("i", $user_id);
$statement->execute();
$resultSet = $statement->get_result();
$userResult = $resultSet->fetch_assoc();

if ($resultSet->num_rows === 0) {
    echo 'No products in the cart :/';
    return;
}

$order_id = uniqid("ORDER_");
$total_price = 0;

$productIdArray = explode(",", $userResult["cart"]);
$productsCount = array_count_values($productIdArray);

$products_info = array();
$total = 0;

foreach ($productsCount as $product => $quantity) {
    $sql = "SELECT * FROM products WHERE id = ?";
    $statement = $connection->prepare($sql);
    $statement->bind_param("i", $product);
    $statement->execute();
    $resultSet = $statement->get_result();
    $result = $resultSet->fetch_assoc();

    $product_info = array(
        "id" => $product,
        "name" => $result["productname"],
        "image" => $result["image"],
        "price" => $result["price"],
        "quantity" => $quantity
    );

    $total += $result["price"] * $quantity;

    array_push($products_info, $product_info);
}

generateInvoicePDF($userResult["username"], $order_id, Date("Y-m-d"), $products_info, $total);
?>
</body>
</html>