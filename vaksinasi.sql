-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 16, 2022 at 07:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaksinasi`
--

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
(5, '2022_06_23_134531_create_table_regionals', 1),
(6, '2022_06_24_045027_create_table_users_vaksin', 1),
(7, '2022_06_24_053125_create_table_hospital', 1),
(8, '2022_06_24_054000_create_table_vaccins', 1),
(9, '2022_06_24_054424_create_table_spots_vaccins', 1),
(10, '2022_06_24_055117_create_table_vaccinations', 1),
(11, '2022_06_27_162047_create_table_officer', 1),
(12, '2022_06_27_163016_create_table_consultations', 1);

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
-- Table structure for table `table_consultations`
--

CREATE TABLE `table_consultations` (
  `id_consultations` bigint(20) UNSIGNED NOT NULL,
  `users_consultations` bigint(20) UNSIGNED NOT NULL,
  `disease_history` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_symptoms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `officer_consultations` bigint(20) UNSIGNED NOT NULL,
  `status_consultations` enum('pending','accepted','cancel') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `number_consultations` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_hospital`
--

CREATE TABLE `table_hospital` (
  `id_hospital` bigint(20) UNSIGNED NOT NULL,
  `name_hospital` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_hospital` bigint(20) UNSIGNED NOT NULL,
  `name_doctor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_hospital`
--

INSERT INTO `table_hospital` (`id_hospital`, `name_hospital`, `location_hospital`, `name_doctor`, `created_at`, `updated_at`) VALUES
(1, 'Puskesmas somagede', 1, 'Prof Agung pambudi', NULL, NULL),
(2, 'RSUD Banyumas', 1, 'Prof Herry sumargo', NULL, NULL),
(3, 'RSUD Siaga Medika', 1, 'Dr Herman', NULL, NULL),
(4, 'Puskesmas Purbalingga', 3, 'Dr Verronica', NULL, NULL),
(5, 'Puskesmas 1 Susukan', 2, 'Dr Abraham', NULL, NULL),
(6, 'Puskesmas 2 Susukan', 2, 'Dr Chriss', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_officer`
--

CREATE TABLE `table_officer` (
  `id_officer` bigint(20) UNSIGNED NOT NULL,
  `id_card_officer` int(11) NOT NULL,
  `name_officer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_officer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regionals_officer` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_officer`
--

INSERT INTO `table_officer` (`id_officer`, `id_card_officer`, `name_officer`, `password_officer`, `regionals_officer`) VALUES
(1, 1234, 'Dr Budi', '$2y$10$.t7A5ZksEtcRO.kGxli1Ou1O6PY018rs1hIXsyK4Y2xpu1qc9yVmu', 1),
(2, 4567, 'Dr Alex', '$2y$10$43EK8Bpn2kOIfXAgtcL6huTSVB7xUFKc0Ks2vXHiGPv2EPp24b4Vy', 2),
(3, 78910, 'Dr Purnomo', '$2y$10$3XadMMXq2LqjlAJr17cQ..uk.q9tifdOfURO4StgwBXN4BeZnAqG6', 3);

-- --------------------------------------------------------

--
-- Table structure for table `table_regionals`
--

CREATE TABLE `table_regionals` (
  `id_regionals` bigint(20) UNSIGNED NOT NULL,
  `name_regionals` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_regionals`
--

INSERT INTO `table_regionals` (`id_regionals`, `name_regionals`) VALUES
(1, 'Banyumas'),
(2, 'Banjarnegara'),
(3, 'Purbalingga');

-- --------------------------------------------------------

--
-- Table structure for table `table_users_vaksin`
--

CREATE TABLE `table_users_vaksin` (
  `id_users_vaksin` bigint(20) UNSIGNED NOT NULL,
  `id_card_users_vaksin` int(10) UNSIGNED NOT NULL,
  `password_users_vaksin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_users_vaksin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_users_vaksin` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `born_date_users_vaksin` date NOT NULL,
  `regionals_users_vaksin` bigint(20) UNSIGNED NOT NULL,
  `login_tokens_users` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_users_vaksin`
--

INSERT INTO `table_users_vaksin` (`id_users_vaksin`, `id_card_users_vaksin`, `password_users_vaksin`, `name_users_vaksin`, `gender_users_vaksin`, `born_date_users_vaksin`, `regionals_users_vaksin`, `login_tokens_users`, `created_at`, `updated_at`) VALUES
(1, 316272500, '$2y$10$rYLwYpX64RTmJjcWwyEHhOzjLyeolaE3lj0Rlz88GzdxxecD2ZJtW', 'Mr. Gabe Krajcik DVM', 'male', '2005-07-12', 1, '54baf76f72d1a2d91e7eda0092a55ca7', '2022-07-15 20:07:59', '2022-07-16 03:51:47'),
(2, 1376297007, '$2y$10$5AYBYmJxpMIzH3HmTFc/bOpJluWjhUvkiBhA8gNI5Xph99nQWR1uq', 'Niko Macejkovic', 'male', '1984-08-25', 3, NULL, '2022-07-15 20:07:59', '2022-07-15 20:07:59'),
(3, 1970408531, '$2y$10$gVBxE/lQnNZz1Sc7lK2zxuNhnG/zcaRZGs57jKfJxLfEn2wXfgQtS', 'Jamie Keeling V', 'male', '1995-11-03', 2, NULL, '2022-07-15 20:07:59', '2022-07-15 20:07:59'),
(4, 800967400, '$2y$10$17i.Nj8TwJyzCeZNzknrOepnYljJOBODXsUOjDsUzIzs5AGlzFbGe', 'Oscar Friesen', 'male', '1995-11-30', 1, NULL, '2022-07-15 20:07:59', '2022-07-15 20:07:59'),
(5, 1023014677, '$2y$10$iH.e/baJskCkb8wBLPmK.eO39sadHrvXg3Ctv8HDPjiWQ5h4RqxuK', 'Prof. Ignatius Green Jr.', 'male', '2006-04-12', 1, NULL, '2022-07-15 20:07:59', '2022-07-15 20:07:59'),
(6, 1426905125, '$2y$10$hBtcU7shoht1htNlzSF6cOJfZ0A6gYT3U8Ym3D4dS6yza4Y9VrWFy', 'Kenneth Lesch', 'male', '1973-10-20', 2, NULL, '2022-07-15 20:07:59', '2022-07-15 20:07:59'),
(7, 1612176872, '$2y$10$4Nph8.vBJno3ng27jEL9Qewd6PwyYQjbbJ/2pekQ1fpzIzOm/KeJC', 'Jasen Bahringer', 'male', '1976-08-11', 3, NULL, '2022-07-15 20:07:59', '2022-07-15 20:07:59'),
(8, 1781271705, '$2y$10$0gJE33/jECEDvTl1.gXj2.jaObHwo5o5nQf/0u2D11Lr05SFgvHPK', 'Prof. Zachariah Hamill MD', 'male', '2010-05-04', 1, NULL, '2022-07-15 20:07:59', '2022-07-15 20:07:59'),
(9, 506624816, '$2y$10$V2HOsoMUBPwQI5Cw5A9FVe4RCMJAkD7MnKC7Sj5jGoXqUL4Ou7T16', 'Jack Willms', 'male', '2005-01-31', 3, NULL, '2022-07-15 20:07:59', '2022-07-15 20:07:59'),
(10, 838231591, '$2y$10$GUsUDhiekhTzzaYTYLR2TOrmSMgJya28vZqpvnLlBnj5qP5ezIoXm', 'Mateo Tromp Sr.', 'male', '2012-07-16', 1, NULL, '2022-07-15 20:07:59', '2022-07-15 20:07:59');

-- --------------------------------------------------------

--
-- Table structure for table `table_vaccinations`
--

CREATE TABLE `table_vaccinations` (
  `id_vaccinations` bigint(20) UNSIGNED NOT NULL,
  `users_vaccinations` bigint(20) UNSIGNED NOT NULL,
  `dose_vaccinations` int(10) UNSIGNED NOT NULL,
  `date_vaccinations` date NOT NULL,
  `locations_vaccins` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `table_consultations`
--
ALTER TABLE `table_consultations`
  ADD PRIMARY KEY (`id_consultations`),
  ADD KEY `table_consultations_users_consultations_foreign` (`users_consultations`),
  ADD KEY `table_consultations_officer_consultations_foreign` (`officer_consultations`);

--
-- Indexes for table `table_hospital`
--
ALTER TABLE `table_hospital`
  ADD PRIMARY KEY (`id_hospital`),
  ADD KEY `table_hospital_location_hospital_foreign` (`location_hospital`);

--
-- Indexes for table `table_officer`
--
ALTER TABLE `table_officer`
  ADD PRIMARY KEY (`id_officer`),
  ADD KEY `table_officer_regionals_officer_foreign` (`regionals_officer`);

--
-- Indexes for table `table_regionals`
--
ALTER TABLE `table_regionals`
  ADD PRIMARY KEY (`id_regionals`);

--
-- Indexes for table `table_users_vaksin`
--
ALTER TABLE `table_users_vaksin`
  ADD PRIMARY KEY (`id_users_vaksin`),
  ADD KEY `table_users_vaksin_regionals_users_vaksin_foreign` (`regionals_users_vaksin`);

--
-- Indexes for table `table_vaccinations`
--
ALTER TABLE `table_vaccinations`
  ADD PRIMARY KEY (`id_vaccinations`),
  ADD KEY `table_vaccinations_users_vaccinations_foreign` (`users_vaccinations`),
  ADD KEY `table_vaccinations_locations_vaccins_foreign` (`locations_vaccins`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_consultations`
--
ALTER TABLE `table_consultations`
  MODIFY `id_consultations` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table_hospital`
--
ALTER TABLE `table_hospital`
  MODIFY `id_hospital` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `table_officer`
--
ALTER TABLE `table_officer`
  MODIFY `id_officer` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table_regionals`
--
ALTER TABLE `table_regionals`
  MODIFY `id_regionals` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table_users_vaksin`
--
ALTER TABLE `table_users_vaksin`
  MODIFY `id_users_vaksin` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `table_vaccinations`
--
ALTER TABLE `table_vaccinations`
  MODIFY `id_vaccinations` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `table_consultations`
--
ALTER TABLE `table_consultations`
  ADD CONSTRAINT `table_consultations_officer_consultations_foreign` FOREIGN KEY (`officer_consultations`) REFERENCES `table_officer` (`id_officer`),
  ADD CONSTRAINT `table_consultations_users_consultations_foreign` FOREIGN KEY (`users_consultations`) REFERENCES `table_users_vaksin` (`id_users_vaksin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `table_hospital`
--
ALTER TABLE `table_hospital`
  ADD CONSTRAINT `table_hospital_location_hospital_foreign` FOREIGN KEY (`location_hospital`) REFERENCES `table_regionals` (`id_regionals`);

--
-- Constraints for table `table_officer`
--
ALTER TABLE `table_officer`
  ADD CONSTRAINT `table_officer_regionals_officer_foreign` FOREIGN KEY (`regionals_officer`) REFERENCES `table_regionals` (`id_regionals`);

--
-- Constraints for table `table_users_vaksin`
--
ALTER TABLE `table_users_vaksin`
  ADD CONSTRAINT `table_users_vaksin_regionals_users_vaksin_foreign` FOREIGN KEY (`regionals_users_vaksin`) REFERENCES `table_regionals` (`id_regionals`);

--
-- Constraints for table `table_vaccinations`
--
ALTER TABLE `table_vaccinations`
  ADD CONSTRAINT `table_vaccinations_locations_vaccins_foreign` FOREIGN KEY (`locations_vaccins`) REFERENCES `table_hospital` (`id_hospital`),
  ADD CONSTRAINT `table_vaccinations_users_vaccinations_foreign` FOREIGN KEY (`users_vaccinations`) REFERENCES `table_users_vaksin` (`id_users_vaksin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
