
<?php
require 'connection.php';
?>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Charging | Station</title>
      <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   </head>
   <body>
      <div class="wrapper">
         <div class="title">
            Charging Station
         </div>
         <form action="login_action.php" method="post">
             <div class="statusMsg">
                                <?php
                                $data=$_GET['stus'];
                                if($data=='success'){
                                    echo'<div id="reg" class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  Login Successfull.
</div>';
                                }
                                else if($data=='fail'){

echo'<div id="reg" class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   Login Failed.Please wait for Admin approval.
</div>';
                                }
                                   else if($data=='faill'){

echo'<div id="reg" class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   Login Failed.Admin Rejected.
</div>';
                                }
                                else if($data=='failed'){
                                echo'<div id="reg" class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   Login Failed.Incorrect Username and password Please Try again.
</div>';    
                                }
                                  else if($data=='fsuccess'){
                                echo'<div id="reg" class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   Password changed Successfull
</div>';    
                                }

                                ?>

                            </div>
                            <input type="hidden" name="stus" id="stus" value="<?php echo $data;?>">
            <div class="field">
               <input type="text" required name="phone">
               <label>Enter Phone</label>
            </div>
            <div class="field">
               <input type="password" required name="pass">
               <label> Enter Password</label>
            </div>
           <br>
            <div class="field">
               <input type="submit" value="Login">
            </div>
             <div class="content">
            <!--   <div class="checkbox">
                  <input type="checkbox" id="remember-me">
                  <label for="remember-me">Remember me</label>
               </div> --> 
               <div class="pass-link">
                  <a href="forgot_password.php">Forgot password?</a>
               </div> 
            </div>
            <div class="signup-link">
               Not a member? <a href="signup.php">Signup now</a>
            </div>
         </form>
      </div>
   </body>
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
</html>