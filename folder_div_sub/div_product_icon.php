<?php
require './admin/connect.php';
$sql = "select * from category
        where id >4";
$result = mysqli_query($connect,$sql);

?>

<div class="product_icon">
    <div class="product_sub_icon1">
        <a href="form_phone.php?id=1">
            <img src="./fs_photo/a1.webp" alt="">
        </a>
        <div class="name_product_icon">
            Điện thoại
        </div>
    </div>
    <div class="product_sub_icon1">
        <a href="form_phone.php?id=3">
            <img src="./fs_photo/icon-laptop.webp" alt="">
        </a>
        <div class="name_product_icon">
            Laptop
        </div>
    </div>
    <?php foreach($result as $each):?>
        <div class="product_sub_icon1"><a href="">
            <img src="./admin/products/photo_product/<?php echo $each['photo']?>" alt="">
        </a>
        <div class="name_product_icon">
           <?php echo $each['name']?>
        </div></div>
    <?php endforeach?>

</div><!--div_product_icon.css-->