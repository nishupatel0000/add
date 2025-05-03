<!--  for session -->


<div class="col-sm-6"><h3 class="mb-0"> 
                 <?php if (isset($_SESSION['username'])){ 
                    echo "Hello Good mornig " . $_SESSION['username'];
                    }
                    else{
                 ?>
                    // echo "Please login first";
                    <script>window.location.href = 'permisson.html'</script>
<?php
                     exit;
                    }
                    ?>   
                   </h3>   </div>



