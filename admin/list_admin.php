<?php
    require '../check_super_admin.php'
?>
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
        require '../connect.php';
        $sql ="select * from admin";
        $result= mysqli_query($connect,$sql);
    ?>
    
    <div class="col-md-12 col-sm-12 ">  </div>

    <div class="page-title">
        <div class="title_left">
            <h3>Account admin</h3>
        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                <div class="div-btn-insert-admin" style="width: 100%;text-align: right; padding-right: 8px;">
                        <button class="btn btn-primary btn-insert-admin">Thêm admin</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <h2>List account</small></h2>
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
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 80px; text-align: center;">ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Level</th>
                            <th style="width: 80px; text-align: center;">Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $each):?>
                            <tr>
                                <td style="text-align: center;"> <?php echo $each['id']?></td>
                                <td> <?php echo $each['name']?></td>
                                <td> <?php echo $each['email']?></td>
                                <td> <?php echo $each['password']?></td>
                                <td> <?php echo $each['level']?></td>
                                <?php if($each['level']!=1) {?>
                                <td style="text-align: center;"><a style="font-size: 18px;" href="./index.php?page5=update_account_admin&id=<?php echo $each['id']?>"  class='bx bxs-wrench'></a></td>
                                <?php }?>
                            </tr>
                        <?php endforeach?>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"> </script>  
    <script>
        $(document).ready(function(){
            $('.btn-insert-admin').click(function(event){
                window.location='./index.php?page5=insert_admin';
            })
            $('.btn-update-admin').click(function(event){
                window.location='./index.php?page5=update_account_admin';
            })
        })
    </script>
</body>
</html>