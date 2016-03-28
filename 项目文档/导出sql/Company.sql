/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50710
Source Host           : localhost:3306
Source Database       : database

Target Server Type    : MYSQL
Target Server Version : 50710
File Encoding         : 65001

Date: 2016-03-22 18:06:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `company`
-- ----------------------------
DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `CompanyName` varchar(20) NOT NULL,
  `CompanyNumber` varchar(20) NOT NULL,
  `CompanyUsername` varchar(20) NOT NULL,
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
  PRIMARY KEY (`CompanyNumber`),
  KEY `PK_User` (`CompanyUsername`),
  CONSTRAINT `PK_User` FOREIGN KEY (`CompanyUsername`) REFERENCES `user` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of company
-- ----------------------------

-- ----------------------------
-- Table structure for `dataacquisition`
-- ----------------------------
DROP TABLE IF EXISTS `dataacquisition`;
CREATE TABLE `dataacquisition` (
  `InstitutionNumber` varchar(20) NOT NULL,
  `FilingPeriodEmploymentNumber` int(11) NOT NULL,
  `SurveyPeriodEmploymentNumber` int(11) NOT NULL,
  `OtherReason` varchar(20) DEFAULT NULL,
  `EmploymentNumberReleaseType` varchar(20) DEFAULT NULL,
  `FirstReason` varchar(50) DEFAULT NULL,
  `SecondReason` varchar(50) DEFAULT NULL,
  `ThirdReason` varchar(50) DEFAULT NULL,
  `CollectionTime` varchar(20) NOT NULL,
  PRIMARY KEY (`InstitutionNumber`,`CollectionTime`),
  CONSTRAINT `FK_Company` FOREIGN KEY (`InstitutionNumber`) REFERENCES `company` (`CompanyNumber`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dataacquisition
-- ----------------------------

-- ----------------------------
-- Table structure for `goverment`
-- ----------------------------
DROP TABLE IF EXISTS `goverment`;
CREATE TABLE `goverment` (
  `GovermentNumber` varchar(20) NOT NULL,
  `GovermentName` varchar(20) NOT NULL,
  `GovermentUsername` varchar(20) NOT NULL,
  PRIMARY KEY (`GovermentNumber`),
  KEY `FK_goverment` (`GovermentUsername`),
  CONSTRAINT `FK_goverment` FOREIGN KEY (`GovermentUsername`) REFERENCES `user` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goverment
-- ----------------------------

-- ----------------------------
-- Table structure for `notice`
-- ----------------------------
DROP TABLE IF EXISTS `notice`;
CREATE TABLE `notice` (
  `Author` varchar(20) NOT NULL,
  `Time` date NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Text` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`Author`,`Time`),
  CONSTRAINT `FK_Government` FOREIGN KEY (`Author`) REFERENCES `goverment` (`GovermentNumber`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of notice
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `UserName` varchar(20) NOT NULL,
  `UserPassword` varchar(20) DEFAULT NULL,
  `UserType` varchar(5) NOT NULL,
  PRIMARY KEY (`UserName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
