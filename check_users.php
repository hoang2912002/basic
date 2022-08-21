<?php 
session_start();
if(empty($_SESSION['id'])){
    header("location:index.php");
    exit;
}
?>
<?php
    if(isset($_SESSION['success'])){
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
?>