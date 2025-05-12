<?php
session_start();
require_once '../common/config.php';
require_once 'includes/header.php';

require_once 'includes/aside.php';



?>

<!-- row -->

<!-- Include CKEditor -->




<style>
    .img-thumb {
        max-height: 75px;
        border: 2px solid none;
        border-radius: 3px;
        padding: 1px;
        cursor: pointer;
    }

    .img-thumb-wrapper {
        display: inline-block;
        margin: 10px 10px 0 0;
    }

    .remove {
        display: block;
        background: #444;
        border: 1px solid none;
        color: white;
        text-align: center;
        cursor: pointer;
    }

    .remove:hover {
        background: white;
        color: black;
    }

    #myTable2 {
        margin-top: 53px;
    }

    #mytd {
        text-align: center;
    }
</style>


<div class="row align-items-center mb-3">
    <div class="col-sm-6">
        <h3 class="mb-0 fw-semibold">Images</h3>
    </div>
    <div class="col-sm-6">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-sm-end mb-0">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Images</li>
            </ol>
        </nav>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card mb-4" style="height: 2000px;">
            <div class="card-header">
                List of Images
                <div class="mb-4 btn_user">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#gallery_model">
                        <i class="fa fa-plus"></i>&nbsp; Add New Images

                    </button>
                    <div class="modal fade" id="gallery_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form method="post" id="add_gallery">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Upload images</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">



                                        <h6>Select Images(You can select multiple images)</h6>
                                        <input type="file" id="files" name="image[]" multiple class="form-control" />
                                        <div id="img_err" class="error"></div>


                                        <!-- </div>
                                            <div class="form-group mb-2">
                                                <label for="image">Image</label>
                                                <input type="file" class="form-control" id="image" name="image" ?> 
                                                <div id="image_error" class="error"></div> 
                                            </div> -->







                                    </div>
                                    <div class="modal-footer">
                                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                        <input type="submit" class="btn btn-primary" name="submit" value="Upload" id="add_btn_gallery">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <table id="myTable2" class="table table-striped table table-bordered" border="1px" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Image</th>
                            <th scope="col">Operation</th>



                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $select = "SELECT * FROM gallery";
                        $result = mysqli_query($con_query, $select);

                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['gallery_id']; ?></td>


                                <td><img src="../admin/assets/img/gallery/<?php echo $row['gallery_image']; ?>" class="profile_img"></td>

                                <td id="mytd">

                                    <a href="#"><button class="btn  btn-danger delete_btn" data-id="<?php echo $row['gallery_id']; ?>"><i class="fa fa-trash"></i></button></a>
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
        $("#add_btn_gallery").click(function(e) {
            e.preventDefault();
            var form = document.getElementById("add_gallery");
            var formdata = new FormData(form);
            formdata.append("action", "gallery_insert");

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
                            title: "gallery  has been saved successfully",
                            icon: "success",
                            draggable: true
                        }).then(() => {
                            location.reload();
                        });
                        $('#gallery_model').modal('hide');

                    } else {

                        if (data.errors.image) {
                            $("#img_err").text(data.errors.image);
                        } else {
                            $("#img_err").text("");
                        }

                    }

                }
            })

        })




        if (window.File && window.FileList && window.FileReader) {
            $("#files").on("change", function(e) {
                var files = e.target.files,
                    filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                        var file = e.target;
                        $("<div class=\"img-thumb-wrapper card shadow\">" +
                            "<img class=\"img-thumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                            "<br/><span class=\"remove\">Remove</span>" +
                            "</div>").insertAfter("#files");
                        $(".remove").click(function() {
                            $(this).parent(".img-thumb-wrapper").remove();
                        });

                    });
                    fileReader.readAsDataURL(f);
                }
                console.log(files);
            });
        } else {
            alert("Your browser doesn't support to File API")
        }
    });

    $(document).ready(function() {
        const base_url = "<?php echo $base_url; ?>";

        $("#add_testimonial_btn").click(function(e) {
            e.preventDefault();

            let form = document.getElementById("testimonial");
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
                            "action": "gallery_delete",
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



    });
</script>
<?php
require_once 'includes/footer.php';

?>