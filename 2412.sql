-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table bangla_call.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bangla_call.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table bangla_call.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bangla_call.migrations: ~0 rows (approximately)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2014_10_12_100000_create_password_resets_table', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(6, '2024_12_23_103911_create_permissions_table', 1),
	(7, '2024_12_23_103928_create_user_permissions_table', 1);

-- Dumping structure for table bangla_call.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bangla_call.password_resets: ~0 rows (approximately)

-- Dumping structure for table bangla_call.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bangla_call.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table bangla_call.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bangla_call.permissions: ~12 rows (approximately)
REPLACE INTO `permissions` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Dashboard', NULL, NULL),
	(2, 'Approved Option', NULL, NULL),
	(3, 'Decline Option', NULL, NULL),
	(4, 'View Button', NULL, NULL),
	(5, 'Edit Button', NULL, NULL),
	(6, 'Delete Button', NULL, NULL),
	(7, 'Permission settings', NULL, NULL),
	(8, 'Approve Button', NULL, NULL),
	(9, 'Decline Button', NULL, NULL),
	(10, 'Dashboard Option', NULL, NULL),
	(11, 'Sub Admin Option', NULL, NULL),
	(12, 'Change Password', NULL, NULL);

-- Dumping structure for table bangla_call.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bangla_call.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table bangla_call.registrations
CREATE TABLE IF NOT EXISTS `registrations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `nid` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `iptsp` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `reff` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `type` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `photo1` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `photo2` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `nid_photo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `address` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `billing` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `status` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table bangla_call.registrations: ~26 rows (approximately)
REPLACE INTO `registrations` (`id`, `full_name`, `phone`, `email`, `nid`, `iptsp`, `reff`, `type`, `photo1`, `photo2`, `nid_photo`, `address`, `billing`, `status`, `created_at`, `updated_at`) VALUES
	(30, 'asda', '2342135125', 'mr.sz9991@gmail.com', '23423423432', '234234234234', 'sadasdasd', 'Personal', '675550fbbca8a.jpg', '675550fbbdd3c.png', '675550fbbeca8.png', '31241234342', 'asfasfasfasfasfasfasf', '1', '2024-12-14 09:04:39', '2024-12-14 03:04:39'),
	(32, 'Sazzad Hossain', '01725378233', 'sazzad@gmail.com', '1234124124124', '2342352352134', 'Asdkasdd', 'Corporate', '67556fd7c3aea.jpg', '67556fd7c4c79.jpg', '67556fd7c5046.jpg', 'Pabna sadar,pabna', 'Natore sadar', '2', '2024-12-08 10:08:01', '2024-12-08 04:08:01'),
	(33, 'sdafjlasf', '324234234', 'sdasd@fjksf.asfas', '32423423', '234234', 'dfsdf', 'Corporate', '675673b382ddf.jpg', '675673b39f2c1.jpg', '675673b39f660.jpg', 'asdasdasdas', 'asdasd', '1', '2024-12-09 05:29:11', '2024-12-08 23:29:11'),
	(34, 'sadfsad', '324234', 'asdasd@asd.asd', '324234', '234234', 'asdasd', 'Personal', '6756742260dcd.jpg', '6756742261d41.png', '6756742267b8d.jpg', 'asdasddsa', 'dasdasd', '1', '2024-12-09 05:47:40', '2024-12-08 23:47:40'),
	(35, 'jhgljhi', '67547', 'ghjfchgj@ghk.com', '986897', '569969599678', 'ujylgfulj', 'Corporate', '6756761887d1b.jpg', '6756761888c97.jpg', '6756761889007.png', 'hjkgfvkjhfu', 'uyfuyujhv', '2', '2024-12-09 05:47:49', '2024-12-08 23:47:49'),
	(36, 'sdasdas', '2314124', 'mr.sz9991@gmail.com', '23423', '32423', 'asdda', 'Corporate', '675678cd5717e.jpg', '675678cd5828f.jpg', '675678cd586d5.png', 'asdasd', 'asdas', '1', '2024-12-15 07:26:37', '2024-12-15 01:26:37'),
	(37, 'last test', '34234', 'sdasd@fasaf.fdsa', '32423', '23423', 'asdasd', 'Personal', '675d49c2bc663.jpg', '67567929d6fb5.jpg', '67567929d736e.jpg', 'sadas', 'sfadas', NULL, '2024-12-14 09:03:23', '2024-12-14 03:03:23'),
	(39, 'sadasd', '324234', 'asdfasd@gfasd.asfas', '235235', '235235', 'sdfsdf', 'Personal', '675d60e674334.png', '675d60e690b4f.png', '675d60e6913a8.png', 'saf3223fsdf', 'fsdfsdf', '1', '2024-12-15 05:04:30', '2024-12-14 23:04:30'),
	(40, 'dsdfsdf', '2345235', '5352@sddsf.sdfsdf', '324523', '23423', 'sdfsdf', 'Personal', '675d60f960407.jpg', '675d60f9614f8.jpg', '675d60f961986.jpg', 'sdfsdfdsf', 'sdfsdf', NULL, '2024-12-14 04:42:01', '2024-12-14 04:42:01'),
	(41, 'dsdfsdf', '2345235', '5352@sddsf.sdfsdf', '324523', '23423', 'sdfsdf', 'Personal', '675d60f960407.jpg', '675d60f9614f8.jpg', '675d60f961986.jpg', 'sdfsdfdsf', 'sdfsdf', NULL, '2024-12-14 04:42:01', '2024-12-14 04:42:01'),
	(42, 'dsdfsdf', '2345235', '5352@sddsf.sdfsdf', '324523', '23423', 'sdfsdf', 'Personal', '675d60f960407.jpg', '675d60f9614f8.jpg', '675d60f961986.jpg', 'sdfsdfdsf', 'sdfsdf', NULL, '2024-12-14 04:42:01', '2024-12-14 04:42:01'),
	(43, 'dsdfsdf', '2345235', '5352@sddsf.sdfsdf', '324523', '23423', 'sdfsdf', 'Personal', '675d60f960407.jpg', '675d60f9614f8.jpg', '675d60f961986.jpg', 'sdfsdfdsf', 'sdfsdf', NULL, '2024-12-14 04:42:01', '2024-12-14 04:42:01'),
	(44, 'dsdfsdf', '2345235', '5352@sddsf.sdfsdf', '324523', '23423', 'sdfsdf', 'Personal', '675d60f960407.jpg', '675d60f9614f8.jpg', '675d60f961986.jpg', 'sdfsdfdsf', 'sdfsdf', '2', '2024-12-18 04:32:42', '2024-12-17 22:32:42'),
	(45, 'dsdfsdf', '2345235', '5352@sddsf.sdfsdf', '324523', '23423', 'sdfsdf', 'Personal', '675d60f960407.jpg', '675d60f9614f8.jpg', '675d60f961986.jpg', 'sdfsdfdsf', 'sdfsdf', '1', '2024-12-18 04:31:58', '2024-12-17 22:31:58'),
	(47, 'dsdfsdf', '2345235', '5352@sddsf.sdfsdf', '324523', '23423', 'sdfsdf', 'Personal', '675d60f960407.jpg', '675d60f9614f8.jpg', '675d60f961986.jpg', 'sdfsdfdsf', 'sdfsdf', NULL, '2024-12-14 04:42:01', '2024-12-14 04:42:01'),
	(48, 'dsdfsdf', '2345235', '5352@sddsf.sdfsdf', '324523', '23423', 'sdfsdf', 'Personal', '675d60f960407.jpg', '675d60f9614f8.jpg', '675d60f961986.jpg', 'sdfsdfdsf', 'sdfsdf', NULL, '2024-12-14 04:42:01', '2024-12-14 04:42:01'),
	(49, 'dsdfsdf', '2345235', '5352@sddsf.sdfsdf', '324523', '23423', 'sdfsdf', 'Personal', '675d60f960407.jpg', '675d60f9614f8.jpg', '675d60f961986.jpg', 'sdfsdfdsf', 'sdfsdf', NULL, '2024-12-14 04:42:01', '2024-12-14 04:42:01'),
	(50, 'dsdfsdf', '2345235', '5352@sddsf.sdfsdf', '324523', '23423', 'sdfsdf', 'Personal', '675d60f960407.jpg', '675d60f9614f8.jpg', '675d60f961986.jpg', 'sdfsdfdsf', 'sdfsdf', NULL, '2024-12-14 04:42:01', '2024-12-14 04:42:01'),
	(51, 'dsdfsdf', '2345235', '5352@sddsf.sdfsdf', '324523', '23423', 'sdfsdf', 'Personal', '675d60f960407.jpg', '675d60f9614f8.jpg', '675d60f961986.jpg', 'sdfsdfdsf', 'sdfsdf', NULL, '2024-12-14 04:42:01', '2024-12-14 04:42:01'),
	(52, 'dsdfsdf', '2345235', '5352@sddsf.sdfsdf', '324523', '23423', 'sdfsdf', 'Personal', '675d60f960407.jpg', '675d60f9614f8.jpg', '675d60f961986.jpg', 'sdfsdfdsf', 'sdfsdf', NULL, '2024-12-14 04:42:01', '2024-12-14 04:42:01'),
	(53, 'dsdfsdf', '2345235', '5352@sddsf.sdfsdf', '324523', '23423', 'sdfsdf', 'Personal', '675d60f960407.jpg', '675d60f9614f8.jpg', '675d60f961986.jpg', 'sdfsdfdsf', 'sdfsdf', NULL, '2024-12-14 04:42:01', '2024-12-14 04:42:01'),
	(54, 'dsdfsdf', '2345235', '5352@sddsf.sdfsdf', '324523', '23423', 'sdfsdf', 'Personal', '675d60f960407.jpg', '675d60f9614f8.jpg', '675d60f961986.jpg', 'sdfsdfdsf', 'sdfsdf', NULL, '2024-12-14 04:42:01', '2024-12-14 04:42:01'),
	(55, 'dsdfsdf', '2345235', '5352@sddsf.sdfsdf', '324523', '23423', 'sdfsdf', 'Personal', '675d60f960407.jpg', '675d60f9614f8.jpg', '675d60f961986.jpg', 'sdfsdfdsf', 'sdfsdf', NULL, '2024-12-14 04:42:01', '2024-12-14 04:42:01'),
	(56, 'Hello', '2345235', '5352@sddsf.sdfsdf', '324523', '23423', 'sdfsdf', 'Personal', '675d60f960407.jpg', '675d60f9614f8.jpg', '675d60f961986.jpg', 'sdfsdfdsf', 'sdfsdf', '1', '2024-12-18 04:37:49', '2024-12-17 22:37:49'),
	(58, 'Slade Romero', '80', 'cufop@mailinator.com', '76', '65', 'Cumque quam exercita', 'Personal', '67664e1cd193b.jpg', '67664e1cd2032.jpg', '67664e1cd2430.jpg', 'Impedit libero eius', 'A qui est voluptatem', NULL, '2024-12-20 23:11:56', '2024-12-20 23:11:56'),
	(59, 'Kareem Coleman', '48', 'qevyg@mailinator.com', '61', '72', 'Est necessitatibus i', 'Corporate', '6766655e02fc8.pdf', '6766655e03d51.jpg', '6766655e04237.jpg', 'Autem repellendus C', 'Aliquam ipsam qui qu', '1', '2024-12-21 07:07:08', '2024-12-21 01:07:08');

-- Dumping structure for table bangla_call.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bangla_call.users: ~2 rows (approximately)
REPLACE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Super Admin', 'super@gmail.com', NULL, '$2y$12$4Csa77IWs5AayHbrviHv5eMyeZvXjNElBcIVln4lZCMSTslnwU1ja', NULL, '2024-12-23 10:58:25', '2024-12-23 10:58:26'),
	(2, 'Admin', 'admin@gmail.com', NULL, '$2y$12$GvEOvVBdbH370nd9BHKBe.w4ZdXZCxhJZxmAiPJtzrVHM/X2f7l0e', NULL, '2024-12-23 10:58:27', '2024-12-23 10:58:27');

-- Dumping structure for table bangla_call.user_permissions
CREATE TABLE IF NOT EXISTS `user_permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `permission_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_permissions_user_id_foreign` (`user_id`),
  KEY `user_permissions_permission_id_foreign` (`permission_id`),
  CONSTRAINT `user_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bangla_call.user_permissions: ~3 rows (approximately)
REPLACE INTO `user_permissions` (`id`, `user_id`, `permission_id`, `created_at`, `updated_at`) VALUES
	(26, 1, 10, '2024-12-23 22:24:46', '2024-12-23 22:24:46'),
	(27, 1, 1, '2024-12-23 22:24:46', '2024-12-23 22:24:46'),
	(28, 1, 2, '2024-12-23 22:24:46', '2024-12-23 22:24:46'),
	(29, 1, 3, '2024-12-23 22:24:46', '2024-12-23 22:24:46'),
	(30, 1, 7, '2024-12-23 22:24:46', '2024-12-23 22:24:46'),
	(31, 1, 11, '2024-12-23 22:24:46', '2024-12-23 22:24:46'),
	(32, 1, 12, '2024-12-23 22:24:46', '2024-12-23 22:24:46'),
	(33, 1, 4, '2024-12-23 22:24:46', '2024-12-23 22:24:46'),
	(34, 1, 5, '2024-12-23 22:24:46', '2024-12-23 22:24:46'),
	(35, 1, 6, '2024-12-23 22:24:46', '2024-12-23 22:24:46'),
	(36, 1, 8, '2024-12-23 22:24:46', '2024-12-23 22:24:46'),
	(37, 1, 9, '2024-12-23 22:24:46', '2024-12-23 22:24:46');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
