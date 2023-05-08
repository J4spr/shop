<?php
include '../../includes/connect.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin index</title>
</head>

<body>
    <a href=""></a>
    <table>
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
                <td>' . $result["description"] . '</td>
                <td><a href="./editproduct.php?product=' . $result["id"] . '">Edit product</a></td>
                <td><a href="../../includes/removeproduct.inc.php?product=' . $result["id"] . '">Remove Product</a></td>
            </tr>
            ';
        }   
        ?>
    </table>
</body>

</html>