/* bookテーブル作成直後 */

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2020 年 3 月 25 日 03:41
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
(32, 11, '4p', 5),
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

-- --------------------------------------------------------

--
-- テーブルの構造 `books`
--

CREATE TABLE `books` (
  `id` int(4) NOT NULL COMMENT 'id',
  `title` varchar(100) NOT NULL COMMENT 'タイトル',
  `path` varchar(100) NOT NULL COMMENT '画像ファイルパス'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `books`
--

INSERT INTO `books` (`id`, `title`, `path`) VALUES
(1, 'これだけで勝てる！麻雀の基本形80', 'book1.jpg'),
(2, 'ウザク式麻雀学習牌効率', 'book2.jpg'),
(3, '麻雀傑作「何切る」300選', 'book3.jpg');

-- --------------------------------------------------------

--
-- テーブルの構造 `questions`
--

CREATE TABLE `questions` (
  `id` int(8) NOT NULL COMMENT 'id',
  `question_type_id` int(8) NOT NULL COMMENT '問題タイプ',
  `question` varchar(20) NOT NULL COMMENT '問題牌姿',
  `dora` varchar(4) NOT NULL COMMENT 'ドラ',
  `junme` int(4) NOT NULL COMMENT '巡目',
  `kyoku` varchar(10) NOT NULL COMMENT '局',
  `tya` varchar(4) NOT NULL COMMENT '家',
  `description` varchar(400) NOT NULL COMMENT '解答解説'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `questions`
--

INSERT INTO `questions` (`id`, `question_type_id`, `question`, `dora`, `junme`, `kyoku`, `tya`, `description`) VALUES
(1, 1, '455567m123789p66z', '1z', 6, '東一局', '西', ''),
(2, 1, '578m55567p123567s', '1z', 6, '東一局', '西', ''),
(3, 1, '22m224678p677889s', '9s', 6, '東一局', '西', ''),
(4, 2, '122378m45789p234s', '9p', 6, '東一局', '西', ''),
(5, 2, '667m3445789p3445s', '9p', 6, '東一局', '西', ''),
(6, 2, '44r55m3578889p777z', '1z', 6, '東一局', '西', ''),
(7, 3, '4567m3445p112347s', '1z', 6, '東一局', '西', ''),
(8, 3, '34568m13458p357s7z', '1z', 3, '東一局', '西', ''),
(9, 3, '1345678m66789p1s7z', '1z', 3, '東一局', '西', ''),
(10, 4, '145899m136p24566z', '1z', 1, '東一局', '西', ''),
(11, 4, '112m4899p689s2236z', '1z', 1, '東一局', '西', ''),
(12, 4, '169m1359p899s2466z', '1z', 1, '東一局', '西', ''),
(13, 5, '245667m456p33499s', '1z', 6, '東一局', '西', ''),
(14, 5, '345m446688p45567s', '1z', 6, '東一局', '西', ''),
(15, 5, '455m445789p12388s', '1z', 6, '東一局', '西', ''),
(16, 6, '13678m24777p3r599s', '1z', 6, '東一局', '西', ''),
(17, 6, '134568m3466p2367s', '1z', 6, '東一局', '西', ''),
(18, 6, '13m123r56p2355778s', '1z', 6, '東一局', '西', '');

-- --------------------------------------------------------

--
-- テーブルの構造 `question_types`
--

CREATE TABLE `question_types` (
  `id` int(8) NOT NULL COMMENT 'questionのtype',
  `description` varchar(100) NOT NULL COMMENT '問題タイプ説明'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `question_types`
--

INSERT INTO `question_types` (`id`, `description`) VALUES
(1, 'テンパイ時の待ち判断'),
(2, 'イーシャンテン時の受け入れ判断'),
(3, '孤立牌の比較'),
(4, '安くて遠い手の判断'),
(5, '形のセオリー'),
(6, '5ブロックと6ブロックの比較');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_types`
--
ALTER TABLE `question_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `question_types`
--
ALTER TABLE `question_types`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'questionのtype', AUTO_INCREMENT=7;
