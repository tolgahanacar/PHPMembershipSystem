<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="Controls/control.php" method="post">
    <div>
    <label for="">Username</label>
    <input type="text" name="username" id="" required><br>
    <label for="">Name</label>
    <input type="text" name="name" id="" required><br>
    <label for="">Surname</label>
    <input type="text" name="surname" id="" required><br>
    <label for="">E-Mail</label>
    <input type="email" name="email" id="" required><br>
    <label for="">Password</label>
    <input type="password" name="password" id="" required><br>
    <label for="">Repeat Password</label>
    <input type="password" name="repeatpassword" id="" required><br>
    <input type="submit" value="Register" name="register">
    <a href="login.php"><input type="button" value="Login"></a>
    </div>
    </form>
</body>
</html>