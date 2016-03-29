/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50710
Source Host           : localhost:3306
Source Database       : database

Target Server Type    : MYSQL
Target Server Version : 50710
File Encoding         : 65001

Date: 2016-03-27 16:17:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `citygoverment`
-- ----------------------------
DROP TABLE IF EXISTS `citygoverment`;
CREATE TABLE `citygoverment` (
  `CityGovermentNumber` int NOT NULL,
  `CityGovermentName` varchar(20) NOT NULL,
  `CityGovermentUsername` varchar(20) NOT NULL,
  `spare1` varchar(20) DEFAULT NULL,
  `spare2` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`CityGovermentNumber`),
  CONSTRAINT `FK_CityGoverment` FOREIGN KEY (`CityGovermentNumber`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of citygoverment
-- ----------------------------
