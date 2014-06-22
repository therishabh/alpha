-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2013 at 11:24 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `test_multi_sets`()
    DETERMINISTIC
begin
        select user() as first_col;
        select user() as first_col, now() as second_col;
        select user() as first_col, now() as second_col, now() as third_col;
        end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `User_id` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Dob` varchar(255) NOT NULL,
  `Mobile` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Father_name` varchar(255) NOT NULL,
  `Mother_name` varchar(255) NOT NULL,
  `Father_mobile` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Name`, `User_id`, `Password`, `Dob`, `Mobile`, `Gender`, `Email`, `Father_name`, `Mother_name`, `Father_mobile`, `Address`, `Image`, `Status`) VALUES
(1, 'Preeti Goel', 'admin_101', '1', '1991-11-30', '9874589654', 'Female', 'preeti@yahoo.com', 'Gagan Goel', 'Urmila Agrawal', '9865321478', 'Teacher Colony, Maholi, Ghaziabad (Uttar Pradesh)', 'admin_101.jpg', 'True');

-- --------------------------------------------------------

--
-- Table structure for table `assign_task`
--

CREATE TABLE IF NOT EXISTS `assign_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Task_id` varchar(255) NOT NULL,
  `User_id` varchar(255) NOT NULL,
  `Assign_date` varchar(255) NOT NULL,
  `Submit_date` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Attachment` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `assign_task`
--

INSERT INTO `assign_task` (`id`, `Task_id`, `User_id`, `Assign_date`, `Submit_date`, `Subject`, `Description`, `Attachment`, `Status`) VALUES
(1, '101', 'emp_109', '2013-03-17', '2013-03-20', 'Project', 'Finger Print Scaner. ', '101.jpg', 'True'),
(2, '102', 'emp_102', '2013-03-17', '2013-03-18', 'Content Management System', 'Content Management System Content Management System Content Management System Content Management System', '', 'True'),
(3, '103', 'emp_110', '2013-03-17', '2013-03-18', 'Image Search', 'Search About Company Images.. :)', '103.JPG', 'True'),
(4, '104', 'emp_102', '2013-03-17', '2013-03-20', 'Content Management System', 'Returns a string formatted according to the given format string using the given integer timestamp or the current time if no  imestamp is given. In other words, timestamp is optional and defaults to the values..', '', 'True'),
(5, '105', 'emp_102', '2013-03-17', '2013-03-28', 'Check..', 'The format of the outputted date string. See the formatting options below.', '105.GIF', 'True'),
(6, '106', 'emp_103', '2013-03-17', '2013-03-19', 'Project', 'The format of the outputted date string. See the formatting options below.', '106.GIF', 'True'),
(7, '107', 'emp_101', '2013-03-17', '2013-03-18', 'Content Management System', 'Content Management System Content Management System Content Management System Content Management System', '107.pdf', 'True'),
(8, '108', 'emp_108', '2013-03-17', '2013-03-22', 'hello check', 'helloo.. :)', '', 'True'),
(9, '109', 'emp_101', '2013-04-09', '2013-04-18', 'hello', 'project.. :)', '109.jpg', 'True');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `User_id` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email_id` varchar(255) NOT NULL,
  `Mobile` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Dob` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Exp_year` varchar(255) NOT NULL,
  `Company` varchar(255) NOT NULL,
  `Designation` varchar(255) NOT NULL,
  `Father_name` varchar(255) NOT NULL,
  `Mother_name` varchar(255) NOT NULL,
  `Father_mobile` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `Name`, `User_id`, `Password`, `Email_id`, `Mobile`, `Gender`, `Dob`, `Department`, `Exp_year`, `Company`, `Designation`, `Father_name`, `Mother_name`, `Father_mobile`, `Address`, `Image`, `Status`) VALUES
(1, 'Shivani Garg', 'emp_101', '12345', 'shivani_garg@yahoo.com', '8010979311', 'Male', '1991-11-30', '', '1', 'Kasovious', 'Chief Technology Officer', 'Rakesh Agrawal', 'Urmila Agrawal', '8010979311', 'Maholi', 'emp_101.jpg', 'True'),
(2, 'Kriti Sharma', 'emp_102', '12345', 'kriti@gmail.com', '9584987978', 'Female', '1990-10-28', 'Testing', '', '', '', 'Pata Nahi', 'Pata Nahi', '5649879454', 'Delhi', 'emp_102.jpg', 'True'),
(3, 'Pragati', 'emp_103', '12345', 'pragati@gmail.com', '9716129584', 'Male', '2013-04-28', 'Computer science', '1', 'Kasovious', 'software Tester', 'Narendra Tayal', 'Neeru Tayal', '9410419234', '32,Gandhi ganj mandi,shamli(U.P)', 'emp_103.jpeg', 'True'),
(4, 'Preeti Goel', 'emp_104', '12345', 'preeti@gmail.com', '8494984877', 'Male', '1991-08-14', 'Computer science', '', '', '', 'Rakesh Agrawal', 'Urmila Agrawal', '9410419234', 'LPU, Punjab', 'emp_104.jpg', 'True'),
(5, 'Radha Gupta', 'emp_105', '12345', 'radha_gupta@gmail.com', '8527249790', 'Male', '1991-04-24', 'information technology', '', '', '', 'mr.kulshrestha', 'mrs kulshrestha', '9837062726', 'agra', 'emp_105.jpg', 'True'),
(6, 'Gagan Goel', 'emp_106', '12345', 'gagan@gmail.com', '1234567890', 'Male', '2013-03-14', 'Computer science', '5', 'Adobe', 'Software Tester', 'saurabh', 'savita', '1232343543', 'ghaziabad', 'emp_106.jpg', 'True'),
(7, 'Somya Tripathi', 'emp_107', '12345', 'somya@gmail.com', '7632435678', 'Female', '1991-06-12', 'Electrical', '1', 'check me out once solutions', 'entertainer', 'Pata Nahi', 'Pata Nahi', '3432343212', 'ntpc', 'emp_107.jpg', 'True'),
(8, 'Gungan', 'emp_108', '1', 'gungan@yahoo.com', '5454545645', 'Male', '1991-10-29', 'Computer science', '', '', '', 'pata nahi', 'pata nahi', '9756154684', 'lucknow.. Uttar Pradesh', 'emp_108.jpeg', 'True'),
(9, 'Priya', 'emp_109', '12345', 'priya@gmail.com', '9894498797', 'Female', '1965-12-15', 'Computer science', '', '', '', 'Pata Nahi', 'Pata Nahi', '9898795649', 'Yaad Nahi', 'emp_109.jpg', 'True'),
(10, 'Puja', 'emp_110', 'a', 'puja@gmail.com', '9945646516', 'Female', '1992-09-16', 'Computer science', '', '', '', 'Pata Nahi', 'Pata Nahi', '9794654979', 'Ghaziabad', 'emp_110.jpeg', 'True'),
(11, 'Abc', 'emp_111', '12345', 'abc@gmail.com', '9990343359', 'Male', '2013-05-12', 'zxb', '1', 'aa', 'asgr', 'aaa', 'sss', '9911981956', 'g-33\r\n', 'emp_111.JPG', 'True');

-- --------------------------------------------------------

--
-- Table structure for table `msg_admin_101`
--

CREATE TABLE IF NOT EXISTS `msg_admin_101` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `User_id` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Time` varchar(255) NOT NULL,
  `Display` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `msg_admin_101`
--

INSERT INTO `msg_admin_101` (`id`, `User_id`, `Subject`, `Description`, `Time`, `Display`, `Status`) VALUES
(1, 'emp_101', 'Hello', 'Testing', 'March 16, 2013, 1:54 am', '1', 'True'),
(2, 'emp_102', 'Hey', 'Hello This is my first message..', 'March 16, 2013, 4:54 am', '1', 'True'),
(3, 'emp_102', 'Hello', 'Hello This is my third message..', 'March 16, 2013, 4:55 am', '0', 'True'),
(4, 'emp_108', 'Hello Sir.. ', 'this is for testing purpose.. ', 'March 16, 2013, 3:06 pm', '1', 'True');

-- --------------------------------------------------------

--
-- Table structure for table `msg_emp_101`
--

CREATE TABLE IF NOT EXISTS `msg_emp_101` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `User_id` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Time` varchar(255) NOT NULL,
  `Display` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `msg_emp_101`
--

INSERT INTO `msg_emp_101` (`id`, `User_id`, `Subject`, `Description`, `Time`, `Display`, `Status`) VALUES
(1, 'emp_108', 'Hello Bro', 'hey.. :)\r\nhow r u.. ?\r\n', 'March 16, 2013, 3:22 pm', '0', 'True'),
(2, 'emp_108', 'Check..', 'Hello. :)', 'March 16, 2013, 3:22 pm', '0', 'True'),
(3, 'admin_101', 'hey', 'hello', 'May 9, 2013, 3:08 pm', '1', 'True');

-- --------------------------------------------------------

--
-- Table structure for table `msg_emp_102`
--

CREATE TABLE IF NOT EXISTS `msg_emp_102` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `User_id` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Time` varchar(255) NOT NULL,
  `Display` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `msg_emp_102`
--

INSERT INTO `msg_emp_102` (`id`, `User_id`, `Subject`, `Description`, `Time`, `Display`, `Status`) VALUES
(1, 'emp_108', 'Content Management System', 'CMS Completed.. :)', 'March 16, 2013, 3:23 pm', '1', 'True'),
(2, 'admin_101', 'hello', 'hey.. :)\r\nhow r u.?', 'March 17, 2013, 2:05 am', '0', 'True');

-- --------------------------------------------------------

--
-- Table structure for table `msg_emp_103`
--

CREATE TABLE IF NOT EXISTS `msg_emp_103` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `User_id` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Time` varchar(255) NOT NULL,
  `Display` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `msg_emp_103`
--

INSERT INTO `msg_emp_103` (`id`, `User_id`, `Subject`, `Description`, `Time`, `Display`, `Status`) VALUES
(1, 'emp_102', 'Hello Sir', 'Hey. :)', 'March 16, 2013, 8:26 pm', '0', 'True');

-- --------------------------------------------------------

--
-- Table structure for table `msg_emp_104`
--

CREATE TABLE IF NOT EXISTS `msg_emp_104` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `User_id` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Time` varchar(255) NOT NULL,
  `Display` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `msg_emp_105`
--

CREATE TABLE IF NOT EXISTS `msg_emp_105` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `User_id` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Time` varchar(255) NOT NULL,
  `Display` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `msg_emp_105`
--

INSERT INTO `msg_emp_105` (`id`, `User_id`, `Subject`, `Description`, `Time`, `Display`, `Status`) VALUES
(1, 'emp_101', 'lkjhfdsasdfg', 'kjhgfds', 'April 18, 2013, 9:44 pm', '1', 'True');

-- --------------------------------------------------------

--
-- Table structure for table `msg_emp_106`
--

CREATE TABLE IF NOT EXISTS `msg_emp_106` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `User_id` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Time` varchar(255) NOT NULL,
  `Display` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `msg_emp_107`
--

CREATE TABLE IF NOT EXISTS `msg_emp_107` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `User_id` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Time` varchar(255) NOT NULL,
  `Display` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `msg_emp_108`
--

CREATE TABLE IF NOT EXISTS `msg_emp_108` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `User_id` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Time` varchar(255) NOT NULL,
  `Display` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `msg_emp_108`
--

INSERT INTO `msg_emp_108` (`id`, `User_id`, `Subject`, `Description`, `Time`, `Display`, `Status`) VALUES
(1, 'admin_101', 'Hello', 'hello Mr. Shikhar', 'March 16, 2013, 1:54 am', '0', 'True'),
(2, 'emp_101', 'Hello', 'Hello This is my first message..', 'March 16, 2013, 2:54 am', '0', 'True'),
(3, 'admin_101', 'Hello Shikhar', 'Hello, How r u. ??  :)', 'March 16, 2013, 2:59 pm', '1', 'True'),
(4, 'admin_101', 'fgdfdg', 'jjjnkm', 'March 17, 2013, 2:13 am', '1', 'True');

-- --------------------------------------------------------

--
-- Table structure for table `msg_emp_109`
--

CREATE TABLE IF NOT EXISTS `msg_emp_109` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `User_id` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Time` varchar(255) NOT NULL,
  `Display` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `msg_emp_110`
--

CREATE TABLE IF NOT EXISTS `msg_emp_110` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `User_id` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Time` varchar(255) NOT NULL,
  `Display` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `msg_emp_110`
--

INSERT INTO `msg_emp_110` (`id`, `User_id`, `Subject`, `Description`, `Time`, `Display`, `Status`) VALUES
(1, 'admin_101', 'Hello Mam.. :)', 'Hey. :)', 'March 16, 2013, 3:37 pm', '0', 'True');

-- --------------------------------------------------------

--
-- Table structure for table `msg_emp_111`
--

CREATE TABLE IF NOT EXISTS `msg_emp_111` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `User_id` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Time` varchar(255) NOT NULL,
  `Display` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `submited_task`
--

CREATE TABLE IF NOT EXISTS `submited_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Task_id` varchar(255) NOT NULL,
  `User_id` varchar(255) NOT NULL,
  `Submit_date` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Attachment` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `submited_task`
--

INSERT INTO `submited_task` (`id`, `Task_id`, `User_id`, `Submit_date`, `Subject`, `Description`, `Attachment`, `Status`) VALUES
(1, '101', 'emp_102', 'March 17, 2013, 1:23 am', 'hello', 'testing. :)', '101.jpeg', 'True'),
(2, '102', 'emp_102', 'March 17, 2013, 1:25 am', 'Project', 'if you just want to know how many work days there are in any given year, here a quick function for that on', '102.jpeg', 'True'),
(3, '103', 'emp_102', 'March 17, 2013, 1:36 am', 'Content Management System', 'Content Management System testing', '103.jpeg', 'True'),
(4, '104', 'emp_108', 'March 17, 2013, 1:46 am', 'Project', 'check', '', 'True'),
(5, '105', 'emp_101', 'April 9, 2013, 2:18 pm', 'project', 'jlfdkjdfskgls ksdfjgsl', '105.jpg', 'True');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
