<?php
session_start();
require_once '../common/config.php';
$id=$_GET['id'];
$delete = "DELETE FROM admin WHERE id='$id'";
$result = mysqli_query($con_query, $delete);

if($result){
    header("location:admin_info.php");
    
}else{
    echo "Error deleting record: " . mysqli_error($con_query);
}





 

?>