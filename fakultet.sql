-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2019 at 06:03 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fakultet`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(255) NOT NULL,
  `tip_korisnika` int(1) DEFAULT NULL,
  `naziv` varchar(255) NOT NULL,
  `datum_rođenja` date DEFAULT NULL,
  `adresa` varchar(255) DEFAULT NULL,
  `telefon` varchar(15) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `PDF` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `tip_korisnika`, `naziv`, `datum_rođenja`, `adresa`, `telefon`, `username`, `password`, `PDF`) VALUES
(1, 1, 'Admin', NULL, NULL, NULL, 'admin', 'admin', NULL),
(2, 2, 'Dominik Gegi?', '1992-02-25', 'Dalmatinska 21 Gradi?i, Velika Gorica', '097/7530-848', 'dgegic', 'gegic123', NULL),
(3, 2, 'Damir Novak', '1992-06-17', 'Ulica bra?e Radi?a 4 Samobor', '095/7870-848', 'dnovak', 'novak123', NULL),
(4, 2, 'Mirna Bošnjak', '1992-12-25', 'Praška 13 Zagreb', '097/6250-848', 'mbosnjak', 'bosnjak123', NULL),
(5, 2, 'Marica Šulenti?', '1991-08-31', 'Josipa bana Jela?i?a 21 Velika Gorica', '099/7554-878', 'msulentic', 'sulentic123', NULL),
(6, 2, 'Meri Gvardijan', '1995-12-27', 'Miramarska ulica 3 Zapreši?', '091/9874-848', 'mgvardijan', 'gvardijan123', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `predmet`
--

CREATE TABLE `predmet` (
  `id` int(255) NOT NULL,
  `smjer_id` int(255) DEFAULT NULL,
  `naziv` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `predmet`
--

INSERT INTO `predmet` (`id`, `smjer_id`, `naziv`) VALUES
(1, 1, 'Baze Podataka'),
(2, 1, 'Matematika'),
(3, 1, 'Programiranje'),
(4, 1, 'Engleski jezik'),
(5, 1, 'Matematika 2'),
(6, 2, 'Matematika'),
(7, 2, 'Fizika'),
(8, 2, 'Termodinamika'),
(9, 2, 'Njema?ki jezik'),
(10, 3, 'Mreže'),
(11, 3, 'Matematika'),
(12, 3, 'Tjelesni i zdravstvena kultura'),
(13, 3, 'Protokoli'),
(14, 3, 'Engleski jezik'),
(15, 4, 'Matematika'),
(16, 4, 'Engleski jezik'),
(17, 4, 'Fizika'),
(18, 4, 'Tjelesni i zdravstvena kultura'),
(19, 4, 'Sigurnost informacijskih sustava'),
(20, 5, 'Matematika'),
(21, 5, 'Programiranje'),
(22, 5, 'Fizika'),
(23, 5, 'Aerodinamika'),
(24, 5, 'Elekrotehnika');

-- --------------------------------------------------------

--
-- Table structure for table `skolska_godina`
--

CREATE TABLE `skolska_godina` (
  `id` int(255) NOT NULL,
  `godina` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skolska_godina`
--

INSERT INTO `skolska_godina` (`id`, `godina`) VALUES
(1, '2017/2018'),
(2, '2018/2019'),
(3, '2019/2020');

-- --------------------------------------------------------

--
-- Table structure for table `smjerovi`
--

CREATE TABLE `smjerovi` (
  `id` int(255) NOT NULL,
  `naziv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smjerovi`
--

INSERT INTO `smjerovi` (`id`, `naziv`) VALUES
(1, 'Programiranje'),
(2, 'Mehatronika'),
(3, 'Mreže'),
(4, 'Sistem inžinjerstvo'),
(5, 'Robotika');

-- --------------------------------------------------------

--
-- Table structure for table `zahtjevzapromjenomsmjera`
--

CREATE TABLE `zahtjevzapromjenomsmjera` (
  `id` int(255) NOT NULL,
  `korisnik_id` int(255) DEFAULT NULL,
  `upis_id` int(255) DEFAULT NULL,
  `zeljeni_smjer` int(155) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zahtjevzapromjenomsmjera`
--

INSERT INTO `zahtjevzapromjenomsmjera` (`id`, `korisnik_id`, `upis_id`, `zeljeni_smjer`) VALUES
(1, 4, 1, 3),
(2, 3, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `zahtjevzaupisom`
--

CREATE TABLE `zahtjevzaupisom` (
  `id` int(255) NOT NULL,
  `korisnik_id` int(255) DEFAULT NULL,
  `skolskaGodina` int(255) DEFAULT NULL,
  `smjer_id` int(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zahtjevzaupisom`
--

INSERT INTO `zahtjevzaupisom` (`id`, `korisnik_id`, `skolskaGodina`, `smjer_id`, `status`) VALUES
(1, 3, 2, 1, 'Upisan'),
(2, 4, 2, 2, 'Upisan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `predmet`
--
ALTER TABLE `predmet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `smjer_id` (`smjer_id`);

--
-- Indexes for table `skolska_godina`
--
ALTER TABLE `skolska_godina`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smjerovi`
--
ALTER TABLE `smjerovi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zahtjevzapromjenomsmjera`
--
ALTER TABLE `zahtjevzapromjenomsmjera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `korisnik_id` (`korisnik_id`),
  ADD KEY `upis_id` (`upis_id`),
  ADD KEY `zeljeni_smjer` (`zeljeni_smjer`);

--
-- Indexes for table `zahtjevzaupisom`
--
ALTER TABLE `zahtjevzaupisom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skolskaGodina` (`skolskaGodina`),
  ADD KEY `korisnik_id` (`korisnik_id`),
  ADD KEY `smjer_id` (`smjer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `predmet`
--
ALTER TABLE `predmet`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `skolska_godina`
--
ALTER TABLE `skolska_godina`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `smjerovi`
--
ALTER TABLE `smjerovi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `zahtjevzapromjenomsmjera`
--
ALTER TABLE `zahtjevzapromjenomsmjera`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zahtjevzaupisom`
--
ALTER TABLE `zahtjevzaupisom`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `predmet`
--
ALTER TABLE `predmet`
  ADD CONSTRAINT `predmet_ibfk_1` FOREIGN KEY (`smjer_id`) REFERENCES `smjerovi` (`id`),
  ADD CONSTRAINT `predmet_ibfk_2` FOREIGN KEY (`smjer_id`) REFERENCES `smjerovi` (`id`);

--
-- Constraints for table `zahtjevzapromjenomsmjera`
--
ALTER TABLE `zahtjevzapromjenomsmjera`
  ADD CONSTRAINT `zahtjevzapromjenomsmjera_ibfk_1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnici` (`id`),
  ADD CONSTRAINT `zahtjevzapromjenomsmjera_ibfk_2` FOREIGN KEY (`upis_id`) REFERENCES `zahtjevzaupisom` (`id`),
  ADD CONSTRAINT `zahtjevzapromjenomsmjera_ibfk_3` FOREIGN KEY (`zeljeni_smjer`) REFERENCES `smjerovi` (`id`),
  ADD CONSTRAINT `zahtjevzapromjenomsmjera_ibfk_4` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnici` (`id`),
  ADD CONSTRAINT `zahtjevzapromjenomsmjera_ibfk_5` FOREIGN KEY (`upis_id`) REFERENCES `zahtjevzaupisom` (`id`),
  ADD CONSTRAINT `zahtjevzapromjenomsmjera_ibfk_6` FOREIGN KEY (`zeljeni_smjer`) REFERENCES `smjerovi` (`id`);

--
-- Constraints for table `zahtjevzaupisom`
--
ALTER TABLE `zahtjevzaupisom`
  ADD CONSTRAINT `zahtjevzaupisom_ibfk_1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnici` (`id`),
  ADD CONSTRAINT `zahtjevzaupisom_ibfk_2` FOREIGN KEY (`smjer_id`) REFERENCES `smjerovi` (`id`),
  ADD CONSTRAINT `zahtjevzaupisom_ibfk_3` FOREIGN KEY (`skolskaGodina`) REFERENCES `skolska_godina` (`id`),
  ADD CONSTRAINT `zahtjevzaupisom_ibfk_4` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnici` (`id`),
  ADD CONSTRAINT `zahtjevzaupisom_ibfk_5` FOREIGN KEY (`smjer_id`) REFERENCES `smjerovi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
