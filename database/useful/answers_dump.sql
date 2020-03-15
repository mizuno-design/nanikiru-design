-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2020 年 3 月 15 日 06:45
-- サーバのバージョン： 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `NANIKIRU_ANALYSIS`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `answers`
--

CREATE TABLE `answers` (
  `id` int(8) NOT NULL COMMENT 'id',
  `question_id` int(8) NOT NULL COMMENT 'questionテーブルのid',
  `choice` varchar(3) NOT NULL COMMENT '選択肢の牌',
  `point` int(1) NOT NULL COMMENT '解答ポイント'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `choice`, `point`) VALUES
(1, 1, '5m', 3),
(2, 1, '4m', 5),
(3, 1, '7m', 1),
(4, 2, '5m', 3),
(5, 2, '8m', 5),
(6, 2, '7m', 1),
(7, 3, '2p', 3),
(8, 3, '4p', 5),
(9, 3, '7p', 1),
(10, 4, '1m', 1),
(11, 4, '2m', 3),
(12, 4, '3m', 5),
(13, 5, '7m', 5),
(14, 5, '4s', 3),
(15, 5, '6m', 1),
(16, 6, '3p', 5),
(17, 6, '4m', 3),
(18, 6, '9p', 1),
(19, 7, '7s', 5),
(20, 7, '7m', 3),
(21, 7, '4p', 1),
(22, 8, '8p', 1),
(23, 8, '7z', 5),
(24, 8, '1p', 3),
(25, 9, '1s', 5),
(26, 9, '7z', 3),
(27, 9, '1m', 1),
(28, 10, '1m', 1),
(29, 10, '2z', 3),
(30, 10, '6p', 5),
(31, 11, '9s', 1),
(32, 11, '4m', 5),
(33, 11, '3z', 3),
(34, 12, '6m', 5),
(35, 12, '5p', 3),
(36, 12, '2z', 1),
(37, 13, '9s', 1),
(38, 13, '2m', 3),
(39, 13, '3s', 5),
(40, 14, '4p', 3),
(41, 14, '6p', 5),
(42, 14, '7s', 1),
(43, 15, '4p', 5),
(44, 15, '4m', 1),
(45, 15, '5m', 3),
(46, 16, '1m', 3),
(47, 16, '2p', 5),
(48, 16, '9s', 1),
(49, 17, '1m', 5),
(50, 17, '8m', 3),
(51, 17, '7s', 1),
(52, 18, '5s', 1),
(53, 18, '7s', 5),
(54, 18, '1m', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=55;
