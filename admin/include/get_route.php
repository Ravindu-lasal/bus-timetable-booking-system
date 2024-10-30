<?php
include './inc.db_conn.php';

if (isset($_GET['route_id'])) {
    $routeId = intval($_GET['route_id']);
    $stmt = $pdo->prepare("SELECT * FROM routes WHERE route_id = ?");
    $stmt->execute([$routeId]);
    $route = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($route) {
        echo json_encode($route);
    } else {
        echo json_encode(['error' => 'Route not found']);
    }
}
?>

