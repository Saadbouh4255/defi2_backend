<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once '../config/Database.php';

$database = new Database();
$db = $database->getConnection();

// Start with standard default values as specified (0s)
$stats = [
    'families_helped' => 0,
    'mru_collected' => 0,
    'confirmed_donations' => 0
];

if($db){
    try {
        // Query structures ready for teammate integration:
        // Examples: 
        // $stmt = $db->query("SELECT SUM(families_helped) AS helped, SUM(total_mru) AS mru, COUNT(id) AS donations FROM stats");
        // $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // if($row) { 
        //      $stats['families_helped'] = $row['helped'] ?? 0;
        //      $stats['mru_collected'] = $row['mru'] ?? 0;
        //      $stats['confirmed_donations'] = $row['donations'] ?? 0;
        // }
    } catch(PDOException $e) {
        // Fallback to default arrays silently if tables missing
    }
}

echo json_encode($stats);
?>
