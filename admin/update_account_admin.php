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
        require '../connect.php';
        $id = $_GET['id'];
        $sql = "select * from admin where id = '$id'";
        $result = mysqli_query($connect,$sql);

    ?>
    <form action="../process_update_account_admin.php" method="POST">
    <?php foreach($result as $each):?>
        <input type="number" value="<?php echo $each['id']?>" name="id">
        <input type="text" value="<?php echo $each['name']?>" name="name">
        <input type="email" value="<?php echo $each['email']?>" name="email">
        <input type="password" value="<?php echo $each['password']?>" name="password">
        <input type="number" value="<?php echo $each['level']?>" name="level">
        
    <?php endforeach?>
    <button type="submit">Sửa</button>
    </form>
</body>
</html>