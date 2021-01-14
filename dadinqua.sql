-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2021 at 05:20 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dadinqua`
--

-- --------------------------------------------------------

--
-- Table structure for table `airud`
--

CREATE TABLE `airud` (
  `id_airud` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `foto_aceh` varchar(255) NOT NULL,
  `keterangan_aceh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airud`
--

INSERT INTO `airud` (`id_airud`, `foto`, `keterangan`, `updated_at`, `foto_aceh`, `keterangan_aceh`) VALUES
(1, '023508-profil airud.jpg', 'Polair merupakan singkatan dari Kepolisian Perairan yang termasuk dalam bagian Kepolisian Negara Republik Indonesia. Pada struktur organisasi, Kepolisian Perairan terbentuk dalam satker yang dikenal dengan Direktorat Kepolisian Perairan dimana pada tingkat Mabes berada dibawah Badan Pemeliharaan Keamanan Polri (Baharkam Polri) sedangkan pada tingkat daerah berada dibawah Kepolisian Daerah (Polda). Direktorat Kepolisian Perairan Polda Sumbar yang selanjutnya disingkat Ditpolair Polda Sumbar merupakan unsur pelaksana tugas pokok Polda yang berada dibawah Kapolda, yang bertugas menyelenggarakan fungsi Kepolisian Perairan yang mencangkup patroli, TPTKP Perairan, SAR dan Binmas pantai atau perairan serta pembinaan fungsi kepolisian perairan dalam lingkungan Polda. Ditpolair Polda Sumbar dipimpin oleh seorang Direktur Kepolisian Perairan yang disingkat Dirpolair Polda Sumbar berpangkat Komisaris Besar Polisi (Kombespol). Dalam pelaksanaan tugas, Dirpolair dibantu oleh Wakil Direktur (Wadirpolair), Kepala Bagian Pembinaan Operasional (Kabagbinopsnal), Kepala Sub Bagian Perencanaan dan Administrasi (Kasubbagrenmin), Kepala Sub Direktorat Penegakkan Hukum (Kasubditgakkum), Kepala Satuan Patroli Daerah (Kasatrolda), Kepala Sub Direktorat Fasilitas, Pemeliharaan dan Perbaikan (Kasubditfasharkan) dan Komandan Kapal (Danpal). Kantor Ditpolair Polda Sumbar beralamat Jl. Raya Padang &amp;ndash; Painan KM.16 Padang ini telah memiliki berbagai sarana pendukung seperti dermaga, kapal, peralatan selam, perahu karet dan alat kepolisian lainnya. Dimana semua ini dapat digunakan dalam pelaksanaan tugas dan pelayanan kepada masyarakat.\n', '2020-07-16 02:36:11', '023508-banda aceh.jpg', 'Jumlah penduduk Kota Banda Aceh saat ini adalah 265.111 jiwa dengan kepadatan 43 jiwa/ Ha. Jumlah penduduk laki-laki dan perempuan cukup berimbang. Penduduk Kota Banda Aceh didominasi oleh penduduk berusia muda. Hal ini merupakan salah satu dampak dari fungsi Banda Aceh sebagai pusat pendidikan di Aceh dan bahkan di Pulau Sumatera. Banyak pemuda juga bermigrasi ke Banda Aceh untuk mencari kerja.\n');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `gambar`, `slug`, `judul`, `deskripsi`, `id_kategori`, `created_at`, `updated_at`, `id_user`, `status`) VALUES
(1, '100204-dadinqua.png', 'air-mineral-sehat-dan-menyegarkan', 'Air Mineral Sehat dan Menyegarkan', '<p>Air minum sehat dan menyegarkan, anda bisa mendapatkan itu di Dadin Qua.</p>\n', 1, '2021-01-14 03:02:04', NULL, 19, 1),
(2, '100940-bgku.png', 'cukup-sms-wa-dadin-qua-bisa-anda-dapatkan', 'Cukup SMS/WA, Dadin Qua bisa anda dapatkan!', '<p>Hanya dengan sms/wa, anda bisa mendapatkan dadin qua.</p>\n', 1, '2021-01-14 03:09:40', NULL, 19, 1),
(3, '101120-sterilisasi.jpeg', 'begini-proses-sterilisasi-air-mineral', 'Begini proses sterilisasi Air Mineral', '<p>Sterilisasi adalah proses membunuh semua mikroorganisme berbaha, dari virus, bakteri, spora, dan lain-lain. Bagaimana cara melakukannya?</p>\n\n<p>&nbsp;</p>\n\n<p>Istilah sterilisasi kini bukan lagi hal yang awam di tengah-tengah masyarakat. Sterilisasi adalah proses menghancurkan atau menghilangkan semua mikroorganisme yang dapat mencemari obat-obatan atau bahan lain dan membahayakan kesehatan.Kelompok mikroorganisme yang menjadi target sterilisasi adalah jamur (fungi), protozoa, bakteri pembentuk spora dan bukan pembentuk spora,&nbsp;<a href=\"https://www.sehatq.com/artikel/berapa-lama-virus-corona-bertahan-pada-permukaan-benda\" rel=\"noopener noreferrer\" target=\"_blank\">serta virus</a>. Dengan kata lain, semua mikroorganisme yang membahayakan manusia maupun lingkungan bisa dibunuh dengan sterilisasi.Sterilisasi berbeda dengan sekedar pembersihan maupun disinfektasi. Pembersihan hanya mengurangi kadar zat yang bisa mengontaminasi di sebuah benda, sedangkan disinfeksi menghilangkan sebagian besar mikroorganisme (meski tidak semua).</p>\n\n<h2><strong>Apa saja benda-benda yang harus disterilisasi?</strong></h2>\n\n<p>Sterilisasi biasanya dilakukan pada benda-benda yang berhubungan dengan dunia medis. Dalam hal ini, pentingnya sterilisasi adalah untuk memastikan bahwa instrumen medis dan bedah tidak menularkan patogen infeksi kepada pasien.Perangkat medis harus dipastikan steril ketika digunakan pada pasien karena kontaminasi mikroba apapun akan menularkan penyakit. Barang-barang yang harus disterilisasi ialah instrumen bedah, forcep biopsi, dan perangkat implan.Di luar dunia medis, beberapa benda lain yang sebaiknya dilakukan sterilisasi adalah perlengkapan bayi, seperti botol susu, dot, hingga mainan yang masuk ke mulutnya.&nbsp;<a href=\"https://www.sehatq.com/artikel/mengenal-cara-pompa-asi-yang-benar-dan-berbagai-jenisnya\" rel=\"noopener noreferrer\" target=\"_blank\">Peralatan memerah ASI</a>&nbsp;(air susu ibu) juga harus disterilisasi secara berkala untuk mencegah masuknya bakteri ke air susu perahan.</p>\n\n<h2><strong>Cara sterilisasi yang tepat</strong></h2>\n\n<p>Karena tujuan sterilisasi adalah membunuh mikroorganisme, maka caranya juga harus dilakukan dengan benar. Dalam dunia medis, sterilisasi biasanya dilakukan dengan teknik yang rumit, seperti filtrasi, radiasi ion menggunakan sinar gamma atau elektron, maupun gas ethylene oxide atau formaldehida.Dalam kehidupan sehari-hari, ada beberapa cara sterilisasi sederhana yang dapat dilakukan dengan menggunakan alat-alat yang tersedia di rumah.</p>\n\n<ul>\n	<li>\n	<h3><strong>Merebus</strong></h3>\n	</li>\n</ul>\n\n<p>Untuk melakukan sterilisasi ini, Anda cukup menyediakan panci dan mengisinya hingga batas benda yang akan Anda sterilisasi. Pastikan benda tersebut sepenuhnya terendam air, kemudian tutup panci tersebut.Setelah air mendidih, biarkan selama 10 menit dengan kondisi panci tertutup. Pastikan Anda selalu mengawasi proses sterilisasi ini agar air tidak menguap habis sehingga akan merusak benda yang Anda rebus.Kelebihan metode sterilisasi ini adalah murah dan mudah dilakukan. Hanya saja, benda yang Anda sterilkan dengan cara demikian akan lebih cepat rusak sehingga harus diganti secara berkala.</p>\n\n<ul>\n	<li>\n	<h3><strong>Sterilisasi uap</strong></h3>\n	</li>\n</ul>\n\n<p>Saat ini, banyak jenis alat steril uap yang dijual di pasaran dengan harga yang bervariasi. Alat-alat ini biasanya memerlukan jumlah air yang lebih sedikit dibanding proses perebusan.Ketika Anda menggunakan alat ini untuk&nbsp;<a href=\"https://www.sehatq.com/artikel/jangan-sembarangan-moms-ini-cara-membersihkan-botol-susu-bayi-yang-tepat\" rel=\"noopener noreferrer\" target=\"_blank\">mensterilisasi botol bayi</a>, pastikan lubang botol menghadap ke bawah sehingga uap panasnya akan masuk ke dalam botol dan membunuh mikroorganisme di dalamnya. Pastikan juga Anda mengikuti instruksi penggunaan sesuai jenis produk yang Anda beli.Sterilisasi uap juga dapat dilakukan dengan microwave. Namun, tidak semua benda dapat masuk ke alat ini sehingga Anda harus benar-benar membaca panduan manualnya agar tidak terjadi insiden saat melakukan sterilisasi.</p>\n', 1, '2021-01-14 03:11:20', NULL, 19, 1),
(4, '101313-water sterilizer.jpg', 'alat-alat-sterilitator-air', 'Alat Alat Sterilitator Air', '<p>1 sistem air rumah, Alat sterilisasi air ultraviolet (UV) digunakan sebagai langkah penting untuk membunuh atau menghambat pertumbuhan mikroorganisme. Selama sterilisasi UV, air terkena gelombang sinar ultraviolet pada kecepatan yang terkendali. Bakteri menyerap energi radiasi UV, yang menghancurkan atau menonaktifkan DNA mereka, sehingga mencegah bakteri berkembang biak. Sistem UV dapat mengurangi 99% bakteri di dalam air.</p>\n\n<p>2 aliran berlebih dari ruang reaksi stainless steel yang diimpor 304, melalui pengelasan otomatis, semua bergegas untuk menarik mulut gigi yang diregangkan setelah pengelasan halus tanpa jalan buntu, di dalam dan di luar rongga cermin yang sangat dipoles sangat meningkatkan intensitas radiasi UV, meningkatkan efek bakterisidal</p>\n\n<p>3 lampu UV bertekanan rendah menggunakan merkuri berintensitas tinggi yang diimpor dari Eropa, masa pakai hingga 9000-13000 jam, mendukung ballast elektronik efisiensi tinggi semakin meningkatkan kehidupan seluruh sterilisasi dan efek, sehingga tingkat sterilisasi keseluruhan 99,99%</p>\n', 1, '2021-01-14 03:13:13', '2021-01-14 10:13:20', 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dirpolairud`
--

CREATE TABLE `dirpolairud` (
  `id_dirpolairud` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `link_detail` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dirpolairud`
--

INSERT INTO `dirpolairud` (`id_dirpolairud`, `nama`, `foto`, `link_detail`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'MUHAMAD AHMADIN', '095708-Foto Muhamad Ahmadin.jpg', '#', 'Dadin Qua adalah peyedia air mineral isi ulang\n', '2020-07-15 15:18:09', '2021-01-14 09:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id_faq` int(11) NOT NULL,
  `tanya` varchar(255) NOT NULL,
  `jawab` text NOT NULL,
  `urutan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id_faq`, `tanya`, `jawab`, `urutan`, `id_user`, `created_at`, `updated_at`, `aktif`) VALUES
(1, 'Apakah ada sistem kupon di Dadin Qua', '<p>Ya, di Dadin Qua tersedia beberapa tawaran hadiah dengan cara menukarkan kupon. oke</p>\n', 1, 19, '2020-07-15 15:32:25', '2021-01-13 23:54:23', 1),
(2, 'Berapa harga 1 galon ?', '<p>Hanya dengan Rp. 5000 anda sudah dapat 1 galon air mineral sehat</p>\n', 2, 19, '2020-07-15 15:40:48', '2021-01-14 00:01:06', 1),
(3, 'Teknologi apa yang digunakan untuk sterilisasi air di Dadin Qua ?', '<p><strong>Iron/ Manganese Removal Filter (1 Unit)</strong><br />\nFungsi : Untuk mengurangi kandungan besi/ mangan 80 &ndash; 90<br />\nMerek : YUKI<br />\nTipe : 844 ( Z )<br />\nDimensi : Diameter 8&rdquo; x 44 &ldquo; Tinggi<br />\nTabung : EVI<br />\nMaterial : PE Tekanan 5 Bar<br />\nOperaton : Manual 1 Valve<br />\nControl Valve : Multiport<br />\nMedia : Manganese Zeolet</p>\n\n<p><strong>Carbon Filter (1 Unit)</strong><br />\nFungsi : Untuk mengabsorsi bau, warna<br />\nMerek : YUKI<br />\nTipe : 844 ( C )<br />\nDimensi : Diameter 8&rdquo; x 44 &ldquo; Tinggi<br />\nTabung : EVI<br />\nMaterial : PE Tekanan 5 Bar<br />\nOperaton : Manual 1 Valve<br />\nControl Valve : Multiport<br />\nMedia : Carbon Active</p>\n\n<p><strong>Micro Filter ( 2 Unit)</strong><br />\nTipe : Hausing &amp; Cartridge<br />\nUkuran : 20&rdquo;</p>\n\n<p><strong>Ultraviolet Sterilizer ( 1 Unit)</strong><br />\nFungsi : Untuk mensterilkan air<br />\nTipe : UV S2 QPA<br />\nKapasitas : 2 GPM<br />\nMerek : Sterilight ex Canada</p>\n\n<p><strong>Interconecting Pipe, Valve, fitting dan accessories ( 1 Lot)</strong><br />\nMaterial :&nbsp; PVC Class AW</p>\n', 3, 19, '2020-07-15 15:41:52', '2021-01-13 23:59:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `galeri` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `aktif` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `galeri`, `keterangan`, `aktif`, `id_user`, `created_at`, `updated_at`) VALUES
(1, '101351-Foto Muhamad Ahmadin.jpg', 'Founder Dadin Qua', 1, 19, '2021-01-14 03:13:51', NULL),
(2, '101404-inggit.jpeg', 'Co-Founder Dadin Qua', 1, 19, '2021-01-14 03:14:04', NULL),
(3, '101438-img-avatar-1.jpg', 'Staff', 1, 19, '2021-01-14 03:14:38', NULL),
(4, '101458-avatar-2.jpg', 'Delivery', 1, 19, '2021-01-14 03:14:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `slug_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Berita', 'berita', '2021-01-14 03:00:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `logo_web` varchar(255) NOT NULL,
  `telp1` varchar(50) NOT NULL,
  `telp2` varchar(50) NOT NULL,
  `email1` varchar(80) NOT NULL,
  `email2` varchar(80) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `logo_web`, `telp1`, `telp2`, `email1`, `email2`, `alamat`, `id_user`, `updated_at`) VALUES
(1, '100015-dadinqua.png', '-', '-', 'ahmadinations@gmail.com', 'dadhinz@gmail.com', 'Jawa Barat.', 19, '2021-01-14 10:00:15');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `aktif` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `tipe` int(11) NOT NULL COMMENT '0 = main menu | 1 = submenu',
  `id_parent_menu` int(11) NOT NULL,
  `menu` varchar(150) NOT NULL,
  `link` text NOT NULL,
  `aktif` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `slug_menu` varchar(255) NOT NULL,
  `id_page` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `tipe`, `id_parent_menu`, `menu`, `link`, `aktif`, `urutan`, `slug_menu`, `id_page`) VALUES
(1, 0, 0, 'Beranda', 'beranda', 1, 1, 'beranda', 0),
(2, 0, 0, 'Tentang', 'tentang', 1, 2, 'tentang', 0),
(5, 0, 0, 'Berita', 'berita', 1, 3, 'berita', 0),
(10, 0, 0, 'Informasi', '', 1, 4, 'informasi', 6),
(12, 0, 0, 'Login', '#', 1, 7, 'login', 0),
(13, 1, 12, 'Admin Web', 'manage', 1, 0, 'admin-web', 0),
(18, 0, 0, 'Sosmed', '#', 1, 6, 'sosmed', 0),
(19, 1, 18, 'Youtube Channel Dadin Qua', '#', 1, 1, 'youtube-channel-dadin-qua', 0),
(20, 1, 18, 'Instagram', '#', 1, 2, 'instagram', 0),
(21, 1, 18, 'Facebook', '#', 1, 3, 'facebook', 0),
(22, 1, 18, 'Twitter', '#', 1, 5, 'twitter', 0),
(23, 1, 2, 'Direktur', '', 1, 1, 'direktur', 7);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id_page` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `aktif` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id_page`, `judul`, `deskripsi`, `gambar`, `aktif`, `id_user`, `created_at`, `updated_at`) VALUES
(6, 'Lokasi Dadin Qua', '<p><iframe frameborder=\"0\" height=\"450\" src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.263007180113!2d108.22332631431523!3d-6.73773636775247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ed719186911c3%3A0xa9c044531cfe9316!2sDadin%20Galon!5e0!3m2!1sen!2sid!4v1610592273838!5m2!1sen!2sid\" width=\"600\"></iframe></p>\n', '094445-lokasi dadin.png', 1, 19, '2020-07-17 10:14:40', '2021-01-14 09:44:45'),
(7, 'PROFILE DADIN QUA', '<p>Dadin Qua adalah penyedia isi ulang air mineral dalam bentuk galon dan jeliken.</p>\n', '094325-dadinqua.png', 1, 19, '2020-07-20 05:25:24', '2021-01-14 09:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

CREATE TABLE `statistik` (
  `id_statistik` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `os` varchar(50) NOT NULL,
  `browser` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statistik`
--

INSERT INTO `statistik` (`id_statistik`, `ip`, `os`, `browser`, `tanggal`) VALUES
(1, '36.71.239.100', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-16 19:48:26'),
(2, '36.71.239.100', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-16 19:48:30'),
(3, '36.71.239.100', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-16 19:48:30'),
(4, '36.71.239.100', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-16 19:48:30'),
(5, '36.71.239.100', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-16 19:48:30'),
(6, '36.71.239.100', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-16 19:48:30'),
(7, '36.71.239.100', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-16 19:48:31'),
(8, '36.72.159.179', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-16 21:37:26'),
(9, '36.72.159.179', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-16 23:26:26'),
(10, '36.72.159.179', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-16 23:26:34'),
(11, '36.72.159.179', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-16 23:28:50'),
(12, '36.72.159.179', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-16 23:28:58'),
(13, '36.72.159.179', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-16 23:29:02'),
(14, '36.72.159.179', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-16 23:29:29'),
(15, '36.72.159.179', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-16 23:30:41'),
(16, '36.72.159.179', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-16 23:31:03'),
(17, '36.72.159.179', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-16 23:31:07'),
(18, '36.72.159.179', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-16 23:31:10'),
(19, '36.72.159.179', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-16 23:31:13'),
(20, '36.72.159.179', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-16 23:33:51'),
(21, '36.72.159.179', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-16 23:33:58'),
(22, '36.72.159.179', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-16 23:34:08'),
(23, '36.72.159.179', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-16 23:35:28'),
(24, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 01:10:50'),
(25, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 08:43:37'),
(26, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 08:43:45'),
(27, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 09:03:07'),
(28, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 09:03:15'),
(29, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 09:28:16'),
(30, '10.36.195.55', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 09:55:47'),
(31, '10.36.195.55', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 09:55:47'),
(32, '10.36.195.55', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 14:05:23'),
(33, '10.36.195.55', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 14:05:24'),
(34, '36.71.239.100', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 14:05:32'),
(35, '10.36.195.55', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 14:06:39'),
(36, '10.36.195.55', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 14:06:40'),
(37, '36.71.239.100', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 14:10:37'),
(38, '36.71.239.100', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 14:17:54'),
(39, '36.71.239.100', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 14:18:14'),
(40, '36.71.239.100', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 14:18:25'),
(41, '10.36.195.55', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 14:42:39'),
(42, '10.36.195.55', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 14:42:40'),
(43, '10.36.195.55', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 14:44:52'),
(44, '10.36.195.55', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 15:52:36'),
(45, '10.36.195.55', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 15:52:37'),
(46, '36.71.239.100', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 15:52:50'),
(47, '10.36.195.55', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 16:06:44'),
(48, '36.71.239.100', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 17:00:57'),
(49, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:05:49'),
(50, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:08:25'),
(51, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:09:44'),
(52, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:11:19'),
(53, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:15:33'),
(54, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:17:03'),
(55, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:17:04'),
(56, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:17:08'),
(57, '10.36.195.55', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 17:20:04'),
(58, '10.36.195.55', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 17:20:04'),
(59, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:24:39'),
(60, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:25:20'),
(61, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:26:13'),
(62, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:26:22'),
(63, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:27:25'),
(64, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:33:57'),
(65, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:34:03'),
(66, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:37:41'),
(67, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:38:17'),
(68, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:39:12'),
(69, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:40:09'),
(70, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:40:50'),
(71, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:41:58'),
(72, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:42:36'),
(73, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:43:07'),
(74, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:43:16'),
(75, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:46:22'),
(76, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:46:37'),
(77, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:46:51'),
(78, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:47:26'),
(79, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:47:37'),
(80, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:48:16'),
(81, '36.71.239.100', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 17:48:24'),
(82, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:48:44'),
(83, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:49:58'),
(84, '36.71.239.100', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 17:50:22'),
(85, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-17 17:51:54'),
(86, '36.71.239.100', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 18:11:17'),
(87, '36.71.239.100', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 18:11:59'),
(88, '36.71.239.100', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 18:18:21'),
(89, '36.71.239.100', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 18:18:26'),
(90, '36.71.239.100', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 18:18:30'),
(91, '36.71.239.100', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 18:18:37'),
(92, '36.71.239.100', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 18:19:18'),
(93, '36.71.239.100', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 18:26:58'),
(94, '36.71.239.100', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 18:27:49'),
(95, '36.71.239.100', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 18:28:03'),
(96, '36.71.239.100', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 18:49:44'),
(97, '36.72.94.149', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 21:42:19'),
(98, '36.72.94.149', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-17 21:45:06'),
(99, '125.166.95.73', 'Windows 10', 'Google Chrome v.84.0.4147.89', '2020-07-17 22:07:04'),
(100, '36.72.94.149', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-18 06:18:48'),
(101, '36.72.94.149', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-18 06:18:50'),
(102, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-18 06:51:48'),
(103, '180.245.221.59', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-18 06:53:32'),
(104, '36.72.94.149', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-18 07:16:33'),
(105, '36.72.94.149', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-18 08:11:41'),
(106, '125.166.95.73', 'Windows 10', 'Google Chrome v.84.0.4147.89', '2020-07-18 09:37:58'),
(107, '125.166.95.73', 'Windows 10', 'Google Chrome v.84.0.4147.89', '2020-07-18 09:39:34'),
(108, '125.166.95.73', 'Windows 10', 'Google Chrome v.84.0.4147.89', '2020-07-18 09:39:47'),
(109, '125.166.95.73', 'Windows 10', 'Google Chrome v.84.0.4147.89', '2020-07-18 09:49:09'),
(110, '125.166.95.73', 'Windows 10', 'Google Chrome v.84.0.4147.89', '2020-07-18 09:49:20'),
(111, '125.166.95.73', 'Windows 10', 'Google Chrome v.84.0.4147.89', '2020-07-18 09:49:32'),
(112, '36.72.135.102', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-18 20:57:51'),
(113, '36.72.135.102', 'Unknown', 'Unknown v.N', '2020-07-18 21:00:25'),
(114, '36.72.135.102', 'Linux', 'Google Chrome v.83.0.4103.106', '2020-07-18 21:21:02'),
(115, '36.72.135.102', 'Unknown', 'Unknown v.A', '2020-07-18 21:22:07'),
(116, '114.125.31.3', 'Mac OS X', 'Apple Safari v.13.1.1', '2020-07-18 21:22:17'),
(117, '114.125.14.162', 'Mac OS X', 'Apple Safari v.13.1.1', '2020-07-18 21:23:20'),
(118, '114.125.12.86', 'Mac OS X', 'Apple Safari v.13.1.1', '2020-07-18 21:39:14'),
(119, '36.72.135.102', 'Unknown', 'Unknown v.A', '2020-07-18 21:46:05'),
(120, '182.1.13.239', 'Mac OS X', 'Apple Safari v.13.1.1', '2020-07-18 21:46:09'),
(121, '36.72.135.102', 'Linux', 'Google Chrome v.83.0.4103.106', '2020-07-18 21:46:10'),
(122, '36.68.139.214', 'Windows 10', 'Mozilla Firefox v.69.0', '2020-07-18 22:08:25'),
(123, '36.68.139.214', 'Windows 10', 'Mozilla Firefox v.69.0', '2020-07-18 22:08:52'),
(124, '36.68.139.214', 'Windows 10', 'Mozilla Firefox v.69.0', '2020-07-18 22:09:05'),
(125, '36.68.139.214', 'Windows 10', 'Mozilla Firefox v.69.0', '2020-07-18 22:13:27'),
(126, '36.72.135.102', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-18 22:16:12'),
(127, '36.72.135.102', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-18 22:16:36'),
(128, '36.72.135.102', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-18 22:16:45'),
(129, '36.68.139.214', 'Windows 10', 'Mozilla Firefox v.69.0', '2020-07-18 22:17:33'),
(130, '36.68.139.214', 'Windows 10', 'Mozilla Firefox v.69.0', '2020-07-18 22:17:40'),
(131, '36.72.135.102', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-18 22:18:56'),
(132, '36.72.94.149', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-18 22:19:56'),
(133, '36.72.135.102', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-18 22:49:41'),
(134, '36.72.94.149', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-18 22:50:39'),
(135, '36.72.94.149', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-18 22:50:52'),
(136, '36.72.135.102', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-18 22:57:26'),
(137, '36.72.135.102', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-18 23:10:35'),
(138, '182.1.4.29', 'Mac OS X', 'Apple Safari v.13.1.1', '2020-07-19 06:34:52'),
(139, '182.1.21.170', 'Mac OS X', 'Apple Safari v.13.1.1', '2020-07-19 06:34:53'),
(140, '114.125.15.19', 'Mac OS X', 'Apple Safari v.13.1.1', '2020-07-19 06:40:41'),
(141, '114.125.30.2', 'Mac OS X', 'Apple Safari v.13.1.1', '2020-07-19 06:40:44'),
(142, '36.72.135.102', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-19 08:26:27'),
(143, '36.72.135.102', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-19 09:27:10'),
(144, '36.72.135.102', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-19 16:03:25'),
(145, '180.253.181.232', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-20 09:08:46'),
(146, '180.253.181.232', 'Linux', 'Google Chrome v.4.0', '2020-07-20 09:32:25'),
(147, '180.253.181.232', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-20 09:49:50'),
(148, '180.253.181.232', 'Linux', 'Google Chrome v.4.0', '2020-07-20 09:50:32'),
(149, '103.242.107.235', 'Linux', 'Google Chrome v.4.0', '2020-07-20 09:56:53'),
(150, '180.253.181.232', 'Linux', 'Google Chrome v.4.0', '2020-07-20 10:25:15'),
(151, '180.253.181.232', 'Linux', 'Google Chrome v.4.0', '2020-07-20 10:25:22'),
(152, '180.253.181.232', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-20 10:29:14'),
(153, '103.242.107.235', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-20 10:56:47'),
(154, '103.242.107.235', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-20 11:00:37'),
(155, '103.242.107.235', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-20 12:27:13'),
(156, '103.242.107.235', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-20 12:35:25'),
(157, '103.242.107.235', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-20 12:36:59'),
(158, '103.242.107.235', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-20 12:37:34'),
(159, '103.242.107.235', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-20 12:38:04'),
(160, '103.242.107.235', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-20 12:40:53'),
(161, '103.242.107.235', 'Linux', 'Google Chrome v.4.0', '2020-07-20 12:43:32'),
(162, '180.253.181.232', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-21 13:03:05'),
(163, '180.253.181.232', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-21 13:03:32'),
(164, '114.122.101.228', 'Linux', 'Google Chrome v.4.0', '2020-07-21 13:03:39'),
(165, '180.253.181.232', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-21 13:03:57'),
(166, '180.253.181.232', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-21 13:05:06'),
(167, '180.253.181.232', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-21 13:05:25'),
(168, '114.122.101.228', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-21 13:22:17'),
(169, '114.122.101.228', 'Linux', 'Google Chrome v.4.0', '2020-07-21 13:51:15'),
(170, '180.253.181.232', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-21 15:55:17'),
(171, '180.253.181.232', 'Windows 10', 'Google Chrome v.83.0.4103.116', '2020-07-21 15:55:20'),
(172, '180.253.181.232', 'Linux', 'Google Chrome v.4.0', '2020-07-21 16:46:26'),
(173, '36.72.103.99', 'Linux', 'Google Chrome v.4.0', '2020-07-22 08:39:06'),
(174, '36.72.103.99', 'Linux', 'Google Chrome v.4.0', '2020-07-22 08:39:18'),
(175, '36.72.103.99', 'Linux', 'Google Chrome v.4.0', '2020-07-22 08:39:21'),
(176, '114.122.105.83', 'Windows 10', 'Google Chrome v.84.0.4147.89', '2020-07-22 21:50:45'),
(177, '178.128.57.177', 'Windows 10', 'Google Chrome v.84.0.4147.89', '2020-07-23 19:11:07'),
(178, '178.128.57.177', 'Windows 10', 'Google Chrome v.84.0.4147.89', '2020-07-23 19:11:08'),
(179, '178.128.57.177', 'Windows 10', 'Google Chrome v.84.0.4147.89', '2020-07-23 19:15:01'),
(180, '114.122.74.147', 'Linux', 'Google Chrome v.4.0', '2020-07-24 10:58:19'),
(181, '36.71.236.196', 'Windows 10', 'Google Chrome v.84.0.4147.89', '2020-07-25 22:08:41'),
(182, '114.125.81.70', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-27 20:36:14'),
(183, '10.36.31.73', 'Windows 10', 'Google Chrome v.84.0.4147.89', '2020-07-28 01:17:24'),
(184, '36.72.107.177', 'Linux', 'Google Chrome v.4.0', '2020-07-28 09:37:16'),
(185, '36.72.107.177', 'Linux', 'Google Chrome v.4.0', '2020-07-28 09:38:00'),
(186, '36.72.107.177', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-28 10:09:43'),
(187, '36.71.238.163', 'Linux', 'Google Chrome v.4.0', '2020-07-28 10:29:48'),
(188, '36.71.238.163', 'Linux', 'Google Chrome v.4.0', '2020-07-28 10:30:18'),
(189, '36.72.107.177', 'Linux', 'Google Chrome v.4.0', '2020-07-28 12:25:41'),
(190, '36.71.238.163', 'Linux', 'Google Chrome v.4.0', '2020-07-28 12:50:44'),
(191, '36.71.238.163', 'Linux', 'Google Chrome v.4.0', '2020-07-28 12:52:12'),
(192, '10.36.224.194', 'Windows 10', 'Google Chrome v.84.0.4147.89', '2020-07-28 14:42:21'),
(193, '36.71.237.17', 'Windows 10', 'Google Chrome v.84.0.4147.89', '2020-07-28 14:43:55'),
(194, '36.71.237.17', 'Windows 10', 'Google Chrome v.84.0.4147.89', '2020-07-28 14:43:55'),
(195, '36.71.237.17', 'Windows 10', 'Google Chrome v.84.0.4147.89', '2020-07-28 14:44:22'),
(196, '36.71.237.17', 'Linux', 'Google Chrome v.4.0', '2020-07-28 14:54:08'),
(197, '36.71.237.17', 'Windows 10', 'Google Chrome v.84.0.4147.89', '2020-07-28 14:55:44'),
(198, '124.13.221.93', 'Linux', 'Google Chrome v.4.0', '2020-07-28 15:52:13'),
(199, '124.13.221.93', 'Linux', 'Google Chrome v.4.0', '2020-07-28 15:52:24'),
(200, '108.177.6.59', 'Linux', 'Google Chrome v.4.0', '2020-07-28 15:56:10'),
(201, '108.177.6.59', 'Linux', 'Google Chrome v.4.0', '2020-07-28 15:56:34'),
(202, '108.177.6.59', 'Linux', 'Google Chrome v.4.0', '2020-07-28 15:57:19'),
(203, '108.177.6.59', 'Linux', 'Google Chrome v.4.0', '2020-07-28 15:57:45'),
(204, '108.177.6.59', 'Linux', 'Google Chrome v.4.0', '2020-07-28 15:57:53'),
(205, '108.177.6.59', 'Linux', 'Google Chrome v.4.0', '2020-07-28 15:57:58'),
(206, '108.177.6.59', 'Linux', 'Google Chrome v.4.0', '2020-07-28 15:58:20'),
(207, '206.189.41.26', 'Linux', 'Google Chrome v.4.0', '2020-07-28 16:01:31'),
(208, '206.189.41.26', 'Linux', 'Google Chrome v.4.0', '2020-07-28 16:02:27'),
(209, '206.189.41.26', 'Linux', 'Google Chrome v.4.0', '2020-07-28 16:02:44'),
(210, '206.189.41.26', 'Linux', 'Google Chrome v.4.0', '2020-07-28 16:02:49'),
(211, '36.72.107.177', 'Linux', 'Google Chrome v.4.0', '2020-07-28 17:15:30'),
(212, '36.72.107.177', 'Linux', 'Google Chrome v.4.0', '2020-07-28 17:16:00'),
(213, '36.72.107.177', 'Linux', 'Google Chrome v.4.0', '2020-07-28 17:16:05'),
(214, '182.1.14.174', 'Linux', 'Google Chrome v.4.0', '2020-07-28 17:33:50'),
(215, '182.1.14.174', 'Linux', 'Google Chrome v.4.0', '2020-07-28 17:34:30'),
(216, '182.1.14.174', 'Linux', 'Google Chrome v.4.0', '2020-07-28 17:34:36'),
(217, '182.1.14.174', 'Linux', 'Google Chrome v.4.0', '2020-07-28 17:34:40'),
(218, '182.1.14.174', 'Linux', 'Google Chrome v.4.0', '2020-07-28 17:36:51'),
(219, '36.69.9.172', 'Linux', 'Google Chrome v.4.0', '2020-07-28 19:22:21'),
(220, '36.69.9.172', 'Linux', 'Google Chrome v.4.0', '2020-07-28 19:22:36'),
(221, '36.69.9.172', 'Linux', 'Google Chrome v.4.0', '2020-07-28 19:25:19'),
(222, '182.1.0.224', 'Linux', 'Google Chrome v.4.0', '2020-07-28 19:31:53'),
(223, '125.165.19.71', 'Linux', 'Google Chrome v.4.0', '2020-07-28 19:45:24'),
(224, '125.165.19.71', 'Linux', 'Google Chrome v.4.0', '2020-07-28 19:46:20'),
(225, '125.165.19.71', 'Linux', 'Google Chrome v.4.0', '2020-07-28 19:48:44'),
(226, '125.165.19.71', 'Linux', 'Google Chrome v.4.0', '2020-07-28 20:17:27'),
(227, '125.165.19.71', 'Linux', 'Google Chrome v.4.0', '2020-07-28 20:17:41'),
(228, '125.165.19.71', 'Linux', 'Google Chrome v.4.0', '2020-07-28 20:18:29'),
(229, '182.1.23.84', 'Linux', 'Google Chrome v.4.0', '2020-07-28 20:29:54'),
(230, '182.1.23.84', 'Linux', 'Google Chrome v.4.0', '2020-07-28 20:30:01'),
(231, '182.1.23.84', 'Linux', 'Google Chrome v.4.0', '2020-07-28 20:30:03'),
(232, '182.1.23.84', 'Linux', 'Google Chrome v.4.0', '2020-07-28 20:30:12'),
(233, '182.1.23.84', 'Linux', 'Google Chrome v.4.0', '2020-07-28 20:30:44'),
(234, '180.241.45.194', 'Linux', 'Google Chrome v.4.0', '2020-07-28 20:56:36'),
(235, '114.125.57.108', 'Linux', 'Google Chrome v.4.0', '2020-07-28 20:59:01'),
(236, '114.125.57.108', 'Linux', 'Google Chrome v.4.0', '2020-07-28 20:59:06'),
(237, '114.125.57.108', 'Linux', 'Google Chrome v.4.0', '2020-07-28 20:59:23'),
(238, '114.125.57.108', 'Linux', 'Google Chrome v.4.0', '2020-07-28 20:59:26'),
(239, '114.125.57.108', 'Linux', 'Google Chrome v.4.0', '2020-07-28 21:00:02'),
(240, '180.241.45.194', 'Linux', 'Google Chrome v.4.0', '2020-07-28 21:00:15'),
(241, '114.125.57.108', 'Linux', 'Google Chrome v.4.0', '2020-07-28 21:02:00'),
(242, '180.241.45.194', 'Linux', 'Google Chrome v.4.0', '2020-07-28 21:03:17'),
(243, '180.241.45.194', 'Linux', 'Google Chrome v.4.0', '2020-07-28 21:03:24'),
(244, '114.122.8.184', 'Linux', 'Google Chrome v.4.0', '2020-07-28 21:06:10'),
(245, '180.241.45.244', 'Linux', 'Google Chrome v.4.0', '2020-07-28 21:07:14'),
(246, '180.241.45.244', 'Linux', 'Google Chrome v.4.0', '2020-07-28 21:07:54'),
(247, '180.241.45.244', 'Linux', 'Google Chrome v.4.0', '2020-07-28 21:09:19'),
(248, '180.241.45.244', 'Linux', 'Google Chrome v.4.0', '2020-07-28 21:09:32'),
(249, '180.241.45.244', 'Linux', 'Google Chrome v.4.0', '2020-07-28 21:09:45'),
(250, '180.241.45.244', 'Linux', 'Google Chrome v.4.0', '2020-07-28 21:10:04'),
(251, '114.122.8.184', 'Linux', 'Google Chrome v.4.0', '2020-07-28 21:10:29'),
(252, '114.125.57.108', 'Linux', 'Google Chrome v.4.0', '2020-07-28 21:10:32'),
(253, '114.122.8.184', 'Linux', 'Google Chrome v.4.0', '2020-07-28 21:10:34'),
(254, '180.241.45.244', 'Linux', 'Google Chrome v.4.0', '2020-07-28 21:10:37'),
(255, '114.122.8.184', 'Linux', 'Google Chrome v.4.0', '2020-07-28 21:11:05'),
(256, '114.125.57.108', 'Linux', 'Google Chrome v.4.0', '2020-07-28 21:11:42'),
(257, '182.1.62.223', 'Linux', 'Google Chrome v.4.0', '2020-07-28 21:27:59'),
(258, '114.122.4.86', 'Linux', 'Google Chrome v.4.0', '2020-07-28 21:33:39'),
(259, '114.122.4.86', 'Linux', 'Google Chrome v.4.0', '2020-07-28 21:37:58'),
(260, '36.72.107.177', 'Windows 10', 'Google Chrome v.84.0.4147.89', '2020-07-28 21:48:57'),
(261, '36.72.107.177', 'Mac OS X', 'Mozilla Firefox v.78.0', '2020-07-28 21:59:32'),
(262, '36.68.147.64', 'Linux', 'Google Chrome v.4.0', '2020-07-28 22:53:36'),
(263, '36.68.147.64', 'Linux', 'Google Chrome v.4.0', '2020-07-28 22:55:40'),
(264, '36.68.147.64', 'Linux', 'Google Chrome v.4.0', '2020-07-28 22:56:02'),
(265, '36.68.147.64', 'Linux', 'Google Chrome v.4.0', '2020-07-28 22:56:24'),
(266, '36.68.147.64', 'Linux', 'Google Chrome v.4.0', '2020-07-28 22:57:59'),
(267, '108.177.6.56', 'Linux', 'Google Chrome v.4.0', '2020-07-28 23:30:50'),
(268, '108.177.7.90', 'Linux', 'Google Chrome v.4.0', '2020-07-28 23:30:56'),
(269, '108.177.6.57', 'Linux', 'Google Chrome v.4.0', '2020-07-28 23:31:08'),
(270, '108.177.6.56', 'Linux', 'Google Chrome v.4.0', '2020-07-28 23:31:17'),
(271, '108.177.6.56', 'Linux', 'Google Chrome v.4.0', '2020-07-28 23:31:17'),
(272, '108.177.6.57', 'Linux', 'Google Chrome v.4.0', '2020-07-28 23:31:36'),
(273, '108.177.6.56', 'Linux', 'Google Chrome v.4.0', '2020-07-28 23:31:38'),
(274, '108.177.6.57', 'Linux', 'Google Chrome v.4.0', '2020-07-28 23:31:54'),
(275, '182.1.8.178', 'Linux', 'Google Chrome v.4.0', '2020-07-29 06:27:36'),
(276, '182.1.8.178', 'Linux', 'Google Chrome v.4.0', '2020-07-29 06:30:33'),
(277, '182.1.8.178', 'Linux', 'Google Chrome v.4.0', '2020-07-29 06:31:16'),
(278, '36.71.142.111', 'Linux', 'Google Chrome v.4.0', '2020-07-29 07:43:33'),
(279, '36.71.142.111', 'Linux', 'Google Chrome v.4.0', '2020-07-29 07:45:51'),
(280, '110.137.41.164', 'Linux', 'Google Chrome v.4.0', '2020-07-29 11:17:46'),
(281, '110.137.41.164', 'Linux', 'Google Chrome v.4.0', '2020-07-29 11:18:44'),
(282, '110.137.41.164', 'Linux', 'Google Chrome v.4.0', '2020-07-29 11:19:01'),
(283, '110.137.41.164', 'Linux', 'Google Chrome v.4.0', '2020-07-29 11:19:15'),
(284, '110.137.41.164', 'Linux', 'Google Chrome v.4.0', '2020-07-29 11:19:27'),
(285, '110.137.41.164', 'Linux', 'Google Chrome v.4.0', '2020-07-29 11:19:44'),
(286, '110.137.41.164', 'Linux', 'Google Chrome v.4.0', '2020-07-29 11:19:57'),
(287, '116.206.33.49', 'Linux', 'Google Chrome v.4.0', '2020-07-29 18:39:30'),
(288, '116.206.33.49', 'Linux', 'Google Chrome v.4.0', '2020-07-29 18:39:36'),
(289, '114.122.4.155', 'Linux', 'Google Chrome v.4.0', '2020-07-29 18:39:43'),
(290, '116.206.33.49', 'Linux', 'Google Chrome v.4.0', '2020-07-29 18:40:31'),
(291, '114.122.4.155', 'Linux', 'Google Chrome v.4.0', '2020-07-29 18:41:14'),
(292, '110.137.41.164', 'Linux', 'Google Chrome v.4.0', '2020-07-30 09:00:12'),
(293, '110.137.41.164', 'Linux', 'Google Chrome v.4.0', '2020-07-30 09:03:13'),
(294, '110.137.41.164', 'Linux', 'Google Chrome v.4.0', '2020-07-30 09:06:01'),
(295, '110.137.41.164', 'Linux', 'Google Chrome v.4.0', '2020-07-30 09:06:52'),
(296, '114.122.12.31', 'Linux', 'Google Chrome v.4.0', '2020-07-30 12:58:15'),
(297, '182.1.33.147', 'Linux', 'Google Chrome v.4.0', '2020-07-30 15:41:21'),
(298, '182.1.33.147', 'Linux', 'Google Chrome v.4.0', '2020-07-30 15:41:51'),
(299, '182.1.42.130', 'Linux', 'Google Chrome v.4.0', '2020-07-30 18:17:30'),
(300, '114.125.4.95', 'Linux', 'Google Chrome v.4.0', '2020-07-30 19:19:38'),
(301, '114.125.4.95', 'Linux', 'Google Chrome v.4.0', '2020-07-30 19:21:57'),
(302, '114.125.4.95', 'Linux', 'Google Chrome v.4.0', '2020-07-30 19:22:32'),
(303, '114.125.4.95', 'Linux', 'Google Chrome v.4.0', '2020-07-30 19:22:37'),
(304, '114.125.4.95', 'Linux', 'Google Chrome v.4.0', '2020-07-30 19:23:22'),
(305, '114.125.4.95', 'Linux', 'Google Chrome v.4.0', '2020-07-30 19:23:35'),
(306, '114.125.4.95', 'Linux', 'Google Chrome v.4.0', '2020-07-30 19:23:36'),
(307, '114.125.4.95', 'Linux', 'Google Chrome v.4.0', '2020-07-30 19:23:45'),
(308, '114.125.4.95', 'Linux', 'Google Chrome v.4.0', '2020-07-30 19:24:26'),
(309, '114.125.4.95', 'Linux', 'Google Chrome v.4.0', '2020-07-30 19:24:30'),
(310, '110.137.43.34', 'Linux', 'Google Chrome v.4.0', '2020-07-30 19:43:49'),
(311, '110.137.43.34', 'Linux', 'Google Chrome v.4.0', '2020-07-30 19:45:41'),
(312, '110.137.43.34', 'Linux', 'Google Chrome v.4.0', '2020-07-30 19:45:52'),
(313, '110.137.43.34', 'Linux', 'Google Chrome v.4.0', '2020-07-30 19:46:08'),
(314, '110.137.43.34', 'Linux', 'Google Chrome v.4.0', '2020-07-30 19:46:11'),
(315, '110.137.43.34', 'Linux', 'Google Chrome v.4.0', '2020-07-30 19:46:56'),
(316, '110.137.43.34', 'Linux', 'Google Chrome v.4.0', '2020-07-30 19:48:01'),
(317, '114.125.20.129', 'Linux', 'Google Chrome v.4.0', '2020-07-30 20:30:57'),
(318, '114.125.20.129', 'Linux', 'Google Chrome v.4.0', '2020-07-30 20:32:09'),
(319, '36.68.143.105', 'Linux', 'Google Chrome v.4.0', '2020-07-31 00:07:21'),
(320, '125.165.35.136', 'Linux', 'Google Chrome v.4.0', '2020-07-31 10:39:38'),
(321, '114.122.74.187', 'Linux', 'Google Chrome v.4.0', '2020-07-31 21:54:39'),
(322, '158.140.165.6', 'Linux', 'Google Chrome v.4.0', '2020-08-01 11:35:51'),
(323, '158.140.165.6', 'Linux', 'Google Chrome v.4.0', '2020-08-01 11:36:15'),
(324, '158.140.165.6', 'Linux', 'Google Chrome v.4.0', '2020-08-01 11:36:19'),
(325, '158.140.165.6', 'Linux', 'Google Chrome v.4.0', '2020-08-01 11:37:20'),
(326, '182.1.63.202', 'Linux', 'Google Chrome v.4.0', '2020-08-01 18:24:15'),
(327, '182.1.63.202', 'Linux', 'Google Chrome v.4.0', '2020-08-01 18:25:16'),
(328, '182.1.63.202', 'Linux', 'Google Chrome v.4.0', '2020-08-01 18:25:51'),
(329, '180.248.160.231', 'Linux', 'Google Chrome v.4.0', '2020-08-03 07:08:27'),
(330, '180.248.160.231', 'Linux', 'Google Chrome v.4.0', '2020-08-03 07:12:41'),
(331, '180.248.160.231', 'Linux', 'Google Chrome v.4.0', '2020-08-03 07:12:57'),
(332, '180.248.160.231', 'Linux', 'Google Chrome v.4.0', '2020-08-03 07:13:04'),
(333, '66.102.8.13', 'Linux', 'Google Chrome v.4.0', '2020-08-03 09:42:28'),
(334, '66.102.8.15', 'Linux', 'Google Chrome v.4.0', '2020-08-03 09:43:09'),
(335, '66.102.8.11', 'Linux', 'Google Chrome v.4.0', '2020-08-03 09:43:52'),
(336, '66.102.8.13', 'Linux', 'Google Chrome v.4.0', '2020-08-03 09:44:54'),
(337, '66.102.8.11', 'Linux', 'Google Chrome v.4.0', '2020-08-03 09:45:00'),
(338, '66.102.8.13', 'Linux', 'Google Chrome v.4.0', '2020-08-03 09:45:10'),
(339, '66.102.8.11', 'Linux', 'Google Chrome v.4.0', '2020-08-03 09:45:28'),
(340, '66.102.8.13', 'Linux', 'Google Chrome v.4.0', '2020-08-03 09:45:29'),
(341, '66.102.8.13', 'Linux', 'Google Chrome v.4.0', '2020-08-03 09:46:12'),
(342, '36.71.137.182', 'Linux', 'Google Chrome v.4.0', '2020-08-04 12:05:39'),
(343, '36.71.137.182', 'Linux', 'Google Chrome v.4.0', '2020-08-04 12:06:41'),
(344, '36.71.136.41', 'Linux', 'Google Chrome v.4.0', '2020-08-05 22:07:58'),
(345, '110.137.44.63', 'Linux', 'Google Chrome v.4.0', '2020-08-05 22:48:51'),
(346, '110.137.44.63', 'Linux', 'Google Chrome v.4.0', '2020-08-05 22:49:06'),
(347, '110.137.44.63', 'Linux', 'Google Chrome v.4.0', '2020-08-05 23:10:49'),
(348, '110.137.44.63', 'Linux', 'Google Chrome v.4.0', '2020-08-05 23:11:09'),
(349, '110.137.44.63', 'Linux', 'Google Chrome v.4.0', '2020-08-05 23:11:43'),
(350, '36.79.2.185', 'Linux', 'Google Chrome v.4.0', '2020-08-06 01:47:11'),
(351, '36.79.2.185', 'Linux', 'Google Chrome v.4.0', '2020-08-06 01:48:48'),
(352, '36.72.184.28', 'Mac OS X', 'Mozilla Firefox v.79.0', '2020-08-07 14:10:00'),
(353, '114.122.11.118', 'Linux', 'Google Chrome v.4.0', '2020-08-08 00:54:39'),
(354, '36.71.141.134', 'Linux', 'Google Chrome v.4.0', '2020-08-08 12:30:09'),
(355, '36.71.138.100', 'Linux', 'Google Chrome v.4.0', '2020-08-10 02:01:52'),
(356, '36.72.97.12', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-10 22:09:49'),
(357, '36.72.97.12', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-10 22:23:45'),
(358, '180.253.208.4', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-12 20:44:01'),
(359, '180.253.208.4', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-12 20:47:29'),
(360, '180.253.208.4', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-12 20:47:49'),
(361, '180.253.208.4', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-12 20:48:10'),
(362, '180.253.208.4', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-12 20:49:52'),
(363, '200.196.44.250', 'Mac OS X', 'Apple Safari v.9.1.2', '2020-08-12 20:53:34'),
(364, '180.253.208.4', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-12 20:53:41'),
(365, '36.71.236.118', 'Linux', 'Google Chrome v.84.0.4147.125', '2020-08-12 21:44:02'),
(366, '36.71.236.118', 'Linux', 'Google Chrome v.84.0.4147.125', '2020-08-12 21:44:12'),
(367, '196.52.43.84', 'Linux', 'Google Chrome v.72.0.3602.2', '2020-08-12 21:53:20'),
(368, '36.72.123.168', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-12 22:51:27'),
(369, '45.130.229.209', 'Windows 7', 'Mozilla Firefox v.4.0.1', '2020-08-12 22:54:09'),
(370, '36.72.123.168', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-12 22:54:35'),
(371, '36.72.123.168', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-12 22:54:41'),
(372, '179.43.169.182', 'Linux', 'Mozilla Firefox v.10.0', '2020-08-12 22:55:00'),
(373, '179.43.169.182', 'Linux', 'Mozilla Firefox v.10.0', '2020-08-12 22:55:17'),
(374, '36.72.123.168', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-12 22:56:40'),
(375, '179.43.169.182', 'Linux', 'Mozilla Firefox v.10.0', '2020-08-12 22:56:41'),
(376, '36.72.123.168', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-12 22:56:52'),
(377, '36.71.236.118', 'Mac OS X', 'Mozilla Firefox v.79.0', '2020-08-12 23:00:53'),
(378, '100.21.42.170', 'Windows 10', 'Google Chrome v.70.0.3538.77', '2020-08-12 23:02:24'),
(379, '196.52.43.111', 'Linux', 'Google Chrome v.72.0.3602.2', '2020-08-12 23:05:16'),
(380, '178.128.57.177', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-12 23:31:12'),
(381, '178.128.57.177', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-12 23:39:49'),
(382, '178.128.57.177', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-12 23:59:39'),
(383, '164.90.227.149', 'Unknown', 'Unknown v.?', '2020-08-13 00:05:13'),
(384, '83.97.20.130', 'Linux', 'Mozilla Firefox v.76.0', '2020-08-13 01:43:35'),
(385, '66.102.8.66', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-13 02:21:25'),
(386, '69.25.58.61', 'Unknown', 'Google Chrome v.67.0.3396.79', '2020-08-13 03:24:39'),
(387, '23.81.130.249', 'Windows 10', 'Google Chrome v.67.0.3396.79', '2020-08-13 03:30:03'),
(388, '156.96.156.138', 'Unknown', 'Unknown v.6.46', '2020-08-13 04:58:19'),
(389, '156.96.156.138', 'Unknown', 'Unknown v.6.46', '2020-08-13 04:58:20'),
(390, '128.14.134.134', 'Windows 10', 'Google Chrome v.60.0.3112.113', '2020-08-13 06:59:17'),
(391, '103.135.39.37', 'Windows 7', 'Google Chrome v.51.0.2704.103', '2020-08-13 07:27:58'),
(392, '184.105.247.195', 'Unknown', 'Unknown v.?', '2020-08-13 07:37:29'),
(393, '36.71.236.118', 'Mac OS X', 'Google Chrome v.84.0.4147.105', '2020-08-13 07:52:46'),
(394, '183.136.225.44', 'Mac OS X', 'Mozilla Firefox v.47.0', '2020-08-13 07:58:10'),
(395, '36.71.236.118', 'Mac OS X', 'Google Chrome v.84.0.4147.105', '2020-08-13 08:17:18'),
(396, '36.71.236.118', 'Mac OS X', 'Google Chrome v.84.0.4147.105', '2020-08-13 08:17:26'),
(397, '36.71.236.118', 'Mac OS X', 'Google Chrome v.84.0.4147.105', '2020-08-13 08:17:33'),
(398, '36.71.236.118', 'Mac OS X', 'Google Chrome v.84.0.4147.105', '2020-08-13 08:21:19'),
(399, '36.71.236.118', 'Mac OS X', 'Google Chrome v.84.0.4147.105', '2020-08-13 08:21:29'),
(400, '209.97.168.3', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-13 08:22:28'),
(401, '209.97.168.3', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-13 08:22:50'),
(402, '36.71.236.118', 'Mac OS X', 'Google Chrome v.84.0.4147.105', '2020-08-13 08:26:14'),
(403, '103.76.191.106', 'Windows 7', 'Google Chrome v.51.0.2704.103', '2020-08-13 08:27:25'),
(404, '193.118.53.202', 'Windows 10', 'Google Chrome v.60.0.3112.113', '2020-08-13 08:30:35'),
(405, '36.71.236.118', 'Mac OS X', 'Google Chrome v.84.0.4147.105', '2020-08-13 08:30:53'),
(406, '36.71.236.118', 'Mac OS X', 'Mozilla Firefox v.79.0', '2020-08-13 08:34:25'),
(407, '36.71.236.118', 'Mac OS X', 'Mozilla Firefox v.79.0', '2020-08-13 08:34:53'),
(408, '77.236.196.125', 'Unknown', 'Unknown v.?', '2020-08-13 08:36:05'),
(409, '36.71.236.118', 'Mac OS X', 'Google Chrome v.84.0.4147.105', '2020-08-13 08:50:04'),
(410, '114.122.101.166', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-13 09:03:24'),
(411, '114.122.101.166', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-13 09:04:10'),
(412, '114.122.103.162', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-13 09:16:58'),
(413, '114.122.103.162', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-13 09:17:20'),
(414, '114.122.103.162', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-13 09:19:07'),
(415, '114.122.103.162', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-13 09:23:39'),
(416, '114.122.103.162', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-13 09:23:53'),
(417, '114.122.103.162', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-13 09:25:26'),
(418, '103.140.108.242', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-13 09:31:40'),
(419, '103.140.108.242', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-13 09:35:45'),
(420, '195.54.160.21', 'Windows 10', 'Google Chrome v.78.0.3904.108', '2020-08-13 10:02:03'),
(421, '140.213.19.179', 'Linux', 'Google Chrome v.84.0.4147.125', '2020-08-13 10:26:26'),
(422, '195.54.160.21', 'Windows 10', 'Google Chrome v.78.0.3904.108', '2020-08-13 10:28:12'),
(423, '195.54.160.21', 'Windows 10', 'Google Chrome v.78.0.3904.108', '2020-08-13 10:38:15'),
(424, '195.54.160.21', 'Windows 10', 'Google Chrome v.78.0.3904.108', '2020-08-13 10:43:37'),
(425, '2.236.112.207', 'Windows 10', 'Google Chrome v.74.0.3729.169', '2020-08-13 11:11:28'),
(426, '2.236.112.207', 'Unknown', 'Unknown v.?', '2020-08-13 11:11:30'),
(427, '185.72.156.82', 'Mac OS X', 'Google Chrome v.57.0.2987.133', '2020-08-13 11:13:51'),
(428, '206.217.133.141', 'Windows 10', 'Mozilla Firefox v.36.0', '2020-08-13 11:13:51'),
(429, '45.171.56.39', 'Windows 7', 'Google Chrome v.51.0.2704.103', '2020-08-13 11:16:19'),
(430, '138.246.253.15', 'Windows 7', 'Google Chrome v.40.0.2214.85', '2020-08-13 11:21:01'),
(431, '103.140.108.242', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-13 11:23:58'),
(432, '83.234.218.30', 'Windows 10', 'Google Chrome v.51.0.2704.103', '2020-08-13 11:24:44'),
(433, '103.140.108.242', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-13 11:26:19'),
(434, '36.89.80.50', 'Windows 10', 'Google Chrome v.52.0.2743.116', '2020-08-13 11:32:16'),
(435, '2.236.112.207', 'Windows 10', 'Google Chrome v.74.0.3729.169', '2020-08-13 11:51:46'),
(436, '2.236.112.207', 'Unknown', 'Unknown v.?', '2020-08-13 11:51:48'),
(437, '139.162.113.204', 'Unknown', 'Unknown v.Detection', '2020-08-13 12:28:17'),
(438, '36.71.236.118', 'Mac OS X', 'Google Chrome v.84.0.4147.105', '2020-08-13 12:52:46'),
(439, '128.14.209.178', 'Windows 10', 'Google Chrome v.60.0.3112.113', '2020-08-13 13:15:57'),
(440, '158.69.64.72', 'Unknown', 'Unknown v.2.18.4', '2020-08-13 14:07:13'),
(441, '36.72.123.168', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-13 14:49:20'),
(442, '36.72.123.168', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-13 14:50:22'),
(443, '36.72.123.168', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-13 14:50:43'),
(444, '18.223.161.203', 'Linux', 'Google Chrome v.83.0.4103.61', '2020-08-13 15:17:39'),
(445, '3.15.26.200', 'Linux', 'Google Chrome v.83.0.4103.61', '2020-08-13 15:18:15'),
(446, '71.6.232.9', 'Windows 10', 'Google Chrome v.57.0.2987.133', '2020-08-13 16:08:53'),
(447, '142.93.157.50', 'Linux', 'Google Chrome v.41.0.2227.0', '2020-08-13 16:10:56'),
(448, '138.197.173.88', 'Unknown', 'Google Chrome v.41.0.2225.0', '2020-08-13 16:11:01'),
(449, '159.203.24.155', 'Windows 10', 'Google Chrome v.40.0.2214.93', '2020-08-13 16:11:06'),
(450, '138.197.152.122', 'Windows XP', 'Google Chrome v.41.0.2224.3', '2020-08-13 16:11:12'),
(451, '121.36.137.19', 'Unknown', 'Google Chrome v.76.0.2899.88', '2020-08-13 16:26:09'),
(452, '45.83.65.247', 'Windows 10', 'Mozilla Firefox v.65.0', '2020-08-13 16:31:12'),
(453, '102.134.140.46', 'Mac OS X', 'Apple Safari v.9.1.2', '2020-08-13 17:02:59'),
(454, '36.72.123.168', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-13 17:31:28'),
(455, '36.72.123.168', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-13 17:37:57'),
(456, '213.186.69.250', 'Mac OS X', 'Apple Safari v.9.1.2', '2020-08-13 18:05:16'),
(457, '121.36.137.19', 'Unknown', 'Google Chrome v.73.0.2274.88', '2020-08-13 18:11:38'),
(458, '62.176.175.34', 'Windows 10', 'Google Chrome v.52.0.2743.116', '2020-08-13 18:33:01'),
(459, '::1', 'Windows 10', 'Google Chrome v.84.0.4147.105', '2020-08-13 18:44:00'),
(460, '::1', 'Windows 10', 'Google Chrome v.84.0.4147.125', '2020-08-15 08:30:13'),
(461, '::1', 'Windows 10', 'Google Chrome v.85.0.4183.102', '2020-09-16 09:15:39'),
(462, '::1', 'Windows 10', 'Google Chrome v.85.0.4183.102', '2020-09-20 20:23:20'),
(463, '::1', 'Windows 10', 'Mozilla Firefox v.81.0', '2020-10-09 00:40:44'),
(464, '::1', 'Windows 10', 'Google Chrome v.86.0.4240.75', '2020-10-11 16:20:46'),
(465, '::1', 'Windows 10', 'Google Chrome v.86.0.4240.111', '2020-10-28 19:07:17'),
(466, '::1', 'Windows 10', 'Google Chrome v.86.0.4240.198', '2020-12-06 11:49:01'),
(467, '::1', 'Windows 10', 'Google Chrome v.87.0.4280.88', '2020-12-16 21:28:39'),
(468, '::1', 'Windows 10', 'Google Chrome v.87.0.4280.88', '2021-01-01 01:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `id_submenu` int(11) NOT NULL,
  `submenu` varchar(120) NOT NULL,
  `link_submenu` text NOT NULL,
  `aktif` int(11) NOT NULL,
  `urutan_submenu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id_submenu`, `submenu`, `link_submenu`, `aktif`, `urutan_submenu`, `id_menu`) VALUES
(6, 'Profile Prov Aceh', 'prov_aceh', 1, 1, 16),
(7, 'Profile Polairud Aceh', 'airud_aceh', 1, 2, 16);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `aktif` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `level`, `aktif`, `email`, `foto`, `created_at`, `updated_at`) VALUES
(19, 'admin', '14e1b600b1fd579f47433b88e8d85291', 'Admin Web', 1, 1, 'ahmadinations@gmail.com', '111642-Foto Muhamad Ahmadin.jpg', '2020-07-13 03:24:21', '2021-01-14 11:16:42'),
(20, 'staff', '14e1b600b1fd579f47433b88e8d85291', 'Staff Web', 2, 1, 'staffweb@gmail.com', '111651-dadinqua.png', '2020-07-13 03:24:53', '2021-01-14 11:16:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airud`
--
ALTER TABLE `airud`
  ADD PRIMARY KEY (`id_airud`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `dirpolairud`
--
ALTER TABLE `dirpolairud`
  ADD PRIMARY KEY (`id_dirpolairud`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id_page`);

--
-- Indexes for table `statistik`
--
ALTER TABLE `statistik`
  ADD PRIMARY KEY (`id_statistik`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id_submenu`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airud`
--
ALTER TABLE `airud`
  MODIFY `id_airud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dirpolairud`
--
ALTER TABLE `dirpolairud`
  MODIFY `id_dirpolairud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id_faq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `statistik`
--
ALTER TABLE `statistik`
  MODIFY `id_statistik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=469;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
