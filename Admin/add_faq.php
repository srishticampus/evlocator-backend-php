<?php
include 'header.php';

?>
<script src="https://cdn.ckeditor.com/4.24.0-lts/standard/ckeditor.js"></script>


 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add FAQ</h4>
                  <p class="card-description">
                  
                    
                   <form action="faq_action.php" method="post" enctype="multipart/form-data">
                 
  <div class="form-group">
    <label for="plug">Questions</label>
    <textarea class="form-control" name="question" id="editor1"></textarea>
  </div>
  <div class="form-group">
    <label for="file">Answers</label>
     <textarea class="form-control" name="answers" id="editor2" rows="10" cols="80">
     </textarea>
  </div>
 
  <button type="submit" class="btn btn-primary">Add</button>
</form>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

       
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
       
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
 
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
 
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    
</script>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
    CKEDITOR.replace('editor2');
    
</script>


</html>


