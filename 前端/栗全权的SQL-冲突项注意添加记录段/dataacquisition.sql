-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 04 月 01 日 10:17
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
  `CollectionTime` varchar(12) NOT NULL,
  `SurveyPeriodID` int(11) NOT NULL,
  PRIMARY KEY (`InstitutionNumber`,`SurveyPeriodID`),
  KEY `FK_Company2` (`SurveyPeriodID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dataacquisition`
--

INSERT INTO `dataacquisition` (`InstitutionNumber`, `FilingPeriodEmploymentNumber`, `SurveyPeriodEmploymentNumber`, `OtherReason`, `EmploymentNumberReleaseType`, `FirstReason`, `SecondReason`, `ThirdReason`, `CityCheck`, `ProvinceCheck`, `CollectionTime`, `SurveyPeriodID`) VALUES
('JN0130001', 15, 13, '节能减排', '停业整顿', '节能减排环境污染问题，产量下降，盈利降低', '产业结构调整', '产业结构调整', '0', '0', '16-04-01', 4),
('QD0530001', 150, 125, '订单不足', '经济性裁员', '订单不足效益降低，不得不裁员', '产业结构调整', '产业结构调整', '0', '0', '16-04-01', 4),
('QD0530001', 130, 180, '产业结构调整', '关闭破产', '产业结构调整', '产业结构调整', '产业结构调整', '0', '0', '16-04-01', 6),
('RZ0310001', 150, 130, '自然减员', '自然减员', '自行离职员工辞职', '产业结构调整', '产业结构调整', '0', '0', '16-04-01', 4),
('RZ0310001', 150, 180, '产业结构调整', '关闭破产', '产业结构调整', '产业结构调整', '产业结构调整', '0', '0', '16-04-01', 9);

--
-- 限制导出的表
--

--
-- 限制表 `dataacquisition`
--
ALTER TABLE `dataacquisition`
  ADD CONSTRAINT `FK_Company` FOREIGN KEY (`InstitutionNumber`) REFERENCES `company` (`CompanyNumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Company2` FOREIGN KEY (`SurveyPeriodID`) REFERENCES `surveyperiod` (`SurveyID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
