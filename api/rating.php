<?php
require 'connection.php';
$count=$_REQUEST['count'];
$station_id=$_REQUEST['station_id'];
$user_id=$_REQUEST['user_id'];
$booking_id=$_REQUEST['booking_id'];
$review=$_REQUEST['review'];
$data=array();
$sql="select * from rating where book_id='$booking_id' and user_id='$user_id'";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){

$data=array("status"=>false,
                "message"=>"Already Rated");
}
else{


$sql="INSERT INTO `rating`( `rate_count`, `station_id`, `user_id`, `book_id`, `review`) VALUES ('$count','$station_id','$user_id','$booking_id','$review')";
$result=$con->query($sql);
$count=$con->affected_rows;
if($count>0){
	$data=array("status"=>true,
                "message"=>"rating added");
}
else{
	$data=array("status"=>false,
                "message"=>"rating Failed");
}
}
echo json_encode($data);

?>