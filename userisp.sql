-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2024 at 06:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userisp`
--

-- --------------------------------------------------------

--
-- Table structure for table `carsupp`
--

CREATE TABLE `carsupp` (
  `email` varchar(200) NOT NULL,
  `car` varchar(100) NOT NULL,
  `plate` varchar(200) NOT NULL,
  `color` varchar(200) NOT NULL,
  `gear` varchar(200) NOT NULL,
  `total` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'PENDING',
  `book` varchar(100) NOT NULL DEFAULT 'NOT BOOKED'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carsupp`
--

INSERT INTO `carsupp` (`email`, `car`, `plate`, `color`, `gear`, `total`, `status`, `book`) VALUES
('mar@gmail.com', 'MYVI', 'JJN3221', 'BLACK', 'AUTO', '10', 'approved', 'BOOKED'),
('nadia@gmail.com', 'ALZA', 'JDG1123', 'BLACK', 'AUTO', '10', 'pending', 'BOOKED');

-- --------------------------------------------------------

--
-- Table structure for table `list_isp`
--

CREATE TABLE `list_isp` (
  `ic` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `user` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `list_isp`
--

INSERT INTO `list_isp` (`ic`, `name`, `email`, `phone`, `user`, `gender`, `password`) VALUES
('0038012', 'aufa', 'aufa@gmail.com', '903021', 'admin', 'female', 'rentaride'),
('01302038', 'NADIA', 'nadia@gmail.com', '0164155030', 'SUPPLIER', 'FEMALE', 'NADIA'),
('090812019008', 'danish', 'danish@gmail.com', '0178893109', 'customer', 'male', 'danish'),
('1023021', 'han', 'han@gmail.com', '2301883921', 'customer', 'male', 'han'),
('3020130', 'ji', 'ji@gmail.com', '82390103', 'admin', 'male', 'rentaride'),
('3243564', 'mar', 'mar@gmail.com', '01309203', 'supplier', 'female', 'mar');

-- --------------------------------------------------------

--
-- Table structure for table `rentcar`
--

CREATE TABLE `rentcar` (
  `email` varchar(100) NOT NULL,
  `car` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `addressRent` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `sendpick` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'PENDING',
  `book` varchar(100) NOT NULL DEFAULT 'BOOKED',
  `total` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rentcar`
--

INSERT INTO `rentcar` (`email`, `car`, `color`, `time`, `addressRent`, `destination`, `sendpick`, `date`, `status`, `book`, `total`) VALUES
('danish@gmail.com', 'MYVI', 'BLACK', '24', 'uitm', 'uitm', 'send', '2024-07-10', 'using', 'BOOKED', '240'),
('han@gmail.com', 'ALZA', 'BLACK', '12', 'uitm', 'kl', 'send', '2024-07-11', 'using', 'BOOKED', '120');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carsupp`
--
ALTER TABLE `carsupp`
  ADD PRIMARY KEY (`email`,`car`,`plate`,`color`);

--
-- Indexes for table `list_isp`
--
ALTER TABLE `list_isp`
  ADD PRIMARY KEY (`ic`,`email`);

--
-- Indexes for table `rentcar`
--
ALTER TABLE `rentcar`
  ADD PRIMARY KEY (`email`,`car`,`color`,`date`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
