<?php
 require 'connection.php';
include 'header.php';

 // session_start();
  $station_id=$_SESSION['id'];
?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>About</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>About</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">
        <?php
$sql="select * from station where is_status=1 and id=$station_id";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
  $row=$result->fetch_assoc();

?>

        <div class="row content">
          <div class="col-lg-6">
           <img src="uploads/<?php echo $row['file'];?>" width="500" height="400">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
             <?php?>
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> <?php echo $row['name'];?></li>
               <li><i class="ri-check-double-line"></i>Email: <?php echo $row['email'];?></li>
                <li><i class="ri-check-double-line"></i> Phone:<?php echo $row['phone'];?></li>
              <li><i class="ri-check-double-line"></i> <?php echo $row['address'];?></li>
              
            </ul>
            <p class="fst-italic">
              <label for="amenities">Amenities</label>
              <br>
            <div class="container"> 
             <div class="row"> 
            <?php
$sql1="SELECT * FROM amenities WHERE station_id='$station_id'";
$resul1=$con->query($sql1);
while($row1=$resul1->fetch_assoc()){
  ?>
  <li><img src="icons/<?php echo $row1['icons'];?>" width="20" height="20">
  <?php echo $row1['name'];?>
</li>
  <?php
}


?>
</div>
</div>
         
            </p>
          </div>
        </div>
        <?php
      }?>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" style="width: 500px;">

        <div class="section-title">
          <h2>Images</h2>
          <!-- <p>Our Hardowrking Team</p> -->
        </div>

        <div class="row" >

          <div class="col-lg-6">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="uploads/<?php echo $row['profile'];?>" class="img-fluid" alt=""></div>
              
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="uploads/<?php echo $row['cover_photo'];?>" class="img-fluid" alt=""></div>
              
            </div>
          </div>

         

         


        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Our Skills Section ======= -->
   <!-- End Our Skills Section -->

  </main><!-- End #main -->

<?php
include 'footer.php';
?>