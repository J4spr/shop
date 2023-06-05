<?php
include '../includes/connect.inc.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="Content-Security-Policy" content="font-src 'self' https://kit.fontawesome.com/"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/nav.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/nav.css">
    <script src="https://kit.fontawesome.com/ae9ca7023f.js" crossorigin="anonymous"></script>
    <title>Index</title>
</head>

<body>
    <div class="container">
        <div class="navigation">
            <div class="logo">
                <h1><a href="./index.php">Index</a></h1> <!-- add a link to "logo" -->
            </div>
            <div class="links">
                <ul>
                    <li><a href="./cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li> <!-- make links-->
                    <!-- <li>Links 2</li> -->
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
                echo '<p>No products in the store :/</p>';
                return;
            }

            foreach ($resultSet as $result) {
                echo '
                    <div class="product">
                        <p>'        . $result["productname"] . '</p>
                        <img src="' . $result["image"] . '" alt="">
                        <p>'        . $result["description"] . '</p>
                        <p>'        . $result["price"] . '</p>
                        <form action="../includes/addtocart.inc.php" method="post">
                            <input type="hidden" name="productid" value="' . $result["id"] . '">
                            <input type="submit" name="add-to-cart" value="Add to cart">
                        </form>
                    </div>
                ';
            }

            ?>
            <!-- <div class="product">
                <h3>Minecaft</h3>
                <img src="https://pbs.twimg.com/media/FwGIEQ4WcAAigql.jpg" alt="">
                <div class="bottom">
                    <p></p>
                    <p>€30</p>
                    <form action="index.php" method="post">
                        <input type="submit" value="Add to cart">
                    </form>
                </div>
            </div> -->
        </div>
    </div>
</body>
<footer>
    <p>© 2023 - All rights reserved</p>
    <p>Created by: <a href="https://github.com/J4spr" target="blank">Jasper</a></p>
</footer>

</html>