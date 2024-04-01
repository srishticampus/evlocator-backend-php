<?php
require 'connection.php';
$userid=$_REQUEST['userid'];
$station_id=$_REQUEST['station_id'];
$date=$_REQUEST['date'];
$charger=$_REQUEST['charger'];
$slot=$_REQUEST['slot'];
$data=array();
$length = 15;

$randomletter = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, $length);
$sql="select * from booking where timeslot='$slot' and booking_date='$date'";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
    $data=array('status'=>false,
            'message'=>"Timeslot not available",
            'bookingId'=>"");
}
else{


$sql="INSERT INTO `booking`( `userid`, `stationid`, `timeslot`, `booking_date`, `charger_name`,`booking_id`,`charging_status`,`advance_payment`) VALUES ('$userid','$station_id','$slot','$date','$charger','$randomletter','Upcoming','50')";
$result=$con->query($sql);
$count=$con->affected_rows;

if($count>0){
$data=array('status'=>true,
            'message'=>"booking success",
            'bookingId'=>$randomletter);
}
else{
    // /echo $sql;
    $data=array('status'=>false,
            'message'=>"booking failed",
            'bookingId'=>"");
}
}
echo json_encode($data);
?>