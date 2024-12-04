CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    email VARCHAR(100),
    password VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    phone VARCHAR(255)
);

CREATE TABLE donations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    donor_name VARCHAR(100) NOT NULL,
    total_donations DECIMAL(10, 2) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    payment VARCHAR(100) NOT NULL,
    donation_message TEXT,
    status ENUM('completed', 'pending', 'failed') DEFAULT 'pending',
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE reports (
    id INT PRIMARY KEY AUTO_INCREMENT,
    donation_id INT,
    report_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    details TEXT,
    impact TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (donation_id) REFERENCES donations(id)
);
-- Inserting data into the users table
INSERT INTO users (name, email, password) VALUES 
('Andi Sutanto', 'andi.sutanto@example.com', 'ef92b778bafe771e89245b89ecbc47d5f0918e4c4721aa3959d08f6e8b790b22'), -- password123
('Budi Wijaya', 'budi.wijaya@example.com', '8d969eef6ecad3c29a3a629280e686cff8ca45306f1cf0a3a78f6a5e3697f3c7'), -- 123456
('Citra Puspita', 'citra.puspita@example.com', '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5'), -- qwerty
('Dewi Lestari', 'dewi.lestari@example.com', '0b14d501a594442a01c6859541bcb3e8164d183d32937b851835442f69d5c94e'), -- password1
('Eko Pratama', 'eko.pratama@example.com', '69ebd8a0b6da0ecb4f7624572bd1d746717ae29615071b67d16aa786fa31c919'), -- onononononon
('Fajar Santoso', 'fajar.santoso@example.com', '673d190b758967621da243f06c350ce68be4276174dc886560239fea923d4a5a'), -- hash123
('Gita Sari', 'gita.sari@example.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5'), -- 12345
('Hendra Kurniawan', 'hendra.kurniawan@example.com', '6ca13d52ca70c883e0f0bb101e425a89e8624de51db2d2392593af6a84118090'), -- abc123
('Ika Suryani', 'ika.suryani@example.com', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08'), -- test
('Joko Wibowo', 'joko.wibowo@example.com', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08'); -- test

-- Inserting data into the donations table
INSERT INTO donations (user_id, donor_name, total_donations, payment, donation_message, status) VALUES 
(1, 'Andi Sutanto', 150000.00, 'Gopay', 'Senang bisa membantu!', 'completed'),
(2, 'Budi Wijaya', 300000.50, 'QRIS', 'Semoga bermanfaat!', 'completed'),
(3, 'Citra Puspita', 100000.25, 'Dana', 'Semoga sukses terus.', 'pending'),
(4, 'Dewi Lestari', 500000.00, 'QRIS', 'Untuk masyarakat yang lebih baik.', 'completed'),
(5, 'Eko Pratama', 200000.75, 'Dana', 'Donasi untuk kemajuan bersama.', 'failed'),
(6, 'Fajar Santoso', 80000.00, 'Gopay', 'Semoga membantu!', 'completed'),
(7, 'Gita Sari', 700000.00, 'QRIS', 'Saya mendukung kegiatan ini!', 'completed'),
(8, 'Hendra Kurniawan', 150000.00, 'Dana', 'Sumbangan kecil untuk perubahan besar.', 'pending'),
(9, 'Ika Suryani', 250000.50, 'Gopay', 'Harapanku semoga bisa membantu.', 'completed'),
(10, 'Joko Wibowo', 125000.00, 'Dana', 'Semoga berjalan dengan lancar.', 'completed');

-- Inserting data into the reports table
INSERT INTO reports (donation_id, report_date, details, impact) VALUES 
(1, '2023-10-01 10:30:00', 'Dana digunakan untuk pengembangan komunitas', 'Meningkatkan kesadaran 500 orang'),
(2, '2023-10-05 12:45:00', 'Donasi dialokasikan untuk peralatan sekolah', 'Memberikan bahan ajar untuk 3 sekolah'),
(3, '2023-10-10 09:00:00', 'Mengadakan acara komunitas', 'Memberikan manfaat kepada 200 warga'),
(4, '2023-10-15 14:30:00', 'Pembelian peralatan medis', 'Membantu 50 keluarga'),
(5, '2023-10-20 08:15:00', 'Dana dialokasikan untuk pendidikan', 'Meningkatkan fasilitas sekolah'),
(6, '2023-10-25 11:00:00', 'Mendukung distribusi makanan', 'Menyediakan 400 makanan'),
(7, '2023-10-30 15:45:00', 'Pembelian bahan ajar', 'Memberikan dukungan kepada 300 anak'),
(8, '2023-11-01 13:20:00', 'Inisiatif kesehatan masyarakat', 'Melayani lebih dari 100 keluarga'),
(9, '2023-11-05 09:55:00', 'Menyponsori acara lokal', 'Mengajak lebih dari 250 peserta'),
(10, '2023-11-10 16:40:00', 'Pengembangan sumber daya online', 'Menjangkau 1.000 penonton');

CREATE TABLE project (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255),
    description TEXT,
    category ENUM('Pendidikan', 'Bencana Alam', 'Sosial'),
    donation DECIMAL(10,2),
    donation_target DECIMAL(10,2)
);

INSERT INTO project(title, description, category, donation, donation_target) VALUES
('Membantu Anak Anak Mendapatkan Pendidikan Yang Lebih Layak', 'Pendidikan adalah kunci untuk mengubah hidup. Dengan mendukung kampanye ini, Donasi Anda akan digunakan untuk membangun sekolah, melatih guru, dan menyediakan fasilitas belajar yang memadai.', 1, 3000000, 3500000),
('Membantu Dalam Bentuk Finansial Untuk Korban Bencana Alam', 'Bencana alam telah merenggut banyak hal dari mereka. Mari ulurkan tangan dengan memberikan bantuan finansial untuk meringankan beban para korban. Donasi Anda akan digunakan untuk memenuhi kebutuhan mendesak mereka seperti makanan, pakaian, obat-obatan, dan tempat tinggal sementara.', 2, 1000000, 7500000),
('Membantu Anak - Anak di Panti Asuhan', 'Yuk, jadi pahlawan bagi anak-anak yang membutuhkan! Donasi Anda, sekecil apapun, akan sangat berarti bagi mereka. Mari bersama-sama berikan senyuman dan harapan baru bagi anak-anak di panti asuhan.', 3, 1000000, 7500000);


INSERT INTO project(title, description, category, donation, donation_target) VALUES
('Bantu Korban Banjir Desa Bayung Sedayu! Waktu Mendesak!', 'Banjir di Desa Bayung Sedayu membutuhkan penanganan segera. Warga sangat membutuhkan bantuan makanan siap saji, air bersih, obat-obatan, dan pakaian bersih. Banyak di antara mereka kehilangan tempat tinggal dan harta benda. Mari kita bergerak cepat untuk memberikan bantuan yang mereka butuhkan sebelum situasi semakin memburuk', 2, 2000000, 10000000),
('Bantu Tim Robotik Kita Raih Juara Dunia!', 'Ajang kompetisi robotik internasional menanti tim kami. Sayangnya, keterbatasan dana membuat kami kesulitan untuk mengembangkan robot yang lebih canggih dan kompetitif. Kami membutuhkan dukungan Anda untuk membiayai pembuatan prototipe, pengadaan komponen elektronik, serta biaya pelatihan intensif. Dengan dukungan Anda, kami yakin dapat meraih prestasi terbaik dan mengharumkan nama Indonesia di dunia robotika', 1, 4500000, 10000000);