-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 14, 2022 at 10:03 PM
-- Server version: 10.3.32-MariaDB-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dtek9578_ahmad`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id` int(1) NOT NULL,
  `nama_bahan` varchar(50) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(5) NOT NULL,
  `kategori_id` int(5) DEFAULT NULL,
  `kode_barang` varchar(50) DEFAULT NULL,
  `rak` varchar(10) NOT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `harga` int(20) DEFAULT NULL,
  `stok` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kategori_id`, `kode_barang`, `rak`, `nama_barang`, `harga`, `stok`) VALUES
(2, 10, '011', '', 'Acarbose', 10000, 110),
(4, 10, '012', '', 'Amoxicillin', 16000, 110),
(5, 10, '013', '', 'paracetamol', 60000, 38),
(6, 10, '014', '', 'Ibuprofen  ', 8000, 110),
(7, 10, '015', '', 'Metamizol/antalgin', 10000, 110),
(8, 10, '016', '', 'Ambroxol', 21000, 108),
(9, 10, '017', '', 'Amlodipin', 35000, 110),
(10, 10, '018', '', 'Amphicilin', 20000, 110),
(11, 10, '019', '', 'Acyclovir', 12000, 110),
(12, 10, '020', '', 'Betahistine', 18000, 110),
(13, 10, '020', '', 'Clyndamycin ', 16000, 109),
(14, 10, '021', '', 'Cotrimoxazole ', 22000, 110),
(15, 10, '022', '', 'Captopril', 7000, 108),
(16, 10, '023', '', 'Cetirizine', 5000, 106),
(17, 10, '024', '', 'Ciprofloxacin', 25000, 110),
(18, 10, '025', '', 'Cefadroxil ', 140000, 110),
(19, 10, '026', '', 'Chlorpheniramine', 25000, 110),
(20, 10, '026', '', 'Chloramphenicol', 100000, 110),
(21, 10, '027', '', 'Calsium Lactate', 26000, 110),
(22, 10, '028', '', 'Dexametasone ', 16000, 110),
(23, 10, '029', '', 'Detromethorphan', 50000, 110),
(24, 10, '030', '', 'Diazepam', 54000, 110),
(25, 10, '031', '', 'Domperidone', 7500, 110),
(26, 10, '031', '', 'Eritromycin', 17000, 110),
(27, 10, '032', '', 'Furosemide', 80000, 110),
(28, 10, '033', '', 'Glibenclamide ', 3000, 110),
(29, 10, '034', '', 'Glimepiride ', 5000, 110),
(30, 10, '035', '', 'Glyceryl Guaiacolate', 19000, 110),
(31, 10, '036', '', 'Ibuprofen', 7000, 110),
(32, 10, '037', '', 'Isosorbide Dinitrate ', 15000, 109),
(33, 10, '038', '', 'Ketoconazole', 8000, 110),
(34, 10, '039', '', 'Lansoprazole', 10000, 110),
(35, 10, '040', '', 'Loperamide', 5000, 110),
(36, 10, '041', '', 'Loratadine ', 26000, 110),
(37, 10, '042', '', 'Metilprednisolon ', 23000, 110),
(38, 10, '043', '', 'Metronidazole ', 4000, 109),
(39, 10, '044', '', 'Metformin', 40000, 110),
(40, 10, '045', '', 'Meloxicam ', 5000, 110),
(41, 10, '046', '', 'Metildopa ', 14000, 109),
(42, 10, '047', '', 'Natrium Diklofenac', 31000, 110),
(43, 10, '048', '', 'Nifedipine', 19000, 110),
(44, 10, '049', '', 'Omeprazole ', 4600, 109),
(45, 10, '050', '', 'Piroxicam ', 3000, 110),
(46, 10, '051', '', 'Prednisone', 20000, 110),
(47, 10, '052', '', 'Prednisolone', 14000, 110),
(48, 10, '053', '', 'Pirantel Pamoat ', 17000, 109),
(49, 10, '054', '', 'Quinine ', 180000, 109),
(50, 10, '055', '', 'Ranitidine', 16000, 110),
(51, 10, '056', '', 'Simvastatin', 35000, 110),
(52, 10, '057', '', 'Salbutamol', 3000, 108),
(53, 10, '058', '', 'Spyramicin', 5000, 110),
(54, 10, '059', '', 'Sulfas Ferosus', 9000, 110),
(55, 10, '060', '', 'Tramadol ', 15000, 110),
(56, 10, '061', '', 'Tetracyclin', 4000, 110),
(57, 10, '062', '', 'Valsartan', 26000, 110),
(58, 10, '063', '', 'Zinc', 35000, 110),
(59, 5, '064', '', 'Amoxicillin ', 7500, 72),
(60, 5, '065', '', 'Ambroxol', 7000, 90),
(61, 5, '066', '', 'Antasida', 6000, 89),
(62, 5, '067', '', 'Cetirizine ', 11000, 96),
(63, 5, '068', '', 'Chloramphenicol ', 16000, 102),
(64, 5, '069', '', 'Cotrimoxazole ', 4000, 100),
(65, 5, '070', '', 'Domperidone', 14000, 110),
(66, 5, '071', '', 'Detromethorphan', 13000, 104),
(67, 5, '072', '', 'Eritromycin ', 18000, 110),
(68, 5, '073', '', 'Ibuprofen ', 18500, 110),
(69, 5, '074', '', 'Laxadine ', 62000, 110),
(70, 5, '075', '', 'Paracetamol ', 16000, 110),
(71, 2, '076', '', 'Vitamin A', 45000, 104),
(72, 2, '077', '', 'Vitamin B1 (Thiamin)', 15000, 85),
(73, 2, '078', '', 'Vitamin B6 (Pyridoxine)', 80000, 83),
(74, 2, '079', '', 'Vitamin B12 (Hidroxocobalamin)', 96000, 81),
(75, 2, '080', '', 'Vitamin B Compleks', 220000, 98),
(76, 2, '081', '', 'Vitamin C (Ascorbic Acid) ', 161000, 99),
(77, 2, '082', '', 'Phytomenadione (Vit K1)', 16000, 110),
(78, 6, '083', '', 'Gentamicin 0,1 %', 6000, 110),
(79, 6, '084', '', 'Acyclovir 5 % ', 6000, 110),
(80, 6, '085', '', 'Bacitracin Polymyxin B ', 7000, 110),
(81, 6, '086', '', 'Betametasone 0,1%', 10500, 110),
(82, 6, '087', '', 'Hidrocortisone 2,5%', 5000, 110),
(83, 6, '088', '', 'Miconazole Cream 2%', 5000, 110),
(84, 6, '089', '', 'Oxytetracycline 1 % ', 8000, 110),
(85, 6, '090', '', 'Oxytetracycline 3 %', 10000, 110),
(86, 7, '091', '', 'guttae', 95000, 109),
(87, 7, '092', '', 'guttae oris', 18000, 110),
(88, 7, '093', '', 'guttae auriculares', 19000, 108),
(89, 7, '094', '', ' guttae nasales', 65000, 110),
(90, 7, '095', '', 'guttae opthalmicae', 60000, 110);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(1) NOT NULL,
  `nama_customer` varchar(40) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama_customer`, `tel`, `alamat`) VALUES
(1, 'Budi Mulyana', '087775353016', 'Jalan Merpati Raya RT12/RW08 no 12. Bekasi, Jawa Barat'),
(2, 'Agus Mulayana', '0814939489480', 'Jalan Tridaya indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(3, 'Bambang Sugiarto', '087773848918', 'Jalan Tridayasakti RT09/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(4, 'Dani Maulana ', '0895283929294', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(5, 'Ahmad Ramadhan', '08989392356', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(6, 'Chairul Hamzah', '08975959592', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(7, 'Irwan Kurniawan', '0895579302938', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(8, 'Alif Nurrohim', '0895485930158', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(9, 'Bayu Pradana', '0877737492019', 'Jalan Tridaya Sakti RT09/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(10, 'Bagas Setiawan', '087773849284', 'Jalan Tridaya Sakti RT09/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(11, 'Aazkiya Puspita Sari', '083866304002', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(12, 'Aathifa Fitrian', '0811294783', 'Jalan Tridaya Sakti RT09/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(13, 'Abida Dahlia', '085647021807', 'Jalan Tridaya Sakti RT09/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(14, 'Alsava Nur Fitri', '087835312932 ', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(15, 'Helia Malawati', '085640121804', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(16, 'Chika Melati', '085640121804 ', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(17, 'Citra Kirana', '085728000422', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(18, 'Candra Prakoso', '085728054444', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(19, 'Dodi Mulyadi', '081392365142    ', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(20, 'Dimas Prasetyo', '081567629043', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(21, 'Elin Pratiwi', '081393937071', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(22, 'Fikri Ramadhan', '085642353664', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(23, 'Fitri Aulia', '085229624162', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(24, 'Fani Intan', '085642353664', 'Jalan Tridaya Sakti RT09/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(25, 'Farid Pratama', '081225927888', 'Jalan Tridaya Sakti RT09/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(26, 'Fadel Muhammad', '081328478190', 'Jalan Tridaya Sakti RT09/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(27, 'Galih Purnama', '081548515774 ', 'Jalan Tridaya Sakti RT09/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(28, 'Guntur Triyadi', '081393365787 ', 'Jalan Tridaya Sakti RT09/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(29, 'Gilang Ramadhan', '081288046553', 'Jalan Tridaya Sakti RT09/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(30, 'Gibran Agung', '08886715207', 'Jalan Tridaya Sakti RT09/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(31, 'Hamidah Dania', '085229219377', 'Jalan Tridaya Sakti RT09/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(32, 'Hilda Dania', '085643870947', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(33, 'Hisyam Muhammad', '08156704040', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(34, 'Haikal Mukti', ' 08884155557', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(35, 'Harun Triyandi', ' 0811327546   ', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(36, ' Irfan Islamy', '081218765349 ', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(37, 'Joko Susilo', '085726832323  ', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(38, 'Jefri Prayanto', ' 081804034827 ', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(39, 'Karin Melani', '08122638778  ', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(40, 'Kirana Pranita', '0817259480   ', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(41, 'Agus Mulyana', '089737372929', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(42, 'Indra Ramdani', '088108393092', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(43, 'Edy Suranta', '088828374920', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(44, 'Alfian Putra', '0812384749393', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(45, 'Egi Ramadhan', '089836363738 	', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(46, 'Awal Pradana', '089839474939 	', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(47, 'Neneng Permatasari', '0812938383920 	', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(48, 'Agung Prasetyo', '089839463839 	', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(49, 'Adam Saputra', '089637826282 	', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(50, 'Rendi Irawan', '081293873920 	', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(51, 'Rosita Putri', '089649483929', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(52, 'Lutpiah Nita', '0896374629237 	', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(53, 'Azizah Fitri', '081293938392 	', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(54, 'Maman Saputra', '08974839372', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(55, 'Agung Pratama', '08812383392 	', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(56, 'Nenda Safitri', '089647463822', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(57, 'Mala Permatasari', '089637472829 	', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(58, 'Bobby Saputra', '081293645282 	', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(59, 'Mawar Ayu', '088838235392 	', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(60, 'Farhan Nuraziz', '081294747392 	', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(61, 'Muhammad Iqbal', '088832928383 	', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(62, 'Lesti Safitri', '0812939484939', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(63, 'Anggun Permatasari', '0812837484939 	', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(64, 'Samsul Arifin', '089849474949 	', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(65, 'Andik Virnandra', '087774958393 	', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(66, 'Deden Saputra', '08963638647 	 ', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(67, 'Chaca Safitri', '089739475949 	', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(68, 'Vira Savira', '08964857339', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(69, 'Puput Lestari', '0896484749383 	', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(70, 'Arif Fadilah', '0895475949374 	', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(71, 'Gugun Gunawan', '089648374939 	', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(72, 'Mardi Saputra', '089657493028 	', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(73, 'Rendi Fadilah', '0812738495739 	', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(74, 'Rizki Setiawan', '089764749393 	', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(75, 'Irfan Maulana', '0896485637493', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(76, 'Zainal Muttaqin', '089548564935 	', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(77, 'Amar Ajiman', '08963945949', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(78, 'Amirul Maarif', '08974959304 	', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(79, 'Andre Fajar', '089649475930', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat '),
(80, 'Jajang Ajiman', '0896484739383 	', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(81, 'Angga Fadilah', ' 089797393938', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat '),
(82, 'Toni Sucipto', '087774849302', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(83, 'Rafi Fikri', '089654849374', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(84, 'Qiqi Rahayu', '089640576839 	', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(85, 'Naila Anggita', '089643849392 	', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(86, 'Oskar Arifin', '087774392739', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(87, 'Monika Sari', '089638492929 	', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(88, 'Mila Anggraini', '08984949204 	', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(89, 'Maya Lestari', '081729394929', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(90, 'Malik Ibrahim', '083849394309 	', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(91, 'Nanda Fernanda', '081274947593 	', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(92, 'Nisa Rahmawati', '089749573930 	', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(93, 'Oki Triatna', '08974749403 	', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(94, 'Darius Pratama', '0896594759393 	', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(95, 'Bagas Darma', '081284930402 	', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(96, 'Aulia Rahayu', '087773839302 	', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(97, 'Dodi Rahmat', '081383938324 	', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(98, 'Abinaya Ramdan', '0853-7160-5788 	', 'Jalan Tridaya Sakti RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat '),
(99, 'Irfan Islamy', '081218765349 ', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(100, 'Harun Triyandi', '0811327546 ', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(101, ' Haikal Mukti', '08884155557', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(102, 'Hisyam Muhammad', '08156704040', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(103, 'Hilda Dania', '085643870947', 'Jalan Tridaya Indah RT08/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(104, 'Gibran Agung', '08886715207 	', 'Jalan Tridaya Sakti RT09/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(105, 'Gilang Ramadhan', '081288046553 	', 'Jalan Tridaya Sakti RT09/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(106, 'Guntur Triyadi', '081393365787 ', 'Jalan Tridaya Sakti RT09/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat'),
(107, 'Galih Purnama', '081548515774 ', 'Jalan Tridaya Sakti RT09/010 Kec.Tambun Selatan, Kabupaten Bekasi, Jawa Barat');

-- --------------------------------------------------------

--
-- Table structure for table `detail_barang`
--

CREATE TABLE `detail_barang` (
  `id` int(1) NOT NULL,
  `id_barang` int(1) NOT NULL,
  `id_bahan` int(1) NOT NULL,
  `rasio` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int(5) NOT NULL,
  `transaksi_id` int(5) DEFAULT NULL,
  `barang_id` int(5) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `transaksi_id`, `barang_id`, `qty`) VALUES
(2, 1, 1, 2),
(3, 2, 90, 5),
(5, 3, 61, 1),
(6, 3, 72, 1),
(7, 3, 65, 1),
(8, 4, 71, 1),
(9, 4, 62, 1),
(10, 5, 74, 1),
(11, 5, 64, 1),
(12, 6, 76, 1),
(13, 6, 17, 1),
(14, 6, 68, 1),
(15, 7, 75, 1),
(16, 7, 9, 1),
(17, 7, 88, 1),
(18, 8, 72, 1),
(19, 8, 62, 1),
(20, 9, 71, 1),
(21, 9, 63, 1),
(22, 10, 74, 1),
(23, 10, 79, 1),
(24, 11, 59, 1),
(25, 11, 90, 1),
(26, 12, 59, 1),
(27, 12, 74, 1),
(28, 13, 61, 1),
(29, 13, 73, 1),
(30, 14, 71, 1),
(31, 14, 59, 1),
(32, 15, 59, 1),
(33, 15, 76, 1),
(34, 15, 82, 1),
(35, 16, 72, 1),
(36, 16, 63, 1),
(37, 49, 72, 1),
(38, 49, 61, 1),
(39, 49, 66, 1),
(40, 48, 72, 1),
(41, 48, 64, 1),
(42, 47, 71, 1),
(43, 47, 86, 1),
(44, 47, 63, 1),
(45, 50, 75, 1),
(46, 50, 60, 1),
(47, 45, 73, 1),
(48, 45, 10, 1),
(49, 45, 84, 1),
(50, 44, 59, 1),
(51, 44, 76, 1),
(52, 42, 59, 1),
(53, 42, 76, 1),
(54, 42, 9, 1),
(55, 41, 62, 1),
(56, 41, 73, 1),
(57, 40, 62, 1),
(58, 40, 74, 1),
(59, 39, 62, 1),
(60, 39, 2, 1),
(61, 39, 60, 1),
(62, 38, 72, 1),
(63, 38, 59, 1),
(64, 37, 62, 1),
(65, 37, 59, 1),
(66, 36, 76, 1),
(67, 36, 59, 1),
(68, 36, 61, 1),
(69, 35, 74, 1),
(70, 35, 59, 1),
(71, 34, 61, 1),
(72, 34, 75, 1),
(73, 33, 59, 1),
(74, 33, 74, 1),
(75, 32, 59, 1),
(76, 32, 73, 1),
(77, 32, 61, 1),
(78, 32, 18, 1),
(79, 31, 76, 1),
(80, 31, 66, 1),
(81, 30, 59, 1),
(82, 30, 73, 1),
(83, 30, 63, 1),
(84, 29, 60, 1),
(85, 29, 61, 1),
(86, 29, 73, 1),
(87, 28, 76, 1),
(88, 28, 60, 1),
(89, 27, 71, 1),
(90, 27, 59, 1),
(91, 27, 63, 1),
(92, 25, 76, 1),
(93, 25, 59, 1),
(94, 25, 64, 1),
(95, 24, 73, 1),
(96, 24, 61, 1),
(97, 23, 63, 1),
(98, 23, 73, 1),
(99, 22, 72, 1),
(100, 22, 59, 1),
(101, 22, 60, 1),
(102, 21, 59, 1),
(103, 21, 76, 1),
(104, 19, 74, 1),
(105, 19, 89, 1),
(106, 18, 48, 1),
(107, 18, 5, 1),
(108, 17, 5, 1),
(109, 17, 73, 1),
(110, 51, 5, 1),
(111, 51, 73, 1),
(112, 51, 62, 1),
(113, 77, 74, 1),
(114, 77, 5, 1),
(115, 77, 64, 1),
(116, 78, 74, 1),
(117, 78, 63, 1),
(118, 78, 5, 1),
(119, 79, 72, 1),
(120, 79, 5, 1),
(121, 79, 61, 1),
(122, 80, 74, 1),
(123, 80, 5, 1),
(124, 80, 61, 1),
(125, 81, 72, 1),
(126, 81, 5, 1),
(127, 81, 61, 1),
(128, 82, 76, 1),
(129, 82, 60, 1),
(130, 82, 13, 1),
(131, 84, 76, 1),
(132, 84, 59, 1),
(133, 84, 5, 1),
(134, 85, 72, 1),
(135, 85, 63, 1),
(136, 85, 59, 1),
(137, 86, 74, 1),
(138, 86, 60, 1),
(139, 86, 62, 1),
(140, 87, 73, 1),
(141, 87, 5, 1),
(143, 87, 64, 1),
(144, 88, 72, 1),
(145, 88, 59, 1),
(146, 88, 61, 1),
(147, 89, 75, 1),
(148, 89, 5, 1),
(149, 89, 74, 1),
(150, 90, 72, 1),
(151, 90, 5, 1),
(153, 90, 61, 1),
(154, 91, 73, 1),
(155, 91, 59, 1),
(156, 93, 72, 1),
(157, 93, 5, 1),
(158, 93, 60, 1),
(159, 94, 74, 1),
(160, 94, 8, 1),
(161, 94, 5, 1),
(162, 95, 74, 1),
(163, 95, 61, 1),
(164, 95, 5, 1),
(165, 96, 71, 1),
(166, 96, 5, 1),
(167, 96, 60, 1),
(168, 97, 74, 1),
(169, 97, 61, 1),
(170, 97, 5, 1),
(171, 98, 74, 1),
(172, 98, 64, 1),
(173, 98, 62, 1),
(174, 100, 62, 1),
(175, 100, 5, 1),
(176, 100, 72, 1),
(177, 101, 72, 1),
(178, 101, 5, 1),
(179, 101, 61, 1),
(180, 102, 72, 1),
(181, 102, 60, 1),
(182, 102, 5, 1),
(183, 103, 76, 1),
(184, 103, 62, 1),
(185, 103, 60, 1),
(186, 104, 73, 1),
(187, 104, 61, 1),
(188, 104, 5, 1),
(189, 105, 71, 1),
(190, 105, 59, 1),
(191, 105, 64, 1),
(192, 106, 75, 1),
(193, 106, 63, 1),
(194, 106, 60, 1),
(195, 107, 72, 1),
(196, 107, 62, 1),
(197, 107, 5, 1),
(198, 108, 71, 1),
(199, 108, 64, 1),
(200, 108, 5, 1),
(201, 109, 74, 1),
(202, 109, 5, 1),
(203, 109, 73, 1),
(204, 110, 73, 1),
(205, 110, 59, 1),
(206, 110, 5, 1),
(207, 111, 74, 1),
(208, 111, 61, 1),
(209, 111, 5, 1),
(210, 112, 71, 1),
(211, 112, 59, 1),
(212, 112, 5, 1),
(213, 113, 76, 1),
(214, 113, 62, 1),
(215, 113, 5, 1),
(216, 114, 74, 1),
(217, 114, 59, 1),
(218, 114, 5, 1),
(219, 115, 73, 1),
(220, 115, 5, 1),
(221, 116, 60, 1),
(222, 116, 73, 1),
(223, 116, 16, 1),
(224, 118, 73, 1),
(225, 118, 62, 1),
(226, 118, 52, 1),
(227, 119, 74, 1),
(228, 119, 5, 1),
(229, 119, 60, 1),
(230, 120, 72, 1),
(231, 120, 64, 1),
(232, 120, 15, 1),
(233, 122, 72, 1),
(234, 122, 62, 1),
(235, 122, 60, 1),
(236, 123, 76, 1),
(237, 123, 59, 1),
(238, 123, 5, 1),
(239, 124, 74, 1),
(240, 124, 59, 1),
(241, 124, 5, 1),
(242, 125, 75, 1),
(243, 125, 59, 1),
(244, 125, 5, 1),
(245, 126, 73, 1),
(246, 126, 61, 1),
(247, 126, 73, 1),
(248, 127, 75, 1),
(249, 127, 62, 1),
(250, 127, 60, 1),
(251, 128, 73, 1),
(252, 128, 59, 1),
(253, 128, 5, 1),
(254, 129, 60, 1),
(255, 129, 61, 1),
(256, 129, 5, 1),
(257, 130, 73, 1),
(258, 130, 59, 1),
(259, 130, 66, 1),
(260, 131, 74, 1),
(261, 131, 62, 1),
(262, 131, 16, 1),
(263, 132, 76, 1),
(264, 132, 66, 1),
(265, 132, 5, 1),
(266, 133, 73, 1),
(267, 133, 62, 1),
(268, 133, 5, 1),
(269, 134, 72, 1),
(270, 134, 63, 1),
(271, 134, 5, 1),
(272, 135, 72, 1),
(273, 135, 60, 1),
(274, 135, 64, 1),
(275, 136, 59, 1),
(276, 136, 48, 1),
(277, 136, 41, 1),
(278, 137, 72, 1),
(279, 137, 61, 1),
(280, 137, 5, 1),
(281, 138, 73, 1),
(282, 138, 5, 1),
(283, 138, 64, 1),
(284, 139, 32, 1),
(285, 139, 52, 1),
(286, 139, 86, 1),
(287, 140, 73, 1),
(288, 140, 66, 1),
(289, 141, 74, 1),
(290, 141, 61, 1),
(291, 141, 49, 1),
(292, 142, 74, 1),
(293, 142, 5, 1),
(294, 143, 75, 1),
(295, 143, 60, 1),
(296, 143, 63, 1),
(297, 144, 76, 1),
(298, 144, 60, 1),
(299, 144, 5, 1),
(300, 145, 74, 1),
(301, 145, 5, 1),
(302, 145, 88, 1),
(303, 146, 72, 1),
(304, 146, 5, 1),
(305, 146, 61, 1),
(306, 147, 74, 1),
(307, 147, 59, 1),
(308, 147, 5, 1),
(309, 148, 74, 1),
(310, 148, 59, 1),
(311, 148, 5, 1),
(312, 149, 75, 1),
(313, 149, 59, 1),
(314, 150, 74, 1),
(315, 150, 59, 1),
(316, 150, 5, 1),
(317, 151, 76, 1),
(318, 151, 62, 1),
(320, 151, 5, 1),
(321, 152, 74, 1),
(322, 152, 59, 1),
(323, 153, 74, 1),
(324, 153, 59, 1),
(325, 153, 15, 1),
(326, 154, 76, 1),
(327, 154, 59, 1),
(328, 154, 60, 1),
(329, 155, 72, 1),
(330, 155, 63, 1),
(331, 155, 5, 1),
(332, 156, 75, 1),
(333, 156, 59, 1),
(334, 156, 5, 1),
(335, 157, 72, 1),
(336, 157, 61, 1),
(337, 157, 5, 1),
(338, 158, 59, 1),
(339, 158, 73, 1),
(340, 158, 5, 1),
(341, 159, 59, 1),
(342, 159, 73, 1),
(343, 159, 5, 1),
(344, 160, 73, 1),
(345, 160, 59, 1),
(346, 160, 5, 1),
(347, 161, 74, 1),
(348, 161, 60, 1),
(349, 161, 5, 1),
(350, 162, 74, 1),
(351, 162, 59, 1),
(352, 162, 5, 1),
(353, 163, 72, 1),
(354, 163, 64, 1),
(355, 163, 66, 1),
(356, 164, 60, 1),
(357, 164, 73, 1),
(358, 164, 5, 1),
(359, 165, 75, 1),
(360, 165, 59, 1),
(361, 166, 72, 1),
(362, 166, 62, 1),
(363, 166, 5, 1),
(364, 167, 76, 1),
(365, 167, 5, 1),
(366, 167, 59, 1),
(367, 168, 76, 1),
(368, 168, 59, 1),
(369, 168, 5, 1),
(370, 169, 72, 1),
(371, 169, 5, 1),
(372, 169, 62, 1),
(373, 170, 75, 1),
(374, 170, 59, 1),
(375, 170, 5, 1),
(376, 171, 72, 1),
(377, 171, 61, 1),
(378, 171, 38, 1),
(379, 172, 72, 1),
(380, 172, 59, 1),
(381, 172, 16, 1),
(382, 173, 73, 1),
(383, 173, 61, 1),
(384, 173, 5, 1),
(385, 174, 71, 1),
(386, 174, 60, 1),
(387, 174, 61, 1),
(388, 175, 74, 1),
(389, 175, 59, 1),
(390, 175, 5, 1),
(391, 176, 72, 1),
(392, 176, 59, 1),
(393, 176, 5, 1),
(394, 177, 75, 1),
(395, 177, 59, 1),
(396, 178, 73, 1),
(397, 178, 59, 1),
(398, 178, 5, 1),
(399, 179, 71, 1),
(400, 179, 59, 1),
(401, 179, 8, 1),
(402, 180, 75, 1),
(403, 180, 63, 1),
(404, 180, 5, 1),
(405, 181, 75, 1),
(407, 181, 63, 1),
(408, 181, 44, 1),
(409, 182, 74, 1),
(410, 182, 5, 1),
(411, 182, 59, 1),
(412, 183, 88, 1),
(413, 183, 66, 1),
(415, 183, 73, 1),
(416, 184, 73, 1),
(417, 184, 59, 1),
(418, 184, 5, 1),
(419, 185, 73, 1),
(420, 185, 61, 1),
(421, 185, 5, 1),
(422, 186, 73, 1),
(423, 186, 60, 1),
(424, 186, 5, 1),
(425, 187, 73, 1),
(426, 187, 5, 1),
(427, 187, 66, 1),
(428, 188, 74, 1),
(429, 188, 61, 1),
(430, 188, 5, 1),
(431, 189, 72, 1),
(432, 189, 64, 1),
(433, 189, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(5) NOT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Aditif'),
(2, 'Vitamin'),
(3, 'Obat PIL/ Kapsul'),
(5, 'Obat Cair'),
(6, 'Obat Oles '),
(7, 'Obat Tetes'),
(8, 'Obat Tempel'),
(9, 'Obat Serbuk'),
(10, 'Obat Tablet'),
(11, 'Inhaler');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(5) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `total` int(50) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `customer`, `tanggal`, `total`) VALUES
(77, '1', '2021-10-01', 160000),
(78, '2', '2021-10-02', 172000),
(79, '3', '2021-10-02', 81000),
(80, '4', '2021-10-02', 162000),
(81, '5', '2021-10-03', 81000),
(82, '6', '2021-10-04', 184000),
(84, '7', '2021-10-04', 228500),
(85, '8', '2021-10-04', 38500),
(86, '9', '2021-10-05', 114000),
(87, '10', '2021-10-05', 144000),
(88, '11', '2021-10-06', 28500),
(89, '12', '2021-10-06', 376000),
(90, '13', '2021-10-07', 81000),
(91, '14', '2021-10-07', 87500),
(93, '15', '2021-10-07', 82000),
(94, '16', '2021-10-08', 177000),
(95, '17', '2021-10-08', 162000),
(96, '18', '2021-10-09', 112000),
(97, '19', '2021-10-09', 162000),
(98, '20', '2021-10-10', 111000),
(100, '21', '2021-10-12', 86000),
(101, '22', '2021-10-12', 81000),
(102, '23', '2021-10-14', 82000),
(103, '24', '2021-10-14', 179000),
(104, '25', '2021-10-16', 146000),
(105, '26', '2021-10-16', 56500),
(106, '27', '2021-10-18', 243000),
(107, '28', '2021-10-18', 86000),
(108, '29', '2021-10-19', 109000),
(109, '30', '2021-10-20', 236000),
(110, '31', '2021-10-20', 147500),
(111, '32', '2021-10-21', 162000),
(112, '33', '2021-10-21', 112500),
(113, '34', '2021-10-22', 232000),
(114, '35', '2021-10-23', 163500),
(115, '36', '2021-10-23', 140000),
(116, '37', '2021-10-26', 92000),
(118, '38', '2021-10-28', 94000),
(119, '39', '2021-10-29', 163000),
(120, '40', '2021-11-01', 26000),
(122, '41', '2021-11-02', 33000),
(123, '42', '2021-11-04', 228500),
(124, '43', '2021-11-05', 163500),
(125, '44', '2021-11-06', 287500),
(126, '45', '2021-11-07', 166000),
(127, '46', '2021-11-07', 238000),
(128, '47', '2021-11-07', 147500),
(129, '48', '2021-11-08', 73000),
(130, '48', '2021-11-09', 100500),
(131, '49', '2021-11-09', 112000),
(132, '50', '2021-11-10', 234000),
(133, '51', '2021-11-11', 151000),
(134, '52', '2021-11-11', 91000),
(135, '53', '2021-11-12', 26000),
(136, '54', '2021-11-13', 38500),
(137, '55', '2021-11-14', 81000),
(138, '56', '2021-11-14', 144000),
(139, '57', '2021-11-15', 113000),
(140, '58', '2021-11-15', 93000),
(141, '59', '2021-11-16', 282000),
(142, '60', '2021-11-17', 156000),
(143, '61', '2021-11-19', 243000),
(144, '62', '2021-11-19', 228000),
(145, '63', '2021-11-19', 175000),
(146, '64', '2021-11-20', 81000),
(147, '65', '2021-11-21', 163500),
(148, '66', '2021-11-22', 163500),
(149, '67', '2021-11-22', 227500),
(150, '68', '2021-11-23', 163500),
(151, '69', '2021-11-23', 232000),
(152, '70', '2021-11-23', 103500),
(153, '71', '2021-11-25', 110500),
(154, '72', '2021-11-26', 175500),
(155, '73', '2021-11-28', 91000),
(156, '74', '2021-11-28', 287500),
(157, '75', '2021-11-29', 81000),
(158, '76', '2021-11-29', 147500),
(159, '77', '2021-11-29', 147500),
(160, '78', '2021-11-30', 147500),
(161, '79', '2021-11-30', 163000),
(162, '80', '2021-12-01', 163500),
(163, '81', '2021-12-01', 32000),
(164, '82', '2021-12-02', 147000),
(165, '83', '2021-12-03', 227500),
(166, '84', '2021-12-04', 86000),
(167, '85', '2021-12-05', 228500),
(168, '86', '2021-12-05', 228500),
(169, '87', '2021-12-06', 86000),
(170, '88', '2021-12-07', 287500),
(171, '89', '2021-12-08', 25000),
(172, '90', '2021-12-08', 27500),
(173, '91', '2021-12-11', 146000),
(174, '92', '2021-12-12', 58000),
(175, '93', '2021-12-12', 163500),
(176, '94', '2021-12-14', 82500),
(177, '95', '2021-12-16', 227500),
(178, '96', '2021-12-18', 147500),
(179, '98', '2021-12-19', 73500),
(180, '97', '2021-12-22', 296000),
(181, '99', '2021-12-24', 240600),
(182, '100', '2021-12-25', 163500),
(183, '101', '2021-12-25', 112000),
(184, '102', '2021-12-26', 147500),
(185, '103', '2021-12-27', 146000),
(186, '104', '2021-12-27', 147000),
(187, '105', '2021-12-28', 153000),
(188, '106', '2021-12-28', 162000),
(189, '107', '2021-12-30', 79000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `level` varchar(50) NOT NULL,
  `aktif` char(1) NOT NULL DEFAULT 'Y',
  `reg_date` datetime NOT NULL,
  `reg_user` varchar(50) NOT NULL,
  `mod_date` datetime DEFAULT NULL,
  `mod_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `no_telp`, `email`, `alamat`, `level`, `aktif`, `reg_date`, `reg_user`, `mod_date`, `mod_user`) VALUES
(8, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Apoteker', '021 6612 8471', 'admin@warung.com', 'Jl. Test No. 2 Jakarta Timur', 'admin', 'Y', '2020-11-22 11:41:14', 'admin', NULL, ''),
(10, 'kabag', '1a50ef14d0d75cd795860935ee0918af', 'KA Puskes', '02177361239', 'puskestridayasakti@gmail.com', '', 'kepala bagian', 'Y', '0000-00-00 00:00:00', '', NULL, ''),
(11, 'apoteker', '326dd0e9d42a3da01b50028c51cf21fc', 'Apoteker', '08127736123', 'apotekerpuskestridayasakti@gmail.com', '', 'petugas', 'Y', '0000-00-00 00:00:00', '', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_barang`
--
ALTER TABLE `detail_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `detail_barang`
--
ALTER TABLE `detail_barang`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=434;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
