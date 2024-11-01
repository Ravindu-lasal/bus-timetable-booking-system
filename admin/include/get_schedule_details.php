<?php
// include/get_schedule_details.php

require_once './inc.db_conn.php';

if (isset($_GET['schedule_id'])) {
    $schedule_id = intval($_GET['schedule_id']);
    
    // Prepare and execute the query to fetch schedule and bus details
    $stmt = $pdo->prepare("SELECT s.schedule_id, b.bus_number, b.seats_available, r.start_location, r.end_location, 
                                  s.start_time, s.end_time, s.travel_date, s.price, s.bus_id, r.route_id
                           FROM schedules s 
                           JOIN buses b ON s.bus_id = b.bus_id 
                           JOIN routes r ON s.route_id = r.route_id
                           WHERE s.schedule_id = :schedule_id");
    $stmt->bindParam(':schedule_id', $schedule_id, PDO::PARAM_INT);
    $stmt->execute();
    $scheduleDetails = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Check total booked seats for this schedule
    $stmt = $pdo->prepare("SELECT SUM(seats_booked) AS total_booked FROM bookings WHERE schedule_id = :schedule_id");
    $stmt->bindParam(':schedule_id', $schedule_id, PDO::PARAM_INT);
    $stmt->execute();
    $bookedSeatsResult = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalBookedSeats = $bookedSeatsResult['total_booked'] ?? 0;

    if ($scheduleDetails) {
        $availableSeats = max(0, $scheduleDetails['seats_available'] - $totalBookedSeats);
        $scheduleDetails['available_seats'] = $availableSeats;
        echo json_encode($scheduleDetails);
    } else {
        echo json_encode(['error' => 'No schedule found.']);
    }
} else {
    echo json_encode(['error' => 'Invalid request.']);
}

?>

