<?php
include 'header.php';
?>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">User Details</h4>
                  <p class="card-description">
                    <!-- Add class <code>.table</code> -->
                  </p>
                  <div class="table-responsive">
                    <div id="status"></div>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Sl no</th>
                          <th>Name</th>
                          <th>Phone no</th>
                          <th>Email</th>
                          <th>Image</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        $i=1;
$sql="select * from user";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
  while($row=$result->fetch_assoc()){
    ?>
    <tr>
                          <td><?php echo $i++;?></td>
                          <td><?php echo $row['name'];?></td>
                          <td><?php echo $row['phone_number'];?></td>
                          <td><?php echo $row['email'];?></td>
                          <td><img src="../api/uploads/<?php echo $row['image'];?>"></td>
                          <td><button type="button" class="btn btn-danger" onclick="mydelete_fun(<?php echo $row['id'];?>)">Delete</button>
                            <!-- <a href="edit_user.php">Edit</a> -->
                          </td>
                        </tr>
    <?php

  }
}
                        ?>
                        
                        
                      </tbody>
                    </table>
                  </div>
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
  <script>
    function mydelete_fun(id){
    $.ajax({
      url:"delete_user.php",
      method:"post",
      data:{id:id},
      success:function(data){
       const myTimeout = setTimeout(delFun, 5000);
       ;
        if(data==1){
        $('#status').html('<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Deleted</div>');
        window.location.reload()  
      }else{
         $('#status').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Warning!</strong> Deleted Failed</div>');
      }

      }
    });

    }
    function delFun() {

 $('#status').hide();

}
  </script>
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
