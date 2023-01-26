-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2023 at 07:05 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saviourtrust`
--

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `PropertyID` int(11) NOT NULL,
  `HouseNo` varchar(10) NOT NULL,
  `Street` varchar(255) NOT NULL,
  `Postcode` varchar(10) NOT NULL,
  `City` varchar(255) NOT NULL,
  `County` varchar(255) NOT NULL,
  `Bedrooms` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`PropertyID`, `HouseNo`, `Street`, `Postcode`, `City`, `County`, `Bedrooms`) VALUES
(1, '3', 'Brearley Drive', 'S5 8BF', 'Leeds', 'South Yorkshire', 4);

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `RecordID` int(11) NOT NULL,
  `PropertyID` int(11) NOT NULL,
  `HallwayNotes` varchar(2000) DEFAULT NULL,
  `KitchenNotes` varchar(2000) DEFAULT NULL,
  `LivingRoomNotes` varchar(2000) DEFAULT NULL,
  `StairsAndLandingNotes` varchar(2000) DEFAULT NULL,
  `BathroomNotes` varchar(2000) DEFAULT NULL,
  `ToiletNotes` varchar(255) NOT NULL,
  `AnyTenantsPresent` tinyint(1) NOT NULL,
  `TenantsPresent` varchar(2000) DEFAULT NULL,
  `TenantRoomNotes` varchar(2000) DEFAULT NULL,
  `SmokeAlarmNotes` text DEFAULT NULL,
  `ApplianceNotes` text DEFAULT NULL,
  `ExtraNotes` text DEFAULT NULL,
  `TimeSubmitted` timestamp NOT NULL DEFAULT current_timestamp(),
  `SubmittedByStaff` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`RecordID`, `PropertyID`, `HallwayNotes`, `KitchenNotes`, `LivingRoomNotes`, `StairsAndLandingNotes`, `BathroomNotes`, `ToiletNotes`, `AnyTenantsPresent`, `TenantsPresent`, `TenantRoomNotes`, `SmokeAlarmNotes`, `ApplianceNotes`, `ExtraNotes`, `TimeSubmitted`, `SubmittedByStaff`) VALUES
(1, 1, '', '', '', '', '', 'Good', 0, '', '', '', '', '', '2023-01-25 12:11:08', 'mtansley'),
(2, 1, '', '', '', '', '', 'Good', 0, '', '', '', '', '', '2023-01-25 12:11:37', 'mtansley'),
(3, 1, 'hallwaycheck', 'kitchencheck', 'livingcheck', 'stairscheck', 'bathroomcheck', 'Good', 1, 'jack,dave', 'tenantroomnotes', 'faultcheck', 'appliancecheck', 'extranotes', '2023-01-25 13:43:06', 'mtansley');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Username` varchar(20) NOT NULL,
  `Forename` varchar(20) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `AdminPermission` tinyint(1) NOT NULL,
  `StaffType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Username`, `Forename`, `Surname`, `Password`, `AdminPermission`, `StaffType`) VALUES
('mtansley', 'Matthew', 'Tansley', '$2y$10$d1IJyUNYIcdFxqkIFZ8KuOTN4z7Da9OFPfMTda7a2dzK4sE1VKfGG', 1, 'Admin'),
('afowler', 'angela', 'fowler', '$2y$10$QEdiQmT/P5EkL5lk6kwieuWfgvI7srASJNUZykJ1IekzHA4ZMQk8y', 0, 'Support Worker');

-- --------------------------------------------------------

--
-- Table structure for table `staffimages`
--

CREATE TABLE `staffimages` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `staffUsername` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffimages`
--

INSERT INTO `staffimages` (`id`, `name`, `staffUsername`) VALUES
(39, '20190827_160118.jpg', 'mtansley'),
(40, '285326889_10159014248868869_8218643950288173773_n - Copy.jpg', 'afowler');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`PropertyID`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`RecordID`);

--
-- Indexes for table `staffimages`
--
ALTER TABLE `staffimages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `PropertyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `RecordID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staffimages`
--
ALTER TABLE `staffimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
