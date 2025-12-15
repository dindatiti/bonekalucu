<?php
class Database {
    private $connection;
    
    public function getConnection() {
        $this->connection = null;
        
        try {
            // JANGAN ADA "new Database()" DI SINI!
            // Hanya buat koneksi mysqli
            $this->connection = new mysqli("localhost", "root", '', "db_katalog boneka");

            if ($this->connection->connect_error) {
                die("Connection failed: " . $this->connection->connect_error);
            }

            $this->connection->set_charset("utf8");
            return $this->connection;
            
        } catch(Exception $e) {
            echo 'Connection failed: ' . $e->getMessage();
            return null;
        }
    }
}
?>