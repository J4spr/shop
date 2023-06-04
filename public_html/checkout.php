<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/index.css">
    <title>Checkout</title>
</head>

<body>
    <div class="content-wrapper">
        <h1>Thank you for ordering something here!</h1>
        <div style="display: flex; gap: 20px;">
            <a href="../orders/<?php echo $_POST["invoicenumber"] ?>.pdf" target="_blank">Download</a>
            <a href="./index.php">Go back</a>
        </div>
    </div>
</body>

</html>