<?php
require_once '../common/config.php';

if ($_POST["action"] == "user_insert") {


if(empty($_POST['firstname'])){
    $error['name'] = "Name is required";
    
}
else if(strlen($_POST['firstname'])<6 ){
    $error['name'] = "Nameshould be minimum 6 characters";
}
else if (!preg_match('/[a-zA-Z]/',$_POST['firstname'])){
    $error['name'] = "Text only";
    
}
else{
  $name = $_POST['firstname'];
 
}


if(empty( $_POST['email_user'])){
    $error['email'] = "email is required";
}
else{
$email = $_POST['email_user'];

}
if(empty( $_POST['password_user'])){
    $error['password'] = "password is required";
}
elseif (!preg_match("/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $_POST['password_user'])) {
    $error['password'] = " * Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
    
  }

else{
$password = $_POST['password_user'];

}
if(empty( $_POST['mobileno_user'])){
    $error['mobileno'] = "mobileno is required";
}

else{
$mobileno = $_POST['mobileno_user'];

}


if(!empty($error)){
    $allerror = [

         'errors' => $error

    ];
    echo json_encode($allerror);
    return false;
}
else{
  
$ins_query = "insert into user(name,email,password,mobileno)values('$name','$email','$password','$mobileno')";
$res_query = mysqli_query($con_query,$ins_query);
if($res_query){
    $final = [
        "status" => 200,
        "msg" => "your data saved successfully",
    ];
    echo json_encode($final);
    return false;
}
else{
    $err = [
        "err_code" => 403,
        "msg"  => "any database related problem"
    ];
    echo json_encode($err);
    return false;
}

}
}


if ($_POST["action"] == "update_user") {

   $id = $_POST['id'];
   $name = mysqli_real_escape_string($con_query, $_POST['name']);
   $email = mysqli_real_escape_string($con_query, $_POST['email']);
   $mobileno = mysqli_real_escape_string($con_query, $_POST['mobileno']);


 
if($name == NULL){ 
    $err['name'] = "* Name is required";
    
}
else if(strlen($name)<6 ){
    $err['name'] = "Name should be minimum 6 characters";
}
else{ 
    $name = $_POST['name'];
   
}


 

if($email == NULL){ 
    $err['email'] = "*Email is required";
    
}
else{ 
    $email = $_POST['email'];
   
}
if($mobileno == NULL){ 
    $err['mobileno'] = "* Mobileno is required";
    
}
 
 
else{ 
    $mobileno = $_POST['mobileno'];
   
}
 
 
 
 

if(!empty($err)){
    $allerrs = [
        'code' => 404,
     'errors' => $err,
    ];
    echo json_encode($allerrs);
    return false;
}
else{
    $update = "UPDATE user SET name='$name', email='$email', mobileno='$mobileno'  WHERE id='$id'";
    $result = mysqli_query($con_query,$update);
    if($result){
        $output = [
          'code' => 200,
          'msg' => "data saved successfully"
        ];
        echo json_encode($output);
        return false;
    }
    else{
        $dberr = [
            "code" => 404,
            "msg"  => "any database related problem"
        ];
        echo json_encode($dberr);
        return false;
    }
    
    }
}



  ?>








 

 

