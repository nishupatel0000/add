<?php
require_once 'config.php';
session_start();
require_once '../header.html';
require_once '../aside.html';  


   
?> 
<style>
  #myTable {
    margin-top: 53px;
}
#mytd{
    text-align: center;
}
</style>

<table id="myTable" class="table table-striped table table-bordered"" border="0" cellspacing="0" width="100%"    >
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile No</th>
      <th scope="col">Vehicle No</th>
      <th scope="col">Vehicle Type</th>
      <th scope="col">Operation</th>

    </tr>
  </thead>
  <tbody>
    <?php
    $select = "SELECT * FROM user";
    $result = mysqli_query($con_query, $select);

    while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['mobileno']; ?></td>
        <td><?php echo $row['vehicle_no']; ?></td>
        <td><?php echo $row['vehicle_type']; ?></td>
        <td id="mytd"> 
         
         <a href="#"><button class="btn  btn-danger delete" data-id="<?php echo $row['id']; ?>"><i class="fa fa-trash"></i></button></a>
         <a href="edit.php?id=<?php echo $row['id'];?> "> <button class="btn   btn-primary edit"><i class="fa fa-edit"></i></button>
          </td>
      </tr>
    <?php
    }
    ?>


  </tbody>
</table>



<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
  });
</script>
 
<script>
    $(".delete").click(function(e) {
        e.preventDefault(); // prevent default link behavior if it's an <a> tag

let userId = $(this).data("id"); // get data-id

Swal.fire({
    title: 'Are you sure?',
    text: "You are about to delete this user.",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#e3342f',
    cancelButtonColor: '#6c757d',
    confirmButtonText: 'Yes, delete it!'
}).then((result) => {
    if (result.isConfirmed) {
        window.location.href = 'delete.php?id=' + userId;
    }
});
    
    });
</script>


<?php
require_once '../footer.html';

?>