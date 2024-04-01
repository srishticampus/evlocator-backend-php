
<?php
require 'connection.php';
$id=$_REQUEST['id'];
$data=array();
$sql="select * from user where id=$id";
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
              "image"=>($row['image']== null ?"":"http://campus.sicsglobal.co.in/Project/Evlocators/api/uploads/".$row['image']));
$post=array("status"=>true,
               "message"=>"User Details Listed",
               "userData"=>$data);
}
else{
	$post=array("status"=>false,
               "message"=>"No User Details Found",
               "userData"=>$data);

}
echo json_encode($post);
?>