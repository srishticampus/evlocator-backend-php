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

<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<link el="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap.min.css"> 
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Bookings</h2>
          <ol>
            <li><a href="index.php" style="color:black;">Home</a></li>
            <li>Bookings</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
     <section id="services" class="services">
      <div class="container">

        <div class="row">
          <div class="col-md-12">
            <div class="icon-box">
            
              <h5 style="color:black;">Bookings</h5>
              <br>

        <table id="example" class="table table-striped table-bordered" style="width:100%; display: block;
    overflow-x: auto;">
        <thead>
            <tr>
                <th>Slno</th>
                 <th>Booking Id</th>
                <th>User Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Image</th>
                <th>Timeslot</th>
                 <th>Date</th>
                 <th>Amount</th>
                  <th>Final Amount</th>
                   <th>Pending Amount</th>
                  <th>Charger Name</th>
                  <th>Booking Status</th>
                  <th>Charging Status</th>
                  <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php
          $i=1;
$sql="select  user.name as uname,booking.pending_amount,booking.final_amount,booking.charging_status,booking.booking_id,user.phone_number,user.email,user.image,station.name as sname,station.address,station.phone,booking.timeslot,booking.booking_date,booking.charger_name,booking.booking_status from user inner join booking on user.id=booking.userid inner join station on station.id=booking.stationid  where booking.stationid=$station_id order by booking.id desc";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
  while($row=$result->fetch_assoc()){
     $bdate = $row['booking_date'];
        $time = $row['timeslot'];
        $book = $row['booking_id'];
        
        // Extract start and end times
        list($startTime, $endTime) = explode(' - ', $time);
        
        // Combine date and time for start and end times
        $savedStartDateTime = new DateTime($bdate . ' ' . $startTime);
        $savedEndDateTime = new DateTime($bdate . ' ' . $endTime);
        $currentDateTime = new DateTime();

        if ($savedEndDateTime < $currentDateTime && $row['charging_status'] == null) {
            $sq = "UPDATE booking SET charging_status = 'Invalid' WHERE stationid = $station_id AND booking_id = '$book'";
            $res = $con->query($sq);
        }

    ?>

     <tr>
                <td><?php




                 echo $i++;?></td>
                <td><?php echo $row['booking_id'];?></td>
                <td><?php echo $row['uname'];?></td>
                <td><?php echo $row['phone_number'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><img width="100" height="100" src="../api/uploads/<?php echo $row['image'];?>"></td>
                <td><?php echo $row['timeslot'];?></td>
                <td><?php echo $row['booking_date'];?></td>
                <td>
                  <?php
                  $ch_name=$row['charger_name'];

                  $s="select * from charger_type where name='$ch_name' and station_id=$station_id";
                 $r=$con->query($s);
                
$co=$r->num_rows;
if($co>0){
  $ro=$r->fetch_assoc();
  echo $ro['amount'];
                  }


                  ?>



                </td>
                <td><?php echo $row['final_amount'];?></td>
                <td><?php echo $row['pending_amount'];?></td>
                <td><?php echo $row['charger_name'];?></td>
                
                <td><?php

if($row['booking_status']==0){
  echo 'Requested';
}
else if($row['booking_status']==1){
echo 'Accepted';
}
else{
  echo 'Rejected';
}

              ?></td>
              <td><?php echo $row['charging_status'];?></td>
                <td>

                  <?php

if($row['booking_status']==0){
 ?>
  <button type="button" class="btn btn-primary"><a class="anchor" href="accept_booking.php?id=<?php echo $row['booking_id']?>">Accept</a></button><br><br>
                 <button type="button" class="btn btn-danger"><a class="anchor" href="reject_booking.php?id=<?php echo $row['booking_id']?>">Reject</a></button>
 <?php
}
else if($row['booking_status']==1){
?>
 <button type="button" class="btn btn-primary"><a class="anchor" href="accept_booking.php?id=<?php echo $row['booking_id']?>">Accepted</a></button>
                 <button type="button" class="btn btn-danger"><a class="anchor" href="reject_booking.php?id=<?php echo $row['booking_id']?>">Reject</a></button>
<?php
}
else{
  ?>
   <button type="button" class="btn btn-primary"><a class="anchor" href="accept_booking.php?id=<?php echo $row['booking_id']?>">Accept</a></button><br><br>
    <button type="button" class="btn btn-danger"><a class="anchor" href="reject_booking.php?id=<?php echo $row['booking_id']?>">Rejected</a></button>
                
  <?php
  
}
if($row['charging_status']=='Completed'){

              ?>
           <button type="button" class="btn btn-primary"><a class="anchor" href="final_amount.php?id=<?php echo $row['booking_id']?>">Send Final Amount</a></button>
           <?php
         }
           ?>

                 </td>



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
    
 var list_table = $("#example").dataTable({
            // "sScrollX": "100%",
            // "sScrollXInner": "110%",
            // "bScrollCollapse": true,
           
        });


// $(document).ready(function(){

//    setInterval(function(){
//       $("table").load();
// }, 3000);
// });
</script>
   <?php
include 'footer.php';
?>