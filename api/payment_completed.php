<?php
require 'connection.php';
$data=array();
$booking_id=$_REQUEST['booking_id'];

$sql="UPDATE booking SET charging_status='Payment Completed' WHERE id=$booking_id";
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