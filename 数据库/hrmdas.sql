-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-04-04 03:06:14
-- 服务器版本： 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrmdas`
--

DELIMITER $$
--
-- 存储过程
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `CreCityGovUser` (IN `UserName` VARCHAR(20), IN `UserPassword` VARCHAR(20), IN `UserType` VARCHAR(20), IN `CityGovermentNumber` VARCHAR(20), IN `CityGovermentName` VARCHAR(20))  SQL SECURITY INVOKER
BEGIN
    INSERT INTO `user`(UserName,UserPassword,UserType) 
               VALUES(UserName,UserPassword,UserType);
    INSERT INTO `citygoverment`(CityGovermentNumber,CityGovermentName,CityGovermentUsername) 
               VALUES(CityGovermentNumber,CityGovermentName,UserName);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CreComUser` (IN `UserName` VARCHAR(20), IN `UserPassword` VARCHAR(20), IN `UserType` VARCHAR(20), IN `CompanyNumber` VARCHAR(20), IN `CompanyName` VARCHAR(20), IN `CompanyAddr` VARCHAR(20), IN `CompanyProperty` VARCHAR(20), IN `CompanyIndustry` VARCHAR(20), IN `CompanyBusiness` VARCHAR(20), IN `CompanyContact` VARCHAR(20), IN `CompanyContactAddr` VARCHAR(20), IN `CompanyPostcode` INT, IN `CompanyPhone` VARCHAR(20), IN `CompanyFax` VARCHAR(20), IN `CompanyMail` VARCHAR(20))  SQL SECURITY INVOKER
BEGIN
    INSERT INTO `user`(UserName,UserPassword,UserType) 
              VALUES(UserName,UserPassword,UserType);
    INSERT INTO `company`(CompanyName,CompanyNumber,CompanyUserName,CompanyAddr,
                        CompanyProperty,CompanyIndustry,CompanyBusiness,CompanyContact,
                        CompanyContactAddr,CompanyPostcode,CompanyPhone,CompanyFax,CompanyMail)
                 VALUES(CompanyName,CompanyNumber,UserName,CompanyAddr,
                        CompanyProperty,CompanyIndustry,CompanyBusiness,CompanyContact,
                        CompanyContactAddr,CompanyPostcode,CompanyPhone,CompanyFax,CompanyMail);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CreGovUser` (IN `UserName` VARCHAR(20), IN `UserPassword` VARCHAR(20), IN `UserType` VARCHAR(20), IN `GovermentNumber` VARCHAR(20), IN `GovermentName` VARCHAR(20))  SQL SECURITY INVOKER
BEGIN
    INSERT INTO `user`(UserName,UserPassword,UserType) 
              VALUES(UserName,UserPassword,UserType);
    INSERT INTO `goverment`(GovermentNumber,GovermentName,GovermentUsername) 
                   VALUES(GovermentNumber,GovermentName,UserName);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `citygoverment`
--

CREATE TABLE `citygoverment` (
  `CityGovermentNumber` varchar(20) NOT NULL,
  `CityGovermentName` varchar(20) NOT NULL,
  `CityGovermentUsername` varchar(20) NOT NULL,
  `spare1` varchar(20) DEFAULT NULL,
  `spare2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `company`
--

CREATE TABLE `company` (
  `CompanyName` varchar(20) NOT NULL,
  `CompanyNumber` varchar(20) NOT NULL,
  `CompanyUserName` varchar(20) NOT NULL,
  `CompanyAddr` varchar(20) NOT NULL,
  `CompanyProperty` varchar(5) NOT NULL,
  `CompanyIndustry` varchar(20) NOT NULL,
  `CompanyBusiness` varchar(20) DEFAULT NULL,
  `CompanyContact` varchar(20) NOT NULL,
  `CompanyContactAddr` varchar(20) NOT NULL,
  `CompanyPostcode` int(6) NOT NULL,
  `CompanyPhone` varchar(20) NOT NULL,
  `CompanyFax` varchar(20) NOT NULL,
  `CompanyMail` varchar(20) NOT NULL,
  `spare1` varchar(20) DEFAULT NULL,
  `spare2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `company`
--

INSERT INTO `company` (`CompanyName`, `CompanyNumber`, `CompanyUserName`, `CompanyAddr`, `CompanyProperty`, `CompanyIndustry`, `CompanyBusiness`, `CompanyContact`, `CompanyContactAddr`, `CompanyPostcode`, `CompanyPhone`, `CompanyFax`, `CompanyMail`, `spare1`, `spare2`) VALUES
('青岛燕京', 'QD0112194', 'test', '青岛市黄岛区南区', '国有企业', '农，林，牧，鱼业', '啤酒', '栗全权', '文化路60号', 100861, '010-88888888', '010-88888888', '', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `dataacquisition`
--

CREATE TABLE `dataacquisition` (
  `InstitutionNumber` varchar(20) NOT NULL,
  `FilingPeriodEmploymentNumber` int(11) NOT NULL,
  `SurveyPeriodEmploymentNumber` int(11) NOT NULL,
  `OtherReason` varchar(200) DEFAULT NULL,
  `EmploymentNumberReleaseType` varchar(20) DEFAULT NULL,
  `FirstReason` varchar(200) DEFAULT NULL,
  `SecondReason` varchar(200) DEFAULT NULL,
  `ThirdReason` varchar(200) DEFAULT NULL,
  `CheckLevel` int(11) NOT NULL COMMENT '0为 未提交 1 为提交 市未审核 2为 市审核通过 省未审核 3为省审核通过',
  `CollectionTime` date NOT NULL,
  `SurveyPeriodID` int(11) NOT NULL,
  `spare2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `goverment`
--

CREATE TABLE `goverment` (
  `GovermentNumber` varchar(20) NOT NULL,
  `GovermentName` varchar(20) NOT NULL,
  `GovermentUsername` varchar(20) NOT NULL,
  `spare1` varchar(20) DEFAULT NULL,
  `spare2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `notice`
--

CREATE TABLE `notice` (
  `NoticeID` int(11) NOT NULL,
  `Author` varchar(20) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Title` varchar(50) NOT NULL,
  `Text` varchar(2000) DEFAULT NULL,
  `spare1` varchar(20) DEFAULT NULL,
  `spare2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `notice`
--

INSERT INTO `notice` (`NoticeID`, `Author`, `Type`, `Time`, `Title`, `Text`, `spare1`, `spare2`) VALUES
(8, 'admin（省用户）', '1', '2016-04-04 09:05:47', '21312', '321312', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `surveyperiod`
--

CREATE TABLE `surveyperiod` (
  `SurveyID` int(11) NOT NULL,
  `Publisher` varchar(20) NOT NULL,
  `SurveyStartTime` date NOT NULL,
  `SurveyEndTime` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `UserID` int(20) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `UserPassword` varchar(20) NOT NULL,
  `UserType` varchar(20) NOT NULL,
  `spare1` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`UserID`, `UserName`, `UserPassword`, `UserType`, `spare1`) VALUES
(5, 'test', '1', '2', NULL),
(6, 'city', '1', '3', NULL),
(9, 'admin', '1', '1', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `citygoverment`
--
ALTER TABLE `citygoverment`
  ADD PRIMARY KEY (`CityGovermentNumber`),
  ADD KEY `FK_CityGoverment` (`CityGovermentUsername`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`CompanyNumber`),
  ADD KEY `FK_CompanyName` (`CompanyUserName`);

--
-- Indexes for table `dataacquisition`
--
ALTER TABLE `dataacquisition`
  ADD PRIMARY KEY (`InstitutionNumber`,`CollectionTime`),
  ADD KEY `FK_Survey` (`SurveyPeriodID`);

--
-- Indexes for table `goverment`
--
ALTER TABLE `goverment`
  ADD PRIMARY KEY (`GovermentNumber`),
  ADD UNIQUE KEY `GovermentName` (`GovermentName`),
  ADD KEY `FK_Governmwnt` (`GovermentUsername`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`NoticeID`),
  ADD KEY `FK_Notice` (`Author`);

--
-- Indexes for table `surveyperiod`
--
ALTER TABLE `surveyperiod`
  ADD PRIMARY KEY (`SurveyID`),
  ADD KEY `FK_GovermentName` (`Publisher`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `UserName` (`UserName`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `notice`
--
ALTER TABLE `notice`
  MODIFY `NoticeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `surveyperiod`
--
ALTER TABLE `surveyperiod`
  MODIFY `SurveyID` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
  ADD CONSTRAINT `FK_CompanyName` FOREIGN KEY (`CompanyUserName`) REFERENCES `user` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `dataacquisition`
--
ALTER TABLE `dataacquisition`
  ADD CONSTRAINT `FK_Company` FOREIGN KEY (`InstitutionNumber`) REFERENCES `company` (`CompanyNumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Survey` FOREIGN KEY (`SurveyPeriodID`) REFERENCES `surveyperiod` (`SurveyID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `goverment`
--
ALTER TABLE `goverment`
  ADD CONSTRAINT `FK_Governmwnt` FOREIGN KEY (`GovermentUsername`) REFERENCES `user` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `surveyperiod`
--
ALTER TABLE `surveyperiod`
  ADD CONSTRAINT `FK_GovermentName` FOREIGN KEY (`Publisher`) REFERENCES `goverment` (`GovermentName`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
