-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2020 at 11:47 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webcomsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminEmail` varchar(150) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `emailauthor` varchar(150) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `university` varchar(100) NOT NULL,
  `contactdetails` varchar(400) NOT NULL,
  `contactlinks` varchar(300) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `camerareadycopypaper`
--

CREATE TABLE `camerareadycopypaper` (
  `adcrcp` int(11) NOT NULL,
  `paper` varchar(900) NOT NULL,
  `emailauthor` varchar(150) NOT NULL,
  `emailpubchair` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `conferencechair`
--

CREATE TABLE `conferencechair` (
  `emailconfchair` varchar(150) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `conferenceguidelinedetails`
--

CREATE TABLE `conferenceguidelinedetails` (
  `idguideline` int(50) NOT NULL,
  `details` varchar(150) NOT NULL,
  `emailconfchair` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `conferences`
--

CREATE TABLE `conferences` (
  `id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `venue` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `deadline_date` date NOT NULL,
  `sponsor_details` varchar(300) NOT NULL,
  `Accepted` char(1) NOT NULL,
  `emailconfchair` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `conferencetrack`
--

CREATE TABLE `conferencetrack` (
  `ID` int(20) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `conferenceID` int(20) NOT NULL,
  `emailconfchair` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `conferencetrack`
--

INSERT INTO `conferencetrack` (`ID`, `Name`, `conferenceID`, `emailconfchair`) VALUES
(1, 'machine learning', 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `fileuploadtable`
--

CREATE TABLE `fileuploadtable` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `university` varchar(50) DEFAULT NULL,
  `contactdetails` varchar(200) DEFAULT NULL,
  `otherlinks` varchar(200) DEFAULT NULL,
  `target_file` varchar(5000) DEFAULT NULL,
  `idrp` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notificationtemplates`
--

CREATE TABLE `notificationtemplates` (
  `idtemplate` int(50) NOT NULL,
  `name` int(50) NOT NULL,
  `emailconfchair` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `idpage` int(100) NOT NULL,
  `template` varchar(500) NOT NULL,
  `coverpage` varchar(500) NOT NULL,
  `subpage` varchar(500) NOT NULL,
  `emailpubchair` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `papertypes`
--

CREATE TABLE `papertypes` (
  `ID` int(5) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Abstract` varchar(40) NOT NULL,
  `AdminEmail` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `preparration`
--

CREATE TABLE `preparration` (
  `idpreparation` int(150) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `emailconfchair` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `publicationchair`
--

CREATE TABLE `publicationchair` (
  `emailpubchair` varchar(150) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registrationpackages`
--

CREATE TABLE `registrationpackages` (
  `idpackage` int(150) NOT NULL,
  `namepackage` varchar(100) NOT NULL,
  `emailconfchair` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `researchpaper`
--

CREATE TABLE `researchpaper` (
  `idrp` int(150) NOT NULL,
  `title` varchar(150) NOT NULL,
  `abstract` varchar(150) NOT NULL,
  `numberoffiles` int(100) NOT NULL,
  `track` varchar(100) NOT NULL,
  `corautherdetails` varchar(400) NOT NULL,
  `emailreviewer` varchar(150) NOT NULL,
  `emailtrackchair` varchar(150) NOT NULL,
  `emailauthor` varchar(150) NOT NULL,
  `idpreparation` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviewer`
--

CREATE TABLE `reviewer` (
  `emailreviewer` varchar(150) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviewerform`
--

CREATE TABLE `reviewerform` (
  `idform` int(150) NOT NULL,
  `comments` varchar(400) NOT NULL,
  `recommendation` varchar(100) NOT NULL,
  `emailreviewer` varchar(150) NOT NULL,
  `emailauthor` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trackchair`
--

CREATE TABLE `trackchair` (
  `emailtrackchair` varchar(150) NOT NULL,
  `fullname` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userinfotable`
--

CREATE TABLE `userinfotable` (
  `email` varchar(150) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userinfotable`
--

INSERT INTO `userinfotable` (`email`, `full_name`, `gender`, `user_type`, `password`) VALUES
('dhanushkagimhan@gmail.com', 'dhanushka gimhan', 'male', 'Author', '81dc9bdb52d04dc20036dbd8313ed055'),
('admin@gmail.com', 'admin gimhan', 'male', 'Admin', '81dc9bdb52d04dc20036dbd8313ed055'),
('cf1@gmail.com', 'cf 1', 'male', 'Conference_chair', '81dc9bdb52d04dc20036dbd8313ed055'),
('reviewer@gmail.com', 'reviewer', 'male', 'Reviewer', '7ba917e4e5158c8a9ed6eda08a6ec572'),
('author@gmail.com', 'author', 'male', 'Author', '02bd92faa38aaa6cc0ea75e59937a1ef'),
('conferencechair@gmail.com', 'conferencechair', 'male', 'Conference_chair', '4e5dc7276be94771dda3ed944f5c6f0a'),
('c@gmail.com', 'vvvvvvvvv', 'male', 'Conference_chair', '4a8a08f09d37b73795649038408b5f33'),
('a@gmail.com', 'junb', 'male', 'Author', '0cc175b9c0f1b6a831c399e269772661'),
('r@gmail.com', 'knuy', 'male', 'Reviewer', '4b43b0aee35624cd95b910189b3dc231');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminEmail`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`emailauthor`);

--
-- Indexes for table `camerareadycopypaper`
--
ALTER TABLE `camerareadycopypaper`
  ADD PRIMARY KEY (`adcrcp`),
  ADD UNIQUE KEY `emailauthor` (`emailauthor`),
  ADD UNIQUE KEY `emailpubchair` (`emailpubchair`);

--
-- Indexes for table `conferencechair`
--
ALTER TABLE `conferencechair`
  ADD PRIMARY KEY (`emailconfchair`);

--
-- Indexes for table `conferenceguidelinedetails`
--
ALTER TABLE `conferenceguidelinedetails`
  ADD PRIMARY KEY (`idguideline`),
  ADD UNIQUE KEY `emailconfchair` (`emailconfchair`);

--
-- Indexes for table `conferences`
--
ALTER TABLE `conferences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `C_chairEmail` (`emailconfchair`);

--
-- Indexes for table `conferencetrack`
--
ALTER TABLE `conferencetrack`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `emailconfchair` (`emailconfchair`),
  ADD KEY `conferenceID` (`conferenceID`);

--
-- Indexes for table `fileuploadtable`
--
ALTER TABLE `fileuploadtable`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idrp` (`idrp`);

--
-- Indexes for table `notificationtemplates`
--
ALTER TABLE `notificationtemplates`
  ADD PRIMARY KEY (`idtemplate`),
  ADD UNIQUE KEY `emailconfchair` (`emailconfchair`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`idpage`),
  ADD UNIQUE KEY `emailpubchair` (`emailpubchair`);

--
-- Indexes for table `papertypes`
--
ALTER TABLE `papertypes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `AdminEmail` (`AdminEmail`);

--
-- Indexes for table `preparration`
--
ALTER TABLE `preparration`
  ADD PRIMARY KEY (`idpreparation`),
  ADD UNIQUE KEY `emailconfchair` (`emailconfchair`);

--
-- Indexes for table `publicationchair`
--
ALTER TABLE `publicationchair`
  ADD PRIMARY KEY (`emailpubchair`);

--
-- Indexes for table `registrationpackages`
--
ALTER TABLE `registrationpackages`
  ADD PRIMARY KEY (`idpackage`),
  ADD UNIQUE KEY `emailconfchair` (`emailconfchair`);

--
-- Indexes for table `researchpaper`
--
ALTER TABLE `researchpaper`
  ADD PRIMARY KEY (`idrp`),
  ADD UNIQUE KEY `emailreviewer` (`emailreviewer`),
  ADD UNIQUE KEY `emailtrackchair` (`emailtrackchair`),
  ADD UNIQUE KEY `emailauthor` (`emailauthor`),
  ADD UNIQUE KEY `idpreparation` (`idpreparation`);

--
-- Indexes for table `reviewer`
--
ALTER TABLE `reviewer`
  ADD PRIMARY KEY (`emailreviewer`);

--
-- Indexes for table `reviewerform`
--
ALTER TABLE `reviewerform`
  ADD PRIMARY KEY (`idform`),
  ADD UNIQUE KEY `emailreviewer` (`emailreviewer`),
  ADD UNIQUE KEY `emailauthor` (`emailauthor`),
  ADD KEY `emailreviewer_2` (`emailreviewer`);

--
-- Indexes for table `trackchair`
--
ALTER TABLE `trackchair`
  ADD PRIMARY KEY (`emailtrackchair`);

--
-- Indexes for table `userinfotable`
--
ALTER TABLE `userinfotable`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `camerareadycopypaper`
--
ALTER TABLE `camerareadycopypaper`
  MODIFY `adcrcp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conferenceguidelinedetails`
--
ALTER TABLE `conferenceguidelinedetails`
  MODIFY `idguideline` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conferences`
--
ALTER TABLE `conferences`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `conferencetrack`
--
ALTER TABLE `conferencetrack`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fileuploadtable`
--
ALTER TABLE `fileuploadtable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notificationtemplates`
--
ALTER TABLE `notificationtemplates`
  MODIFY `idtemplate` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `idpage` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `papertypes`
--
ALTER TABLE `papertypes`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `preparration`
--
ALTER TABLE `preparration`
  MODIFY `idpreparation` int(150) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registrationpackages`
--
ALTER TABLE `registrationpackages`
  MODIFY `idpackage` int(150) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `researchpaper`
--
ALTER TABLE `researchpaper`
  MODIFY `idrp` int(150) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviewerform`
--
ALTER TABLE `reviewerform`
  MODIFY `idform` int(150) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `camerareadycopypaper`
--
ALTER TABLE `camerareadycopypaper`
  ADD CONSTRAINT `camerareadycopypaper_ibfk_1` FOREIGN KEY (`emailauthor`) REFERENCES `author` (`emailauthor`),
  ADD CONSTRAINT `camerareadycopypaper_ibfk_2` FOREIGN KEY (`emailpubchair`) REFERENCES `publicationchair` (`emailpubchair`);

--
-- Constraints for table `conferenceguidelinedetails`
--
ALTER TABLE `conferenceguidelinedetails`
  ADD CONSTRAINT `conferenceguidelinedetails_ibfk_1` FOREIGN KEY (`emailconfchair`) REFERENCES `conferencechair` (`emailconfchair`);

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
-- Constraints for table `preparration`
--
ALTER TABLE `preparration`
  ADD CONSTRAINT `preparration_ibfk_1` FOREIGN KEY (`emailconfchair`) REFERENCES `conferencechair` (`emailconfchair`);

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
-- Constraints for table `reviewerform`
--
ALTER TABLE `reviewerform`
  ADD CONSTRAINT `reviewerform_ibfk_1` FOREIGN KEY (`emailreviewer`) REFERENCES `reviewer` (`emailreviewer`),
  ADD CONSTRAINT `reviewerform_ibfk_2` FOREIGN KEY (`emailauthor`) REFERENCES `author` (`emailauthor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
