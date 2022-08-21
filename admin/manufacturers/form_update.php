<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(empty($_GET['id'])){
            header('location:index.php?error=Vui lòng nhập id hãng để sửa');
            exit;
        }
        $id = $_GET['id'];
        require '../menu.php';
        require '../connect.php';
        $sql = "select * from manufacturers
                where id = '$id'";
        $result = mysqli_query($connect,$sql);
        $number_rows = mysqli_num_rows($result);
    if($number_rows===1) {
        $each = mysqli_fetch_array($result);
    ?>
    <form action="process_update.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $each['id']?>">
        Tên hãng
        <input type="text" name="name" value="<?php echo $each['name']?>">
        <br>
        Số điện thoại liên hệ
        <input type="number" name="phone" value="<?php echo $each['phone']?>">
        <br>
        Địa chỉ 
        <input type="text" name="address" value="<?php echo $each['address']?>">
        <br>
        Ảnh cũ
        <img src="photos_manufacturers/<?php echo $each['photo']?>" alt="" style="height: 100px;">
        <input type="hidden" name="photo_old" value="<?php echo $each['photo']?>">
        <br>
        Ảnh mới
        <input type="file" name="photo_new">
        <br>
        <button type="submit">Sửa thông tin</button>
    </form>
    <?php }else{?>
        <h1>Không tìm thấy thông tin theo id để sửa</h1>
    <?php }?>
</body>
</html>