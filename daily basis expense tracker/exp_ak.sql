-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2018 at 06:33 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id5045771_exp_ak	`
--

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(10) NOT NULL,
  `pname` varchar(2000) NOT NULL,
  `pprice` float NOT NULL,
  `uid` int(3) NOT NULL,
  `date` date NOT NULL,
  `isdel` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `pname`, `pprice`, `uid`, `date`, `isdel`) VALUES
(1, 'Potato Chips', 20, 1, '2018-03-08', 0),
(2, 'Chips', 20, 2, '2018-03-10', 1),
(3, 'Book', 400, 3, '2018-03-10', 0),
(4, 'Pen', 15, 3, '2018-01-10', 0),
(5, 'Laptop', 500000, 2, '2018-03-10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(10) NOT NULL,
  `income` varchar(2000) NOT NULL,
  `tvalue` float NOT NULL,
  `uid` int(3) NOT NULL,
  `date` date NOT NULL,
  `isdel` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `income`, `tvalue`, `uid`, `date`, `isdel`) VALUES
(1, 'Hack', 5000, 2, '2018-03-10', 1),
(2, 'Pocket Money', 1000, 3, '2018-03-10', 0),
(3, 'Won', 10000, 2, '2018-03-10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(8) NOT NULL,
  `uname` varchar(40) NOT NULL,
  `uemail` varchar(80) NOT NULL,
  `upass` varchar(32) NOT NULL,
  `Creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `uemail`, `upass`, `Creation_date`) VALUES
(1, 'Akash Mondal', 'akash@gmail.com', '94754d0abb89e4cf0a7f1c494dbb9d2c', '2018-03-08 17:35:52'),
(2, 'Satyapriya Mandal', 'satyapriya707@gmail.com', '38945b2bad7e3c5ffb9e39da2603c169', '2018-03-10 17:06:13'),
(3, 'Akash Mondal', 'akashmondal@gmail.com', '94754d0abb89e4cf0a7f1c494dbb9d2c', '2018-03-10 17:17:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
