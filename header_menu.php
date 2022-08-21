
    <link rel="stylesheet" href="./folder_css/fs.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

<div class="fs">
    <?php         // $page = 1;
        $search = '';
        if(isset($_GET['search'])){
            $search =$_GET['search'];
        }
        require './admin/connect.php';
    ?>
            <div class="fs_search">
                <div class="logo">
                    <!-- <?php session_start() ?> -->
                    <?php 
                        if(!isset($_SESSION['id'])){
                    ?>
                        <a href="index.php">
                            <img src="./photo_index/image-removebg-preview.png" alt="" class="img1" >
                        </a>
                    <?php } else{?>
                        <a href="users.php">
                        <img src="./photo_index/image-removebg-preview2.png" alt=""  class="img2">
                    </a>
                    <?php }?>
                </div>
                <div class="search">
                    <!-- <FORM> -->
                    <!-- <input type="search" name="search" placeholder=" &nbsp;  Nhập tên điện thoại,máy tính,phụ kiện cần tìm" style="align-items: center;" value="<?php echo $search?>"></FORM> -->
                    <?php
                        require_once './autocomplete.php';
                    ?>
                </div>
                <div class="others">
                    <?php if(!empty($_SESSION['id'])) {?>
                    <div class="infor">
                        <a href="" class='bx bxs-file icon-box'  style="text-decoration: none"></a>
                        <span style="color: white;" >Thông tin hay</span>
                    </div>
                    <div class="cart">
                        <a href="./view_cart.php" class='bx bx-cart-download icon-box' style="text-decoration:none "></a>
                        <span style="color: white;">Giỏ hàng</span>
                    </div>
                    <?php }?>
                    
                </div>
            </div>
            <?php if(!empty($_SESSION['id'])) {?>
                <div class="user_notice">
                    <?php require 'user_notice.php' ?>
                </div>
            <?php }else{ ?>
                
            <?php }?>
            <div class="fs_menu">
                <?php                                                    //folder fs
                    require './folder_fs/fs_ul_li.php';                                                     //folder fs
                ?>
            </div>       
</div>
<div class="div_phone_sale">
    <?php require './folder_div_sub/div_phone_discount.php';?>
</div> 

