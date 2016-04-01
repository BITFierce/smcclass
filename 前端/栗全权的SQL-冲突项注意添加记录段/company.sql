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
-- 表的结构 `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `CompanyName` varchar(20) NOT NULL,
  `CompanyNumber` varchar(20) NOT NULL,
  `CompanyUsername` varchar(20) NOT NULL,
  `CompanyAddr` varchar(20) NOT NULL,
  `CompanyProperty` varchar(5) NOT NULL,
  `CompanyIndustry` varchar(20) NOT NULL,
  `CompanyBusiness` varchar(20) DEFAULT NULL,
  `CompanyContact` varchar(20) NOT NULL,
  `CompanyContactAddr` varchar(20) NOT NULL,
  `CompanyPostcode` varchar(6) NOT NULL,
  `CompanyPhone` varchar(20) NOT NULL,
  `CompanyFax` varchar(20) NOT NULL,
  `CompanyMail` varchar(20) NOT NULL,
  PRIMARY KEY (`CompanyNumber`),
  KEY `PK_User` (`CompanyUsername`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `company`
--

INSERT INTO `company` (`CompanyName`, `CompanyNumber`, `CompanyUsername`, `CompanyAddr`, `CompanyProperty`, `CompanyIndustry`, `CompanyBusiness`, `CompanyContact`, `CompanyContactAddr`, `CompanyPostcode`, `CompanyPhone`, `CompanyFax`, `CompanyMail`) VALUES
('济南玻璃厂', 'JN0130001', 'test01', '济南市市中区东区', '国有企业', '农，林，牧，鱼业', '生成、销售玻璃', '汤正杰', '济南市市中区东区企业园001', '100000', '18810929690', '0531-8888888', 'jnblc@163.com'),
('山东蓝翔高级技工学校', 'JN0520001', 'test04', '济南市天桥区东区', '私营企业', '采矿业', '教授挖掘机课程', '张天利', '山东济南天桥区蓝翔中路11号', '100000', '18888888888', '0531-8888888', 'lxwjj@126.com'),
('青岛啤酒', 'QD0530001', 'test03', '青岛市市北区北区', '私营企业', '制造业', '生产、销售啤酒', '肖梦臻', '青岛市市北区北区工业园003', '110000', '18810920000', '0532-8888888', 'qdpj@qq.com'),
('日照苹果基地', 'RZ0310001', 'test02', '日照市东港区东区', '联营企业', '农，林，牧，鱼业', '种植、销售苹果', '沈艺浩', '日照市东港区东区种植园', '120000', '18888888888', '0633-8888888', '');

--
-- 限制导出的表
--

--
-- 限制表 `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `PK_User` FOREIGN KEY (`CompanyUsername`) REFERENCES `user` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
