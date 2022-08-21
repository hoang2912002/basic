<?php
require '../connect.php';
if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
$id=$_GET['id'];
$sql = "SELECT * FROM products WHERE id = '$id' ";
$result = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_array($result)) {
echo "<p>".$row['description']."</p><br/>";
}
}
?>