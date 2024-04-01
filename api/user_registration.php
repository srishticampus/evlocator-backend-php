<?php
require 'connection.php';
$name=$_REQUEST['name'];
$phone=$_REQUEST['phone'];
$email=$_REQUEST['email'];
$password=$_REQUEST['password'];
 $image=$_FILES['image']['name'];
$data=array();
$post=array();
 $upload_dir="uploads/";
$server_url = '/home/ubuntu/html/Project/Evlocators/api/'; 
$sql="select * from  user where phone_number='$phone'";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
$row=$result->fetch_assoc();
	$data[]=array("id"=>($row['id']== null ?"":$row['id']),
              "name"=>($row['name']== null ?"":$row['name']),
              "phone"=>($row['phone_number']== null ?"":$row['phone_number']),
              "email"=>($row['email']== null ?"":$row['email']),
              "password"=>($row['password']== null ?"":$row['password']),
              "device_token"=>($row['device_token']== null ?"":$row['device_token']),
              "image"=>($row['image']==null?"":$row['image']));
$post =array("status"=>false,
             "message"=>"User Already Exist",
             "userData"=>$data);
}
else{
	$random_name = rand(1000,1000000)."-".$image;
 $image_tmp_name = $_FILES["image"]["tmp_name"];
        $upload_name = $upload_dir.strtolower($random_name);
        $upload_name = preg_replace('/\s+/', '-', $upload_name);
        $upload_name=$server_url."/".$upload_name;
        if(move_uploaded_file($image_tmp_name , $upload_name)){
           $photo=basename($upload_name); 
        }
        else{
            $photo="";
        }

        $sql="INSERT INTO `user`( `name`, `phone_number`, `email`, `password`,`image`) VALUES ('$name','$phone','$email','$password','$photo')";
$result=$con->query($sql);
$count=$con->affected_rows;
if($count>0){
$last_id = $con->insert_id;
$sq="select * from user where id=$last_id";
$res=$con->query($sq);
$row=$res->fetch_assoc();
$data[]=array("id"=>($row['id']== null ?"":$row['id']),
              "name"=>($row['name']== null ?"":$row['name']),
              "phone"=>($row['phone_number']== null ?"":$row['phone_number']),
              "email"=>($row['email']== null ?"":$row['email']),
              "password"=>($row['password']== null ?"":$row['password']),
              "device_token"=>($row['device_token']== null ?"":$row['device_token']),
              "image"=>($row['image']==null?"":$row['image']));
$post =array("status"=>true,
             "message"=>"Registration Successfull",
             "userData"=>$data);
}
else{
	$post =array("status"=>false,
             "message"=>"Registration Failed",
             "userData"=>$data);
}
}
echo json_encode($post);
?>