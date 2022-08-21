<?php
// $name = addslashes($_POST['name']);
// $price = addslashes($_POST['price']);
// $description = addslashes($_POST['description']);
// $id_manufacturers = addslashes($_POST['id_manufacturers']);
// $photo = ($_FILES['photo']);
// // echo json_encode($photo);
// $folder = 'photo_product/';
// $file_extension = explode('.' ,$photo['name'])[1];
// $file_name = time() . '.' . $file_extension;
// $path_name = $folder . $file_name;
// move_uploaded_file($photo['tmp_name'],$path_name);

// require '../connect.php';
// $sql = "insert into products(name,photo,description,price,id_manufacturers)";
// $result = mysqli_query($connect,$sql);
// mysqli_close($connect);
if(empty($_POST['name'])||empty($_FILES['photo'])||empty($_POST['price'])||empty($_POST['description'])||empty($_POST['id_manufacturers']))
{
    header('location:../root/test2.php?page=form_insert&error=Lỗi vui lòng điền đầy đủ thông tin');
    exit;
}

$name =addslashes($_POST['name']);//có nghĩ là thêm dấu gạch chéo vào trc những ký tự như regex
$photo =$_FILES['photo'];
$price =addslashes($_POST['price']);
$description =addslashes($_POST['description']);
$id_manufacturers =addslashes($_POST['id_manufacturers']);
$id_category = addslashes($_POST['id_category']);
$id_component = addslashes($_POST['id_component']);
// die($id_component);
$folder = 'photo_product/';
$file_extension = explode('.',$photo['name'])[1];
$file_name = time() . '.' . $file_extension;  
$path_file = $folder . $file_name; 
move_uploaded_file($photo["tmp_name"],$path_file);
require '../connect.php';
require '../menu.php';
$sql = "insert into products(name,photo,price,description,id_manufacturers,id_category,id_component)
        values('$name','$file_name','$price','$description','$id_manufacturers','$id_category','$id_component')";
$result = mysqli_query($connect,$sql);
mysqli_close($connect);
header('location:../root/index.php?page=index&success=Thêm thành công');