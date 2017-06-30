-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: 2017-06-30 12:43:44
-- 服务器版本： 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `shop_mooc`
--

-- --------------------------------------------------------

--
-- 表的结构 `mooc_admin`
--

CREATE TABLE `mooc_admin` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mooc_admin`
--

INSERT INTO `mooc_admin` (`id`, `username`, `password`, `email`) VALUES
(1, '张三', '202cb962ac59075b964b07152d234b70', 'qiaoer2017@163.com'),
(2, '李四', '123', 'lisi@sina.com'),
(3, 'wangwu', '202cb962ac59075b964b07152d234b70', 'wangwu@153.com'),
(4, 'zhaoliu', '202cb962ac59075b964b07152d234b70', 'zhaoliu@163.com'),
(5, '王八蛋', '202cb962ac59075b964b07152d234b70', 'wang@163.com');

-- --------------------------------------------------------

--
-- 表的结构 `mooc_album`
--

CREATE TABLE `mooc_album` (
  `id` int(10) UNSIGNED NOT NULL,
  `pId` int(10) UNSIGNED NOT NULL,
  `albumPath` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- 表的结构 `mooc_cate`
--

CREATE TABLE `mooc_cate` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `cName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mooc_cate`
--

INSERT INTO `mooc_cate` (`id`, `cName`) VALUES
(1, '家用电器'),
(7, '服装专区'),
(6, '美食诱惑');

-- --------------------------------------------------------

--
-- 表的结构 `mooc_pro`
--

CREATE TABLE `mooc_pro` (
  `id` int(10) UNSIGNED NOT NULL,
  `pName` varchar(50) NOT NULL,
  `pSn` varchar(50) NOT NULL,
  `pNum` int(10) UNSIGNED DEFAULT '1',
  `mPrice` decimal(10,2) NOT NULL,
  `iPrice` decimal(10,2) NOT NULL,
  `pDesc` text,
  `pubTime` int(10) UNSIGNED NOT NULL,
  `isShow` tinyint(1) DEFAULT '1',
  `isHot` tinyint(1) DEFAULT '0',
  `cId` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mooc_pro`
--

INSERT INTO `mooc_pro` (`id`, `pName`, `pSn`, `pNum`, `mPrice`, `iPrice`, `pDesc`, `pubTime`, `isShow`, `isHot`, `cId`) VALUES
(10, '华为 P9 全网通 3GB+32GB版 流光金 移动联通电信4G手机 双卡双待', '42111', 1234, '2388.00', '2188.00', '<strong>价格说明：</strong><br />\r\n<p style=\"color:#666666;font-family:tahoma, arial, &quot;\">\r\n	<b>京东价：</b>京东价为商品的销售价，是您最终决定是否购买商品的依据。\r\n</p>\r\n<p style=\"color:#666666;font-family:tahoma, arial, &quot;\">\r\n	<b>划线价：</b>商品展示的划横线价格为参考价，该价格可能是品牌专柜标价、商品吊牌价或由品牌供应商提供的正品零售价（如厂商指导价、建议零售价等）或该商品在京东平台上曾经展示过的销售价；由于地区、时间的差异性和市场行情波动，品牌专柜标价、商品吊牌价等可能会与您购物时展示的不一致，该价格仅供您参考。\r\n</p>\r\n<p style=\"color:#666666;font-family:tahoma, arial, &quot;\">\r\n	<b>折扣：</b>如无特殊说明，折扣指销售商在原价、或划线价（如品牌专柜标价、商品吊牌价、厂商指导价、厂商建议零售价）等某一价格基础上计算出的优惠比例或优惠金额；如有疑问，您可在购买前联系销售商进行咨询。\r\n</p>\r\n<p style=\"color:#666666;font-family:tahoma, arial, &quot;\">\r\n	<b>异常问题：</b>商品促销信息以商品详情页“促销”栏中的信息为准；商品的具体售价以订单结算页价格为准；如您发现活动商品售价或促销信息有异常，建议购买前先联系销售商咨询。\r\n</p>', 1498648531, 1, 0, 1),
(11, '三只松鼠休闲麻辣零食特产约辣辣条200g/盒', '315', 12345, '9.80', '8.90', '<span style=\"color:#666666;font-family:tahoma, arial, \" background-color:#ffffff;\"=\"\">京东上的所有商品信息、客户评价、商品咨询、网友讨论等内容，是京东重要的经营资源，未经许可，禁止非法转载使用。</span> \r\n<p style=\"color:#666666;font-family:tahoma, arial,;\">\r\n	<b>注：</b>本站商品信息均来自于合作方，其真实性、准确性和合法性由信息拥有者（合作方）负责。本站不提供任何保证，并不承担任何法律责任。\r\n</p>', 1498726906, 1, 0, 6),
(12, '【京东超市】 京东海外直采 瑞士莲Lindt 软心牛奶巧克力制品礼盒装 瑞士进口 187g/盒', '231111', 21314, '124.00', '123.00', '<span style=\"color:#E4393C;font-family:tahoma, arial, &quot;background-color:#FFFFFF;\">京东自营】我是那上京应考而不读书的书生，来北京只为求看你的倒影。当杏花，烟雨，绿水江南岸，你听我步履远去，我送你迎风。你有远大理想，四年后就来京东</span><a href=\"https://sale.jd.com/act/ebR6xQujHA0.html\" target=\"_blank\">品质进口大促</a>', 1498709564, 1, 0, 6),
(13, '【京东超市】美国进口优鲜沛Ocean Spray蔓越莓干1360g(新老包装随机发货)', '12313', 12313, '124.00', '122.00', '<table width=\"750\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\" style=\"color:#666666;font-family:tahoma, arial, &quot;font-size:12px;\" class=\"ke-zeroborder\">\r\n	<tbody>\r\n		<tr>\r\n			<td width=\"127\">\r\n				<div style=\"margin:0px;padding:0px;font-size:24px;color:#999999;font-family:微软雅黑;\">\r\n					品牌<br />\r\n产地<br />\r\n净含量<br />\r\n保质期<br />\r\n储存方式\r\n				</div>\r\n			</td>\r\n			<td width=\"623\">\r\n				<div style=\"margin:0px;padding:0px;font-size:24px;color:#333333;font-family:微软雅黑;\">\r\n					优鲜沛（Ocean Spray）<br />\r\n美国<br />\r\n1360g<br />\r\n365天<br />\r\n避光常温保存\r\n				</div>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 1498709636, 1, 0, 6),
(15, '飞利浦（PHILIPS）电动剃须刀 YQ6188/16 刮胡刀', '124545', 123, '122.00', '111.00', '<span style=\"color:#333333;font-family:tahoma, arial, &quot;font-size:14px;background-color:#FFFFFF;\">京东自营的物流给力的不要不要的！哈！我的胡子很硬，还是络腮，一般剃须刀很难剃干净，这个我试了一下，还不错，这个价位的三头剃须刀应该是不错的了，秒杀还是划算的！而且外形也挺好看的。</span>', 1498727550, 1, 0, 1),
(16, '海信（Hisense）LED55EC520UA 55英寸 VIDAA3 14核 炫彩4K智能电视(黑', '43421', 12334, '1232.00', '11111.00', '<span style=\"color:#333333;font-family:tahoma, arial, &quot;font-size:14px;background-color:#FFFFFF;\">国产大品牌还是值得买的，本来想买个三星或者Sony的呢，三星怕炸，而且棒子狗最近不老实就没买。索尼好是好就是太贵，无奈刚刚装修完兜里米不够，选来选去还是选海信，我七大姑八大姨家的电视都是海信，对海信还是比较了解的。还有就是今天就是今天上京东一看此款电视降价200，这才一个多星期就降价了而且还是200多，找客服问问什么情况，不是价保30天麻，没几天就掉价，跟客户反应了下客服给反了200元的豆豆，处理的比较满意。喜欢的别犹豫了，不会让你失望的</span>', 1498727606, 1, 0, 1),
(17, '松下（Panasonic）电吹风机家用EH-NA98CP405纳米水离子&双侧矿物质负离子搭载肌肤模', '2426451', 1244, '1233.00', '1222.00', '<span style=\"color:#E4393C;font-family:tahoma, arial, &quot;background-color:#FFFFFF;\">京东自营】松下纳米水离子吹风机，双侧矿物质负离子，1800W大功率搭配多种干发护发模式，智能冷热交替吹风模式，尽显秀发光泽，搭载肌肤模式，护发同时滋养脸部肌肤！呵宠，献给爱美的你！</span>', 1498727660, 1, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `mooc_user`
--

CREATE TABLE `mooc_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `sex` enum('男','女','保密') NOT NULL DEFAULT '保密',
  `face` varchar(50) NOT NULL,
  `regTime` int(10) UNSIGNED NOT NULL,
  `activeFlag` tinyint(1) UNSIGNED DEFAULT '0',
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mooc_user`
--

INSERT INTO `mooc_user` (`id`, `username`, `password`, `sex`, `face`, `regTime`, `activeFlag`, `email`) VALUES
(1, '张三', '202cb962ac59075b964b07152d234b70', '男', 'd62a642c019fddf96c010cfd22fe892a.jpg', 1498747871, 0, 'zhangsan@163.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mooc_admin`
--
ALTER TABLE `mooc_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `mooc_album`
--
ALTER TABLE `mooc_album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mooc_cate`
--
ALTER TABLE `mooc_cate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cName` (`cName`),
  ADD UNIQUE KEY `cName_2` (`cName`),
  ADD UNIQUE KEY `cName_3` (`cName`);

--
-- Indexes for table `mooc_pro`
--
ALTER TABLE `mooc_pro`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pName` (`pName`);

--
-- Indexes for table `mooc_user`
--
ALTER TABLE `mooc_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `mooc_admin`
--
ALTER TABLE `mooc_admin`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `mooc_album`
--
ALTER TABLE `mooc_album`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- 使用表AUTO_INCREMENT `mooc_cate`
--
ALTER TABLE `mooc_cate`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `mooc_pro`
--
ALTER TABLE `mooc_pro`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- 使用表AUTO_INCREMENT `mooc_user`
--
ALTER TABLE `mooc_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;