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
 
    <div id="sidebarMenu">
      
        <ul class="sidebarMenuInner">
          <li><button class="btn-product" data-product="index">Trang quản lý sản phẩm</button><hr></li>
          <li><button class="btn-order">Quản lý đơn hàng</button><hr></li>
          <li><button class="btn-manufacture">Trang quản lý hãng</button><hr></li>
          <li><button class="btn-staf">Quản lý admin</button><hr></li>
          <li><button class="btn-customer">Quản lý khách hàng</button><hr></li>
        </ul>
    </div>
  <div id='center' class="main center">
    <div class="mainInner">
        <div class="customer">
          <table style="width: 900px;" border="1">
              <tr>
                  <td style="width: 100px;">Tên</td>
                  <td style="width: 100px;">Số điện thoại</td>
                  <td style="width: 100px;">Số đơn đã đặt</td>
                  <td style="width: 300px;">Tổng tiền đã mua</td>
              </tr>
              <?php foreach($customer as $each):?>
                  <tr style="height: 30px; ">
                      <td ><?php echo $each['name_receiver']?> </td>
                      <td ><?php echo $each['phone_receiver']?></td>
                      <td ><?php $sum+= $each['quantity'];echo $sum;?></td>
                      <td ><?php echo $each['total_price']?> VNĐ</td>
                  </tr>

              <?php endforeach?>
          </table>
        </div>
        <div class="chart_line">
            <?php
                require '../orders/chart_line.php';
            ?>
        </div>
        
    </div>
    
    <div class="mainInner">
        <?php
          include '../orders/chart_drill_down.php'
        ?>
    </div>
    <div class="mainInner">
      <div class="div_product">
              <?php
                require '../products/index.php'
              ?>  
        </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function(){
     
      $('.btn-product').click(function(){
        $.ajax({
          url: '../products/index.php',
          type: 'GET',
          dataType: '',
          data: '',
        })
        .done(function(response){
          // $('.div_product').load('../products/index.php',function(responseTxt, statusTxt, jqXHR){
              
          // })
            $('.div_product').show();
        })
      })
      $('.btn-order').click(function(){
        $.ajax({
          url: '../orders/index.php',
          type: 'GET',
          dataType: '',
          data: '',
        })
        .done(function(response){
          // $('.div_product').load('../products/index.php',function(responseTxt, statusTxt, jqXHR){
              
          // })
            $('.div_product').show();
        })
      })
    })
  </script>
</body>
</html>


<!-- select  DISTINCT bill_detail.id_bill,(SELECT COUNT(bill_detail.quantity) FROM bill_detail WHERE  ),bill.*,customers.first_name,customers.last_name,customers.phone_number,customers.address
        from bill_detail
        join bill ON bill_detail.id_bill = bill.id join customers on customers.id = bill.id_customer
        GROUP by bill_detail.quantity,bill_detail.id_bill -->