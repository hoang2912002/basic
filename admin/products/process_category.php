<?php
if(empty($_POST['name'])||empty($_FILES['photo'])){
        header('location:../root/test2.php?page=form_category');
        exit();
}
$name = $_POST['name'];
$photo = $_FILES['photo'];

$folder = 'photo_product/';
$file_extension = explode('.',$photo['name'])[1];
$file_name = time() . '.' . $file_extension;  
$path_file = $folder . $file_name; 
move_uploaded_file($photo["tmp_name"],$path_file);
require '../connect.php';
$sql = "insert into category(name,photo)
        values ('$name','$file_name')";

$result = mysqli_query($connect,$sql);
mysqli_close($connect);
header('location:../root/test2.php?page=form_category');
