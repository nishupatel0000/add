<?php 
session_start();

// if (isset($_SESSION['logout_msg'])) {
//     echo '<div class="alert alert-success text-center">'.$_SESSION['logout_msg'].'</div>';
//     unset($_SESSION['logout_msg']); // Remove it after showing
// }
 
require_once '../common/config.php';


 include_once 'includes/header.php'; ?>
 
    <!-- Navigation -->
    <?php  include_once 'includes/navbar.php'; ?>
    <!-- end of navbar -->
    <!-- end of navigation -->
     <style>

          /* Toast styles */
    .toasts {
      position: fixed;
      top: 20px;
      right: 20px;
      z-index: 9999;
    }

    .toast-notification {
      display: flex;
      align-items: center;
      background: #fff;
      color: #333;
      border-radius: 8px;
      padding: 12px 16px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      min-width: 250px;
      margin-bottom: 10px;
      overflow: hidden;
      animation-duration: 0.5s;
    }

    .toast-icon {
      margin-right: 10px;
      background: #27ae60;
      color: #fff;
      border-radius: 50%;
      width: 28px;
      height: 28px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .toast-msg {
      flex: 1;
    }

    .toast-progress {
      position: absolute;
      bottom: 0;
      left: 0;
      height: 4px;
      background: transparent;
      width: 100%;
    }

    .toast-progress-bar {
      height: 100%;
      background: #27ae60;
      width: 100%;
      animation: progress 4s linear forwards;
    }

    @keyframes progress {
      100% {
        width: 0%;
      }
    }

    .hide-toast {
      display: none;
    }

    .slide-in-slide-out {
      animation: slideIn 0.5s forwards, slideOut 0.5s 3.5s forwards;
    }

    @keyframes slideIn {
      from { opacity: 0; transform: translateX(100%); }
      to { opacity: 1; transform: translateX(0); }
    }

    @keyframes slideOut {
      from { opacity: 1; transform: translateX(0); }
      to { opacity: 0; transform: translateX(100%); }
    }
    .error{
    color:red;
    font-size:18px;
    font-weight:10px;
   
  }

 #emailerr{
  margin-right: 180px;
 }
#passworderr{
  margin-right: 145px;

}
#email_not_err{
  margin-right: 61 px;

}

.field-icon {
          float: right;
          margin-right: 10px;
          margin-top: -30px;
          position: relative;
          z-index: 2;
      }
 
</style>
<div class="toasts">
  <!-- Master Toast Template -->
  <div class="toast-notification master-toast-notification hide-toast">
    <div class="toast-content">
      <div class="toast-icon">
        <i class="fa"></i>
      </div>
      <div class="toast-msg">This is a toast message</div>
    </div>
    <div class="toast-progress">
      <div class="toast-progress-bar"></div>
    </div>
  </div>
</div>

    <!-- Header -->
    <header id="header" class="ex-2-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Log In</h1>
                   <p>You don't have an accoumt? Then please <a class="white" href="index.php">Sign Up</a></p> 
                    <!-- Sign Up Form -->
                    <div class="form-container" >
                        <form method="POST" id="login_form" >
                            <div class="form-group">
                                <input type="email" class="form-control-input" id="email" name ="email" >
                                <label class="label-control" for="lemail">Email</label>
                                <!-- <div class="help-block with-errors"></div> -->
                                 <b id="emailerr" class="error" ></b>
                              

                            </div>
                            <b id="email_not_err" class="error"></b>
                            <div class="form-group">
                                <input type="password" class="form-control-input" id="password" name="password">
                                <label class="label-control" for="password">Password</label>
                                <div class="help-block with-errors"></div>
                                <b id="passworderr" class="error"></b>
                                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                        
                            <div class="form-group"> 
                                <input type="submit" class="form-control-submit-button" name="submit" id="login" value ="LOG IN">
                  

                            </div>
                            
                        </form>
                    </div> <!-- end of form container -->
                    <!-- end of sign up form -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->

  <script>
    $("#login").click(function(e){
        e.preventDefault();
      var form = document.getElementById("login_form");
     var formdata = new FormData(form);
     
     formdata.append("action", "login"); 
     $.ajax({
        url:"login_data.php",
        type: "POST", 
        data : formdata,
        processData: false,
        contentType: false,
        dataType : "json",
        success:function(data)
        {
            if(data.code == 200){
              window.location.href = "user_dashboard/dashboard.php";
            }else{
                if(data.error.email){
                  $("#emailerr").text(data.error.email);
                } else{                      
                  $("#emailerr").text("");
                }

                if(data.error.password){
                  $("#passworderr").text(data.error.password);
                } else{                      
                  $("#passworderr").text("");
                }

                if(data.error.notfound){
                  $("#email_not_err").text(data.error.notfound);
                } else{                      
                  $("#email_not_err").text("");
                }
                // if(data.user){
                  // console.log(data.user);
                  // $("#email_not_err").text(data.user);
                // } else{                      
                //   $("#email_not_err").text("");
                // }
            }
         }
      })
    })
  </script>
 <script>
      $(".toggle-password").click(function() {

          $(this).toggleClass("fa-eye fa-eye-slash");
          var input = $($(this).attr("toggle"));

          if (input.attr("type") == "password") {

              input.attr("type", "text");
          } else {


              input.attr("type", "password");
          }
      });
  </script>
  
<!-- Toast function -->
<script>
function displayToastNotification(msg, iconClass, iconBgColor, animationClass) {
  const masterToast = document.querySelector('.master-toast-notification');
  const newToast = masterToast.cloneNode(true);
  newToast.classList.remove('hide-toast');
  newToast.classList.add(animationClass);

  newToast.querySelector('.toast-msg').textContent = msg;
  newToast.querySelector('.toast-icon i').className = 'fa ' + iconClass;
  newToast.querySelector('.toast-icon').style.backgroundColor = iconBgColor;

  document.querySelector('.toasts').appendChild(newToast);

  setTimeout(() => {
    newToast.remove();
  }, 4000); // Remove after animation
}
</script>

<?php if (isset($_SESSION['logout_msg'])): ?>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    displayToastNotification(
      <?= json_encode($_SESSION['logout_msg']) ?>,
      'fa-check',
      '#27ae60',
      'slide-in-slide-out'
    );
  });
</script>
<?php unset($_SESSION['logout_msg']); ?>
<?php endif; ?>
    <!-- Scripts -->
    <?php  include_once 'includes/footer.php'; ?>
  