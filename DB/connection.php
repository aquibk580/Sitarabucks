<?php
class Database {
    private $host = 'localhost';   // Database Host
    private $db_name = 'sitarabucks';   // Database Name
    private $username = 'root';     // Database Username
    private $password = 'aak580';     // Database Username
    public $conn;
    // Get the database connection
    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username , $this->password);
            // Set error mode to exceptions
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }

        return $this->conn;
    }
}
?>
