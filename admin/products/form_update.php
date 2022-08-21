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
        require '../menu.php';
        if(empty($_GET['id']))
        {
            header('location:index.php?error=Vui lòng điền mã để sửa thông tin');
            exit;
        }

        $id = $_GET['id'];
        require '../connect.php';
        $sql = "select * from products
                where id = '$id'";
        $result = mysqli_query($connect,$sql);
        $each = mysqli_fetch_array($result);

        $sql = "select * from manufacturers";
        $manufacturers = mysqli_query($connect,$sql);

        $sql = "select * from category";
        $category = mysqli_query($connect,$sql);

        $sql = "select * from component";
        $component = mysqli_query($connect,$sql);
    ?>
    <form action="../products/process_update.php" method="POST"  enctype="multipart/form-data">
        <table>
            <tr>
                <input type="text" name="id" value="<?php echo $each['id']?>">
            </tr>
            <tr>
                <td>Tên sản phẩm</td>
                <td>
                    <input type="text" name="name" value="<?php echo $each['name']?>">
                </td>
            </tr>
            <tr>
                <td>Ảnh mới</td>
                <td>
                    <input type="file" name="photo_new">
                </td>
            </tr>
            <tr>
                <td>Ảnh cũ</td>
                <td>
                    <img src="photo_product/<?php echo $each['photo']?>" alt="" style="height: 100px;">
                    <input type="hidden" name="photo_old" value="<?php echo $each['photo']?>">
                </td>
            </tr>
            
            <tr>
                <td>Mô tả sản phẩm</td>
                <td><textarea name="description" id="" cols="30" rows="10"><?php echo $each['description']?></textarea></td>
            </tr>
            <tr>
                <td>Tên nhà sản xuất</td>
                <td>
                    <select name="id_manufacturers" id="">
                    <?php foreach($manufacturers as $manufacturer):?>
                        <option value="<?php echo $manufacturer['id']?>"
                        <?php if($manufacturer['id']==$each['id_manufacturers'])?>
                            selected
                        >
                            <?php echo $manufacturer['name']?>
                        </option>
                    <?php endforeach?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Loại sản phẩm</td>
                <td>
                    <select name="id_category" id="">
                        <?php foreach ($category as $categorys):?>
                            <option value="<?php echo $categorys['id']?>"
                            <?php if($categorys['id']==$each['id_category'])?>
                                selected>
                                <?php echo $categorys['name']?>
                            </option>
                        <?php endforeach?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Thông số sản phẩm</td>
                <td>
                    <select name="id_component" id="">
                            <?php foreach ($component as $components):?>
                                <option value="<?php echo $components['id']?>"
                                <?php if($components['id']==$each['id_component'])?>
                                    selected>
                                    <?php echo $components['id']?>
                                    <?php echo $components['monitor']?>
                                    <?php echo $components['CPU']?>
                                    <?php echo $components['RAM']?>
                                    <?php echo $components['memory_safe']?>
                                    <?php echo $components['camera_selfie']?>
                                </option>
                            <?php endforeach?>
                        </select>
                </td>
            </tr>
            <tr>
                <td>Giá sản phẩm</td>
                <td>
                    <input type="text" name="price" value="<?php echo $each['price']?>">
                </td>
            </tr>
        </table>
        <button type="submit">Sửa</button>
    </form>
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Form Basic Elements <small>different form elements</small></h2>
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
                <br>
                <form class="form-horizontal form-label-left" action="../products/process_update.php" method="POST"  enctype="multipart/form-data">
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">ID</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control"   name="id" value="<?php echo $each['id']?>">
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Tên</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control"  name="name" value="<?php echo $each['name']?>">
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Ảnh mới</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="file" class="form-control"  name="photo_new" >
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Ảnh cũ</label>
                        <div class="col-md-9 col-sm-9 ">
                            <img src="../products/photo_product/<?php echo $each['photo']?>" alt="" style="height: 100px;">
                            <input type="hidden" class="form-control"  name="photo_old" value="<?php echo $each['photo']?>">
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Giá</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control"  name="price" value="<?php echo ($each['price'])?>">
                        </div>
                    </div>
                    

                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Mô tả sản phẩm </label>
                        <div class="col-md-9 col-sm-9 ">
                            <textarea  class="form-control" rows="10" name="description"><?php echo $each['description']?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Hãng</label>
                        <div class="col-md-9 col-sm-9 ">
                        <select class="select2_group form-control" name="id_manufacturers">
                            <?php foreach($manufacturers as $manufacturer):?>
                                <option value="<?php echo $manufacturer['id']?>"
                                <?php if($manufacturer['id']==$each['id_manufacturers'])?>
                                    selected
                                >
                                    <?php echo $manufacturer['name']?>
                                </option>
                            <?php endforeach?>

                        </select>   
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Loại sản phẩm</label>
                        <div class="col-md-9 col-sm-9 ">
                            <select class="select2_group form-control" name="id_category">
                                <?php foreach($category as $categorys):?>
                                    <option value="<?php echo $categorys['id']?>"
                                    <?php if($categorys['id']==$each['id_category'])?>
                                        selected
                                    >
                                        <?php echo $categorys['name']?>
                                    </option>
                                <?php endforeach?>

                            </select>   
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Thông số sản phẩm</label>
                        <div class="col-md-9 col-sm-9 ">
                        <select class="select2_group form-control" name="id_component">
                            <?php foreach($component as $components):?>
                                <option value="<?php echo $components['id']?>"
                                <?php if($components['id']==$each['id_component'])?>
                                    selected
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
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                            <button type="button" class="btn btn-primary btn-cancel-update">Cancel</button>
                            <button type="submit" class="btn btn-success btn-submit-update">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"> </script>  
    <script>
        $(document).ready(function(){
            $('.btn-cancel-update').click(function(event){
                window.location="index.php?page=index";
            })
            $('.btn-submit-update').click(function(event){

            })
        })
    </script>
</body>
</html>