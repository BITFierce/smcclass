/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50710
Source Host           : localhost:3306
Source Database       : database

Target Server Type    : MYSQL
Target Server Version : 50710
File Encoding         : 65001

Date: 2016-04-01 15:40:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `surveyperiod`
-- ----------------------------
DROP TABLE IF EXISTS `surveyperiod`;
CREATE TABLE `surveyperiod` (
  `SurveyID` int(11) NOT NULL AUTO_INCREMENT,
  `SurveyStartTime` date NOT NULL,
  `SurveyEndTime` date NOT NULL,
  PRIMARY KEY (`SurveyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of surveyperiod
-- ----------------------------
