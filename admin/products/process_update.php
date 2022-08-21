<?php
if(empty($_POST['id'])){
    header('location:../root/index.php?page=index&error=Không tìm thấy id để sửa');
    exit;
}
$id = $_POST['id'];
if(empty($_POST['name'])||empty($_POST['description'])||empty($_POST['id_manufacturers'])||empty($_POST['price'])||empty($_POST['id_category'])||empty($_POST['id_component'])){
    header('location:form_update.php?error=Vui lòng điền đầy đủ thông tin');
    exit;
}

$name = $_POST['name'];
$description = $_POST['description'];
$id_manufacturers = $_POST['id_manufacturers'];
$price = $_POST['price'];
$photo_new = $_FILES['photo_new'];
$id_category = $_POST['id_category'];
$id_component = $_POST['id_component'];

if($photo_new['size'] > 0)
{
    $folder = 'photo_product/';
    $file_extension = explode('.',$photo_new['name'])[1];
    $file_name = time() . '.' . $file_extension;
    $path_file = $folder . $file_name;
    move_uploaded_file($photo_new['tmp_name'], $path_file);
}
else{
    $file_name = $_POST['photo_old'];
}
require '../connect.php';
$sql = "update products
set 
name = '$name',
description = '$description',
id_manufacturers = '$id_manufacturers',
price = '$price',
photo= '$file_name',
id_category = '$id_category',
id_component = '$id_component'
where id = '$id'";

$result = mysqli_query($connect,$sql);
mysqli_close($connect);
header("location:../root/index.php?page=index&success=Sửa thành công sản phẩm $id");