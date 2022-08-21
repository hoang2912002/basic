<div class="phone_sale">
    <div class="photo_phone">
        <a href="./form_display.php?id=<?php echo $each['pro_id']?>">
            <img src="./admin/products/photo_product/<?php  echo $each['photo_pro']?>" alt="">
        </a>
    </div>
    <div class="div_name">
        
        <a href="./form_display.php?id=<?php echo $each['pro_id']?>" class="name"><?php $each1= substr($each['products_name'],0,38); echo $each1?></a>
    </div>
    <div class="phone_discount_price_phone_sale">
        <div class="price_phone_sale"><span>&nbsp;<?php echo number_format($each['price'],0,",",".");?><u>đ</u></span></div>
    </div>
    <div class="phone_discount_infor">
        <span>Màn hình:
            <?php echo $each['monitor']?>
        </span>
        <br>
        <span>
            Ram:
            <?php echo $each['RAM']?></span>
        <br>
        <span>
            Bộ nhớ trong:
            <?php echo $each['memory_safe']?></span>
        <br>
        <span>
            Camera trước:
            <?php echo $each['camera_selfie']?></span>
    </div>
    <button type="submit"><a href="add_to_cart.php?id=<?php echo $each['pro_id']?>">MUA NGAY</a></button>
</div>