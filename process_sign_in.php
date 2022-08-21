<?php

$email = $_POST['email'];
$password = $_POST['password'];
if(isset($_POST['remember'])){
    $remember = true;
}
else{
    $remember = false;
}

require './admin/connect.php';
$sql = "select * from customers
        where email = '$email' and  password = '$password'";
$result = mysqli_query($connect,$sql);
$num_rows = mysqli_num_rows($result);

if($num_rows ==1){
    session_start();
    $each = mysqli_fetch_array($result);
    $id = $each['id'];
    $_SESSION['id'] = $id;
    $_SESSION['first_name'] = $each['first_name'];
    $_SESSION['last_name'] = $each['last_name'];
    if($remember){
        $token = uniqid('users_',true);
        $sql = "update customers
        set 
        token = '$token'
        where id = '$id'";
        mysqli_query($connect,$sql);
        setcookie('remember',$token,time()+(86400 * 30));
    }
    exit;
}
else{
    echo 'Tài khoản không hợp lệ';
}