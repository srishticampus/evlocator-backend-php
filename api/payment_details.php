<?php
require 'connection.php';
$booking_id=$_REQUEST['booking_id'];
$data=array();
$sql="select * from booking where id=$booking_id";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	$row=$result->fetch_assoc();
	$data[]=array("id"=>$row['id'],
                 "booking_id"=>$row['booking_id'],
                 "amount_paid"=>$row['advance_payment'],
                 "final_amount"=>$row['final_amount'],
                 "pending_amount"=>$row['pending_amount']);
	$post=array("status"=>true,
               "message"=>"Payment Details Listed",
               "paymentDetails"=>$data);

}
else{
	$post=array("status"=>false,
               "message"=>"No Payment Details Listed",
               "paymentDetails"=>$data);

}
echo json_encode($post);
?>