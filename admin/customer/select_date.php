<?php
        require '../connect.php';
        $date=1;
        if(isset($_GET['date'])){
        $date = $_GET['date'];}
        $sql = "SELECT 
        customers.first_name,
        customers.last_name,
        bill.id as 'bill_buy',
        
        DATE_FORMAT (created_at,'%c-%Y') as 'Date_bill',
        SUM(total_price)
        from bill
        LEFT join customers on customers.id = bill.id_customer
        where STATUS =1 and  DATE(created_at) >= CURDATE() - INTERVAL '$date' month
        GROUP by bill.id, DATE_FORMAT(created_at,'%c-%Y')
        ORDER BY bill.id DESC";
        $result = mysqli_query($connect,$sql);
        
    ?>
    <?php
        foreach ($result as $each):
            echo $each['first_name'];
            echo $each['last_name'];
            echo $each['bill_buy'];
            echo $each['Date_bill'];
        endforeach;
        header("location:./list_top_customer.php");
    ?>