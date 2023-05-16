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
    <link rel="stylesheet" href="../../assets/css/nav.css">
    <link rel="stylesheet" href="../../assets/css/footer.css">
    <title>Admin - Users</title>
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
                        <td class="edit">
                    <a href="./edituser.php?user=' . $result["id"] . '">Edit User</a>
                        <a href="../../includes/removeuser.inc.php?user=' . $result["id"] . '">Remove User</a>
                    </td>
                    </tr>
            ';
                }
                ?>
            </table>
            <a href="./adduser.php">Add User
        </div>
    </div>
    <footer>
        <p>© 2023 - All rights reserved</p>
        <p>Created by: <a href="https://github.com/J4spr" target="blank">Jasper</a></p>
    </footer>
</body>

</html>