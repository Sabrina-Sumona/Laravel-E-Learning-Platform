-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 26, 2021 at 04:23 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_learning_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

DROP TABLE IF EXISTS `assignments`;
CREATE TABLE IF NOT EXISTS `assignments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_code` varchar(255) NOT NULL,
  `course_teacher` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `assignment_topic` varchar(255) NOT NULL,
  `assignment_detail` varchar(255) NOT NULL,
  `assignment_mark` int(11) NOT NULL DEFAULT '10',
  `submitted_students` json DEFAULT NULL,
  `total_students` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `course_code`, `course_teacher`, `due_date`, `assignment_topic`, `assignment_detail`, `assignment_mark`, `submitted_students`, `total_students`, `created_at`, `updated_at`) VALUES
(43, 'SE 409', 'Alfez Mayan', '2021-10-25', 'Assignment 01 - Part 1', 'Java File I/O Streams.', 5, '[]', 0, '2021-10-20 08:41:32', '2021-10-20 08:41:32'),
(44, 'SE 409', 'Alfez Mayan', '2021-10-25', 'Assignment 01 - Part 2', 'Types of GUI in Java.', 5, '[]', 0, '2021-10-20 08:42:35', '2021-10-20 08:42:35'),
(41, 'CSE 113', 'Alfez Mayan', '2021-10-23', 'Assignment 02', 'Find sum of a series using loop.', 10, '[]', 0, '2021-10-19 05:49:53', '2021-10-19 05:49:53'),
(39, 'CSE 113', 'Alfez Mayan', '2021-10-19', 'HW 01', 'Find the sum of two integer values.', 5, '[181472565, 172467591, 231472789, 172452565, 172372455]', 5, '2021-10-19 05:47:48', '2021-10-19 06:01:20'),
(40, 'CSE 113', 'Alfez Mayan', '2021-10-20', 'Assignment 01', 'Find the sum of two integer values using function.', 10, '[181472565]', 1, '2021-10-19 05:48:52', '2021-10-19 05:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `comment`, `user_id`, `created_at`, `updated_at`) VALUES
(12, 30, 'Same as the class time.', 20, '2021-09-11 09:21:49', '2021-09-11 09:21:49'),
(11, 30, 'At what time ma\'am?', 24, '2021-09-11 09:19:53', '2021-09-11 09:19:53'),
(10, 33, 'Ok ma\'am.', 28, '2021-09-11 09:17:02', '2021-09-11 09:17:02'),
(14, 30, 'Ok ma\'am. Thank you!', 24, '2021-09-11 09:23:13', '2021-09-11 09:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_code` varchar(255) NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `credit_hours` double NOT NULL,
  `course_teacher` varchar(255) NOT NULL,
  `course_teacher_image` varchar(255) NOT NULL,
  `join_code` varchar(255) NOT NULL,
  `joined_students` json DEFAULT NULL,
  `total_students` int(11) NOT NULL DEFAULT '0',
  `class_link` varchar(255) DEFAULT NULL,
  `drive_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `course_teacher`, `course_teacher_image`, `join_code`, `joined_students`, `total_students`, `class_link`, `drive_link`, `created_at`, `updated_at`) VALUES
(67, 'CSE 114', 'SPL Lab', 1.5, 'Alfez Mayan', '/images/user_22/image_22.png', 'cse114', '[172467591, 172372455, 172452565, 231472789, 181472565]', 5, NULL, NULL, '2021-09-25 03:44:35', '2021-10-02 22:44:34'),
(47, 'CSE 113', 'SPL', 3, 'Alfez Mayan', '/images/user_22/image_22.png', 'cse113', '[172467591, 172372455, 172452565, 231472789, 181472565]', 5, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-19 05:15:41', '2021-08-27 03:53:49'),
(17, 'CSE 216', 'Algorithm Lab', 1.5, 'Jerin Tasnim', '/images/user_20/image_20.png', 'cse216', '[172467591, 172372455, 172452565, 231472789, 181472565]', 5, NULL, 'https://drive.google.com/drive/folders/1psQNCwuruhagI5PmA3LCFsQ3ZC7VfitR?usp=sharing', '2021-08-19 05:15:41', '2021-08-27 03:54:43'),
(16, 'CSE 215', 'Algorithm', 3, 'Jerin Tasnim', '/images/user_20/image_20.png', 'cse215', '[172467591, 172372455, 172452565, 231472789, 181472565]', 5, NULL, 'https://drive.google.com/drive/folders/1psQNCwuruhagI5PmA3LCFsQ3ZC7VfitR?usp=sharing', '2021-08-19 05:15:41', '2021-08-27 03:54:35'),
(15, 'CSE 214', 'DS Lab', 1.5, 'Jerin Tasnim', '/images/user_20/image_20.png', 'cse214', '[172467591, 172372455, 172452565, 231472789, 181472565]', 5, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-19 05:15:41', '2021-08-27 03:54:13'),
(14, 'CSE 213', 'DS', 3, 'Jerin Tasnim', '/images/user_20/image_20.png', 'cse213', '[172467591, 172372455, 172452565, 231472789, 181472565]', 5, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-19 05:15:41', '2021-08-27 03:54:07'),
(12, 'CSE 115', 'OOP', 3, 'Alfez Mayan', '/images/user_22/image_22.png', 'cse115', '[]', 0, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-19 05:15:41', '2021-08-26 00:52:46'),
(13, 'CSE 116', 'OOP Lab', 1.5, 'Alfez Mayan', '/images/user_22/image_22.png', 'cse116', '[]', 0, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-19 05:15:41', '2021-08-26 00:52:57'),
(60, 'CSE 411', 'DSD', 3, 'Fatima Islam', '/images/user_28/image_28.png', 'cse411', '[]', 0, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-22 08:48:47', '2021-08-26 06:15:05'),
(23, 'CSE 319', 'TOC', 3, 'Ahnaf Mahin', '/images/user_19/image_19.png', 'cse319', '[]', 0, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-19 05:15:41', '2021-10-02 22:42:16'),
(24, 'CSE 317', 'Computer Net.', 3, 'Ahnaf Mahin', '/images/user_19/image_19.png', 'cse317', '[]', 0, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-19 05:15:41', '2021-08-19 05:15:41'),
(25, 'CSE 318', 'Computer Net. Lab', 1.5, 'Ahnaf Mahin', '/images/user_19/image_19.png', 'cse318', '[]', 0, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-19 05:15:41', '2021-08-19 05:15:41'),
(27, 'CSE 325', 'SAD', 3, 'Jerin Tasnim', '/images/user_20/image_20.png', 'cse325', '[]', 0, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-19 05:15:41', '2021-08-19 05:15:41'),
(28, 'CSE 326', 'SAD Lab', 1.5, 'Jerin Tasnim', '/images/user_20/image_20.png', 'cse326', '[]', 0, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-19 05:15:41', '2021-08-19 05:15:41'),
(29, 'SE 403', 'SQA', 3, 'Jerin Tasnim', '/images/user_20/image_20.png', 'se403', '[]', 0, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-19 05:15:41', '2021-08-19 05:15:41'),
(30, 'SE 404', 'SQA Lab', 1.5, 'Jerin Tasnim', '/images/user_20/image_20.png', 'se404', '[]', 0, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-19 05:15:41', '2021-08-19 05:15:41'),
(31, 'CSE 417', 'AI', 3, 'Ahnaf Mahin', '/images/user_19/image_19.png', 'cse417', '[]', 0, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-19 05:15:41', '2021-08-19 05:15:41'),
(32, 'CSE 418', 'AI Lab', 1.5, 'Ahnaf Mahin', '/images/user_19/image_19.png', 'cse418', '[]', 0, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-19 05:15:41', '2021-08-19 05:15:41'),
(33, 'CSE 415', 'SE', 3, 'Alfez Mayan', '/images/user_22/image_22.png', 'cse415', '[]', 0, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-19 05:15:41', '2021-08-19 05:15:41'),
(34, 'CSE 416', 'SE Lab', 1.5, 'Alfez Mayan', '/images/user_22/image_22.png', 'cse416', '[]', 0, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-19 05:15:41', '2021-08-19 05:15:41'),
(35, 'SE 407', 'WDBP', 3, 'Ahnaf Mahin', '/images/user_19/image_19.png', 'se407', '[]', 0, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-19 05:15:41', '2021-08-19 05:15:41'),
(36, 'SE 408', 'WDBP Lab', 1.5, 'Ahnaf Mahin', '/images/user_19/image_19.png', 'se408', '[]', 0, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-19 05:15:41', '2021-08-19 05:15:41'),
(37, 'SE 413', 'Int. & Int. Tech.', 3, 'Jerin Tasnim', '/images/user_20/image_20.png', 'se413', '[]', 0, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-19 05:15:41', '2021-08-19 05:15:41'),
(39, 'SE 409', 'Adv. Ent. Java', 3, 'Alfez Mayan', '/images/user_22/image_22.png', 'se409', '[]', 0, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-19 05:15:41', '2021-08-19 05:15:41'),
(40, 'SE 410', 'Adv. Ent. Java Lab', 1.5, 'Alfez Mayan', '/images/user_22/image_22.png', 'se410', '[]', 0, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-19 05:15:41', '2021-08-19 05:15:41'),
(46, 'CSE 413', 'CA', 3, 'Alfez Mayan', '/images/user_22/image_22.png', 'cse413', '[]', 0, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-19 05:15:41', '2021-08-19 05:15:41'),
(42, 'CSE 231', 'NA', 3, 'Ahnaf Mahin', '/images/user_19/image_19.png', 'cse231', '[]', 0, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-19 05:15:41', '2021-08-19 05:15:41'),
(43, 'CSE 232', 'NA Lab', 1.5, 'Ahnaf Mahin', '/images/user_19/image_19.png', 'cse232', '[]', 0, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-19 05:15:41', '2021-08-19 05:15:41'),
(52, 'CSE 315', 'OS', 3, 'Fatima Islam', '/images/user_28/image_28.png', 'cse315', '[]', 0, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-22 08:36:54', '2021-08-22 08:36:54'),
(49, 'CSE 311', 'DBMS', 3, 'Fatima Islam', '/images/user_28/image_28.png', 'cse311', '[]', 0, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-22 08:34:21', '2021-08-22 08:34:21'),
(57, 'SE 401', 'Com. Sim. & Mo.', 3, 'Fatima Islam', '/images/user_28/image_28.png', 'se401', '[]', 0, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-22 08:39:29', '2021-08-22 08:39:29'),
(54, 'CSE 323', 'Compiler Design', 3, 'Fatima Islam', '/images/user_28/image_28.png', 'cse323', '[]', 0, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-22 08:38:03', '2021-08-22 08:38:03'),
(53, 'CSE 316', 'OS Lab', 1.5, 'Fatima Islam', '/images/user_28/image_28.png', 'cse316', '[]', 0, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-22 08:37:19', '2021-08-22 08:37:19'),
(50, 'CSE 312', 'DBMS Lab', 1.5, 'Fatima Islam', '/images/user_28/image_28.png', 'cse312', '[]', 0, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-22 08:35:18', '2021-08-22 08:35:18'),
(51, 'CSE 313', 'Data Com.', 3, 'Fatima Islam', '/images/user_28/image_28.png', 'cse313', '[]', 0, 'https://us05web.zoom.us/j/87229276423?pwd=K1ZlNzJva1F1TUx1Sks4aENXSTBHZz09', 'https://drive.google.com/drive/folders/1D_buqiwadtiMjpz3HND-97DbgzSvUvrh?usp=sharing', '2021-08-22 08:36:19', '2021-08-22 08:36:19'),
(63, 'CSE 211', 'DLD', 3, 'Fatima Islam', '/images/user_28/image_28.png', 'cse211', '[]', 0, NULL, NULL, '2021-08-26 08:41:08', '2021-08-26 06:20:27');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

DROP TABLE IF EXISTS `materials`;
CREATE TABLE IF NOT EXISTS `materials` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_code` varchar(255) NOT NULL,
  `course_teacher` varchar(255) NOT NULL,
  `class_date` date NOT NULL,
  `drive_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `course_code`, `course_teacher`, `class_date`, `drive_link`, `created_at`, `updated_at`) VALUES
(16, 'CSE 113', 'Alfez Mayan', '2021-09-25', 'https://drive.google.com/drive/folders/1SpEAJ1BlH8yznPMhhnny6Neq7hNwaoXR?usp=sharing', NULL, NULL),
(15, 'CSE 115', 'Alfez Mayan', '2021-09-18', 'https://drive.google.com/drive/folders/1SpEAJ1BlH8yznPMhhnny6Neq7hNwaoXR', NULL, NULL),
(13, 'CSE 113', 'Alfez Mayan', '2021-09-24', 'https://drive.google.com/drive/folders/1E_E61gL72Jz6P0WJRalHkl1OXTrwaItp', NULL, NULL),
(12, 'CSE 113', 'Alfez Mayan', '2021-09-22', 'https://drive.google.com/drive/folders/1l-adD5kmYnYYosKLZ-Wj59buu-lnr7N2', NULL, NULL),
(11, 'CSE 113', 'Alfez Mayan', '2021-09-21', 'https://drive.google.com/drive/folders/12wz9qF137l-zVJ2JbaiPGb1aeBNpYGKQ', NULL, NULL),
(17, 'CSE 113', 'Alfez Mayan', '2021-09-30', 'https://drive.google.com/drive/folders/1SpEAJ1BlH8yznPMhhnny6Neq7hNwaoXR?usp=sharing', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_24_174258_create_courses_table', 1),
(5, '2021_08_09_134303_update_users_table', 2),
(7, '2021_08_12_145902_update_courses_table', 3),
(8, '2021_09_03_044029_create_comments_table', 3),
(9, '2021_09_03_044121_create_posts_table', 3),
(10, '2021_09_03_054231_add_last_login_to_users_table', 4),
(11, '2021_09_09_100916_create_notifications_table', 5),
(12, '2021_09_09_132637_create_notifications_table', 6),
(14, '2021_09_09_152930_create_notifications_table', 7),
(15, '2021_09_09_154647_update_notifications_table', 8),
(16, '2021_09_24_061731_create_materials_table', 9),
(17, '2021_09_26_160248_create_assignments_table', 10),
(18, '2021_10_03_083746_create_submitted_assignments_table', 11),
(19, '2021_10_05_060122_create_written_exams_table', 12),
(20, '2021_10_05_065812_create_submitted_answers_table', 13),
(22, '2021_10_08_184409_create_quizzes_table', 14),
(24, '2021_10_08_190705_create_submitted_quizzes_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

DROP TABLE IF EXISTS `notices`;
CREATE TABLE IF NOT EXISTS `notices` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `owner_image` varchar(255) DEFAULT NULL,
  `notifiable_type` varchar(255) DEFAULT NULL,
  `notifiable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notices_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `type`, `owner_image`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
(9, 'taskpost', '/images/user_20/image_20.png', NULL, NULL, 'Jerin Tasnim has added a new post', NULL, '2021-09-11 14:21:42', NULL),
(8, 'taskpost', '/images/user_22/image_22.png', NULL, NULL, 'Alfez Mayan has added a new post', NULL, '2021-09-11 14:20:18', NULL),
(6, 'taskpost', '/images/user_20/image_20.png', NULL, NULL, 'Jerin Tasnim has added a new post', NULL, '2021-09-11 14:17:04', NULL),
(7, 'taskpost', '/images/user_19/image_19.png', NULL, NULL, 'Ahnaf Mahin has added a new post', NULL, '2021-09-11 14:18:44', NULL),
(10, 'taskpost', '/images/user_22/image_22.png', NULL, NULL, 'Alfez Mayan has added a new post', NULL, '2021-09-11 14:35:57', NULL),
(11, 'taskpost', '/images/user_22/image_22.png', NULL, NULL, 'Alfez Mayan has added a new post', NULL, '2021-09-24 13:45:13', NULL),
(12, 'taskpost', '/images/user_22/image_22.png', NULL, NULL, 'Alfez Mayan has added a new post', NULL, '2021-10-14 08:05:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` varchar(2048) DEFAULT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `likes` json DEFAULT NULL,
  `comments` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `status`, `photo`, `likes`, `comments`, `user_id`, `created_at`, `updated_at`) VALUES
(36, 'Final defense date: 23rd October.', '/images/user_22/image_1634198759.jpeg', '[]', 0, 22, '2021-10-14 14:05:59', '2021-10-14 14:05:59'),
(34, 'Submit your application forms as soon as possible.', '', '[22, 19, 32, 28, 27, 18, 26, 25, 24]', 0, 22, '2021-09-11 20:35:57', '2021-09-11 15:23:44'),
(33, 'Join today\'s meeting at 2:30pm.', '', '[22, 19, 32, 28, 27, 24, 23]', 1, 20, '2021-09-11 20:21:42', '2021-09-11 15:20:14'),
(35, 'Pre-defense date: 25th September.', '/images/user_22/image_1632491113.jpg', '[22]', 0, 22, '2021-09-24 19:45:13', '2021-09-24 13:50:03'),
(32, 'CSE 113: Structure Programming Language, Assignment 1, Last Date: 25.09.2021(Saturday). Submission Link: https://docs.google.com/forms/d/e/1FAIpQLSfWJqES-CRhke6kVqRfsusIz3AKwOzFWF2_KKHTzF2moXAwFA/viewform?usp=sf_link', '', '[20, 19, 32, 27, 24, 23, 22]', 0, 22, '2021-09-11 20:20:18', '2021-09-25 02:21:30'),
(31, 'The importance of E-Learning education is that it is quick and does not require much cost. The long training period, infrastructure, stationery, travel expenses, etc. is reduced. Effectiveness of the transferred or imparted knowledge and learning is high and powerful. ... It promotes a self-paced learning process.', '/images/user_19/image_1631369924.png', '[20, 22, 19, 32, 28, 27, 24, 23, 18, 26, 25]', 0, 19, '2021-09-11 20:18:44', '2021-09-11 15:21:14'),
(30, 'CSE 213: Data Structure, Class Test 1, Date: 26.09.2021 (Sunday), Topic: Chapter 1, 2 & 3', '/images/user_20/image_1631369824.jpg', '[22, 19, 32, 28, 27, 24, 23, 18, 26, 25]', 3, 20, '2021-09-11 20:17:04', '2021-09-11 15:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

DROP TABLE IF EXISTS `quizzes`;
CREATE TABLE IF NOT EXISTS `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_code` varchar(255) NOT NULL,
  `course_teacher` varchar(255) NOT NULL,
  `quiz_date` date DEFAULT NULL,
  `quiz_start` time DEFAULT NULL,
  `quiz_end` time DEFAULT NULL,
  `quiz_topic` varchar(255) NOT NULL,
  `question_no` json NOT NULL,
  `question` json NOT NULL,
  `options` json NOT NULL,
  `answer` json NOT NULL,
  `marks` int(11) NOT NULL,
  `submitted_students` json DEFAULT NULL,
  `total_students` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `course_code`, `course_teacher`, `quiz_date`, `quiz_start`, `quiz_end`, `quiz_topic`, `question_no`, `question`, `options`, `answer`, `marks`, `submitted_students`, `total_students`, `created_at`, `updated_at`) VALUES
(2, 'CSE 113', 'Alfez Mayan', '2021-10-14', '16:40:00', '17:00:00', 'Quiz 01', '1', '[\"a=5; b=3; a=b; b=a; c=a+b; Find the vale of c.\", \"a=5; b=2; c=a%b; Find the vale of c.\", \"a=5; b=2; a++; b--; c=a+b; Find the vale of c.\", \"a=5; b=2; a++; b++; c=a+b; Find the vale of c.\", \"a=5; b=2; a--; b++; c=a-b; Find the vale of c.\", \"a=5; b=2; c=a/b; Find the vale of c.\", \"sum=0; for(i=0;i<10;i++){sum=sum+i;} Find the vale of sum.\", \"sum=50; for(i=0;i<10;i++){sum=sum-i;} Find the vale of sum.\", \"a=20; if(a%2==0){print(\\\"even\\\");} else{print(\\\"odd\\\");}\", \"Structure programming language example\", \"a=5; b=3; a=b; b=a; c=a+b; Find the vale of c.\", \"a=5; b=2; c=a%b; Find the vale of c.\", \"a=5; b=2; a++; b--; c=a+b; Find the vale of c.\", \"a=5; b=2; a++; b++; c=a+b; Find the vale of c.\", \"a=5; b=2; a--; b++; c=a-b; Find the vale of c.\", \"a=5; b=2; c=a/b; Find the vale of c.\", \"sum=0; for(i=0;i<10;i++){sum=sum+i;} Find the vale of sum.\", \"sum=50; for(i=0;i<10;i++){sum=sum-i;} Find the vale of sum.\", \"a=20; if(a%2==0){print(\\\"even\\\");} else{print(\\\"odd\\\");}\", \"Structure programming language example\"]', '[[\"5\"], [\"6\"], [\"8\"], [\"10\"], [\"1\"], [\"2\"], [\"0\"], [\"5\"], [\"5\"], [\"6\"], [\"7\"], [\"4\"], [\"8\"], [\"6\"], [\"7\"], [\"9\"], [\"2\"], [\"3\"], [\"1\"], [\"0\"], [\"0\"], [\"1\"], [\"2\"], [\"5\"], [\"10\"], [\"20\"], [\"35\"], [\"45\"], [\"5\"], [\"15\"], [\"25\"], [\"45\"], [\"odd\"], [\"even\"], [\"it\'s an error\"], [\"nothing will print\"], [\"C\"], [\"C++\"], [\"Java\"], [\"Ruby\"], [\"6\"], [\"8\"], [\"5\"], [\"10\"], [\"0\"], [\"1\"], [\"2\"], [\"5\"], [\"9\"], [\"6\"], [\"7\"], [\"8\"], [\"9\"], [\"7\"], [\"8\"], [\"6\"], [\"0\"], [\"3\"], [\"1\"], [\"2\"], [\"2\"], [\"1\"], [\"0\"], [\"error\"], [\"10\"], [\"45\"], [\"25\"], [\"30\"], [\"5\"], [\"15\"], [\"25\"], [\"45\"], [\"error\"], [\"odd\"], [\"even\"], [\"nothing will print\"], [\"C++\"], [\"Ruby\"], [\"C\"], [\"Java\"]]', '[\"6\", \"1\", \"7\", \"9\", \"1\", \"2\", \"45\", \"5\", \"even\", \"C\", \"6\", \"1\", \"7\", \"9\", \"1\", \"2\", \"45\", \"5\", \"even\", \"C\"]', 10, '[181472565, 172467591, 172452565]', 3, '2021-10-14 07:35:31', '2021-10-14 08:02:09'),
(3, 'CSE 113', 'Alfez Mayan', '2021-10-23', '09:10:00', '09:40:00', 'Quiz 02', '1', '[\"a=5; b=3; a=b; b=a; c=a+b; Find the vale of c.\", \"a=5; b=2; c=a%b; Find the vale of c.\", \"a=5; b=2; a++; b--; c=a+b; Find the vale of c.\", \"a=5; b=2; a++; b++; c=a+b; Find the vale of c.\", \"a=5; b=2; a--; b++; c=a-b; Find the vale of c.\", \"a=5; b=2; c=a/b; Find the vale of c.\", \"sum=0; for(i=0;i<10;i++){sum=sum+i;} Find the vale of sum.\", \"sum=50; for(i=0;i<10;i++){sum=sum-i;} Find the vale of sum.\", \"a=20; if(a%2==0){print(\\\"even\\\");} else{print(\\\"odd\\\");}\", \"Structure programming language example\", \"a=5; b=3; a=b; b=a; c=a+b; Find the vale of c.\", \"a=5; b=2; c=a%b; Find the vale of c.\", \"a=5; b=2; a++; b--; c=a+b; Find the vale of c.\", \"a=5; b=2; a++; b++; c=a+b; Find the vale of c.\", \"a=5; b=2; a--; b++; c=a-b; Find the vale of c.\", \"a=5; b=2; c=a/b; Find the vale of c.\", \"sum=0; for(i=0;i<10;i++){sum=sum+i;} Find the vale of sum.\", \"sum=50; for(i=0;i<10;i++){sum=sum-i;} Find the vale of sum.\", \"a=20; if(a%2==0){print(\\\"even\\\");} else{print(\\\"odd\\\");}\", \"Structure programming language example\"]', '[[\"5\"], [\"6\"], [\"8\"], [\"10\"], [\"1\"], [\"2\"], [\"0\"], [\"5\"], [\"5\"], [\"6\"], [\"7\"], [\"4\"], [\"8\"], [\"6\"], [\"7\"], [\"9\"], [\"2\"], [\"3\"], [\"1\"], [\"0\"], [\"0\"], [\"1\"], [\"2\"], [\"5\"], [\"10\"], [\"20\"], [\"35\"], [\"45\"], [\"5\"], [\"15\"], [\"25\"], [\"45\"], [\"odd\"], [\"even\"], [\"it\'s an error\"], [\"nothing will print\"], [\"C\"], [\"C++\"], [\"Java\"], [\"Ruby\"], [\"6\"], [\"8\"], [\"5\"], [\"10\"], [\"0\"], [\"1\"], [\"2\"], [\"5\"], [\"9\"], [\"6\"], [\"7\"], [\"8\"], [\"9\"], [\"7\"], [\"8\"], [\"6\"], [\"0\"], [\"3\"], [\"1\"], [\"2\"], [\"2\"], [\"1\"], [\"0\"], [\"error\"], [\"10\"], [\"45\"], [\"25\"], [\"30\"], [\"5\"], [\"15\"], [\"25\"], [\"45\"], [\"error\"], [\"odd\"], [\"even\"], [\"nothing will print\"], [\"C++\"], [\"Ruby\"], [\"C\"], [\"Java\"]]', '[\"6\", \"1\", \"7\", \"9\", \"1\", \"2\", \"45\", \"5\", \"even\", \"C\", \"6\", \"1\", \"7\", \"9\", \"1\", \"2\", \"45\", \"5\", \"even\", \"C\"]', 10, '[]', 0, '2021-10-19 07:20:46', '2021-10-19 07:20:46'),
(4, 'CSE 113', 'Alfez Mayan', NULL, NULL, NULL, 'Self Assessment 01', '1', '[\"a=5; b=3; a=b; b=a; c=a+b; Find the vale of c.\", \"a=5; b=2; c=a%b; Find the vale of c.\", \"a=5; b=2; a++; b--; c=a+b; Find the vale of c.\", \"a=5; b=2; a++; b++; c=a+b; Find the vale of c.\", \"a=5; b=2; a--; b++; c=a-b; Find the vale of c.\", \"a=5; b=2; c=a/b; Find the vale of c.\", \"sum=0; for(i=0;i<10;i++){sum=sum+i;} Find the vale of sum.\", \"sum=50; for(i=0;i<10;i++){sum=sum-i;} Find the vale of sum.\", \"a=20; if(a%2==0){print(\\\"even\\\");} else{print(\\\"odd\\\");}\", \"Structure programming language example\", \"a=5; b=3; a=b; b=a; c=a+b; Find the vale of c.\", \"a=5; b=2; c=a%b; Find the vale of c.\", \"a=5; b=2; a++; b--; c=a+b; Find the vale of c.\", \"a=5; b=2; a++; b++; c=a+b; Find the vale of c.\", \"a=5; b=2; a--; b++; c=a-b; Find the vale of c.\", \"a=5; b=2; c=a/b; Find the vale of c.\", \"sum=0; for(i=0;i<10;i++){sum=sum+i;} Find the vale of sum.\", \"sum=50; for(i=0;i<10;i++){sum=sum-i;} Find the vale of sum.\", \"a=20; if(a%2==0){print(\\\"even\\\");} else{print(\\\"odd\\\");}\", \"Structure programming language example\"]', '[[\"5\"], [\"6\"], [\"8\"], [\"10\"], [\"1\"], [\"2\"], [\"0\"], [\"5\"], [\"5\"], [\"6\"], [\"7\"], [\"4\"], [\"8\"], [\"6\"], [\"7\"], [\"9\"], [\"2\"], [\"3\"], [\"1\"], [\"0\"], [\"0\"], [\"1\"], [\"2\"], [\"5\"], [\"10\"], [\"20\"], [\"35\"], [\"45\"], [\"5\"], [\"15\"], [\"25\"], [\"45\"], [\"odd\"], [\"even\"], [\"it\'s an error\"], [\"nothing will print\"], [\"C\"], [\"C++\"], [\"Java\"], [\"Ruby\"], [\"6\"], [\"8\"], [\"5\"], [\"10\"], [\"0\"], [\"1\"], [\"2\"], [\"5\"], [\"9\"], [\"6\"], [\"7\"], [\"8\"], [\"9\"], [\"7\"], [\"8\"], [\"6\"], [\"0\"], [\"3\"], [\"1\"], [\"2\"], [\"2\"], [\"1\"], [\"0\"], [\"error\"], [\"10\"], [\"45\"], [\"25\"], [\"30\"], [\"5\"], [\"15\"], [\"25\"], [\"45\"], [\"error\"], [\"odd\"], [\"even\"], [\"nothing will print\"], [\"C++\"], [\"Ruby\"], [\"C\"], [\"Java\"]]', '[\"6\", \"1\", \"7\", \"9\", \"1\", \"2\", \"45\", \"5\", \"even\", \"C\", \"6\", \"1\", \"7\", \"9\", \"1\", \"2\", \"45\", \"5\", \"even\", \"C\"]', 10, '[181472565, 181472565]', 2, '2021-10-19 07:21:04', '2021-10-19 08:10:46');

-- --------------------------------------------------------

--
-- Table structure for table `submitted_answers`
--

DROP TABLE IF EXISTS `submitted_answers`;
CREATE TABLE IF NOT EXISTS `submitted_answers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) NOT NULL,
  `submitted_student` varchar(255) NOT NULL,
  `ans_file` varchar(255) NOT NULL,
  `marks` double(8,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `submitted_answers`
--

INSERT INTO `submitted_answers` (`id`, `topic`, `submitted_student`, `ans_file`, `marks`, `created_at`, `updated_at`) VALUES
(3, 'CSE 113: CT 01', '181472565 : Sabrina Sumona', '/files/Sabrina Sumona/CSE 113 CT 01.pdf', NULL, '2021-10-19 06:42:33', '2021-10-19 06:42:33'),
(4, 'CSE 113: CT 01', '231472789 : Jeba Fariha', '/files/Jeba Fariha/CSE 113 CT 01.pdf', NULL, '2021-10-19 06:47:15', '2021-10-19 06:47:15'),
(5, 'CSE 113: CT 01', '172467591 : Nabiha Nadia', '/files/Nabiha Nadia/CSE 113 CT 01.pdf', NULL, '2021-10-19 06:47:48', '2021-10-19 06:47:48'),
(6, 'CSE 113: CT 01', '172372455 : Afroza Kona', '/files/Afroza Kona/CSE 113 CT 01.pdf', NULL, '2021-10-19 06:48:12', '2021-10-19 06:48:12'),
(7, 'CSE 113: CT 01', '172452565 : Joarder Yousuf Basir', '/files/Joarder Yousuf Basir/CSE 113 CT 01.pdf', NULL, '2021-10-19 06:48:38', '2021-10-19 06:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `submitted_assignments`
--

DROP TABLE IF EXISTS `submitted_assignments`;
CREATE TABLE IF NOT EXISTS `submitted_assignments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) NOT NULL,
  `submitted_student` varchar(255) NOT NULL,
  `assignment_file` varchar(255) NOT NULL,
  `marks` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `submitted_assignments`
--

INSERT INTO `submitted_assignments` (`id`, `topic`, `submitted_student`, `assignment_file`, `marks`, `created_at`, `updated_at`) VALUES
(22, 'CSE 113: HW 01', '172467591 : Nabiha Nadia', '/files/Nabiha Nadia/CSE 113 HW 01.pdf', 5, '2021-10-19 05:59:54', '2021-10-19 05:59:54'),
(21, 'CSE 113: Assignment 01', '181472565 : Sabrina Sumona', '/files/Sabrina Sumona/CSE 113 Assignment 01.pdf', NULL, '2021-10-19 05:59:07', '2021-10-19 05:59:07'),
(20, 'CSE 113: HW 01', '181472565 : Sabrina Sumona', '/files/Sabrina Sumona/CSE 113 HW 01.pdf', 5, '2021-10-19 05:58:58', '2021-10-19 05:58:58'),
(23, 'CSE 113: HW 01', '231472789 : Jeba Fariha', '/files/Jeba Fariha/CSE 113 HW 01.pdf', 4.5, '2021-10-19 06:00:21', '2021-10-19 06:00:21'),
(24, 'CSE 113: HW 01', '172452565 : Joarder Yousuf Basir', '/files/Joarder Yousuf Basir/CSE 113 HW 01.pdf', 5, '2021-10-19 06:00:56', '2021-10-19 06:00:56'),
(25, 'CSE 113: HW 01', '172372455 : Afroza Kona', '/files/Afroza Kona/CSE 113 HW 01.pdf', 4, '2021-10-19 06:01:20', '2021-10-19 06:01:20');

-- --------------------------------------------------------

--
-- Table structure for table `submitted_quizzes`
--

DROP TABLE IF EXISTS `submitted_quizzes`;
CREATE TABLE IF NOT EXISTS `submitted_quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) NOT NULL,
  `submitted_student` varchar(255) NOT NULL,
  `marks` double(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `submitted_quizzes`
--

INSERT INTO `submitted_quizzes` (`id`, `topic`, `submitted_student`, `marks`, `created_at`, `updated_at`) VALUES
(5, 'CSE 113: Quiz 01', '172467591 : Nabiha Nadia', 8.00, '2021-10-14 07:58:41', '2021-10-14 07:58:41'),
(4, 'CSE 113: Quiz 01', '181472565 : Sabrina Sumona', 8.50, '2021-10-14 07:55:23', '2021-10-14 07:55:23'),
(6, 'CSE 113: Quiz 01', '172452565 : Joarder Yousuf Basir', 9.00, '2021-10-14 08:02:09', '2021-10-14 08:02:09'),
(7, 'CSE 113: Self Assessment 01', '181472565 : Sabrina Sumona', 8.50, '2021-10-19 08:06:34', '2021-10-19 08:06:34'),
(8, 'CSE 113: Self Assessment 01', '181472565 : Sabrina Sumona', 9.00, '2021-10-19 08:10:46', '2021-10-19 08:10:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `roll` int(11) NOT NULL,
  `mobile` varchar(14) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `courses` json DEFAULT NULL,
  `credit_hours` json DEFAULT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(100) NOT NULL,
  `is_regular` varchar(3) NOT NULL DEFAULT 'yes',
  `role` varchar(4) NOT NULL DEFAULT 'std',
  `remember_token` varchar(300) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_uname_unique` (`uname`),
  UNIQUE KEY `users_roll_unique` (`roll`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_mobile_unique` (`mobile`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `uname`, `roll`, `mobile`, `email`, `image`, `courses`, `credit_hours`, `email_verified_at`, `password`, `is_regular`, `role`, `remember_token`, `created_at`, `updated_at`, `last_login`) VALUES
(18, 'Sabrina Sumona', 'sabrina', 181472565, '01965808535', 'snsbauet04@gmail.com', '/images/user_18/image_18.jpg', '[\"CSE 113: SPL\", \"CSE 213: DS\", \"CSE 214: DS Lab\", \"CSE 215: Algorithm\", \"CSE 216: Algorithm Lab\", \"CSE 114: SPL Lab\"]', '[3, 3, 1.5, 3, 1.5, 1.5]', '2021-08-09 12:15:40', '$2y$10$24rCKTWBtpcVZTe.DvyFJedpUVHp34a/TrHbZX45XJN9Qgw6PtuLm', 'yes', 'std', 'NJmCmOlyRBH3mSFiWTHgZy5FcxdQTOJTL5hDPiXNeVVJ0BrQDNkPnmI958pr', '2021-08-09 06:15:40', '2021-10-26 15:10:48', '2021-10-26 15:10:48'),
(19, 'Ahnaf Mahin', 'ahnaf', 112233445, '01771234567', NULL, '/images/user_19/image_19.png', '[\"CSE 319: TOC.\", \"CSE 317: Computer Net.\", \"CSE 318: Computer Net. Lab\", \"CSE 417: AI\", \"CSE 418: AI Lab\", \"SE 407: WDBP\", \"SE 408: WDBP Lab\", \"CSE 231: NA \", \"CSE 232: NA Lab \"]', '[3, 3, 1.5, 3, 1.5, 3, 1.5, 3, 1.5]', '2021-08-09 13:23:46', '$2y$10$uE3xE0O5xDytmxrkbAqxfecMmrcZnDS16t06RtYGX08gpq85IVE92', 'yes', 'tchr', 'a1LIHwseGrY4CaEKRkrs6MxKvtmq7mZydhHYaod5j3ompxHmoDVIvzNXQRZN', '2021-08-09 07:23:46', '2021-10-08 01:04:41', '2021-10-08 01:04:41'),
(20, 'Jerin Tasnim', 'jerin', 112233446, '01967234590', NULL, '/images/user_20/image_20.png', '[\"CSE 215: Algorithm\", \"CSE 216: Algorithm Lab\", \"CSE 213: DS\", \"CSE 214: DS Lab\", \"CSE 325: SAD\", \"CSE 326: SAD Lab\", \"SE 403: SQA\", \"SE 404: SQA Lab\", \"SE 413: Int. & Int. Tech.\"]', '[3, 1.5, 3, 1.5, 3, 1.5, 3, 1.5, 3]', '2021-08-13 08:49:40', '$2y$10$7CzEC3V5Dz2TyNGt/jdeSOzqdfLKGK9nfD74YYeAsKVeHTJJjxvoK', 'yes', 'tchr', 'Sjh41AD03IvVhBc6sSYKDy8ubroxrmuBCR7RAzvz7gtorPgPbY1ze90LWoy2', '2021-08-13 02:49:40', '2021-09-24 02:44:49', '2021-09-24 02:44:49'),
(22, 'Alfez Mayan', 'alfez', 112233447, '01965808530', 'alhazmuslem45@gmail.com', '/images/user_22/image_22.png', '[\"CSE 113: SPL\", \"CSE 115: OOP\", \"CSE 116: OOP Lab\", \"CSE 415: SE\", \"CSE 416: SE Lab\", \"SE 409: Adv. Ent. Java\", \"SE 410: Adv. Ent. Java Lab\", \"CSE 413: CA\", \"CSE 114: SPL Lab\"]', '[3, 3, 1.5, 3, 1.5, 3, 1.5, 3, 1]', '2021-08-13 09:07:09', '$2y$10$CLOl6ptUyTIuGXS6I16AluzpWwqjAqvux4noOUZUczS0Ryy9rJMxK', 'yes', 'tchr', 'CE6SvpswEa3yv9UVnWCfaiEpigWBN480lrkcTYxGXSkFP9uDA5XoxBoZTHnK', '2021-08-13 03:07:09', '2021-10-23 04:54:08', '2021-10-23 04:54:08'),
(23, 'Jeba Fariha', 'jeba', 231472789, '01865808583', NULL, '/images/user_23/image_23.jpg', '[\"CSE 113: SPL\", \"CSE 114: SPL Lab\", \"CSE 213: DS\", \"CSE 214: DS Lab\", \"CSE 215: Algorithm\", \"CSE 216: Algorithm Lab\"]', '[3, 1.5, 3, 1.5, 3, 1.5]', '2021-08-13 09:16:02', '$2y$10$p5mVDbkxFCbBYzms7hsRuuGYU/FlLu7q4MYt5EjlVUDYvN9FcJRza', 'yes', 'std', NULL, '2021-08-13 03:16:02', '2021-10-19 06:47:16', '2021-10-19 06:47:16'),
(24, 'Nabiha Nadia', 'nova', 172467591, '01875808321', NULL, '/images/user_24/image_24.png', '[\"CSE 113: SPL\", \"CSE 114: SPL Lab\", \"CSE 213: DS\", \"CSE 214: DS Lab\", \"CSE 215: Algorithm\", \"CSE 216: Algorithm Lab\"]', '[3, 1.5, 3, 1.5, 3, 1.5]', '2021-08-13 09:33:57', '$2y$10$oO0Ophy0MeFHYyXYc9Z67uGDxo0pLLpzC5ENYfjeWl7nP48MbsEHu', 'yes', 'std', NULL, '2021-08-13 03:33:57', '2021-10-19 06:47:48', '2021-10-19 06:47:48'),
(25, 'Kaniz Fatema', 'tumpa', 172472568, '01640508168', NULL, '/images/user_25/image_25.jpg', '[]', '[]', '2021-08-15 09:14:52', '$2y$10$dwJaM9OGqwp0fI8ngIgpnO9ZB433osqeHvxuK8hrPdEQeEL9EGSye', 'yes', 'std', NULL, '2021-08-15 03:14:52', '2021-10-09 12:05:58', '2021-10-09 12:05:58'),
(26, 'Afroza Kona', 'kona', 172372455, '01787263123', NULL, '/images/user_26/image_26.png', '[\"CSE 113: SPL\", \"CSE 114: SPL Lab\", \"CSE 213: DS\", \"CSE 214: DS Lab\", \"CSE 215: Algorithm\", \"CSE 216: Algorithm Lab\"]', '[3, 1.5, 3, 1.5, 3, 1.5]', '2021-08-15 09:32:39', '$2y$10$txZD4CyDwu7WlIME3dWgMORrG/Uz5.EWtrUnTQoLz1B899FakFCOe', 'yes', 'std', NULL, '2021-08-15 03:32:39', '2021-10-19 06:48:12', '2021-10-19 06:48:12'),
(27, 'Joarder Yousuf Basir', 'gourab', 172452565, '01720246831', NULL, '/images/user_27/image_27.jpg', '[\"CSE 113: SPL\", \"CSE 114: SPL Lab\", \"CSE 213: DS\", \"CSE 214: DS Lab\", \"CSE 215: Algorithm\", \"CSE 216: Algorithm Lab\"]', '[3, 1.5, 3, 1.5, 3, 1.5]', '2021-08-15 09:52:00', '$2y$10$ORNheH9LFXEI1VPBXl/vpuZLHwwh7Jb1G/fWoVjj.iI0maqdIio7C', 'yes', 'std', NULL, '2021-08-15 03:52:00', '2021-10-19 06:48:38', '2021-10-19 06:48:38'),
(28, 'Fatima Islam', 'fatima', 112233449, '01234567854', NULL, '/images/user_28/image_28.png', '[\"CSE 411: DSD\", \"CSE 315:OS\", \"CSE 316: OS Lab\", \"CSE 311: DBMS\", \"CSE 312: DBMS Lab\", \"CSE 313: Data Com.\", \"CSE 323: Compiler Design\", \"SE 401: Com. Sim. & Mo.\", \"CSE 211: DLD\"]', '[3, 3, 1.5, 3, 1.5, 3, 3, 3, 3]', '2021-08-22 08:23:01', '$2y$10$3skWbf1XSR24gE8GA91RXO3jrzHuR9vVhqz33lMRcq18Y6D.Coy.e', 'yes', 'tchr', NULL, '2021-08-22 02:23:01', '2021-09-11 09:17:02', '2021-09-11 09:17:02'),
(32, 'Fabiha Rahman', 'fabiha', 1122445, '01165808444', NULL, NULL, NULL, NULL, '2021-09-01 19:15:08', '$2y$10$2iWkjv8zm/7LM7Kyua.EBOUxbte2vjnIbdx.0kAu0M.103QvjMhli', 'yes', 'tchr', NULL, '2021-09-01 13:15:08', '2021-09-11 09:16:03', '2021-09-11 09:16:03');

-- --------------------------------------------------------

--
-- Table structure for table `written_exams`
--

DROP TABLE IF EXISTS `written_exams`;
CREATE TABLE IF NOT EXISTS `written_exams` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_code` varchar(255) NOT NULL,
  `course_teacher` varchar(255) NOT NULL,
  `exam_date` date NOT NULL,
  `exam_start` time NOT NULL,
  `exam_end` time NOT NULL,
  `exam_topic` varchar(255) NOT NULL,
  `question_no` int(11) NOT NULL,
  `questions` varchar(255) NOT NULL,
  `marks` int(11) NOT NULL,
  `submitted_students` json DEFAULT NULL,
  `total_students` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `written_exams`
--

INSERT INTO `written_exams` (`id`, `course_code`, `course_teacher`, `exam_date`, `exam_start`, `exam_end`, `exam_topic`, `question_no`, `questions`, `marks`, `submitted_students`, `total_students`, `created_at`, `updated_at`) VALUES
(9, 'CSE 113', 'Alfez Mayan', '2021-11-06', '11:30:00', '12:00:00', 'Final', 6, '/files/Alfez Mayan/CSE 113 Final.pdf', 30, '[]', 0, '2021-10-19 06:12:17', '2021-10-19 06:12:17'),
(8, 'CSE 113', 'Alfez Mayan', '2021-10-30', '12:00:00', '13:00:00', 'Mid', 5, '/files/Alfez Mayan/CSE 113 Mid.pdf', 20, '[]', 0, '2021-10-19 06:11:30', '2021-10-19 06:11:30'),
(7, 'CSE 113', 'Alfez Mayan', '2021-10-23', '09:10:00', '09:30:00', 'CT 02', 3, '/files/Alfez Mayan/CSE 113 CT 02.pdf', 10, '[]', 0, '2021-10-19 06:10:40', '2021-10-19 06:10:40'),
(6, 'CSE 113', 'Alfez Mayan', '2021-10-19', '12:30:00', '01:00:00', 'CT 01', 3, '/files/Alfez Mayan/CSE 113 CT 01.pdf', 10, '[181472565, 231472789, 172467591, 172372455, 172452565]', 5, '2021-10-19 06:09:56', '2021-10-19 06:48:38'),
(10, 'SE 409', 'Alfez Mayan', '2021-10-27', '14:30:00', '15:00:00', 'CT 01 - Question 01', 1, '/files/Alfez Mayan/CSE 113 CT 01 - Question 01.png', 5, '[]', 0, '2021-10-20 08:55:19', '2021-10-20 08:55:19'),
(11, 'SE 409', 'Alfez Mayan', '2021-10-27', '14:30:00', '15:00:00', 'CT 01 - Question 02', 1, '/files/Alfez Mayan/SE 409 CT 01 - Question 02.png', 5, NULL, 0, '2021-10-20 08:58:44', '2021-10-20 08:58:44'),
(12, 'SE 409', 'Alfez Mayan', '2021-10-27', '14:30:00', '15:00:00', 'CT 01 - Question 03', 1, '/files/Alfez Mayan/SE 409 CT 01 - Question 03.png', 5, NULL, 0, '2021-10-20 08:59:27', '2021-10-20 08:59:27');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
