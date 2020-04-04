-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2020 at 12:07 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comment-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdOn` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `userID`, `comment`, `createdOn`) VALUES
(1, 2, 'asdfasdfasdf', '2019-07-15 15:40:10'),
(2, 2, 'dfasdfasdf', '2019-07-18 08:15:38'),
(3, 2, 'dfasdfasdf', '2019-07-18 08:15:51'),
(4, 2, 'another one', '2019-07-18 08:25:48'),
(5, 2, 'aaaaaaaaaaaaaa', '2019-07-18 08:27:35'),
(6, 2, 'bbbbbbbbbbb', '2019-07-18 08:28:50'),
(7, 2, 'aaaaaaaaccccvcvvv', '2019-07-18 08:28:56'),
(8, 2, 'zzzzzzzzzzzz', '2019-07-18 08:36:29'),
(9, 2, 'yyyyyyyyyyyyyyyyyy', '2019-07-18 08:36:35'),
(11, 2, 'aaaaaaaaaaaaaaaaaa', '2019-07-18 08:39:11'),
(12, 2, 'aaaaaaaaaaaaa', '2019-07-18 08:43:56'),
(20, 2, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2019-07-25 11:45:59'),
(21, 3, 'addaddasadads', '2020-04-04 12:15:07'),
(22, 3, 'adsadad', '2020-04-04 12:15:11'),
(23, 3, 'adadadsads', '2020-04-04 12:15:16'),
(24, 3, 'adaddadada', '2020-04-04 12:19:38'),
(25, 3, 'adsadadad', '2020-04-04 12:19:43'),
(26, 3, 'sfsfsfsfs', '2020-04-04 12:28:44'),
(27, 3, 'saddssadda', '2020-04-04 12:35:05'),
(28, 3, 'superddsd', '2020-04-04 12:35:15'),
(29, 3, 'penkiss', '2020-04-04 12:35:22'),
(30, 3, 'dasadadsadda', '2020-04-04 12:40:20'),
(31, 3, 'addadad', '2020-04-04 12:40:22'),
(32, 3, 'afaffafa', '2020-04-04 12:40:24'),
(33, 3, 'sadadadad', '2020-04-04 12:45:53'),
(34, 3, 'saadad', '2020-04-04 12:59:07'),
(35, 4, 'dwawaawdad', '2020-04-04 12:59:56'),
(36, 4, 'dadadwada', '2020-04-04 13:01:11'),
(37, 4, 'dda', '2020-04-04 13:01:22'),
(38, 4, 'adadad', '2020-04-04 13:05:15'),
(39, 4, 'sa', '2020-04-04 13:05:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `createdOn`) VALUES
(3, 'user', 'user@user.com', '$2y$10$Waw5sP1cLbmoNR54vnfhQOHHTrmAwPveBOynxeXiCjEpwZFwadTa.', '2020-04-04 12:14:44'),
(4, 'user2', 'user2@user.com', '$2y$10$xYU3kh2yKAIQbvk04HgYVuwkb5e/fi/fgyemh5UcLasnuwlj9KLSG', '2020-04-04 12:59:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
