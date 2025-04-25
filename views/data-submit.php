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
 
$insert_query = "insert into hom_about(title,description,image)values('$title','$description','$image')";
$result = mysqli_query($con_query,$insert_query);
if($result){
  $data = [
    'respone' => "successfully inserted"
  ];
  echo json_encode($data);
   

}
?>