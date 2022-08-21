<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="body">
    <H1>Loại sản phẩm</H1>
    <?php
        require '../connect.php';
        $sql = "select * from component";
        $result = mysqli_query($connect,$sql);
        $num_row = mysqli_num_rows($result); 
        if($num_row==0){ ?>
            <a href="index.php">Về trang chủ</a>
        <?php }?>
        <form id="form-component" method="POST">
            Màn hình
            <input type="text" name="monitor">
            <br>
            Chip
            <input type="text" name="CPU" id="">
            <br>
            Ram
            <input type="text" name="RAM">
            <br>
            Bộ nhớ trong
            <input type="text" name="memory_safe">
            <br>
            Camera trước 
            <input type="text" name="camera_selfie">
            <br>
            <button class="btn_submit" >Thêm</button>

        </form>
    </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="./notify.min.js"></script>
        <script src="./dist/sweetalert2.all.min.js"></script>
        <script>
            $(document).ready(function(){
                $('#form-component').submit(function(e){
                    $.ajax({
                        url: '../products/process_component.php',
                        type: 'POST',
                        dataType: 'html',
                        data: $('#form-component').serializeArray(),
                    })
                    .done(function(response){
                        console.log(123)
                        if(response == '1'){
                            $.notify("Access granted", "success");   
                        }
                    });
                    e.preventDefault();  
                })
            })
        </script> 
</body>
</html>