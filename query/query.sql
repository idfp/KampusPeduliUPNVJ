-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: kampuspeduliupnvj
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `donations`
--

DROP TABLE IF EXISTS `donations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `donations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `donor_name` varchar(100) NOT NULL,
  `total_donations` decimal(10,2) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `payment` varchar(100) NOT NULL,
  `donation_message` text DEFAULT NULL,
  `status` enum('completed','pending','failed') DEFAULT 'pending',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `donations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donations`
--

LOCK TABLES `donations` WRITE;
/*!40000 ALTER TABLE `donations` DISABLE KEYS */;
INSERT INTO `donations` VALUES (1,1,'Andi Sutanto',150000.00,'2024-12-02 15:43:29','Gopay','Senang bisa membantu!','completed'),(2,2,'Budi Wijaya',300000.50,'2024-12-02 15:43:29','QRIS','Semoga bermanfaat!','completed'),(3,3,'Citra Puspita',100000.25,'2024-12-02 15:43:29','Dana','Semoga sukses terus.','pending'),(4,4,'Dewi Lestari',500000.00,'2024-12-02 15:43:29','QRIS','Untuk masyarakat yang lebih baik.','completed'),(5,5,'Eko Pratama',200000.75,'2024-12-02 15:43:29','Dana','Donasi untuk kemajuan bersama.','failed'),(6,6,'Fajar Santoso',80000.00,'2024-12-02 15:43:29','Gopay','Semoga membantu!','completed'),(7,7,'Gita Sari',700000.00,'2024-12-02 15:43:29','QRIS','Saya mendukung kegiatan ini!','completed'),(8,8,'Hendra Kurniawan',150000.00,'2024-12-02 15:43:29','Dana','Sumbangan kecil untuk perubahan besar.','pending'),(9,9,'Ika Suryani',250000.50,'2024-12-02 15:43:29','Gopay','Harapanku semoga bisa membantu.','completed'),(10,10,'Joko Wibowo',125000.00,'2024-12-02 15:43:29','Dana','Semoga berjalan dengan lancar.','completed');
/*!40000 ALTER TABLE `donations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category` enum('Pendidikan','Bencana Alam','Sosial') DEFAULT NULL,
  `donation` decimal(10,2) DEFAULT NULL,
  `donation_target` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (1,'Membantu Anak Anak Mendapatkan Pendidikan Yang Lebih Layak','Pendidikan adalah kunci untuk mengubah hidup. Dengan mendukung kampanye ini, Donasi Anda akan digunakan untuk membangun sekolah, melatih guru, dan menyediakan fasilitas belajar yang memadai.','Pendidikan',3000000.00,3500000.00),(2,'Membantu Dalam Bentuk Finansial Untuk Korban Bencana Alam','Bencana alam telah merenggut banyak hal dari mereka. Mari ulurkan tangan dengan memberikan bantuan finansial untuk meringankan beban para korban. Donasi Anda akan digunakan untuk memenuhi kebutuhan mendesak mereka seperti makanan, pakaian, obat-obatan, dan tempat tinggal sementara.','Bencana Alam',1000000.00,7500000.00),(3,'Membantu Anak - Anak di Panti Asuhan','Yuk, jadi pahlawan bagi anak-anak yang membutuhkan! Donasi Anda, sekecil apapun, akan sangat berarti bagi mereka. Mari bersama-sama berikan senyuman dan harapan baru bagi anak-anak di panti asuhan.','Sosial',1000000.00,7500000.00),(4,'Adik - adik di pondok pesantren asy-syifa perlu bantuan','Adik-adik di Pondok Pesantren Asy-Syifa membutuhkan bantuan kita. Donasi Anda akan digunakan untuk memenuhi kebutuhan sehari-hari, biaya pendidikan, dan perbaikan fasilitas pondok','Pendidikan',2000000.00,10000000.00),(5,'Mari kita membantu adik naufan yang mengalami musibah kebakaran','Kebakaran telah meluluh lantakkan rumah adik Naufan. Donasi Anda akan digunakan untuk membantu mereka membangun kembali rumah dan memenuhi kebutuhan sehari-hari','Sosial',1000000.00,15000000.00),(6,'Bantu Korban Banjir Desa Bayung Sedayu! Waktu Mendesak!','Banjir di Desa Bayung Sedayu membutuhkan penanganan segera. Warga sangat membutuhkan bantuan makanan siap saji, air bersih, obat-obatan, dan pakaian bersih. Banyak di antara mereka kehilangan tempat tinggal dan harta benda. Mari kita bergerak cepat untuk memberikan bantuan yang mereka butuhkan sebelum situasi semakin memburuk','Bencana Alam',2000000.00,10000000.00),(7,'Bantu Tim Robotik Kita Raih Juara Dunia!','Ajang kompetisi robotik internasional menanti tim kami. Sayangnya, keterbatasan dana membuat kami kesulitan untuk mengembangkan robot yang lebih canggih dan kompetitif. Kami membutuhkan dukungan Anda untuk membiayai pembuatan prototipe, pengadaan komponen elektronik, serta biaya pelatihan intensif. Dengan dukungan Anda, kami yakin dapat meraih prestasi terbaik dan mengharumkan nama Indonesia di dunia robotika','Pendidikan',4500000.00,10000000.00);
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `donation_id` int(11) DEFAULT NULL,
  `report_date` datetime DEFAULT current_timestamp(),
  `details` text DEFAULT NULL,
  `impact` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `donation_id` (`donation_id`),
  CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`donation_id`) REFERENCES `donations` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reports`
--

LOCK TABLES `reports` WRITE;
/*!40000 ALTER TABLE `reports` DISABLE KEYS */;
INSERT INTO `reports` VALUES (1,1,'2023-10-01 10:30:00','Dana digunakan untuk pengembangan komunitas','Meningkatkan kesadaran 500 orang','2024-12-02 15:44:13','2024-12-02 15:44:13'),(2,2,'2023-10-05 12:45:00','Donasi dialokasikan untuk peralatan sekolah','Memberikan bahan ajar untuk 3 sekolah','2024-12-02 15:44:13','2024-12-02 15:44:13'),(3,3,'2023-10-10 09:00:00','Mengadakan acara komunitas','Memberikan manfaat kepada 200 warga','2024-12-02 15:44:13','2024-12-02 15:44:13'),(4,4,'2023-10-15 14:30:00','Pembelian peralatan medis','Membantu 50 keluarga','2024-12-02 15:44:13','2024-12-02 15:44:13'),(5,5,'2023-10-20 08:15:00','Dana dialokasikan untuk pendidikan','Meningkatkan fasilitas sekolah','2024-12-02 15:44:13','2024-12-02 15:44:13'),(6,6,'2023-10-25 11:00:00','Mendukung distribusi makanan','Menyediakan 400 makanan','2024-12-02 15:44:13','2024-12-02 15:44:13'),(7,7,'2023-10-30 15:45:00','Pembelian bahan ajar','Memberikan dukungan kepada 300 anak','2024-12-02 15:44:13','2024-12-02 15:44:13'),(8,8,'2023-11-01 13:20:00','Inisiatif kesehatan masyarakat','Melayani lebih dari 100 keluarga','2024-12-02 15:44:13','2024-12-02 15:44:13'),(9,9,'2023-11-05 09:55:00','Menyponsori acara lokal','Mengajak lebih dari 250 peserta','2024-12-02 15:44:13','2024-12-02 15:44:13'),(10,10,'2023-11-10 16:40:00','Pengembangan sumber daya online','Menjangkau 1.000?penonton','2024-12-02 15:44:13','2024-12-02 15:44:13');
/*!40000 ALTER TABLE `reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Andi Sutanto','andi.sutanto@example.com','ef92b778bafe771e89245b89ecbc47d5f0918e4c4721aa3959d08f6e8b790b22','2024-12-02 15:42:03','2024-12-02 15:42:03',NULL),(2,'Budi Wijaya','budi.wijaya@example.com','8d969eef6ecad3c29a3a629280e686cff8ca45306f1cf0a3a78f6a5e3697f3c7','2024-12-02 15:42:03','2024-12-02 15:42:03',NULL),(3,'Citra Puspita','citra.puspita@example.com','65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5','2024-12-02 15:42:03','2024-12-02 15:42:03',NULL),(4,'Dewi Lestari','dewi.lestari@example.com','0b14d501a594442a01c6859541bcb3e8164d183d32937b851835442f69d5c94e','2024-12-02 15:42:03','2024-12-02 15:42:03',NULL),(5,'Eko Pratama','eko.pratama@example.com','69ebd8a0b6da0ecb4f7624572bd1d746717ae29615071b67d16aa786fa31c919','2024-12-02 15:42:03','2024-12-02 15:42:03',NULL),(6,'Fajar Santoso','fajar.santoso@example.com','673d190b758967621da243f06c350ce68be4276174dc886560239fea923d4a5a','2024-12-02 15:42:03','2024-12-02 15:42:03',NULL),(7,'Gita Sari','gita.sari@example.com','5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5','2024-12-02 15:42:03','2024-12-02 15:42:03',NULL),(8,'Hendra Kurniawan','hendra.kurniawan@example.com','6ca13d52ca70c883e0f0bb101e425a89e8624de51db2d2392593af6a84118090','2024-12-02 15:42:03','2024-12-02 15:42:03',NULL),(9,'Ika Suryani','ika.suryani@example.com','9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08','2024-12-02 15:42:03','2024-12-02 15:42:03',NULL),(10,'Joko Wibowo','joko.wibowo@example.com','9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08','2024-12-02 15:42:03','2024-12-02 15:42:03',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-08 20:34:56
