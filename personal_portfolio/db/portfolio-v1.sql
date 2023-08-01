-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 14, 2022 at 08:22 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(8000) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`, `phonenumber`) VALUES
(1, 'test', 'a@a.com', 'hello world', '615364792'),
(2, 'test', 'a@a.com', 'hello world', '615364792'),
(3, 'john doe', 'test@test.nl', 'Hello world!', '31615364792');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(256) NOT NULL,
  `pagename` varchar(255) NOT NULL,
  `githublink` varchar(8000) NOT NULL,
  `websitelink` varchar(8000) DEFAULT NULL,
  `p1` varchar(8000) DEFAULT NULL,
  `p2` varchar(8000) DEFAULT NULL,
  `p3` varchar(8000) DEFAULT NULL,
  `p4` varchar(8000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `filename`, `name`, `pagename`, `githublink`, `websitelink`, `p1`, `p2`, `p3`, `p4`) VALUES
(1, 'jpg1.jpg', 'apresdesheures.com', 'adh', 'https://github.com/tcudjoe/apresdesheures', 'http://apresdesheuresapparel.com/', 'Apr&#233;s des heur is a starting apparel business (established in 2021) and they want to start selling their products online.', 'On this platform the user will be able to create an account to make buying products easier, the user will be able to add, remove and edit the amount of products in and to the cart, the user will be able to purchase the products added to the card and will receive a receipt in their mail with their made purchase.', 'This platform will also have an admin panel for the client to easily add, remove and edit products and many more features.', NULL),
(2, 'Screenshot AI_IRA.png', 'Voice assistant IRA', 'ira', 'https://github.com/tcudjoe/AI-voiceAssistant-IRA', '', 'IRA (pronounced Ir-ruh) is an Artificial Intelligence voice assistant which will have Machine Learning implemented in it.', 'IRA started as an idea that was lingering in my head for quite some time. After using Siri on a daily basis, I wanted to create my own \'Siri\'. After doing some research about home assistants, home automation and voice assistants, I decided to dive into the deep and just start coding.', 'IRA will be able to take commands and carry those commands out for use in the house. Ira will run on raspberry pi\'s troughout the house with microphones and motion sensors attached to them. The motion sensors will be used to detect in which room the user is so that the raspberry pi in that room is the only one that will respond and listen. All the raspberry pi\'s will be connected to a local server created with flask so users can also communicate with Ira from outside of the house.', ''),
(3, 'whiteonblack.png', 'ThuisGemaakt (flutter app)', 'thuisgemaakt', 'https://github.com/tcudjoe/flutter_app', '', 'Thuisgemaakt is the first ever flutter app I made. It was initially a project for school but I got interested in it and so I decided to go futher with it. This is only ui/ux work. There are no api\'s and/or databases, they are yet to be implemented so stay tuned for updates!', 'ThuisGemaakt is essentially a big cookbook for those who like to switch up the recipe\'s. Every week, the user receives 7 new recipe\'s to try out for that week. Those recipe\'s will not be repeated the weeks after so every week are completely different recipe\'s. When a recipe is pressed the user gets to see the ingredients, the cook time, prep-time, serving amount and the calories per serving.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(8000) NOT NULL,
  `email` varchar(8000) NOT NULL,
  `password` varchar(32) NOT NULL,
  `userrole` enum('admin') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `userrole`) VALUES
(1, 'admin', 'tyra20015@gmail.com', 'qwertyuiopasdfghjkzxcvbnm1234567890', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
