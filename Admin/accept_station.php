<?php
require 'connection.php';
session_start();
$id=$_POST['id'];
$sql="update station set is_status=1 where id=$id";
$result=$con->query($sql);
if(!$result){
	//echo 0;
	echo $sql;
}
else{
	echo 1;
}
?>