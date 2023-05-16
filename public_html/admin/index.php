<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/footer.css">
    <link rel="stylesheet" href="../../assets/css/admin/index.css">
    <link rel="stylesheet" href="../../assets/css/ad">
    <title>Admin Index</title>
</head>

<body>
    <div class="account">
     <a href="../../includes/logout.inc.php">Logout</a>
        <div class="content">
            <a href="./users.php">Users</a>
            <a href="./products.php">Products</a>
            <a href="./orders.php">Orders</a>
        </div>
        <footer>
            <p>© 2023 - All rights reserved</p>
            <p>Created by: <a href="https://github.com/J4spr" target="blank">Jasper</a></p>
        </footer>
</body>

</html>