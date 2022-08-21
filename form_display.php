<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./folder_css/display.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./folder_css/ratings.css">
</head>
<body>
    
    <?php
        if(empty($_GET['id']))
        {
            header('location:error=Không tìm thấy tên sản phẩm');
            exit;
        }  
        $id = $_GET['id'];
        
        require './admin/connect.php';
        $sql = "select products.* , component.*,products.id_category as cate_id,products.id as pro_id
                 from products join component on component.id= products.id_component
                where   products.id = '$id' 
                group by products.id, component.id,products.name";
        $result = mysqli_query($connect,$sql);
        $price = mysqli_fetch_array($result)['price'];
        //(or products.id = '$id') phần điều kiện sql
    ?>
    
    <?php foreach($result as $each):?>
        
        <div id="body" >
            <a href="index.php" style="font-size:13px;">Trang chủ</a>
            <?php if($each['cate_id']== 1){?>
            <a href="form_phone.php?id=1" style="font-size:13px ;">/Điện thoại</a>
            <a href="" style="font-size:13px ;"><?php $each1= substr($each['name'],0,10); echo $each1?></a>
            <?php } else if($each['cate_id']==3){?>
            <a href="form_phone.php?id=3" style="font-size:13px ;">/Laptop/</a>
            <a href="" style="font-size:13px ;"><?php $each1= substr($each['name'],0,18); echo $each1?></a>
            <?php }?>
            <div class="title">
                <h4><?php echo nl2br($each['name']);?></h4>
                <a href="index.php">Quay lai trang chủ</a>
                <fieldset class="rating">
                    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                    <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                    <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                    <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                    <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                    <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                </fieldset>
            </div>
            <hr style="background-color:#DDD7D5 ;">
            <div class="detail">
                
                <div class="img">
                    <img src="./admin/products/photo_product/<?php echo $each['photo']?>" alt="">
                </div>
                <div class="price">
                    
                    <h4><?php if($price<10000000){?>
                      <?php $price1 = substr_replace($price,'.',1,0);
                                $price1 = substr_replace($price1,'.',5,0);
                                echo ( $price1);?><u>đ</u></h4>
                        <?php } else{?>
                            <?php $price1 = substr_replace($price,'.',2,0);
                                $price1 = substr_replace($price1,'.',6,0);
                                echo ( $price1);?><u>đ</u></h4>
                        <?php }?>
                    <div class="digital">
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
                    <?php if(!empty($_SESSION['id'])){?>
                    <button class="btn-buy" type="submit"> <a  class="a-buy" href="add_to_cart.php?id=<?php echo $each['pro_id']?>">MUA NGAY</a></button>
                    <?php }?>
                </div>
            </div>
            <div class="emty"></div>
            <section>
                <div class="infor">
                    <span class="less">
                        <?php echo substr(nl2br($each['description']),0,300); ?>.....
                    </span>  
                    <span  style="display: none;" class="more">
                        <?php echo nl2br($each['description'])?>
                    </span>
                    <button class="btn-remore">Đọc thêm</button>
                </div>
            </section>

        </div>  
    <?php endforeach;
    ?>
    <!-- <div class="footer">
        <?php
            require 'footer.php'
        ?>
    </div> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".btn-remore").click(function(){
                let btn_read_more = $(this);
                if(btn_read_more.text()== 'Đọc thêm'){
                    btn_read_more.text('Ẩn bớt');
                    btn_read_more.siblings('.less').hide();
                    $('.more').slideDown();
                    animate_body();
                }
                else{
                    btn_read_more.text('Đọc thêm');
                    
                    btn_read_more.siblings('.less').show();
                    $('.more').slideUp();
                }
            })
        })
        function animate_body(){
            $('#body').animate({
                top: '50px',
                left: '680px',  
            });
        }
    </script>  
</body>
</html>