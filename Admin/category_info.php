<?php
session_start();
require_once '../common/config.php';
require_once 'includes/header.php';

require_once 'includes/aside.php';



?>
<style>
  #myTable1 {
    margin-top: 63px;
  }

  .btn_user {
    display: flex;
    justify-content: flex-end;
    margin-right: 10px;
  }

  .btn {
    height: 50px;
  }

  .error {
    color: red;
    font-size: 18px;

  }
</style>
<div class="row align-items-center mb-3">
  <div class="col-sm-6">
    <h3 class="mb-0 fw-semibold">Foods </h3>
  </div>
  <div class="col-sm-6">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb justify-content-sm-end mb-0">
        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>
    </nav>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card mb-4" style="height: 2000px;">
      <div class="card-header">
        List of foods
        <div class="mb-4 btn_user">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newfood">
            <i class="fa fa-plus"></i>&nbsp; Add New Food
          </button>
          <div class="modal fade" id="newfood" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <form id="food">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="cat_title" class="form-label"></label>
                      <select name="type" id="category" class="form-control">
                        <option value="">Select Type of food</option>
                        <?php
                        $cat_query = "SELECT * FROM category";
                        $cat_result = mysqli_query($con_query, $cat_query);
                        while ($cat = mysqli_fetch_assoc($cat_result)) {
                          echo '<option value="' . $cat['id'] . '">' . $cat['category_name'] . '</option>';
                        }
                        ?>
                      </select>
                      <div id="type_err" class="error"></div>

                    </div>
                    <div class="mb-3">
                      <label for="cat_title" class="form-label">Title</label>
                      <input type="text" name="category_title" id="cat_title" class="form-control" placeholder="Enter the title">
                      <div id="category_title_err" class="error"></div>

                    </div>
                    <div class="mb-3">
                      <label for="des" class="form-label">Content / Description</label>
                      <textarea name="category_description" id="des" rows="8" cols="50" class="form-control" placeholder="Enter the content or description"></textarea>
                      <div id="category_description_err" class="error"></div>


                    </div>
                    <div class="mb-3">
                      <label for="price" class="form-label">Price</label>
                      <input type="text" name="category_price" id="price" class="form-control" placeholder="Enter the price">

                      <div id="category_price_err" class="error"></div>
                    </div>
                    <div class="mb-3">
                      <label for="image" class="form-label">Image</label>
                      <input type="file" name="category_image" class="form-control">
                      <div id="category_image_err" class="error"></div>
                    </div>




                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="submit" value="Add Food" id="add_food_btn">
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
            <form method="POST" id="editForm">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="id" id="myid">
                  <div class="mb-3">
                  <label for="Food_title" class="form-label">Food Category</label>

                  <select name="type" id="type" class="form-control">
                        <option value="">Select Type of food</option>
                        <?php
                        $cat_query = "SELECT * FROM category";
                        $cat_result = mysqli_query($con_query, $cat_query);
                        while ($cat = mysqli_fetch_assoc($cat_result)) {
                          echo '<option value="' . $cat['id'] . '">' . $cat['category_name'] . '</option>';
                        }
                        ?>
                      </select>
                    <label for="Food_title" class="form-label">Title</label>
                 
                    <input type="text" name="food_title" id="category_title" class="form-control">
                    <div id="name_er" class="error"></div>
                  </div>
                  <div class="mb-3">
                    <label for="des" class="form-label">Content / Description</label>
                    <textarea name="category_description" id="description" rows="8" cols="50" class="form-control" placeholder="Enter the content or description"></textarea>
                    <div id="category_description_err" class="error"></div>


                  </div>
                  <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" name="category_price" id="food_price" class="form-control" placeholder="Enter the price">

                    <div id="category_price_err" class="error"></div>
                  </div>
                  <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="category_image" id="food_image" class="form-control">
                    <div id="category_image_err" class="error"></div>
                  </div>

                </div>
                <div class="modal-footer">
                  <input type="submit" class="btn btn-primary" name="update" value="Update" id="update_menu">
                </div>


              </div>
            </form>
          </div>
        </div>
        <table id="myTable1" class="table table-striped table table-bordered mt-5" border="1px" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">title</th>
              <th scope="col">Food_description</th>
              <th scope="col">Food Price</th>
              <th scope="col">Type</th>
              <th scope="col">Image</th>
              <th scope="col">Operation</th>

              <!-- <th scope="col">Operation</th> -->

            </tr>
          </thead>
          <tbody>
            <?php
            $select = "select m.*, c.category_name as category_name from menu m left join category c on c.id = m.category_id";
            $result = mysqli_query($con_query, $select);

            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['category_name']; ?></td>
                <td><img src="../Admin/assets/img/<?php echo $row['image']; ?>" width="200px" height="150px"></td>
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
                $('#myTable1').DataTable();
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

    $("#add_food_btn").click(function(e) {
      e.preventDefault();
      let form = document.getElementById("food");
      let formdata = new FormData(form);
      formdata.append("action", "food_insert");
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

              icon: "success",
              title: "food has been saved successfully",
              showConfirmButton: false,
              timer: 1500
            });

            $('#newfood').modal('hide');

          } else {
            if (data.errors.category_title) {
              $("#category_title_err").text(data.errors.category_title);
            } else {
              $("#category_title_err").text("");
            }
            if (data.errors.category_description) {
              $("#category_description_err").text(data.errors.category_description);
            } else {
              $("#category_description_err").text("");
            }
            if (data.errors.category_price) {
              $("#category_price_err").text(data.errors.category_price);
            } else {
              $("#category_price_err").text("");
            }

            if (data.errors.type) {
              $("#type_err").text(data.errors.type);
            } else {
              $("#type_err").text("");
            }



            if (data.errors.category_image) {
              $("#category_image_err").text(data.errors.category_image);
            } else {
              $("#category_image_err").text("");
            }
          }
        }

      });


    });
  });
</script>


<script>
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
        Swal.fire("Delete Successfully!", "", "success");
        $.ajax({
          url: "category_data.php",
          type: "POST",
          data: {
            "action": "category_delete",
            "id": id
          },
          success: function(data) {
            // alert(data);
          }
        });
      }
    });

  });
</script>

<script>
  $(".edit").click(function(e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
      url: 'category_data.php',
      type: 'POST',
      data: {
        id: id,
        "action": "category_view",
      },


      success: function(response) {


        var userDetails = JSON.parse(response);

        $("#myid").val(userDetails.id);
        $("#category_title").val(userDetails.title);
        $("#description").val(userDetails.description);
        $("#food_price").val(userDetails.price);
        $("#type").val(userDetails.category_id);

        // $("#food_image").val(userDetails.image);



      },
      error: function() {
        alert("Error fetching user details.");
      }
    });


  })
</script>
<script>
    $("#update_menu").click(function(e) {
        e.preventDefault();
        var editform = document.getElementById('editForm');

        var formdata = new FormData(editform);
        formdata.append("action", "update_menu");
        $.ajax({
            url: "category_data.php",
            type: "POST",
            dataType: "json",
            data: formdata,
            processData: false,
            contentType: false,
            success: function(res) {
                if (res.code == 200) {
                    //  $("#editModal").hide();  
                    $('#editModal').modal('hide');

                    location.reload();
                } else {
                    // alert(res.errors.email);

                    if (res.errors.type) {
                        $("#name_er").text(res.errors.type);
                    } else {
                        $("#name_er").text("");
                    }
                }
            }
        })
    })
</script>
<?php
require_once 'includes/footer.php';

?>