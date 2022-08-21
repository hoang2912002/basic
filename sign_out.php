<?php

session_start();
unset($_SESSION['id']);
unset($_SESSION['first_name']);
unset($_SESSION['last_name']);
setcookie('remember',null,-1);
header('location:index.php');