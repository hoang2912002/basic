<?php if(isset($_GET['error'])){?>
    <span style="color: red;"><?php echo $_GET['error']?></span><br>
<?php }?>

<?php if(isset($_GET['success'])) {?>
    <span style="color: green ;"><?php echo $_GET['success']?></span>
<?php }?>