-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2023 at 11:43 PM
-- Server version: 8.0.13
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `world_time`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id_answer` int(255) NOT NULL,
  `text_answer` varchar(1000) NOT NULL,
  `id_question` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id_answer`, `text_answer`, `id_question`) VALUES
(1, 'Da izuzetno mi se svidja.', 1),
(2, 'Svidja mi se.', 1),
(4, 'Ne svidja mi se.', 1),
(5, 'Da, rat je strasna stvar, ne treba ratovati.', 3),
(6, 'Nemam posebno misljenje o tome.', 3),
(7, 'Podrzavam rat.', 3),
(8, 'Da jesu sve sto sam procitao na vasem portalu je istina.', 4),
(9, 'Nisam proveravao relevantnost informacija koje sam procitao.', 4),
(10, 'Mislim da ima lzanih vesti.', 4),
(11, 'Da, uvek najnovije informacije dobijam od vas.', 5),
(12, 'Nema velike razlike u odnosu na ostale internet portale.', 5),
(13, 'Drugi portali mnogo ranije objavljuju iste vesti.', 5),
(14, 'Da svakako, mislim da je to dobro za nas.', 6),
(15, 'Svejedno.', 6),
(16, 'Ne, mislim da nam to nije potrebno.', 6),
(17, 'Da', 2),
(18, 'Malo', 2),
(19, 'Ne', 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `name`) VALUES
(1, 'Politics'),
(3, 'Finance'),
(4, 'Health_care'),
(5, 'Technology'),
(7, 'Media'),
(9, 'Sports');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(255) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `ban` int(3) NOT NULL DEFAULT '0',
  `date_comment` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(255) NOT NULL,
  `id_vest` int(255) DEFAULT NULL,
  `id_parrent` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_comment`, `content`, `ban`, `date_comment`, `id_user`, `id_vest`, `id_parrent`) VALUES
(50, 'Wow', 0, '2022-04-30 17:07:32', 11, 10, NULL),
(52, 'Komentar 1', 0, '2023-09-06 05:31:30', 11, 15, NULL),
(53, 'Odgovor na komentar', 0, '2023-09-06 05:31:44', 11, NULL, 52),
(56, 'Lepa objava', 0, '2023-09-06 23:17:52', 11, 8, NULL),
(57, 'Neverovatno zaista', 0, '2023-09-06 23:26:01', 16, 4, NULL),
(58, 'Ne bih se slozio sa Vama.\n', 0, '2023-09-06 23:26:35', 11, NULL, 57),
(59, 'Ne usaglasavam se sa ovim tekstom!!!', 0, '2023-09-06 23:26:55', 11, 4, NULL),
(60, 'Bez teksta sam...', 0, '2023-09-06 23:27:29', 18, 4, NULL),
(61, 'Podrzavam moderatora.', 0, '2023-09-06 23:27:45', 18, NULL, 57),
(62, 'Zbog cega ???', 0, '2023-09-06 23:28:06', 18, NULL, 59);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id_image` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `size` int(255) NOT NULL,
  `alt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id_image`, `type`, `path`, `size`, `alt`) VALUES
(1, 'jpg', 'assets/images/dashboard/banner.jpg', 250, 'a demonstration wide world because pandemic corona.'),
(2, 'jpg', 'assets/images/sports/Sports_1.jpg', 17, 'Scateboard man in action.'),
(3, 'png', 'assets/images/business/business_1.png', 43, 'New lowcost flying start to work tomorrow.'),
(4, 'png', 'assets/images/business/business_2.jpg', 65, 'The most popular tourist destination to be closed.'),
(5, 'jpg', 'assets/images/dashboard/home_4.jpg', 83, 'Politics, South Corea invasion.'),
(6, 'jpg', 'assets/images/dashboard/home_5.jpg', 53, 'Angela Merkel.'),
(7, 'jpg', 'assets/images/dashboard/home_6.jpg', 40, 'Jozeph Bayden and Barack Obama.'),
(8, 'jpg', 'assets/images/politics/Politics_1.jpg', 17, 'Demonstrations at Belgrade.'),
(9, 'jpg', 'assets/images/politics/Politics_2.jpg', 19, 'Ecology Demonstrations at Australia.'),
(10, 'jps', 'assets/images/politics/Politics_3.jpg', 15, 'Ecology Demonstrations at Belgrade.'),
(11, 'jpg', 'assets/images/politics/Politics_4.jpg', 87, 'USA Parlament.'),
(12, 'jpg', 'assets/images/politics/Politics_5.jpg', 47, 'Serbian Palace of Justice.'),
(13, 'jpg', 'assets/images/sports/Sports_9.jpg', 43, 'Australian Open Novak Djokovic.'),
(14, 'png', 'assets/images/business/business_3.png', 62, 'The new burze in Moskva.'),
(15, 'png', 'assets/images/business/business_4.png', 249, 'The new work and travel program in Serbia.'),
(16, 'jpg', 'assets/images/faces/face1.jpg', 0, 'Jack Lin. New record of likes on Instagram! '),
(17, 'jpg', 'assets/images/faces/face1.jpg', 15, 'Jack Lin. New record of likes on Instagram!'),
(18, 'jpg', 'assets/images/faces/face2.jpg', 17, 'Rihana.'),
(66, '', 'assets/images/uploaded/slika1651231363.jpeg', 0, ''),
(67, '', 'assets/images/uploaded/slika1651231415.jpeg', 0, ''),
(68, '', 'assets/images/uploaded/slika1651231448.jpeg', 0, ''),
(69, '', 'assets/images/uploaded/slika1651231491.jpeg', 0, ''),
(70, '', 'assets/images/uploaded/slika1651231511.jpeg', 0, ''),
(71, '', 'assets/images/uploaded/slika1651231560.jpeg', 0, ''),
(72, '', 'assets/images/uploaded/slika1651231565.jpeg', 0, ''),
(73, '', 'assets/images/uploaded/slika1651231608.', 0, ''),
(74, '', 'assets/images/uploaded/slika1651231613.', 0, ''),
(75, '', 'assets/images/uploaded/slika1651231703.', 0, ''),
(76, '', 'assets/images/uploaded/slika1651231714.', 0, ''),
(77, '', 'assets/images/uploaded/slika1651231727.', 0, ''),
(78, '', 'assets/images/uploaded/slika1651231831.', 0, ''),
(79, '', 'assets/images/uploaded/slika1651231926.', 0, ''),
(80, '', 'assets/images/uploaded/slika1651244358.', 0, 'Rihana.'),
(81, '', 'assets/images/uploaded/slika1651250471.', 0, 'Rihana.'),
(82, '', 'assets/images/uploaded/slika1651250643.', 0, 'Rihana.'),
(83, 'image/jpeg', 'assets/images/uploaded/slika1651250906.jpeg', 18, 'Rihana.'),
(84, 'image/jpeg', 'assets/images/uploaded/slika1651259978.jpeg', 19, 'asdasdasdas'),
(85, '', 'assets/images/uploaded/slika1651785225.', 0, 'asdasdasdas'),
(86, '', 'assets/images/uploaded/slika1651785330.', 0, 'Rihana.'),
(87, '', 'assets/images/uploaded/slika1651785418.', 0, 'Jack Lin. New record of likes on Instagram!'),
(88, 'image/jpeg', 'assets/images/uploaded/slika1693970919.jpeg', 18, 'Rihana.'),
(89, 'image/jpeg', 'assets/images/uploaded/slika1693970935.jpeg', 19, 'asdasdasdas'),
(90, 'image/jpeg', 'assets/images/uploaded/slika1693971067.jpeg', 56, 'Jack Lin. New record of likes on Instagram!'),
(91, 'image/jpeg', 'assets/images/uploaded/slika1694033807.jpeg', 294, 'Opis'),
(92, 'image/jpeg', 'assets/images/uploaded/slika1694035753.jpeg', 90, 'Opis');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id_question` int(255) NOT NULL,
  `text_questionnaire` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id_question`, `text_questionnaire`) VALUES
(6, 'Da li mislite da je nepohodno uvodjenje obavezno sluzenje vojnog roka ?'),
(5, 'Da li nas portal objavljuje vesti na vreme ?'),
(3, 'Da li smartrate nase vesti validnim i informacije koje delimo relevantnim ? '),
(2, 'Da li vam se svdja nacin rada naseg prortala ?'),
(1, 'Da li vam se svidja dizajn naseg portala. ?'),
(4, 'Koji je vas stav povodom rata u Ukrajni ?');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(3) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `name`) VALUES
(1, 'user'),
(2, 'moderator'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` int(255) NOT NULL DEFAULT '0',
  `vkey` varchar(255) NOT NULL,
  `ban` int(255) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `favorite_category` int(255) NOT NULL,
  `id_role` int(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `first_name`, `last_name`, `email`, `password`, `active`, `vkey`, `ban`, `date_created`, `favorite_category`, `id_role`) VALUES
(11, 'Marko', 'Dasic', 'markodasic70@gmail.com', '5269e164dae56f63c5f7a87bc545f444', 0, '34071a7a5e68d477a89f296fb8344f84', 0, '2022-04-21 20:52:25', 1, 3),
(12, 'Pera Perke', 'Peric', 'pera@gmail.com', '5269e164dae56f63c5f7a87bc545f444', 0, '1107d2867c621bdb86b0fed6c2515032', 1, '2022-04-21 22:33:20', 9, 1),
(14, 'Mika', 'Mikic', 'mika@gmail.com', '6ff1ecdc5794fb10bf7e3088f2d07da5', 0, 'b80be705c13b9e1ea531cbf7466b7235', 1, '2022-04-27 21:17:10', 9, 1),
(15, 'Patak', 'Daca', 'patak@gmail.com', '6ff1ecdc5794fb10bf7e3088f2d07da5', 0, '82a8cf7140133bb405be0abca37faef1', 1, '2022-04-27 21:19:10', 1, 1),
(16, 'Moderator', 'Moderator', 'moderator@gmai.com', '5269e164dae56f63c5f7a87bc545f444', 0, 'f0ea1da95b1fe333726d00f67f15a188', 0, '2022-04-30 10:24:37', 1, 2),
(18, 'Marko', 'Dasic', 'marko.dasic.110.20@ict.edu.rs', '5269e164dae56f63c5f7a87bc545f444', 0, '27f1a8b987dfd24124380a2fdcaa59f7', 0, '2023-09-06 21:19:51', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_answer_questions`
--

CREATE TABLE `user_answer_questions` (
  `id_user_answer_questions` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `id_question` int(255) NOT NULL,
  `id_answer` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_answer_questions`
--

INSERT INTO `user_answer_questions` (`id_user_answer_questions`, `id_user`, `id_question`, `id_answer`) VALUES
(57, 11, 2, 17),
(58, 11, 3, 5),
(59, 11, 4, 8),
(60, 11, 5, 11),
(61, 11, 6, 14),
(86, 14, 6, 15),
(87, 14, 5, 13),
(88, 14, 3, 7),
(89, 14, 2, 18),
(90, 14, 1, 2),
(91, 14, 4, 9),
(92, 15, 6, 16),
(93, 15, 5, 13),
(94, 15, 3, 6),
(95, 15, 2, 19),
(96, 15, 1, 4),
(97, 15, 4, 10),
(98, 18, 6, 15),
(99, 18, 5, 12),
(100, 18, 3, 6),
(101, 18, 2, 18),
(102, 18, 1, 2),
(103, 18, 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user_like`
--

CREATE TABLE `user_like` (
  `id_user_like` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `id_vest` int(255) NOT NULL,
  `is_liked` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_like`
--

INSERT INTO `user_like` (`id_user_like`, `id_user`, `id_vest`, `is_liked`) VALUES
(1, 11, 1, 1),
(2, 11, 8, 1),
(3, 14, 1, 0),
(24, 14, 2, 0),
(25, 11, 16, 1),
(26, 11, 10, 0),
(27, 11, 15, 1),
(28, 11, 5, 1),
(29, 18, 14, 1),
(30, 18, 8, 1),
(31, 18, 1, 0),
(32, 18, 15, 1),
(33, 18, 4, 1),
(34, 11, 4, 1),
(35, 16, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vest`
--

CREATE TABLE `vest` (
  `id_vest` int(255) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(5000) NOT NULL,
  `ban` int(2) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `id_author` int(255) NOT NULL,
  `id_image` int(255) NOT NULL,
  `id_category` int(255) NOT NULL,
  `id_vest_type` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vest`
--

INSERT INTO `vest` (`id_vest`, `title`, `date`, `description`, `ban`, `active`, `id_author`, `id_image`, `id_category`, `id_vest_type`) VALUES
(1, 'Coronavirus Outbreak LIVE Updates: ICSE, CBSE ExamsPostponed', '2022-04-21 22:54:41', 'uneti naknadno opis vesti', 0, 0, 11, 1, 1, 1),
(2, 'Virus Kills Member Of Advising Iran’s Supreme', '2022-04-22 13:55:48', 'Virus Kills Member Of Advising Iran’s SupremeVirus Kills Member Of Advising Iran’s SupremeVirus Kills Member Of Advising Iran’s SupremeVirus Kills Member Of Advising Iran’s Supreme', 0, 0, 11, 2, 3, 2),
(3, 'Virus Kills Member Of Advising Iran’s Supreme', '2022-04-22 13:57:00', 'Virus Kills Member Of Advising Iran’s SupremeVirus Kills Member Of Advising Iran’s SupremeVirus Kills Member Of Advising Iran’s SupremeVirus Kills Member Of Advising Iran’s SupremeVirus Kills Member Of Advising Iran’s Supreme', 0, 0, 11, 3, 3, 2),
(4, 'South Korea’s Moon Jae-in sworn in vowing to address North.', '2022-04-22 14:44:04', 'South Korea’s Moon Jae-in sworn in vowing to address NorthSouth Korea’s Moon Jae-in sworn in vowing to address NorthSouth Korea’s Moon Jae-in sworn in vowing to address NorthSouth Korea’s Moon Jae-in sworn in vowing to address NorthSouth Korea’s Moon Jae-in sworn in vowing to address NorthSouth Korea’s Moon Jae-in sworn in vowing to address North', 0, 0, 11, 5, 1, 3),
(5, 'No charges over 2017 Conservative battle bus cases', '2022-04-22 14:44:29', 'No charges over 2017 Conservative battle bus casesNo charges over 2017 Conservative battle bus casesNo charges over 2017 Conservative battle bus casesNo charges over 2017 Conservative battle bus casesNo charges over 2017 Conservative battle bus casesNo charges over 2017 Conservative battle bus cases', 0, 0, 11, 6, 1, 3),
(6, 'Kaine: Trump Jr. may have committed treason', '2022-04-22 14:44:58', 'Kaine: Trump Jr. may have committed treasonKaine: Trump Jr. may have committed treasonKaine: Trump Jr. may have committed treasonKaine: Trump Jr. may have committed treasonKaine: Trump Jr. may have committed treasonKaine: Trump Jr. may have committed treason', 0, 0, 11, 7, 1, 3),
(7, 'Ecology Demostration at Belgrade because of polution.', '2022-04-22 21:41:31', 'Ecology Demostration at Belgrade because of polution.Ecology Demostration at Belgrade because of polution.Ecology Demostration at Belgrade because of polution.Ecology Demostration at Belgrade because of polution.Ecology Demostration at Belgrade because of polution.', 0, 0, 11, 9, 4, 4),
(8, 'Ecology Demostration at Australia because of polution.', '2022-04-22 21:43:48', 'Ecology Demostration at Australia because of polution.Ecology Demostration at Australia because of polution.Ecology Demostration at Australia because of polution.Ecology Demostration at Australia because of polution.Ecology Demostration at Australia because of polution.', 0, 0, 11, 10, 4, 4),
(9, 'Politics riots wide France! This is resons, look at it!', '2022-04-22 21:46:22', 'Politics riots wide France!Politics riots wide France!Politics riots wide France!Politics riots wide France!Politics riots wide France!Politics riots wide France!Politics riots wide France!Politics riots wide France!', 0, 0, 11, 8, 1, 4),
(10, 'Parliament meeting on the law on air pollution', '2022-04-22 21:50:10', 'Parliament meeting on the law on air pollution\r\nParliament meeting on the law on air pollution\r\nParliament meeting on the law on air pollution\r\nParliament meeting on the law on air pollution', 0, 0, 11, 11, 1, 4),
(11, 'This is new Serbian palace of justice. Look at it!', '2022-04-22 21:53:16', 'This is new Serbian palace of justice. Look at it!This is new Serbian palace of justice. Look at it!This is new Serbian palace of justice. Look at it!This is new Serbian palace of justice. Look at it!This is new Serbian palace of justice. Look at it!This is new Serbian palace of justice. Look at it!', 0, 0, 11, 12, 1, 4),
(12, 'Novak Djokovic it\'s be a new champion on Austrailan Open!', '2022-04-22 22:37:13', 'Novak Djokovic it\'s be a new champion on Austrailan Open!Novak Djokovic it\'s be a new champion on Austrailan Open!Novak Djokovic it\'s be a new champion on Austrailan Open!Novak Djokovic it\'s be a new champion on Austrailan Open!Novak Djokovic it\'s be a new champion on Austrailan Open!', 0, 0, 11, 13, 9, 2),
(13, 'The new work and travel program in Serbia.', '2022-04-23 20:27:08', 'The new work and travel program in Serbia.The new work and travel program in Serbia.The new work and travel program in Serbia.The new work and travel program in Serbia.The new work and travel program in Serbia.The new work and travel program in Serbia.', 0, 0, 11, 15, 3, 2),
(14, 'Soon to be open the new \r\nstock market in Moskva!', '2022-04-23 20:28:58', 'Soon to be open the new \r\nstock market in Moskva!Soon to be open the new \r\nstock market in Moskva!Soon to be open the new \r\nstock market in Moskva!', 0, 0, 11, 14, 3, 4),
(15, 'John edite1', '2022-04-23 20:35:07', 'Jack Lin. New record of likes on Instagram! Jack Lin. New record of likes on Instagram! Jack Lin. New record of likes on Instagram! Jack Lin. New record of likes on Instagram! Jack Lin. New record of likes on Instagram! Jack Lin. New record of likes on Instagram! ', 0, 0, 11, 90, 7, 2),
(16, 'Rihana edited 4', '2022-04-23 20:37:05', 'Rihana publish a new song!Rihana publish a new song!Rihana publish a new song!Rihana publish a new song!Rihana publish a new song!Rihana publish a new song!Rihana publish a new song!Rihana publish a new song!Rihana publish a new song!', 0, 0, 11, 88, 7, 4),
(68, 'Dzoni dep', '2022-04-29 19:19:38', 'dsfsasadasdlnf;ovdf\\\'gnioduoms;cosmepdsfsasadasdlnf;ovdf\\\'gnioduoms;cosmepdsfsasadasdlnf;ovdf\\\'gnioduoms;cosmepdsfsasadasdlnf;ovdf\\\'gnioduoms;cosmepdsfsasadasdlnf;ovdf\\\'gnioduoms;cosmepdsfsasadasdlnf;ovdf\\\'gnioduoms;cosmep', 0, 0, 11, 89, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `vest_type`
--

CREATE TABLE `vest_type` (
  `id_vest_type` int(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vest_type`
--

INSERT INTO `vest_type` (`id_vest_type`, `name`) VALUES
(1, 'Global news'),
(2, 'Fresh News'),
(3, 'Top news'),
(4, 'Other news');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id_answer`),
  ADD KEY `text_answer` (`text_answer`(768)),
  ADD KEY `id_question` (`id_question`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `comment_fk0` (`id_user`),
  ADD KEY `comment_fk1` (`id_vest`),
  ADD KEY `id_parrent` (`id_parrent`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_image`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`),
  ADD KEY `text_questionnaire` (`text_questionnaire`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `vkey` (`vkey`),
  ADD KEY `user_fk0` (`id_role`),
  ADD KEY `favorite_category` (`favorite_category`);

--
-- Indexes for table `user_answer_questions`
--
ALTER TABLE `user_answer_questions`
  ADD PRIMARY KEY (`id_user_answer_questions`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_question` (`id_question`),
  ADD KEY `id_answer` (`id_answer`);

--
-- Indexes for table `user_like`
--
ALTER TABLE `user_like`
  ADD PRIMARY KEY (`id_user_like`),
  ADD UNIQUE KEY `id_user_2` (`id_user`,`id_vest`),
  ADD UNIQUE KEY `id_user_3` (`id_user`,`id_vest`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_like` (`id_vest`),
  ADD KEY `id_vest` (`id_vest`);

--
-- Indexes for table `vest`
--
ALTER TABLE `vest`
  ADD PRIMARY KEY (`id_vest`),
  ADD KEY `vest_fk0` (`id_author`),
  ADD KEY `vest_fk1` (`id_image`),
  ADD KEY `vest_fk2` (`id_category`),
  ADD KEY `id_vest_type` (`id_vest_type`);

--
-- Indexes for table `vest_type`
--
ALTER TABLE `vest_type`
  ADD PRIMARY KEY (`id_vest_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id_answer` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_answer_questions`
--
ALTER TABLE `user_answer_questions`
  MODIFY `id_user_answer_questions` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `user_like`
--
ALTER TABLE `user_like`
  MODIFY `id_user_like` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `vest`
--
ALTER TABLE `vest`
  MODIFY `id_vest` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `vest_type`
--
ALTER TABLE `vest_type`
  MODIFY `id_vest_type` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`id_question`) REFERENCES `question` (`id_question`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_fk0` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `comment_fk1` FOREIGN KEY (`id_vest`) REFERENCES `vest` (`id_vest`),
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_parrent`) REFERENCES `comment` (`id_comment`) ON DELETE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_fk0` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`),
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`favorite_category`) REFERENCES `category` (`id_category`);

--
-- Constraints for table `user_answer_questions`
--
ALTER TABLE `user_answer_questions`
  ADD CONSTRAINT `user_answer_questions_ibfk_1` FOREIGN KEY (`id_answer`) REFERENCES `answer` (`id_answer`),
  ADD CONSTRAINT `user_answer_questions_ibfk_2` FOREIGN KEY (`id_question`) REFERENCES `question` (`id_question`);

--
-- Constraints for table `user_like`
--
ALTER TABLE `user_like`
  ADD CONSTRAINT `user_like_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `user_like_ibfk_2` FOREIGN KEY (`id_vest`) REFERENCES `vest` (`id_vest`);

--
-- Constraints for table `vest`
--
ALTER TABLE `vest`
  ADD CONSTRAINT `vest_fk0` FOREIGN KEY (`id_author`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `vest_fk1` FOREIGN KEY (`id_image`) REFERENCES `image` (`id_image`),
  ADD CONSTRAINT `vest_fk2` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`),
  ADD CONSTRAINT `vest_ibfk_1` FOREIGN KEY (`id_vest_type`) REFERENCES `vest_type` (`id_vest_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
