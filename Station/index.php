<?php
require 'connection.php';
include 'header.php';
  session_start();
  $station_id=$_SESSION['id'];

?>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/1.jpg)">
          <div class="carousel-container">
            <div class="container">
             <!--  <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Sailor</span></h2>
              <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p> -->
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/22.png)">
          <div class="carousel-container">
            <div class="container">
             <!--  <h2 class="animate__animated animate__fadeInDown">Lorem Ipsum Dolor</h2>
              <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p> -->
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/33.jpg)">
          <div class="carousel-container">
            <div class="container">
             <!--  <h2 class="animate__animated animate__fadeInDown">Sequi ea ut et est quaerat</h2>
              <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p> -->
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

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

    <!-- ======= Clients Section ======= -->
     <section id="services" class="services">
      <div class="container">

        <div class="row">
          <?php
          $sql="select charger_type.id as cid,plug_details.id as pid,plug_details.file,charger_type.name,plug_details.plug_name from charger_type inner join plug_details on charger_type.type=plug_details.id  where charger_type.station_id=$station_id limit 3";
          $result=$con->query($sql);
          $count=$result->num_rows;
          if($count>0){
            while($row=$result->fetch_assoc()){
              ?>
               <div class="col-md-4">
            <div class="icon-box" >
              <h4 style="text-align:left;"><?php echo $row['name'];?></h4>
              <img src="../Admin/uploads/<?php echo $row['file']?>" style="margin-left: 15%;" width="200" height="200">
              <h4 style="text-align:left;"><a href="#"><?php echo $row['plug_name'];?></a></h4>
            
             
            </div>
          </div>
              <?php
            }
          }

          ?>
         
          
          
       
        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Services Section ======= -->
    
       
          

         

        

          
        

         <!-- End Portfolio Section -->

  </main>

<?php

include 'footer.php';
?>