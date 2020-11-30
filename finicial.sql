-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2020 at 07:22 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myfindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `finicial`
--

CREATE TABLE `finicial` (
  `id` int(11) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `date` int(11) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `accountdate` varchar(100) NOT NULL,
  `totalinterest` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `fixedmonth` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `finicial`
--

INSERT INTO `finicial` (`id`, `bank`, `date`, `amount`, `accountdate`, `totalinterest`, `type`, `fixedmonth`, `month`, `year`) VALUES
(1, 'AYA', 2020, '100000', '2020-12-01', 100, 'Fixed', 12, 0, 2020);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `finicial`
--
ALTER TABLE `finicial`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `finicial`
--
ALTER TABLE `finicial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
