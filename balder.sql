/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50545
Source Host           : 127.0.0.1:3306
Source Database       : balder

Target Server Type    : MYSQL
Target Server Version : 50545
File Encoding         : 65001

Date: 2017-06-11 14:52:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `logged_actions`
-- ----------------------------
DROP TABLE IF EXISTS `logged_actions`;
CREATE TABLE `logged_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(50) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of logged_actions
-- ----------------------------
INSERT INTO `logged_actions` VALUES ('1', 'Entered the site.. he!', '127.0.0.1', '2017-06-11 14:49:46');
INSERT INTO `logged_actions` VALUES ('2', 'Fetched unicorn information, unicorn id: 1', '127.0.0.1', '2017-06-11 14:49:47');
INSERT INTO `logged_actions` VALUES ('3', 'Fetched unicorn information, unicorn id: 6', '127.0.0.1', '2017-06-11 14:49:54');
INSERT INTO `logged_actions` VALUES ('4', 'Fetched unicorn information, unicorn id: 4', '127.0.0.1', '2017-06-11 14:50:31');
INSERT INTO `logged_actions` VALUES ('5', 'Entered the site.. he!', '127.0.0.1', '2017-06-11 14:50:41');
