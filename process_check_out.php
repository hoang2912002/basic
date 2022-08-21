<?php
if(empty($_POST['name_receiver'])||empty($_POST['phone_receiver'])||empty($_POST['address_receiver'])){
    header('location:view_cart.php?error=Lỗi r');
    exit;
}

$name_receiver = $_POST['name_receiver'];
$phone_receiver = $_POST['phone_receiver'];
$address_receiver = $_POST['address_receiver'];

require './admin/connect.php';
session_start();
$cart = $_SESSION['cart'];
$total_price = 0;
foreach ($cart as $id => $each){
    $total_price = $each['price'] * $each['quantity'];
}

$id_customer = $_SESSION['id'];

$status = 0;

$sql = "insert into bill(id_customer,name_receiver,phone_receiver,address_receiver,status,total_price)
        values('$id_customer','$name_receiver','$phone_receiver','$address_receiver','$status','$total_price')";
$result = mysqli_query($connect,$sql);

$sql = "select max(id) from bill where id_customer = '$id_customer' ";
$result = mysqli_query($connect,$sql);
$id_bill = mysqli_fetch_array($result)['max(id)'];

foreach($cart as $id_product => $each){
    $quantity = $each['quantity'];
    $sql = "insert into bill_detail(id_bill,id_product,quantity)
            values('$id_bill','$id_product','$quantity')";
     mysqli_query($connect,$sql);
}
mysqli_close($connect);
unset($_SESSION['cart']);
header("location:users.php");