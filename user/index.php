  <?php include_once 'includes/header.php'; ?>


  <style>
      .field-icon {
          float: right;
          margin-right: 10px;
          margin-top: -30px;
          position: relative;
          z-index: 2;
      }
      .error{
    color:red;
    font-size:18px;
    font-weight:10px;
   
  }

  #emailerr{
    margin-right: 204px;
  }
  #nameerr{
    margin-right: 196px;
  }
  #numbererr{
    margin-right: 181px;
  }

  #passworderr{
    margin-right: 165px;
  }
  #cpassworderr{
    margin-right: 147px;
  }

  </style>

  <!-- Navigation -->
  <?php include_once 'includes/navbar.php'; ?>

  <!-- end of navbar -->
  <!-- end of navigation -->


  <!-- Header -->
  <header id="header" class="ex-2-header">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <h1>Sign Up</h1>
                  <p>  Already signed up? Then just <a class="white" href="log-in.php">Log In</a></p>
                  <!-- Sign Up Form -->
                  <div class="form-container">
                      <form id="signUpForm">
                          <div class="form-group">
                              <input type="email" class="form-control-input" id="email" name="email"  >
                              <label class="label-control" for="semail">Email</label>
                              <div id="emailerr"  class=" error"></div>
                          </div>
                          <div class="form-group">
                              <input type="text" class="form-control-input" id="name" name="firstname"  >
                              <label class="label-control" for="sname">Name</label>
                              <div  id="nameerr" class="error "></div>
                          </div>
                          <div class="form-group">
                              <input type="text" class="form-control-input" id="number"  name="number" >
                              <label class="label-control" for="sname">Mobile Number</label>
                              <div id="numbererr" class="error "></div>
                          </div>
                          <div class="form-group">
                              <input type="password" class="form-control-input" id="password" name="password">
                              <label class="label-control" for="password">Password</label>
                              <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                              <div id="passworderr" class="error "></div>

                          </div>
                          <div class="form-group">
                              <input type="password" class="form-control-input" id="confirmpassword" name="confirmpassword">
                              <label class="label-control" for="password">Confirm Password</label>
                              <span toggle="#confirmpassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                              <div id="cpassworderr" class="error "></div>

                          </div>
                          
                   
                        

                          <div class="form-group">
                              <input  type="submit" name="submit" id="submit" class="form-control-submit-button" value="SIGN UP"> 
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
  <script>
    $("#submit").click(function(e){
        e.preventDefault();
        var form = document.getElementById("signUpForm");
        var formdata = new FormData(form);
        formdata.append("action","signup");
         $.ajax({
            url:"login_data.php",
            type : "post",
            data : formdata,
            processData: false,
            contentType: false,
            dataType : "json",
            success : function(data){
               if(data.code==200){
                alert(data.msg);
               }
               else{

                if(data.error.email){
                  $("#emailerr").text(data.error.email);
                } else{                      
                  $("#emailerr").text("");
                }

                if(data.error.firstname){
                  $("#nameerr").text(data.error.firstname);
                } else{                      
                  $("#nameerr").text("");
                }
                
                   
                if(data.error.number){
                  $("#numbererr").text(data.error.number);
                } else{                      
                  $("#numbererr").text("");
                }

                 
                if(data.error.password){
                  $("#passworderr").text(data.error.password);
                } else{                      
                  $("#passworderr").text("");
                }
                if(data.error.cmd_password){
                  $("#cpassworderr").text(data.error.cmd_password);
                } else{                      
                  $("#cpassworderr").text("");
                }
              
                    

               }
            }

         })
    });
  </script>
  <!-- Scripts -->
  <?php include_once 'includes/footer.php'; ?>