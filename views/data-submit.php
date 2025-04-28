<?php
// echo json_encode($_POST['title']);
require_once 'config.php';
if ($_POST["action"] == "user_insert") {

  
  if(empty($_POST['title'])){
    $error['title'] =" * title is empty";
 
  }
  else{
    $title= $_POST['title'];
    
  }

  if(empty($_POST['description'])){
    $error['description'] =" * Description is required";
  }
  else{
    $description= $_POST['description'];
  }
  
  if(empty($_FILES['image']['name'])){
    $error['image'] =" * Image is empty";
 
  }
  else{
    $image = $_FILES['image']['name'];
    $folder = "../image/" . $image;
    $tmp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp_name,$folder);
 
  }

 

  //   if(!empty($error)){
  //    print_r($error);
  //   }
  //   else{
  //     echo "insert data in processing";
  //   }
  // die();
  if(empty($_POST['about_title'])){
    $error['about_title'] = ' * field is required';
  }
  else{
    $about_title = $_POST['about_title'];  

  }
  if(empty( $_POST['about_description'])){
    $error['about_description'] = ' * Description is required';
  }
  else{
    
    $about_description  = $_POST['about_description'];
  }

  if(empty($_FILES['about_image']['name'])){
    $error['about_image'] =" * Image is empty";

  }
  else{



    $about_image = $_FILES['about_image']['name'];
    $about_folder = "../image/" . $about_image;
    $about_tmp_name = $_FILES['about_image']['tmp_name'];
    move_uploaded_file($about_tmp_name,$about_folder);

  }


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

  if(empty($_FILES['category_image']['name'])){
    $error['category_image'] =" * Image is empty";
 
  }
  else{

    $category_image = $_FILES['category_image']['name'];
    $category_folder = "../image/" . $category_image;
    $category_tmp_name = $_FILES['category_image']['tmp_name'];
    move_uploaded_file($category_tmp_name,$category_folder);
  }


 
  if(empty($_POST['testimonial_description'])){
    $error['testimonial_description'] = ' * field is required';
  }
  else{
  
    
  
    $test_desc = $_POST['testimonial_description'];
  }

   
  if(empty($_POST['testimonial_username'])){
    $error['testimonial_username'] = ' * field is required';
  }
  else{ 
    $test_username = $_POST['testimonial_username'];
  }

   
  if(empty($_POST['testimonial_designation'])){
    $error['testimonial_designation'] = ' * field is required';
  }
  else{
  
    $test_design = $_POST['testimonial_designation'];
    
 
  }


   
  if(empty($_POST['testimonial_rating'])){
    $error['testimonial_rating'] = ' * field is required';
  }
  else{
    $test_rating = $_POST['testimonial_rating'];     
  }

  if(empty($_FILES['testimonial_image']['name'])){
    $error['testimonial_image'] =" * Image is empty";
 
  }
  else{

    $testimonial_image = $_FILES['testimonial_image']['name'];
    $testimonial_folder = "../image/" . $testimonial_image;
    $testimonial_tmp_name = $_FILES['testimonial_image']['tmp_name'];
    move_uploaded_file($testimonial_tmp_name,$testimonial_folder);
  }

 

  if(!empty($error)){
    $allerror = [

      'errors' => $error

  ];
  echo json_encode($allerror);
  return false;
    }
    else{


  $home = "insert into hom_about(title,description,image)values('$title','$description','$image')";
  $result_home = mysqli_query($con_query,$home);
  $admin_home = "insert into admin_home(title,description,image)values('$about_title','$about_description','$about_image')";
  $result_admin = mysqli_query($con_query,$admin_home);
  $insert_categories = "insert into categories(food_title,food_description,food_price,image)values('$category_title','$category_description','$category_price','$category_image')";
  $result_categories = mysqli_query($con_query,$insert_categories);
  $test_query = "insert into testimonial(description,username,designation,rating,image)values('$test_desc','$test_username','$test_design','$test_rating','$testimonial_image')";
  $result_test = mysqli_query($con_query,$test_query);

    if($result_home &&  $result_admin && $result_categories &&   $result_test){
      $data = [
      "status" => 200,
      "msg" => "your data saved successfully",
      ];
      echo json_encode($data);
      return false;
    }
  }
}
// }

?>