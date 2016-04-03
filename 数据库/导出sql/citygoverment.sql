/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50710
Source Host           : localhost:3306
Source Database       : database

Target Server Type    : MYSQL
Target Server Version : 50710
File Encoding         : 65001

Date: 2016-04-01 15:40:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `citygoverment`
-- ----------------------------
DROP TABLE IF EXISTS `citygoverment`;
CREATE TABLE `citygoverment` (
  `CityGovermentNumber` varchar(20) NOT NULL,
  `CityGovermentName` varchar(20) NOT NULL,
  `CityGovermentUsername` varchar(20) NOT NULL,
  `spare1` varchar(20) DEFAULT NULL,
  `spare2` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`CityGovermentNumber`),
  KEY `FK_CityGoverment` (`CityGovermentUsername`),
  CONSTRAINT `FK_CityGoverment` FOREIGN KEY (`CityGovermentUsername`) REFERENCES `user` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of citygoverment
-- ----------------------------
