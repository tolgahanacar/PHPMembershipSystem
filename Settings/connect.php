<?php
try{
    $db = new PDO("mysql:host=localhost;dbname=membershipsystem;charset=UTF8","tolga","123456");
}catch(PDOException $e){
    echo $e->getMessage();
    die();
}


?>