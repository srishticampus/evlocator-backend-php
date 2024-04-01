<?php
require 'connection.php';
$data=array();
$post=array();
$sql="select * from station where is_status=1";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	while($row=$result->fetch_assoc()){
        $rid=$row['id'];
 $sqRating="select * from rating where id=$rid";
        $sqResult=$con->query($sqRating);
        $sqCount=$sqResult->num_rows;
        $sqRow=$sqResult->fetch_assoc();
        $Rate_count=$sqRow['rate_count'];
$data[]=array("id"=>$row['id'],
             "name"=>$row['name'],
             "email"=>$row['email'],
             "phone"=>$row['phone'],
             "password"=>$row['password'],
             "address"=>$row['address'],
             "lattitude"=>$row['lattitude'],
             "longitude"=>$row['longitude'],
             "file"=>"http://campus.sicsglobal.co.in/Project/Evlocators/station/uploads/".$row['cover_photo'],
             "is_status"=>$row['is_status'],
             "rating_count"=>($Rate_count==null)?"":$Rate_count);

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