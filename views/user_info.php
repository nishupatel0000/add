





<?php
require_once 'config.php';
session_start();
require_once '../layouts/header.php';
require_once '../layouts/aside.php';
?>

<style>
  #myTable {
    margin-top: 53px;
  }

  #mytd {
    text-align: center;
  }

  .row {
    text-align: left;
    margin-left: 0;
    padding: 10px;
  }
  .btn_user {
    display: flex;
    justify-content: flex-end;
    margin-right: 10px;
  }
    
 
</style>
<div class="mb-3 btn_user">
  <a href="../views/user/index.php"><button type="button" class="btn btn-success">
    <i class="fa fa-plus"></i>&nbsp; Add New User
  </button></a>
</div>
<table id="myTable" class="table table-striped table-bordered" border="0" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th scope="col">Id</th>
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
    if (isset($_SESSION['update'])) {
      $msg = addslashes($_SESSION['update']);
      echo "<script>
          document.addEventListener('DOMContentLoaded', function() {
              Swal.fire({   
                  title: 'Update!',
                  text: '$msg',
                  icon: 'success',
                  confirmButtonText: 'OK'
              });
          });
      </script>";
      unset($_SESSION['update']);
    }

    $select = "SELECT * FROM user";
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
        <td id="mytd">
          <a href="#">
            <button class="btn btn-danger delete" data-id="<?php echo $row['id']; ?>">
              <i class="fa fa-trash"></i>
            </button>
          </a>
          <button type="button" class="btn btn-primary edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?php echo $row['id']; ?>">
            <i class="fa fa-edit"></i>
          </button>
          <a href="#">
            <button class="btn btn-warning view" data-id="<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#viewModal">
              <i class="fa fa-eye" aria-hidden="true"></i>
            </button>
          </a>
        </td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>

<script>
  $(document).ready(function() {
    $(".edit").click(function() {
      var userId = $(this).data("id");
      $.ajax({
        url: 'fetch_data.php',
        type: 'POST',
        data: { id: userId },
        success: function(response) {
          var userDetails = JSON.parse(response);
          $("#myid").val(userDetails.id);
          $("#name").val(userDetails.name);
          $("#username").val(userDetails.username);
          $("#email").val(userDetails.email);
          $("#mobile").val(userDetails.mobileno);
          $("#vehicle_no").val(userDetails.vehicle_no);
          $("#vehicle_type").val(userDetails.vehicle_type);
        },
        error: function() {
          alert("Error fetching user details.");
        }
      });
    });

    $(".view").click(function() {
      var userId = $(this).data("id");
      $.ajax({
        url: 'fetch_user_details.php',
        type: 'POST',
        data: { id: userId },
        success: function(response) {
          var userDetails = JSON.parse(response);
          $("#modal-user-name").text(userDetails.name);
          $("#modal-user-username").text(userDetails.username);
          $("#modal-user-email").text(userDetails.email);
          $("#modal-user-mobile").text(userDetails.mobileno);
          $("#modal-user-vehicle_no").text(userDetails.vehicle_no);
          $("#modal-user-vehicle_type").text(userDetails.vehicle_type);
        },
        error: function() {
          alert("Error fetching user details.");
        }
      });
    });

    $(".delete").click(function(e) {
      e.preventDefault();
      let userId = $(this).data("id");
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

    $('#myTable').DataTable();
  });
</script>

<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewModalLabel">User Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-sm">
              <p><strong>Name:</strong> <span id="modal-user-name"></span></p>
              <p><strong>Username:</strong> <span id="modal-user-username"></span></p>
              <p><strong>Email:</strong> <span id="modal-user-email"></span></p>
              <p><strong>Mobile No:</strong> <span id="modal-user-mobile"></span></p>
              <p><strong>Vehicle No:</strong> <span id="modal-user-vehicle_no"></span></p>
              <p><strong>Vehicle Type:</strong> <span id="modal-user-vehicle_type"></span></p>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="update.php" method="POST" id="editForm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="myid">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="mobile" class="form-label">Mobile</label>
            <input type="text" class="form-control" id="mobile" name="mobileno" required>
          </div>
          <div class="mb-3">
            <label for="vehicle_no" class="form-label">Vehicle No</label>
            <input type="text" class="form-control" id="vehicle_no" name="vehicle_no" required>
          </div>
          <div class="mb-3">
            <label for="vehicle_type" class="form-label">Vehicle Type</label>
            <select name="vehicle_type" id="vehicle_type" class="form-control" required>
              <option value="">Select Vehicle Type</option>
              <option value="Car">Car</option>
              <option value="Bike">Bike</option>
              <option value="Bicycle">Bicycle</option>
            </select>
          </div>
        
        <!-- <div class="modal-footer">
        
            <input type="text" class="form-control" id="mobile" name="mobileno" required>
          </div> -->
        
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <input type="submit" class="btn btn-primary" name="update"> 
        </div>
        </div>
       
      </div>
    </form>
  </div>
</div>



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
require_once '../layouts/footer.php';

?>