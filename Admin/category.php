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
        <h3 class="mb-0 fw-semibold"> Food Category </h3>
    </div>
    <div class="col-sm-6">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-sm-end mb-0">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Food Category</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4" style="height: 2000px;">
            <div class="card-header">
                List of food category
                <div class="mb-4 btn_user">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newfood">
                        <i class="fa fa-plus"></i>&nbsp; Add New Category
                    </button>
                    <div class="modal fade" id="newfood" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form id="category_add" method="post">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="cat_title" class="form-label">Category Name</label>
                                            <!-- <select name="type" id="type" class="form-control">
                                                <option value="">Select Type of food</option>
                                                <option value="starters">starters</option>
                                                <option value="Breakfast">Breakfast</option>
                                                <option value="Lunch">Lunch</option>
                                                <option value="Dinner">Dinner</option>
                                            </select> -->
                                            <input type="text" name="type" id="type" class="form-control" placeholder="Enter Category Name">
                                            <div id="type_err" class="error"></div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-primary" name="submit" value="Add " id="add_cat_btn">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
         <div class="modal fade" id="editcategory" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="edit_category">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!-- Loader -->
                    <div id="loader" style="display: none; text-align: center; padding: 20px;">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>

                    <!-- Form content -->
                    <div id="form_content">
                        <input type="hidden" name="id" id="myid">
                        <div class="mb-3">
                            <label for="category_type" class="form-label">Category Name</label>
                            <input type="text" name="type" id="category_type" class="form-control" placeholder="Enter Category Name">
                            <div id="type_er" class="error text-danger mt-1"></div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="update" value="Update" id="update_category">
                </div>
            </div>
        </form>
    </div>
</div>

            <div class="card-body">

                <table id="myTable1" class="table table-striped table table-bordered mt-5" border="1px" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Operation</th>

                            <!-- <th scope="col">Operation</th> -->

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $select = "SELECT * FROM category";
                        $result = mysqli_query($con_query, $select);

                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['category_name']; ?></td>

                                <td id="mytd">
                                    <a href=""> <button class="btn btn-primary edit" data-id="<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#editcategory"> <i class="fa fa-edit"></i></button></a>

                                    <a href=""><button class="btn  btn-danger delete_btn" data-id="<?php echo $row['id']; ?>"><i class="fa fa-trash"></i></button></a>
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

        $("#add_cat_btn").click(function(e) {
            e.preventDefault();
            let form = document.getElementById("category_add");
            let formdata = new FormData(form);
            formdata.append("action", "category_insert");
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
                            title: "category has been saved successfully",
                            icon: "success",
                            draggable: true
                        }).then(() => {
                            location.reload();
                        });

                        $('#newfood').modal('hide');
                        // location.reload(true);
                    } else {

                        if (data.errors.type) {
                            $("#type_err").text(data.errors.type);
                        } else {
                            $("#type_err").text("");
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


                $.ajax({
                    url: "category_data.php",
                    type: "POST",
                    data: {
                        "action": "category_del",
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
</script>
<script>
    $(".edit").click(function(e) {
        e.preventDefault();
        var id = $(this).data("id");
        $("#form_content").hide();
        $("#loader").show();

        $.ajax({
            url: 'category_data.php',
            type: 'POST',
            data: {
                id: id,
                "action": "category_edit",
            },


            success: function(response) {


                var userDetails = JSON.parse(response);

                $("#myid").val(userDetails.id);

                $("#category_type").val(userDetails.category_name);
                $("#loader").hide();
                $("#form_content").show();
            },
            error: function() {
                alert("Error fetching user details.");
            }
        });


    })
</script>
<script>
    $("#update_category").click(function(e) {
        e.preventDefault();
        var editform = document.getElementById('edit_category');

        var formdata = new FormData(editform);
        formdata.append("action", "update_category");
        $.ajax({
            url: "category_data.php",
            type: "POST",
            dataType: "json",
            data: formdata,
            processData: false,
            contentType: false,
            success: function(res) {

                if (res.code == 200) {

                    $('#editcategory').modal('hide');
                    Swal.fire({
                        title: " Data Updated SuccessFully!",
                        icon: "success",
                        draggable: true
                    }).then(() => {
                        location.reload();
                    });



                } else {
                    // alert(res.errors.email);

                    if (res.errors.type) {
                        $("#type_er").text(res.errors.type);
                    } else {
                        $("#type_er").text("");
                    }
                }
            }
        })
    })
</script>
<?php
require_once 'includes/footer.php';



?>