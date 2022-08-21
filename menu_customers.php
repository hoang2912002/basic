<?php
// session_start();
// if(empty($_SESSION['id'])){?>
   <!-- <a href="./sign_up.php" class="sign_up" >Đăng ký</a>&nbsp;
    <a href="./sign_in.php" class="sign_in" >Đăng nhập</a> -->
    <div class="sign">
        <ul>
            <li class="menu-guest" style="<?php if(!empty($_SESSION['id'])){?> display: none; <?php } ?>">
                <button class="button-sign" type="button" data-toggle="modal" data-target="#modal-signup">Đăng ký</button>
                <?php include 'sign_up.php';?>
            </li>
            <li class="menu-guest" style="<?php if(!empty($_SESSION['id'])){?> display: none;  <?php } ?>">
                <button class="button-sign" style="width: 80px;" type="button" data-toggle="modal" data-target="#modal-signin">
                    Đăng nhập
                </button>
                <?php include 'sign_in.php'?>
            </li>
            <li class="menu-user" style="<?php if(empty($_SESSION['id'])){?> display: none; <?php } ?>">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                
            </li>
            <li class="menu-user" style="<?php if(empty($_SESSION['id'])){?> display: none; <?php } ?>"></li>
        </ul>
    </div>
    <!-- Xin chào bạn
            
            <a href="./sign_out.php">Đăng xuất</a>
        </span> -->

    <?php
        if(!empty($_SESSION['id'])){
            //header("location:users.php");
        }
    ?>





    <style>
        body{
            background-color: whitesmoke;
        }
        .sign{
            width: auto;
            height: auto;
            display: flex;
            float: left;
            outline: none;
            background-color:whitesmoke ;
        }
        ul>li{
            padding: 0;
            margin: 0;
            display: inline-block;
            
        }
        .button-sign{
            color: #DBDBDB;
            outline: none;
            transform: translate(2338px,-809px);
            position: relative;
            background-color:unset;
            width: 70px;
            border: unset   ;
        }
        /* .sign_up, .sign_in{
            text-decoration: none;
            font-size: default;
            float: right;
            background-size: 20px;
            margin: 0 5px;
            margin-top: 33px;
            transition: 1s;
            color: gray;
        }
        button{
            color: none;
        } */
    </style>