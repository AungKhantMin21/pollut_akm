-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2020 at 08:08 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pollut`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `answer` text DEFAULT NULL,
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `answer`, `id`, `question_id`) VALUES
(7, 'updated', 1, 11),
(10, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `contactus_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `contact_date` date NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contactus_id`, `subject`, `message`, `contact_date`, `id`) VALUES
(3, 'feedback after delete', 'message testing', '2020-10-31', 3);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `faq_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `category` int(11) NOT NULL DEFAULT 0,
  `tags` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `description`, `photo`, `date`, `category`, `tags`, `id`) VALUES
(6, 'TESTING after security', 'Student, blah blah blah', 'mask.jpg', '2020-11-06', 0, 'test', 1),
(9, 'akm', 'testing', 'lockscreen.jpg', '2020-11-06', 0, 'testing', 3),
(11, 'Tiny air pollution rise linked to 11% more Covid-19 deaths – study', 'A small rise in people’s long-term exposure to air pollution is associated with an 11% increase in deaths from Covid-19, research has found. Another recent study suggests that 15% of all Covid-19 deaths around the world are attributable to dirty air.\r\n\r\nThe available data only allows correlations to be established and further work is needed to confirm the connections, but the researchers said the evidence was now strong enough that levels of dirty air must be considered a key factor in handling coronavirus outbreaks.\r\n\r\nThe new analysis is based on research reported by the Guardian in April, which has now been reviewed by independent scientists and published in a prominent journal. The consideration of additional data and more factors that may also influence Covid-19 death rates refined the rise in deaths from 15% down to 11%.\r\n\r\nMost scientists think it is very likely that air pollution increases the number and severity of Covid-19 cases. Breathing dirty air over years is already known to cause heart and lung disease, and these illnesses make coronavirus infections worse. Short-term exposure is also known to increase the risk of acute lung infections.\r\n\r\nThe gold-standard method for confirming the link between air pollution and Covid-19 would be to assess a large number of coronavirus patients on an individual level, so their age, smoking history and other details can be taken into account.\r\n\r\nSuch data, however, is not yet available so given the urgency of the pandemic researchers have used data on groups of people. This can be strongly indicative of a link, but may hide important individual factors.\r\n\r\nThere are now hundreds of group-level studies, although most have yet to be reviewed, said Prof Francesca Dominici at Harvard University, who led the new analysis.', '4194.jpg', '2020-11-06', 2, 'Covid19', 1),
(12, 'Blog Post 2', 'adsnad asd asdad asd', '2.jpg', '2020-11-06', 0, 'asdad', 1),
(13, 'Updated test', 'A small rise in people’s long-term exposure to air pollution is associated with an 11% increase in deaths from Covid-19, research has found. Another recent study suggests that 15% of all Covid-19 deaths around the world are attributable to dirty air.\r\n\r\nThe available data only allows correlations to be established and further work is needed to confirm the connections, but the researchers said the evidence was now strong enough that levels of dirty air must be considered a key factor in handling coronavirus outbreaks.\r\n\r\nThe new analysis is based on research reported by the Guardian in April, which has now been reviewed by independent scientists and published in a prominent journal. The consideration of additional data and more factors that may also influence Covid-19 death rates refined the rise in deaths from 15% down to 11%.\r\n\r\nMost scientists think it is very likely that air pollution increases the number and severity of Covid-19 cases. Breathing dirty air over years is already known to cause heart and lung disease, and these illnesses make coronavirus infections worse. Short-term exposure is also known to increase the risk of acute lung infections.\r\n\r\nThe gold-standard method for confirming the link between air pollution and Covid-19 would be to assess a large number of coronavirus patients on an individual level, so their age, smoking history and other details can be taken into account.\r\n\r\nSuch data, however, is not yet available so given the urgency of the pandemic researchers have used data on groups of people. This can be strongly indicative of a link, but may hide important individual factors.\r\n\r\nThere are now hundreds of group-level studies, although most have yet to be reviewed, said Prof Francesca Dominici at Harvard University, who led the new analysis.', 'gettyimages-575346013-612x612 (1).jpg', '2020-11-06', 1, 'Covid19', 1),
(14, 'Creation of IT system for clothing distributor', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'wildfire.jpg', '2020-11-06', 1, 'global news', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `question_date` date NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `question`, `question_date`, `id`) VALUES
(2, 'something testing\r\n', '2020-10-28', 1),
(5, 'user question testing', '2020-10-29', 3),
(7, 'order desc testing\r\n', '2020-10-29', 3),
(11, 'hello this is ask question new page testing \r\nupdated testing is done', '2020-10-30', 1),
(16, 'How to reduce waste in daily life?', '2020-10-31', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postalcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `status`, `email`, `fullname`, `dob`, `address`, `postalcode`) VALUES
(1, 'AungKhant', 'bdc87b9c894da5168059e00ebffb9077', 0, 'aungkhantmin212002@gmail.com', 'Aung Khant Min', '21/8/2002', 'Yangon,Myanmar', '12345'),
(3, 'akm', 'c6a7d2c304e4c34d720c900db714fa40', 1, 'akm@gmail.com', 'akmmm', '21/8/2002', 'Yangon,Myanmar', '12345'),
(26, 'test', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 'test@gmail.com', '', '', '', ''),
(27, 'pwhashing', 'd440aed189a13ff970dac7e7e8f987b2', 1, 'pw@gmail.com', 'pwtesting', '18/3/2020', 'Yangon,Myanmar', '12345'),
(31, 'Signup testing', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 'signup@gmail.com', 'signup', '18/3/2020', 'Yangon,Myanmar', '12345'),
(33, 'AungKhant', '5f4dcc3b5aa765d61d8327deb882cf99', 0, 'adsd', '', '', '', ''),
(34, 'testttt', '098f6bcd4621d373cade4e832627b4f6', 0, 'testtttt', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `id` (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`contactus_id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`faq_id`),
  ADD KEY `question fk` (`question_id`),
  ADD KEY `answer fk` (`answer_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `user_id fk` (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `Foreign Key` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contactus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `id` FOREIGN KEY (`id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `question_id` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`);

--
-- Constraints for table `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `answer fk` FOREIGN KEY (`answer_id`) REFERENCES `answer` (`answer_id`),
  ADD CONSTRAINT `question fk` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `user_id fk` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `Foreign Key` FOREIGN KEY (`id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
