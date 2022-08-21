<?php
if(empty($_POST['id'])){
    header('location:index.php?error=Vui lòng nhập id của nhà sản xuất để sửa thông tin');
    exit;
}
$id = $_POST['id'];
if(empty($_POST['name'])||empty($_POST['phone'])||empty($_POST['address'])){
    header("location:form_update.php?id='$id'&error=Vui lòng điền đầy đủ thông tin của nhà sản xuất để sửa");
    exit;
}

$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$photo_new = $_FILES['photo_new'];

if($photo_new['size'] > 0){
    $folder = "photos_manufacturers/";
    $file_extension = explode('.',$photo_new['name'])[1];
    $file_name = time() . '.' . $file_extension;
    $path_file = $folder . $file_name;
    move_uploaded_file($photo_new["tmp_name"],$path_file);
}
else{
    $file_name = $_POST['photo_old'];
}
require '../connect.php';
$sql = "update manufacturers
set
name ='$name',
phone ='$phone',
address ='$address',
photo ='$file_name'
where id ='$id'";
$result = mysqli_query($connect,$sql);
mysqli_close($connect);
header('location:../root/index.php?page3=index&success=Sửa thành công ');

