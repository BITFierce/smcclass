/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50710
Source Host           : localhost:3306
Source Database       : database

Target Server Type    : MYSQL
Target Server Version : 50710
File Encoding         : 65001

Date: 2016-04-01 15:40:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `company`
-- ----------------------------
DROP TABLE IF EXISTS `company`;
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
  `spare2` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`CompanyNumber`),
  KEY `FK_CompanyName` (`CompanyUserName`),
  CONSTRAINT `FK_CompanyName` FOREIGN KEY (`CompanyUserName`) REFERENCES `user` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of company
-- ----------------------------
