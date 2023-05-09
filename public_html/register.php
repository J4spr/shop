<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/forms.css">
    <title>Register</title>
</head>

<body>
    <div class="form-wrapper">
        <form action="../includes/register.inc.php" method="post">
            <div class="input-wrapper">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Username" required>
            </div>

            <div class="input-wrapper">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Email" required>
            </div>

            <div class="input-wrapper">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>

            <div class="input-wrapper">
                <label for="repeat-password">Repeat password</label>
                <input type="password" name="repeat-password" id="repeat-password" placeholder="Repeat Password" required>
            </div>

            <input type="submit" value="Register">
        </form>
    </div>
</body>

</html>