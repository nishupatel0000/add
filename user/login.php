<?php

if (isset($_SESSION['data'])) {
    $msg = addslashes($_SESSION['data']);
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
               position: 'top-end',
                title: 'Success!',
                text: '$msg',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        });
    </script>";
    unset($_SESSION['success']);
}
if (isset($_SESSION['error'])) {
    $error = addslashes($_SESSION['error']);
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Error!',
                text: '$error',
                icon: 'error',
                confirmButtonText: 'Try Again'
            });
        });
    </script>";
    unset($_SESSION['error']);
}

?>
  <script>
    window.onload = function () {
        // Check if the error messages exist and hide them after a delay
        var successMessage = document.getElementById("error-message");
        var updateMessage = document.getElementById("error-update");

        if (successMessage) {
            setTimeout(function () {
                successMessage.style.display = "none";
            }, 2000);  
        }

        if (updateMessage) {
            setTimeout(function () {
                updateMessage.style.display = "none";
            }, 2000);  
        }
    };
</script>


