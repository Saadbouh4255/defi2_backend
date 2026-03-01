<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once '../config/Database.php';

$database = new Database();
$db = $database->getConnection();

$donations = []; // Default zero transactions

if($db){
    try {
        // Ready for teammates to inject table names and columns:
        // $query = "SELECT tx_id AS id, amount, district, transaction_date AS date, status FROM transactions ORDER BY transaction_date DESC LIMIT 5";
        // $stmt = $db->prepare($query);
        // $stmt->execute();
        // $donations = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        // Fallback to empty list gracefully 
    }
}

echo json_encode($donations);
?>
