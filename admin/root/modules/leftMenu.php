<?php
    require '../connect.php';
    
?>
<div class="col-md-3 left_col">
    <div class="left_col scroll-view" >
    <div class="navbar nav_title" style="border: 0;">
        <a href="index.php?page1=index" class="site_title"><i class='bx bx-credit-card' ></i>&nbsp;&nbsp;<span>Admin page</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix profile_admin">
        <div class=" profile_picture" >
            <div class="div_icon_pic_admin">
                <i  class=" bx bx-user icon_pic_admin"></i>
            </div>
            
            
        </div>
        <div class="profile_infor_admin">
            <div class="span_sub_infor" >Welcome,</div>
            <div class="span_name_admin"><?php
                echo $_SESSION['name']?>
            </div>
        </div>
    </div>
    <!-- /menu profile quick info -->

    <br />
    <!-- /sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
            
            <ul class="nav side-menu">
            <li><a href="index.php?page1=index"><i class="fa fa-home"></i> Home </a>
            </li>
            <li><a><i class="fa fa-edit"></i>Sản phẩm<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                <li><a href="index.php?page=index">Quản lý danh danh sách sản phẩm</a></li>
                <li><a href="index.php?page=form_insert">Thêm sản phẩm</a></li>
                <li><a href="index.php?page=form_category">Thêm loại sản phẩm</a></li>
                <li><a href="index.php?page=form_component">Thêm thông số sản phẩm</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-desktop"></i>Hóa đơn<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                <li><a href="index.php?page2=index">Orders</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-table"></i>Admin<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="index.php?page5=list_admin">Quản lý admin</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-bar-chart-o"></i>Khách hàng<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                <li><a href="index.php?page4=index">Tài khoản</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-clone"></i>Hãng sản xuất<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                <li><a href="index.php?page3=index">Danh sách nhãn hàng</a></li>
                
                </ul>
            </li>
            </ul>
        </div>
        

    </div>
<!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
            <span class="glyphicon glyphicon-off" aria-hidde    n="true"></span>
        </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>