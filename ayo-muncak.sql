-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2024 at 05:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ayo-muncak`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$12$xENpIKqbV5jNj3KAQY1hmeSsLng3woBCTMX5pd4pUkSlBRinUdT/K', '2024-06-30 22:58:11', '2024-06-30 22:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gunung`
--

CREATE TABLE `gunung` (
  `id` int(11) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `ketinggian` float NOT NULL,
  `daerah` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `jalur` varchar(200) NOT NULL,
  `rating` float NOT NULL,
  `gambar` varchar(255) NOT NULL DEFAULT 'default-image.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gunung`
--

INSERT INTO `gunung` (`id`, `provinsi`, `nama`, `ketinggian`, `daerah`, `deskripsi`, `latitude`, `longitude`, `jalur`, `rating`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Jawa Timur', 'Gunung Arjuno', 3.339, 'Malang dan Pasuruan', 'Gunung Arjuno merupakan salah satu tujuan pendakian. Di samping tingginya yang telah mencapai lebih dari 3000 meter, di gunung ini terdapat beberapa objek wisata. Salah satunya adalah objek wisata air terjun Kakek Bodo yang juga merupakan salah satu jalur pendakian menuju puncak Gunung Arjuno. Meskipun selain objek wisata air terjun Kakek Bodo terdapat pula air terjun lain, tetapi para wisatawan jarang yang mendatangi air terjun lainnya, mungkin karena letak dan sarana wisatanya kurang mendukung. Di kawasan lerengnya juga terdapat mata air Sungai Brantas yang berasal dari simpanan air Gunung Arjuno. Mata air Sungai Brantas terletak di Desa Sumber Brantas, Bumiaji, Kota Batu yang merupakan sungai terpanjang kedua di Pulau Jawa setelah Bengawan Solo. Beberapa destinasi wisata yang terkenal hingga ke seluruh Indonesia maupun luar negeri juga terletak di lereng Gunung Arjuno, di antaranya adalah Tretes, Kota Wisata Batu, dan Taman Safari Indonesia 2.', '-7.724064156', '112.5893581', 'Jalur Lawang, Jalur Tretes, Jalur Purwosari, Jalur Batu', 4.5, 'gambar-gunung/1719821875-1-explore-arjuna.jpg', NULL, NULL),
(2, 'Jawa Timur', 'Gunung Argapura', 3.088, 'Situbondo, Lumajang, Bondowoso, Probolinggo, dan', 'Gunung ini berada kawasan Suaka Margasatwa Pegunungan Iyang,[2] sehingga kompleks ini sering disebut Iyang-Argapura. Kompleks Iyang-Argapura merupakan kompleks gunung berapi raksasa yang mendominasi bentang alam antara Gunung Raung dan Gunung Lemongan di Jawa Timur, Indonesia. Di kompleks ini terdapat untaian lembah sedalam 1.000 m. Pendakian Gunung Argapura Diarsipkan 2017-09-06 di Wayback Machine. memang terbilang memberikan tantangan tersendiri, pasalnya meskipun hanya memiliki ketinggian sekitar 3.088 mdpl, tetapi jalur pendakiannya cukup panjang. Tak heran jika disebut trek pendakian terpanjang di Pulau Jawa yaitu sekitar 63 Km.\r\n\r\nGunung Argapura merupakan puncak tertinggi dari Pegunungan Iyang serta berada pada posisi di antara Gunung Semeru dan Gunung Raung. Ada beberapa puncak yang dimiliki oleh gunung ini. Puncak yang terkenal bernama Puncak Rengganis / Welirang (topografichen Dienst 1928). Sedangkan puncak tertingginya berada pada jarak ± 200 m di arah selatan puncak Rengganis. Puncak tertinggi ini bernama Argopuro dan ditandai dengan sebuah tugu ketinggian (triangulasi).', '-7.962380878', '113.5664947', 'Jalur Baderan, Jalur Bermi', 4.5, 'gambar-gunung/1719821436-2-explore-argapura.jpg', NULL, NULL),
(3, 'Jawa Timur', 'Gunung Lawu', 3.265, 'Karanganyar, Ngawi dan Magetan', 'Pendakian Gunung Lawu sudah dilakukan sejak awal abad ke-12. Pada masa kolonial, eksplorasi di Gunung Lawu didorong oleh berbagai kepentingan mulai dari pembukaan lahan pertanian, pemetaan, kondisi sosial, dan lain-lain.[12] Pendakian standar dapat dimulai dari tiga tempat (basecamp): Cemorokandang di Tawangmangu (Jawa Tengah), Candi Cetho di Karanganyar (Jawa Tengah), dan Cemorosewu, di Sarangan (Jawa Timur).[7]\r\n\r\nSelain tiga jalur tersebut, ada beberapa jalur pendakian lain yakni Jalur Pendakian Jagaraga, Ngrambe, Jamus, Tambak, Sukuh, Pringgodani, Cemara Bulus, Mojosemi, Sidalangu, dan Maospati. Jalur pendakian tidak resmi ini sering digunakan masyarakat setempat untuk mencari kayu, mencari tanaman obat, ritual, dan kepentingan tertentu lainnya. Jalur pendakian Pringgodani tercatat dalam Serat Centhini sebagai jalur pendakian spiritual. Salah satu tokoh yang melalui jalur tersebut adalah Seh Amongraga. Serat Centhini Pupuh 417-421 menceritakan perjalanan Seh Amongraga memulai pendakian melalui Desa Gandasuli lalu menuju puncak Lawu.[13]', '-7.625372576', '111.194338', 'Jalur Cemoro Sewu, Jalur Cemoro Kandang, Jalur Candi Ceto, Jalur Singolangu, Jalur Tambak', 4.6, 'gambar-gunung/1719821886-3-explore-lawu.jpg', NULL, NULL),
(4, 'Jawa Timur', 'Gunung Semeru', 3.676, 'Malang dan Lumajang', 'Gunung Semeru atau Gunung Meru adalah sebuah gunung berapi kerucut di Jawa Timur, Indonesia. Gunung Semeru merupakan gunung tertinggi di Pulau Jawa, dengan puncaknya Mahameru, 3.676 meter dari permukaan laut (mdpl). Gunung ini terbentuk akibat subduksi Lempeng Indo-Australia kebawah Lempeng Eurasia. Gunung Semeru juga merupakan gunung berapi tertinggi ketiga di Indonesia setelah Gunung Kerinci di Sumatra dan Gunung Rinjani di Nusa Tenggara Barat.[1] Kawah di puncak Gunung Semeru dikenal dengan nama Jonggring Saloko.\r\n\r\nGunung ini masuk dalam kawasan Taman Nasional Bromo Tengger Semeru. Taman Nasional ini terdiri dari pegunungan dan lembah seluas 50.273,3 hektar. Terdapat beberapa gunung di dalam Kaldera Gunung Tengger antara lain: Gunung Bromo (2.392 m); Gunung Batok (2.470 m); Gunung Kursi (2.581 m); Gunung Watangan (2.662 m); dan Gunung Widodaren (2.650m). Terdapat empat buah danau (ranu): Ranu Pani, Ranu Regulo, Ranu Kumbolo dan Ranu Darungan.', '-8.106017074', '112.9222356', 'Jalur Ranu Pane, Jalur Watu Rejeng', 4.6, 'gambar-gunung/1719822303-4-explore-semeru.jpg', NULL, NULL),
(5, 'Jawa Timur', 'Gunung Raung', 3.344, 'Banyuwangi, Jember,dan Bondowoso', 'Secara geografis, lokasi gunung ini berada dalam kawasan kompleks Pegunungan Ijen dan menjadi puncak tertinggi dari gugusan pegunungan tersebut. Dihitung dari titik tertinggi, Gunung Raung merupakan gunung tertinggi ketiga di Jawa Timur setelah Gunung Semeru dan Gunung Arjuno, serta menjadi yang tertinggi keempat di Pulau Jawa. Kaldera Gunung Raung juga merupakan kaldera kering yang terbesar di Pulau Jawa dan terbesar kedua di Indonesia setelah Gunung Tambora di Nusa Tenggara Barat.[3] Terdapat empat titik puncak, yaitu Puncak Bendera, Puncak 17/Puncak Bendera (3159 mdpl), Puncak Tusuk Gigi,(3300 mdpl) dan, yang tertinggi, adalah Puncak Sejati (3.344 mdpl).[4]', '-8.125110395', '114.0459618', 'Jalur Waringin, Jalur Kalibaru', 4.4, 'gambar-gunung/1721209836-5-explore-raung.jpg', NULL, NULL),
(6, 'Jawa Timur', 'Gunung Panderman', 2.045, 'Kota Batu', 'Nama Panderman berasal dari asal kata \"Dermo\" dalam bahasa jawa berarti \'sekedar\' Seperti umumnya di Jawa, dulunya gunung sering dijadikan tempat bertapa. Begitu juga dengan gunung Panderman. Karena letaknya yang tidak terlalu jauh dari pemukiman dan juga tidak terlalu tinggi dibanding gunung disekitarnya, maka gunung ini hanya \'sekedar\' digunakan untuk menyepi sejenak, merenungi diri atau dalam bahasa jawa sadermo mandireng pribadi. Dari sinilah nama Panderman diberikan.\r\n\r\nGunung Panderman adalah sebuah gunung yang terletak di Kota Batu, Jawa Timur, Indonesia. Gunung ini memiliki ketinggian sekitar 2.045 meter di atas permukaan laut dan sering menjadi tujuan pendakian bagi para pecinta alam dan pendaki pemula karena jalurnya yang relatif mudah.', '-7.902295706', '112.4968381', 'Jalur Toyomerto, Jalur Curah Banteng', 4.6, 'gambar-gunung/1719822367-6-explore-panderman.png', NULL, NULL),
(7, 'Jawa Timur', 'Gunung Anjasmoro', 2.277, 'Jombang, Kediri, Mojokerto, Malang dan Kota Batu', 'Gunung Anjasmoro merupakan pegunungan yang terdapat di pulau Jawa, Indonesia. Ada lebih dari 40 puncak dan puncak tertinggi pada 2.277 meter. Gunung Anjasmoro termasuk ke dalam wilayah Kabupaten Jombang, Kabupaten Kediri (kec. Kandangan) , Kabupaten Mojokerto, Kabupaten Malang, dan Kota Batu, Jawa Timur. Gunung Anjasmoro terletak satu kluster dengan Gunung Argowayang dan terletak berdekatan dengan Gunung Arjuno-Welirang.\r\n\r\nGunung Anjasmoro mempunyai kawasan hutan Dipterokarp Bukit, hutan Dipterokarp Atas, hutan Montane, dan Hutan Ericaceous atau hutan gunung.', '-7.751229161', '112.5068334', 'Jalur Cangar, Jalur Puthuk Siwur', 4.4, 'gambar-gunung/1721210053-7-explore-anjasmoro.jpg', NULL, NULL),
(8, 'Jawa Timur', 'Gunung Argowayang', 2.162, 'Jombang, Kediri, dan Malang', 'Gunung Argowayang adalah salah satu gunung yang terletak di Jawa Timur, Indonesia. Gunung ini tidak setenar beberapa gunung lain di wilayah tersebut, namun tetap menawarkan keindahan dan tantangan bagi para pendaki\r\n\r\nPemandangan dari puncak Gunung Argowayang menawarkan keindahan alam yang menakjubkan, termasuk pemandangan hamparan hijau dan perbukitan di sekitarnya.\r\nPada pagi hari, pendaki bisa menikmati pemandangan matahari terbit yang memukau dari puncak.', '-7.771757144', '112.4299774', 'Jalur Sumbergempong', 4.6, 'gambar-gunung/1719822401-8-explore-argowayang.jpg', NULL, NULL),
(9, 'Jawa Timur', 'Gunung Baluran', 1.247, 'Situbondo', 'Gunung Baluran merupakan bagian dari Taman Nasional Baluran, yang terletak di ujung timur Pulau Jawa, tepatnya di Kabupaten Situbondo, Jawa Timur. Meskipun tidak setinggi beberapa gunung lainnya di Jawa Timur, Gunung Baluran memiliki daya tarik tersendiri, terutama karena keanekaragaman ekosistem dan keindahan alam yang ada di sekitarnya.\r\n\r\nTaman Nasional Baluran memiliki berbagai jenis ekosistem, termasuk savana, hutan mangrove, hutan musim, dan hutan pantai.\r\nGunung Baluran dan sekitarnya adalah rumah bagi berbagai spesies flora dan fauna, termasuk beberapa yang dilindungi. Di sini, pengunjung dapat melihat satwa seperti banteng, rusa, kijang, macan tutul, dan berbagai jenis burung.\r\n\r\nGunung Baluran, dengan keindahan alam dan keanekaragaman ekosistemnya, adalah destinasi yang menarik bagi para pecinta alam dan pendaki. Selain menawarkan pengalaman mendaki yang unik, kawasan ini juga memberikan kesempatan untuk menikmati berbagai keajaiban alam lainnya yang ada di Taman Nasional Baluran.', '-7.844602676', '114.3623936', 'Jalur Savana Bekol', 4.7, 'gambar-gunung/1721210110-9-explore-baluran.jpg', NULL, NULL),
(10, 'Jawa Timur', 'Gunung Berungkal', 1.04, 'Lumajang', 'Gunung Berungkal, seperti gunung-gunung lainnya di Indonesia, memiliki keindahan alam yang khas dan menawarkan pengalaman mendaki yang menantang serta memuaskan. \r\n\r\nGunung Berungkal adalah destinasi yang sempurna bagi mereka yang mencari petualangan dan ingin menikmati keindahan alam Indonesia. Dengan persiapan yang baik dan semangat yang tinggi, pendakian ke Gunung Berungkal akan menjadi pengalaman yang tak terlupakan.', '-8.204496338', '113.0136967', 'Jalur Puncak Semeru', 4.5, 'gambar-gunung/1719822429-10-explore-berungkal.jpg', NULL, NULL),
(11, 'Jawa Timur', 'Gunung Batok', 2.44, 'Pasuruan', 'Gunung Batok adalah salah satu gunung yang menarik di wilayah Taman Nasional Bromo Tengger Semeru, Jawa Timur, Indonesia. Gunung Batok memiliki bentuk kerucut yang simetris dan terjal. Permukaannya ditutupi oleh vegetasi yang lebat, terutama berbagai jenis tumbuhan tropis yang tumbuh subur di kawasan Taman Nasional Bromo Tengger Semeru.\r\n\r\nGunung Batok merupakan destinasi yang cocok bagi pendaki yang ingin menikmati keindahan alam dan pengalaman mendaki yang menantang di kawasan Taman Nasional Bromo Tengger Semeru.', '-7.934258175', '112.947732', 'Jalur Cemoro Lawang', 4.8, 'gambar-gunung/1719822444-11-explore-batok.png', NULL, NULL),
(12, 'Jawa Timur', 'Gunung Betiri', 1.215, 'Jember dan Banyuwangi', 'Gunung Betiri adalah salah satu gunung yang terletak di Provinsi Jawa Timur, Indonesia, tepatnya di Taman Nasional Alas Purwo. Gunung Betiri memiliki lereng yang curam dengan vegetasi hutan tropis yang lebat. Gunung ini dikelilingi oleh keindahan alam seperti hutan primer, sungai, dan air terjun yang menambah daya tariknya.\r\n\r\nGunung Betiri menawarkan pengalaman pendakian yang berbeda dengan keindahan alam yang khas dari Taman Nasional Alas Purwo. Bagi pendaki dan pecinta alam, Gunung Betiri adalah destinasi yang menarik untuk dieksplorasi.', '-8.415114617', '113.8824998', 'Jalur Bandealit', 4.5, 'gambar-gunung/1721209661-11-explore-betiri.jpg', NULL, NULL),
(13, 'Jawa Timur', 'Gunung Boklorobubuh', 2.23, 'Mojokerto', 'Gunung Boklorobubuh terletak di Kabupaten Mojokerto, Jawa Timur, Indonesia. Gunung ini terkenal di kalangan pendaki lokal karena keindahan alamnya dan akses pendakiannya yang relatif mudah dijangkau.\r\n\r\nMedan pendakian di Gunung Boklorobubuh cenderung berbatu dengan jalur pendakian yang cukup menantang namun tidak terlalu curam. Pendaki akan melewati hutan tropis yang lebat dan beberapa bukit kecil sebelum mencapai puncaknya.\r\n\r\nGunung Boklorobubuh adalah destinasi pendakian yang cocok bagi pendaki pemula maupun yang berpengalaman, menawarkan pengalaman alam yang berbeda di Jawa Timur.', '-7.728401091', '112.4600655', 'Jalur Desa Kemlagi Mojokerto', 4.5, 'gambar-gunung/1719822475-14-explore-boklorobubuh.png', NULL, NULL),
(14, 'Jawa Timur', 'Gunung Bromo', 2.392, 'Probolinggo, Pasuruan, Lumajang dan Malang', 'Gunung Bromo adalah salah satu gunung berapi yang paling terkenal di Indonesia, terletak di Provinsi Jawa Timur. Gunung ini adalah bagian dari Taman Nasional Bromo Tengger Semeru dan memiliki ketinggian sekitar 2.329 meter di atas permukaan laut\r\n\r\nGunung Bromo terkenal dengan pemandangan kawahnya yang menakjubkan serta hamparan lautan pasir (kaldera) yang luas di sekitarnya.\r\nSalah satu daya tarik utama adalah pemandangan matahari terbit dari puncak Penanjakan, yang menawarkan panorama yang sangat spektakuler dan sering dianggap sebagai salah satu yang terbaik di Indonesia.\r\nKawah Gunung Bromo sendiri terus aktif dan sering mengeluarkan asap belerang.', '-7.940282747', '112.9526687', 'Jalur dari Desa Cemara Lawang (Pasuruan), Jalur dari Desa Tosari (Pasuruan), Jalur dari Desa Ngadisari (Probolinggo), Jalur dari Desa Wonokitri (Trek Pendakian dari Gunung Semeru), Jalur dari Probolin', 4.9, 'gambar-gunung/1719822495-15-explore-bromo.jpg', NULL, NULL),
(15, 'Jawa Timur', 'Gunung Butak', 2.868, 'Malang dan Blitar', 'Gunung Butak adalah sebuah gunung yang terletak di Jawa Timur, Indonesia, tepatnya di perbatasan antara Kabupaten Malang dan Kabupaten Blitar. Gunung ini memiliki ketinggian sekitar 2.868 meter di atas permukaan laut dan merupakan bagian dari Pegunungan Putri Tidur, yang juga mencakup Gunung Kawi dan Gunung Panderman. Gunung Butak sering dijadikan tujuan pendakian karena keindahan alamnya dan pemandangan yang menakjubkan dari puncaknya.\r\n\r\nDari puncak Gunung Butak, pendaki bisa menikmati pemandangan yang sangat indah, termasuk pemandangan pegunungan di sekitarnya seperti Gunung Arjuno, Gunung Welirang, dan Gunung Semeru.\r\nPemandangan matahari terbit dan terbenam dari puncak gunung ini juga sangat memukau dan sering menjadi momen yang dinantikan para pendaki.', '-7.918125077', '112.4496227', 'Jalur Sirah Kencong, Jalur Panderman', 4.7, 'gambar-gunung/1719822512-16-explore-butak.png', NULL, NULL),
(16, 'Jawa Timur', 'Gunung Ijen', 2.443, 'Banyuwangi, dan Bondowoso', 'Gunung Ijen adalah salah satu gunung berapi yang terkenal di Indonesia, terletak di wilayah Banyuwangi dan Bondowoso, Jawa Timur. Gunung ini memiliki ketinggian sekitar 2.799 meter di atas permukaan laut dan terkenal dengan kawahnya yang besar serta fenomena alam unik yang dikenal sebagai \"Blue Fire\" atau api biru. \r\n\r\nSalah satu daya tarik utama Gunung Ijen adalah fenomena \"Blue Fire\" yang hanya bisa dilihat di beberapa tempat di dunia. Api biru ini merupakan hasil dari gas belerang yang keluar dari celah-celah kawah dan terbakar saat bersentuhan dengan udara.\r\nBlue Fire biasanya terlihat paling jelas pada dini hari, sekitar pukul 02.00 hingga 04.00 pagi. Untuk melihat fenomena ini, pendaki biasanya memulai perjalanan pada tengah malam.', '-8.055422206', '114.2430992', 'Jalur Paltuding (Jalur Utama), Jalur Bondowoso (Jalur Selatan), Jalur Banyuwangi (Jalur Barat Laut)', 4.7, 'gambar-gunung/1721210265-17-explore-ijen.jpg', NULL, NULL),
(17, 'Jawa Timur', 'Gunung Kawi', 2.651, 'Malang', 'Gunung Kawi adalah salah satu gunung yang terletak di Provinsi Jawa Timur, Indonesia, tepatnya di Kabupaten Malang. Gunung Kawi memiliki ketinggian sekitar 2.551 meter di atas permukaan laut. Meskipun tidak setinggi Gunung Semeru yang terletak di sebelah utara, Gunung Kawi tetap menawarkan pengalaman pendakian yang menantang dengan pemandangan alam yang spektakuler.\r\n\r\nGunung Kawi memiliki bentuk kerucut yang indah dengan lereng yang curam dan ditumbuhi oleh hutan tropis yang lebat. Puncaknya terkadang diselimuti oleh kabut tipis yang menambah kesan mistis dari gunung ini. Medan pendakian di Gunung Kawi cenderung berbatu dan curam, terutama saat mendekati puncak. Jalur pendakian biasanya melewati hutan tropis yang lebat dan beberapa sumber air yang segar.\r\n\r\nGunung Kawi tidak hanya menawarkan pengalaman pendakian yang menarik tetapi juga kekayaan sejarah dan spiritual yang unik di Jawa Timur. Bagi pecinta alam dan sejarah, Gunung Kawi adalah destinasi yang sangat direkomendasikan untuk dieksplorasi.', '-7.953469254', '112.4645706', 'Jalur Wonosari, Jalur Ngadireso', 4.2, 'gambar-gunung/1719822544-18-explore-kawi.jpg', NULL, NULL),
(18, 'Jawa Timur', 'Gunung Kelud', 1.35, 'Kediri, Blitar, dan Malang', 'Gunung Kelud adalah sebuah gunung berapi yang terletak di Provinsi Jawa Timur, Indonesia. Gunung ini memiliki ketinggian sekitar 1.731 meter di atas permukaan laut dan terkenal dengan aktivitas vulkaniknya yang cukup sering. Gunung Kelud terletak di perbatasan antara Kabupaten Kediri, Kabupaten Blitar, dan Kabupaten Malang.\r\n\r\nKawah Gunung Kelud sering berubah bentuk akibat letusan. Sebelum letusan 2014, terdapat danau kawah yang indah dengan air berwarna hijau toska. Namun, letusan mengubah struktur kawah dan menghilangkan danau tersebut.\r\nPemandangan dari puncak kawah sangat menakjubkan, dengan lanskap vulkanik yang dramatis dan pemandangan pegunungan di sekitarnya.', '-7.933469181', '112.3134595', 'Jalur Tulungrejo', 4.5, 'gambar-gunung/1719822565-19-explore-kelud.jpg', NULL, NULL),
(19, 'Jawa Timur', 'Gunung Liman', 2.563, 'Ponorogo, dan Nganjuk', 'Gunung Liman terletak di Kabupaten Ngawi, Jawa Timur, Indonesia. Gunung ini merupakan salah satu destinasi pendakian yang populer di Jawa Timur meskipun belum sepopuler beberapa gunung lain di wilayah ini.\r\n\r\nGunung Liman memiliki ketinggian sekitar [masukkan ketinggian] meter di atas permukaan laut. Meskipun tidak termasuk dalam kategori gunung yang sangat tinggi, pendakian ke Gunung Liman menawarkan pemandangan alam yang menarik serta udara yang segar di ketinggian.\r\n\r\nGunung Liman memiliki bentuk lereng yang cukup landai dengan beberapa bukit kecil dan hutan yang tersebar di sekitarnya. Gunung ini ditumbuhi oleh hutan tropis yang masih alami, membuatnya cocok untuk wisata alam dan pendakian.\r\n\r\nMedan pendakian di Gunung Liman cenderung cukup mudah dengan jalur pendakian yang tidak terlalu curam. Pendaki akan melewati hutan-hutan yang rimbun dan beberapa bukit kecil sebelum mencapai puncaknya.', '-7.812189114', '111.7603433', 'Jalur Sine', 4, 'gambar-gunung/1719822579-20-explore-liman.png', NULL, NULL),
(20, 'Jawa Timur', 'Gunung Pandan', 0.897, 'Bojonegoro, Nganjuk, dan Madiun', 'Gunung Pandan terletak di perbatasan Kabupaten Bojonegoro dan Kabupaten Nganjuk, Jawa Timur, Indonesia. Gunung ini menjadi salah satu destinasi favorit bagi para pendaki lokal dan wisatawan yang mencari petualangan di alam. Gunung Pandan memiliki ketinggian sekitar 1.610 meter di atas permukaan laut. Meskipun tidak setinggi beberapa gunung lainnya di Jawa Timur, gunung ini tetap menawarkan pengalaman pendakian yang menarik dengan pemandangan alam yang indah.\r\n\r\nGunung Pandan memiliki bentuk lereng yang relatif landai dengan vegetasi yang cukup lebat. Gunung ini ditutupi oleh hutan tropis yang masih alami, memberikan suasana yang sejuk dan asri. Medan pendakian di Gunung Pandan cenderung mudah hingga sedang, cocok untuk pendaki pemula maupun yang sudah berpengalaman. Jalur pendakian melewati hutan tropis yang rimbun dan beberapa punggungan bukit kecil.\r\n\r\nGunung Pandan adalah destinasi pendakian yang cocok bagi siapa saja yang ingin menikmati keindahan alam Jawa Timur tanpa menghadapi tantangan pendakian yang terlalu berat. Dengan pemandangan yang menawan dan suasana yang sejuk, Gunung Pandan menawarkan pengalaman yang tak terlupakan bagi para pendaki dan pecinta alam.', '-7.47704209', '111.8267154', 'Jalur Gondang', 4.5, 'gambar-gunung/1719822594-21-explore-pandan.jpg', NULL, NULL),
(21, 'Jawa Timur', 'Gunung Penanggungan', 1.653, 'Mojokerto, dan Pasuruan', 'Gunung Penanggungan adalah gunung berapi yang terletak di Jawa Timur, Indonesia, tepatnya di perbatasan antara Kabupaten Mojokerto dan Kabupaten Pasuruan. Gunung ini memiliki ketinggian sekitar 1.653 meter di atas permukaan laut dan terkenal dengan pemandangan yang indah serta nilai sejarah dan arkeologinya yang kaya. \r\n\r\nDari puncak Gunung Penanggungan, pendaki dapat menikmati pemandangan yang sangat indah, termasuk pemandangan pegunungan di sekitarnya seperti Gunung Arjuno dan Gunung Welirang.\r\nPemandangan matahari terbit dan terbenam dari puncak gunung ini juga sangat memukau dan menjadi momen yang dinantikan para pendaki.', '-7.614006678', '112.6205883', 'Jalur Tamiajeng, Jalur Jolotundo, Jalur Ngoro', 4.8, 'gambar-gunung/1719822607-22-explore-penanggungan.jpg', NULL, NULL),
(22, 'Jawa Timur', 'Gunung Penanjakan', 2.777, 'Pasuruan', 'Gunung Penanjakan terletak di kawasan Taman Nasional Bromo Tengger Semeru, Jawa Timur, Indonesia. Gunung ini berada di sekitar kawasan Gunung Bromo dan dapat diakses dari berbagai rute, termasuk dari Malang dan Probolinggo. Gunung Penanjakan memiliki ketinggian sekitar 2.770 meter di atas permukaan laut. Ketinggiannya yang cukup signifikan memberikan pemandangan yang luas dan spektakuler dari sekitarnya, termasuk Gunung Bromo, Gunung Semeru, dan lautan pasir Tengger.\r\n\r\nGunung Penanjakan memiliki lereng yang cukup landai dan dapat diakses dengan kendaraan off-road, khususnya jeep. Puncaknya menyediakan platform pandang yang luas, cocok untuk mengamati matahari terbit dan pemandangan sekitarnya.\r\n\r\nPemandangan dari puncak Gunung Penanjakan sangat memukau, terutama saat matahari terbit. Dari sini, wisatawan dapat melihat lautan pasir Tengger, Gunung Bromo yang aktif dengan kepulan asapnya, serta Gunung Semeru yang menjulang tinggi di kejauhan. Langit yang berwarna-warni saat fajar menjadikan pemandangan ini salah satu yang terbaik di Indonesia.', '-7.906972413', '112.9482472', 'Jalur Cemoro Lawang, Jalur Wonokitri', 4.8, 'gambar-gunung/1719822623-23-explore-penanjakan.jpg', NULL, NULL),
(23, 'Jawa Timur', 'Gunung Ranti', 2.045, 'Bondowoso, dan Banyuwangi', 'Gunung Ranti adalah salah satu gunung yang terletak di Kabupaten Ponorogo, Jawa Timur, Indonesia. Meskipun tidak sepopuler beberapa gunung lain di Jawa Timur seperti Bromo atau Semeru, Gunung Ranti menawarkan pengalaman pendakian yang menarik dengan pemandangan alam yang indah di sekitarnya. \r\n\r\nDari puncak Gunung Ranti, pendaki dapat menikmati pemandangan alam yang menakjubkan, termasuk hutan-hutan yang hijau dan pegunungan di sekitarnya.\r\nPemandangan matahari terbit dan terbenam dari puncak gunung ini juga sangat memukau dan menjadi momen yang dinantikan.\r\n\r\nGunung Penanjakan adalah destinasi yang sangat direkomendasikan bagi siapa saja yang ingin menikmati keindahan alam dan pemandangan matahari terbit yang menakjubkan di kawasan Taman Nasional Bromo Tengger Semeru. Pemandangan dari puncaknya akan menjadi pengalaman yang tak terlupakan bagi para wisatawan dan pecinta alam.', '-8.097659264', '114.2140806', 'Jalur Ijen', 4.6, 'gambar-gunung/1721210191-24-explore-ranti.jpg', NULL, NULL),
(24, 'Jawa Timur', 'Gunung Suket', 2.95, 'Bondowoso', 'Gunung Suket terletak di perbatasan antara Kabupaten Bondowoso dan Kabupaten Situbondo, Jawa Timur, Indonesia. Gunung ini merupakan bagian dari kawasan pegunungan Ijen yang terkenal dengan keindahan alam dan aktivitas vulkaniknya. Gunung Suket memiliki ketinggian sekitar 2.950 meter di atas permukaan laut. Dengan ketinggian ini, Gunung Suket menawarkan pemandangan alam yang memukau dan udara yang sejuk di puncaknya.\r\n\r\nGunung Suket memiliki bentuk yang khas dengan lereng yang cukup terjal dan puncak yang relatif sempit. Gunung ini ditutupi oleh vegetasi yang lebat, termasuk hutan pegunungan yang masih alami. Medan pendakian di Gunung Suket cenderung menantang dengan jalur yang berbatu dan terjal. Pendakian biasanya memerlukan persiapan fisik yang baik dan peralatan pendakian yang memadai.\r\n\r\nGunung Suket adalah destinasi pendakian yang cocok bagi pendaki yang mencari tantangan dan ingin menikmati keindahan alam pegunungan di Jawa Timur. Dengan pemandangan yang menakjubkan dan lingkungan yang masih alami, Gunung Suket menawarkan pengalaman pendakian yang tak terlupakan.', '-8.082829105', '114.0803228', 'Jalur Kawah Ijen', 4.3, 'gambar-gunung/1719822654-25-explore-suket.jpg', NULL, NULL),
(25, 'Jawa Timur', 'Gunung Welirang', 3.156, 'Kota Batu, Pasuruan, dan Mojokerto', 'Gunung Welirang adalah salah satu gunung yang terletak di Provinsi Jawa Timur, Indonesia, tepatnya di wilayah pegunungan Arjuno-Welirang. Gunung ini memiliki ketinggian sekitar 3.156 meter di atas permukaan laut dan merupakan salah satu gunung api yang aktif di Indonesia. \r\n\r\nDari puncak Gunung Welirang, pendaki dapat menikmati pemandangan yang spektakuler, termasuk pemandangan lembah, gunung-gunung di sekitarnya seperti Gunung Arjuno dan Gunung Penanggungan, serta lautan jika cuaca memungkinkan.\r\nPemandangan matahari terbit dan terbenam dari puncak gunung ini juga sangat memukau dan menjadi momen yang dinantikan.', '-7.914881075', '112.4496565', 'Jalur Trestes, Jalur Lawang, Jalur Batu', 4.4, 'gambar-gunung/1721210330-26-explore-welirang.jpg', NULL, NULL),
(26, 'Jawa Timur', 'Gunung WIlis', 2.552, 'Kota Kediri, Tulungagung, Nganjuk, Madiun, Ponorog', 'Gunung Wilis terletak di perbatasan beberapa kabupaten di Provinsi Jawa Timur, termasuk Kabupaten Madiun, Nganjuk, Tulungagung, Kediri, dan Ponorogo. Gunung ini menjadi titik pertemuan bagi berbagai rute pendakian dari berbagai daerah. Gunung Wilis memiliki ketinggian sekitar 2.169 meter di atas permukaan laut. Ketinggian ini memberikan udara yang sejuk dan pemandangan alam yang indah dari puncaknya.\r\n\r\nGunung Wilis memiliki bentuk yang beragam dengan lereng yang bervariasi mulai dari landai hingga terjal. Gunung ini ditutupi oleh hutan tropis yang lebat dan area perkebunan yang hijau. Medan pendakian di Gunung Wilis cukup bervariasi, mulai dari jalur yang mudah hingga jalur yang menantang. Pendaki akan melewati hutan lebat, sungai-sungai kecil, dan bukit-bukit yang menawarkan pemandangan indah.\r\n\r\nGunung Wilis adalah destinasi yang sempurna bagi para pendaki yang mencari petualangan dan keindahan alam di Jawa Timur. Dengan berbagai jalur pendakian dan pemandangan yang menakjubkan, Gunung Wilis menawarkan pengalaman pendakian yang tak terlupakan.', '-7.812335307', '111.7604291', 'Jalur Bajulan, Jalur Sendang, Jalur Jugo, Jalur Cemorosewu', 4.4, 'gambar-gunung/1719822685-27-explore-wilis.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2024_06_27_121722_create_pengalamen_table', 1),
(10, '2024_06_27_123141_create_create_pengalaman_tables_table', 1),
(11, '2024_07_01_052641_create_admins_table', 2),
(12, '2024_07_01_054733_add_timestamps_to_admin_table', 3),
(13, '2024_07_01_055453_create_admin_table', 4),
(14, '2024_07_01_085402_add_default_value_to_gambar_column_in_gunung_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengalaman`
--

CREATE TABLE `pengalaman` (
  `id_pengalaman` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengalaman`
--

INSERT INTO `pengalaman` (`id_pengalaman`, `id`, `nama`, `tanggal`, `deskripsi`, `created_at`, `updated_at`) VALUES
(7, 19, 'Az Zahra Hijriah', '2024-07-17', 'Ini adalah pengalaman mendaki terbaik saya! Terima kasih AyoMuncak atas referensi-referensi yang diberikan. Informasi tentang jalur dan peta sangat membantu, dan rating yang tersedia membantu saya memilih gunung yang sesuai dengan tingkat kesulitan yang saya inginkan.', '2024-07-17 10:16:06', '2024-07-17 10:20:46'),
(9, 14, 'Ayu', '2024-07-17', 'Terima kasih AyoMuncak! Kami sangat terbantu dengan informasi tentang paket-paket wisata yang ada di Gunung Bromo. Paket tour yang kami pilih sangat menyenangkan, dan pemandangan matahari terbitnya luar biasa!', '2024-07-17 10:21:34', '2024-07-17 10:21:34'),
(10, 1, 'Budi Prasetyo', '2024-07-17', 'AyoMuncak adalah sumber informasi yang sangat bermanfaat. Deskripsi tentang medan pendakian dan tips-tips yang diberikan sangat membantu kami dalam persiapan sebelum mendaki Gunung Arjuna.', '2024-07-17 10:22:02', '2024-07-17 10:22:02'),
(12, 22, 'Rudi Hartono', '2024-07-17', 'Pendakian ke Gunung Penanjakan dimulai dengan tujuan utama untuk menyaksikan matahari terbit yang spektakuler. Kami tiba di penanjakan sebelum fajar dan disuguhi dengan pemandangan matahari terbit yang memukau. Setelah itu, kami menjelajahi kawasan sekitar dan menikmati keindahan alam serta udara segar di pagi hari. Perjalanan ini adalah pengalaman yang sangat menyenangkan dan memberikan kenangan indah.', '2024-07-17 10:23:40', '2024-07-17 10:23:40'),
(13, 18, 'Citra Dewi', '2024-07-17', 'Mendaki Gunung Kelud adalah pengalaman yang sangat seru. Kami memulai perjalanan pagi-pagi dan mendaki melalui jalur yang menantang. Pemandangan dari kawah Kelud sangat menakjubkan, dan kami juga sempat menikmati beberapa spot foto yang keren di sepanjang perjalanan. Kami merasa puas setelah berhasil mencapai puncak dan menikmati pemandangan luar biasa dari kawah vulkanik ini.', '2024-07-17 10:24:17', '2024-07-17 10:24:17');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
  `id_tour` int(5) NOT NULL,
  `id` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `instagram` varchar(20) NOT NULL,
  `facebook` varchar(20) NOT NULL,
  `tiktok` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`id_tour`, `id`, `nama`, `nohp`, `email`, `instagram`, `facebook`, `tiktok`, `created_at`, `updated_at`) VALUES
(1, 3, 'p', 'p', 'p@gmail.com', '-', 'p', 'p', '2024-06-27 06:42:56', '2024-06-27 06:42:56'),
(2, 2, 'BromoTour', '098221413', '-@gmail.com', 'bromotour', 'bromotour', 'bromotour', '2024-06-27 10:35:59', '2024-06-27 10:35:59'),
(4, 14, 'BromoTour', '085157282247', 'bromotour@gmail.com', 'bromotour', 'Bromo Tour', 'bromotour', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `admin_username_unique` (`username`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gunung`
--
ALTER TABLE `gunung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pengalaman`
--
ALTER TABLE `pengalaman`
  ADD PRIMARY KEY (`id_pengalaman`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id_tour`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gunung`
--
ALTER TABLE `gunung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pengalaman`
--
ALTER TABLE `pengalaman`
  MODIFY `id_pengalaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour`
--
ALTER TABLE `tour`
  MODIFY `id_tour` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
