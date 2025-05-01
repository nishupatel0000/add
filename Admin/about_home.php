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
    <div class="card mb-4" style="height: 750px;">
      <div class="card-header bg-primary" style="height:35px;">
        <h5 class="text-white">About Home</h5>
      </div> <!-- card-header -->
      
      <div class="card-body">
        <textarea name="content" id="editor">
          <p>This is some sample content.</p>
        </textarea>
      </div> <!-- card-body -->
    </div> <!-- card -->
  </div> <!-- col -->
</div> <!-- row -->

<!-- Include CKEditor -->
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace('editor');
</script>

    <script>
      ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
<?php   
require_once 'includes/footer.php';
 
?>
