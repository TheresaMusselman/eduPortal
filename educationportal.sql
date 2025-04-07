-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2025 at 08:16 PM
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
-- Database: `educationportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseID` varchar(36) NOT NULL,
  `department` varchar(36) DEFAULT NULL,
  `courseName` varchar(255) NOT NULL,
  `semester` enum('Spring','Summer','Fall') NOT NULL,
  `courseDescription` varchar(300) NOT NULL,
  `maxEnroll` int(11) NOT NULL,
  `currentEnroll` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `department`, `courseName`, `semester`, `courseDescription`, `maxEnroll`, `currentEnroll`) VALUES
('ART101', 'Art', 'Digital Design Basics', 'Spring', 'Explore fundamental design principles and tools for creating digital artwork.', 26, 25),
('ART201', 'Art', 'Creative Photography', 'Summer', 'Learn techniques for capturing and editing compelling photographs.', 17, NULL),
('ART301', 'Art', 'Animation and Motion Graphics', 'Fall', 'Create dynamic animations using software tools while applying visual storytelling concepts.', 16, NULL),
('BIO101', 'Biology', 'Mathematical Biology', 'Spring', 'Explore mathematical modeling in genetics, population dynamics, and biological networks.', 35, 1),
('BIO201', 'Biology', 'Biostatistics', 'Summer', 'Apply statistical methods to biological data and research studies.', 33, NULL),
('BIO301', 'Biology', 'Bioinformatics', 'Fall', 'Use algorithms and data analysis techniques in genomics and molecular biology.', 31, NULL),
('BUS101', 'Business', 'Principles of Marketing', 'Spring', 'Study marketing strategies, consumer behavior, and market analysis.', 35, NULL),
('BUS201', 'Business', 'Business Statistics', 'Summer', 'Apply statistical methods to analyze and interpret business data.', 35, NULL),
('BUS301', 'Business', 'Entrepreneurship Essentials', 'Fall', 'Learn the foundational principles of starting and managing a successful business.', 35, NULL),
('CHEM101', 'Chemistry', 'Physical Chemistry', 'Spring', 'Study the principles of quantum mechanics, thermodynamics, and kinetics in chemical systems.', 35, NULL),
('CHEM201', 'Chemistry', 'Analytical Chemistry', 'Summer', 'Learn quantitative analysis techniques and instrumentation used in chemistry.', 28, NULL),
('CHEM301', 'Chemistry', 'Computational Chemistry', 'Fall', 'Use mathematical modeling and simulations to study chemical phenomena.', 22, NULL),
('CSC101', 'Computer Science', 'Introduction to Computer Science', 'Spring', 'Basics of programming, algorithms, and the mathematical foundations of computer science.', 30, NULL),
('CSC102', 'Computer Science', 'Data Structures and Algorithms', 'Summer', 'Learn computational efficiency and design of algorithms for problem-solving.', 30, NULL),
('CSC201', 'Computer Science', 'Artificial Intelligence', 'Fall', 'Study the math behind AI, including linear algebra, probability, and optimization techniques.', 20, NULL),
('CSC301', 'Computer Science', 'Scientific Computing', 'Spring', 'Use computational tools to solve scientific and mathematical problems.', 19, NULL),
('ENG101', 'English', 'Technical Writing', 'Spring', 'Learn to craft clear and concise technical documents such as research papers, lab reports, and proposals.', 35, NULL),
('ENG102', 'English', 'Public Speaking', 'Summer', 'Develop skills to confidently present mathematical concepts and research findings to diverse audiences.', 40, NULL),
('ENG201', 'English', 'Critical Thinking and Argumentation', 'Fall', 'Strengthen analytical skills to construct and deconstruct logical arguments effectively.\r\n', 32, NULL),
('ENG202', 'English', 'Professional Communication', 'Spring', 'Master communication in professional settings, including email etiquette, resumes, and interview preparation.', 25, NULL),
('ENG301', 'English', 'Literature and Logic', 'Summer', 'Explore classic literature themes that emphasize logic, philosophy, and mathematical reasoning.', 22, NULL),
('ENG302', 'English', 'Creative Writing for Problem Solving', 'Fall', 'Use creative storytelling techniques to enhance lateral thinking and innovative solutions.', 20, NULL),
('ENG401', 'English', 'Rhetoric and Persuasion', 'Spring', 'Build skills in crafting persuasive arguments for proposals, papers, and professional presentations.', 18, NULL),
('ENG402', 'English', 'English for Math Researchers', 'Summer', 'Tailored for students writing research papers or preparing for presentations at academic conferences.', 15, NULL),
('ENV101', 'Environmental Studies', 'Geophysics', 'Spring', 'Explore the mathematical analysis of physical processes shaping the Earth.', 33, NULL),
('ENV102', 'Environmental Studies', 'Environmental Modeling', 'Summer', 'Use math to simulate and predict environmental changes and impacts.', 29, NULL),
('ENV201', 'Environmental Studies', 'Climate Science', 'Fall', 'Understand the mathematical models behind climate change and weather patterns.', 23, NULL),
('FIN101', 'Finance', 'Financial Mathematics', 'Spring', 'Introduction to mathematical techniques used in finance, including compound interest, annuities, and amortization schedules.', 34, NULL),
('FIN201', 'Finance', 'Risk Analysis and Probability', 'Summer', 'Explore probabilistic models and mathematical tools for assessing financial risks and developing mitigation strategies.', 33, NULL),
('FIN301', 'Finance', 'Quantitative Asset Management', 'Fall', 'Study optimization and mathematical modeling in portfolio construction, derivatives pricing, and investment strategies.', 27, NULL),
('HLTH101', 'Health', 'Introduction to Health Science', 'Spring', 'Basics of human anatomy, physiology, and the scientific principles behind healthcare', 34, NULL),
('HLTH102', 'Health', 'Epidemiology and Public Health', 'Summer', 'Study of disease distribution and health statistics using mathematical models.', 32, NULL),
('HLTH201', 'Health', 'Nutrition Science', 'Fall', 'Exploration of nutritional principles and their role in health and disease prevention.', 27, NULL),
('HLTH202', 'Health', 'Biomechanics', 'Spring', 'Study of movement and mechanics applied to the human body with mathematical analysis.', 31, NULL),
('HLTH301', 'Health', 'Medical Imaging Technology', 'Summer', 'Principles behind MRI, X-ray, and CT scans with a focus on their mathematical foundations.', 35, NULL),
('HLTH302', 'Health', 'Health Data Analytics', 'Fall', 'Statistical techniques for analyzing health-related data.', 33, NULL),
('HLTH401', 'Health', 'Genetics in Healthcare', 'Spring', 'Application of genetics and mathematical modeling in personalized medicine.', 31, NULL),
('HLTH402', 'Health', 'Ethics in Health Science', 'Summer', 'Examination of ethical issues in healthcare research and practice.', 27, NULL),
('MATH101', 'Math', 'Calculus 1', 'Spring', 'Introduction to limits, derivatives, and integrals with real-world applications.', 25, NULL),
('MATH102', 'Math', 'Discrete Mathematics', 'Summer', 'Topics in logic, set theory, combinatorics, and graph theory.', 30, NULL),
('MATH103', 'Math', 'Probability and Statistics', 'Fall', 'Principles of probability theory and statistical data analysis.', 35, NULL),
('MATH201', 'Math', 'Calculus 2', 'Spring', 'Advanced integration techniques, polar coordinates, and sequences and series.', 25, NULL),
('MATH202', 'Math', 'Linear Algebra', 'Summer', 'Study of vectors, matrices, eigenvalues, and linear transformations.', 27, 0),
('MATH203', 'Math', 'Differential Equations', 'Fall', 'Solving ordinary differential equations and their real-world applications.', 22, NULL),
('MATH301', 'Math', 'Abstract Algebra', 'Spring', 'Exploration of algebraic structures like groups, rings, and fields.', 20, NULL),
('MATH302', 'Math', 'Numerical Methods', 'Summer', 'Computational approaches for solving mathematical equations.', 21, NULL),
('MATH303', 'Math', 'Real Analysis', 'Fall', 'Rigorous study of real numbers, sequences, and functions.', 25, NULL),
('MATH401', 'Math', 'Topology', 'Spring', 'Study of spatial properties preserved under deformation.', 28, NULL),
('MATH402', 'Math', 'Combinatorics', 'Summer', 'Study of counting, arrangement, and combination techniques in mathematics.', 29, 0),
('MATH403', 'Math', 'Complex Analysis', 'Fall', 'Exploration of functions of a complex variable and their applications.', 18, 1),
('PHY101', 'Physics', 'Classical Mechanics', 'Spring', 'Explore motion, forces, energy, and their mathematical formulations.', 35, NULL),
('PHY102', 'Physics', 'Electromagnetism', 'Summer', 'Study electric and magnetic fields with a strong mathematical foundation.', 33, NULL),
('PHY201', 'Physics', 'Thermodynamics', 'Fall', 'Examine heat, energy, and entropy using mathematical models.', 22, NULL),
('PHY202', 'Physics', 'Quantum Mechanics', 'Spring', 'Learn the mathematical principles behind quantum phenomena and subatomic particles.', 18, NULL),
('PHY301', 'Physics', 'Physics of Waves and Oscillations', 'Summer', 'Investigate wave behavior and oscillatory motion in physical systems.', 15, NULL),
('PSYC101', 'Psychology', 'Introduction to Psychology', 'Spring', 'Explore the fundamentals of human behavior, cognition, and emotions.', 26, NULL),
('PSYC201', 'Psychology', 'Cognitive Psychology', 'Summer', 'Study the mental processes behind thinking, memory, language, and problem-solving.', 23, NULL),
('PSYC301', 'Psychology', 'Behavioral Analysis', 'Fall', 'Examine behavioral patterns and techniques for analyzing and influencing human actions.', 20, NULL),
('SOC101', 'Sociology', 'Introduction to Sociology', 'Spring', 'Understand social structures, cultural norms, and the dynamics of human societies.', 32, NULL),
('SOC201', 'Sociology', 'Sociology of Education', 'Summer', 'Investigate the role of education in shaping social systems and individual opportunities.', 27, NULL),
('SOC301', 'Sociology', 'Social Data Analysis', 'Fall', 'Learn statistical techniques for studying social trends and data.', 25, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `enrollmentID` int(36) NOT NULL,
  `userID` varchar(36) NOT NULL,
  `courseID` varchar(36) NOT NULL,
  `status` enum('Enrolled','Waitlisted') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`enrollmentID`, `userID`, `courseID`, `status`) VALUES
(1, 'bf6d8cf0-0822-11f0-886e-1869c8b2208b', 'MATH101', 'Enrolled'),
(2, 'bf6d8cf0-0822-11f0-886e-1869c8b2208b', 'ART201', 'Enrolled'),
(4, 'bf6d8cf0-0822-11f0-886e-1869c8b2208b', 'BIO101', 'Enrolled'),
(18, '5ecfebfa-1240-11f0-ab6b-7b2135a49a15', 'MATH403', 'Enrolled');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messageID` int(11) NOT NULL,
  `userID` varchar(36) DEFAULT NULL,
  `messageText` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `isRead` tinyint(1) DEFAULT 0,
  `courseID` varchar(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messageID`, `userID`, `messageText`, `timestamp`, `isRead`, `courseID`) VALUES
(4, '9568363e-08c0-11f0-a60a-6cdd11bb7725', 'A spot has opened in Digital Design Basics (Course ID: ART101).', '2025-04-05 16:53:05', 1, 'ART101'),
(5, 'bf6d8cf0-0822-11f0-886e-1869c8b2208b', 'A spot has opened in Digital Design Basics (Course ID: ART101).', '2025-04-05 17:12:25', 1, 'ART101');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` varchar(36) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `role` enum('Admin','Office','Instructor','Student') NOT NULL COMMENT 'RBAC'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `email`, `password`, `firstName`, `lastName`, `phone`, `role`) VALUES
('5ecfebfa-1240-11f0-ab6b-7b2135a49a15', 'conic.sections@alexanderianlibrary.org', '$2y$10$rqS04HpkK6OuQP7qDDkLo./M/kMvuOxpqlPpCLMxV92fXiF4wyPfi', 'Hypatia', 'Alexandria', '2718181828', 'Student'),
('9568363e-08c0-11f0-a60a-6cdd11bb7725', 'infinity.love@partitiontheory.com', '$2y$10$rbwERH4MRI.MFxpc8c6xleMwg7njPQMl.m8V8YyRmpfV6Fl4ATxx.', 'Srinivasa', 'Ramanujan', '3147291729', 'Student'),
('bf6d8cf0-0822-11f0-886e-1869c8b2208b', 'countess.of.computation@intergralmail.com', '$2y$10$s3wntjQJoUKOqeZXKB9yxOGisUK298TieEa/DqxNsjEelqIlqDJ/K', 'Ada', 'Lovelace', '3141592653', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `waitlist`
--

CREATE TABLE `waitlist` (
  `waitlistID` int(36) NOT NULL,
  `userID` varchar(36) NOT NULL,
  `courseID` varchar(36) NOT NULL,
  `queueOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `waitlist`
--

INSERT INTO `waitlist` (`waitlistID`, `userID`, `courseID`, `queueOrder`) VALUES
(13, '9568363e-08c0-11f0-a60a-6cdd11bb7725', 'ART101', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`enrollmentID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `courseID` (`courseID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messageID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userID` (`email`);

--
-- Indexes for table `waitlist`
--
ALTER TABLE `waitlist`
  ADD PRIMARY KEY (`waitlistID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `courseID` (`courseID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `enrollmentID` int(36) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `waitlist`
--
ALTER TABLE `waitlist`
  MODIFY `waitlistID` int(36) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `enrollment_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `waitlist`
--
ALTER TABLE `waitlist`
  ADD CONSTRAINT `waitlist_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `waitlist_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
