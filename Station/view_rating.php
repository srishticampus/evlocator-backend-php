  <?php
  require 'connection.php';
  session_start();
  $station_id=$_SESSION['id'];
include 'header.php';

?>
<style type="text/css">
  a{
    color:white;
  }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<link el="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap.min.css"> 
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Rating</h2>
          <ol>
            <li><a href="index.php" style="color:black">Home</a></li>
            <li style="color:black">Rating</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
     <section id="services" class="services">
      <div class="container">

        <div class="row">
          <div class="col-md-12">
            <div class="icon-box">
            
              <h5><a href="#"style="color:black">Rating</a></h5>
              <br>

        <table id="example" class="table table-striped table-bordered" style="width:100%">
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
$sql="select booking.booking_id ,user.name,rating.rate_count,rating.review from rating inner join booking on rating.book_id = booking.id inner join user on booking.userid=user.id where rating.station_id=$station_id";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
  while($row=$result->fetch_assoc()){
    ?>

     <tr>
                <td><?php echo $j++;?></td>
                <td><?php

echo $row['booking_id'];


                 ?></td>
                <td><?php

echo $row['name'];


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
            </table>            </div>
          </div>
          
      </div>
    </section>

    <!-- End Services Section -->

    <!-- ======= Features Section ======= -->
   <!-- End Features Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap.min.js
"></script>
<script type="text/javascript">
    
new DataTable('#example');
</script>
   <?php
include 'footer.php';
?>