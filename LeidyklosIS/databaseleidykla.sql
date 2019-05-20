-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2019 at 03:19 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_12345`


-- --------------------------------------------------------

--
-- Table structure for table `projekt`
--

CREATE TABLE `projekt` (
  `id` int(11) NOT NULL,
  `author_name` varchar(100) COLLATE utf8_lithuanian_ci NOT NULL,
  `pname` varchar(100) COLLATE utf8_lithuanian_ci NOT NULL,
  `coment` varchar(300) COLLATE utf8_lithuanian_ci NOT NULL,
  `verification` int(1) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `projekt`
--

INSERT INTO `projekt` (`id`, `author_name`, `pname`, `coment`, `verification`, `data`) VALUES
(1, 'lukas', 'Knyga Jokia', 'Storais virseliai,\r\n100 puslapiu.', 1, '2019-05-15 09:26:21'),
(2, 'lukas', 'Harmonika', 'Autorius H. Beginsas, 202 psl., grozine literatura.', NULL, '2019-05-15 12:59:05'),
(3, 'lukas', 'Valdovas', 'Knygos autorius N. Makiavelis, pavadinimas \"Valdovas\", 112psl.', NULL, '2019-05-15 13:15:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_lithuanian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_lithuanian_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_lithuanian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `username`, `password`) VALUES
(1, 'Lukas Štreimikis', 'lukas.streimikis@gmail.com', 861234567, 'lukas', 'lukas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projekt`
--
ALTER TABLE `projekt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projekt`
--
ALTER TABLE `projekt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
