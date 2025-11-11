<?php
include "koneksi.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    $query = "SELECT * FROM konten WHERE id = $id";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <!DOCTYPE html>
        <html lang="id">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo $row['name']; ?></title>
            <style>
                body {
                    font-family: Georgia, serif;
                    margin: 0;
                    padding: 0;
                    background-color: #FFEAC5;
                    color: #333;
                    line-height: 1.8;
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

                main {
                    max-width: 100vh;
                    margin: 140px auto 50px;
                    padding: 0 20px;
                }

                .article-container {
                    display: flex;
                    gap: 30px;
                    align-items: center;
                    flex-wrap: wrap;
                }

                .article-image {
                    flex: 1;
                    min-width: 300px;
                }

                .article-image img {
                    width: 100%;
                    height: auto;
                    border-radius: 10px;
                }

                .article-content {
                    flex: 1;
                    min-width: 300px;
                }

                .article-content h1 {
                    font-size: 2rem;
                    margin-bottom: 20px;
                    border-bottom: 2px solid #d2691e;
                    display: inline-block;
                    padding-bottom: 5px;
                }

                .article-content p {
                    text-align: justify;
                }

                .back-btn {
                    display: inline-block;
                    margin-top: 30px;
                    padding: 10px 20px;
                    background-color: #d2691e;
                    color: #fff;
                    text-decoration: none;
                    font-weight: bold;
                    border-radius: 5px;
                    transition: background-color 0.3s;
                }

                .back-btn:hover {
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
            </style>
        </head>

        <body>

            <header class="header">
                <div class="nav-container">
                    <div class="logo"><a href="index.php">Swara Jatim</a></div>
                    <nav>
                        <ul class="nav-menu">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="index.php #galeri">Galeri</a></li>
                            <li><a href="index.php #ai-assistant">Swara Jatim AI</a></li>
                            <li><a href="index.php #artikel">Artikel</a></li>
                            <li><a href="mini-game.php">Mini Game</a></li>
                        </ul>
                    </nav>
                </div>
            </header>

            <main>
                <div class="article-container">
                    <div class="article-image">
                        <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['name']; ?>">
                    </div>
                    <div class="article-content">
                        <h1><?php echo $row['name']; ?></h1>
                        <p><?php echo nl2br($row['description']); ?></p>
                        <a class="back-btn" href="galeri.php?id=<?php echo $row['category_id']; ?>">Kembali</a>
                    </div>
                </div>
            </main>

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
        </body>

        </html>
        <?php
    } else {
        echo "<p style='text-align:center; margin-top:50px;'>Artikel tidak ditemukan.</p>";
    }
} else {
    echo "<p style='text-align:center; margin-top:50px;'>ID artikel tidak valid.</p>";
}
?>