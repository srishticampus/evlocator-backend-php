<?php
require'connection.php';
session_start();
$upload_dir="icons/";
$server_url = '/home/ubuntu/html/Project/Evlocators/Station/'; 
$type=$_REQUEST['type'];
$id=$_REQUEST['id'];
 $image=$_FILES['file']['name'];
   $s="select * from amenities where id=$id ";
    $r=$con->query($s);
    $ro=$r->fetch_assoc();
   
 if($image=="")
 {
 $photo=$ro['icons'];
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
    $sql="update amenities set name='$type',icons='$photo' where id=$id";
    $result=$con->query($sql);
    if(!$result){
    	header("location:amenities.php?status=failed");
    }
    else{
    	header("location:amenities.php?status=success");
    }


?>