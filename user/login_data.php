<?php 
require_once '../common/config.php';

 
if($_POST['action']=="login"){
 $email = $_POST['email'];
 $password = $_POST['password'];


 if (empty($_POST['email'])) {
    $error['email']= "Email is required";
} else {
    $email = $_POST['email'];
}

if (empty($_POST['password'])) {
    $error['password'] = "Password is required";
} else {
    $password = $_POST['password'];
}

 if(!empty($email) && !empty($password)){
    $sel_data = "select * from user where email= '$email'";
    $res = mysqli_query($con_query,$sel_data);
    if(mysqli_num_rows($res)> 0 ){
        $data = mysqli_fetch_assoc($res);
        $old_email = $data['email'];
        $old_password = $data['password'];

        if ($email == $old_email && $password == $old_password) {
           $result = [
            "code" => 200,
            "msg" => "User logged in successfully"
            ]; 
            echo json_encode($result);
            return false;
        }
        else{
            $err_result = [
                "code" => 200,
                "msg" => "User logged in successfully"
                ]; 
        }
        echo json_encode($err_result);
        return false;
}
else {
    $err = "No account found with this email";
    echo $err;
}
 }
 

 
 
}
 

 ?> 