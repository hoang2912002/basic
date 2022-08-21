<?php session_start();
    if(empty($_SESSION['id'])){
        header('location:sign_in.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./folder_css/customer_infor.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        .div_phone_sale{
            display: none;
        }
    </style>
</head>
<body>
    <?php
        require 'header_menu.php'
    ?>
    <?php
        $id = $_SESSION['id'];
        require "./connect.php";
        $sql ="select * from customers where id = $id";
        $result = mysqli_query($connect,$sql);
        $rows = mysqli_num_rows($result);
        if($rows ==1){
        $each = mysqli_fetch_array($result);  

        
    ?>
<div class="container">
            
    <ul class="nav nav-tabs">
        
        <li><a data-toggle="tab" href="#menu1">Quản lý tài khoản</a></li>
        <li><a data-toggle="tab" href="#menu2">Thông tin tài khoản</a></li>
        <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
    </ul>
    <div class="tab-content">
        
        <div id="menu1" class="tab-pane fade">
            <div id="body" >
                <form action="./process_customer_infor.php" method="POST">
                    Tên
                    <input type="hidden" name="id" value=" <?php  $each['id']?>">
                    
                    <div class="quay-ve">
                        Quay lại trang chủ
                    <a href="./users.php">Back</a>
                    Họ 
                    <input type="text" name="first_name" value="<?php echo $each['first_name']?>" required>
                    <input type="text" name="last_name"value="<?php echo $each['last_name']?>" required>
                    Email
                    <input type="email" name="email" value="<?php echo $each['email']?>" required>
                    Password
                    <input type="text" name="password"value="<?php echo $each['password']?>" required>
                    Số điện thoại
                    <input type="text" name="phone_number" value="<?php echo $each['phone_number']?>" required>
                    <input type="text"  name="address" value="<?php echo $each['address']?>"required>
                    <button type="submit">
                            Sửa
                    </button>
                </form>
            </div>
            
        </div>
        
        <div id="menu2"  class="tab-pane fade">
            <div id="body">
                àdafsdfgsdgfasfasfasfa
            </div>
        </div>    
    </div>
</div>
    <?php }?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <script>
        $(document).ready(function(){
            $('#menu1').click(function(){
                $(this).show(1000)
                
            });
            $('#menu2').after(function(){
                $(this).hide()
            })
        })
    </script>
</body>
</html>