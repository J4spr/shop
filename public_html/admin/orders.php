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
    <title>Orders</title>
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
                    <th>User</th>
                    <th>Products</th>
                    <th>status</th>
                    <th>PDF</th>
                    <th>Date Added</th>
                </tr>
                <?php
                $sql = 'SELECT * FROM orders';
                $statement = $connection->prepare($sql);
                $statement->execute();

                $resultSet = $statement->get_result();
                foreach ($resultSet as $result) {
                    echo '
                    <tr>
                        <td>' . $result["id"] . '</td>
                        <td>' . $result["user"] . '</td>
                        <td>' . $result["products"] . '</td>
                        <td>' . $result["status"] . '</td>
                        <td>' . $result["pdf"] . '</td>
                        <td>' . $result["dateadded"] . '</td>
                    </tr>
                        ';
                }
                ?>
            </table>
        </div>
    </div>
    <footer>
        <p>© 2023 - All rights reserved</p>
        <p>Created by: <a href="https://github.com/J4spr" target="blank">Jasper</a></p>
    </footer>
</body>

</html>