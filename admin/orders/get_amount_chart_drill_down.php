<?php
    require '../connect.php';
    $max_date = $_GET['days'];
    $sql = "select products.name as 'ten_san_pham', products.id as 'id_san_pham',
    DATE_FORMAT(created_at,'%e-%m') as 'ngay', sum(quantity) as 'so_san_pham_ban_duoc' from bill
    join bill_detail on bill.id = bill_detail.id_bill
    join products on products.id = bill_detail.id_product
    where DATE(created_at) >= CURDATE() - INTERVAL '$max_date' DAY 
    GROUP BY  products.id, DATE_FORMAT(created_at,'%e-%m')";
    $result = mysqli_query($connect,$sql);
    $arr =[];

    $today = date('d');
    if($today<$max_date){
        $get_day_last_month = $max_date - $today;
        $last_month = date('m', strtotime('-1 month'));
        $last_month_date =date('Y-m-d', strtotime('-1 month'));
        $max_day_last_month = (new DateTime($last_month_date))-> format(('t'));
        $start_day_last_month = $max_day_last_month - $get_day_last_month;
        $start_day_this_month =1;
    }
    else{
        $start_day_this_month = $today - $max_date;
    }
    foreach($result as $each){
        $id_san_pham = $each['id_san_pham'];
        if(empty($arr[$id_san_pham])){
            $arr[$id_san_pham] = [
                'name' => $each['ten_san_pham'],
                'y' => $each['so_san_pham_ban_duoc'],
                'drilldown' => $each['id_san_pham'],
            ];
        }
        else{
            $arr[$id_san_pham]['y'] += $each['so_san_pham_ban_duoc'];
        }
    }
    $arr2 = [];
    foreach($arr as $id_san_pham => $each){
        $arr2[$id_san_pham]=[
            'name' => $each['name'],
            'id' => $id_san_pham,
        ];
        $arr2[$id_san_pham]['data']=[];
        if($today<$max_date){
            for($i=$start_day_last_month;$i<$max_day_last_month;$i++){
                $key = $i . '-' . $last_month;
                $arr2[$id_san_pham]['data'][$key]=[
                    $key,
                    00
                ];
            }
        }
    }
    foreach($result as $each){
        $id_san_pham = $each['id_san_pham'];
        $key = $each['ngay'];
        $arr2[$id_san_pham]['data'][$key]=[
            $key,
            (int)$each['so_san_pham_ban_duoc'],
        ];
    }
    $object = json_encode([$arr,$arr2]);
    echo $object;