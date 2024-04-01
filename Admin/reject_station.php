<?php
require 'connection.php';
session_start();
$id=$_POST['id'];
$sql="update station set is_status=2 where id=$id";
$result=$con->query($sql);
if(!$result){
	echo 0;
}
else{
	echo 1;
}
?>