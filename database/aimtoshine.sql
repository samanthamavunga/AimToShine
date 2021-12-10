-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 09, 2021 at 10:39 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aimtoshine`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `asset_code` int(11) NOT NULL,
  `asset_name` varchar(40) NOT NULL,
  `asset_type` varchar(40) DEFAULT NULL,
  `donor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`asset_code`, `asset_name`, `asset_type`, `donor_id`) VALUES
(1, 'Cash', 'Current Asset', 103);

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `donor_id` int(11) NOT NULL,
  `donor_name` varchar(40) DEFAULT NULL,
  `donor_email` varchar(100) NOT NULL,
  `donor_adress` varchar(200) DEFAULT NULL,
  `donor_province` varchar(100) DEFAULT NULL,
  `date_donated` date DEFAULT NULL,
  `donation_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`donor_id`, `donor_name`, `donor_email`, `donor_adress`, `donor_province`, `date_donated`, `donation_name`) VALUES
(101, 'Sammy Cole', 'sammyman0@gmail.com', '8002 Manyame Park', 'Greenfield', '2019-12-16', 'Furniture'),
(102, 'Samantha Mavunga', 'samanthat@gmail.com', '354 Lawn Pass', 'HatField', '2018-02-20', 'Building'),
(103, 'Toda Investment', 'todainvest@dailymail.co.uk', '4345 Zengeza', 'Modesto', '2019-06-21', 'Stationary'),
(104, 'Absa NGO', 'absa3@ashesi.edu.gh', '2545 Scoville Junction', 'Harare', '2020-12-12', 'Cash'),
(105, 'NASA Patners', 'nasapat@gmail.com', '05 Mallard Place', 'Victria Falls', '2019-12-17', 'Stationary'),
(106, 'Keisha Te', 'keishaman0@gmail.com', '8 Goromonzi Park', 'Bulawayo', '2018-09-16', 'Furniture'),
(107, 'Samantha Mavunga', 'samanthat@gmail.com', '354 Lawn Pass', 'HatField', '2018-02-20', 'staionery'),
(108, 'Toda Investment', 'todainvest@dailymail.co.uk', '4345 Zengeza', 'Modesto', '2019-06-21', 'Cash'),
(109, 'Absa NGO', 'absa3@ashesi.edu.gh', '2545 Scoville Junction', 'Harare', '2021-12-06', 'Furniture'),
(110, 'Shirley Batu', 'shirleybantu@gmail.com', 'Hollard Mussa', 'Victria Falls', '2020-11-13', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `examination`
--

CREATE TABLE `examination` (
  `exam_code` varchar(4) NOT NULL,
  `supervisor_id` int(11) DEFAULT NULL,
  `date_of_the_exam` date NOT NULL,
  `exam_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examination`
--

INSERT INTO `examination` (`exam_code`, `supervisor_id`, `date_of_the_exam`, `exam_type`) VALUES
('4001', 1, '2021-03-20', 'Social mentorship P1');

-- --------------------------------------------------------

--
-- Table structure for table `mentee`
--

CREATE TABLE `mentee` (
  `mentees_id` int(11) NOT NULL,
  `mentors_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `school_name` varchar(80) DEFAULT NULL,
  `grade` varchar(50) DEFAULT NULL,
  `exam_code` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mentee`
--

INSERT INTO `mentee` (`mentees_id`, `mentors_id`, `parent_id`, `school_name`, `grade`, `exam_code`) VALUES
(3, 2, 5202, 'Chimuti Primary School', 'Grade 2', '4001');

-- --------------------------------------------------------

--
-- Table structure for table `mentors`
--

CREATE TABLE `mentors` (
  `mentors_id` int(11) NOT NULL,
  `supervisor_id` int(11) DEFAULT NULL,
  `university_name` varchar(40) NOT NULL,
  `course_major` varchar(40) DEFAULT NULL,
  `date_available` date NOT NULL,
  `stipend` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mentors`
--

INSERT INTO `mentors` (`mentors_id`, `supervisor_id`, `university_name`, `course_major`, `date_available`, `stipend`) VALUES
(2, 1, 'University of Zimbabwe', 'Computer Science', '2021-02-20', 10);

-- --------------------------------------------------------

--
-- Table structure for table `mentorship_content`
--

CREATE TABLE `mentorship_content` (
  `mentor_id` int(11) DEFAULT NULL,
  `mentee_id` int(11) DEFAULT NULL,
  `date_completion` date DEFAULT NULL,
  `mentorship_type` varchar(40) DEFAULT NULL,
  `membershipID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mentorship_content`
--

INSERT INTO `mentorship_content` (`mentor_id`, `mentee_id`, `date_completion`, `mentorship_type`, `membershipID`) VALUES
(2, 3, '2023-09-14', 'Social Mentorship', 1),
(2, 3, '2021-12-24', 'Cooperate Justice', 6);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `parent_id` int(11) NOT NULL,
  `education_level` varchar(40) DEFAULT NULL,
  `income_status` varchar(40) DEFAULT NULL,
  `occupation` varchar(40) DEFAULT NULL,
  `family_setup` varchar(40) DEFAULT NULL,
  `relationship_to_mentee` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`parent_id`, `education_level`, `income_status`, `occupation`, `family_setup`, `relationship_to_mentee`) VALUES
(5202, 'Secondary', 'low income', 'teacher', 'single parent', 'mother'),
(5203, 'Secondary', 'low income', 'vendor', 'single parent', 'father'),
(5204, 'primary', 'low income', 'house help', 'Guardian', 'grandmother');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `person_id` int(11) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `username` varchar(40) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `DateofBirth` date NOT NULL,
  `location` varchar(50) DEFAULT NULL,
  `phonenumber` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`person_id`, `firstname`, `lastname`, `user_type`, `username`, `gender`, `DateofBirth`, `location`, `phonenumber`, `email`, `password`) VALUES
(1, 'Kofi', 'Boakye', 'Supervisor', 'KBoakye', 'Male', '1997-05-09', 'Accra', '0244783568', 'k.boakye@gmail.com', '12532454fsdfs'),
(2, 'Afua', 'Nkunim', 'Mentor', 'A Nkunim', 'Female', '2000-11-02', 'Kumasi', '0234567824', 'a.nkunim@yahoo.com', '5434yr435'),
(3, 'Samantha', 'Mavunga', 'Mentee', 'S Mavunga', 'Female', '2000-11-02', 'Temale', '0230567824', 's.mavunga@yahoo.com', '34353tdgsdjlkdg'),
(4, 'Samantha', 'Mavunga', '”mentee”', 'S_Mavunga', '”female”', '2021-12-14', 'Ashesi', '0209246382', 'keishamavunga@gmail.com', 'cd74c3e77d43414d7ba8'),
(5, 'Nyasha', 'Milanzi', '”mentee”', 'N_Milanzi', '”female”', '2021-12-15', 'Ashesi', '0209246382', 'keishamavunga@gmail.com', '7c180af56007ae0cc1c5'),
(6, 'Passion', 'Benz', '”mentor”', 'P_Benz', '”male”', '2021-12-12', 'Harare', '0209246388', 'passion@gmail.com', '7d7ceac785e443310cb7'),
(7, 'Panashe', 'Mavunga', '”mentor”', 'PMavunga', '”male”', '2021-12-19', 'Harare', '0209246432', 'panashemavunga@gmail.com', '830103d2344144aba729'),
(8, 'Tiara', 'Mavunga', '”mentee”', 'TMavunga', '”female”', '2021-12-19', 'Harare', '0209246382', 'tiaramavunga@gmail.com', '5c97c81429572e2c98ed'),
(9, 'David', 'Brewu', 'mentor', 'davidbrewu', '”male”', '2021-12-18', 'Ghana', '+233548169738', 'david.brewu@ashesi.edu.gh', 'c7bbf35cdb8c5af64411e26c1fa3787d'),
(10, 'david', 'B', '”mentee”', 'davidb', '”male”', '2021-12-03', 'Ashesi', '0209246382', 'keishamavunga@gmail.com', '172522ec1028ab781d9dfd17eaca4427'),
(11, 'Daniel', 'Jabu', '”mentee”', 'JDaniel', '”female”', '2021-12-19', 'Ghana', '0779380450', 'jabu@yahoo.com', '95fd991fe08e9ba8ee898522adc8479e'),
(12, 'Sarah', 'Mina', 'mentor', 'SMina', 'female', '2021-12-19', 'Banda', '0779350490', 'sarah.mina@gmail.com', '3620403c2d1ebb24518e33c1dee38383'),
(13, 'Rodney', 'mj', 'mentor', 'rodney123', 'male', '1999-04-11', 'Ashesi', '0559791693', 'ngoh.amah@ashes.edu.gh', 'Management'),
(14, 'Samantha', 'Mavungdbjh', 'mentor', 'SManga', 'female', '2021-12-09', 'Ashesi', '0779380450', 'smavunga@gmail.com', 'asdfghjkwertyuio'),
(15, 'Malcom', 'Nhepera', 'mentee', 'MNhepera', 'male', '2021-12-13', 'Marondera', '0773667768', 'malcom@gmail.com', '04a2e9d30407faab3b25b6c74d59df3c');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `mentees_id` int(11) DEFAULT NULL,
  `exam_code` varchar(4) DEFAULT NULL,
  `grade_obtained` varchar(2) DEFAULT NULL,
  `decision` enum('Fail','Avarage','Pass') DEFAULT NULL,
  `consideration` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`mentees_id`, `exam_code`, `grade_obtained`, `decision`, `consideration`) VALUES
(3, '4001', 'A+', 'Pass', 'Continue');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `supervisor_id` int(11) NOT NULL,
  `salary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`supervisor_id`, `salary`) VALUES
(1, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`asset_code`),
  ADD KEY `donor_id` (`donor_id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`donor_id`);

--
-- Indexes for table `examination`
--
ALTER TABLE `examination`
  ADD PRIMARY KEY (`exam_code`),
  ADD KEY `supervisor_id` (`supervisor_id`);

--
-- Indexes for table `mentee`
--
ALTER TABLE `mentee`
  ADD PRIMARY KEY (`mentees_id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `exam_code` (`exam_code`),
  ADD KEY `mentors_id` (`mentors_id`);

--
-- Indexes for table `mentors`
--
ALTER TABLE `mentors`
  ADD PRIMARY KEY (`mentors_id`),
  ADD KEY `supervisor_id` (`supervisor_id`);

--
-- Indexes for table `mentorship_content`
--
ALTER TABLE `mentorship_content`
  ADD PRIMARY KEY (`membershipID`),
  ADD KEY `mentor_id` (`mentor_id`),
  ADD KEY `mentee_id` (`mentee_id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD KEY `mentees_id` (`mentees_id`),
  ADD KEY `exam_code` (`exam_code`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`supervisor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `asset_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `mentorship_content`
--
ALTER TABLE `mentorship_content`
  MODIFY `membershipID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5205;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `person_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `assets_ibfk_1` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`donor_id`);

--
-- Constraints for table `examination`
--
ALTER TABLE `examination`
  ADD CONSTRAINT `examination_ibfk_1` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisor` (`supervisor_id`);

--
-- Constraints for table `mentee`
--
ALTER TABLE `mentee`
  ADD CONSTRAINT `mentee_ibfk_1` FOREIGN KEY (`mentees_id`) REFERENCES `person` (`person_id`),
  ADD CONSTRAINT `mentee_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `parents` (`parent_id`),
  ADD CONSTRAINT `mentee_ibfk_3` FOREIGN KEY (`exam_code`) REFERENCES `examination` (`exam_code`),
  ADD CONSTRAINT `mentee_ibfk_4` FOREIGN KEY (`mentors_id`) REFERENCES `mentors` (`mentors_id`);

--
-- Constraints for table `mentors`
--
ALTER TABLE `mentors`
  ADD CONSTRAINT `mentors_ibfk_1` FOREIGN KEY (`mentors_id`) REFERENCES `person` (`person_id`),
  ADD CONSTRAINT `mentors_ibfk_2` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisor` (`supervisor_id`);

--
-- Constraints for table `mentorship_content`
--
ALTER TABLE `mentorship_content`
  ADD CONSTRAINT `mentorship_content_ibfk_1` FOREIGN KEY (`mentor_id`) REFERENCES `mentors` (`mentors_id`),
  ADD CONSTRAINT `mentorship_content_ibfk_2` FOREIGN KEY (`mentee_id`) REFERENCES `mentee` (`mentees_id`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`mentees_id`) REFERENCES `mentee` (`mentees_id`),
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`exam_code`) REFERENCES `examination` (`exam_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD CONSTRAINT `supervisor_ibfk_1` FOREIGN KEY (`supervisor_id`) REFERENCES `person` (`person_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
