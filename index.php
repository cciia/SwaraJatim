<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Swara Jatim - Dari Jawa Timur, Untuk Nusantara</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Georgia', serif;
            background-color: #f5f1e8;
            color: #333;
            line-height: 1.6;
            background-color: #FFEAC5;
        }

        /* Header */
        .header {
            background-color: rgba(139, 69, 19, 0.9);
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .header.scrolled {
            background-color: rgba(139, 69, 19, 0.95);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
        }

        .logo {
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .logo a {
            color: inherit;
            text-decoration: none;
            cursor: pointer;        
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
            align-items: center;
        }

        .nav-menu a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }

        .nav-menu a:hover {
            color: #f5f1e8;
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* Added search functionality in header */
        .search-container {
            position: relative;
            margin-left: 2rem;
        }

        .search-box {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 25px;
            padding: 0.5rem 1rem;
            color: white;
            width: 250px;
            transition: all 0.3s ease;
        }

        .search-box:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.5);
            width: 300px;
        }

        .search-box::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .search-btn {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            padding: 0.3rem;
            border-radius: 50%;
            transition: background 0.3s;
        }

        .search-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .search-results {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            max-height: 400px;
            overflow-y: auto;
            z-index: 1001;
            display: none;
        }

        .search-result-item {
            padding: 1rem;
            border-bottom: 1px solid #eee;
            cursor: pointer;
            transition: background 0.3s;
        }

        .search-result-item:hover {
            background: #f9f9f9;
        }

        .search-result-item:last-child {
            border-bottom: none;
        }

        .search-result-title {
            font-weight: bold;
            color: #8b4513;
            margin-bottom: 0.5rem;
        }

        .search-result-desc {
            color: #666;
            font-size: 0.9rem;
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('uploads/background.jpeg');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }

        .hero-content h1 {
            font-size: 4.5rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            color: #000000;
            animation: fadeInUp 1s ease-out;
        }

        .hero-content p {
            font-size: 3rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
            animation: fadeInUp 1s ease-out 0.3s both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Section Styles */
        .section {
            padding: 4rem 0;
            max-width: 1200px;
            margin: 0 auto;
            padding-left: 2rem;
            padding-right: 2rem;
            margin-bottom: 4rem;
        }

        .section-title {
            position: relative;
            text-align: center;
            font-size: 2.5rem;
            color: #994D1C;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 3rem 1rem;
            border-bottom: 3px solid #d2691e;
            padding-bottom: 1rem;
            background: linear-gradient(45deg, #994D1C, #d2691e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Gallery Section */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .gallery-card {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            display: flex;
            justify-content: center;
            align-items: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .gallery-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        .gallery-card img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            display: block;
            border-radius: 20px;
            transition: transform 0.3s ease;
        }

        .gallery-card:hover img {
            transform: scale(1.05);
        }

        .gallery-card .gallery-title {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            font-size: 2.2rem;
            font-weight: bold;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
            margin: 0;
            width: 100%;
            text-align: center;
            background: rgba(0, 0, 0, 0.3);
            padding: 1rem;
            border-radius: 10px;
        }

        /* AI Assistant Section */
        .ai-assistant {
            background: linear-gradient(135deg, #8b4513, #a0522d);
            color: white;
            padding: 3rem;
            border-radius: 20px;
            margin: 4rem 0;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            align-items: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .ai-content h3 {
            font-size: 2rem;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, #fff, #f5f1e8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .ai-content p {
            margin-bottom: 1rem;
            line-height: 1.8;
            font-size: 1.1rem;
        }

        .ai-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            flex-wrap: wrap;
        }

        .ai-btn {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 2px solid white;
            padding: 1rem 2rem;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .ai-btn:hover {
            background: white;
            color: #8b4513;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .chat-interface {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            height: 350px;
            display: flex;
            flex-direction: column;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .chat-interface:hover {
            transform: scale(1.02);
        }

        .chat-header {
            background: linear-gradient(135deg, #4a90e2, #357abd);
            color: white;
            padding: 1rem;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 1rem;
            font-weight: bold;
            font-size: 1.1rem;
        }

        .chat-input {
            margin-top: auto;
            display: flex;
            gap: 0.5rem;
        }

        .chat-input input {
            flex: 1;
            padding: 0.8rem;
            border: 2px solid #ddd;
            border-radius: 10px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .chat-input input:focus {
            outline: none;
            border-color: #4a90e2;
        }

        .chat-input button {
            background: #4a90e2;
            color: white;
            border: none;
            padding: 0.8rem 1rem;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.3s;
            font-size: 1.1rem;
        }

        .chat-input button:hover {
            background: #357abd;
        }

        /* Content Grid */
        .content-grid {
            display: flex;
            gap: 2rem;
            overflow-x: auto;
            padding: 15px;
            scroll-behavior: smooth;
        }

        .content-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            min-width: 280px;
            flex: 0 0 auto;
        }

        .content-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }

        .content-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .content-card:hover img {
            transform: scale(1.05);
        }

        .card-content {
            padding: 1.5rem;
        }

        .card-content h4 {
            color: #8b4513;
            margin-bottom: 0.8rem;
            font-size: 1.2rem;
            line-height: 1.4;
        }

        .card-content p {
            font-size: 1rem;
            color: #666;
            font-weight: 500;
        }

        /* Article Cards */
        .article-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2.5rem;
        }

        .article-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .article-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .article-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .article-card:hover img {
            transform: scale(1.05);
        }

        .article-content {
            padding: 2rem;
        }

        .article-content h4 {
            color: #8b4513;
            margin-bottom: 1rem;
            font-size: 1.3rem;
            line-height: 1.4;
        }

        .article-content p {
            color: #666;
            font-size: 1rem;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .read-more {
            background: linear-gradient(135deg, #8b4513, #a0522d);
            color: white;
            padding: 0.8rem 1.5rem;
            border-radius: 25px;
            text-decoration: none;
            font-size: 0.9rem;
            display: inline-block;
            transition: all 0.3s ease;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .read-more:hover {
            background: linear-gradient(135deg, #a0522d, #8b4513);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Added connection/contact section */
        .connection-section {
            background: linear-gradient(135deg, #2c1810, #3d2317);
            color: white;
            padding: 4rem 0;
            margin: 4rem 0;
        }

        .connection-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 3rem;
        }

        .connection-card {
            background: rgba(255, 255, 255, 0.1);
            padding: 2rem;
            border-radius: 15px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .connection-card:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-5px);
        }

        .connection-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            display: block;
        }

        .connection-card h4 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #f5f1e8;
        }

        .connection-card p {
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .connection-btn {
            background: #8b4513;
            color: white;
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            font-weight: bold;
        }

        .connection-btn:hover {
            background: #a0522d;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, #2c1810, #1a0f0a);
            color: white;
            padding: 4rem 0 1rem;
            margin-top: 0;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
        }

        .footer-section h4 {
            color: #f5f1e8;
            margin-bottom: 1.5rem;
            font-size: 1.3rem;
            border-bottom: 2px solid #8b4513;
            padding-bottom: 0.5rem;
        }

        .footer-section p,
        .footer-section a {
            color: #ccc;
            text-decoration: none;
            margin-bottom: 0.8rem;
            display: block;
            transition: color 0.3s ease;
            line-height: 1.6;
        }

        .footer-section a:hover {
            color: #f5f1e8;
            padding-left: 5px;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .social-links a {
            background: linear-gradient(135deg, #8b4513, #a0522d);
            color: white;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: bold;
        }

        .social-links a:hover {
            background: linear-gradient(135deg, #a0522d, #d2691e);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid #444;
            margin-top: 3rem;
            color: #999;
            font-size: 1rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }

            .hero-content p {
                font-size: 1.5rem;
            }

            .ai-assistant {
                grid-template-columns: 1fr;
            }

            .nav-menu {
                gap: 1rem;
            }

            .section {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .search-container {
                margin-left: 1rem;
            }

            .search-box {
                width: 200px;
            }

            .search-box:focus {
                width: 220px;
            }

            .nav-container {
                flex-wrap: wrap;
                gap: 1rem;
            }

            .connection-container {
                grid-template-columns: 1fr;
            }
        }

        /* Added smooth scrolling and loading animations */
        html {
            scroll-behavior: smooth;
        }

        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="nav-container">
            <div class="logo"><a href="index.php">Swara Jatim</a></div>
            <nav>
                <ul class="nav-menu">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#galeri">Galeri</a></li>
                    <li><a href="#ai-assistant">Swara Jatim AI</a></li>
                    <li><a href="#artikel">Artikel</a></li>
                    <li><a href="#koneksi">Koneksi</a></li>
                </ul>
            </nav>
            <div class="search-container">
                <input type="text" class="search-box" placeholder="Cari budaya, kuliner, tradisi..." id="searchInput">
                <button class="search-btn" onclick="performSearch()">
                <i class="fas fa-search"></i>
                </button>
                <div class="search-results" id="searchResults"></div>
            </div>
        </div>
    </header>

    <section id="home" class="hero">
        <div class="hero-content">
            <h1>Swara Jatim</h1>
            <p>Dari Jawa Timur, Untuk Nusantara</p>
        </div>
    </section>

    <section id="galeri" class="section fade-in">
        <h2 class="section-title">Galeri</h2>
        <div class="gallery-grid">
            <?php
            include "koneksi.php";
            $kategori = [
                2 => "Kuliner",
                3 => "Pakaian",
                4 => "Tradisi"
            ];

            foreach ($kategori as $cat_id => $judul_custom) {
                $sql = "SELECT * FROM articles 
                        WHERE culture_type_id = $cat_id 
                        ORDER BY id DESC 
                        LIMIT 1";
                $result = mysqli_query($koneksi, $sql);

                if ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <a href="galeri.php?id=<?php echo $cat_id; ?>" class="gallery-link">
                        <div class="gallery-card">
                            <img src="uploads/<?php echo $row['image']; ?>" alt="<?php echo $judul_custom; ?>">
                            <div class="overlay">
                                <h3 class="gallery-title"><?php echo 'Galeri ' . $judul_custom; ?></h3>
                            </div>
                        </div>
                    </a>
                    <?php
                }
            }
            ?>
        </div>
    </section>

    <section id="ai-assistant" class="section fade-in">
        <div class="ai-assistant">
            <div class="ai-content">
                <h3>AI Cultural Assistant</h3>
                <p>Jelajahi budaya Jawa Timur dengan bantuan AI Cultural Assistant. Cukup tanyakan atau kirimkan
                    minuman, dan dapatkan cerdas ini akan memberikan informasi, cerita, dan rekomendasi seputar seni,
                    tradisi, dan budaya lokal.</p>
                <div class="ai-buttons">
                    <button class="ai-btn" onclick="window.location.href='budaya-chatbot/index.php'">
                        Buka Chatbot Budaya
                    </button>
                    <button class="ai-btn" onclick="window.location.href='budaya-chatbot/index.php'">
                        Tanya AI Budaya
                    </button>
                </div>
            </div>
           <div class="chat-interface" onclick="window.location.href='budaya-chatbot/index.php'">
                <div class="chat-header">🤖 Swara Jatim AI</div>
                <div style="flex: 1; background: #f9f9f9; border-radius: 10px; margin-bottom: 1rem; display:flex; align-items:center; justify-content:center; color:#999; font-style: italic;">
                    Klik untuk memulai percakapan dengan AI Budaya
                </div>
                <div class="chat-input">
                    <input type="text" placeholder="Ketik pesan..." readonly>
                    <button disabled>📎</button>
                    <button disabled>➤</button>
                </div>
            </div>
        </div>
    </section>

    <section class="section fade-in">
        <h2 class="section-title">Kuliner</h2>
        <div class="content-grid">
            <?php
            include 'koneksi.php';
            $res = mysqli_query($koneksi, "
                SELECT a.*, c.name AS city_name 
                FROM articles a
                LEFT JOIN cities c ON a.city_id = c.id
                WHERE a.culture_type_id = 2
                ORDER BY a.created_at DESC
            ");

            while ($row = mysqli_fetch_assoc($res)) {
                echo "
                <div class='content-card'>
                    <img src='uploads/{$row['image']}' alt='{$row['title']}' height='200' width='280'>
                    <div class='card-content'>
                        <h4>{$row['title']}</h4>
                        <p>{$row['city_name']}</p>
                    </div>
                </div>
                ";
            }
            ?>
        </div>
    </section>

    <section class="section fade-in">
        <h2 class="section-title">Pakaian dan Batik</h2>
        <div class="content-grid">
            <?php
            include 'koneksi.php';
            $res = mysqli_query($koneksi, "
                SELECT a.*, c.name AS city_name 
                FROM articles a
                LEFT JOIN cities c ON a.city_id = c.id
                WHERE a.culture_type_id = 3
                ORDER BY a.created_at DESC
            ");

            while ($row = mysqli_fetch_assoc($res)) {
                echo "
                <div class='content-card'>
                    <img src='uploads/{$row['image']}' alt='{$row['title']}' height='200' width='280'>
                    <div class='card-content'>
                        <h4>{$row['title']}</h4>
                        <p>{$row['city_name']}</p>
                    </div>
                </div>
                ";
            }
            ?>
        </div>
    </section>

    <section class="section fade-in">
        <h2 class="section-title">Tradisi</h2>
        <div class="content-grid">
            <?php
            include 'koneksi.php';
            $res = mysqli_query($koneksi, "
                SELECT a.*, c.name AS city_name 
                FROM articles a
                LEFT JOIN cities c ON a.city_id = c.id
                WHERE a.culture_type_id = 4
                ORDER BY a.created_at DESC
            ");

            while ($row = mysqli_fetch_assoc($res)) {
                echo "
                <div class='content-card'>
                    <img src='uploads/{$row['image']}' alt='{$row['title']}' height='200' width='280'>
                    <div class='card-content'>
                        <h4>{$row['title']}</h4>
                        <p>{$row['city_name']}</p>
                    </div>
                </div>
                ";
            }
            ?>
        </div>
    </section>

    <section id="artikel" class="section fade-in">
        <h2 class="section-title">Artikel</h2>
        <div class="article-grid">
            <article class="article-card">
                <img src="https://akcdn.detik.net.id/community/media/visual/2023/06/24/atraksi-reog-ponorogo-di-bulan-bung-karno-2023_169.jpeg?w=700&q=90"
                    alt="Budaya Jawa Timur">
                <div class="article-content">
                    <h4>6 Budaya Jawa Timur yang Tradisi Unik dan Menarik untuk Dikunjungi Dunia</h4>
                    <p>Jawa Timur memiliki kekayaan budaya yang sangat beragam, mulai dari tarian tradisional hingga
                        kuliner khas yang menggugah selera...</p>
                    <a href="https://www.detik.com/jatim/budaya/d-7000628/6-budaya-dan-tradisi-jawa-timur-yang-dikagumi-dunia"
                        target="_blank" class="read-more">Baca Selengkapnya</a>
                </div>
            </article>
            <article class="article-card">
                <img src="https://ik.imagekit.io/tvlk/blog/2024/07/shutterstock_693386485.jpg?tr=q-70,c-at_max,w-500,h-250,dpr-2"
                    alt="Wisata Tradisional">
                <div class="article-content">
                    <h4>10 Tradisi Jawa Timur, Wisata Budaya yang Wajib Dikunjungi Tidak Boleh Dilewatkan</h4>
                    <p>Destinasi wisata budaya di Jawa Timur menawarkan pengalaman yang tak terlupakan dengan berbagai
                        tradisi yang masih lestari...</p>
                    <a href="https://www.traveloka.com/id-id/explore/destination/tradisi-jawa-timur-acc/386150"
                        target="_blank" class="read-more">Baca Selengkapnya</a>
                </div>
            </article>
            <article class="article-card">
                <img src="https://storage.nu.or.id/storage/post/16_9/mid/image-5_1733573868.webp"
                    alt="Pelestarian Budaya">
                <div class="article-content">
                    <h4>Memahami Kepentingan Melestarikan Adat Jawa Timur untuk Generasi Masa Depan</h4>
                    <p>Pelestarian budaya Jawa Timur menjadi tanggung jawab bersama untuk memastikan warisan leluhur
                        tetap hidup di era modern...</p>
                    <a href="https://jatim.nu.or.id/opini/pendidikan-melalui-budaya-jawa-merawat-warisan-luhur-untuk-generasi-emas-PDYm7"
                        target="_blank" class="read-more">Baca Selengkapnya</a>
                </div>
            </article>
            <article class="article-card">
                <img src="https://akcdn.detik.net.id/community/media/visual/2016/11/18/8c911676-edbd-4db1-8e98-383335a96640_169.jpg?w=700&q=90"
                    alt="Kearifan Lokal">
                <div class="article-content">
                    <h4>Contoh Kearifan Lokal di Jawa Timur dalam Tradisi dan Kuliner</h4>
                    <p>Kearifan lokal Jawa Timur tercermin dalam berbagai aspek kehidupan, mulai dari sistem pertanian
                        hingga filosofi hidup...</p>
                    <a href="https://www.detik.com/jatim/kuliner/d-7322091/10-kuliner-jawa-timur-jadi-warisan-budaya-takbenda"
                        target="_blank" class="read-more">Baca Selengkapnya</a>
                </div>
            </article>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h4>Swara Jatim</h4>
                <p>Portal Budaya & Berita Jawa Timur</p>
                <p>Melestarikan dan mempromosikan kekayaan budaya Jawa Timur melalui platform digital yang informatif
                    dan edukatif untuk generasi mendatang.</p>
            </div>
            <div class="footer-section">
                <h4>Navigasi Cepat</h4>
                <a href="#home">Beranda</a>
                <a href="#galeri">Galeri</a>
                <a href="#artikel">Artikel</a>
                <a href="#ai-assistant">Swara Jatim AI</a>
                <a href="#koneksi">Koneksi</a>
            </div>
            <div class="footer-section">
                <h4>Galeri Budaya</h4>
                <a href="#">Kuliner</a>
                <a href="#">Pakaian & Batik</a>
                <a href="#">Kesenian</a>
                <a href="#">Tradisi</a>
            </div>
            <div class="footer-section">
                <h4>Hubungi Kami</h4>
                <p>Email: info@swarajatim.com</p>
                <p>Telepon: (031) 123-4567</p>
                <p>WhatsApp: +62 812-3456-7890</p>
                <div class="social-links">
                    <a href="#" title="Facebook">f</a>
                    <a href="#" title="Twitter">t</a>
                    <a href="#" title="Instagram">i</a>
                    <a href="#" title="YouTube">y</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Swara Jatim. Semua hak cipta dilindungi.</p>
        </div>
    </footer>

    <script>
        window.addEventListener('scroll', function () {
            const header = document.querySelector('.header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        const searchData = [
            { title: 'Kuliner Jawa Timur', desc: 'Temukan berbagai makanan khas Jawa Timur seperti rawon, rujak cingur, dan lontong balap', url: '#kuliner' },
            { title: 'Batik dan Pakaian Tradisional', desc: 'Jelajahi keindahan batik Madura, lurik, dan pakaian adat Jawa Timur', url: '#pakaian' },
            { title: 'Tradisi dan Upacara Adat', desc: 'Pelajari berbagai tradisi seperti Reog Ponorogo, Kerapan Sapi, dan upacara adat lainnya', url: '#tradisi' },
            { title: 'AI Cultural Assistant', desc: 'Gunakan AI untuk mempelajari budaya Jawa Timur dengan cara yang interaktif', url: '#ai-assistant' },
            { title: 'Galeri Budaya', desc: 'Lihat koleksi foto dan dokumentasi budaya Jawa Timur', url: '#galeri' },
            { title: 'Artikel Budaya', desc: 'Baca artikel mendalam tentang sejarah dan perkembangan budaya Jawa Timur', url: '#artikel' }
        ];

        function performSearch() {
            const searchInput = document.getElementById('searchInput');
            const searchResults = document.getElementById('searchResults');
            const query = searchInput.value.toLowerCase().trim();

            if (query.length === 0) {
                searchResults.style.display = 'none';
                return;
            }

            const filteredResults = searchData.filter(item => 
                item.title.toLowerCase().includes(query) || 
                item.desc.toLowerCase().includes(query)
            );

            if (filteredResults.length > 0) {
                searchResults.innerHTML = filteredResults.map(item => `
                    <div class="search-result-item" onclick="navigateToResult('${item.url}')">
                        <div class="search-result-title">${item.title}</div>
                        <div class="search-result-desc">${item.desc}</div>
                    </div>
                `).join('');
                searchResults.style.display = 'block';
            } else {
                searchResults.innerHTML = `
                    <div class="search-result-item">
                        <div class="search-result-title">Tidak ditemukan</div>
                        <div class="search-result-desc">Coba kata kunci lain seperti "kuliner", "batik", atau "tradisi"</div>
                    </div>
                `;
                searchResults.style.display = 'block';
            }
        }

        function navigateToResult(url) {
            document.getElementById('searchResults').style.display = 'none';
            document.getElementById('searchInput').value = '';
            
            if (url.startsWith('#')) {
                document.querySelector(url).scrollIntoView({ behavior: 'smooth' });
            } else {
                window.location.href = url;
            }
        }

        document.getElementById('searchInput').addEventListener('input', performSearch);
        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                performSearch();
            }
        });

        document.addEventListener('click', function(e) {
            const searchContainer = document.querySelector('.search-container');
            if (!searchContainer.contains(e.target)) {
                document.getElementById('searchResults').style.display = 'none';
            }
        });

        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });


        window.addEventListener('load', function() {
            document.body.style.opacity = '1';
            document.querySelectorAll('.fade-in').forEach((el, index) => {
                setTimeout(() => {
                    el.classList.add('visible');
                }, index * 200);
            });
        });
    </script>
</body>

</html>