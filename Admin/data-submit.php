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
//  echo   $about_image;
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
    $category_folder = "../image/" . $category_image;
    $category_tmp_name = $_FILES['category_image']['tmp_name'];
    move_uploaded_file($category_tmp_name,$category_folder);
    // echo $category_image;
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
    // echo $testimonial_image;
  }
  if(empty($_FILES['chef_image']['name'])){
    $error['chef_image'] =" * Image is empty";
 
  }
  else{

    $chef_image = $_FILES['chef_image']['name'];
    $chef_image_folder = "../image/" . $chef_image;
    $chef_image_tmp_name = $_FILES['chef_image']['tmp_name'];
    move_uploaded_file($chef_image_tmp_name,$chef_image_folder);
    // echo $testimonial_image;
  }


  if(empty($_POST['chef_title'])){
    $error['chef_title'] = ' * title is required';
  }
  else{
  
    $chef_title = $_POST['chef_title']; 
  
  }
  

  
  if(empty($_POST['chef_designation'])){
    $error['chef_designation'] = ' * Designation is required';
  }
  else{
  
    $chef_designation = $_POST['chef_designation']; 
  
  }
  
    
  if(empty($_POST['chef_description'])){
    $error['chef_description'] = ' * Description is required';
  }
  else{
  
    $chef_description = $_POST['chef_description']; 
  
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
  $insert_categories = "insert into categories(food_title,food_description,food_price,type,image)values('$category_title','$category_description','$category_price','$type','$category_image')";
 
 
  $result_categories = mysqli_query($con_query,$insert_categories);
  $test_query = "insert into testimonial(description,username,designation,rating,image)values('$test_desc','$test_username','$test_design','$test_rating','$testimonial_image')";
  $result_test = mysqli_query($con_query,$test_query);
  $chef = "insert into chef(image,title,designation,description)values('$chef_image','$chef_title','$chef_designation','$chef_description')";
  $result_chef= mysqli_query($con_query,$chef);
  

  // print_r($home);
  // print_r($admin_home);
  // print_r($insert_categories);
  // print_r($test_query);
  // die();


    if($result_home &&  $result_admin && $result_categories &&   $result_test &&  $result_chef){
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