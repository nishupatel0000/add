<?php
 session_start();


require_once '../common/config.php';


if ($_POST['action'] == "login") {
    $email = $_POST['email'];
    $password = $_POST['password'];
     


    if (empty($_POST['email'])) {
        $error['email'] = "* Email is required";
    } else {
        $email = $_POST['email'];
        
    }
    // $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/";
    if (empty($_POST['password'])) {
        $error['password'] = "* Password is required";
    }
  
    // else if (!preg_match($pattern, $_POST['password'])) {
    //     $error['password'] = "* Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character (!@#$%^&*).";

    // }
 
    else {
        $password = $_POST['password'];
    }


    if (!empty($error)) {
        $allerror = [
            "code" => 400,
            "error" => $error
        ];

        echo json_encode($allerror);
        return false;
    }

    $sel_data = "select * from user where email= '$email'";
    $res = mysqli_query($con_query, $sel_data);
    if (mysqli_num_rows($res) > 0) {
        $data = mysqli_fetch_assoc($res);
        $old_email = $data['email'];
        $old_password = $data['password'];
        $_SESSION['email'] = $data['email'];
         
      
        // $id= $data['id'];
        if ($email == $old_email && $password == $old_password) {
            
         $_SESSION['user_id'] = $data['id'];
            $result = [
                "code" => 200,
                "msg" => "User logged in successfully",
           
                   

            ];
          
            echo json_encode($result);
            return true;
         
        }
    }

    $error['notfound'] = "* Email Id or Password not match";
    $allerror = [
        "code" => 400,
        "error" => $error
    ];

    echo json_encode($allerror);
    return false;
}

if ($_POST['action'] == "signup") {
  
    if (empty($_POST['firstname'])) {
        $error['firstname'] = "* Name is required";
    } else {
        $firstname = $_POST['firstname'];
    }
    if (empty($_POST['email'])) {
        $error['email'] = "* Email is required";
    } else {
        $email = $_POST['email'];
    }

    // $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/";
    if (empty($_POST['number'])) {
        $error['number'] = "* number is required";
    }else {
        $number = $_POST['number'];
    }

    if (empty($_POST['password'])) {
        $error['password'] = "* password is required";
    }
  
    else {
        $password = $_POST['password'];
    }
    if($_POST['password'] !== $_POST['confirmpassword']){
        $error['cmd_password'] = "* password do not match ";

    }

    if(!empty($error)){
        $err = [
            'code' => 400,
            'error'  => $error 
        ];
        echo json_encode(($err));
        return false;
    }
       else{
        $insert_query = "insert into user (name,email,mobileno,password)values('$firstname','$email','$number','$password')";
        $result = mysqli_query($con_query,$insert_query);
        if($result){
            $output = [
            'code' => 200,
            'msg'  => "Data saved successfully"
            ];
            echo json_encode($output);
            return true;
        }
       }
    
}
?>