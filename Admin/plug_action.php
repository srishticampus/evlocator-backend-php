<?php
require 'connection.php';
session_start();
$type=$_POST['type'];
 $upload_dir="uploads/";
$server_url = '/home/ubuntu/html/Project/Evlocators/Admin/'; 

 $image=$_FILES['file']['name'];
$random_name = rand(1000,1000000)."-".$image;
 $image_tmp_name = $_FILES["file"]["tmp_name"];
        $upload_name = $upload_dir.strtolower($random_name);
        $upload_name = preg_replace('/\s+/', '-', $upload_name);
        $upload_name=$server_url."/".$upload_name;
        if(move_uploaded_file($image_tmp_name , $upload_name)){
           $photo=basename($upload_name); 
        }
        else{
            $photo="";
        }
        $sql="INSERT INTO `plug_details`( `plug_name`, `file`) VALUES ('$type','$photo')";
        $result=$con->query($sql);
        $count=$con->affected_rows;
        if($count>0){
        	header("location:add_plug.php?status=success");
        }
        else{
        	header("location:add_plug.php?status=failed");
        }
?>