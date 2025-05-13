<?php
session_start();
require_once '../common/config.php';
require_once 'includes/header.php';

require_once 'includes/aside.php';



?>
<style>
  #myTable1 {
    /* margin-top: 53px; */
  }
</style>
<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <div class="card-header bg-primary" style="height:35px;">
        <h5 class="text-white">Privacy and Policy</h5>
      </div> <!-- card-header -->

      <?php
      //  check for record
      $select_data = "select * from privacy";
      $result = mysqli_query($con_query, $select_data);
      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

      ?>


        <div class="card-body">
          <div class="innerdiv">
            <form method="post" id="update_form"> 
               
              <div class="form-group mb-2">
                  <input type="hidden" name="privacy_id" id="privacy_id" value="<?php echo $row['id']; ?>" >
                  <label for="description_edit" class="form-label">Description</label>
                <textarea class="form-control" id="description_edit" name="description_edit" rows="10" placeholder="Enter Description"> <?php echo $row['description']; ?></textarea>
                <div id="description_edit_error" class="error"></div>

              </div>  
               

              <button type="submit" id="update_privacy" class="btn btn-primary">Update</button>
            </form>
          </div>

        </div> <!-- card-body -->
      <?php
      } else {
      ?>
        <div class="card-body">
          <div class="innerdiv">
            <form method="post" id="add_form">
              
              
              <div class="form-group mb-2">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="10"></textarea>
                <div id="description_error" class="error"></div>

              </div> 

              <button type="submit" id="add_privacy" class="btn btn-primary">Add</button>
            </form>
          </div>

        </div>
      <?php
      }


      ?>
    </div> <!-- card -->
  </div> <!-- col -->
</div> <!-- row -->

<!-- Include CKEditor -->
<script>
  $(document).ready(function() {
    $("#add_privacy").click(function(e) {
      e.preventDefault();
      var form = document.getElementById("add_form");
      var formdata = new FormData(form);
      formdata.append("action", "privacy_insert");

      $.ajax({
        url: "category_data.php",
        type: "post",
        data: formdata,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function(data) {
          if (data.status == 200) {
            Swal.fire({
              title: "Menu has been saved successfully",
              icon: "success",
              draggable: true
            }).then(() => {
              location.reload();
            }); 
            $('#newfood').modal('hide'); 
          } else {
         
            if (data.errors.description) {
              $("#description_error").text(data.errors.description);
            } else {
              $("#description_error").text("");
            }  
          }
           
        }
      })

    })
 
     
    $("#update_privacy").click(function(e){
      e.preventDefault();
      var form = document.getElementById("update_form");
      var formdata = new FormData(form);
      formdata.append("action", "privacy_update");

      $.ajax({
        url: "category_data.php",
        type: "post",
        data: formdata,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function(data) {
          if (data.code == 200) {
            Swal.fire({
              title: "data has been updated successfully",
              icon: "success",
              draggable: true
            }).then(() => {
              location.reload();
            });

          

          } else {
              alert(data.errors.edit_description);
            if (data.errors.edit_description) {
              $("#description_edit_error").text(data.errors.edit_description);
            } else {
              $("#description_edit_error").text("");
            }
            
          }

        }
       
      })
    })
  

  });
</script>
<?php
require_once 'includes/footer.php';

?>