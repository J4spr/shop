<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/forms.css">
    <title>Login</title>
</head>

<body>
    <div class="form-wrapper">
        <form action="../includes/login.inc.php" method="post">
            <div class="input-wrapper">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
            </div>

            <div class="input-wrapper">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                <label for="showpasswordbutton">show password</label>
                <input type="checkbox" onclick="showPasswd()" name="showpassword" id="showpasswdbutton">
            </div>

            <input type="submit" value="login">
        </form>
    </div>
</body>

</html>