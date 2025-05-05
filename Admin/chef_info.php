<?php
session_start();
require_once '../common/config.php';
require_once 'includes/header.php';
require_once 'includes/aside.php';  


   
?> 
<style>
  #myTable2 {
    margin-top: 53px;
}
#mytd{
    text-align: center;
}
</style>

         
<div class="row align-items-center mb-3">
  <div class="col-sm-6">
    <h3 class="mb-0 fw-semibold">Chefs</h3>
  </div>
  <div class="col-sm-6">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb justify-content-sm-end mb-0">
        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>
    </nav>
  </div>
</div>


<div class="row">
      <div class="col-md-12">
        <div class="card mb-4" style="height: 1100px;">
          <div class="card-header">
      List of Chefs
          </div>
          <div class="card-body">

<table id="myTable2" class="table table-striped table table-bordered" border="1px" cellspacing="0" width="100%"    >
  <thead>
    <tr>
    <th scope="col">Id</th> 
      <th scope="col">Title</th>
      <th scope="col">Designation</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
      <th scope="col">Operation</th>
    
      

    </tr>
  </thead>
  <tbody>
    <?php
    $select = "SELECT * FROM chef";
    $result = mysqli_query($con_query, $select);

    while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <tr>
      <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['designation']; ?></td>
        <td><?php echo $row['description']; ?></td>
        <td><img src="../Admin/assets/img/<?php echo $row['image']; ?>" width="300px" height="250px"></td>
        <td id="mytd">  
             <a href="#"><button class="btn  btn-danger delete_btn" data-id="<?php echo $row['id']; ?>"><i class="fa fa-trash"></i></button></a>
                 </td>
         
        
      </tr>
    <?php
    }
    ?>
<script>
  $(document).ready( function () {
    $('#myTable2').DataTable();
  });
</script>

  </tbody>
</table>
      </div>
    </div>
  </div>
</div>
<script>
  $(".delete_btn").click(function(){
   var id = $(this).data("id");
   Swal.fire({
    title: "Are you sure?",
    text: "Do You Want to delete this record? !",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Yes, delete it!"
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire("Delete Successfully!", "", "success");
  $.ajax({
    url : "category_data.php",
    type : "POST",
    data : {"action" : "chef_delete" , "id" : id},
    success : function(data){
      // alert(data);
    }
  });
    }
  });
 
  });
</script>
<?php   
require_once 'includes/footer.php';
 
?>

