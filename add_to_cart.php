<?php
require './admin/connect.php';
try{
    session_start();
    if(empty($_GET['id'])){
        throw new Exception("Không tồn tại id");
    }
    $id = $_GET['id'];
    if(empty($_SESSION['cart'][$id])){
        
        $sql = "select * from products
        where id = '$id'";
        $result = mysqli_query($connect,$sql);
        $each = mysqli_fetch_array($result);
        $_SESSION['cart'][$id]['name'] = $each['name'];
        $_SESSION['cart'][$id]['photo'] = $each['photo'];
        $_SESSION['cart'][$id]['price'] = $each['price'];
        $_SESSION['cart'][$id]['id_manufacturers'] = $each['id_manufacturers'];
        $_SESSION['cart'][$id]['quantity'] = 1;
    }

    else{
        $_SESSION['cart'][$id]['quantity'] ++;
    }
    echo 1;
}catch(Throwable $e){
    echo $e-> getMessage();
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).change(function(){
        $.ajax({
            url: 'view_cart.php',
            type: 'POST',
        })
    })
</script>
<?php
header("location:view_cart.php?id= $id");
