<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./folder_css/card_dis.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- <link rel="stylesheet" href="./folder_css/menu.css"> -->
    <link rel="stylesheet" href="./folder_css/form_phone.css">
</head>
<body>   
    <?php
        require './admin/connect.php';
        require './card_dis.php';
        require './header_menu.php';
    ?>
    
     <div id="body">
         <div class="home">
             <a href="users.php">Trang chủ</a>
         </div>
        <div class="banner_first">
           <?php require './slide_show.php'?>
        </div>
        <?php 
        if (empty($_GET['name'])){
            $id = $_GET['id'];
        
        ?>
            <?php if($id ==1){?>
            <?php    $sql = "select sum((SELECT COUNT(products.id)from products JOIN category on category.id = products.id_category   where category.name LIKE 'ĐIỆN THOẠI'  ))AS COUNT_ID,products.*,component.*,category.*,
                products.name as products_name,products.photo as photo_pro,products.id as pro_id
                FROM products join component on component.id= products.id_component JOIN category on category.id = products.id_category
                where category.name like 'ĐIỆN THOẠI'
                GROUP BY products.id";
                $result = mysqli_query($connect,$sql);
                $count = mysqli_fetch_array($result)['COUNT_ID'];?>
                <div class="div_phone_sale">
                        <div class="price_title">
                            <h2>Điện thoại</h2>
                            <span>(<?php echo $count?> sản phẩm)</span>   
                        </div>
                        <?php  foreach($result as $each):?>
                            <?php require './form_phone_display.php' ?>
                        <?php endforeach?>
                    </div>
            <?php }?>  

            <?php if ($id ==4){?>
                    <?php    $sql = "select sum((SELECT COUNT(products.id)from products JOIN category on category.id = products.id_category   where  price>2000000 and price<4000000 and category.name LIKE 'ĐIỆN THOẠI'  ))AS COUNT_ID,
                        products.*, component.*,category.*,products.name as products_name,products.photo as photo_pro,products.id as pro_id
                        from products join component on component.id= products.id_component JOIN category on category.id = products.id_category
                        where price>2000000 and price<4000000 and category.name LIKE 'ĐIỆN THOẠI'
                        group by products.id";
                    $result = mysqli_query($connect,$sql);
                    $price = mysqli_fetch_array($result)['COUNT_ID'];
                    // die($price);
                    ?>
                    <?php
                    ?>
                    <div class="div_phone_sale">
                        <div class="price_title">
                            <h2>Điện thoại từ 2 - 4 triệu</h2>
                            <span>(<?php echo $price?> sản phẩm)</span>   
                        </div>
                        <?php  foreach($result as $each):?>
                            <?php require './form_phone_display.php' ?>
                        <?php endforeach?>
                    </div>
                <?php }?>  
                <?php   
            if ($id ==5){?>
                <?php    $sql = "
                    select sum((SELECT COUNT(products.id)from products JOIN category on category.id = products.id_category   where  price > 4000000 and price <7000000 and category.name LIKE 'ĐIỆN THOẠI'  ))AS COUNT_ID,
                    products.*, component.*,category.*,products.name as products_name,products.photo as photo_pro,products.id as pro_id
                    from products join component on component.id= products.id_component JOIN category on category.id = products.id_category
                    where price > 4000000 and price <7000000 and category.name LIKE 'ĐIỆN THOẠI'
                    group by products.id";
                $result = mysqli_query($connect,$sql);
                $count = mysqli_fetch_array($result)['COUNT_ID'];
                // die($price);
                ?>
                <div class="div_phone_sale">
                <div class="price_title">
                        <h2>Điện thoại từ 4 - 7 triệu</h2>
                        <span>(<?php echo $count ?> sản phẩm)</span>
                    </div>
                <?php  foreach($result as $each):?>
                    <?php require './form_phone_display.php' ?>
                <?php endforeach?>
                </div>
            <?php }?>  
            <?php   
            if ($id ==6){?>
                <?php    $sql = "select sum((SELECT COUNT(products.id)from products JOIN category on category.id = products.id_category   where  price>7000000 and price<13000000 and category.name LIKE 'ĐIỆN THOẠI'  ))AS COUNT_ID,
                    products.*, component.*,category.*,products.name as products_name,products.photo as photo_pro,products.id as pro_id
                    from products join component on component.id= products.id_component JOIN category on category.id = products.id_category
                    where price>7000000 and price<13000000 and category.name LIKE 'ĐIỆN THOẠI'
                    group by products.id";
                $result = mysqli_query($connect,$sql);
                $count = mysqli_fetch_array($result)['COUNT_ID'];
                // die($price);
                ?>
                <div class="div_phone_sale">
                <div class="price_title">
                        <h2>Điện thoại từ 7 - 13 triệu</h2>
                        <span>(<?php echo $count ?> sản phẩm)</span>
                    </div>
                <?php  foreach($result as $each):?>
                    <?php require './form_phone_display.php' ?>
                <?php endforeach?>
                </div>
            <?php }?>  
            <?php   
            if ($id ==7){?>
                <?php    $sql = "select sum((SELECT COUNT(products.id)from products JOIN category on category.id = products.id_category   where  price > 13000000 and category.name LIKE 'ĐIỆN THOẠI'  ))AS COUNT_ID,
                    products.*, component.*,category.*,products.name as products_name,products.photo as photo_pro,products.id as pro_id
                    from products join component on component.id= products.id_component JOIN category on category.id = products.id_category
                    where price > 13000000 and category.name LIKE 'ĐIỆN THOẠI'
                    group by products.id";
                $result = mysqli_query($connect,$sql);
                $count = mysqli_fetch_array($result)['COUNT_ID'];
                // die($price);
                ?>
                
                <?php
                ?>
                <div class="div_phone_sale">
                <div class="price_title">
                        <h2>Điện thoại trên 13 triệu</h2>
                        <span>(<?php echo $count ?> sản phẩm)</span>
                    </div>
                <?php  foreach($result as $each):?>
                    <?php  require './form_phone_display.php' ?>
                <?php endforeach?>
                </div>
            <?php }?>
            <?php require './form_lap.php' ?>
            <?php
                $sql = "select name from manufacturers";
                $result = mysqli_query($connect,$sql);
                $each = mysqli_fetch_array($result);
                
            ?>
        <?php }else{?>
            <?php 
                $name = $_GET['name'];
                $sql = "select 
                sum((SELECT COUNT(products.id)from products JOIN category on category.id = products.id_category JOIN manufacturers on manufacturers.id = products.id_manufacturers   where  manufacturers.name = '$name'  ))AS COUNT_ID,
                products.*, component.*,category.*,manufacturers.name as manu_name,products.name as products_name,products.photo as photo_pro,products.id as pro_id
                from products join component on component.id= products.id_component JOIN category on category.id = products.id_category 
                JOIN manufacturers on manufacturers.id = products.id_manufacturers
                where manufacturers.name = '$name'
                group by products.id";
                $result = mysqli_query($connect,$sql);
                $count = mysqli_fetch_array($result)['COUNT_ID'];
                $manu_name = mysqli_fetch_array($result)['manu_name'];
            ?>
                <div class="div_phone_sale">
                <div class="price_title">
                        <h2><?php echo $manu_name?></h2>
                        <span>(<?php echo $count ?> sản phẩm)</span>
                    </div>
                <?php  foreach($result as $each):?>
                    <?php require './form_phone_display.php' ?>
                <?php endforeach?>
                </div>
        <?php   }?>
    </div>
    
    <footer class="footer">
        <?php require './footer.php' ?>
    </footer>                
</body>
</html>