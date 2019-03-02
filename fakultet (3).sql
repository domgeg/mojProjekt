-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2019 at 10:02 AM
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
  `ime_korisnika` varchar(255) COLLATE utf8_croatian_ci DEFAULT NULL,
  `datum_rođenja` date DEFAULT NULL,
  `adresa` varchar(255) COLLATE utf8_croatian_ci DEFAULT NULL,
  `telefon` varchar(15) COLLATE utf8_croatian_ci DEFAULT NULL,
  `username` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `PDF` blob,
  `slika` varchar(200) COLLATE utf8_croatian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `tip_korisnika`, `ime_korisnika`, `datum_rođenja`, `adresa`, `telefon`, `username`, `password`, `PDF`, `slika`) VALUES
(79, 1, 'Admin', NULL, NULL, NULL, 'admin', 'admin', NULL, NULL),
(90, 2, 'Marko Marulić', '1888-02-02', 'Splitska ulica 21 Split', '456456456', 'mmarulic', '123', NULL, 'slike/25466.slika1.jpg'),
(91, 2, 'proba', '1995-12-17', 'dfiieji', '877465', 'ana', '123123', NULL, 'slike/152aa.slika1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `predmet`
--

CREATE TABLE `predmet` (
  `id` int(255) NOT NULL,
  `smjer_id` int(255) DEFAULT NULL,
  `naziv` varchar(255) COLLATE utf8_croatian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `predmet`
--

INSERT INTO `predmet` (`id`, `smjer_id`, `naziv`) VALUES
(1, 1, 'Baze Podataka'),
(2, 1, 'Matematika'),
(3, 1, 'Programiranje'),
(4, 1, 'Engleski jezik'),
(5, 1, 'Matematika 2'),
(7, 2, 'Fizika'),
(8, 2, 'Termodinamika'),
(9, 2, 'Njema?ki jezik'),
(10, 3, 'Mreže'),
(12, 3, 'Tjelesni i zdravstvena kultura'),
(13, 3, 'Protokoli'),
(14, 3, 'Engleski jezik'),
(16, 4, 'Engleski jezik'),
(17, 4, 'Fizika'),
(18, 4, 'Tjelesni i zdravstvena kultura'),
(19, 4, 'Sigurnost informacijskih sustava'),
(21, 5, 'Programiranje'),
(22, 5, 'Fizika');

-- --------------------------------------------------------

--
-- Table structure for table `skolska_godina`
--

CREATE TABLE `skolska_godina` (
  `id` int(255) NOT NULL,
  `godina` varchar(255) COLLATE utf8_croatian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

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
  `naziv` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
  `smjerId` varchar(255) COLLATE utf8_croatian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `smjerovi`
--

INSERT INTO `smjerovi` (`id`, `naziv`, `smjerId`) VALUES
(1, 'Programiranje', '1'),
(2, 'Mehatronika', '2'),
(3, 'Mreže', '3'),
(4, 'Sistem inžinjerstvo', '4'),
(5, 'Robotika', '5');

-- --------------------------------------------------------

--
-- Table structure for table `zahtjevzapromjenomsmjera`
--

CREATE TABLE `zahtjevzapromjenomsmjera` (
  `id` int(255) NOT NULL,
  `korisnik_id` int(255) DEFAULT NULL,
  `upis_id` int(255) DEFAULT NULL,
  `zeljeni_smjer` int(155) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zahtjevzaupisom`
--

CREATE TABLE `zahtjevzaupisom` (
  `id` int(255) NOT NULL,
  `korisnik_id` int(255) DEFAULT NULL,
  `skolskaGodina` int(255) DEFAULT NULL,
  `smjer_id` int(255) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_croatian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `zahtjevzaupisom`
--

INSERT INTO `zahtjevzaupisom` (`id`, `korisnik_id`, `skolskaGodina`, `smjer_id`, `status`) VALUES
(126, 90, 1, 1, NULL),
(127, 91, 1, 1, NULL);

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `predmet`
--
ALTER TABLE `predmet`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zahtjevzaupisom`
--
ALTER TABLE `zahtjevzaupisom`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

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
