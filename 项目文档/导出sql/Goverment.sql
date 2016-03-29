/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50710
Source Host           : localhost:3306
Source Database       : database

Target Server Type    : MYSQL
Target Server Version : 50710
File Encoding         : 65001

Date: 2016-03-22 18:07:34
*/

SET FOREIGN_KEY_CHECKS=0;

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
