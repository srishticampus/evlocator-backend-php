<?php
include 'header.php';
$id=$_GET['id'];
?>



 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Plug Details</h4>
                  <p class="card-description">
                  
                  <?php
                  $sql="select * from plug_details where id=$id";
                  $result=$con->query($sql);
                  $row=$result->fetch_assoc();

                  ?> 
                   <form action="plug_update_action.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id?>">
  <div class="form-group">
    <label for="plug">Plug Type</label>
    <input type="text" class="form-control" name="type" id="type" value="<?php echo $row['plug_name'];?>">
  </div>
  <div class="form-group">
    <label for="file">Image</label>
    <input type="file" class="form-control" id="file" name="file">
    <img src="uploads/<?php echo $row['file'];?>" width="50" height="50">
  </div>
 
  <button type="submit" class="btn btn-primary">Update</button>
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

</html>
