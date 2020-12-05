<?php
require_once 'Settings/connect.php';
require_once 'Settings/functions.php';
SessionControl2();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <div>
        <form action="" method="post">
            <div>
                <label for="Name">Name</label><br>
                <input type="text" name="name" id="name">
            </div>
            <div>
                <label for="Surname">Surname</label><br>
                <input type="text" name="surname" id="surname">
            </div>
            <div>
                <label for="Username">Username</label><br>
                <input type="text" name="username" id="username">
            </div>
            <div>
                <label for="EMail">E-Mail</label><br>
                <input type="email" name="email" id="email">
            </div>
            <div>
                <label for="Password">Password</label><br>
                <input type="password" name="pass" id="pass">
            </div>
            <div>
                <label for="Repeat Password">Repeat Password</label><br>
                <input type="password" name="repeatpass" id="repeatpass">
            </div>
            <input type="submit" value="Register" name="reg">
        </form>
    </div>
</body>

<?php
if(isset($_POST['reg'])){
    $name           = Security($_POST['name']);
    $surname        = Security($_POST['surname']);
    $username       = Security($_POST['username']);
    $email          = Security($_POST['email']);
    $pass           = Security($_POST['pass']);
    $repeatpass     = Security($_POST['repeatpass']);

    if(empty($name) || empty($surname) || empty($username) || empty($email) || empty($pass) || empty($repeatpass)){
        echo "Please do not leave any space!";
        die();
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "It doesn't meet the e-mail criteria!";
        die();
    }

    if($pass!=$repeatpass){
        echo "Passwords don't match";
        die();
    }

    $pass2  = md5($pass);
    $status = 1;

    $insert = $db->prepare("INSERT INTO users (Name,Surname,Username,EMail,Pass,RegisterDate,RegisterTime,Status) VALUES (:name, :surname, :username, :email, :pass, :regdate, :regtime, :status)");
    $insert->bindParam(":name", $name, PDO::PARAM_STR);
    $insert->bindParam(":surname", $surname, PDO::PARAM_STR);
    $insert->bindParam(":username", $username, PDO::PARAM_STR);
    $insert->bindParam(":email", $email, PDO::PARAM_STR);
    $insert->bindParam(":pass", $pass2, PDO::PARAM_STR);
    $insert->bindParam(":regdate", $Date, PDO::PARAM_STR);
    $insert->bindParam(":regtime", $Time, PDO::PARAM_STR);
    $insert->bindParam(":status", $status, PDO::PARAM_INT);
    $insert->execute();
    if($db->lastInsertId()){
        echo "Successful";
        header("refresh:1;url=login.php");
    }else{
        echo "Error!";
        die();
    }


}
?>

</html>