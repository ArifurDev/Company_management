-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 15, 2023 at 04:35 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reporting_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminriports`
--

CREATE TABLE `adminriports` (
  `id` bigint UNSIGNED NOT NULL,
  `house_rent` int DEFAULT '0',
  `gard_bill` int DEFAULT '0',
  `electricity_bill` int DEFAULT '0',
  `sewerage_bill` int DEFAULT '0',
  `expanse` int DEFAULT '0',
  `personal` int DEFAULT '0',
  `water_bill` int DEFAULT '0',
  `fewa_bill` int DEFAULT '0',
  `wifi_bill` int DEFAULT '0',
  `a` int DEFAULT '0',
  `b` int DEFAULT '0',
  `c` int DEFAULT '0',
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `total` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminriports`
--

INSERT INTO `adminriports` (`id`, `house_rent`, `gard_bill`, `electricity_bill`, `sewerage_bill`, `expanse`, `personal`, `water_bill`, `fewa_bill`, `wifi_bill`, `a`, `b`, `c`, `note`, `total`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 19, 86, 49, 47, 20, 76, 10, 95, 43, 33, 84, 53, 'Voluptate voluptas a', 615, '2023-04-14 12:28:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `billdates`
--

CREATE TABLE `billdates` (
  `id` bigint UNSIGNED NOT NULL,
  `house_rent` date DEFAULT NULL,
  `gard_bill` date DEFAULT NULL,
  `electricity_bill` date DEFAULT NULL,
  `sewerage_bill` date DEFAULT NULL,
  `water_bill` date DEFAULT NULL,
  `fewa_bill` date DEFAULT NULL,
  `wifi_bill` date DEFAULT NULL,
  `a` date DEFAULT NULL,
  `b` date DEFAULT NULL,
  `c` date DEFAULT NULL,
  `empolyee` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billdates`
--

INSERT INTO `billdates` (`id`, `house_rent`, `gard_bill`, `electricity_bill`, `sewerage_bill`, `water_bill`, `fewa_bill`, `wifi_bill`, `a`, `b`, `c`, `empolyee`, `created_at`, `updated_at`) VALUES
(1, '2020-02-07', '2022-12-01', '1983-07-09', '2023-11-27', '1982-07-04', '2010-10-26', '1991-05-25', '1971-03-03', '2010-11-28', '1985-05-05', '2023-04-28', '2023-04-14 10:24:05', '2023-04-15 03:45:44');

-- --------------------------------------------------------

--
-- Table structure for table `comopanies`
--

CREATE TABLE `comopanies` (
  `id` bigint UNSIGNED NOT NULL,
  `compony_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comopanies`
--

INSERT INTO `comopanies` (`id`, `compony_name`, `created_at`, `updated_at`) VALUES
(1, 'al sudata', '2023-04-14 10:29:50', '2023-04-14 10:29:50'),
(3, 'Royle', '2023-04-14 12:26:43', '2023-04-14 12:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `empolyeereports`
--

CREATE TABLE `empolyeereports` (
  `id` bigint UNSIGNED NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empolyee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `incoming_card` int NOT NULL,
  `incoming_cash` int NOT NULL,
  `incoming` int DEFAULT '0',
  `outgoing` int DEFAULT '0',
  `cash` int DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `empolyeereports`
--

INSERT INTO `empolyeereports` (`id`, `company`, `empolyee`, `incoming_card`, `incoming_cash`, `incoming`, `outgoing`, `cash`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'al sudata', 'user@gmail.com', 1000, 1000, 2000, 1000, 1000, 'jo', '2023-04-03 10:33:22', NULL, NULL),
(3, 'al sudata', 'user@gmail.com', 1000, 1000, 2000, 1000, 1000, 'hi', '2023-04-14 12:20:06', NULL, NULL),
(4, 'al sudata', 'user.two@gmail.com', 2000, 2000, 4000, 2000, 2000, 'hi', '2023-04-14 12:26:24', NULL, NULL),
(5, 'Royle', 'user.two@gmail.com', 3000, 3000, 6000, 3000, 3000, 'ji', '2023-04-14 12:27:20', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `empolyees`
--

CREATE TABLE `empolyees` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loanrecivesidules`
--

CREATE TABLE `loanrecivesidules` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_due` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `installment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recive_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `name`, `email`, `number`, `amount`, `recive_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'lunit', 'ziho@mailinator.com', '019608080', '50000', '2013-03-04', '2023-04-14 12:29:01', '2023-04-14 12:29:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loansendshidules`
--

CREATE TABLE `loansendshidules` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_due` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `installment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loansendshidules`
--

INSERT INTO `loansendshidules` (`id`, `name`, `email`, `amount`, `amount_due`, `installment`, `payment_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'lunit', 'ziho@mailinator.com', '10000', '40000', '1', '2023-04-15', '2023-04-14 12:29:52', '2023-04-14 12:29:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_03_29_110638_create_sessions_table', 1),
(7, '2023_03_30_043854_create_empolyees_table', 1),
(8, '2023_03_30_044250_add_colum_to_users_table', 1),
(9, '2023_03_31_060050_create_empolyeereports_table', 1),
(10, '2023_04_01_091402_create_adminriports_table', 1),
(11, '2023_04_01_092741_create_siteriports_table', 1),
(12, '2023_04_08_063017_create_comopanies_table', 1),
(13, '2023_04_10_130855_create_loans_table', 1),
(14, '2023_04_11_075035_create_reciveloans_table', 1),
(15, '2023_04_11_164320_create_loanrecivesidules_table', 1),
(16, '2023_04_12_103013_create_loansendshidules_table', 1),
(17, '2023_04_14_094511_create_billdates_table', 1);

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
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reciveloans`
--

CREATE TABLE `reciveloans` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recive_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2omHBD8EdqzN7Xx9ZtWnlkIwH1fD3afmvMsK3EUA', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidWFPSUx4NmNEZ2g2Mndwajg0WWF2MFpiMW1JNVZJOEs3NTIxQ2N0SSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRDa3pEVnBiMmx2UFU0akdZNEJDbnhlQS9rT1FqdkNQT2RJTHRKSmx3Uno3TTNaQzlyY0hqTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wYXltZW50L2RhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1681551949),
('gcG1MpsFW8PAPdWS7McADSH3cz3ZXuUxPCBZre42', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiS2UwZmtsSXZwczZiMzJjWEJSMUpYWlRRS2ZHTFJ1Wkd0ZGhWRXhGUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zaG93L2VtcG9seWVlL3JlcG9ydCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkSXdvVnA0ekFGek5aWmN6cWhmLkhwZXZhdDdyOWdKUS54WWlRYlNHb3pxdjJaWm03ZEcvdEciO30=', 1681496445),
('iHA6a4NnLhw3JzxaFpNInj2xqGMoN0lDWMtGB8mp', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMmxzM2dKY2NrSEh4SVg3UnM2OEZDeEhTUHd1SVRMSjVnaXpFd2l2ayI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRDa3pEVnBiMmx2UFU0akdZNEJDbnhlQS9rT1FqdkNQT2RJTHRKSmx3Uno3TTNaQzlyY0hqTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL3Byb2ZpbGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1681551804),
('kV8zDZ7y94v8XfXpULcZfGyDkTGbP49k7nrpTrW4', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibVZhRTBEa2V2ZXEyc09kZ2huQzNtNWVxaXZUZTF0cE10OE9lOUFSNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jcmVhdGUvZW1wb2x5ZWUvcmVwb3J0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCQwcW1RMlQ5SUlpN2VpbmNPanJoV1Z1OEdTakM5YUJKREptM1NwMXBPY2ZZRmdTMFRTaG02UyI7fQ==', 1681496840),
('MjP9tsoH36vg3OCkHWvoFSzdgaJnCG9VMFYk7NDE', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiMDE5T0lsZjNuQ0ljeGtyNGJsUzI4dFVrWVI4ZEQ3OFN4NHE0Q3JZaiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFpbHkvY29tb3BhbnkvcmVwb3J0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRDa3pEVnBiMmx2UFU0akdZNEJDbnhlQS9rT1FqdkNQT2RJTHRKSmx3Uno3TTNaQzlyY0hqTyI7fQ==', 1681498775),
('yp7Fse63Xtearlkw2QqEuTwL8HNHazzRHeY6RBlG', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSmo4aTZnWWdWVXVnTnNvOHV1YnBxMU04ekZKaThidnBuMFJTY01DNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wYXltZW50L2RhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJENrekRWcGIybHZQVTRqR1k0QkNueGVBL2tPUWp2Q1BPZElMdEpKbHdSejdNM1pDOXJjSGpPIjt9', 1681539817);

-- --------------------------------------------------------

--
-- Table structure for table `siteriports`
--

CREATE TABLE `siteriports` (
  `id` bigint UNSIGNED NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` longtext COLLATE utf8mb4_unicode_ci,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int DEFAULT '0',
  `password` text COLLATE utf8mb4_unicode_ci,
  `why_create` longtext COLLATE utf8mb4_unicode_ci,
  `number` text COLLATE utf8mb4_unicode_ci,
  `verifi_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siteriports`
--

INSERT INTO `siteriports` (`id`, `company`, `email`, `site_name`, `url`, `user_name`, `user_id`, `password`, `why_create`, `number`, `verifi_code`, `payment_date`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Royle', 'suqises@mailinator.com', 'Grant Newman', 'https://www.zipybasygasaq.com', 'ciqiluke', 53, 'Sunt est quis velit', 'Qui nobis et quam cu', '923', '75', '1989-08-29', 'Veniam est id sapi', '2023-04-14 12:30:36', '2023-04-14 12:30:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `number` int DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `compony_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `number`, `role`, `compony_name`, `gender`) VALUES
(1, 'admin', 'arifurrahmanrifat72@gmail.com', '2023-04-14 10:24:04', '$2y$10$CkzDVpb2lvPU4jGY4BCnxeA/kOQjvCPOdILtJJlwRz7M3ZC9rcHjO', NULL, NULL, NULL, 'qyCzBa5ByoamOV4zfAeBtJBKk6FwoOeVvZQBR3QC54QDXBgt7SaNzGPXLqQb', NULL, NULL, '2023-04-14 10:24:04', '2023-04-15 03:43:51', NULL, 'admin', NULL, NULL),
(2, 'user', 'user@gmail.com', '2023-04-14 10:31:59', '$2y$10$IwoVp4zAFzNZZczqhf.Hpevat7r9gJQ.xYiQbSGozqv2ZZm7dG/tG', NULL, NULL, NULL, 'EYRG40evC5ZrSH75kDIKEZb7I1ZS54V01Op4vixaGQ4s8WyjghVCrivjSa5C', NULL, NULL, '2023-04-14 10:31:59', NULL, 1727495710, 'empolyees', 'al sudata', 'male'),
(4, 'Solomon Boone', 'user.two@gmail.com', '2023-04-14 12:22:02', '$2y$10$0qmQ2T9IIi7eincOjrhWVu8GSjC9aBJDJm3Sp1pOcfYFgS0TShm6S', NULL, NULL, NULL, 'IhGiRiY1hM7ZVATPpkSuey0wqH37VCpWxxVaONY9yUO3kiRoTgMBKcpazxu7', NULL, NULL, '2023-04-14 12:22:02', '2023-04-14 12:27:02', 898, 'empolyees', 'Royle', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminriports`
--
ALTER TABLE `adminriports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billdates`
--
ALTER TABLE `billdates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comopanies`
--
ALTER TABLE `comopanies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empolyeereports`
--
ALTER TABLE `empolyeereports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empolyees`
--
ALTER TABLE `empolyees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `loanrecivesidules`
--
ALTER TABLE `loanrecivesidules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loansendshidules`
--
ALTER TABLE `loansendshidules`
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
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reciveloans`
--
ALTER TABLE `reciveloans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `siteriports`
--
ALTER TABLE `siteriports`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `adminriports`
--
ALTER TABLE `adminriports`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billdates`
--
ALTER TABLE `billdates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comopanies`
--
ALTER TABLE `comopanies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `empolyeereports`
--
ALTER TABLE `empolyeereports`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `empolyees`
--
ALTER TABLE `empolyees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loanrecivesidules`
--
ALTER TABLE `loanrecivesidules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loansendshidules`
--
ALTER TABLE `loansendshidules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reciveloans`
--
ALTER TABLE `reciveloans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siteriports`
--
ALTER TABLE `siteriports`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
