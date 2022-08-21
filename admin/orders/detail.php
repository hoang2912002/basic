<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="./detail.css">
    </head>
    <body>
        <?php 
            $bill_detail = $_GET['id'];
            require '../connect.php';
            $sql = "select products.name,products.id as id_pro,products.photo,products.price,bill.*,bill_detail.quantity
            from bill_detail
            join products on products.id = bill_detail.id_product 
            join bill on bill.id = bill_detail.id_bill
            where bill_detail.id_bill = '$bill_detail'
            GROUP BY products.id,bill.id";
            $result = mysqli_query($connect,$sql);
            $each1 = mysqli_fetch_array($result);
            $sum = 0;
        ?>
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Information bill</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Settings 1</a>
                    <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <span class="section">Detail bill</span>
                    <?php foreach($result as $each):?>
                        <div class="div-bill-detail">
                            <div class="div-sub-bill-detail">
                                <div class="div-product">
                                    <div class="div-photo-product">
                                        <img src="../products/photo_product/<?php echo $each['photo']?>">
                                    </div>
                                    <div class="div-infor-product">
                                        <div class="div-name-product"><?php echo $each['name']?></div>
                                        <div class="div-price-product">Giá: <?php echo number_format($each['price'],0,",",".")?>đ</div>
                                        <div class="div-quantity-product">Số lượng: <?php echo $each['quantity']?></div>
                                        <div class="div-result-price-product">
                                            <?php 
                                                $result_price = $each['price']*$each['quantity']; 
                                                $sum += $result_price;
                                            ?>
                                        </div>
                                        <div class="div-status">
                                            Trạng thái: 
                                            <?php
                                                switch($each['status']){
                                                    case '0': echo 'Mới đặt';break; 
                                                    case '1': echo 'Đã duyệt';break;
                                                    case '2': echo 'Đã hủy'; break;
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                    <?php endforeach?>
                    <div class="ln_solid"></div>
                    <div class="div-infor-customer">
                        <div class="div-sub-infor-customer">
                            <div class="Total-price-bill">
                                <div class="text-price"><span> Tổng đơn hàng:</span></div>  
                                <div class="bill-price"><span> <?php echo number_format($sum,0,",",".")?>đ</span></div>

                                <hr>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 " style="margin-top: 20px;">Tên người nhận: </label>
                                <div class="col-md-7 col-sm-7 cus-infor" style="margin-top: 20px;">
                                    <input type="text" class="form-control" disabled="disabled" value="<?php echo $each1['name_receiver']?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 ">Số điện thoại:</label>
                                <div class="col-md-7 col-sm-7 cus-infor">
                                    <input type="text" class="form-control" disabled="disabled" value="<?php echo $each1['phone_receiver']?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 ">Địa chỉ người nhận:</label>
                                <div class="col-md-7 col-sm-7 cus-infor" >
                                    <input type="text" class="form-control" disabled="disabled" value="<?php echo $each1['address_receiver']?>">
                                </div>
                            </div>
                        </div>
                        
                            <!-- <div class="div-infor-name">
                                <?php echo $each1['name_receiver']?>
                            </div>
                            <div class="div-infor-phone">
                                <?php echo $each1['phone_receiver']?>
                            </div>
                            <div class="div-infor-address">
                                <?php echo $each1['address_receiver']?>
                            </div> -->
                            
                        
                    </div>
                </div>
                
            </div>
        </div>
        
    </body>

</html>
