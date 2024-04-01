   <?php
  require 'connection.php';
  session_start();
  $station_id=$_SESSION['id'];
include 'header.php';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
            
              <h5><a href="#">Time slot</a></h5>
              <br>

          <form action="charger_action.php" method="post">
  <div class="form-group">
    <label for="email">Select Charger</label>
     <select class="form-control" id="charger_name" name="charger_name">
      <option value="">Select Charger Type</option>
      <?php
      $sql="select * from charger_type where station_id= $station_id";
      $result=$con->query($sql);
      $count=$result->num_rows;
      if($count>0){
        while($row=$result->fetch_assoc()){
         
         

   
          ?>
          <option  value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
          <?php
        }
      }

      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="email">Select Date</label>
     <input type="date" class="form-control" id="charger_date" name="charger_date">
      
  </div>
  <div class="form-group">
    <input type="button" name="btn" id="btn" class="btn btn-primary" value="Submit">
      
  </div>
 
  <br>
  
</form>            </div>
          </div>
          
      </div>
    </section>

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="row">
          <div class="col-md-2"></div>
               <div class="col-md-8">
            <!-- <div class="icon-box"> -->
           
            <div class="row" id="demo">
             
              
                
              
            <!-- </div> -->
            </div>
          </div>
          <div class="col-md-2"></div>
           
         
          
          
       
        </div>

      </div>
    </section><!-- End Services Section -->

   

  </main><!-- End #main -->
<script type="text/javascript">
   $('#btn').on('click', function(){
      //alert('hai');
        var charger_name = $('#charger_name').val();
        var charger_date=$('#charger_date').val();
        //alert(charger_date);
        //alert(charger_name);
      
            $.ajax({
                type:'POST',
                url:'getTimeslotAjax.php',
                data:{charger_name:charger_name,charger_date:charger_date},
                success:function(html){

                 // alert(html);
                    $('#demo').html(html);
                  
                }
            }); 
        
    });
</script>
  <!-- ======= Footer ======= -->
   <?php
include 'footer.php';
?>