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
        $insert_categories = "insert into menu(title,description,price,image,category_id)values('$category_title','$category_description','$category_price','$category_image','$type')";
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
   $del_category = "delete from menu where id = '$id'";
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


if($_POST['action']== "category_insert")
{
   
  if(empty($_POST['type'])){
    $error['type'] = ' * Please select any one';
  }
  else{
  
    $type = $_POST['type']; 
  
  }

  if(!empty($error)){
    $allerror = [

      'errors' => $error

  ];
  echo json_encode($allerror);
  return false;
    }
  
     else{

      $insert_category = "insert into category(category_name)values('$type')";
      $result_category = mysqli_query($con_query,$insert_category);


      if($result_category){
          $data = [
          "status" => 200,
          "msg" => " Category saved successfully",
          ];
          echo json_encode($data);
          return false;
        }

     }

}

if($_POST['action']== "category_del")
{
   $id  = $_POST['id'];
   $del_category = "delete from category where id = '$id'";
   $del_result = mysqli_query($con_query,$del_category);
   if($del_result){
       $output =
       [
         'msg' => "Data deleted successfully",
       ];
       echo json_encode($output);
      
   }
}

if($_POST['action']== "category_view"){
$id = $_POST['id'];
 
 
$select = "SELECT * FROM menu where id='$id'";
$result = mysqli_query($con_query, $select);
$row = mysqli_fetch_assoc($result);
echo json_encode($row);
}
 if($_POST['action']== "update_category")
{
  $id = $_POST['id'];
   
  if(empty($_POST['type'])){ 
    $err['type'] = "*Field is required";
    
}
else{ 
    $type = $_POST['type'];
   
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
  $update = "UPDATE category SET category_name='$type' WHERE id='$id'";
  $result = mysqli_query($con_query,$update);
  if($result){
      $output = [
        'code' => 200,
        'msg' => "Category Updated successfully!!!"
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
if($_POST['action']== "category_edit"){
  $id = $_POST['id'];
   
   
  $select = "SELECT * FROM category where id='$id'";
  $result = mysqli_query($con_query, $select);
  $row = mysqli_fetch_assoc($result);
  echo json_encode($row);
  }


  if($_POST['action']== "update_menu")
{
  $id = $_POST['id'];
   
  if(empty($_POST['food_title'])){ 
    $err['food_title'] = "*Field is required";
    
}
else{ 
    $food_title = $_POST['food_title'];
   
}

if(empty($_POST['category_description'])){ 
  $err['category_description'] = "*Field is required";
  
}
else{ 
  $category_description = $_POST['category_description'];
 
}
 

if(empty($_POST['category_price'])){ 
  $err['price'] = "*Field is required";
  
}
else{ 
  $price = $_POST['category_price'];
 
}
 

if(empty($_POST['category_image'])){ 
  $err['category_image'] = "*Field is required";
  
}
else{ 
  $category_image = $_POST['category_image'];
 
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
  $update = "UPDATE menu SET title='$food_title',description='$category_description',price='$price',image='  WHERE id='$id'";
  $result = mysqli_query($con_query,$update);
  if($result){
      $output = [
        'code' => 200,
        'msg' => "Category Updated successfully!!!"
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