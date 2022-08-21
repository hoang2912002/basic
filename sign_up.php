<link rel="stylesheet" href="folder_css/sign_up.css">
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
<style>
    .btn-submit:hover{
    color: black;
    border: none;
    outline: none;
    background-color: unset;
    border-color: unset;
}
</style>
<div class="modal fade" id="modal-signup" role="dialog" style="color: none; margin: 0;">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="height: 80px; width: 100%;">
                <div id="total_sign_up">
                    <div class="title" style="margin: auto;">
                        <span>ĐĂNG KÝ</span>
                    </div>
                    <div class="alert alert-danger" id="div-error" style="display:none;">
                        
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="body">
                    <form id="form-signup" method="post">
                        <table >
                            <tr>
                                <td><input type="text" name="first_name" class="form-control" placeholder="Họ" ></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="last_name" class="form-control"  placeholder="Tên"></td>
                            </tr>
                            <tr>
                                <td><input type="email" name="email" placeholder="Vui lòng nhập email của bạn" class="form-control" placeholder="Email" ></td>
                            </tr>
                            <tr>
                                <td><input type="password" class="form-control"  name="password" placeholder="Mật khẩu"></td>
                            </tr>
                            
                            <tr>
                                <td style="color:#A4A4A4;padding-left:5px;">Giới tính:
                                    <input type="radio" name="gender" value="Nam" class="gender"> Nam
                                    <input type="radio" name="gender" value="Nữ" class="gender"> Nữ
                                </td>
                            </tr>
                            <tr>
                                <td><input type="number" name="phone_number" id="" class="form-control" placeholder="Số điện thoại"></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="address" id="" class="form-control" placeholder="Địa chỉ"></td>
                            </tr>
                        </table>
                        <div class="button-submit">
                            <button class="btn btn-primary mb-2 " >Đăng ký</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default btn-close" data-dismiss="modal" 
                 style="color: black; border: none;outline: none;background-color: unset;border-color: unset;">
                    <i class='bx bx-x close'></i>
                </button>
            </div> -->
            <button type="button" class="btn btn-default btn-close" data-dismiss="modal" 
                 style="color: black; border: none;outline: none;background-color: unset;border-color: unset;">
                    <i class='bx bx-x close'></i>
                </button>
        </div>
    </div>
</div>
<script>
   
    $(document).ready(function(){
        $.validator.addMethod("validatePassword", function (value, element) {
            return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/i.test(value);
        }, "Hãy nhập password từ 8 đến 16 ký tự bao gồm chữ hoa, chữ thường và ít nhất một chữ số");       
        $.validator.addMethod("validateEmail",function(value,element){
            return this.optional(element) ||
            /^[a-zA-Z0-9][\-_\.\+\!\#\$\%\&\'\*\/\=\?\^\`\{\|]{0,1}([a-zA-Z0-9][\-_\.\+\!\#\$\%\&\'\*\/\=\?\^\`\{\|]{0,1})*[a-zA-Z0-9]@[a-zA-Z][-\.]{0,1}([\.\-]{0,1}[a-zA-Z]){0,}$/i.test(value);    
        },"Hãy nhập Email từ 5 đến 30 ký tự bao gồm chữ cái in hoa, chữ thường không bao gồm ký tự đặc biệt"
        );
        $("#form-signup").validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,
            rules: {
                "first_name": {
                    required: true,
                    maxlength: 10
                },
                "last_name": {
                    required: true,
                    maxlength: 10
                },
                "email": {
                    validateEmail: true,
                    required: true,
                    email: true,
                    
                },
                "password": {
                    required: true,
                    validatePassword: true,
                },
            },
            messages: {
                "first_name": {
                    required: "Bạn cần điền đầy đủ thông tin",
                    maxlength: "Hãy nhập tối đa 15 ký tự"
                },
                "last_name": {
                    required: "Bạn cần điền đầy đủ thông tin",
                    maxlength: "Hãy nhập tối đa 15 ký tự"
                },
                "email": {
                    required: "Bắt buộc nhập email",
                    email: "Hãy nhập đúng định dạng email VD: abc@gmail.com",
                },
                "password": {
                    required: "Bắt buộc nhập password",
                    minlength: "Hãy nhập ít nhất 8 ký tự"
                },
            },
            submitHandler: function() {
                $.ajax({
                url: 'process_sign_up.php',
                type: 'POST',
                dataType: 'html',
                data:  $("#form-signup").serializeArray(),//lấy toàn bọ những cái điền trong form r Array là biến nó thành mảng
                })
                .done(function(response){
                    if(response !== '1'){
                        $("#div-error").text(response);
                        $("#div-error").show()//để hiển thị class="alert alert-danger"
                    }
                    else{
                        $('#modal-signup').toggle();
                        //toggle là như công tắc chỉ tắt bật nếu đang show thì nó sẽ hide #modal-signup đi
                        $('.modal-backdrop').hide();
                        $('.menu-user').show();
                        $('.menu-guest').hide();
                        $('#span-name').text($("input[name='first_name']").val());
                        $('#span-name').text($("input[name='last_name']").val()); 
                        window.location="users.php";
                    }
                })
            }
        });
    })  
</script>