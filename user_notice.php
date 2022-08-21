<?php
    if(empty($_SESSION['id'])){
        header('location:index.php');
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
    <link rel="stylesheet" href="./folder_css/users.css">
</head>
<body>
<div class="users_notice">
        <div class="name_cus" >
            <div class="icon_user" >
                <a href=""class='bx bxs-user ' style="text-align:center ;"   ></a>
            </div>
            <div class="user_name" >
                <?php
                    
                    echo $_SESSION['first_name']; echo $_SESSION['last_name']; ?>
            </div>
            
        </div>
        
        <ul>
            <li>
                <div class="info_customer">
                    <table  style="width: 100%;">
                        <tr style="height: 40px;">
                            <td style="width: 70px;text-align: center;">
                                <a href="customer_infor.php" class='bx bx-notepad icon' ></a></td>
                            <td><a href="customer_infor.php" class="a_text" >Thông tin cá nhân</a></td>
                        </tr>
                        <tr style="height: 40px;">
                            <td style="text-align: center;"><a href="" class='bx bx-news icon' ></a></td>
                            <td><a href="" class="a_text" >Giỏ hàng</a></td>
                            
                        </tr>
                        <tr style="height: 40px;">
                            
                            <td style="text-align: center;"><a href="" class='bx bx-exit icon' ></a></td>
                            <td><a href="./sign_out.php" class="a_text" >Đăng xuất</a></td>
                        </tr>
                        
                    </table>
                </div>
            </li>
        </ul>
        
    
    
</div>

</body>
</html>