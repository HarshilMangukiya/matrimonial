-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 28, 2022 at 10:04 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matrimonial_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$GtMViN.133.6QvWlC6pWdul7OliWhRSHJvaNLfp.bEnr96oa1UvJW', '2022-08-28 00:29:37', '2022-08-28 00:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_25_170941_admins', 1),
(6, '2022_08_25_183433_create_partner_preferences_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `partner_preference`
--

CREATE TABLE `partner_preference` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `salary_from` int(11) NOT NULL,
  `salary_to` int(11) NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manglik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partner_preference`
--

INSERT INTO `partner_preference` (`id`, `user_id`, `salary_from`, `salary_to`, `occupation`, `family_type`, `manglik`, `created_at`, `updated_at`) VALUES
(1, 1, 232699, 579533, '1,2,3', '2', '3', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(2, 2, 193420, 611194, '1,2', '1,2', '2', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(3, 3, 247408, 637584, '1', '1', '1', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(4, 4, 288119, 780703, '1', '1', '1', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(5, 5, 205707, 427952, '1,2', '1,2', '2', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(6, 6, 296047, 658559, '1,2', '1,2', '2', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(7, 7, 209067, 990991, '1', '1', '1', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(8, 8, 129062, 718945, '1,2', '1,2', '2', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(9, 9, 202484, 406836, '1,2,3', '2', '3', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(10, 10, 103035, 872036, '1', '1', '1', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(11, 11, 143692, 874425, '1,2,3', '2', '3', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(12, 12, 181879, 710342, '1', '1', '1', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(13, 13, 270889, 687216, '1,2', '1,2', '2', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(14, 14, 182045, 865000, '1,2,3', '2', '3', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(15, 15, 164266, 610771, '1', '1', '1', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(16, 16, 148731, 521360, '1,2,3', '2', '3', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(17, 17, 254402, 505209, '1,2', '1,2', '2', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(18, 18, 159286, 959983, '1,2,3', '2', '3', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(19, 19, 248792, 702138, '1,2,3', '2', '3', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(20, 20, 237954, 693516, '1', '1', '1', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(21, 21, 135608, 584401, '1,2', '1,2', '2', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(22, 22, 138932, 533650, '1,2', '1,2', '2', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(23, 23, 192632, 752203, '1,2,3', '2', '3', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(24, 24, 125395, 407741, '1,2', '1,2', '2', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(25, 25, 185171, 626205, '1', '1', '1', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(26, 26, 108557, 557248, '1,2', '1,2', '2', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(27, 27, 269560, 935334, '1,2', '1,2', '2', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(28, 28, 297342, 809361, '1', '1', '1', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(29, 29, 105022, 524475, '1,2,3', '2', '3', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(30, 30, 174737, 545589, '1,2', '1,2', '2', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(31, 31, 135483, 999938, '1', '1', '1', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(32, 32, 293269, 954866, '1,2', '1,2', '2', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(33, 33, 121738, 928162, '1', '1', '1', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(34, 34, 100979, 889914, '1', '1', '1', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(35, 35, 119259, 687371, '1,2', '1,2', '2', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(36, 36, 293070, 934436, '1,2', '1,2', '2', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(37, 37, 209494, 415027, '1,2,3', '2', '3', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(38, 38, 171529, 989121, '1,2', '1,2', '2', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(39, 39, 120929, 900518, '1,2,3', '2', '3', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(40, 40, 276724, 638063, '1', '1', '1', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(41, 41, 266806, 705919, '1,2', '1,2', '2', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(42, 42, 168000, 695318, '1', '1', '1', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(43, 43, 248297, 684589, '1', '1', '1', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(44, 44, 296435, 522080, '1,2,3', '2', '3', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(45, 45, 279891, 634307, '1,2', '1,2', '2', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(46, 46, 201163, 717910, '1', '1', '1', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(47, 47, 274545, 445439, '1,2', '1,2', '2', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(48, 48, 129264, 848970, '1', '1', '1', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(49, 49, 184432, 528204, '1', '1', '1', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(50, 50, 104995, 572818, '1,2', '1,2', '2', '2022-08-28 00:29:37', '2022-08-28 00:29:37');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `annual_income` int(11) NOT NULL,
  `occupation` tinyint(4) NOT NULL,
  `family_type` tinyint(4) NOT NULL,
  `manglik` tinyint(4) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `dob`, `age`, `gender`, `annual_income`, `occupation`, `family_type`, `manglik`, `password`, `created_at`, `updated_at`) VALUES
(1, 'KLHQDWQbnA', 'leyIMekLRh', 'j3T0rqlhCV@gmail.com', '1962-06-13', 60, 2, 428127, 1, 2, 1, '$2y$10$RtfM2eqSN1ER0Cx2b99r3.yNlFuJ0axMJd.xzQLGSxTHinfFmGi.m', '2022-08-28 00:29:34', '2022-08-28 00:29:34'),
(2, 'ABpt5DCKjn', 'dJnpsn5QeH', 'KTZruV2nkX@gmail.com', '1974-09-22', 47, 3, 777911, 1, 2, 2, '$2y$10$fvFH2mvrJWoEGf3ReSUd0.uJmK7194gijygbUbBAT56lbU9U/YJ/G', '2022-08-28 00:29:34', '2022-08-28 00:29:34'),
(3, 'QL922TVPxn', 'E8tmehPg0d', 'UfAXrSdIvh@gmail.com', '1975-04-08', 47, 3, 974298, 3, 1, 1, '$2y$10$XEdd7.8XU1gneAHctT..C.aCkoaSzKHo63.10bIJdVrkUYy5jtgbS', '2022-08-28 00:29:34', '2022-08-28 00:29:34'),
(4, 'yyw7RzrCzs', 'jPIBbPSbMv', 'ukoQZpKflT@gmail.com', '1983-11-23', 38, 1, 914839, 1, 1, 1, '$2y$10$2oRI8KHG7dmxP9zbMVr7buto3.yln8HXmolBKwEBo5PvUfqZ1l3zC', '2022-08-28 00:29:34', '2022-08-28 00:29:34'),
(5, '39lZrjD473', 'DsayTYMs9L', 'MftkAdRRr0@gmail.com', '1979-11-14', 42, 1, 193162, 2, 1, 1, '$2y$10$ZF6.8AycSxAvqgZL2wSVa.ezE9QEfqd5iULUu1HJXTWkSv66WLy.e', '2022-08-28 00:29:34', '2022-08-28 00:29:34'),
(6, 'gqCwahsnhL', 'mOwERHwba2', 'Qru9tpQCcy@gmail.com', '1960-06-02', 62, 1, 781633, 2, 1, 1, '$2y$10$HZiHCMLpsTD6Pxl4PSJlB.M07nlEtkeq7xXINdNpJFNFiCRBccwJG', '2022-08-28 00:29:34', '2022-08-28 00:29:34'),
(7, 'eI5Cx5F8f8', 'R18dv83nsC', 'RlJgsBxu3g@gmail.com', '1989-03-05', 33, 2, 189208, 1, 1, 2, '$2y$10$yU7yq.aKbojztFgM4cABeesFHccs9EcPxG52UXHd28VvufEr2xvvO', '2022-08-28 00:29:34', '2022-08-28 00:29:34'),
(8, 'ozsv8PuiRs', 'E6p6vuYXaS', 'pTAhEhQTW6@gmail.com', '1965-09-25', 56, 2, 183005, 2, 2, 2, '$2y$10$/bbAUlx0ZVzwv51CDhP/7.RQmvnq.aFPFTkwtq7Cw2tu4THLS6R/i', '2022-08-28 00:29:34', '2022-08-28 00:29:34'),
(9, 'n6WPzrCxkz', '2XG41I6Vt9', 'yr4pbfwKQL@gmail.com', '1967-07-10', 55, 2, 338247, 3, 2, 1, '$2y$10$e1yGsGkiRBYPJ0sK.XRXkuFESGQxCOq5LrVRoMcm7XNCrAR.SPu0K', '2022-08-28 00:29:34', '2022-08-28 00:29:34'),
(10, 'FgzwzS3J3j', 'Prouk7LsOF', 'ctiaokpTeR@gmail.com', '1986-06-07', 36, 3, 611767, 3, 1, 1, '$2y$10$zYYgfCqPRUFtEZRDtBvFZe8GWc/U8evD.tObdvJhWHjpPevWpBPrO', '2022-08-28 00:29:34', '2022-08-28 00:29:34'),
(11, 'sKxjHxiuhA', 'oGWWdTWA8f', 'yNRZZNeaJp@gmail.com', '1960-06-23', 62, 2, 205104, 3, 1, 2, '$2y$10$xaQjhJZciAk83fC5IonS4OHgjBW2mn1Wwid67dGAc1VDJ7GnR32FC', '2022-08-28 00:29:34', '2022-08-28 00:29:34'),
(12, '43X1nBUtTC', 'aeX9rKuoub', 'LgliLGiXpE@gmail.com', '1971-07-23', 51, 1, 860337, 3, 1, 2, '$2y$10$efePM5mUSvJB8W7gIJanYudWZg/S4NfBovVhRdvmw49AozNw54tBO', '2022-08-28 00:29:34', '2022-08-28 00:29:34'),
(13, 'gxpOPLQZHf', 'wg78XXIOUq', 'RPdXZcxwgN@gmail.com', '1985-08-20', 37, 2, 911124, 2, 2, 2, '$2y$10$cjwuPZbKe5TGYCXeDiPFNeUpr5Xs2Ho5k0BGuchIUOviBVLT05nzm', '2022-08-28 00:29:35', '2022-08-28 00:29:35'),
(14, 'dLjfO1F5SU', 'nbTekANzbO', 'nJvCkLAWpO@gmail.com', '1982-09-16', 39, 3, 481435, 1, 2, 1, '$2y$10$Lm9DaZhZtGzOQNiHreLwg.h8UMeW/G7hQD7iwSJ/SQSQFU2Uzv4qm', '2022-08-28 00:29:35', '2022-08-28 00:29:35'),
(15, 'Y6wFFXSvvp', 'GlmzihN31J', 'XmsBqIznl9@gmail.com', '1975-07-22', 47, 1, 754728, 3, 2, 1, '$2y$10$8dq4Er6WeeC8TCg98bkOZ.Z5mnnYNgBcBQn6n4oG9J2Xva2/RUL3C', '2022-08-28 00:29:35', '2022-08-28 00:29:35'),
(16, 'NPTaqC5L1Y', '0pyI4yEgTC', '6ybTsaXXCP@gmail.com', '1986-03-28', 36, 3, 788703, 2, 1, 1, '$2y$10$nItBbQmf2XCEUU2kKIa3FeQCwB04ONzHGEKKqVch6D.UAz71dJDRG', '2022-08-28 00:29:35', '2022-08-28 00:29:35'),
(17, 'UpZbXe4QBX', 'jHRU1GycXZ', 'V69Fg7KNd7@gmail.com', '1988-10-29', 33, 2, 374021, 2, 1, 2, '$2y$10$m0DdS5v6KtfBQadN7vlQqeDgqWIp16Cp6l9FtIW/gzjbxuQe/svP6', '2022-08-28 00:29:35', '2022-08-28 00:29:35'),
(18, 'rpnuQ7KBub', '5DGt3QbvZu', '2flttpijGm@gmail.com', '1991-04-11', 31, 2, 342657, 2, 1, 2, '$2y$10$biR7atvFs/QuSSnI4VWHe.rg97U/mI5wBjx8pBG1LJpGcwSXxAGS6', '2022-08-28 00:29:35', '2022-08-28 00:29:35'),
(19, 'DBe6DBLz06', 'K26CtmyU4u', 'lPmeHL3m5g@gmail.com', '1996-02-10', 26, 3, 892981, 1, 1, 2, '$2y$10$hZFc9FZt/f8jKqewlIOe3uXmsj/BSzaHPlvSGlYdEU98cIHKcvuVC', '2022-08-28 00:29:35', '2022-08-28 00:29:35'),
(20, 'MyOmyvzKjg', 'Ckwf9iJxRU', 'BTtJGZKy4A@gmail.com', '1989-08-08', 33, 3, 837164, 3, 2, 2, '$2y$10$Zd7cbr/CtjnQOs4Xa4d.lORIJcj03eKXoLEHdhNKsZmsTGeyX1Cqy', '2022-08-28 00:29:35', '2022-08-28 00:29:35'),
(21, '58qqu6eIe2', 'Q35aHz7st7', 'zmUGsv6tzF@gmail.com', '1984-04-06', 38, 2, 741957, 2, 2, 2, '$2y$10$WdSNRLJRN5dOzePhDU5UaOw/nMzaoE5OWiNPN3TUldhi1.6k7PXBW', '2022-08-28 00:29:35', '2022-08-28 00:29:35'),
(22, 'qWON0xtJwz', 'q4uHc76aNd', 'EnybLkwnrQ@gmail.com', '2001-07-25', 21, 3, 591280, 2, 1, 2, '$2y$10$Keo.RX4IMj91gPaW0q2wFeUwYQRA6WxP2OeifWdI3InLebbopyjDC', '2022-08-28 00:29:35', '2022-08-28 00:29:35'),
(23, '9x91mJkqRh', '7waztkwvu3', 'tGmOqmd45o@gmail.com', '1974-03-25', 48, 3, 422123, 3, 2, 1, '$2y$10$5xMMM6W/M2uZAORy3T1FVOHGsYYC32SWV9Ss.5tTIz1DoUNSftM7y', '2022-08-28 00:29:35', '2022-08-28 00:29:35'),
(24, 'MapWBACQb4', '2NghFAmUFK', 'QXbqFkINZH@gmail.com', '1972-10-12', 49, 1, 848395, 3, 1, 1, '$2y$10$SL176Bbb8pmpt/mm5o9mquowRnIq/s2.AzchJNDIWlgMXqQWOU5dW', '2022-08-28 00:29:35', '2022-08-28 00:29:35'),
(25, '0SxqxBaOO7', 'UwOPQ59NSJ', '8mwyVhg5Ew@gmail.com', '1990-10-19', 31, 1, 345744, 1, 2, 2, '$2y$10$OCecyhwz.tcwyrweXhgFgukGOC/xct0jgcBftGFQXTNAgruhD6wpu', '2022-08-28 00:29:35', '2022-08-28 00:29:35'),
(26, '6TXGirvX4l', 'P0YbuJTSps', '5REiRQIamX@gmail.com', '1989-05-25', 33, 2, 334822, 3, 1, 1, '$2y$10$PAcn6ykCU0E3F1FtHGtdDuM9i.12aN2nMPv.GJG/cy9NFot9UaV.2', '2022-08-28 00:29:35', '2022-08-28 00:29:35'),
(27, 'cduCEsYzC0', 'PAe4iw3NKg', 'osSQXAr141@gmail.com', '1960-03-17', 62, 3, 416327, 3, 2, 1, '$2y$10$KEJeLiXlV4Ev6O4AF.zkhOai1hxWPPlTXCi6so3RGQySVfLlcaEki', '2022-08-28 00:29:35', '2022-08-28 00:29:35'),
(28, 'iEWPC7ErkC', 'xKqZPnXs8N', 'X75YnzFy7s@gmail.com', '1998-07-22', 24, 3, 947831, 1, 2, 1, '$2y$10$hYIj3Ro4BinmKIk2ojWjeOQJJPUENgz8AYBMNuKm2xdPd3zuN8btq', '2022-08-28 00:29:35', '2022-08-28 00:29:35'),
(29, 'Wrmv2IkR6o', 'aVaBqMvv7r', '4ttwcX6yEp@gmail.com', '1967-05-21', 55, 3, 351842, 3, 2, 1, '$2y$10$Qu80CEn08gdluh68a7eemOswEFDA4QrSbzOA1eIj/3ldG.RihgNhe', '2022-08-28 00:29:36', '2022-08-28 00:29:36'),
(30, 'rr5bKhILCX', 'cKfZQrcnND', 'NYkvxkTNxj@gmail.com', '1985-05-09', 37, 2, 712720, 1, 1, 2, '$2y$10$OQ5jygWX/JsGRoNFmRl0neDH2KvVrMmYv4MWwbZeGnR/M2Nz.c5lm', '2022-08-28 00:29:36', '2022-08-28 00:29:36'),
(31, 'ZtXyKzoQWE', 'hLwgAdC4dF', 'l9iGHaqpsA@gmail.com', '1989-07-17', 33, 1, 327191, 1, 2, 2, '$2y$10$2eINUbfa7F04lrMcRookAe1/AgJJvjHIVXOJkKC3LBdYCI7BmP882', '2022-08-28 00:29:36', '2022-08-28 00:29:36'),
(32, 'PNKP8REalY', 'APQoC8LbTT', 'X9qaHfSkni@gmail.com', '1968-02-08', 54, 2, 789339, 3, 2, 2, '$2y$10$bExTzhRrQRz5Z14Plv.pPOG8VqvkmDyZxv.CtDsbWbQQ9NVJS9VoG', '2022-08-28 00:29:36', '2022-08-28 00:29:36'),
(33, 'sDHEYrzwJ4', 'quVxdtTVrU', 'IPfdeHRVQn@gmail.com', '1989-09-05', 33, 3, 958268, 1, 1, 2, '$2y$10$lK0./jRu6illG0GDeLcMJew87yn3cPtPosoERe5gaTZ8wK.WFPxF6', '2022-08-28 00:29:36', '2022-08-28 00:29:36'),
(34, 'Q6P3Kj5684', 'dgcYwvYpE2', 'jMOgAsz1Lw@gmail.com', '1984-07-15', 38, 2, 128819, 2, 1, 2, '$2y$10$Y5VFn/EQuOE65zDRFEeDOucK6tuIv2EDeMXHtCLmdOvjKIWYETUkq', '2022-08-28 00:29:36', '2022-08-28 00:29:36'),
(35, 'Rv1UXlQykf', 'b2XWNhD2wZ', '4OOYlGEcjl@gmail.com', '1973-12-22', 48, 1, 235648, 3, 2, 2, '$2y$10$Y.xt88LEaREOK5yUuL5ho.DUgokeaM9A4yDtbpp7rCfTGL41GYWPS', '2022-08-28 00:29:36', '2022-08-28 00:29:36'),
(36, 'llJafkqWUL', 'OWDI31nb9w', 'v4LqNpewpl@gmail.com', '1984-07-26', 38, 2, 686308, 3, 2, 2, '$2y$10$qfg3cOJuC6u.NQnPBXgmB.k3mE.Pl.uU7Ba35owolmNvPcc9ZvDeS', '2022-08-28 00:29:36', '2022-08-28 00:29:36'),
(37, 'pHH8inX5tu', 'IqLhfm67Ec', 'KMMOWCHpwV@gmail.com', '1973-01-26', 49, 1, 423146, 1, 2, 1, '$2y$10$otfUyUw5Fd4IQZzRAOEll.zrzmGDXuAXQ85WnAo7S63EN7kY9KD9G', '2022-08-28 00:29:36', '2022-08-28 00:29:36'),
(38, '4mMMw0Hexm', 'HgovEGZ2OT', 'niVXkOOIza@gmail.com', '1999-04-28', 23, 1, 272937, 1, 2, 2, '$2y$10$vCABKYHPPpZ2s0Y0y0p9UOfnWLZH4UR2QgpPli.vMXUCLCNfzbe/.', '2022-08-28 00:29:36', '2022-08-28 00:29:36'),
(39, 'QIRRNEp9QH', '2vV01sCTTE', 's0vmOvN2hh@gmail.com', '1975-03-25', 47, 3, 409693, 3, 1, 1, '$2y$10$gZvjCRPMdQEE.0vSHm0QdugJ8QPRy8MzhOPA8Bnum1UKOiczZBhhy', '2022-08-28 00:29:36', '2022-08-28 00:29:36'),
(40, 'acSKPIT0qr', 'XQXVsBrYyR', 'A1eU9ON1nW@gmail.com', '1996-10-24', 25, 2, 433731, 1, 2, 2, '$2y$10$6MN6tswPGANbXMN0luP9c.5bsd1rV.FSCuMG0cntdRgPbbAbzaPrq', '2022-08-28 00:29:36', '2022-08-28 00:29:36'),
(41, '3aZQOp7PMd', 'crTTE3ukoP', 'GJI35A6X1d@gmail.com', '1983-04-18', 39, 1, 862539, 1, 1, 1, '$2y$10$08SNlxWTG4qt3Uk8nrBHq.NPKxhcynzFFy165veeexgr8g49jtc5a', '2022-08-28 00:29:36', '2022-08-28 00:29:36'),
(42, '3FF7McLBRT', '7dW8TVUfks', 'info@test.com', '1974-04-09', 48, 3, 250077, 3, 2, 1, '$2y$10$5dLYypmxONpup9FxhTAI8.bNTgsew0ory70dat04pOtmYAA0zWCOi', '2022-08-28 00:29:36', '2022-08-28 00:29:36'),
(43, 'O1UA60JjeK', 'xYBVt5son4', 'wo7jBHOytO@gmail.com', '1991-02-03', 31, 1, 426799, 2, 2, 2, '$2y$10$e/rPcwZIdkOdzYjOUvI7KOfdu6ww4N8ZhckcOSm8MMJXWu9J6oevW', '2022-08-28 00:29:36', '2022-08-28 00:29:36'),
(44, 'MxAaqof1DN', 'uiXLoDObtq', 'JJqoc1m4a8@gmail.com', '1980-06-29', 42, 3, 622835, 2, 2, 1, '$2y$10$G7pnLs1bgm69Pj.SHlCVo.pp7h36O/uNGUgOrw5h1sFeyLpqDntGe', '2022-08-28 00:29:36', '2022-08-28 00:29:36'),
(45, 'h6tFDfRw1u', 'tkPMc871J6', 'AxxPohMJFK@gmail.com', '1965-10-14', 56, 2, 353183, 3, 2, 2, '$2y$10$h3GHuCMY12S.u7qyzPTbbeUclEKtb6otwxKxM6.2IsPFEDE1vlXny', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(46, 's4wogma5Qv', 'twvbh73Cgl', '7g7sbJ9Byq@gmail.com', '1973-11-10', 48, 1, 923141, 1, 2, 2, '$2y$10$E.FyPnzyvCJ7qrF3sumSdeuJsrPhARqwV2MDdWPGnFMXoMImmR3d2', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(47, 'YErWZHMvYy', 'VPKshyK8Kr', 'im9UPWnjrG@gmail.com', '1965-10-16', 56, 2, 837332, 3, 2, 1, '$2y$10$kjrnYkeNKE78PBPCB0FYme74MqIexIGjFFgFkMiM.nNqp7h2SJQE.', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(48, 'baN7JiQZcN', 'QpQv42Mjbu', 'X3tsKiuPM0@gmail.com', '1981-09-30', 40, 2, 769660, 3, 1, 2, '$2y$10$EMEyjFGGD1OkvYS4sOp9NeGYwmCrqIKxZ3wEpPJdgpzHSEdf7dJee', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(49, 'oEP9ca85Ed', 'QEzaLL6Nsp', 'aYdNMyVZQr@gmail.com', '1994-03-08', 28, 1, 156249, 3, 1, 2, '$2y$10$LHS7.nSnWhrPeIF/UehYw.7A/WQA.sCce3DCZtCnvQBYoDAwGJ16a', '2022-08-28 00:29:37', '2022-08-28 00:29:37'),
(50, 'G0lC3jhCsF', 'OoWYb3X7QA', 'PN1ZZkoOal@gmail.com', '1997-02-12', 25, 2, 891642, 3, 2, 2, '$2y$10$h7wh31wfK7tUKF3l.R.paOR9VOWwhZTFwlQZ6Yv6yM5etMJbjpu36', '2022-08-28 00:29:37', '2022-08-28 00:29:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner_preference`
--
ALTER TABLE `partner_preference`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `partner_preference`
--
ALTER TABLE `partner_preference`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
