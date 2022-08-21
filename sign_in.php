<?php
    if(isset($_COOKIE['remember'])){
        $token = $_COOKIE['remember'];
        require './admin/connect.php';
        $sql = "select * from customers
                where token = '$token' limit 1";
        $result = mysqli_query($connect,$sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows ==1){
            $each = mysqli_fetch_array($result);
            $_SESSION['id'] = $each['id'];
            $_SESSION['first_name'] = $each['first_name'];
            $_SESSION['last_name'] = $each['last_name'];
        }
    }
    if(isset($_SESSION['id'])){
        header('location:users.php');
        exit;
    }
?>
<?php
    require './admin/connect.php';
?>
<link rel="stylesheet" href="./folder_css/sign_in.css">
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
<div class="modal fade" id="modal-signin" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class="div_sign_in">
                    <div class="div_title">
                        <h2>Đăng nhập</h2>
                    </div>
                    <div class="alert alert-danger" id="div-error-signin" style="display:none;">
                    
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="body_sign_in">
                    <form id="form-signin" method="POST">
                        <div class="div_form_sign_in">   
                            <table  style="height: 200px;">
                                <tr>
                                    <td><input type="email" name="email" class="form-control" class="input_sign_in" placeholder="Email"></td>
                                </tr>
                                <tr>
                                    <td><input type="password" name="password" class="form-control" class="input_sign_in" placeholder="Mật khẩu"></td>
                                </tr>
                                <tr>
                                    <td class="name_sign_in" style="text-align: left;color:#A4A4A4">Ghi nhớ tài khoản
                                    <input type="checkbox" name="remember" class="remember"  style="text-align: left;" required></td>
                                </tr>
                            </table>
                        </div> 
                        <div class="button-submit">
                            <button  class="btn btn-primary mb-2">Đăng nhập</button>
                        </div>
                    </form>
                </div>
            </div>
                <button type="button" id="btn-close-sign-in" class="btn btn-default btn-close-sign-in" data-dismiss="modal"
                style="color: black; border: none;outline: none;background-color: unset;border-color: unset;"
                ><i class='bx bx-x close'></i></button>

        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#form-signin").submit(function(event){
            event.preventDefault();
        })
        $.validator.addMethod("validatePassword", function (value, element) {
            return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/i.test(value);
        }, "Hãy nhập password từ 8 đến 16 ký tự bao gồm chữ hoa, chữ thường và ít nhất một chữ số");     
        $("#form-signin").validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,
            rules:{
                "email":{
                    required: true,
                    email: true,
                },
                "password":{
                    required: true,
                    minlength: 8,
                },
            },
        
            messages:{
                "email":{
                    required: "Vui lòng điền email",
                    email: "Vui lòng nhập đúng Email của bạn",
                },
                "password":{
                    required: "Vui lòng điền mật khẩu",
                    minlength: "Hãy nhập ít nhất 8 ký tự"
                },
                "remember":{
                    required: "Vui lòng đánh tick",
                }
            },
            
            submitHandler: function(){
                $.ajax({
                    url: "process_sign_in.php",
                    type: "POST",
                    dataType: "html",
                    data: $("#form-signin").serializeArray(),
                    
                })
                .done(function(response){
                    if(response == '1'){
                        $("#div-error-signin").text(response);
                        $("#div-error-signin").show()
                    }
                    else{
                        $('#modal-signin').toggle();
                        $('.modal-backdrop').hide();
                        $('.menu-user').show();
                        $('.menu-guest').hide();
                        window.location="users.php";
                    }
                })
            }
        })
        $('#btn-close-sign-in').click(function(){
            window.location = "index.php";
        })
    })
</script>