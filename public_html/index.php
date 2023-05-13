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
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <title>Index</title>
</head>

<body>
    <div class="container">
        <div class="navigation">
            <div class="logo">
                <h1>Index</h1> <!-- add a link to "logo" -->
            </div>
            <div class="links">
                <ul>
                    <li>Links 1</li> <!-- make links -->
                    <li>Links 2</li>
                </ul>
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
                    <a href="../includes/logout.inc.php">Logout</a>
                    ';
                }
                ?>
            </div>
        </div>

        <div class="products">
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
                    <div class="product">
                        <h3>' . $result["productname"] . '</h3>
                        <img src="' . $result["image"] . '" alt="">
                        <p>' . $result["description"] . '</p>
                        <p>' . $result["price"] . '</p>
                        <form action="../" method="post">
                            <input type="submit" value="Add to cart">
                        </form>
                    </div>
                ';
            }

            ?>
            <div class="product">
                <h3>Minecaft</h3>
                <img src="https://i.imgur.com/f53T9TK.png" alt="">
                <div class="bottom">
                    <p></p>
                    <p>€30</p>
                    <form action="index.php" method="post">
                        <input type="submit" value="Add to cart">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    <p>© 2023 - All rights reserved</p>
    <p>Created by: <a href="https://github.com/J4spr" target="blank">Jasper</a></p>
</footer>

</html>