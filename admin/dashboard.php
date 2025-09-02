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
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, sans-serif;
            display: flex;
            height: 100vh;
            background: #FFEAC5;
        }
        
        .sidebar {
            width: 220px;
            background: #603F26;
            color: #FFEAC5;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 20px;
            border-bottom: 2px solid #FFDBB5;
            padding-bottom: 10px;
        }
        .sidebar a {
            color: #FFEAC5;
            text-decoration: none;
            margin: 12px 0;
            padding: 10px;
            border-radius: 8px;
            transition: 0.3s;
            display: block;
        }
        .sidebar a:hover {
            background: #6C4E31;
            color: #FFDBB5;
        }

        .content {
            flex: 1;
            padding: 30px;
            background: #FFEAC5;
            overflow-y: auto;
        }
        .cards {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }
        .card {
            background: #FFDBB5;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(96, 63, 38, 0.25);
            padding: 30px;
            width: 220px;
            text-align: center;
            transition: 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(96, 63, 38, 0.35);
        }
        .card h2 {
            font-size: 36px;
            margin: 0;
            color: #603F26;
        }
        .card p {
            font-size: 16px;
            color: #6C4E31;
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="dashboard.php">Dashboard</a>
        <a href="articles_index.php">Articles</a>
        <a href="cities_index.php">Cities</a>
        <a href="culture_index.php">Culture Types</a>
    </div>

    <div class="content">
        <h1 style="color:#603F26;">Dashboard Overview</h1>
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
</body>
</html>