<?php
require_once '../Settings/config.php';
?>

<?php
$username = htmlspecialchars(strip_tags(trim($_POST['username'])));
$name     = htmlspecialchars(strip_tags(trim($_POST['name'])));
$surname  = htmlspecialchars(strip_tags(trim($_POST['surname'])));
$email    = htmlspecialchars(strip_tags(trim($_POST['email'])));
$password = htmlspecialchars(strip_tags(trim(md5($_POST['password']))));
$repeatpassword = htmlspecialchars(strip_tags(trim(md5($_POST['repeatpassword']))));
if($password==$repeatpassword){
    $Ekle = $VeriTabaniBaglantisi->prepare("INSERT INTO users (Username,UName,USurname,UEMail,UPassword) VALUES ('$username','$name','$surname','$email','$password')");
    $Ekle->execute();
    $Say  = $Ekle->rowCount();
    if($Ekle){
        echo "Registration Successful";
        header("refresh:1; url=../login.php");
        $VeriTabaniBaglantisi = null;
    }else{
        echo "Registration Failed!";
    }
}else{
    echo "Passwords Do Not Match!"."<br>";
    header("refresh:1 url=../register.php");
}
?>