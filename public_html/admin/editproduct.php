<?php
include '../../includes/connect.inc.php';
if (!(isset($_GET["product"]))) {
    header('Location: ./products.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Edit Product</title>
</head>

<body>
    <?php
    $sql = 'SELECT * FROM products WHERE id = ?';
    $statement = $connection->prepare($sql);

    $statement->bind_param('i', $_GET["product"]);
    $statement->execute();

    $resultSet = $statement->get_result();
    $result = $resultSet->fetch_assoc();
    ?>
    <form action="../../includes/editproduct.inc.php" method="post">
        <label for="id">ID</label>
        <input type="text" value="<?php echo $result["id"] ?>" name="id" id="id" readonly>
        <br>

        <label for="productname">Product Name</label>
        <input type="text" value="<?php echo $result["productname"] ?>" name="productname" id="productname">
        <br>

        <label for="image">Image</label>
        <input type="text" value="<?php echo $result["image"] ?>" name="image" id="image">
        <br>

        <label for="price">Price</label>
        <input type="text" value="<?php echo $result["price"] ?>" name="price" id="price">
        <br>

        <label for="description">Description</label>
        <input type="text" value="<?php echo $result["description"] ?>" name="description" id="description">
        <br>

        <input type="submit" name="edit-product" value="Edit">
    </form>
</body>

</html>