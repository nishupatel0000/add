<?php
session_start();
require_once '../common/config.php';
require_once 'includes/header.php';
require_once 'includes/aside.php';



?>
<style>
  #myTable2 {
    margin-top: 53px;
  }

  #mytd {
    text-align: center;
  }
</style>


<div class="row align-items-center mb-3">
  <div class="col-sm-6">
    <h3 class="mb-0 fw-semibold">Testimonial</h3>
  </div>
  <div class="col-sm-6">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb justify-content-sm-end mb-0">
        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Testimonial</li>
      </ol>
    </nav>
  </div>
</div>


<div class="row">
  <div class="col-md-12">
    <div class="card mb-4" style="height: 1550px;">
      <div class="card-header">
        List of testimonial
        <div class="mb-4 btn_user">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newtestimonial">
            <i class="fa fa-plus"></i>&nbsp; Add New Testimonial

          </button>
          <div class="modal fade" id="newtestimonial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <form id="testimonial_add" method="post">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">

                    <div class="mb-3">
                      <label for="cat_title" class="form-label">Username</label>
                      <input type="text" name="Username" id="Username" class="form-control" placeholder="Enter Username">
                      <div id="Username_err" class="error"></div>

                    </div>

                    <div class="mb-3">
                      <label for="cat_title" class="form-label">Designation</label>
                      <input type="text" name="Designation" id="Designation" class="form-control" placeholder="Enter Designation">
                      <div id="Designation_err" class="error"></div>

                    </div>
                    <div class="mb-3">
                      <label for="des" class="form-label">Content / Description</label>
                      <textarea name="description" id="description" rows="8" cols="50" class="form-control" placeholder="Enter the content or description"></textarea>
                      <div id="description_err" class="error"></div>
                    </div>
                    <div class="mb-3">
                      <label for="cat_title" class="form-label">rating</label>
                      <input type="text" name="rating" id="rating" class="form-control" placeholder="Enter Rating">
                      <div id="rating_err" class="error"></div>

                    </div>

                    <div class="mb-3">
                      <label for="image" class="form-label">Image</label>
                      <input type="file" name="image" id="image" class="form-control">
                      <div id="image_err" class="error"></div>
                    </div>




                  </div>
                  <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <input type="submit" class="btn btn-primary" name="submit" value="Add" id="add_testimonial_btn">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="modal fade" id="editcategory" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form method="POST" id="testimonial_edit">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editModalLabel">Edit Testimonial</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="id" id="myid">
                  <div class="mb-3">


                    <label for="Food_title" class="form-label">Title</label>

                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter Title">
                    <div id="usernameerror" class="error"></div>
                  </div>

                  <div class="mb-3">
                    <label for="cat_title" class="form-label">Designation</label>
                    <input type="text" name="edit_designation" id="edit_designation" class="form-control" placeholder="Enter Designation">
                    <div id="designation_err" class="error"></div>

                  </div>
                  <div class="mb-3">
                    <label for="des" class="form-label">Content / Description</label>
                    <textarea name="edit_description" id="edit_description" rows="8" cols="50" class="form-control" placeholder="Enter the content or description"></textarea>
                    <div id="description_error" class="error"></div>


                  </div>
                  <div class="mb-3">
                    <label for="food_rating" class="form-label">Rating</label>
                    <input type="text" name="rating" id="food_rating" class="form-control" placeholder="Enter the rating">

                    <div id=" rating_error" class="error"></div>
                  </div>
                  <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="edit_image" id="edit_image" class="form-control">
                    <input type="hidden" name="old_category_image" id="old_category_image" value="">

                    <img src="" id="food_image_preview" width="250px" height="200px">
                    <div id="category_image_err" class="error"></div>
                  </div>

                </div>
                <div class="modal-footer">
                  <input type="submit" class="btn btn-primary" name="update" value="Update" id="testimonial_update">
                </div>


              </div>
            </form>
          </div>
        </div>
        <table id="myTable2" class="table table-striped table table-bordered" border="1px" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Username</th>
              <th scope="col">Designation</th>
              <th scope="col">Description</th>
              <th scope="col">rating</th>
              <th scope="col">Image</th>
              <th scope="col">Operation</th>



            </tr>
          </thead>
          <tbody>
            <?php
            $select = "SELECT * FROM testimonial";
            $result = mysqli_query($con_query, $select);

            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['designation']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['rating']; ?></td>

                <td><img src="../admin/assets/img/testimonials/<?php echo $row['image']; ?>" width="200px" height="150px"></td>

                <td id="mytd">
                  <a href=""> <button class="btn btn-primary edit" data-id="<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#editcategory"> <i class="fa fa-edit"></i></button></a>

                  <a href="#"><button class="btn  btn-danger delete_btn" data-id="<?php echo $row['id']; ?>"><i class="fa fa-trash"></i></button></a>
                </td>

              </tr>
            <?php
            }
            ?>
            <script>
              $(document).ready(function() {
                $('#myTable2').DataTable();
              });
            </script>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    const base_url = "<?php echo $base_url; ?>";

    $("#add_testimonial_btn").click(function(e) {
      e.preventDefault();

      let form = document.getElementById("testimonial_add");
      let formdata = new FormData(form);
      formdata.append("action", "testimonial_insert");
      $.ajax({

        url: "category_data.php",
        type: "post",
        dataType: "json",
        data: formdata,
        processData: false,
        contentType: false,
        success: function(data) {
          if (data.status == 200) {
            Swal.fire({
              title: "Testimonial has been saved successfully",
              icon: "success",
              draggable: true
            }).then(() => {
              location.reload();
            });

            $('#newtestimonial').modal('hide');

          } else {
            if (data.errors.Username) {
              $("#Username_err").text(data.errors.Username);
            } else {
              $("#Username_err").text("");
            }

            if (data.errors.Designation) {
              $("#description_err").text(data.errors.Designation);
            } else {
              $("#description_err").text("");
            }

            if (data.errors.Designation) {
              $("#Designation_err").text(data.errors.Designation);
            } else {
              $("#Designation_err").text("");
            }
            if (data.errors.rating) {
              $("#rating_err").text(data.errors.rating);
            } else {
              $("#rating_err").text("");
            }

            if (data.errors.image) {
              $("#image_err").text(data.errors.image);
            } else {
              $("#image_err").text("");
            }
          }
        }

      });


    });


    $(".delete_btn").click(function(e) {
      e.preventDefault();
      var id = $(this).data("id");
      Swal.fire({
        title: "Are you sure?",
        text: "Do You Want to delete this record? !",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {

          $.ajax({
            url: "category_data.php",
            type: "POST",
            data: {
              "action": "testimonial_delete",
              "id": id
            },
            success: function(data) {
              Swal.fire("Delete Successfully!", "", "success")
                .then(() => {
                  location.reload();
                });
            }
          });
        }
      });
    });
    $(".edit").click(function(e) {
      e.preventDefault();
      var id = $(this).data("id");
      $.ajax({
        url: 'category_data.php',
        type: 'POST',
        data: {
          id: id,
          "action": "testimonial_view",
        },
        success: function(response) {
          // console.log("sdfs" + base_url);
          var userDetails = JSON.parse(response);
          $("#myid").val(userDetails.id);

          $("#username").val(userDetails.username);
          $("#edit_designation").val(userDetails.designation);
          $("#edit_description").val(userDetails.description);
          $("#food_rating").val(userDetails.rating);
          $("#type").val(userDetails.category_id);
          $("#food_image_preview").attr('src', base_url + "admin/assets/img/testimonials/" + userDetails.image);
          $("#old_category_image").val(userDetails.image);
        },
        error: function() {
          alert("Error fetching user details.");
        }
      });


    })

    $("#testimonial_update").click(function(e) {
      e.preventDefault();
      var editform = document.getElementById('testimonial_edit');

      var formdata = new FormData(editform);
      formdata.append("action", "update_testimonial");
      $.ajax({
        url: "category_data.php",
        type: "POST",
        dataType: "json",
        data: formdata,
        processData: false,
        contentType: false,
        success: function(res) {
          if (res.code == 200) {
            console.log(res.msg);
            //  $("#editModal").hide();  
            $('#editcategory').modal('hide');
            Swal.fire({
              title: " Record Updated SuccessFully!",
              icon: "success",
              draggable: true
            }).then(() => {
              location.reload();
            });

          } else {
            // alert(res.errors.email);
            // alert(res.errors.food_title);

            if (res.errors.type) {
              $("#usernameerror").text(res.errors.type);
            } else {
              $("#usernameerror").text("");
            }
            if (res.errors.food_title) {
              $("#Designation_err").text(res.errors.food_title);
            } else {
              $("#Designation_err").text("");
            }
            if (res.errors.category_description) {
              $("#description_error").text(res.errors.category_description);
            } else {
              $("#description_error").text("");
            }

            if (res.errors.price) {
              $("#rating_error").text(res.errors.price);
            } else {
              $("#rating_error").text("");
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