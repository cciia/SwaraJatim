-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 11, 2025 at 12:08 AM
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
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `culture_types`
--

INSERT INTO `culture_types` (`id`, `name`) VALUES
(1, 'Wisata'),
(2, 'Kuliner'),
(3, 'Pakaian'),
(4, 'Tradisi');

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

DROP TABLE IF EXISTS `konten`;
CREATE TABLE IF NOT EXISTS `konten` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int DEFAULT NULL,
  `city_id` int DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `image_url` text,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `city_id` (`city_id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konten`
--

INSERT INTO `konten` (`id`, `category_id`, `city_id`, `name`, `description`, `image_url`) VALUES
(1, 1, 22, 'Gunung Bromo', 'Gunung Bromo adalah ikon wisata alam Jawa Timur yang menakjubkan, terkenal dengan pemandangan matahari terbit terbaik di Indonesia. Dari Bukit Penanjakan, wisatawan dapat menyaksikan matahari terbit perlahan muncul di balik Gunung Semeru, sementara lautan pasir dan kabut menambah suasana magis. Selain itu, kawah aktif Bromo yang mengeluarkan asap putih juga bisa dijangkau dengan berjalan kaki atau menunggang kuda. Di sekitarnya terdapat Pura Luhur Poten, tempat ibadah masyarakat Tengger yang penuh nilai budaya dan tradisi.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgIAJPIHUJVcjt5DuUWIOgDrDz7i4bGo1AXA&s'),
(2, 1, 18, 'Pantai Klayar', 'Pantai Klayar menawarkan keindahan alam yang eksotis dan masih alami dengan pasir putih, batu karang raksasa, dan ombak besar khas laut selatan. Salah satu keunikan pantai ini adalah fenomena seruling samudra, di mana air laut yang terhantam karang menyembur ke udara dan mengeluarkan bunyi seperti seruling. Suasana di sini sangat menenangkan, cocok untuk bersantai, menikmati senja, atau fotografi alam.', 'https://zjglidcehtsqqqhbdxyp.supabase.co/storage/v1/object/public/atourin/images/destination/pacitan/pantai-klayar-profile1653617226.jpeg?x-image-process=image/resize,p_100,limit_1/imageslim'),
(3, 1, 2, 'Kawah Ijen', 'Kawah Ijen adalah destinasi geowisata kelas dunia yang terkenal dengan fenomena blue fire (api biru) yang hanya bisa dilihat di malam hari. Api biru ini muncul dari reaksi gas belerang yang terbakar di suhu tinggi. Di pagi hari, pengunjung akan disuguhi pemandangan danau asam berwarna toska yang luas, dikelilingi oleh tebing-tebing curam. Selain keindahan alamnya, Kawah Ijen juga memperlihatkan ketangguhan para penambang belerang tradisional yang bekerja di medan ekstrem.', 'https://zjglidcehtsqqqhbdxyp.supabase.co/storage/v1/object/public/atourin/images/destination/banyuwangi/kawah-ijen-profile1696943976.jpeg?x-image-process=image/resize,p_100,limit_1/imageslim'),
(4, 1, 7, 'Pantai Papuma', 'Pantai Papuma (Pasir Putih Malikan) merupakan kombinasi sempurna antara pasir putih lembut, laut biru jernih, dan batu karang besar yang menjulang di tengah laut. Dari atas bukit di sekitar pantai, kamu bisa menikmati panorama laut selatan yang spektakuler, terutama saat matahari terbit dan terbenam.', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/15/ae/32/83/monggo-indonesia-one.jpg?w=1200&h=-1&s=1'),
(5, 1, 25, 'Taman Nasional Baluran', 'Dikenal sebagai “Afrika van Java”, Taman Nasional Baluran menghadirkan pemandangan savana luas yang mirip padang rumput Afrika. Di sini, pengunjung bisa melihat satwa liar seperti banteng, rusa, kijang, burung merak, dan monyet ekor panjang yang hidup bebas di alam terbuka. Salah satu spot terbaiknya adalah Savana Bekol, yang menjadi latar favorit fotografer.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0g-6wIT_xiDX1sFEyxwffJfjCxc6qVF_gyA&s'),
(6, 1, 11, 'Ranu Kumbolo', 'Terletak di jalur pendakian Gunung Semeru, Ranu Kumbolo adalah danau alami di ketinggian sekitar 2.400 mdpl. Airnya jernih dan dikelilingi oleh perbukitan hijau yang meneduhkan. Saat pagi hari, kabut tipis dan sinar matahari menciptakan pemandangan bak negeri dongeng.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQH5DNTVlwU5jVG1gaui6av7S0AtufZ3JQlhQ&s'),
(7, 1, 20, 'Taman Safari Prigen', 'Taman Safari Prigen adalah taman safari terbesar di Asia Tenggara dengan luas sekitar 350 hektare. Pengunjung dapat berkeliling menggunakan kendaraan pribadi atau bus safari untuk melihat hewan dari berbagai benua, seperti singa, zebra, jerapah, hingga beruang. Selain area safari, ada juga Baby Zoo, aquarium raksasa, pertunjukan satwa edukatif, dan wahana permainan anak.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3ap0pkEuPezW2Rns_oAn-_gwL4ezvzjsJIQ&s'),
(8, 1, 1, 'Bukit Jaddih', 'Bukit Jaddih merupakan bekas tambang kapur putih yang kini disulap menjadi tempat wisata dengan panorama tebing kapur tinggi yang menakjubkan. Cahaya matahari yang memantul di permukaan kapur membuat tempat ini tampak berkilau dan fotogenik.', 'https://pancar.id/wp-content/uploads/articles/pesona-bukit-jaddih-kolam-alami-dan-danau-biru-di-madura_1723435246.jpg'),
(9, 1, 14, 'Coban Rondo', 'Air Terjun Coban Rondo terletak di ketinggian sekitar 84 meter dan dikelilingi hutan pinus yang sejuk. Suara gemericik air dan kabut yang menyejukkan menciptakan suasana damai alami. Selain menikmati air terjun, pengunjung juga dapat bermain di taman labirin, area outbound, bersepeda, atau berkemah di kawasan wisata ini.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTwJ8onMyugc4IWO9ga2uJmwFON2UUfF3_PLg&s'),
(10, 1, 14, 'Jatim Park 2', 'Jatim Park 2 merupakan destinasi wisata edukasi modern yang memadukan hiburan, sains, dan konservasi hewan. Di dalamnya terdapat tiga area utama: Museum Satwa, Batu Secret Zoo, dan Eco Green Park. Tempat ini cocok untuk liburan keluarga yang edukatif dan seru.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRfkNd6wcHckZUYhmpADtXSf2rvhQqftaBNTg&s'),
(11, 2, 10, 'Nasi Krawu', 'Nasi Krawu adalah makanan khas Kabupaten Gresik, Jawa Timur. Hidangan ini terdiri dari nasi putih yang disajikan dengan lauk berupa suwiran daging sapi bumbu kuning, serundeng kelapa yang gurih, dan sambal terasi yang pedas. Ciri khas Nasi Krawu adalah penyajiannya menggunakan daun pisang sebagai alas, sehingga aromanya semakin sedap. Makanan ini biasanya disantap pada pagi hari sebagai sarapan, tetapi juga populer di rumah makan khas Gresik. Perpaduan rasa gurih, pedas, dan sedikit manis membuat Nasi Krawu menjadi ikon kuliner Gresik yang digemari banyak orang.', 'https://media.istockphoto.com/id/2171731085/photo/nasi-krawu-a-typical-food-from-gresik-regency.jpg?b=1&s=612x612&w=0&k=20&c=f-S_qRgeCEZmxrVPqn_kdhzYVIjInfWE4MhUv5PTb5g='),
(12, 2, 17, 'Lontong Balap', 'Lontong Balap merupakan salah satu kuliner legendaris dari Surabaya yang terkenal sejak zaman kolonial Belanda. Hidangan ini terdiri dari potongan lontong yang disajikan dengan tauge rebus, tahu goreng, lentho (gorengan kacang tolo dan singkong), kecap, serta kuah kaldu yang gurih. Dinamakan \"balap\" karena dahulu para penjualnya sering berlari-lari kecil sambil memikul dagangannya agar cepat sampai ke tempat tujuan. Sensasi makan lontong dengan kuah hangat, rasa manis gurih, dan tambahan sambal pedas menjadikan Lontong Balap sangat khas dan selalu dicari wisatawan.', 'https://media.istockphoto.com/id/1821329176/photo/lontong-mie-is-a-traditional-food-from-java-indonesia-made-from-noodles-and-rice-cooked-in.jpg?b=1&s=612x612&w=0&k=20&c=9p-vOVoTOhGh0klvotBSMNl7fwUazKPejS_WlxZrzzQ='),
(13, 2, 12, 'Nasi Pecel Madiun', 'Nasi Pecel adalah makanan tradisional khas Madiun yang terdiri dari nasi putih hangat dengan aneka sayuran rebus seperti bayam, kangkung, kecambah, dan kacang panjang. Sayuran tersebut disiram dengan sambal kacang yang gurih, sedikit pedas, dan aromanya khas. Biasanya Nasi Pecel disajikan bersama lauk tambahan seperti tempe goreng, rempeyek kacang, telur dadar, atau ayam goreng. Di Madiun, Pecel bukan hanya makanan sehari-hari, tetapi juga menjadi identitas kuliner daerah yang terkenal hingga seluruh Indonesia. Rasa kacangnya yang kuat dan bumbunya yang meresap menjadikan Nasi Pecel sangat digemari.', 'https://media.istockphoto.com/id/1411764892/photo/sego-pecel-is-a-typical-food-from-java.jpg?b=1&s=612x612&w=0&k=20&c=GSCG4R8riwtnbQrnn_MJDYWswZx0V-XLa2L9uVxtZEI='),
(14, 2, 17, 'Rawon', 'Rawon adalah sup daging berkuah hitam khas Jawa Timur, terutama populer di Surabaya dan Malang. Keunikan Rawon terletak pada bumbu utamanya, yaitu kluwek, yang memberikan warna hitam pekat sekaligus rasa gurih yang khas. Daging sapi yang digunakan biasanya dipotong kecil-kecil agar bumbu meresap sempurna. Rawon biasanya disajikan dengan nasi putih, tauge pendek, telur asin, sambal terasi, dan kerupuk udang. Hidangan ini sering menjadi menu utama dalam acara besar maupun santapan sehari-hari masyarakat Jawa Timur.', 'https://media.istockphoto.com/id/2175168596/photo/delicious-nasi-rawon-or-black-beef-soup-with-rice-bean-sprout-fried-onion-indonesia-food-menu.jpg?b=1&s=612x612&w=0&k=20&c=9N_YlNrYtaVVX6zzvENbWxPBjmQbHFObYvGWd1G3hIs='),
(15, 2, 17, 'Rujak Cingur', 'Rujak Cingur adalah kuliner khas Surabaya yang unik karena menggunakan irisan cingur (moncong sapi) sebagai salah satu bahan utamanya. Hidangan ini berisi campuran sayuran rebus seperti kangkung, tauge, kacang panjang, timun, dan tauge, ditambah potongan lontong, tempe, tahu, serta buah-buahan segar seperti bengkuang, nanas, dan kedondong. Semua bahan tersebut kemudian disiram dengan bumbu kacang dan petis udang khas Jawa Timur. Cita rasa gurih, manis, pedas, serta aroma petis yang kuat menjadikan Rujak Cingur sangat khas dan sulit ditemukan di daerah lain.', 'https://media.istockphoto.com/id/1141448301/photo/rujak-juhi-salad-of-noodles-and-vegetables-with-cuttlefish-crackers-from-betawi-jakarta.jpg?b=1&s=612x612&w=0&k=20&c=Le7cqsg83zo27evA8d_715VcIQerMUFAvjA__Pw_230='),
(16, 2, 9, 'Soto Lamongan', 'Soto Lamongan adalah soto khas Jawa Timur yang terkenal dengan kuah bening berwarna kuning dan taburan koya sebagai ciri utamanya. Hidangan ini berisi suwiran ayam, bihun, kol, telur, dan kadang ditambah perkedel. Perbedaan paling khas dari soto ini adalah koya, campuran dari kerupuk udang dan bawang putih yang dihaluskan sehingga membuat kuah terasa lebih gurih tanpa menggunakan santan.', 'https://media.istockphoto.com/id/1633450921/photo/soto-ayam-an-indonesian-chicken-noodle-soup.jpg?b=1&s=612x612&w=0&k=20&c=L_tJScLuHGPFdBLbgFTd03Jc61K91IkA6NedKRHUTkI='),
(17, 2, 17, 'Tahu Tek', 'Tahu Tek adalah makanan khas Surabaya yang menggunakan tahu goreng setengah matang sebagai bahan utama. Tahu yang masih panas kemudian dipotong menggunakan gunting (bunyi “tek-tek” menjadi asal namanya), lalu disajikan bersama lontong, kentang goreng, tauge, dan telur. Semua bahan tersebut disiram dengan saus kacang yang dicampur petis, menghasilkan rasa yang gurih, manis, dan sedikit asam.', 'https://media.istockphoto.com/id/1313226424/photo/indonesian-food-which-is-called-by-tahu-tek.jpg?b=1&s=612x612&w=0&k=20&c=D9ZKLEuH8m6MT_ZyxFGUdzC1zkj3vEs4CftZxFNRYS4='),
(18, 2, 8, 'Sate Madura', 'Sate Madura adalah salah satu sate paling populer di Indonesia dan berasal dari Pulau Madura, Jawa Timur. Sate ini biasanya menggunakan daging ayam atau kambing yang dipanggang di atas arang hingga menghasilkan aroma smoky yang kuat. Ciri khasnya terletak pada saus kacang yang kental dan gurih, dibuat dari kacang tanah, bawang putih, kecap manis, serta jeruk limo sebagai penambah aroma segar.', 'https://images.pexels.com/photos/23147806/pexels-photo-23147806.jpeg'),
(19, 2, 9, 'Pecel Lele Lamongan', 'Pecel Lele Lamongan adalah hidangan sederhana namun sangat populer, terutama sebagai kuliner malam. Menu ini terdiri dari lele goreng yang digoreng hingga kulitnya renyah, lalu disajikan dengan sambal terasi yang segar dan lalapan seperti timun, kol, kemangi, serta terkadang ditambah tahu dan tempe.', 'https://media.istockphoto.com/id/1051717444/photo/indonesian-pecel-catfish-catfish-food.jpg?b=1&s=612x612&w=0&k=20&c=ZutaU10_OSjci9oRK27V0n47YFDzLSbGbnsFsppC_zc='),
(20, 2, 14, 'Bakso Malang', 'Bakso Malang adalah hidangan bakso khas Malang yang dikenal dengan variasi isiannya yang lengkap. Dalam satu mangkuk, biasanya terdapat bakso daging sapi, siomay, tahu isi, pangsit rebus, dan pangsit goreng, serta tambahan mie atau bihun. Kuahnya jernih dengan cita rasa gurih dan segar dari rebusan tulang sapi dan bumbu rempah.', 'https://images.pexels.com/photos/16201174/pexels-photo-16201174.jpeg'),
(21, 3, 14, 'Baju Mantenan Jawa Timur', 'Baju Mantenan adalah pakaian adat yang biasa dipakai pada prosesi pernikahan tradisional di Jawa Timur. Warnanya cenderung elegan—merah marun, hitam, atau keemasan—dengan detail bordir dan aksesori seperti kalung serta mahkota kecil. Pria biasanya mengenakan beskap dan jarik, sementara perempuan memakai kebaya yang dipadukan dengan sanggul berhias bunga segar. Keseluruhan tampilannya melambangkan keanggunan dan kehormatan dalam sakralnya pernikahan adat Jawa Timur.', 'https://i.pinimg.com/736x/0d/bd/24/0dbd24f8f2ad687d7e9a7a42254a59fe.jpg'),
(22, 3, 1, 'Kebaya Rancongan', 'Kebaya Rancongan adalah kebaya khas Madura dengan warna cerah seperti merah, fuchsia, atau ungu. Modelnya ramping dan menonjolkan siluet pemakainya, dilengkapi kain batik bermotif khas Madura. Kebaya ini identik dengan karakter masyarakat Madura yang berani dan penuh percaya diri. Biasanya dipakai saat upacara adat, acara penting, atau pertunjukan budaya.', 'https://i.pinimg.com/736x/a2/37/f3/a237f3e445711da66a8feccf9e8a8398.jpg'),
(23, 3, 1, 'Pesa’an', 'Pesa’an adalah pakaian adat laki-laki Madura yang terkenal dengan kaos belang merah-hitam dan celana longgar berwarna gelap. Kadang disertai selendang sarung dan ikat kepala. Tampilannya sederhana, tapi punya makna keberanian dan kerja keras yang merepresentasikan karakter orang Madura. Pesa’an umumnya dipakai dalam acara adat, kesenian Karapan Sapi, atau penyambutan tamu kehormatan.', 'https://i.pinimg.com/736x/9d/15/4c/9d154c9c24305dcccc02266a52982256.jpg'),
(24, 3, 14, 'Busana Cak & Ning Surabaya', 'Busana ini dipakai oleh finalis duta pariwisata kota Surabaya, yaitu Cak (pria) dan Ning (wanita). Cak biasanya mengenakan beskap dengan jarik atau celana formal, dipadukan udeng. Sementara Ning memakai kebaya elegan berwarna lembut dengan kain batik. Busana ini menggambarkan perpaduan budaya tradisional dan vibe modern Kota Surabaya.', 'https://i.pinimg.com/736x/4e/12/4a/4e124ac128aff441c2658f5119ee9c99.jpg'),
(25, 3, 1, 'Odheng Santapan', 'Odheng adalah ikat kepala yang dipakai laki-laki Madura. Terdapat berbagai jenis odheng, dan salah satunya adalah Odheng Santapan yang biasanya dipakai di acara resmi dan acara adat. Motif kainnya punya filosofi tertentu, misalnya keberanian atau kehormatan. Walau terlihat sebagai aksesori, odheng punya makna status sosial dan identitas budaya.', 'https://i.pinimg.com/736x/23/42/c5/2342c57840184dd26d1025cc0d7858aa.jpg'),
(26, 3, 11, 'Pakaian Adat Tengger', 'Pakaian ini dipakai masyarakat suku Tengger yang tinggal di kawasan Gunung Bromo. Pria mengenakan baju lengan panjang dengan sarung atau selendang bermotif kotak-kotak yang diselempangkan di bahu. Perempuan memakai kebaya dengan kain tebal untuk menahan dingin. Pakaian ini jadi identitas kuat masyarakat pegunungan yang sederhana dan memegang tradisi leluhur.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1Czv3oYvBL4aGck0t5F7zntpUTjVx7JUoxA&s'),
(27, 3, 14, 'Kebaya Arek Surabaya', 'Kebaya Arek adalah kebaya khas perempuan Surabaya. Modelnya simpel, tidak serumit kebaya Jawa Tengah, dan lebih fleksibel dipakai untuk aktivitas formal maupun santai. Kebaya Arek melambangkan karakter perempuan Surabaya yang tegas, mandiri, dan enerjik—praktis tapi tetap anggun.', 'https://i.pinimg.com/736x/d7/eb/81/d7eb811269cf9ca46acdd6db919e3354.jpg'),
(28, 3, 2, 'Baju Manten Osing', 'Baju Manten Osing merupakan pakaian adat pengantin dari suku Osing, Banyuwangi. Ciri khasnya adalah warna hitam dengan ornamen emas yang mencolok. Pengantin perempuan memakai mahkota jamang, sedangkan pengantin pria memakai ikat kepala khas Osing. Pakaian ini memberi kesan megah, eksotis, dan sarat makna spiritual.', 'https://i.pinimg.com/736x/ec/68/b9/ec68b9a7d1ccd6202929f85c39f81370.jpg'),
(29, 3, 2, 'Kebaya Osing', 'Kebaya Osing memiliki warna cerah dengan motif renda dan payet. Umumnya dipakai pada pertunjukan seni seperti Tari Gandrung. Kebaya ini menunjukkan karakter masyarakat Osing yang ceria, ramah, dan memiliki tradisi seni yang kuat. Desainnya yang penuh warna membuatnya berbeda dari kebaya Jawa pada umumnya.', 'https://i.pinimg.com/736x/48/90/6b/48906b5a932b46778c5f655f78640385.jpg'),
(30, 3, 14, 'Beskap Jawa Timur', 'Beskap adalah pakaian adat pria yang biasa dipakai dalam acara resmi atau penyambutan tamu kehormatan. Modelnya berkerah tinggi dengan kancing di bagian samping, dipadukan dengan kain jarik. Beskap versi Jawa Timur memiliki potongan lebih sederhana dibandingkan Jawa Tengah, mencerminkan karakter masyarakat Jawa Timur yang tegas dan lugas.', 'https://i.pinimg.com/736x/b2/cf/c6/b2cfc61ea1a217dd2839d823c88c57ac.jpg'),
(31, 4, 2, 'Borong Ider Bumi', 'Tradisi Borong Ider Bumi berasal dari masyarakat Banyuwangi, Jawa Timur. Tradisi ini dilakukan sebagai ungkapan rasa syukur atas hasil bumi yang melimpah dan untuk menjaga keseimbangan alam. Masyarakat mengarak hasil panen, hewan ternak, dan sesaji keliling desa sambil melantunkan doa agar desa selalu terhindar dari mara bahaya. Upacara ini memperkuat rasa kebersamaan warga sekaligus menjadi simbol harmonisasi manusia dengan alam.', 'https://i.pinimg.com/736x/90/63/39/906339e4fd75faa82905ee8afc668eac.jpg'),
(32, 4, 14, 'Bebaritan', 'Bebaritan adalah tradisi syukuran masyarakat pedesaan di Jawa Timur yang biasanya dilakukan setelah panen padi. Warga berkumpul di sawah atau balai desa dengan membawa nasi tumpeng, lauk pauk, dan hasil bumi untuk disantap bersama. Ritual ini tidak hanya sebagai bentuk rasa syukur kepada Tuhan, tetapi juga mempererat hubungan sosial melalui gotong royong dan kebersamaan antarwarga.', 'https://i.pinimg.com/736x/9c/2d/6c/9c2d6cff3aa68637783bd57ea2c7964a.jpg'),
(33, 4, 12, 'Grebeg Suro', 'Grebeg Suro adalah tradisi khas Ponorogo yang dilaksanakan setiap bulan Suro dalam penanggalan Jawa. Kegiatan utama meliputi kirab pusaka dan pertunjukan kesenian, termasuk reog Ponorogo. Tradisi ini memiliki makna spiritual untuk membersihkan diri dari hal-hal buruk dan menjaga hubungan harmonis dengan Sang Pencipta. Selain itu, Grebeg Suro kini menjadi daya tarik wisata budaya di Jawa Timur.', 'https://i.pinimg.com/736x/ff/9d/d4/ff9dd444ecd0e2239661f480fe182c09.jpg'),
(34, 4, 2, 'Unan-Unan', 'Unan-Unan adalah ritual adat masyarakat Osing di Banyuwangi yang dilakukan setiap delapan tahun sekali. Tujuan utamanya adalah tolak bala, keselamatan desa, dan introspeksi bagi masyarakat. Prosesi berlangsung meriah dengan arak-arakan, sesaji, dan doa bersama. Tradisi ini menjadi simbol identitas budaya masyarakat Osing sekaligus warisan leluhur yang terus dijaga.', 'https://i.pinimg.com/736x/1c/3a/cd/1c3acd44d4a05d5a6788094f5ca6c176.jpg'),
(35, 4, 14, 'Ludruk', 'Ludruk adalah pertunjukan teater tradisional khas Jawa Timur yang dimainkan oleh kelompok pria. Ceritanya biasanya menggambarkan kehidupan sehari-hari masyarakat, penuh kritik sosial, humor, dan pesan moral. Ludruk diawali dengan tari pembuka seperti tari Remo dan diiringi musik gamelan. Keunikannya terletak pada kemampuannya menghibur sekaligus memberikan nasihat, menjadikannya salah satu kesenian identitas budaya Jawa Timur.', 'https://i.pinimg.com/736x/2b/d2/42/2bd242c1c898e670414a2d622a425439.jpg'),
(36, 4, 12, 'Reog Ponorogo', 'Reog Ponorogo merupakan kesenian tradisional dari Ponorogo yang menampilkan penari dengan topeng besar berbentuk singa (barongan) dihiasi bulu merak. Pertunjukan diiringi musik gamelan khas dan gerakan tari penuh energi. Ceritanya berkaitan dengan legenda, kepahlawanan, dan nilai spiritual. Keunikan Reog terletak pada kekuatan fisik penarinya yang mampu mengangkat barongan seberat lebih dari 50 kg hanya dengan gigi. Reog menjadi simbol kebanggaan budaya Ponorogo dan dikenal hingga mancanegara.', 'https://i.pinimg.com/736x/6f/b6/b5/6fb6b511af876e548d37ac46888e484c.jpg'),
(37, 4, 14, 'Tari Remo', 'Tari Remo adalah tarian khas Jawa Timur yang awalnya digunakan sebagai pembuka pertunjukan Ludruk. Gerakannya lincah dan semangat, diiringi tabuhan gamelan dinamis. Penari mengenakan kostum cerah dengan hiasan kepala khas Jawa Timur. Tari Remo tidak hanya menghibur tetapi juga menjadi media ekspresi budaya dan identitas masyarakat, sering ditampilkan dalam festival budaya maupun acara penyambutan tamu penting.', 'https://i.pinimg.com/736x/0e/87/9b/0e879b20d6761774b14f1c516c5ce808.jpg'),
(38, 4, 14, 'Wayang Kulit Jawa Timur', 'Wayang Kulit Jawa Timur adalah pertunjukan tradisional yang memadukan seni rupa, musik, dan sastra. Dalang memainkan wayang dari kulit kerbau di depan layar dengan bantuan cahaya lampu. Cerita biasanya diambil dari epos Mahabharata atau Ramayana, dikemas dengan bahasa dan humor khas Jawa Timur. Keunikan terletak pada gaya bahasa lugas dan irama gamelan cepat. Wayang kulit menjadi media penyampaian nilai moral, spiritual, dan hiburan.', 'https://i.pinimg.com/736x/cf/11/b3/cf11b387c61ff3b2ee4b0009de10561c.jpg'),
(39, 4, 14, 'Ketoprak/Campursari', 'Ketoprak adalah pertunjukan teater rakyat yang menggabungkan drama, musik, dan lagu tradisional khas Jawa Timur. Ceritanya biasanya menceritakan legenda, sejarah, atau kehidupan sehari-hari masyarakat. Pertunjukan ini disertai gamelan, sinden, dan dialog khas yang interaktif dengan penonton. Ketoprak berfungsi sebagai hiburan sekaligus sarana pendidikan moral dan budaya, menjaga tradisi teater rakyat tetap hidup di era modern.', 'https://i.pinimg.com/736x/0b/26/8f/0b268f8bf3654f73c0c1d6665e6b780f.jpg'),
(40, 4, 14, 'Jaranan/Kuda Lumping', 'Jaranan, atau Kuda Lumping, adalah kesenian tradisional yang menampilkan penari menunggang replika kuda dari anyaman bambu. Tarian ini diiringi musik gamelan dan kendang. Penari terkadang melakukan atraksi trance untuk menambah keseruan pertunjukan. Jaranan memiliki makna spiritual sebagai ritual syukuran dan hiburan rakyat, sekaligus melestarikan identitas budaya Jawa Timur.', 'https://i.pinimg.com/736x/31/dd/51/31dd51938a248e3103ffa1a4bab5bd4d.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
