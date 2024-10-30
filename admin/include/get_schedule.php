<?php
include './inc.db_conn.php';

if (isset($_GET['schedule_id'])) {
    $scheduleId = intval($_GET['schedule_id']);
    $stmt = $pdo->prepare("SELECT * FROM schedules WHERE schedule_id = ?");
    $stmt->execute([$scheduleId]);
    $schedule = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($schedule) {
        echo json_encode($schedule);
    } else {
        echo json_encode(['error' => 'Schedule not found']);
    }
}
?>
