<?php
require 'connection.php';
$phone=$_POST['phone'];
$password=$_POST['pass'];
$sql="select * from station where phone=$phone";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	$sq="update station set password='$password' where phone='$phone'";
	$res=$con->query($sq);
	if(!$res){
		header("location:forgot_password.php?stus=failed");
	}
	else{
		header("location:login.php?stus=fsuccess");
	}
}
else{
	header("location:forgot_password.php?stus=failed");
}
?>