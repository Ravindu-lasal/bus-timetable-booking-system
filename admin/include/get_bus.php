<?php
include './inc.db_conn.php';

if (isset($_GET['bus_id'])) {
    $busId = intval($_GET['bus_id']);
    $stmt = $pdo->prepare("SELECT * FROM buses WHERE bus_id = ?");
    $stmt->execute([$busId]);
    $bus = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($bus) {
        echo json_encode($bus);
    } else {
        echo json_encode(['error' => 'Bus not found']);
    }
}
?>
