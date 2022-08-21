<?php
$notice = 1;
if(empty($_POST['monitor'])||empty($_POST['CPU'])||empty($_POST['RAM'])||empty($_POST['memory_safe'])||empty($_POST['camera_selfie'])){
    echo 2;
    

    exit;
}

$monitor = addslashes($_POST['monitor']);
$CPU =  addslashes($_POST['CPU']);
$RAM = addslashes($_POST['RAM']);
$memory_safe = addslashes($_POST['memory_safe']);
$camera_selfie = addslashes($_POST['camera_selfie']);

require '../connect.php';
$sql = "insert into component(monitor,CPU,RAM,memory_safe,camera_selfie)
        values('$monitor','$CPU','$RAM','$memory_safe','$camera_selfie')";
$result = mysqli_query($connect,$sql);

mysqli_close($connect);
echo 1;


