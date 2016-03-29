/*
Navicat MySQL Data Transfer

Source Server         : ankyo
Source Server Version : 50710
Source Host           : localhost:3306
Source Database       : humanresource

Target Server Type    : MYSQL
Target Server Version : 50710
File Encoding         : 65001

Date: 2016-03-29 18:58:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `surveyperiod`
-- ----------------------------
DROP TABLE IF EXISTS `surveyperiod`;
CREATE TABLE `surveyperiod` (
  `Publisher` varchar(20) NOT NULL,
  `SurveyID` int(11) NOT NULL AUTO_INCREMENT,
  `SurveyStartTime` date NOT NULL,
  `SurveyEndTime` date NOT NULL,
  PRIMARY KEY (`SurveyID`,`Publisher`),
  KEY `FK_SurveyPeriod` (`Publisher`),
  CONSTRAINT `FK_SurveyPeriod` FOREIGN KEY (`Publisher`) REFERENCES `goverment` (`GovermentName`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of surveyperiod
-- ----------------------------
