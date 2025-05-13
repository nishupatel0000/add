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
        <h3 class="mb-0 fw-semibold">Inquiries</h3>
    </div>
    <div class="col-sm-6">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-sm-end mb-0">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Inquiry</li>
            </ol>
        </nav>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card mb-4" style="height: 1100px;">
            <div class="card-header">
                List of Inquiries

            </div>
            <div class="card-body">
   <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="container">
                  <div class="row">
                    <div class="col-sm">
                      <p><strong>Name:</strong> <span id="view_name"></span></p>
                    
                      <p><strong>Email:</strong> <span id="view_email"></span></p>
                      <p><strong>Mobile No:</strong> <span id="phone"></span></p>
                      <p><strong>Date :</strong> <span id="Date"></span></p>
                      <p><strong>Time :</strong> <span id="time"></span></p>
                      <p><strong>People :</strong> <span id="people"></span></p>
                      <p><strong>Message : </strong> <span id="message"></span></p>


                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
                <table id="myTable2" class="table table-striped table table-bordered" border="1px" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">view</th>




                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $select = "SELECT * FROM book_table";
                        $result = mysqli_query($con_query, $select);

                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['phone']; ?></td>

                                <td>
                                         <button class="btn btn-warning view"  data-id="<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#viewModal"> <i class="fa fa-eye" aria-hidden="true"></i></button> 

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
        // $(".delete_btn").click(function(e) {
        //     e.preventDefault();
        //     var id = $(this).data("id");
        //     Swal.fire({
        //         title: "Are you sure?",
        //         text: "Do You Want to delete this record? !",
        //         icon: "warning",
        //         showCancelButton: true,
        //         confirmButtonColor: "#d33",
        //         cancelButtonColor: "#3085d6",
        //         confirmButtonText: "Yes, delete it!"
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             $.ajax({
        //                 url: "category_data.php",
        //                 type: "POST",
        //                 data: {
        //                     "action": "chef_delete",
        //                     "id": id
        //                 },
        //                 success: function(data) {
        //                     Swal.fire("Chef Deleted Successfully!", "", "success")
        //                         .then(() => {
        //                             location.reload();
        //                         });
        //                 }
        //             });
        //         }
        //     });

        // });

        //  edit 

        $(".view").click(function(e) {

      var userId = $(this).data("id");
  
      $.ajax({
        url: '../admin/category_data.php',
        type: 'POST',
        data: {
          id: userId,
          action:"data_get"
        },
        success: function(response) {

          var userDetails = JSON.parse(response);
       
      $("#view_name").text(userDetails.name);
          $("#view_email").text(userDetails.email);
          $("#phone").text(userDetails.phone);
          $("#Date").text(userDetails.date);
          $("#time").text(userDetails.time);
          $("#people").text(userDetails.people);
          $("#message").text(userDetails.message);
        },
        error: function() {
          alert("Error fetching user details.");
        }
      });
    });



    });
</script>
<?php
require_once 'includes/footer.php';

?>