-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 04 月 01 日 09:57
-- 服务器版本: 5.7.10-log
-- PHP 版本: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `hrmdas`
--

-- --------------------------------------------------------

--
-- 表的结构 `goverment`
--

CREATE TABLE IF NOT EXISTS `goverment` (
  `GovermentNumber` varchar(20) NOT NULL,
  `GovermentName` varchar(20) NOT NULL,
  `GovermentUsername` varchar(20) NOT NULL,
  PRIMARY KEY (`GovermentNumber`),
  UNIQUE KEY `GovermentName` (`GovermentName`),
  KEY `FK_goverment` (`GovermentUsername`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `goverment`
--

INSERT INTO `goverment` (`GovermentNumber`, `GovermentName`, `GovermentUsername`) VALUES
('admin', '山东省劳动局', 'admin'),
('admin2', '山东省人力资源局', 'admin2');

--
-- 限制导出的表
--

--
-- 限制表 `goverment`
--
ALTER TABLE `goverment`
  ADD CONSTRAINT `FK_goverment` FOREIGN KEY (`GovermentUsername`) REFERENCES `user` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
