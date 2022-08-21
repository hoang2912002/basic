sada
<?php
    require '../check_admin.php';
    require '../connect.php';
    $id = $_GET['id'];
    $sql = "delete from customers where id = '$id'";
    mysqli_query($connect,$sql);
    mysqli_close($connect);
    header("location:../root/index.php?page4=index");
