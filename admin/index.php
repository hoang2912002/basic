<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./admin.css/index_admin.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <div class="admin">
        <div class="btn">
            <h2 >
                Admin page need to sign in
            </h2>
            <div class="btn-sign-in">
                <button type="button" class="btn btn-info btn-lg btn-sign-in-admin"  style="width: 200px;
                height: 50px;outline: none;border:none" data-toggle="modal" data-target="#myModal">Đăng nhập  </button>
            </div>
            
        </div>
        
    </div>
    

    <div class="modal fade " id="myModal" role="dialog">
        <div class="modal-dialog">
        
        <!-- Modal content-->
            <div class="modal-content modal-total-sign-in">
                <div class="modal-header">
                    <h2>Đăng nhập</h2>
                </div>
                <div class="modal-body modal_body" >
                    <form id="form-sign-in-admin" method="POST">
                        <table style="width: 85%;" >
                            <tr>
                                <td ><input type="email" name="email" class="form-control sign-in-admin"  placeholder="Email"></td>
                            </tr>
                            <tr>
                                <td><input type="password" name="password" class="form-control sign-in-admin" placeholder="Mật khẩu"></td>
                            </tr>
                        </table>
                        <button type="submit" class="btn-submit-sign-in-admin">Đăng nhập</button>
                    </form>
                </div>
                <div class="modal-footer footer">
                    <button type="button" class="btn btn-default btn-close" data-dismiss="modal"><i class='bx bx-x close'></i></button>
                </div>
            </div>
        </div>
    </div>
   
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
    <script src="https://jqueryvalidation.org/files/lib/jquery.form.js"></script>
    <script>
        $(document).ready(function(){
            $('form-sign-in-admin').submit(function(event){
                event.preventDefault();
            })
            $('#form-sign-in-admin').validate({
                onfocusout: false,
                onclick: false,
                onkeyup: false,
                rules:{
                    "email":{
                        required: true,
                        email: true,
                    },
                    "password":{
                        required: true,
                    }
                },
                messages:{
                    "email":{
                        required: "<span >Amin vui lòng nhập Email</span>",
                        email:"<span>Vui lòng nhập đúng Email</span>",
                    },
                    "password":{
                        required:"<span>Vui lòng nhập mật khẩu</span>",
                        
                    },
                },
                submitHandler: function(){
                    $.ajax({
                        url: "process.php",
                        dataType: 'html',
                        type:'POST',
                        data: $('#form-sign-in-admin').serializeArray(),
                    })
                    .done(function(response){
                        if(response == '1'){
                            $('#myModal').toggle();
                            //toggle là như công tắc chỉ tắt bật nếu đang show thì nó sẽ hide #modal-signup đi
                            $('.modal-backdrop').hide();
                            
                            window.location='root/index.php';
                        }
                    })
                }
            })
        })
    </script>
</body>
</html>