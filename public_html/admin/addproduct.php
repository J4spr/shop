<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/forms.css">
    <title>Admin - Add product</title>
</head>

<body>
    <div class="form-wrapper">
        <form action="../../includes/addproduct.inc.php" method="post" enctype="multipart/form-data">
            <div class="input-wrapper">
                <label for="productname">Product Name</label>
                <input type="text" name="productname" id="productname">
            </div>

            <div class="input-wrapper">
                <label for="image">Image</label>
                <input type="text" name="image" id="image">
            </div>

            <div class="input-wrapper">
                <label for="price">Price</label>
                <input type="text" name="price" id="price">
            </div>

            <div class="input-wrapper">
                <label for="description">Description</label>
                <input type="text" name="description" id="description">
            </div>

                <input type="submit" name="edit-product" value="Edit">
        </form>
    </div>
</body>

</html>