<?php

include "./inc.db_conn.php";
include "./fun.inc.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $busName = $_POST['bus_name'];
    $busNumber = $_POST['bus_number'];
    $busSeat = intval($_POST['bus_seat']);
    $busId = intval($_POST['bus_id']);

    if (!empty($busId)) {
        // Update bus details
        $result = busUpdate($pdo, $busName, $busNumber, $busSeat, $busId);
    } else {
        // Create a new bus
        $result = busCreate($pdo, $busName, $busNumber, $busSeat);
    }
    header("Location:../buses.php?message=" . urlencode($result));
}
