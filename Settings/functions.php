<?php
date_default_timezone_set('Europe/Istanbul');

function Security($Deger){
    $BoslukSil      = trim($Deger);
    $TaglariTemizle = strip_tags($BoslukSil);
    $EtkisizYap     = htmlspecialchars($TaglariTemizle,  ENT_QUOTES);
    $Sonuc          = $EtkisizYap;
    return $Sonuc;
}

$Date              	=     date('d.m.Y');
$Time               =     date('H:i:s');


function SessionControl(){
    if(!isset($_SESSION['user'])){
        header("location:login.php");
    }
}

function SessionControl2(){
    if(isset($_SESSION['user'])){
        header("location:index.php");
    }
}

?>