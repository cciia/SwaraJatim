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
            color: inherit;          /* Warna mengikuti parent (tetap putih) */
            text-decoration: none;   /* Hilangkan underline */
            cursor: pointer;        
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
        }

        .hero-content p {
            font-size: 3rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
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
            border-bottom: 2px solid #d2691e;
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
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            display: flex;
            /* aktifin flexbox */
            justify-content: center;
            /* center horizontal */
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
            color: #fff;
            /* biar kontras */
            font-size: 2.2rem;
            font-weight: bold;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6);
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
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 1px solid white;
            padding: 0.8rem 1.5rem;
            border-radius: 25px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .ai-btn:hover {
            background: rgba(255, 255, 255, 0.3);
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

        /* Content Grid */
        .content-grid {
            display: flex;
            gap: 1.5rem;
            overflow-x: auto;
            padding: 10px;
            scroll-behavior: smooth;
        }

        .content-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            min-width: 250px;
            flex: 0 0 auto;
        }

        .content-card:hover {
            transform: translateY(-5px);
        }

        .content-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .card-content {
            padding: 1rem;
        }

        .card-content h4 {
            color: #8b4513;
            margin-bottom: 0.5rem;
        }

        .card-content p {
            font-size: 0.9rem;
            color: #666;
        }

        /* Article Cards */
        .article-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
        }

        .article-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .article-card:hover {
            transform: translateY(-8px);
        }

        .article-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .article-content {
            padding: 1.5rem;
        }

        .article-content h4 {
            color: #8b4513;
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }

        .article-content p {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .read-more {
            background: #8b4513;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            text-decoration: none;
            font-size: 0.8rem;
            display: inline-block;
            transition: background 0.3s;
        }

        .read-more:hover {
            background: #a0522d;
        }

        /* Footer */
        .footer {
            background: #2c1810;
            color: white;
            padding: 3rem 0 1rem;
            margin-top: 0;
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

        .footer-section p,
        .footer-section a {
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
    <header class="header">
        <div class="nav-container">
            <div class="logo"><a href="index.php">Swara Jatim</a></div>
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

    <section id="home" class="hero">
        <div class="hero-content">
            <h1>Swara Jatim</h1>
            <p>Dari Jawa Timur, Untuk Nusantara</p>
        </div>
    </section>

    <section id="galeri" class="section">
        <h2 class="section-title">Galeri</h2>
        <div class="gallery-grid">
            <?php
            include "koneksi.php";

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

    <section id="ai-assistant" class="section">
        <div class="ai-assistant">
            <div class="ai-content">
                <h3>AI Cultural Assistant</h3>
                <p>Jelajahi budaya Jawa Timur dengan bantuan AI Cultural Assistant. Cukup tanyakan atau kirimkan
                    minuman, dan dapatkan cerdas ini akan memberikan informasi, cerita, dan rekomendasi seputar seni,
                    tradisi, dan budaya lokal.</p>
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

    <section class="section">
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
                    <img src='uploads/{$row['image']}' alt='{$row['title']}' height='180' width='250'>
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

    <section class="section">
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
                    <img src='uploads/{$row['image']}' alt='{$row['title']}' height='180' width='250'>
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

    <section class="section">
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
                    <img src='uploads/{$row['image']}' alt='{$row['title']}' height='180' width='250'>
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

    <section id="artikel" class="section">
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
                <a href="#ai-assistant">AI Assistant</a>
                <a href="#kontak">Kontak</a>
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
    </script>
</body>

</html>