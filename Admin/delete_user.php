<?php
require 'connection.php';
$id=$_POST['id'];
$sql="delete from user where id=$id";
$result=$con->query($sql);
if(!$result){
	echo 0;
}
else{
	echo 1;
}
?>