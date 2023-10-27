-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2023 at 05:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bootcamp`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `gender` char(1) NOT NULL,
  `phone_number` char(15) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(64) NOT NULL,
  `class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `gender`, `phone_number`, `address`, `email`, `class_id`, `created_at`, `updated_at`) VALUES
(1, 'Tanner Sawayn', 'P', '083217896306', '935 Elza Freeway Suite 565\nSouth Ethelburgh, PA 53021-9088', 'ekoepp@stracke.net', 3, '2023-10-25 16:19:56', '2023-10-25 16:19:56'),
(2, 'Roslyn Schumm', 'P', '083260235246', '94101 Oda Radial\nSouth Nicholastown, MS 79779', 'reva63@hotmail.com', 1, '2023-10-25 16:19:56', '2023-10-25 16:19:56'),
(3, 'Tyrel Cartwright', 'P', '083246385002', '1224 Skiles Locks\nSouth Margaretetown, MI 66922-4557', 'wstroman@wunsch.info', 2, '2023-10-25 16:19:56', '2023-10-25 16:19:56'),
(4, 'Tomasa Fritsch IV', 'L', '08329583228', '264 Germaine Run\nEast Berthaland, WA 68570', 'iharvey@gmail.com', 3, '2023-10-25 16:19:56', '2023-10-25 16:19:56'),
(5, 'Queen Weber', 'P', '083221109543', '215 Greenholt Ville\nSawaynbury, WY 21453-9475', 'dominic.hoeger@koelpin.com', 2, '2023-10-25 16:19:56', '2023-10-25 16:19:56'),
(6, 'Tillman Labadie', 'P', '083267174899', '541 Macejkovic Station\nLake Devin, NM 93369', 'estelle.dicki@adams.com', 5, '2023-10-25 16:19:56', '2023-10-25 16:19:56'),
(7, 'Alvera Blick', 'P', '083213246767', '115 Kay Village Suite 523\nTadmouth, KS 09954', 'xgoyette@smitham.com', 4, '2023-10-25 16:19:56', '2023-10-25 16:19:56'),
(8, 'Dr. Tatyana DuBuque', 'L', '083244832304', '8341 Vern Corner\nMonachester, MD 78226', 'jacquelyn.hermiston@yahoo.com', 2, '2023-10-25 16:19:56', '2023-10-25 16:19:56'),
(9, 'Rhianna Veum', 'P', '083263725912', '31670 Hartmann Union Suite 094\nWest Terrenceton, PA 81319-8835', 'armstrong.cecile@yahoo.com', 5, '2023-10-25 16:19:56', '2023-10-25 16:19:56'),
(10, 'Hailee Pollich', 'P', '083265603713', '94922 Cyrus Spurs Apt. 432\nLake Sallieland, WI 69505-6334', 'ada62@hotmail.com', 5, '2023-10-25 16:19:56', '2023-10-25 16:19:56'),
(11, 'Cathrine Mosciski II', 'L', '083212962690', '27357 Amanda Square Apt. 491\nLake Milo, AL 74337-9425', 'bode.savanah@yahoo.com', 5, '2023-10-25 16:19:56', '2023-10-25 16:19:56'),
(12, 'Prof. Garrett D\'Amore PhD', 'P', '083245953043', '4320 Willms Glens\nNew Houstonburgh, NC 12084-0209', 'aniya34@yahoo.com', 2, '2023-10-25 16:19:56', '2023-10-25 16:19:56'),
(13, 'Prof. Gwendolyn Daniel I', 'P', '0832784707', '54287 Grant Keys Suite 261\nSmithmouth, RI 90240', 'schamberger.ottis@moen.com', 5, '2023-10-25 16:19:56', '2023-10-25 16:19:56'),
(14, 'Wilhelmine Balistreri', 'P', '08325728047', '2067 Veronica Turnpike Suite 713\nDannyside, IA 80213', 'emmy.cassin@kemmer.biz', 5, '2023-10-25 16:19:56', '2023-10-25 16:19:56'),
(15, 'Francesco Schneider', 'L', '083216653441', '60089 Nikolaus Inlet Apt. 394\nWest Santos, ME 09221', 'marlon.parker@champlin.com', 5, '2023-10-25 16:19:56', '2023-10-25 16:19:56'),
(16, 'Leta Casper', 'L', '083277093375', '3826 Ariel Vista\nElvisside, ID 24536-0163', 'camila.kihn@yahoo.com', 3, '2023-10-25 16:19:56', '2023-10-25 16:19:56'),
(17, 'Laurine Cole', 'L', '083263077960', '984 McClure Bridge Suite 523\nOndrickaview, CT 67363-3979', 'fermin.white@gmail.com', 4, '2023-10-25 16:19:56', '2023-10-25 16:19:56'),
(18, 'Verna McGlynn', 'P', '083255643294', '474 Everardo Port Apt. 115\nPascalebury, CA 39563-4531', 'mavis.herman@buckridge.com', 2, '2023-10-25 16:19:56', '2023-10-25 16:19:56'),
(19, 'Millie Hickle', 'L', '083284632773', '13231 Chadrick Avenue Suite 298\nNaderstad, NV 01022-2563', 'charlie83@gmail.com', 1, '2023-10-25 16:19:56', '2023-10-25 16:19:56'),
(20, 'Melody Rohan', 'P', '083246215584', '684 Elias Vista\nNew Ephraimport, DE 83750-8066', 'jude57@yahoo.com', 3, '2023-10-25 16:19:56', '2023-10-25 16:19:56'),
(23, 'kakaalfuna12', 'L', '089456132456', 'ul. Życzyńska 1021', 'kakaalfuna3@gmail.com', NULL, '2023-10-25 17:31:11', '2023-10-25 17:31:36');

-- --------------------------------------------------------

--
-- Table structure for table `mentors`
--

CREATE TABLE `mentors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `phone_number` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mentors`
--

INSERT INTO `mentors` (`id`, `name`, `specialization`, `class_id`, `phone_number`, `created_at`, `updated_at`) VALUES
(1, 'Yesenia Bradtke DDS', 'specialization0', 3, '083261374948', '2023-10-25 17:46:30', '2023-10-25 17:46:30'),
(2, 'Tiara Gorczany II', 'specialization1', 3, '083283905907', '2023-10-25 17:46:30', '2023-10-25 17:46:30'),
(3, 'Maybelle Franecki', 'specialization2', 4, '083275640182', '2023-10-25 17:46:30', '2023-10-25 17:46:30'),
(4, 'Dr. Nina Will', 'specialization3', 5, '083236754047', '2023-10-25 17:46:30', '2023-10-25 17:46:30'),
(5, 'Jordane Waters Jr.', 'specialization4', 4, '083277102196', '2023-10-25 17:46:30', '2023-10-25 17:46:30'),
(6, 'Leonardo Daugherty', 'specialization5', 1, '083217190203', '2023-10-25 17:46:30', '2023-10-25 17:46:30'),
(7, 'Prof. Mattie Hamill III', 'specialization6', 2, '083256831928', '2023-10-25 17:46:30', '2023-10-25 17:46:30'),
(8, 'Fletcher Rutherford', 'specialization7', 2, '083281745143', '2023-10-25 17:46:30', '2023-10-25 17:46:30'),
(9, 'Torey Wisozk', 'specialization8', 1, '083250735978', '2023-10-25 17:46:30', '2023-10-25 17:46:30'),
(10, 'Prof. Chloe Luettgen', 'specialization9', 2, '08329328784', '2023-10-25 17:46:30', '2023-10-25 17:46:30'),
(11, 'Marjolaine Schumm', 'specialization10', 5, '083247259062', '2023-10-25 17:46:30', '2023-10-25 17:46:30'),
(12, 'Aiyana Keebler III', 'specialization11', 1, '083269271927', '2023-10-25 17:46:30', '2023-10-25 17:46:30'),
(13, 'Gladyce Spinka', 'specialization12', 2, '083251005479', '2023-10-25 17:46:30', '2023-10-25 17:46:30'),
(14, 'Lawson Kuphal V', 'specialization13', 1, '0832698695', '2023-10-25 17:46:30', '2023-10-25 17:46:30'),
(15, 'Nadia Kozey', 'specialization14', 2, '083282818984', '2023-10-25 17:46:30', '2023-10-25 17:46:30'),
(16, 'Ms. Dixie Hintz', 'specialization15', 3, '083231409385', '2023-10-25 17:46:30', '2023-10-25 17:46:30'),
(17, 'Harold Bogan', 'specialization16', 1, '083293821011', '2023-10-25 17:46:30', '2023-10-25 17:46:30'),
(18, 'Prof. Elenor Prohaska III', 'specialization17', 5, '083285942905', '2023-10-25 17:46:30', '2023-10-25 17:46:30'),
(19, 'Arnulfo Gislason', 'specialization18', 3, '083234214349', '2023-10-25 17:46:30', '2023-10-25 17:46:30'),
(20, 'Mustafa Legros', 'specialization19', 5, '083220973874', '2023-10-25 17:46:30', '2023-10-25 17:46:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_10_19_162930_create_name_classes_table', 1),
(7, '2023_10_19_162939_create_members_table', 1),
(8, '2023_10_19_162949_create_mentors_table', 1),
(9, '2023_10_19_163008_create_transactions_table', 1),
(10, '2023_10_19_163009_create_registrations_table', 1),
(11, '2023_10_19_163219_create_schedules_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `name_classes`
--

CREATE TABLE `name_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_class` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `name_classes`
--

INSERT INTO `name_classes` (`id`, `name_class`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Kelas 1', 'Deskripsi kelas 1', '2023-10-25 16:18:34', '2023-10-25 16:18:34'),
(2, 'Kelas 2', 'Deskripsi kelas 2', '2023-10-25 16:18:34', '2023-10-25 16:18:34'),
(3, 'Kelas 3', 'Deskripsi kelas 3', '2023-10-25 16:18:34', '2023-10-25 16:18:34'),
(4, 'Kelas 4', 'Deskripsi kelas 4', '2023-10-25 16:18:34', '2023-10-25 16:18:34'),
(5, 'Kelas 5', 'Deskripsi kelas 5', '2023-10-25 16:18:34', '2023-10-25 16:18:34');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `registration_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `class_id`, `date_start`, `date_end`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-10-26 09:38:37', '2024-01-26 09:38:37', '2023-10-26 02:38:37', '2023-10-26 02:38:37'),
(2, 2, '2023-10-26 09:38:37', '2024-01-26 09:38:37', '2023-10-26 02:38:37', '2023-10-26 02:38:37'),
(3, 3, '2023-10-26 09:38:37', '2024-01-26 09:38:37', '2023-10-26 02:38:37', '2023-10-26 02:38:37'),
(4, 4, '2023-10-26 09:38:37', '2024-01-26 09:38:37', '2023-10-26 02:38:37', '2023-10-26 02:38:37'),
(5, 5, '2023-10-26 09:38:37', '2024-01-26 09:38:37', '2023-10-26 02:38:37', '2023-10-26 02:38:37');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `method` varchar(255) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `member_id`, `class_id`, `amount`, `method`, `transaction_date`, `created_at`, `updated_at`) VALUES
(1, 4, 5, 100.00, 'Metode 1', '2023-10-25 00:57:13', '2023-10-25 17:57:13', '2023-10-25 17:57:13'),
(2, 3, 1, 100.00, 'Metode 2', '2023-10-24 00:57:13', '2023-10-25 17:57:13', '2023-10-25 17:57:13'),
(4, 2, 5, 100.00, 'Metode 1', '2023-10-25 00:58:21', '2023-10-25 17:58:21', '2023-10-25 17:58:21'),
(5, 5, 2, 100.00, 'Metode 2', '2023-10-24 00:58:21', '2023-10-25 17:58:21', '2023-10-25 17:58:21'),
(6, 4, 3, 100.00, 'Metode 3', '2023-10-23 00:58:21', '2023-10-25 17:58:21', '2023-10-25 17:58:21'),
(7, 4, 3, 100.00, 'Metode 4', '2023-10-22 00:58:21', '2023-10-25 17:58:21', '2023-10-25 17:58:21'),
(8, 2, 4, 100.00, 'Metode 5', '2023-10-21 00:58:21', '2023-10-25 17:58:21', '2023-10-25 17:58:21'),
(9, 4, 5, 100.00, 'Metode 6', '2023-10-20 00:58:21', '2023-10-25 17:58:21', '2023-10-25 17:58:21'),
(10, 4, 4, 100.00, 'Metode 7', '2023-10-19 00:58:21', '2023-10-25 17:58:21', '2023-10-25 17:58:21'),
(11, 2, 5, 100.00, 'Metode 8', '2023-10-18 00:58:21', '2023-10-25 17:58:21', '2023-10-25 17:58:21'),
(12, 5, 2, 100.00, 'Metode 9', '2023-10-17 00:58:21', '2023-10-25 17:58:21', '2023-10-25 17:58:21'),
(13, 5, 1, 100.00, 'Metode 10', '2023-10-16 00:58:21', '2023-10-25 17:58:21', '2023-10-25 17:58:21'),
(14, 1, 1, 100.00, '12', '2023-10-25 01:27:03', '2023-10-25 18:27:04', '2023-10-25 18:27:04'),
(15, 8, 5, 100.00, 'kaka', '2023-10-25 01:27:28', '2023-10-25 18:27:28', '2023-10-25 18:27:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'kakaalfuna', 'kakaalfuna3@gmail.com', NULL, '$2y$10$T7MphXHeO6f6Nit0p38.Teb78kGPKjegZLGUIpNHcgbFicnQIejNy', NULL, '2023-10-24 05:46:06', '2023-10-24 05:46:06');

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
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_class_id_foreign` (`class_id`);

--
-- Indexes for table `mentors`
--
ALTER TABLE `mentors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mentors_class_id_foreign` (`class_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `name_classes`
--
ALTER TABLE `name_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registrations_class_id_foreign` (`class_id`),
  ADD KEY `registrations_member_id_foreign` (`member_id`),
  ADD KEY `registrations_transaction_id_foreign` (`transaction_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedules_class_id_foreign` (`class_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_member_id_foreign` (`member_id`),
  ADD KEY `transactions_class_id_foreign` (`class_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `mentors`
--
ALTER TABLE `mentors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `name_classes`
--
ALTER TABLE `name_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `name_classes` (`id`);

--
-- Constraints for table `mentors`
--
ALTER TABLE `mentors`
  ADD CONSTRAINT `mentors_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `name_classes` (`id`);

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `registrations_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `name_classes` (`id`),
  ADD CONSTRAINT `registrations_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `registrations_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`);

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `name_classes` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `name_classes` (`id`),
  ADD CONSTRAINT `transactions_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
