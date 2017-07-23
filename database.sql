-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2017 at 12:39 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `fluid`
--
CREATE DATABASE IF NOT EXISTS `fluid` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `fluid`;

-- --------------------------------------------------------

--
-- Table structure for table `labels`
--

CREATE TABLE IF NOT EXISTS `labels` (
  `label_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(24) NOT NULL,
  `priority` int(11) NOT NULL,
  `colour` varchar(7) NOT NULL DEFAULT '#cdcdcd',
  PRIMARY KEY (`label_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `labels`
--

INSERT INTO `labels` (`label_id`, `name`, `priority`, `colour`) VALUES
(1, 'very high', -50, '#e64951'),
(2, 'high', -25, '#db0d0d'),
(3, 'Medium', 0, '#624dde'),
(4, 'Low', -25, '#26e089'),
(5, 'Very Low', -50, '#158508');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `task_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` tinytext NOT NULL,
  `status` int(2) UNSIGNED NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `name`, `description`, `status`, `deleted`) VALUES
(1, 'A new Task', 'New Task Details            ', 2, 1),
(2, 'Clean Motor', 'The car needs washing today', 2, 0),
(3, 'Mop Floors Bldng A', 'The corridors in Building A need Cleaning', 3, 0),
(4, 'Mop Floors Bldng b corridor 6', 'Floors in Building B need Mopping and communal areas Vacuumed', 1, 0),
(5, 'Unit D kitchenette ', 'Please find out what a kitchenette is and a kitchen needs an ette', 4, 0),
(6, 'Upstairs Main Bedroom', 'Doors need replacing in the large closet', 1, 0),
(7, 'Grounds General clean up', 'After the high tea on the lawn Lord Smoulder Chops realised he left the servents out over night again, please call the coroner, the lawyers, the funeral home and tell Aunt Maisy that its happened again,', 1, 0),
(8, 'Grounds Clean Up (Cont)', ' oh you better call the families too', 1, 0),
(9, 'Roast Badger Nadgers', 'The cook needs Badger Nadgers for the Sunday Roast', 1, 0),
(10, 'Polish the tea service', 'The silver needs polishing, if the set is not in the cabinet, Check the butlers pockets for the pawn ticket, if its not there, then go to the red lion, its probably holding up the village tab', 1, 0),
(11, 'Local Chinese Delivery', 'Local Chinese Delivery', 1, 0),
(12, 'Local takeaway in bampto', 'any food in bampton', 1, 0),
(13, 'Dad, this isnt Google', 'This is the house diary, please leave it alone', 1, 0),
(14, 'A new task', 'Create a new task            ', 1, 0),
(15, 'task 15', 'a new task default vals            ', 0, 0),
(16, 'Task 16', 'Default Vals            ', 0, 0),
(17, 'a new task', 'with default status set            ', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `task_label`
--

CREATE TABLE IF NOT EXISTS `task_label` (
  `task_label_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `task_id` int(11) UNSIGNED NOT NULL,
  `label_id` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`task_label_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task_label`
--

INSERT INTO `task_label` (`task_label_id`, `task_id`, `label_id`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 3, 2),
(4, 4, 2),
(5, 5, 4),
(6, 6, 3),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 2),
(11, 11, 4),
(12, 12, 4),
(13, 13, 1),
(21, 14, 1),
(22, 15, 1),
(23, 16, 1),
(24, 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `task_status`
--

CREATE TABLE IF NOT EXISTS `task_status` (
  `task_status_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` varchar(24) NOT NULL,
  `colour` varchar(24) NOT NULL DEFAULT 'red',
  PRIMARY KEY (`task_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task_status`
--

INSERT INTO `task_status` (`task_status_id`, `status`, `colour`) VALUES
(1, 'unassigned', '#cdcdcd'),
(2, 'In Progress', '#ccffcc'),
(3, 'Under Review', 'lime'),
(4, 'Closed', 'white');

-- --------------------------------------------------------

--
-- Table structure for table `task_user`
--

CREATE TABLE IF NOT EXISTS `task_user` (
  `task_user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `task_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`task_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task_user`
--

INSERT INTO `task_user` (`task_user_id`, `task_id`, `user_id`) VALUES
(1, 1, 4),
(2, 2, 1),
(3, 3, 4),
(4, 4, 1),
(5, 5, 4),
(6, 6, 5),
(7, 7, 3),
(8, 8, 1),
(9, 9, 4),
(10, 10, 5),
(11, 11, 5),
(12, 12, 1),
(13, 13, 1),
(14, 14, 1),
(15, 15, 1),
(16, 16, 1),
(17, 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(24) NOT NULL,
  `surname` varchar(24) NOT NULL,
  `username` varchar(24) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `surname`, `username`) VALUES
(1, 'Bill', 'Wymen', 'Billy'),
(2, 'Bruce', 'Rose', 'Axl'),
(3, 'Demetria', 'Guynes', 'Demimoore'),
(4, 'Albert', 'Brooks', 'Einstein'),
(5, 'Margaret-Anne', 'Hyra', 'Meg');
