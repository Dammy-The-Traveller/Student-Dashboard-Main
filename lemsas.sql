-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 31, 2024 at 11:01 AM
-- Server version: 8.3.0
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lemsas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_technical`
--

DROP TABLE IF EXISTS `admin_technical`;
CREATE TABLE IF NOT EXISTS `admin_technical` (
  `id` int NOT NULL AUTO_INCREMENT,
  `admin_id` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `gmail` varchar(255) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `admin_technical`
--

INSERT INTO `admin_technical` (`id`, `admin_id`, `gmail`, `user_type`) VALUES
(1, 'ads25a00039y', 'adeissac123@gmai', '1'),
(2, 'abs11a00019y', 'admin22@gmail.com', '2');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE IF NOT EXISTS `attendance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time_in` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `course_code` (`course_code`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `first_name`, `last_name`, `course_code`, `date`, `time_in`) VALUES
(12, 'ADS25A00039Y', 'DAMILARE', 'ADEBESIN', 'ENG101', '2024-11-23', '20:54:33'),
(17, 'ADS25A00039Y', 'DAMILARE', 'ADEBESIN', 'CS101', '2024-11-24', '00:33:04'),
(21, 'ADS35B67', 'DANI', 'MILO', 'ENG101', '2024-11-24', '09:11:28'),
(23, 'ADS35B67', 'DANI', 'MILO', 'CS101', '2024-11-24', '09:27:51'),
(24, 'ADS25A00039Y', 'DAMILARE', 'ADEBESIN', 'ENG101', '2024-11-24', '09:28:21'),
(28, 'ADS35B67', 'DANI', 'MILO', 'CS101', '2024-11-25', '13:56:20'),
(29, 'ADS25A00039Y', 'DAMILARE', 'ADEBESIN', 'CS101', '2024-11-27', '21:08:39'),
(30, 'ADS25A00039Y', 'DAMILARE', 'ADEBESIN', 'CS101', '2024-11-28', '01:37:45'),
(31, 'ADS25A00039Y', 'DAMILARE', 'ADEBESIN', 'CS101', '2024-11-29', '13:35:55'),
(38, 'ADS25A00039Y', 'DAMILARE', 'ADEBESIN', 'CS101', '2024-11-30', '23:45:38'),
(45, 'ADS25A00039Y', 'DAMILARE', 'ADEBESIN', 'CS101', '2024-12-03', '02:19:24'),
(46, 'ADS25A00019Y', 'Milo', 'DAVID', 'CS101', '2024-12-03', '02:29:59'),
(50, 'abs11a00008y', 'JENNIFER AKUORKOR', 'ALEO', 'CDES202', '2024-12-05', '16:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `password`
--

DROP TABLE IF EXISTS `password`;
CREATE TABLE IF NOT EXISTS `password` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_number` varchar(12) DEFAULT NULL,
  `pass1` varchar(10) DEFAULT NULL,
  `pass2` varchar(10) DEFAULT NULL,
  `pass3` varchar(10) DEFAULT NULL,
  `block` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `password`
--

INSERT INTO `password` (`id`, `id_number`, `pass1`, `pass2`, `pass3`, `block`) VALUES
(1, 'abs11a00006y', '20aitgh', '20aitgh', '20aitgh', 'N'),
(2, 'abs11a00007y', 'aitgh', 'aitgh', 'aitgh', 'N'),
(3, 'abs11a00008y', 'Dgalaxy007', 'Dgalaxy007', 'Dgalaxy007', 'N'),
(4, 'ads25a00039y', '25aitgh', '25aitgh', '25aitgh', 'N'),
(5, 'abs11a00019y', '19aitgh', '19aitgh', '19aitgh', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `reg_course`
--

DROP TABLE IF EXISTS `reg_course`;
CREATE TABLE IF NOT EXISTS `reg_course` (
  `reg_id` int NOT NULL AUTO_INCREMENT,
  `std_id` varchar(12) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `code` varchar(7) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `campus` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `date_reg` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `unit` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `reg_by` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `manual_reg` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `acdyr` varchar(9) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `acdsem` varchar(5) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `qstate` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `qdate` varchar(9) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `qtime` varchar(8) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `qstatus` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `qhash` varchar(12) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `conline` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `conline_approval` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `conlineregres` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`reg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=138470 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `reg_course`
--

INSERT INTO `reg_course` (`reg_id`, `std_id`, `code`, `campus`, `date_reg`, `unit`, `reg_by`, `manual_reg`, `acdyr`, `acdsem`, `qstate`, `qdate`, `qtime`, `qstatus`, `qhash`, `conline`, `conline_approval`, `conlineregres`) VALUES
(22, 'abs11a00006y', 'EEE401', '3', '1/29/2018 19:04', '3', '', '1', '2024/2025', 'SEM 1', 'N', '9/22/2018', '12:00:00', 'N', '#AIT-KIT5739', 'O', 'A', ''),
(23, 'abs11a00007y', 'CS104', '2', '1/29/2018 19:04', '2', '', '1', '2017/2018', 'SEM 2', 'N', '', '', 'N', '', 'O', 'A', ''),
(24, 'abs11a00008y', 'CDES202', '1', '1/29/2018 19:04', '0', '', '1', '2017/2018', 'SEM 2', 'N', '7/29/2018', '', 'N', '', 'O', 'A', ''),
(138469, 'abs11a00006y', 'EEE403', '3', '1/29/2018 19:04', '3', '', '1', '2024/2025', 'SEM 1', 'N', '9/22/2018', '12:00:00', 'N', '#AIT-KIT5739', 'O', 'A', '');

-- --------------------------------------------------------

--
-- Table structure for table `r_student`
--

DROP TABLE IF EXISTS `r_student`;
CREATE TABLE IF NOT EXISTS `r_student` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(17) DEFAULT NULL,
  `lastname` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `birthdate` varchar(9) DEFAULT NULL,
  `idnumber` varchar(12) DEFAULT NULL,
  `department` varchar(30) DEFAULT NULL,
  `proglevel` varchar(3) DEFAULT NULL,
  `proglevdesc` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `program` varchar(22) DEFAULT NULL,
  `country` varchar(2) DEFAULT NULL,
  `email` varchar(16) DEFAULT NULL,
  `instid` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `r_student`
--

INSERT INTO `r_student` (`id`, `firstname`, `lastname`, `birthdate`, `idnumber`, `department`, `proglevel`, `proglevdesc`, `program`, `country`, `email`, `instid`) VALUES
(1, 'JAMES ', 'ADDAE', '6/26/1965', 'abs11a00006y', 'Business and Management School', 'BSc', 'Bachelor of Science Degree', 'Accounting And Finance', 'GH', 'addae5@gmail.com', 'ABS'),
(2, 'JANICE ADOMA', 'TWUM', '9/13/1988', 'abs11a00007y', 'Business and Management School', 'BSc', 'Bachelor of Science Degree', 'Accounting And Finance', 'NG', 'Janiceadoma34@gm', 'ABS'),
(3, 'JENNIFER AKUORKOR', 'ALEO', '1/26/1986', 'abs11a00008y', 'Business and Management School', 'BSc', 'Bachelor of Science Degree', 'Accounting And Finance', 'GH', 'jaleo@ait.edu.gh', 'ABS'),
(4, 'Issac', 'Netwon', '1/26/1986', 'ads25a00039y', 'Advance School of studies', 'BSc', 'Bachelor of Science Degree', 'Computer Science', 'GH', 'adeissac123@gmai', 'ADASS'),
(5, 'Issac', 'Admin', '2/6/2000', 'abs11a00019y', 'Advance School  of studies', 'BSc', '	\nBachelor of Science Degree', 'Computer Engineering', 'NG', 'admin22@gmail.co', 'ADASS');

-- --------------------------------------------------------

--
-- Table structure for table `tblcurracdyr`
--

DROP TABLE IF EXISTS `tblcurracdyr`;
CREATE TABLE IF NOT EXISTS `tblcurracdyr` (
  `acdyrid` int NOT NULL AUTO_INCREMENT,
  `acdyr` varchar(30) DEFAULT NULL,
  `sem` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`acdyrid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcurracdyr`
--

INSERT INTO `tblcurracdyr` (`acdyrid`, `acdyr`, `sem`) VALUES
(1, '2024/2025', 'Sem 1');

-- --------------------------------------------------------

--
-- Table structure for table `tblsrch`
--

DROP TABLE IF EXISTS `tblsrch`;
CREATE TABLE IF NOT EXISTS `tblsrch` (
  `id` int NOT NULL AUTO_INCREMENT,
  `progm` varchar(50) DEFAULT NULL,
  `srchcode` varchar(10) DEFAULT NULL,
  `lemsasname` varchar(53) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tblsrch`
--

INSERT INTO `tblsrch` (`id`, `progm`, `srchcode`, `lemsasname`) VALUES
(1, 'IT (Network Systems)', 'BScIT', 'Bsc IT (Network Systems)'),
(2, 'Computer Science', 'BScCS', 'Bsc Computer Science'),
(3, 'Accounting And Finance', 'BScAF', 'Bsc Accounting And Finance'),
(4, 'Civil Engineering', 'BEngCVE', 'Beng Civil Engineering'),
(5, 'Computer Engineering', 'BEngCE', 'Beng Computer Engineering'),
(6, 'Electrical & Electronic Engineering', 'BEngEEE', 'Beng Electrical & Electronic Engineering'),
(7, 'Marketing & Information Technology', 'BScMktIT', 'Bsc Marketing & Information Technology'),
(8, 'Human Resource Management & Information Technology', 'BScHRIT', 'Bsc Human Resource Management &Information Technology'),
(9, 'DTECH Computer Science', 'DTechCS', 'DTECH Computer Science'),
(10, 'DTECH Civil Engineering ', 'DTechCVE', 'DTECH Civil Engineering '),
(11, 'Business Administration & IT', 'DTechBA&IT', 'CTECH Business Administration & IT'),
(12, 'Information Technology', 'DTECHIT', 'DTECH Information Technology'),
(13, 'E-Commerce', 'BScECOM', 'BSc E-Commerce'),
(14, 'DTECH Electrical & Electronic Engineering', 'DTechEEE', 'DTECH Electrical & Electronic Engineering'),
(15, 'Entrepreneurship & Information Technology', 'BSCENIT', 'BSc Entrepreneurship & Information Technology'),
(16, 'DTECH Computer Engineering', 'DTechCE', 'DTECH Computer Engineering'),
(17, 'DTECH Information Technology', 'DTECHIT', 'DTECH Information Technology'),
(18, 'CTECH Computer Engineering', 'DTechCE', 'CTECH Computer Engineering'),
(19, 'Dtech Business Administration & IT', 'DTechBA&IT', 'Dtech Business Administration & IT'),
(20, 'CTECH Computer Science', 'DTechCS', 'CTECH Computer Science'),
(21, 'CTECH Civil Engineering ', 'DTechCVE', 'CTECH Civil Engineering '),
(22, 'DTECH Electrical & Electronic Engineering', 'DTechEEE', 'CTECH Electrical & Electronic Engineering'),
(23, 'Business Administration & IT', 'DTechBA&IT', 'DTECH Business Administration & IT'),
(24, 'CTECH Information Technology', 'CTECHIT', 'CTECH Information Technology'),
(25, 'English Language/Communication Skills', 'MdENG', 'English Language/Communication Skills'),
(26, 'Mathematics', 'MdMATH', 'Mathematics');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
