<?php
require 'connection.php';
session_start();
date_default_timezone_set('Asia/Kolkata');
define('API_ACCESS_KEY', 'AAAA9xXX4ww:APA91bG8OFXHtaipHaeHfOM2nhKP2Z9KdbuadTpqiVJvt9RTpVuKYGQGfmv79LI2lrPZHHSmRaiSnLMfVVNDMu6gm3jM25fixR1J8DeLX16ncTFMZvScI0yps9hZmAxtEVoNsmFv16j-');
$id = $_GET['id'];
$sql = "UPDATE booking SET booking_status = 1 WHERE booking_id = '$id'";
$result = $con->query($sql);
if (!$result) {
    header("location:booking.php?status=failed");
} else {
    $sq = "SELECT * FROM booking WHERE booking_id = '$id'";
    $res = $con->query($sq);
    $co = $res->num_rows;
    $ro = $res->fetch_assoc();
    $userid = $ro['userid'];
    $sq1 = "SELECT * FROM user WHERE id = $userid";
    $res1 = $con->query($sq1);
    $ro1 = $res1->fetch_assoc();
    $device_token = $ro1['device_token'];
    if ($device_token) {
        $registrationIds = array($device_token);
        $msg = array('booking' => 'Accepted');
        $fields = array(
            'registration_ids' => $registrationIds,
            'data' => $msg
        );
        $headers = array(
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);
    }
    //echo $result;die();
    $post = array("payload" => $msg);
    header("location:booking.php?status=success");
}
?>
