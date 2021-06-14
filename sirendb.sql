-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2021 at 01:32 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sirendb`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `articleURL` varchar(8000) DEFAULT NULL COMMENT 'url from web',
  `articleImg` varchar(8000) DEFAULT NULL COMMENT 'image path',
  `numberOfLikes` int(11) DEFAULT NULL,
  `articleTitle` varchar(100) DEFAULT NULL,
  `favorite` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `articleURL`, `articleImg`, `numberOfLikes`, `articleTitle`, `favorite`) VALUES
(1, 'https://www.worldwildlife.org/stories/how-climate-change-relates-to-oceans', '../imgs/ocean_sunset.PNG', 0, 'How climate change relates to oceans', 0),
(2, 'https://www.wayfairertravel.com/inspiration/worlds-most-endangered-marine-species/', '../imgs/sea_otter.PNG', 0, '10 of the World\'s Most Endangered Marine Species.', 0),
(3, 'https://www.wwf.org.au/news/blogs/what-do-sea-turtles-eat-unfortunately-plastic-bags#gs.z3r46c', '../imgs/turtle_plastic.PNG', 0, 'What do sea turtles eat? Unfortunately, plastic bags.', 0),
(4, 'https://ocean.si.edu/ocean-life/invertebrates/ocean-acidification', '../imgs/coral-reef.jpg', 0, 'Ocean Acidification', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `contactName` varchar(100) NOT NULL,
  `contactEmail` varchar(100) NOT NULL,
  `contactText` varchar(8000) NOT NULL,
  `isRead` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `contactName`, `contactEmail`, `contactText`, `isRead`) VALUES
(1, 'pipis', '', 'THIS IS A TEST TEXT ', 0),
(2, 'pipis', 'mail@mail.com', 'THIS IS A TEST TEXT ', 0),
(3, 'pipisss', 'mailss@mail.com', 'TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST ', 0),
(4, 'makis', 'pasok@gmail.com', 'to pasok einai edw', 0),
(5, 'user', 'h@hj.n', 'PWD CHANGE REQUEST', 0),
(6, 'user', 'christnaou@gmail.com', 'PWD CHANGE REQUEST', 0),
(7, 'user', 'gdgfdahaergha@mail.com', 'PWD CHANGE REQUEST', 0),
(8, 'user', 'thereisnowaythisemailexists@mail.com', 'PWD CHANGE REQUEST', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `pwd` varchar(100) DEFAULT NULL,
  `imagePath` varchar(8000) DEFAULT NULL COMMENT 'path of image (if they upload)',
  `age` varchar(3) NOT NULL DEFAULT 'Age',
  `gender` varchar(100) NOT NULL DEFAULT 'Gender',
  `location` varchar(500) NOT NULL DEFAULT 'Location'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `pwd`, `imagePath`, `age`, `gender`, `location`) VALUES
(27, 'h@h.h', 'hhh', 'a3aca2964e72000eea4c56cb341002a4', '../uploads/user27_pun1.PNG', '21', 'Male', 'Thessaloniki'),
(28, 'admin@admin.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, 'Age', 'Gender', 'Location'),
(29, 'tefas@mail.com', 'tefas', '086743ca5628dbe71e985c16edd013b7', NULL, '', '', 'Thessaloniki'),
(30, 'noway@dude.com', 'noway', '2097d7b063d6f8b5cc803abf3df758aa', NULL, 'Age', 'Gender', 'Location');

-- --------------------------------------------------------

--
-- Table structure for table `userlikesarticle`
--

CREATE TABLE `userlikesarticle` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `articleId` varchar(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlikesarticle`
--

INSERT INTO `userlikesarticle` (`id`, `userId`, `articleId`) VALUES
(1, 27, '4'),
(2, 27, '1'),
(3, 27, '2'),
(4, 27, '3'),
(5, 27, '4'),
(6, 27, '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlikesarticle`
--
ALTER TABLE `userlikesarticle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `userlikesarticle`
--
ALTER TABLE `userlikesarticle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
