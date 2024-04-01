<?php
require 'connection.php';
session_start();

$eml=$_POST['phone'];
$pass=$_POST['pass'];
$sql="select * from station where phone='$eml' and password='$pass'";
$result=$con->query($sql);
$count=$result->num_rows;
$row=$result->fetch_assoc();
if($count>0&&$row['is_status']==1){
	
	$_SESSION['id']=$row['id'];
	header('location:index.php?stus=success');
}
else if($row['is_status']!=1&&$row['phone']==$eml){
	if($row['is_status']==0){
	header('location:login.php?stus=fail');
}
else if($row['is_status']==2){
	header('location:login.php?stus=faill');
}
}
else{
	header('location:login.php?stus=failed');
	//echo $sql;
}
?>