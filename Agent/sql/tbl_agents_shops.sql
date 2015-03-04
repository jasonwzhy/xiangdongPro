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
-- 表的结构 `tbl_agents_shops`
--

CREATE TABLE IF NOT EXISTS `tbl_agents_shops` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '店面id编号',
  `agentid` int(11) NOT NULL AUTO_INCREMENT COMMENT '商家ID add new ',
  `contract_code` int(11) NOT NULL COMMENT '签约商管理的合同号',
  `shopid` int(11) NOT NULL COMMENT '签约商管理的店面id 合同号 + 当前店铺id',
  `shopname` varchar(50) NOT NULL COMMENT '签约商管理的店面名称',
  `shopprovince` varchar(6) NOT NULL, '所在省'
  `shopcity` varchar(10) NOT NULL COMMENT '所在城市',,
  `shopaddress` varchar(50) NOT NULL,
  `lon` float NOT NULL COMMENT '经度',
  `lat` float NOT NULL COMMENT '维度',
  `contractor` varchar(8) NOT NULL COMMENT '店铺联系人',
  `contractor_tel` varchar(12) NOT NULL COMMENT '联系人电话',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `tbl_agents_shops`
--

INSERT INTO `tbl_agents_shops` (`id`, `contract_code`, `shopid`, `shopname`, `shopaddress`, `lon`, `lat`, `shopcity`, `contractor`, `contractor_tel`) VALUES
(1, 620150105, 1, '印象瑜伽国际', '成都市金牛区李家沱鹏程大厦168号', 104.098, 30.6893, '成都', '何晔琪', '02883881667');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
