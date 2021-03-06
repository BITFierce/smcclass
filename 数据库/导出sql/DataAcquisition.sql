﻿/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50710
Source Host           : localhost:3306
Source Database       : database

Target Server Type    : MYSQL
Target Server Version : 50710
File Encoding         : 65001

Date: 2016-04-01 16:35:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `dataacquisition`
-- ----------------------------
DROP TABLE IF EXISTS `dataacquisition`;
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
  `SurveyPeriodID` INT NOT NULL,
  `spare1` varchar(20) DEFAULT NULL,
  `spare2` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`InstitutionNumber`,`CollectionTime`),
  CONSTRAINT `FK_Company` FOREIGN KEY (`InstitutionNumber`) REFERENCES `company` (`CompanyNumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_SurveyPeriodID` FOREIGN KEY (`SurveyPeriodID`) REFERENCES `surveyperiod` (`SurveyID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dataacquisition
-- ----------------------------
