<?php
// webreebok/model/Kategori.php

require_once __DIR__ . '/../config/Database.php';

class KategoriModel {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function getAll() {
        // Cek dulu struktur tabel
        try {
            // Coba tanpa ORDER BY dulu untuk melihat kolom apa yang ada
            $query = "SELECT * FROM tb_kategori";
            $stmt = $this->db->query($query);
            
        } catch (Exception $e) {
            // Jika error, coba lihat struktur tabel
            echo "Error: " . $e->getMessage() . "<br>";
            echo "Mengecek struktur tabel...<br>";
            
            // Tampilkan kolom yang ada
            $result = $this->db->query("DESCRIBE tb_kategori");
            $columns = $result->fetchAll(PDO::FETCH_COLUMN);
            echo "Kolom yang tersedia: " . implode(", ", $columns) . "<br>";
            
            // Coba query dengan kolom lain atau tanpa ORDER BY
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
    
    // Method lainnya tetap...
}
?>