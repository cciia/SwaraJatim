<?php
include "koneksi.php";
if (isset($_GET['id'])) {
    $cat_id = intval($_GET['id']);
} else {
    echo "Kategori tidak ditemukan.";
    exit;
}

$kategori = [
    2 => "Kuliner",
    3 => "Pakaian",
    4 => "Tradisi"
];

if (!isset($kategori[$cat_id])) {
    echo "Kategori tidak valid.";
    exit;
}

$judul_custom = $kategori[$cat_id];

$sql = "SELECT * FROM articles WHERE culture_type_id = $cat_id ORDER BY id DESC";
$result = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri <?php echo $judul_custom; ?></title>
    <style>
        body {
            font-family: Georgia, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #FFEAC5;
        }

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
            color: inherit;         
            text-decoration: none;   
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

        .search-container {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .search-box {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 25px;
            background: rgba(255, 255, 255, 0.9);
            color: #333;
            font-size: 0.9rem;
            width: 200px;
            transition: all 0.3s ease;
        }

        .search-box:focus {
            outline: none;
            background: white;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
        }

        .search-box::placeholder {
            color: #666;
        }

        .search-clear {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 1.2rem;
            padding: 0.5rem;
            border-radius: 50%;
            transition: background 0.3s;
        }

        .search-clear:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .no-results {
            text-align: center;
            padding: 2rem;
            color: #666;
            font-style: italic;
            grid-column: 1 / -1;
        }

        .section-header {
            text-align: center;
            margin: 100px 0 20px 0; 
            font-size: 1.5rem;
        }

        .section-header h1 {
            margin: 0;
            border-bottom: 2px solid #d2691e;
            display: inline-block;
            padding-bottom: 5px;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            padding: 20px;
            max-width: 800px;
            margin: 0 auto 100px auto;
        }

        .gallery-card {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
        }

        .gallery-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .card-content {
            padding: 15px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-content h3 {
            margin: 0 0 10px;
            font-size: 18px;
            text-align: center;
        }

        .card-content p {
            font-size: 14px;
            color: #333;
            text-align: justify;
            margin-bottom: 15px;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2; 
            -webkit-box-orient: vertical;
        }

        .card-content a {
            display: block;
            text-align: center;
            background-color: #d2691e;
            color: #fff;
            padding: 8px 0;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }

        .card-content a:hover {
            background-color: #b25000;
        }

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

        @media(max-width: 600px) {
            .gallery-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <header class="header">
        <div class="nav-container">
            <div class="logo"><a href="index.php">Swara Jatim</a></div>
            
            <div class="search-container">
                <input type="text" id="searchInput" class="search-box" placeholder="Cari artikel...">
                <button id="clearSearch" class="search-clear" title="Hapus pencarian">×</button>
            </div>
            
            <nav>
                <ul class="nav-menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php #galeri">Galeri</a></li>
                    <li><a href="index.php #ai-assistant">Swara Jatim AI</a></li>
                    <li><a href="index.php #artikel">Artikel</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <header class="section-header">
        <h1>Galeri <?php echo $judul_custom; ?></h1>
    </header>

    <div class="gallery-grid" id="galleryGrid">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="gallery-card" data-title="<?php echo strtolower($row['title']); ?>" data-content="<?php echo strtolower(strip_tags($row['content'])); ?>">
                    <img src="uploads/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
                    <div class="card-content">
                        <h3><?php echo $row['title']; ?></h3>
                        <p><?php 
                            $sentences = explode('.', $row['content']);
                            echo isset($sentences[0]) ? $sentences[0] . '.' : '';
                            if(isset($sentences[1])) echo ' ' . $sentences[1] . '.';
                        ?></p>
                        <a href="detail.php?id=<?php echo $row['id']; ?>">Baca</a>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p style='text-align:center; width:100%;'>Tidak ada artikel di kategori ini.</p>";
        }
        ?>
    </div>

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
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const clearButton = document.getElementById('clearSearch');
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

                if (visibleCount === 0 && searchTerm !== '') {
                    const noResultsDiv = document.createElement('div');
                    noResultsDiv.className = 'no-results';
                    noResultsDiv.innerHTML = `
                        <h3>Tidak ada hasil ditemukan</h3>
                        <p>Coba gunakan kata kunci yang berbeda atau hapus pencarian untuk melihat semua artikel.</p>
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
            searchInput.addEventListener('keyup', function(e) {
                if (e.key === 'Escape') {
                    clearSearch();
                }
            });
            
            clearButton.addEventListener('click', clearSearch);

            document.addEventListener('keydown', function(e) {
                if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                    e.preventDefault();
                    searchInput.focus();
                }
            });
        });
    </script>

</body>
</html>