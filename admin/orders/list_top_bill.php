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
        $sql = 'SELECT 
        products.id as "pro_id",
        ifnull(bill.id,0) as "bill_num",
        products.name,
        ifnull( SUM(quantity),0) as quantity_sales
        FROM products 
        LEFT JOIN bill_detail on bill_detail.id_product = products.id
        LEFT JOIN bill on bill.id = bill_detail.id_bill
        WHERE (bill.status = 1 or bill.id != null) 
        GROUP BY products.id,bill.id,bill_detail.quantity
        ORDER by  bill.id DESC LIMIT 0,10;';
        $result = mysqli_query($connect,$sql);
        
    ?>



<div class="x_content" style=" scroll-behavior: smooth;">
<table class="table table-bordered">
<thead>
<tr style="text-align: center;">
<th>ID </th>
<th>Số đơn</th>
<th>Tên</th>
<th>Số lượng</th>
 </tr>
</thead>
<tbody>
<?php foreach($result as $each): ?>
<tr  style="text-align: center;" >

<td><?php echo $each['pro_id'];?></td>
<td><?php echo $each['bill_num'];?></td>
<td  style="text-align: left;"><?php echo $each['name'];?></td>
<td ><?php echo $each['quantity_sales'];?></td>
</tr>
<?php endforeach?>

</tbody>
</table>
</div>

</body>
</html>