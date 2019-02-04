-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017-07-18 22:37:41
-- 服务器版本： 5.5.55-log
-- PHP Version: 5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wwwshqcom`
--

-- --------------------------------------------------------

--
-- 表的结构 `authorize`
--

CREATE TABLE IF NOT EXISTS `authorize` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(255) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `qq` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `syskey` varchar(255) NOT NULL,
  `version` varchar(255) NOT NULL,
  `ip_qh` int(1) NOT NULL,
  `yumi` int(1) NOT NULL,
  `ycp` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `authorize`
--

INSERT INTO `authorize` (`id`, `username`, `domain`, `ip`, `qq`, `tel`, `time`, `syskey`, `version`, `ip_qh`, `yumi`, `ycp`) VALUES
(24, '测试', '5.meil.vip', '192.168.234.133', '403700890', '0769-33232320', '1501257600', 'a19eff7d89607c3f', '1.2', 0, 1, '美仑企业建站'),
(92, '', 'www.weby.cc', '127.0.0.1', '403700890', '', '1531628584', '', '', 0, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `cami`
--

CREATE TABLE IF NOT EXISTS `cami` (
  `id` int(10) unsigned NOT NULL,
  `km` text NOT NULL,
  `time` varchar(255) NOT NULL,
  `ytime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `camilog`
--

CREATE TABLE IF NOT EXISTS `camilog` (
  `id` int(10) unsigned NOT NULL,
  `domain` varchar(255) NOT NULL,
  `km` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `ytime` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `camilog`
--

INSERT INTO `camilog` (`id`, `domain`, `km`, `time`, `status`, `ytime`) VALUES
(1, 'www.weby.cc', 'UxlYGn3MvCcu', '1500092584', '5bey5L2/55So', '1');

-- --------------------------------------------------------

--
-- 表的结构 `daoban`
--

CREATE TABLE IF NOT EXISTS `daoban` (
  `id` int(10) unsigned NOT NULL,
  `domain` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `beizhu` text NOT NULL COMMENT '备注'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `daoban`
--

INSERT INTO `daoban` (`id`, `domain`, `time`, `beizhu`) VALUES
(1, 'www.shq.com', '1499772743', ''),
(2, 'http://5.meil.vipkey=1', '1500088709', ''),
(3, 'http://5.meil.vipkey=a19eff7d89607c3f', '1500088743', ''),
(4, '5.meil.vipkey=a19eff7d89607c3f', '1500088779', '');

-- --------------------------------------------------------

--
-- 表的结构 `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(10) unsigned NOT NULL,
  `domain` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `version` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `log`
--

INSERT INTO `log` (`id`, `domain`, `time`, `version`, `status`) VALUES
(1, 'http://5.meil.vipkey=1', '1500088709', '1.1', '5pyq5o6I5p2D55So5oi3'),
(2, 'http://5.meil.vipkey=a19eff7d89607c3f', '1500088743', '1.1', '5pyq5o6I5p2D55So5oi3'),
(3, '5.meil.vipkey=a19eff7d89607c3f', '1500088772', '1.1', '5pyq5o6I5p2D55So5oi3'),
(4, '5.meil.vipkey=a19eff7d89607c3f', '1500088779', '1.1', '5pyq5o6I5p2D55So5oi3'),
(5, '5.meil.vip', '1500088819', '1.1', '5aSx6LSlOuaOiOadg0lQ6ZSZ6K+vMTkyLjE2OC4yMzQuMTMz'),
(6, '5.meil.vip', '1500088846', '1.1', '5oiQ5Yqf'),
(7, '5.meil.vip', '1500088858', '1.1', '5oiQ5Yqf'),
(8, '5.meil.vip', '1500088908', '1.1', '5oiQ5Yqf'),
(9, '5.meil.vip', '1500088931', '1.1', '5oiQ5Yqf'),
(10, '5.meil.vip', '1500088955', '1.1', '5oiQ5Yqf'),
(11, '5.meil.vip', '1500088955', '1.2', '5aSx6LSlOuW3sue7j+aYr+acgOaWsOeJiA=='),
(12, '5.meil.vip', '1500088955', '1.2', '5aSx6LSlOuW3sue7j+aYr+acgOaWsOeJiA=='),
(13, '5.meil.vip', '1500217948', '1.1', '5oiQ5Yqf'),
(14, '5.meil.vip', '1500217949', '1.2', '5aSx6LSlOuW3sue7j+aYr+acgOaWsOeJiA=='),
(15, '5.meil.vip', '1500217949', '1.2', '5aSx6LSlOuW3sue7j+aYr+acgOaWsOeJiA=='),
(16, '5.meil.vip', '1500218055', '1.1', '5oiQ5Yqf'),
(17, '5.meil.vip', '1500218070', '1.1', '5oiQ5Yqf'),
(18, '5.meil.vip', '1500218071', '1.2', '5aSx6LSlOuW3sue7j+aYr+acgOaWsOeJiA=='),
(19, '5.meil.vip', '1500218071', '1.2', '5aSx6LSlOuW3sue7j+aYr+acgOaWsOeJiA=='),
(20, '5.meil.vip', '1500218287', '1.1', '5oiQ5Yqf'),
(21, '5.meil.vip', '1500218308', '1.1', '5aSx6LSlOuaOiOadg+aXtumXtOWIsOacnw=='),
(22, '5.meil.vip', '1500218345', '1.1', '5oiQ5Yqf'),
(23, '5.meil.vip', '1500218345', '1.2', '5aSx6LSlOuW3sue7j+aYr+acgOaWsOeJiA=='),
(24, '5.meil.vip', '1500218345', '1.2', '5aSx6LSlOuW3sue7j+aYr+acgOaWsOeJiA==');

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(10) unsigned NOT NULL,
  `message_1` varchar(255) NOT NULL,
  `message_2` varchar(255) NOT NULL,
  `message_3` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`id`, `message_1`, `message_2`, `message_3`) VALUES
(1, '未授权域名，授权请QQ：403700890', '授权已经到期', '授权IP不正确');

-- --------------------------------------------------------

--
-- 表的结构 `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL,
  `cp` varchar(255) NOT NULL,
  `ms` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `products`
--

INSERT INTO `products` (`id`, `cp`, `ms`, `time`) VALUES
(7, '美仑企业建站', '企业用户网站授权', '1499796002'),
(11, '测试2', '测试2', '1499796002');

-- --------------------------------------------------------

--
-- 表的结构 `selfhelp`
--

CREATE TABLE IF NOT EXISTS `selfhelp` (
  `id` int(10) unsigned NOT NULL,
  `prompt` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `qq` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `selfhelp`
--

INSERT INTO `selfhelp` (`id`, `prompt`, `website`, `qq`) VALUES
(1, '卡密购买！如果库存不足！请联系Mr.pan授权QQ：403700890', 'http://www.meil88.com/', '403700890');

-- --------------------------------------------------------

--
-- 表的结构 `site`
--

CREATE TABLE IF NOT EXISTS `site` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `yxtime` varchar(255) NOT NULL,
  `copyright` varchar(255) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `route` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `site`
--

INSERT INTO `site` (`id`, `title`, `yxtime`, `copyright`, `site_name`, `route`) VALUES
(1, 'PHP授权系统 定制版', '2017-01-01', 'PHP授权系统 定制版 by Giovanne Oliveira Meil88.com.', 'admin.php', '/data/assets/');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `money` float NOT NULL DEFAULT '0',
  `lotime` int(10) unsigned NOT NULL,
  `login` int(10) unsigned NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `money`, `lotime`, `login`) VALUES
(1, 'admin', '7fef6171469e80d32c0559f88b377245', 'admin@admin.com', 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `version`
--

CREATE TABLE IF NOT EXISTS `version` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `datae` text NOT NULL,
  `pr` mediumtext NOT NULL,
  `pm` mediumtext NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `version`
--

INSERT INTO `version` (`id`, `name`, `content`, `file`, `datae`, `pr`, `pm`) VALUES
(1, '1.1', 'VjIuMTAuMeeJiOacrA0KDQoxLuaWsOWinuW6lOeUqOaOiOadg+euoeeQhg0KDQo=', '0.3.zip', '', 'LzAuMy91cGRhdGUucGhwPGJyPi8wLjMveXoucGhw', 'LzAuMy8='),
(20, '1.2', 'MTIzNDU2', '0.4.zip', 'aW1zX2FjY291bnQ8YnI+aW1zX2FjY291bnRfd2VjaGF0czxicj5pbXNfYWNjb3VudF93eGFwcA==', 'LzAuMy91cGRhdGUucGhwPGJyPi8wLjMveXoucGhw', 'LzAuMy8=');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authorize`
--
ALTER TABLE `authorize`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `domain` (`domain`);

--
-- Indexes for table `cami`
--
ALTER TABLE `cami`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `camilog`
--
ALTER TABLE `camilog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daoban`
--
ALTER TABLE `daoban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD UNIQUE KEY `ID` (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selfhelp`
--
ALTER TABLE `selfhelp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `version`
--
ALTER TABLE `version`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authorize`
--
ALTER TABLE `authorize`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `cami`
--
ALTER TABLE `cami`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `camilog`
--
ALTER TABLE `camilog`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `daoban`
--
ALTER TABLE `daoban`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `selfhelp`
--
ALTER TABLE `selfhelp`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `version`
--
ALTER TABLE `version`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
