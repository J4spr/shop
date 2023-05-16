<?php
include '../../includes/connect.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/admin/tables.css">
    <link rel="stylesheet" href="../../assets/css/footer.css">
    <title>Admin index</title>
</head>

<body>
    <div class="container">
        <div class="navigation">
            <a href="./">Go back</a>
        </div>
        <div class="account">
        </div>
        <a href="../../includes/logout.inc.php">Logout</a>
        <div class="content-wrapper">
            <table style="text-align:left;">
                <tr>
                    <th>ID</th>
                    <th>Productname</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Description</th>
                </tr>
                <?php
                $sql = 'SELECT * FROM products';
                $statement = $connection->prepare($sql);
                $statement->execute();

                $resultSet = $statement->get_result();
                foreach ($resultSet as $result) {
                    echo '

            <tr>
                <td>' . $result["id"] . '</td>
                <td>' . $result["productname"] . '</td>
                <td>' . $result["image"] . '</td>
                <td>' . $result["price"] . '</td>
                <td>' . $result["description"] . '</td>
                <td class="edit">
                <a href="./editproduct.php?product=' . $result["id"] . '">Edit product</a>
                    <a href="../../includes/removeproduct.inc.php?product=' . $result["id"] . '">Remove Product</a>
                    </td>
            </tr>
            ';
                }
                ?>
            </table>
            <a href="./addproduct.php" style="margin-top: 10px;">Add product</a>
        </div>
    </div>
    <footer>
        <p>© 2023 - All rights reserved</p>
        <p>Created by: <a href="https://github.com/J4spr" target="blank">Jasper</a></p>
    </footer>
</body>

</html>