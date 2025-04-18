-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: localhost    Database: miniproject
-- ------------------------------------------------------
-- Server version	8.0.41

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2025 at 05:29 PM
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
-- Database: `miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `announcement_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `expiry_date` date DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`announcement_id`, `title`, `description`, `created_at`, `expiry_date`, `posted_by`, `teacher_id`) VALUES
(4, 'New Semester Begins', 'Classes for the new semester will commence from next Monday.', '2025-04-12 12:24:39', '2025-06-01', 4, 101),
(5, 'Library Timings Extended', 'The library will now be open until 9 PM on weekdays.', '2025-04-12 12:24:39', '2025-05-31', 5, NULL),
(6, 'Workshop on AI', 'Join us for an exciting workshop on Artificial Intelligence.', '2025-04-12 12:24:39', '2025-06-15', 6, NULL),
(7, 'New Semester Begins', 'Classes for the new semester will commence from next Monday.', '2025-04-12 12:24:39', '2025-06-01', 4, NULL),
(8, 'Library Timings Extended', 'The library will now be open until 9 PM on weekdays.', '2025-04-12 12:24:39', '2025-05-31', 5, NULL),
(9, 'Workshop on AI', 'Join us for an exciting workshop on Artificial Intelligence.', '2025-04-12 12:24:39', '2025-06-15', 6, NULL),
(12, 'Hello', 'Testing', '2025-04-18 15:19:56', '2025-04-19', 101, NULL),
(13, 'CCA MARKS Announcement', 'CCA MARKS ARE UPLOADED ON LMS.', '2025-04-18 15:22:12', '2025-04-30', 101, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `Assessment_ID` int(11) NOT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Course_ID` varchar(20) DEFAULT NULL,
  `Max_Marks` int(11) DEFAULT NULL,
  `Weightage` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`Assessment_ID`, `Type`, `Course_ID`, `Max_Marks`, `Weightage`) VALUES
(101, 'Quiz', 'COM2UE02A', 20, 10),
(102, 'Project', 'BBA2UE05A', 50, 30),
(103, 'Midterm Exam', 'DES2UE02A', 100, 40),
(104, 'Final Exam', 'RCS2UE02A', 150, 50),
(105, 'Assignment', 'RCS2UE04A', 30, 15);

-- --------------------------------------------------------

--
-- Table structure for table `core_elective`
--

CREATE TABLE `core_elective` (
  `Core_Type` int(11) DEFAULT NULL,
  `Course_ID` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_mode`
--

CREATE TABLE `course_mode` (
  `Course_ID` varchar(10) NOT NULL,
  `Mode_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_mode`
--

INSERT INTO `course_mode` (`Course_ID`, `Mode_ID`) VALUES
('BBA2UE03A', 1),
('BBA2UE06A', 1),
('CET2UE01A', 1),
('CSA2UE03A', 1),
('CSE2UE05A', 1),
('CSE2UE06A', 1),
('DES2UE02A', 1),
('HHA2UE02A', 1),
('RCS2UE03A', 1),
('RCS2UE04A', 1),
('BBA2UE05A', 2),
('COM2UE04A', 2),
('CSA2UE05A', 2),
('DES2UE03A', 2),
('ECO2UE03A', 2),
('HHA2UE04A', 2),
('RCS2UE02A', 2),
('COM2UE01A', 3),
('COM2UE02A', 3),
('CSA2UE17A', 3),
('CSE2UE01A', 3),
('CSE2UE02A', 3),
('CSE2UE03A', 3),
('ECO2UE01A', 3),
('PPL2UE01A', 3);

-- --------------------------------------------------------

--
-- Table structure for table `course_professor`
--

CREATE TABLE `course_professor` (
  `Course_ID` varchar(10) NOT NULL,
  `Professor_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_professor`
--

INSERT INTO `course_professor` (`Course_ID`, `Professor_ID`) VALUES
('BBA2UE03A', 104),
('BBA2UE05A', 104),
('BBA2UE06A', 105),
('CET2UE01A', 108),
('COM2UE01A', 115),
('COM2UE02A', 116),
('COM2UE04A', 117),
('CSA2UE03A', 110),
('CSA2UE05A', 111),
('CSA2UE17A', 112),
('CSE2UE01A', 106),
('CSE2UE02A', 107),
('CSE2UE03A', 108),
('CSE2UE05A', 111),
('CSE2UE06A', 110),
('DES2UE02A', 112),
('DES2UE03A', 113),
('ECO2UE01A', 117),
('ECO2UE03A', 115),
('HHA2UE02A', 105),
('HHA2UE04A', 107),
('PPL2UE01A', 114),
('RCS2UE02A', 103),
('RCS2UE03A', 101),
('RCS2UE04A', 102);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Department_ID` int(11) NOT NULL,
  `Department_Name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Department_ID`, `Department_Name`) VALUES
(1, 'School of Leadership'),
(2, 'Business'),
(3, 'Hospitality'),
(4, 'Department of Computer Engineering and Technology'),
(5, 'Department of Computer Science and Applications'),
(6, 'Department of Design'),
(7, 'Department of Economics and Public Policy'),
(8, 'Department of Commerce and Accounting'),
(9, 'Department of Economics and Public Policy'),
(10, 'Department of Mechanical Engineering'),
(11, 'Department of Civil Engineering'),
(12, 'Department of Petroleum Engineering'),
(14, 'Public Health'),
(15, 'School of Law'),
(16, 'Department of Liberal Arts'),
(17, 'Department of Peace Studies'),
(18, 'Mathematics and Statistics'),
(19, 'Department of Biosciences and Technology'),
(20, 'Physics'),
(21, 'Chemistry'),
(22, 'Department of Environmental Science'),
(23, 'Department of Biotechnology'),
(24, 'Department of Pharmacy'),
(25, 'Department of Electrical Engineering'),
(26, 'Department of Electronics and Communication Engineering'),
(27, 'Department of Artificial Intelligence and Data Science'),
(28, 'Department of Robotics and Automation'),
(29, 'Department of Media and Communication Studies'),
(30, 'Department of Fine Arts'),
(31, 'Department of Performing Arts'),
(32, 'Department of Social Work'),
(33, 'Department of Psychology'),
(34, 'Department of Sports Science'),
(35, 'Department of International Relations'),
(36, 'Department of Food Technology'),
(37, 'Department of Fashion and Textile Design'),
(38, 'Department of Nanotechnology'),
(39, 'Department of Renewable Energy'),
(40, 'Department of Urban Planning and Architecture');

-- --------------------------------------------------------

--
-- Table structure for table `department_professor`
--

CREATE TABLE `department_professor` (
  `Professor_ID` int(11) NOT NULL,
  `Department_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department_professor`
--

INSERT INTO `department_professor` (`Professor_ID`, `Department_ID`) VALUES
(101, 1),
(102, 1),
(103, 1),
(104, 2),
(105, 3),
(106, 4),
(107, 4),
(108, 4),
(109, 4),
(110, 4),
(111, 4),
(112, 5),
(113, 6),
(114, 7),
(115, 8),
(116, 8),
(117, 7);

-- --------------------------------------------------------

--
-- Table structure for table `discussions`
--

CREATE TABLE `discussions` (
  `discussion_id` int(11) NOT NULL,
  `course_id` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `posted_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discussions`
--

INSERT INTO `discussions` (`discussion_id`, `course_id`, `user_id`, `message`, `posted_at`) VALUES
(1, 'BBA2UE03A', 1, 'What are some good case studies for entrepreneurship?', '2025-03-27 21:26:35'),
(2, 'CSE2UE01A', 2, 'Can someone explain the AI model used in this course?', '2025-03-27 21:26:35'),
(3, 'CSA2UE03A', 3, 'I have a doubt regarding network security protocols.', '2025-03-27 21:26:35'),
(4, 'COM2UE01A', 2, 'How can we optimize financial reporting strategies?', '2025-03-27 21:26:35');

-- --------------------------------------------------------

--
-- Table structure for table `elective_category`
--

CREATE TABLE `elective_category` (
  `Category_ID` int(11) NOT NULL,
  `Elective_Name` varchar(50) DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `elective_course`
--

CREATE TABLE `elective_course` (
  `Course_ID` varchar(50) NOT NULL,
  `Elective_Name` varchar(100) DEFAULT NULL,
  `Credits` int(11) DEFAULT NULL,
  `Department_ID` int(11) DEFAULT NULL,
  `assigned_teacher` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `elective_course`
--

INSERT INTO `elective_course` (`Course_ID`, `Elective_Name`, `Credits`, `Department_ID`, `assigned_teacher`) VALUES
('BBA2UE03A', 'Entrepreneurship', 4, 2, 101),
('BBA2UE05A', 'Personal Finance', 4, 2, NULL),
('BBA2UE06A', 'Consumer Behaviour', 4, 2, NULL),
('CET2UE01A', 'Computer Graphics', 4, 4, NULL),
('COM2UE01A', 'Financial Accounting', 4, 8, NULL),
('COM2UE02A', 'Income Tax', 4, 8, NULL),
('COM2UE04A', 'Taxation Laws', 4, 8, NULL),
('CSA2UE03A', 'Cyber Security', 4, 5, NULL),
('CSA2UE05A', 'Cloud Computing', 4, 5, NULL),
('CSA2UE17A', 'Software Engineering', 4, 5, NULL),
('CSE2UE01A', 'AI ML For Everyone', 4, 4, NULL),
('CSE2UE02A', 'ChatGPT', 4, 4, NULL),
('CSE2UE03A', 'Cybersecurity', 4, 4, NULL),
('CSE2UE05A', 'Programming with Python', 4, 4, NULL),
('CSE2UE06A', 'Programming with Java', 4, 4, NULL),
('DES2UE02A', 'Product Design', 4, 6, NULL),
('DES2UE03A', 'Design Methods', 4, 6, NULL),
('ECO2UE01A', 'Managerial Economics', 4, 7, NULL),
('ECO2UE03A', 'Public Policy Analysis', 4, 7, NULL),
('HHA2UE02A', 'Tourism Marketing', 4, 3, NULL),
('HHA2UE04A', 'Food and Beverage Management', 4, 3, NULL),
('PPL2UE01A', 'Behavioral Economics and Public Policy', 4, 7, NULL),
('RCS2UE02A', 'Professional Communication', 4, 1, NULL),
('RCS2UE03A', 'Business Applications of Digital Technology', 4, 1, NULL),
('RCS2UE04A', 'Business Intelligence and Data Visualisation with Tableau', 4, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `Entollment_Date` date DEFAULT NULL,
  `Status` tinyint(1) DEFAULT NULL,
  `Course_ID` varchar(20) DEFAULT NULL,
  `Student_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`Entollment_Date`, `Status`, `Course_ID`, `Student_ID`) VALUES
('2024-03-01', 1, 'BBA2UE03A', 1001),
('2024-03-02', 1, 'BBA2UE05A', 1002),
('2024-03-03', 1, 'BBA2UE06A', 1003),
('2024-03-04', 1, 'CET2UE01A', 1004),
('2024-03-05', 1, 'COM2UE01A', 1005),
('2024-03-06', 1, 'COM2UE02A', 1006),
('2024-03-07', 1, 'COM2UE04A', 1007),
('2024-03-08', 1, 'CSA2UE03A', 1008),
('2024-03-09', 1, 'CSA2UE05A', 1009),
('2024-03-10', 1, 'CSA2UE17A', 1010),
('2024-03-11', 1, 'CSE2UE01A', 1011),
('2024-03-12', 1, 'CSE2UE02A', 1012),
('2024-03-13', 1, 'CSE2UE03A', 1013),
('2024-03-14', 1, 'CSE2UE05A', 1014),
('2024-03-15', 1, 'CSE2UE06A', 1015),
('2024-03-16', 1, 'DES2UE02A', 1016),
('2024-03-17', 1, 'DES2UE03A', 1017),
('2024-03-18', 1, 'ECO2UE01A', 1018),
('2024-03-19', 1, 'ECO2UE03A', 1019),
('2024-03-20', 1, 'HHA2UE02A', 1020),
('2024-03-21', 1, 'HHA2UE04A', 1021);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` varchar(50) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `comments` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `student_id`, `course_id`, `rating`, `comments`, `created_at`) VALUES
(1, 1001, 'BBA2UE03A', 5, 'Loved the course, very informative!', '2025-03-27 21:29:15'),
(2, 1002, 'CSE2UE01A', 4, 'Great teaching style, but can be more interactive.', '2025-03-27 21:29:15'),
(3, 1003, 'CSA2UE03A', 5, 'Excellent course content!', '2025-03-27 21:29:15'),
(4, 1004, 'COM2UE01A', 4, 'Helpful, but assignments were tough.', '2025-03-27 21:29:15'),
(5, 1005, 'HHA2UE02A', 5, 'Amazing real-world applications discussed.', '2025-03-27 21:29:15');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `Location_ID` int(11) NOT NULL,
  `Location_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`Location_ID`, `Location_Name`) VALUES
(1, 'KS 203'),
(2, 'DR 105'),
(3, 'GN 103');

-- --------------------------------------------------------

--
-- Table structure for table `mode`
--

CREATE TABLE `mode` (
  `Mode_ID` int(11) NOT NULL,
  `Mode_Type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mode`
--

INSERT INTO `mode` (`Mode_ID`, `Mode_Type`) VALUES
(2, 'Blended (Offline & Asynchronous)'),
(1, 'Blended (Online & Asynchronous)'),
(3, 'MOOC');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `is_read` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `user_id`, `message`, `created_at`, `is_read`) VALUES
(1, 1, 'New announcement: Mid-Term Exams.', '2025-03-27 21:20:07', 0),
(2, 2, 'Reminder: Workshop on AI starts tomorrow.', '2025-03-27 21:20:07', 0),
(3, 3, 'Library hours updated!', '2025-03-27 21:20:07', 1),
(4, 4, 'Welcome to the portal!', '2025-04-12 12:24:39', 0),
(5, 5, 'Your password was changed recently.', '2025-04-12 12:24:39', 1),
(6, 6, 'You have a new announcement.', '2025-04-12 12:24:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `open_elective`
--

CREATE TABLE `open_elective` (
  `Open_Field` int(11) DEFAULT NULL,
  `Course_ID` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `practical_assessment`
--

CREATE TABLE `practical_assessment` (
  `Assessment_ID` int(11) DEFAULT NULL,
  `Assessment_Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `report_type` enum('Course Report','Student Progress','Attendance Report','Grade Distribution','Performance Analytics') NOT NULL,
  `description` varchar(500) NOT NULL,
  `generated_by` int(11) NOT NULL,
  `generated_at` timestamp NULL DEFAULT current_timestamp(),
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `report_type`, `description`, `generated_by`, `generated_at`, `file_path`) VALUES
(6, 'Student Progress', 'Progress report for second year students.', 13, '2025-04-12 12:24:39', 'reports/progress_2025.pdf'),
(7, 'Attendance Report', 'Monthly attendance report.', 4, '2025-04-12 12:24:39', 'reports/attendance_may.pdf'),
(8, 'Performance Analytics', 'Analysis of student performance trends.', 5, '2025-04-12 12:24:39', 'reports/performance_q2.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `final_grade` varchar(2) NOT NULL,
  `percentage` decimal(5,2) NOT NULL,
  `remarks` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `student_id`, `course_id`, `instructor_id`, `final_grade`, `percentage`, `remarks`) VALUES
(11, 1001, 'BBA2UE03A', 101, 'A', 92.50, 'Excellent grasp on Entrepreneurship'),
(12, 1002, 'CSE2UE01A', 102, 'B+', 85.75, 'Good understanding of AI ML'),
(13, 1003, 'CSA2UE05A', 103, 'A-', 89.00, 'Strong knowledge in Cloud Computing'),
(14, 1004, 'ECO2UE03A', 104, 'B', 78.20, 'Needs improvement in Public Policy Analysis'),
(15, 1005, 'DES2UE02A', 105, 'C+', 72.50, 'Basic understanding of Product Design');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `Schedule_ID` int(11) NOT NULL,
  `Start_Time` time NOT NULL,
  `End_Time` time NOT NULL,
  `Course_ID` varchar(20) NOT NULL,
  `Day` varchar(20) NOT NULL,
  `Location_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`Schedule_ID`, `Start_Time`, `End_Time`, `Course_ID`, `Day`, `Location_ID`) VALUES
(1, '15:00:00', '18:00:00', 'BBA2UE03A', 'Saturday', 1),
(2, '15:00:00', '18:00:00', 'CSE2UE01A', 'Saturday', 2),
(3, '15:00:00', '18:00:00', 'CSA2UE03A', 'Saturday', 3),
(4, '14:00:00', '16:30:00', 'CSE2UE02A', 'Saturday', 1),
(5, '14:00:00', '16:30:00', 'COM2UE02A', 'Saturday', 2),
(6, '14:00:00', '16:30:00', 'CET2UE01A', 'Saturday', 3),
(7, '14:30:00', '17:30:00', 'CSA2UE05A', 'Saturday', 1),
(9, '14:30:00', '17:30:00', 'RCS2UE02A', 'Saturday', 3),
(11, '15:00:00', '18:00:00', 'PPL2UE01A', 'Saturday', 2),
(13, '14:00:00', '16:30:00', 'ECO2UE03A', 'Saturday', 1),
(15, '14:30:00', '17:30:00', 'DES2UE02A', 'Saturday', 3),
(16, '14:30:00', '17:30:00', 'HHA2UE02A', 'Saturday', 1),
(18, '15:00:00', '18:00:00', 'CSE2UE03A', 'Saturday', 3),
(19, '15:00:00', '18:00:00', 'COM2UE01A', 'Saturday', 1),
(21, '14:00:00', '16:30:00', 'BBA2UE05A', 'Saturday', 3),
(22, '14:00:00', '16:30:00', 'CSE2UE05A', 'Saturday', 1),
(24, '14:30:00', '17:30:00', 'CSA2UE17A', 'Saturday', 3),
(26, '15:00:00', '18:00:00', 'RCS2UE03A', 'Saturday', 2),
(27, '15:00:00', '18:00:00', 'DES2UE03A', 'Saturday', 3),
(29, '14:00:00', '16:30:00', 'CSE2UE06A', 'Saturday', 2);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Student_ID` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Contact` bigint(20) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Year` varchar(10) DEFAULT NULL,
  `Department_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_ID`, `Name`, `Contact`, `Email`, `Year`, `Department_ID`) VALUES
(1001, 'Aarav Sharma', 9876543210, 'aarav.sharma@gmail.com', 'Second', 17),
(1002, 'Ishita Patel', 9823456789, 'ishita.patel@gmail.com', 'Second', 27),
(1003, 'Rohan Iyer', 9812345678, 'rohan.iyer@gmail.com', 'Third', 3),
(1004, 'Sneha Verma', 9809876543, 'sneha.verma@gmail.com', 'Second', 31),
(1005, 'Aditya Menon', 9798765432, 'aditya.menon@gmail.com', 'Second', 5),
(1006, 'Priya Nair', 9787654321, 'priya.nair@gmail.com', 'Third', 17),
(1007, 'Rahul Deshmukh', 9776543210, 'rahul.deshmukh@gmail.com', 'Second', 27),
(1008, 'Kavya Joshi', 9765432109, 'kavya.joshi@gmail.com', 'Second', 1),
(1009, 'Aniket Saxena', 9754321098, 'aniket.saxena@gmail.com', 'Third', 20),
(1010, 'Meera Kapoor', 9743210987, 'meera.kapoor@gmail.com', 'Second', 22),
(1011, 'Arjun Reddy', 9732109876, 'arjun.reddy@gmail.com', 'Second', 18),
(1012, 'Neha Choudhary', 9721098765, 'neha.choudhary@gmail.com', 'Third', 15),
(1013, 'Siddharth Bhattacharya', 9710987654, 'siddharth.bhattacharya@gmail.com', 'Second', 30),
(1014, 'Pooja Ghosh', 9709876543, 'pooja.ghosh@gmail.com', 'Second', 38),
(1015, 'Vikram Malhotra', 9698765432, 'vikram.malhotra@gmail.com', 'Fourth', 40),
(1016, 'Aisha Khan', 9687654321, 'aisha.khan@gmail.com', 'Second', 39),
(1017, 'Rajat Mehta', 9676543210, 'rajat.mehta@gmail.com', 'Second', 31),
(1018, 'Divya Rao', 9665432109, 'divya.rao@gmail.com', 'Third', 37),
(1019, 'Kabir Sharma', 9654321098, 'kabir.sharma@gmail.com', 'Fourth', 37),
(1020, 'Tanisha Singh', 9643210987, 'tanisha.singh@gmail.com', 'Second', 25),
(1021, 'Varun Nair', 9632109876, 'varun.nair@gmail.com', 'Second', 18),
(1022, 'Ananya Pillai', 9621098765, 'ananya.pillai@gmail.com', 'Third', 7),
(1023, 'Rishi Sinha', 9610987654, 'rishi.sinha@gmail.com', 'Fourth', 9),
(1024, 'Simran Kaur', 9609876543, 'simran.kaur@gmail.com', 'Second', 21),
(1025, 'Harsh Vardhan', 9598765432, 'harsh.vardhan@gmail.com', 'Second', 8),
(1026, 'Sonal Trivedi', 9587654321, 'sonal.trivedi@gmail.com', 'Third', 30),
(1027, 'Amit Joshi', 9576543210, 'amit.joshi@gmail.com', 'Fourth', 12),
(1028, 'Neeraj Pandey', 9565432109, 'neeraj.pandey@gmail.com', 'Second', 37),
(1029, 'Isha Ramesh', 9554321098, 'isha.ramesh@gmail.com', 'Second', 26),
(1030, 'Yash Thakur', 9543210987, 'yash.thakur@gmail.com', 'Third', 11),
(1031, 'Sanya Gokhale', 9532109876, 'sanya.gokhale@gmail.com', 'Fourth', 16),
(1032, 'Vivek Chawla', 9521098765, 'vivek.chawla@gmail.com', 'Second', 35),
(1033, 'Meenal Iyer', 9510987654, 'meenal.iyer@gmail.com', 'Second', 18),
(1034, 'Karthik Rajan', 9509876543, 'karthik.rajan@gmail.com', 'Third', 26),
(1035, 'Shreya Banerjee', 9498765432, 'shreya.banerjee@gmail.com', 'Fourth', 32),
(1036, 'Adarsh Kulkarni', 9487654321, 'adarsh.kulkarni@gmail.com', 'Second', 11),
(1037, 'Pallavi Saxena', 9476543210, 'pallavi.saxena@gmail.com', 'Second', 6),
(1038, 'Rohit Malhotra', 9465432109, 'rohit.malhotra@gmail.com', 'Third', 33),
(1039, 'Tanya Kapoor', 9454321098, 'tanya.kapoor@gmail.com', 'Fourth', 26),
(1040, 'Arnav Mishra', 9443210987, 'arnav.mishra@gmail.com', 'Second', 27),
(1041, 'Niharika Sharma', 9432109876, 'niharika.sharma@gmail.com', 'Second', 22),
(1042, 'Vivek Reddy', 9421098765, 'vivek.reddy@gmail.com', 'Third', 18),
(1043, 'Pallavi Mehta', 9410987654, 'pallavi.mehta@gmail.com', 'Fourth', 24),
(1044, 'Kunal Verma', 9409876543, 'kunal.verma@gmail.com', 'Second', 24),
(1045, 'Aarohi Deshpande', 9398765432, 'aarohi.deshpande@gmail.com', 'Third', 39),
(1046, 'Gautam Rao', 9387654321, 'gautam.rao@gmail.com', 'Fourth', 33),
(1047, 'Rhea Iyer', 9376543210, 'rhea.iyer@gmail.com', 'Second', 10),
(1048, 'Manav Kapoor', 9365432109, 'manav.kapoor@gmail.com', 'Third', 14),
(1049, 'Esha Choudhary', 9354321098, 'esha.choudhary@gmail.com', 'Fourth', 26),
(1050, 'Sagar Pillai', 9343210987, 'sagar.pillai@gmail.com', 'Second', 33),
(1051, 'Vansh Malhotra', 9332109876, 'vansh.malhotra@gmail.com', 'Third', 28),
(1052, 'Meghna Joshi', 9321098765, 'meghna.joshi@gmail.com', 'Fourth', 40),
(1053, 'Tanishq Saxena', 9310987654, 'tanishq.saxena@gmail.com', 'Second', 36),
(1054, 'Aditi Banerjee', 9309876543, 'aditi.banerjee@gmail.com', 'Third', 11),
(1055, 'Kartik Nair', 9298765432, 'kartik.nair@gmail.com', 'Fourth', 8),
(1056, 'Shruti Singh', 9287654321, 'shruti.singh@gmail.com', 'Second', 19),
(1057, 'Rohan Trivedi', 9276543210, 'rohan.trivedi@gmail.com', 'Third', 26),
(1058, 'Piyush Vardhan', 9265432109, 'piyush.vardhan@gmail.com', 'Fourth', 11),
(1059, 'Diya Gokhale', 9254321098, 'diya.gokhale@gmail.com', 'Second', 18),
(1060, 'Anirudh Menon', 9243210987, 'anirudh.menon@gmail.com', 'Third', 20),
(1061, 'Tanya Sinha', 9232109876, 'tanya.sinha@gmail.com', 'Fourth', 11),
(1062, 'Rahul Desai', 9221098765, 'rahul.desai@gmail.com', 'Second', 32),
(1063, 'Swati Ramesh', 9210987654, 'swati.ramesh@gmail.com', 'Third', 28),
(1064, 'Kabir Thakur', 9209876543, 'kabir.thakur@gmail.com', 'Fourth', 21),
(1065, 'Avni Kulkarni', 9198765432, 'avni.kulkarni@gmail.com', 'Second', 32),
(1066, 'Neel Patel', 9187654321, 'neel.patel@gmail.com', 'Third', 35),
(1067, 'Sanya Mishra', 9176543210, 'sanya.mishra@gmail.com', 'Fourth', 39),
(1068, 'Ritik Rajan', 9165432109, 'ritik.rajan@gmail.com', 'Second', 8),
(1069, 'Simran Sethi', 9154321098, 'simran.sethi@gmail.com', 'Third', 30),
(1070, 'Harshit Saxena', 9143210987, 'harshit.saxena@gmail.com', 'Fourth', 29);

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

CREATE TABLE `support_tickets` (
  `ticket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` enum('Open','In Progress','Resolved','Closed') DEFAULT 'Open',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `resolved_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `support_tickets`
--

INSERT INTO `support_tickets` (`ticket_id`, `user_id`, `name`, `email`, `message`, `status`, `created_at`, `resolved_at`) VALUES
(6, 7, 'Sneha Verma', 'sneha.verma@gmail.com', 'Unable to login to my account.', 'Open', '2025-04-12 12:24:39', NULL),
(7, 8, 'Aditya Menon', 'aditya.menon@gmail.com', 'Issue with viewing grades.', 'In Progress', '2025-04-12 12:24:39', NULL),
(8, 9, 'Priya Nair', 'priya.nair@gmail.com', 'Facing issues with course enrollment.', 'Resolved', '2025-04-12 12:24:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_Name` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password_hash` varchar(100) NOT NULL DEFAULT 'Test@123'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_Name`, `Email`, `Password_hash`) VALUES
(101, 'Dr. Satish Chinchorkar', 'satish.chinchorkar@mitwpu.edu.in', 'Test@123'),
(102, 'Dr. Vijeta Singh', 'vijeta.singh@mitwpu.edu.in', 'Test@123'),
(103, 'Dr. Gopa Nayak', 'gopa.nayak@mitwpu.edu.in', 'Test@123'),
(104, 'Dr. Jackson Khumukcham', 'jackson.khumukcham@mitwpu.edu.in', 'Test@123'),
(105, 'Dr. Ravi Kshirsagar', 'ravi.kshirsagar@mitwpu.edu.in', 'Test@123'),
(106, 'Devendra Joshi', 'devendra.joshi1@mitwpu.edu.in', 'Test@123'),
(107, 'Anuradha Nagare', 'anuradha.nagare@mitwpu.edu.in', 'Test@123'),
(108, 'Dr Rohit Kumar Gupta', 'rohit.gupta@mitwpu.edu.in', 'Test@123'),
(109, 'Dhanashri Patil', 'dhanashri.patil@mitwpu.edu.in', 'Test@123'),
(110, 'Dr. Anusha Pai', 'anusha.pai@mitwpu.edu.in', 'Test@123'),
(111, 'Sneha Satpute', 'sneha.satpute@mitwpu.edu.in', 'Test@123'),
(112, 'Minakshee Bari', 'minakshee.bari@mitwpu.edu.in', 'Test@123'),
(113, 'Dr. Sachin Jadhav', 'sachin.jadhav@mitwpu.edu.in', 'Test@123'),
(114, 'Prof. Gopal Wamane', 'gopal.wamane@mitwpu.edu.in', 'Test@123'),
(115, 'Prof. Prachi Ahirrao', 'prachi.ahirrao@mitwpu.edu.in', 'Test@123'),
(116, 'CA. Saee Sumant', 'saee.sumant@mitwpu.edu.in', 'Test@123'),
(117, 'Dr. Sugeeta Upadhyay', 'sugeeta.upadhyay@mitwpu.edu.in', 'Test@123');

-- --------------------------------------------------------

--
-- Table structure for table `theory_assessment`
--

CREATE TABLE `theory_assessment` (
  `Assessment_ID` int(11) DEFAULT NULL,
  `Duration` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password_hash`, `student_id`) VALUES
(4, 'Aarav Sharma', 'aarav.sharma@gmail.com', 'hash_aarav123', 1001),
(5, 'Ishita Patel', 'ishita.patel@gmail.com', 'hash_ishita123', 1002),
(6, 'Rohan Iyer', 'rohan.iyer@gmail.com', 'hash_rohan123', 1003),
(7, 'Sneha Verma', 'sneha.verma@gmail.com', 'hash_sneha123', 1004),
(8, 'Aditya Menon', 'aditya.menon@gmail.com', 'hash_aditya123', 1005),
(9, 'Priya Nair', 'priya.nair@gmail.com', 'hash_priya123', 1006),
(10, 'Rahul Deshmukh', 'rahul.deshmukh@gmail.com', 'hash_rahul123', 1007),
(11, 'Kavya Joshi', 'kavya.joshi@gmail.com', 'hash_kavya123', 1008),
(12, 'Aniket Saxena', 'aniket.saxena@gmail.com', 'hash_aniket123', 1009),
(13, 'Meera Kapoor', 'meera.kapoor@gmail.com', 'hash_meera123', 1010);

-- --------------------------------------------------------

--
-- Table structure for table `user_settings`
--

CREATE TABLE `user_settings` (
  `setting_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `change_password` tinyint(1) DEFAULT 0,
  `email_notifications` tinyint(1) DEFAULT 1,
  `push_notifications` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_settings`
--

INSERT INTO `user_settings` (`setting_id`, `user_id`, `profile_picture`, `change_password`, `email_notifications`, `push_notifications`) VALUES
(4, 10, 'profile_rahul.jpg', 0, 1, 1),
(5, 11, 'profile_kavya.png', 1, 1, 0),
(6, 12, 'profile_aniket.jpeg', 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcement_id`),
  ADD KEY `announcement_ibfk_1` (`teacher_id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`Assessment_ID`),
  ADD KEY `assessment_ibfk_1` (`Course_ID`);

--
-- Indexes for table `core_elective`
--
ALTER TABLE `core_elective`
  ADD KEY `core_elective_ibfk_1` (`Course_ID`);

--
-- Indexes for table `course_mode`
--
ALTER TABLE `course_mode`
  ADD PRIMARY KEY (`Course_ID`),
  ADD KEY `Mode_ID` (`Mode_ID`);

--
-- Indexes for table `course_professor`
--
ALTER TABLE `course_professor`
  ADD PRIMARY KEY (`Course_ID`,`Professor_ID`),
  ADD KEY `Professor_ID` (`Professor_ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Department_ID`);

--
-- Indexes for table `department_professor`
--
ALTER TABLE `department_professor`
  ADD PRIMARY KEY (`Professor_ID`,`Department_ID`),
  ADD KEY `Department_ID` (`Department_ID`);

--
-- Indexes for table `discussions`
--
ALTER TABLE `discussions`
  ADD PRIMARY KEY (`discussion_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `elective_category`
--
ALTER TABLE `elective_category`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `elective_course`
--
ALTER TABLE `elective_course`
  ADD PRIMARY KEY (`Course_ID`),
  ADD KEY `Department_ID` (`Department_ID`),
  ADD KEY `fk_assigned_teacher` (`assigned_teacher`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD KEY `Student_ID` (`Student_ID`),
  ADD KEY `enrollment_ibfk_1` (`Course_ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`Location_ID`);

--
-- Indexes for table `mode`
--
ALTER TABLE `mode`
  ADD PRIMARY KEY (`Mode_ID`),
  ADD UNIQUE KEY `Mode_Type` (`Mode_Type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `open_elective`
--
ALTER TABLE `open_elective`
  ADD KEY `open_elective_ibfk_1` (`Course_ID`);

--
-- Indexes for table `practical_assessment`
--
ALTER TABLE `practical_assessment`
  ADD KEY `Assessment_ID` (`Assessment_ID`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `generated_by` (`generated_by`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`Schedule_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Student_ID`),
  ADD KEY `fk_student_department` (`Department_ID`);

--
-- Indexes for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `theory_assessment`
--
ALTER TABLE `theory_assessment`
  ADD KEY `Assessment_ID` (`Assessment_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_student_id` (`student_id`);

--
-- Indexes for table `user_settings`
--
ALTER TABLE `user_settings`
  ADD PRIMARY KEY (`setting_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `discussions`
--
ALTER TABLE `discussions`
  MODIFY `discussion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `Location_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mode`
--
ALTER TABLE `mode`
  MODIFY `Mode_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_settings`
--
ALTER TABLE `user_settings`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_ID`),
  ADD CONSTRAINT `fk_announcements_teacher` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_ID`);

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `elective_course` (`Course_ID`);

--
-- Constraints for table `core_elective`
--
ALTER TABLE `core_elective`
  ADD CONSTRAINT `core_elective_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `elective_course` (`Course_ID`);

--
-- Constraints for table `course_mode`
--
ALTER TABLE `course_mode`
  ADD CONSTRAINT `course_mode_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `elective_course` (`Course_ID`),
  ADD CONSTRAINT `course_mode_ibfk_2` FOREIGN KEY (`Mode_ID`) REFERENCES `mode` (`Mode_ID`);

--
-- Constraints for table `course_professor`
--
ALTER TABLE `course_professor`
  ADD CONSTRAINT `course_professor_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `elective_course` (`Course_ID`),
  ADD CONSTRAINT `course_professor_ibfk_2` FOREIGN KEY (`Professor_ID`) REFERENCES `teacher` (`teacher_ID`);

--
-- Constraints for table `department_professor`
--
ALTER TABLE `department_professor`
  ADD CONSTRAINT `department_professor_ibfk_1` FOREIGN KEY (`Professor_ID`) REFERENCES `teacher` (`teacher_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `department_professor_ibfk_2` FOREIGN KEY (`Department_ID`) REFERENCES `department` (`Department_ID`) ON DELETE CASCADE;

--
-- Constraints for table `discussions`
--
ALTER TABLE `discussions`
  ADD CONSTRAINT `discussions_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `elective_course` (`Course_ID`),
  ADD CONSTRAINT `discussions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `elective_course`
--
ALTER TABLE `elective_course`
  ADD CONSTRAINT `fk_assigned_teacher` FOREIGN KEY (`assigned_teacher`) REFERENCES `teacher` (`teacher_ID`);

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `elective_course` (`Course_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrollment_ibfk_2` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`Student_ID`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`Student_ID`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `elective_course` (`Course_ID`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `open_elective`
--
ALTER TABLE `open_elective`
  ADD CONSTRAINT `open_elective_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `elective_course` (`Course_ID`);

--
-- Constraints for table `practical_assessment`
--
ALTER TABLE `practical_assessment`
  ADD CONSTRAINT `practical_assessment_ibfk_1` FOREIGN KEY (`Assessment_ID`) REFERENCES `assignment` (`Assessment_ID`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`generated_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`Student_ID`),
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `elective_course` (`Course_ID`),
  ADD CONSTRAINT `results_ibfk_3` FOREIGN KEY (`instructor_id`) REFERENCES `teacher` (`teacher_ID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_student_department` FOREIGN KEY (`Department_ID`) REFERENCES `department` (`Department_ID`);

--
-- Constraints for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD CONSTRAINT `support_tickets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `theory_assessment`
--
ALTER TABLE `theory_assessment`
  ADD CONSTRAINT `theory_assessment_ibfk_1` FOREIGN KEY (`Assessment_ID`) REFERENCES `assignment` (`Assessment_ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_student_id` FOREIGN KEY (`student_id`) REFERENCES `student` (`Student_ID`);

--
-- Constraints for table `user_settings`
--
ALTER TABLE `user_settings`
  ADD CONSTRAINT `user_settings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;