/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50710
Source Host           : localhost:3306
Source Database       : database

Target Server Type    : MYSQL
Target Server Version : 50710
File Encoding         : 65001

Date: 2016-03-29 16:56:24
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
  `CityCheck` varchar(20) NOT NULL,
  `ProvinceCheck` varchar(20) NOT NULL,
  `CollectionTime` date NOT NULL,
  `spare1` varchar(20) DEFAULT NULL,
  `spare2` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`InstitutionNumber`,`CollectionTime`),
  CONSTRAINT `FK_Company` FOREIGN KEY (`InstitutionNumber`) REFERENCES `company` (`CompanyNumber`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dataacquisition
-- ----------------------------
