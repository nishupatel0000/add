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
.row{
  text-align: left;
      margin-left: 0;
      padding: 10px;
}
 
</style>

<table id="myTable" class="table table-striped table table-bordered" border="0" cellspacing="0" width="100%"    >
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
         <a href="#"> <button class="btn  btn-primary edit" data-id="<?php echo $row['id'];?>" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="fa fa-edit"></i></button> </a>
         <!-- <a href="#"> <button type="button" class="btn   btn-warning view"  data-id="<?php echo $row['id']; ?>" data-target="view_data"   data-toggle="modal"><i class="fa fa-eye" aria-hidden="true"></i></i></button> -->
            <!-- Button trigger modal -->
            <a href="#">
  <button class="btn btn-warning view" data-id="<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#viewModal">
    <i class="fa fa-eye" aria-hidden="true"></i>
  </button>
</a>
<!-- Modal -->
<div class="modal fade" id="edit_modal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Modal content will be populated here dynamically -->
        <form id="editForm">
          <div class="mb-3">
            <label for="user-name" class="form-label">Name</label>
            <input type="text" class="form-control" id="user-name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="user-username" class="form-label">Username</label>
            <input type="text" class="form-control" id="user-username" name="username" required>
          </div>
          <div class="mb-3">
            <label for="user-email" class="form-label">Email</label>
            <input type="email" class="form-control" id="user-email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="user-mobile" class="form-label">Mobile</label>
            <input type="text" class="form-control" id="user-mobile" name="mobile" required>
          </div>
          <div class="mb-3">
            <label for="user-vehicle" class="form-label">Vehicle No</label>
            <input type="text" class="form-control" id="user-vehicle" name="vehicle" required>
          </div>
          <div class="mb-3">
            <label for="user-vehicle-type" class="form-label">Vehicle Type</label>
            <input type="text" class="form-control" id="user-vehicle-type" name="vehicle_type" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="saveChangesButton">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $(".edit").click(function() {
      var userId = $(this).data("id"); // Get the user ID from the button's data attribute
      // Make an AJAX request to fetch user details
      $.ajax({
        url: 'fetch_data.php',  
        type: 'POST',
        data: { id: userId },
        success: function(response) {
          // Parse the JSON response
          var userDetails = JSON.parse(response);
          // Populate the modal with user details
          $("#user-name").val(userDetails.name);
          $("#user-username").val(userDetails.username);
          $("#user-email").val(userDetails.email);
          $("#user-mobile").val(userDetails.mobileno);
          $("#user-vehicle").val(userDetails.vehicle_no);
          $("#user-vehicle-type").val(userDetails.vehicle_type);
          

          // Add more fields as needed
        },
        error: function() {
          alert("Error fetching user details.");
        }
      });
    });
  }); 
</script>

<script>
  $(document).ready(function() {
    $(".view").click(function() {
      var userId = $(this).data("id"); // Get the user ID from the button's data attribute
      // Make an AJAX request to fetch user details
      $.ajax({
        url: 'fetch_user_details.php',  
        type: 'POST',
        data: { id: userId },
        success: function(response) {
          // Parse the JSON response
          var userDetails = JSON.parse(response);
          // Populate the modal with user details
          $("#modal-user-name").text(userDetails.name);
          $("#modal-user-username").text(userDetails.username);
          $("#modal-user-email").text(userDetails.email);
          $("#modal-user-mobile").text(userDetails.mobileno);
          $("#modal-user-vehicle_no").text(userDetails.vehicle_no);
          $("#modal-user-vehicle_type").text(userDetails.vehicle_type);
          

          // Add more fields as needed
        },
        error: function() {
          alert("Error fetching user details.");
        }
      });
      
    
     
    });
  });
</script>
<!-- Modal -->
 <!-- Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md"> <!-- You can change size: modal-sm, modal-lg, modal-xl -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewModalLabel">User Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
      <div class="modal-body">
        <!-- Dynamic content will go here -->
        <div class="container">
  <div class="row">
    <div class="col-sm">
    <p><strong>Name:</strong> <span id="modal-user-name"> </span></p>
        <p><strong>Username:</strong> <span id="modal-user-username"> </span></p>
    <p><strong>Email:</strong> <span id="modal-user-email"> </span></p>

 
    <p><strong>Mobile No:</strong> <span id="modal-user-mobile"></span></p>
    <p><strong>Vehicle No:</strong> <span id="modal-user-vehicle_no"></span></p>
    <p><strong>Vehicle type:</strong> <span id="modal-user-vehicle_type"></span></p>
    </div>
   
  </div>
 
        
    
      


        <!-- Add more fields as needed -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

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
<!-- <script>
  $(document).ready(function() {
   $(".view").click(function() {
  
        alert("hello"); 

   });
    });   
</script> -->

<?php
require_once '../footer.html';

?>