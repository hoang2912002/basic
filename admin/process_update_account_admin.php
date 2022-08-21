<?php
    if(empty($_POST['id'])){
        header('location:./root/index.php?page5=list_admin');
    }
    $id = $_POST['id'];
    if(empty($_POST['email'])||empty($_POST['name'])||empty($_POST['password'])    ){
        echo 1;
    }
    
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $level = (int)$_POST['level'];

    echo $id;
    echo $email;
    echo $name;
    echo $password;
    echo $level;

    require '../connect.php';
    $sql = "update admin
    set
    email = '$email',
    name = '$name',
    password = '$password',
    level = '$level'
    where id = '$id'";
    $result = mysqli_query($connect,$sql);
    mysqli_close($connect);
    header('location:./root/index.php?page5=list_admin');
