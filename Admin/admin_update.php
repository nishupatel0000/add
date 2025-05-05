<?php
require_once '../common/config.php';

if ($_POST["action"] == "update") {
// 
$id = $_POST['id'];
// echo json_encode($id);

if (empty($_POST['name'])) {
    $error['name'] = "* username is required";
} else {
    $name = $_POST['name'];
    
}

if (empty($_POST['email'])) {
    $error['email'] = "* Email is required";
} else {
    $email = $_POST['email'];
    
}

if (!empty($error)) {
    $allerror = [
        "code" => 400,
        "error" => $error
    ];

    echo json_encode($allerror);
    return false;
}
else{
    $update = "update admin set username='$name',email='$email' where id='$id'";
    $result =  mysqli_query($con_query,$update);
    if($result){
        $output = [
            'code' => 200,
            'msg' => "data updated successfully"
          ];
          echo json_encode($output);
          return true;
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