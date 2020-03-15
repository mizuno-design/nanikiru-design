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
-- Indexes for table `question_types`
--
ALTER TABLE `question_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question_types`
--
ALTER TABLE `question_types`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'questionのtype', AUTO_INCREMENT=7;
