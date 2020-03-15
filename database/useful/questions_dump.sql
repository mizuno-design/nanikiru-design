-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2020 年 3 月 15 日 06:43
-- サーバのバージョン： 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `NANIKIRU_ANALYSIS`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `questions`
--

CREATE TABLE `questions` (
  `id` int(8) NOT NULL COMMENT 'id',
  `question_type_id` int(8) NOT NULL COMMENT '問題タイプ',
  `question` varchar(20) NOT NULL COMMENT '問題牌姿',
  `dora` varchar(4) NOT NULL COMMENT 'ドラ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `questions`
--

INSERT INTO `questions` (`id`, `question_type_id`, `question`, `dora`) VALUES
(1, 1, '455567m123789p66z', '1z'),
(2, 1, '578m55567p123567s', '1z'),
(3, 1, '22m224678p677889s', '9s'),
(4, 2, '122378m45789p234s', '9p'),
(5, 2, '667m3445789p3445s', '9p'),
(6, 2, '44r55m3578889p777z', '1z'),
(7, 3, '4567m3445p112347s', '1z'),
(8, 3, '34568m13458p357s7z', '1z'),
(9, 3, '1345678m66789p1s7z', '1z'),
(10, 4, '145899m136p24566z', '1z'),
(11, 4, '112m899p2689s2236z', '1z'),
(12, 4, '169m1359p899s2466z', '1z'),
(13, 5, '245667m456p33499s', '1z'),
(14, 5, '345m446688p45567s', '1z'),
(15, 5, '455m445789p12388s', '1z'),
(16, 6, '13678m24777p3r599s', '1z'),
(17, 6, '134568m3466p2367s', '1z'),
(18, 6, '13m123r56p2355778s', '1z');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=19;
