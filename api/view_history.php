<?php
require 'connection.php';
$data=array();
$post=array();
$userid=$_REQUEST['userid'];
$sql="SELECT booking.id,station.name,station.email,station.phone,station.password,station.address,station.lattitude,station.longitude,station.file,station.is_status,booking.timeslot,booking.booking_date,booking.charger_name,booking.booking_status,booking.charging_status,booking.stationid,station.profile FROM `booking` INNER join station on booking.stationid=station.id where booking.userid=$userid order by id desc";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	while($row=$result->fetch_assoc()){
          $rid=$row['stationid'];
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
             "file"=>"http://campus.sicsglobal.co.in/Project/Evlocators/Station/uploads/".$row['profile'],
             "is_status"=>$row['is_status'],
             "timeslot"=>$row['timeslot'],
             "booking_date"=>$row['booking_date'],
             "charger_name"=>$row['charger_name'],
             "booking_status"=>$row['booking_status'],
             "charging_status"=>$row['charging_status'],
             "rating_count"=>($Rate_count==null)?"":$Rate_count);

	}
	$post=array("status"=>true,
               "message"=>"Order details listed",
               "stationDetails"=>$data);
}
else{
	$post=array("status"=>false,
               "message"=>"No Order details listed",
               "stationDetails"=>$data);
}
echo json_encode($post);
?>