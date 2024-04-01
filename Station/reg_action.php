<?php 
require 'connection.php';
// File upload folder 
 $upload_dir="uploads/";
$server_url = '/home/ubuntu/html/Project/Evlocators/Station/'; 
$password=$_REQUEST['password'];
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
 

    // Get the submitted form data 
    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $address=$_POST['address'];
    $lattitude=$_POST['lattitude'];
    $longitude=$_POST['longitude'];
    $sql = "INSERT INTO `station`( `name`, `email`, `phone`, `password`, `address`, `lattitude`, `longitude`, `file`) VALUES ('$name','$email','$phone','$password','$address','$lattitude','$longitude','$photo')"; 
    $result=$con->query($sql);
    $count=$con->affected_rows;
    if($count>0){
        header("location:signup.php?status=success");
    }
    else{
        header("location:signup.php?status=failed");
    }

     
