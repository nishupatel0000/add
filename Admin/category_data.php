<?php
require_once '../common/config.php'; 


if($_POST['action']=="food_insert"){

  if(empty($_POST['category_title'])){
    $error['category_title'] = ' * title is required';
  }
  else{
  
    $category_title = $_POST['category_title']; 
  
  }
   
  if(empty($_POST['category_description'])){
    $error['category_description'] = ' * Description is required';
  }
  else{
  
    $category_description = $_POST['category_description'];
     
  
  }

 
  if(empty($_POST['category_price'])){
    $error['category_price'] = ' * field is required';
  }
  else{
   
    $category_price = $_POST['category_price'];
  }


  if(empty($_POST['type'])){
    $error['type'] = ' * select any food';
 
  }
  else{
  
    $type = $_POST['type']; 
  
  }

  if(empty($_FILES['category_image']['name'])){
    $error['category_image'] =" * Image is empty";
 
  }
  else{

    $category_image = $_FILES['category_image']['name'];
    $category_folder = "../Admin/assets/img/" . $category_image;
    $category_tmp_name = $_FILES['category_image']['tmp_name'];
    move_uploaded_file($category_tmp_name,$category_folder);
 
  }



  if(!empty($error)){
    $allerror = [

      'errors' => $error

  ];
  echo json_encode($allerror);
  return false;
    }


    else{
        $insert_categories = "insert into categories(food_title,food_description,food_price,type,image)values('$category_title','$category_description','$category_price','$type','$category_image')";
        $result_categories = mysqli_query($con_query,$insert_categories);


        if($result_categories){
            $data = [
            "status" => 200,
            "msg" => "your data saved successfully",
            ];
            echo json_encode($data);
            return false;
          }
         
    }

}


if($_POST['action']== "category_delete")
{
   $id  = $_POST['id'];
   $del_category = "delete from categories where id = '$id'";
   $del_result = mysqli_query($con_query,$del_category);
   if($del_result){
       $output =
       [
         'msg' => "Data deleted successfully",
       ];
       echo json_encode($output);
      
   }
}

if($_POST['action']== "chef_delete")
{
   $id  = $_POST['id'];
   $del_category = "delete from chef where id = '$id'";
   $del_result = mysqli_query($con_query,$del_category);
   if($del_result){
       $output =
       [
         'msg' => "Data deleted successfully",
       ];
       echo json_encode($output);
      
   }
}
?>