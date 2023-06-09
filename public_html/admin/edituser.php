<?php
include '../../includes/connect.inc.php';
if (!(isset($_GET["user"]))) {
    header('Location: ./users.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/forms.css">
    <title>Admin - Edit User</title>
</head>

<body>
    <?php
    $sql = 'SELECT * FROM users WHERE id = ?';
    $statement = $connection->prepare($sql);

    $statement->bind_param('i', $_GET["user"]);
    $statement->execute();

    $resultSet = $statement->get_result();
    $result = $resultSet->fetch_assoc();

    ?>
    <div class="form-wrapper">
        <form action="../../includes/edituser.inc.php" method="post">
            <div class="input-wrapper">
                <label for="id">ID</label>
                <input type="text" value="<?php echo $result["id"] ?>" name="id" id="id" readonly>
            </div>

            <div class="input-wrapper">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="<?php echo $result["username"] ?>" required>
            </div>

            <div class="input-wrapper">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php echo $result["email"] ?>" required>
            </div>

            <label for="admin">Admin</label>
            <select name="admin" id="admin">
                <option value="1" <?php echo $result["admin"] == 1 ? "selected" : "" ?>>Yes</option>
                <option value="0" <?php echo $result["admin"] == 0 ? "selected" : "" ?>>No</option>
            </select>
            <br>

            <input type="submit" name="edit-user" value="Edit">
        </form>
    </div>
</body>

</html>