-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-09-07 01:41:04
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_dbs`
--

-- --------------------------------------------------------

--
-- 表的结构 `xinwen`
--

CREATE TABLE `xinwen` (
  `id` int(10) NOT NULL,
  `问题` char(100) NOT NULL,
  `标题` char(50) NOT NULL,
  `内容` text NOT NULL,
  `图片` varchar(5000) NOT NULL,
  `发布时间` date NOT NULL,
  `管理员id` char(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `xinwen`
--

INSERT INTO `xinwen` (`id`, `问题`, `标题`, `内容`, `图片`, `发布时间`, `管理员id`) VALUES
(1, '小组', '1712B的闲暇时光', '暗杀飞噶回溯法哈尔是否哈', '', '2018-09-29', '1'),
(2, '2018-09-06', '1712B的说法替换ZDVD', '人王师傅SDFSDFDFCX', '', '2018-09-22', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `xinwen`
--
ALTER TABLE `xinwen`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `xinwen`
--
ALTER TABLE `xinwen`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
