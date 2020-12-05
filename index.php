<?php
session_start();
require_once 'Settings/connect.php';
require_once 'Settings/functions.php';
SessionControl();
$id = $_SESSION['user'];
$query = $db->prepare("SELECT * FROM users WHERE id = :id");
$query->bindParam(":id", $id, PDO::PARAM_INT);
$query->execute();
$query2 = $query->fetchAll(PDO::FETCH_OBJ);
foreach($query2 as $data){
    $name       = $data->Name;
    $surname    = $data->Surname;
    $username   = $data->Username;
    $email      = $data->EMail;

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <div>
    <h2>Welcome, <?php echo $name." ".$surname;?> </h2>
    </div>
    <div>
    <a href="exit.php">Exit</a>
    </div>
</body>
</html>