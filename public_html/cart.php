<?php
include '../includes/connect.inc.php';
session_start();
if (!(isset($_SESSION["user"]))) {
    header('Location: ./index.php');
    return;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/nav.css">
    <title>Cart</title>
</head>

<body>
    <div class="container">
        <div class="navigation">
            <div class="logo">
                <h1>Cart</h1> <!-- add a link to "logo" -->
            </div>
            <div class="links">
                <!-- <ul>
                    <li>Links 1</li> <!-- make links 
                    <li>Links 2</li>
                </ul> -->
            </div>
            <div class="account">
                <?php
                if (!isset($_SESSION["user"])) {
                    echo '
                    <a href="./login.php">Login</a>
                    <a href="./register.php">Register</a>
                    ';
                } else {
                    echo '
                    <a href="./index.php">Go back</a>
                    <a href="../includes/logout.inc.php">Logout</a>
                    <a href="./cart.php">Cart</a>
                    ';
                }
                ?>
            </div>
        </div>
        <?php
        $sql = 'SELECT * FROM orders WHERE id = ?';
        $statement = $connection->prepare($sql);
        if (!$statement) {
            echo "Error preparing statement: " . $connection->error;
        } else {
            $statement->bind_param('i', $id);
            $statement->execute();
            // ...
        }

        $resultSet = $statement->get_result();
        $result = $resultSet->fetch_assoc();

        if ($result["cart"] === "") {
            echo 'No products';
        } else {
            $products = explode(",", $result["cart"]);
            $productsCount = array_count_values($products);

            foreach ($productsCount as $product => $quantity) {
                $sql = 'SELECT * FROM products WHERE id = ?';
                $statement = $connection->prepare($sql);
                $statement->bind_param("i", $product);
                $statement->execute();

                $resultSet2 = $statement->get_result();
                $result2 = $resultSet->fetch_assoc();
            }
        }
        ?>
    </div>

</body>

</html>