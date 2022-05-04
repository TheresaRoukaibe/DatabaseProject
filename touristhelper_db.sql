-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2022 at 11:34 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `touristhelper.db`
--
CREATE DATABASE IF NOT EXISTS `touristhelper.db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `touristhelper.db`;

-- --------------------------------------------------------

--
-- Table structure for table `attraction_involves`
--

DROP TABLE IF EXISTS `attraction_involves`;
CREATE TABLE `attraction_involves` (
  `inv_hobby_id` int(11) DEFAULT NULL,
  `inv_att_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attraction_involves`
--

INSERT INTO `attraction_involves` (`inv_hobby_id`, `inv_att_id`) VALUES
(8, 4),
(8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

DROP TABLE IF EXISTS `hobbies`;
CREATE TABLE `hobbies` (
  `hobby_id` int(11) NOT NULL,
  `hobby_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hobbies`
--

INSERT INTO `hobbies` (`hobby_id`, `hobby_name`) VALUES
(1, 'Drawing'),
(2, 'Skiing'),
(3, 'Drinking'),
(4, 'Drawing'),
(5, 'Drinking'),
(6, 'Dancing'),
(7, 'Drinking'),
(8, 'Socializing'),
(9, 'Socializing'),
(10, 'Socializing');

-- --------------------------------------------------------

--
-- Table structure for table `postal_codes`
--

DROP TABLE IF EXISTS `postal_codes`;
CREATE TABLE `postal_codes` (
  `code_id` int(11) NOT NULL,
  `code_city_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postal_codes`
--

INSERT INTO `postal_codes` (`code_id`, `code_city_name`) VALUES
(1201, 'Antelias'),
(1401, 'Jbail');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `review_user_id` int(11) NOT NULL,
  `review_opinion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `review_user_id`, `review_opinion`) VALUES
(1, 10, 'Very fun! Recommended for families :)');

-- --------------------------------------------------------

--
-- Table structure for table `tourist_attractions`
--

DROP TABLE IF EXISTS `tourist_attractions`;
CREATE TABLE `tourist_attractions` (
  `att_id` int(11) NOT NULL,
  `att_name` varchar(255) DEFAULT NULL,
  `att_capacity` int(11) DEFAULT NULL,
  `att_budget` int(11) DEFAULT NULL,
  `att_budget_opening_hours` varchar(255) DEFAULT NULL,
  `att_budget_closing_hours` varchar(255) DEFAULT NULL,
  `att_description` varchar(255) DEFAULT NULL,
  `postal_code_id` int(11) DEFAULT NULL,
  `attraction_type_id` int(11) DEFAULT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tourist_attractions`
--

INSERT INTO `tourist_attractions` (`att_id`, `att_name`, `att_capacity`, `att_budget`, `att_budget_opening_hours`, `att_budget_closing_hours`, `att_description`, `postal_code_id`, `attraction_type_id`, `url`) VALUES
(4, 'Kina Handcrafted Bar', 6, 125000, '10:00AM', '1:00AM', 'Tucked away on Byblos’ shore, Kina Handcrafted Bar is a gem that perches right above the sea. With all-things mystical and artisanal, you’ll be struck at how beautifully the bar’s mood-board was executed.', 1401, 4, 'images\\kina.jpg'),
(8, 'Frenzy Fun Center', 8, 75000, '10:00AM', '12:00AM', 'We are a Family Entertainment Center with many attractions like Laser Tag, Bowling, Arcades, Virtual Reality, Indoor Playground, Birthday venue, and a Cafe.', 1401, 3, 'images\\frenzy.jpg'),
(10, 'Roadster Diner', 5, 200000, '12PM', '1AM', 'WHEN ROADSTER DINER FIRST OPENED ITS ACHRAFIEH DOORS, THE IDEA WAS SIMPLE: CREATE THE HOMIEST, MOST AUTHENTIC DINER EXPERIENCE THE CITY HAD EVER SEEN.', 1201, 1, 'images\\roadster.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tourist_attraction_types`
--

DROP TABLE IF EXISTS `tourist_attraction_types`;
CREATE TABLE `tourist_attraction_types` (
  `att_type_id` int(11) NOT NULL,
  `att_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tourist_attraction_types`
--

INSERT INTO `tourist_attraction_types` (`att_type_id`, `att_type`) VALUES
(1, 'Restaurant'),
(2, 'Night Life'),
(3, 'Indoor Entertainment'),
(4, 'Outdoor Entertainment');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_gender` varchar(255) DEFAULT NULL,
  `user_firstname` varchar(255) DEFAULT NULL,
  `user_lastname` varchar(255) DEFAULT NULL,
  `user_age` int(11) DEFAULT NULL,
  `user_types_id` int(11) NOT NULL,
  `postal_code` int(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_gender`, `user_firstname`, `user_lastname`, `user_age`, `user_types_id`, `postal_code`, `email`, `pass`) VALUES
(21, 'Female', 'Theresa', 'Roukaibe', 20, 0, 1401, 'theresaroukaibe@gmail.com', '$2y$10$ItrldwdbYyRgnpLN5J1sreRqGrCHvg9G4sC3DMifW2eH7QN5e/U0y'),
(22, 'Female', 'Thalia', 'Roukaibe', 16, 1, 1401, 'thaliaroukaibe@gmail.com', '$2y$10$znDhdCRnwRc7Rng2X7a2Gup1thhng/Metr2Kuq0yOB1RIySXzEarq');

-- --------------------------------------------------------

--
-- Table structure for table `user_enjoys`
--

DROP TABLE IF EXISTS `user_enjoys`;
CREATE TABLE `user_enjoys` (
  `enjoys_user_id` int(11) DEFAULT NULL,
  `enjoys_hobby_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_enjoys`
--

INSERT INTO `user_enjoys` (`enjoys_user_id`, `enjoys_hobby_id`) VALUES
(10, 1),
(10, 1),
(16, 3),
(10, 6),
(21, 3),
(21, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

DROP TABLE IF EXISTS `user_types`;
CREATE TABLE `user_types` (
  `user_types_id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`user_types_id`, `type_name`) VALUES
(0, 'Tourist'),
(1, 'Business Owner');

-- --------------------------------------------------------

--
-- Table structure for table `user_visits`
--

DROP TABLE IF EXISTS `user_visits`;
CREATE TABLE `user_visits` (
  `visit_user_id` int(11) DEFAULT NULL,
  `visit_loc_id` int(11) DEFAULT NULL,
  `visit_time` varchar(255) NOT NULL,
  `visit_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`hobby_id`);

--
-- Indexes for table `postal_codes`
--
ALTER TABLE `postal_codes`
  ADD PRIMARY KEY (`code_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tourist_attractions`
--
ALTER TABLE `tourist_attractions`
  ADD PRIMARY KEY (`att_id`);

--
-- Indexes for table `tourist_attraction_types`
--
ALTER TABLE `tourist_attraction_types`
  ADD PRIMARY KEY (`att_type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `hobby_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `postal_codes`
--
ALTER TABLE `postal_codes`
  MODIFY `code_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1402;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tourist_attractions`
--
ALTER TABLE `tourist_attractions`
  MODIFY `att_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_enjoys`
--
ALTER TABLE `user_enjoys`
  ADD CONSTRAINT `hobby_id` FOREIGN KEY (`enjoys_hobby_id`) REFERENCES `hobbies` (`hobby_id`);

--
-- Constraints for table `user_visits`
--
ALTER TABLE `user_visits`
  ADD CONSTRAINT `visit_loc_id` FOREIGN KEY (`visit_loc_id`) REFERENCES `locations` (`loc_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
