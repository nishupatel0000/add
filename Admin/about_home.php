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
        <h5 class="text-white">About Home</h5>
      </div> <!-- card-header -->

      <?php
      //  check for record
      $select_data = "select * from about_us";
      $result = mysqli_query($con_query, $select_data);
      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

      ?>


        <div class="card-body">
          <div class="innerdiv">
            <form method="post" id="update_form">
              <div class="form-group mb-2">
                <input type="hidden" name="about_us_id" id="about_us_id" value="<?php echo $row['id']; ?>" >
                <label for="title">Title</label>
                <input type="text" class="form-control" id="edit_title" name="edit_title" aria-describedby="emailHelp" placeholder="Enter title" value="<?php echo $row['title']; ?> ">
                <div id="title_edit_error" class="error"></div>

              </div>

              <div class="form-group mb-2">
                <label for="primary_image_edit" class="form-label">Select primary image</label>
                <input class="form-control" type="file" id="primary_image_edit" name="primary_image_edit">
                 <img src="../Admin/assets/img/about/<?php echo $row['primary_image'];?>" class= "profile_img"  alt="" srcset="">
               <input type="hidden" name="old_about_primary_image" id="old_about_primary_image" value="<?php echo $row['primary_image'];?>">
                
                

              </div>
              <div class="form-group mb-2">
                <label for="description__edit" class="form-label">Description</label>
                <textarea class="form-control" id="description__edit" name="description__edit" rows="10" placeholder="Enter Description "> <?php echo $row['description']; ?></textarea>
                <div id="description_edit_error" class="error"></div>
              
              </div>
              <div class="form-group mb-2">
                <label for="secondary_image_edit" class="form-label">Select Secondary image</label>
                <input class="form-control" type="file" id="secondary_image_edit" name="secondary_image_edit">
                <img src="../Admin/assets/img/about/<?php echo $row['secondary_image'];?>" class= "profile_img"  alt="" srcset="">
               <input type="hidden" name="old_about_secondary_image" id="old_about_secondary_image"  value="<?php echo $row['secondary_image'];?>">
                <div id="secondary_image_error" class="error"></div>

              </div>

              <div class="form-group mb-2">
                <label for="booking_no_edit">Booking no</label>
                <input type="number" class="form-control" id="booking_no_edit" name="booking_no_edit" aria-describedby="emailHelp" placeholder="Enter mobile number" value="<?php echo trim($row['booking_no']); ?>">
                <div id="booking_no_edit_error" class="error"></div>

              </div>

              <button type="submit" id="update_about" class="btn btn-primary">Update</button>
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
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter title" > 
                <div id="title_error" class="error"></div>

              </div>

              <div class="form-group mb-2">
                <label for="primary_image" class="form-label">Select primary image</label>
                <input class="form-control" type="file" id="primary_image" name="primary_image" >
                <div id="primary_image_error" class="error"></div>
              </div>
              <div class="form-group mb-2">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="10"></textarea>
                <div id="description_error" class="error"></div>

              </div>
              <div class="form-group mb-2">
                <label for="secondary_image" class="form-label">Select Secondary image</label>
                <input class="form-control" type="file" id="secondary_image" name="secondary_image">
                <div id="secondary_image_error" class="error"></div>

              </div>

              <div class="form-group mb-2">
                <label for="booking_no">Booking no</label>
                <input type="number" class="form-control" id="booking_no" name="booking_no" aria-describedby="emailHelp" placeholder="Enter mobile number">
                <div id="booking_no_error" class="error"></div>

              </div>

              <button type="submit" id="add_about" class="btn btn-primary">Add</button>
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
    $("#add_about").click(function(e) {
      e.preventDefault();
      var form = document.getElementById("add_form");
      var formdata = new FormData(form);
      formdata.append("action", "about_insert");

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
            if (data.errors.title) {
              $("#title_error").text(data.errors.title);
            } else {
              $("#title_error").text("");
            }
            if (data.errors.primary_image) {
              $("#primary_image_error").text(data.errors.primary_image);
            } else {
              $("#primary_image_error").text("");
            }
            if (data.errors.description) {
              $("#description_error").text(data.errors.description);
            } else {
              $("#description_error").text("");
            }

            if (data.errors.secondary_image) {
              $("#secondary_image_error").text(data.errors.secondary_image);
            } else {
              $("#secondary_image_error").text("");
            }


            if (data.errors.booking_no) {
              $("#booking_no_error").text(data.errors.booking_no);
            } else {
              $("#booking_no_error").text("");
            }
          }

        }
      })

    })
 
     
    $("#update_about").click(function(e){
      e.preventDefault();
      var form = document.getElementById("update_form");
      var formdata = new FormData(form);
      formdata.append("action", "about_update");

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
            if (data.errors.edit_title) {
              $("#title_edit_error").text(data.errors.edit_title);
            } else {
              $("#title_edit_error").text("");
            }
           
            if (data.errors.description__edit) {
              $("#description_edit_error").text(data.errors.description__edit);
            } else {
              $("#description_edit_error").text("");
            }

            


            if (data.errors.booking_no_edit) {
              $("#booking_no_edit_error").text(data.errors.booking_no_edit);
            } else {
              $("#booking_no_edit_error").text("");
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