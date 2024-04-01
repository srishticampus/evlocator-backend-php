<?php
require 'connection.php';
session_start();
$name=$_POST['name'];
$type=$_POST['plug_type'];
$station_id=$_SESSION['id'];
$amount=$_POST['amount'];
$start_time=$_POST['start_time'];
$end_time=$_POST['end_time'];
$id=$_POST['cid'];
if($id==""){
$sql="insert into charger_type(name,type,station_id,amount,start_time,end_time)values('$name','$type','$station_id','$amount','$start_time','$end_time')";
$result=$con->query($sql);
}
else{
	$sql="update charger_type set name='$name',type='$type',station_id='$station_id',amount='$amount',start_time='$start_time',end_time='$end_time' where id='$id'";
$result=$con->query($sql);	
}
$count=$con->affected_rows;

if($count>0){
	header("location:services.php?status=success");
}
else{
header("location:services.php?status=failed");
	
}
?>