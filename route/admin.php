<?php
// webreebok/route/admin.php

// Mulai output buffering di awal
ob_start();

require_once(__DIR__ . '/../config/Database.php');
require_once(__DIR__ . '/../model/Kategori.php');
require_once(__DIR__ . '/../controller/KategoriController.php');

$page   = $_GET['page']   ?? 'dashboard';
$action = $_GET['action'] ?? 'index';

$kategoriController = new KategoriController();

switch ($page) {
    case 'dashboard':
        include __DIR__ . '/../page/admin/isi.php';
        break;

    case 'kategori':
    case 'genre': // Tambahkan ini untuk handle parameter genre
        switch ($action) {
            case 'index':
                $kategoriController->index();
                break;

            case 'create':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $kategoriController->store();
                } else {
                    $kategoriController->create();
                }
                break;

            default:
                echo "Action tidak ditemukan";
                break;
        }
        break;

    default:
        echo "Halaman tidak ditemukan";
        break;
}

// Hapus output buffer dan tampilkan
ob_end_flush();
?>