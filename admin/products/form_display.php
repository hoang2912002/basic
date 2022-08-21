<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../products/products_css/form_display.css">
</head>
<body>
    <?php
        require '../connect.php';
        $id = $_GET['id'];
        $sql = "select  products.name as pro_name,products.description as pro_des,products.photo as pro_pho,products.price as pro_price , category.name ,
        component.monitor as com_moni,component.CPU as com_CPU,component.RAM as com_RAM,component.memory_safe as com_memo,component.camera_selfie as com_cam,manufacturers.name 
        FROM products join manufacturers on manufacturers.id = products.id_manufacturers 
        JOIN component on component.id = products.id_component
        JOIN category on category.id = products.id_category 
        WHERE products.id  = '$id'
        GROUP by category.id , products.id , component.id,manufacturers.id";
        $result = mysqli_query($connect,$sql);
        $each = mysqli_fetch_array($result);
    ?>
    <div class="page-title">
        <div class="title_left">
            <h3>Form detail product </h3>
        </div>
        
    </div>
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Information product <small><a href="./index.php?page=index">Trang chủ</a></small></h2>
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
                <div class="total">
                    <div class="detail_product">
                        <div class="div_name_product">
                            <div class="name_product">
                                <span><?php  echo $each['pro_name'] ?></span>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="div_infor_product">
                            <div class="div_photo_product">
                            <img src="../products/photo_product/<?php echo $each['pro_pho'] ?>" alt="">
                            </div>
                            <div class="div_remaining_infor_product">
                                <div class="div_price">
                                    <span><?php echo number_format($each['pro_price'],0,',','.')?>đ</span>
                                </div>
                                <div class="div_component">
                                    <table style="height: 250px">
                                        <tr>
                                            <td class="component" >Màn hình:</td>
                                            <td><span><?php echo $each['com_moni']?></span></td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="component">CPU:</td>
                                            <td><span><?php echo $each['com_CPU']?></span></td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="component">RAM:</td>
                                            <td><span><?php echo $each['com_RAM']?></span></td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="component">Memory:</td>
                                            <td><span><?php echo $each['com_memo']?></span></td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="component">Camera:</td>
                                            <td><span><?php echo $each['com_cam']?></span></td>
                                            
                                        </tr>
                                        
                                    </table>    
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="div_product_description">
                            
                            <h2 style="font-weight: bold;font-size: 25px;">Description</h2>
                            <span>
                                <?php echo $each['pro_des']?>
                            </span>
                        </div>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    
</body>
</html>