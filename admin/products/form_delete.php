<?php
$id =$_GET['id'];
require '../connect.php';
$sql = "delete from products where id = '$id'";
$result = mysqli_query($connect,$sql);
mysqli_close($connect);
header('location:../root/index.php?page=index');
