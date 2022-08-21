<?php
    require '../connect.php';
    $sql = "SELECT COUNT(id) as count_cus FROM customers";
    $result_count_cus = mysqli_query($connect,$sql);
    $each_total_cus = mysqli_fetch_array($result_count_cus);

    $sql="SELECT COUNT(id) AS count_cus FROM customers where gender like 'Nam'";
    $result_count_cus_male = mysqli_query($connect,$sql);
    $each_total_cus_male = mysqli_fetch_array($result_count_cus_male);

    $sql="SELECT COUNT(id) AS count_cus FROM customers where gender like 'Nữ'";
    $result_count_cus_female = mysqli_query($connect,$sql);
    $each_total_cus_female = mysqli_fetch_array($result_count_cus_female);

    //Total bill
    $sql = "SELECT AVG(id) as average from bill
    where status = 1";
    $result_total_bill = mysqli_query($connect,$sql);
    $each_total_bill = mysqli_fetch_array($result_total_bill);

    //Total bill in 1 month ago
    $sql =" SELECT AVG(id) as average from bill
    where status = 1 and date_format(date_sub(NOW(), INTERVAL 1 MONTH),'%c-%Y') ";
    $result_total_bill_1m = mysqli_query($connect,$sql);
    $each_total_bill_1m = mysqli_fetch_array($result_total_bill_1m);
?>


<div class="row" style="display: inline-block;">
<div class="tile_count" style="text-align: center;">
<div class="col-md-2 col-sm-4  tile_stats_count">
<span class="count_top"><i class="fa fa-user"></i> Total Users</span>
<div class="count"><?php echo $each_total_cus['count_cus']?></div>
</div>

<div class="col-md-2 col-sm-4  tile_stats_count">
<span class="count_top"><i class="fa fa-user"></i> Total Males</span>
<div class="count green"><?php echo $each_total_cus_male['count_cus']?></div>

</div>
<div class="col-md-2 col-sm-4  tile_stats_count">
<span class="count_top"><i class="fa fa-user"></i> Total Females</span>
<div class="count blue"><?php echo $each_total_cus_female['count_cus']?></div>

</div>
<div class="col-md-2 col-sm-4  tile_stats_count" style="width: 400px;text-align: center;">
<span class="count_top"><i class="fa fa-user"></i> Total Bill Success</span>
<div class="count"><?php echo $each_total_bill['average']?></div>
</div>
<div class="col-md-2 col-sm-4  tile_stats_count">
<span class="count_top"><i class="fa fa-user"></i> Total Bill</span>
<div class="count"><?php echo $each_total_bill_1m['average']?></div>
<span class="count_bottom"><i class="green">From last month</span>
</div>

</div>
</div>
<?php 
    require '../menu.php'
    
?>
<div class="row">
<div class="col-md-6 col-sm-6 ">
<div class="dashboard_graph">
<div class="row x_title">
<div class="col-md-6">
<h3>Biểu đồ thống kê</h3>
</div>
</div>
<div class="col-md-12 col-sm-12 ">
    <?php
        require '../orders/chart_line.php'
    ?>
</div>

<div class="clearfix"></div>
</div>
</div>
<div class="col-md-6 col-sm-6 ">
    <div class="dashboard_graph">
        <div class="row x_title">
            <div class="col-md-6">
                <h3>Danh sách sản phẩm bán chạy</h3>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 ">
            <?php
                require '../orders/list_top_bill.php'
            ?>
        </div>

    <div class="clearfix"></div>
    </div>
</div>
</div>
<br>
<div class="row">
    <div class="col-md-4 col-sm-4 ">
        <div class="x_panel tile fixed_height_320">
            <div class="x_title">
                <h2>App Versions</h2>
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
                <?php require '../customer/list_top_customer.php'?>
            </div>
        </div>
    </div>
<div class="col-md-4 col-sm-4 ">
<div class="x_panel tile fixed_height_320 overflow_hidden">
<div class="x_title">
<h2>Device Usage</h2>
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
<table class="" style="width:100%">
<tbody><tr>
<th style="width:37%;">
<p>Top 5</p>
</th>
<th>
<div class="col-lg-7 col-md-7 col-sm-7 ">
<p class="">Device</p>
</div>
<div class="col-lg-5 col-md-5 col-sm-5 ">
<p class="">Progress</p>
</div>
</th>
</tr>
<tr>
<td><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
<canvas class="canvasDoughnut" height="140" width="140" style="margin: 15px 10px 10px 0px; width: 140px; height: 140px;"></canvas>
</td>
<td>
<table class="tile_info">
<tbody><tr>
<td>
<p><i class="fa fa-square blue"></i>IOS </p>
</td>
<td>30%</td>
</tr>
<tr>
 <td>
<p><i class="fa fa-square green"></i>Android </p>
</td>
<td>10%</td>
</tr>
<tr>
<td>
<p><i class="fa fa-square purple"></i>Blackberry </p>
</td>
<td>20%</td>
</tr>
<tr>
<td>
<p><i class="fa fa-square aero"></i>Symbian </p>
</td>
<td>15%</td>
</tr>
<tr>
<td>
<p><i class="fa fa-square red"></i>Others </p>
</td>
<td>30%</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</div>
</div>
</div>
<div class="col-md-4 col-sm-4 ">
<div class="x_panel tile fixed_height_320">
<div class="x_title">
<h2>Quick Settings</h2>
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
<div class="dashboard-widget-content">
<ul class="quick-list">
<li><i class="fa fa-calendar-o"></i><a href="#">Settings</a>
</li>
<li><i class="fa fa-bars"></i><a href="#">Subscription</a>
</li>
<li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
<li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
</li>
<li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
<li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
</li>
<li><i class="fa fa-area-chart"></i><a href="#">Logout</a>
</li>
</ul>
<div class="sidebar-widget">
<h4>Profile Completion</h4>
<canvas width="150" height="80" id="chart_gauge_01" class="" style="width: 160px; height: 100px;"></canvas>
<div class="goal-wrapper">
<span id="gauge-text" class="gauge-value pull-left">3,200</span>
<span class="gauge-value pull-left">%</span>
<span id="goal-text" class="goal-value pull-right">100%</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-4 col-sm-4 ">
<div class="x_panel">
<div class="x_title">
<h2>Recent Activities <small>Sessions</small></h2>
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
<div class="dashboard-widget-content">
<ul class="list-unstyled timeline widget">
<li>
<div class="block">
<div class="block_content">
<h2 class="title">
<a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
</h2>
<div class="byline">
<span>13 hours ago</span> by <a>Jane Smith</a>
</div>
<p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
</p>
</div>
</div>
</li>
<li>
<div class="block">
<div class="block_content">
<h2 class="title">
<a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
</h2>
<div class="byline">
<span>13 hours ago</span> by <a>Jane Smith</a>
</div>
<p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
</p>
</div>
</div>
</li>
<li>
<div class="block">
<div class="block_content">
<h2 class="title">
<a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
</h2>
<div class="byline">
<span>13 hours ago</span> by <a>Jane Smith</a>
</div>
<p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
</p>
</div>
</div>
</li>
<li>
<div class="block">
<div class="block_content">
<h2 class="title">
<a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
</h2>
<div class="byline">
<span>13 hours ago</span> by <a>Jane Smith</a>
</div>
 <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
</p>
</div>
</div>
</li>
</ul>
</div>
</div>
</div>
</div>
<div class="col-md-8 col-sm-8 ">
<div class="row">
<div class="col-md-12 col-sm-12 ">
<div class="x_panel">
<div class="x_title">
<h2>Visitors location <small>geo-presentation</small></h2>
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
<div class="dashboard-widget-content">
<div class="col-md-4 hidden-small">
<h2 class="line_30">125.7k Views from 60 countries</h2>
<table class="countries_list">
<tbody>
<tr>
<td>United States</td>
<td class="fs15 fw700 text-right">33%</td>
</tr>
<tr>
<td>France</td>
<td class="fs15 fw700 text-right">27%</td>
</tr>
<tr>
<td>Germany</td>
<td class="fs15 fw700 text-right">16%</td>
</tr>
<tr>
<td>Spain</td>
<td class="fs15 fw700 text-right">11%</td>
</tr>
<tr>
<td>Britain</td>
<td class="fs15 fw700 text-right">10%</td>
</tr>
</tbody>
</table>
</div>
<div class="row">

<div class="col-md-6 col-sm-6 ">
<div class="x_panel">
<div class="x_title">
<h2>To Do List <small>Sample tasks</small></h2>
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
<div class="">
<ul class="to_do">
<li>
<p>
<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Schedule meeting with new client </p>
</li>
<li>
<p>
<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Create email address for new intern</p>
</li>
<li>
<p>
<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Have IT fix the network printer</p>
</li>
<li>
<p>
<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Copy backups to offsite location</p>
</li>
<li>
<p>
<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Food truck fixie locavors mcsweeney</p>
</li>
<li>
<p>
<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Food truck fixie locavors mcsweeney</p>
</li>
<li>
<p>
<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Create email address for new intern</p>
</li>
<li>
<p>
<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Have IT fix the network printer</p>
</li>
<li>
<p>
<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Copy backups to offsite location</p>
</li>
</ul>
</div>
</div>
</div>
</div>


    <div class="col-md-6 col-sm-6 ">
    <div class="x_panel">
    <div class="x_title">
    <h2>Daily active users <small>Sessions</small></h2>
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

    </div>
    </div>
    </div>

</div>
</div>
</div>
</div>