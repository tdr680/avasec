-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 19, 2013 at 08:29 PM
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
  `name` varchar(80) COLLATE latin1_general_cs NOT NULL,
  `charid` varchar(40) COLLATE latin1_general_cs DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `charid_UNIQUE` (`charid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=800386 ;

-- --------------------------------------------------------

--
-- Table structure for table `acode_entity`
--

DROP TABLE IF EXISTS `acode_entity`;
CREATE TABLE IF NOT EXISTS `acode_entity` (
  `acode_id` int(11) NOT NULL,
  `entity_id` bigint(32) NOT NULL,
  `entity_type` varchar(8) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`acode_id`,`entity_id`,`entity_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Table structure for table `entity`
--

DROP TABLE IF EXISTS `entity`;
CREATE TABLE IF NOT EXISTS `entity` (
  `id` bigint(32) NOT NULL,
  `type` varchar(8) COLLATE latin1_general_cs NOT NULL,
  `name` varchar(80) COLLATE latin1_general_cs NOT NULL,
  `charid` varchar(40) COLLATE latin1_general_cs DEFAULT NULL,
  PRIMARY KEY (`id`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Table structure for table `entity_appl`
--

DROP TABLE IF EXISTS `entity_appl`;
CREATE TABLE IF NOT EXISTS `entity_appl` (
  `entity_id` bigint(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Stand-in structure for view `entity_appl_v`
--
DROP VIEW IF EXISTS `entity_appl_v`;
CREATE TABLE IF NOT EXISTS `entity_appl_v` (
`id` bigint(32)
,`name` varchar(80)
,`charid` varchar(40)
);
-- --------------------------------------------------------

--
-- Table structure for table `entity_ctx`
--

DROP TABLE IF EXISTS `entity_ctx`;
CREATE TABLE IF NOT EXISTS `entity_ctx` (
  `entity_id` int(11) DEFAULT NULL,
  `parent_id` varchar(29) COLLATE latin1_general_cs DEFAULT NULL,
  `is_parent` varchar(30) COLLATE latin1_general_cs DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `global_order_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Stand-in structure for view `entity_ctx_v`
--
DROP VIEW IF EXISTS `entity_ctx_v`;
CREATE TABLE IF NOT EXISTS `entity_ctx_v` (
`id` bigint(32)
,`name` varchar(80)
,`charid` varchar(40)
,`parent_id` varchar(29)
,`is_parent` varchar(30)
,`group_id` int(11)
,`global_order_by` int(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `entity_mtyp`
--

DROP TABLE IF EXISTS `entity_mtyp`;
CREATE TABLE IF NOT EXISTS `entity_mtyp` (
  `entity_id` bigint(32) NOT NULL,
  `grp` varchar(8) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`entity_id`),
  KEY `grp` (`grp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Stand-in structure for view `entity_mtyp_v`
--
DROP VIEW IF EXISTS `entity_mtyp_v`;
CREATE TABLE IF NOT EXISTS `entity_mtyp_v` (
`id` bigint(32)
,`name` varchar(80)
,`charid` varchar(40)
,`grp` varchar(8)
);
-- --------------------------------------------------------

--
-- Table structure for table `entity_task`
--

DROP TABLE IF EXISTS `entity_task`;
CREATE TABLE IF NOT EXISTS `entity_task` (
  `entity_id` int(11) DEFAULT NULL,
  `type` varchar(28) COLLATE latin1_general_cs DEFAULT NULL,
  `meta_out_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Stand-in structure for view `entity_task_v`
--
DROP VIEW IF EXISTS `entity_task_v`;
CREATE TABLE IF NOT EXISTS `entity_task_v` (
`id` bigint(32)
,`name` varchar(80)
,`charid` varchar(40)
,`type` varchar(28)
,`meta_out_id` int(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `entity_wfc`
--

DROP TABLE IF EXISTS `entity_wfc`;
CREATE TABLE IF NOT EXISTS `entity_wfc` (
  `entity_id` bigint(22) unsigned NOT NULL DEFAULT '0',
  `meta_typ_id` int(11) DEFAULT NULL,
  `wfc_action_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`entity_id`),
  KEY `meta_typ_id` (`meta_typ_id`),
  KEY `wfc_action_id` (`wfc_action_id`),
  KEY `status_id` (`status_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Table structure for table `entity_wfc_status`
--

DROP TABLE IF EXISTS `entity_wfc_status`;
CREATE TABLE IF NOT EXISTS `entity_wfc_status` (
  `meta_typ_id` int(11) NOT NULL DEFAULT '0',
  `status_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(52) COLLATE latin1_general_cs DEFAULT NULL,
  `charid` varchar(36) COLLATE latin1_general_cs DEFAULT NULL,
  PRIMARY KEY (`meta_typ_id`,`status_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Stand-in structure for view `entity_wfc_v`
--
DROP VIEW IF EXISTS `entity_wfc_v`;
CREATE TABLE IF NOT EXISTS `entity_wfc_v` (
`id` bigint(32)
,`name` varchar(80)
,`charid` varchar(40)
,`meta_typ_id` int(11)
,`wfc_action_id` int(11)
,`status_id` int(11)
,`status_name` varchar(52)
,`status_charid` varchar(36)
);
-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) COLLATE latin1_general_cs NOT NULL,
  `charid` varchar(40) COLLATE latin1_general_cs DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key_UNIQUE` (`charid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=83038 ;

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

-- --------------------------------------------------------

--
-- Table structure for table `role_role`
--

DROP TABLE IF EXISTS `role_role`;
CREATE TABLE IF NOT EXISTS `role_role` (
  `role_1_id` int(11) NOT NULL,
  `role_2_id` int(11) NOT NULL,
  PRIMARY KEY (`role_1_id`,`role_2_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=17504121 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=83077 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_acode`
--

DROP TABLE IF EXISTS `user_acode`;
CREATE TABLE IF NOT EXISTS `user_acode` (
  `user_ver_id` int(11) NOT NULL,
  `acode_id` int(11) NOT NULL,
  PRIMARY KEY (`user_ver_id`,`acode_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_acode_v`
--
DROP VIEW IF EXISTS `user_acode_v`;
CREATE TABLE IF NOT EXISTS `user_acode_v` (
`acode_id` int(11)
,`user_ver_id` int(11)
,`user_id` int(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `user_ver_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_ver_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_role_v`
--
DROP VIEW IF EXISTS `user_role_v`;
CREATE TABLE IF NOT EXISTS `user_role_v` (
`role_id` int(11)
,`user_ver_id` int(11)
,`user_id` int(11)
);
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=3548 ;

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
-- Structure for view `entity_appl_v`
--
DROP TABLE IF EXISTS `entity_appl_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `entity_appl_v` AS select `e`.`id` AS `id`,`e`.`name` AS `name`,`e`.`charid` AS `charid` from (`entity` `e` join `entity_appl` `a` on((`e`.`id` = `a`.`entity_id`))) where (`e`.`type` = 'APPL');

-- --------------------------------------------------------

--
-- Structure for view `entity_ctx_v`
--
DROP TABLE IF EXISTS `entity_ctx_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `entity_ctx_v` AS select `e`.`id` AS `id`,`e`.`name` AS `name`,`e`.`charid` AS `charid`,`c`.`parent_id` AS `parent_id`,`c`.`is_parent` AS `is_parent`,`c`.`group_id` AS `group_id`,`c`.`global_order_by` AS `global_order_by` from (`entity` `e` join `entity_ctx` `c` on((`e`.`id` = `c`.`entity_id`))) where (`e`.`type` = 'CTX');

-- --------------------------------------------------------

--
-- Structure for view `entity_mtyp_v`
--
DROP TABLE IF EXISTS `entity_mtyp_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `entity_mtyp_v` AS select `e`.`id` AS `id`,`e`.`name` AS `name`,`e`.`charid` AS `charid`,`m`.`grp` AS `grp` from (`entity` `e` join `entity_mtyp` `m` on((`e`.`id` = `m`.`entity_id`))) where (`e`.`type` = 'MTYP');

-- --------------------------------------------------------

--
-- Structure for view `entity_task_v`
--
DROP TABLE IF EXISTS `entity_task_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `entity_task_v` AS select `e`.`id` AS `id`,`e`.`name` AS `name`,`e`.`charid` AS `charid`,`t`.`type` AS `type`,`t`.`meta_out_id` AS `meta_out_id` from (`entity` `e` join `entity_task` `t` on((`e`.`id` = `t`.`entity_id`))) where (`e`.`type` = 'TASK');

-- --------------------------------------------------------

--
-- Structure for view `entity_wfc_v`
--
DROP TABLE IF EXISTS `entity_wfc_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `entity_wfc_v` AS select `e`.`id` AS `id`,`e`.`name` AS `name`,`e`.`charid` AS `charid`,`w`.`meta_typ_id` AS `meta_typ_id`,`w`.`wfc_action_id` AS `wfc_action_id`,`w`.`status_id` AS `status_id`,`s`.`name` AS `status_name`,`s`.`charid` AS `status_charid` from ((`entity` `e` join `entity_wfc` `w` on((`e`.`id` = `w`.`entity_id`))) join `entity_wfc_status` `s` on(((`s`.`meta_typ_id` = `w`.`meta_typ_id`) and (`s`.`status_id` = `w`.`status_id`)))) where (`e`.`type` = 'WFC');

-- --------------------------------------------------------

--
-- Structure for view `user_acode_v`
--
DROP TABLE IF EXISTS `user_acode_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_acode_v` AS select `a`.`acode_id` AS `acode_id`,`a`.`user_ver_id` AS `user_ver_id`,`uv`.`user_id` AS `user_id` from (`user_acode` `a` join `user_ver_v` `uv` on((`a`.`user_ver_id` = `uv`.`user_ver_id`)));

-- --------------------------------------------------------

--
-- Structure for view `user_role_v`
--
DROP TABLE IF EXISTS `user_role_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_role_v` AS select `r`.`role_id` AS `role_id`,`r`.`user_ver_id` AS `user_ver_id`,`uv`.`user_id` AS `user_id` from (`user_role` `r` join `user_ver_v` `uv` on((`r`.`user_ver_id` = `uv`.`user_ver_id`)));

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
