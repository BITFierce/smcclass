-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 03 月 31 日 20:32
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
-- 表的结构 `citygoverment`
--

CREATE TABLE IF NOT EXISTS `citygoverment` (
  `CityGovermentNumber` varchar(20) NOT NULL,
  `CityGovermentName` varchar(20) NOT NULL,
  `CityGovermentUsername` varchar(20) NOT NULL,
  `spare1` varchar(20) DEFAULT NULL,
  `spare2` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`CityGovermentNumber`),
  KEY `FK_CityGoverment` (`CityGovermentUsername`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `spare1` varchar(20) NOT NULL,
  `spare2` varchar(20) NOT NULL,
  PRIMARY KEY (`CompanyNumber`),
  KEY `PK_User` (`CompanyUsername`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `company`
--

INSERT INTO `company` (`CompanyName`, `CompanyNumber`, `CompanyUsername`, `CompanyAddr`, `CompanyProperty`, `CompanyIndustry`, `CompanyBusiness`, `CompanyContact`, `CompanyContactAddr`, `CompanyPostcode`, `CompanyPhone`, `CompanyFax`, `CompanyMail`, `spare1`, `spare2`) VALUES
('济南玻璃厂', 'JN0130001', 'test01', '济南市市中区东区', '国有企业', '农，林，牧，鱼业', '生成、销售玻璃', '汤正杰', '济南市市中区东区企业园001', '100000', '18810929690', '0531-8888888', 'jnblc@163.com', '', ''),
('山东蓝翔高级技工学校', 'JN0520001', 'test04', '济南市天桥区东区', '私营企业', '采矿业', '教授挖掘机课程', '张天利', '山东济南天桥区蓝翔中路11号', '100000', '18888888888', '0531-8888888', 'lxwjj@126.com', '', ''),
('青岛啤酒', 'QD0530001', 'test03', '青岛市市北区北区', '私营企业', '制造业', '生产、销售啤酒', '肖梦臻', '青岛市市北区北区工业园003', '110000', '18810920000', '0532-8888888', 'qdpj@qq.com', '', ''),
('日照苹果基地', 'RZ0310001', 'test02', '日照市东港区东区', '联营企业', '农，林，牧，鱼业', '种植、销售苹果', '沈艺浩', '日照市东港区东区种植园', '120000', '18888888888', '0633-8888888', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `dataacquisition`
--

CREATE TABLE IF NOT EXISTS `dataacquisition` (
  `InstitutionNumber` varchar(20) NOT NULL,
  `FilingPeriodEmploymentNumber` int(11) NOT NULL,
  `SurveyPeriodEmploymentNumber` int(11) NOT NULL,
  `OtherReason` varchar(200) DEFAULT NULL,
  `EmploymentNumberReleaseType` varchar(20) DEFAULT NULL,
  `FirstReason` varchar(200) DEFAULT NULL,
  `SecondReason` varchar(200) DEFAULT NULL,
  `ThirdReason` varchar(200) DEFAULT NULL,
  `CityCheck` varchar(20) NOT NULL,
  `ProvinceCheck` varchar(20) NOT NULL,
  `CollectionTime` date NOT NULL,
  `spare1` varchar(20) DEFAULT NULL,
  `spare2` varchar(20) DEFAULT NULL,
  `SurveyPeriodID` int(11) NOT NULL,
  PRIMARY KEY (`InstitutionNumber`,`CollectionTime`),
  KEY `FK_Company2` (`SurveyPeriodID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- 表的结构 `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `Author` varchar(20) NOT NULL,
  `Time` date NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Text` varchar(2000) DEFAULT NULL,
  `spare1` varchar(20) DEFAULT NULL,
  `spare2` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Author`,`Time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `surveyperiod`
--

CREATE TABLE IF NOT EXISTS `surveyperiod` (
  `Publisher` varchar(20) NOT NULL,
  `SurveyID` int(11) NOT NULL AUTO_INCREMENT,
  `SurveyStartTime` date NOT NULL,
  `SurveyEndTime` date NOT NULL,
  PRIMARY KEY (`SurveyID`,`Publisher`),
  KEY `FK_SurveyPeriod` (`Publisher`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UserName` varchar(20) NOT NULL,
  `UserPassword` varchar(20) DEFAULT NULL,
  `UserType` varchar(5) NOT NULL,
  PRIMARY KEY (`UserName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`UserName`, `UserPassword`, `UserType`) VALUES
('admin', 'admin', '1'),
('admin2', 'admin2', '1'),
('shiji01', 'shiji01', '3'),
('test01', 'test01', '2'),
('test02', 'test02', '2'),
('test03', 'test03', '2'),
('test04', 'test04', '2');

--
-- 限制导出的表
--

--
-- 限制表 `citygoverment`
--
ALTER TABLE `citygoverment`
  ADD CONSTRAINT `FK_CityGoverment` FOREIGN KEY (`CityGovermentUsername`) REFERENCES `user` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `PK_User` FOREIGN KEY (`CompanyUsername`) REFERENCES `user` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `dataacquisition`
--
ALTER TABLE `dataacquisition`
  ADD CONSTRAINT `FK_Company` FOREIGN KEY (`InstitutionNumber`) REFERENCES `company` (`CompanyNumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Company2` FOREIGN KEY (`SurveyPeriodID`) REFERENCES `surveyperiod` (`SurveyID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `goverment`
--
ALTER TABLE `goverment`
  ADD CONSTRAINT `FK_goverment` FOREIGN KEY (`GovermentUsername`) REFERENCES `user` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `notice`
--
ALTER TABLE `notice`
  ADD CONSTRAINT `FK_Government` FOREIGN KEY (`Author`) REFERENCES `goverment` (`GovermentNumber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `surveyperiod`
--
ALTER TABLE `surveyperiod`
  ADD CONSTRAINT `FK_SurveyPeriod` FOREIGN KEY (`Publisher`) REFERENCES `goverment` (`GovermentName`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
