<?php
require 'connection.php';
session_start();
$email=$_POST['email'];
$password=$_POST['password'];
$sql="select * from admin where username='$email' and password='$password'";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	$_SESSION['admin']=true;
	header("location:dashboard.php?status=success");

}
else{
	header("location:index.php?status=failed");
	//echo $sql;
}
?>