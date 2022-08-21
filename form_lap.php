<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>   

        <?php if($id ==3){?>
            <?php    $sql = "select sum((SELECT COUNT(products.id)from products JOIN category on category.id = products.id_category   where category.name LIKE 'LAPTOP' ))AS COUNT_ID,products.*,component.*,category.*,
                products.name as products_name,products.photo as photo_pro,products.id as pro_id
                FROM products join component on component.id= products.id_component JOIN category on category.id = products.id_category
                where category.name like 'LAPTOP'
                GROUP BY products.id";
                $result = mysqli_query($connect,$sql);
                $price = mysqli_fetch_array($result)['COUNT_ID'];?>
                <div class="div_phone_sale">
                        <div class="price_title">
                            <h2>Laptop</h2>
                            <span>(<?php echo $price?> sản phẩm)</span>   
                        </div>
                        <?php  foreach($result as $each):?>
                            <?php require './form_phone_display.php' ?>
                        <?php endforeach?>
                    </div>
        <?php }?> 
        <?php  
             
            if ($id ==9){?>
                <?php    $sql = "select sum((SELECT COUNT(products.id)from products JOIN category on category.id = products.id_category   where price>5000000 and price<10000000 and category.name LIKE 'LAPTOP'  ))AS COUNT_ID,
                    products.*, component.*,category.*,products.name as products_name,products.photo as photo_pro,products.id as pro_id
                    from products join component on component.id= products.id_component JOIN category on category.id = products.id_category
                    where price>5000000 and price<10000000 and category.name LIKE 'LAPTOP'
                    group by products.id";
                $result = mysqli_query($connect,$sql);
                $price = mysqli_fetch_array($result)['COUNT_ID'];?>
                <?php
                ?>
                <div class="div_phone_sale">
                    <div class="price_title">
                        <h2>Laptop từ 5 - 10 triệu</h2>
                        <span>(<?php echo $price?> sản phẩm)</span>   
                    </div>
                    <?php  foreach($result as $each):?>
                        <?php require './form_phone_display.php' ?>
                    <?php endforeach?>
                </div>
            <?php }?>  
            <?php   
            if ($id ==10){?>
                <?php    $sql = "select sum((SELECT COUNT(products.id)from products JOIN category on category.id = products.id_category   where price>10000000 and price<15000000 and category.name LIKE 'LAPTOP'  ))AS COUNT_ID,
                    products.*, component.*,category.*,products.name as products_name,products.photo as photo_pro,products.id as pro_id
                    from products join component on component.id= products.id_component JOIN category on category.id = products.id_category
                    where price>10000000 and price<15000000 and category.name LIKE 'LAPTOP'
                    group by products.id";
                $result = mysqli_query($connect,$sql);
                $count = mysqli_fetch_array($result)['COUNT_ID'];
                // die($price);
                ?>
                <div class="div_phone_sale">
                <div class="price_title">
                        <h2>Điện thoại từ 10 - 15 triệu</h2>
                        <span>(<?php echo $count ?> sản phẩm)</span>
                    </div>
                <?php  foreach($result as $each):?>
                    <?php require './form_phone_display.php' ?>
                    <?php endforeach?>
                </div>
            <?php }?>  
            <?php   
            if ($id ==11){?>
                <?php    $sql = "select sum((SELECT COUNT(products.id)from products JOIN category on category.id = products.id_category   where price>15000000 and price<20000000 and category.name LIKE 'LAPTOP'  ))AS COUNT_ID,
                    products.*, component.*,category.*,products.name as products_name,products.photo as photo_pro,products.id as pro_id
                    from products join component on component.id= products.id_component JOIN category on category.id = products.id_category
                    where price>15000000 and price<20000000 and category.name LIKE 'LAPTOP'
                    group by products.id";
                $result = mysqli_query($connect,$sql);
                $count = mysqli_fetch_array($result)['COUNT_ID'];
                // die($price);
                ?>
                <div class="div_phone_sale">
                <div class="price_title">
                        <h2>Điện thoại từ 15 - 20 triệu</h2>
                        <span>(<?php echo $count ?> sản phẩm)</span>
                    </div>
                <?php  foreach($result as $each):?>
                    <?php require './form_phone_display.php' ?>
                <?php endforeach?>
                </div>
            <?php }?>  
            <?php   
            if ($id ==12){?>
                <?php    $sql = "select sum((SELECT COUNT(products.id)from products JOIN category on category.id = products.id_category   where price>20000000  and category.name LIKE 'LAPTOP'  ))AS COUNT_ID,
                    products.*, component.*,category.*,products.name as products_name,products.photo as photo_pro,products.id as pro_id
                    from products join component on component.id= products.id_component JOIN category on category.id = products.id_category
                    where price>20000000  and category.name LIKE 'LAPTOP'
                    group by products.id";
                $result = mysqli_query($connect,$sql);
                $count = mysqli_fetch_array($result)['COUNT_ID'];
                // die($price);
                ?>
                
                <?php
                ?>
                <div class="div_phone_sale">
                <div class="price_title">
                        <h2>Điện thoại trên 20 triệu</h2>
                        <span>(<?php echo $count ?> sản phẩm)</span>
                    </div>
                <?php  foreach($result as $each):?>
                    <?php require './form_phone_display.php' ?>
                <?php endforeach?>
                </div>
            <?php }else if((12<$id && $id<18) || $id ==2){?>  
                <style>
                    /*!== 12||$id !== 11|| $id !== 10 || $id !==9 || $id !==8 || $id !=3*/
                </style>
                <div class="div_phone_sale_emty">
                <div class="phone_sale_emty" >
                
                Không có sản phẩm theo mức giá mà quý khách cần tìm
                </div>
                </div>
            <?php }?>
</body>
</html>