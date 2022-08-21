<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./manufacturers_css/form_insert.css">
</head>
<body>
    <?php
        require '../connect.php';
        $sql = "select * from manufacturers"
    ?>
    <div class="insert">
        <h2>Thêm thông tin nhà sản xuất </h2>
        <div class="span">
            
            <?php
                require_once '../menu.php';
            ?>
        </div>
        <table  style="width: 90%;height: 70%">
        <form action="../manufacturers/process_insert.php" method="POST" enctype="multipart/form-data">
            <tr>
                <td><span class="name">Tên nhà sản xuất</span></td>
                <td><input type="text" name="name" class="input"></td>
            </tr>
            <tr>
                <td><span class="name">Số điện thoại liên hệ</span></td>
                <td><input type="number" name="phone" class="input"></td>
            </tr>
            <tr>
                <td><span class="name">Địa chỉ</span></td>
                <td><input type="text" name="address" class="input"></td>
            </tr>
            <tr>
                <td><span class="name">Ảnh</span></td>
                <td><input type="file" name="photo" class="input"></td>
            </tr>
            <button type="submit">Thêm thông tin</button>
        
        </form>
        </table>
    </div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thêm thông tin nhà sản xuất </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a class="dropdown-item" href="#">Settings 1</a>
                            </li>
                            <li><a class="dropdown-item" href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                <li>
                    <a class="close-link">
                        <i class="fa fa-close"></i>
                    </a>
                </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" action="../manufacturers/process_insert.php" method="POST" enctype="multipart/form-data">
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tên nhà sản xuất</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="name"required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Số điện thoại liên hệ<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="number" name="phone" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Địa chỉ</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input  class="form-control" type="text" name="address">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Ảnh</label>
                        <div class="col-md-6 col-sm-6 " >
                            <input  class="form-control" type="file" name="photo" style="height: 44px;">
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button class="btn btn-primary btn-cancel-form-insert-manu" type="button">Cancel</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.btn-cancel-form-insert-manu').click(function(event){
                window.location='./index.php?page3=index';
            })
        })
    </script>
</body>
</html>