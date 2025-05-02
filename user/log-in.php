<?php 
require_once '../common/config.php';


 include_once 'includes/header.php'; ?>
 
    <!-- Navigation -->
    <?php  include_once 'includes/navbar.php'; ?>
    <!-- end of navbar -->
    <!-- end of navigation -->
     <style>
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
    <!-- Scripts -->
    <?php  include_once 'includes/footer.php'; ?>
  