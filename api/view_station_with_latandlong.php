<?php

require 'connection.php';
$data=array();
$lattitude=$_REQUEST['lattitude'];
$longitude=$_REQUEST['longitude'];

$sql="SELECT lattitude,longitude,name,email,phone,address,password,file,cover_photo,profile,id,is_status,(((acos(sin(($lattitude*pi()/180)) * sin((lattitude*pi()/180))+cos(($lattitude*pi()/180)) * cos((lattitude*pi()/180)) * cos((($longitude - longitude)*pi()/180))))*180/pi())*60*1.1515*1.609344) AS distance FROM `station` where is_status=1 HAVING distance <= 50 ORDER BY id DESC";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
// $userCount=0;
// $workshop_rating=0;
	while($row=$result->fetch_assoc()){
            $rid=$row['id'];
 $sqRating="select * from rating where id=$rid";
        $sqResult=$con->query($sqRating);
        $sqCount=$sqResult->num_rows;
        $sqRow=$sqResult->fetch_assoc();
        $Rate_count=$sqRow['rate_count'];


        $id=$row['id'];
        $sq="SELECT * FROM `charger_type` where station_id=$id";
        $res=$con->query($sq);
        $co=$res->num_rows;


		$data[]=array("id"=>$row['id'],
             "name"=>$row['name'],
             "email"=>$row['email'],
             "phone"=>$row['phone'],
             "password"=>$row['password'],
             "address"=>$row['address'],
             "lattitude"=>$row['lattitude'],
             "longitude"=>$row['longitude'],
             "file"=>"http://campus.sicsglobal.co.in/Project/Evlocators/Station/uploads/".$row['profile'],
             "is_status"=>$row['is_status'],
             "no_of_charges_available"=>$co,
             "rating_count"=>($Rate_count==null)?"":$Rate_count);


	}
	$post=array("status"=>true,
                "message"=>"Station Details",
                "stationDetails"=>$data);
}
else{
	$post=array("status"=>false,
                "message"=>"No Station Details",
                "stationDetails"=>$data);
}
echo json_encode($post);
?>