-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2022 at 12:38 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csci390`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(100) NOT NULL,
  `users_id` int(100) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `about` varchar(1000) NOT NULL,
  `image` varchar(50) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `users_id`, `title`, `subject`, `about`, `image`, `type`) VALUES
(30, 1, 'LOSE FAT', 'What is the Volumetrics Diet and How Can It Help', 'in Weight Loss?', 'image/bmi.jpg', 'nutrition'),
(31, 1, 'GAIN MASS', 'Dietitians Say You Can Grab These 6 Candies', 'But you need to be smart to Grab this 6 Candies', 'image/download.jpg', 'nutrition'),
(32, 1, 'FULL-BODY EXERCISES', 'TAKE A KNEE IF YOU WANT TO MAKE UPPER-BODY POWER GAINS', 'These kneeling exercises will help you increase Strength, Balance, and...', 'image/full.jpg', 'workout'),
(33, 1, 'WOROUT TIPS', '&#039;COACH SARAH&#039; WILL TAKE YOUR KETTLEBELL TRAINING TO THE NEXT...', 'Sarah Gawron is busting myths while showing why all of us are better off swinging a bell.', 'image/coach.jpg', 'workout');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'habib', '71353099'),
(68, 'salim', '03149708'),
(69, 'nancy', '1234567'),
(70, 'asmaa', '123123123'),
(71, 'jinan', 'sami123.com'),
(72, 'touta', 'TALACH2001'),
(73, 'maya2022', 'maya1995'),
(74, 'mhammad', '1234567');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
