<?php require_once 'check_users.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./folder_css/fs.css">
    <link rel="stylesheet" href="./folder_css/users.css">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <?php
        require './index.php';
    ?>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.btn-add-to-cart').click(function(event){
                let id = $(this).data('id');
                $.ajax({
                    url: 'add_to_cart.php',
                    type: 'GET',
                    dataType: '',
                    data: {id},
                })
                .done(function(response){
                    if(response == 1){
                        alert("Thành  công");
                    }
                    window.location='add_to_cart.php';
                })
            })
            
        })
    </script>
</body>
</html>