-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2020 at 11:34 AM
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
  `answer` text NOT NULL,
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `answer`, `id`, `question_id`) VALUES
(67, 'Air pollution is caused by gases and particles emitted to the atmosphere by a variety of human activities, such as the inefficient combustion of fuels, agriculture, and farming. There are also natural sources contributing to air pollution, including particles of soil dust and salt in sea spray.', 1, 39),
(68, 'Air pollutants can be emitted directly from a source (i.e. primary pollutants) or can form from chemical reactions in the atmosphere (i.e. secondary pollutants). When concentrations of these substances reach critical levels in the air, they harm humans, animals, plants and ecosystems, reduce visibility and corrode materials, buildings and cultural heritage sites.', 1, 39),
(69, 'The main sources of air pollution are the industries, agriculture and traffic, as well as energy generation. During combustion processes and other production processes air pollutants are emitted. Some of these substances are not directly damaging to air quality, but will form harmful air pollutants by reactions with other substances that are present in air.', 1, 41);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `contactus_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `contact_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contactus_id`, `name`, `email`, `subject`, `message`, `contact_date`) VALUES
(7, 'Min Khant Mg', 'mkm5419@gmail.com', 'Pollution data', 'Where can I get air pollution data?', '2020-11-09');

-- --------------------------------------------------------

--
-- Table structure for table `loginlogs`
--

CREATE TABLE `loginlogs` (
  `login_id` int(11) NOT NULL,
  `IpAddress` varbinary(16) NOT NULL,
  `TryTime` bigint(20) NOT NULL
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
(6, 'We\'re offering masks for frontline medical staffs', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'maskdonation.jpg', '2020-11-06', 0, 'donation', 1),
(11, 'Tiny air pollution rise linked to 11% more Covid-19 deaths – study', 'A small rise in people’s long-term exposure to air pollution is associated with an 11% increase in deaths from Covid-19, research has found. Another recent study suggests that 15% of all Covid-19 deaths around the world are attributable to dirty air.\r\n\r\nThe available data only allows correlations to be established and further work is needed to confirm the connections, but the researchers said the evidence was now strong enough that levels of dirty air must be considered a key factor in handling coronavirus outbreaks.\r\n\r\nThe new analysis is based on research reported by the Guardian in April, which has now been reviewed by independent scientists and published in a prominent journal. The consideration of additional data and more factors that may also influence Covid-19 death rates refined the rise in deaths from 15% down to 11%.\r\n\r\nMost scientists think it is very likely that air pollution increases the number and severity of Covid-19 cases. Breathing dirty air over years is already known to cause heart and lung disease, and these illnesses make coronavirus infections worse. Short-term exposure is also known to increase the risk of acute lung infections.\r\n\r\nThe gold-standard method for confirming the link between air pollution and Covid-19 would be to assess a large number of coronavirus patients on an individual level, so their age, smoking history and other details can be taken into account.\r\n\r\nSuch data, however, is not yet available so given the urgency of the pandemic researchers have used data on groups of people. This can be strongly indicative of a link, but may hide important individual factors.\r\n\r\nThere are now hundreds of group-level studies, although most have yet to be reviewed, said Prof Francesca Dominici at Harvard University, who led the new analysis.', '4194.jpg', '2020-11-06', 2, 'Covid19', 1),
(13, 'World needs to reduce industrial sites in order not to get worse air pollution', 'A small rise in people’s long-term exposure to air pollution is associated with an 11% increase in deaths from Covid-19, research has found. Another recent study suggests that 15% of all Covid-19 deaths around the world are attributable to dirty air.\r\n\r\nThe available data only allows correlations to be established and further work is needed to confirm the connections, but the researchers said the evidence was now strong enough that levels of dirty air must be considered a key factor in handling coronavirus outbreaks.\r\n\r\nThe new analysis is based on research reported by the Guardian in April, which has now been reviewed by independent scientists and published in a prominent journal. The consideration of additional data and more factors that may also influence Covid-19 death rates refined the rise in deaths from 15% down to 11%.\r\n\r\nMost scientists think it is very likely that air pollution increases the number and severity of Covid-19 cases. Breathing dirty air over years is already known to cause heart and lung disease, and these illnesses make coronavirus infections worse. Short-term exposure is also known to increase the risk of acute lung infections.\r\n\r\nThe gold-standard method for confirming the link between air pollution and Covid-19 would be to assess a large number of coronavirus patients on an individual level, so their age, smoking history and other details can be taken into account.\r\n\r\nSuch data, however, is not yet available so given the urgency of the pandemic researchers have used data on groups of people. This can be strongly indicative of a link, but may hide important individual factors.\r\n\r\nThere are now hundreds of group-level studies, although most have yet to be reviewed, said Prof Francesca Dominici at Harvard University, who led the new analysis.', 'gettyimages-575346013-612x612.jpg', '2020-11-06', 1, 'Industries', 1),
(14, 'Wildfire increase the rates of air pollution', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'wildfire.jpg', '2020-11-06', 1, 'wildfire', 1),
(16, 'We donated 3 millions dollar to help other youth association.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cumque nobis error commodi, dicta ea quibusdam nostrum quis ex eligendi necessitatibus harum laudantium, ipsum minima veniam explicabo velit. At, necessitatibus nam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita blanditiis rem dolorum. Rem excepturi a recusandae eius, temporibus quam dolore voluptatum. Ducimus illo aspernatur magni, eum odio amet autem. Fugiat!Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cumque nobis error commodi, dicta ea quibusdam nostrum quis ex eligendi necessitatibus harum laudantium, ipsum minima veniam explicabo velit. At, necessitatibus nam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita blanditiis rem dolorum. Rem excepturi a recusandae eius, temporibus quam dolore voluptatum. Ducimus illo aspernatur magni, eum odio amet autem. Fugiat!', 'wordpress-best-donation-plugins.jpg', '2020-11-08', 0, 'donation', 1),
(17, 'testing', 'asdfghj', 'wallpaper.jpg', '2020-11-09', 0, '', 1),
(18, 'Planting trees reduce air pollution', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'tree-736885__340.jpg', '2020-11-09', 0, 'tress', 1),
(19, 'US is now in air pollution danger zone', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'slider2.jpg', '2020-11-09', 2, 'United States', 1);

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
(38, 'WHY IS AIR POLLUTION A PRIORITY ISSUE?', '2020-11-09', 68),
(39, 'What is air pollution?', '2020-11-09', 68),
(41, 'What causes air pollution?', '2020-11-09', 70);

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
(1, 'AungKhant', 'bdc87b9c894da5168059e00ebffb9077', 0, 'aungkhantmin212002@gmail.com', 'Aung Khant Min', '21/8/2002', 'Yangon,Myanmar', '234567'),
(27, 'pwhashing', 'd440aed189a13ff970dac7e7e8f987b2', 1, 'pw@gmail.com', 'pwtesting', '18/3/2020', 'Yangon,Myanmar', '12345'),
(53, 'potato', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 'potato@gmail.com', 'toe toe', '21/8/2002', 'postato farm', '12345'),
(54, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 0, 'admin@gmail.com', 'admin', '18/3/2020', 'Yangon,Myanmar', '234567'),
(63, 'user', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 'user@gmail.com', 'user fullname', '18/3/2020', 'Yangon,Myanmar', '234567'),
(68, 'MgPu', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 'mgpu@gmail.com', 'Mg Hla Pu Win', '9/3/2001', 'Yangon,Myanmar', '11201'),
(70, 'Shwehla', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 'shwehla22@gmail.com', 'Shwe Hla Mg', '8/2/1999', 'Yangon,Myanmar', '11201');

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
-- Indexes for table `loginlogs`
--
ALTER TABLE `loginlogs`
  ADD PRIMARY KEY (`login_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contactus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `loginlogs`
--
ALTER TABLE `loginlogs`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

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
