<?php

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email= $_POST['email'];
$password = $_POST['password'];
$phone_number = $_POST['phone_number'];
$address = $_POST['address'];

$gender = $_POST['gender'];

require './admin/connect.php';
$sql = "select count(*) from customers
        where email = '$email'";

$result = mysqli_query($connect,$sql);
$number_rows = mysqli_fetch_array($result)['count(*)'];
if($number_rows == 1){
//     session_start();
//     $_SESSION['error'] = 'Tài khoản này đã tồn tại';
    echo 'Trùng email';
    exit;
}
else {?>
<?php
$sql = "insert into customers(first_name,last_name,email,password,phone_number,address,gender)
        values('$first_name','$last_name','$email','$password','$phone_number','$address','$gender')";

mysqli_query($connect,$sql);

$sql = "select id from customers where email = '$email'";
$result = mysqli_query($connect,$sql);

$id = mysqli_fetch_array($result)['id'];

mysqli_query($connect,$sql);
session_start();
$_SESSION['id'] = $id;
$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;

mysqli_close($connect);
echo 1;
exit;
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).change(function(){
        let id  = document.getElementsByName($id);
        $.ajax({
            url: "users.php",
            type: 'POST',
        })
    })
</script>   
<?php }?>
