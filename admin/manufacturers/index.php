<?php
    require '../check_super_admin.php';
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
        $search ='';
        $page = 1;
        if(isset($_GET['search'])){
            $search = $_GET['search'];
        }
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        
        $sql_news = "select count(*) from manufacturers where name like '%$search%'";
        $array_news = mysqli_query($connect,$sql_news);
        $result_array = mysqli_fetch_array($array_news);
        $news = $result_array['count(*)'];
        $n_i1l = 18;

        $page_number = ceil($news/$n_i1l);
        $pass = $n_i1l*($page-1);
        $sql = "select * from manufacturers 
        where name like '%$search%' limit $n_i1l offset $pass";
        $result = mysqli_query($connect,$sql);
    ?>
    <div class="menu" style="margin-top: 10px; width: 200px;height: 70px; display: none;">
    <?php
        require_once '../menu.php';
        
        
    ?>
    </div>
    <br>
    <!-- <a href="form_insert.php">Thêm hãng </a>
    <caption>
        <form action="">
            <input type="search" name="search" value="<?php echo $search?>">
        </form>
    </caption> -->
    <!-- <table border="1" style="width: 100%;">
        <tr>
            <td>
                Mã
            </td>
            <td>Tên hãng</td>
            <td>Số điện thoại liên hệ</td>
            <td>Địa chỉ</td>
            <td>Ảnh</td>
            <td>Sửa thông tin hãng</td>
            <td>Xóa thông tin hãng</td>
        </tr>
        <?php foreach($result as $each): ?>
        <tr>
            <td><input type="number" name="id" value="<?php echo $each['id']?>"></td>
            <td><input type="text" name="name" value="<?php echo $each['name']?>"></td>
            <td><input type="number" name="phone" value="<?php echo $each['phone']?>"></td>
            <td><input type="text" name="address" value="<?php echo $each['address']?>"></td>
            <td>
                <img src="photos_manufacturers/<?php echo $each['photo']?>" alt=""  style="height: 100px;width: 100px; object-fit: scale-down;">
            </td>
            <td>
                <a href="form_update.php?id=<?php echo $each['id']?>">Sửa</a>
            </td>
            <td>
                <a href="form_delete.php?id=<?php echo $each['id']?>">Xóa</a>
            </td>
        </tr>
        <?php endforeach?>
    </table> -->
    <!-- <?php for($i=1; $i<=$page_number;$i++){?>
        <a href="?page=<?php echo $i?>&search=<?php echo $search?>">
            <?php echo $i?>
        </a>
    <?php }?> -->
        
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Hãng sản xuất</h2>
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
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        
                        <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap no-footer">
                            <div class="row">            
                                <div class="col-sm-12">
                                    <div class="page-title">
                                        <div class="title_left">
                                            <div class="col-md-5 col-sm-5   form-group row pull-right top_search">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Search for...">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default" type="button">Go!</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="title_right" style="text-align: right;"> 
                                                <button type="button" class="btn btn-success btn-click">Thêm hãng</button>
                                        </div>
                                    </div>
                                                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable" class="table table-striped table-bordered dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="datatable_info">
                                        <thead>
                                            <tr role="row">
                                                <th style="width: 308px;">ID</th>
                                                <th style="width: 304px;">Tên hãng</th>
                                                <th style="width: 300px;">Số liên hệ</th>
                                                <th style="width: 271px;">Xuất xứ</th>
                                                <th style="width: 350px;">Biểu tượng</th>
                                                <th style="width: 100px;">Sửa</th>
                                                <th style="width: 100px;">Xóa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($result as $each):?>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">#<?php echo $each['id']?></td>
                                                    <td><?php echo $each['name']?></td>
                                                    <td><?php echo $each['phone']?></td>
                                                    <td><?php echo $each['address']?></td>
                                                    <td><img src="../manufacturers/photos_manufacturers/<?php echo $each['photo']?>" style="height: 50px;" alt=""></td>
                                                    <td><a href="../manufacturers/form_update.php?id=<?php echo $each['id']?>" class="bx bxs-wrench fix"></a></td>
                                                    <td><a href="../manufacturers/form_delete.php?id=<?php echo $each['id']?>"  class='bx bx-x delete'></a></td>
                                                </tr>
                                            <?php endforeach?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1/1</div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button previous disabled" id="datatable_previous">
                                                <a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0">Previous</a>
                                            </li>
                                            <li class="paginate_button active">
                                                <a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0">1</a>
                                            </li>
                                            <li class="paginate_button ">
                                                <a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0">2</a>
                                            </li>
                                            <li class="paginate_button ">
                                                <a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0">3</a>
                                            </li>
                                            <li class="paginate_button ">
                                                <a href="#" aria-controls="datatable" data-dt-idx="4" tabindex="0">4</a>
                                            </li>
                                            <li class="paginate_button ">
                                                <a href="#" aria-controls="datatable" data-dt-idx="5" tabindex="0">5</a>
                                            </li>
                                            <li class="paginate_button ">
                                                <a href="#" aria-controls="datatable" data-dt-idx="6" tabindex="0">6</a>
                                            </li>
                                            <li class="paginate_button next" id="datatable_next">
                                                <a href="#" aria-controls="datatable" data-dt-idx="7" tabindex="0">Next</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.btn-click').click(function(e){                
                window.location='./index.php?page3=form_insert';
                //e.preventDefault();
            });
        })
    </script>

</body>
</html>