-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 03:29 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintb`
--

CREATE TABLE `admintb` (
  `id` int(11) NOT NULL,
  `uname` varchar(45) NOT NULL,
  `pword` varchar(45) NOT NULL,
  `fullname` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admintb`
--

INSERT INTO `admintb` (`id`, `uname`, `pword`, `fullname`) VALUES
(1, '@rassel.david.01', 'P@ssw0rd', 'Rassel David'),
(2, '@kevin.bautista.02', 'P@ssw0rd', 'Kevin Bautista'),
(3, '@mark.belleza.03', 'P@ssw0rd', 'Mark Belleza'),
(4, '@josh.nuñez.04', 'P@ssw0rd', 'Josh Nuñez'),
(5, '@john.rivera.05', 'P@ssw0rd', 'John Rivera');

-- --------------------------------------------------------

--
-- Table structure for table `clienttb`
--

CREATE TABLE `clienttb` (
  `id` int(11) NOT NULL,
  `uname` varchar(45) NOT NULL,
  `pword` varchar(45) NOT NULL,
  `fullname` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `clienttb`
--

INSERT INTO `clienttb` (`id`, `uname`, `pword`, `fullname`) VALUES
(1, '@rassel.david.user.01', 'P@ssw0rd', 'Rassel David BSIT 3B'),
(2, '@kevin.bautista.user.02', 'P@ssw0rd', 'Kevin Bautista BSIT 3B'),
(3, '@mark.belleza.user.03', 'P@ssw0rd', 'Mark Belleza BSIT 3B'),
(4, '@josh.nuñez.user.04', 'P@ssw0rd', 'Josh Nuñez BSIT 3B'),
(5, '@john.rivera.user.05', 'P@ssw0rd', 'John Rivera BSIT 3B');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintb`
--
ALTER TABLE `admintb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clienttb`
--
ALTER TABLE `clienttb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintb`
--
ALTER TABLE `admintb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clienttb`
--
ALTER TABLE `clienttb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
