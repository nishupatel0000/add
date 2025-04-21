<?php
require_once 'config.php';
session_start();
require_once '../header.html';
require_once '../aside.html';  


   
?> 

<table id="myTable" class="table table-striped table table-bordered"" border="0" cellspacing="0" width="100%"    >
  <thead>
    <tr>
      <th scope="col">Username</th>
      <th scope="col">Email</th>  
      <!-- <th scope="col">Operation</th> -->

    </tr>
  </thead>
  <tbody>
    <?php
    $select = "SELECT * FROM admin";
    $result = mysqli_query($con_query, $select);

    while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <tr>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['email']; ?></td>
       
        <!-- <td id="mytd"> 
         
         <a href="#"><button class="btn  btn-danger delete" data-id="<?php echo $row['id']; ?>"><i class="fa fa-trash"></i></button></a>
         <a href="edit.php?id=<?php echo $row['id'];?> "> <button class="btn   btn-primary edit"><i class="fa fa-edit"></i></button>
          </td> -->
      </tr>
    <?php
    }
    ?>


  </tbody>
</table>


