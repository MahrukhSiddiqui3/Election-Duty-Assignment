-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2019 at 09:21 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electioncommission`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL,
  `CatName` text NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `DateAdded` datetime NOT NULL,
  `DateModified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `CatName`, `Status`, `DateAdded`, `DateModified`) VALUES
(1, 'Government School', 1, '2019-01-12 20:03:33', '2019-01-12 22:51:12'),
(2, 'Government Colleges', 1, '2019-01-12 21:04:06', '0000-00-00 00:00:00'),
(3, 'Banks', 1, '2019-01-12 22:51:32', '0000-00-00 00:00:00'),
(4, 'Universities', 1, '2019-01-13 00:12:29', '0000-00-00 00:00:00'),
(5, 'Election Commission Pakistan', 1, '2019-01-13 19:33:23', '0000-00-00 00:00:00'),
(6, 'Company', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `ID` int(11) NOT NULL,
  `CityName` text NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `DateAdded` datetime NOT NULL,
  `DateModified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`ID`, `CityName`, `Status`, `DateAdded`, `DateModified`) VALUES
(4, 'Karachi', 1, '2018-12-22 22:56:23', '2019-01-12 13:07:24'),
(5, 'Lahore', 1, '2018-12-26 16:34:42', '0000-00-00 00:00:00'),
(6, 'Islamabad', 1, '2019-01-12 22:54:15', '0000-00-00 00:00:00'),
(7, 'Hyderabad', 1, '2019-02-20 23:43:57', '0000-00-00 00:00:00'),
(8, 'Multan', 1, '2019-02-20 23:44:21', '0000-00-00 00:00:00'),
(9, 'Peshawar', 1, '2019-02-20 23:44:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `ID` int(14) NOT NULL,
  `CityID` int(11) NOT NULL,
  `CatID` int(11) NOT NULL,
  `Username` text NOT NULL,
  `Password` varchar(10) NOT NULL,
  `OrganizationName` text NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `DateAdded` datetime NOT NULL,
  `DateModified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`ID`, `CityID`, `CatID`, `Username`, `Password`, `OrganizationName`, `Status`, `DateAdded`, `DateModified`) VALUES
(14, 4, 4, 'Neduet', 'Neduet', 'Neduet', 1, '2019-01-13 00:14:01', '2019-02-20 23:32:01'),
(15, 4, 3, 'nbp', 'nbp', 'National Bank Of Pakistan', 1, '2019-01-13 00:16:00', '2019-02-20 23:19:37'),
(16, 4, 6, 'ssgc', 'ssgc', 'Sui Southern Gas Limited', 1, '2019-01-13 19:33:58', '2019-02-20 23:22:20'),
(17, 4, 1, 'Khatoon e Pakistan Government School', 'kpgs', 'Khatoon e Pakistan Government School', 1, '2019-02-20 23:34:38', '2019-02-20 23:34:47'),
(18, 4, 6, 'K-Electric', 'kelectric', 'K-Electric', 1, '2019-02-20 23:36:32', '0000-00-00 00:00:00'),
(19, 5, 6, 'K-Electric', 'kelectric', 'K-Electric', 1, '2019-02-20 23:36:50', '2019-02-20 23:38:10'),
(20, 5, 1, 'Government Fateh-ud-Din Model High School', 'fateh', 'Government Fateh-ud-Din Model High School', 1, '2019-02-20 23:39:48', '0000-00-00 00:00:00'),
(21, 5, 1, 'Government Central Model High School Lower Mall Lahore', 'centralmod', 'Government Central Model High School Lower Mall Lahore', 1, '2019-02-20 23:40:43', '0000-00-00 00:00:00'),
(22, 5, 2, 'Government College University', 'collegeuni', 'Government College University', 1, '2019-02-20 23:42:11', '0000-00-00 00:00:00'),
(23, 5, 4, 'Punjab University', 'Punjab Uni', 'Punjab University', 1, '2019-02-20 23:42:54', '0000-00-00 00:00:00'),
(24, 7, 2, 'Government Vocational Institute for Women Affandi Town', 'gvifwat', 'Government Vocational Institute for Women Affandi Town', 1, '2019-02-20 23:47:49', '0000-00-00 00:00:00'),
(25, 7, 3, 'State Bank of Pakistan', 'sbop', 'State Bank of Pakistan', 1, '2019-02-20 23:49:43', '0000-00-00 00:00:00'),
(26, 7, 3, 'National Bank Of Pakistan Hyderabad', 'npbh', 'National Bank Of Pakistan Hyderabad', 1, '2019-02-20 23:55:30', '0000-00-00 00:00:00'),
(27, 6, 3, 'Zarai Taraqiati Bank Limited Islamabad Branch', 'ztbkib', 'Zarai Taraqiati Bank Limited Islamabad Branch', 1, '2019-02-20 23:56:42', '0000-00-00 00:00:00'),
(28, 8, 3, 'NRSP MICROFINANCE BANK Br.TMP', 'nsrp', 'NRSP MICROFINANCE BANK Br.TMP', 1, '2019-02-20 23:58:34', '0000-00-00 00:00:00'),
(29, 8, 3, 'National Bank of Pakistan Regional HQ', 'npbqhq', 'National Bank of Pakistan Regional HQ', 1, '2019-02-20 23:59:51', '0000-00-00 00:00:00'),
(30, 9, 3, 'The Bank of Khyber', 'bk', 'The Bank of Khyber', 1, '2019-02-21 00:01:00', '0000-00-00 00:00:00'),
(31, 9, 2, 'Govt Higher Secondary School No. 4', 'ghss', 'Govt Higher Secondary School No. 4', 1, '2019-02-21 00:02:17', '0000-00-00 00:00:00'),
(32, 4, 4, 'Dawood', 'dawood', 'Dawood University Of Engineering & Technology Karachi', 1, '2019-04-30 14:18:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pollingstations`
--

CREATE TABLE `pollingstations` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `StationName` text NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Postcode` text NOT NULL,
  `MaleBooth` int(11) NOT NULL,
  `FemaleBooth` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `DateAdded` datetime NOT NULL,
  `DateModified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pollingstations`
--

INSERT INTO `pollingstations` (`ID`, `UserID`, `StationName`, `Address`, `Postcode`, `MaleBooth`, `FemaleBooth`, `Status`, `DateAdded`, `DateModified`) VALUES
(16, 49, 'DJ Sindh Government Science College', 'Dr Ziauddin Ahmed Rd, Saddar, Karachi, Karachi City, Sindh', '74800', 3, 2, 1, '2019-02-21 11:49:55', '2019-02-26 16:36:19'),
(17, 49, 'Government College for Men Nazimabad', 'Block 2 Nazimabad, Karachi, Karachi City, Sindh 74600', '74600', 0, 0, 1, '2019-02-21 11:51:31', '2019-02-21 15:26:44'),
(18, 50, 'Government Degree Arts and Commerce College', 'LANDHI KORANGI NO. 6', '75044', 0, 0, 1, '2019-02-21 11:54:19', '2019-02-21 15:26:53'),
(19, 52, 'Civilization Public School', 'Street 2, Block J, North NazimabadØŒ Block J North Nazimabad Town, Karachi, Karachi City, Sindh', '78300', 0, 0, 1, '2019-02-21 11:55:24', '2019-02-21 15:27:02'),
(20, 53, 'K.D.A Boys/Girls secondary Model School - Government school', 'Block 17 Gulshan-e-Iqbal, Karachi, Karachi City, Sindh', '74700', 0, 0, 1, '2019-02-21 11:57:52', '2019-02-21 15:27:13'),
(21, 48, 'Government Girls Higher Secondary School', 'Block 6 Gulshan-e-Iqbal, Karachi, Karachi City, Sindh 74200', '', 0, 0, 1, '2019-02-21 11:59:10', '2019-02-21 15:27:21'),
(22, 48, 'Govt Girls Higher Secondary School', 'Block 6 Gulshan-e-Iqbal, Karachi, Karachi City, Sindh 74200', '', 0, 0, 1, '2019-02-21 12:00:45', '2019-02-21 15:27:38'),
(23, 50, 'station 123', 'Block 6 Gulshan-e-Iqbal, Karachi, Karachi City, Sindh 74200', '', 0, 0, 1, '2019-02-21 13:45:06', '2019-02-21 15:27:53');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `ID` int(14) NOT NULL,
  `RoleName` text NOT NULL,
  `GradingSelection` text NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `DateAdded` datetime NOT NULL,
  `DateModified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`ID`, `RoleName`, `GradingSelection`, `Status`, `DateAdded`, `DateModified`) VALUES
(0, 'admin', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1, 'Returning Officer', '16,18', 1, '0000-00-00 00:00:00', '2019-02-26 14:46:41'),
(2, 'Presiding Officer', '16,19', 1, '0000-00-00 00:00:00', '2019-02-26 14:46:20'),
(3, 'Assistant Presiding Officer', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Polling Officer', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Returning Officer', '16,18', 1, '2019-02-25 16:20:25', '2019-02-25 17:40:37'),
(6, 'Returning Officer', '16,17,18', 1, '2019-02-25 17:07:02', '0000-00-00 00:00:00'),
(7, 'Returning Officer', '1', 1, '2019-03-11 14:44:29', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(14) NOT NULL,
  `RoleID` int(14) NOT NULL,
  `PSID` int(11) NOT NULL,
  `BID` int(11) NOT NULL,
  `OrganizationID` int(11) NOT NULL,
  `CNIC` text NOT NULL,
  `Name` text NOT NULL,
  `Username` text NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Email` text NOT NULL,
  `CellNumber` int(11) NOT NULL,
  `Grade` int(11) NOT NULL,
  `Address` text NOT NULL,
  `Postcode` int(11) NOT NULL,
  `Gender` text NOT NULL,
  `BoothNo` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `DateAdded` datetime NOT NULL,
  `DateModified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `RoleID`, `PSID`, `BID`, `OrganizationID`, `CNIC`, `Name`, `Username`, `Password`, `Email`, `CellNumber`, `Grade`, `Address`, `Postcode`, `Gender`, `BoothNo`, `Status`, `DateAdded`, `DateModified`) VALUES
(10, 0, 0, 0, 0, '42201346736636', 'ECP Admin', 'admin', 'admin', 'aniqa@gmail.com', 2147483647, 12, 'PLot NO 25.Area 36/F', 0, 'Female', 0, 1, '2019-01-19 01:10:31', '0000-00-00 00:00:00'),
(48, 1, 0, 0, 0, '', 'Mahrukh', 'mahrukh', 'mahrukh', 'mahrukhaslam3@gmail.com', 2147483647, 0, '', 0, 'Female', 0, 1, '2019-02-20 14:43:17', '0000-00-00 00:00:00'),
(49, 1, 0, 0, 0, '', 'Aniqa', 'aniqa', 'aniqa', 'aniqaamir002@gmail.com', 332166651, 0, '', 0, 'Female', 0, 1, '2019-02-20 14:44:04', '0000-00-00 00:00:00'),
(50, 1, 0, 0, 0, '', 'Sara', 'sara', 'sara', 'sarahasan224@gmail.com', 347237547, 0, '', 0, 'Female', 0, 1, '2019-02-20 14:44:42', '0000-00-00 00:00:00'),
(51, 1, 0, 0, 0, '', 'Farah', 'farah', 'farah', 'farah@gmail.com', 2147483647, 0, '', 0, 'Female', 0, 1, '2019-02-20 14:45:30', '2019-02-21 00:04:13'),
(52, 1, 0, 0, 0, '', 'Shahrukh', 'shahrukh', 'shahrukh', 'shahrukhsiddiqui1996@gmail.com', 2147483647, 0, '', 0, 'Male', 0, 1, '2019-02-20 14:46:17', '2019-02-21 00:04:37'),
(53, 1, 0, 0, 0, '', 'Saad', 'saad', 'saad', 'saad@gmail.com', 2147483647, 0, '', 0, 'Male', 0, 1, '2019-02-20 14:48:13', '2019-02-21 00:04:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pollingstations`
--
ALTER TABLE `pollingstations`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `ID` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pollingstations`
--
ALTER TABLE `pollingstations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `ID` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2169;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
