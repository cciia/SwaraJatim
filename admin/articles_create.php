<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $city_id = $_POST['city_id'];
    $culture_type_id = $_POST['culture_type_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $image = null;
    if (!empty($_FILES['image']['name'])) {
        $targetDir = "../uploads/";
        $fileName = time() . "_" . basename($_FILES["image"]["name"]);
        $targetFile = $targetDir . $fileName;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $image = $fileName;
        }
    }

    $stmt = $koneksi->prepare("INSERT INTO articles (city_id, culture_type_id, title, content, image) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iisss", $city_id, $culture_type_id, $title, $content, $image);
    $stmt->execute();

    echo "<script>alert('Artikel berhasil ditambahkan!'); window.location='dashboard.php?section=articles';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Artikel</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #F5CCA0 0%, #e8b88a 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h2 {
            font-size: 28px;
            font-weight: 600;
            margin: 0;
        }
        .form-container {
            padding: 40px;
        }
        .form-group {
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #555;
            font-size: 14px;
        }
        input[type="text"],
        select,
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e1e5e9;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
            background-color: #fff;
        }
        input[type="text"]:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #F5CCA0;
            box-shadow: 0 0 0 3px rgba(245, 204, 160, 0.1);
        }
        select {
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 12px center;
            background-repeat: no-repeat;
            background-size: 16px;
            padding-right: 40px;
            appearance: none;
        }
        textarea {
            resize: vertical;
            min-height: 120px;
            font-family: inherit;
        }
        .image-preview {
            margin: 10px 0;
            text-align: center;
        }
        .image-preview img {
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            max-width: 200px;
            height: auto;
        }
        .file-input-wrapper {
            position: relative;
            display: inline-block;
            width: 100%;
        }
        input[type="file"] {
            padding: 12px;
            border: 2px dashed #e1e5e9;
            background-color: #f8f9fa;
            cursor: pointer;
        }
        input[type="file"]:hover {
            border-color: #F5CCA0;
            background-color: rgba(245, 204, 160, 0.05);
        }
        .submit-btn {
            background: linear-gradient(135deg, #F5CCA0 0%, #e8b88a 100%);
            color: white;
            padding: 14px 32px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 20px;
        }
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(245, 204, 160, 0.4);
        }
        .submit-btn:active {
            transform: translateY(0);
        }
        @media (max-width: 768px) {
            body { padding: 10px; }
            .form-container { padding: 20px; }
            .header { padding: 20px; }
            .header h2 { font-size: 24px; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Tambah Artikel Baru</h2>
        </div>
        <div class="form-container">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="city_id">Kota</label>
                    <select name="city_id" required>
                        <option value="">Pilih Kota</option>
                        <?php
                        $cities = mysqli_query($koneksi, "SELECT * FROM cities ORDER BY name ASC");
                        while ($c = mysqli_fetch_assoc($cities)) {
                            echo "<option value='{$c['id']}'>{$c['name']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="culture_type_id">Tipe Budaya</label>
                    <select name="culture_type_id" required>
                        <option value="">Pilih Tipe Budaya</option>
                        <?php
                        $types = mysqli_query($koneksi, "SELECT * FROM culture_types ORDER BY name ASC");
                        while ($t = mysqli_fetch_assoc($types)) {
                            echo "<option value='{$t['id']}'>{$t['name']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" name="title" required>
                </div>

                <div class="form-group">
                    <label for="content">Konten</label>
                    <textarea name="content" required></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Gambar</label>
                    <input type="file" name="image" accept="image/*">
                </div>

                <button type="submit" class="submit-btn">Simpan Artikel</button>
            </form>
        </div>
    </div>
</body>
</html>