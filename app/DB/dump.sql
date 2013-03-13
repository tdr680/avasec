-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 13, 2013 at 11:38 PM
-- Server version: 5.1.67
-- PHP Version: 5.3.6-13ubuntu3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `avasec`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(40) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `login`) VALUES
(1, 'user_1'),
(2, 'user_2'),
(3, 'user_3'),
(4, 'user_4');

-- --------------------------------------------------------

--
-- Table structure for table `user_ver`
--

CREATE TABLE IF NOT EXISTS `user_ver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(80) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user_ver`
--

INSERT INTO `user_ver` (`id`, `user_id`, `name`) VALUES
(1, 1, 'Walter White'),
(2, 2, 'Jesse Pinkerman'),
(3, 3, 'Hank Schrader'),
(4, 4, 'Hector Salamanca'),
(6, 2, 'Jesse Pinkman'),
(7, 4, 'Tuco Salamanca');
