/*
Navicat MySQL Data Transfer

Source Server         : songdian
Source Server Version : 50604
Source Host           : 140.207.213.38:3306
Source Database       : dxyh

Target Server Type    : MYSQL
Target Server Version : 50604
File Encoding         : 65001

Date: 2017-03-27 22:00:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `dxyh_activity`
-- ----------------------------
DROP TABLE IF EXISTS `dxyh_activity`;
CREATE TABLE `dxyh_activity` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `activity_type_id` int(11) unsigned NOT NULL COMMENT '活动分类id',
  `activity_name` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '活动名称',
  `activity_cover` varchar(255) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '活动图片',
  `activity_start_time` int(11) NOT NULL COMMENT '活动开始时间',
  `activity_end_time` int(11) NOT NULL COMMENT '活动结束时间',
  `enroll_start_time` int(11) NOT NULL COMMENT '报名开始时间',
  `enroll_end_time` int(11) NOT NULL COMMENT '报名结束时间',
  `activity_number` int(11) NOT NULL DEFAULT '0' COMMENT '活动人数：0-不限制人数，默认为 0',
  `activity_integral` int(11) NOT NULL DEFAULT '0' COMMENT '活动积分',
  `address` varchar(255) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '活动地址',
  `content` longtext COLLATE utf8mb4_bin NOT NULL COMMENT '活动内容',
  `referral` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否推荐：1-推荐，0-不推荐，默认不推荐',
  `whether_audit` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否审核：1-审核，0-不审核，默认不审核',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT='活动表';

-- ----------------------------
-- Records of dxyh_activity
-- ----------------------------

-- ----------------------------
-- Table structure for `dxyh_activity_type`
-- ----------------------------
DROP TABLE IF EXISTS `dxyh_activity_type`;
CREATE TABLE `dxyh_activity_type` (
  `id` int(11) unsigned NOT NULL,
  `type_name` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '分类名称',
  `sort` int(11) NOT NULL DEFAULT '1' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT='活动分类表';

-- ----------------------------
-- Records of dxyh_activity_type
-- ----------------------------

-- ----------------------------
-- Table structure for `dxyh_admin`
-- ----------------------------
DROP TABLE IF EXISTS `dxyh_admin`;
CREATE TABLE `dxyh_admin` (
  `aid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `aname` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '管理员名称',
  `passwd` varchar(200) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '管理员密码',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '账号状态：0-禁用，1-开启，2-删除',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT='管理员表';

-- ----------------------------
-- Records of dxyh_admin
-- ----------------------------

-- ----------------------------
-- Table structure for `dxyh_attend_activity`
-- ----------------------------
DROP TABLE IF EXISTS `dxyh_attend_activity`;
CREATE TABLE `dxyh_attend_activity` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL COMMENT '用户id',
  `activity_type_id` int(11) unsigned NOT NULL COMMENT '活动分类id',
  `activity_id` int(11) unsigned NOT NULL COMMENT '活动id',
  `carte_time` int(11) NOT NULL COMMENT '报名时间',
  `sign_time` int(11) NOT NULL COMMENT '签到时间',
  `audit` tinyint(1) NOT NULL DEFAULT '1' COMMENT '审核状态：1-通过，0-未通过，默认为 1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT='用户参加活动表';

-- ----------------------------
-- Records of dxyh_attend_activity
-- ----------------------------

-- ----------------------------
-- Table structure for `dxyh_auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `dxyh_auth_group`;
CREATE TABLE `dxyh_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '' COMMENT '用户组中文名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态：为1正常，为0禁用',
  `rules` char(80) NOT NULL DEFAULT '' COMMENT '用户组拥有的规则id,多个规则 , 隔开',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户组表';

-- ----------------------------
-- Records of dxyh_auth_group
-- ----------------------------

-- ----------------------------
-- Table structure for `dxyh_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `dxyh_auth_rule`;
CREATE TABLE `dxyh_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '' COMMENT '规则唯一标识',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '规则名称',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '规则类型：1-规则表达式，0-数字',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态：1-正常，0-禁用',
  `condition` char(100) NOT NULL DEFAULT '' COMMENT '规则表达式，为空表示存在就验证，不为空表示按照条件验证',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='规则表';

-- ----------------------------
-- Records of dxyh_auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for `dxyh_collection`
-- ----------------------------
DROP TABLE IF EXISTS `dxyh_collection`;
CREATE TABLE `dxyh_collection` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL COMMENT '用户id',
  `coptic_type_id` int(11) unsigned NOT NULL COMMENT '科普类型id',
  `coptic_id` int(11) unsigned NOT NULL COMMENT '科普id',
  `create_time` int(11) NOT NULL COMMENT '收藏时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT='用户收藏表';

-- ----------------------------
-- Records of dxyh_collection
-- ----------------------------

-- ----------------------------
-- Table structure for `dxyh_coptic`
-- ----------------------------
DROP TABLE IF EXISTS `dxyh_coptic`;
CREATE TABLE `dxyh_coptic` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `coptic_type_id` int(11) unsigned NOT NULL COMMENT '科普分类id',
  `coptic_title` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '科普标题',
  `coptic_cover` varchar(255) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '封面图片',
  `abstract` text COLLATE utf8mb4_bin NOT NULL COMMENT '摘要',
  `content` longtext COLLATE utf8mb4_bin NOT NULL COMMENT '正文',
  `author` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '作者',
  `source` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '来源',
  `keyword` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '关键词',
  `original_link` varchar(100) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '原文链接',
  `referral` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否推荐：1-是，0-否',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT='科普表';

-- ----------------------------
-- Records of dxyh_coptic
-- ----------------------------

-- ----------------------------
-- Table structure for `dxyh_coptic_type`
-- ----------------------------
DROP TABLE IF EXISTS `dxyh_coptic_type`;
CREATE TABLE `dxyh_coptic_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '分类名称',
  `category_image` varchar(255) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '分类图片',
  `editor` varchar(255) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '主编',
  `sort` int(11) NOT NULL DEFAULT '1' COMMENT '排序',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT='科普分类表';

-- ----------------------------
-- Records of dxyh_coptic_type
-- ----------------------------

-- ----------------------------
-- Table structure for `dxyh_dxyh_user`
-- ----------------------------
DROP TABLE IF EXISTS `dxyh_dxyh_user`;
CREATE TABLE `dxyh_dxyh_user` (
  `uid` int(11) NOT NULL,
  `mobile` int(11) NOT NULL COMMENT '用户注册账号/手机号',
  `passwd` varchar(200) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '用户密码',
  `nickname` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '昵称',
  `name` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '姓名',
  `avatar` varchar(255) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '头像',
  `sex` tinyint(1) NOT NULL DEFAULT '0' COMMENT '性别：0-男，1-女',
  `integral` int(11) NOT NULL DEFAULT '0' COMMENT '积分',
  `create_time` int(11) NOT NULL COMMENT '注册时间',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT='用户表';

-- ----------------------------
-- Records of dxyh_dxyh_user
-- ----------------------------

-- ----------------------------
-- Table structure for `dxyh_friendship_link`
-- ----------------------------
DROP TABLE IF EXISTS `dxyh_friendship_link`;
CREATE TABLE `dxyh_friendship_link` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `link_name` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '链接名称',
  `link` varchar(255) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '链接',
  `link_logo` varchar(255) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT 'logo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT='友情链接表';

-- ----------------------------
-- Records of dxyh_friendship_link
-- ----------------------------

-- ----------------------------
-- Table structure for `dxyh_integral_detail`
-- ----------------------------
DROP TABLE IF EXISTS `dxyh_integral_detail`;
CREATE TABLE `dxyh_integral_detail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL COMMENT '用户id',
  `integral_num` int(11) NOT NULL DEFAULT '0' COMMENT '获得积分',
  `reason` varchar(255) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '获得积分原因',
  `create_time` int(11) NOT NULL COMMENT '获取积分时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT='积分明细表';

-- ----------------------------
-- Records of dxyh_integral_detail
-- ----------------------------
