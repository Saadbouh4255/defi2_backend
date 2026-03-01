<?php
// backend/config/Database.php

class Database {
    // Database credentials
    private $host = "localhost";
    private $db_name = "ihsan_platform"; // Expected DB name
    private $username = "root"; // Expected username
    private $password = ""; // Expected password
    public $conn;

    // Get the database connection
    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            // Connection errors will be silenced natively to prevent frontend breaking 
            // if the teammates haven't successfully initialized DB yet.
        }

        return $this->conn;
    }
}
?>
