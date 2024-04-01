<?php
require 'connection.php';
$data=array();
$post=array();
$sql="select * from plug_details";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	while($row=$result->fetch_assoc()){
		$data[]=array("id"=>$row['id'],
			"plug_name"=>$row['plug_name'],
			"file"=>"http://campus.sicsglobal.co.in/Project/Evlocators/Admin/uploads/".$row['file']);

	}
	$post=array("status"=>true,
                "message"=>"Plug type listed",
                "plug_details"=>$data);
}
else{
	$post=array("status"=>true,
                "message"=>"Plug type listed",
                "plug_details"=>$data);
}
echo json_encode($post);
?>