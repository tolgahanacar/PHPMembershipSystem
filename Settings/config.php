<?php
try{
    $VeriTabaniBaglantisi = new PDO("mysql:host=localhost;dbname=gittolgahan;charset=UTF8;","tolga","123456");
}catch(PDOException $ErrorMessage){
    echo "Connection to database failed!";
    echo "Error Description"." ".$ErrorMessage->getMessage();
    die();
}
?>