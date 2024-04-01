<?php
require 'connection.php';
session_start();
$station_id = $_SESSION['id'];

// Sanitize and retrieve charger name and date
$charger_name = $_REQUEST['charger_name'];
$charger_date = $_REQUEST['charger_date'];

$sql = "SELECT * FROM charger_type WHERE station_id=$station_id AND name='$charger_name'";
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
        $name = $row['name'];
        $sq = "SELECT timeslot, booking_date FROM booking WHERE stationid=$station_id AND charger_name='$name' AND timeslot='$slot' AND booking_date='$charger_date'and     charging_status!='Rejected'";
        $res = $con->query($sq);
        $co = $res->num_rows;
        $ro = $res->fetch_assoc();

        if ( $ro['timeslot'] == $slot ) {
            echo '<div class="col-md-4">
                    <span class="card" style="width: 100%; margin-bottom:12px; background-color:red;color:white;">
                        <span class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text">' . $slot . '</p>
                        </span>
                    </span>
                  </div>';
        } else {
            echo '<div class="col-md-4">
                    <span class="card" style="width: 100%; margin-bottom:12px;">
                        <span class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text">' . $slot . '</p>
                        </span>
                    </span>
                  </div>';
        }
    }
} else {
    echo 'Not Available';
}
?>
