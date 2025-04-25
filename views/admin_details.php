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
    <h1> Add Data</h1>

    <form id="add_user" enctype="multipart/form-data">
     
        <label for="title">Title</label>
        <input type="text" name="title"     placeholder="Enter the title of food" /> 
        <label for="content">Content / Description</label>
        <textarea name="description"   placeholder="Enter the content or description"></textarea>
        <input type="file" name="image" id="image">
       

        <!-- Submit Button -->
       <input type="submit" class="btn btn-primary" value="Add" id="add" name="submit">
     
    </form>


    
</div>

 
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
  
    $("#add").click( function(e) {
        e.preventDefault()
      var form = document.getElementById('add_user');
      var formdata = new FormData(form);
 
      $.ajax({
        url: 'data-submit.php',
        type: 'POST',
        dataType: "json",
        data: formdata,
        processData: false,
        contentType: false,
        success: function(data) {
        //  alert(data.respone);
        window.location.href = '../data_display/index.php'

        }
       
      });
    });
 
</script>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</html>
