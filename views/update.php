<?php
session_start();
require_once 'config.php';


 echo json_encode("sfesf");
 die();
   
    if (isset($_POST['id'])) {
        $id = trim($_POST['id']);
    } else {
        $id = '';
    }

    if (isset($_POST['name'])) {
        $name = trim($_POST['name']);
    } else {
        $name = '';
    }

    if (isset($_POST['username'])) {
        $username = trim($_POST['username']);
    } else {
        $username = '';
    }

    if (isset($_POST['email'])) {
        $email = trim($_POST['email']);
    } else {
        $email = '';
    }

    if (isset($_POST['mobileno'])) {
        $mobileno = trim($_POST['mobileno']);
    } else {
        $mobileno = '';
    }

    if (isset($_POST['vehicle_no'])) {
        $vehicle_no = trim($_POST['vehicle_no']);
    } else {
        $vehicle_no = '';
    }

    if (isset($_POST['vehicle_type'])) {
        $vehicle_type = trim($_POST['vehicle_type']);
    } else {
        $vehicle_type = '';
    }

    $errors = [];

    if (empty($id)) {
        $errors['id'] = "ID is required.";
    }
    if (empty($name)) {
        $errors['name'] = "Name is required.";
    }
    if (empty($username)) {
        $errors['username'] = "Username is required.";
    }
    if (empty($email)) {
        $errors['email'] = "Email is required.";
    }
    if (empty($mobileno)) {
        $errors['mobileno'] = "Mobile number is required.";
    }
    if (empty($vehicle_no)) {
        $errors['vehicle_no'] = "Vehicle number is required.";
    }
    if (empty($vehicle_type)) {
        $errors['vehicle_type'] = "Vehicle type is required.";
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("Location: user_info.php");
        exit;
    }
   
 else{
    $update = "UPDATE user SET name='$name', username='$username', email='$email', mobileno='$mobileno', vehicle_no='$vehicle_no', vehicle_type='$vehicle_type' WHERE id='$id'";
    $result = mysqli_query($con_query, $update);
    if($result){
  
        $_SESSION['update'] = "your data has been updated successfully";
        header("Location:user_info.php");
    }else{
       
        echo "<script>alert('Data Not Updated');</script>";
    }
}
 

 
 
 

?>
