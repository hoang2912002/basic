<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    THỐNG KÊ
    <!-- số đơn theo mốc thời gian(hôm nay,tuần này,tháng này,năm này,khoảng thời gian ) -->
    Chọn thời gian
    <!-- SELECT COUNT(*) from orders wher created_at > .... -->
    <input type="date" value="<?php echo date('Y-m-d')?>">
    <input type="week">
    <input type="month">
    <select name="" id="">
        <?php for($i=date('Y');$i>=1970;$i--){?>
            <option value="">
                <?php echo $i?>
            </option>
        <?php }?>

    </select>
    <!-- số sản phẩm bán(bán chạy,k bán chạy) -->
    <!-- CÁCH 1: SELECT 
    product.id,
    orders.id,
    product.name,
    ifnull( SUM(quantity),0) as quantity_sales
    FROM product 
    LEFT JOIN order_product on order_product.product_id = product.id
    LEFT JOIN orders on orders.id = order_product.order_id
    WHERE orders.status = 1 or orders.id is null
    GROUP BY product.id,orders.id-->

    <!-- Cách 2:
    SELECT 
    product.id,
    product.name,
    (SELECT
    ifnull(sum(quantity),0)
    from order_product
    JOIN orders on orders.id = order_product.order_id
    WHERE order_product.product_id = product.id and orders.status =1
    ) as quantity_sales
    from product
    ORDER by quantity_sales ASC,product.id ASC -->
    
    
    <!-- DOANH THU THEO  MỐC THỜI GIAN
    SELECT 
    customers.name,
    orders.id,
    SUM(total_price)
    from orders
    LEFT join customers on customers.id = orders.customer_id
    where STATUS =1 and .....
    GROUP by orders.id -->

    Số thành viên


    <!-- Khách hàng tiềm năng(số lượng khách hàng đã đặt đơn)
    SELECT 
    name ,
    SUM(total_price) as price_total
    FROM
    customers
    LEFT JOIN orders on orders.customer_id = customers.id
    WHERE orders.status =1 or orders.customer_id is null
    GROUP BY customers.id
    ORDER by price_total DESC -->

    <!-- Khách hàng tiềm năng(số lượng khách hàng đã trả đơn)
    SELECT 
    name ,
    SUM(total_price) as price_total,
    count(orders.customer_id)
    FROM
    customers
    LEFT JOIN orders on orders.customer_id = customers.id
    WHERE orders.status =0 or orders.customer_id is null
    GROUP BY customers.id
    ORDER by price_total DESC -->


    Sản phẩm theo hãng
    


    <!-- muốn làm theo chọn mốc cấu hình sản phẩm
    Trong db bạn tạo ra một table: product_options 
id
product_id
name
value

- product_options và có product_id là khóa ngoại của bảng products:

vd:
products:
 id          name
 1            product_1

product_options:
id          product_id           name           value
1            1                             4G                8.490.000
1            1                             5G                11.490.000

- Lúc mà đặt hàng sẽ chọn 1 trong 2 option 4G và 5G của product_1 
Lúc đó mk sẽ lưu id của option đã chọn trong bảng order_details
id          order_id                product_id           option_id
1            1                             1                             2

=> chi tiết đơn hàng là product_1(product_id = 1) và option (option_id = 2) là 5G
 (mình đã bỏ qua bảng orders không viết ra đây)

Muốn lấy được tất cả options của 1 sản phẩm để show ra view  thì cứ select bảng product_options theo product_id là ra -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="defaultForm-email" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="defaultForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default">Login</button>
      </div>
    </div>
  </div>
</div>

<div class="text-center">
  <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm">Launch
    Modal Login Form</a>
</div>
</body>
</html>