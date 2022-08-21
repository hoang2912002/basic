<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // require '../connect.php';
        // $sql = "select * from products";
        // $result = mysqli_query($connect,$sql);
        // $each = mysqli_fetch_array($result);

        // $sql = "select * from manufacturers";
        // $manufacturers = mysqli_query($connect,$sql);
        
        require '../connect.php';
        $sql = "select * from products
                ";
        $result = mysqli_query($connect,$sql);
        $each = mysqli_fetch_array($result);
        $sql = "select *from manufacturers";
        $manufacturers = mysqli_query($connect,$sql);
        $sql = "select *from category";
        $category = mysqli_query($connect,$sql);
        $sql = "select * from component";
        $component = mysqli_query($connect,$sql);
    ?>
    <!-- <form action="../products/process_insert.php" method="POST" enctype="multipart/form-data">
        Tên sản phẩm
        <input type="text" name="name">
        <br>
        Ảnh sản phẩm
        <input type="file" name="photo">
        <br>
        Gía sản phẩm
        <input type="text" name="price">
        <br>
        Mô tả 
        <textarea name="description" id="" cols="30" rows="4"></textarea>
        <br>
        Tên hãng
        <select name="id_manufacturers">
            <?php foreach ($manufacturers as $manufacturer):?>
                <option value="<?php echo $manufacturer['id']?>"
                
                <?php if($each['id_manufacturers'] == $manufacturer['id']){ ?>
                    selected  
                <?php }?>>
                    <?php echo $manufacturer['name']?>
                </option>
            <?php endforeach?>
        </select>
        <br>
        Loại sản phẩm
        <select name="id_category" id="">
            <?php foreach ($category as $categorys):?>
                <option value="<?php echo $categorys['id']?>"
                    <?php if($each['id_category'] == $categorys['id']){?>
                        selected
                    <?php }?>>
                        <?php echo $categorys['name']?>
                </option>
            <?php endforeach?>
        </select>
        <br>
        Thông số sản phẩm
        <select name="id_component" id="">
            <?php foreach($component as $components):?>
                <option value="<?php echo $categorys['id']?>"
                <?php if($each['id_component'] == $components['id']){?>
                    selected
                <?php }?>
                >
                    <?php echo $components['id']?>
                    <?php echo $components['monitor']?>
                    <?php echo $components['CPU']?>
                    <?php echo $components['RAM']?>
                    <?php echo $components['memory_safe']?>
                    <?php echo $components['camera_selfie']?>
                </option>
            <?php endforeach?>
        </select>
        <br>
        <button type="submit">Thêm </button>
    </form> -->

<div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thêm sản phẩm</h2>
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
                 <form  action="../products/process_insert.php" method="POST" enctype="multipart/form-data"> 
                <!-- <form  id="form-insert-product" method="POST" enctype="multipart/form-data">     -->
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Tên<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" name="name" type="text" >
                        </div>
                    </div>
                    <div class="field item form-group">
                        
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Ảnh</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="file" class="form-control"   name="photo">
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Giá</label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" name="price" type="text" >
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Mô tả</label>
                        <div class="col-md-6 col-sm-6">
                            <textarea class="form-control" rows="3" name="description"></textarea>
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Hãng sản xuất</label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="id_manufacturers"  class="form-control">
                                <?php foreach ($manufacturers as $manufacturer):?>
                                    <option value="<?php echo $manufacturer['id']?>"
                                    <?php if($each['id_manufacturers'] == $manufacturer['id']){ ?>
                                        selected  
                                    <?php }?>>
                                        <?php echo $manufacturer['name']?>
                                    </option>
                                <?php endforeach?>
                            </select>
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Danh mục loại</label>
                        <div class="col-md-6 col-sm-6 ">
                        <select name="id_category" id=""  class="select2_single form-control" tabindex="-1">
                            <?php foreach ($category as $categorys):?>
                                <option value="<?php echo $categorys['id']?>"
                                    <?php if($each['id_category'] == $categorys['id']){?>
                                        selected
                                    <?php }?>>
                                        <?php echo $categorys['name']?>
                                </option>
                            <?php endforeach?>
                        </select>
                        </div>
                    </div> 
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Thông số </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="id_component" id="" class="select2_single form-control" tabindex="-1">
                                <?php foreach($component as $components):?>
                                    <option value="<?php echo $components['id']?>"
                                    <?php if($each['id_component'] == $components['id']){?>
                                        selected
                                    <?php }?>
                                    >
                                        <?php echo $components['id']?>:
                                        <?php echo $components['monitor']?>
                                        <?php echo $components['CPU']?>
                                        <?php echo $components['RAM']?>
                                        <?php echo $components['memory_safe']?>
                                        <?php echo $components['camera_selfie']?>
                                    </option>
                                <?php endforeach?>
                            </select>
                        </div>
                    </div> 
                    <div class="item form-group" style="text-align: center;">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button  class="btn btn-success btn-form-insert-product"  style="width: 100px;">Thêm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    
</div> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
    <script src="https://jqueryvalidation.org/files/lib/jquery.form.js"></script>
    <script>
        $(document).ready(function(){
           $('#form-insert-product').submit(function(event){
                
                event.preventDefault();
           }) 
           $('#form-insert-product').validate({
                onfocusout: false,
                onkeyup: false,
                onclick: false,
                rules:{
                    "name":{
                        minlength: 2,
                        required: true,
                    },
                    "price":{
                        maxlength: 11,
                        required: true,
                    },
                    "description":{
                        minlength: 50,
                        required:  true,
                    },
                    
                },
                messages:{
                    "name":{
                        required: "Vui lòng nhập tên sản phẩm",
                    },
                    "price":{
                        required: "Vui lòng nhập giá sản phảm vd: 1.000.000đ",
                    },
                    "description":{
                        required:"Vui lòng nhập mô tả về sản phẩm này",
                    }
                },
                submitHandler: function () {
                    $.ajax({
                        url: "../products/process_insert.php",
                        type: "POST",
                        dataType:'html',
                        data: $('#form-insert-product').serializeArray(),
                    })
                    .done(function(response){
                        
                        console.log(1);
                        response.preventDefault()
                    })
                }
           });
        //    $('.btn-form-insert-product').click(function(e){
        //         window.location='./test2.php?page=index'
        //    })
        })
    </script>
</body>
</html>