
<?php
if(empty($_POST['id'])){
    header('location:users.php');
    exit;
}
$id = $_POST['id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone_number = $_POST['phone_number'];
$address = $_POST['address'];

