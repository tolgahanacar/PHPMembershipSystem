<?php
session_start();
require_once 'Settings/config.php';
include 'Functions/function.php';
SessionControl();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <?php $user = $_SESSION['USER']; ?>
    <?php echo "Welcome"." "."<b>".$user."</b>";?>
    <?php $Query = $VeriTabaniBaglantisi->prepare("SELECT * FROM users WHERE UEMail = '$user'"); 
    $Query->execute();
    $Data=$Query->fetchAll(PDO::FETCH_OBJ);
    ?>
    <h3>Info ;</h3>
    <?php foreach($Data as $Datas){?>
    <p><b>Username : </b><?php echo $Datas-> Username; ?></p>
    <p><b>Name : </b><?php echo $Datas-> UName; ?></p>
    <p><b>Surname : </b><?php echo $Datas-> USurname; ?></p>
    <p><b>E-Mail : </b><?php echo $Datas-> UEMail; ?></p>
    <p><b>Register Date : </b><?php echo $Datas-> RegisterDate; ?></p>
    <?php }?>
    
    <a href="logout.php">Exit</a>

</body>
</html>