




<?php
require 'connection.php';
date_default_timezone_set('Asia/Kolkata');
$booking_id=$_GET['id'];

 $sq="select * from booking where booking_id='$booking_id'";
 $res=$con->query($sq);
 $co=$res->num_rows;
	//echo $sq;
		$ro=$res->fetch_assoc();
		
		$charger_name=$ro['charger_name'];
		$startTime=$ro['start_time'];
		$endTime=$ro['end_time'];
		
	


	 	$sq1="select * from charger_type where name='$charger_name'";
	 $res1=$con->query($sq1);
$co1=$res1->num_rows;
	
		$ro1=$res1->fetch_assoc();
		$hourlyRate=$ro1['amount'];
		$advanceAmount=$ro1['amount'];
		// if($time>"01:00"){
		// 	$sq2="update booking set final_amount=$amount+$amount where id=$booking_id";
		// 	$res2=$con->query($sq2);
		// }
		// else{
		// 	$sq2="update booking set final_amount=$amount where id=$booking_id";
		// 	$res2=$con->query($sq2);
		// }


		// Example usage
//$startTime = "09:00:00"; // Start time (e.g., 9:00 AM)
//$endTime = "13:30:00";   // End time (e.g., 1:30 PM)
//$hourlyRate = 10;        // Hourly rate (e.g., $10 per hour)

// Calculate hourly payment
$hourlyPayment = calculateHourlyPayment($startTime, $endTime, $hourlyRate,$advanceAmount);
$formattedPayment = formatIndianRupee($hourlyPayment);
$pending=$formattedPayment-$advanceAmount;
// Output the result
//echo "Hourly payment: " . $formattedPayment; // Display payment with 2 decimal places
$sql="update booking set final_amount=$formattedPayment,pending_amount=$pending,advance_payment=$advanceAmount where booking_id='$booking_id'";
$result=$con->query($sql);

if(!$result){
	header("location:booking.php?status=failed");
}
else{
header("location:booking.php?status=success");
}
?>


	
<?php
function formatIndianRupee($amount) {
    return  number_format($amount); // Display payment with 2 decimal places and comma separators
}
// Function to calculate hourly payment
function calculateHourlyPayment($startTime, $endTime, $hourlyRate,$advanceAmount) {

    // Convert start and end times to Unix timestamps
    $startTimeStamp = strtotime($startTime);
    $endTimeStamp = strtotime($endTime);
    
    // Calculate the duration in seconds
    $durationInSeconds = $endTimeStamp - $startTimeStamp;
    
    // Convert duration to hours
    $durationInHours = $durationInSeconds / 3600; // 3600 seconds in an hour
    //$time= date("H:i", $durationInSeconds);
    //echo $durationInHours;
    // Calculate total payment

   
 if ($durationInHours > 1) {
        $totalPayment = $hourlyRate + $advanceAmount;
    } else {
        $totalPayment = $advanceAmount;
    }
    
    return $totalPayment;
    
    
    
    return $totalPayment;
}



?>