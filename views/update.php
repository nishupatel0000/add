<?php
session_start();
require_once 'config.php';


if(isset($_POST['update'])){ 
   
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

    if (empty($id) || empty($name) || empty($username) || empty($email) || empty($mobileno) || empty($vehicle_no) || empty($vehicle_type)) {
      ?>
        <script>
            alert("Please fill all fields.");
            window.location.href = "user_info.php";
        </script>
        <?php
    }
   
 else{
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
}   
else{
    echo "<script>alert('Data Not Updated');</script>";
}
 
 
 

?>
