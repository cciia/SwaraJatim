<?php
include "koneksi.php";
if (isset($_GET['id'])) {
    $cat_id = intval($_GET['id']);
} else {
    echo "Kategori tidak ditemukan.";
    exit;
}

$kategori = [
    1 => "Wisata",
    2 => "Kuliner",
    3 => "Pakaian",
    4 => "Tradisi"
];

if (!isset($kategori[$cat_id])) {
    echo "Kategori tidak valid.";
    exit;
}

$judul_custom = $kategori[$cat_id];

$sql = "SELECT * FROM konten WHERE category_id = $cat_id ORDER BY id DESC";
$result = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri <?php echo $judul_custom; ?> - Swara Jatim</title>
    <link rel="icon" type="image/png" href="petajatim2 1.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #C85A17;
            --primary-dark: #8b4513;
            --primary-light: #E8A863;
            --secondary: #2c1810;
            --neutral-100: #f8f6f3;
            --neutral-200: #ede9e3;
            --neutral-500: #888888;
            --neutral-900: #1a1a1a;
            --accent: #E8A863;
            --success: #4caf50;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f1e8;
            color: #333;
            line-height: 1.6;
            background-color: #FFEAC5;
        }

        /* ===== HEADER ===== */
        .header {
            background-color: var(--secondary);
            padding: 1.2rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            backdrop-filter: blur(10px);
            background-color: rgba(44, 24, 16, 0.98);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
            gap: 2rem;
        }

        .logo {
            font-size: 1.6rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--accent), var(--primary-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: #FFE1AF;
            background-clip: text;
            text-decoration: none;
            white-space: nowrap;
            letter-spacing: -0.5px;
        }

        .logo a {
            color: inherit;
            text-decoration: none;
        }

        .search-container {
            flex: 1;
            max-width: 400px;
        }

        .search-box {
            width: 100%;
            padding: 0.8rem 1.5rem;
            border: 1.5px solid rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            background: rgba(255, 255, 255, 0.08);
            color: white;
            font-size: 0.95rem;
            font-family: inherit;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
        }

        .search-box::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .search-box:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.15);
            border-color: var(--accent);
            box-shadow: 0 0 20px rgba(232, 168, 99, 0.3);
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2.5rem;
            margin: 0;
        }

        .nav-menu a {
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            transition: color 0.3s ease;
            position: relative;
        }

        .nav-menu a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent);
            transition: width 0.3s ease;
        }

        .nav-menu a:hover {
            color: white;
        }

        .nav-menu a:hover::after {
            width: 100%;
        }

        .burger-menu {
            display: none;
            flex-direction: column;
            background: none;
            border: none;
            cursor: pointer;
            gap: 5px;
            padding: 0.5rem;
            z-index: 1001;
        }

        .burger-menu span {
            width: 25px;
            height: 3px;
            background: rgba(255, 255, 255, 0.85);
            border-radius: 2px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .burger-menu.active span:nth-child(1) {
            transform: rotate(45deg) translate(8px, 8px);
        }

        .burger-menu.active span:nth-child(2) {
            opacity: 0;
        }

        .burger-menu.active span:nth-child(3) {
            transform: rotate(-45deg) translate(8px, -8px);
        }

        .nav-menu-wrapper {
            display: flex;
        }

        /* ===== HERO SECTION ===== */
        .hero-section {
            margin-top: 80px;
            background: linear-gradient(135deg, var(--secondary) 0%, var(--primary-dark) 100%);
            padding: 4rem 2rem;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(232, 168, 99, 0.15) 0%, transparent 70%);
            border-radius: 50%;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-section h1 {
            font-family: 'Poppins', sans-serif;
            font-size: clamp(2rem, 5vw, 3.5rem);
            margin-bottom: 1rem;
            font-weight: 700;
            letter-spacing: -1px;
        }

        .hero-section p {
            font-size: 1.1rem;
            opacity: 0.95;
            font-weight: 300;
            letter-spacing: 0.5px;
        }

        /* ===== CONTAINER ===== */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 4rem 2rem;
        }

        /* ===== GALLERY GRID ===== */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: 2.5rem;
            margin-bottom: 3rem;
        }

        .gallery-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            display: flex;
            flex-direction: column;
            height: 100%;
            border: 1px solid rgba(0, 0, 0, 0.04);
        }

        .gallery-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        .card-image-wrapper {
            width: 100%;
            height: 280px;
            overflow: hidden;
            position: relative;
            background: linear-gradient(135deg, var(--neutral-200), var(--neutral-100));
        }

        .card-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .gallery-card:hover .card-image-wrapper img {
            transform: scale(1.08);
        }

        .card-badge {
            position: absolute;
            top: 16px;
            right: 16px;
            background: var(--primary);
            color: white;
            padding: 7px 18px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.7px;
            box-shadow: 0 4px 15px rgba(200, 90, 23, 0.3);
            backdrop-filter: blur(10px);
        }

        .card-content {
            padding: 2rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .card-content h3 {
            color: var(--primary-dark);
            margin-bottom: 0.8rem;
            font-size: 1.5rem;
            line-height: 1.3;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
        }

        .card-content p {
            color: var(--neutral-500);
            font-size: 0.95rem;
            line-height: 1.7;
            margin-bottom: 1.5rem;
            flex: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .card-button {
            display: inline-flex;
            align-items: center;
            gap: 0.7rem;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 0.9rem 1.8rem;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            text-align: center;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 0.95rem;
            width: fit-content;
            box-shadow: 0 4px 15px rgba(200, 90, 23, 0.2);
        }

        .card-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(200, 90, 23, 0.35);
        }

        /* ===== EMPTY STATE ===== */
        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 5rem 2rem;
        }

        .empty-state h3 {
            color: var(--primary-dark);
            font-size: 2rem;
            margin-bottom: 1rem;
            font-family: 'Poppins', sans-serif;
        }

        .empty-state p {
            color: var(--neutral-500);
            font-size: 1.05rem;
            margin-bottom: 2rem;
        }

        .back-to-home {
            display: inline-block;
            padding: 1rem 2.5rem;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(200, 90, 23, 0.2);
        }

        .back-to-home:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(200, 90, 23, 0.35);
        }

        .no-results {
            grid-column: 1 / -1;
            text-align: center;
            padding: 4rem 2rem;
        }

        .no-results h3 {
            color: var(--primary-dark);
            font-size: 1.8rem;
            margin-bottom: 1rem;
            font-family: 'Poppins', sans-serif;
        }

        .no-results p {
            color: var(--neutral-500);
            font-size: 1rem;
        }

        /* ===== FOOTER ===== */
        .footer {
            background: var(--secondary);
            color: rgba(255, 255, 255, 0.85);
            padding: 4rem 2rem 2rem;
            margin-top: 5rem;
        }

        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 3rem;
            margin-bottom: 2rem;
        }

        .footer-section h4 {
            color: var(--accent);
            margin-bottom: 1.3rem;
            font-size: 1.1rem;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .footer-section p,
        .footer-section a {
            color: rgba(255, 255, 255, 0.75);
            text-decoration: none;
            margin-bottom: 0.8rem;
            display: block;
            transition: color 0.3s ease;
            font-size: 0.95rem;
            line-height: 1.7;
        }

        .footer-section a:hover {
            color: var(--accent);
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .social-links a {
            background: var(--primary);
            color: white;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 1.1rem;
            margin: 0;
        }

        .social-links a:hover {
            background: var(--accent);
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(232, 168, 99, 0.3);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
        }

        /* ===== RESPONSIVE ===== */
        /* Responsive burger menu for tablets and mobile */
        @media (max-width: 1024px) {
            .burger-menu {
                display: flex;
            }

            .nav-menu-wrapper {
                position: absolute;
                top: 70px;
                left: 0;
                right: 0;
                background: rgba(44, 24, 16, 0.98);
                flex-direction: column;
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                backdrop-filter: blur(10px);
            }

            .nav-menu-wrapper.active {
                max-height: 500px;
                padding: 1.5rem 0;
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            }

            .nav-menu {
                flex-direction: column;
                gap: 0;
                padding: 0 2rem;
            }

            .nav-menu li {
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
                padding: 1rem 0;
            }

            .nav-menu li:last-child {
                border-bottom: none;
            }

            .hero-section {
                margin-top: 100px;
            }
        }

        @media (max-width: 768px) {
            .nav-container {
                gap: 1rem;
                padding: 1rem 1.5rem;
            }

            .search-container {
                max-width: 100%;
            }

            .hero-section {
                padding: 3rem 1.5rem;
                margin-top: 110px;
            }

            .hero-section h1 {
                font-size: 2rem;
            }

            .container {
                padding: 2.5rem 1.5rem;
            }

            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
                gap: 1.5rem;
            }

            .card-image-wrapper {
                height: 240px;
            }

            .card-content {
                padding: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .nav-container {
                padding: 0.8rem 1rem;
            }

            .logo {
                font-size: 1.3rem;
            }

            .search-box {
                padding: 0.7rem 1rem;
                font-size: 0.9rem;
            }

            .nav-menu {
                padding: 0 1rem;
            }

            .hero-section {
                padding: 2rem 1rem;
                margin-top: 100px;
            }

            .hero-section h1 {
                font-size: 1.5rem;
                margin-bottom: 0.5rem;
            }

            .hero-section p {
                font-size: 0.95rem;
            }

            .container {
                padding: 1.5rem 1rem;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
                gap: 1.2rem;
            }

            .card-content h3 {
                font-size: 1.2rem;
            }

            .footer-content {
                gap: 2rem;
            }
        }

        /* ===== ANIMATIONS ===== */
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

        .gallery-card {
            animation: fadeInUp 0.6s ease forwards;
        }

        .gallery-card:nth-child(n) {
            animation-delay: calc(0.1s * var(--index, 0));
        }
    </style>
</head>

<body>

    <header class="header">
        <div class="nav-container">
            <div class="logo"><a href="index.php">Swara Jatim</a></div>

            <div class="search-container">
                <input type="text" id="searchInput" class="search-box" placeholder="Cari...">
            </div>

            <button class="burger-menu" id="burgerMenu" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <div class="nav-menu-wrapper" id="navMenuWrapper">
                <nav>
                    <ul class="nav-menu">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="index.php#galeri">Galeri</a></li>
                        <li><a href="index.php#ai-assistant">Swara Jatim AI</a></li>
                        <li><a href="mini-game.php">Mini Game</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <section class="hero-section">
        <div class="hero-content">
            <h1>Galeri <?php echo $judul_custom; ?></h1>
            <p>Jelajahi koleksi <?php echo strtolower($judul_custom); ?> khas Jawa Timur</p>
        </div>
    </section>

    <div class="container">
        <div class="gallery-grid" id="galleryGrid">
            <?php
            if (mysqli_num_rows($result) > 0) {
                $index = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $description = $row['description'];
                    $sentences = preg_split('/(?<=[.!?])\s+/', $description, 3);
                    $preview = isset($sentences[0]) ? $sentences[0] : '';
                    if (isset($sentences[1])) {
                        $preview .= ' ' . $sentences[1];
                    }
                    ?>
                    <div class="gallery-card" 
                         style="--index: <?php echo $index; ?>"
                         data-title="<?php echo strtolower($row['name']); ?>"
                         data-content="<?php echo strtolower(strip_tags($row['description'])); ?>">
                        <div class="card-image-wrapper">
                            <img src="<?php echo $row['image_url']; ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" loading="lazy">
                            <div class="card-badge"><?php echo $judul_custom; ?></div>
                        </div>
                        <div class="card-content">
                            <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                            <p><?php echo htmlspecialchars($preview); ?></p>
                            <a href="detail.php?id=<?php echo $row['id']; ?>" class="card-button">Baca Selengkapnya</a>
                        </div>
                    </div>
                    <?php
                    $index++;
                }
            } else {
                ?>
                <div class="empty-state">
                    <h3>📭 Belum Ada Konten</h3>
                    <p>Maaf, belum ada artikel di kategori <?php echo $judul_custom; ?> saat ini.</p>
                    <a href="index.php" class="back-to-home">Kembali ke Beranda</a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h4>Swara Jatim</h4>
                <p>Portal Budaya & Berita Jawa Timur</p>
                <p>Melestarikan dan mempromosikan kekayaan budaya Jawa Timur melalui platform digital yang informatif dan edukatif untuk generasi mendatang.</p>
            </div>
            <div class="footer-section">
                <h4>Navigasi</h4>
                <a href="index.php">Beranda</a>
                <a href="index.php#galeri">Galeri</a>
                <a href="mini-game.php">Mini Game</a>
                <a href="index.php#ai-assistant">AI Assistant</a>
            </div>
            <div class="footer-section">
                <h4>Kategori</h4>
                <a href="galeri.php?id=1">Wisata</a>
                <a href="galeri.php?id=2">Kuliner</a>
                <a href="galeri.php?id=3">Pakaian & Batik</a>
                <a href="galeri.php?id=4">Tradisi</a>
            </div>
            <div class="footer-section">
                <h4>Kontak</h4>
                <p>Email: info@swarajatim.com</p>
                <p>Telepon: (031) 123-4567</p>
                <div class="social-links">
                    <a href="#" title="Facebook">f</a>
                    <a href="#" title="Instagram">i</a>
                    <a href="#" title="Twitter">t</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Swara Jatim. Semua hak cipta dilindungi.</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Burger menu toggle
            const burgerMenu = document.getElementById('burgerMenu');
            const navMenuWrapper = document.getElementById('navMenuWrapper');

            burgerMenu.addEventListener('click', function() {
                burgerMenu.classList.toggle('active');
                navMenuWrapper.classList.toggle('active');
            });

            // Search functionality
            const searchInput = document.getElementById('searchInput');
            const galleryGrid = document.getElementById('galleryGrid');
            const galleryCards = document.querySelectorAll('.gallery-card');

            function performSearch() {
                const searchTerm = searchInput.value.toLowerCase().trim();
                let visibleCount = 0;

                galleryCards.forEach(card => {
                    const title = card.getAttribute('data-title');
                    const content = card.getAttribute('data-content');

                    if (searchTerm === '' || title.includes(searchTerm) || content.includes(searchTerm)) {
                        card.style.display = 'flex';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });

                const existingNoResults = document.querySelector('.no-results');
                if (existingNoResults) {
                    existingNoResults.remove();
                }

                if (visibleCount === 0 && searchTerm !== '' && galleryCards.length > 0) {
                    const noResultsDiv = document.createElement('div');
                    noResultsDiv.className = 'no-results';
                    noResultsDiv.innerHTML = `
                        <h3>🔍 Tidak Ada Hasil</h3>
                        <p>Coba gunakan kata kunci yang berbeda atau hapus pencarian Anda.</p>
                    `;
                    galleryGrid.appendChild(noResultsDiv);
                }
            }

            function clearSearch() {
                searchInput.value = '';
                performSearch();
                searchInput.focus();
            }

            searchInput.addEventListener('input', performSearch);
            
            searchInput.addEventListener('keyup', function (e) {
                if (e.key === 'Escape') {
                    clearSearch();
                }
            });

            // Keyboard shortcut
            document.addEventListener('keydown', function (e) {
                if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                    e.preventDefault();
                    searchInput.focus();
                }
            });

            // Card click navigation
            galleryCards.forEach(card => {
                card.addEventListener('click', function(e) {
                    if (e.target.tagName !== 'A') {
                        const link = this.querySelector('.card-button');
                        if (link) {
                            window.location.href = link.href;
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>