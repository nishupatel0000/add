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
                <h5 class="text-white">Contact Us</h5>
            </div> <!-- card-header -->

            <?php
            //  check for record
            $select_data = "select * from contact_us";
            $result = mysqli_query($con_query, $select_data);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

            ?>


                <div class="card-body">
                    <div class="innerdiv">
                        <form method="post" id="update_contact">
                            <div class="form-group mb-2">
                                <label for="address_edit" class="form-label">address</label>
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <textarea class="form-control" id="address_edit" name="address_edit" rows="10"><?php echo $row['address'];?></textarea>
                                <div id="address_edit_error" class="error"></div>

                            </div>

                            <div class="form-group mb-2">
                                <label for="edit_email">Email address</label>
                                <input type="email" class="form-control" id="edit_email" name="edit_email" placeholder="Enter email" value="<?php echo $row['email']; ?>">
                                <div id="edit_email_error" class="error"></div>

                            </div>
                            <div class="form-group mb-2">
                                <label for="edit_contact">contact address</label>
                                <input type="number" class="form-control" id="edit_contact" name="edit_contact" placeholder="Enter contact" value="<?php echo $row['contact_number']; ?>">
                                <div id="edit_contact_error" class="error"></div>

                            </div>
                            <div class="row">
                                <div class="col-md-6  mb-4">
                                    <label for="time_edit">Booking From</label>
                                    <input type="time" class="form-control" id="time_edit" name="time_edit" value="<?php echo trim($row['from_time']); ?>" >
                                    <div id="time_edit_error" class="error"></div>

                                </div>

                                <div class="col-md-6  mb-4">
                                    <label for="to_time_edit">To Time</label>
                                    <input type="time" class="form-control" id="to_time_edit" name="to_time_edit" value="<?php echo trim($row['to_time']); ?>">
                                    <div id="to_time_edit_error" class="error"></div>
                                </div>
                            </div>

                            

                            <button type="submit" id="update_btn_contact" class="btn btn-primary">Update</button>
                        </form>
                    </div>

                </div> <!-- card-body -->
            <?php
            } else {
            ?>
                <div class="card-body">
                    <div class="innerdiv">
                        <form method="post" id="add_contact">
                            <div class="form-group mb-2">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="5"> </textarea>
                                <div id="address_error" class="error"></div>

                            </div>

                            <div class="form-group mb-2">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                                <div id="email_error" class="error"></div>

                            </div>
                            <div class="form-group mb-2">
                                <label for="contact">Contact Number</label>
                                <input type="number" class="form-control" id="contact" name="contact" placeholder="Enter email">
                                <div id="contact_error" class="error"></div>

                            </div>

                            <div class="row">
                                <div class="col-md-6  mb-4">
                                    <label for="time_">Booking From</label>
                                    <input type="time" class="form-control" id="from_time" name="from_time" >
                                    <div id="from_time_error" class="error"></div>

                                </div>

                                <div class="col-md-6  mb-4">
                                    <label for="to_time">To Time</label>
                                    <input type="time" class="form-control" id="to_time" name="to_time">
                                    <div id="to_time_error" class="error"></div>
                                </div>
                            </div>



                            <button type="submit" id="add_btn_contact" class="btn btn-primary">Add</button>
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
        $("#add_btn_contact").click(function(e) {
            e.preventDefault();
            var form = document.getElementById("add_contact");
            var formdata = new FormData(form);
            formdata.append("action", "conatact_insert");

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
                        if (data.errors.address) {
                            $("#address_error").text(data.errors.address);
                        } else {
                            $("#address_error").text("");
                        }
                        if (data.errors.email) {
                            $("#email_error").text(data.errors.email);
                        } else {
                            $("#email_error").text("");
                        }

                        if (data.errors.contact) {
                            $("#contact_error").text(data.errors.contact);
                        } else {
                            $("#contact_error").text("");
                        }

                        if (data.errors.time) {
                            $("#time_error").text(data.errors.time);
                        } else {
                            $("#time_error").text("");
                        }
                    }

                }
            })

        })


        $("#update_btn_contact").click(function(e) {
            e.preventDefault();
            var form = document.getElementById("update_contact");
            var formdata = new FormData(form);
            formdata.append("action", "contact_update");

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
                       
                        if (data.errors.address_edit_err) {
                            $("#address_edit_error").text(data.errors.address_edit_err);
                        } else {
                            $("#address_edit_error").text("");
                        }

                        if (data.errors.edit_email) {
                            $("#edit_email_error").text(data.errors.edit_email);
                        } else {
                            $("#edit_email_error").text("");
                        }

                        if (data.errors.edit_contact) {
                            $("#edit_contact_error").text(data.errors.edit_contact);
                        } else {
                            $("#edit_contact_error").text("");
                        }
                        
                        if (data.errors.time_edit) {
                            $("#time_edit_error").text(data.errors.time_edit);
                        } else {
                            $("#time_edit_error").text("");
                        }
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