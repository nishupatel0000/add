


<?php
session_start();
require_once "../common/config.php";
?>

<?php require_once "includes/header.php"; ?>
  
   
    <?php require_once "includes/aside.php"; ?>
     
    
         
    <div class="row align-items-center mb-3">
  <div class="col-sm-6">
    <h3 class="mb-0 fw-semibold">Admin</h3>
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

          
 
 
   
        <div class="app-content">
         
          <div class="container-fluid">
      
 <div class="row">
      <div class="col-md-12">
        <div class="card mb-4" style="height: 400px;">
          <div class="card-header">
      List of Admins
          </div>
          <div class="card-body">
          <table id="myTable2" class="table table-striped table-bordered" border="0" cellspacing="0" width="100%">
    
      <thead>
        <tr>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
        </tr>
      </thead>
      <tbody>
    <?php
    $select = "SELECT * FROM admin";
    $result = mysqli_query($con_query, $select);
    while ($row = mysqli_fetch_assoc($result)) { ?>
      <tr>
        <td><?php echo $row["username"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
      </tr>
    <?php } ?>
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

<!-- Now your table -->


         </div>
        </div>

  
           
<?php require_once "includes/footer.php"; ?>

