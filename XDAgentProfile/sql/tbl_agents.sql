-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 02 月 06 日 06:07
-- 服务器版本: 5.5.24-log
-- PHP 版本: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `xiangdongdb`
--

-- --------------------------------------------------------

--
-- 表的结构 `tbl_agents`
--

CREATE TABLE IF NOT EXISTS `tbl_agents` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '签约商家编号',
  `contract` varchar(30) NOT NULL COMMENT '签约商家合同编号 ',
  `contract_pwd` varchar(35) NOT NULL COMMENT '商家登录密码',
  `contract_loginname` varchar(50) NOT NULL COMMENT '商家登录后台账号 ',
  `agent_name` varchar(30) NOT NULL COMMENT '商家名称 ',
  `agent_src` varchar(4) NOT NULL COMMENT '合同来源:网签/地推',
  `agent_state` varchar(8) NOT NULL, ''
  `city_code` varchar(5) NOT NULL, 
  `province` varchar(6) NOT NULL, ''
  `city` varchar(6) NOT NULL, ''
  `reg_date` datetime NOT NULL, '商家注册时间  --add new '
  `address` varchar(128) NOT NULL, '商家详细地址 --add new '

  `contract_begindt` datetime NOT NULL,'合同开始时间'
  `contract_begintimestamp` int(11) NOT NULL,
  `contract_enddt` datetime NOT NULL, '合同截止时间'
  `contract_endtimestamp` int(11) NOT NULL,
  `contract_signdt` datetime NOT NULL COMMENT '合同签订日期',
  `contract_sign_name` varchar(10) NOT NULL COMMENT '合同经办人',
  
  `contactor` varchar(8) NOT NULL COMMENT '商家负责人 ',
  `contactor_tel` varchar(12) NOT NULL COMMENT '负责人电话 ',

  `contactor_finance` varchar(8) NOT NULL COMMENT '财务联系人',
  `contactortel_finance` varchar(12) NOT NULL COMMENT '财务联系人电话',
  `account1_no` varchar(20) NOT NULL COMMENT '开户行1账号',
  `account1_name` varchar(20) NOT NULL COMMENT '账号1开户名',
  `account1_bankname` varchar(30) NOT NULL COMMENT '开户行1银行名称',
  `account2_no` varchar(20) NOT NULL COMMENT '开户行2账号',
  `account2_name` varchar(20) NOT NULL COMMENT '账号2开户名称',
  `account2_bankname` varchar(30) NOT NULL COMMENT '账号2开户行名称',
  `zhifubao` varchar(30) NOT NULL COMMENT '支付宝账号',
  `wxpay` varchar(30) NOT NULL COMMENT '微信支付账号',
  `trade_no` varchar(15) NOT NULL COMMENT '营业执照号',
  `trade_name` varchar(40) NOT NULL COMMENT '营业执照企业名',
  `trade_pic` varchar(30) NOT NULL COMMENT '上传的营业执照照片路径',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `tbl_agents`
--

INSERT INTO `tbl_agents` (`id`, `contract`, `contract_pwd`, `contract_loginname`, `agent_name`, `agent_src`, `agent_state`, `city_code`, `province`, `city`, `contract_begindt`, `contract_begintimestamp`, `contract_enddt`, `contract_endtimestamp`, `contract_signdt`, `contract_sign_name`, `contactor`, `contactor_tel`, `contactor_finance`, `contactortel_finance`, `account1_no`, `account1_name`, `account1_bankname`, `account2_no`, `account2_name`, `account2_bankname`, `zhifubao`, `wxpay`, `trade_no`, `trade_name`, `trade_pic`) VALUES
(1, '620150105', '', '', '印象瑜伽国际', '地推', '已通过', '0028', '四川', '成都', '2015-01-23 11:00:00', 1421974800, '2016-01-23 11:00:00', 1453510800, '2015-01-23 11:00:00', '唐小娟', '何晔琪', '83881667', '', '', '6221540530002782547', '何晔琪', '四川成都银行李家沱支行', '', '', '', '', '', '', '', ''),
(2, '620150106', '', '', '体韵瑜伽\n', '地推', '已通过', '0028', '四川', '成都', '2015-01-26 13:00:00', 1422237600, '2016-01-26 13:00:00', 1485406800, '2015-01-26 13:00:00', '唐小娟', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '620150111', '', '', '圣菲瑜伽', '地推', '已通过', '0028', '四川', '成都', '2015-01-28 10:00:00', 1422410400, '2017-01-28 10:00:00', 1485568800, '2015-01-28 10:00:00', '唐小娟', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, '620150110', '', '', '天印瑜伽', '地推', '已通过', '0028', '四川', '成都', '2015-01-27 13:00:00', 1422334800, '2017-01-27 13:00:00', 1485493200, '2015-01-27 13:00:00', '唐小娟', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
