<?php 
require_once '../common/config.php';


 include_once 'includes/header.php'; ?>
 
    <!-- Navigation -->
    <?php  include_once 'includes/navbar.php'; ?>
    <!-- end of navbar -->
    <!-- end of navigation -->


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
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control-input" id="password" name="password">
                                <label class="label-control" for="password">Password</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group"> 
                                <input type="submit" class="form-control-submit-button" name="submit" id="login" value ="LOG IN">
                  

                            </div>
                            <div class="form-message">
                                <div id="lmsgSubmit" class="h3 text-center hidden"></div>
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
        success:function(data){
          if(data.code == 200){
            window.location.href = "user_dashboard/dashboard.php";
          }
          else{
            alert("something went wrong");
          }
        }
     })
    })
  </script>

    <!-- Scripts -->
    <?php  include_once 'includes/footer.php'; ?>
  