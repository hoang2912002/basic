<?php
    $search = $_GET['term'];
    require 'connect.php';
    $sql = "select * from products
    where name like '%$search%'";
    $result = mysqli_query($connect,$sql);
    $arr = [];
    foreach( $result as $each){
        $arr[] = [
            'label' => $each['name'],
            'value' => $each['id'],
            'photo' => $each['photo'],
            'value1' => number_format($each['price'],0,",","."),
        ];
    }
    echo json_encode($arr);

    