<?php
session_start();
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
    <title>Login</title>
</head>
<body>
    <div>
    <form action="" method="post">
    <div>
    <label for="">Username or E-Mail</label><br>
    <input type="text" name="user" id="user">
    </div>
    <div>
    <label for="Password">Password</label><br>
    <input type="password" name="pass" id="pass">
    </div>
    <input type="submit" value="Login" name="log">
    </form>
    </div>
</body>
<?php
if(isset($_POST['log'])){
    $user = Security($_POST['user']);
    $pass = Security($_POST['pass']);
    
    if(empty($user) || empty($pass)){
        echo "Please do not leave any space!";
        die();
    }


    $pass2 = md5($pass);
    $status = 1;
    $query = $db->prepare("SELECT * FROM users WHERE Username = :user or EMail = :user AND Pass = :pass AND Status = :status");
    $query->bindParam(":user", $user, PDO::PARAM_STR);
    $query->bindParam(":pass", $pass2, PDO::PARAM_STR);
    $query->bindParam(":status", $status, PDO::PARAM_STR);
    $query->execute();
    $count = $query->rowCount();
    if($count>0){
        $query2 = $query->fetchAll(PDO::FETCH_OBJ);
        foreach($query2 as $item){
            $id = $item->id;
        }
        echo "Login Successful";
        $_SESSION['user'] = $id;
        header("refresh:1;url=index.php");
    }else{
        echo "Username or Password is false";
        die();
    }

}
?>
</html>