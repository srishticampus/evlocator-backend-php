<?php
require 'connection.php';
$data=array();
$data1=array();
$post=array();
$id=$_REQUEST['station_id'];
$sql="select * from station where id=$id and is_status=1";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
$row=$result->fetch_assoc();
$rid=$row['id'];
 $sqRating="select * from rating where id=$rid";
        $sqResult=$con->query($sqRating);
        $sqCount=$sqResult->num_rows;
        $sqRow=$sqResult->fetch_assoc();
        $Rate_count=$sqRow['rate_count'];
$data=array("id"=>$row['id'],
             "name"=>$row['name'],
             "email"=>$row['email'],
             "phone"=>$row['phone'],
             "password"=>$row['password'],
             "address"=>$row['address'],
             "lattitude"=>$row['lattitude'],
             "longitude"=>$row['longitude'],
             "licence"=>"http://campus.sicsglobal.co.in/Project/Evlocators/Station/uploads/".$row['file'],
             "is_status"=>$row['is_status'],
             "profile"=>"http://campus.sicsglobal.co.in/Project/Evlocators/Station/uploads/".$row['profile'],
             "cover_photo"=>"http://campus.sicsglobal.co.in/Project/Evlocators/Station/uploads/".$row['cover_photo'],
             "rating_count"=>($Rate_count==null)?"":$Rate_count);
$sql1="select * from amenities where station_id=$id";
$result1=$con->query($sql1);
$count1=$result1->num_rows;
if($count1>0)
{
    while($row1=$result1->fetch_assoc())
    {
        $data1[]=array("id"=>$row1['id'],
            "name"=>$row1['name'],
            "icons"=>"http://campus.sicsglobal.co.in/Project/Evlocators/Station/icons/".$row1['icons'],
            "station_id"=>$row1['station_id']);
    }
}
	
	$post=array("status"=>true,
               "message"=>"Station details listed",
               "stationDetails"=>$data,
               "amenitiesDetails"=>$data1);
}
else{
	$post=array("status"=>false,
               "message"=>"No Station details listed",
               "stationDetails"=>$data,
               "amenitiesDetails"=>$data1);
}
echo json_encode($post);
?>