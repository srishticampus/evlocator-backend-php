<?php
require 'connection.php';
$data=array();
$booking_id=$_REQUEST['booking_id'];
$start_time=$_REQUEST['start_time'];
$sq="select * from booking where id=$booking_id";
$res=$con->query($sq);
$ro=$res->fetch_assoc();
$booking_date=$ro['booking_date'];
$timeslot=$ro['timeslot'];
$current_date=date('Y-m-d');
list($start_time_str, $end_time_str) = explode(" - ", $timeslot);

// Convert start and end time strings to DateTime objects
$starttime = DateTime::createFromFormat('h:i A', $start_time_str);
$endtime = DateTime::createFromFormat('h:i A', $end_time_str);
if($starttime!=$start_time && $current_date!=$booking_date){
	$data=array("status"=>false,
               "message"=>"Can't start charging now");
}
// Format and display the start and end times
else{
$sql="update booking set charging_status='Ongoing',start_time='$start_time' where id=$booking_id";
$result=$con->query($sql);
if(!$result){
	$data=array("status"=>false,
               "message"=>"updated failed");
}
else{
	
	$data=array("status"=>true,
               "message"=>"updated successfully");
}
}
echo json_encode($data);
?>