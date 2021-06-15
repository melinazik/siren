-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2021 at 09:28 PM
-- Server version: 10.4.19-MariaDB-log
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
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `articleURL`, `articleImg`, `numberOfLikes`, `articleTitle`, `category`) VALUES
(11, 'https://www.nationalgeographic.com/environment/article/plastic-pollution', '../imgs/plastic_waste_natgeo.PNG', 2, 'The World\'s plastic pollution explained', 'effects'),
(12, 'https://ocean.si.edu/ocean-life/invertebrates/ocean-acidification', '../imgs/coral-reef.jpg', 1, 'Ocean Acidification', 'effects'),
(13, 'https://www.nationalgeographic.com/environment/article/critical-issues-marine-pollution', '../imgs/marine_polution.PNG', 0, 'Marine Pollution Explained', 'effects'),
(14, 'https://www.nationalgeographic.com/environment/article/great-barrier-reef-restoration-transplanting-corals', '../imgs/coral_reef.PNG', 1, 'Can new science save dying coral reefs?', 'effects'),
(15, 'https://www.nationalgeographic.com/environment/article/critical-issues-overfishing', '../imgs/overfishing_natgeo.PNG', 1, 'Plenty of fish in the sea? Not always.', 'effects'),
(16, 'https://www.noaa.gov/education/resource-collections/ocean-coasts/oil-spills', '../imgs/oil_spills.PNG', 1, 'Oil Spills', 'effects'),
(17, 'https://www.wayfairertravel.com/inspiration/worlds-most-endangered-marine-species/', '../imgs/sea_otter.PNG', 1, '10 of the world\'s most endangered marine species', 'causes'),
(18, 'https://www.worldwildlife.org/stories/how-climate-change-relates-to-oceans', '../imgs/ocean_sunset.PNG', 1, 'How climate change relates to the oceans', 'causes'),
(19, 'https://www.nrdc.org/stories/global-climate-change-what-you-need-know', '../imgs/bear_iceberg.PNG', 0, 'Global climate change; What you need to know', 'causes'),
(20, 'https://www.conserve-energy-future.com/causes-effects-solutions-depleting-marine-life.php', '../imgs/fish_ocean.PNG', 1, 'What is marine life?', 'causes'),
(21, 'https://www.nationalgeographic.com/magazine/article/plastic-planet-health-pollution-waste-microplastics', '../imgs/plastic_bottle.PNG', 1, 'We know plastic is hurting marine life. What about us?', 'causes'),
(22, 'https://www.wwf.org.au/news/blogs/what-do-sea-turtles-eat-unfortunately-plastic-bags#gs.z3r46c', '../imgs/turtle_plastic.PNG', 1, 'What do sea turtles eat? Unfortunately, plastic bags.', 'causes');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `contactName` varchar(100) NOT NULL,
  `contactEmail` varchar(100) NOT NULL,
  `contactText` varchar(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `contactName`, `contactEmail`, `contactText`) VALUES
(10, 'Kostas', 'kostas@example.com', 'Hi, very nice website! '),
(11, 'user', 'empty@example.com', 'PWD CHANGE REQUEST'),
(12, 'Michael', 'michael@example.com', 'I have some suggestions to make. If you\'d like to hear them, please email me back on this address'),
(13, 'Lorem Ipsum', 'lorem@ipsum.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

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
(32, 'admin@admin.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '../imgs/siren.png', 'Age', 'Gender', 'Location'),
(34, 'kostas@example.com', 'kostas', '5759a7cec9124be77fd0017f2b44c780', '../uploads/user34_qt2.PNG', '21', 'Male', 'Thessaloniki'),
(35, 'empty@example.com', 'empty', 'a2e4822a98337283e39f7b60acf85ec9', '../imgs/siren.png', 'Age', 'Gender', 'Location');

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
(28, 34, '22'),
(30, 34, '17'),
(31, 34, '20'),
(32, 34, '18'),
(33, 34, '21');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `userlikesarticle`
--
ALTER TABLE `userlikesarticle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
