<?php
include '../../includes/connect.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Users</title>
</head>

<body>
    <table style="text-align:left;">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Admin</th>
        </tr>
        <?php
        $sql = 'SELECT * FROM users';
        $statement = $connection->prepare($sql);
        $statement->execute();

        $resultSet = $statement->get_result();
        foreach ($resultSet as $result) {
            echo '
                <tr>
                    <td>' . $result["id"] . '</td>
                    <td>' . $result["username"] . '</td>
                    <td>' . $result["email"] . '</td>
                    <td>' . $result["admin"] . '</td>
                    <td><a href="./edituser.php?user=' . $result["id"] . '">Edit User</a></td>
                    <td><a href="../../includes/removeuser.inc.php?user=' . $result["id"] . '">Remove User</a></td>
                </tr>
            ';
        }
        ?>
    </table>
</body>

</html>