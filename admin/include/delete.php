<?php

include './inc.db_conn.php';

if (isset($_GET['type']) && isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT); 
    $type = $_GET['type'];


    if (filter_var($id, FILTER_VALIDATE_INT)) {
        // Determine which table to delete from based on the type
        switch ($type) {
            case 'bus_booking':
                $sql = "DELETE FROM bookings WHERE booking_id = :id";
                break;
            case 'bus_schedules':
                $sql = "DELETE FROM schedules WHERE schedule_id = :id";
                break;
            case 'location':
                $sql = "DELETE FROM routes WHERE route_id = :id";
                break;
            case 'buses':
                $sql = "DELETE FROM buses WHERE bus_id = :id";
                break;
            default:
                echo "Invalid type!";
                exit();
        }

        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([':id' => $id])) {
            header("Location: ../{$type}.php?message=Record deleted successfully!"); 
            exit();
        } else {
            echo "Error deleting record.";
        }
    } else {
        echo "Invalid ID!";
    }
} else {
    echo "Invalid Request!";
}

?>