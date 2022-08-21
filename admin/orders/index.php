<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../orders/index_order.css">
</head>
<body>
    <?php
        require '../connect.php';
        $sql = "select bill.*,customers.first_name,customers.last_name,customers.phone_number,customers.address
        from bill
        join customers on customers.id = bill.id_customer";
        $result = mysqli_query($connect,$sql);
    ?>
    <!-- <div class="div">
        <table style="width: 100%">
            <tr>
                <td>Mã</td>
                <td>Thời gian đặt</td>
                <td>Thông tin người nhận</td>
                <td>Trạng thái</td>
                <td>Tổng tiền</td>
                <td>Xem</td>
                <td>Sửa</td>
            </tr>
            <?php foreach($result as $each):?>
            <tr>
                <td><?php echo $each['id']?></td>
                <td><?php echo $each['created_at'] ?></td>
                <td><?php echo $each['name_receiver']?>
                    <?php echo $each['phone_receiver']?>
                    <?php echo $each['address_receiver']?>
                </td>
                <td><?php switch ($each['status']){
                            case '0': echo "Mới đặt";break;
                            case '1': echo "Đã duyệt";break;
                            case '2': echo "Hủy đơn";break;
                } ?></td>
                <td><?php echo $each['total_price'] ?></td>
                <td><a href="../orders/detail.php?id=<?php echo $each['id'] ?>">Xem</a></td>
                <?php if($each['status'] ==0){?>
                <td><a href="../orders/update.php?id=<?php echo $each['id']?>&status=1">Duyệt</a>
                    <a href="../orders/update.php?id=<?php echo $each['id']?>&status=2">Hủy</a>
                </td>
                <?php }else{?>
                    
                <?php }?>
            </tr>
            <?php endforeach?>
        </table>

    </div> -->
    <div class="col-md-12 col-sm-12  ">
<div class="x_panel">
<div class="x_title" >
<h2 >Table design <small>Custom design</small></h2>
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
    <div class="col-md-12 col-sm-12  div_sub_icon">
        <div class="sub_icon">
            <i class='bx bx-check green' ></i> <span>: Duyệt</span>
            <br>
            <i class='bx bx-x red' ></i> <span>: Hủy</span>
        </div>
    </div>
<div class="table-responsive">
<table class="table table-striped jambo_table bulk_action">
<thead>
<tr class="headings" style="text-align: center;">

<th class="column-title">ID </th>
<th class="column-title">Time order</th>
<th class="column-title">Information customer <small>(Name,Phone,Address)</small></th>
<th class="column-title">Status</th>
<th class="column-title">Total price </th>
<th class="column-title">More </th>
<th class="column-title">Delete</th>
<th class="column-title">Status choose</th>

</th>
<th class="bulk-actions" colspan="7">
<a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
</th>
</tr>
</thead>
<tbody>
<?php foreach($result as $each):?>
<tr class="even pointer" style="text-align: center;">


<td class=" ">#<?php echo $each['id']?></td>
<td class=" "><?php echo $each['created_at'] ?></td>
<td class=" ">
    <?php echo $each['name_receiver']?> /
    <?php echo $each['phone_receiver']?> /
    <?php echo $each['address_receiver']?>

</td>
<td class=" "><?php switch ($each['status']){
                            case '0': echo "Mới đặt";break;
                            case '1': echo "Đã duyệt";break;
                            case '2': echo "Hủy đơn";break;
                } ?></td>
<td class=" "><?php echo number_format($each['total_price'])?><u>đ</u></td>
<td class="a-right a-right "><a href="./index.php?page2=detail&id=<?php echo $each['id']?>" class='bx bx-show-alt show'></a></td>
<td class=""><a href="#" class='bx bx-x delete'></a>
</td>

    <td class="last">
        <?php if($each['status'] ==0){?>
            <a href="../orders/update.php?id=<?php echo $each['id']?>&status=1"  class='bx bx-check green' style="font-size:25px ;"></a>
            <a href="../orders/update.php?id=<?php echo $each['id']?>&status=2"  class='bx bx-x delete' ></a>
        <?php }?>
    </td>
    
                
</tr>
<?php endforeach?>



</tbody>
</table>
</div>
</div>
</div>
</div>
</body>
</html>