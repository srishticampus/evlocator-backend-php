<?php
require'connection.php';
session_start();
$upload_dir="uploads/";
$server_url = '/home/ubuntu/html/Project/Evlocators/Admin/'; 
$type=$_REQUEST['type'];
$id=$_REQUEST['id'];
 $image=$_FILES['file']['name'];
   $s="select * from plug_details where id=$id ";
    $r=$con->query($s);
    $ro=$r->fetch_assoc();
   
 if($image=="")
 {
 $photo=$ro['file'];
 }
 else{
$random_name = rand(1000,1000000)."-".$image;
 $image_tmp_name = $_FILES["file"]["tmp_name"];
        $upload_name = $upload_dir.strtolower($random_name);
        $upload_name = preg_replace('/\s+/', '-', $upload_name);
        $upload_name=$server_url."/".$upload_name;
        if(move_uploaded_file($image_tmp_name , $upload_name)){
           $photo=basename($upload_name); 
        }
       
    }
    $sql="update plug_details set plug_name='$type',file='$photo' where id=$id";
    $result=$con->query($sql);
    if(!$result){
    	header("location:add_plug.php?status=failed");
    }
    else{
    	header("location:add_plug.php?status=success");
    }


?>