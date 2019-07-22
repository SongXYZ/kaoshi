-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2018-04-22 09:12:39
-- 服务器版本： 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- 表的结构 `answer`
--

DROP TABLE IF EXISTS `answer`;
CREATE TABLE IF NOT EXISTS `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `snum` tinyint(3) DEFAULT NULL,
  `sscore` tinyint(3) DEFAULT NULL,
  `cnum` tinyint(3) DEFAULT NULL,
  `cscore` tinyint(3) DEFAULT NULL,
  `jnum` tinyint(3) DEFAULT NULL,
  `jscore` tinyint(3) DEFAULT NULL,
  `pnum` tinyint(3) DEFAULT NULL,
  `pscore` tinyint(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `answer`
--

INSERT INTO `answer` (`id`, `snum`, `sscore`, `cnum`, `cscore`, `jnum`, `jscore`, `pnum`, `pscore`) VALUES
(4, 4, 2, 4, 4, 4, 1, 1, 20);

-- --------------------------------------------------------

--
-- 表的结构 `iuser`
--

DROP TABLE IF EXISTS `iuser`;
CREATE TABLE IF NOT EXISTS `iuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iuser` varchar(10) DEFAULT NULL,
  `ipswd` varchar(32) DEFAULT NULL,
  `regtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `iuser`
--

INSERT INTO `iuser` (`id`, `iuser`, `ipswd`, `regtime`) VALUES
(5, '李四', '25f9e794323b453885f5181f1b624d0b', '2018-04-22 05:58:55');

-- --------------------------------------------------------

--
-- 表的结构 `ts_chioce`
--

DROP TABLE IF EXISTS `ts_chioce`;
CREATE TABLE IF NOT EXISTS `ts_chioce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_fct` varchar(100) DEFAULT NULL,
  `c_as` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `ts_chioce`
--

INSERT INTO `ts_chioce` (`id`, `c_fct`, `c_as`) VALUES
(66, '../data/15243734107.txt', 1),
(65, '../data/152437337085.txt', 4),
(64, '../data/152437333418.txt', 2),
(63, '../data/152437330619.txt', 4),
(62, '../data/152437327243.txt', 1),
(61, '../data/152437323559.txt', 2),
(60, '../data/15243732057.txt', 3),
(58, '../data/152437313630.txt', 1),
(57, '../data/152437252778.txt', 4);

-- --------------------------------------------------------

--
-- 表的结构 `ts_judge`
--

DROP TABLE IF EXISTS `ts_judge`;
CREATE TABLE IF NOT EXISTS `ts_judge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `j_fct` varchar(100) DEFAULT NULL,
  `j_as` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15011 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `ts_judge`
--

INSERT INTO `ts_judge` (`id`, `j_fct`, `j_as`) VALUES
(15005, '../data/1524372301100.txt', 1),
(15004, '../data/152437228765.txt', 1),
(15003, '../data/152437227460.txt', 1),
(15002, '../data/152437180665.txt', 0),
(15001, '../data/152437178791.txt', 1),
(15006, '../data/152437233623.txt', 0),
(15007, '../data/152437235331.txt', 0),
(15008, '../data/152437236828.txt', 1),
(15009, '../data/152437238592.txt', 1),
(15010, '../data/152437240024.txt', 1);

-- --------------------------------------------------------

--
-- 表的结构 `ts_mchioce`
--

DROP TABLE IF EXISTS `ts_mchioce`;
CREATE TABLE IF NOT EXISTS `ts_mchioce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mc_fct` varchar(100) DEFAULT NULL,
  `mc_as` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5015 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `ts_mchioce`
--

INSERT INTO `ts_mchioce` (`id`, `mc_fct`, `mc_as`) VALUES
(5013, '../data/152437423196.txt', 7),
(5012, '../data/152437419755.txt', 4),
(5010, '../data/152437412380.txt', 5),
(5009, '../data/152437408536.txt', 7),
(5008, '../data/152437405139.txt', 8),
(5007, '../data/152437401889.txt', 3),
(5006, '../data/152437398292.txt', 6),
(5005, '../data/152437375237.txt', 6),
(5014, '../data/152437426489.txt', 7);

-- --------------------------------------------------------

--
-- 表的结构 `ts_push`
--

DROP TABLE IF EXISTS `ts_push`;
CREATE TABLE IF NOT EXISTS `ts_push` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_fct` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10005 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `ts_push`
--

INSERT INTO `ts_push` (`id`, `p_fct`) VALUES
(10003, '../data/152438305795.txt'),
(10004, '../data/152438314957.txt');

-- --------------------------------------------------------

--
-- 表的结构 `t_answer`
--

DROP TABLE IF EXISTS `t_answer`;
CREATE TABLE IF NOT EXISTS `t_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `ta_fct` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `t_answer`
--

INSERT INTO `t_answer` (`id`, `userid`, `ta_fct`) VALUES
(30, 31, '../daandata/a_152438830518.txt'),
(29, 30, '../daandata/a_152438773438.txt'),
(28, 29, '../daandata/a_152438548369.txt'),
(27, 28, '../daandata/a_152438445621.txt'),
(26, 27, '../daandata/a_152438325365.txt'),
(25, 26, '../daandata/a_152437861525.txt'),
(24, 25, '../daandata/a_152437631449.txt'),
(23, 25, '../daandata/a_152437629019.txt');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) DEFAULT NULL,
  `pswd` varchar(32) DEFAULT NULL,
  `gender` varchar(5) DEFAULT NULL,
  `major` varchar(60) DEFAULT NULL,
  `education` varchar(15) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `score` tinyint(3) DEFAULT NULL,
  `sta` varchar(2) DEFAULT NULL,
  `regtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `pswd`, `gender`, `major`, `education`, `tel`, `score`, `sta`, `regtime`) VALUES
(31, 'wanger', '57ba172a6be125cca2f449826f9980ca', 'nan ', '滇系咯', '本科', '16325632541', NULL, NULL, '2018-04-22 09:11:05'),
(30, 'wangxioaer', '7fa8282ad93047a4d6fe6111c93b308a', 'nan', '电信', '本科', '11111111111', 33, '1', '2018-04-22 09:01:27'),
(29, '大狗2号', '6ebe76c9fb411be97b3b0d48b791a7c9', '男', '电子信息科学与技术', '本科', '15324562315', NULL, NULL, '2018-04-22 08:23:37'),
(28, '大狗', '6c31fc0f69bbf07cba275ff861d99123', '男', '电子信息科学与技术', '本科', '13523623512', 21, '1', '2018-04-22 08:06:49'),
(27, '张三', '25f9e794323b453885f5181f1b624d0b', '男', '滇系咯', '本科', '12345632145', 30, '1', '2018-04-22 07:46:51');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
