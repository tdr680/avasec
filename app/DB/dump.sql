-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2013 at 07:56 PM
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

CREATE TABLE IF NOT EXISTS `acode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `extid` int(11) DEFAULT NULL,
  `charid` varchar(45) DEFAULT NULL,
  `name` varchar(180) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3353 ;

-- --------------------------------------------------------

--
-- Table structure for table `acode_entity`
--

CREATE TABLE IF NOT EXISTS `acode_entity` (
  `acode_id` int(11) NOT NULL,
  `entity_id` int(11) NOT NULL,
  PRIMARY KEY (`acode_id`,`entity_id`),
  KEY `fk_acode_entity_1_idx` (`acode_id`),
  KEY `fk_acode_entity_2_idx` (`entity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `entity`
--

CREATE TABLE IF NOT EXISTS `entity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(8) DEFAULT NULL,
  `extid` bigint(32) DEFAULT NULL,
  `charid` varchar(45) DEFAULT NULL,
  `name` varchar(180) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55065 ;

-- --------------------------------------------------------

--
-- Table structure for table `entity_appl`
--

CREATE TABLE IF NOT EXISTS `entity_appl` (
  `entity_id` int(11) NOT NULL,
  PRIMARY KEY (`entity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `entity_appl_v`
--
CREATE TABLE IF NOT EXISTS `entity_appl_v` (
`id` int(11)
,`extid` bigint(32)
,`charid` varchar(45)
,`name` varchar(180)
);
-- --------------------------------------------------------

--
-- Table structure for table `entity_ctx`
--

CREATE TABLE IF NOT EXISTS `entity_ctx` (
  `entity_id` int(11) NOT NULL,
  `parent_id` varchar(40) NOT NULL,
  `is_parent` varchar(40) NOT NULL,
  `group_id` int(11) NOT NULL,
  `global_order_by` int(11) NOT NULL,
  PRIMARY KEY (`entity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `entity_ctx_v`
--
CREATE TABLE IF NOT EXISTS `entity_ctx_v` (
`id` int(11)
,`extid` bigint(32)
,`charid` varchar(45)
,`name` varchar(180)
,`parent_id` varchar(40)
,`is_parent` varchar(40)
,`group_id` int(11)
,`global_order_by` int(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `entity_mtyp`
--

CREATE TABLE IF NOT EXISTS `entity_mtyp` (
  `entity_id` int(11) NOT NULL,
  `grp` varchar(8) NOT NULL,
  PRIMARY KEY (`entity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `entity_mtyp_v`
--
CREATE TABLE IF NOT EXISTS `entity_mtyp_v` (
`id` int(11)
,`extid` bigint(32)
,`charid` varchar(45)
,`name` varchar(180)
,`grp` varchar(8)
);
-- --------------------------------------------------------

--
-- Table structure for table `entity_task`
--

CREATE TABLE IF NOT EXISTS `entity_task` (
  `entity_id` int(11) NOT NULL,
  `type` varchar(40) NOT NULL,
  `meta_out_id` int(11) NOT NULL,
  PRIMARY KEY (`entity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `entity_task_v`
--
CREATE TABLE IF NOT EXISTS `entity_task_v` (
`id` int(11)
,`extid` bigint(32)
,`charid` varchar(45)
,`name` varchar(180)
,`type` varchar(40)
,`meta_out_id` int(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `entity_wfc`
--

CREATE TABLE IF NOT EXISTS `entity_wfc` (
  `entity_id` int(11) NOT NULL,
  `meta_typ_id` int(11) NOT NULL,
  `wfc_action_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`entity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `entity_wfc_status`
--

CREATE TABLE IF NOT EXISTS `entity_wfc_status` (
  `meta_typ_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `charid` varchar(40) NOT NULL,
  `name` varchar(80) NOT NULL,
  PRIMARY KEY (`meta_typ_id`,`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `entity_wfc_v`
--
CREATE TABLE IF NOT EXISTS `entity_wfc_v` (
`id` int(11)
,`extid` bigint(32)
,`charid` varchar(45)
,`name` varchar(180)
,`meta_typ_id` int(11)
,`wfc_action_id` int(11)
,`status_id` int(11)
,`status_name` varchar(80)
,`status_charid` varchar(40)
);
-- --------------------------------------------------------

--
-- Table structure for table `if_acode_entity`
--

CREATE TABLE IF NOT EXISTS `if_acode_entity` (
  `acode_extid` int(11) NOT NULL,
  `entity_extid` bigint(32) NOT NULL,
  `entity_type` varchar(8) NOT NULL,
  PRIMARY KEY (`acode_extid`,`entity_extid`,`entity_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `if_entity_appl`
--

CREATE TABLE IF NOT EXISTS `if_entity_appl` (
  `entity_extid` int(11) NOT NULL,
  PRIMARY KEY (`entity_extid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `if_entity_ctx`
--

CREATE TABLE IF NOT EXISTS `if_entity_ctx` (
  `entity_extid` int(11) NOT NULL,
  `parent_id` varchar(40) NOT NULL,
  `is_parent` varchar(40) NOT NULL,
  `group_id` int(11) NOT NULL,
  `global_order_by` int(11) NOT NULL,
  PRIMARY KEY (`entity_extid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `if_entity_mtyp`
--

CREATE TABLE IF NOT EXISTS `if_entity_mtyp` (
  `entity_extid` int(11) NOT NULL,
  `grp` varchar(8) NOT NULL,
  PRIMARY KEY (`entity_extid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `if_entity_task`
--

CREATE TABLE IF NOT EXISTS `if_entity_task` (
  `entity_extid` int(11) NOT NULL,
  `type` varchar(40) NOT NULL,
  `meta_out_id` int(11) NOT NULL,
  PRIMARY KEY (`entity_extid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `if_entity_wfc`
--

CREATE TABLE IF NOT EXISTS `if_entity_wfc` (
  `entity_extid` bigint(32) NOT NULL,
  `meta_typ_id` int(11) NOT NULL,
  `wfc_action_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`entity_extid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `if_role_acode`
--

CREATE TABLE IF NOT EXISTS `if_role_acode` (
  `role_extid` int(11) NOT NULL,
  `acode_extid` int(11) NOT NULL,
  PRIMARY KEY (`role_extid`,`acode_extid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `if_role_role`
--

CREATE TABLE IF NOT EXISTS `if_role_role` (
  `role_1_extid` int(11) NOT NULL,
  `role_2_extid` int(11) NOT NULL,
  PRIMARY KEY (`role_1_extid`,`role_2_extid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `if_user_acode`
--

CREATE TABLE IF NOT EXISTS `if_user_acode` (
  `user_extid` int(11) NOT NULL,
  `acode_extid` int(11) NOT NULL,
  PRIMARY KEY (`user_extid`,`acode_extid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `if_user_role`
--

CREATE TABLE IF NOT EXISTS `if_user_role` (
  `role_extid` int(11) NOT NULL,
  `user_extid` int(11) NOT NULL,
  PRIMARY KEY (`role_extid`,`user_extid`),
  KEY `fk_if_user_role_1_idx` (`role_extid`),
  KEY `fk_if_user_role_2_idx` (`user_extid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `if_user_team`
--

CREATE TABLE IF NOT EXISTS `if_user_team` (
  `team_extid` int(11) NOT NULL,
  `user_extid` int(11) NOT NULL,
  PRIMARY KEY (`team_extid`,`user_extid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `extid` int(11) DEFAULT NULL,
  `charid` varchar(45) DEFAULT NULL,
  `name` varchar(180) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=776 ;

-- --------------------------------------------------------

--
-- Table structure for table `role_acode`
--

CREATE TABLE IF NOT EXISTS `role_acode` (
  `role_id` int(11) NOT NULL,
  `acode_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`acode_id`),
  KEY `fk_role_acode_1_idx` (`role_id`),
  KEY `fk_role_acode_2_idx` (`acode_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role_role`
--

CREATE TABLE IF NOT EXISTS `role_role` (
  `role_1_id` int(11) NOT NULL,
  `role_2_id` int(11) NOT NULL,
  PRIMARY KEY (`role_1_id`,`role_2_id`),
  KEY `fk_role_role_1_idx` (`role_1_id`),
  KEY `fk_role_role_2_idx` (`role_2_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE latin1_general_cs NOT NULL DEFAULT '',
  `data` text COLLATE latin1_general_cs,
  `expires` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `extid` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=128 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `extid` int(11) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7606 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_acode`
--

CREATE TABLE IF NOT EXISTS `user_acode` (
  `user_id` int(11) NOT NULL,
  `acode_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`acode_id`),
  KEY `fk_user_acode_1_idx` (`user_id`),
  KEY `fk_user_acode_2_idx` (`acode_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`user_id`),
  KEY `fk_user_role_1_idx` (`role_id`),
  KEY `fk_user_role_2_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_team`
--

CREATE TABLE IF NOT EXISTS `user_team` (
  `team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`team_id`,`user_id`),
  KEY `fk_user_team_1_idx` (`team_id`),
  KEY `fk_user_team_2_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure for view `entity_appl_v`
--
DROP TABLE IF EXISTS `entity_appl_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `entity_appl_v` AS select `e`.`id` AS `id`,`e`.`extid` AS `extid`,`e`.`charid` AS `charid`,`e`.`name` AS `name` from (`entity` `e` join `entity_appl` `a` on((`e`.`id` = `a`.`entity_id`)));

-- --------------------------------------------------------

--
-- Structure for view `entity_ctx_v`
--
DROP TABLE IF EXISTS `entity_ctx_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `entity_ctx_v` AS select `e`.`id` AS `id`,`e`.`extid` AS `extid`,`e`.`charid` AS `charid`,`e`.`name` AS `name`,`c`.`parent_id` AS `parent_id`,`c`.`is_parent` AS `is_parent`,`c`.`group_id` AS `group_id`,`c`.`global_order_by` AS `global_order_by` from (`entity` `e` join `entity_ctx` `c` on((`e`.`id` = `c`.`entity_id`)));

-- --------------------------------------------------------

--
-- Structure for view `entity_mtyp_v`
--
DROP TABLE IF EXISTS `entity_mtyp_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `entity_mtyp_v` AS select `e`.`id` AS `id`,`e`.`extid` AS `extid`,`e`.`charid` AS `charid`,`e`.`name` AS `name`,`m`.`grp` AS `grp` from (`entity` `e` join `entity_mtyp` `m` on((`e`.`id` = `m`.`entity_id`)));

-- --------------------------------------------------------

--
-- Structure for view `entity_task_v`
--
DROP TABLE IF EXISTS `entity_task_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `entity_task_v` AS select `e`.`id` AS `id`,`e`.`extid` AS `extid`,`e`.`charid` AS `charid`,`e`.`name` AS `name`,`m`.`type` AS `type`,`m`.`meta_out_id` AS `meta_out_id` from (`entity` `e` join `entity_task` `m` on((`e`.`id` = `m`.`entity_id`)));

-- --------------------------------------------------------

--
-- Structure for view `entity_wfc_v`
--
DROP TABLE IF EXISTS `entity_wfc_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `entity_wfc_v` AS select `e`.`id` AS `id`,`e`.`extid` AS `extid`,`e`.`charid` AS `charid`,`e`.`name` AS `name`,`w`.`meta_typ_id` AS `meta_typ_id`,`w`.`wfc_action_id` AS `wfc_action_id`,`w`.`status_id` AS `status_id`,`s`.`name` AS `status_name`,`s`.`charid` AS `status_charid` from ((`entity` `e` join `entity_wfc` `w` on((`e`.`id` = `w`.`entity_id`))) left join `entity_wfc_status` `s` on(((`s`.`meta_typ_id` = `w`.`meta_typ_id`) and (`s`.`status_id` = `w`.`status_id`))));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acode_entity`
--
ALTER TABLE `acode_entity`
  ADD CONSTRAINT `fk_acode_entity_1` FOREIGN KEY (`acode_id`) REFERENCES `acode` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_acode_entity_2` FOREIGN KEY (`entity_id`) REFERENCES `entity` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `entity_appl`
--
ALTER TABLE `entity_appl`
  ADD CONSTRAINT `fk_entity_appl_1` FOREIGN KEY (`entity_id`) REFERENCES `entity` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `entity_ctx`
--
ALTER TABLE `entity_ctx`
  ADD CONSTRAINT `fk_entity_ctx_1` FOREIGN KEY (`entity_id`) REFERENCES `entity` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `entity_mtyp`
--
ALTER TABLE `entity_mtyp`
  ADD CONSTRAINT `fk_entity_mtyp_1` FOREIGN KEY (`entity_id`) REFERENCES `entity` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `entity_task`
--
ALTER TABLE `entity_task`
  ADD CONSTRAINT `fk_entity_task_1` FOREIGN KEY (`entity_id`) REFERENCES `entity` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `entity_wfc`
--
ALTER TABLE `entity_wfc`
  ADD CONSTRAINT `fk_entity_wfc_1` FOREIGN KEY (`entity_id`) REFERENCES `entity` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `role_acode`
--
ALTER TABLE `role_acode`
  ADD CONSTRAINT `fk_role_acode_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_role_acode_2` FOREIGN KEY (`acode_id`) REFERENCES `acode` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `role_role`
--
ALTER TABLE `role_role`
  ADD CONSTRAINT `fk_role_role_1` FOREIGN KEY (`role_1_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_role_role_2` FOREIGN KEY (`role_2_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_acode`
--
ALTER TABLE `user_acode`
  ADD CONSTRAINT `fk_user_acode_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_acode_2` FOREIGN KEY (`acode_id`) REFERENCES `acode` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `fk_user_role_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_role_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_team`
--
ALTER TABLE `user_team`
  ADD CONSTRAINT `fk_user_team_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_team_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
