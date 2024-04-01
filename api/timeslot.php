<?php
require 'connection.php';
$charger_name = $_REQUEST['charger_name'];
$station_id = $_REQUEST['station_id'];
$date = $_REQUEST['date'];

$data = array();
$post = array();
$timeslot = array();
$sql = "SELECT * FROM charger_type WHERE station_id = $station_id AND name = '$charger_name'";
$result = $con->query($sql);

$count = $result->num_rows;
if ($count > 0) {
    $row = $result->fetch_assoc();
    $start=$row['start_time'];
    $end=$row['end_time'];
    date_default_timezone_set('Asia/Calcutta');
    $start_time = new DateTime($start);
    $end_time = new DateTime($end);
    $interval = new DateInterval('PT1H');
    $time_slots = new DatePeriod($start_time, $interval, $end_time);
    foreach ($time_slots as $time_slot) {
        $slot = $time_slot->format('h:i A') . ' - ' . $time_slot->add($interval)->format('h:i A');
        $sq = "SELECT timeslot FROM booking WHERE stationid = $station_id AND booking_date = '$date' AND charger_name = '$charger_name' AND timeslot = '$slot' AND charging_status != 'Rejected'";
        $res = $con->query($sq);
        $co = $res->num_rows;
        if ($co == 0) {
            if ($date == date('Y-m-d') && $time_slot > new DateTime()) {
                $timeslot[]=array('timeSlot'=>$slot);
            } elseif ($date != date('Y-m-d')) {
                $timeslot[]=array('timeSlot'=>$slot);
            }
        }
    }
    $data[] = array(
        'charger_id' => $row['id'],
        'charger_name' => $row['name'],
        'timeslot' => $timeslot
    );
    $post = array(
        "status" => true,
        "message" => "list available",
        "dataAvailable" => $data
    );
} else {
    $post = array(
        "status" => false,
        "message" => "list not available",
        "dataAvailable" => $data
    );
}
echo json_encode($post);
?>
