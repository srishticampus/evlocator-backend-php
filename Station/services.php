  <?php
  require 'connection.php';
  session_start();
  $station_id=$_SESSION['id'];
include 'header.php';


if(isset($_GET['id'])){
$id=$_GET['id'];
$sq="select * from charger_type where id=$id";
$res=$con->query($sq);
$co=$res->num_rows;
$ro=$res->fetch_assoc();
}
?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Services</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Services</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
     <section id="services" class="services">
      <div class="container">

        <div class="row">
          <div class="col-md-12">
            <div class="icon-box">
            
              <h5><a href="#">Add Charger</a></h5>
              <br>
              <?php
if(isset($_GET['status'])){
   $data=$_GET['status'];
  if($_GET['status']=='success'){
     echo'<div class="alert alert-success alert-dismissible fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 Charger Added Successfully
</div>';
  }
  else if($_GET['status']=='failed'){
    echo'<div id="reg" class="alert alert-danger alert-dismissible fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   Charger Added Failed
</div>';
  }
}
              ?>
<input type="hidden" name="status" id="status" value="<?php echo $data;?>">
          <form action="charger_action.php" method="post">
            <input type="hidden" class="form-control" id="cid" value="<?php echo $ro['id'];?>" name="cid">
  <div class="form-group">
    <label for="no">Chargers</label>
    <input type="text" class="form-control" id="name" value="<?php echo $ro['name'];?>" name="name">
  </div>
  <div class="form-group">
    <label for="pwd">Plug Type</label>
    <select class="form-control" id="plug_type" name="plug_type">
      <option value="">Select Plug Type</option>
      <?php
      $sql="select * from plug_details";
      $result=$con->query($sql);
      $count=$result->num_rows;
      if($count>0){
        while($row=$result->fetch_assoc()){
         
           $plug=$ro['type'];
           $plug_id=$row['id'];

   
          ?>
          <option <?php if($plug==$plug_id){ ?> selected="selected" <?php }?> value="<?php echo $row['id'];?>"><?php echo $row['plug_name'];echo $plug_id;
           echo $plug;?></option>
          <?php
        }
      }

      ?>
    </select>
  </div>
   <div class="form-group">
    <label for="no">Amount(unit)</label>
    <input type="text" class="form-control" id="amount" value="<?php echo $ro['amount'];?>" name="amount">
  </div>
   <div class="form-group">
    <label for="no">Start Time</label>
    <input type="text" class="form-control" placeholder="08:00 AM" id="start_time" value="<?php echo $ro['start_time'];?>" name="start_time">
  </div>
   <div class="form-group">
    <label for="no"> </label>
    
  </div>
   <div class="form-group">
    <label for="no">End Time</label>
    <input type="text" class="form-control" placeholder="09:00 AM" id="end_time" value="<?php echo $ro['end_time'];?>" name="end_time">
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Add</button>
</form>            </div>
          </div>
          
      </div>
    </section>

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="row">
          <?php
          $sql="select charger_type.id as cid,plug_details.id as pid,plug_details.file,charger_type.name,plug_details.plug_name from charger_type inner join plug_details on charger_type.type=plug_details.id  where charger_type.station_id=$station_id";
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
              <button class="btn btn-primary" style="margin-left: 15%;color: #fff"><a style="color:#fff;" href="services.php?id=<?php echo $row['cid'];?>">Edit</a></button>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <button class="btn btn-danger" style="margin-left: 15%;color: #fff"><a style="color:#fff;" href="delete_charger.php?id=<?php echo $row['cid'];?>">Delete</a></button>
              
             
            </div>
          </div>
              <?php
            }
          }

          ?>
         
          
          
       
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Features Section ======= -->
   <!-- End Features Section -->

  </main><!-- End #main -->

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
  <!-- ======= Footer ======= -->
   <?php
include 'footer.php';
?>