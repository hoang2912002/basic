<?php
    
    if(empty($_POST['email'])||empty($_POST['name'])||empty($_POST['password'])    ){
        echo 1;
    }
    require '../connect.php';
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $level = (int)$_POST['level'];
    $sql ="insert into admin(name,email,password,level)
            values('$name','$email','$password','$level')";
    $result = mysqli_query($connect,$sql);
    mysqli_close($connect);
    header('location:./root/index.php?page5=list_admin');