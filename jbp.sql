-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2018 at 10:57 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jbp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `admin_name` varchar(25) NOT NULL,
  `admin_user` varchar(15) NOT NULL,
  `admin_pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `admin_name`, `admin_user`, `admin_pass`) VALUES
(1, 'tulus', 'tulus', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(5) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `category_name`) VALUES
(1, 'Fire Stop Mortar'),
(3, 'Fire Stop Coating'),
(4, 'Fire Rated Duct');

-- --------------------------------------------------------

--
-- Table structure for table `compro`
--

CREATE TABLE `compro` (
  `id_compro` int(5) NOT NULL,
  `aboutus` text NOT NULL,
  `compro_image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compro`
--

INSERT INTO `compro` (`id_compro`, `aboutus`, `compro_image`) VALUES
(4, 'Jakarta Bangkit Pratama merupakan sebuah perusahaan yang memberikan jasa aplikasi coating tahan api yang berdiri sejak tahun 200X', 'Lighthouse.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(5) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id_contact`, `email`, `phone`, `address`) VALUES
(1, 'jbpratama@gmail.com', '08122039432', 'Jalan Arjuna');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(15) NOT NULL,
  `title_product` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `specification` varbinary(150) NOT NULL,
  `id_category` int(5) NOT NULL,
  `image_product` varbinary(150) NOT NULL,
  `brosur` varbinary(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `title_product`, `description`, `specification`, `id_category`, `image_product`, `brosur`) VALUES
(1, 'Permalite', 'Perlite mortar is a thermal fall mortar. This mortar is made of mineral raw materials with good thermal insulating properties. Perlite mortar is a special mixture of Perlite grains and cement.<br><br>\r\n\r\nPerlite is incombustible and fibre-free granular insulation. The raw material is an aluminium silicate of volcanic origin and is white in colour. Perlite is a glassy stone that expands when heated. This expansion takes place by soaking the outside and subsequently evaporating the liquid (2 to 5%) in the grain. When expanded, the grain - which has become porous- can become 20 times larger.', 0x4a656c6c79666973682e6a7067, 1, 0x5065726d616c697465204d6f727461722031206f6b2e6a7067, 0x5065726d616c697465204d6f727461722031206f6b2e6a7067),
(2, 'Promat CP 2', 'Cafco MANDOLITEÂ® CP2 is a spray applied, single package factory controlled premix, based on vermiculite and Portland cement.<br><br>\r\n\r\nCafco MANDOLITEÂ® CP2 produces a monolithic coating able to withstand thermal shocks experienced in a cellulosic fire. Concrete structures in particular, can be protected from explosive spalling when coated with Cafco MANDOLITEÂ® CP2.<br><br>\r\n\r\nAlthough low in density, thus significantly reducing dead load, Cafco MANDOLITEÂ® CP2 is highly durable and will not crack or spall under mechanical impact.', 0x4465736572742e6a7067, 1, 0x48796472616e676561732e6a7067, 0x50524f4d4154454354202d204820557020546f203420486f757220436c616464696e6720546f20736865657420447563742e706466),
(3, 'STI', 'SpecSealÂ® SSM Firestop Mortar is a light-weight cost conscious solution for oversized openings in concrete walls and floors. Once mixed with water, SpecSealÂ® Mortar forms a light weight, low density slurry that easily applies into concrete walls and floors. SpecSealÂ® Mortar cures quickly and will not spall or crack due to freezing or changes in temperature.', 0x4465736572742e6a7067, 1, 0x4a656c6c79666973682e6a7067, 0x42726f737572205354492e706466),
(4, 'PROMASEAL Bulkhead', 'PROMASEALÂ® Bulkhead System is made using high density mineral wool that is coated with PROMASEALÂ® Bulkhead Sealer. The coated mineral wool remains in-situ during a fire situation and forms a barrier against the passage of flame, smoke and toxic gases.<br><br>\r\n\r\nPROMASEALÂ® Bulkhead Sealer is the simplest and probably the most economical of all fire stopping products to use. It can be installed in both wall and floor applications and has been tested for up to 120 minute fire resistance with various services penetrating the barrier.', 0x4368727973616e7468656d756d2e6a7067, 3, 0x4b6f616c612e6a7067, 0x50524f4d415345414c2042756c6b68656164207365616c65722e706466),
(5, 'Intumex SB', 'IntumexÂ® SB is an ablative coating used on high density (175kg/m3) mineral wools in wall and floor applications. Tested with various service penetrations to provide up to 120 minutes fire resistance. ', 0x4465736572742e6a7067, 3, 0x4c69676874686f7573652e6a7067, 0x496e74756d65782053422e706466),
(6, 'STI Coating', 'Composite Diamond CoatingÂ® is a unique, patented coating with ultra-fine diamond particles contained within hard electroless nickel metal with numerous benefits including Exceptional wear resistance, Excellent hardness, Enhanced corrosion resistance, Perfect conformity to complex geometries including non-line-sight applications, Increased thermal transfer, Applicability to all common metals and alloys, Coverage of entire surfaces or selected critical areas\r\n', 0x4368727973616e7468656d756d2e6a7067, 3, 0x4c69676874686f7573652e6a7067, ''),
(7, 'PROMATECT-H ', 'PROMATECTÂ®-H is a non-combustible matrix engineered mineral board reinforced with selected fibres and fillers. It is formulated without organic fibres and does not contain formaldehyde.<br><br>\r\n\r\nPROMATECTÂ®-H is off-white in colour and has a smooth finish on one face with a sanded reverse face. The board can be left plain or can be easily finished with paints, wallpapers or tiles.<br><br>\r\n\r\nPROMATECTÂ®-H is resistant to the effects of moisture and will not physically deteriorate when used in damp or humid conditions. Performance characteristics are not degraded by age or moisture.<br><br>\r\n\r\nPROMATECTÂ®-H can be produced with bevelled edges for use in partitions and suspended ceilings using a concealed grid system.\r\n', 0x4c69676874686f7573652e6a7067, 4, 0x4368727973616e7468656d756d2e6a7067, 0x50524f4d4154454354202d204820557020546f203420486f757220436c616464696e6720546f20736865657420447563742e706466);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id_project` int(5) NOT NULL,
  `title_project` varchar(100) NOT NULL,
  `information` text NOT NULL,
  `image_project1` varchar(150) NOT NULL,
  `image_project2` varchar(150) NOT NULL,
  `image_project3` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id_project`, `title_project`, `information`, `image_project1`, `image_project2`, `image_project3`) VALUES
(2, 'St. Moritz', 'Proyek St. Moritz adalah 1 dari sekian proyek besar yang dikerjakan PT. Jakart Bangkit Pratama', 'stmoritz.jpg', 'Desert.jpg', 'Chrysanthemum.jpg'),
(3, 'Monas', 'Monumen kota jakarta', 'jakarta.jpg', 'Hydrangeas.jpg', 'Penguins.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `compro`
--
ALTER TABLE `compro`
  ADD PRIMARY KEY (`id_compro`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `compro`
--
ALTER TABLE `compro`
  MODIFY `id_compro` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
