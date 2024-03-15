-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2024 at 01:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `strak_in_pak`
--

-- --------------------------------------------------------

--
-- Table structure for table `bestellingen`
--

CREATE TABLE `bestellingen` (
  `bestelid` int(11) NOT NULL,
  `klantid` int(11) NOT NULL,
  `besteldatum` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bestellingen`
--

INSERT INTO `bestellingen` (`bestelid`, `klantid`, `besteldatum`) VALUES
(1, 1, '2024-03-12 12:00:30'),
(2, 2, '2024-03-12 12:00:30'),
(3, 3, '2024-03-12 12:00:43');

-- --------------------------------------------------------

--
-- Table structure for table `bestelregels`
--

CREATE TABLE `bestelregels` (
  `bestelregelid` int(11) NOT NULL,
  `bestelid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `productaantal` int(11) NOT NULL,
  `prijs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bestelregels`
--

INSERT INTO `bestelregels` (`bestelregelid`, `bestelid`, `productid`, `productaantal`, `prijs`) VALUES
(1, 1, 1, 1, 100),
(2, 2, 2, 2, 200),
(3, 3, 3, 3, 300);

-- --------------------------------------------------------

--
-- Table structure for table `klant`
--

CREATE TABLE `klant` (
  `klantid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adres` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klant`
--

INSERT INTO `klant` (`klantid`, `email`, `adres`) VALUES
(1, 'persoon@email.com', '1234ab'),
(2, 'persoon2@email.com', '5678tr'),
(3, 'persoon3@email.com', '4354re');

-- --------------------------------------------------------

--
-- Table structure for table `producten`
--

CREATE TABLE `producten` (
  `productid` int(11) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `prijs` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producten`
--

INSERT INTO `producten` (`productid`, `merk`, `naam`, `prijs`) VALUES
(1, 'resui', 'extra strak pak 1', 110),
(2, 'resui', 'strak pak 2', 240),
(3, 'resui', 'strak pak 3', 1000),
(7, 'losse pakken', 'los pak 3 premium edition', 222),
(8, 'losse pakken', 'los pak basic', 789),
(9, 'losse pakken', 'rode pak 1', 50),
(10, 'blauws', 'blauw pak 2', 34762),
(11, 'blauws', 'extra geld premium ultra deluxe', 7091749),
(14, 'merkkk', 'naammm', 100),
(15, ' merkkk', 'naammm', 1111),
(16, 'merkkk', 'naammm', 1000),
(17, 'merkkkk', 'naammmm', 100),
(18, 'merkkkk', 'naammmm', 1000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD PRIMARY KEY (`bestelid`),
  ADD KEY `klantid` (`klantid`);

--
-- Indexes for table `bestelregels`
--
ALTER TABLE `bestelregels`
  ADD PRIMARY KEY (`bestelregelid`),
  ADD KEY `bestelid` (`bestelid`,`productid`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`klantid`);

--
-- Indexes for table `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`productid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bestellingen`
--
ALTER TABLE `bestellingen`
  MODIFY `bestelid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bestelregels`
--
ALTER TABLE `bestelregels`
  MODIFY `bestelregelid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `klant`
--
ALTER TABLE `klant`
  MODIFY `klantid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `producten`
--
ALTER TABLE `producten`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD CONSTRAINT `bestellingen_ibfk_1` FOREIGN KEY (`klantid`) REFERENCES `klant` (`klantid`);

--
-- Constraints for table `bestelregels`
--
ALTER TABLE `bestelregels`
  ADD CONSTRAINT `bestelregels_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `producten` (`productid`),
  ADD CONSTRAINT `bestelregels_ibfk_2` FOREIGN KEY (`bestelid`) REFERENCES `bestellingen` (`bestelid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
