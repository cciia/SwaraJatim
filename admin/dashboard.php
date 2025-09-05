<?php
include '../koneksi.php';

$articles = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM articles"));
$cities = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM cities"));
$cultures = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM culture_types"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #f8fafc;
            color: #334155;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: linear-gradient(135deg, #F5CCA0, #E6B88A);
            padding: 20px 0;
            z-index: 1000;
        }

        .sidebar h2 {
            color: #5D4E37;
            text-align: center;
            margin-bottom: 40px;
            font-size: 24px;
            font-weight: 600;
            padding: 0 20px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            color: #5D4E37;
            text-decoration: none;
            padding: 15px 25px;
            margin: 5px 15px;
            border-radius: 8px;
            transition: all 0.3s ease;
            cursor: pointer;
            font-weight: 500;
        }

        .sidebar a:hover {
            background-color: rgba(93, 78, 55, 0.1);
            color: #3D2E1F;
            transform: translateX(5px);
        }

        .sidebar a svg {
            width: 20px;
            height: 20px;
            margin-right: 12px;
            fill: currentColor;
            flex-shrink: 0; /* Added flex-shrink to prevent icon expansion */
        }

        .content {
            margin-left: 250px;
            padding: 30px;
            min-height: 100vh;
        }

        .section {
            display: none;
        }

        .section.active {
            display: block;
        }

        .section h1 {
            font-size: 32px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 8px;
        }

        .section p {
            color: #64748b;
            margin-bottom: 30px;
            font-size: 16px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border: 1px solid #e2e8f0;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .card:nth-child(1) {
            border-left: 4px solid #3b82f6;
        }

        .card:nth-child(2) {
            border-left: 4px solid #10b981;
        }

        .card:nth-child(3) {
            border-left: 4px solid #f59e0b;
        }

        .card h2 {
            font-size: 36px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 8px;
        }

        .card p {
            color: #64748b;
            font-size: 14px;
            font-weight: 500;
            margin: 0;
        }

        .btn {
            background: linear-gradient(135deg, #F5CCA0, #E6B88A);
            color: #5D4E37;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 20px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(245, 204, 160, 0.3);
        }

        table {
            width: 100%;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border: 1px solid #e2e8f0;
            border-collapse: separate;
            border-spacing: 0;
        }

        table th {
            background-color: #f8fafc;
            padding: 16px;
            text-align: left;
            font-weight: 600;
            color: #374151;
            border-bottom: 1px solid #e2e8f0;
            font-size: 14px;
            white-space: nowrap;
        }

        table td {
            padding: 16px;
            border-bottom: 1px solid #f1f5f9;
            color: #4b5563;
            vertical-align: middle;
        }

        table tr:hover {
            background-color: #f8fafc;
        }

        table tr:last-child td {
            border-bottom: none;
        }

        table img {
            border-radius: 6px;
            object-fit: cover;
            display: block;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .btn-edit {
            background-color: #3b82f6;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            white-space: nowrap;
        }

        .btn-edit:hover {
            background-color: #2563eb;
            transform: translateY(-1px);
        }

        .btn-del {
            background-color: #ef4444;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            white-space: nowrap;
        }

        .btn-del:hover {
            background-color: #dc2626;
            transform: translateY(-1px);
        }

        .table-container {
            overflow-x: auto;
            border-radius: 12px;
        }

        .filter-form {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border: 1px solid #e2e8f0;
            margin-bottom: 20px;
            display: flex;
            gap: 15px;
            align-items: center;
            flex-wrap: wrap;
        }

        .filter-form select,
        .filter-form input[type="text"] {
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            color: #374151;
            background-color: white;
            transition: all 0.2s ease;
            min-width: 150px;
        }

        .filter-form select:focus,
        .filter-form input[type="text"]:focus {
            outline: none;
            border-color: #F5CCA0;
            box-shadow: 0 0 0 3px rgba(245, 204, 160, 0.1);
        }

        .filter-form input[type="text"] {
            min-width: 200px;
        }

        .filter-form button {
            background: linear-gradient(135deg, #F5CCA0, #E6B88A);
            color: #5D4E37;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .filter-form button:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(245, 204, 160, 0.3);
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .content {
                margin-left: 0;
                padding: 20px;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .section h1 {
                font-size: 24px;
            }

            table {
                font-size: 14px;
            }

            table th,
            table td {
                padding: 12px 8px;
            }

            .action-buttons {
                flex-direction: column;
                gap: 4px;
            }

            .filter-form {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-form select,
            .filter-form input[type="text"] {
                min-width: 100%;
            }
        }

        .card {
            animation: fadeInUp 0.6s ease forwards;
        }

        .card:nth-child(2) {
            animation-delay: 0.1s;
        }

        .card:nth-child(3) {
            animation-delay: 0.2s;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Swara Jatim</h2>
        <a onclick="showSection('dashboard')">
            <svg viewBox="0 0 24 24">
                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
            </svg>
            Dashboard
        </a>
        <a onclick="showSection('articles')">
            <svg viewBox="0 0 24 24">
                <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
            </svg>
            Articles
        </a>
        <a onclick="showSection('cities')">
            <svg viewBox="0 0 24 24">
                <path d="M15,11V5L12,2L9,5V7H7V11H9V17H7V21H17V17H15V11M11,11V7H13V11H15V15H9V11H11M11,17V19H13V17H11Z"/>
            </svg>
            Cities
        </a>
        <a onclick="showSection('culture')">
            <svg viewBox="0 0 24 24">
                <path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4M12,6A6,6 0 0,0 6,12A6,6 0 0,0 12,18A6,6 0 0,0 18,12A6,6 0 0,0 12,6M12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8Z"/>
            </svg>
            Culture Types
        </a>
    </div>

    <div class="content">
        <div id="dashboard" class="section active">
            <h1>Dashboard</h1>
            <p>Halo Selamat Datang Di Halaman Admin!</p>
            <div class="cards">
                <div class="card">
                    <h2><?= $articles; ?></h2>
                    <p>Articles</p>
                </div>
                <div class="card">
                    <h2><?= $cities; ?></h2>
                    <p>Cities</p>
                </div>
                <div class="card">
                    <h2><?= $cultures; ?></h2>
                    <p>Culture Types</p>
                </div>
            </div>
        </div>

        <div id="articles" class="section">
            <h1>Articles</h1>
            <a href="articles_create.php" class="btn">Tambah Artikel</a>
            <form method="GET" action="" class="filter-form">
                <input type="hidden" name="section" value="articles">

                <select name="city_id">
                    <option value="">Semua Kota</option>
                    <?php
                    $citiesRes = mysqli_query($koneksi, "SELECT * FROM cities ORDER BY name ASC");
                    while ($city = mysqli_fetch_assoc($citiesRes)) {
                        $selected = (isset($_GET['city_id']) && $_GET['city_id'] == $city['id']) ? "selected" : "";
                        echo "<option value='{$city['id']}' $selected>{$city['name']}</option>";
                    }
                    ?>
                </select>

                <select name="culture_type_id">
                    <option value="">Semua Tipe Budaya</option>
                    <?php
                    $cultureRes = mysqli_query($koneksi, "SELECT * FROM culture_types ORDER BY name ASC");
                    while ($ct = mysqli_fetch_assoc($cultureRes)) {
                        $selected = (isset($_GET['culture_type_id']) && $_GET['culture_type_id'] == $ct['id']) ? "selected" : "";
                        echo "<option value='{$ct['id']}' $selected>{$ct['name']}</option>";
                    }
                    ?>
                </select>

                <input type="text" name="search" placeholder="Cari judul/konten..."
                    value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">

                <button type="submit">Filter</button>
            </form>

            <div class="table-container">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Kota</th>
                        <th>Tipe Budaya</th>
                        <th>Judul</th>
                        <th>Konten</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $query = "
                        SELECT a.id, a.title, a.content, a.image, 
                            c.name AS city_name, 
                            ct.name AS culture_name
                        FROM articles a
                        LEFT JOIN cities c ON a.city_id = c.id
                        LEFT JOIN culture_types ct ON a.culture_type_id = ct.id
                        WHERE 1=1
                    ";

                    if (!empty($_GET['city_id'])) {
                        $city_id = (int) $_GET['city_id'];
                        $query .= " AND a.city_id = $city_id";
                    }

                    if (!empty($_GET['culture_type_id'])) {
                        $culture_id = (int) $_GET['culture_type_id'];
                        $query .= " AND a.culture_type_id = $culture_id";
                    }

                    if (!empty($_GET['search'])) {
                        $search = mysqli_real_escape_string($koneksi, $_GET['search']);
                        $query .= " AND (a.title LIKE '%$search%' OR a.content LIKE '%$search%')";
                    }

                    $query .= " ORDER BY a.id ASC";
                    $res = mysqli_query($koneksi, $query);

                    while ($row = mysqli_fetch_assoc($res)) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['city_name']}</td>
                                <td>{$row['culture_name']}</td>
                                <td>{$row['title']}</td>
                                <td>".substr($row['content'],0,50)."...</td>
                                <td><img src='../uploads/{$row['image']}' width='80'></td>
                                <td>
                                    <div class='action-buttons'>
                                        <a href='articles_edit.php?id={$row['id']}' class='btn-edit'>Edit</a>
                                        <a href='articles_delete.php?id={$row['id']}' class='btn-del' onclick=\"return confirm('Yakin hapus artikel ini?')\">Hapus</a>
                                    </div>
                                </td>
                            </tr>";
                    }
                    ?>
                </table>
            </div>
        </div>

        <div id="cities" class="section">
            <h1>Cities</h1>
            <div class="table-container">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Nama Kota</th>
                    </tr>
                    <?php
                    $res = mysqli_query($koneksi, "SELECT * FROM cities ORDER BY id ASC");
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['name']}</td>
                            </tr>";
                    }
                    ?>
                </table>
            </div>
        </div>

        <div id="culture" class="section">
            <h1>Culture Types</h1>
            <div class="table-container">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Nama Tipe</th>
                    </tr>
                    <?php
                    $res = mysqli_query($koneksi, "SELECT * FROM culture_types ORDER BY id ASC");
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['name']}</td>
                            </tr>";
                    }
                    ?>
                </table>
            </div>
        </div>

    </div>

    <script>
        function showSection(id) {
            document.querySelectorAll('.section').forEach(sec => {
                sec.classList.remove('active');
            });
            document.getElementById(id).classList.add('active');
        }

        const urlParams = new URLSearchParams(window.location.search);
        const section = urlParams.get('section');
        if (section) {
            showSection(section);
        }
    </script>
</body>
</html>