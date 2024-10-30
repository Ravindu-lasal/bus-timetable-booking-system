<?php

include "./inc.db_conn.php";
include "./fun.inc.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $busId = intval($_POST['bus_id']);
    $routeId = intval($_POST['route_id']);
    $startTime = $_POST['start_time'];
    $endTime = $_POST['end_time'];
    $travelDate = $_POST['travel_date'];
    $price = floatval($_POST['price']);
    $schedule_id = floatval($_POST['schedule_id']);


    if (!empty($schedule_id)) {
        // Update bus details
        $result = updateSchedule($pdo, $busId, $routeId, $startTime, $endTime, $travelDate, $price, $schedule_id);
    } else {
        // Create a new bus
        $result = addSchedule($pdo, $busId, $routeId, $startTime, $endTime, $travelDate, $price);
    }

    header("Location:../bus_schedules.php?message=" . urlencode($result));
}

?>
