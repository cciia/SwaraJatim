<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swara Jatim - Dari Jawa Timur, Untuk Nusantara</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Georgia', serif;
            background-color: #FFEAC5;
            color: #333;
            line-height: 1.6;
        }

        /* Header */
        .header {
            background-color: #FFEAC5; /* cream */
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            transition: background-color 0.5s, color 0.5s; /* biar smooth */
        }

        .header .logo,
        .header .nav-menu a {
            color: black;
            transition: color 0.5s; /* biar font juga smooth */
        }

        /* Header setelah di-scroll */
        .header.scrolled {
            background-color: rgba(223, 205, 172, 0.93); /* cream tapi agak gelap */
        }

        .header.scrolled .logo,
        .header.scrolled .nav-menu a {
            color: black; /* tetap hitam biar kontras */
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

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-menu a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
        }

        .nav-menu a:hover {
            color: #f5f1e8;
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            background: linear-gradient(rgba(0,0,0,0.3), rgba(105, 105, 105, 0.3)), url('../images/background.jpeg') no-repeat center center/cover;
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
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            color: #000000;
        }

        .hero-content p {
            font-size: 2.5rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }

        /* Section Styles */
        .section {
            padding: 4rem 0;
            max-width: 1200px;
            margin: 0 auto;
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            color: #8b4513;
            margin-bottom: 3rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Gallery Section */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .gallery-card {
            position: relative;
            overflow: hidden;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            display: flex;              /* aktifin flexbox */
            justify-content: center;    /* center horizontal */
            align-items: center;
        }

        .gallery-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            display: block;
            border-radius: 16px;
        }

        .gallery-card .gallery-title {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff; /* biar kontras */
            font-size: 2.2rem;
            font-weight: bold;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.6);
            margin: 0;
            width: 100%;
            text-align: center;
        }

        /* AI Assistant Section */
        .ai-assistant {
            background: #8b4513;
            color: white;
            padding: 3rem;
            border-radius: 15px;
            margin: 4rem 0;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            align-items: center;
        }

        .ai-content h3 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }

        .ai-content p {
            margin-bottom: 1rem;
            line-height: 1.8;
        }

        .ai-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .ai-btn {
            background: rgba(255,255,255,0.2);
            color: white;
            border: 1px solid white;
            padding: 0.8rem 1.5rem;
            border-radius: 25px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .ai-btn:hover {
            background: rgba(255,255,255,0.3);
        }

        .chat-interface {
            background: white;
            border-radius: 10px;
            padding: 1rem;
            height: 300px;
            display: flex;
            flex-direction: column;
        }

        .chat-header {
            background: #4a90e2;
            color: white;
            padding: 0.5rem;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 1rem;
        }

        .chat-input {
            margin-top: auto;
            display: flex;
            gap: 0.5rem;
        }

        .chat-input input {
            flex: 1;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .chat-input button {
            background: #4a90e2;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Container scroll horizontal untuk semua kategori */
        .section-scroll {
            display: flex;
            gap: 20px;
            overflow-x: auto; /* scroll horizontal */
            padding-bottom: 10px;
            scroll-behavior: smooth;
        }

        /* Hapus scrollbar default di beberapa browser */
        .section-scroll::-webkit-scrollbar {
            height: 8px;
        }
        .section-scroll::-webkit-scrollbar-thumb {
            background-color: rgba(0,0,0,0.2);
            border-radius: 4px;
        }

        /* Card universal untuk semua kategori */
        .section-card {
            flex: 0 0 auto; /* biar ukurannya tetap */
            width: 250px;
            border-radius: 16px;
            overflow: hidden;
            text-decoration: none;
            color: black;
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            transition: transform 0.3s;
        }

        .section-card:hover {
            transform: translateY(-5px);
        }

        .section-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .section-card h3 {
            padding: 10px;
            font-size: 1.1rem;
            text-align: center;
        }

        /* Article Cards */
        .artikel-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.artikel-card {
    background-color: #fff;
    border: 1px solid #d6a66f; /* border tipis */
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    display: flex;
    flex-direction: column;
    transition: transform 0.3s;
}

.artikel-card:hover {
    transform: translateY(-5px);
}

.artikel-card img {
    width: 100%;
    height: 160px;
    object-fit: cover;
}

.artikel-title {
    font-size: 1.1rem;
    font-weight: bold;
    margin: 10px;
}

.artikel-summary {
    font-size: 0.95rem;
    color: #555;
    margin: 0 10px 10px;
    flex-grow: 1;
}

.artikel-date {
    font-size: 0.85rem;
    color: #999;
    margin: 0 10px 10px;
}

.btn-lihat {
    display: inline-block;
    margin: 10px;
    padding: 6px 12px;
    background-color: #d6783c;
    color: white;
    text-decoration: none;
    border-radius: 6px;
    text-align: center;
}

.btn-lihat:hover {
    background-color: #b55a1e;
}

        /* Footer */
        .footer {
            background: #2c1810;
            color: white;
            padding: 3rem 0 1rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .footer-section h4 {
            color: #f5f1e8;
            margin-bottom: 1rem;
        }

        .footer-section p, .footer-section a {
            color: #ccc;
            text-decoration: none;
            margin-bottom: 0.5rem;
            display: block;
        }

        .footer-section a:hover {
            color: white;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-links a {
            background: #8b4513;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: background 0.3s;
        }

        .social-links a:hover {
            background: #a0522d;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid #444;
            margin-top: 2rem;
            color: #999;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }

            .hero-content p {
                font-size: 1.2rem;
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
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="nav-container">
            <div class="logo">Swara Jatim</div>
            <nav>
                <ul class="nav-menu">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#galeri">Galeri</a></li>
                    <li><a href="#ai-assistant">Gemini</a></li>
                    <li><a href="#artikel">Artikel</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-content">
            <h1>Swara Jatim</h1>
            <p>Dari Jawa Timur, Untuk Nusantara</p>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="galeri" class="section">
        <h2 class="section-title">Galeri</h2>
        <div class="gallery-grid">
            <?php
            include "../koneksi.php";

            // mapping kategori -> judul custom
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
                    <a href="kategori.php?id=<?php echo $cat_id; ?>" class="gallery-link">
                    <div class="gallery-card">
                        <img src="../uplouds/<?php echo $row['image']; ?>" alt="<?php echo $judul_custom; ?>">
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

    <!-- AI Assistant Section -->
    <section id="ai-assistant" class="section">
        <div class="ai-assistant">
            <div class="ai-content">
                <h3>AI Cultural Assistant</h3>
                <p>Jelajahi budaya Jawa Timur dengan bantuan AI Cultural Assistant. Cukup tanyakan atau kirimkan minuman, dan dapatkan cerdas ini akan memberikan informasi, cerita, dan rekomendasi seputar seni, tradisi, dan budaya lokal.</p>
                <div class="ai-buttons">
                    <button class="ai-btn">Menggali Budaya</button>
                    <button class="ai-btn">Menghubungkan Generasi</button>
                </div>
            </div>
            <div class="chat-interface">
                <div class="chat-header">🤖 Swara Jatim</div>
                <div style="flex: 1; background: #f9f9f9; border-radius: 5px; margin-bottom: 1rem;"></div>
                <div class="chat-input">
                    <input type="text" placeholder="Ketik pesan...">
                    <button>📎</button>
                    <button>➤</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Kuliner Section -->
    <?php
        include "../koneksi.php";

        // daftar kategori
        $kategori = [
            2 => "Kuliner",
            3 => "Pakaian",
            4 => "Tradisi"
        ];

        foreach ($kategori as $cat_id => $nama_kategori) {
        ?>
            <section id="<?php echo strtolower($nama_kategori); ?>" class="section">
                <h2 class="section-title"><?php echo $nama_kategori; ?></h2>
                <div class="section-scroll">
                    <?php
                    $sql = "SELECT * FROM articles 
                            WHERE culture_type_id = $cat_id 
                            ORDER BY id DESC";
                    $result = mysqli_query($koneksi, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <a href="artikel.php?id=<?php echo $row['id']; ?>" class="section-card">
                            <img src="../uplouds/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
                            <h3><?php echo $row['title']; ?></h3>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </section>
        <?php
        }
        ?>

    <!-- Artikel Budaya Section -->
    <section id="artikel" class="section" style="background-color:#FFEAC5; padding:40px 20px;">
        <h2 class="section-title">Artikel Budaya</h2>
        <div class="artikel-grid">
            <?php
            include "../koneksi.php";

            $sql = "SELECT * FROM articles ORDER BY id DESC";
            $result = mysqli_query($koneksi, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="artikel-card">
                    <img src="../uplouds/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
                    <h3 class="artikel-title"><?php echo $row['title']; ?></h3>
                    <p class="artikel-summary"><?php echo substr($row['content'],0,120); ?>...</p>
                    <p class="artikel-date"><?php echo $row['created_at']; ?></p>
                    <a href="artikel.php?id=<?php echo $row['id']; ?>" class="btn-lihat">Lihat</a>
                </div>
            <?php
            }
            ?>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h4>Swara Jatim</h4>
                <p>Portal Budaya & Berita Jawa Timur</p>
                <p>Melestarikan dan mempromosikan kekayaan budaya Jawa Timur melalui platform digital yang informatif dan edukatif untuk generasi mendatang.</p>
            </div>
            <div class="footer-section">
                <h4>Navigasi Cepat</h4>
                <a href="#home">Beranda</a>
                <a href="#galeri">Galeri</a>
                <a href="#artikel">Artikel</a>
                <a href="#gemini">AI Assistant</a>
                <a href="#kontak">Kontak</a>
            </div>
            <div class="footer-section">
                <h4>Galeri Budaya</h4>
                <a href="#">Galeri Makanan</a>
                <a href="#">Galeri Pakaian</a>
                <a href="#">Galeri Tradisi</a>
                <a href="#">Galeri Makanan</a>
            </div>
            <div class="footer-section">
                <h4>Media Sosial</h4>
                <div class="social-links">
                    <a href="#" title="Facebook">f</a>
                    <a href="#" title="Twitter">t</a>
                    <a href="#" title="Instagram">i</a>
                    <a href="#" title="YouTube">y</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Swara Jatim Tiga Cahya Diksaland</p>
        </div>
    </footer>
    <script>
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>