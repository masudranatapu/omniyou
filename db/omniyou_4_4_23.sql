-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2023 at 07:41 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omniyou`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) NOT NULL,
  `code` int(10) NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `worker_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `order_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `code`, `name`, `email`, `phone`, `address`, `worker_id`, `created_at`, `updated_at`, `status`, `order_id`) VALUES
(1, 101, 'Mokaddes Hosain', 'mr.mokaddes@gmail.com', '01750899447', 'Address', NULL, '2022-10-18 04:10:37', '2022-10-18 23:37:21', 1, 2),
(2, 102, 'Nahid Hasan', 'nahid@gmail.com', '01750899448', 'Rajshhsi', 15, '2022-10-18 06:02:19', NULL, 1, 3),
(3, 103, 'Mkds Hsn', 'mkds@gmail.com', '01754564564564', 'Asadjkbhsa', NULL, '2022-10-18 05:19:05', NULL, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `clients_survey`
--

CREATE TABLE `clients_survey` (
  `id` int(10) NOT NULL,
  `survey_id` int(10) DEFAULT NULL,
  `client_id` int(10) DEFAULT NULL,
  `worker_id` int(10) DEFAULT NULL COMMENT 'from users table',
  `date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 1 COMMENT '0=inactive,1=waiting for start,2=running,3=complete,4=closed',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients_survey`
--

INSERT INTO `clients_survey` (`id`, `survey_id`, `client_id`, `worker_id`, `date`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(11, 1, 2, 4, '2023-04-04 00:00:00', 1, '2023-04-04 04:40:59', 1, NULL, NULL),
(12, 1, 3, 4, '2023-04-04 00:00:00', 1, '2023-04-04 04:41:00', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients_survey_questions`
--

CREATE TABLE `clients_survey_questions` (
  `id` int(10) NOT NULL,
  `clients_survey_id` int(10) DEFAULT NULL,
  `quiz_question_id` int(10) DEFAULT NULL,
  `quiz_question` varchar(255) DEFAULT NULL,
  `question_type` int(11) NOT NULL DEFAULT 1,
  `question_options` text DEFAULT NULL COMMENT 'json',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients_survey_questions`
--

INSERT INTO `clients_survey_questions` (`id`, `clients_survey_id`, `quiz_question_id`, `quiz_question`, `question_type`, `question_options`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(19, 11, 25, 'How do you wanna make Magic?', 1, '[{\"answer_option\":\"No, I only knew what contemporary art is after I arrived.\"},{\"answer_option\":\"Yes, I had internet access.\"},{\"answer_option\":\"What art again? ah, yes I am a contemporary artist!\"},{\"answer_option\":\"Yes, where I come from there are artists who work on contemporary issues.\"}]', '2023-04-04 04:40:59', 1, NULL, NULL),
(20, 11, 27, 'How can we create in chaos?', 1, '[{\"answer_option\":\"What art again? ah, yes I am a contemporary artist!\"},{\"answer_option\":\"No, I only knew what contemporary art is after I arrived.\"},{\"answer_option\":\"Yes, I had internet access.\"},{\"answer_option\":\"Yes, where I come from there are artists who work on contemporary issues.\"}]', '2023-04-04 04:40:59', 1, NULL, NULL),
(21, 11, 29, 'Do you also feel that the university made you lose a part of yourself? can you tell me how?', 1, '[{\"answer_option\":\"What art again? ah, yes I am a contemporary artist!\"},{\"answer_option\":\"No, I only knew what contemporary art is after I arrived.\"},{\"answer_option\":\"Yes, where I come from there are artists who work on contemporary issues.\"},{\"answer_option\":\"Yes, I had internet access.\"}]', '2023-04-04 04:40:59', 1, NULL, NULL),
(22, 11, 31, 'Shall we forget our backgrounds?', 1, '[{\"answer_option\":\"Yes, where I come from there are artists who work on contemporary issues.\"},{\"answer_option\":\"Yes, I had internet access.\"},{\"answer_option\":\"What art again? ah, yes I am a contemporary artist!\"},{\"answer_option\":\"No, I only knew what contemporary art is after I arrived.\"}]', '2023-04-04 04:40:59', 1, NULL, NULL),
(23, 11, 33, 'are we running on the same time? who should hurry up/wait? how long?', 1, '[{\"answer_option\":\"What art again? ah, yes I am a contemporary artist!\"},{\"answer_option\":\"Yes, where I come from there are artists who work on contemporary issues.\"},{\"answer_option\":\"Yes, I had internet access.\"},{\"answer_option\":\"No, I only knew what contemporary art is after I arrived.\"}]', '2023-04-04 04:40:59', 1, NULL, NULL),
(24, 11, 35, 'what is, who is messing in this space?', 1, '[{\"answer_option\":\"What art again? ah, yes I am a contemporary artist!\"},{\"answer_option\":\"Yes, I had internet access.\"},{\"answer_option\":\"Yes, where I come from there are artists who work on contemporary issues.\"},{\"answer_option\":\"No, I only knew what contemporary art is after I arrived.\"}]', '2023-04-04 04:40:59', 1, NULL, NULL),
(25, 12, 25, 'How do you wanna make Magic?', 1, '[{\"answer_option\":\"No, I only knew what contemporary art is after I arrived.\"},{\"answer_option\":\"Yes, I had internet access.\"},{\"answer_option\":\"What art again? ah, yes I am a contemporary artist!\"},{\"answer_option\":\"Yes, where I come from there are artists who work on contemporary issues.\"}]', '2023-04-04 04:41:00', 1, NULL, NULL),
(26, 12, 27, 'How can we create in chaos?', 1, '[{\"answer_option\":\"What art again? ah, yes I am a contemporary artist!\"},{\"answer_option\":\"No, I only knew what contemporary art is after I arrived.\"},{\"answer_option\":\"Yes, I had internet access.\"},{\"answer_option\":\"Yes, where I come from there are artists who work on contemporary issues.\"}]', '2023-04-04 04:41:00', 1, NULL, NULL),
(27, 12, 29, 'Do you also feel that the university made you lose a part of yourself? can you tell me how?', 1, '[{\"answer_option\":\"What art again? ah, yes I am a contemporary artist!\"},{\"answer_option\":\"No, I only knew what contemporary art is after I arrived.\"},{\"answer_option\":\"Yes, where I come from there are artists who work on contemporary issues.\"},{\"answer_option\":\"Yes, I had internet access.\"}]', '2023-04-04 04:41:00', 1, NULL, NULL),
(28, 12, 31, 'Shall we forget our backgrounds?', 1, '[{\"answer_option\":\"Yes, where I come from there are artists who work on contemporary issues.\"},{\"answer_option\":\"Yes, I had internet access.\"},{\"answer_option\":\"What art again? ah, yes I am a contemporary artist!\"},{\"answer_option\":\"No, I only knew what contemporary art is after I arrived.\"}]', '2023-04-04 04:41:00', 1, NULL, NULL),
(29, 12, 33, 'are we running on the same time? who should hurry up/wait? how long?', 1, '[{\"answer_option\":\"What art again? ah, yes I am a contemporary artist!\"},{\"answer_option\":\"Yes, where I come from there are artists who work on contemporary issues.\"},{\"answer_option\":\"Yes, I had internet access.\"},{\"answer_option\":\"No, I only knew what contemporary art is after I arrived.\"}]', '2023-04-04 04:41:00', 1, NULL, NULL),
(30, 12, 35, 'what is, who is messing in this space?', 1, '[{\"answer_option\":\"What art again? ah, yes I am a contemporary artist!\"},{\"answer_option\":\"Yes, I had internet access.\"},{\"answer_option\":\"Yes, where I come from there are artists who work on contemporary issues.\"},{\"answer_option\":\"No, I only knew what contemporary art is after I arrived.\"}]', '2023-04-04 04:41:00', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 1,
  `order_id` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `status`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 'Bangla', 1, 1, '2022-09-28 02:55:28', NULL),
(2, 'English', 1, 2, '2022-09-28 02:53:18', NULL),
(3, 'History', 1, 3, '2022-10-02 05:59:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interview_users`
--

CREATE TABLE `interview_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(10) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` int(10) DEFAULT NULL,
  `attempt` int(10) DEFAULT NULL,
  `status` int(2) DEFAULT NULL COMMENT '1 = Passed\r\n2 = failed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interview_users`
--

INSERT INTO `interview_users` (`id`, `student_id`, `name`, `email`, `course_id`, `attempt`, `status`, `created_at`, `updated_at`) VALUES
(90, 3, 'user', 'user@gmail.com', 2, 5, 1, '2022-10-15 00:14:32', '2022-10-15 00:56:31'),
(89, 3, 'user', 'user@gmail.com', 1, 8, NULL, '2022-10-15 00:05:47', '2022-10-15 01:08:20'),
(91, 3, 'user', 'user@gmail.com', 3, 2, NULL, '2022-10-15 01:06:14', '2022-10-15 01:08:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_answers`
--

CREATE TABLE `quiz_answers` (
  `id` int(10) NOT NULL,
  `question_no` int(11) DEFAULT NULL,
  `option_no` int(11) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_answers`
--

INSERT INTO `quiz_answers` (`id`, `question_no`, `option_no`, `answer`, `created_at`, `updated_at`) VALUES
(16, 43, 84, 'I enjoy telling others about my views', '2022-04-26 09:19:46', '2022-09-28 00:50:51'),
(17, 42, 80, 'im intrested in the way you teach', '2022-04-26 09:20:03', '2022-04-26 09:20:03'),
(18, 41, 77, 'no I started here', '2022-04-26 09:20:49', '2022-04-26 09:20:49'),
(19, 40, 74, 'no we studied European art history as well', '2022-04-26 09:20:57', '2022-04-26 09:20:57'),
(20, 39, 68, 'i always wanted to be an artist', '2022-04-26 09:21:33', '2022-04-26 09:21:33'),
(21, 38, 64, 'age doesn\'t matter', '2022-04-26 09:21:44', '2022-04-26 09:21:44'),
(22, 37, 62, 'I convinced them', '2022-04-26 09:21:53', '2022-04-26 09:21:53'),
(23, 36, 56, 'No, I only knew what contemporary art is after I arrived.', '2022-04-26 09:22:13', '2022-04-26 09:22:13'),
(24, 44, 89, 'Mokaddes Hosain', '2022-09-28 07:12:54', '2022-09-28 07:12:54'),
(25, 35, 92, 'What art again? ah, yes I am a contemporary artist!', '2022-10-11 22:58:23', '2022-10-11 22:58:23'),
(26, 34, 97, 'Yes, I had internet access.', '2022-10-11 22:58:41', '2022-10-11 22:58:41'),
(27, 33, 100, 'What art again? ah, yes I am a contemporary artist!', '2022-10-11 23:03:37', '2022-10-11 23:03:37'),
(28, 32, 105, 'Yes, where I come from there are artists who work on contemporary issues.', '2022-10-11 23:03:42', '2022-10-11 23:03:42'),
(29, 31, 110, 'What art again? ah, yes I am a contemporary artist!', '2022-10-11 23:03:47', '2022-10-11 23:03:47'),
(30, 30, 115, 'Yes, where I come from there are artists who work on contemporary issues.', '2022-10-11 23:03:51', '2022-10-11 23:03:51'),
(31, 29, 116, 'What art again? ah, yes I am a contemporary artist!', '2022-10-11 23:03:58', '2022-10-11 23:03:58'),
(32, 28, 121, 'What art again? ah, yes I am a contemporary artist!', '2022-10-11 23:04:02', '2022-10-11 23:04:02'),
(33, 27, 126, 'Yes, I had internet access.', '2022-10-11 23:04:07', '2022-10-11 23:04:07'),
(34, 26, 130, 'No, I only knew what contemporary art is after I arrived.', '2022-10-11 23:04:11', '2022-10-11 23:04:11'),
(35, 25, 134, 'What art again? ah, yes I am a contemporary artist!', '2022-10-11 23:04:16', '2022-10-11 23:04:16');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_options`
--

CREATE TABLE `quiz_options` (
  `id` int(11) NOT NULL,
  `question_no` int(11) DEFAULT NULL,
  `answer_option` varchar(255) DEFAULT NULL,
  `order_id` int(2) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_options`
--

INSERT INTO `quiz_options` (`id`, `question_no`, `answer_option`, `order_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(3, 2, 'Lorem Ipsum is simply dummy text', 0, '2022-04-22 00:00:00', 2, '2022-04-22 00:00:00', 1),
(56, 36, 'No, I only knew what contemporary art is after I arrived.', 0, '2022-04-26 00:00:00', 2, '2022-04-26 00:00:00', 1),
(57, 36, 'Yes, where I come from there are artists who work on contemporary issues.', 1, '2022-04-26 00:00:00', 2, '2022-04-26 00:00:00', 1),
(58, 36, 'Yes, I had internet access.', 2, '2022-04-26 00:00:00', 2, '2022-04-26 00:00:00', 1),
(59, 36, 'What art again? ah, yes I am a contemporary artist!', 3, '2022-04-26 00:00:00', 2, '2022-04-26 00:00:00', 1),
(60, 37, 'no', 0, '2022-04-26 00:00:00', 2, '2022-04-26 00:00:00', 1),
(61, 37, 'they\'re supportive', 1, '2022-04-26 00:00:00', 2, '2022-04-26 00:00:00', 1),
(62, 37, 'I convinced them', 2, '2022-04-26 00:00:00', 2, '2022-04-26 00:00:00', 1),
(63, 37, 'they don\'t care', 3, '2022-04-26 00:00:00', 2, '2022-04-26 00:00:00', 1),
(64, 38, 'age doesn\'t matter', 0, '2022-04-26 00:00:00', 2, '2022-04-26 00:00:00', 1),
(65, 38, 'I\'m not here for dating', 1, '2022-04-26 00:00:00', 2, '2022-04-26 00:00:00', 1),
(66, 38, 'why do i have to get along?', 2, '2022-04-26 00:00:00', 2, '2022-04-26 00:00:00', 1),
(67, 38, 'young people love me!', 3, '2022-04-26 00:00:00', 2, '2022-04-26 00:00:00', 1),
(68, 39, 'i always wanted to be an artist', 69, '2023-04-04 00:00:00', 2, '2023-04-04 00:00:00', 1),
(69, 39, 'new life, new opportunities', 70, '2023-04-04 00:00:00', 2, '2023-04-04 00:00:00', 1),
(70, 39, 'why not?', 71, '2023-04-04 00:00:00', 2, '2023-04-04 00:00:00', 1),
(71, 39, 'I haven\'t thought about it before.', 72, '2023-04-04 00:00:00', 2, '2023-04-04 00:00:00', 1),
(72, 40, 'yes, it wasn\'t recognized by the school.', 0, '2022-04-26 00:00:00', 2, '2022-04-26 00:00:00', 1),
(73, 40, 'only ancient art history', 1, '2022-04-26 00:00:00', 2, '2022-04-26 00:00:00', 1),
(74, 40, 'no we studied European art history as well', 2, '2022-04-26 00:00:00', 2, '2022-04-26 00:00:00', 1),
(75, 40, 'our art histories has been destroyed.', 3, '2022-04-26 00:00:00', 2, '2022-04-26 00:00:00', 1),
(76, 41, 'yes I did', 0, '2022-04-26 00:00:00', 2, '2022-04-26 00:00:00', 1),
(77, 41, 'no I started here', 1, '2022-04-26 00:00:00', 2, '2022-04-26 00:00:00', 1),
(78, 41, 'I was not even allowed to draw', 2, '2022-04-26 00:00:00', 2, '2022-04-26 00:00:00', 1),
(79, 41, 'I dont know', 3, '2022-04-26 00:00:00', 2, '2022-04-26 00:00:00', 1),
(80, 42, 'im intrested in the way you teach', 0, '2022-04-26 00:00:00', 2, '2022-04-26 00:00:00', 1),
(81, 42, 'to overcome a social hierarchy this system put me in', 1, '2022-04-26 00:00:00', 2, '2022-04-26 00:00:00', 1),
(82, 42, 'it\'s not far away from where I live', 2, '2022-04-26 00:00:00', 2, '2022-04-26 00:00:00', 1),
(83, 42, 'I have a few friends here', 3, '2022-04-26 00:00:00', 2, '2022-04-26 00:00:00', 1),
(84, 43, 'I enjoy telling others about my views', 85, '2023-04-04 00:00:00', 2, '2023-04-04 00:00:00', 1),
(85, 43, 'I have better things to take care of', 86, '2023-04-04 00:00:00', 2, '2023-04-04 00:00:00', 1),
(86, 43, 'not sure', 87, '2023-04-04 00:00:00', 2, '2023-04-04 00:00:00', 1),
(87, 43, 'I enjoy such dialogues', 88, '2023-04-04 00:00:00', 2, '2023-04-04 00:00:00', 1),
(88, 44, 'Mikaddes', 0, '2022-09-28 00:00:00', 2, '2022-09-28 00:00:00', 1),
(89, 44, 'Mokaddes Hosain', 1, '2022-09-28 00:00:00', 2, '2022-09-28 00:00:00', 1),
(90, 44, 'Hosain', 2, '2022-09-28 00:00:00', 2, '2022-09-28 00:00:00', 1),
(91, 44, 'Mkds', 3, '2022-09-28 00:00:00', 2, '2022-09-28 00:00:00', 1),
(92, 35, 'What art again? ah, yes I am a contemporary artist!', 0, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(93, 35, 'Yes, I had internet access.', 1, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(94, 35, 'Yes, where I come from there are artists who work on contemporary issues.', 2, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(95, 35, 'No, I only knew what contemporary art is after I arrived.', 3, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(96, 34, 'What art again? ah, yes I am a contemporary artist!', 0, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(97, 34, 'Yes, I had internet access.', 1, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(98, 34, 'Yes, where I come from there are artists who work on contemporary issues.', 2, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(99, 34, 'No, I only knew what contemporary art is after I arrived.', 3, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(100, 33, 'What art again? ah, yes I am a contemporary artist!', 0, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(101, 33, 'Yes, where I come from there are artists who work on contemporary issues.', 1, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(102, 33, 'Yes, I had internet access.', 2, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(103, 33, 'No, I only knew what contemporary art is after I arrived.', 3, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(104, 32, 'No, I only knew what contemporary art is after I arrived.', 0, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(105, 32, 'Yes, where I come from there are artists who work on contemporary issues.', 1, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(106, 32, 'Yes, I had internet access.', 2, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(107, 32, 'What art again? ah, yes I am a contemporary artist!', 3, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(108, 31, 'Yes, where I come from there are artists who work on contemporary issues.', 0, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(109, 31, 'Yes, I had internet access.', 1, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(110, 31, 'What art again? ah, yes I am a contemporary artist!', 2, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(111, 31, 'No, I only knew what contemporary art is after I arrived.', 3, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(112, 30, 'Yes, I had internet access.', 0, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(113, 30, 'What art again? ah, yes I am a contemporary artist!', 1, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(114, 30, 'No, I only knew what contemporary art is after I arrived.', 2, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(115, 30, 'Yes, where I come from there are artists who work on contemporary issues.', 3, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(116, 29, 'What art again? ah, yes I am a contemporary artist!', 0, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(117, 29, 'No, I only knew what contemporary art is after I arrived.', 1, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(118, 29, 'Yes, where I come from there are artists who work on contemporary issues.', 2, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(119, 29, 'Yes, I had internet access.', 3, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(120, 28, 'Yes, I had internet access.', 0, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(121, 28, 'What art again? ah, yes I am a contemporary artist!', 1, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(122, 28, 'No, I only knew what contemporary art is after I arrived.', 2, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(123, 28, 'Yes, where I come from there are artists who work on contemporary issues.', 3, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(124, 27, 'What art again? ah, yes I am a contemporary artist!', 0, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(125, 27, 'No, I only knew what contemporary art is after I arrived.', 1, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(126, 27, 'Yes, I had internet access.', 2, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(127, 27, 'Yes, where I come from there are artists who work on contemporary issues.', 3, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(128, 26, 'What art again? ah, yes I am a contemporary artist!', 0, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(129, 26, 'Yes, I had internet access.', 1, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(130, 26, 'No, I only knew what contemporary art is after I arrived.', 2, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(131, 26, 'Yes, where I come from there are artists who work on contemporary issues.', 3, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(132, 25, 'No, I only knew what contemporary art is after I arrived.', 0, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(133, 25, 'Yes, I had internet access.', 1, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(134, 25, 'What art again? ah, yes I am a contemporary artist!', 2, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1),
(135, 25, 'Yes, where I come from there are artists who work on contemporary issues.', 3, '2022-10-12 00:00:00', 2, '2022-10-12 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `id` int(10) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `course_id` int(11) NOT NULL DEFAULT 1,
  `status` int(11) DEFAULT 1 COMMENT '1=active,0=inactive',
  `order_id` int(10) NOT NULL DEFAULT 0 COMMENT ' for ordering ',
  `question_type` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`id`, `question`, `course_id`, `status`, `order_id`, `question_type`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(24, 'What role would you like to play with us?', 3, 0, 1, 1, NULL, NULL, NULL, NULL),
(25, 'How do you wanna make Magic?', 3, 1, 2, 1, NULL, NULL, NULL, NULL),
(26, 'How to be a collective?', 3, 1, 3, 1, NULL, NULL, NULL, NULL),
(27, 'How can we create in chaos?', 3, 1, 4, 1, NULL, NULL, NULL, NULL),
(28, 'Can we abandon the school together and keep learning?', 3, 1, 5, 1, NULL, NULL, NULL, NULL),
(29, 'Do you also feel that the university made you lose a part of yourself? can you tell me how?', 3, 1, 6, 1, NULL, NULL, NULL, NULL),
(30, 'Can we abandon labor and survive?', 3, 1, 7, 1, NULL, NULL, NULL, NULL),
(31, 'Shall we forget our backgrounds?', 3, 1, 8, 1, NULL, NULL, NULL, NULL),
(32, 'Are you ready for another knowledge?', 3, 1, 9, 1, NULL, NULL, NULL, NULL),
(33, 'are we running on the same time? who should hurry up/wait? how long?', 3, 1, 10, 1, NULL, NULL, NULL, NULL),
(34, 'Do you really think we are living in a divers culture?', 3, 1, 11, 1, NULL, NULL, NULL, NULL),
(35, 'what is, who is messing in this space?', 3, 1, 12, 1, NULL, NULL, NULL, NULL),
(36, 'Have you encountered a contemporary artwork before arriving to this country?', 1, 1, 1, 1, NULL, NULL, NULL, NULL),
(37, 'do your parents agree that you should study art?', 1, 1, 2, 1, NULL, NULL, NULL, NULL),
(38, 'you seem old for an art student, how will you get along with our younger students?', 1, 1, 3, 1, NULL, NULL, NULL, NULL),
(39, 'why did you decide to become an artist now?', 1, 1, 4, 1, NULL, NULL, NULL, NULL),
(40, 'Do you have an art history?', 1, 1, 5, 1, NULL, NULL, NULL, NULL),
(41, 'Did you draw figures before coming?', 1, 1, 6, 1, NULL, NULL, NULL, NULL),
(42, 'Why did you apply to our school?', 1, 1, 7, 1, NULL, NULL, NULL, NULL),
(43, 'Do like to engage in dialogues like (identity, community, nationality)?', 1, 1, 8, 1, NULL, NULL, NULL, NULL),
(44, 'what is your name?', 2, 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `course_id` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `course_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mokaddes', 'mr.mokaddes@gmail.com', '[\"1\",\"2\",\"3\"]', 1, '2022-10-11 22:55:38', NULL),
(2, 'mkds', 'mail@emil.com', '[\"1\",\"2\"]', 1, '2022-09-28 04:00:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `id` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 1 COMMENT '1=active,0=inactive',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `question_ids` text DEFAULT NULL COMMENT 'json data (ids)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`id`, `name`, `date`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `question_ids`) VALUES
(1, 'Survey 2022', '2022-10-20 00:00:00', 1, '2022-10-20 06:32:02', 1, NULL, NULL, '[\"25\",\"27\",\"29\",\"31\",\"33\",\"35\"]'),
(2, 'Best Friend', '2023-04-20 00:00:00', 1, '2023-04-04 04:38:31', 1, NULL, NULL, '[\"33\",\"34\",\"35\",\"37\",\"38\"]');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` int(10) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'worker',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `str_pass` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `running_survey_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `code`, `name`, `email`, `image`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `client_id`, `status`, `str_pass`, `running_survey_id`) VALUES
(1, 0, 'Admin', 'admin@gmail.com', NULL, 'admin', NULL, '$2y$10$fUOHFnHy6eDMZorptwomheHmwgGg8ed7tM63tn.aHoDxleqbLUJ1i', NULL, NULL, '2022-10-12 00:23:56', NULL, 1, NULL, NULL),
(4, 1001, 'Mokaddes', 'mr.mokaddes@gmail.com', NULL, 'worker', NULL, '$2y$10$KLeLAv4Q15/c.TExS12YyuB2qph1mlyiS71x9jsSagIVzh7dXYihq', 'uytSDbSu39FUsYut4M0L3L7b8AdvJxGjJdTKfxWe75LmbUckwSABnSh1VPcj', '2023-04-03 23:33:14', '2022-10-14 22:50:21', 'null', 1, 'cdvEEITs', 1),
(5, 1002, 'Muddassir Hoasin', 'muddassir@gmail.com', NULL, 'worker', NULL, '$2y$10$.TtyvLIJ7AiDUqEKnpmHFuqOcHICqBESvs1W0Ej8oiqsyDDvtBJtG', NULL, '2022-10-20 01:27:33', NULL, 'null', 1, '6ltS3He3', 1),
(8, 1003, 'Mkds', 'mkds@gmail.com', NULL, 'worker', NULL, '$2y$10$oT5Ehu2cxQkKKecDUUouA.o8gui1FV13GXZzo0W2/hczdDcJOiSYe', NULL, '2022-10-20 01:19:55', NULL, 'null', 1, 'Bv4FsKKO', NULL),
(9, 1004, 'Abdur Rahim', 'rahim@gmail.com', NULL, 'worker', NULL, '$2y$10$S.Gvo2d7ga57CZCFFHf6eO/c3ZG2MrYhBQoRGIliFnjQcsDuUmDyC', NULL, '2022-10-18 23:36:37', NULL, 'null', 1, 'lPSFrhu3', NULL),
(15, 1005, 'Alif Hosain', 'alif@gmail.com', NULL, 'worker', NULL, '$2y$10$rYdl0BPoCXT6CpoKnz4Nc.YSzhSREci/zcBTZinMsuFOc.iSqmLla', NULL, '2022-10-18 23:35:17', NULL, 'null', 1, 'CZCkjhJl', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_correct_ans`
--

CREATE TABLE `user_correct_ans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `interview_user_id` int(10) UNSIGNED NOT NULL,
  `quiz_course_id` int(10) DEFAULT NULL,
  `quiz_attempt` int(11) DEFAULT NULL,
  `quiz_question_id` bigint(20) UNSIGNED NOT NULL,
  `quiz_answer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_correct_ans`
--

INSERT INTO `user_correct_ans` (`id`, `interview_user_id`, `quiz_course_id`, `quiz_attempt`, `quiz_question_id`, `quiz_answer_id`, `created_at`, `updated_at`) VALUES
(147, 3, 1, 2, 36, 56, '2022-10-15 00:09:36', '2022-10-15 00:09:36'),
(146, 3, 1, 1, 40, 74, '2022-10-15 00:08:50', '2022-10-15 00:08:50'),
(145, 3, 1, 1, 37, 62, '2022-10-15 00:08:38', '2022-10-15 00:08:38'),
(148, 3, 1, 2, 39, 68, '2022-10-15 00:09:54', '2022-10-15 00:09:54'),
(149, 3, 1, 2, 41, 77, '2022-10-15 00:10:14', '2022-10-15 00:10:14'),
(150, 3, 1, 2, 43, 84, '2022-10-15 00:10:25', '2022-10-15 00:10:25'),
(151, 3, 2, 1, 44, 89, '2022-10-15 00:14:35', '2022-10-15 00:14:35'),
(152, 3, 1, 1, 38, 64, '2022-10-15 00:20:28', '2022-10-15 00:20:28'),
(153, 3, 1, 1, 42, 80, '2022-10-15 00:20:43', '2022-10-15 00:20:43'),
(154, 3, 2, 4, 44, 89, '2022-10-15 00:46:03', '2022-10-15 00:46:03'),
(155, 3, 2, 5, 44, 89, '2022-10-15 00:47:39', '2022-10-15 00:47:39'),
(156, 3, 1, 5, 40, 74, '2022-10-15 01:01:17', '2022-10-15 01:01:17'),
(157, 3, 1, 5, 41, 77, '2022-10-15 01:01:20', '2022-10-15 01:01:20'),
(158, 3, 1, 5, 37, 62, '2022-10-15 01:04:55', '2022-10-15 01:04:55'),
(159, 3, 1, 5, 39, 68, '2022-10-15 01:05:06', '2022-10-15 01:05:06'),
(160, 3, 1, 5, 41, 77, '2022-10-15 01:05:23', '2022-10-15 01:05:23'),
(161, 3, 1, 5, 42, 80, '2022-10-15 01:05:28', '2022-10-15 01:05:28'),
(162, 3, 1, 5, 43, 84, '2022-10-15 01:05:34', '2022-10-15 01:05:34'),
(163, 3, 1, 5, 36, 56, '2022-10-15 01:05:48', '2022-10-15 01:05:48'),
(164, 3, 1, 5, 37, 62, '2022-10-15 01:05:52', '2022-10-15 01:05:52'),
(165, 3, 1, 5, 39, 68, '2022-10-15 01:05:57', '2022-10-15 01:05:57'),
(166, 3, 1, 5, 43, 84, '2022-10-15 01:06:09', '2022-10-15 01:06:09'),
(167, 3, 3, 5, 27, 126, '2022-10-15 01:06:23', '2022-10-15 01:06:23'),
(168, 3, 3, 5, 29, 116, '2022-10-15 01:06:29', '2022-10-15 01:06:29'),
(169, 3, 3, 5, 31, 110, '2022-10-15 01:06:35', '2022-10-15 01:06:35'),
(170, 3, 3, 5, 33, 100, '2022-10-15 01:06:41', '2022-10-15 01:06:41'),
(171, 3, 3, 5, 34, 97, '2022-10-15 01:06:43', '2022-10-15 01:06:43');

-- --------------------------------------------------------

--
-- Table structure for table `user_free_writing_ans`
--

CREATE TABLE `user_free_writing_ans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `interview_user_id` int(10) UNSIGNED NOT NULL,
  `quiz_question_id` bigint(20) UNSIGNED NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_free_writing_ans`
--

INSERT INTO `user_free_writing_ans` (`id`, `interview_user_id`, `quiz_question_id`, `answer`, `created_at`, `updated_at`) VALUES
(21, 9, 9, 'service providers', '2022-04-24 04:28:24', '2022-04-24 04:28:24'),
(22, 9, 10, 'aravel 5.6.', '2022-04-24 04:28:25', '2022-04-24 04:28:25'),
(53, 32, 26, 'ww', '2022-04-27 14:31:05', '2022-04-27 14:31:05'),
(54, 32, 27, 'وجهة نظر: انتصار ماكرون فرصة لألمانيا وأوروبا نحو مزيد من التكامل\r\nقادة العالم يرحبون بإعادة انتخاب ماكرون رئيسا لفرنسا\r\nوسط مخاوف من فوز لوبان.. إعلان نسبة المشاركة في رئاسيات فرنسا\r\nخبراء: لوبان تنتهج \"سياسة حافة الهاوية\" وسيكون لفوزها تداعيات عالمية\r\nلماذا تنظر الجزائر بتخوف كبير لانتخاب لوبان رئيسةً لفرنسا؟\r\nكما أن الولاية الثانية لماكرون لن تكون مفروشة بالورود أمام بلد منقسم يتخبط وسط غليان اجتماعي غير مسبوق. ماكرون التقط إشارة الناخبين بسرعة واعترف في خطاب النصر، غير بعيد عن برج إيفل، بأن الكثيرين صوتوا له، ليس لأنهم يؤيدون سياسته، ولكنهم فعلوا ذلك لمنع اليمين المتطرف من دخول قصر الإليزيه. ولن يكون لماكرون متسع من الوقت للتمتع بنشوة الانتصار، ذلك أن استحقاقا آخر لا يقل أهمية ينتظره خلال أسابيع يتعلق بالانتخابات التشريعية في يونيو/ حزيران، والتي ستحدد ما إذا كانت ولايته الثانية ستكون مدعومة بأغلبية برلمانية أم أنه سيضطر للتعايش مع المعارضة في الحكومة المقبلة. غير أن هذا الاقتراع الرئاسي يطرح أيضا أكثر من علامة استفهام حول مستقبل النموذج الديموقراطي الفرنسي.\r\n\r\nوبهذا الصدد كتبت صحيفة \"فرانكفورتر ألغماينه تسايتونغ\" الألمانية (26 أبريل / نيسان 2022) معتبرة أنه لا يجب استصغار ما أنجزه الرئيس الفرنسي، وكتبت معلقة \"حقق إيمانويل ماكرون ما لا يمكن تصوره تقريبًا. لأول مرة منذ عشرين عاما، فاز رئيس بثقة الناخبين الفرنسيين لولاية ثانية. قبلها، نجح جاك شيراك، أيضًا بعد مبارزة ضد لوبان (الأب). وهكذا عزز ماكرون سمعته كاستثناء سياسي. ومنذ إقرار الانتخابات المباشرة، لم ينجح أي من أسلافه في القيام بذلك\". ويذكر أن ماكرون فاز بنسبة 58 بالمائة متقدما على غريمته مارين لوبان بخمسة ملايين صوت فقط، بعدما كان هذا الفارق يقارب عشرة ملايين صوت قبل خمس سنوات، ما يؤكد الاكتساح المطرد لليمين المتطرف، الذي اقترب من عرش الإليزيه أكثر من أي وقت مضى في التاريخ الحديث للجمهورية الفرنسية.', '2022-04-27 14:31:30', '2022-04-27 14:31:30'),
(51, 32, 24, 'a', '2022-04-27 14:30:56', '2022-04-27 14:30:56'),
(52, 32, 25, 'sd', '2022-04-27 14:30:59', '2022-04-27 14:30:59'),
(55, 32, 28, 'aaaaa', '2022-04-27 14:31:33', '2022-04-27 14:31:33'),
(56, 32, 29, 'no', '2022-04-27 14:31:42', '2022-04-27 14:31:42'),
(57, 32, 30, 'no', '2022-04-27 14:31:48', '2022-04-27 14:31:48'),
(58, 32, 31, 'ou', '2022-04-27 14:31:50', '2022-04-27 14:31:50'),
(59, 32, 32, 'gu', '2022-04-27 14:31:55', '2022-04-27 14:31:55'),
(60, 32, 33, 'ooo', '2022-04-27 14:32:01', '2022-04-27 14:32:01'),
(61, 32, 34, 'uiu', '2022-04-27 14:32:06', '2022-04-27 14:32:06'),
(62, 32, 35, 'uiui', '2022-04-27 14:32:12', '2022-04-27 14:32:12'),
(63, 32, 25, 'sd', '2022-04-27 14:37:54', '2022-04-27 14:37:54'),
(64, 32, 26, 'ww', '2022-04-27 14:37:55', '2022-04-27 14:37:55'),
(65, 32, 27, 'وجهة نظر: انتصار ماكرون فرصة لألمانيا وأوروبا نحو مزيد من التكامل\r\nقادة العالم يرحبون بإعادة انتخاب ماكرون رئيسا لفرنسا\r\nوسط مخاوف من فوز لوبان.. إعلان نسبة المشاركة في رئاسيات فرنسا\r\nخبراء: لوبان تنتهج \"سياسة حافة الهاوية\" وسيكون لفوزها تداعيات عالمية\r\nلماذا تنظر الجزائر بتخوف كبير لانتخاب لوبان رئيسةً لفرنسا؟\r\nكما أن الولاية الثانية لماكرون لن تكون مفروشة بالورود أمام بلد منقسم يتخبط وسط غليان اجتماعي غير مسبوق. ماكرون التقط إشارة الناخبين بسرعة واعترف في خطاب النصر، غير بعيد عن برج إيفل، بأن الكثيرين صوتوا له، ليس لأنهم يؤيدون سياسته، ولكنهم فعلوا ذلك لمنع اليمين المتطرف من دخول قصر الإليزيه. ولن يكون لماكرون متسع من الوقت للتمتع بنشوة الانتصار، ذلك أن استحقاقا آخر لا يقل أهمية ينتظره خلال أسابيع يتعلق بالانتخابات التشريعية في يونيو/ حزيران، والتي ستحدد ما إذا كانت ولايته الثانية ستكون مدعومة بأغلبية برلمانية أم أنه سيضطر للتعايش مع المعارضة في الحكومة المقبلة. غير أن هذا الاقتراع الرئاسي يطرح أيضا أكثر من علامة استفهام حول مستقبل النموذج الديموقراطي الفرنسي.\r\n\r\nوبهذا الصدد كتبت صحيفة \"فرانكفورتر ألغماينه تسايتونغ\" الألمانية (26 أبريل / نيسان 2022) معتبرة أنه لا يجب استصغار ما أنجزه الرئيس الفرنسي، وكتبت معلقة \"حقق إيمانويل ماكرون ما لا يمكن تصوره تقريبًا. لأول مرة منذ عشرين عاما، فاز رئيس بثقة الناخبين الفرنسيين لولاية ثانية. قبلها، نجح جاك شيراك، أيضًا بعد مبارزة ضد لوبان (الأب). وهكذا عزز ماكرون سمعته كاستثناء سياسي. ومنذ إقرار الانتخابات المباشرة، لم ينجح أي من أسلافه في القيام بذلك\". ويذكر أن ماكرون فاز بنسبة 58 بالمائة متقدما على غريمته مارين لوبان بخمسة ملايين صوت فقط، بعدما كان هذا الفارق يقارب عشرة ملايين صوت قبل خمس سنوات، ما يؤكد الاكتساح المطرد لليمين المتطرف، الذي اقترب من عرش الإليزيه أكثر من أي وقت مضى في التاريخ الحديث للجمهورية الفرنسية.', '2022-04-27 14:37:57', '2022-04-27 14:37:57'),
(66, 32, 28, 'aaaaa', '2022-04-27 14:37:58', '2022-04-27 14:37:58'),
(67, 32, 29, 'no', '2022-04-27 14:37:59', '2022-04-27 14:37:59'),
(68, 32, 30, 'no', '2022-04-27 14:38:00', '2022-04-27 14:38:00'),
(69, 32, 31, 'ou', '2022-04-27 14:38:01', '2022-04-27 14:38:01'),
(70, 32, 32, 'gu', '2022-04-27 14:38:02', '2022-04-27 14:38:02'),
(71, 32, 33, 'ooo', '2022-04-27 14:38:02', '2022-04-27 14:38:02'),
(72, 32, 34, 'uiu', '2022-04-27 14:38:03', '2022-04-27 14:38:03'),
(73, 32, 35, 'uiui', '2022-04-27 14:38:04', '2022-04-27 14:38:04'),
(74, 33, 24, '12312', '2022-04-27 14:40:38', '2022-04-27 14:40:38'),
(75, 33, 26, '12313456456', '2022-04-27 14:40:42', '2022-04-27 14:40:42'),
(76, 33, 27, '125445', '2022-04-27 14:40:46', '2022-04-27 14:40:46'),
(77, 33, 28, 'kujhkuh', '2022-04-27 14:40:49', '2022-04-27 14:40:49'),
(78, 34, 24, 'Hyy', '2022-04-27 14:58:59', '2022-04-27 14:58:59'),
(79, 34, 25, 'Ww', '2022-04-27 14:59:02', '2022-04-27 14:59:02'),
(80, 34, 26, 'Hjj', '2022-04-27 14:59:05', '2022-04-27 14:59:05'),
(81, 34, 27, 'Hgg', '2022-04-27 14:59:08', '2022-04-27 14:59:08'),
(82, 34, 28, 'Hdudu', '2022-04-27 14:59:10', '2022-04-27 14:59:10'),
(83, 34, 29, '26272', '2022-04-27 14:59:14', '2022-04-27 14:59:14'),
(84, 34, 30, 'Ydd7j\r\nDudid', '2022-04-27 14:59:19', '2022-04-27 14:59:19'),
(85, 34, 31, 'Hdud', '2022-04-27 14:59:22', '2022-04-27 14:59:22'),
(86, 34, 32, 'Hdhd', '2022-04-27 14:59:26', '2022-04-27 14:59:26'),
(87, 41, 24, 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2022-04-29 17:11:51', '2022-04-29 17:11:51'),
(88, 41, 25, 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2022-04-29 17:11:55', '2022-04-29 17:11:55'),
(89, 41, 26, 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2022-04-29 17:11:58', '2022-04-29 17:11:58'),
(90, 41, 27, 'The standard chunk of Lorem Ipsum', '2022-04-29 17:12:02', '2022-04-29 17:12:02'),
(91, 41, 28, 'The standard chunk of Lorem Ipsum', '2022-04-29 17:12:04', '2022-04-29 17:12:04'),
(92, 41, 29, 'The standard chunk of Lorem Ipsum', '2022-04-29 17:12:06', '2022-04-29 17:12:06'),
(93, 41, 30, 'The standard chunk of Lorem Ipsum', '2022-04-29 17:12:08', '2022-04-29 17:12:08'),
(94, 41, 31, 'The standard chunk of Lorem Ipsum', '2022-04-29 17:12:10', '2022-04-29 17:12:10'),
(95, 41, 32, 'The standard chunk of Lorem Ipsum', '2022-04-29 17:12:13', '2022-04-29 17:12:13'),
(96, 41, 33, 'The standard chunk of Lorem Ipsum', '2022-04-29 17:12:15', '2022-04-29 17:12:15'),
(97, 41, 34, 'The standard chunk of Lorem Ipsum', '2022-04-29 17:12:17', '2022-04-29 17:12:17'),
(98, 41, 35, 'The standard chunk of Lorem Ipsum', '2022-04-29 17:12:19', '2022-04-29 17:12:19'),
(99, 41, 24, 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2022-04-29 17:12:59', '2022-04-29 17:12:59'),
(100, 41, 25, 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2022-04-29 17:13:00', '2022-04-29 17:13:00'),
(101, 41, 26, 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2022-04-29 17:13:02', '2022-04-29 17:13:02'),
(102, 41, 27, 'The standard chunk of Lorem Ipsum', '2022-04-29 17:13:03', '2022-04-29 17:13:03'),
(103, 41, 28, 'The standard chunk of Lorem Ipsum', '2022-04-29 17:13:08', '2022-04-29 17:13:08'),
(104, 41, 28, 'The standard chunk of Lorem Ipsum', '2022-04-29 17:13:09', '2022-04-29 17:13:09'),
(105, 41, 28, 'The standard chunk of Lorem Ipsum', '2022-04-29 17:13:09', '2022-04-29 17:13:09'),
(106, 41, 28, 'The standard chunk of Lorem Ipsum', '2022-04-29 17:13:09', '2022-04-29 17:13:09'),
(107, 41, 29, 'The standard chunk of Lorem Ipsum', '2022-04-29 17:13:10', '2022-04-29 17:13:10'),
(108, 41, 30, 'The standard chunk of Lorem Ipsum', '2022-04-29 17:13:11', '2022-04-29 17:13:11'),
(109, 41, 31, 'The standard chunk of Lorem Ipsum', '2022-04-29 17:13:13', '2022-04-29 17:13:13'),
(110, 41, 32, 'The standard chunk of Lorem Ipsum', '2022-04-29 17:13:14', '2022-04-29 17:13:14'),
(111, 41, 33, 'The standard chunk of Lorem Ipsum', '2022-04-29 17:13:15', '2022-04-29 17:13:15'),
(112, 41, 34, 'The standard chunk of Lorem Ipsum', '2022-04-29 17:13:17', '2022-04-29 17:13:17'),
(113, 41, 35, 'The standard chunk of Lorem Ipsum', '2022-04-29 17:13:18', '2022-04-29 17:13:18'),
(114, 45, 24, 'Doctor', '2022-04-29 19:44:13', '2022-04-29 19:44:13'),
(115, 45, 25, 'by using impale', '2022-04-29 19:44:51', '2022-04-29 19:44:51'),
(116, 45, 26, 'I dont give a shit', '2022-04-29 19:45:03', '2022-04-29 19:45:03'),
(117, 45, 27, 'ask foundation class people', '2022-04-29 19:45:23', '2022-04-29 19:45:23'),
(118, 45, 28, 'i dont give a fuck', '2022-04-29 19:45:38', '2022-04-29 19:45:38'),
(119, 45, 29, 'no', '2022-04-29 19:45:51', '2022-04-29 19:45:51'),
(120, 45, 30, 'no', '2022-04-29 19:45:58', '2022-04-29 19:45:58'),
(121, 45, 31, 'silly question', '2022-04-29 19:46:10', '2022-04-29 19:46:10'),
(122, 45, 32, 'that\'s not a choice', '2022-04-29 19:46:28', '2022-04-29 19:46:28'),
(123, 45, 33, 'We should slow down', '2022-04-29 19:46:59', '2022-04-29 19:46:59'),
(124, 45, 34, 'Depends', '2022-04-29 19:47:13', '2022-04-29 19:47:13'),
(125, 45, 35, 'freedom', '2022-04-29 19:47:38', '2022-04-29 19:47:38'),
(126, 45, 24, 'Doctor', '2022-04-29 20:19:49', '2022-04-29 20:19:49'),
(127, 45, 25, 'by using impale', '2022-04-29 20:19:51', '2022-04-29 20:19:51'),
(128, 45, 26, 'I dont give a shit', '2022-04-29 20:19:52', '2022-04-29 20:19:52'),
(129, 45, 27, 'ask foundation class people', '2022-04-29 20:19:53', '2022-04-29 20:19:53'),
(130, 45, 28, 'i dont give a fuck', '2022-04-29 20:19:54', '2022-04-29 20:19:54'),
(131, 45, 29, 'no', '2022-04-29 20:19:55', '2022-04-29 20:19:55'),
(132, 45, 30, 'no', '2022-04-29 20:19:56', '2022-04-29 20:19:56'),
(133, 45, 31, 'silly question', '2022-04-29 20:19:57', '2022-04-29 20:19:57'),
(134, 45, 32, 'that\'s not a choice', '2022-04-29 20:19:58', '2022-04-29 20:19:58'),
(135, 45, 33, 'We should slow down', '2022-04-29 20:19:59', '2022-04-29 20:19:59'),
(136, 45, 34, 'Depends', '2022-04-29 20:20:00', '2022-04-29 20:20:00'),
(137, 45, 35, 'freedom', '2022-04-29 20:20:01', '2022-04-29 20:20:01'),
(138, 48, 24, 'football player', '2022-05-09 13:21:30', '2022-05-09 13:21:30'),
(139, 32, 24, 'a', '2022-05-09 13:21:37', '2022-05-09 13:21:37'),
(140, 48, 25, 'yeah', '2022-05-09 13:21:37', '2022-05-09 13:21:37'),
(141, 32, 25, 'sd', '2022-05-09 13:21:39', '2022-05-09 13:21:39'),
(142, 32, 26, 'ww', '2022-05-09 13:21:40', '2022-05-09 13:21:40'),
(143, 32, 27, 'وجهة نظر: انتصار ماكرون فرصة لألمانيا وأوروبا نحو مزيد من التكامل\r\nقادة العالم يرحبون بإعادة انتخاب ماكرون رئيسا لفرنسا\r\nوسط مخاوف من فوز لوبان.. إعلان نسبة المشاركة في رئاسيات فرنسا\r\nخبراء: لوبان تنتهج \"سياسة حافة الهاوية\" وسيكون لفوزها تداعيات عالمية\r\nلماذا تنظر الجزائر بتخوف كبير لانتخاب لوبان رئيسةً لفرنسا؟\r\nكما أن الولاية الثانية لماكرون لن تكون مفروشة بالورود أمام بلد منقسم يتخبط وسط غليان اجتماعي غير مسبوق. ماكرون التقط إشارة الناخبين بسرعة واعترف في خطاب النصر، غير بعيد عن برج إيفل، بأن الكثيرين صوتوا له، ليس لأنهم يؤيدون سياسته، ولكنهم فعلوا ذلك لمنع اليمين المتطرف من دخول قصر الإليزيه. ولن يكون لماكرون متسع من الوقت للتمتع بنشوة الانتصار، ذلك أن استحقاقا آخر لا يقل أهمية ينتظره خلال أسابيع يتعلق بالانتخابات التشريعية في يونيو/ حزيران، والتي ستحدد ما إذا كانت ولايته الثانية ستكون مدعومة بأغلبية برلمانية أم أنه سيضطر للتعايش مع المعارضة في الحكومة المقبلة. غير أن هذا الاقتراع الرئاسي يطرح أيضا أكثر من علامة استفهام حول مستقبل النموذج الديموقراطي الفرنسي.\r\n\r\nوبهذا الصدد كتبت صحيفة \"فرانكفورتر ألغماينه تسايتونغ\" الألمانية (26 أبريل / نيسان 2022) معتبرة أنه لا يجب استصغار ما أنجزه الرئيس الفرنسي، وكتبت معلقة \"حقق إيمانويل ماكرون ما لا يمكن تصوره تقريبًا. لأول مرة منذ عشرين عاما، فاز رئيس بثقة الناخبين الفرنسيين لولاية ثانية. قبلها، نجح جاك شيراك، أيضًا بعد مبارزة ضد لوبان (الأب). وهكذا عزز ماكرون سمعته كاستثناء سياسي. ومنذ إقرار الانتخابات المباشرة، لم ينجح أي من أسلافه في القيام بذلك\". ويذكر أن ماكرون فاز بنسبة 58 بالمائة متقدما على غريمته مارين لوبان بخمسة ملايين صوت فقط، بعدما كان هذا الفارق يقارب عشرة ملايين صوت قبل خمس سنوات، ما يؤكد الاكتساح المطرد لليمين المتطرف، الذي اقترب من عرش الإليزيه أكثر من أي وقت مضى في التاريخ الحديث للجمهورية الفرنسية.', '2022-05-09 13:21:41', '2022-05-09 13:21:41'),
(144, 32, 28, 'aaaaa', '2022-05-09 13:21:43', '2022-05-09 13:21:43'),
(145, 32, 29, 'no', '2022-05-09 13:21:44', '2022-05-09 13:21:44'),
(146, 32, 30, 'no', '2022-05-09 13:21:45', '2022-05-09 13:21:45'),
(147, 32, 31, 'ou', '2022-05-09 13:21:46', '2022-05-09 13:21:46'),
(148, 32, 32, 'gu', '2022-05-09 13:21:47', '2022-05-09 13:21:47'),
(149, 32, 33, 'ooo', '2022-05-09 13:21:48', '2022-05-09 13:21:48'),
(150, 32, 34, 'uiu', '2022-05-09 13:21:49', '2022-05-09 13:21:49'),
(151, 32, 35, 'uiui', '2022-05-09 13:21:50', '2022-05-09 13:21:50'),
(152, 48, 26, 'you make magic', '2022-05-09 13:21:57', '2022-05-09 13:21:57'),
(153, 48, 27, 'we belong to foundation class', '2022-05-09 13:22:15', '2022-05-09 13:22:15'),
(154, 48, 28, 'no', '2022-05-09 13:22:38', '2022-05-09 13:22:38'),
(155, 32, 24, '1', '2022-05-09 13:24:37', '2022-05-09 13:24:37'),
(156, 32, 25, '2', '2022-05-09 13:24:39', '2022-05-09 13:24:39'),
(157, 32, 26, '3', '2022-05-09 13:24:41', '2022-05-09 13:24:41'),
(158, 32, 27, '4', '2022-05-09 13:24:44', '2022-05-09 13:24:44'),
(159, 32, 28, '5', '2022-05-09 13:24:47', '2022-05-09 13:24:47'),
(160, 32, 29, '6', '2022-05-09 13:24:49', '2022-05-09 13:24:49'),
(161, 32, 30, '7', '2022-05-09 13:24:51', '2022-05-09 13:24:51'),
(162, 32, 31, '8', '2022-05-09 13:24:54', '2022-05-09 13:24:54'),
(163, 32, 32, '9', '2022-05-09 13:24:56', '2022-05-09 13:24:56'),
(164, 32, 33, '10', '2022-05-09 13:24:59', '2022-05-09 13:24:59'),
(165, 32, 34, '11', '2022-05-09 13:25:02', '2022-05-09 13:25:02'),
(166, 32, 35, '12', '2022-05-09 13:25:04', '2022-05-09 13:25:04'),
(167, 50, 24, '1', '2022-05-09 13:29:04', '2022-05-09 13:29:04'),
(168, 50, 25, '2', '2022-05-09 13:29:08', '2022-05-09 13:29:08'),
(169, 50, 26, 'D', '2022-05-09 13:29:12', '2022-05-09 13:29:12'),
(170, 50, 27, 'Q', '2022-05-09 13:29:14', '2022-05-09 13:29:14'),
(171, 50, 28, 'T', '2022-05-09 13:29:17', '2022-05-09 13:29:17'),
(172, 50, 29, 'D', '2022-05-09 13:29:20', '2022-05-09 13:29:20'),
(173, 50, 30, 'X', '2022-05-09 13:29:22', '2022-05-09 13:29:22'),
(174, 50, 31, 'X', '2022-05-09 13:29:25', '2022-05-09 13:29:25'),
(175, 50, 32, 'A', '2022-05-09 13:29:27', '2022-05-09 13:29:27'),
(176, 50, 33, 'T', '2022-05-09 13:29:30', '2022-05-09 13:29:30'),
(177, 50, 34, 'W', '2022-05-09 13:29:32', '2022-05-09 13:29:32'),
(178, 50, 35, '3w', '2022-05-09 13:29:35', '2022-05-09 13:29:35'),
(179, 54, 24, 'efasdf', '2022-05-09 17:58:13', '2022-05-09 17:58:13'),
(180, 54, 25, 'asdfafs', '2022-05-09 17:58:16', '2022-05-09 17:58:16'),
(181, 54, 26, 'sdafasdf', '2022-05-09 17:58:19', '2022-05-09 17:58:19'),
(182, 54, 27, 'sdfadfss', '2022-05-09 17:58:22', '2022-05-09 17:58:22'),
(183, 54, 28, 'sdfasdf', '2022-05-09 17:58:24', '2022-05-09 17:58:24'),
(184, 33, 24, '12312', '2022-05-10 13:01:03', '2022-05-10 13:01:03'),
(185, 55, 24, 'something', '2022-05-10 13:12:53', '2022-05-10 13:12:53'),
(186, 55, 25, 'something else', '2022-05-10 13:13:01', '2022-05-10 13:13:01'),
(187, 55, 26, 'sssss', '2022-05-10 13:13:04', '2022-05-10 13:13:04'),
(188, 56, 24, 'Now', '2022-05-10 19:13:12', '2022-05-10 19:13:12'),
(189, 56, 25, 'NOw', '2022-05-10 19:13:14', '2022-05-10 19:13:14'),
(190, 56, 26, 'NOw', '2022-05-10 19:13:15', '2022-05-10 19:13:15'),
(191, 56, 27, 'NOw', '2022-05-10 19:13:17', '2022-05-10 19:13:17'),
(192, 56, 28, 'NOw', '2022-05-10 19:13:18', '2022-05-10 19:13:18'),
(193, 56, 29, 'NOw', '2022-05-10 19:13:20', '2022-05-10 19:13:20'),
(194, 56, 30, 'NOw', '2022-05-10 19:13:21', '2022-05-10 19:13:21'),
(195, 56, 31, 'NOw', '2022-05-10 19:13:22', '2022-05-10 19:13:22'),
(196, 56, 32, 'NOw', '2022-05-10 19:13:24', '2022-05-10 19:13:24'),
(197, 56, 33, 'NOw', '2022-05-10 19:13:25', '2022-05-10 19:13:25'),
(198, 56, 34, 'NOw', '2022-05-10 19:13:27', '2022-05-10 19:13:27'),
(199, 56, 35, 'NOw', '2022-05-10 19:13:28', '2022-05-10 19:13:28'),
(200, 58, 24, 'dsfadsf', '2022-05-11 17:23:37', '2022-05-11 17:23:37'),
(201, 58, 25, 'fff', '2022-05-11 17:23:40', '2022-05-11 17:23:40'),
(202, 58, 26, 'dddd', '2022-05-11 17:23:43', '2022-05-11 17:23:43'),
(203, 58, 27, 'rrr', '2022-05-11 17:23:45', '2022-05-11 17:23:45'),
(204, 58, 28, 'www', '2022-05-11 17:23:48', '2022-05-11 17:23:48'),
(205, 58, 29, 'bbbb', '2022-05-11 17:23:52', '2022-05-11 17:23:52'),
(206, 58, 30, 'wwwr', '2022-05-11 17:23:56', '2022-05-11 17:23:56'),
(207, 58, 31, 'hhh', '2022-05-11 17:24:02', '2022-05-11 17:24:02'),
(208, 58, 32, 'eeee', '2022-05-11 17:24:06', '2022-05-11 17:24:06'),
(209, 58, 33, 'yyy', '2022-05-11 17:24:10', '2022-05-11 17:24:10'),
(210, 58, 34, 'www', '2022-05-11 17:24:14', '2022-05-11 17:24:14'),
(211, 59, 24, 'the side one', '2022-05-12 14:51:33', '2022-05-12 14:51:33'),
(212, 59, 25, 'not gonna say', '2022-05-12 14:51:48', '2022-05-12 14:51:48'),
(213, 59, 26, 'start collecting', '2022-05-12 14:52:02', '2022-05-12 14:52:02'),
(214, 59, 27, 'a\r\nb\r\nb\r\nc\r\nd', '2022-05-12 14:52:13', '2022-05-12 14:52:13'),
(215, 59, 28, 'sdfsdfsdfsdfs\r\nsdfsdsdfsffefewefwe\r\ndfsdfdfdfgdger', '2022-05-12 14:52:21', '2022-05-12 14:52:21'),
(216, 59, 29, 'drbvcbcbaf\r\ndfsdfsdfrggtrtgtg.!ddfgdfgdfgdf dfgdfgdfgdfgdfgdfgdfgdfggregerwerf&sdfsddfb\r\nddfgdfgdfgdfgdfgdfgdg', '2022-05-12 14:52:38', '2022-05-12 14:52:38'),
(217, 59, 30, 'gdfgdfgdfgsdgd', '2022-05-12 14:52:41', '2022-05-12 14:52:41'),
(218, 59, 31, 'dfgdfgrbcvbcbergergb  regerg erg egegt sdsageg', '2022-05-12 14:52:49', '2022-05-12 14:52:49'),
(219, 59, 32, 'f agdsfgsdf gdfg dfgdf cvcbxcvbrege g rg', '2022-05-12 14:52:54', '2022-05-12 14:52:54'),
(220, 59, 33, 'dfs gdfgsdf gergtsdfsdhdfgagdf', '2022-05-12 14:52:59', '2022-05-12 14:52:59'),
(221, 59, 34, 'sdffg5eggfgfsd', '2022-05-12 14:53:02', '2022-05-12 14:53:02'),
(222, 59, 35, 'sdfgdfsgthrhhnghnz', '2022-05-12 14:53:05', '2022-05-12 14:53:05'),
(223, 60, 24, 'sdfsdf', '2022-05-12 18:02:25', '2022-05-12 18:02:25'),
(224, 60, 25, 'sdfdsf', '2022-05-12 18:02:27', '2022-05-12 18:02:27'),
(225, 60, 26, 'sdfsdf', '2022-05-12 18:02:29', '2022-05-12 18:02:29'),
(226, 60, 27, 'sdfsdfsdf', '2022-05-12 18:02:31', '2022-05-12 18:02:31'),
(227, 60, 28, 'sdfsdfsd', '2022-05-12 18:02:34', '2022-05-12 18:02:34'),
(228, 60, 29, 'sdfsdfdsf', '2022-05-12 18:02:36', '2022-05-12 18:02:36'),
(229, 60, 30, 'dsfsdfsd', '2022-05-12 18:02:38', '2022-05-12 18:02:38'),
(230, 60, 31, 'sdfsdf', '2022-05-12 18:02:41', '2022-05-12 18:02:41'),
(231, 60, 32, 'sdfsdfds', '2022-05-12 18:02:43', '2022-05-12 18:02:43'),
(232, 60, 35, 'sdfsfdsdd', '2022-05-12 18:02:50', '2022-06-02 15:49:44'),
(233, 60, 33, 'ttt', '2022-06-02 15:49:38', '2022-06-02 15:49:38'),
(234, 60, 34, 'wssw4', '2022-06-02 15:49:42', '2022-06-02 15:49:42'),
(235, 66, 25, 'efsdfsdfsdf', '2022-06-03 14:01:40', '2022-06-03 14:01:40'),
(236, 66, 26, 'asdasdkjkjklj', '2022-06-03 14:01:45', '2022-06-03 14:01:45'),
(237, 66, 27, 'asdasdasdasdasdasd', '2022-06-03 14:02:45', '2022-06-03 14:02:45'),
(238, 66, 28, 'ddsdfsdfdsfsdfsd', '2022-06-03 14:02:51', '2022-06-03 14:02:51'),
(239, 66, 29, 'saasdasdasdasdas', '2022-06-03 14:02:55', '2022-06-03 14:02:55'),
(240, 66, 30, 'asdasdasdasdasdasd', '2022-06-03 14:03:00', '2022-06-03 14:03:00'),
(241, 66, 31, 'asdasdasdasdasdasda', '2022-06-03 14:03:04', '2022-06-03 14:03:04'),
(242, 66, 32, 'cxvcxvcxvxcvcvxcvx', '2022-06-03 14:03:09', '2022-06-03 14:03:09'),
(243, 66, 33, 'nkjsdhjhjhjjk', '2022-06-03 14:03:13', '2022-06-03 14:03:13');

-- --------------------------------------------------------

--
-- Table structure for table `user_quiz_answers`
--

CREATE TABLE `user_quiz_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `interview_user_id` int(10) UNSIGNED NOT NULL,
  `quiz_course_id` int(11) DEFAULT NULL,
  `quiz_attempt` int(11) DEFAULT NULL,
  `quiz_question_id` bigint(20) UNSIGNED NOT NULL,
  `quiz_answer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_quiz_answers`
--

INSERT INTO `user_quiz_answers` (`id`, `interview_user_id`, `quiz_course_id`, `quiz_attempt`, `quiz_question_id`, `quiz_answer_id`, `created_at`, `updated_at`) VALUES
(338, 3, 1, 5, 36, 56, '2022-10-15 00:08:34', '2022-10-15 01:05:48'),
(339, 3, 1, 5, 37, 62, '2022-10-15 00:08:38', '2022-10-15 01:04:55'),
(340, 3, 1, 5, 38, 67, '2022-10-15 00:08:45', '2022-10-15 01:05:55'),
(341, 3, 1, 5, 39, 68, '2022-10-15 00:08:47', '2022-10-15 01:05:06'),
(342, 3, 1, 5, 40, 73, '2022-10-15 00:08:50', '2022-10-15 01:06:00'),
(343, 3, 1, 5, 41, 78, '2022-10-15 00:08:53', '2022-10-15 01:06:02'),
(344, 3, 1, 5, 42, 83, '2022-10-15 00:08:56', '2022-10-15 01:06:05'),
(345, 3, 1, 5, 43, 84, '2022-10-15 00:08:59', '2022-10-15 01:05:34'),
(346, 3, 2, 5, 44, 89, '2022-10-15 00:14:35', '2022-10-15 00:47:39'),
(347, 3, 3, 5, 25, 132, '2022-10-15 01:06:18', '2022-10-15 01:06:18'),
(348, 3, 3, 5, 26, 129, '2022-10-15 01:06:21', '2022-10-15 01:06:21'),
(349, 3, 3, 5, 27, 126, '2022-10-15 01:06:23', '2022-10-15 01:06:23'),
(350, 3, 3, 5, 28, 123, '2022-10-15 01:06:26', '2022-10-15 01:06:26'),
(351, 3, 3, 5, 29, 116, '2022-10-15 01:06:29', '2022-10-15 01:06:29'),
(352, 3, 3, 5, 30, 113, '2022-10-15 01:06:32', '2022-10-15 01:06:32'),
(353, 3, 3, 5, 31, 110, '2022-10-15 01:06:35', '2022-10-15 01:06:35'),
(354, 3, 3, 5, 32, 107, '2022-10-15 01:06:37', '2022-10-15 01:06:37'),
(355, 3, 3, 5, 33, 100, '2022-10-15 01:06:41', '2022-10-15 01:06:41'),
(356, 3, 3, 5, 34, 97, '2022-10-15 01:06:43', '2022-10-15 01:06:43'),
(357, 3, 3, 5, 35, 94, '2022-10-15 01:06:46', '2022-10-15 01:06:46');

-- --------------------------------------------------------

--
-- Table structure for table `web_settings`
--

CREATE TABLE `web_settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `terms_service` longtext DEFAULT NULL,
  `privacy_policy` longtext DEFAULT NULL,
  `application_logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `og_logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_settings`
--

INSERT INTO `web_settings` (`id`, `site_name`, `address`, `meta_title`, `meta_keyword`, `meta_description`, `terms_service`, `privacy_policy`, `application_logo`, `favicon`, `og_logo`, `created_at`, `updated_at`) VALUES
(1, 'Omniyou', 'Dhakabd', 'Meta', 'Keywoard', 'Descriptiondsaf', 'Termssadf', 'Privacyasdf', 'uploads/logo/1680585654.png', 'uploads/favicon/1680585684.png', 'uploads/og_logo/1680585684.webp', NULL, '2023-04-03 23:35:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients_survey`
--
ALTER TABLE `clients_survey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients_survey_questions`
--
ALTER TABLE `clients_survey_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interview_users`
--
ALTER TABLE `interview_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_options`
--
ALTER TABLE `quiz_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_correct_ans`
--
ALTER TABLE `user_correct_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_free_writing_ans`
--
ALTER TABLE `user_free_writing_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_quiz_answers`
--
ALTER TABLE `user_quiz_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_settings`
--
ALTER TABLE `web_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients_survey`
--
ALTER TABLE `clients_survey`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `clients_survey_questions`
--
ALTER TABLE `clients_survey_questions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interview_users`
--
ALTER TABLE `interview_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `quiz_options`
--
ALTER TABLE `quiz_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_correct_ans`
--
ALTER TABLE `user_correct_ans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `user_free_writing_ans`
--
ALTER TABLE `user_free_writing_ans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT for table `user_quiz_answers`
--
ALTER TABLE `user_quiz_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=358;

--
-- AUTO_INCREMENT for table `web_settings`
--
ALTER TABLE `web_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
