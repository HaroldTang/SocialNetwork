-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 16, 2019 at 03:20 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `SocialNetwork`
--
CREATE DATABASE IF NOT EXISTS `SocialNetwork` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `SocialNetwork`;

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `event_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `audio`
--

CREATE TABLE `audio` (
  `id` int(11) NOT NULL,
  `audio_type` varchar(25) NOT NULL,
  `audio_path` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `audio`
--

INSERT INTO `audio` (`id`, `audio_type`, `audio_path`) VALUES
(3, 'mp3', ''),
(5, 'mp3', ''),
(6, 'mp3', ''),
(7, 'audio/mp3', 'upload/1.mp3'),
(8, 'audio/mp3', 'upload/2.mp3'),
(9, 'audio/mp3', 'upload/3.mp3'),
(10, 'audio/mp3', 'upload/4.mp3'),
(11, 'audio/mp3', 'upload/5.mp3'),
(12, 'audio/mp3', 'upload/6.mp3'),
(13, 'audio/mp3', 'upload/7.mp3'),
(14, 'audio/mp3', 'upload/8.mp3'),
(15, 'audio/mp3', 'upload/9.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `comment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `likelocation`
--

CREATE TABLE `likelocation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `likepost`
--

CREATE TABLE `likepost` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likepost`
--

INSERT INTO `likepost` (`id`, `post_id`, `user_id`) VALUES
(1, 69, 3),
(2, 62, 3),
(3, 50, 3),
(4, 72, 3),
(5, 66, 3),
(6, 65, 3),
(7, 60, 3),
(8, 77, 1),
(9, 80, 3),
(10, 84, 4),
(11, 82, 4),
(12, 80, 4),
(13, 79, 4),
(14, 85, 1),
(15, 81, 11);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `location_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `latitude`, `longitude`, `location_name`) VALUES
(6, 40.692424, -73.9820699, 'Eagle'),
(7, 40.692424, -73.9820699, 'Eagle'),
(8, 0, 0, 'Eagle'),
(9, 40.692424, -73.9820699, 'Different location'),
(10, 40.692589999999996, -73.9822183, 'Different location 2'),
(11, 0, 0, 'Eagle ggg'),
(12, 40.6935352, -73.98233340000002, 'Different location'),
(13, 40.690483199999996, -73.9770368, 'Eagle'),
(14, 40.693488699999996, -73.982261, 'My Home'),
(15, 40.6934539, -73.98568089999999, 'School'),
(16, 0, 0, 'Tandon library'),
(17, 0, 0, 'School'),
(18, 40.6945139, -73.98559809999999, 'hi'),
(19, 40.6945139, -73.98559809999999, 'Current location'),
(20, 40.694494299999995, -73.9856156, 'Tandon'),
(21, 40.694494299999995, -73.9856156, 'School'),
(22, 40.6944812, -73.98561959999999, 'tandon1'),
(23, 40.6944686, -73.985585, 'www');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `photo_type` varchar(25) NOT NULL,
  `photo_path` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `photo_type`, `photo_path`) VALUES
(9, 'jpeg', ''),
(10, 'jpeg', ''),
(11, 'jpeg', ''),
(12, 'png', ''),
(13, 'jpeg', ''),
(14, 'jpeg', ''),
(15, 'jpeg', ''),
(16, 'image/jpeg', ''),
(17, 'image/jpeg', ''),
(18, 'image/jpeg', ''),
(19, 'image/jpeg', ''),
(20, 'image/jpeg', ''),
(21, 'image/jpeg', ''),
(22, 'image/jpeg', ''),
(23, 'image/jpeg', ''),
(24, 'image/jpeg', ''),
(25, 'image/jpeg', ''),
(26, 'image/png', 'upload/下载.png'),
(27, 'image/jpeg', 'upload/NY.jpeg'),
(28, 'image/jpeg', 'upload/NY.jpeg'),
(29, 'image/jpeg', 'upload/fog.jpg'),
(30, 'image/jpeg', 'upload/rdr2_officialart_3840x2160.jpg'),
(31, 'image/jpeg', 'upload/rdr2_officialart_3840x2160.jpg'),
(32, 'image/jpeg', 'upload/1.jpg'),
(33, 'image/jpeg', 'upload/1.jpeg'),
(34, 'image/jpeg', 'upload/2.jpeg'),
(35, 'image/jpeg', 'upload/4.jpeg'),
(36, 'image/jpeg', 'upload/4.jpeg'),
(37, 'image/jpeg', 'upload/3.jpeg'),
(38, 'image/png', 'upload/blog-1.png'),
(39, 'image/png', 'upload/bw-3.png'),
(40, 'image/jpeg', 'upload/hero1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `text_content` varchar(2000) DEFAULT NULL,
  `visibility` int(11) NOT NULL,
  `post_user` int(11) NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `location_id` int(11) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL,
  `photo_id` int(11) DEFAULT NULL,
  `audio_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `text_content`, `visibility`, `post_user`, `post_time`, `location_id`, `video_id`, `photo_id`, `audio_id`) VALUES
(12, 'Today\'s Diary', 'Please Help Me for the DB project! I have done some parts of it but it seems so huge and I can\'t finish it in time. So sad!', 1, 1, '2019-05-11 00:32:39', NULL, NULL, NULL, NULL),
(13, 'HI', 'HI everyone, I want to play a game.', 3, 3, '2019-05-11 02:41:20', NULL, NULL, NULL, NULL),
(14, 'Publish Test', 'TESTTESTTESTTEST', 2, 3, '2019-05-11 03:29:52', NULL, NULL, NULL, NULL),
(15, 'Work Progress', 'I have done this project for two late night.\r\nFirst, I finished the webpage for main timeline, now I can get all friends and friends of friends\' post and display it.\r\nThen in this afternoon, I finished the edit profile part. Now I can set username, password, real_name, city, age to update the user\'s information.\r\nFor Tomorrow\'s goal, I want to finish the upload file process, including pics, videos, sounds. Then I want to complete the location part and refine my database design because I don\'t need location of building anymore.\r\nFor rest, I need to finish the add friend part, location part, comment part, search part, activity part(some change to the diary part is enough) and the like part. If I have extra time, I would consider adding the relative location part.', 3, 3, '2019-05-11 06:31:32', NULL, NULL, NULL, NULL),
(33, 'Ice hockey playing', 'Please play with us using the ICE Hockey Bar. (PS: with this music)', 1, 1, '2019-05-11 19:27:32', NULL, NULL, NULL, 3),
(34, 'Test Information br', 'brbrb\r\nbrbrbrb\r\nbrbrbrbrbbr', 1, 1, '2019-05-11 19:46:17', NULL, 6, NULL, NULL),
(38, 'Post with picture', 'Hello, this is very beautiful!', 1, 3, '2019-05-11 21:00:05', NULL, NULL, 9, NULL),
(39, 'Test Information image', '213asd\r\nasdada', 1, 3, '2019-05-11 21:16:00', NULL, NULL, 10, NULL),
(40, 'adfadfasdfafd', 'aca sd casd c as', 1, 3, '2019-05-11 21:24:22', NULL, NULL, 11, NULL),
(41, '1', '2', 1, 3, '2019-05-11 21:42:55', NULL, NULL, 12, NULL),
(42, 'Test Informationcas ', 'asd cads csa dc', 1, 3, '2019-05-11 21:54:04', NULL, NULL, 13, NULL),
(43, 'Test Information', 'iiiii', 1, 3, '2019-05-11 21:59:13', NULL, NULL, 14, NULL),
(44, 'Test Information', 'qweqweqe', 1, 3, '2019-05-11 21:59:54', NULL, NULL, 15, NULL),
(45, 'Test Information', 'asdas d asas . ', 2, 3, '2019-05-11 22:27:51', NULL, NULL, 16, NULL),
(46, 'asdfasd', 'asdcasdcz xw qw ', 1, 3, '2019-05-11 22:41:08', NULL, NULL, NULL, 5),
(47, 'Stong SAISD', 'cdsa csda aef', 1, 3, '2019-05-11 23:33:05', NULL, NULL, NULL, NULL),
(48, 'HI', 'ad dfadf adfwef', 1, 3, '2019-05-11 23:34:49', NULL, NULL, NULL, 6),
(50, 'Today\'s Diary gaobudingle', 'haoqio ', 1, 3, '2019-05-12 06:10:13', 10, NULL, NULL, NULL),
(51, 'Today\'s Diary gaobudingle', 'haoqio ', 1, 3, '2019-05-12 06:12:47', 10, NULL, NULL, NULL),
(52, 'Harold Report', '23 hour and half to submit this project, I am a little nervous and have some work still need to be done.', 1, 8, '2019-05-12 23:40:46', NULL, 7, NULL, NULL),
(53, 'Test Information 121asda', 'axxxxxxxxx', 2, 3, '2019-05-13 03:11:55', NULL, NULL, NULL, NULL),
(54, 'Test Information', '1111', 1, 3, '2019-05-13 03:28:42', NULL, NULL, 17, NULL),
(55, '1111111', '1111111', 1, 3, '2019-05-13 03:29:24', NULL, NULL, 18, NULL),
(56, 'Test Information', '1111', 1, 3, '2019-05-13 03:38:42', NULL, NULL, 19, NULL),
(57, 'Test Information', 'pppppppp', 1, 3, '2019-05-13 03:46:23', NULL, NULL, 20, NULL),
(58, 'Picture Test', 'Test1111', 1, 3, '2019-05-13 04:05:37', NULL, NULL, 21, NULL),
(59, 'Test Information', '11', 2, 3, '2019-05-13 04:13:03', NULL, NULL, 22, NULL),
(60, 'adfadf', '111111111', 3, 3, '2019-05-13 04:14:05', 12, NULL, 23, NULL),
(61, 'Today\'s Diary gaobudingleasd . fas', 'f da s asddd', 3, 3, '2019-05-13 04:17:41', 13, NULL, 24, NULL),
(62, 'Today\'s Diary gaobudingleasd . fas', 'f da s asddd', 3, 3, '2019-05-13 04:18:12', 13, NULL, 25, NULL),
(63, 'adfadf', 'ads ad a sd ', 1, 3, '2019-05-13 04:31:51', NULL, NULL, 26, NULL),
(64, 'adfadf', '111111', 3, 3, '2019-05-13 04:37:59', NULL, NULL, 27, NULL),
(65, 'Test Information', '1', 3, 3, '2019-05-13 04:38:24', NULL, NULL, 28, NULL),
(66, 'Test Information', '1', 3, 3, '2019-05-13 04:39:40', NULL, NULL, 29, NULL),
(67, '11111', 'video test', 1, 3, '2019-05-13 04:50:35', NULL, 8, NULL, NULL),
(68, 'With MUSIC!', 'I have done this project for two late night.\r\nFirst, I finished the webpage for main timeline, now I can get all friends and friends of friends\' post and display it.\r\nThen in this afternoon, I finished the edit profile part. Now I can set username, password, real_name, city, age to update the user\'s information.\r\nFor Tomorrow\'s goal, I want to finish the upload file process, including pics, videos, sounds. Then I want to complete the location part and refine my database design because I don\'t need location of building anymore.\r\nFor rest, I need to finish the add friend part, location part, comment part, search part, activity part(some change to the diary part is enough) and the like part. If I have extra time, I would consider adding the relative location part.', 3, 3, '2019-05-13 04:54:26', NULL, NULL, NULL, 7),
(69, 'adfadf', '00', 2, 3, '2019-05-13 05:35:35', NULL, NULL, 31, NULL),
(71, 'Test Information', '11111', 3, 3, '2019-05-13 13:51:30', NULL, 9, NULL, NULL),
(72, 'Here I am', 'Come to class!', 2, 3, '2019-05-13 18:11:26', 15, NULL, 33, NULL),
(73, '111', '1111', 3, 3, '2019-05-13 18:28:18', NULL, NULL, 34, NULL),
(74, 'Publish', 'Test', 3, 2, '2019-05-13 18:49:17', NULL, NULL, 36, NULL),
(77, 'In library', 'May I have your attention please', 3, 1, '2019-05-13 22:33:34', 18, NULL, 40, NULL),
(78, 'Some where else', 'Please input text\r\nWith music', 1, 1, '2019-05-13 22:35:16', NULL, NULL, NULL, 8),
(79, 'Please include some video', 'Here are some video', 1, 1, '2019-05-13 22:37:09', NULL, 10, NULL, NULL),
(80, 'Publish', 'Here are some music type.', 2, 3, '2019-05-13 22:38:43', NULL, NULL, NULL, 9),
(81, 'Please include some position', 'Location in tandon library\r\nPlease include a file', 3, 3, '2019-05-13 22:39:30', 20, NULL, NULL, NULL),
(82, 'Position with file', 'File with position', 3, 3, '2019-05-13 22:40:11', 21, NULL, NULL, 10),
(83, 'Publish', 'Publish some information', 2, 11, '2019-05-13 22:41:37', NULL, NULL, NULL, 11),
(84, 'Please with some information', 'From Ding!', 2, 4, '2019-05-13 22:43:11', NULL, NULL, NULL, 12),
(85, 'Test Information', '1111', 2, 1, '2019-05-13 23:51:48', 22, NULL, NULL, 13),
(86, 'qz', 'q', 3, 11, '2019-05-14 00:05:04', 23, NULL, NULL, 14),
(87, 'Test Information', '我永远喜欢霞霞.jpg', 3, 1, '2019-05-14 00:47:58', NULL, NULL, NULL, 15);

-- --------------------------------------------------------

--
-- Table structure for table `relation`
--

CREATE TABLE `relation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `visibility` int(11) NOT NULL,
  `request_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `relation`
--

INSERT INTO `relation` (`id`, `user_id`, `friend_id`, `status`, `visibility`, `request_time`) VALUES
(1, 1, 2, 'friend', 2, '2019-04-13 19:59:36'),
(2, 2, 1, 'friend', 2, '2019-04-13 20:52:11'),
(3, 1, 3, 'friend', 1, '2019-04-13 20:57:45'),
(4, 1, 4, 'friend', 3, '2019-04-13 20:57:45'),
(5, 3, 1, 'friend', 1, '2019-04-13 20:57:45'),
(6, 2, 4, 'friend', 2, '2019-04-13 20:57:45'),
(7, 4, 2, 'friend', 2, '2019-04-13 20:57:45'),
(13, 4, 1, 'friend', 3, '2019-04-14 18:47:11'),
(14, 1, 5, 'friend', 2, '2019-04-14 18:48:32'),
(15, 5, 1, 'friend', 2, '2019-04-16 01:05:07'),
(17, 3, 4, 'friend', 3, '2019-05-12 22:00:18'),
(18, 3, 5, 'friend', 3, '2019-05-12 22:15:55'),
(19, 5, 3, 'friend', 3, '2019-05-12 22:16:30'),
(20, 2, 3, 'pending', 3, '2019-05-12 22:55:56'),
(21, 11, 3, 'friend', 3, '2019-05-12 23:31:32'),
(23, 11, 1, 'friend', 3, '2019-05-12 23:32:48'),
(24, 11, 8, 'friend', 3, '2019-05-12 23:35:33'),
(25, 8, 11, 'friend', 3, '2019-05-12 23:36:45'),
(26, 11, 10, 'pending', 3, '2019-05-12 23:42:06'),
(28, 3, 8, 'friend', 3, '2019-05-13 00:05:10'),
(29, 8, 3, 'friend', 3, '2019-05-13 00:10:09'),
(30, 1, 8, 'pending', 3, '2019-05-13 01:02:54'),
(31, 3, 11, 'friend', 3, '2019-05-13 04:57:12'),
(32, 4, 8, 'pending', 3, '2019-05-13 18:36:00'),
(33, 4, 5, 'pending', 3, '2019-05-13 18:47:42'),
(34, 1, 11, 'friend', 3, '2019-05-13 22:23:14'),
(35, 4, 3, 'friend', 3, '2019-05-13 22:43:47'),
(36, 4, 11, 'friend', 3, '2019-05-13 23:54:22'),
(37, 11, 4, 'friend', 3, '2019-05-13 23:57:41');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `real_name` varchar(30) DEFAULT NULL,
  `age` int(11) NOT NULL DEFAULT '0',
  `city` varchar(30) DEFAULT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `real_name`, `age`, `city`, `last_login`) VALUES
(1, 'tom0125', '12345', 'Tom Johnson', 888, 'New York', '2019-05-14 00:49:10'),
(2, 'amy001', '23456', 'Amy Wong', 20, 'Paris', '2019-05-13 18:48:12'),
(3, 'JACKACO', '123456', 'Jack Sparrow', 12, 'Shanghai', '2019-05-13 22:46:27'),
(4, 'Ding', 'abc123', 'Xiao Ding', 34, 'Nanjing', '2019-05-13 23:56:25'),
(5, 'jerry23', 'xyz123', 'Jerry Clark', 21, 'Tianjin', '2019-05-12 22:16:15'),
(7, 'jerry0310', 'qwerty', 'jerry Yong', 25, 'New Jersey', '2019-05-07 21:03:27'),
(8, 'harold9607', '960724', 'Xucheng Tang', 19, 'Hang Zhou', '2019-05-13 01:03:08'),
(9, 'student01', '000000', 'Student Unknown', 24, 'Unknown', '2019-05-07 21:03:27'),
(10, 'jacky1023', '1234', 'Jack Chan', 22, 'Hong Kong', '2019-05-07 21:03:27'),
(11, 'tom0000', '000000', 'Tom Holland', 21, 'Denver', '2019-05-14 00:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `usergroup`
--

CREATE TABLE `usergroup` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `member_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `video_type` varchar(25) NOT NULL,
  `video_path` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `video_type`, `video_path`) VALUES
(6, 'mp4', ''),
(7, 'video/mp4', ''),
(8, 'video/mp4', 'upload/30534.MP4'),
(9, 'video/mp4', 'upload/延时1.MP4'),
(10, 'video/mp4', 'upload/fbdfe999d8504e9d9faa598f59eef5.MP4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_id` (`from_id`),
  ADD KEY `to_id` (`to_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `likelocation`
--
ALTER TABLE `likelocation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `likepost`
--
ALTER TABLE `likepost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_user` (`post_user`),
  ADD KEY `post_ibfk_3_idx` (`video_id`),
  ADD KEY `post_ibfk_4_idx` (`photo_id`),
  ADD KEY `post_ibfk_5_idx` (`audio_id`),
  ADD KEY `post_ibfk_2` (`location_id`);

--
-- Indexes for table `relation`
--
ALTER TABLE `relation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `friend_id` (`friend_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `real_name_UNIQUE` (`real_name`);

--
-- Indexes for table `usergroup`
--
ALTER TABLE `usergroup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `activity_id` (`activity_id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `audio`
--
ALTER TABLE `audio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likelocation`
--
ALTER TABLE `likelocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likepost`
--
ALTER TABLE `likepost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `relation`
--
ALTER TABLE `relation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `usergroup`
--
ALTER TABLE `usergroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`from_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`to_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`);

--
-- Constraints for table `likelocation`
--
ALTER TABLE `likelocation`
  ADD CONSTRAINT `likelocation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `likelocation_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`);

--
-- Constraints for table `likepost`
--
ALTER TABLE `likepost`
  ADD CONSTRAINT `likepost_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`),
  ADD CONSTRAINT `likepost_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`post_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`),
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`video_id`) REFERENCES `video` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `post_ibfk_4` FOREIGN KEY (`photo_id`) REFERENCES `photo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `post_ibfk_5` FOREIGN KEY (`audio_id`) REFERENCES `audio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `relation`
--
ALTER TABLE `relation`
  ADD CONSTRAINT `relation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `relation_ibfk_2` FOREIGN KEY (`friend_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `usergroup`
--
ALTER TABLE `usergroup`
  ADD CONSTRAINT `usergroup_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `usergroup_ibfk_2` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`);
