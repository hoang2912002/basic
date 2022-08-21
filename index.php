<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./folder_css/menu.css">
    <link rel="stylesheet" href="./folder_css/card_dis.css">
    <link rel="stylesheet" href="./folder_css/div_total.css">
    <link rel="stylesheet" href="./folder_css/div_product_icon.css">
    <link rel="stylesheet" href="./folder_css/div_phone_discount.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body style="padding-right: 0;">
    
        <?php
            require './card_dis.php';
            require './admin/connect.php';
            require './notice.php'; 
        ?>
        <div class="header_menu" style="background-color:whitesmoke ;">
            <?php require './header_menu.php'; ?>
            <?php
                if(!isset($_SESSION['id'])){                                            //folder sign
                require './menu_customers.php';  }                                               //folder sign
            ?>
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
        <script src="https://jqueryvalidation.org/files/lib/jquery.form.js"></script>
        <div id="total">
            <div class="seagame" >
                <img src="./photo_index/seagame-title.webp" alt="">
            </div>
            <div class="div_phone_discount_total">
                <?php require_once './folder_div_sub/div_product_icon.php';//folder div_sub ?>
            </div>
            <div class="banner_sale">
                    <img src="./photo_index/banner_f_studio.webp" alt="" >
            </div>

            <div class="banner_lap">
                <img src="./photo_index/banner_lap.webp" alt="">
            </div>
            <div class="banner_lap_discount">
                <img src="./photo_index/banner_lap_discount.png" alt="">
            </div>
            <div class="banner_watch">
                <img src="./photo_index/banner_watch.webp" alt="">
            </div>
            <div class="banner_tab_phone">
                <div class="banner_tab_s">
                    <a href="#">
                        <img src="./photo_index/banner_tab_s.webp" alt="">
                    </a>
                </div>
                <div class="banner_phone_pova">
                    <a href="#">
                        <img src="./photo_index/banner_phone_pova.webp" alt="">
                    </a>
                </div>
            </div>
            <div class="accessory_icon"></div>
            <div class="banner_pr_fshop">
                <div class="banner_sim"><img src="./photo_index/banner_sim.webp" alt=""></div>
                <div class="banner_du_an"><img src="./photo_index/banner_du_an.webp" alt=""></div>
                <div class="banner_f-friend"><img src="./photo_index/banner_f-friends.webp" alt=""></div>
            </div>
            
        </div>
        <div class="footer_index">
                <?php require './footer.php';  ?>
        </div>  
        <script src="./js/search.js"></script>
        
</body>
</html>