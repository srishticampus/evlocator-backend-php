<?php
require 'connection.php';
session_start();
$id=$_GET['id'];
$sql="delete from charger_type where id=$id";
$result=$con->query($sql);
if(!$result){
	header("location:services.php?status=failed");
}
else{
		header("location:services.php?status=success");
}
?>