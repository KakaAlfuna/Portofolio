-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2023 at 01:59 AM
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
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone_number` char(14) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `email`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Maye Harber', 'earnest.schmeler@yahoo.com', '082187688213', '5334 Runolfsdottir Lodge\nReingerhaven, TN 53999-3290', '2023-09-15 22:50:36', '2023-09-15 22:50:36'),
(2, 'Zoie Kutch', 'major84@thiel.com', '08213168796', '7805 Krista Point\nPort Hassanton, CA 63363-2992', '2023-09-15 22:50:36', '2023-09-15 22:50:36'),
(3, 'Isom Kuhic', 'miller.teresa@eichmann.com', '082163087092', '21484 Hailey Pass\nGislasontown, OR 82762-9477', '2023-09-15 22:50:36', '2023-09-15 22:50:36'),
(4, 'Stephanie Cole1212', 'fcar11ter@hintz.com', '0821173052431', '5891 O\'Connell LoafNorth Clotildemouth, ME 67867-2418', '2023-09-15 22:50:36', '2023-10-09 21:43:52'),
(5, 'Edgar Purdy', 'fleffler@effertz.com', '082193316084', '96750 Lebsack Ferry Suite 969\nSigridstad, CO 75528', '2023-09-15 22:50:36', '2023-09-15 22:50:36'),
(6, 'Elinore Kuhic MD', 'qheller@gmail.com', '082184867200', '4027 Brigitte Islands\nFriesenborough, OK 74855', '2023-09-15 22:50:36', '2023-09-15 22:50:36'),
(7, 'Dane O\'Kon', 'eve37@hermann.com', '082196565669', '9519 Alize Stravenue Apt. 658\nEast Caraberg, LA 26832-9361', '2023-09-15 22:50:36', '2023-09-15 22:50:36'),
(8, 'Geraldine Stark', 'von.akeem@gmail.com', '082149667606', '460 Pfannerstill Fords\nNorth Anneborough, TN 29007-9481', '2023-09-15 22:50:36', '2023-09-15 22:50:36'),
(9, 'Mr. Lawson Dooley', 'zhane@gmail.com', '082133696370', '95368 Fidel Drive\nEstelchester, TN 10288', '2023-09-15 22:50:36', '2023-09-15 22:50:36'),
(10, 'Dr. Billie Klocko', 'lesley58@hotmail.com', '082193642480', '8695 Thora Ridges Apt. 198\nNew Hans, MT 28058-7751', '2023-09-15 22:50:36', '2023-09-15 22:50:36'),
(11, 'Nyasia Lemke', 'adan.bartell@yahoo.com', '082194650315', '706 Kristy Circle Apt. 753\nEast Vernon, KS 40673-4878', '2023-09-15 22:50:36', '2023-09-15 22:50:36'),
(12, 'Dr. Lea Lockman MD', 'roberta.beahan@ferry.com', '082136275891', '48713 Keven Skyway Suite 076\nWehnerland, CO 13342-7335', '2023-09-15 22:50:36', '2023-09-15 22:50:36'),
(13, 'Guiseppe Waters', 'mayer.sadye@casper.com', '082144667102', '1326 Cronin Trail Suite 439\nWest Gracielabury, NJ 46847-8325', '2023-09-15 22:50:36', '2023-09-15 22:50:36'),
(14, 'Julio Beahan', 'coby24@willms.biz', '082176985340', '785 Labadie Freeway Suite 104\nWest Lucieberg, KY 03533-3071', '2023-09-15 22:50:36', '2023-09-15 22:50:36'),
(15, 'Dr. Trystan Jenkins MD', 'hillary86@yahoo.com', '082146821147', '9896 Price Prairie Apt. 429\nLake Haylie, KS 06153', '2023-09-15 22:50:36', '2023-09-15 22:50:36'),
(16, 'Lowell Halvorson III', 'qjerde@yahoo.com', '082114942049', '2628 Seamus Key\nWatersfurt, MD 28919-5556', '2023-09-15 22:50:36', '2023-09-15 22:50:36'),
(17, 'Jasen Glover', 'fkirlin@deckow.info', '08215029357', '4574 Michale Village\nWintheiserside, WI 79667', '2023-09-15 22:50:36', '2023-09-15 22:50:36'),
(18, 'Prof. Hyman Effertz', 'janet93@yahoo.com', '082168158926', '95031 Sheridan Island\nPort Gunnarland, AZ 49595', '2023-09-15 22:50:36', '2023-09-15 22:50:36'),
(19, 'Dr. Hilbert Runolfsson', 'fthiel@friesen.biz', '08215018678', '5651 Lavon Street\nGenevieveshire, MI 63819', '2023-09-15 22:50:36', '2023-09-15 22:50:36'),
(20, 'Casimir Herzog', 'kailey.willms@leuschke.com', '082190136535', '50036 Kunze Mountain Suite 367\nEast Gregoria, MO 40914-4796', '2023-09-15 22:50:36', '2023-09-15 22:50:36'),
(33, 'kakaalfuna', 'akunbaru012dong@gmail.com', '089456423165', 'ul. Życzyńska 10212', '2023-09-23 01:07:45', '2023-09-25 20:56:51');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isbn` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `year` int(11) NOT NULL,
  `publisher_id` bigint(20) UNSIGNED NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `catalog_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `isbn`, `title`, `year`, `publisher_id`, `author_id`, `catalog_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 760388945, 'Prof. Anissa Schneider DDS', 2017, 8, 8, 4, 20, 19184, '2023-09-15 22:51:44', '2023-09-15 22:51:44'),
(2, 144268281, 'Prof. Johnson Ferry V', 2012, 2, 18, 19, 19, 14750, '2023-09-15 22:51:44', '2023-09-15 22:51:44'),
(3, 164893267, 'Eldridge Green', 2022, 14, 8, 8, 15, 13810, '2023-09-15 22:51:44', '2023-09-15 22:51:44'),
(4, 718938091, 'Dr. Kathryn Wilkinson DDS', 2023, 1, 17, 6, 11, 17638, '2023-09-15 22:51:44', '2023-09-15 22:51:44'),
(5, 376095001, 'Mauricio Bogan', 2023, 20, 20, 8, 16, 18897, '2023-09-15 22:51:44', '2023-09-15 22:51:44'),
(6, 410728470, 'Claire Kunze Sr.', 2022, 15, 14, 11, 16, 17630, '2023-09-15 22:51:44', '2023-09-15 22:51:44'),
(7, 753474198, 'Janick Bogan', 2021, 17, 16, 17, 19, 11342, '2023-09-15 22:51:44', '2023-09-15 22:51:44'),
(8, 416166175, 'Keira Vandervort', 2019, 4, 11, 5, 16, 19960, '2023-09-15 22:51:44', '2023-09-15 22:51:44'),
(9, 280247280, 'Alda Terry', 2020, 16, 16, 7, 12, 10224, '2023-09-15 22:51:44', '2023-09-15 22:51:44'),
(10, 481119052, 'Laron Ferry', 2011, 11, 19, 6, 11, 14469, '2023-09-15 22:51:44', '2023-09-15 22:51:44'),
(11, 982241002, 'Ms. Fleta Haley DDS', 2017, 17, 16, 10, 16, 10183, '2023-09-15 22:51:44', '2023-09-15 22:51:44'),
(12, 552981116, 'Leta Pollich', 2018, 12, 15, 4, 15, 15640, '2023-09-15 22:51:44', '2023-09-15 22:51:44'),
(13, 461181656, 'Nina Abshire', 2011, 8, 9, 4, 11, 15608, '2023-09-15 22:51:44', '2023-09-15 22:51:44'),
(14, 310016458, 'Carmel Franecki', 2013, 5, 3, 6, 13, 10819, '2023-09-15 22:51:44', '2023-09-15 22:51:44'),
(15, 838029585, 'Easton Homenick', 2022, 4, 8, 12, 17, 19255, '2023-09-15 22:51:44', '2023-09-15 22:51:44'),
(16, 39821957, 'Lizzie Abshire', 2018, 16, 3, 13, 10, 15179, '2023-09-15 22:51:44', '2023-09-15 22:51:44'),
(17, 512959219, 'Mr. Isaias Mante', 2019, 13, 2, 7, 18, 14388, '2023-09-15 22:51:44', '2023-09-15 22:51:44'),
(18, 109455373, 'Whitney Sporer', 2010, 9, 1, 2, 16, 15966, '2023-09-15 22:51:44', '2023-09-15 22:51:44'),
(19, 369519459, 'Kaitlyn Howell', 2016, 1, 12, 8, 19, 14121, '2023-09-15 22:51:44', '2023-09-15 22:51:44'),
(20, 162216892, 'Prof. Clark Emmerich III', 2019, 7, 4, 2, 19, 14528, '2023-09-15 22:51:44', '2023-09-15 22:51:44'),
(22, 222333, 'ghchg12213123123', 2013, 1, 1, 1, 5, 15000, '2023-09-26 09:40:42', '2023-09-26 10:27:57'),
(27, 121231, 'sdahdga', 2015, 1, 1, 1, 2, 20000, '2023-09-26 10:54:42', '2023-09-26 10:54:42');

-- --------------------------------------------------------

--
-- Table structure for table `catalogs`
--

CREATE TABLE `catalogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catalogs`
--

INSERT INTO `catalogs` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Blair McDermott DDS', '2023-09-15 22:51:42', '2023-09-15 22:51:42'),
(2, 'Helmer Hickle Sr.', '2023-09-15 22:51:42', '2023-09-15 22:51:42'),
(3, 'Gregoria Shields', '2023-09-15 22:51:42', '2023-09-15 22:51:42'),
(4, 'Kasey Kreiger', '2023-09-15 22:51:42', '2023-10-09 21:43:19'),
(5, 'Brown Kub Jr.', '2023-09-15 22:51:42', '2023-09-15 22:51:42'),
(6, 'Brady Oberbrunner', '2023-09-15 22:51:42', '2023-09-15 22:51:42'),
(7, 'Austen Dare Sr.', '2023-09-15 22:51:42', '2023-09-15 22:51:42'),
(8, 'Shakira Schamberger', '2023-09-15 22:51:42', '2023-09-15 22:51:42'),
(9, 'Mariah Luettgen III', '2023-09-15 22:51:42', '2023-09-15 22:51:42'),
(10, 'Krista Boyle', '2023-09-15 22:51:42', '2023-09-15 22:51:42'),
(11, 'Elyse Johnson', '2023-09-15 22:51:42', '2023-09-15 22:51:42'),
(12, 'Eriberto Olson', '2023-09-15 22:51:42', '2023-09-15 22:51:42'),
(13, 'Jewell West', '2023-09-15 22:51:42', '2023-09-15 22:51:42'),
(14, 'Raphaelle Kuphal', '2023-09-15 22:51:42', '2023-09-15 22:51:42'),
(15, 'Leonardo Denesik', '2023-09-15 22:51:42', '2023-09-15 22:51:42'),
(16, 'Hugh Moen', '2023-09-15 22:51:42', '2023-09-15 22:51:42'),
(17, 'Prof. Lessie Olson PhD', '2023-09-15 22:51:42', '2023-09-15 22:51:42'),
(18, 'Mrs. Violette Koepp DDS', '2023-09-15 22:51:42', '2023-09-15 22:51:42'),
(19, 'Prof. Raheem Kulas MD', '2023-09-15 22:51:42', '2023-09-15 22:51:42'),
(20, 'Sylvester Balistreri', '2023-09-15 22:51:42', '2023-09-15 22:51:42'),
(24, 'asu8ka12', '2023-09-18 20:34:21', '2023-09-18 20:56:23'),
(25, 'asuka', '2023-09-18 20:34:40', '2023-09-18 20:34:40');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `gender`, `phone_number`, `address`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Ryann McCullough', 'P', '083242031469', '4648 Raynor Common Apt. 694\nBinsview, UT 78916-4152', 'homenick.benny@grant.com', '2023-09-15 22:50:52', '2023-09-15 22:50:52'),
(2, 'Dr. Vincenzo Quigley', 'L', '083234597612', '91863 Bill Centers Suite 227\nPort Isaacshire, OR 32307-8974', 'gaylord97@yahoo.com', '2023-09-15 22:50:52', '2023-09-15 22:50:52'),
(3, 'Dolly Nienow DVM', 'P', '083237527507', '5804 Vanessa Tunnel Suite 196\nJustynbury, DE 64279', 'kyra.schmitt@yahoo.com', '2023-09-15 22:50:52', '2023-09-15 22:50:52'),
(4, 'Ms. Frida Ziemann', 'L', '083275691784', '641 Nitzsche Island\nRobelmouth, NE 51406', 'rmosciski@yahoo.com', '2023-09-15 22:50:52', '2023-09-15 22:50:52'),
(5, 'Arnaldo Stracke', 'P', '08329390909', '3823 Quigley Drives Suite 246\nCruickshanktown, DC 48823', 'aiyana.cartwright@yahoo.com', '2023-09-15 22:50:52', '2023-09-15 22:50:52'),
(6, 'Doug Brekke', 'L', '083231551010', '580 Aniya Mount\nLake Lupe, MS 17698-4141', 'wolff.eve@hotmail.com', '2023-09-15 22:50:52', '2023-09-15 22:50:52'),
(7, 'Berniece Mueller', 'P', '083289254736', '18370 Adella Mills Apt. 064\nLake Clark, DE 00563', 'simonis.hans@boyer.com', '2023-09-15 22:50:52', '2023-09-15 22:50:52'),
(8, 'Alden Olson', 'L', '083248805220', '22550 Jakubowski Key Suite 140\nMicaelaburgh, MI 55589-9603', 'jada.howell@gmail.com', '2023-09-15 22:50:52', '2023-09-15 22:50:52'),
(9, 'Leora Heaney', 'L', '083253904910', '12089 Abigayle Radial\nSouth Brendonchester, AZ 62870-0808', 'adah.lynch@hotmail.com', '2023-09-15 22:50:52', '2023-09-15 22:50:52'),
(10, 'Dr. Rowland Moore PhD', 'P', '083286757674', '88035 Valentina Glen Suite 605\nDillonfort, WA 13389-7094', 'maximus.mclaughlin@yahoo.com', '2023-09-15 22:50:52', '2023-09-15 22:50:52'),
(11, 'Baby O\'Reilly', 'L', '083237673296', '5526 Hardy Plains\nPorterburgh, OH 19469-6902', 'crystel.crist@waters.com', '2023-09-15 22:50:52', '2023-09-15 22:50:52'),
(12, 'Hollis Wehner Sr.', 'P', '083253458387', '84230 Shea Lane\nSouth Sven, TX 90067', 'dfranecki@gmail.com', '2023-09-15 22:50:52', '2023-09-15 22:50:52'),
(13, 'Kale Spinka', 'P', '083291487989', '73596 Friesen Ramp Apt. 138\nDasiaburgh, MN 13038-8022', 'gleason.laisha@armstrong.org', '2023-09-15 22:50:52', '2023-09-15 22:50:52'),
(14, 'Yazmin Vandervort', 'L', '083265336598', '173 Ethan Inlet\nWest Tonymouth, OR 48812', 'whartmann@wehner.com', '2023-09-15 22:50:52', '2023-09-15 22:50:52'),
(15, 'Aimee Renner II', 'L', '083239087291', '3831 Donnelly Groves\nMcKenzieview, OK 35647-5796', 'towne.danielle@brown.com', '2023-09-15 22:50:52', '2023-09-15 22:50:52'),
(16, 'Vito Walter III', 'L', '083229850452', '4501 Claudie Rest Suite 451\nSporerchester, ND 12897-2913', 'kristofer23@hotmail.com', '2023-09-15 22:50:52', '2023-09-15 22:50:52'),
(17, 'Bell Kassulke', 'L', '083268391282', '55654 Kozey Overpass\nManteside, KS 53634', 'aconn@mclaughlin.com', '2023-09-15 22:50:52', '2023-09-15 22:50:52'),
(18, 'Rowland Littel PhD', 'P', '083254905644', '69984 Feest Mountains Apt. 723\nEast D\'angelo, OK 31750-3446', 'ankunding.ezekiel@yahoo.com', '2023-09-15 22:50:52', '2023-09-15 22:50:52'),
(19, 'Nannie Watsica Jr.', 'L', '083259058878', '49359 Weber Island\nRosendofurt, AL 64792', 'nasir.hartmann@gmail.com', '2023-09-15 22:50:52', '2023-09-15 22:50:52'),
(20, 'Prof. Mario Collier', 'L', '083240418623', '2287 Kutch Springs\nEast Eddie, SC 18527', 'rita.bartoletti@hand.info', '2023-09-15 22:50:52', '2023-09-15 22:50:52'),
(22, 'rdpkaka112', 'L', '089456423165', 'ul. Życzyńska 102', 'kakaalfuna3@gmail.com', '2023-09-26 00:47:13', '2023-09-26 00:47:13');

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
(1, '2010_09_13_024745_create_members_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_09_13_024901_create_publishers_table', 1),
(8, '2023_09_13_024902_create_authors_table', 1),
(9, '2023_09_13_024903_create_catalogs_table', 1),
(10, '2023_09_13_024904_create_books_table', 1),
(11, '2023_09_13_024905_create_transactions_table', 1),
(12, '2023_09_13_024906_create_transaction_details_table', 1),
(13, '2023_10_17_031410_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone_number` char(14) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `name`, `email`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Karli Prosacco I', 'jayme66@klocko.com', '082145029784', '929 Marquardt Center Suite 814\nPort Sim, AZ 81704', '2023-09-15 22:50:45', '2023-09-15 22:50:45'),
(2, 'Leilani Abshire', 'ruecker.abby@hotmail.com', '082135725762', '870 O\'Reilly Grove\nEast Tad, MT 79376', '2023-09-15 22:50:45', '2023-09-15 22:50:45'),
(3, 'Howard Ortiz12', 'tpredovic1212@gmail.com', '082186678399', '846 Chance TraceLake Annabell, WI 00281-2829', '2023-09-15 22:50:45', '2023-10-15 17:52:31'),
(4, 'Filomena Marvin DVM', 'floyd06@walker.org', '082163294071', '181 Denesik Locks Apt. 640\nManteside, WI 74399', '2023-09-15 22:50:45', '2023-09-15 22:50:45'),
(5, 'Dr. Garland Runolfsdottir I', 'nicklaus34@tromp.com', '082164305793', '3074 O\'Keefe Court Suite 329\nGoyetteland, CA 00857', '2023-09-15 22:50:45', '2023-09-15 22:50:45'),
(6, 'Tatyana Kreiger MD1212', 'jacky2117@yahoo.com', '082153805061', '370 Hills Plains Apt. 532Lake Jarod, CA 92417', '2023-09-15 22:50:45', '2023-10-09 23:38:50'),
(7, 'Effie Durgan', 'leilani.funk@bernhard.info', '082194869087', '3293 Allie Neck\nEast Davonte, VA 85281', '2023-09-15 22:50:45', '2023-09-15 22:50:45'),
(8, 'Donald Fritsch', 'keven.reilly@hotmail.com', '082128072537', '871 Israel Ferry\nNorth Johnsonville, SC 54552', '2023-09-15 22:50:45', '2023-09-15 22:50:45'),
(9, 'Prof. Walker Murazik', 'thad56@schmeler.com', '082124399031', '324 Monroe Trail Suite 029\nGradymouth, NE 39344', '2023-09-15 22:50:45', '2023-09-15 22:50:45'),
(10, 'Spencer Shields III', 'tremblay.jakayla@gmail.com', '08212321039', '88553 Rubie Village\nSengerstad, MT 78694-8762', '2023-09-15 22:50:45', '2023-09-15 22:50:45'),
(11, 'Dr. Ellen Roob', 'yschowalter@volkman.com', '082130701472', '87085 Jennings Mills\nLake Shaynamouth, AR 59408-0074', '2023-09-15 22:50:45', '2023-09-15 22:50:45'),
(12, 'Olga Grant', 'kiehn.dan@gmail.com', '082166068090', '53251 Filomena Fords Apt. 698\nWest Jarrodburgh, SD 43535-3137', '2023-09-15 22:50:45', '2023-09-15 22:50:45'),
(13, 'Mr. London Connelly', 'ola44@hill.com', '08217624816', '95789 Dwight Rapids Suite 758\nRosenbaummouth, VA 69495', '2023-09-15 22:50:45', '2023-09-15 22:50:45'),
(14, 'Danika Kozey', 'ejones@gmail.com', '082176109378', '564 Schowalter Trafficway Suite 899\nEast Jadonhaven, NJ 92416-5337', '2023-09-15 22:50:46', '2023-09-15 22:50:46'),
(15, 'Joel Fahey', 'zboncak.cara@considine.net', '082173213676', '487 Franecki Plaza\nCloydtown, ID 09331-5628', '2023-09-15 22:50:46', '2023-09-15 22:50:46'),
(16, 'Daniela Hartmann', 'malcolm07@aufderhar.com', '082177528912', '279 Maggio Crossroad\nLake Rozellaton, IN 70727-8919', '2023-09-15 22:50:46', '2023-09-15 22:50:46'),
(17, 'Mrs. Alejandra Ryan MD', 'antonio83@johnson.net', '082155137145', '1562 Rodger Valley Apt. 397\nEast Finnfurt, MD 76850', '2023-09-15 22:50:46', '2023-09-15 22:50:46'),
(18, 'Abigale Cormier', 'graciela12@gmail.com', '082195774541', '1080 Spencer Walk\nNorth Jaunita, DC 91502', '2023-09-15 22:50:46', '2023-09-15 22:50:46'),
(19, 'Rebecca Heaney', 'aliyah.swaniawski@robel.com', '082174264494', '56556 King Ridges Apt. 883\nWest Bernhardhaven, HI 72825', '2023-09-15 22:50:46', '2023-09-15 22:50:46'),
(20, 'Eleanore Johnston', 'moen.aric@schmitt.com', '082183415190', '20670 Conn Vista Apt. 643\nJaymouth, MD 86279', '2023-09-15 22:50:46', '2023-09-15 22:50:46'),
(27, 'kakaalfuna1299', 'kakaalfuna3@gmail.com', '089456423165', 'ul. Życzyńska 102', '2023-09-23 00:39:52', '2023-09-23 01:13:55'),
(28, 'kakaalfuna', 'akunbaru01dong@gmail.com', '089456423165', 'ul. Życzyńska 102', '2023-09-23 00:44:47', '2023-09-23 00:44:47');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `member_id`, `date_start`, `date_end`, `created_at`, `updated_at`) VALUES
(1, 15, '2023-09-16', '2023-09-27', '2023-10-02 22:25:33', '2023-10-02 22:25:33'),
(2, 17, '2023-07-10', '2023-09-24', '2023-10-02 22:25:33', '2023-10-02 22:25:33'),
(3, 13, '2023-09-26', '2023-10-02', '2023-10-02 22:25:33', '2023-10-02 22:25:33'),
(4, 20, '2023-04-08', '2023-07-04', '2023-10-02 22:25:33', '2023-10-02 22:25:33'),
(5, 8, '2022-11-07', '2023-09-07', '2023-10-02 22:25:33', '2023-10-02 22:25:33'),
(6, 15, '2023-05-23', '2023-07-31', '2023-10-02 22:25:33', '2023-10-02 22:25:33'),
(7, 6, '2023-06-26', '2023-07-07', '2023-10-02 22:25:33', '2023-10-02 22:25:33'),
(8, 18, '2023-09-13', '2023-09-20', '2023-10-02 22:25:33', '2023-10-02 22:25:33'),
(9, 19, '2023-08-25', '2023-09-05', '2023-10-02 22:25:33', '2023-10-02 22:25:33'),
(10, 14, '2023-05-16', '2023-09-01', '2023-10-02 22:25:33', '2023-10-02 22:25:33'),
(11, 20, '2023-06-11', '2023-07-11', '2023-10-02 22:25:33', '2023-10-02 22:25:33'),
(12, 4, '2023-04-29', '2023-08-16', '2023-10-02 22:25:33', '2023-10-02 22:25:33'),
(13, 13, '2023-06-25', '2023-07-03', '2023-10-02 22:25:33', '2023-10-02 22:25:33'),
(14, 7, '2023-08-11', '2023-09-26', '2023-10-02 22:25:33', '2023-10-02 22:25:33'),
(15, 5, '2023-03-03', '2023-07-28', '2023-10-02 22:25:33', '2023-10-02 22:25:33'),
(16, 19, '2022-11-05', '2023-01-01', '2023-10-02 22:25:33', '2023-10-02 22:25:33'),
(17, 3, '2023-01-14', '2023-09-05', '2023-10-02 22:25:33', '2023-10-02 22:25:33'),
(18, 5, '2023-01-24', '2023-08-09', '2023-10-02 22:25:33', '2023-10-02 22:25:33'),
(19, 8, '2023-06-12', '2023-06-30', '2023-10-02 22:25:33', '2023-10-02 22:25:33'),
(20, 9, '2022-10-25', '2022-12-31', '2023-10-02 22:25:33', '2023-10-02 22:25:33'),
(22, 2, '2023-12-12', NULL, '2023-10-16 08:03:29', '2023-10-16 08:03:29'),
(23, 2, '2023-12-12', NULL, '2023-10-16 08:05:06', '2023-10-16 08:05:06'),
(24, 2, '2023-11-05', NULL, '2023-10-16 08:15:59', '2023-10-16 08:18:34');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `transaction_id`, `book_id`, `qty`, `created_at`, `updated_at`) VALUES
(1, 3, 10, 1, '2023-10-06 06:23:28', '2023-10-06 06:23:28'),
(2, 19, 19, 5, '2023-10-06 06:23:28', '2023-10-06 06:23:28'),
(3, 10, 13, 2, '2023-10-06 06:23:28', '2023-10-06 06:23:28'),
(4, 2, 11, 3, '2023-10-06 06:23:28', '2023-10-06 06:23:28'),
(5, 3, 10, 3, '2023-10-06 06:23:28', '2023-10-06 06:23:28'),
(6, 7, 18, 4, '2023-10-06 06:23:28', '2023-10-06 06:23:28'),
(7, 12, 18, 4, '2023-10-06 06:23:28', '2023-10-06 06:23:28'),
(8, 8, 5, 1, '2023-10-06 06:23:28', '2023-10-06 06:23:28'),
(9, 15, 3, 4, '2023-10-06 06:23:28', '2023-10-06 06:23:28'),
(10, 5, 5, 4, '2023-10-06 06:23:28', '2023-10-06 06:23:28'),
(11, 3, 17, 4, '2023-10-06 06:23:28', '2023-10-06 06:23:28'),
(12, 19, 9, 3, '2023-10-06 06:23:28', '2023-10-06 06:23:28'),
(13, 14, 4, 2, '2023-10-06 06:23:28', '2023-10-06 06:23:28'),
(14, 16, 5, 2, '2023-10-06 06:23:28', '2023-10-06 06:23:28'),
(15, 16, 17, 5, '2023-10-06 06:23:28', '2023-10-06 06:23:28'),
(16, 17, 11, 2, '2023-10-06 06:23:28', '2023-10-06 06:23:28'),
(17, 6, 19, 3, '2023-10-06 06:23:28', '2023-10-06 06:23:28'),
(18, 12, 18, 2, '2023-10-06 06:23:28', '2023-10-06 06:23:28'),
(19, 17, 8, 4, '2023-10-06 06:23:28', '2023-10-06 06:23:28'),
(20, 2, 3, 3, '2023-10-06 06:23:28', '2023-10-06 06:23:28'),
(26, 24, 2, 1, '2023-10-16 08:26:46', '2023-10-16 08:26:46'),
(27, 24, 3, 1, '2023-10-16 08:26:46', '2023-10-16 08:26:46'),
(28, 24, 4, 1, '2023-10-16 08:26:46', '2023-10-16 08:26:46'),
(29, 24, 5, 1, '2023-10-16 08:26:46', '2023-10-16 08:26:46'),
(30, 23, 2, 1, '2023-10-16 08:27:45', '2023-10-16 08:27:45'),
(31, 23, 3, 1, '2023-10-16 08:27:45', '2023-10-16 08:27:45'),
(32, 23, 4, 1, '2023-10-16 08:27:45', '2023-10-16 08:27:45');

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
  `member_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `member_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kaka Alfuna Zhafran', 'kakaalfuna3@gmail.com', NULL, '$2y$10$UUqrsG.xFOJUtaShEVpcPuNHNKzQxVrwzY.uefjFdMMQKv7S7oLze', 15, 'z8DmlaSnE9wASreYGoJn7HV5wa5VNaMNvKFbXOC43UF8wso4txQwkCqvG9XQ', '2023-09-15 23:10:08', '2023-09-15 23:10:08'),
(2, 'kakaalfuna', 'akunbaru01dong@gmail.com', NULL, '$2y$10$uWLsc/fZlCV8eSLcSfScJO0hEQA3IU1JRHxwe8DavwweC0Dq9.q7q', NULL, NULL, '2023-10-03 02:39:38', '2023-10-03 02:39:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_publisher_id_foreign` (`publisher_id`),
  ADD KEY `books_author_id_foreign` (`author_id`),
  ADD KEY `books_catalog_id_foreign` (`catalog_id`);

--
-- Indexes for table `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`team_id`,`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  ADD KEY `model_has_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `model_has_permissions_team_foreign_key_index` (`team_id`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`team_id`,`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  ADD KEY `model_has_roles_role_id_foreign` (`role_id`),
  ADD KEY `model_has_roles_team_foreign_key_index` (`team_id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_team_id_name_guard_name_unique` (`team_id`,`name`,`guard_name`),
  ADD KEY `roles_team_foreign_key_index` (`team_id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_member_id_foreign` (`member_id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_details_transaction_id_foreign` (`transaction_id`),
  ADD KEY `transaction_details_book_id_foreign` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_member_id_foreign` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `books_catalog_id_foreign` FOREIGN KEY (`catalog_id`) REFERENCES `catalogs` (`id`),
  ADD CONSTRAINT `books_publisher_id_foreign` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

--
-- Constraints for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `transaction_details_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `transaction_details_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
