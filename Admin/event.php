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
        <h3 class="mb-0 fw-semibold">Events</h3>
    </div>
    <div class="col-sm-6">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-sm-end mb-0">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">event</li>
            </ol>
        </nav>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card mb-4" style="height: 1100px;">
            <div class="card-header">
                List of event
                <div class="mb-4 btn_user">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newevent">
                        <i class="fa fa-plus"></i>&nbsp; Add New event
                    </button>
                    <div class="modal fade" id="newevent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form id="event">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add event</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="event_title" class="form-label">Title</label>
                                            <input type="text" name="event_title" id="event_title" class="form-control" placeholder="Enter the title">
                                            <div id="event_title_err" class="error"></div>


                                        </div>

                                        <div class="mb-3">
                                            <label for="event_description" class="form-label">Content / Description</label>
                                            <textarea name="event_description" id="event_description" rows="8" cols="50" class="form-control" placeholder="Enter the content or description"></textarea>
                                            <div id="event_description_err" class="error"></div>


                                        </div>
                                        <div class="mb-3">
                                            <label for="event_price" class="form-label"> Price</label>
                                            <input type="text" name="event_price" id="event_price" class="form-control" placeholder="Enter the title">

                                            <div id="event_price_err" class="error"></div>


                                        </div>

                                        <div class="mb-3">
                                            <label for="event_image" class="form-label">Image</label>

                                            <input type="file" name="event_image" id="event_image" class="form-control">
                                            <div id="img_err" class="error"></div>
                                        </div>




                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-primary" name="submit" value="Add" id="add_event_btn">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="modal fade" id="editevent" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form method="POST" id="editForm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit event</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id" id="myid">
                                    <div class="mb-3">
                                        <label for="eventtitle" class="form-label">Title</label>
                                        <input type="text" name="event_edit_title" id="event_edit_title" class="form-control" placeholder="Enter the title">
                                        <div id="event_title_error" class="error"></div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="event_edit_description" class="form-label"> Description</label>
                                        <textarea name="event_edit_description" id="event_edit_description" rows="8" cols="50" class="form-control" placeholder="Enter the content or description"></textarea>
                                        <div id="event_edit_description_error" class="error"></div>

                                        <div class="mb-3">
                                            <label for="event_edit_price" class="form-label"> Price</label>
                                            <input type="text" name="event_edit_price" id="event_edit_price" class="form-control" placeholder="Enter the title">

                                            <div id="event_edit_price_err" class="error"></div>


                                        </div>

                                    </div>

                                    <div class="mb-3">
                                        <label for="event_edit_image" class="form-label">Image</label>
                                        <input type="file" name="event_edit_image" id="event_edit_image" class="form-control">
                                        <input type="hidden" name="old_event_image" id="old_event_image" value="">

                                        <img src="" id="event_image_preview" width="250px" height="200px">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" name="update" value="Update" id="update_event">
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
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Operation</th>



                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $select = "SELECT * FROM event";
                        $result = mysqli_query($con_query, $select);

                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td>
                                    <?php
                                    if ($row['image'] == NULL) {
                                    ?>
                                        <img src="../admin/assets/img/avatar.jpg" class="profile_img">
                                    <?php
                                    } else {
                                    ?>
                                        <img src="../admin/assets/img/event/<?php echo $row['image']; ?>" class="profile_img">
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td id="mytd">
                                    <a href=""> <button class="btn btn-primary edit" data-id="<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#editevent"> <i class="fa fa-edit"></i></button></a>
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
    //    console.log(base_url);

        // insert/add event
        $("#add_event_btn").click(function(e) {
            e.preventDefault();
            let form = document.getElementById("event");
            let formdata = new FormData(form);
            formdata.append("action", "event_insert");
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
                            title: "event has been saved successfully",
                            icon: "success",
                            draggable: true
                        }).then(() => {
                            location.reload();
                        });

                        $('#newevent').modal('hide');

                    } else {
                        if (data.errors.event_title) {
                            $("#event_title_err").text(data.errors.event_title);
                        } else {
                            $("#event_title_err").text("");
                        }
                       
                        if (data.errors.event_description) {
                            $("#event_description_err").text(data.errors.event_description);
                        } else {
                            $("#event_description_err").text("");
                        }
                        if (data.errors.event_designation) {
                            $("#event_designation_err").text(data.errors.event_designation);
                        } else {
                            $("#event_designation_err").text("");
                        }

                        if (data.errors.event_price) {
                            $("#event_price_err").text(data.errors.event_price);
                        } else {
                            $("#event_price_err").text("");
                        }

      

                        if (data.errors.image) {
                            $("#img_err").text(data.errors.image);
                        } else {
                            $("#img_err").text("");
                        }
                    }
                }

            });


        });

        // delete event
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
                            "action": "event_delete",
                            "id": id
                        },
                        success: function(data) {
                            Swal.fire("event Deleted Successfully!", "", "success")
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
                    "action": "event_view",
                },


                success: function(response) {
                    // alert(response);
                    // console.log("sdfs" + base_url);
                    var userDetails = JSON.parse(response);
                    // alert(userDetails.image);
                    $("#myid").val(userDetails.id);
                    $("#event_edit_title").val(userDetails.title);
                    $("#event_edit_description").val(userDetails.description);
                    $("#event_edit_price").val(userDetails.price);

                    $("#event_image_preview").attr('src', base_url + "admin/assets/img/event/" + userDetails.image);
                    $("#old_event_image").val(userDetails.image);


                    // $("#event_image").val(userDetails.image);



                },
                error: function() {
                    alert("Error fetching user details.");
                }
            });


        })


        // update
        $("#update_event").click(function(e) {
            e.preventDefault();
            var editform = document.getElementById('editForm');

            var formdata = new FormData(editform);
            formdata.append("action", "update_event");
            $.ajax({
                url: "category_data.php",
                type: "POST",
                dataType: "json",
                data: formdata,
                processData: false,
                contentType: false,
                success: function(res) {

                    if (res.code == 200) {

                        $('#editevent').modal('hide');
                        Swal.fire({
                            title: " Data Updated SuccessFully!",
                            icon: "success",
                            draggable: true
                        }).then(() => {
                            location.reload();
                        });



                    } else {
                        // alert(res.errors.email);

                        if (res.errors.edit_title) {
                            $("#event_title_error").text(res.errors.edit_title);
                        } else {
                            $("#event_title_error").text("");
                        }
                        if (res.errors.event_edit_description) {
                            $("#event_edit_description_error").text(res.errors.event_edit_description);
                        } else {
                            $("#event_edit_description_error").text("");
                        }
                        if (res.errors.event_edit_price) {
                            $("#event_edit_price_err").text(res.errors.event_edit_price);
                        } else {
                            $("#event_edit_price_err").text("");
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