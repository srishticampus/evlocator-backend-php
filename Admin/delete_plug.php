<?php
require 'connection.php';
$id=$_POST['id'];
$sql="delete from plug_details where id=$id";
$result=$con->query($sql);
if(!$result){
	echo 0;
}
else{
	echo 1;
}
?>