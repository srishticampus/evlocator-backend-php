




<?php
require 'connection.php';
$data=array();
$booking_id=$_REQUEST['booking_id'];
$end_time=$_REQUEST['stop_time'];
$sql="update booking set charging_status='Completed',end_time='$end_time' where id=$booking_id";
$result=$con->query($sql);
if(!$result){
	$data=array("status"=>false,
               "message"=>"updated failed");
}
else{
	$data=array("status"=>true,
               "message"=>"updated successfully");
}

echo json_encode($data);
?>