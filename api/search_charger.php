<?php
require 'connection.php';
$charger_name=$_REQUEST['charger_name'];
$station_id=$_REQUEST['station_id'];
$data=array();
$post=array();
$sql="SELECT plug_details.plug_name,plug_details.file,charger_type.name,charger_type.station_id,charger_type.id  FROM `plug_details` INNER join charger_type on plug_details.id=charger_type.type WHERE charger_type.name LIKE '$charger_name%' and charger_type.station_id=$station_id";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	while($row=$result->fetch_assoc()){
		$data[]=array("id"=>$row['id'],
	                 "plugName"=>$row['plug_name'],
	                 "stationId"=>$row['station_id'],
	                 "plugFile"=>"http://campus.sicsglobal.co.in/Project/Evlocators/Admin/uploads/".$row['file'],
	                 "chargerName"=>$row['name']);

	}
	$post=array("status"=>true,
               "message"=>"Chargers Listed",
               "chargerDetails"=>$data);
}
else{
	$post=array("status"=>false,
               "message"=>"Chargers Not Listed",
               "chargerDetails"=>$data);
}
echo json_encode($post);
?>