-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2019 at 07:53 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int(10) NOT NULL,
  `fusername` varchar(255) NOT NULL,
  `fpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `fusername`, `fpassword`) VALUES
(1, 'faculty1', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `que_id` int(10) NOT NULL,
  `question` varchar(255) NOT NULL,
  `ans1` varchar(255) NOT NULL,
  `ans2` varchar(255) NOT NULL,
  `ans3` varchar(255) NOT NULL,
  `ans4` varchar(255) NOT NULL,
  `correct_ans` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `quizno` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`que_id`, `question`, `ans1`, `ans2`, `ans3`, `ans4`, `correct_ans`, `year`, `branch`, `subject`, `quizno`) VALUES
(1, 'What is the range of short data type in Java?', '-128 to 127', '-32768 to 32767', '-2147483648 to 2147483647', 'None of the mentioned', '-32768 to 32767', '1st', 'cse', 'java', 1),
(2, 'An expression involving byte, int, and literal numbers is promoted to which of these?', 'int', 'long', 'byte', 'float', 'int', '1st', 'cse', 'java', 1),
(3, 'Decrement operator, ??, decreases the value of variable by what number?', '1', '2', '3', '4', '1', '1st', 'cse', 'java', 2),
(4, 'Which of the following can be operands of arithmetic operators?', 'Numeric', 'Boolean', 'Characters', 'Both Numeric and Characters', 'Both Numeric and Characters', '1st', 'cse', 'java', 2),
(5, 'Which of the following is a correct identifier in C++?', '7var_name', '7VARNAME', 'VAR_1234', '$var_name', 'VAR_1234', '1st', 'cse', 'c++', 1),
(6, 'Which concept allows you to reuse the written code?', 'Encapsulation', 'Polymorphism', 'Abstraction', 'Inheritance', 'Inheritance', '1st', 'cse', 'c++', 1),
(7, 'How structures and classes in C++ differ?', 'Classes follows OOP concepts whereas structure does not', 'In Structures, members are private by default whereas in Classes they are public by default', 'Structures by default hide every member', 'Classes and Structures are the same', 'Classes follows OOP concepts whereas structure does not', '1st', 'cse', 'c++', 2),
(8, 'What does polymorphism in OOPs mean?', 'Concept of allowing overiding of functions', 'Concept of hiding data', 'Concept of keeping things in differnt modules/files', 'Concept of wrapping things into a single unit', 'Concept of allowing overiding of functions', '1st', 'cse', 'c++', 2),
(11, 'Question1', 'Answer1', 'Answer2', 'Answer3', 'Answer4', 'Answer2', '3rd', 'cse', 'WebTech', 1),
(12, 'Question2', 'Answer1', 'Answer2', 'Answer3', 'Answer4', 'Answer3', '3rd', 'cse', 'WebTech', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(10) NOT NULL,
  `year` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `quizno` int(10) NOT NULL,
  `startTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `year`, `branch`, `subject`, `quizno`, `startTime`) VALUES
(1, '1st', 'cse', 'java', 1, '2019-09-01 00:00:00'),
(2, '1st', 'cse', 'java', 2, '2019-09-01 00:00:00'),
(3, '1st', 'cse', 'c++', 1, '2019-09-01 00:00:00'),
(4, '1st', 'cse', 'c++', 2, '2019-09-21 00:00:00'),
(7, '3rd', 'cse', 'WebTech', 1, '2019-09-20 03:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `username`, `email`, `password`, `year`, `branch`) VALUES
(1, 'test1', 'test1@gmail.com', 'password', '1st', 'cse'),
(2, 'test2', 'test2@gmail.com', 'password2', '1st', 'ece'),
(3, 'test3', 'test3@gmail.com', 'password3', '3rd', 'cse');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) NOT NULL,
  `year` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `SubName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `year`, `branch`, `subject`, `SubName`) VALUES
(1, '1st', 'cse', 'java', 'JAVA'),
(2, '1st', 'cse', 'c++', 'C++'),
(3, '1st', 'ece', 'sub1', 'sub1'),
(4, '3rd', 'cse', 'WebTech', 'WebTech');

-- --------------------------------------------------------

--
-- Table structure for table `useranswer`
--

CREATE TABLE `useranswer` (
  `q_id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `correct_ans` varchar(255) NOT NULL,
  `userans` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `quizno` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useranswer`
--

INSERT INTO `useranswer` (`q_id`, `username`, `correct_ans`, `userans`, `branch`, `year`, `subject`, `quizno`) VALUES
(1, 'test1', '-32768 to 32767 ', '-32768 to 32767 ', '1st', 'cse', 'java', 1),
(2, 'test1', 'int ', 'int ', '1st', 'cse', 'java', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`que_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `useranswer`
--
ALTER TABLE `useranswer`
  ADD PRIMARY KEY (`q_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `que_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `useranswer`
--
ALTER TABLE `useranswer`
  MODIFY `q_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
