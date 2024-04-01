<?php
require 'connection.php';
$id=$_GET['id'];
$sql="delete from faq where id=$id";
$result=$con->query($sql);

if(!$result){
	header("location:view_faq.php?status=failed");
}
else{
		
		header("location:view_faq.php?status=success");
}
?>