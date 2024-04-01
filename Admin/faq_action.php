<?php
require 'connection.php';
$question=$_REQUEST['question'];
$answers=$_REQUEST['answers'];
$sql="INSERT INTO `faq`( `question`, `answers`) VALUES ('$question','$answers')";
$result=$con->query($sql);
$count=$con->affected_rows;
if($count>0){
	header("location:add_faq.php?status=success");
}
else{
		header("location:add_faq.php?status=failed");
}
?>