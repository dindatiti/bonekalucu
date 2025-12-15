<?php
// Mulai session jika belum dimulai
if (session_status() === PHP_SESSION_NONE) {
    
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        
        .btn:hover {
            background-color: #45a049;
        }
        
        .btn-danger {
            background-color: #f44336;
        }
        
        .btn-danger:hover {
            background-color: #da190b;
        }
        
        .btn-back {
            background-color: #008CBA;
            margin-top: 20px;
        }
        
        .btn-back:hover {
            background-color: #0077a3;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        th {
            background-color: #f2f2f2;
            padding: 12px;
            text-align: left;
            border-bottom: 2px solid #ddd;
            font-weight: bold;
        }
        
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        
        tr:hover {
            background-color: #f5f5f5;
        }
        
        .empty-message {
            padding: 20px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            text-align: center;
            color: #6c757d;
        }
        
        .action-link {
            color: #f44336;
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #f44336;
            border-radius: 3px;
            font-size: 14px;
        }
        
        .action-link:hover {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>📋 Daftar Kategori</h2>
        
        <a href="?page=kategori&action=create" class="btn">➕ Tambah Kategori Baru</a>
        
        <?php 
        // Ambil data dari session
        $data = [];
        if (isset($_SESSION['kategori_data'])) {
            $data = $_SESSION['kategori_data'];
            unset($_SESSION['kategori_data']);
        }
        ?>
        
        <?php if (empty($data)): ?>
            <div class="empty-message">
                <p>📭 Tidak ada data kategori. Silakan tambahkan kategori baru.</p>
            </div>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th width="50">ID</th>
                        <th>Nama Kategori</th>
                        <th width="100">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?= isset($row['id']) ? htmlspecialchars($row['id']) : ''; ?></td>
                        <td><?= isset($row['nama_kategori']) ? htmlspecialchars($row['nama_kategori']) : ''; ?></td>
                        <td>
                            <?php if (isset($row['id'])): ?>
                            <a href="?page=kategori&action=delete&id=<?= $row['id']; ?>" 
                               class="action-link"
                               onclick="return confirm('Apakah Anda yakin ingin menghapus kategori \"<?= isset($row['nama_kategori']) ? addslashes($row['nama_kategori']) : ''; ?>\"?')">
                               🗑️ Hapus
                            </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        
        <br>
        <a href="?page=dashboard" class="btn btn-back">← Kembali ke Dashboard</a>
    </div>
    
    <script>
        // Konfirmasi sebelum hapus
        function confirmDelete(id, name) {
            return confirm("Apakah Anda yakin ingin menghapus kategori \"" + name + "\"?");
        }
    </script>
</body>
</html>