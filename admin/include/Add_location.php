<?php

include "./inc.db_conn.php";
include "./fun.inc.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $startLocation = $_POST['start_location'];
    $endLocation = $_POST['end_location'];
    $distanceKm = floatval($_POST['distance_km']);
    $route_id = intval($_POST['route_id']);

    if (!empty($route_id)) {

        $result = editLocation($pdo, $route_id, $startLocation, $endLocation, $distanceKm);

    } else {
        // Create a new location
        $result = addLocation($pdo, $startLocation, $endLocation, $distanceKm);
    }
    header("Location:../location.php?message=" . urlencode($result));
}

?>

