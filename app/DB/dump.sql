-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2013 at 09:12 PM
-- Server version: 5.1.67
-- PHP Version: 5.3.6-13ubuntu3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `avasec`
--

-- --------------------------------------------------------

--
-- Table structure for table `acode`
--

DROP TABLE IF EXISTS `acode`;
CREATE TABLE IF NOT EXISTS `acode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=1004 ;

--
-- Dumping data for table `acode`
--

INSERT INTO `acode` (`id`) VALUES
(1000),
(1001),
(1002),
(1003);

-- --------------------------------------------------------

--
-- Table structure for table `acode_entity`
--

DROP TABLE IF EXISTS `acode_entity`;
CREATE TABLE IF NOT EXISTS `acode_entity` (
  `acode_id` int(11) NOT NULL,
  `entity_id` int(11) NOT NULL,
  PRIMARY KEY (`acode_id`,`entity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `acode_entity`
--

INSERT INTO `acode_entity` (`acode_id`, `entity_id`) VALUES
(1000, 1),
(1000, 2),
(1001, 2),
(1001, 3),
(1002, 2),
(1002, 5),
(1003, 1),
(1003, 2),
(1003, 5),
(1003, 6);

-- --------------------------------------------------------

--
-- Table structure for table `entity`
--

DROP TABLE IF EXISTS `entity`;
CREATE TABLE IF NOT EXISTS `entity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=7 ;

--
-- Dumping data for table `entity`
--

INSERT INTO `entity` (`id`, `name`) VALUES
(1, 'entity 1'),
(2, 'entity 2'),
(3, 'entity 3'),
(4, 'entity 4'),
(5, 'entity 5'),
(6, 'entity 6');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=5 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'role_1'),
(2, 'role_2'),
(3, 'role_3'),
(4, 'role_4');

-- --------------------------------------------------------

--
-- Table structure for table `role_acode`
--

DROP TABLE IF EXISTS `role_acode`;
CREATE TABLE IF NOT EXISTS `role_acode` (
  `role_id` int(11) NOT NULL,
  `acode_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`acode_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `role_acode`
--

INSERT INTO `role_acode` (`role_id`, `acode_id`) VALUES
(1, 1001),
(1, 1002),
(2, 1000),
(2, 1001),
(3, 1001),
(3, 1002),
(4, 1003);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=7 ;

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
  `password` varchar(40) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=21 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `login`, `password`) VALUES
(1, 'mrwhite', 'a11963c26efa7187c7f03fe0349ba9ed67d00c39'),
(2, 'jess', 'a11963c26efa7187c7f03fe0349ba9ed67d00c39'),
(3, 'dea-hank', 'a11963c26efa7187c7f03fe0349ba9ed67d00c39'),
(4, 'tuco', 'a11963c26efa7187c7f03fe0349ba9ed67d00c39');

-- --------------------------------------------------------

--
-- Table structure for table `user_team`
--

DROP TABLE IF EXISTS `user_team`;
CREATE TABLE IF NOT EXISTS `user_team` (
  `team_id` int(11) NOT NULL,
  `user_ver_id` int(11) NOT NULL,
  UNIQUE KEY `idx_user_team` (`team_id`,`user_ver_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

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
-- Stand-in structure for view `user_team_v`
--
DROP VIEW IF EXISTS `user_team_v`;
CREATE TABLE IF NOT EXISTS `user_team_v` (
`team_id` int(11)
,`user_ver_id` int(11)
,`user_id` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `user_v`
--
DROP VIEW IF EXISTS `user_v`;
CREATE TABLE IF NOT EXISTS `user_v` (
`id` int(11)
,`login` varchar(40)
,`username` varchar(40)
,`password` varchar(40)
,`user_ver_id` int(11)
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=30 ;

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
`user_ver_id` int(11)
,`user_id` int(11)
);
-- --------------------------------------------------------

--
-- Structure for view `user_team_v`
--
DROP TABLE IF EXISTS `user_team_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_team_v` AS select `t`.`team_id` AS `team_id`,`t`.`user_ver_id` AS `user_ver_id`,`uv`.`user_id` AS `user_id` from (`user_team` `t` join `user_ver_v` `uv` on((`t`.`user_ver_id` = `uv`.`user_ver_id`)));

-- --------------------------------------------------------

--
-- Structure for view `user_v`
--
DROP TABLE IF EXISTS `user_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_v` AS select `u`.`id` AS `id`,`u`.`login` AS `login`,`u`.`login` AS `username`,`u`.`password` AS `password`,`uv`.`id` AS `user_ver_id`,`uv`.`name` AS `name` from ((`user` `u` join `user_ver_v` `v` on((`u`.`id` = `v`.`user_id`))) join `user_ver` `uv` on((`uv`.`id` = `v`.`user_ver_id`)));

-- --------------------------------------------------------

--
-- Structure for view `user_ver_v`
--
DROP TABLE IF EXISTS `user_ver_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`avasec`@`localhost` SQL SECURITY DEFINER VIEW `user_ver_v` AS select max(`user_ver`.`id`) AS `user_ver_id`,`user_ver`.`user_id` AS `user_id` from `user_ver` group by `user_ver`.`user_id`;
