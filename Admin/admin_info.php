<?php
session_start();
require_once "../common/config.php";
?>

<?php require_once "includes/header.php"; ?>


<?php require_once "includes/aside.php"; ?>



<div class="row align-items-center mb-3">
  <div class="col-sm-6">
    <h3 class="mb-0 fw-semibold">Admin</h3>
  </div>
  <div class="col-sm-6">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb justify-content-sm-end mb-0">
        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Admin</li>
      </ol>
    </nav>
  </div>
</div>



<div class="app-content">

  <div class="container-fluid">

    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4" style="height: 500px;">
          <div class="card-header">
            List of Admins
          </div>
          <div class="card-body">
            <table id="myTable2" class="table table-striped table-bordered" border="1px" cellspacing="0" width="100%">

              <thead>
                <tr>
                  <th scope="col">Username</th>
                  <th scope="col">Email</th>
                  <th scope="col">Operation</th>

                </tr>
              </thead>
              <tbody>
                <?php
                $select = "SELECT * FROM admin";
                $result = mysqli_query($con_query, $select);
                while ($row = mysqli_fetch_assoc($result)) { ?>
                  <tr>
                    <td><?php echo $row["username"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td>

                      <button class="btn btn-primary edit" data-id="<?php echo $row['id'] ?>" data-bs-toggle="modal" data-bs-target="#editModal"> <i class="fa fa-edit"></i></button>
                      <button class="btn btn-danger delete" data-id="<?php echo $row['id'] ?> "> <i class="fa fa-trash"></i></button>
                    </td>

                  </tr>
                <?php } ?>
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

    <!-- Now your table -->


  </div>
</div>


<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" id="editForm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="myid">
          <div class="mb-3">
            <label for="name" class="form-label">Username</label>
            <input type="text" class="form-control" id="e_name" name="name">
            <b id="name_er" class="error"></b>
          </div>
          <div class="mb-3">

            <b id="username_er" class="error"></b>

          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
            <b id="email_er" class="error"></b>

          </div>
          <!-- <div class="mb-3">
            <label for="mobile" class="form-label">Mobile</label>
            <input type="text" class="form-control" id="mobile" name="mobileno" required>
            <div id="mobile_er" class="error"></div>
       
          </div>
            -->




        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" name="update" id="update_user" value="update">
        </div>


      </div>
    </form>
  </div>
</div>
<script>
  $(".delete").click(function(e) {
    e.preventDefault();
    let id = $(this).data("id");
    Swal.fire({
      title: 'Are you sure?',
      text: "You are about to delete this user.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#e3342f',
      cancelButtonColor: '#6c757d',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'admin_delete.php?id=' + id;
      }
    });


  })
</script>

<script>
  $(".edit").click(function(e) {
    e.preventDefault();
    let id = $(this).data("id");
    $.ajax({
      url: "admin_fetch_data.php",
      type: "post",
      data: {
        id: id
      },
      success: function(res) {
        var data = JSON.parse(res);
        $("#myid").val(data.id);
        $("#e_name").val(data.username);
        $("#email").val(data.email);
      }
    })

  });
</script>

<script>
  $("#update_user").click(function(e) {
    e.preventDefault();
    var form = document.getElementById("editForm");
    var formdata = new FormData(form);
    formdata.append("action", "update");
    $.ajax({
      url: "admin_update.php",
      type: "post",
      dataType: "json",
      data: formdata,
      processData: false,
      contentType: false,
      success: function(response) {
        if (response.code == 200) {
          //  $("#editModal").hide();  
          $('#editModal').modal('hide');
          Swal.fire({
            title: "Update Data SuccessFully!",
            icon: "success",
            draggable: true
          }).then(() => {
            location.reload();
          });

        } else {
          if (response.error.name) {
            $("#name_er").text(response.error.name);
          } else {
            $("#name_er").text("");
          }
          if (response.error.email) {
            $("#email_er").text(response.error.email);
          } else {
            $("#email_er").text("");
          }

        }
      }
    })

  })
</script>
<?php require_once "includes/footer.php"; ?>