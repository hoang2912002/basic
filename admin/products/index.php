<!-- <?php require '../check_admin.php' ?> -->
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
        // require '../menu.php';
        require '../connect.php';
        $page = 1;
        $search = '';
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        if(isset($_GET['search'])){
            $search = $_GET['search'];
        }
        // $sql_news = "select count(*) from products where name like '%$search%' GROUP BY products.id ASC";
        // $array_news = mysqli_query($connect,$sql_news);
        // $result_array = mysqli_fetch_array($array_news);
        // $news = $result_array['count(*)']; 
        
        // $news_in_1_line = 10;

        // $page_number = ceil($news/$news_in_1_line);
        // $pass_page = $news_in_1_line*($page-1);
        // $sql = "select 
        // products.*,manufacturers.name as manufacturers_name,category.name as category_name,component.id as component_id
        // from products
        // join manufacturers on manufacturers.id = products.id_manufacturers join category on category.id 
        // = products.id_category join component on component.id = products.id_component where products.name like '%$search%' or category.name like'%$search%' limit $news_in_1_line offset $pass_page 
        // ";
        //    
        
        $sql = "select 
        products.*,manufacturers.name as manufacturers_name,category.name as category_name,component.id as component_id
        from products
        join manufacturers on manufacturers.id = products.id_manufacturers join category on category.id 
        = products.id_category join component on component.id = products.id_component 
        GROUP BY products.id ASC
        ";
        $result = mysqli_query($connect,$sql);
        
        
    ?>
    <?php
        require '../menu.php'
    ?>

    <div class="col-md-12 col-sm-12 ">
        <div class="page-title">
        <div class="title_left">
            <h3>List products</h3>
        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                </div>
                <div class="btn-products" style="width: 520px; text-align: right; " >
                    <form action="">
                        <button type="button" class="btn btn-info add-product">
                            Thêm sản phẩm
                        </button>
                        <button type="button" class="btn btn-info add-category">
                            Thêm thể loại
                        </button>
                        <button type="button" class="btn btn-info add-component">
                            Thêm thông số
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <div class="x_panel">
            <div class="x_title">
            <h2>Sản phẩm</h2>
            <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            
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
                    
                    <caption>
                        <!-- <form >
                            <input type="search" name="search" value="<?php echo $search?>">
                        </form> -->
                    </caption>
                    <table  class="table table-striped table-bordered bulk_action dataTable no-footer" id="data">
                        <form>
                            <tr>
                                <td>Mã</td>
                                <td style="width:20% ;">
                                Tên sản phẩm
                                </td>
                                <td>Ảnh sản phẩm</td>
                                <td>Giá sản phẩm</td>
                                <td>Tên nhà sản xuất</td>
                                <td>Loại sản phẩm</td>
                                
                                <td>Sửa</td>
                                <td>Xóa</td>
                            </tr>
                            <?php foreach($result as $each){?>
                                <tr>
                                    <td>
                                        <span class="infor_product"><?php echo $each['id']?></span>
                                            
                                    </td>
                                    <td style="width: 20%;">
                                        <span class="infor_product">
                                            <a href="./index.php?page=form_display&id=<?php echo $each['id']?>">
                                            <?php echo $each['name']?>
                                        </a></span>
                                        
                                    </td>
                                    <td>
                                        
                                            <img src="../products/photo_product/<?php echo $each['photo']?>" alt="" style="height: 100px;">
                                        
                                        
                                    </td>
                                    <td>
                                        <span class="infor_product">
                                            <?php echo number_format($each['price'],0,',','.')?><u>đ</u>
                                        </span>
                                        
                                    </td>
                                    <td>
                                        <span class="infor_product">
                                            <?php echo $each['manufacturers_name']?>
                                        </span>
                                        
                                    </td>
                                    <td>
                                        <span class="infor_product">
                                            <?php echo $each['category_name']?>
                                        </span>
                                        
                                    </td>
                                    
                                    <td>
                                        <span class="infor_product">
                                            <a href="./index.php?page=form_update&id=<?php echo $each['id']?>"   class='bx bxs-wrench fix' ></a>

                                        </span>
                                    </td>
                                    <td>
                                        <span class="infor_product">
                                            <a href="./index.php?page=form_delete&id=<?php echo $each['id']?>"  class='bx bx-x delete'></a>
                                        </span>
                                    </td>
                                    
                                </tr>
                            <?php }?>
                        </form>
                    </table>
                    <div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable-fixed-header_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="datatable-fixed-header_previous"><a href="#" aria-controls="datatable-fixed-header" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="datatable-fixed-header" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="datatable-fixed-header" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="datatable-fixed-header" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="datatable-fixed-header" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="datatable-fixed-header" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="datatable-fixed-header" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="datatable-fixed-header_next"><a href="#" aria-controls="datatable-fixed-header" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"> </script>  
<script>  
$(document).ready (function () {  
    $('#data').after ('<div id="nav"></div>');  
    var rowsShown = 10;  
    var rowsTotal = $('#data tbody tr').length;  
    var numPages = rowsTotal/rowsShown;  
    for (i = 0;i < numPages;i++) {  
        var pageNum = i + 1;  
        $('#nav').append ('<a style=`text-decoration: none;` href="#" rel="'+i+'">'+pageNum+'</a> ');  
    }
    $('#nav a').css("text-decoration", "none");  
    $('#data tbody tr').hide();  
    $('#data tbody tr').slice (0, rowsShown).show();  
    $('#nav a:first').addClass('active');  
    $('#nav a').bind('click', function() {  
    $('#nav a').removeClass('active');
      
   $(this).addClass('active');  
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;  
        var endItem = startItem + rowsShown;  
        $('#data tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).  
        css('display','table-row').animate({opacity:1}, 300);  
        var currentPage = currPage.css(' background-color','red'); 
        
    });
    $('.add-product').click(function(event){
        window.location.href='./index.php?page=form_insert'
    })
    $('.add-category').click(function(event){
        window.location.href='./index.php?page=form_category'
    })
    $('.add-component').click(function(event){
        window.location.href='./index.php?page=form_component'
    })
});  
</script>

    <!-- <?php
            $arr = []; 
            $sql = 'select products.*, manufacturers.name as manufacturers_name,category.name as category_name,component.id as component_id
            from products
            join manufacturers on manufacturers.id = products.id_manufacturers join category on category.id 
            = products.id_category join component on component.id = products.id_component';
            $result_js = mysqli_query($connect,$sql); 
            
            foreach($result_js as $each){
            
            $arr[] = $each['id'];
            $arr[$each['id']] =[
                'name' => $each['name'],
                'photo' => $each['photo'],
                'price' => $each['price'],
                'manufacturers_name' => $each['manufacturers_name'],
                'category_name' => $each['category_name'],
                'component_id' => $each['component_id'],
            ];
            }
            $arr2 = [$arr];
        ?>   -->
</body>
</html>