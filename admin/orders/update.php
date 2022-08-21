<?php
$id = $_GET['id'];
$status = $_GET['status'];
require '../connect.php';
$sql = "update bill set status = '$status'
where id = '$id'";

$result = mysqli_query($connect,$sql);

header('location:../root/index.php?page2=index');