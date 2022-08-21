<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .a1,.a3{
            list-style-type: none;
        }
        .a3{
            opacity: 0;
            width: 50px;
            height: 70px;
            background-color:gray ;
            transition: .3s;
            transform: translate(0px,14px);
        }
        .a1{
            width: 50px;
            height: 20px;
           
        }
        .a1:hover>.a3{
            opacity: 1;
            transform: translate(0px,0px);
        }
    </style>
</head>
<body>
    <ul class="a1">
        <li class="a2">
            Tháng
        </li>
        <ul class="a3">
            <li class="a4">
                <a href="../root/index.php?page1=index&date=1">1</a>
            </li>
            <li class="a4">
                <a href="../customer/list_top_customer.php?date=2">2</a>
            </li>
            <li class="a4">
                <a href="../root/index.php?page1=index&date=3">3</a>
            </li>
            <li class="a4">  
                <a href="../root/index.php?page1=index&date=4">4</a>
            </li>
        </ul>
    </ul>
        
    <?php
        require '../connect.php';
        $date=1;
        if(isset($_GET['date'])){
        $date = $_GET['date'];}
        $sql = "SELECT 
        customers.first_name,
        customers.last_name,
        bill.id as 'bill_buy',
        bill.created_at,
        DATE_FORMAT (created_at,'%c-%Y') as 'Date_bill',
        SUM(total_price)
        from bill
        LEFT join customers on customers.id = bill.id_customer
        where STATUS =1 and  DATE(created_at) >= CURDATE() - INTERVAL '$date' month
        GROUP by bill.id, DATE_FORMAT(created_at,'%c-%Y')
        ORDER BY bill.id DESC";
        $result = mysqli_query($connect,$sql);
        
    ?>
    <table class="table">
        
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Đơn đặt</th>
                <th>Ngày đặt</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($result as $each):?>
            <tr>
                <td><?php echo $each['first_name'];?></td>
                <td><?php echo $each['last_name'];?></td>
                <td><?php echo $each['bill_buy'];?></td>
                <td><?php echo $each['created_at'];?></td>
                
                
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    
    
    
    

</body>
</html>