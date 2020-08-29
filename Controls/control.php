<?php
require_once '../Settings/config.php';
?>

<?php
$username = strip_tags(trim($_POST['username']));
$name = strip_tags(trim($_POST['name']));
$surname =strip_tags(trim($_POST['surname']));
$email = strip_tags(trim($_POST['email']));
$password = strip_tags(trim(md5($_POST['password'])));
$repeatpassword = strip_tags(trim(md5($_POST['repeatpassword'])));
if($password==$repeatpassword){
    $Ekle = $VeriTabaniBaglantisi->query("INSERT INTO users (Username,UName,USurname,UEMail,UPassword) VALUES ('$username','$name','$surname','$email','$password')");
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