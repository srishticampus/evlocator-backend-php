<?php
require 'connection.php';
$phone=$_REQUEST['phone'];
$password=$_REQUEST['password'];
$device_token=$_REQUEST['device_token'];
$data=array();
$post=array();
$sql="select * from user where phone_number='$phone' and password='$password'";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	$row=$result->fetch_assoc();
	$sq="update user set device_token='$device_token' where phone_number='$phone' and password='$password'";
	$res=$con->query($sq);
	$data[]=array("id"=>($row['id']== null ?"":$row['id']),
              "name"=>($row['name']== null ?"":$row['name']),
              "phone"=>($row['phone_number']== null ?"":$row['phone_number']),
              "email"=>($row['email']== null ?"":$row['email']),
              "password"=>($row['password']== null ?"":$row['password']),
              "device_token"=>($row['device_token']== null ?"":$row['device_token']),
              "image"=>($row['image']== null ?"":"http://campus.sicsglobal.co.in/Project/Evlocators/api/uploads/".$row['image']));
	$post=array("status"=>true,
               "message"=>"Login Successfull",
               "userData"=>$data);

}
else{
	$post=array("status"=>false,
               "message"=>"Login Failed",
               "userData"=>$data);
}
echo json_encode($post);
?>