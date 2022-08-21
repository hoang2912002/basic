<?php
session_start();
if(!isset($_SESSION['level'])){
    header('location:../index.php?error=Lỗi vui lòng nhập đúng tài khoản mật khẩu');
    exit;
}