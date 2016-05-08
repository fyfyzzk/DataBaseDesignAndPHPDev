/*
 Navicat MySQL Data Transfer

 Source Server         : SMTP
 Source Server Type    : MySQL
 Source Server Version : 50622
 Source Host           : localhost
 Source Database       : UserManager

 Target Server Type    : MySQL
 Target Server Version : 50622
 File Encoding         : utf-8

 Date: 10/28/2015 10:50:11 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `UserDetails`
-- ----------------------------
DROP TABLE IF EXISTS `UserDetails`;
CREATE TABLE `UserDetails` (
  `UserID` varchar(120) NOT NULL,
  `UserName` varchar(150) NOT NULL,
  `FirstName` varchar(150) DEFAULT NULL,
  `LastName` varchar(150) DEFAULT NULL,
  `Email` varchar(150) NOT NULL,
  `Password` varchar(1000) DEFAULT NULL,
  `MemberSince` varchar(255) DEFAULT NULL,
  `Active` int(11) DEFAULT NULL,
  PRIMARY KEY (`UserName`,`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `UserDetails`
-- ----------------------------
BEGIN;
INSERT INTO `UserDetails` VALUES ('4frvct', 'JohnSmith', 'John', 'Smith', 'js@gmail.com', '6f4e26455b0f9c987a0009f3c5bd12786300b90fa76fb5399c82f2e63ab7121aa', '1445987595', '1'), ('692g6q', 'PraviinM', 'Praviin', 'Mandhare', 'pravsm@gmail.com', '1e905117d466dc32016cb71e3cb798cea73a942f2221fcbda1b5dc8104c2565ee', '1445961643', '1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
