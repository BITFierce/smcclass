/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50710
Source Host           : localhost:3306
Source Database       : database

Target Server Type    : MYSQL
Target Server Version : 50710
File Encoding         : 65001

Date: 2016-04-01 10:16:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `notice`
-- ----------------------------
DROP TABLE IF EXISTS `notice`;
CREATE TABLE `notice` (
  `NoticeID` int(11) NOT NULL,
  `Author` varchar(20) NOT NULL,
  `Time` date NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Text` varchar(2000) DEFAULT NULL,
  `spare1` varchar(20) DEFAULT NULL,
  `spare2` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`NoticeID`),
  KEY `FK_Notice` (`Author`),
  CONSTRAINT `FK_Notice` FOREIGN KEY (`Author`) REFERENCES `goverment` (`GovermentNumber`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of notice
-- ----------------------------
