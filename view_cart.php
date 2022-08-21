<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./folder_css/view_cart.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./folder_css/fs.css">
    <style>
        .div{
            width: 40px;
            height: 40px;
            display: inline-block;
            position: relative;
            background-color:blue ;
            transform: translateX(100px);
            list-style-type: none;
        }
    </style>
</head>
<body>
    <?php require 'header_menu.php' ?>
    <div id="body" >
        <span class="cart-empty-product" style="<?php if(!empty($_SESSION['cart'])){?> display: none;<?php }?>">
            <h2 >Giỏ hàng bạn trống</h2>
            <a href="users.php">Trang chủ</a> 
        </span>
                
            <?php  if(!empty($_SESSION['cart'])){?>
                <?php
                    $cart = $_SESSION['cart'];
                    $sum =0;
                    $result_total=0;
                    $count =0;
                    $arr_count =[];
                ?>
                <h1 class="title_cart" style="<?php if(empty($_SESSION['cart'])){?> display: none;<?php }?>" >Giỏ hàng</h1>
                <?php foreach($cart as $id =>$each):?>
                    <div class="cart_total"> 
                            
                            <div class="img_cart">
                                <img class="img" src="./admin/products/photo_product/<?php echo $each['photo']?>" alt="">
                            </div>
                            <div class="cart_infor">
                                <div class="cart_name">
                                    <?php echo $each['name']?>
                                </div>
                                <div class="cart_price">
                                    <?php echo number_format($each['price'],0,",",".")?><u>đ</u>
                                </div>
                                <div class="cart_quantity">
                    
                                    <p>Chọn số lượng</p>
                                    <div class="quantity_upd">
                                        <button class="btn-update-quantity" data-id="<?php echo $id?>" data-type="0">-</button>
                                        
                                        <span class="span_quantity" style="color: black ;">
                                            <?php echo $each['quantity']?>
                                        </span>
                                        <button class="btn-update-quantity" data-id="<?php echo $id?>" data-type="1">+</button>
                                        
                                    </div>
                                    
                                </div>
                                <div class="event">
                                        <span>-Chương trình khuyến mại:</span>
                                        <ul>
                                            <li>
                                                <i class='bx bx-wifi-0 dop'></i> [HOT] Thu cũ lên đời giá cao - Thủ tục nhanh - Trợ giá lên tới 1.000.000đ
                                            </li>
                                            <li>
                                                <i class='bx bx-wifi-0 dop'></i> Nhập mã CPSONL500
                                                - Giảm thêm 500k khi thanh toán qua VNPay trên website hoặc CPS500 qua QR Offline tại cửa hàng
                                            </li>
                                        </ul>
                                    </div>
                                <?php 
                                
                                ?>
                            </div>
                                <button style="height: 30px;" class="btn-delete" data-id="<?php echo $id?>"><i class='bx bx-x '></i></button>
                                <!-- <a href="form_delete_cart.php?id=<?php echo $id?> " class='bx bx-x close'></a> -->
                            <span class="span_sum" style="color: black; display: none;"> 
                                <?php  ($result_price = $each['price'] * $each['quantity']);
                                    $result_price1 = (double)($result_price);
                                    echo $result_price1;
                                    $result_total += $result_price;
                                ?>
                            </span>
                    </div>  
                            
                    <?php
                        $count++;
                        endforeach
                    ?>
                        <span class="count_cart" style="color: black; display:none">
                            <?php
                                echo $count;
                            ?>
                        </span>
                        <?php 
                            // $arr_count[]= $count;
                        ?>
                    <div class="total_receiver">
                        <div class="total_price">
                            <span>Tổng tiền hóa đơn:</span>
                            <span class="sum_price" style="text-align: right;">    
                                <?php 
                                    $sum += $result_total;
                                    echo number_format($sum,0,",",".")?>đ
                            </span  >
                        </div>
                        <?php
                            $id = $_SESSION['id'];
                            require './admin/connect.php';
                            require './notice.php';
                            $sql = "select * from customers where id= '$id'";
                            $result = mysqli_query($connect,$sql);
                            $each = mysqli_fetch_array($result);
                        ?>
                        <div class="receiver_infor">
                            <form action="process_check_out.php" method="POST">
                                <div class="receiver_1">
                                    <h3>Thông tin người nhận:</h3>
                                    <span>Tên người nhận</span>
                                    <input class="infor" type="text" name="name_receiver" value="&nbsp;<?php echo $each['first_name']?><?php echo $each['last_name']?>">
                                    <span>Số điện thoại người nhận</span>
                                    <input class="infor" type="number" name="phone_receiver" value="<?php echo $each['phone_number']?>">
                                    <span>Địa chỉ người nhận</span>
                                    <input class="infor" type="text" name="address_receiver" value="&nbsp;<?php echo $each['address']?>">
                                </div>
                                <div class="emty"></div>
                                <div class="submit">
                                    <button class="btn-submit-cart" type="submit">ĐẶT HÀNG</button>
                                    <div class="more_product">
                                        <a class="a-link" href="users.php">Thêm sản phẩm</a>
                                    </div>
                                </div>
                            </form>
                        </div>    
                    </div>
                
            <?php }?> 
        
    </div> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.btn-update-quantity').click(function(){
                let btn = $(this);
                let id = btn.data('id');
                let type = parseInt(btn.data('type'));
                var fadeTime = 300;
                $.ajax({
                    url: 'update_quantity.php',
                    data: {id,type},
                    type: 'GET',
                    dataType: '',
                })
                .done(function(){
                    let parent_body = btn.parents("#body");
                    let parent_cart_total = btn.parents('.cart_total');
                    let count_cart = parent_body.find('.count_cart').text();
                    let price = parseFloat(parent_cart_total.find('.cart_price').text());
                    let quantity = parent_cart_total.find('.span_quantity').text();
                    if(type == 1){
                        quantity++;
                    }
                    else{
                        quantity--;
                        console.log(count_cart);
                        console.log(count_cart);
                    }
                    if(quantity === 0){
                        parent_cart_total.remove();
                        count_cart--;
                        if(count_cart<0){
                            count_cart =0;
                        }
                        //parent_body.find('.count_cart').pus = count_cart;
                        $('.count_cart').text(count_cart);
                        if(count_cart===0){
                            $('.total_receiver').hide();
                            $('.cart-empty-product').show();console.log(9);
                            $('.title_cart').hide();
                        }
                    }
                    else{
                        parent_cart_total.find('.span_quantity').text(quantity);
                        let  total_product = price * quantity;
                        parent_cart_total.find('.span_sum').text(total_product);
                    };
                    getTotal();
                })
            })
            $('.btn-delete').click(function(){
                let btn = $(this);
                let parent_body = btn.parents('#body');
                let id = btn.data('id');
                let count_cart = parent_body.find('.count_cart').text();
                let arr_cnt =[];
                $.ajax({
                    url: 'form_delete_cart.php',
                    data: {id},
                    type: 'GET',
                })
                .done(function(){
                    //parent_body.find('.cart_total').remove();
                    btn.parents('.cart_total').remove();
                    count_cart--;
                    $('.count_cart').text(count_cart);
                    console.log(count_cart);
                    if(count_cart===0){
                            $('.total_receiver').hide();
                            $('.cart-empty-product').show();
                            console.log(9);
                            $('.title_cart').hide();
                    };
                    getTotal();
                });
            })
        });
        function getTotal(){
            let sum = 0;
            let total =0;let c = 0;
            let i;
            $('.span_sum').each(function(){
                total += parseFloat($(this).text());
                sum += (total);
            });
            $('.sum_price').text((total.toFixed(3))+'.000'+ ('đ'));
        }
    </script>
    
</body>
</html>