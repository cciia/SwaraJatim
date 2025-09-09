-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 06, 2025 at 03:17 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swarajatim`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `city_id` int DEFAULT NULL,
  `culture_type_id` int DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `city_id` (`city_id`),
  KEY `culture_type_id` (`culture_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `city_id`, `culture_type_id`, `title`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 6, 2, 'Nasi Krawu', 'Nasi Krawu adalah makanan khas Kabupaten Gresik, Jawa Timur. Hidangan ini terdiri dari nasi putih yang disajikan dengan lauk berupa suwiran daging sapi bumbu kuning, serundeng kelapa yang gurih, dan sambal terasi yang pedas. Ciri khas Nasi Krawu adalah penyajiannya menggunakan daun pisang sebagai alas, sehingga aromanya semakin sedap. Makanan ini biasanya disantap pada pagi hari sebagai sarapan, tetapi juga populer di rumah makan khas Gresik. Perpaduan rasa gurih, pedas, dan sedikit manis membuat Nasi Krawu menjadi ikon kuliner Gresik yang digemari banyak orang.', 'krawu.jpeg', '2025-09-05 03:29:03', '2025-09-05 03:29:03'),
(2, 31, 2, 'Lontong Balap', 'Lontong Balap merupakan salah satu kuliner legendaris dari Surabaya yang terkenal sejak zaman kolonial Belanda. Hidangan ini terdiri dari potongan lontong yang disajikan dengan tauge rebus, tahu goreng, lentho (gorengan kacang tolo dan singkong), kecap, serta kuah kaldu yang gurih. Dinamakan \"balap\" karena dahulu para penjualnya sering berlari-lari kecil sambil memikul dagangannya agar cepat sampai ke tempat tujuan. Sensasi makan lontong dengan kuah hangat, rasa manis gurih, dan tambahan sambal pedas menjadikan Lontong Balap sangat khas dan selalu dicari wisatawan.', 'lontong-balap.jpeg', '2025-09-05 03:29:03', '2025-09-05 03:29:03'),
(3, 12, 2, 'Nasi Pecel Madiun', 'Nasi Pecel adalah makanan tradisional khas Madiun yang terdiri dari nasi putih hangat dengan aneka sayuran rebus seperti bayam, kangkung, kecambah, dan kacang panjang. Sayuran tersebut disiram dengan sambal kacang yang gurih, sedikit pedas, dan aromanya khas. Biasanya Nasi Pecel disajikan bersama lauk tambahan seperti tempe goreng, rempeyek kacang, telur dadar, atau ayam goreng. Di Madiun, Pecel bukan hanya makanan sehari-hari, tetapi juga menjadi identitas kuliner daerah yang terkenal hingga seluruh Indonesia. Rasa kacangnya yang kuat dan bumbunya yang meresap menjadikan Nasi Pecel sangat digemari.', 'pecel.jpeg', '2025-09-05 03:29:03', '2025-09-05 03:29:03'),
(4, 31, 2, 'Rawon', 'Rawon adalah sup daging berkuah hitam khas Jawa Timur, terutama populer di Surabaya dan Malang. Keunikan Rawon terletak pada bumbu utamanya, yaitu kluwek, yang memberikan warna hitam pekat sekaligus rasa gurih yang khas. Daging sapi yang digunakan biasanya dipotong kecil-kecil agar bumbu meresap sempurna. Rawon biasanya disajikan dengan nasi putih, tauge pendek, telur asin, sambal terasi, dan kerupuk udang. Hidangan ini sering menjadi menu utama dalam acara besar maupun santapan sehari-hari masyarakat Jawa Timur. Perpaduan rasa gurih, sedikit asam, dan aroma khas kluwek menjadikan Rawon tak tergantikan di dunia kuliner Nusantara.', 'rawon.jpeg', '2025-09-05 03:29:03', '2025-09-05 03:29:03'),
(5, 31, 2, 'Rujak Cingur', 'Rujak Cingur adalah kuliner khas Surabaya yang unik karena menggunakan irisan cingur (moncong sapi) sebagai salah satu bahan utamanya. Hidangan ini berisi campuran sayuran rebus seperti kangkung, tauge, kacang panjang, timun, dan tauge, ditambah potongan lontong, tempe, tahu, serta buah-buahan segar seperti bengkuang, nanas, dan kedondong. Semua bahan tersebut kemudian disiram dengan bumbu kacang dan petis udang khas Jawa Timur. Cita rasa gurih, manis, pedas, serta aroma petis yang kuat menjadikan Rujak Cingur sangat khas dan sulit ditemukan di daerah lain. Bagi pecinta kuliner tradisional, Rujak Cingur adalah ikon kuliner Surabaya yang wajib dicoba.', 'rujak-cingur.jpeg', '2025-09-05 03:29:03', '2025-09-05 03:29:03'),
(6, 2, 4, 'Borong Ider Bumi', 'Tradisi Borong Ider Bumi berasal dari masyarakat Banyuwangi, Jawa Timur. Tradisi ini dilaksanakan sebagai ungkapan rasa syukur kepada Tuhan atas hasil bumi yang melimpah serta untuk menjaga keseimbangan alam. Biasanya masyarakat membawa hasil panen, hewan ternak, dan berbagai sesaji yang diarak keliling desa. Upacara ini juga sarat dengan doa agar desa selalu terhindar dari mara bahaya dan masyarakat hidup sejahtera.', 'barong-ider-bumi.jpg', '2025-09-05 10:26:14', '2025-09-06 03:02:02'),
(7, 2, 4, 'Bebaritan', 'Bebaritan adalah tradisi syukuran masyarakat pedesaan di Jawa Timur, biasanya dilakukan setelah panen padi. Dalam acara ini, warga berkumpul di sawah atau balai desa untuk membawa nasi tumpeng, lauk pauk, dan hasil bumi yang kemudian disantap bersama-sama. Ritual ini bukan hanya bentuk rasa syukur kepada Tuhan, tetapi juga memperkuat rasa kebersamaan dan gotong royong antarwarga.', 'bebaritan.jpg', '2025-09-05 10:26:14', '2025-09-05 10:26:14'),
(8, 21, 4, 'Grebeg Suro', 'Grebeg Suro merupakan tradisi khas Ponorogo yang dilaksanakan setiap bulan Suro dalam penanggalan Jawa. Acara ini penuh dengan kegiatan budaya, salah satunya adalah kirab pusaka dan pertunjukan reog Ponorogo. Tradisi ini memiliki makna spiritual untuk membersihkan diri dari hal-hal buruk serta menjaga hubungan harmonis dengan Sang Pencipta. Grebeg Suro kini juga menjadi daya tarik wisata budaya di Jawa Timur.', 'grebeg-suro.jpg', '2025-09-05 10:26:14', '2025-09-05 10:26:14'),
(14, 4, 4, 'Tedak Siten', 'Tedak Siten adalah tradisi Jawa yang dilakukan ketika seorang anak menginjak usia tujuh bulan dalam hitungan Jawa. Ritual ini melambangkan langkah pertama anak menapaki bumi. Dalam prosesi ini, anak dipandu berjalan di atas tanah atau pasir, kemudian melewati beberapa rintangan simbolis seperti tangga dari tebu dan masuk ke dalam kurungan ayam yang penuh mainan. Tradisi ini mengandung doa dan harapan agar anak tumbuh menjadi pribadi yang kuat, cerdas, dan bermanfaat bagi sesamanya.', 'tedak-siten.jpg', '2025-09-05 10:26:14', '2025-09-05 10:26:14'),
(15, 2, 4, 'Unan-Unan', 'Unan-Unan adalah tradisi ritual adat masyarakat Osing di Banyuwangi yang dilakukan setiap delapan tahun sekali. Ritual ini bertujuan untuk tolak bala, keselamatan desa, serta sebagai sarana introspeksi diri bagi masyarakat. Prosesi Unan-Unan berlangsung meriah dengan arak-arakan, sesaji, serta doa bersama. Tradisi ini juga menguatkan identitas budaya masyarakat Osing sekaligus menjadi warisan leluhur yang terus dijaga hingga kini.', 'unan-unan.jpg', '2025-09-05 10:26:14', '2025-09-05 10:26:14'),
(16, 2, 3, 'Pakaian Adat Osing Banyuwangi', 'Pakaian adat Osing dari Banyuwangi mencerminkan kearifan lokal masyarakat suku Osing yang masih kental dengan tradisi Jawa-Hindu. Busana wanita biasanya terdiri dari kebaya hitam dengan hiasan khas Banyuwangi, kain batik gajah oling, serta ikat kepala atau kembang goyang. Sementara untuk pria menggunakan baju kampret, jarik batik, dan udeng. Warna dominan hitam melambangkan kesederhanaan dan kewibawaan. Hingga kini, pakaian adat Osing masih sering dipakai dalam acara adat dan kesenian tradisional.', 'osing-banyuwangi.jpg', '2025-09-05 10:40:56', '2025-09-05 10:40:56'),
(17, 2, 3, 'Batik Banyuwangi', 'Batik Banyuwangi terkenal dengan motif gajah oling yang menjadi ciri khasnya. Motif ini menggambarkan filosofi kehidupan masyarakat Osing yang selalu mengingat kebesaran Tuhan. Warna batik Banyuwangi cenderung cerah, mencerminkan karakter masyarakat pesisir yang dinamis. Hingga kini, batik Banyuwangi sering digunakan dalam acara adat maupun kegiatan resmi.', 'banyuwangi.jpg', '2025-09-05 10:40:56', '2025-09-06 03:03:08'),
(18, 4, 3, 'Batik Bojonegoro', 'Batik Bojonegoro menonjolkan motif sekar jati dan jagung miji emas yang merepresentasikan kekayaan alam daerah tersebut. Batik ini lahir sebagai simbol kearifan lokal masyarakat Bojonegoro yang dekat dengan alam dan pertanian. Batik Bojonegoro memiliki warna-warna kontras dengan motif sederhana namun penuh makna.', 'bojonegoro.jpg', '2025-09-05 10:40:56', '2025-09-05 10:40:56'),
(19, 7, 3, 'Batik Jember', 'Batik Jember dikenal dengan motif tembakau yang menjadi komoditas unggulan daerah tersebut. Corak daun tembakau dan bunga khas sering dijadikan inspirasi dalam kain batik. Batik Jember biasanya memiliki warna hijau, coklat, dan kuning yang menggambarkan kesuburan tanah dan kesejahteraan masyarakatnya.', 'jember.jpg', '2025-09-05 10:40:56', '2025-09-06 03:03:13'),
(20, 28, 3, 'Batik Tuban', 'Batik Tuban atau dikenal dengan batik gedog dibuat menggunakan alat tenun tradisional. Ciri khasnya adalah tekstur kain yang kasar namun kuat, dengan motif flora dan fauna sederhana. Batik ini menjadi warisan budaya masyarakat pesisir Tuban yang masih dipertahankan hingga kini.', 'tuban.jpg', '2025-09-05 10:40:56', '2025-09-05 10:40:56'),
(21, 5, 3, 'Batik Sidoarjo', 'Batik Sidoarjo memiliki motif khas seperti udang dan bandeng yang menggambarkan kekayaan hasil laut daerah tersebut. Batik ini biasanya berwarna cerah dengan kombinasi biru, hijau, dan coklat. Keunikan motifnya menjadikan batik Sidoarjo semakin populer di kalangan pecinta batik modern.', 'sidoarjo.jpg', '2025-09-05 10:40:56', '2025-09-05 10:40:56'),
(22, 24, 3, 'Batik Malang', 'Batik Malang identik dengan motif bunga teratai, singa, dan candi-candi peninggalan kerajaan. Batik ini memiliki warna gelap seperti hitam, coklat, dan biru tua yang melambangkan keteguhan dan ketegasan. Batik Malang sering dipakai dalam acara adat maupun upacara resmi.', 'malangan.jpg', '2025-09-05 10:40:56', '2025-09-06 03:03:45'),
(23, 31, 3, 'Batik Surabaya', 'Batik Surabaya menampilkan motif flora dan fauna yang menggambarkan kehidupan kota pelabuhan. Motif ikan hiu dan buaya menjadi ikonik, sesuai dengan asal-usul nama kota Surabaya. Batik ini berwarna cerah dengan gaya kontemporer yang disukai anak muda.', 'surabaya.jpg', '2025-09-05 10:40:56', '2025-09-05 10:40:56'),
(24, 18, 3, 'Batik Pacitan', 'Batik Pacitan memiliki motif khas berupa laut, gua, dan bebatuan karst yang mencerminkan kondisi geografis daerah tersebut. Warna-warna alami dari tumbuhan sering digunakan dalam proses pewarnaannya, menjadikan batik Pacitan unik dan bernilai tinggi sebagai karya seni tradisional.', 'pacitan.jpg', '2025-09-05 10:40:56', '2025-09-05 10:40:56'),
(25, 1, 1, 'Ludruk', 'Ludruk adalah seni pertunjukan teater tradisional khas Jawa Timur yang dimainkan oleh kelompok pria. Cerita yang dibawakan biasanya menggambarkan kehidupan sehari-hari masyarakat, penuh kritik sosial, humor, dan pesan moral. Ludruk diawali dengan tari pembuka, yaitu tari remo, kemudian dilanjutkan dengan drama utama. Keunikan ludruk terletak pada kemampuannya menghibur sekaligus memberikan nasihat bagi penonton. Hingga kini, ludruk tetap menjadi bagian penting dari identitas budaya Jawa Timur.', 'ludruk.jpg', '2025-09-05 10:47:38', '2025-09-05 10:47:38'),
(26, 21, 1, 'Reog Ponorogo', 'Reog Ponorogo merupakan kesenian tradisional yang berasal dari Ponorogo, Jawa Timur. Pertunjukan ini menampilkan penari dengan topeng besar berbentuk singa (barongan) yang dihiasi bulu merak. Reog biasanya diiringi musik gamelan khas dan gerakan tarian yang penuh energi. Cerita yang dibawakan sering kali berkaitan dengan legenda, kepahlawanan, dan nilai spiritual. Keunikan Reog terletak pada kekuatan fisik penarinya yang mampu mengangkat barongan seberat lebih dari 50 kg hanya dengan gigi. Reog menjadi simbol kebanggaan masyarakat Ponorogo dan telah dikenal hingga mancanegara.', 'reog.jpg', '2025-09-05 10:47:38', '2025-09-05 10:47:38'),
(27, 3, 1, 'Tari Remo', 'Tari Remo adalah tarian khas Jawa Timur yang awalnya digunakan sebagai tarian pembuka dalam pertunjukan ludruk. Gerakannya lincah, penuh semangat, dan diiringi tabuhan gamelan yang dinamis. Penari biasanya mengenakan kostum berwarna cerah dengan hiasan kepala khas Jawa Timur. Tari Remo tidak hanya menjadi hiburan, tetapi juga sarana ekspresi budaya dan identitas masyarakat Jawa Timur. Saat ini, Tari Remo sering ditampilkan dalam acara penyambutan tamu penting maupun festival budaya.', 'tari-remo.jpg', '2025-09-05 10:47:38', '2025-09-05 10:47:38'),
(28, 4, 1, 'Wayang Kulit Jawa Timur', 'Wayang Kulit Jawa Timur merupakan seni pertunjukan tradisional yang memadukan seni rupa, musik, dan sastra. Dalang memainkan wayang dari kulit kerbau yang diproyeksikan ke layar dengan bantuan cahaya lampu. Cerita yang dibawakan biasanya diambil dari epos Mahabharata atau Ramayana, namun dikemas dengan bahasa dan humor khas Jawa Timuran. Keunikan wayang kulit Jawa Timur ada pada gaya bahasa yang lugas dan irama gamelan yang lebih cepat dibandingkan wayang di Jawa Tengah. Kesenian ini menjadi media penyampaian nilai moral, spiritual, dan hiburan bagi masyarakat.', 'wayang-kulit.jpg', '2025-09-05 10:47:38', '2025-09-05 10:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`) VALUES
(1, 'Bangkalan'),
(2, 'Banyuwangi'),
(3, 'Blitar'),
(4, 'Bojonegoro'),
(5, 'Bondowoso'),
(6, 'Gresik'),
(7, 'Jember'),
(8, 'Jombang'),
(9, 'Kediri'),
(10, 'Lamongan'),
(11, 'Lumajang'),
(12, 'Madiun'),
(13, 'Magetan'),
(14, 'Malang'),
(15, 'Mojokerto'),
(16, 'Nganjuk'),
(17, 'Ngawi'),
(18, 'Pacitan'),
(19, 'Pamekasan'),
(20, 'Pasuruan'),
(21, 'Ponorogo'),
(22, 'Probolinggo'),
(23, 'Sampang'),
(24, 'Sidoarjo'),
(25, 'Situbondo'),
(26, 'Sumenep'),
(27, 'Trenggalek'),
(28, 'Tuban'),
(29, 'Tulungagung'),
(30, 'Batu'),
(31, 'Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `culture_types`
--

DROP TABLE IF EXISTS `culture_types`;
CREATE TABLE IF NOT EXISTS `culture_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `culture_types`
--

INSERT INTO `culture_types` (`id`, `name`) VALUES
(1, 'Kesenian'),
(2, 'Kuliner'),
(3, 'Pakaian/Batik'),
(4, 'Tradisi');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
