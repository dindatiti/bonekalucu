<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori Baru</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        
        h2 {
            margin-bottom: 30px;
            color: #333;
            text-align: center;
        }
        
        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            padding: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        
        input[type="text"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            transition: border 0.3s;
        }
        
        input[type="text"]:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.3);
        }
        
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        
        .btn:hover {
            background-color: #45a049;
        }
        
        .btn-secondary {
            background-color: #6c757d;
            margin-left: 10px;
        }
        
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        
        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        
        .message {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            text-align: center;
        }
        
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>➕ Tambah Kategori Baru</h2>
        
        <div class="card">
            <?php if (isset($_GET['error'])): ?>
                <div class="message error">
                    ❌ Nama kategori tidak boleh kosong!
                </div>
            <?php endif; ?>
            
            <form method="POST" action="?page=kategori&action=create">
                <div class="form-group">
                    <label for="nama_kategori">Nama Kategori:</label>
                    <input type="text" 
                           id="nama_kategori" 
                           name="nama_kategori" 
                           placeholder="Masukkan nama kategori"
                           required
                           autofocus>
                </div>
                
                <div class="btn-container">
                    <button type="submit" class="btn">💾 Simpan Kategori</button>
                    <a href="?page=kategori&action=index" class="btn btn-secondary">← Kembali ke Daftar</a>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        // Validasi form
        document.querySelector('form').addEventListener('submit', function(e) {
            var input = document.getElementById('nama_kategori');
            if (input.value.trim() === '') {
                e.preventDefault();
                alert('Nama kategori tidak boleh kosong!');
                input.focus();
            }
        });
    </script>
</body>
</html>