<?php
session_start();
require_once '../common/config.php';
require_once 'includes/header.php';

require_once 'includes/aside.php';  
 

   
?> 
<style> 
  #myTable1 {
    margin-top: 53px;
}
</style>
<div class="row align-items-center mb-3">
  <div class="col-sm-6">
    <h3 class="mb-0 fw-semibold">Foods data</h3>
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
        <div class="card mb-4" style="height: 1900px;">
          <div class="card-header">
                 List of foods
            </div>
          <div class="card-body">

                          <table id="myTable1" class="table table-striped table table-bordered" border="1px" cellspacing="0" width="100%"    >
                            <thead>
                              <tr>
                              <th scope="col">Id</th> 
                                <th scope="col">title</th>
                                <th scope="col">Food_description</th>
                                <th scope="col">Food Price</th>
                                <th scope="col">Type</th>
                                <th scope="col">Image</th>
                              
                                <!-- <th scope="col">Operation</th> -->

                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $select = "SELECT * FROM categories";
                              $result = mysqli_query($con_query, $select);

                              while ($row = mysqli_fetch_assoc($result)) {
                              ?>
                                <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['food_title']; ?></td>
                                  <td><?php echo $row['food_description']; ?></td>
                                  <td><?php echo $row['food_price']; ?></td>
                                  <td><?php echo $row['type']; ?></td>
                                  <td><img src="../../foodflow/user/assets/image/<?php echo $row['image']; ?>" width="200px" height="150px"></td>
                                  <!-- <td id="mytd"> 
                                  
                                  <a href="#"><button class="btn  btn-danger delete" data-id="<?php echo $row['id']; ?>"><i class="fa fa-trash"></i></button></a>
                                  <a href="edit.php?id=<?php echo $row['id'];?> "> <button class="btn   btn-primary edit"><i class="fa fa-edit"></i></button>
                                    </td> -->
                                </tr>
                              <?php
                              }
                              ?>
                          <script>
                            $(document).ready( function () {
                              $('#myTable1').DataTable();
                            });
                          </script>

                            </tbody>
                          </table>
       </div>
    </div>
  </div>
</div>

<?php   
require_once 'includes/footer.php';
 
?>
