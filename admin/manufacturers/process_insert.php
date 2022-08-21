<?php
if(empty($_POST['name'])||empty($_FILES['photo'])||empty($_POST['address'])||empty($_POST['phone']))
{
    header('location:../root/index.php?page3=form_insert&error=Vui lòng điền đầy đủ thông tin');
    exit;
}
$name = $_POST['name'];
$address = $_POST['address'];
$phone =$_POST['phone'];
$photo = $_FILES['photo'];

$folder = 'photos_manufacturers/';
$file_extension = explode('.',$photo['name'])[1];
$file_name = time() . '.' . $file_extension;
$path_file = $folder . $file_name;
move_uploaded_file($photo["tmp_name"],$path_file);

require '../connect.php';
$sql = "insert into manufacturers(name,phone,address,photo)
        values ('$name','$phone','$address','$file_name')";
mysqli_query($connect,$sql);
mysqli_close($connect);
header('location:../root/index.php?page3=index&success=Thêm thành công');