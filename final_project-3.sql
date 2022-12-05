-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 04, 2022 at 11:55 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_project`
--
CREATE DATABASE IF NOT EXISTS `final_project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `final_project`;

-- --------------------------------------------------------

--
-- Table structure for table `Class`
--

DROP TABLE IF EXISTS `Class`;
CREATE TABLE `Class` (
  `class_id` int(11) NOT NULL,
  `course_name` varchar(256) NOT NULL,
  `course_description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Class`
--

INSERT INTO `Class` (`class_id`, `course_name`, `course_description`) VALUES
(1, 'yo', 'yo'),
(2, 'CSCE310', 'Database Systems'),
(6, 'CSCE315', 'Programming Studio'),
(10, 'CSCE 110', 'Programming I'),
(11, 'CSCE 111', 'Introduction to Computer Science Concepts and Programming'),
(12, 'CSCE 120', 'Program Design and Concepts'),
(13, 'CSCE 121', 'Introduction to Program Design and Concepts'),
(14, 'CSCE 181', 'Introduction to Computing'),
(15, 'CSCE 221', 'Data Structures and Algorithms'),
(16, 'CSCE 222', 'Discrete Structures for Computing'),
(17, 'CSCE 312', 'Computer Organization'),
(18, 'CSCE 313', 'Introduction to Computer Systems'),
(19, 'CSCE 314', 'Programming Languages'),
(20, 'CSCE 315', 'Programming Studio'),
(21, 'CSCE 331', 'Foundations of Software Engineering'),
(22, 'CSCE 402', 'Law and Policy in Cybersecurity'),
(23, 'CSCE 410', 'Operating Systems'),
(24, 'CSCE 411', 'Design and Analysis of Algorithms'),
(25, 'CSCE 412', 'Cloud Computing'),
(26, 'CSCE 420', 'Artificial Intelligence'),
(27, 'CSCE 430', 'Problem Solving Programming Strategies'),
(28, 'CSCE 431', 'Software Engineering'),
(29, 'CSCE 432', 'Accessible Computing'),
(30, 'CSCE 435', 'Parallel Computing'),
(31, 'CSCE 436', 'Computer-Human Interaction'),
(32, 'CSCE 440', 'Quantum Algorithms'),
(33, 'CSCE 441', 'Computer Graphics'),
(34, 'CSCE 445', 'Computers and New Media'),
(35, 'CSCE 448', 'Computational Photography'),
(36, 'CSCE 449', 'Applied Cryptography'),
(37, 'CSCE 451', 'Software Reverse Engineering'),
(38, 'CSCE 456', 'Real-Time Computing'),
(39, 'CSCE 463', 'Networks and Distributed Processing'),
(40, 'CSCE 464', 'Wireless and Mobile Systems'),
(41, 'CSCE 465', 'Computer and Network Security'),
(42, 'CSCE 470', 'Information Storage and Retrieval');

-- --------------------------------------------------------

--
-- Table structure for table `Comment`
--

DROP TABLE IF EXISTS `Comment`;
CREATE TABLE `Comment` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_name` varchar(256) NOT NULL,
  `class_id` int(11) NOT NULL,
  `letterGrade` varchar(1) NOT NULL,
  `comment` varchar(256) NOT NULL,
  `professor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Comment`
--

INSERT INTO `Comment` (`comment_id`, `user_id`, `course_name`, `class_id`, `letterGrade`, `comment`, `professor_id`) VALUES
(1, 1, 'CSCE310', 2, 'A', 'asssssss', 1),
(2, 7, 'yo', 1, 'A', 'AAA', 1),
(3, 7, 'yo', 1, 'A', 'AAA', 1),
(4, 7, 'yo', 1, '', '', 1),
(5, 7, 'yo', 1, '', '', 1),
(6, 7, 'CSCE315', 6, '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Professor`
--

DROP TABLE IF EXISTS `Professor`;
CREATE TABLE `Professor` (
  `professor_id` int(11) NOT NULL,
  `firstName` varchar(256) NOT NULL,
  `email` varchar(256) DEFAULT NULL,
  `lastName` varchar(256) NOT NULL,
  `phone_number` varchar(256) DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `officeLocation` varchar(256) DEFAULT NULL,
  `yearsatSchool` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Professor`
--

INSERT INTO `Professor` (`professor_id`, `firstName`, `email`, `lastName`, `phone_number`, `password`, `officeLocation`, `yearsatSchool`) VALUES
(1, 'a', 'a@tamu.edu', 'a', 'a', 'a', 'a', 1),
(2, 'kebo', 'rwrr@tamu.edu', 'Kebo', '979', 'rwrr', 'PETE', 4),
(3, 'bettati', 'bettati@tamu.edu', 'Bettati', '979-845-5469', 'tttt', 'PETR 417', 4),
(4, 'carsile', 'carsile@tamu.edu', 'Carsile', '979-862-7928', 'hello', 'PETR 102C', 444),
(5, 'caverlee', 'caverlee@tamu.edu', 'Caverlee', '979-845-0537', 'caverlee', 'PETR 338', 34),
(6, 'chaspari', 'chaspari@tamu.edu', 'Chaspari', '979-458-2205', 'chaspari', 'PETR 329', 2),
(7, 'choe', 'choe@tamu.edu', 'Choe', '9798455466', 'choe', 'PETR 327', 44),
(8, 'silvaaaaaaaaaa', 'silva@tamu.edu', 'Da Silva', '979-458-8008', 'silva', 'PETR 227', 2),
(9, 'davis', 'davis@tamu.edu', 'Davis', '979-845-4094', 'davis', 'PETR 235', 8),
(10, 'dewitte', 'dewitte@tamu.edu', 'deWitte', '979-845-7398', 'dewitte', 'PETR 225', 10),
(11, 'garay', 'garay@tamu.edu', 'Garay', '979-845-4359', 'garay', 'PETR 429', 13),
(12, 'gu', 'gu@tamu.edu', 'Gu', '979-845-2475', 'gu', 'PETR 239', 11),
(13, 'hammond', 'hammond@tamu.edu', 'Anne Hammond', '979-324-6022', 'hammond', 'EABC 103', 34),
(14, 'jimenez', 'danile@tamu.edu', 'Jimenez', '979-845-2434', 'danile', 'PETR 205', 3),
(15, 'keyser', 'keyser@tamu.edu', 'Keyser', '979-458-0167', 'keyser', 'PETR 408', 13),
(16, 'ej', 'ej@tamu.edu', 'Kim', '979-845-3660', 'ej', 'PETR 215', 8),
(17, 'jeeun', 'kim@tamu.edu', 'Kim', '979-845-5470', 'kim', 'PETR 336', 2),
(18, 'leyk', 'leyk@tamu.edu', 'Leyk', '979-845-4456', 'leyk', 'PETR 106', 10000),
(19, 'lightfoot', 'light@tamu.edu', 'Lightfoot', '979-845-2611', 'light', 'PETR 422', 12),
(20, 'shawn', 'lup@tamu.edu', 'Lupoli', '979-845-2479', 'lup', 'PETR 113', 4),
(21, 'moore', 'moore@tamu.edu', 'Lupoli', '979-845-5475', 'moore', 'PETR 322', 14),
(22, 'ritchey', 'singapore@tamu.edu', 'Ritchey', '979-845-3510', 'singapore', 'PETR 423', 4),
(23, 'sarin', 'sarin@tamu.edu', 'Sarin', ' 979-845-4087', 'sarin', 'PETR 415', 8),
(24, 'schaefer', 'head@tamu.edu', 'Scharfer', '979-845-5820', 'head', 'PETR 102E', 12),
(25, 'shell', 'AI@tamu.edu', 'Shell', '979-845-2369', 'AI', 'PETR 315', 9),
(26, 'shipman', 'shipman@tamu.edu', 'Shipman', '979-862-3216', 'shipman', 'PETR 335', 12),
(27, 'taele', 'taele@tamu.edu', 'Taele', '979-845-7977', 'taele', 'PETR 320', 6),
(28, 'thomas', '315@tamu.edu', 'Thomas', '979-862-8877', '315', 'PETR 319', 9),
(29, 'tyagi', 'tyagi@tamu.edu', 'Tyagi', '979-845-5480', 'tyagi', 'PETR 208', 13),
(30, 'wade', 'wade@tamu.edu', 'Wade', '979-458-0480', 'wade', 'PETR 108', 5);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users` (
  `user_id` int(11) NOT NULL,
  `firstName` varchar(256) NOT NULL,
  `email` varchar(256) DEFAULT NULL,
  `lastName` varchar(256) NOT NULL,
  `phone_number` varchar(256) DEFAULT NULL,
  `gradYear` int(11) DEFAULT NULL,
  `major` varchar(256) DEFAULT NULL,
  `classifications` varchar(256) DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `userType` varchar(256) NOT NULL,
  `userName` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`user_id`, `firstName`, `email`, `lastName`, `phone_number`, `gradYear`, `major`, `classifications`, `password`, `userType`, `userName`) VALUES
(1, 'Adam', 'adamsulemanji@tamu.edu', 'Sulemanji', '7133609175', 2024, 'Computer Science', 'Junior', 'twist123', 'Student', 'adamsulemanji'),
(7, 'Nikki', 'nikkiraddd@tamu.edu', 'Rad', '8326129437', 2024, 'Computer Science', 'Junior', 'hehe', 'Student', 'nikki'),
(9, 'joe', 'joemama', 'mama', '66666', 234, 'Yo momma', 'Senior', 'joe', 'Student', 'joe'),
(10, 'James', 'j@tamu.edu', 'Evans', '555', 2024, 'CS', 'Junior', '123', 'Student', 'jamesevans'),
(11, 'Andrew', 'andrewmao@tamu.edu', 'Mao', '2688361749', 2024, 'Computer Science', 'Sophomore', 'recorder', 'Student', 'andrewdoubleu'),
(12, 'Rohit', 'rohitsandur@tamu.edu', 'Sandur', '7177177492', 2024, 'Computer Science', 'Junior', 'rohit', 'Student', 'rohitsandur'),
(13, 'Yuning', 'yuning@tamu.edu', 'Zhang', '9878367295', 2024, 'Computer Science', 'Junior', 'yuning', 'Student', 'yuning');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Class`
--
ALTER TABLE `Class`
  ADD PRIMARY KEY (`class_id`),
  ADD UNIQUE KEY `course_name` (`course_name`);

--
-- Indexes for table `Comment`
--
ALTER TABLE `Comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `professor_id` (`professor_id`);

--
-- Indexes for table `Professor`
--
ALTER TABLE `Professor`
  ADD PRIMARY KEY (`professor_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Class`
--
ALTER TABLE `Class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `Comment`
--
ALTER TABLE `Comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Professor`
--
ALTER TABLE `Professor`
  MODIFY `professor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `Class` (`class_id`),
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`professor_id`) REFERENCES `Professor` (`professor_id`);
COMMIT;
-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 04, 2022 at 11:55 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_project`
--
CREATE DATABASE IF NOT EXISTS `final_project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `final_project`;

-- --------------------------------------------------------

--
-- Table structure for table `Class`
--

DROP TABLE IF EXISTS `Class`;
CREATE TABLE `Class` (
  `class_id` int(11) NOT NULL,
  `course_name` varchar(256) NOT NULL,
  `course_description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Class`
--

INSERT INTO `Class` (`class_id`, `course_name`, `course_description`) VALUES
(1, 'yo', 'yo'),
(2, 'CSCE310', 'Database Systems'),
(6, 'CSCE315', 'Programming Studio'),
(10, 'CSCE 110', 'Programming I'),
(11, 'CSCE 111', 'Introduction to Computer Science Concepts and Programming'),
(12, 'CSCE 120', 'Program Design and Concepts'),
(13, 'CSCE 121', 'Introduction to Program Design and Concepts'),
(14, 'CSCE 181', 'Introduction to Computing'),
(15, 'CSCE 221', 'Data Structures and Algorithms'),
(16, 'CSCE 222', 'Discrete Structures for Computing'),
(17, 'CSCE 312', 'Computer Organization'),
(18, 'CSCE 313', 'Introduction to Computer Systems'),
(19, 'CSCE 314', 'Programming Languages'),
(20, 'CSCE 315', 'Programming Studio'),
(21, 'CSCE 331', 'Foundations of Software Engineering'),
(22, 'CSCE 402', 'Law and Policy in Cybersecurity'),
(23, 'CSCE 410', 'Operating Systems'),
(24, 'CSCE 411', 'Design and Analysis of Algorithms'),
(25, 'CSCE 412', 'Cloud Computing'),
(26, 'CSCE 420', 'Artificial Intelligence'),
(27, 'CSCE 430', 'Problem Solving Programming Strategies'),
(28, 'CSCE 431', 'Software Engineering'),
(29, 'CSCE 432', 'Accessible Computing'),
(30, 'CSCE 435', 'Parallel Computing'),
(31, 'CSCE 436', 'Computer-Human Interaction'),
(32, 'CSCE 440', 'Quantum Algorithms'),
(33, 'CSCE 441', 'Computer Graphics'),
(34, 'CSCE 445', 'Computers and New Media'),
(35, 'CSCE 448', 'Computational Photography'),
(36, 'CSCE 449', 'Applied Cryptography'),
(37, 'CSCE 451', 'Software Reverse Engineering'),
(38, 'CSCE 456', 'Real-Time Computing'),
(39, 'CSCE 463', 'Networks and Distributed Processing'),
(40, 'CSCE 464', 'Wireless and Mobile Systems'),
(41, 'CSCE 465', 'Computer and Network Security'),
(42, 'CSCE 470', 'Information Storage and Retrieval');

-- --------------------------------------------------------

--
-- Table structure for table `Comment`
--

DROP TABLE IF EXISTS `Comment`;
CREATE TABLE `Comment` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_name` varchar(256) NOT NULL,
  `class_id` int(11) NOT NULL,
  `letterGrade` varchar(1) NOT NULL,
  `comment` varchar(256) NOT NULL,
  `professor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Comment`
--

INSERT INTO `Comment` (`comment_id`, `user_id`, `course_name`, `class_id`, `letterGrade`, `comment`, `professor_id`) VALUES
(1, 1, 'CSCE310', 2, 'A', 'asssssss', 1),
(2, 7, 'yo', 1, 'A', 'AAA', 1),
(3, 7, 'yo', 1, 'A', 'AAA', 1),
(4, 7, 'yo', 1, '', '', 1),
(5, 7, 'yo', 1, '', '', 1),
(6, 7, 'CSCE315', 6, '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Professor`
--

DROP TABLE IF EXISTS `Professor`;
CREATE TABLE `Professor` (
  `professor_id` int(11) NOT NULL,
  `firstName` varchar(256) NOT NULL,
  `email` varchar(256) DEFAULT NULL,
  `lastName` varchar(256) NOT NULL,
  `phone_number` varchar(256) DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `officeLocation` varchar(256) DEFAULT NULL,
  `yearsatSchool` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Professor`
--

INSERT INTO `Professor` (`professor_id`, `firstName`, `email`, `lastName`, `phone_number`, `password`, `officeLocation`, `yearsatSchool`) VALUES
(1, 'a', 'a@tamu.edu', 'a', 'a', 'a', 'a', 1),
(2, 'kebo', 'rwrr@tamu.edu', 'Kebo', '979', 'rwrr', 'PETE', 4),
(3, 'bettati', 'bettati@tamu.edu', 'Bettati', '979-845-5469', 'tttt', 'PETR 417', 4),
(4, 'carsile', 'carsile@tamu.edu', 'Carsile', '979-862-7928', 'hello', 'PETR 102C', 444),
(5, 'caverlee', 'caverlee@tamu.edu', 'Caverlee', '979-845-0537', 'caverlee', 'PETR 338', 34),
(6, 'chaspari', 'chaspari@tamu.edu', 'Chaspari', '979-458-2205', 'chaspari', 'PETR 329', 2),
(7, 'choe', 'choe@tamu.edu', 'Choe', '9798455466', 'choe', 'PETR 327', 44),
(8, 'silvaaaaaaaaaa', 'silva@tamu.edu', 'Da Silva', '979-458-8008', 'silva', 'PETR 227', 2),
(9, 'davis', 'davis@tamu.edu', 'Davis', '979-845-4094', 'davis', 'PETR 235', 8),
(10, 'dewitte', 'dewitte@tamu.edu', 'deWitte', '979-845-7398', 'dewitte', 'PETR 225', 10),
(11, 'garay', 'garay@tamu.edu', 'Garay', '979-845-4359', 'garay', 'PETR 429', 13),
(12, 'gu', 'gu@tamu.edu', 'Gu', '979-845-2475', 'gu', 'PETR 239', 11),
(13, 'hammond', 'hammond@tamu.edu', 'Anne Hammond', '979-324-6022', 'hammond', 'EABC 103', 34),
(14, 'jimenez', 'danile@tamu.edu', 'Jimenez', '979-845-2434', 'danile', 'PETR 205', 3),
(15, 'keyser', 'keyser@tamu.edu', 'Keyser', '979-458-0167', 'keyser', 'PETR 408', 13),
(16, 'ej', 'ej@tamu.edu', 'Kim', '979-845-3660', 'ej', 'PETR 215', 8),
(17, 'jeeun', 'kim@tamu.edu', 'Kim', '979-845-5470', 'kim', 'PETR 336', 2),
(18, 'leyk', 'leyk@tamu.edu', 'Leyk', '979-845-4456', 'leyk', 'PETR 106', 10000),
(19, 'lightfoot', 'light@tamu.edu', 'Lightfoot', '979-845-2611', 'light', 'PETR 422', 12),
(20, 'shawn', 'lup@tamu.edu', 'Lupoli', '979-845-2479', 'lup', 'PETR 113', 4),
(21, 'moore', 'moore@tamu.edu', 'Lupoli', '979-845-5475', 'moore', 'PETR 322', 14),
(22, 'ritchey', 'singapore@tamu.edu', 'Ritchey', '979-845-3510', 'singapore', 'PETR 423', 4),
(23, 'sarin', 'sarin@tamu.edu', 'Sarin', ' 979-845-4087', 'sarin', 'PETR 415', 8),
(24, 'schaefer', 'head@tamu.edu', 'Scharfer', '979-845-5820', 'head', 'PETR 102E', 12),
(25, 'shell', 'AI@tamu.edu', 'Shell', '979-845-2369', 'AI', 'PETR 315', 9),
(26, 'shipman', 'shipman@tamu.edu', 'Shipman', '979-862-3216', 'shipman', 'PETR 335', 12),
(27, 'taele', 'taele@tamu.edu', 'Taele', '979-845-7977', 'taele', 'PETR 320', 6),
(28, 'thomas', '315@tamu.edu', 'Thomas', '979-862-8877', '315', 'PETR 319', 9),
(29, 'tyagi', 'tyagi@tamu.edu', 'Tyagi', '979-845-5480', 'tyagi', 'PETR 208', 13),
(30, 'wade', 'wade@tamu.edu', 'Wade', '979-458-0480', 'wade', 'PETR 108', 5);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users` (
  `user_id` int(11) NOT NULL,
  `firstName` varchar(256) NOT NULL,
  `email` varchar(256) DEFAULT NULL,
  `lastName` varchar(256) NOT NULL,
  `phone_number` varchar(256) DEFAULT NULL,
  `gradYear` int(11) DEFAULT NULL,
  `major` varchar(256) DEFAULT NULL,
  `classifications` varchar(256) DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `userType` varchar(256) NOT NULL,
  `userName` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`user_id`, `firstName`, `email`, `lastName`, `phone_number`, `gradYear`, `major`, `classifications`, `password`, `userType`, `userName`) VALUES
(1, 'Adam', 'adamsulemanji@tamu.edu', 'Sulemanji', '7133609175', 2024, 'Computer Science', 'Junior', 'twist123', 'Student', 'adamsulemanji'),
(7, 'Nikki', 'nikkiraddd@tamu.edu', 'Rad', '8326129437', 2024, 'Computer Science', 'Junior', 'hehe', 'Student', 'nikki'),
(9, 'joe', 'joemama', 'mama', '66666', 234, 'Yo momma', 'Senior', 'joe', 'Student', 'joe'),
(10, 'James', 'j@tamu.edu', 'Evans', '555', 2024, 'CS', 'Junior', '123', 'Student', 'jamesevans'),
(11, 'Andrew', 'andrewmao@tamu.edu', 'Mao', '2688361749', 2024, 'Computer Science', 'Sophomore', 'recorder', 'Student', 'andrewdoubleu'),
(12, 'Rohit', 'rohitsandur@tamu.edu', 'Sandur', '7177177492', 2024, 'Computer Science', 'Junior', 'rohit', 'Student', 'rohitsandur'),
(13, 'Yuning', 'yuning@tamu.edu', 'Zhang', '9878367295', 2024, 'Computer Science', 'Junior', 'yuning', 'Student', 'yuning');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Class`
--
ALTER TABLE `Class`
  ADD PRIMARY KEY (`class_id`),
  ADD UNIQUE KEY `course_name` (`course_name`);

--
-- Indexes for table `Comment`
--
ALTER TABLE `Comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `professor_id` (`professor_id`);

--
-- Indexes for table `Professor`
--
ALTER TABLE `Professor`
  ADD PRIMARY KEY (`professor_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Class`
--
ALTER TABLE `Class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `Comment`
--
ALTER TABLE `Comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Professor`
--
ALTER TABLE `Professor`
  MODIFY `professor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `Class` (`class_id`),
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`professor_id`) REFERENCES `Professor` (`professor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;