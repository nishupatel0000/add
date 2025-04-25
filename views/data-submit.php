<?php
// echo json_encode($_POST['title']);
require_once 'config.php';
 
$title= $_POST['title'];
$description= $_POST['description'];
// image
$image = $_FILES['image']['name'];
$folder = "../image/" . $image;
$tmp_name = $_FILES['image']['tmp_name'];
move_uploaded_file($tmp_name,$folder);
 
$home = "insert into hom_about(title,description,image)values('$title','$description','$image')";
$result_home = mysqli_query($con_query,$home);

$about_title = $_POST['about_title'];  
$about_description = $_POST['about_description'];
$about_image = $_FILES['about_image']['name'];
$about_folder = "../image/" . $about_image;
$about_tmp_name = $_FILES['about_image']['tmp_name'];
move_uploaded_file($about_tmp_name,$about_folder);
$admin_home = "insert into admin_home(title,description,image)values('$about_title','$about_description','$about_image')";
$result_admin = mysqli_query($con_query,$admin_home);


$category_title = $_POST['category_title']; 
$category_description = $_POST['category_description'];
$category_price = $_POST['category_price'];
$category_image = $_FILES['category_image']['name'];
$category_folder = "../image/" . $category_image;
$category_tmp_name = $_FILES['category_image']['tmp_name'];
move_uploaded_file($category_tmp_name,$category_folder);

$insert_categories = "insert into categories(food_title,food_description,food_price,image)values('$category_title','$category_description','$category_price','$category_image')";
$result_categories = mysqli_query($con_query,$insert_categories);


$test_desc = $_POST['testimonial_description'];
$test_username = $_POST['testimonial_username'];
$test_design = $_POST['testimonial_designation'];
$test_rating = $_POST['testimonial_rating'];

$test_query = "insert into testimonial(description,username,designation,rating)values('$test_desc','$test_username','$test_design','$test_rating')";
$result_test = mysqli_query($con_query,$test_query);

// if($result){
//   $data = [
//     'respone' => "successfully inserted"
//   ];
//   echo json_encode($data);
   

// }
echo json_encode(['success' => true]);
?>