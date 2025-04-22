<?php
require_once 'config.php';
session_start();
require_once '../layouts/header.php';
require_once '../layouts/aside.php';  


   
?> 
<style> 
  #myTable1 {
    margin-top: 53px;
}
</style>
<table id="myTable1" class="table table-striped table table-bordered"" border="0" cellspacing="0" width="100%"    >
  <thead>
    <tr>
    <th scope="col">Id</th> 
      <th scope="col">Name</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile No</th>
      <th scope="col">Vehicle No</th>
      <th scope="col">Vehicle Type</th>
      <!-- <th scope="col">Operation</th> -->

    </tr>
  </thead>
  <tbody>
    <?php
    $select = "SELECT * FROM user where vehicle_type='car'";
    $result = mysqli_query($con_query, $select);

    while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <tr>
      <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['mobileno']; ?></td>
        <td><?php echo $row['vehicle_no']; ?></td>
        <td><?php echo $row['vehicle_type']; ?></td>
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

<?php   
require_once '../layouts/footer.php';
 
?>
