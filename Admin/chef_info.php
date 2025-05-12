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
    <h3 class="mb-0 fw-semibold">Chefs</h3>
  </div>
  <div class="col-sm-6">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb justify-content-sm-end mb-0">
        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Chef</li>
      </ol>
    </nav>
  </div>
</div>


<div class="row">
  <div class="col-md-12">
    <div class="card mb-4" style="height: 1100px;">
      <div class="card-header">
        List of Chefs
        <div class="mb-4 btn_user">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newchef">
            <i class="fa fa-plus"></i>&nbsp; Add New Chef
          </button>
          <div class="modal fade" id="newchef" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <form id="food">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Chef</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="chef_title" class="form-label">Title</label>
                      <input type="text" name="chef_title" id="chef_title" class="form-control" placeholder="Enter the title">
                      <div id="chef_title_err" class="error"></div>


                    </div>
                    <div class="mb-3">
                      <label for="chef_designation" class="form-label">Designation</label>
                      <input type="text" name="chef_designation" id="chef_designation" class="form-control" placeholder="Enter the designation">
                      <div id="chef_designation_err" class="error"></div>
                    </div>
                    <div class="mb-3">
                      <label for="des" class="form-label">Content / Description</label>
                      <textarea name="chef_description" id="des" rows="8" cols="50" class="form-control" placeholder="Enter the content or description"></textarea>
                      <div id="chef_description_err" class="error"></div>


                    </div>

                    <div class="mb-3">
                      <label for="image" class="form-label">Image</label>
                      <input type="file" name="chef_image" class="form-control">
                      <div id="chef_image_err" class="error"></div>
                    </div>




                  </div>
                  <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="submit" value="Add" id="add_chef_btn">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
      <div class="modal fade" id="editchef" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form method="POST" id="editForm">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editModalLabel">Edit Chef</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="id" id="myid">
                  <div class="mb-3"> 
                    <label for="cheftitle" class="form-label">Title</label>
                    <input type="text" name="chef_edit_title" id="chef_edit_title" class="form-control" placeholder="Enter the title">
                    <div id="chef_title_error" class="error"></div>
                  </div>
                  <div class="mb-3"> 
                    <label for="chef_edit_designation" class="form-label">designation</label>
                    <input type="text" name="chef_edit_designation" id="chef_edit_designation" class="form-control" placeholder="Enter the designation">
                    <div id="chef_edit_designation_error" class="error"></div>
                  </div>
                  <div class="mb-3">
                    <label for="chef_edit_description" class="form-label">Content / Description</label>
                    <textarea name="chef_edit_description" id="chef_edit_description" rows="8" cols="50" class="form-control" placeholder="Enter the content or description"></textarea>
                    <div id="chef_edit_description_error" class="error"></div>


                  </div>
              
                  <div class="mb-3">
                    <label for="chef_edit_image" class="form-label">Image</label>
                    <input type="file" name="chef_edit_image" id="chef_edit_image" class="form-control">
                    <input type="hidden" name="old_chef_image" id="old_chef_image" value="">

                    <img src="" id="chef_image_preview" width="250px" height="200px">
                    <div id="chef_edit_image_error" class="error"></div>
                  </div>

                </div>
                <div class="modal-footer">
                  <input type="submit" class="btn btn-primary" name="update" value="Update" id="update_chef">
                </div>


              </div>
            </form>
          </div>
        </div>
        <table id="myTable2" class="table table-striped table table-bordered" border="1px" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Title</th>
              <th scope="col">Designation</th>
              <th scope="col">Description</th>
              <th scope="col">Image</th>
              <th scope="col">Operation</th>



            </tr>
          </thead>
          <tbody>
            <?php
            $select = "SELECT * FROM chef";
            $result = mysqli_query($con_query, $select);

            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['designation']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td>
                  <?php
                  if ($row['image'] == NULL) {
                  ?>
                    <img src="../Admin/assets/img/avatar.jpg" class="profile_img">
                  <?php
                  } else {
                  ?>
                    <img src="../Admin/assets/img/chefs/<?php echo $row['image']; ?>" class="profile_img">
                  <?php
                  }
                  ?>
                </td>
                <td id="mytd">
                <a href=""> <button class="btn btn-primary edit" data-id="<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#editchef"> <i class="fa fa-edit"></i></button></a>
                  <a href=""><button class="btn  btn-danger delete_btn" data-id="<?php echo $row['id']; ?>"><i class="fa fa-trash"></i></button></a>
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

  // insert/add chef
    $("#add_chef_btn").click(function(e) {
      e.preventDefault();
      let form = document.getElementById("food");
      let formdata = new FormData(form);
      formdata.append("action", "chef_insert");
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
              title: "chef has been saved successfully",
              icon: "success",
              draggable: true
            }).then(() => {
              location.reload();
            });

            $('#newchef').modal('hide');

          } else {
            if (data.errors.chef_title) {
              $("#chef_title_err").text(data.errors.chef_title);
            } else {
              $("#chef_title_err").text("");
            }
            if (data.errors.chef_designation) {
              $("#chef_designation_err").text(data.errors.chef_designation);
            } else {
              $("#chef_designation_err").text("");
            }
            if (data.errors.chef_description) {
              $("#chef_description_err").text(data.errors.chef_description);
            } else {
              $("#chef_description_err").text("");
            }

            if (data.errors.type) {
              $("#type_err").text(data.errors.type);
            } else {
              $("#type_err").text("");
            }



            if (data.errors.chef_image) {
              $("#chef_image_err").text(data.errors.chef_image);
            } else {
              $("#chef_image_err").text("");
            }
          }
        }

      });


    });

    // delete chef
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
              "action": "chef_delete",
              "id": id
            },
            success: function(data) {
              Swal.fire("Chef Deleted Successfully!", "", "success")
                .then(() => {
                  location.reload();
                });
            }
          });
        }
      });

    });

    //  edit 

    $(".edit").click(function(e) {
      e.preventDefault();
      var id = $(this).data("id");
      $.ajax({
        url: 'category_data.php',
        type: 'POST',
        data: {
          id: id,
          "action": "chef_view",
        },


        success: function(response) {
          // alert(response);
          // console.log("sdfs" + base_url);
          var userDetails = JSON.parse(response);
              // alert(userDetails.image);
          $("#myid").val(userDetails.id);
          $("#chef_edit_title").val(userDetails.title);
          $("#chef_edit_designation").val(userDetails.designation);
          $("#chef_edit_description").val(userDetails.description);
        
          $("#chef_image_preview").attr('src', base_url + "admin/assets/img/chefs/" + userDetails.image);
          $("#old_chef_image").val(userDetails.image);


          // $("#food_image").val(userDetails.image);



        },
        error: function() {
          alert("Error fetching user details.");
        }
      });


    })


    // update
    $("#update_chef").click(function(e) {
        e.preventDefault();
        var editform = document.getElementById('editForm');

        var formdata = new FormData(editform);
        formdata.append("action", "update_chef");
        $.ajax({
            url: "category_data.php",
            type: "POST",
            dataType: "json",
            data: formdata,
            processData: false,
            contentType: false,
            success: function(res) {

                if (res.code == 200) {

                    $('#editchef').modal('hide');
                    Swal.fire({
                        title: " Data Updated SuccessFully!",
                        icon: "success",
                        draggable: true
                    }).then(() => {
                        location.reload();
                    });



                } else {
                    // alert(res.errors.email);

                    if (res.errors.chef_title_error) {
                        $("#chef_title_error").text(res.errors.chef_title_error);
                    } else {
                        $("#chef_title_error").text("");
                    }
                    if (res.errors.chef_edit_designation) {
                        $("#chef_edit_designation_error").text(res.errors.chef_edit_designation);
                    } else {
                        $("#chef_edit_designation_error").text("");
                    }   if (res.errors.chef_edit_description) {
                        $("#chef_edit_description_error").text(res.errors.chef_edit_description);
                    } else {
                        $("#chef_edit_description_error").text("");
                    }   i 
                }
            }
        })
    })

  });
</script>
<?php
require_once 'includes/footer.php';

?>