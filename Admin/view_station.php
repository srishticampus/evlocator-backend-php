<?php
include 'header.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Station Details</h4>
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
                          <th>Phone no</th>
                          <th>Email</th>
                           <th>Address</th>
                         <!--   <th>Lattitude</th>
                           <th>Longitude</th> -->
                         
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        $i=1;
$sql="select * from station";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
  while($row=$result->fetch_assoc()){
    ?>
    <tr>
                          <td><?php echo $i++;?></td>
                          <td><?php echo $row['name'];?></td>
                          <td><img   class="passingID" data-toggle="modal" data-target="#exampleModal" src="../Station/uploads/<?php echo $row['file'];?>"onclick="openImgModal('<?php echo $row['file'];?>')"></td>
                         
                          <td><?php echo $row['phone'];?></td>
                          <td><?php echo $row['email'];?></td>
                          <td><?php echo $row['address'];?></td>
                          <!-- <td><?php echo $row['lattitude'];?></td>
                          <td><?php echo $row['longitude'];?></td> -->
                          <td>
                          <button type="button" class="btn btn-primary" onclick="myaccept_fun(<?php echo $row['id'];?>)">
<?php
$status=$row['is_status'];
if($status==1){
  echo 'Accepted';
}
else{
  echo 'Accept';
}
?>


                          </button>
                            <button type="button" class="btn btn-danger" onclick="myreject_fun(<?php echo $row['id'];?>)">

<?php
$status=$row['is_status'];
if($status==2){
  echo 'Rejected';
}
else{
  echo 'Reject';
}
?>

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
         
           
           

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"style="height: 800px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">License</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <div class="modal-gallery-image">
               
            </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
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
    function myaccept_fun(id){
    $.ajax({
      url:"accept_station.php",
      method:"post",
      data:{id:id},
      success:function(data){
        //alert(data);
       const myTimeout = setTimeout(delFun, 15000);
       ;
        if(data==1){
        $('#status').html('<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Accepted</div>');
        window.location.reload()  
      }else{
         $('#status').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Warning!</strong> accepeted Failed</div>');
      }

      }
    });

    }


function myreject_fun(id){
    $.ajax({
      url:"reject_station.php",
      method:"post",
      data:{id:id},
      success:function(data){
       const myTimeout = setTimeout(delFun, 15000);
       ;
        if(data==1){
        $('#status').html('<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Rejected</div>');
        window.location.reload()  
      }else{
         $('#status').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Warning!</strong> rejected Failed</div>');
      }

      }
    });

    }



    function delFun() {

 $('#status').hide();

}


  </script>

   <script>
   function openImgModal(img_src)
{
    $('.modal-gallery-image').html('<img width="480" height="400" src="../Station/uploads/'+img_src+'" class="img-responsive" />');
    $("#gallery-image-modal").modal('show');
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
