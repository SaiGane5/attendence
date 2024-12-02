-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2024 at 10:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `EMAILID` varchar(100) NOT NULL,
  `FIRSTNAME` varchar(50) DEFAULT NULL,
  `LASTNAME` varchar(50) DEFAULT NULL,
  `PHONENO` bigint(12) DEFAULT NULL,
  `SCHOOLNAME` varchar(200) DEFAULT NULL,
  `LOCATION` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`EMAILID`, `FIRSTNAME`, `LASTNAME`, `PHONENO`, `SCHOOLNAME`, `LOCATION`) VALUES
('admin1@school1.com', 'Ravi', 'Kumar', 9876543210, 'Delhi Public School', 'New Delhi'),
('admin2@school2.com', 'Meena', 'Agarwal', 9876543211, 'Kendriya Vidyalaya', 'Mumbai'),
('admin3@school3.com', 'Suresh', 'Singh', 9876543212, 'St. Xavier\'s School', 'Kolkata');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `day` date NOT NULL,
  `rollno` varchar(30) NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`day`, `rollno`, `status`) VALUES
('2024-05-01', '1A-001', 1),
('2024-05-01', '1A-002', 0),
('2024-05-01', '1A-003', 1),
('2024-05-01', '1A-004', 1),
('2024-05-01', '1A-005', 1),
('2024-05-01', '1A-006', 0),
('2024-05-01', '1A-007', 1),
('2024-05-01', '1A-008', 1),
('2024-05-01', '1A-009', 1),
('2024-05-01', '1A-010', 1),
('2024-05-01', '1B-001', 1),
('2024-05-01', '1B-002', 1),
('2024-05-01', '1B-003', 0),
('2024-05-01', '1B-004', 1),
('2024-05-01', '1B-005', 1),
('2024-05-01', '1B-006', 1),
('2024-05-01', '1B-007', 1),
('2024-05-01', '1B-008', 0),
('2024-05-01', '1B-009', 1),
('2024-05-01', '1B-010', 1),
('2024-05-01', '1C-001', 1),
('2024-05-01', '1C-002', 1),
('2024-05-01', '1C-003', 0),
('2024-05-01', '1C-004', 1),
('2024-05-01', '1C-005', 1),
('2024-05-01', '1C-006', 1),
('2024-05-01', '1C-007', 1),
('2024-05-01', '1C-008', 0),
('2024-05-01', '1C-009', 1),
('2024-05-01', '1C-010', 1),
('2024-05-01', '4-Tiger-001', 1),
('2024-05-01', '4-Tiger-002', 1),
('2024-05-01', '4-Tiger-003', 0),
('2024-05-01', '4-Tiger-004', 1),
('2024-05-01', '4-Tiger-005', 1),
('2024-05-01', '4-Tiger-006', 1),
('2024-05-01', '4-Tiger-007', 1),
('2024-05-01', '4-Tiger-008', 0),
('2024-05-01', '4-Tiger-009', 1),
('2024-05-01', '4-Tiger-010', 1),
('2024-05-01', '5-Lion-001', 1),
('2024-05-01', '5-Lion-002', 1),
('2024-05-01', '5-Lion-003', 0),
('2024-05-01', '5-Lion-004', 1),
('2024-05-01', '5-Lion-005', 1),
('2024-05-01', '5-Lion-006', 1),
('2024-05-01', '5-Lion-007', 1),
('2024-05-01', '5-Lion-008', 0),
('2024-05-01', '5-Lion-009', 1),
('2024-05-01', '5-Lion-010', 1),
('2024-05-01', '6-Elephant-001', 1),
('2024-05-01', '6-Elephant-002', 1),
('2024-05-01', '6-Elephant-003', 0),
('2024-05-01', '6-Elephant-004', 1),
('2024-05-01', '6-Elephant-005', 1),
('2024-05-01', '6-Elephant-006', 1),
('2024-05-01', '6-Elephant-007', 1),
('2024-05-01', '6-Elephant-008', 0),
('2024-05-01', '6-Elephant-009', 1),
('2024-05-01', '6-Elephant-010', 1),
('2024-05-01', 'LKG-B-001', 1),
('2024-05-01', 'LKG-B-002', 0),
('2024-05-01', 'LKG-B-003', 1),
('2024-05-01', 'LKG-B-004', 1),
('2024-05-01', 'LKG-B-005', 1),
('2024-05-01', 'LKG-B-006', 0),
('2024-05-01', 'LKG-B-007', 1),
('2024-05-01', 'LKG-B-008', 1),
('2024-05-01', 'LKG-B-009', 1),
('2024-05-01', 'LKG-B-010', 1),
('2024-05-01', 'NR-A-001', 1),
('2024-05-01', 'NR-A-002', 1),
('2024-05-01', 'NR-A-003', 0),
('2024-05-01', 'NR-A-004', 1),
('2024-05-01', 'NR-A-005', 1),
('2024-05-01', 'NR-A-006', 1),
('2024-05-01', 'NR-A-007', 0),
('2024-05-01', 'NR-A-008', 1),
('2024-05-01', 'NR-A-009', 1),
('2024-05-01', 'NR-A-010', 1),
('2024-05-01', 'UKG-C-001', 1),
('2024-05-01', 'UKG-C-002', 1),
('2024-05-01', 'UKG-C-003', 0),
('2024-05-01', 'UKG-C-004', 1),
('2024-05-01', 'UKG-C-005', 1),
('2024-05-01', 'UKG-C-006', 1),
('2024-05-01', 'UKG-C-007', 0),
('2024-05-01', 'UKG-C-008', 1),
('2024-05-01', 'UKG-C-009', 1),
('2024-05-01', 'UKG-C-010', 1),
('2024-05-23', 'NR-A-001', 0),
('2024-05-23', 'NR-A-002', 1),
('2024-05-23', 'NR-A-003', 1),
('2024-05-23', 'NR-A-004', 0),
('2024-05-23', 'NR-A-005', 1),
('2024-05-23', 'NR-A-006', 0),
('2024-05-23', 'NR-A-007', 1),
('2024-05-23', 'NR-A-008', 1),
('2024-05-23', 'NR-A-009', 1),
('2024-05-23', 'NR-A-010', 1),
('2024-06-04', 'NR-A-001', 0),
('2024-06-04', 'NR-A-002', 0),
('2024-06-04', 'NR-A-003', 1),
('2024-06-04', 'NR-A-004', 1),
('2024-06-04', 'NR-A-005', 1),
('2024-06-04', 'NR-A-006', 1),
('2024-06-04', 'NR-A-007', 1),
('2024-06-04', 'NR-A-008', 1),
('2024-06-04', 'NR-A-009', 1),
('2024-06-04', 'NR-A-010', 0);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `CLASSNAME` varchar(50) NOT NULL,
  `EMAILID` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`CLASSNAME`, `EMAILID`) VALUES
('LKG', 'admin1@school1.com'),
('Nursery', 'admin1@school1.com'),
('UKG', 'admin1@school1.com'),
('1', 'admin2@school2.com'),
('2', 'admin2@school2.com'),
('3', 'admin2@school2.com'),
('4', 'admin3@school3.com'),
('5', 'admin3@school3.com'),
('6', 'admin3@school3.com');

-- --------------------------------------------------------

--
-- Table structure for table `classarm`
--

CREATE TABLE `classarm` (
  `CLASSARMNAME` varchar(50) NOT NULL,
  `CLASSNAME` varchar(50) NOT NULL,
  `EMAILID` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classarm`
--

INSERT INTO `classarm` (`CLASSARMNAME`, `CLASSNAME`, `EMAILID`) VALUES
('A', 'Nursery', 'admin1@school1.com'),
('B', 'LKG', 'admin1@school1.com'),
('C', 'UKG', 'admin1@school1.com'),
('1A', '1', 'admin2@school2.com'),
('1B', '2', 'admin2@school2.com'),
('1C', '3', 'admin2@school2.com'),
('Elephant', '6', 'admin3@school3.com'),
('Lion', '5', 'admin3@school3.com'),
('Tiger', '4', 'admin3@school3.com');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `SESSIONNAME` varchar(20) NOT NULL,
  `EMAILID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`SESSIONNAME`, `EMAILID`) VALUES
('2023-2024', 'admin1@school1.com'),
('2023-2024', 'admin2@school2.com'),
('2023-2024', 'admin3@school3.com'),
('2024-2025', 'admin1@school1.com'),
('2024-2025', 'admin2@school2.com'),
('2024-2025', 'admin3@school3.com');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ROLLNO` varchar(30) NOT NULL,
  `FIRSTNAME` varchar(50) DEFAULT NULL,
  `LASTNAME` varchar(50) DEFAULT NULL,
  `EMAILID` varchar(100) NOT NULL,
  `CLASSARMNAME` varchar(50) NOT NULL,
  `CLASSNAME` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ROLLNO`, `FIRSTNAME`, `LASTNAME`, `EMAILID`, `CLASSARMNAME`, `CLASSNAME`) VALUES
('1A-001', 'Aarav', 'Sharma', 'admin2@school2.com', '1A', '1'),
('1A-002', 'Saanvi', 'Verma', 'admin2@school2.com', '1A', '1'),
('1A-003', 'Aryan', 'Gupta', 'admin2@school2.com', '1A', '1'),
('1A-004', 'Diya', 'Singh', 'admin2@school2.com', '1A', '1'),
('1A-005', 'Ishaan', 'Patel', 'admin2@school2.com', '1A', '1'),
('1A-006', 'Kabir', 'Mehta', 'admin2@school2.com', '1A', '1'),
('1A-007', 'Maya', 'Malhotra', 'admin2@school2.com', '1A', '1'),
('1A-008', 'Krishna', 'Iyer', 'admin2@school2.com', '1A', '1'),
('1A-009', 'Ananya', 'Nair', 'admin2@school2.com', '1A', '1'),
('1A-010', 'Riya', 'Pandey', 'admin2@school2.com', '1A', '1'),
('1B-001', 'Aarav', 'Sharma', 'admin2@school2.com', '1B', '2'),
('1B-002', 'Saanvi', 'Verma', 'admin2@school2.com', '1B', '2'),
('1B-003', 'Aryan', 'Gupta', 'admin2@school2.com', '1B', '2'),
('1B-004', 'Diya', 'Singh', 'admin2@school2.com', '1B', '2'),
('1B-005', 'Ishaan', 'Patel', 'admin2@school2.com', '1B', '2'),
('1B-006', 'Kabir', 'Mehta', 'admin2@school2.com', '1B', '2'),
('1B-007', 'Maya', 'Malhotra', 'admin2@school2.com', '1B', '2'),
('1B-008', 'Krishna', 'Iyer', 'admin2@school2.com', '1B', '2'),
('1B-009', 'Ananya', 'Nair', 'admin2@school2.com', '1B', '2'),
('1B-010', 'Riya', 'Pandey', 'admin2@school2.com', '1B', '2'),
('1C-001', 'Aarav', 'Sharma', 'admin2@school2.com', '1C', '3'),
('1C-002', 'Saanvi', 'Verma', 'admin2@school2.com', '1C', '3'),
('1C-003', 'Aryan', 'Gupta', 'admin2@school2.com', '1C', '3'),
('1C-004', 'Diya', 'Singh', 'admin2@school2.com', '1C', '3'),
('1C-005', 'Ishaan', 'Patel', 'admin2@school2.com', '1C', '3'),
('1C-006', 'Kabir', 'Mehta', 'admin2@school2.com', '1C', '3'),
('1C-007', 'Maya', 'Malhotra', 'admin2@school2.com', '1C', '3'),
('1C-008', 'Krishna', 'Iyer', 'admin2@school2.com', '1C', '3'),
('1C-009', 'Ananya', 'Nair', 'admin2@school2.com', '1C', '3'),
('1C-010', 'Riya', 'Pandey', 'admin2@school2.com', '1C', '3'),
('4-Tiger-001', 'Aarav', 'Sharma', 'admin3@school3.com', 'Tiger', '4'),
('4-Tiger-002', 'Saanvi', 'Verma', 'admin3@school3.com', 'Tiger', '4'),
('4-Tiger-003', 'Aryan', 'Gupta', 'admin3@school3.com', 'Tiger', '4'),
('4-Tiger-004', 'Diya', 'Singh', 'admin3@school3.com', 'Tiger', '4'),
('4-Tiger-005', 'Ishaan', 'Patel', 'admin3@school3.com', 'Tiger', '4'),
('4-Tiger-006', 'Kabir', 'Mehta', 'admin3@school3.com', 'Tiger', '4'),
('4-Tiger-007', 'Maya', 'Malhotra', 'admin3@school3.com', 'Tiger', '4'),
('4-Tiger-008', 'Krishna', 'Iyer', 'admin3@school3.com', 'Tiger', '4'),
('4-Tiger-009', 'Ananya', 'Nair', 'admin3@school3.com', 'Tiger', '4'),
('4-Tiger-010', 'Riya', 'Pandey', 'admin3@school3.com', 'Tiger', '4'),
('5-Lion-001', 'Aarav', 'Sharma', 'admin3@school3.com', 'Lion', '5'),
('5-Lion-002', 'Saanvi', 'Verma', 'admin3@school3.com', 'Lion', '5'),
('5-Lion-003', 'Aryan', 'Gupta', 'admin3@school3.com', 'Lion', '5'),
('5-Lion-004', 'Diya', 'Singh', 'admin3@school3.com', 'Lion', '5'),
('5-Lion-005', 'Ishaan', 'Patel', 'admin3@school3.com', 'Lion', '5'),
('5-Lion-006', 'Kabir', 'Mehta', 'admin3@school3.com', 'Lion', '5'),
('5-Lion-007', 'Maya', 'Malhotra', 'admin3@school3.com', 'Lion', '5'),
('5-Lion-008', 'Krishna', 'Iyer', 'admin3@school3.com', 'Lion', '5'),
('5-Lion-009', 'Ananya', 'Nair', 'admin3@school3.com', 'Lion', '5'),
('5-Lion-010', 'Riya', 'Pandey', 'admin3@school3.com', 'Lion', '5'),
('6-Elephant-001', 'Aarav', 'Sharma', 'admin3@school3.com', 'Elephant', '6'),
('6-Elephant-002', 'Saanvi', 'Verma', 'admin3@school3.com', 'Elephant', '6'),
('6-Elephant-003', 'Aryan', 'Gupta', 'admin3@school3.com', 'Elephant', '6'),
('6-Elephant-004', 'Diya', 'Singh', 'admin3@school3.com', 'Elephant', '6'),
('6-Elephant-005', 'Ishaan', 'Patel', 'admin3@school3.com', 'Elephant', '6'),
('6-Elephant-006', 'Kabir', 'Mehta', 'admin3@school3.com', 'Elephant', '6'),
('6-Elephant-007', 'Maya', 'Malhotra', 'admin3@school3.com', 'Elephant', '6'),
('6-Elephant-008', 'Krishna', 'Iyer', 'admin3@school3.com', 'Elephant', '6'),
('6-Elephant-009', 'Ananya', 'Nair', 'admin3@school3.com', 'Elephant', '6'),
('6-Elephant-010', 'Riya', 'Pandey', 'admin3@school3.com', 'Elephant', '6'),
('LKG-B-001', 'Aarav', 'Sharma', 'admin1@school1.com', 'B', 'LKG'),
('LKG-B-002', 'Saanvi', 'Verma', 'admin1@school1.com', 'B', 'LKG'),
('LKG-B-003', 'Aryan', 'Gupta', 'admin1@school1.com', 'B', 'LKG'),
('LKG-B-004', 'Diya', 'Singh', 'admin1@school1.com', 'B', 'LKG'),
('LKG-B-005', 'Ishaan', 'Patel', 'admin1@school1.com', 'B', 'LKG'),
('LKG-B-006', 'Kabir', 'Mehta', 'admin1@school1.com', 'B', 'LKG'),
('LKG-B-007', 'Maya', 'Malhotra', 'admin1@school1.com', 'B', 'LKG'),
('LKG-B-008', 'Krishna', 'Iyer', 'admin1@school1.com', 'B', 'LKG'),
('LKG-B-009', 'Ananya', 'Nair', 'admin1@school1.com', 'B', 'LKG'),
('LKG-B-010', 'Riya', 'Pandey', 'admin1@school1.com', 'B', 'LKG'),
('NR-A-001', 'Aarav', 'Singh', 'admin1@school1.com', 'A', 'Nursery'),
('NR-A-002', 'Saanvi', 'Sharma', 'admin1@school1.com', 'A', 'Nursery'),
('NR-A-003', 'Aryan', 'Khan', 'admin1@school1.com', 'A', 'Nursery'),
('NR-A-004', 'Diya', 'Patel', 'admin1@school1.com', 'A', 'Nursery'),
('NR-A-005', 'Ishaan', 'Mehta', 'admin1@school1.com', 'A', 'Nursery'),
('NR-A-006', 'Kabir', 'Malhotra', 'admin1@school1.com', 'A', 'Nursery'),
('NR-A-007', 'Maya', 'Iyer', 'admin1@school1.com', 'A', 'Nursery'),
('NR-A-008', 'Krishna', 'Nair', 'admin1@school1.com', 'A', 'Nursery'),
('NR-A-009', 'Ananya', 'Pandey', 'admin1@school1.com', 'A', 'Nursery'),
('NR-A-010', 'Riya', 'Chopra', 'admin1@school1.com', 'A', 'Nursery'),
('UKG-C-001', 'Aarav', 'Rana', 'admin1@school1.com', 'C', 'UKG'),
('UKG-C-002', 'Saanvi', 'Chopra', 'admin1@school1.com', 'C', 'UKG'),
('UKG-C-003', 'Aryan', 'Kashyap', 'admin1@school1.com', 'C', 'UKG'),
('UKG-C-004', 'Diya', 'Joshi', 'admin1@school1.com', 'C', 'UKG'),
('UKG-C-005', 'Ishaan', 'Sharma', 'admin1@school1.com', 'C', 'UKG'),
('UKG-C-006', 'Kabir', 'Verma', 'admin1@school1.com', 'C', 'UKG'),
('UKG-C-007', 'Maya', 'Gupta', 'admin1@school1.com', 'C', 'UKG'),
('UKG-C-008', 'Krishna', 'Singh', 'admin1@school1.com', 'C', 'UKG'),
('UKG-C-009', 'Ananya', 'Patel', 'admin1@school1.com', 'C', 'UKG'),
('UKG-C-010', 'Riya', 'Mehta', 'admin1@school1.com', 'C', 'UKG');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `TMAILID` varchar(100) NOT NULL,
  `FIRSTNAME` varchar(50) DEFAULT NULL,
  `LASTNAME` varchar(50) DEFAULT NULL,
  `PHONENO` bigint(12) DEFAULT NULL,
  `CLASSNAME` varchar(50) DEFAULT NULL,
  `CLASSARMNAME` varchar(50) DEFAULT NULL,
  `EMAILID` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`TMAILID`, `FIRSTNAME`, `LASTNAME`, `PHONENO`, `CLASSNAME`, `CLASSARMNAME`, `EMAILID`) VALUES
('teacher1@school1.com', 'Anita', 'Sharma', 9876543212, 'Nursery', 'A', 'admin1@school1.com'),
('teacher2@school1.com', 'Rajesh', 'Verma', 9876543213, 'LKG', 'B', 'admin1@school1.com'),
('teacher3@school1.com', 'Sunita', 'Patel', 9876543214, 'UKG', 'C', 'admin1@school1.com'),
('teacher4@school2.com', 'Amit', 'Gupta', 9876543215, '1', '1A', 'admin2@school2.com'),
('teacher5@school2.com', 'Kavita', 'Joshi', 9876543216, '2', '1B', 'admin2@school2.com'),
('teacher6@school2.com', 'Suresh', 'Rana', 9876543217, '3', '1C', 'admin2@school2.com'),
('teacher7@school3.com', 'Neha', 'Chopra', 9876543218, '4', 'Tiger', 'admin3@school3.com'),
('teacher8@school3.com', 'Vikas', 'Bhatia', 9876543219, '5', 'Lion', 'admin3@school3.com'),
('teacher9@school3.com', 'Pooja', 'Rana', 9876543220, '6', 'Elephant', 'admin3@school3.com');

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `TERM` varchar(50) NOT NULL,
  `SESSION` varchar(20) DEFAULT NULL,
  `STARTDATE` date DEFAULT NULL,
  `ENDDATE` date DEFAULT NULL,
  `EMAILID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`TERM`, `SESSION`, `STARTDATE`, `ENDDATE`, `EMAILID`) VALUES
('Term 1', '2023-2024', '2023-06-01', '2023-09-30', 'admin1@school1.com'),
('Term 1', '2023-2024', '2023-06-01', '2023-09-30', 'admin2@school2.com'),
('Term 1', '2023-2024', '2023-06-01', '2023-09-30', 'admin3@school3.com'),
('Term 2', '2023-2024', '2023-10-01', '2024-03-31', 'admin1@school1.com'),
('Term 2', '2023-2024', '2023-10-01', '2024-03-31', 'admin2@school2.com'),
('Term 2', '2023-2024', '2023-10-01', '2024-03-31', 'admin3@school3.com');

-- --------------------------------------------------------

--
-- Table structure for table `userr`
--

CREATE TABLE `userr` (
  `EMAILID` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL,
  `USERROLE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userr`
--

INSERT INTO `userr` (`EMAILID`, `PASSWORD`, `USERROLE`) VALUES
('admin1@school1.com', 'adminpass1', 'administrator'),
('admin2@school2.com', 'adminpass2', 'administrator'),
('admin3@school3.com', 'adminpass3', 'administrator'),
('teacher1@school1.com', 'teacherpass1', 'teacher'),
('teacher2@school1.com', 'teacherpass2', 'teacher'),
('teacher3@school1.com', 'teacherpass3', 'teacher'),
('teacher4@school2.com', 'teacherpass4', 'teacher'),
('teacher5@school2.com', 'teacherpass5', 'teacher'),
('teacher6@school2.com', 'teacherpass6', 'teacher'),
('teacher7@school3.com', 'teacherpass7', 'teacher'),
('teacher8@school3.com', 'teacherpass8', 'teacher'),
('teacher9@school3.com', 'teacherpass9', 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`EMAILID`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`day`,`rollno`),
  ADD KEY `rollno` (`rollno`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`CLASSNAME`),
  ADD KEY `EMAILID` (`EMAILID`);

--
-- Indexes for table `classarm`
--
ALTER TABLE `classarm`
  ADD PRIMARY KEY (`CLASSARMNAME`,`CLASSNAME`),
  ADD KEY `CLASSNAME` (`CLASSNAME`),
  ADD KEY `EMAILID` (`EMAILID`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`SESSIONNAME`,`EMAILID`),
  ADD KEY `EMAILID` (`EMAILID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ROLLNO`,`EMAILID`,`CLASSARMNAME`),
  ADD KEY `CLASSARMNAME` (`CLASSARMNAME`),
  ADD KEY `EMAILID` (`EMAILID`),
  ADD KEY `ROLLNO` (`ROLLNO`),
  ADD KEY `student_ibfk_1` (`CLASSNAME`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`TMAILID`),
  ADD KEY `CLASSNAME` (`CLASSNAME`),
  ADD KEY `CLASSARMNAME` (`CLASSARMNAME`),
  ADD KEY `EMAILID` (`EMAILID`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`TERM`,`EMAILID`),
  ADD KEY `SESSION` (`SESSION`),
  ADD KEY `EMAILID` (`EMAILID`);

--
-- Indexes for table `userr`
--
ALTER TABLE `userr`
  ADD PRIMARY KEY (`EMAILID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`EMAILID`) REFERENCES `userr` (`EMAILID`);

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`rollno`) REFERENCES `student` (`ROLLNO`);

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`EMAILID`) REFERENCES `userr` (`EMAILID`);

--
-- Constraints for table `classarm`
--
ALTER TABLE `classarm`
  ADD CONSTRAINT `classarm_ibfk_1` FOREIGN KEY (`CLASSNAME`) REFERENCES `class` (`CLASSNAME`),
  ADD CONSTRAINT `classarm_ibfk_2` FOREIGN KEY (`EMAILID`) REFERENCES `userr` (`EMAILID`);

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`EMAILID`) REFERENCES `userr` (`EMAILID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`CLASSNAME`) REFERENCES `class` (`CLASSNAME`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`CLASSARMNAME`) REFERENCES `classarm` (`CLASSARMNAME`),
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`EMAILID`) REFERENCES `userr` (`EMAILID`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`CLASSNAME`) REFERENCES `class` (`CLASSNAME`),
  ADD CONSTRAINT `teacher_ibfk_2` FOREIGN KEY (`CLASSARMNAME`) REFERENCES `classarm` (`CLASSARMNAME`);

--
-- Constraints for table `term`
--
ALTER TABLE `term`
  ADD CONSTRAINT `term_ibfk_1` FOREIGN KEY (`SESSION`) REFERENCES `session` (`SESSIONNAME`),
  ADD CONSTRAINT `term_ibfk_2` FOREIGN KEY (`EMAILID`) REFERENCES `userr` (`EMAILID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
