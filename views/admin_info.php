


<?php
session_start();
require_once 'config.php';



?>

<?php  require_once  '../layouts/header.html';   ?>
  
   
    <?php  require_once  '../layouts/aside.html';   ?>
     
    
         
    <div class="col-sm-6"><h3 class="mb-0">Admin Data
                    </h3>   </div>
                <div class="col-sm-6">
                 <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                 </ol>
                </div>
              </div>
           
           
       
        
        <div class="app-content">
         
          <div class="container-fluid">
      
            <div class="row"> 
<table id="myTable" class="table table-striped table table-bordered"" border="0" cellspacing="0" width="100%"    >
  <thead>
    <tr>
     
      <th scope="col">Username</th>
      <th scope="col">Email</th>  
      <!-- <th scope="col">Operation</th> -->

    </tr>
  </thead>
  <tbody>
    <?php
    $select = "SELECT * FROM admin";
    $result = mysqli_query($con_query, $select);

    while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <tr>
       
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['email']; ?></td>
       
      </tr>
    <?php
    }
    ?> 
  </tbody>
</table>
  
           
<?php   
require_once '../layouts/footer.html';
?>

