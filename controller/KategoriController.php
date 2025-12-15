<?php
require_once __DIR__ . '/../model/Kategori.php';

class KategoriController {
    private $kategoriModel; // Ubah nama property

    public function __construct() {
        $this->kategoriModel = new KategoriModel(); // Gunakan KategoriModel
    }

    private function safeRedirect($url) {
        // ... kode tetap ...
    }

    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
           
        }

        $data = $this->kategoriModel->getAll(); // Gunakan kategoriModel

        $_SESSION['kategori_data'] = $data;

        include __DIR__ . '/../page/admin/admin-page/view_genre.php';
        exit();
    }

    public function create() {
        include __DIR__ . '/../page/admin/admin-page/input_genre.php';
        exit();
    }

    public function store() {
        if (!empty($_POST['nama_kategori'])) {
            $nama = trim($_POST['nama_kategori']);
            $this->kategoriModel->store($nama); // Gunakan kategoriModel

            $this->safeRedirect('/KATALOG/route/admin.php?page=kategori&action=index');
        } else {
            $this->safeRedirect('/KATALOG/route/admin.php?page=kategori&action=create&error=1');
        }
    }
}
?>