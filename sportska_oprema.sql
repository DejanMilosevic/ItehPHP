-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2023 at 01:21 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportska_oprema`
--
CREATE DATABASE IF NOT EXISTS `sportska_oprema` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `sportska_oprema`;

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `idKat` int(12) NOT NULL,
  `nazivKat` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`idKat`, `nazivKat`) VALUES
(1, 'patike'),
(2, 'majica'),
(3, 'trenerke'),
(4, 'sorts'),
(5, 'jakna');

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `id` int(12) NOT NULL,
  `naziv` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cena` int(10) NOT NULL,
  `kategorija` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`id`, `naziv`, `opis`, `slika`, `cena`, `kategorija`) VALUES
(1, 'Muške patike NIKE Air Max', 'Sportske muške patike bele boje, sa crvenim i teget detaljima, pri čemu se na bočnoj strani nalazi Nike logo.', 'nike_patike.jpg', 12190, 1),
(2, 'Muška majica NIKE polo', 'Muška Polo majica bele boje, ima kragnu na preklapanje sa preklopom dva dugmeta koji vam daju klasičan izgled.', 'nike_majica.jpg', 2814, 2),
(3, 'Muška trenerka PUMA', 'Muška trenerka koja se sastoji iz gornjeg dela, koji je crne boje sa sivim detaljima u predelu grudi i donjeg dela koji ima elastični pojas i udobnog je kroja.', 'puma_trenerke.jpg', 7690, 3),
(4, 'Muški šorts PUMA', 'Atraktivan muški šorts u teget boji, ima elastičan pojas sa dva bočna džepa, dok logo i ime brenda na jednoj nogavici upotpunjuju ovaj model.', 'puma_sorts.jpg', 1645, 4),
(5, 'Muške patike ADIDAS', 'Muške plitke patike bele boje sa tri prepoznatljive Adidas pruge u petrolej boji, pri cemu se na zadnjoj strani nalazi ime brenda u crnoj boji.', 'adidas_patike.jpg', 4613, 1),
(6, 'Muška jakna ADIDAS', 'Muška atraktivna jakna tankog kroja, ima duboku kragnu, kapuljaču i učkure zbog prilagođene udobnosti, a na prednjoj strani stoji ime brenda adidas.', 'adidas_jakna.jpg', 4794, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`idKat`);

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategorija` (`kategorija`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `idKat` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `proizvod`
--
ALTER TABLE `proizvod`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD CONSTRAINT `proizvod_ibfk_1` FOREIGN KEY (`kategorija`) REFERENCES `kategorija` (`idKat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
