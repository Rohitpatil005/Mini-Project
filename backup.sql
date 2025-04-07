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

--
-- Table structure for table `announcements`
--

DROP TABLE IF EXISTS `announcements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `announcements` (
  `announcement_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `expiry_date` date DEFAULT NULL,
  `posted_by` int NOT NULL,
  PRIMARY KEY (`announcement_id`),
  KEY `posted_by` (`posted_by`),
  CONSTRAINT `announcements_ibfk_1` FOREIGN KEY (`posted_by`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcements`
--

LOCK TABLES `announcements` WRITE;
/*!40000 ALTER TABLE `announcements` DISABLE KEYS */;
INSERT INTO `announcements` VALUES (1,'Mid-Term Exams','Mid-term exams will commence from April 5.','2025-03-27 20:51:39','2024-04-05',1),(2,'Workshop on AI','Join our AI workshop on March 25.','2025-03-27 20:51:39','2024-03-25',2),(3,'Library Hours Update','Library will remain open till 10 PM from March 15.','2025-03-27 20:51:39','2024-03-15',3);
/*!40000 ALTER TABLE `announcements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assignment`
--

DROP TABLE IF EXISTS `assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assignment` (
  `Assessment_ID` int NOT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Course_ID` varchar(20) DEFAULT NULL,
  `Max_Marks` int DEFAULT NULL,
  `Weightage` int DEFAULT NULL,
  PRIMARY KEY (`Assessment_ID`),
  KEY `assessment_ibfk_1` (`Course_ID`),
  CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `elective_course` (`Course_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assignment`
--

LOCK TABLES `assignment` WRITE;
/*!40000 ALTER TABLE `assignment` DISABLE KEYS */;
INSERT INTO `assignment` VALUES (101,'Quiz','COM2UE02A',20,10),(102,'Project','BBA2UE05A',50,30),(103,'Midterm Exam','DES2UE02A',100,40),(104,'Final Exam','RCS2UE02A',150,50),(105,'Assignment','RCS2UE04A',30,15);
/*!40000 ALTER TABLE `assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_elective`
--

DROP TABLE IF EXISTS `core_elective`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `core_elective` (
  `Core_Type` int DEFAULT NULL,
  `Course_ID` varchar(20) DEFAULT NULL,
  KEY `core_elective_ibfk_1` (`Course_ID`),
  CONSTRAINT `core_elective_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `elective_course` (`Course_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_elective`
--

LOCK TABLES `core_elective` WRITE;
/*!40000 ALTER TABLE `core_elective` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_elective` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_mode`
--

DROP TABLE IF EXISTS `course_mode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_mode` (
  `Course_ID` varchar(10) NOT NULL,
  `Mode_ID` int DEFAULT NULL,
  PRIMARY KEY (`Course_ID`),
  KEY `Mode_ID` (`Mode_ID`),
  CONSTRAINT `course_mode_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `elective_course` (`Course_ID`),
  CONSTRAINT `course_mode_ibfk_2` FOREIGN KEY (`Mode_ID`) REFERENCES `mode` (`Mode_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_mode`
--

LOCK TABLES `course_mode` WRITE;
/*!40000 ALTER TABLE `course_mode` DISABLE KEYS */;
INSERT INTO `course_mode` VALUES ('BBA2UE03A',1),('BBA2UE06A',1),('CET2UE01A',1),('CSA2UE03A',1),('CSE2UE05A',1),('CSE2UE06A',1),('DES2UE02A',1),('HHA2UE02A',1),('RCS2UE03A',1),('RCS2UE04A',1),('BBA2UE05A',2),('COM2UE04A',2),('CSA2UE05A',2),('DES2UE03A',2),('ECO2UE03A',2),('HHA2UE04A',2),('RCS2UE02A',2),('COM2UE01A',3),('COM2UE02A',3),('CSA2UE17A',3),('CSE2UE01A',3),('CSE2UE02A',3),('CSE2UE03A',3),('ECO2UE01A',3),('PPL2UE01A',3);
/*!40000 ALTER TABLE `course_mode` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_professor`
--

DROP TABLE IF EXISTS `course_professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_professor` (
  `Course_ID` varchar(10) NOT NULL,
  `Professor_ID` int NOT NULL,
  PRIMARY KEY (`Course_ID`,`Professor_ID`),
  KEY `Professor_ID` (`Professor_ID`),
  CONSTRAINT `course_professor_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `elective_course` (`Course_ID`),
  CONSTRAINT `course_professor_ibfk_2` FOREIGN KEY (`Professor_ID`) REFERENCES `professor` (`Professor_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_professor`
--

LOCK TABLES `course_professor` WRITE;
/*!40000 ALTER TABLE `course_professor` DISABLE KEYS */;
INSERT INTO `course_professor` VALUES ('RCS2UE03A',101),('RCS2UE04A',102),('RCS2UE02A',103),('BBA2UE03A',104),('BBA2UE05A',104),('BBA2UE06A',105),('HHA2UE02A',105),('CSE2UE01A',106),('CSE2UE02A',107),('HHA2UE04A',107),('CET2UE01A',108),('CSE2UE03A',108),('CSA2UE03A',110),('CSE2UE06A',110),('CSA2UE05A',111),('CSE2UE05A',111),('CSA2UE17A',112),('DES2UE02A',112),('DES2UE03A',113),('PPL2UE01A',114),('COM2UE01A',115),('ECO2UE03A',115),('COM2UE02A',116),('COM2UE04A',117),('ECO2UE01A',117);
/*!40000 ALTER TABLE `course_professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `department` (
  `Department_ID` int NOT NULL,
  `Department_Name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Department_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,'School of Leadership'),(2,'Business'),(3,'Hospitality'),(4,'Department of Computer Engineering and Technology'),(5,'Department of Computer Science and Applications'),(6,'Department of Design'),(7,'Department of Economics and Public Policy'),(8,'Department of Commerce and Accounting'),(9,'Department of Economics and Public Policy'),(10,'Department of Mechanical Engineering'),(11,'Department of Civil Engineering'),(12,'Department of Petroleum Engineering'),(14,'Public Health'),(15,'School of Law'),(16,'Department of Liberal Arts'),(17,'Department of Peace Studies'),(18,'Mathematics and Statistics'),(19,'Department of Biosciences and Technology'),(20,'Physics'),(21,'Chemistry'),(22,'Department of Environmental Science'),(23,'Department of Biotechnology'),(24,'Department of Pharmacy'),(25,'Department of Electrical Engineering'),(26,'Department of Electronics and Communication Engineering'),(27,'Department of Artificial Intelligence and Data Science'),(28,'Department of Robotics and Automation'),(29,'Department of Media and Communication Studies'),(30,'Department of Fine Arts'),(31,'Department of Performing Arts'),(32,'Department of Social Work'),(33,'Department of Psychology'),(34,'Department of Sports Science'),(35,'Department of International Relations'),(36,'Department of Food Technology'),(37,'Department of Fashion and Textile Design'),(38,'Department of Nanotechnology'),(39,'Department of Renewable Energy'),(40,'Department of Urban Planning and Architecture');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department_professor`
--

DROP TABLE IF EXISTS `department_professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `department_professor` (
  `Professor_ID` int NOT NULL,
  `Department_ID` int NOT NULL,
  PRIMARY KEY (`Professor_ID`,`Department_ID`),
  KEY `Department_ID` (`Department_ID`),
  CONSTRAINT `department_professor_ibfk_1` FOREIGN KEY (`Professor_ID`) REFERENCES `professor` (`Professor_ID`) ON DELETE CASCADE,
  CONSTRAINT `department_professor_ibfk_2` FOREIGN KEY (`Department_ID`) REFERENCES `department` (`Department_ID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department_professor`
--

LOCK TABLES `department_professor` WRITE;
/*!40000 ALTER TABLE `department_professor` DISABLE KEYS */;
INSERT INTO `department_professor` VALUES (101,1),(102,1),(103,1),(104,2),(105,3),(106,4),(107,4),(108,4),(109,4),(110,4),(111,4),(112,5),(113,6),(114,7),(117,7),(115,8),(116,8);
/*!40000 ALTER TABLE `department_professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discussions`
--

DROP TABLE IF EXISTS `discussions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `discussions` (
  `discussion_id` int NOT NULL AUTO_INCREMENT,
  `course_id` varchar(50) NOT NULL,
  `user_id` int NOT NULL,
  `message` varchar(500) NOT NULL,
  `posted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`discussion_id`),
  KEY `course_id` (`course_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `discussions_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `elective_course` (`Course_ID`),
  CONSTRAINT `discussions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discussions`
--

LOCK TABLES `discussions` WRITE;
/*!40000 ALTER TABLE `discussions` DISABLE KEYS */;
INSERT INTO `discussions` VALUES (1,'BBA2UE03A',1,'What are some good case studies for entrepreneurship?','2025-03-27 21:26:35'),(2,'CSE2UE01A',2,'Can someone explain the AI model used in this course?','2025-03-27 21:26:35'),(3,'CSA2UE03A',3,'I have a doubt regarding network security protocols.','2025-03-27 21:26:35'),(4,'COM2UE01A',2,'How can we optimize financial reporting strategies?','2025-03-27 21:26:35');
/*!40000 ALTER TABLE `discussions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elective_category`
--

DROP TABLE IF EXISTS `elective_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `elective_category` (
  `Category_ID` int NOT NULL,
  `Elective_Name` varchar(50) DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`Category_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elective_category`
--

LOCK TABLES `elective_category` WRITE;
/*!40000 ALTER TABLE `elective_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `elective_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elective_course`
--

DROP TABLE IF EXISTS `elective_course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `elective_course` (
  `Course_ID` varchar(50) NOT NULL,
  `Elective_Name` varchar(100) DEFAULT NULL,
  `Credits` int DEFAULT NULL,
  `Department_ID` int DEFAULT NULL,
  PRIMARY KEY (`Course_ID`),
  KEY `Department_ID` (`Department_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elective_course`
--

LOCK TABLES `elective_course` WRITE;
/*!40000 ALTER TABLE `elective_course` DISABLE KEYS */;
INSERT INTO `elective_course` VALUES ('BBA2UE03A','Entrepreneurship',4,2),('BBA2UE05A','Personal Finance',4,2),('BBA2UE06A','Consumer Behaviour',4,2),('CET2UE01A','Computer Graphics',4,4),('COM2UE01A','Financial Accounting',4,8),('COM2UE02A','Income Tax',4,8),('COM2UE04A','Taxation Laws',4,8),('CSA2UE03A','Cyber Security',4,5),('CSA2UE05A','Cloud Computing',4,5),('CSA2UE17A','Software Engineering',4,5),('CSE2UE01A','AI ML For Everyone',4,4),('CSE2UE02A','ChatGPT',4,4),('CSE2UE03A','Cybersecurity',4,4),('CSE2UE05A','Programming with Python',4,4),('CSE2UE06A','Programming with Java',4,4),('DES2UE02A','Product Design',4,6),('DES2UE03A','Design Methods',4,6),('ECO2UE01A','Managerial Economics',4,7),('ECO2UE03A','Public Policy Analysis',4,7),('HHA2UE02A','Tourism Marketing',4,3),('HHA2UE04A','Food and Beverage Management',4,3),('PPL2UE01A','Behavioral Economics and Public Policy',4,7),('RCS2UE02A','Professional Communication',4,1),('RCS2UE03A','Business Applications of Digital Technology',4,1),('RCS2UE04A','Business Intelligence and Data Visualisation with Tableau',4,1);
/*!40000 ALTER TABLE `elective_course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enrollment`
--

DROP TABLE IF EXISTS `enrollment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrollment` (
  `Entollment_Date` date DEFAULT NULL,
  `Status` tinyint(1) DEFAULT NULL,
  `Course_ID` varchar(20) DEFAULT NULL,
  `Student_ID` int DEFAULT NULL,
  KEY `Student_ID` (`Student_ID`),
  KEY `enrollment_ibfk_1` (`Course_ID`),
  CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `elective_course` (`Course_ID`) ON DELETE CASCADE,
  CONSTRAINT `enrollment_ibfk_2` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`Student_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enrollment`
--

LOCK TABLES `enrollment` WRITE;
/*!40000 ALTER TABLE `enrollment` DISABLE KEYS */;
INSERT INTO `enrollment` VALUES ('2024-03-01',1,'BBA2UE03A',1001),('2024-03-02',1,'BBA2UE05A',1002),('2024-03-03',1,'BBA2UE06A',1003),('2024-03-04',1,'CET2UE01A',1004),('2024-03-05',1,'COM2UE01A',1005),('2024-03-06',1,'COM2UE02A',1006),('2024-03-07',1,'COM2UE04A',1007),('2024-03-08',1,'CSA2UE03A',1008),('2024-03-09',1,'CSA2UE05A',1009),('2024-03-10',1,'CSA2UE17A',1010),('2024-03-11',1,'CSE2UE01A',1011),('2024-03-12',1,'CSE2UE02A',1012),('2024-03-13',1,'CSE2UE03A',1013),('2024-03-14',1,'CSE2UE05A',1014),('2024-03-15',1,'CSE2UE06A',1015),('2024-03-16',1,'DES2UE02A',1016),('2024-03-17',1,'DES2UE03A',1017),('2024-03-18',1,'ECO2UE01A',1018),('2024-03-19',1,'ECO2UE03A',1019),('2024-03-20',1,'HHA2UE02A',1020),('2024-03-21',1,'HHA2UE04A',1021);
/*!40000 ALTER TABLE `enrollment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback` (
  `feedback_id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `course_id` varchar(50) NOT NULL,
  `rating` int DEFAULT NULL,
  `comments` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`feedback_id`),
  KEY `student_id` (`student_id`),
  KEY `course_id` (`course_id`),
  CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`Student_ID`),
  CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `elective_course` (`Course_ID`),
  CONSTRAINT `feedback_chk_1` CHECK ((`rating` between 1 and 5))
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES (1,1001,'BBA2UE03A',5,'Loved the course, very informative!','2025-03-27 21:29:15'),(2,1002,'CSE2UE01A',4,'Great teaching style, but can be more interactive.','2025-03-27 21:29:15'),(3,1003,'CSA2UE03A',5,'Excellent course content!','2025-03-27 21:29:15'),(4,1004,'COM2UE01A',4,'Helpful, but assignments were tough.','2025-03-27 21:29:15'),(5,1005,'HHA2UE02A',5,'Amazing real-world applications discussed.','2025-03-27 21:29:15');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `location` (
  `Location_ID` int NOT NULL AUTO_INCREMENT,
  `Location_Name` varchar(255) NOT NULL,
  PRIMARY KEY (`Location_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` VALUES (1,'KS 203'),(2,'DR 105'),(3,'GN 103');
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mode`
--

DROP TABLE IF EXISTS `mode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mode` (
  `Mode_ID` int NOT NULL AUTO_INCREMENT,
  `Mode_Type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Mode_ID`),
  UNIQUE KEY `Mode_Type` (`Mode_Type`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mode`
--

LOCK TABLES `mode` WRITE;
/*!40000 ALTER TABLE `mode` DISABLE KEYS */;
INSERT INTO `mode` VALUES (2,'Blended (Offline & Asynchronous)'),(1,'Blended (Online & Asynchronous)'),(3,'MOOC');
/*!40000 ALTER TABLE `mode` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `notification_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_read` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`notification_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES (1,1,'New announcement: Mid-Term Exams.','2025-03-27 21:20:07',0),(2,2,'Reminder: Workshop on AI starts tomorrow.','2025-03-27 21:20:07',0),(3,3,'Library hours updated!','2025-03-27 21:20:07',1);
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `open_elective`
--

DROP TABLE IF EXISTS `open_elective`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `open_elective` (
  `Open_Field` int DEFAULT NULL,
  `Course_ID` varchar(20) DEFAULT NULL,
  KEY `open_elective_ibfk_1` (`Course_ID`),
  CONSTRAINT `open_elective_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `elective_course` (`Course_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `open_elective`
--

LOCK TABLES `open_elective` WRITE;
/*!40000 ALTER TABLE `open_elective` DISABLE KEYS */;
/*!40000 ALTER TABLE `open_elective` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `practical_assessment`
--

DROP TABLE IF EXISTS `practical_assessment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `practical_assessment` (
  `Assessment_ID` int DEFAULT NULL,
  `Assessment_Name` varchar(50) DEFAULT NULL,
  KEY `Assessment_ID` (`Assessment_ID`),
  CONSTRAINT `practical_assessment_ibfk_1` FOREIGN KEY (`Assessment_ID`) REFERENCES `assignment` (`Assessment_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `practical_assessment`
--

LOCK TABLES `practical_assessment` WRITE;
/*!40000 ALTER TABLE `practical_assessment` DISABLE KEYS */;
/*!40000 ALTER TABLE `practical_assessment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professor`
--

DROP TABLE IF EXISTS `professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `professor` (
  `Professor_ID` int NOT NULL,
  `Professor_Name` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Professor_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professor`
--

LOCK TABLES `professor` WRITE;
/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
INSERT INTO `professor` VALUES (101,'Dr. Satish Chinchorkar','satish.chinchorkar@mitwpu.edu.in'),(102,'Dr. Vijeta Singh','vijeta.singh@mitwpu.edu.in'),(103,'Dr. Gopa Nayak','gopa.nayak@mitwpu.edu.in'),(104,'Dr. Jackson Khumukcham','jackson.khumukcham@mitwpu.edu.in'),(105,'Dr. Ravi Kshirsagar','ravi.kshirsagar@mitwpu.edu.in'),(106,'Devendra Joshi','devendra.joshi1@mitwpu.edu.in'),(107,'Anuradha Nagare','anuradha.nagare@mitwpu.edu.in'),(108,'Dr Rohit Kumar Gupta','rohit.gupta@mitwpu.edu.in'),(109,'Dhanashri Patil','dhanashri.patil@mitwpu.edu.in'),(110,'Dr. Anusha Pai','anusha.pai@mitwpu.edu.in'),(111,'Sneha Satpute','sneha.satpute@mitwpu.edu.in'),(112,'Minakshee Bari','minakshee.bari@mitwpu.edu.in'),(113,'Dr. Sachin Jadhav','sachin.jadhav@mitwpu.edu.in'),(114,'Prof. Gopal Wamane','gopal.wamane@mitwpu.edu.in'),(115,'Prof. Prachi Ahirrao','prachi.ahirrao@mitwpu.edu.in'),(116,'CA. Saee Sumant','saee.sumant@mitwpu.edu.in'),(117,'Dr. Sugeeta Upadhyay','sugeeta.upadhyay@mitwpu.edu.in');
/*!40000 ALTER TABLE `professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reports` (
  `report_id` int NOT NULL AUTO_INCREMENT,
  `report_type` enum('Course Report','Student Progress','Attendance Report','Grade Distribution','Performance Analytics') NOT NULL,
  `description` varchar(500) NOT NULL,
  `generated_by` int NOT NULL,
  `generated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `file_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`report_id`),
  KEY `generated_by` (`generated_by`),
  CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`generated_by`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reports`
--

LOCK TABLES `reports` WRITE;
/*!40000 ALTER TABLE `reports` DISABLE KEYS */;
INSERT INTO `reports` VALUES (1,'Course Report','Semester-wise course performance analysis',2,'2025-03-27 21:31:52','/reports/course_report_2025.pdf'),(2,'Student Progress','Progress report of students for mid-term evaluation',3,'2025-03-27 21:31:52','/reports/student_progress_2025.pdf'),(3,'Attendance Report','Monthly attendance summary for all courses',1,'2025-03-27 21:31:52','/reports/attendance_report_2025.pdf'),(4,'Grade Distribution','Grade distribution statistics for final exams',2,'2025-03-27 21:31:52','/reports/grade_distribution_2025.pdf'),(5,'Performance Analytics','Detailed analytics on student performance trends',3,'2025-03-27 21:31:52','/reports/performance_analytics_2025.pdf');
/*!40000 ALTER TABLE `reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `results`
--

DROP TABLE IF EXISTS `results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `results` (
  `result_id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `instructor_id` int NOT NULL,
  `final_grade` varchar(2) NOT NULL,
  `percentage` decimal(5,2) NOT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`result_id`),
  KEY `student_id` (`student_id`),
  KEY `course_id` (`course_id`),
  KEY `instructor_id` (`instructor_id`),
  CONSTRAINT `results_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`Student_ID`),
  CONSTRAINT `results_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `elective_course` (`Course_ID`),
  CONSTRAINT `results_ibfk_3` FOREIGN KEY (`instructor_id`) REFERENCES `professor` (`Professor_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `results`
--

LOCK TABLES `results` WRITE;
/*!40000 ALTER TABLE `results` DISABLE KEYS */;
INSERT INTO `results` VALUES (11,1001,'BBA2UE03A',101,'A',92.50,'Excellent grasp on Entrepreneurship'),(12,1002,'CSE2UE01A',102,'B+',85.75,'Good understanding of AI ML'),(13,1003,'CSA2UE05A',103,'A-',89.00,'Strong knowledge in Cloud Computing'),(14,1004,'ECO2UE03A',104,'B',78.20,'Needs improvement in Public Policy Analysis'),(15,1005,'DES2UE02A',105,'C+',72.50,'Basic understanding of Product Design');
/*!40000 ALTER TABLE `results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `schedule` (
  `Schedule_ID` int NOT NULL,
  `Start_Time` time NOT NULL,
  `End_Time` time NOT NULL,
  `Course_ID` varchar(20) NOT NULL,
  `Day` varchar(20) NOT NULL,
  `Location_ID` int DEFAULT NULL,
  PRIMARY KEY (`Schedule_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule`
--

LOCK TABLES `schedule` WRITE;
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
INSERT INTO `schedule` VALUES (1,'15:00:00','18:00:00','BBA2UE03A','Saturday',1),(2,'15:00:00','18:00:00','CSE2UE01A','Saturday',2),(3,'15:00:00','18:00:00','CSA2UE03A','Saturday',3),(4,'14:00:00','16:30:00','CSE2UE02A','Saturday',1),(5,'14:00:00','16:30:00','COM2UE02A','Saturday',2),(6,'14:00:00','16:30:00','CET2UE01A','Saturday',3),(7,'14:30:00','17:30:00','CSA2UE05A','Saturday',1),(9,'14:30:00','17:30:00','RCS2UE02A','Saturday',3),(11,'15:00:00','18:00:00','PPL2UE01A','Saturday',2),(13,'14:00:00','16:30:00','ECO2UE03A','Saturday',1),(15,'14:30:00','17:30:00','DES2UE02A','Saturday',3),(16,'14:30:00','17:30:00','HHA2UE02A','Saturday',1),(18,'15:00:00','18:00:00','CSE2UE03A','Saturday',3),(19,'15:00:00','18:00:00','COM2UE01A','Saturday',1),(21,'14:00:00','16:30:00','BBA2UE05A','Saturday',3),(22,'14:00:00','16:30:00','CSE2UE05A','Saturday',1),(24,'14:30:00','17:30:00','CSA2UE17A','Saturday',3),(26,'15:00:00','18:00:00','RCS2UE03A','Saturday',2),(27,'15:00:00','18:00:00','DES2UE03A','Saturday',3),(29,'14:00:00','16:30:00','CSE2UE06A','Saturday',2);
/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student` (
  `Student_ID` int NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Contact` bigint DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Year` varchar(10) DEFAULT NULL,
  `Department_ID` int DEFAULT NULL,
  PRIMARY KEY (`Student_ID`),
  KEY `fk_student_department` (`Department_ID`),
  CONSTRAINT `fk_student_department` FOREIGN KEY (`Department_ID`) REFERENCES `department` (`Department_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;


LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (1001,'Aarav Sharma',9876543210,'aarav.sharma@gmail.com','Second',17),(1002,'Ishita Patel',9823456789,'ishita.patel@gmail.com','Second',27),(1003,'Rohan Iyer',9812345678,'rohan.iyer@gmail.com','Third',3),(1004,'Sneha Verma',9809876543,'sneha.verma@gmail.com','Second',31),(1005,'Aditya Menon',9798765432,'aditya.menon@gmail.com','Second',5),(1006,'Priya Nair',9787654321,'priya.nair@gmail.com','Third',17),(1007,'Rahul Deshmukh',9776543210,'rahul.deshmukh@gmail.com','Second',27),(1008,'Kavya Joshi',9765432109,'kavya.joshi@gmail.com','Second',1),(1009,'Aniket Saxena',9754321098,'aniket.saxena@gmail.com','Third',20),(1010,'Meera Kapoor',9743210987,'meera.kapoor@gmail.com','Second',22),(1011,'Arjun Reddy',9732109876,'arjun.reddy@gmail.com','Second',18),(1012,'Neha Choudhary',9721098765,'neha.choudhary@gmail.com','Third',15),(1013,'Siddharth Bhattacharya',9710987654,'siddharth.bhattacharya@gmail.com','Second',30),(1014,'Pooja Ghosh',9709876543,'pooja.ghosh@gmail.com','Second',38),(1015,'Vikram Malhotra',9698765432,'vikram.malhotra@gmail.com','Fourth',40),(1016,'Aisha Khan',9687654321,'aisha.khan@gmail.com','Second',39),(1017,'Rajat Mehta',9676543210,'rajat.mehta@gmail.com','Second',31),(1018,'Divya Rao',9665432109,'divya.rao@gmail.com','Third',37),(1019,'Kabir Sharma',9654321098,'kabir.sharma@gmail.com','Fourth',37),(1020,'Tanisha Singh',9643210987,'tanisha.singh@gmail.com','Second',25),(1021,'Varun Nair',9632109876,'varun.nair@gmail.com','Second',18),(1022,'Ananya Pillai',9621098765,'ananya.pillai@gmail.com','Third',7),(1023,'Rishi Sinha',9610987654,'rishi.sinha@gmail.com','Fourth',9),(1024,'Simran Kaur',9609876543,'simran.kaur@gmail.com','Second',21),(1025,'Harsh Vardhan',9598765432,'harsh.vardhan@gmail.com','Second',8),(1026,'Sonal Trivedi',9587654321,'sonal.trivedi@gmail.com','Third',30),(1027,'Amit Joshi',9576543210,'amit.joshi@gmail.com','Fourth',12),(1028,'Neeraj Pandey',9565432109,'neeraj.pandey@gmail.com','Second',37),(1029,'Isha Ramesh',9554321098,'isha.ramesh@gmail.com','Second',26),(1030,'Yash Thakur',9543210987,'yash.thakur@gmail.com','Third',11),(1031,'Sanya Gokhale',9532109876,'sanya.gokhale@gmail.com','Fourth',16),(1032,'Vivek Chawla',9521098765,'vivek.chawla@gmail.com','Second',35),(1033,'Meenal Iyer',9510987654,'meenal.iyer@gmail.com','Second',18),(1034,'Karthik Rajan',9509876543,'karthik.rajan@gmail.com','Third',26),(1035,'Shreya Banerjee',9498765432,'shreya.banerjee@gmail.com','Fourth',32),(1036,'Adarsh Kulkarni',9487654321,'adarsh.kulkarni@gmail.com','Second',11),(1037,'Pallavi Saxena',9476543210,'pallavi.saxena@gmail.com','Second',6),(1038,'Rohit Malhotra',9465432109,'rohit.malhotra@gmail.com','Third',33),(1039,'Tanya Kapoor',9454321098,'tanya.kapoor@gmail.com','Fourth',26),(1040,'Arnav Mishra',9443210987,'arnav.mishra@gmail.com','Second',27),(1041,'Niharika Sharma',9432109876,'niharika.sharma@gmail.com','Second',22),(1042,'Vivek Reddy',9421098765,'vivek.reddy@gmail.com','Third',18),(1043,'Pallavi Mehta',9410987654,'pallavi.mehta@gmail.com','Fourth',24),(1044,'Kunal Verma',9409876543,'kunal.verma@gmail.com','Second',24),(1045,'Aarohi Deshpande',9398765432,'aarohi.deshpande@gmail.com','Third',39),(1046,'Gautam Rao',9387654321,'gautam.rao@gmail.com','Fourth',33),(1047,'Rhea Iyer',9376543210,'rhea.iyer@gmail.com','Second',10),(1048,'Manav Kapoor',9365432109,'manav.kapoor@gmail.com','Third',14),(1049,'Esha Choudhary',9354321098,'esha.choudhary@gmail.com','Fourth',26),(1050,'Sagar Pillai',9343210987,'sagar.pillai@gmail.com','Second',33),(1051,'Vansh Malhotra',9332109876,'vansh.malhotra@gmail.com','Third',28),(1052,'Meghna Joshi',9321098765,'meghna.joshi@gmail.com','Fourth',40),(1053,'Tanishq Saxena',9310987654,'tanishq.saxena@gmail.com','Second',36),(1054,'Aditi Banerjee',9309876543,'aditi.banerjee@gmail.com','Third',11),(1055,'Kartik Nair',9298765432,'kartik.nair@gmail.com','Fourth',8),(1056,'Shruti Singh',9287654321,'shruti.singh@gmail.com','Second',19),(1057,'Rohan Trivedi',9276543210,'rohan.trivedi@gmail.com','Third',26),(1058,'Piyush Vardhan',9265432109,'piyush.vardhan@gmail.com','Fourth',11),(1059,'Diya Gokhale',9254321098,'diya.gokhale@gmail.com','Second',18),(1060,'Anirudh Menon',9243210987,'anirudh.menon@gmail.com','Third',20),(1061,'Tanya Sinha',9232109876,'tanya.sinha@gmail.com','Fourth',11),(1062,'Rahul Desai',9221098765,'rahul.desai@gmail.com','Second',32),(1063,'Swati Ramesh',9210987654,'swati.ramesh@gmail.com','Third',28),(1064,'Kabir Thakur',9209876543,'kabir.thakur@gmail.com','Fourth',21),(1065,'Avni Kulkarni',9198765432,'avni.kulkarni@gmail.com','Second',32),(1066,'Neel Patel',9187654321,'neel.patel@gmail.com','Third',35),(1067,'Sanya Mishra',9176543210,'sanya.mishra@gmail.com','Fourth',39),(1068,'Ritik Rajan',9165432109,'ritik.rajan@gmail.com','Second',8),(1069,'Simran Sethi',9154321098,'simran.sethi@gmail.com','Third',30),(1070,'Harshit Saxena',9143210987,'harshit.saxena@gmail.com','Fourth',29);

UNLOCK TABLES;



DROP TABLE IF EXISTS `support_tickets`;

CREATE TABLE `support_tickets` (
  `ticket_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` enum('Open','In Progress','Resolved','Closed') DEFAULT 'Open',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `resolved_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ticket_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `support_tickets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 ;


LOCK TABLES `support_tickets` WRITE;

INSERT INTO `support_tickets` VALUES (1,1,'Admin User','admin@mitwpu.edu.in','Unable to access the grade report section.','Open','2025-03-27 21:33:18',NULL),(2,2,'Professor Aman Gupta','johndoe@mitwpu.edu.in','Issue with uploading course materials.','In Progress','2025-03-27 21:33:18',NULL),(3,3,'Professor Ashneer Grover','janesmith@mitwpu.edu.in','Requesting access to student performance analytics.','Resolved','2025-03-27 21:33:18','2025-03-25 05:00:00'),(4,1,'Admin User','admin@mitwpu.edu.in','Bug in attendance report generation.','Closed','2025-03-27 21:33:18','2025-03-20 08:45:00'),(5,2,'Professor Aman Gupta','johndoe@mitwpu.edu.in','Need to reset password.','Resolved','2025-03-27 21:33:18','2025-03-22 03:30:00');

UNLOCK TABLES;



DROP TABLE IF EXISTS `theory_assessment`;

CREATE TABLE `theory_assessment` (
  `Assessment_ID` int DEFAULT NULL,
  `Duration` varchar(50) DEFAULT NULL,
  KEY `Assessment_ID` (`Assessment_ID`),
  CONSTRAINT `theory_assessment_ibfk_1` FOREIGN KEY (`Assessment_ID`) REFERENCES `assignment` (`Assessment_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;


LOCK TABLES `theory_assessment` WRITE;

UNLOCK TABLES;



DROP TABLE IF EXISTS `user_settings`;

CREATE TABLE `user_settings` (
  `setting_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `change_password` tinyint(1) DEFAULT '0',
  `email_notifications` tinyint(1) DEFAULT '1',
  `push_notifications` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`setting_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_settings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ;


LOCK TABLES `user_settings` WRITE;

INSERT INTO `user_settings` VALUES (1,1,'admin_pic.jpg',0,1,1),(2,2,'Aman_pic.jpg',0,1,0),(3,3,'Ashneer_pic.jpg',1,1,1);

UNLOCK TABLES;


DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ;


LOCK TABLES `users` WRITE;;
INSERT INTO `users` VALUES (1,'Admin User','admin@mitwpu.edu.in','hashed_password_1'),(2,'Professor Aman Gupta','johndoe@mitwpu.edu.in','hashed_password_2'),(3,'Professor Ashneer Grover','janesmith@mitwpu.edu.in','hashed_password_3');;
UNLOCK TABLES;

