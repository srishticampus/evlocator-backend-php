
<?php
require 'connection.php';
?>

 <div class="statusMsg">
                                <?php
                                $data=$_GET['status'];
                                if($data=='success'){
//                                     echo'<div id="reg" class="alert alert-success alert-dismissible">
//   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
//   Registration Successfull.Please Login
// </div>';
echo "
<script 
language='javascript'>window.alert('Registration Successfull');window.location='login.php';</script>
";
                                }
                                else if($data=='failed'){

echo'<div id="reg" class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   Registration Failed.Please Try again.
</div>';
                                }

                                ?>

                            </div>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Charging | Station</title>
      <link rel="stylesheet" href="style.css">
      
   </head>
   <body>
      <div class="wrapper">
         <div class="title">
           Registration
         </div>
         <form enctype="multipart/form-data" method="post" action="reg_action.php">
                
                            <input type="hidden" name="status" id="status" value="<?php echo $data;?>">
            <div class="field">
               <input type="text" required name="name">
               <label>Enter Name</label>
            </div>
            <div class="field">
               <input type="text" required name="email">
               <label>Enter Email</label>
            </div>
             <div class="field">
               <input type="password" required name="password">
               <label>Enter Password</label>
            </div>
             <div class="field">
               <input type="text" required name="phone">
               <label>Enter Phone</label>
            </div>
             <div class="field">
                 <input type="text" required name="address">
               <label>Enter Address</label>
            </div>
             <div class="field">
               <input type="text" required name="lattitude">
               <label>Enter Lattitude</label>
            </div>
             <div class="field">
               <input type="text" required name="longitude">
               <label>Enter Longitude</label>
            </div>
            
            <label>Upload License</label>
             <div class="field">

               <input type="file" required name="file" style="">
               <!-- <label>Enter file</label> -->
            </div>
            
            <div class="field">
               <input type="submit" value="Register">
            </div>
           
         </form>
      </div>
   </body>
</html>