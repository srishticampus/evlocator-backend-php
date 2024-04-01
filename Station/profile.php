  <?php
  require 'connection.php';
  session_start();
  $station_id=$_SESSION['id'];
include 'header.php';
?>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
  
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Profile</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Profile</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
     <section id="services" class="services">
      <div class="container">

        <div class="row">
          <div class="col-md-2">
          </div>
          <div class="col-md-8">
            <div class="icon-box">
            
              <h5><a href="#">Profile</a></h5>
              <br>

                        <?php
if(isset($_GET['status'])){
  $data=$_GET['status'];

  if($_GET['status']=='success'){
     echo'<div class="alert alert-success alert-dismissible fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 Profile Updated Successfully
</div>';
  }
  else if($_GET['status']=='failed'){
    echo'<div id="reg" class="alert alert-danger alert-dismissible fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   Profile Updated Failed
</div>';
  }
}
              ?>

<?php
$sql="select * from station where is_status=1 and id=$station_id";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
  $row=$result->fetch_assoc();

?>
<input type="hidden" name="status" id="status" value="<?php echo $data;?>">
          <form action="profile_update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php 
            echo $row['id'];?> ">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" value="<?php echo $row['name'];?>" name="name">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" value="<?php echo $row['email'];?>" name="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password</label>
    <input type="text" class="form-control" id="password" name="password" value="<?php echo $row['password'];?>">
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <textarea class="form-control" id="address" name="address"><?php echo $row['address'];?>
    </textarea>
  </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="text" class="form-control" value="<?php echo $row['phone'];?>" id="phone" name="phone">
  </div>
  <div class="form-group">
    <label for="lattitude">Lattitude</label>
    <input type="text" class="form-control" id="lattitude" name="lattitude" value="<?php echo $row['lattitude'];?>">
  </div>
  <div class="form-group">
    <label for="longitude">Longitude</label>
    <input type="text" class="form-control" id="longitude" name="longitude" value="<?php echo $row['longitude'];?>">
  </div>
  <div class="form-group">
    <label for="pwd">Upload License</label>
    <input type="file" class="form-control" id="image" name="image">
    <br>
    <img src="uploads/<?php echo $row['file'];?>" width="100" height="100">
  </div>
   <div class="form-group">
    <label for="profile">Upload Profile Image</label>
    <input type="file" class="form-control" id="profile" name="profile">
     <img src="uploads/<?php echo $row['profile'];?>" width="100" height="100">
  </div>
  <div class="form-group">
    <label for="profile">Upload Cover Photo</label>
    <input type="file" class="form-control" id="cover_photo" name="cover_photo">
     <img src="uploads/<?php echo $row['cover_photo'];?>" width="100" height="100">
  </div>
  <hr>
  <div class="form-group">
     <input type="checkbox"   id="amenities" name="amenities" value="1" <?php
if($row['is_amenities']==1){
  echo 'checked';
}
   ?>>&nbsp;<label for="amenities">Amenities</label>
   
  </div>
  <hr>

  <div class="container">
 <?php

    $juice= "";
    $Parking= "";
    $wifi= "";
    $wash= ""; 
    $Locker= "";
    $pure= "";
      $dress= "";
 $Restaurant= "";
$first= "";
$mobile= "";
  
$sta_id=$row['id'];
$sql="SELECT distinct(name) FROM amenities WHERE station_id='$sta_id'";
$data=$con->query($sql);
while ($result=$data->fetch_assoc()) {
 
$a=$result['name'];

$b=explode(",", "$a");

 if (in_array("Juice Bar", $b)) {
    $juice= "checked";
  }
  if (in_array("Parking", $b)) {
    $Parking= "checked";
  }
  if (in_array("Wifi", $b)) {
    $wifi= "checked";
  }
  if (in_array("Wash Room", $b)) {
    $wash= "checked";
  }
  if (in_array("Locker", $b)) {
    $Locker= "checked";
  }
  if (in_array("Purified Water", $b)) {
    $pure= "checked";
  }
  if (in_array("Dressing Room", $b)) {
    $dress= "checked";
  }
  if (in_array("Restaurant", $b)) {
    $Restaurant= "checked";
  }
  if (in_array("First Aid Kit", $b)) {
    $first= "checked";
  }
  if (in_array("Mobile Recharge", $b)) {
    $mobile= "checked";
  }



// print_r($b);
}
  ?>
        <div class="row" style="width: 500px;" >
          <div class="col-md-6" >
              <input type="checkbox"  id="amenities" value="Juice Bar" name="ame[]" <?php 
echo  $juice;
?>>&nbsp;<input type="image" src="icons/cocktail.png" width="20" height="20" name="img[]">&nbsp;<label for="amenities">Juice Bar</label>


          </div>
          <div class="col-md-6">
              <input type="checkbox"  id="amenities" value="Parking" name="ame[]" <?php 
echo  $Parking;
?> >&nbsp;<input type="image" src="icons/parked-car.png" width="20" height="20" name="img[]" >&nbsp;<label for="amenities">Parking</label>
          </div>
        </div>
        <div class="row" style="width: 500px;">
          <div class="col-md-6">
              <input type="checkbox"  id="amenities" value="Wifi" name="ame[]" <?php 
echo  $wifi;
?>>&nbsp;<input type="image" src="icons/wi-fi.png" width="20" height="20" name="img[]" >&nbsp;<label for="amenities">Wifi</label>


          </div>
          <div class="col-md-6">
              <input type="checkbox"  id="amenities" value="Wash Room" name="ame[]" <?php 
echo  $wash;
?>>&nbsp;<input type="image" src="icons/restroom.png" width="20" height="20" name="img[]" >&nbsp;<label for="amenities">Wash Room</label>
          </div>
        </div>
        <div class="row" style="width: 500px;">
          <div class="col-md-6">
              <input type="checkbox"  id="amenities" name="ame[]" value="Locker" <?php 
echo  $Locker;
?>>&nbsp;<input type="image" src="icons/protect.png" width="20" height="20" name="img[]" >&nbsp;<label for="amenities">Locker</label>


          </div>
          <div class="col-md-6">
              <input type="checkbox"  id="amenities" name="ame[]" value="Purified Water"  <?php 
echo  $pure;
?>>&nbsp;<input type="image" src="icons/water-filter.png" width="20" height="20" name="img[]" >&nbsp;<label for="amenities">Purified Water</label>
          </div>
        </div>
        <div class="row" style="width: 500px;">
          <div class="col-md-6">
              <input type="checkbox"  id="amenities" name="ame[]" value="Dressing Room" <?php 
echo  $dress;
?>>&nbsp;<input type="image" src="icons/dressing-room.png" width="20" height="20" name="img[]" x>&nbsp;<label for="amenities">Dressing Room</label>


          </div>
          <div class="col-md-6">
              <input type="checkbox"  id="amenities" value="Restaurant" name="ame[]" <?php 
echo  $Restaurant;
?>>&nbsp;<input type="image" src="icons/restaurant.png" width="20" height="20" name="img[]" >&nbsp;<label for="amenities">Restaurant</label>
          </div>
        </div>
         <div class="row" style="width: 500px;">
          <div class="col-md-6">
              <input type="checkbox" value="First Aid Kit"  id="amenities" name="ame[]"  <?php 
echo  $first;
?>>&nbsp;<input type="image" src="icons/first-aid-kit.png" width="20" height="20" name="img[]" >&nbsp;<label for="amenities">First Aid Kit</label>


          </div>
          <div class="col-md-6">
              <input type="checkbox"  id="amenities"value="Mobile Recharge" name="ame[]" <?php 
echo  $mobile;
?>>&nbsp;<input type="image" src="icons/charging.png" width="20" height="20" name="img[]" >&nbsp;<label for="amenities">Mobile Recharge</label>
          </div>
        </div>

      </div>

  <br>
  <button type="submit" class="btn btn-primary">Update</button>
</form>  
<?php
}
?>          </div>
          </div>
           <div class="col-md-2">
          </div>
          
      </div>
    </section>

    <!-- ======= Services Section ======= -->
    <!-- End Services Section -->

    <!-- ======= Features Section ======= -->
    <!-- End Features Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
    <script type="text/javascript">
  $(document).ready(function(){
    var status=$('#status').val();
  if(status!=""){
    setTimeout(function () { $('#reg').hide();}, 1000);
}
    
       var status1=$('#stus').val();
  if(status1!=""){
    setTimeout(function () { $('#reg').hide();}, 1000);
} 

  });

    
      
</script>
   <?php
include 'footer.php';
?>