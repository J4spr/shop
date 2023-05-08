<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <form action="../includes/register.inc.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="Username" required>
        <br>
            
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Email" required>
        <br>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <br>

        <label for="repeat-password">Repeat password</label>
        <input type="password" name="repeat-password" id="repeat-password" placeholder="Repeat Password" required>
        <br>

        <input type="submit" value="Register">
    </form>
</body>

</html>