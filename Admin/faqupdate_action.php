<?php
require 'connection.php';
$question=$_REQUEST['question'];
$answers=$_REQUEST['answers'];
$id=$_REQUEST['id'];
$sql="UPDATE `faq` SET `question`='$question',`answers`='$answers' WHERE id=$id";
$result=$con->query($sql);

if(!$result){
	header("location:view_faq.php?status=failed");
}
else{
		
		header("location:view_faq.php?status=success");
}
?>