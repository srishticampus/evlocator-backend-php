<?php
require 'connection.php';
$data=array();
$post=array();
$station_name=$_REQUEST['station_name'];
$sql="select * from station WHERE  is_status=1 and  name LIKE '%$station_name%'  ";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
    
	while($row=$result->fetch_assoc()){
$data[]=array("id"=>$row['id'],
             "name"=>$row['name'],
             "email"=>$row['email'],
             "phone"=>$row['phone'],
             "password"=>$row['password'],
             "address"=>$row['address'],
             "lattitude"=>$row['lattitude'],
             "longitude"=>$row['longitude'],
             "file"=>"http://campus.sicsglobal.co.in/Project/Evlocators/station/uploads/".$row['file'],
             "is_status"=>$row['is_status']);

	}
	$post=array("status"=>true,
               "message"=>"Station details listed",
               "stationDetails"=>$data);
}
else{
	$post=array("status"=>false,
               "message"=>"No Station details listed",
               "stationDetails"=>$data);
}
echo json_encode($post);
?>