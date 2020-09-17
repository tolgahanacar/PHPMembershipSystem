<?php

?>
<?php
function SessionControl(){
    if(isset($_SESSION['USER'])){

    }else{
        header("location:deactivesession.php");
    }
}
?>