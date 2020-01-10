-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 10, 2020 at 05:42 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id12183512_goapothole`
--

-- --------------------------------------------------------

--
-- Table structure for table `ca`
--

CREATE TABLE `ca` (
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pincode` int(6) NOT NULL,
  `status` int(1) NOT NULL,
  `noc` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ca`
--

INSERT INTO `ca` (`email`, `pincode`, `status`, `noc`) VALUES
('ca1@gmail.com', 403001, 0, 2),
('ca2@gmail.com', 403001, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `cid` int(100) NOT NULL,
  `latitude` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `longitude` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pincode` int(6) NOT NULL,
  `userphonenumber` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `imgurl` text COLLATE utf8_unicode_ci NOT NULL,
  `caemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(12) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`cid`, `latitude`, `longitude`, `pincode`, `userphonenumber`, `imgurl`, `caemail`, `date`) VALUES
(3, '17.3782919', '78.5037796', 403001, '919177218034', 'https://firebasestorage.googleapis.com/v0/b/goapothole.appspot.com/o/complainimg%2FIMG-20200110-WA0001.jpg?alt=media&token=be2595f1-fdd6-4c41-ac54-71dd7bbc2ea6', 'ca1@gmail.com', '2020-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `fixed`
--

CREATE TABLE `fixed` (
  `cid` int(5) NOT NULL,
  `pincode` int(6) NOT NULL,
  `userphonenumber` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `caemail` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `userimgurl` text COLLATE utf8_unicode_ci NOT NULL,
  `caimgurl` text COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fixed`
--

INSERT INTO `fixed` (`cid`, `pincode`, `userphonenumber`, `caemail`, `userimgurl`, `caimgurl`, `date`) VALUES
(1, 403001, '918686368485', 'ca1@gmail.com', 'https://firebasestorage.googleapis.com/v0/b/goapothole.appspot.com/o/complainimg%2FScreenshot_20200110_093127.jpg?alt=media&token=570b606e-9b99-4567-a8f6-c7e8b05bc8e9', 'https://firebasestorage.googleapis.com/v0/b/goapothole.appspot.com/o/potholeimg%2FScreenshot_20200109-202412.png?alt=media&token=479ea8c5-9508-4051-9b6b-76bb33f6ec3b', '2020-01-10'),
(2, 403001, '918686368485', 'ca1@gmail.com', 'https://firebasestorage.googleapis.com/v0/b/goapothole.appspot.com/o/complainimg%2FScreenshot_20200110_093127.jpg?alt=media&token=570b606e-9b99-4567-a8f6-c7e8b05bc8e9', 'https://firebasestorage.googleapis.com/v0/b/goapothole.appspot.com/o/potholeimg%2FIMG-20200110-WA0059.jpg?alt=media&token=c587e793-1ddf-498e-ad24-713abbba4325', '2020-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `phonenumber` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `pincode` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`phonenumber`, `pincode`) VALUES
('918686368485', 403001);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ca`
--
ALTER TABLE `ca`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `fixed`
--
ALTER TABLE `fixed`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`phonenumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `cid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
