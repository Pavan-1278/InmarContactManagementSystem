-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2018 at 09:08 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `name` varchar(255) NOT NULL,
  `phno` bigint(255) NOT NULL,
  `uemail` varchar(255) NOT NULL,
  `cemail` varchar(255) NOT NULL,
  `grp_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`name`, `phno`, `uemail`, `cemail`, `grp_id`) VALUES
('ahmed', 9874563210, 'ram@inmar.com', 'ahmed@inmar.com', 1234),
('anand', 5896412300, 'ram@inmar.com', 'anand@inmar.com', 1456),
('aravind', 3256987410, 'Pavan@inmar.com', 'aravind@inmar.com', 4569),
('Deekshith', 1256347890, 'ram@inmar.com', 'e@inmar.com', 4568),
('Havinash', 7895426310, 'ram@inmar.com', 'hainash@inmar.com', 1456),
('Kanish', 4565987412, 'ram@inmar.com', 'kanish@inmar.com', 1234),
('kartheeka', 3216549807, 'Pavan@inmar.com', 'kartheeka@inmar.com', 9874),
('karthik', 7458961023, 'Pavan@inmar.com', 'karthik@Inmar.com', 9874),
('kavisha', 9874563210, 'ram@inmar.com', 'kavisha@inmar.com', 1456),
('krish', 854719630, 'Pavan@inmar.com', 'krish@Inmar.com', 9874),
('Kumar', 9874586321, 'ram@inmar.com', 'kumar@inmar.com', 1234),
('muneer', 7845961203, 'Pavan@inmar.com', 'muneer@inmar.com', 4569),
('payal', 9845632107, 'Pavan@inmar.com', 'payal@inmar.com', 4569),
('prameel', 9874512630, 'ram@inmar.com', 'prameel@inmar.com', 4568),
('Praveen', 7845651230, 'ram@inmar.com', 'praveen@inmar.com', 4568);

-- --------------------------------------------------------

--
-- Table structure for table `group_inf`
--

CREATE TABLE `group_inf` (
  `owner_email` varchar(30) NOT NULL,
  `group_id` varchar(30) NOT NULL,
  `group_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_inf`
--

INSERT INTO `group_inf` (`owner_email`, `group_id`, `group_name`) VALUES
('ram@inmar.com', '1234', 'Inmar'),
('ram@inmar.com', '1456', 'Btech'),
('ram@inmar.com', '4568', 'Tech_team'),
('Pavan@inmar.com', '4569', 'Inmar'),
('Pavan@inmar.com', '9874', 'Vijayawada');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `uemail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` text NOT NULL,
  `aadhar` bigint(225) NOT NULL,
  `phnno` bigint(255) NOT NULL,
  `city` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`fname`, `lname`, `uemail`, `password`, `gender`, `aadhar`, `phnno`, `city`) VALUES
('Midata', 'Mahi', 'Midata@inmar.com', 'Midata_mahi', 'undefined', 789456123012, 7894561230, 'Midata'),
('pavan', 'kumar', 'Pavan@inmar.com', 'AAaaa@12', 'female', 123456789123, 1234567891, 'vijayawada'),
('kumar', 'fghjk', 'ram@inmar.com', 'RAmqw@12', 'male', 987654321789, 9876543217, 'Vijayawada');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`cemail`);

--
-- Indexes for table `group_inf`
--
ALTER TABLE `group_inf`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`uemail`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
