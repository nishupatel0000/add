<?php
session_start();
require_once '../common/config.php';
require_once 'includes/header.php';

require_once 'includes/aside.php';



?>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header bg-primary" style="height:35px;">
                <h5 class="text-white">Banner</h5>
            </div> <!-- card-header -->

            <?php
            //  check for record
            $select_data = "select * from banner";
            $result = mysqli_query($con_query, $select_data);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

            ?>


                <div class="card-body">
                    <form method="post" id="update_banner">
                        <div class="innerdiv">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                            <div class="form-group mb-2">
                                <label for="title_edit" class="form-label">Title</label>
                                <textarea class="form-control" id="title_edit" name="title_edit" rows="10"><?php echo $row['title']; ?></textarea>
                                <div id="title_edit_error" class="error"></div>

                            </div>
                            <div class="form-group mb-2">
                                <label for="edit_description">Description</label>
                                <input type="description" class="form-control" id="edit_description" name="edit_description" placeholder="Enter description" value="<?php echo $row['description']; ?>">
                                <div id="edit_description_error" class="error"></div>

                            </div>

                            <div class="form-group mb-2">
                                <label for="edit_image">Image</label>
                                <input type="file" class="form-control" id="edit_image" name="edit_image" ?>
                                <img src="../admin/assets/img/banner/<?php echo $row['image']; ?>" class="profile_img" alt="ddd" srcset="">

                                <input type="hidden" name="old_img" value="<?php echo $row['image']; ?> ">
                                <div id="edit_image_error" class="error"></div>

                            </div>
                            <button type="submit" id="update_btn_banner" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>

        </div> <!-- card-body -->
    <?php
            } else {
    ?>
        <div class="card-body">
            <form method="post" id="add_banner">
                <div class="innerdiv">
                    <div class="form-group mb-2">
                        <label for="title" class="form-label">title</label>
                        <textarea class="form-control" id="title" name="title" rows="5"> </textarea>
                        <div id="title_error" class="error"></div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="description">Description</label>
                        <input type="description" class="form-control" id="description" name="description" placeholder="Enter description">
                        <div id="description_error" class="error"></div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image" ?>

                        <div id="image_error" class="error"></div>

                    </div>

                    <button type="submit" id="add_btn_banner" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>

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
        $("#add_btn_banner").click(function(e) {
            e.preventDefault();
            var form = document.getElementById("add_banner");
            var formdata = new FormData(form);
            formdata.append("action", "banner_insert");

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
                            title: "Contact  has been saved successfully",
                            icon: "success",
                            draggable: true
                        }).then(() => {
                            location.reload();
                        });



                    } else {
                        if (data.errors.title) {
                            $("#title_error").text(data.errors.title);
                        } else {
                            $("#title_error").text("");
                        }
                        if (data.errors.description) {
                            $("#description_error").text(data.errors.description);
                        } else {
                            $("#description_error").text("");
                        }

                        if (data.errors.image) {
                            $("#image_error").text(data.errors.image);
                        } else {
                            $("#image_error").text("");
                        }


                    }

                }
            })

        })


        $("#update_btn_banner").click(function(e) {
            e.preventDefault();
            var form = document.getElementById("update_banner");
            var formdata = new FormData(form);
            formdata.append("action", "banner_update");

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

                        $('#newfood').modal('hide');

                    } else {

                        if (data.errors.edit_title) {
                            $("#title_edit_error").text(data.errors.edit_title);
                        } else {
                            $("#title_edit_error").text("");
                        }
                        if (data.errors.edit_description) {
                            $("#edit_description_error").text(data.errors.edit_description);
                        } else {
                            $("#edit_description_error").text("");
                        }
                        // if (data.errors.title) {
                        //     $("#title_edit_error").text(data.errors.title);
                        // } else {
                        //     $("#title_edit_error").text("");
                        // }
                        // if (data.errors.time_edit) {
                        //     $("#time_edit_error").text(data.errors.time_edit);
                        // } else {
                        //     $("#time_edit_error").text("");
                        // }
                        if (data.errors.to_time_edit) {
                            $("#to_time_edit_error").text(data.errors.to_time_edit);
                        } else {
                            $("#to_time_edit_error").text("");
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