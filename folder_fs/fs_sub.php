<?php 
     require './admin/connect.php';
    //require '../admin/connect.php';

    $sql = "select DISTINCT products.id_manufacturers and products.id_category as id_cate,category.name as category_name,  manufacturers.name  as manufacturers_name
    from products 
    join category on category.id = products.id_category join manufacturers on manufacturers.id = products.id_manufacturers
    where category.id = products.id_category and category.name like 'ĐIỆN THOẠI'
    GROUP BY category.name,manufacturers.name,products.id_category,products.id_manufacturers";
    $result = mysqli_query($connect,$sql);
      
     $sql ="select price  from products";
    $price1 = mysqli_query($connect,$sql);
    
    $sql ="select * from category";
    $name = mysqli_query($connect,$sql);
    
    $sql ="select * from manufacturers";
    $name_manu = mysqli_query($connect,$sql);

    // $number =substr_replace($number,".",2,0);
    // $number =substr_replace($number,".",6,0);
    

?>
<ul class="sub_menu">            
                    <li class="c1">
                        <?php $id = $name_cate ;?>
                        <div class="b1">
                            
                                <?php if($name_cate['id'] ==1){ ?>
                            
                                <div class="manufacturers"> 
                                            <h4 class="fontt" style=" cursor: text;">HÃNG SẢN XUẤT </h4>
                                            <br>
                                            <?php foreach( $result as $each):?>
                                            <a href="./form_phone.php?name=<?php echo $each['manufacturers_name']?>">
                                                <?php echo $each['manufacturers_name']?>
                                            <br>
                                            <br>
                                            </a> <?php endforeach?>
                                            
                                </div> 
                                
                                <div class="price">
                                    <h4>Mức Giá</h4>
                                    <br>
                                    <a href="./form_phone.php?id=2">
                                        Từ 2 đến 4 triệu
                                    </a>
                                    <br>
                                    <br>
                                    <a href="./form_phone.php?id=3">
                                        Từ 4 đến 7 triệu
                                    </a>
                                    <br>
                                    <br>
                                    <a href="./form_phone.php?id=4">
                                        Từ 7 đến 13 triệu
                                    </a>
                                    <br>
                                    <br>
                                    <a href="./form_phone.php?id=5">
                                        Trên 13 triệu
                                    </a>
                                </div>
                                
                                <div class="img_pr">
                                    <img src="./fs_photo/photo_menu.webp" alt="">
                                </div>
                            <?php }?>
                        </div>
                    </li>   
                </ul>