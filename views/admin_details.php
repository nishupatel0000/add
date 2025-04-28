<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Add New Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
        }
   .btn
   {
    width: 110px;
    height:50px;
   }
        .container {
            width: 80%;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #444;
            font-size: 36px;
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            margin-bottom: 10px;
            display: block;
        }

        input[type="text"], 
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
       

        textarea {
            height: 200px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
            margin-top: 20px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .footer {
            text-align: center;
            padding: 10px;
            font-size: 14px;
            background-color: #f1f1f1;
            margin-top: 30px;
        }
        .error{
        color:red;
        font-size:18px;
    
        }

        /* Make the form responsive */
        @media screen and (max-width: 768px) {
            .container {
                width: 95%;
                padding: 20px;
            }

            h1 {
                font-size: 28px;
            }

            button {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="text-center mb-5">Add Data</h1>

    <!-- Section for Adding Food Data -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h2 class="h5 mb-0">Food Data</h2>
        </div>
        <div class="card-body">
            <form id="add_user" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter the title of food">
                    <div id="title_err" class="error"></div>
              
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content / Description</label>
                    <textarea name="description" class="form-control" placeholder="Enter the content or description"></textarea>
                    <div id="description_err" class="error"></div>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                    <div id="image_err" class="error"></div>
                  
                </div>
            </form>
        </div>
    </div>

    <!-- Section for Adding About Information -->
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            <h2 class="h5 mb-0">About Information</h2>
        </div>
        <div class="card-body">
            <form id="add_about" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="atitle" class="form-label">Title</label>
                    <input type="text" name="about_title" id="atitle" class="form-control" placeholder="Enter the title">
                    <div id="about_title_err" class="error"></div>

                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content / Description</label>
                    <textarea name="about_description" id="content" class="form-control" placeholder="Enter the content or description"></textarea>
                    <div id="about_description_err" class="error"></div>

                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="about_image" class="form-control">
               
                    <div id="about_image_err" class="error"></div>
                </div>
            </form>
        </div>
    </div>

    <!-- Section for Adding Categories -->
    <div class="card mb-4">
        <div class="card-header bg-warning text-dark">
            <h2 class="h5 mb-0">Categories</h2>
        </div>
        <div class="card-body">
            <form id="add_categories" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="cat_title" class="form-label">Title</label>
                    <input type="text" name="category_title" id="cat_title" class="form-control" placeholder="Enter the title">
                    <div id="category_title_err" class="error"></div>

                </div>
                <div class="mb-3">
                    <label for="des" class="form-label">Content / Description</label>
                    <textarea name="category_description" id="des" class="form-control" placeholder="Enter the content or description"></textarea>
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
            </form>
        </div>
    </div>

    <!-- Section for Adding Testimonials -->
    <div class="card mb-4">
        <div class="card-header bg-info text-white">
            <h2 class="h5 mb-0">Testimonials</h2>
        </div>
        <div class="card-body">
            <form id="testimonial" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="content" class="form-label">Description</label>
                    <textarea name="testimonial_description" id="content" class="form-control" placeholder="Enter description"></textarea>
                    <div id="testimonial_description_err" class="error"></div>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="testimonial_username" id="username" class="form-control" placeholder="Enter Username">
                    <div id="testimonial_username_err" class="error"></div>
                </div>
                <div class="mb-3">
                    <label for="designation" class="form-label">Designation</label>
                    <input type="text" name="testimonial_designation" id="designation" class="form-control" placeholder="Enter designation">
                    <div id="testimonial_designation_err" class="error"></div>

                </div>
                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <input type="text" name="testimonial_rating" id="rating" class="form-control" placeholder="Enter rating">
                    <div id="testimonial_rating_err" class="error"></div>

                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="testimonial_image" id="image" class="form-control"  >
                    <div id="testimonial_image_err" class="error"></div>
                    <div class="mb-3"> 
                </div>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary btn-lg" value="Add" id="add" name="submit">
                </div>
            </form>
        </div>
    </div>
</div>

 
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
  
    $("#add").click( function(e) {
        e.preventDefault();
    //   var form = document.getElementById('add_user');
    //   var formdata = new FormData(form);
    let formData = new FormData();
    formData.append("action", "user_insert");
    let forms = ['add_user', 'add_about', 'add_categories', 'testimonial'];
    forms.forEach(id => {
        let currentForm = new FormData(document.getElementById(id));
        for (let [key, value] of currentForm.entries()) {
            formData.append(key, value);
        }
    });
    $.ajax({
        url: 'data-submit.php',
        type: 'POST',
        dataType: "json",
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            if(data.status == 200){
            window.location.href = '../data_display/index.php'
            }
            else{
                if(data.errors.title)
                {
                $("#title_err").text(data.errors.title);
                }
                else{
                $("#title_err").text("");
                }   
                if(data.errors.description)
                {
                $("#description_err").text(data.errors.description);
                }
                else{
                $("#description_err").text("");
                }  
                if(data.errors.image)
                {
                $("#image_err").text(data.errors.image);
                }
                else{
                $("#image_err").text("");
                }  

                if(data.errors.about_title)
                {
                $("#about_title_err").text(data.errors.about_title);
                }
                else{
                $("#about_title_err").text("");
                }  
                if(data.errors.about_description)
                {
                $("#about_description_err").text(data.errors.about_description);
                }
                else{
                $("#about_description_err").text("");
                }   
                if(data.errors.about_image)
                {
                $("#about_image_err").text(data.errors.about_image);
                }
                else{
                $("#about_image_err").text("");
                }   
                if(data.errors.category_title)
                {
                $("#category_title_err").text(data.errors.category_title);
                }
                else{
                $("#category_title_err").text("");
                }   
                if(data.errors.category_description)
                {
                $("#category_description_err").text(data.errors.category_description);
                }
                else{
                $("#category_description_err").text("");
                }  
                if(data.errors.category_price)
                {
                $("#category_price_err").text(data.errors.category_description);
                }
                else{
                $("#category_price_err").text("");
                }  
                if(data.errors.category_image)
                {
                $("#category_image_err").text(data.errors.category_image);
                }
                else{
                $("#category_image_err").text("");
                }  

                if(data.errors.testimonial_description)
                {
                $("#testimonial_description_err").text(data.errors.testimonial_description);
                }
                else{
                $("#testimonial_description_err").text("");

                } 
                
                if(data.errors.testimonial_username)
                {
                $("#testimonial_username_err").text(data.errors.testimonial_username);
                }
                else{
                $("#testimonial_username_err").text("");

                }
                if(data.errors.testimonial_designation)
                {
                $("#testimonial_designation_err").text(data.errors.testimonial_designation);
                }
                else{
                $("#testimonial_designation_err").text(""); 
                }

                if(data.errors.testimonial_image)
                {
                $("#testimonial_image_err").text(data.errors.testimonial_image);
                }
                else{
                $("#testimonial_image_err").text(""); 
                }

                
                if(data.errors.testimonial_rating)
                {
                $("#testimonial_rating_err").text(data.errors.testimonial_rating);
                }
                else{
                $("#testimonial_rating_err").text("");
                }  
            }  
        } 
      });
    });
 
</script>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</html>
