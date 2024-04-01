<?php
include 'header.php';
?>


<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css"> -->

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Booking Details</h4>
                  <p class="card-description">
                    <!-- Add class <code>.table</code> -->
                  </p>
                  <div class="table-responsive">
                    <div id="status"></div>
                   <table id="example" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Sl no</th>
                          <th>User Name</th>
                          <th>User Phone no</th>
                          <th>Email</th>
                           <th>Station Name</th>
                           <th>Station Address</th>
                          <th>Booking Date</th>
                           <th>Time slot</th>
                          <th>Image</th>
                         
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        $i=1;
$sql="SELECT station.name as sname,station.email as semail,station.phone as sphone,station.address as saddress,user.name as name,user.phone_number,user.email,user.image,booking.booking_date,booking.timeslot,station.file FROM `station` INNER JOIN booking on station.id=booking.stationid INNER JOIN user on user.id=booking.userid";
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
                           <td><?php echo $row['sname'];?></td>
                          <td><?php echo $row['saddress'];?></td>
                         <td><?php echo $row['booking_date'];?></td>
                          <td><?php echo $row['timeslot'];?></td>
                          <td><img src="../Station/uploads/<?php echo $row['file'];?>"></td>
                          <!-- <td><button type="button" class="btn btn-primary" onclick="myaccept_fun(<?php echo $row['id'];?>)">
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
                           <a href="edit_user.php">Edit</a> -->
                         <!-- </td> -->
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
   new DataTable('#example');
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
  


  <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
