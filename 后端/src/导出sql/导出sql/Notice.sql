/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50710
Source Host           : localhost:3306
Source Database       : database

Target Server Type    : MYSQL
Target Server Version : 50710
File Encoding         : 65001

Date: 2016-03-22 18:07:39
*/

SET FOREIGN_KEY_CHECKS=0;

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
