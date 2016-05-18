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
-- 表的结构 `surveyperiod`
--

CREATE TABLE IF NOT EXISTS `surveyperiod` (
  `Publisher` varchar(20) NOT NULL,
  `SurveyID` int(11) NOT NULL AUTO_INCREMENT,
  `SurveyTIME` varchar(20) NOT NULL,
  PRIMARY KEY (`SurveyID`,`Publisher`),
  KEY `FK_SurveyPeriod` (`Publisher`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `surveyperiod`
--

INSERT INTO `surveyperiod` (`Publisher`, `SurveyID`, `SurveyTIME`) VALUES
('山东省劳动局', 4, '201604'),
('山东省人力资源局', 6, '201506'),
('山东省劳动局', 9, '201607');

--
-- 限制导出的表
--

--
-- 限制表 `surveyperiod`
--
ALTER TABLE `surveyperiod`
  ADD CONSTRAINT `FK_SurveyPeriod` FOREIGN KEY (`Publisher`) REFERENCES `goverment` (`GovermentName`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
