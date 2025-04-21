<?php
session_start();

require_once '../views/config.php';
if (isset($_POST['login'])) {
    if (empty($_POST['lemail'])) {
        $_SESSION['lemail'] = "Email is required";
    } else {
        $email = $_POST['lemail'];
    }

    if (empty($_POST['lpassword'])) {
        $_SESSION['lpassword'] = "Password is required";
    } else {
        $password = $_POST['lpassword'];
    }

    if (!empty($email) && !empty($password)) {
        $select = "SELECT * FROM user WHERE email='$email'";
        $res = mysqli_query($con_query, $select);

        if (mysqli_num_rows($res) > 0) {
            $data = mysqli_fetch_assoc($res);
            $old_email = $data['email'];
            $old_password = $data['password'];

            if ($email == $old_email && $password == $old_password) {
                $_SESSION['username'] = $data['username'];
                $_SESSION['lemail'] = $email;
                header('Location:dashboard.php');
                exit();
            } else {
               
                $_SESSION['error'] = "Email or password does not match";
            }
        } else {
            $_SESSION['error'] = "No account found with this email";
        }
    }
}


// $row = mysqli_num_rows($res);
// echo $row;


?>
<!doctype html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AdminLTE 4 | Login Page</title>

    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE 4 | Login Page" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"
    />
    <!--end::Primary Meta Tags-->
    <!--begin::Fonts-->
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
    integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
    crossorigin="anonymous"
  />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
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
    <link rel="stylesheet" href="../css/adminlte.css" />
    <style>
   .alert {
    padding: 15px 20px;
    margin: 20px 0;
    border-radius: 6px;
    font-size: 16px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    position: relative;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease-in-out;
    opacity: 0.9;
    animation: fadeIn 0.5s ease-in-out;
    z-index: 1000;
    

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
        <!--end::Required Plugin(AdminLTE)-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="login-page bg-body-secondary">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Login</b></a>
      </div>

       
      <!-- /.login-logo -->
      <div class="card">
 

<!-- SweetAlert2 CDN -->

<?php
if (isset($_SESSION['data'])) {
    $msg = addslashes($_SESSION['data']);
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
           
                title: 'Success!',
                text: '$msg',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        });
    </script>";
    unset($_SESSION['data']);
}
if (isset($_SESSION['error'])) {
    $error = addslashes($_SESSION['error']);
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Error!',
                text: '$error',
                icon: 'error',
                confirmButtonText: 'Try Again'
            });
        });
    </script>";
    unset($_SESSION['error']);
}

?>
        <div class="card-body login-card-body">
          <form  method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Email" name="lemail" />
              <div class="input-group-text"><span class="bi bi-envelope"></span></div>
            </div>
            <?php
              if (isset($_SESSION['lemail'])){
                echo '<div class="alert error-alert "> ' .  $_SESSION['lemail'] . '</div>';
                unset($_SESSION['lemail']);     
                }
              ?>
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Password" name="lpassword" />
              <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
            </div>
            <?php
              if (isset($_SESSION['lpassword'])){
                echo '<div class="alert error-alert "> ' .  $_SESSION['lpassword'] . '</div>';
                unset($_SESSION['lpassword']);     
                }
              ?>
            <!--begin::Row-->
            <div class="row">
              <div class="col-8">
                <div class="form-check">
                  <!-- <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                  <label class="form-check-label" for="flexCheckDefault"> Remember Me </label> -->
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <div class="d-grid gap-2">
                <input type="submit" name="login"  class="btn btn-primary" value="Log In">

                </div>
              </div>
              <!-- /.col -->
            </div>
            <!--end::Row-->
          </form>
          <div class="social-auth-links text-center mb-3 d-grid gap-2">
            <p>- OR -</p>
            <a href="https://www.facebook.com/tecocraft.infusion.pvt.ltd/" class="btn btn-primary">
              <i class="bi bi-facebook me-2"></i> Sign in using Facebook
            </a>
            <a href="#" class="btn btn-danger">
              <i class="bi bi-google me-2"></i> Sign in using Google+
            </a>
          </div>
          <!-- /.social-auth-links -->
          <p class="mb-0">
            <a href="index.php" class="text-center" style="text-decoration: none;"> Don't have account? Register</a>
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script>
    window.onload = function () {
        // Check if the error messages exist and hide them after a delay
        var successMessage = document.getElementById("error-message");
        var updateMessage = document.getElementById("error-update");

        if (successMessage) {
            setTimeout(function () {
                successMessage.style.display = "none";
            }, 2000);  
        }

        if (updateMessage) {
            setTimeout(function () {
                updateMessage.style.display = "none";
            }, 2000);  
        }
    };
</script>
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
    <script src="../js/adminlte.js"></script>
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

<?php

?>


