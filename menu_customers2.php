<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        Alo điền gì đó đi
        <input type="text" name="ten" id="ten">
    </form>
    <div id="ket_qua"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        //$(document).ready() là khi trang đc tải xong thì nó sẽ thực hiện js  
        $(document).ready(function(){
            //selecter gọi bằng id, .val giống value js thuần là để gán giá trị
            // $("#ten").val('Long');
            $("#ten").keydown(function(event){
                //.change() khi mà thay đổi trong #ten thì nó sẽ cập nhập  
                // .keydown() là khi mình bấm thì nó sẽ cập nhập event tứ thì
                // .keyup() là khi mik bấm phím thả ra thì nó sẽ cập nhập
                let ten = $(this).val();
                //$(this) là gọi đến thằng cha 
                $("#ket_qua").text('Bạn đã điền: ' + ten); 
                
            });
        });
    </script>
</body>
</html>