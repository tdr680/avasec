-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2013 at 10:45 PM
-- Server version: 5.1.67
-- PHP Version: 5.3.6-13ubuntu3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `avasec`
--

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=5 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`) VALUES
(1, 'team_1'),
(2, 'team_2'),
(3, 'team_3'),
(4, 'team_4');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
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
-- Table structure for table `user_team`
--

DROP TABLE IF EXISTS `user_team`;
CREATE TABLE IF NOT EXISTS `user_team` (
  `team_id` int(11) NOT NULL,
  `user_ver_id` int(11) NOT NULL,
  UNIQUE KEY `idx_user_team` (`team_id`,`user_ver_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `user_team`
--

INSERT INTO `user_team` (`team_id`, `user_ver_id`) VALUES
(1, 2),
(1, 6),
(2, 2),
(2, 6),
(3, 1),
(3, 4),
(3, 7),
(4, 1),
(4, 7);

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_v`
--
DROP VIEW IF EXISTS `user_v`;
CREATE TABLE IF NOT EXISTS `user_v` (
`id` int(11)
,`login` varchar(40)
,`ver_id` int(11)
,`name` varchar(80)
);
-- --------------------------------------------------------

--
-- Table structure for table `user_ver`
--

DROP TABLE IF EXISTS `user_ver`;
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

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_ver_v`
--
DROP VIEW IF EXISTS `user_ver_v`;
CREATE TABLE IF NOT EXISTS `user_ver_v` (
`ver_id` int(11)
,`user_id` int(11)
);
-- --------------------------------------------------------

--
-- Structure for view `user_ver_v`
--
DROP TABLE IF EXISTS `user_ver_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`avasec`@`localhost` SQL SECURITY DEFINER VIEW `user_ver_v` AS select max(`user_ver`.`id`) AS `user_ver_id`,`user_ver`.`user_id` AS `user_id` from `user_ver` group by `user_ver`.`user_id`;

-- --------------------------------------------------------

--
-- Structure for view `user_v`
--
DROP TABLE IF EXISTS `user_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_v` AS select `u`.`id` AS `id`,`u`.`login` AS `login`,`uv`.`id` AS `user_ver_id`,`uv`.`name` AS `name` from ((`user` `u` join `user_ver_v` `v` on((`u`.`id` = `v`.`user_id`))) join `user_ver` `uv` on((`uv`.`id` = `v`.`user_ver_id`)));

