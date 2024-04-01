<?php
require 'connection.php';
$station_id=$_REQUEST['station_id'];
$date=$_REQUEST['date'];
$data=array();
$post=array();
 $timeslot=array();
$sql="select * from charger_type where charger_type.station_id=$station_id ";
$result=$con->query($sql);

$count=$result->num_rows;
if($count>0){
    
    $charger_name="";
	while($row=$result->fetch_assoc()){
        $booking_id=$row['booking_id'];
    $time="";
       $name=$row['name'];
    // $sq="select charger_name from booking where stationid=$station_id and booking_date='$date' and charger_name='$name' ";
    // $res=$con->query($sq);
    // $co=$res->num_rows;

    // if($co>0){

    //     continue;

    //  }
    //   $sq1="select count(charger_name)  from booking where stationid=$station_id and booking_date='$date' and charger_name='$name' ";
    // $res1=$con->query($sq1);
  
    // $co1=$res1->num_rows;
 
    // if($co1==24){
    //  continue;
    // }
    
 
 $data[]=array('charger_id'=>$row['id'],
                  'charger_name'=>$row['name']);

        

		//$timeslot[]=array();
	


}
	$post=array("status"=>true,
                "message"=>"list available",
                "dataAvailable"=>$data);

}
else{
	$post=array("status"=>false,
                "message"=>"list not available",
                "dataAvailable"=>$data);
   
}
echo json_encode($post);
?>