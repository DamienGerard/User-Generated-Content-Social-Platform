-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2020 at 06:47 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webprojectdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_reg_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_enabled` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `profile_pic` varchar(255) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `self_description` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `education` varchar(255) NOT NULL,
  `cover_pic` varchar(255) NOT NULL DEFAULT 'uploads/picture/photo-1568489601916-b6dd81cbc0be.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_reg_time`, `user_enabled`, `profile_pic`, `f_name`, `l_name`, `self_description`, `DOB`, `education`, `cover_pic`) VALUES
(18, 'TheGreatDamien', '$2y$10$5/2ExnFQz2.vtRUHbRlkqepaSbCvjVSoJePa0qdX0ll5gEQ4EK/16', '2019-11-18 16:47:39', 1, '', 'Nicoclas', 'Melanie', 'I am a 21 years old', '1999-02-17', 'Computer Science Year 2', ''),
(23, 'JohnnyJohn', '$2y$10$2mua56OTEfAcKs3.sHLq1uWJpa6qMmtXUVP8AWvIhINUtn0BcDuoe', '2019-11-20 04:12:41', 1, '', 'Nicoclas', 'Melanie', 'I am a 21 years old', '1999-02-17', 'Computer Science Year 2', ''),
(24, 'PersonaUno', '$2y$10$StuuEDQoi36KXSP7xZQ9Q.3krOhxPk2LrpPTRNWEl3qpHjjVc.xRK', '2019-11-20 04:17:14', 1, '', 'Nicoclas', 'Melanie', 'I am a 21 years old', '1999-02-17', 'Computer Science Year 2', ''),
(25, 'PersonaDos', '$2y$10$gsv4dbkP4Bs5Nic4pIwAxOL6vH24E7FT/4A3GhhezOThjxmhr1fXO', '2019-11-20 04:43:55', 1, '', 'Nicoclas', 'Melanie', 'I am a 21 years old', '1999-02-17', 'Computer Science Year 2', ''),
(26, 'nicolasmelanie', '$2y$10$HuusNoXASqTRrGIudXq/NeNT.J/UANKxRTmjyZ1LeWX6rL5l6m/6e', '2019-11-20 09:09:57', 1, 'uploads/picture/worldhistory.jpeg', 'Nicolas', 'Melanie', 'I am a 21 years old', '1999-02-17', 'Computer Science Year 2', 'uploads/picture/5dd2cce27d0de.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
