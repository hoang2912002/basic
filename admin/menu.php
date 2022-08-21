

<div class="notify1">
    <?php if(isset($_GET['error'])){?>
        <span style="color: red;"  onchange="error()"><?php echo $_GET['error']?>
        </span><br>
    <?php }?>

    <?php if(isset($_GET['success'])) {?>
        <span style="color: green ;"   onchange="success()"><?php echo $_GET['success']?></span>
        
    <?php }?>
</div>
    
<script>
    setTimeout(()=>{
        const box = document.getElementsByClassName('notify1');
        box.style.display = 'none';
    },2000);
        
 
       
    
</script>