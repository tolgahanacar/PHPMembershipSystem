<?php

?>
<?php
function SessionControl(){
    if(isset($_SESSION['Username'])){

    }else{
        header("location:deactivesession.php");
    }
}
?>