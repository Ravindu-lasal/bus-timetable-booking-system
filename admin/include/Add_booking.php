<?php

include "./inc.db_conn.php";
include "./fun.inc.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $passenger_name = $_POST['passenger_name'];
    $total_ticket = $_POST['total_ticket'];
    $total_price = $_POST['total_price'];
    $schedule_id = intval($_POST['schedule_id']);
    $bus_id = intval($_POST['bus_id']);
    $route_id = intval($_POST['route_id']);
    $user_id = intval($_POST['user_id']);

    
    $result = bookigcreate($pdo, $passenger_name, $total_ticket, $total_price, $schedule_id, $bus_id, $route_id, $user_id);
    
    header("Location:../../search.php?message=" . urlencode($result));
}