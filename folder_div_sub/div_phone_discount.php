<?php
    
?>
<link rel="stylesheet" href="../folder_css/fs.css">
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
<style>
  
</style>
<?php 
    require './admin/connect.php';
    
        $page = 1;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        $sql_news = "select count(*) from products join category on category.id = products.id_category where category.name like 'ĐIỆN THOẠI'";
        $array_news = mysqli_query($connect,$sql_news);
        $result_array = mysqli_fetch_array($array_news);
        $news = $result_array['count(*)']; 
        $news_in_1_line = 3;

        $page_number = ceil($news/$news_in_1_line);
        $pass_page = $news_in_1_line*($page-1);
        $sql = "select 
        products.*,manufacturers.name as manufacturers_name,category.name as category_name,component.id as component_id,component.*,products.id as pro_id
        from products
        join manufacturers on manufacturers.id = products.id_manufacturers join category on category.id 
        = products.id_category join component on component.id = products.id_component 
        where   category.name  like( 'ĐIỆN THOẠI') limit $news_in_1_line offset $pass_page ";
        $result = mysqli_query($connect,$sql);
?>
<div class="discount" style="background-color: whitesmoke;">
    <div class="phone_discount">
        <div class="title">
            <i class='bx bxs-hot'></i>
            <span>KHUYẾN MÃI HOT</span>
        </div>
            <?php foreach($result as $each):?>
                <div class="phone_sale">
                    <div class="photo_phone">
                        <a href="./form_display.php?id=<?php echo $each['pro_id']?>">
                            <img src="./admin/products/photo_product/<?php echo $each['photo']?>" alt="">
                        </a>
                    </div>
                    <div class="div_name">
                        <a href="./form_display.php?id=<?php echo $each['pro_id']?>" class="name"><?php  $each1= substr($each['name'],0,50); echo $each1?></a>
                    </div>
                    <div class="phone_discount_price_phone_sale">
                        <div class="price_phone_sale"><span>&nbsp;<?php echo number_format( $each['price'],0,",",".");?><u>đ</u></span></div>
                    </div>
                    <div class="phone_discount_infor">
                        <span>Màn hình:
                        <?php echo $each['monitor']?>
                        </span>
                        <br>
                        <span>Ram:<?php echo $each['RAM']?></span>
                        <br>
                        <span>Bộ nhớ trong:<?php echo $each['memory_safe']?></span>
                        <br>
                        <?php 
                        if($each['category_name'] == 'ĐIỆN THOẠI'){ ?>
                            <span>Camera trước:<?php echo $each['camera_selfie']?></span>
                        <?php }
                        else{ ?>
                            <span>Card:<?php echo $each['camera_selfie']?></span>
                        <?php }
                        ?>
                    </div>
                    <?php if(!empty($_SESSION['id'])){?>
                        <button class="btn-add-to-cart" data-id="<?php echo $each['pro_id']?>">MUA NGAY</button>
                        
                    <?php }?>
                </div>
            <?php endforeach?>
                <div class="pre">
                    <div class="div-change-page-pre">
                        <?php
                            if($page >=2){
                                echo "<a class='bx bx-chevron-left btn-change-page' href='?page=".($page-1)."&search=".$search."'></a>";    
                        }
                        else if($page<=1){?>
                                <?php echo "<a class='bx bx-chevron-left btn-change-page' href='?page=".($page+($page_number-1))."&search=".$search."'></a>"; ?>
                        <?php }?>
                    </div>
                </div>
                <div class="next">
                    <div class="div-change-page-next">
                        <?php
                            if($page<$page_number){   
                                echo "<a class='bx bx-chevron-right btn-change-page' style=`text-decoration: none` href='?page=".   ($page+1)."&search=".$search."'></a>";  
                        } else if($page <=$page_number) {
                                echo "<a class='bx bx-chevron-right btn-change-page' href='?page=".  ($page-($page_number-1))."&search=".$search."'></a>"; ?>
                        <?php }?>
                    </div>
                </div>
            <div class="number">
                
                <?php for($i=1; $i<=$page_number; $i++) {?>
                    <div class="page_number">
                    <a onclick="page()" id="page_p" class="page" href="?page=<?php echo $i?>">
                    <?php echo $i;?></div>    
                    </a>
                <?php }?>
                
            </div>
            <div class="inline">
                <input class="page" id="page" type="number" min="1" max="<?php echo $page_number?>"   
                placeholder="<?php echo $page."/".$page_number; ?>" required>   
                <button onclick="go2Page()" class="go" type="submit" >GO</button>
            </div>
    </div>
</div>
<script>   
    function go2Page()   
    {   
        var page = document.getElementById("page").value;   
        page = ((page><?php echo $page_number; ?>)?<?php echo $page_number; ?>:((page<1)?1:page));   
        window.location.href = '?page='+page;   
    }   
    function page(){
        var page = document.getElementById("page_p").value; 
        if(page == '?page')
            window.location.href=''
    }
</script>  

