<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Add product</title>
</head>
<body>
    <form action="../../includes/addproduct.inc.php" method="post">
        <label for="productname">Product Name</label>
        <input type="text" name="productname" id="productname">
        <br>

        <label for="image">Image</label>
        <input type="text" name="image" id="image">
        <br>

        <label for="price">Price</label>
        <input type="text" name="price" id="price">
        <br>

        <label for="description">Description</label>
        <input type="text" name="description" id="description">
        <br>

        <input type="submit" name="edit-product" value="Edit">
    </form>
</body>
</html>