<?php
include 'header.php';
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 <div class="main-panel">
       

        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Rating</h4>
                  <p class="card-description">
                    <!-- Add class <code>.table</code> -->
                  </p>
                  <div class="table-responsive">
                    <div id="status"></div>
                    <table class="table">
                      <thead>
                        <tr>
      <th>Slno</th>
                 <th>Booking Id</th>
                <th>User Name</th>
                <th>Rating</th>
                <th>Review</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        $j=1;
$sql="select * from rating";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
  while($row=$result->fetch_assoc()){
    ?>
     <tr>
                <td><?php echo $j++;?></td>
                <td><?php
$bookid=$row['book_id'];
$sq="select * from booking where id=$bookid";
$res=$con->query($sq);
$co=$res->fetch_assoc();
echo $co['booking_id'];


                 ?></td>
                <td><?php
$user_id=$row['user_id'];
$sq="select * from user where id=$user_id";
$res=$con->query($sq);
$co=$res->fetch_assoc();
echo $co['name'];


                 ?></td>
                <td> <?php
                for ($i = 1; $i <= 5; $i++) {
                  $ratingClass = "btn-default btn-grey";
                  if($i <= $row['rate_count']) {
                    $ratingClass = "btn-warning";
                  }
                ?>
                  <button type="button" class="btn btn-xs <?php echo $ratingClass; ?>" aria-label="Left Align">
                  <span class="fa fa-star" aria-hidden="true"></span>
                </button>               
                <?php } ?></td>
                <td><?php echo $row['review'];?></td>
             
                



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
