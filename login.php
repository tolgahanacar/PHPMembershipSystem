<?php
session_start();
require_once 'Settings/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
    <div>
    <label for="">Username or E-Mail</label>
    <input type="text" name="uore" id=""><br>
    <label for="">Password</label>
    <input type="password" name="pass" id=""><br>
    <input type="submit" value="Login" name="log">
    <a href="register.php"><input type="button" value="Register"></a>
    
    </div>
    </form>
</body>
</html>

<?php
if(isset($_POST['log'])){
    $uore = strip_tags(trim($_POST['uore']));
    $pass = strip_tags(trim(md5($_POST['pass'])));
    $Query = $VeriTabaniBaglantisi->query("SELECT * FROM users WHERE Username = '$uore' OR UEMail ='$uore' AND UPassword = '$pass'")->fetch();
    if($Query){
        $_SESSION['Username'] = $uore;
        echo "Login Successful";
        header("refresh:1 url=index.php");
    }else{
        echo "Username or password is incorrect";
    }
}
?>