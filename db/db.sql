-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.13-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for ujianonline
CREATE DATABASE IF NOT EXISTS `ujianonline` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ujianonline`;


-- Dumping structure for table ujianonline.tb_hasil
CREATE TABLE IF NOT EXISTS `tb_hasil` (
  `user` varchar(20) DEFAULT NULL,
  `mapel` varchar(50) DEFAULT NULL,
  `tgl_tes` date DEFAULT NULL,
  `nilai` int(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table ujianonline.tb_hasil: 4 rows
/*!40000 ALTER TABLE `tb_hasil` DISABLE KEYS */;
INSERT INTO `tb_hasil` (`user`, `mapel`, `tgl_tes`, `nilai`) VALUES
	('yohan', 'Teknik Mesin', '2016-07-17', 5),
	('apre', 'Teknik Otomotif', '2016-07-17', 50),
	('zaki a agha', 'Teknik Multimedia', '2016-07-17', 5),
	('toto', 'Teknik Mesin', '2016-06-05', 2);
/*!40000 ALTER TABLE `tb_hasil` ENABLE KEYS */;


-- Dumping structure for table ujianonline.tb_mapel
CREATE TABLE IF NOT EXISTS `tb_mapel` (
  `mapel_id` int(5) NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(25) DEFAULT NULL,
  `total_pertanyaan` int(3) DEFAULT NULL,
  PRIMARY KEY (`mapel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table ujianonline.tb_mapel: 3 rows
/*!40000 ALTER TABLE `tb_mapel` DISABLE KEYS */;
INSERT INTO `tb_mapel` (`mapel_id`, `nama_mapel`, `total_pertanyaan`) VALUES
	(1, 'Teknik Mesin', 15),
	(2, 'Teknik Multimedia', 10),
	(3, 'Teknik Otomotif', 15);
/*!40000 ALTER TABLE `tb_mapel` ENABLE KEYS */;


-- Dumping structure for table ujianonline.tb_pertanyaan
CREATE TABLE IF NOT EXISTS `tb_pertanyaan` (
  `id_pertanyaan` int(5) NOT NULL AUTO_INCREMENT,
  `mapel_id` int(5) NOT NULL,
  `desk_pertanyaan` varchar(150) DEFAULT NULL,
  `pilihan1` varchar(75) DEFAULT NULL,
  `pilihan2` varchar(75) DEFAULT NULL,
  `pilihan3` varchar(75) DEFAULT NULL,
  `pilihan4` varchar(75) DEFAULT NULL,
  `benar` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_pertanyaan`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- Dumping data for table ujianonline.tb_pertanyaan: 45 rows
/*!40000 ALTER TABLE `tb_pertanyaan` DISABLE KEYS */;
INSERT INTO `tb_pertanyaan` (`id_pertanyaan`, `mapel_id`, `desk_pertanyaan`, `pilihan1`, `pilihan2`, `pilihan3`, `pilihan4`, `benar`) VALUES
	(1, 2, 'Yang tida termasuk generasi microsoft windows adalah ?', 'Windows 98', 'Windows ME/2000', 'Window XP', 'Ubuntu', 4),
	(2, 2, 'Apa kepanjangan dari GUI ?', 'Graphical User Interface', 'Graphical User International ', 'Graphical Unit Interface', 'Graphical Unit Indonesia', 1),
	(3, 2, 'Kelebihan proses intstalasi dengan menggunakan sysem berbasis GUI adalah ?', 'Lebih mudah untuk dipahami', 'Proses penginstalan tidak terlalu lama', 'Perintah perintah dalam proses penginstalan ditampilkan dengan jelas', 'Proses penginstalan tidak terlalu rumit karena ditampilkan dengan jelas ', 3),
	(4, 2, 'Yang dimaksud dengan proses"Instalasi" adalah ?', 'Memindah data dari media penyimpanan komputer', 'Perintah-perintah untuk menjalankan suatu proses', 'Menyalin file-file dari program yang bersangkutan ke media penyimpanan dan ', 'Membuat program yang belum ada menjadi ada ', 3),
	(5, 2, 'Sebagai jembatan antara pengguna(user) dan perangkat lunak(software) merupakan kegunaan dari ?', 'System resource', 'System operasi', 'Brainware', 'DOS', 2),
	(6, 2, 'Sistem operasi windows dibuat oleh ?', 'Microsoft', 'Linux', 'Supercall', 'Chi writer', 1),
	(7, 2, 'Salah satu kelebihan dari LINUX adalah dual boot, yaitu ?', 'Dapat dijalankan bersama system operasi yang lain ', 'Dapat dijalankan oleh lebih dari satu pengguna', 'Dapat dijalankan di lebih satu komputer', 'Memiliki lebih dari satu versi ', 1),
	(8, 2, 'Mampu menjalankan beberapa proses atau beberapa program dalam satu waktu merupakan pengertian dari ?', 'Multi use', 'Multi player', 'Open source', 'Multi tasking', 4),
	(9, 2, 'Apa yang diperlukan jika menginstall komputer dari CD ?', 'Disket', 'Cd Bootable', 'Harddisk', 'Micro SD', 2),
	(10, 2, 'Jelaskan fungsi dari network device pada PC ?', 'Menghubungkan PC dengan printer dan scanner ', 'Menghubungkan PC yang ada ke jaringan internet ', 'Menghubungkan sebuah PC ke dalam jaringan komputer menggunakan cabel ', 'Menghubungkan PC ke dalam jaringan komputer ', 3),
	(11, 2, 'Bagian kelengkapan scanner yang berfungsi menyuplai listrik adalah ?', 'Scanner', 'Software Driver', 'Software Scanner ', 'Power Suplly', 4),
	(12, 2, 'Format file gambar yang dikhususkan untuk aplikasi adobe photoshop untuk mempermudah proses editing gambar yaitu ?', 'JPEG', 'GIF', 'PSD', 'PSF', 3),
	(13, 2, 'Shortcut untuk menutup aplikasi Corel Draw adalah ?', 'Ctrl+ C', 'Ctrl +V', 'Alt +F4', 'Alt  + x', 3),
	(14, 2, 'Apa yang dimaksud resolusi gambar ?', 'Jumlah pixel per meter ', 'Jumlah pixel per milimeter', 'Jumlah pixel per inch', 'Jumlah pixel per centimeter', 4),
	(15, 2, 'Tool dalam adobe photoshop 6.0 untuk membuat gambar dengan memakai kuas adalah ?', 'Pencil brush ', 'Spray brush ', 'Eraser', 'Paint brush ', 4),
	(16, 1, 'Kikir adalah alat perkakas tangan yang berguna untuk pengikiran benda kerja. Dilihat dari bentuk penampangnya kikir ada beberapa macam. Apakah kegunaa', 'Untuk pengikiran benda datar ', 'Untuk pengikiran bidag yang besar', 'Untuk pengikiran penampang persegi ?', 'Untuk pengikiran lubang segitiga ', 1),
	(17, 1, 'Alat yang sangat teliti untuk mengukur atau memeriksa permukaan suat benda baik datar atau lurus maupun tirus adalah ?', 'Jangka sorong ', 'Dial indicactor ', 'Mikrometer', 'jangka tusuk ', 2),
	(18, 1, 'Tujuan kita menggunakan kacamata/pelindung mata dalam penggerindingan adalah ?', 'Menghindar sinar ultra violet masuk ke mata ', 'Menghindari mata dari asap batu gerindra ', 'Menghindari maata dari siraman air pendingin penggerindaan ', 'Menghindari mata dari bram-bram penggerindaan ', 4),
	(19, 1, 'Untuk menghaluskan permukaan yang berbentuk V (menyudut) dipaai kikir ?', 'Kikir plat ', 'Kikir segi empat ', 'Kikir silang ', 'Kikir segitiga', 4),
	(20, 1, 'Fungsi dari alat pelindung tangan (sarung tangan) asbes adalah ?', 'Untuk memperkuat pegangan supaya tidak meleset', 'Untuk melindungi tangan dari bahaya pembakaran api  ', 'Untuk melindungi dari ketajaman duri ', 'Untuk melindungi tangan dari unsur kimia ', 2),
	(21, 1, 'Pergerakan jarum pada dial indikator 0 sampai ke angka 20 berarti ?', 'Tirus benda itu 20 X 1 mm', 'Tirus benda itu 20 X 0,1 mm', 'Tirus benda itu 20 X 0,01 mm', 'Tirus benda itu 20 X 0,0001 mm', 3),
	(22, 1, 'Apakah maksud dari taper attachment dalam pembubutan ?', 'Cara pembubutan  ulir dalam pembubutan ', 'Cara pengeboran dalam pembubuta ', 'Cara pembuatan ulir dalam pembubutan ', 'Cara pembuatan tirus dalam pembubutan ', 4),
	(23, 1, 'Perintah G02 pada mesin CNC adalah perintah yang berarti pahat bergerak relative ?', 'Membentuk sudut ', 'Lurus melintang ', 'Melingkar berlawanan searah jarum jam ', 'Melingkar searah jarum jam ', 4),
	(24, 1, 'Peirntah G 84 adalah perintah untuk ?', 'Siklus penguliran ', 'Siklus pembubutan memanjang', 'Siklus pembubutan sekali jalan ', 'Siklus pengaluran ', 2),
	(25, 1, 'Untuk mengetahui ketepatan posisi permukaan pahat pada mesin CNC dilakukan dengan cara ?', 'Uji konpensasi pahat ', 'Uji lintasan pahat ', 'Uji coba program ', 'Uji coba putaran mesin ', 1),
	(26, 1, 'Alat yang digunakan untuk mengukur diameter ulir adalah ?', 'Mal ullir', 'Mistar baja', 'Mistar sorong ', 'Micrometer ulir ', 4),
	(27, 1, 'Pahat bubut yang digunakan untuk memperbesar uuran lubang pipa besi adalah ?', 'Pahat bubut rata ', 'Pahat bubut dalam ', 'Pahat bubut ulir ', 'Pahat bubut kiri', 2),
	(28, 1, 'Permukaan ujung benda kerja yang dihasilkan denga cara penyetelan pahat bubut tidak setinggi senter adalah ?', 'Permukaan rata ', 'Permukaan menonjol di tengah ', 'Permukaan cekung ', 'Permukaan cembung ', 3),
	(29, 1, 'Pahat bubut ulir segitiga yang bersudut 600 digunakan untuk membuat ?', 'Ulir withworth', 'Ulir segitiga ', 'Ulir simetris ', 'Ulir trapezium', 3),
	(30, 1, 'Cara pembagian pada kepala pembagi yang menggunakan roda gigi pengganti adalah ?', 'Pembagian sudut ', 'Pembagian langsung', 'Pembagian campuran ', 'Pembagian diferensial ', 3),
	(31, 3, 'Pernyataan dibawah ini adalah fungsi suspensi kecuali ?', 'Menyerap getaran, goncangan, dan kejutan yang terjadi pada kendaraan ', 'Menopang beban kendaraan yang ada di atas sumbu roda ', 'Menjaga keseimbangan geometrik badan kendaraan terhadap roda-roda', 'Menjaga kelurusan roda depan dengan penyeteran wheel aligment ', 4),
	(32, 3, 'Komponen utama sistem suspensi adalah sebagai berikut, kecuali ?', 'Pegas ', 'Roda ', 'Shock absorber', 'Sistim linkage ', 4),
	(33, 3, 'Fungsi dari stabilizer adalah ?', 'Menstabilkan roda depan ', 'Mencegah goncangan yang terjadi kearah sisi kendaraan ', 'Menetralisir kejutan-kejutan dari permukaan jalan', 'Mengontrol gerakan roda-roda baik ke arah sis maupun depan', 1),
	(34, 3, 'Poros dan roda-roda serta komponen lain yang terletak di bawah pegas disebut ', 'Linkage ', 'Suspensi ', 'Sprung weight ', 'unsprung weight ', 4),
	(35, 3, 'Kendaraan yang berpenumpang penuh akan terasa lebih stabil dari pada yang kosong, sebab ?', 'Pegas-pegasnya lebih kokoh', 'Peredam kejut yang digunakan mampu meredam kejutan yang terjadi ', 'Nilai sprung weight lebih besar dari insprung weigt', 'Badan kendaraan lebih kokoh', 3),
	(36, 3, 'Kondisi badan kendaraan yang menyebabkan pegas pada satu sisi lebih panjang adalah ?', 'Rolling ', 'Hopping', 'Yawing', 'Wind-up', 1),
	(37, 3, 'Yangbukan suspensi tipe rigid di bawah ini adalah ?', 'Tipe leading arm dengan lateral ord', 'Tipe macpherson strut ', 'tipe trailing arm denga lateral ord ', 'Tipe tipes gaun ', 2),
	(38, 3, 'Yang termasuk suspensi independen dari suspensi di bawah ini adalah ?', 'Tipe double wishbone ', 'Tipe trailing arm dengan lateral rod', 'Tipe semitrailing  arm ', 'a, dan c benar ', 4),
	(40, 3, 'Suspensi yang digunakan untuk truk da bus adalah ?', 'Suspensi rigid tipe 4 link ', 'Suspensi rigid tipe leading arm dengan lateral lord', 'Suspensi rigrid tipe pegas daun ', 'Suspensi rigrid tipe trailing arm dengan twis boom ', 3),
	(41, 3, 'Yang tidak termasuk sifat-sifat suspensi tipe Machperson stru adlah ?', 'Komponen suspensi sedikit sehingga unspring weight-nya adalah menjadi sedik', 'Konstruksinya rumit dan berat ', 'Ruang engine lebih luas ', 'Jarak titik peyangga suspensial lebih luas ', 2),
	(42, 3, 'Berikut ini bagian-bagian yang terdapat pada blok silinder mesin 2-tak, kecuali ?', 'Lubang slinder', 'Saluran masuk ', 'Saluran bils ', 'Lubang rantai camshaft ', 4),
	(43, 3, 'Hal-hal berikut adalah diakibatan karena kerusakan-kerusakan yang terjadi pada ring piston 2 langkah, kecuali ?', 'Dinding silinder bagian dalam cepat haus ', 'Kerusakan pada batang piston ', 'Suara mesin peincang ', 'Mesin tidak sekunder ', 2),
	(44, 3, 'Berikut sikuls pada mesin 4-tak, kecuali ?', 'Langkah kompresi ', 'Langkah bilas ', 'Langkah Hisap', 'Langkanh buang ', 2),
	(45, 3, 'erikut  komponen penggerak katup yang masuk dalam mekanisme katup, kecuali ?', 'Poros cam ', 'Cam chain atau rantai ACM ', 'Pegas katup ', 'Ring katup ', 3),
	(46, 3, 'Perbandingan kompresi adalah perbandingan volume silinder dengan ?', 'Luas permukaan piston ', 'Volume kompresi ', 'Langkah piston ', 'Jumlah silinder ', 2);
/*!40000 ALTER TABLE `tb_pertanyaan` ENABLE KEYS */;


-- Dumping structure for table ujianonline.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `status` enum('Siswa','Guru') DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table ujianonline.tb_user: 4 rows
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` (`user_id`, `username`, `password`, `nama`, `status`, `jurusan`) VALUES
	(9, 'yohan', '22c22895822830f4f128cd72863c08a2', 'yohan', 'Siswa', 'Teknik Mesin'),
	(8, 'zaki', '9784ea3da268563469df99b2e6593564', 'zaki a agha', 'Siswa', 'Teknik Multimedia'),
	(7, 'yudi', 'c232864d5de2064450915c0b9e4cc0b5', 'Yudhi Yunaidi', 'Guru', '-'),
	(10, 'apre', '39dc67a0bdd49f91cf69465ee2b1c090', 'apre', 'Siswa', 'Teknik Otomotif');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
