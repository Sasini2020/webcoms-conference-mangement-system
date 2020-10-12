-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 12, 2020 at 05:06 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webcomsdb`
--
CREATE DATABASE IF NOT EXISTS `webcomsdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `webcomsdb`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `AdminEmail` varchar(150) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  PRIMARY KEY (`AdminEmail`),
  KEY `admin_to_userInfo` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `emailauthor` varchar(150) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `university` varchar(100) NOT NULL,
  `contactdetails` varchar(400) NOT NULL,
  `contactlinks` varchar(300) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  PRIMARY KEY (`emailauthor`),
  KEY `author_to_userInfo` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `camerareadycopypaper`
--

DROP TABLE IF EXISTS `camerareadycopypaper`;
CREATE TABLE IF NOT EXISTS `camerareadycopypaper` (
  `adcrcp` int(11) NOT NULL AUTO_INCREMENT,
  `paper` varchar(900) NOT NULL,
  `emailauthor` varchar(150) NOT NULL,
  `emailpubchair` varchar(150) NOT NULL,
  PRIMARY KEY (`adcrcp`),
  UNIQUE KEY `emailauthor` (`emailauthor`),
  UNIQUE KEY `emailpubchair` (`emailpubchair`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `conferencechair`
--

DROP TABLE IF EXISTS `conferencechair`;
CREATE TABLE IF NOT EXISTS `conferencechair` (
  `emailconfchair` varchar(150) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  PRIMARY KEY (`emailconfchair`),
  KEY `cc_to_userInfo` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `conferenceguidelinedetails`
--

DROP TABLE IF EXISTS `conferenceguidelinedetails`;
CREATE TABLE IF NOT EXISTS `conferenceguidelinedetails` (
  `idguideline` int(50) NOT NULL AUTO_INCREMENT,
  `details` varchar(150) NOT NULL,
  `emailconfchair` varchar(150) NOT NULL,
  PRIMARY KEY (`idguideline`),
  UNIQUE KEY `emailconfchair` (`emailconfchair`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `conferences`
--

DROP TABLE IF EXISTS `conferences`;
CREATE TABLE IF NOT EXISTS `conferences` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `venue` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `deadline_date` date NOT NULL,
  `sponsor_details` varchar(300) CHARACTER SET utf8mb4 NOT NULL,
  `Accepted` char(1) CHARACTER SET utf8mb4 NOT NULL,
  `emailconfchair` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `C_chairEmail` (`emailconfchair`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `conferencetrack`
--

DROP TABLE IF EXISTS `conferencetrack`;
CREATE TABLE IF NOT EXISTS `conferencetrack` (
  `ID` int(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `conferenceID` int(20) NOT NULL,
  `emailconfchair` varchar(150) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `connet_to_c` (`conferenceID`),
  KEY `connet_to_cchair` (`emailconfchair`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fileuploadtable`
--

DROP TABLE IF EXISTS `fileuploadtable`;
CREATE TABLE IF NOT EXISTS `fileuploadtable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) DEFAULT NULL,
  `university` varchar(50) DEFAULT NULL,
  `contactdetails` varchar(200) DEFAULT NULL,
  `otherlinks` varchar(200) DEFAULT NULL,
  `target_file` varchar(5000) DEFAULT NULL,
  `idrp` int(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idrp` (`idrp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notificationtemplates`
--

DROP TABLE IF EXISTS `notificationtemplates`;
CREATE TABLE IF NOT EXISTS `notificationtemplates` (
  `idtemplate` int(50) NOT NULL AUTO_INCREMENT,
  `name` int(50) NOT NULL,
  `emailconfchair` varchar(150) NOT NULL,
  PRIMARY KEY (`idtemplate`),
  UNIQUE KEY `emailconfchair` (`emailconfchair`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `idpage` int(100) NOT NULL AUTO_INCREMENT,
  `template` varchar(500) NOT NULL,
  `coverpage` varchar(500) NOT NULL,
  `subpage` varchar(500) NOT NULL,
  `emailpubchair` varchar(150) NOT NULL,
  PRIMARY KEY (`idpage`),
  UNIQUE KEY `emailpubchair` (`emailpubchair`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `papertypes`
--

DROP TABLE IF EXISTS `papertypes`;
CREATE TABLE IF NOT EXISTS `papertypes` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `Abstract` varchar(40) NOT NULL,
  `AdminEmail` varchar(150) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `AdminEmail` (`AdminEmail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `preparration`
--

DROP TABLE IF EXISTS `preparration`;
CREATE TABLE IF NOT EXISTS `preparration` (
  `idpreparation` int(150) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `emailconfchair` varchar(150) NOT NULL,
  PRIMARY KEY (`idpreparation`),
  UNIQUE KEY `emailconfchair` (`emailconfchair`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `publicationchair`
--

DROP TABLE IF EXISTS `publicationchair`;
CREATE TABLE IF NOT EXISTS `publicationchair` (
  `emailpubchair` varchar(150) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(150) NOT NULL,
  PRIMARY KEY (`emailpubchair`),
  KEY `pc_to_userInfo` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registrationpackages`
--

DROP TABLE IF EXISTS `registrationpackages`;
CREATE TABLE IF NOT EXISTS `registrationpackages` (
  `idpackage` int(150) NOT NULL AUTO_INCREMENT,
  `namepackage` varchar(100) NOT NULL,
  `emailconfchair` varchar(150) NOT NULL,
  PRIMARY KEY (`idpackage`),
  UNIQUE KEY `emailconfchair` (`emailconfchair`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `researchpaper`
--

DROP TABLE IF EXISTS `researchpaper`;
CREATE TABLE IF NOT EXISTS `researchpaper` (
  `idrp` int(150) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `abstract` varchar(150) NOT NULL,
  `numberoffiles` int(100) NOT NULL,
  `track` varchar(100) NOT NULL,
  `corautherdetails` varchar(400) NOT NULL,
  `emailreviewer` varchar(150) NOT NULL,
  `emailtrackchair` varchar(150) NOT NULL,
  `emailauthor` varchar(150) NOT NULL,
  `idpreparation` int(150) NOT NULL,
  PRIMARY KEY (`idrp`),
  UNIQUE KEY `emailreviewer` (`emailreviewer`),
  UNIQUE KEY `emailtrackchair` (`emailtrackchair`),
  UNIQUE KEY `emailauthor` (`emailauthor`),
  UNIQUE KEY `idpreparation` (`idpreparation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviewer`
--

DROP TABLE IF EXISTS `reviewer`;
CREATE TABLE IF NOT EXISTS `reviewer` (
  `emailreviewer` varchar(150) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  PRIMARY KEY (`emailreviewer`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviewerform`
--

DROP TABLE IF EXISTS `reviewerform`;
CREATE TABLE IF NOT EXISTS `reviewerform` (
  `idform` int(150) NOT NULL AUTO_INCREMENT,
  `comments` varchar(400) NOT NULL,
  `recommendation` varchar(100) NOT NULL,
  `emailreviewer` varchar(150) NOT NULL,
  `emailauthor` varchar(150) NOT NULL,
  PRIMARY KEY (`idform`),
  UNIQUE KEY `emailreviewer` (`emailreviewer`),
  UNIQUE KEY `emailauthor` (`emailauthor`),
  KEY `emailreviewer_2` (`emailreviewer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trackchair`
--

DROP TABLE IF EXISTS `trackchair`;
CREATE TABLE IF NOT EXISTS `trackchair` (
  `emailtrackchair` varchar(150) NOT NULL,
  `fullname` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  PRIMARY KEY (`emailtrackchair`),
  KEY `tc_to_userInfo` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userinfotable`
--

DROP TABLE IF EXISTS `userinfotable`;
CREATE TABLE IF NOT EXISTS `userinfotable` (
  `email` varchar(150) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userinfotable`
--

INSERT INTO `userinfotable` (`email`, `full_name`, `gender`, `user_type`, `password`) VALUES
('a@gmail.com', 'junb', 'male', 'Author', '0cc175b9c0f1b6a831c399e269772661'),
('admin@gmail.com', 'admin gimhan', 'male', 'Admin', '81dc9bdb52d04dc20036dbd8313ed055'),
('author@gmail.com', 'author', 'male', 'Author', '02bd92faa38aaa6cc0ea75e59937a1ef'),
('c@gmail.com', 'vvvvvvvvv', 'male', 'Conference_chair', '4a8a08f09d37b73795649038408b5f33'),
('cf1@gmail.com', 'cf 1', 'male', 'Conference_chair', '81dc9bdb52d04dc20036dbd8313ed055'),
('conferencechair@gmail.com', 'conferencechair', 'male', 'Conference_chair', '4e5dc7276be94771dda3ed944f5c6f0a'),
('dhanushkagimhan@gmail.com', 'dhanushka gimhan', 'male', 'Author', '81dc9bdb52d04dc20036dbd8313ed055'),
('r@gmail.com', 'knuy', 'male', 'Reviewer', '4b43b0aee35624cd95b910189b3dc231'),
('reviewer@gmail.com', 'reviewer', 'male', 'Reviewer', '7ba917e4e5158c8a9ed6eda08a6ec572');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_to_userInfo` FOREIGN KEY (`email`) REFERENCES `userinfotable` (`email`);

--
-- Constraints for table `author`
--
ALTER TABLE `author`
  ADD CONSTRAINT `author_to_userInfo` FOREIGN KEY (`email`) REFERENCES `userinfotable` (`email`);

--
-- Constraints for table `camerareadycopypaper`
--
ALTER TABLE `camerareadycopypaper`
  ADD CONSTRAINT `camerareadycopypaper_ibfk_1` FOREIGN KEY (`emailauthor`) REFERENCES `author` (`emailauthor`),
  ADD CONSTRAINT `camerareadycopypaper_ibfk_2` FOREIGN KEY (`emailpubchair`) REFERENCES `publicationchair` (`emailpubchair`);

--
-- Constraints for table `conferencechair`
--
ALTER TABLE `conferencechair`
  ADD CONSTRAINT `cc_to_userInfo` FOREIGN KEY (`email`) REFERENCES `userinfotable` (`email`);

--
-- Constraints for table `conferenceguidelinedetails`
--
ALTER TABLE `conferenceguidelinedetails`
  ADD CONSTRAINT `conferenceguidelinedetails_ibfk_1` FOREIGN KEY (`emailconfchair`) REFERENCES `conferencechair` (`emailconfchair`);

--
-- Constraints for table `conferences`
--
ALTER TABLE `conferences`
  ADD CONSTRAINT `connet_to_cc` FOREIGN KEY (`emailconfchair`) REFERENCES `conferencechair` (`emailconfchair`);

--
-- Constraints for table `conferencetrack`
--
ALTER TABLE `conferencetrack`
  ADD CONSTRAINT `connet_to_c` FOREIGN KEY (`conferenceID`) REFERENCES `conferences` (`id`),
  ADD CONSTRAINT `connet_to_cchair` FOREIGN KEY (`emailconfchair`) REFERENCES `conferencechair` (`email`);

--
-- Constraints for table `fileuploadtable`
--
ALTER TABLE `fileuploadtable`
  ADD CONSTRAINT `fileuploadtable_ibfk_1` FOREIGN KEY (`idrp`) REFERENCES `researchpaper` (`idrp`);

--
-- Constraints for table `notificationtemplates`
--
ALTER TABLE `notificationtemplates`
  ADD CONSTRAINT `notificationtemplates_ibfk_1` FOREIGN KEY (`emailconfchair`) REFERENCES `conferencechair` (`emailconfchair`);

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_ibfk_1` FOREIGN KEY (`emailpubchair`) REFERENCES `publicationchair` (`emailpubchair`);

--
-- Constraints for table `papertypes`
--
ALTER TABLE `papertypes`
  ADD CONSTRAINT `connect_to_admin` FOREIGN KEY (`AdminEmail`) REFERENCES `admin` (`AdminEmail`);

--
-- Constraints for table `preparration`
--
ALTER TABLE `preparration`
  ADD CONSTRAINT `preparration_ibfk_1` FOREIGN KEY (`emailconfchair`) REFERENCES `conferencechair` (`emailconfchair`);

--
-- Constraints for table `publicationchair`
--
ALTER TABLE `publicationchair`
  ADD CONSTRAINT `pc_to_userInfo` FOREIGN KEY (`email`) REFERENCES `userinfotable` (`email`);

--
-- Constraints for table `registrationpackages`
--
ALTER TABLE `registrationpackages`
  ADD CONSTRAINT `registrationpackages_ibfk_1` FOREIGN KEY (`emailconfchair`) REFERENCES `conferencechair` (`emailconfchair`);

--
-- Constraints for table `researchpaper`
--
ALTER TABLE `researchpaper`
  ADD CONSTRAINT `researchpaper_ibfk_1` FOREIGN KEY (`emailreviewer`) REFERENCES `reviewer` (`emailreviewer`),
  ADD CONSTRAINT `researchpaper_ibfk_2` FOREIGN KEY (`emailtrackchair`) REFERENCES `trackchair` (`emailtrackchair`),
  ADD CONSTRAINT `researchpaper_ibfk_3` FOREIGN KEY (`emailauthor`) REFERENCES `author` (`emailauthor`),
  ADD CONSTRAINT `researchpaper_ibfk_4` FOREIGN KEY (`idpreparation`) REFERENCES `preparration` (`idpreparation`);

--
-- Constraints for table `reviewer`
--
ALTER TABLE `reviewer`
  ADD CONSTRAINT `reviewer_ibfk_1` FOREIGN KEY (`email`) REFERENCES `userinfotable` (`email`);

--
-- Constraints for table `reviewerform`
--
ALTER TABLE `reviewerform`
  ADD CONSTRAINT `reviewerform_ibfk_1` FOREIGN KEY (`emailreviewer`) REFERENCES `reviewer` (`emailreviewer`),
  ADD CONSTRAINT `reviewerform_ibfk_2` FOREIGN KEY (`emailauthor`) REFERENCES `author` (`emailauthor`);

--
-- Constraints for table `trackchair`
--
ALTER TABLE `trackchair`
  ADD CONSTRAINT `tc_to_userInfo` FOREIGN KEY (`email`) REFERENCES `userinfotable` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
