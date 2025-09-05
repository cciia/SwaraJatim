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
            background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('https://hebbkx1anhila5yf.public.blob.vercel-storage.com/Desktop%20-%201.png-EMcnnKFMHY9egxz06xE7Rh0aLrtNC2.jpeg');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .hero-content p {
            font-size: 1.5rem;
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
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        }

        .gallery-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }

        .gallery-card:hover {
            transform: translateY(-5px);
        }

        .gallery-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .gallery-card h3 {
            padding: 1rem;
            color: #8b4513;
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

        /* Content Grid */
        .content-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        }

        .content-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
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
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .article-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
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
                    <li><a href="#gemini">Gemini</a></li>
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
            <div class="gallery-card">
                <img src="/placeholder.svg?height=200&width=300" alt="Galeri Kuliner">
                <h3>Galeri Kuliner</h3>
            </div>
            <div class="gallery-card">
                <img src="/placeholder.svg?height=200&width=300" alt="Galeri Pakaian">
                <h3>Galeri Pakaian</h3>
            </div>
            <div class="gallery-card">
                <img src="/placeholder.svg?height=200&width=300" alt="Galeri Kuliner">
                <h3>Galeri Kuliner</h3>
            </div>
        </div>
    </section>

    <!-- AI Assistant Section -->
    <section class="section">
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
                <div class="chat-header">🤖 Gemini</div>
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
    <section class="section">
        <h2 class="section-title">Kuliner</h2>
        <div class="content-grid">
            <div class="content-card">
                <img src="/placeholder.svg?height=180&width=250" alt="Nasi Pecel Madiun">
                <div class="card-content">
                    <h4>Nasi Pecel Madiun</h4>
                    <p>Madiun</p>
                </div>
            </div>
            <div class="content-card">
                <img src="/placeholder.svg?height=180&width=250" alt="Rawon">
                <div class="card-content">
                    <h4>Rawon</h4>
                    <p>Surabaya</p>
                </div>
            </div>
            <div class="content-card">
                <img src="/placeholder.svg?height=180&width=250" alt="Sego Cawuk">
                <div class="card-content">
                    <h4>Sego Cawuk</h4>
                    <p>Jombang</p>
                </div>
            </div>
            <div class="content-card">
                <img src="/placeholder.svg?height=180&width=250" alt="Rujak Cingur">
                <div class="card-content">
                    <h4>Rujak Cingur</h4>
                    <p>Surabaya</p>
                </div>
            </div>
            <div class="content-card">
                <img src="/placeholder.svg?height=180&width=250" alt="Soto Lamongan">
                <div class="card-content">
                    <h4>Soto Lamongan</h4>
                    <p>Lamongan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pakaian dan Batik Section -->
    <section class="section">
        <h2 class="section-title">Pakaian dan Batik</h2>
        <div class="content-grid">
            <div class="content-card">
                <img src="/placeholder.svg?height=180&width=250" alt="Baju Adat Ponorogo">
                <div class="card-content">
                    <h4>Baju Adat Ponorogo</h4>
                    <p>Baju Malang</p>
                </div>
            </div>
            <div class="content-card">
                <img src="/placeholder.svg?height=180&width=250" alt="Baju Jilbeng Thukul">
                <div class="card-content">
                    <h4>Baju Jilbeng Thukul</h4>
                    <p>Baju Osing Banyuwangi</p>
                </div>
            </div>
            <div class="content-card">
                <img src="/placeholder.svg?height=180&width=250" alt="Baju Cak dan Ning">
                <div class="card-content">
                    <h4>Baju Cak dan Ning</h4>
                    <p>Baju Jawa Timur</p>
                </div>
            </div>
            <div class="content-card">
                <img src="/placeholder.svg?height=180&width=250" alt="Baju Adat Trenggalek">
                <div class="card-content">
                    <h4>Baju Adat Trenggalek</h4>
                    <p>Baju Trenggalek</p>
                </div>
            </div>
            <div class="content-card">
                <img src="/placeholder.svg?height=180&width=250" alt="Batik Sido Asih">
                <div class="card-content">
                    <h4>Batik Sido Asih</h4>
                    <p>Batik</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Tradisi Section -->
    <section class="section">
        <h2 class="section-title">Tradisi</h2>
        <div class="content-grid">
            <div class="content-card">
                <img src="/placeholder.svg?height=180&width=250" alt="Tari Kuda Lumping">
                <div class="card-content">
                    <h4>Tari Kuda Lumping</h4>
                    <p>Tarian di mana penari menunggangi kuda tiruan yang terbuat dari anyaman bambu</p>
                </div>
            </div>
            <div class="content-card">
                <img src="/placeholder.svg?height=180&width=250" alt="Seni Ludruk">
                <div class="card-content">
                    <h4>Seni Ludruk</h4>
                    <p>Seni teater tradisional dari Jawa Timur yang menggabungkan dialog, tarian, dan musik</p>
                </div>
            </div>
            <div class="content-card">
                <img src="/placeholder.svg?height=180&width=250" alt="Wayang Kulit">
                <div class="card-content">
                    <h4>Wayang Kulit</h4>
                    <p>Pertunjukan wayang kulit yang menceritakan kisah-kisah dari Ramayana dan Mahabharata</p>
                </div>
            </div>
            <div class="content-card">
                <img src="/placeholder.svg?height=180&width=250" alt="Reog">
                <div class="card-content">
                    <h4>Reog</h4>
                    <p>Kesenian tradisional yang berasal dari Ponorogo dengan topeng singa barong yang besar</p>
                </div>
            </div>
            <div class="content-card">
                <img src="/placeholder.svg?height=180&width=250" alt="Kuda Lumping">
                <div class="card-content">
                    <h4>Kuda Lumping</h4>
                    <p>Kesenian rakyat tradisional Jawa yang menggunakan properti kuda tiruan dari anyaman bambu</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Artikel Budaya Section -->
    <section id="artikel" class="section">
        <h2 class="section-title">Artikel Budaya</h2>
        <div class="article-grid">
            <article class="article-card">
                <img src="/placeholder.svg?height=200&width=280" alt="Budaya Jawa Timur">
                <div class="article-content">
                    <h4>5 Budaya Jawa Timur yang Tradisi Unik dan Menarik untuk Dikunjungi Dunia</h4>
                    <p>Jawa Timur memiliki kekayaan budaya yang sangat beragam, mulai dari tarian tradisional hingga kuliner khas yang menggugah selera...</p>
                    <a href="#" class="read-more">Baca Selengkapnya</a>
                </div>
            </article>
            <article class="article-card">
                <img src="/placeholder.svg?height=200&width=280" alt="Wisata Tradisional">
                <div class="article-content">
                    <h4>10 Tradisi Jawa Timur, Wisata Budaya yang Wajib Dikunjungi Tidak Boleh Dilewatkan</h4>
                    <p>Destinasi wisata budaya di Jawa Timur menawarkan pengalaman yang tak terlupakan dengan berbagai tradisi yang masih lestari...</p>
                    <a href="#" class="read-more">Baca Selengkapnya</a>
                </div>
            </article>
            <article class="article-card">
                <img src="/placeholder.svg?height=200&width=280" alt="Pelestarian Budaya">
                <div class="article-content">
                    <h4>Memahami Kepentingan Melestarikan Adat Jawa Timur untuk Generasi Masa Depan</h4>
                    <p>Pelestarian budaya Jawa Timur menjadi tanggung jawab bersama untuk memastikan warisan leluhur tetap hidup di era modern...</p>
                    <a href="#" class="read-more">Baca Selengkapnya</a>
                </div>
            </article>
            <article class="article-card">
                <img src="/placeholder.svg?height=200&width=280" alt="Kearifan Lokal">
                <div class="article-content">
                    <h4>Contoh Kearifan Lokal di Jawa Timur dalam Tradisi dan Kuliner</h4>
                    <p>Kearifan lokal Jawa Timur tercermin dalam berbagai aspek kehidupan, mulai dari sistem pertanian hingga filosofi hidup...</p>
                    <a href="#" class="read-more">Baca Selengkapnya</a>
                </div>
            </article>
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
</body>
</html>