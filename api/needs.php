<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once '../config/Database.php';

$database = new Database();
$db = $database->getConnection();

$needs = []; // Default to empty array

if($db){
    try {
        // Query structures ready for teammate integration:
        // $query = "SELECT id, type, district, required_mru, collected_mru, validator_name AS validator, status FROM needs";
        // $stmt = $db->prepare($query);
        // $stmt->execute();
        // $needs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        // Silently default back to empty values without terminating the script when tables are absent
    }
}

echo json_encode($needs);
?>
