<?php
include 'header.php';
?>



 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Plug Details</h4>
                  <p class="card-description">
                   
                   <form action="plug_action.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="plug">Plug Type</label>
    <input type="text" class="form-control" name="type" id="type">
  </div>
  <div class="form-group">
    <label for="file">Image</label>
    <input type="file" class="form-control" id="file" name="file">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Plud Details</h4>
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
                         
                          <th>Image</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        $i=1;
$sql="select * from plug_details";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
  while($row=$result->fetch_assoc()){
    ?>
    <tr>
                          <td><?php echo $i++;?></td>
                          <td><?php echo $row['plug_name'];?></td>
                      
                          <td><img src="uploads/<?php echo $row['file'];?>"></td>
                          <td><button type="button" class="btn btn-primary" ><a href="edit_plug.php?id=<?php echo $row['id'];?>">
Edit
</a>

                          </button>
                            <button type="button" class="btn btn-danger" onclick="myreject_fun(<?php echo $row['id'];?>)">

Delete

                            </button>
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
   

function myreject_fun(id){
    $.ajax({
      url:"delete_plug.php",
      method:"post",
      data:{id:id},
      success:function(data){
       const myTimeout = setTimeout(delFun, 15000);
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
