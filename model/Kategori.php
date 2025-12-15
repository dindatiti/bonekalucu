<?php
// webreebok/model/Kategori.php

require_once __DIR__ . '/../config/Database.php';

class KategoriModel {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function getAll() {
        
        try {
            
            $query = "SELECT * FROM tb_kategori";
            $stmt = $this->db->query($query);
            
        } catch (Exception $e) {
           
            echo "Error: " . $e->getMessage() . "<br>";
            echo "Mengecek struktur tabel...<br>";
            
           
            $result = $this->db->query("DESCRIBE tb_kategori");
            $columns = $result->fetchAll(PDO::FETCH_COLUMN);
            echo "Kolom yang tersedia: " . implode(", ", $columns) . "<br>";
            
           
            $query = "SELECT * FROM tb_kategori";
            $stmt = $this->db->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function store($nama) {
        $query = "INSERT INTO tb_kategori (nama) VALUES (?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$nama]);
    }
    
    
}
?>