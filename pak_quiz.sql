-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2024 at 11:44 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pak_quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `OptionID` int(20) NOT NULL,
  `QuestionID` int(20) NOT NULL,
  `OptionText` text NOT NULL,
  `options_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`OptionID`, `QuestionID`, `OptionText`, `options_name`) VALUES
(1, 1, 'Scripting Language', 1),
(2, 1, 'Markup Language', 2),
(3, 1, 'Programming Language', 3),
(4, 1, 'Network Protocol', 4),
(6, 5, 'User defined tags', 1),
(7, 5, 'Fixed tags defined by the language.', 2),
(8, 5, 'Pre-specified tags', 3),
(9, 5, 'Tags only for linking\r\n', 4),
(10, 6, '1990\r\n', 1),
(11, 6, '1995\r\n', 2),
(12, 6, '2000\r\n', 3),
(13, 6, '2001\r\n', 4),
(14, 7, 'fat\r\n', 1),
(15, 7, 'strong\r\n', 2),
(16, 7, 'italic\n', 3),
(17, 7, 'emp\r\n', 4);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `QuestionID` int(20) NOT NULL,
  `Quiz_ID` int(20) NOT NULL,
  `QuestionText` text NOT NULL,
  `CorrectAnswer` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`QuestionID`, `Quiz_ID`, `QuestionText`, `CorrectAnswer`) VALUES
(1, 1, 'HTML is what type of language ?', 2),
(5, 1, 'HTML uses :', 2),
(6, 1, 'The year in which HTML was first proposed _______.', 1),
(7, 1, 'Apart from  bold tag, what other tag makes text bold ?', 2);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `QuizID` int(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `NumberOfQuestions` int(20) NOT NULL,
  `CreatedBy` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`QuizID`, `title`, `NumberOfQuestions`, `CreatedBy`) VALUES
(1, 'HTML', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(20) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` text NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `role`, `token`) VALUES
(1, 'mahi', 'abdulwahabk620@gmail.com', '$2y$10$Q3a76f4Cs0SSL9mErBHwUe4nbqjUIMzKwV9wqmKyDE73x5RlKC0E.', 'admin', 'a048585059b8bb70a8ee1951003c336e'),
(2, 'Usman Hassan ', 'usmanhassan16903@gmail.com', '$2y$10$Q3a76f4Cs0SSL9mErBHwUe4nbqjUIMzKwV9wqmKyDE73x5RlKC0E.', 'user', 'afc1ac6b4233ada4e5a6ac0b55cd5119'),
(4, 'Mursaleen', 'Abcd@gmail.com', '$2y$10$Q3a76f4Cs0SSL9mErBHwUe4nbqjUIMzKwV9wqmKyDE73x5RlKC0E.', 'user', ''),
(5, 'Abrar', 'Abcdefgh@gmail.com', '$2y$10$Q3a76f4Cs0SSL9mErBHwUe4nbqjUIMzKwV9wqmKyDE73x5RlKC0E.', 'user', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_quiz`
--

CREATE TABLE `users_quiz` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `quiz_name` text NOT NULL,
  `score` int(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_quiz`
--

INSERT INTO `users_quiz` (`id`, `email`, `quiz_name`, `score`, `date`) VALUES
(3, 'usmanhassan16903@gmail.com', 'HTML', 40, '2024-03-04'),
(4, 'usmanhassan16903@gmail.com', 'HTML', 0, '2024-03-04'),
(5, 'usmanhassan16903@gmail.com', 'HTML', 10, '2024-03-04'),
(6, 'Abcd@gmail.com', 'HTML', 30, '2024-03-04'),
(7, 'usmanhassan16903@gmail.com', 'HTML', 40, '2024-03-06'),
(8, 'usmanhassan16903@gmail.com', 'HTML', 0, '2024-03-06'),
(9, 'usmanhassan16903@gmail.com', 'HTML', 30, '2024-03-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`OptionID`),
  ADD KEY `fk_QuestionID` (`QuestionID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`QuestionID`),
  ADD KEY `fk_quiz_id` (`Quiz_ID`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`QuizID`),
  ADD KEY `fk_created_by` (`CreatedBy`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_quiz`
--
ALTER TABLE `users_quiz`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `OptionID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `QuestionID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `QuizID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_quiz`
--
ALTER TABLE `users_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `fk_QuestionID` FOREIGN KEY (`QuestionID`) REFERENCES `questions` (`QuestionID`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fk_quiz_id` FOREIGN KEY (`Quiz_ID`) REFERENCES `quizzes` (`QuizID`);

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `fk_created_by` FOREIGN KEY (`CreatedBy`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
