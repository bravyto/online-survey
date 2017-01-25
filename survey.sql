-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2017 at 03:03 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `group_index`
--

CREATE TABLE `group_index` (
  `group_name` varchar(100) NOT NULL,
  `last_index` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_index`
--

INSERT INTO `group_index` (`group_name`, `last_index`) VALUES
('m', 6),
('vyto', 7);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `question` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`) VALUES
(1, 'test'),
(2, 'blabla'),
(3, 'yaya'),
(4, 'toure'),
(5, 'dadsadsadsa'),
(6, 'kenapa'),
(7, 'cok'),
(8, 'bdudi'),
(9, '<b>bdudi</b>'),
(10, 'dalam mana rin?'),
(11, 'ini layanan apa ya?\r\n'),
(12, 'kok saya puas'),
(13, 'dalam <b>mana rin?</b>'),
(14, 'pak tolong'),
(15, 'haha'),
(16, 'adsfasdf'),
(17, 'lkjlkj'),
(18, '<b>lkj</b>lkj'),
(19, 'adsfasdfasd'),
(20, 'zdfgn'),
(21, 'asdfasdf'),
(22, 'asdfasdfasdf'),
(23, 'asdfasdfasdfaaaaaa'),
(24, 'asdfasaaqewasdf'),
(25, 'asdfa<b>saaqe</b>wasdf'),
(26, 'asdfa<i><b>saaqe</b>wa</i>sdf'),
(27, 'asdfasdfasdfdsf'),
(28, 'asd<b>fasdf</b>'),
(29, 'qweqwe'),
(30, '<i>qw</i>eqwe'),
(31, 'asdfsadfas');

-- --------------------------------------------------------

--
-- Table structure for table `recent_question`
--

CREATE TABLE `recent_question` (
  `id_question` int(11) NOT NULL,
  `id_template` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recent_question`
--

INSERT INTO `recent_question` (`id_question`, `id_template`) VALUES
(10, 7),
(15, 12),
(21, 21),
(28, 6),
(30, 6),
(31, 4);

-- --------------------------------------------------------

--
-- Table structure for table `recent_template`
--

CREATE TABLE `recent_template` (
  `id` int(11) NOT NULL,
  `id_template` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recent_template`
--

INSERT INTO `recent_template` (`id`, `id_template`) VALUES
(4, 26),
(6, 28);

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `id` int(11) NOT NULL,
  `id_template` int(11) NOT NULL,
  `saran` mediumtext NOT NULL,
  `id_survey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`id`, `id_template`, `saran`, `id_survey`) VALUES
(1, 6, '{"id_template":6}', 16),
(2, 6, '{"id_template":6}', 16),
(3, 6, '{"id_template":6}', 16),
(4, 6, '', 16),
(5, 6, '{"id_template":6}', 16),
(6, 6, '$saran', 15),
(7, 6, '', 16),
(8, 6, '{"id_template":6}', 16),
(9, 6, '1234', 16),
(10, 5, 'Ya itu lah', 18),
(11, 6, 'Ya kalo bisa ya gitu lah', 18);

-- --------------------------------------------------------

--
-- Table structure for table `saved_question`
--

CREATE TABLE `saved_question` (
  `id_question` int(11) NOT NULL,
  `id_template` int(11) NOT NULL,
  `id_survey` int(11) NOT NULL,
  `SM` int(11) NOT NULL,
  `M` int(11) NOT NULL,
  `KM` int(11) NOT NULL,
  `TM` int(11) NOT NULL,
  `STM` int(11) NOT NULL,
  `NA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saved_question`
--

INSERT INTO `saved_question` (`id_question`, `id_template`, `id_survey`, `SM`, `M`, `KM`, `TM`, `STM`, `NA`) VALUES
(5, 2, 9, 0, 0, 0, 0, 0, 0),
(7, 3, 9, 0, 0, 0, 0, 0, 0),
(5, 2, 10, 0, 0, 0, 0, 0, 0),
(7, 3, 10, 0, 0, 0, 0, 0, 0),
(5, 2, 11, 1, 0, 0, 0, 0, 0),
(7, 3, 11, 0, 0, 1, 0, 0, 0),
(8, 4, 11, 0, 0, 0, 0, 0, 1),
(10, 5, 12, 0, 0, 0, 0, 0, 0),
(11, 6, 12, 0, 0, 0, 0, 0, 0),
(12, 6, 12, 0, 0, 0, 0, 0, 0),
(10, 5, 13, 0, 0, 0, 0, 0, 0),
(11, 6, 13, 0, 0, 0, 0, 0, 0),
(12, 6, 13, 0, 0, 0, 0, 0, 0),
(10, 5, 14, 0, 0, 0, 0, 0, 0),
(11, 6, 14, 0, 0, 0, 0, 0, 0),
(12, 6, 14, 0, 0, 0, 0, 0, 0),
(10, 5, 15, 0, 0, 0, 0, 0, 1),
(11, 6, 15, 0, 0, 0, 0, 0, 2),
(12, 6, 15, 0, 0, 0, 0, 0, 2),
(10, 5, 16, 1, 6, 15, 0, 1, 16),
(11, 6, 16, 0, 0, 0, 0, 0, 40),
(12, 6, 16, 4, 0, 4, 0, 0, 32),
(10, 5, 17, 0, 0, 0, 0, 0, 0),
(11, 6, 17, 0, 0, 0, 0, 0, 0),
(12, 6, 17, 0, 0, 0, 0, 0, 0),
(10, 5, 18, 0, 0, 1, 0, 1, 0),
(11, 6, 18, 0, 1, 1, 0, 0, 0),
(12, 6, 18, 0, 0, 1, 0, 0, 1),
(18, 19, 19, 0, 0, 0, 0, 0, 0),
(22, 26, 20, 0, 0, 0, 0, 0, 0),
(28, 28, 21, 0, 0, 0, 0, 0, 0),
(30, 28, 21, 0, 0, 0, 0, 0, 0),
(28, 28, 22, 0, 0, 1, 0, 0, 1),
(30, 28, 22, 1, 0, 0, 0, 0, 1),
(28, 28, 23, 0, 0, 0, 0, 0, 0),
(30, 28, 23, 0, 0, 0, 0, 0, 0),
(31, 26, 24, 0, 0, 0, 0, 0, 2),
(28, 28, 24, 0, 0, 0, 0, 0, 2),
(30, 28, 24, 0, 0, 0, 0, 0, 2),
(31, 26, 25, 0, 0, 1, 0, 0, 0),
(28, 28, 25, 0, 0, 0, 1, 0, 0),
(30, 28, 25, 0, 1, 0, 0, 0, 0),
(31, 26, 28, 0, 0, 0, 0, 0, 0),
(28, 28, 28, 0, 0, 0, 0, 0, 0),
(30, 28, 28, 0, 0, 0, 0, 0, 0),
(31, 26, 29, 0, 0, 0, 0, 0, 0),
(28, 28, 29, 0, 0, 0, 0, 0, 0),
(30, 28, 29, 0, 0, 0, 0, 0, 0),
(31, 26, 30, 0, 0, 0, 0, 0, 0),
(28, 28, 30, 0, 0, 0, 0, 0, 0),
(30, 28, 30, 0, 0, 0, 0, 0, 0),
(31, 26, 31, 0, 0, 0, 0, 0, 0),
(28, 28, 31, 0, 0, 0, 0, 0, 0),
(30, 28, 31, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `id` int(11) NOT NULL,
  `name` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`id`, `name`, `description`, `status`) VALUES
(1, 'adaada', 'saja', 'ongoing'),
(2, 'adaada', 'saja', 'ongoing'),
(3, 'adaada', 'saja', 'ongoing'),
(4, 'adaada', 'saja', 'ongoing'),
(5, 'adaada', 'saja', 'ongoing'),
(6, 'kempet', 'kempet kempet bersama donal bebek', 'ongoing'),
(7, '1', '3', 'ongoing'),
(8, '1', '3', 'ongoing'),
(9, '1', '3', 'ongoing'),
(10, 'bambang', '<b>sayang</b>', 'ongoing'),
(11, 'rizky', '<b>bambang</b> <u>sayang</u> <b>rizky</b>', 'ongoing'),
(12, 'Layanan baru', 'Ini dia', 'ongoing'),
(13, 'adsf', 'asdf', 'ongoing'),
(14, 'asdfasdf', 'asdfadsfadf', 'ongoing'),
(15, 'qewrqwer', 'qewrqwer', 'ongoing'),
(16, 'zcx', 'zxc', 'ongoing'),
(17, '123', '123', 'ongoing'),
(18, 'bambang', 'status bambang sudah tidak lajang lagi', 'Completed'),
(19, 'testsetset', 'asd<i>fad</i>sfasdfasf', 'Completed'),
(20, 'asdfas', 'dfasdfasdfasfasdf', 'Completed'),
(21, 'hmmm', 'kenapa <b>ini</b>', 'Ongoing'),
(22, 'wew', 'asdfasdf', 'Completed'),
(23, 'qweasdzxc', 'qweasdzxc', 'Ongoing'),
(24, 'qwer', 'qwerqwerqwer', 'Completed'),
(25, 'ghjk', 'fuyhkj', 'Ongoing'),
(26, 'adfasdfasdf', 'asdfasdfadsf', 'Ongoing'),
(27, 'adfasdfasdf', 'asdfasdfadsf', 'Ongoing'),
(28, 'adfasdfasdf', 'asdfasdfadsf', 'Ongoing'),
(29, 'asdfasf', 'qewrqwer', 'Ongoing'),
(30, 'asdfa', 'asdfasdf', 'Ongoing'),
(31, 'asdfzxcv', 'asdfqwer', 'Ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` int(11) NOT NULL,
  `name` mediumtext NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `name`, `description`) VALUES
(1, 'Jasa/Layanan Availabilitas System Lebih Baik', 'Percepatan Kesiapan Cabang/Unit kerja untuk melakukan Pembukaan Operasional Cabang melalui akses ke system BDS serta kesiapan layanan operasional Cabang/Unit kerja.\nUntuk mendukung layanan tersebut, IT Infrastructure telah meningkatkan kesiapan Pembukaan Operasional Cabang sejak pertengahan September 2014, yaitu :\n1. Semula Cabang/Unit kerja dapat melakukan pembukaan operasional cabang da mengakses system BDS rata-rata pukul 04:42 WIB (rata-rata periode bulan Januari s/d Agustus 2014) meningkat lebih cepat menjadi rata-rata pukul 02:39 WIB (rata-rata periode bulan Oktober 2014 s/d April 2015).\n2. Laporan Harian Bank Umum (LHBU) yang merupakan laporan rutin harian sebagai kewajiban setiap Penyedia Jasa keuangan kepada regulator yang sebelumnya dapat diakses sebelum pukul 12:00 WIB meningkat lebih cepat menjadi sebelum pukul 09:00 WIB.'),
(2, 'asdf', 'fdsfdsf'),
(3, 'aduh', 'ini'),
(4, 'Jagung turbo beli 2 gratis aku', '<ul><li>dksjdsjdksd</li></ul>'),
(5, 'Jasa/Layanan Availabilitas System Lebih Baik', 'Ririn kekunci di dalam pak'),
(6, 'Ada ada saja', 'Layanan ini memang ada ada saja'),
(7, 'Jasa/Layanan Availabilitas System Lebih Baik', 'R<b>irin kekunci di dalam pak</b>'),
(8, 'Jasa/Layanan Availabilitas System Lebih Baik', '<b>Ririn kekunci di dalam pak</b>'),
(9, 'Jasa/Layanan Availabilitas System Lebih Baik', 'Ririn k<b>ekunci di dalam pak</b>'),
(10, 'Jasa/Layanan Availabilitas System Lebih Baik', 'Riri<b>n kekunci di dalam pak</b>'),
(11, 'Jasa/Layanan Availabilitas System Lebih Baik', 'Ririn keku<b>nci di dalam pak</b>'),
(12, 'Jasa/Layanan Availabilitas System Lebih Baik', '<b>Ririn kekunci di dalam pak</b>'),
(13, 'Jasa/Layanan Availabilitas System Lebih Baik', 'Ririn<b> kekunci di dalam pa</b>k'),
(14, 'Jasa/Layanan Availabilitas System Lebih Baik', 'Ririn<b> kekunci di dalam pa</b>k'),
(15, 'Jasa/Layanan Availabilitas System Lebih Baik', 'Ririn<b> kekunci di dalam pa</b>k'),
(16, 'Jasa/Layanan Availabilitas System Lebih Baik', 'Ririn<b> kekunci di dalam pa</b>k'),
(17, 'Jasa/Layanan Availabilitas System Lebih Baik', 'Ririn kekun<b>ci di dalam pak</b>'),
(18, 'Jasa/Layanan Availabilitas System Lebih Baik', 'Ririn kekunci <b>di dalam </b>pak'),
(19, 'Jasa/Layanan Availabilitas System Lebih Baik', 'Ririn ke<i>kunci </i><b><i>di </i>dalam </b>pak'),
(20, 'asdfasdf', 'adsfadfdsaf'),
(21, 'asdfasdf', 'ads<b>fadfds</b>af'),
(22, 'asdfasdf', 'a<b>dsfad</b>fdsaf'),
(23, 'asdfasd', 'fasdfasdfadsfadsfdfasdfasf'),
(24, 'asdfasd', 'fasdfa<b>sdfadsfad</b>sfdfasdfasf'),
(25, 'asdfasdf', '<i>asdfasdfsadf</i>adsfasdf<b>asdfadsfa<u>adsfasdfsa</u></b>'),
(26, 'asdfasd', 'fasdfsadf'),
(27, 'asdfasdf', 'asdfadsf'),
(28, 'adsfasdf', 'asdfasdfsdfdsafasfd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` mediumtext NOT NULL,
  `role` varchar(20) NOT NULL,
  `remember_token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `remember_token`) VALUES
(1, 'admin', '$2y$10$A0Yr/v0hyKEEgcwUfEo7lOHhfDQTpfDfcjgZw3d79eH84/bhIcOsu', 'admin', 'mRnD5o3QydAFTnjpPcvUtJ3dYnnTzdbD4SPKaJViyELwrUbL7FMqRpKihTys'),
(2, 'kempet1', '$2y$10$Ok5IhQcnW/X87bzxuPyrN.gKYZaTY4pzUnD9LZD3DlfBidKbXVOzG', 'pegawai', ''),
(3, 'kempet1', '$2y$10$3ghwQlWw6FZW56gH1HToEe6eOrcoNgvuPDrtLl38jO0Bb1k.ezfw.', 'pegawai', ''),
(4, 'kempet1', '$2y$10$Odu4x1lzYvuwh7jd4ZuqWeqE7F0UJ51gBYzUoxgrq.NbjxKiG5N0i', 'pegawai', ''),
(5, 'kempet2', '$2y$10$7cZQX/Anrefm9cWasD0D6eUGCv61Kzhm/JSROD80lyoAo2Zte1RNy', 'pegawai', ''),
(6, 'kempet3', '$2y$10$x8JCIOeHtMfMwaNd4mxu6OfuUyhwGFKityhCXDklVRIJXuoCeBCte', 'pegawai', ''),
(7, 'kempet4', '$2y$10$1QZuV3vUuGch5a75dUC0G.4bK4XUM5Di5jhNg4IkwoIHLY4rpuOqO', 'pegawai', ''),
(8, 'kempet5', '$2y$10$61tDW7mXHXuSqsjWbgKD7.eVapWcYhi53KcloPEgBznt1e5w59apG', 'pegawai', ''),
(9, 'donal1', '$2y$10$bdZwJr.CIB4S6K9EfZjTquuru/4pSKYLIO47b459GMEPhMp0rQ5yS', 'pegawai', ''),
(10, 'donal2', '$2y$10$F6Y/qdhzh4lXQruDEm01DOMDrvtH.8SreMa3tdeSbucBTrwbjybAm', 'pegawai', ''),
(11, '1', '$2y$10$hyTr.1POuzUcISDhqCEhXOP9JcE7yyi7ezQefaUdjHT.JHoinjx/O', 'pegawai', ''),
(12, '2', '$2y$10$go1RWILCJG6YFn.7EjPf9OCpguZxfce0PKeeri3qIodOmI4NhVe6q', 'pegawai', ''),
(13, '1', '$2y$10$RPvxt9SqlTCUkUbVd474z.loCa4HwmMlpCzqidY6Gy4VbbIR8ifye', 'pegawai', ''),
(14, '2', '$2y$10$xmKg1WN7KpUG17eGqj8VK.UIGOfPPXw7qtQQH/bWRp8aBM3rAxrBW', 'pegawai', ''),
(15, '1', '$2y$10$hpAU6KgDm1DS/6MEismhj.E44DqBxNVT84RwuzV0T.Rs85q.70MFq', 'pegawai', ''),
(16, '2', '$2y$10$VZ.9wRzlKNvrDxy9QEa1iuZ3D4Xtqwbku7gMhgZZNZlMKJIQE5Nj2', 'pegawai', ''),
(17, 'kimpat1', '$2y$10$JA5wbnR2rq826U0T5un.Ue0WzTW3MGs0NAL5mlO4Oq/K6nHnpiWia', 'pegawai', ''),
(18, 'kimpat2', '$2y$10$AlgHLm8dcxFtO.Qqe/8Pduavxw47PrvxT5/UudmJBr.PXK/UMnUCu', 'pegawai', ''),
(19, 'rere', '$2y$10$qWpZ8jGKKsvSeaIlAnRgwukN.9OEUPd4kv77DbghYkJwptwC3daC6', 'pegawai', ''),
(20, 'itf_1', '$2y$10$h5bRqSz4rLB43i56KrcUfeSmdwocBW1U8lLroHasc4FMMqlaIgaHu', 'pegawai', ''),
(21, 'asdf_1', '$2y$10$cA.g328yzA5mlGuOvk1IeOThy3NdlwyjckZWkEyWsjhC/VTE0zvJi', 'pegawai', ''),
(22, 'asdfasdfadsf_1', '$2y$10$BGfXqycxXQRkEpFlfsygyezVbnx.HmCjKKAMP5vC/3B09VDgn/ScC', 'pegawai', ''),
(23, 'didin_1', '$2y$10$pdahvLojCa1a7PyTdtPydeXGDHv/zgfu3ATPbuCvtqU20StQtVCh.', 'pegawai', ''),
(24, 'zxc_1', '$2y$10$.W873RRCe8RJZZ7Xpei43uvsgJRzgKgWOrY5Wv3.Pyq3gEzQddn1C', 'pegawai', ''),
(25, 'zxc_2', '$2y$10$daE50Y8ZJuL73QwEPU19juR2XDcfV3ALkVy1xiCOT45ZYz5GCji8m', 'pegawai', ''),
(26, 'zxc_3', '$2y$10$kAy9F2SertOB2TEldUQKvey24cueI6pnMcTJr3t3qeXE66egaYcgu', 'pegawai', ''),
(27, 'zxc_4', '$2y$10$E73kdosYWNEZeXfNVpLjquM73dZFxfv6ZlhkIISgcoixGoojlBBHW', 'pegawai', ''),
(28, 'asd_1', '$2y$10$qDnQ6lB5ArJ6MHuXbz72I.kg7XV9yf.qkiU6R7fTpAOYBM0Q7KLI2', 'pegawai', ''),
(29, 'asd_2', '$2y$10$mykBmj/KHqw1PZRAPdglXeUUvNvBB7Vnikrq8JRcQ076Ur0QBBVA.', 'pegawai', ''),
(30, 'asd_3', '$2y$10$qKmWv/1yrGH5/jiBr3whWe7/YYdGDJ/gsVsoWYzcVpQ.rhThCsPRq', 'pegawai', ''),
(31, 'asd_4', '$2y$10$.wQSze4YjWe1ER2JKiW.ieXifQC496Ldwr1gEOP/K/AV4IZwB74kC', 'pegawai', ''),
(32, 'asd_5', '$2y$10$DaBf8RKAGPzo4NWsSOMeruZshl0n33UeS2n./DnDBdie5wDzCuIrK', 'pegawai', ''),
(33, 'asd_6', '$2y$10$XV7EeCtp2kDqtckEW91u2.UXjSVHR7ckyVlrVkrw1A8I1fUVf/Aom', 'pegawai', ''),
(34, 'asd_7', '$2y$10$8ocleoYeDQV2IUAbC0WxDenuTTeBsubAFv.GuziQshfYEvCEt3Gnq', 'pegawai', ''),
(35, '123_1', '$2y$10$IAhfkGtc3.ox3n685YabUOrUuRErlWhpqV6/6zZo1.2HRT8XKIjEa', 'pegawai', ''),
(36, '123_2', '$2y$10$eVMp/jeMKCByWU8E0Ps7UOkjqFJh54WZzAJyrcuPDcxfgKekBDSg2', 'pegawai', ''),
(37, 'rizky_1', '$2y$10$b84dDCu3ODKPo88H7ox41OVSraiXnWRSx7pGQdHzQEckAg1X4AKJu', 'pegawai', ''),
(38, 'rizky_2', '$2y$10$RaZflV3iaO205XLFCF8GaeC9fZiuodO/X2SJgM/Y70gDIkvBS4hSO', 'pegawai', ''),
(39, 'rizky_3', '$2y$10$2UAlyoaBcd6sOgIPMvQW4eXrVV5t269jTeyTRoMUlpevqCL0koXtm', 'pegawai', 'gxo0B8nLENgql6KSbsxMHrLwWS1v3OdDoGTbviQ8a8gXUhC9MqSjRxVEwBJB'),
(40, 'testimoni_1', '$2y$10$66DBhXGR1hQen7sUNmMU/Obl8d/B/41AvdNVX7.IrRHQH5I9xUhbu', 'pegawai', 'uXyZCG5b4NZYJdGGtSAAtsCsiZCAJJiVXJ6kf9vSPAX7OIKEgqoDqqjQG1z1'),
(41, 'testimoni_2', '$2y$10$2z716ByrtPO60toGBbo8cOOBUho6FgU23NuGV/TX4KvMqd4z8pH/6', 'pegawai', ''),
(42, 'testimoni_3', '$2y$10$vKi/Dw70.GsL0gdMszoB1eXyFHuV3LmU.dcbDFALmYIvsVm5kRZqi', 'pegawai', ''),
(43, 'asdf_1', '$2y$10$oD/DWWOwhIjN1Me2YW0uPeKiwLxT1QBHUXkiXCFVREYJ6fNRWeBsi', 'pegawai', ''),
(44, 'asdf_2', '$2y$10$XyEjnWILp2DeRPm4Rs.sAu6YDfCUKys1XUnfklRVWWQdk53jJz0gS', 'pegawai', ''),
(45, 'asdf_3', '$2y$10$FKSFhHjCsITRZMYbbzldvev0WqfI0gcr/l6aRcZB3xQvQxod3k0jm', 'pegawai', ''),
(46, 'asdf_1', '$2y$10$XXXNy/PI76fsblGMaRzuNunKDHt7LRL12XkT01xDaMFGfURmISBcK', 'pegawai', ''),
(47, 'asdf_2', '$2y$10$ifp9QpDU/HEwqkelZSFJ7eTzOePfbypXbknEJ5jmELnaqxESqNjDu', 'pegawai', ''),
(48, 'asdf_3', '$2y$10$yi94nHOzUSu8md.lv22mZeAW.7BXPHLyx7psKTealp89A/GKUA3am', 'pegawai', ''),
(49, 'aduh_1', '$2y$10$cc1Tbde1RLaLXbK.Pdx7G..6i/IGWFOHZ.SB7GwCXdcwIbVMAk3Nm', 'pegawai', ''),
(50, 'aduh_2', '$2y$10$c./nRM87RO3wo/m4FiAsg.uSk5gRYlvYbzdphDFzdsQ2TrvUMvM/W', 'pegawai', ''),
(51, 'aduh_3', '$2y$10$8uhdu9NMNf1qvt/Bd6pAEuybLbHork3mHf.r4XHBn.O/73e/lI6XW', 'pegawai', ''),
(52, 'aduh_4', '$2y$10$3W7tvNnR8jlItyP91qR5beie1H1J/3bPNQolcff176.OjyJQF2vi6', 'pegawai', ''),
(53, 'zxc_5', '$2y$10$dkBQ1eVSejyx53RHbCBPXep6IDhCoLgPhdYt9uI6OsCRIP5Y1orU6', 'pegawai', ''),
(54, 'zxc_6', '$2y$10$LHVBOXhkvhTFBRzhiQBBguRpktzWDXo77mwCvMCrk2Y0VErJjIfTW', 'pegawai', ''),
(55, 'asd_8', '$2y$10$piPa41LRRGFz8qr6Byk3t.Jnu8Q1uKA67YoE2rFEkOQrRnGUKqCeC', 'pegawai', ''),
(56, 'badui_1', '$2y$10$eND4elGXYyf7uaIOsQTcw.QM3zyYTZ0KeahMwjjx7KqSCZERVE2ym', 'pegawai', ''),
(57, 'badui_2', '$2y$10$yVpTWxHzTnrdTy3w7VtkeeFkzrXXX3w3S8WFL30fQ5ZY8I8xV2ro6', 'pegawai', ''),
(58, 'badui_3', '$2y$10$aqU.FobCG0M0LnJ5834T6eAoscc7Bo2Fou/H9YPUx6fYYDmGOGG/K', 'pegawai', ''),
(59, '123_1', '$2y$10$iKTGjDazLN29L4ClWRtNLuMHo8LStCdi41VXR0Y2ah1Wl/3noeRlC', 'pegawai', ''),
(60, '123_2', '$2y$10$pv487aEY7S79QcNlXwGvxuZQM2ShkcGKDLiQdm5Wup30AEHruiF8a', 'pegawai', ''),
(61, 'brabidu_1', '$2y$10$voO.8yIW86IG5JUjOzmdLehp.xDzSvV7W3kLTlNTXmvvXbq3PXdJW', 'pegawai', ''),
(62, 'brabidu_2', '$2y$10$S/3GOpz/K.hI3H4ko2ZARu815FuEHYOfMZKoaLRwhkPajuhPqNb1.', 'pegawai', '8DOkbyAiwcZscX7hNF7vsHCdWIYRTyl7VrV9kPxRjKbn1yNyrEsvHmIHnPNH'),
(63, 'b_1', '$2y$10$v9kJkJ203tmxPfWjkhZigOhuomY.YiXiN0plf9vFNalvzBRe3gyHS', 'pegawai', '92MKOhMFgwlwzXBtoZ6WKA0FZEmHluXDBd8m6kDzEI9rfyjZN0Ry6oLXktzQ'),
(64, 'b_2', '$2y$10$9ytseJwFZSn1rnKsXtPCReWsBO805eCYRJ6wNnjdypoB4Y.aqiTIS', 'pegawai', 'dJk8SBJwLVjLQSbTvU13I3dbwCSef69PGrezWJgD2it5WEixdmWZqnVNP1jU'),
(65, 'b_3', '$2y$10$Iccc1A6Wz2rHSrbTwh67qOgz5xIULnS5QtV5b4AajF70QCvhDiSEa', 'pegawai', ''),
(66, 'b_4', '$2y$10$IQM3Zt3oj70qzFz8jTp0Xu0TXqJuwqAKpaxwFHlcINwVnHJv9wYqW', 'pegawai', ''),
(67, 'c_1', '$2y$10$Q8tWiA3f.XGXdohCpYbxoezid6sHyI6qFdyDwazanO2u29gwtQMme', 'pegawai', '4R9WRnJsypkZ0weFaZKe4KKwRgJfynXMFEURG3IbVtgwx83z5bWr9JXPSq9E'),
(68, 'c_2', '$2y$10$4NuLP/BOh.laL1VaQVlYAu1G7az0.FVrczIHmm/4.wxdVHlbeE9z2', 'pegawai', '6jNjxjJEv0s1uGESvLm9KjcvEdJKHz9JXQFKInDA3zlZNdNL4S87PEFPc87G'),
(69, 'm_1', '$2y$10$9hqd.gC22PWEP.g/5ja9BOpFGNy8/rZ6d3g45kcHxsPOQEGW/PJfS', 'pegawai', 'FlgJJRCkGtH0m9WMoxK4Dd4aXclInZCyhMPKb5UXUDUc6yKDfx6xA5PlwqHm'),
(70, 'm_2', '$2y$10$JyOujmAKPTklr/12L7ROCucT6qj5BYclEki0T2yivJlJuyaCJ6MEi', 'pegawai', ''),
(71, 'm_3', '$2y$10$erftLvq5n.alGnW7fECq/u2qJWrViLTzzpkoI39.qnUpNz7dYaLqq', 'pegawai', ''),
(72, 'm_4', '$2y$10$4HbRRm5s1SYr2jIH7.6NYetdTU/qdLoaysxQBpDtZ1CkUtcnNpzye', 'pegawai', ''),
(73, 'm_5', '$2y$10$Ki.xtgyNvZ/mPZqy.LMi6OIHzlnX/Rlm5MZFHIlk/GPWodHnQLATC', 'pegawai', ''),
(74, 'm_2', '$2y$10$lUWSdSZW5fYxXRwVCqcpee5aDVFxalh.2fcwU7UZmEJqSoDkFNtbW', 'pegawai', ''),
(75, 'm_3', '$2y$10$TGWvd8Pt3JUvmp0yUcpjnO1PEG50fiPCLNV2Fcy3EN03AjNmObbX.', 'pegawai', ''),
(76, 'm_4', '$2y$10$/P6tNyh0gP7n66ITyx9W9O.qzKvBDsrmBCef9xL71VKfsJR86MZa2', 'pegawai', ''),
(77, 'm_5', '$2y$10$wqt8Jfh2ABcX9kvzGgHya.Fe/4o1wdXEhwSSgDdnfKFUbv9ze8fu6', 'pegawai', ''),
(78, 'm_6', '$2y$10$dEkFT8a1xE7spZhiQBlZSe3KZ6DB/Y.Wl/jZo8VuKFQiovOBLXiNe', 'pegawai', ''),
(79, 'vyto_1', '$2y$10$ejQvbSrnE04hcLmnH45p0uLIAxsbtYBPuwdUKYAA3fXlC8O199Emu', 'pegawai', ''),
(80, 'vyto_2', '$2y$10$gwCF6KH1R34ykGKPEt9CbedwVvfaBiaDaTkvvNwvq3Taj09zxSTUu', 'pegawai', ''),
(81, 'vyto_3', '$2y$10$wDR3XHD5wfmFVWOWkw1d8uEiHnJxRUUTFkLCA.PsosT9yjQxjJYJ.', 'pegawai', ''),
(82, 'vyto_4', '$2y$10$2HirvhBrjoBhxdbV3Ecr8.1gbWniqm3Nlkdt8VBjO75TYnNZDXa0.', 'pegawai', '5CpwQ4nW5jHWoacqs4IVXSahC9vHuS8QP2sg9EowbGX0oVnnBj2OPIEx8osb'),
(83, 'vyto_5', '$2y$10$kziUuSqe/SQC4cjITLjzfOOEPhQXMERcBhlOAMqQn3XdD19p88KyW', 'pegawai', 'vX6qlyKhWUUJMXk7srykN0RKQ5N50myEvIy5sjOxSFOx2ZWdrJ1wBlGf6D4d'),
(84, 'vyto_6', '$2y$10$0xD/elnzuESpM9WSY2XPN.zY4HbqTR0pDHdx8iLFxKCn13MnV9mtW', 'pegawai', ''),
(85, 'vyto_7', '$2y$10$WrITXLdYfsmv5S5Wi3Hx5ezOWfq0GGakZtcXXKpo9pcIWDMmbh5Ly', 'pegawai', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_survey`
--

CREATE TABLE `users_survey` (
  `id_users` int(11) NOT NULL,
  `id_survey` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_survey`
--

INSERT INTO `users_survey` (`id_users`, `id_survey`, `status`) VALUES
(4, 5, ''),
(5, 5, ''),
(6, 5, ''),
(7, 5, ''),
(8, 5, ''),
(9, 6, 'Not Completed'),
(10, 6, 'Not Completed'),
(11, 7, 'Not Completed'),
(12, 7, 'Not Completed'),
(13, 8, 'Not Completed'),
(14, 8, 'Not Completed'),
(15, 9, 'Not Completed'),
(16, 9, 'Not Completed'),
(17, 10, 'Not Completed'),
(18, 10, 'Not Completed'),
(19, 11, 'Not Completed'),
(20, 12, 'Not Completed'),
(21, 13, 'Not Completed'),
(22, 14, 'Not Completed'),
(23, 15, 'Not Completed'),
(24, 16, 'Completed'),
(25, 16, 'Not Completed'),
(26, 16, 'Not Completed'),
(27, 16, 'Not Completed'),
(28, 16, 'Not Completed'),
(29, 16, 'Not Completed'),
(30, 16, 'Not Completed'),
(31, 16, 'Not Completed'),
(32, 16, 'Not Completed'),
(33, 16, 'Not Completed'),
(34, 16, 'Not Completed'),
(35, 17, 'Not Completed'),
(36, 17, 'Not Completed'),
(37, 18, 'Completed'),
(38, 18, 'Completed'),
(39, 18, 'Not Completed'),
(40, 19, 'Not Completed'),
(41, 19, 'Not Completed'),
(42, 19, 'Not Completed'),
(43, 20, 'Not Completed'),
(44, 20, 'Not Completed'),
(45, 20, 'Not Completed'),
(46, 16, 'Not Completed'),
(47, 16, 'Not Completed'),
(48, 16, 'Not Completed'),
(49, 16, 'Not Completed'),
(50, 16, 'Not Completed'),
(51, 16, 'Not Completed'),
(52, 16, 'Not Completed'),
(53, 16, 'Not Completed'),
(54, 16, 'Not Completed'),
(55, 16, 'Not Completed'),
(56, 16, 'Not Completed'),
(57, 16, 'Not Completed'),
(58, 16, 'Not Completed'),
(59, 21, 'Not Completed'),
(60, 21, 'Not Completed'),
(61, 22, 'Completed'),
(62, 22, 'Completed'),
(63, 23, 'Not Completed'),
(64, 23, 'Not Completed'),
(65, 23, 'Not Completed'),
(66, 23, 'Not Completed'),
(67, 24, 'Completed'),
(68, 24, 'Completed'),
(69, 25, 'Completed'),
(70, 25, 'Not Completed'),
(71, 25, 'Not Completed'),
(72, 25, 'Not Completed'),
(73, 25, 'Not Completed'),
(74, 28, 'Not Completed'),
(75, 28, 'Not Completed'),
(76, 28, 'Not Completed'),
(77, 29, 'Not Completed'),
(78, 29, 'Not Completed'),
(79, 30, 'Not Completed'),
(80, 30, 'Not Completed'),
(81, 30, 'Not Completed'),
(82, 31, 'Not Completed'),
(83, 31, 'Not Completed'),
(84, 30, 'Not Completed'),
(85, 30, 'Not Completed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `group_index`
--
ALTER TABLE `group_index`
  ADD PRIMARY KEY (`group_name`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recent_template`
--
ALTER TABLE `recent_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `recent_template`
--
ALTER TABLE `recent_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
