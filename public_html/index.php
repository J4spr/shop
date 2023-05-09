<?php
include '../includes/connect.inc.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<body>
    <div>
        <h1>Index</h1>
        <?php
        if(!isset($_SESSION["user"])){
            echo '
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
            ';
        } else{
            echo '<a href="../includes/logout.inc.php">Logout</a>';
        }
        ?>    
    
    </div>

    <?php
    $sql = 'SELECT * FROM products';
    $statement = $connection->prepare($sql);
    $statement->execute();

    $resultSet = $statement->get_result();

    if ($resultSet->num_rows <= 0) {
        echo '<p>No products in the store :/ ^-^</p>';
        return;
    }

    foreach ($resultSet as $result) {
        echo '
            <div style="display:inline-block;" class="product">
                <h3>' . $result["productname"] . '</h3>
                <img src="' . $result["image"] . '" alt="">
                <p>' . $result["description"] . '</p>
                <p>' . $result["price"] . '</p>
                <form action="index.php" method="post">
                    <input type="submit" value="Add to cart">
                </form>
            </div>
        ';
    }

    ?>
</body>

</html>