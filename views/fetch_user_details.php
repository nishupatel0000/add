<?php
require_once 'config.php';

$id =$_POST['id'];
$select = "SELECT * FROM user where id='$id'";
$result = mysqli_query($con_query, $select);
$row = mysqli_fetch_assoc($result);
print_r(json_encode($row));


?>