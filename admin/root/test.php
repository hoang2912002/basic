<?php
  require '../check_admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../admin.css/index_root.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./index_root.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <?php
        
        // require '../menu.php';
        require '../connect.php';
        $sql = "  select  DISTINCT bill_detail.id_bill, bill_detail.quantity,bill.*,customers.first_name,customers.last_name,customers.phone_number,customers.address
        from bill_detail
        join bill ON bill_detail.id_bill = bill.id join customers on customers.id = bill.id_customer ";
        $customer = mysqli_query($connect,$sql);
        $sum = 0;
    ?>

    <div class="header"><span> <?php  echo  $_SESSION['name']; require './logo.php'?></span></div>
    <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
    <label for="openSidebarMenu" class="sidebarIconToggle">
        <div class="spinner diagonal part-1"></div>
        <div class="spinner horizontal"></div>
        <div class="spinner diagonal part-2"></div>
    </label>
    
    <div class="container">
        <h2>Dynamic Tabs</h2>
        <p>To make the tabs toggleable, add the data-toggle="tab" attribute to each link. Then add a .tab-pane class with a unique ID for every tab and wrap them inside a div element with class .tab-content.</p>
        <ul class="nav nav-tabs">
            <li><a   data-toggle="tab" href="#menu1">Trang quản lý sản phẩm</a><hr></li>
            <li><a  data-toggle="tab" href="#menu2">Quản lý đơn hàng</a><hr></li>
            <li><a  data-toggle="tab" href="#menu3">Trang quản lý hãng</a><hr></li>
            <li><a  data-toggle="tab" href="#">Quản lý admin</a><hr></li>
            <li><a  data-toggle="tab" href="#">Quản lý khách hàng</a><hr></li>
        </ul>
        
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
            <h3>HOME</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div id="menu1" class="tab-pane fade">
                <h3>Menu 1</h3>
                <div class="products">
                <?php
                    require '../products'
                ?>
                </div>
            </div>
            <div id="menu2" class="tab-pane fade">
            <h3>Menu 2</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
            </div>
            <div id="menu3" class="tab-pane fade">
            <h3>Menu 3</h3>
            <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            </div>
        </div>
    </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('ul li a').click(function(){
                $('#menu')
            })
        })
    </script>
</body>
</html>


<!-- select  DISTINCT bill_detail.id_bill,(SELECT COUNT(bill_detail.quantity) FROM bill_detail WHERE  ),bill.*,customers.first_name,customers.last_name,customers.phone_number,customers.address
        from bill_detail
        join bill ON bill_detail.id_bill = bill.id join customers on customers.id = bill.id_customer
        GROUP by bill_detail.quantity,bill_detail.id_bill -->