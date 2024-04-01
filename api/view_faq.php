<?php
require 'connection.php';
$data=array();
$post=array();
$sql="select * from faq";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	while($row=$result->fetch_assoc()){
$data[]=array("id"=>$row['id'],
             "question"=>$row['question'],
             "answers"=>$row['answers']);

	}
	$post=array("status"=>true,
               "message"=>"FAQ listed",
               "stationDetails"=>$data);
}
else{
	$post=array("status"=>false,
               "message"=>"No FAQ listed",
               "stationDetails"=>$data);
}
echo json_encode($post);
?>