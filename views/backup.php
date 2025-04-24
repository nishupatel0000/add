<?php
 
session_start();
require_once  'config.php';  

  if(!empty($_POST['name'])){
    $name = $_POST['name'];

  }
  else{
    $_SESSION['name'] = "name is required";

  }
  if (!empty($_POST['email'])) {
    $email = $_POST['email'];
} else {
    $_SESSION['email'] = " * Please enter email";
}

if (!empty($_POST['password'])) {
  $password = $_POST['password'];
} else {
  $_SESSION['password'] = " * Please enter password";
}

  if(isset($name) && isset($email) &&  isset($password)){
  $ins_query = "insert into admin(username,email,password)values('$name','$email','$password')";
  $result = mysqli_query($con_query,$ins_query);
  if($result){
   $_SESSION['success'] = "You can do login using your username and email";
   
   header('location:views/register.php');
  }
  else{
    echo "errror";
  }



}



?>
<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Admin</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE 4 | Register Page" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
      integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
      integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <!-- <link rel="stylesheet" href="/assets/css/adminlte.css" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css" integrity="sha512-IuO+tczf4J43RzbCMEFggCWW5JuX78IrCJRFFBoQEXNvGI6gkUw4OjuwMidiS4Lm9Q2lILzpJwZuMWuSEeT9UQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!--end::Required Plugin(AdminLTE)-->
    <style>
      .alert {
    padding: 15px 20px;
    margin: 20px 0;
    border-radius: 6px;
    font-size: 16px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    position: relative;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
}

.error-alert {
    background-color: #ffe5e5;
    color: #b30000;
    border: 1px solid #ffcccc;
}

.alert::before {
    content: "⚠️ ";
    margin-right: 8px;
    font-weight: bold;
} 
    </style>
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="register-page bg-body-secondary">
    <div class="register-box">
      <div class="register-logo">
        <a href="#"><b>Register </b></a>

      </div>
      <!-- /.register-logo -->
      <div class="card">
        <div class="card-body register-card-body">
       
          <form method="POST"   action="<?php echo $_SERVER['PHP_SELF']; ?>">
      


            <div class="input-group mb-3">
              <input type="text" class="form-control" name="name" placeholder="Full Name" />
              <div class="input-group-text"><span class="bi bi-person"></span></div>
            </div>
            <?php
              if (isset($_SESSION['name'])){
                echo '<div class="alert error-alert"> ' .  $_SESSION['name'] . '</div>';
                unset($_SESSION['name']);     
                }
              ?>
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Email" name="email" />
              <div class="input-group-text"><span class="bi bi-envelope"></span></div>
              <div class="error-msg"></div>

            </div>
            <?php
              if (isset($_SESSION['email'])){
                echo '<div class="alert error-alert"> ' .  $_SESSION['email'] . '</div>';
                unset($_SESSION['email']);     
                }
              ?>
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Password" name="password" />
              <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
              <div class="error-msg"></div>

            </div>
            <?php
              if (isset($_SESSION['password'])){
                echo '<div class="alert error-alert"> ' .  $_SESSION['password'] . '</div>';
                unset($_SESSION['password']);     
                }
              ?>
            <!--begin::Row-->
            <div class="row">
              <div class="col-8">
                <div class="form-check">
                  <!-- <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                  <label class="form-check-label" for="flexCheckDefault">
                    I agree to the <a href="#">terms</a>
                  </label> -->
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <div class="d-grid gap-2">
                  <!-- <button type="submit" class="btn btn-primary">Register</button> -->
                   <input type="submit" name="submit"  class="btn btn-primary" value="Submit">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!--end::Row-->
          </form>
          <div class="social-auth-links text-center mb-3 d-grid gap-2">
            <p>- OR -</p>
            <a href="#" class="btn btn-primary">
              <i class="bi bi-facebook me-2"></i> Sign in using Facebook
            </a>
            <a href="#" class="btn btn-danger">
              <i class="bi bi-google me-2"></i> Sign in using Google+
            </a>
          </div>
          <!-- /.social-auth-links -->
          <p class="mb-0">
            <a href="login.php" class="text-center" style="text-decoration: none;"> I already have account </a>
          </p>
        </div>
        <!-- /.register-card-body -->
      </div>
    </div>
    <!-- /.register-box -->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
      integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <!-- <script src="assets/js/adminlte.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js" integrity="sha512-KBeR1NhClUySj9xBB0+KRqYLPkM6VvXiiWaSz/8LCQNdRpUm38SWUrj0ccNDNSkwCD9qPA4KobLliG26yPppJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
    <!--end::OverlayScrollbars Configure-->
    <!--end::Script-->
  </body>

  
  <!--end::Body-->
</html>
<!-- 
 
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   if (isset($_POST['submit'])) {
//       // Button was clicked
//       $username = $_POST['name'];
//       echo "Form submitted. Username: " . htmlspecialchars($username);
//   }
//   else{
//     echo "no";
//   }
// }
?> -->


<!-- // This part only runs when the form is submitted -->
 <?php
session_destroy();
 ?>








 
<?php
require_once 'config.php';
session_start();
require_once '../layouts/header.php';
require_once '../layouts/aside.php';


 
 



if(isset($_POST['update'])){ 
   
    if (isset($_POST['id'])) {
        $id = trim($_POST['id']);
    } else {
        $id = '';
    }

    if (isset($_POST['name'])) {
        $name = trim($_POST['name']);
    } else {
        $name = '';
    }

    if (isset($_POST['username'])) {
        $username = trim($_POST['username']);
    } else {
        $username = '';
    }

    if (isset($_POST['email'])) {
        $email = trim($_POST['email']);
    } else {
        $email = '';
    }

    if (isset($_POST['mobileno'])) {
        $mobileno = trim($_POST['mobileno']);
    } else {
        $mobileno = '';
    }

    if (isset($_POST['vehicle_no'])) {
        $vehicle_no = trim($_POST['vehicle_no']);
    } else {
        $vehicle_no = '';
    }

    if (isset($_POST['vehicle_type'])) {
        $vehicle_type = trim($_POST['vehicle_type']);
    } else {
        $vehicle_type = '';
    }

    $errors = [];

    if (empty($id)) {
        $errors['id'] = "ID is required.";
    }
    if (empty($name)) {
        $errors['name'] = "Name is required.";
    }
    if (empty($username)) {
        $errors['username'] = "Username is required.";
    }
    if (empty($email)) {
        $errors['email'] = "Email is required.";
    }
    if (empty($mobileno)) {
        $errors['mobileno'] = "Mobile number is required.";
    }
    if (empty($vehicle_no)) {
        $errors['vehicle_no'] = "Vehicle number is required.";
    }
    if (empty($vehicle_type)) {
        $errors['vehicle_type'] = "Vehicle type is required.";
    }

    if (!empty($errors)) {
      // foreach ($errors as $field => $error) {
      //   echo "<script>alert('Error in $field: $error');</script>";
      // }
    }
 else{
    $update = "UPDATE user SET name='$name', username='$username', email='$email', mobileno='$mobileno', vehicle_no='$vehicle_no', vehicle_type='$vehicle_type' WHERE id='$id'";
    $result = mysqli_query($con_query, $update);
    if($result){
  
        $_SESSION['update'] = "your data has been updated successfully";
 
    }else{
       
        echo "<script>alert('Data Not Updated');</script>";
    }
}
}   

 
 
 

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
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" id="editForm">
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
        
        <!-- if(isset($errors['name'])) {  
          echo "<div class='alert alert-danger'>".$errors['name']."</div>";
        }  -->
     
            
          </div>
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
            <!--
        // if(isset($errors['username'])) {  
        //   echo "<div class='alert alert-danger'>".$errors['username']."</div>";
        // } 
       ?> -->
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





 
