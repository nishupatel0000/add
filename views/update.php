<?php
session_start();
require_once 'config.php';


if(isset($_POST['update'])){ 
    $id = $_POST['id']; 
    $name = $_POST['name']; 
    $username = $_POST['username'];    
    $email = $_POST['email'];
    $mobileno = $_POST['mobileno'];
    $vehicle_no = $_POST['vehicle_no'];
    $vehicle_type = $_POST['vehicle_type'];

    

    $update = "UPDATE user SET name='$name', username='$username', email='$email', mobileno='$mobileno', vehicle_no='$vehicle_no', vehicle_type='$vehicle_type' WHERE id='$id'";
    $result = mysqli_query($con_query, $update);
    if($result){
  
        $_SESSION['update'] = "your data has been updated successfully";
        header("Location:user_info.php");
    }else{
        echo "sdsdf";
        die();
        echo "<script>alert('Data Not Updated');</script>";
    }
}   
else{
    echo "<script>alert('Data Not Updated');</script>";
}
 
 
 

?>
