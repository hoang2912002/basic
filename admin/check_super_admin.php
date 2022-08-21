<?php


//if(empty($_SESSION['level'])){
if(!isset($_SESSION['level'])||($_SESSION['level']) ==0){?>
    
    <script>
        window.location ='../root/test2.php?page1=404_page';
       
    </script>
    
    
<?php }?>


