-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 05, 2024 at 11:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitalFreight`
--

-- --------------------------------------------------------

--
-- Table structure for table `brokers`
--

CREATE TABLE `brokers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `organisation_id` char(36) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `national_id` varchar(255) DEFAULT NULL,
  `mask` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brokers`
--

INSERT INTO `brokers` (`id`, `image`, `organisation_id`, `name`, `phone`, `address`, `country`, `region`, `description`, `status`, `national_id`, `mask`, `email`, `password`, `last_login`, `created_at`, `updated_at`) VALUES
(1, NULL, '9c4ad63c-4635-43ed-8f9d-98566a5de1a9', 'New Broker', '0268977129', NULL, NULL, NULL, NULL, NULL, NULL, '9c4addb4-e07f-4616-97d5-29db71e15eab', 'iamjesse75@gmail.com', '$2y$10$iVH7J2nZbxhKeiHYZiK7..4Vcrsk7bQ0nlADczWcf3fEnwf9NA9DO', '2024-06-15 13:02:05', '2024-06-15 12:13:31', NULL),
(2, NULL, '9c4ad63c-4635-43ed-8f9d-98566a5de1a9', 'New broker', '0268977128', NULL, NULL, NULL, NULL, NULL, NULL, '9c4adddd-b5bd-4266-b766-b3be3812a6c2', 'iamjesse75@gmail.com', '$2y$10$yEjqfuTNDMLPey6cbKqHJ.kTRqAgLkhGNZhYMxHNlQElGQHvR0Ts6', '2024-06-15 13:02:05', '2024-06-15 12:13:58', NULL),
(3, NULL, NULL, 'Demo Broker', '0268977129', NULL, NULL, NULL, NULL, NULL, NULL, '9c4aeefc-1825-4d9c-b225-aef0201320e6', 'iamjesse75@gmail.com', '$2y$10$v0AT94uEYrsLEr.XI/EW8OG/Nr7y.K3CQ71S/2YYt4qx1OPW9Abf6', '2024-06-15 13:02:05', '2024-06-15 13:01:50', NULL),
(4, NULL, NULL, 'Broker I', '0268977129', NULL, NULL, NULL, NULL, NULL, NULL, '9c64d262-79b8-4461-b492-1cb3b0bf6389', 'broker@gmail.com', '$2y$10$foln6fFOiFz8hx/b1vvu2OeBy2LYvyy5uBs96apLHlenygDHZka2C', '2024-06-28 09:53:37', '2024-06-28 09:53:23', NULL),
(5, NULL, '9c6b3cd3-9e57-4b3d-9e9d-885eeeaab439', 'Jesse', '0268977129', NULL, NULL, NULL, NULL, NULL, NULL, '9c6b4356-33e2-45be-920c-8a0d2fd05d1f', 'todaybroker@gmail.com', '$2y$10$agxpbf0tqmA51Edlmx8DFOTbnwFSEtw8WRgLuwzUsiFypPtuHe73G', NULL, '2024-07-01 14:44:11', NULL),
(6, NULL, '9c6b3bb8-fbfa-4267-8103-9f578dd7473a', 'Broker I', '0268977129', NULL, NULL, NULL, NULL, NULL, NULL, '9c711ea5-b156-498b-a8f4-f2626e4beedc', 'broker@gmail.com', '$2y$10$aBi2mlEyO4BxAAc1kc.r0epMmPr3IyinrfzdmcvnFX/bZarQPlTAu', NULL, '2024-07-04 12:36:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mask` char(36) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_participants`
--

CREATE TABLE `chat_participants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chat_id` char(36) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `user_id` char(36) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_threads`
--

CREATE TABLE `chat_threads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chat_id` char(36) NOT NULL,
  `sender_type` varchar(255) NOT NULL,
  `sender_id` char(36) NOT NULL,
  `message` text NOT NULL,
  `sent_at` timestamp NULL DEFAULT NULL,
  `read_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` char(36) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `license_number` varchar(255) DEFAULT NULL,
  `license_image` varchar(255) DEFAULT NULL,
  `mask` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `organization_id`, `image`, `name`, `phone`, `dob`, `address`, `description`, `country`, `region`, `status`, `license_number`, `license_image`, `mask`, `email`, `password`, `last_login`, `created_at`, `updated_at`) VALUES
(1, '9c4ad63c-4635-43ed-8f9d-98566a5de1a9', '666d83a1ef052.jpg', 'Demo Driver', '+233368977129', '2024-06-15', 'KNUST', 'about here', 'Ghana', 'Greater Accra', 'Approved', 'LI-898989', '666d83a1ef1e0.pdf', '9c4adafb-098d-4986-a55e-a12150ad5ab8', 'iamjesse75@gmail.com', '$2y$10$w/5R4kU5TrOrAEDRiGafaeBDf8Mx8VPhK.nCK5X6ks.dlEQFdZKQC', '2024-06-15 13:00:49', NULL, '2024-06-15 13:01:02'),
(2, NULL, NULL, 'Demo Driver', '0268977129', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9c4aece1-4ba1-4de4-9cc3-8c4b2846d146', 'iamjesse75@gmail.com', '$2y$10$xwIGsRPcnnNFFcl/XQcRmOL5oeHXME9L4Wis0fxfsapFA51QLsscu', '2024-06-15 13:00:49', '2024-06-15 12:55:57', NULL),
(3, '9c64ce45-4157-4b9f-8fd9-0f88372928ba', '667e8699a447d.jpg', 'Driver Name', '0268977129', '2024-06-27', 'TI-3434-A', 'i like TUNA', 'Ghana', 'Ashanti Region', 'Approved', 'LI-4545-A', '667e8699a4d43.pdf', '9c64d022-3ecb-45a9-9369-4f63f0934a45', 'driver@gmail.com', '$2y$10$vf3FIgnIjMXU.qfOcQYj9u0UO38BZbEHqNTmw38aQ9Wddjy6iv2yS', NULL, NULL, '2024-06-28 09:47:33'),
(4, '9c6b4356-33e2-45be-920c-8a0d2fd05d1f', '6682c17f01501.jpg', 'Driver One', '0268977129', '1986-11-15', 'Address here', 'i am a driver', NULL, NULL, 'Approved', 'LI-34343-A', '6682c17f017e0.pdf', '9c6b4480-6cb7-4cd3-86da-9e0718c94473', 'email@gmail.com', '$2y$10$udsrRyT4QHH.hHYyPJHFoOufjZXFHy9vnn0wyPygXK.Sd6Dn3Cim6', NULL, NULL, NULL),
(5, '9c6b3bb8-fbfa-4267-8103-9f578dd7473a', '668694b6bb827.jpg', 'Driver I', '+233368977129', '1996-03-04', 'KNUST', 'driver about', NULL, NULL, 'Approved', 'LI-8989-A', '668694b6bbaaf.pdf', '9c711aab-6319-4de6-b2ce-330942c9e313', 'driveremail@gmail.com', '$2y$10$WpRLmxwRV.FgxOD/9H/zOur3FBw8JXg0BoHXxxQN2VMRv5kI9Yme6', NULL, NULL, NULL);

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
-- Table structure for table `loads`
--

CREATE TABLE `loads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `load_type` varchar(255) NOT NULL,
  `organization_id` char(36) DEFAULT NULL,
  `sender_id` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `budget` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `length` int(11) NOT NULL,
  `weight` double NOT NULL,
  `height` double NOT NULL,
  `breadth` double NOT NULL,
  `handling` varchar(255) NOT NULL,
  `pickup_address` varchar(255) NOT NULL,
  `dropoff_address` varchar(255) NOT NULL,
  `insurance_docs` varchar(255) NOT NULL,
  `mask` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'Unpaid',
  `shipment_status` varchar(255) NOT NULL DEFAULT 'Unassigned',
  `other_docs` varchar(255) NOT NULL,
  `completed` int(11) NOT NULL DEFAULT 0,
  `org_assigned_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loads`
--

INSERT INTO `loads` (`id`, `image`, `load_type`, `organization_id`, `sender_id`, `description`, `budget`, `quantity`, `length`, `weight`, `height`, `breadth`, `handling`, `pickup_address`, `dropoff_address`, `insurance_docs`, `mask`, `status`, `payment_status`, `shipment_status`, `other_docs`, `completed`, `org_assigned_by`, `created_at`, `updated_at`) VALUES
(1, '666d8aa310c5c.jpg', 'Refrigerated Goods', '9c4ad63c-4635-43ed-8f9d-98566a5de1a9', '9c4ae3aa-e1d3-4319-b4e5-47fd5a1849df', 'description', 300, 23, 32, 223, 32, 32, 'fragile', '{\"name\":\"Kejetia Road\",\"location\":{\"lat\":6.6999001,\"lng\":-1.6246492}}', '{\"name\":\"Accra Mall\",\"location\":{\"lat\":5.6221003,\"lng\":-0.1733501}}', '666d8aa31162a.pdf', '26507605', 'Completed', 'Unpaid', 'Unassigned', '666d8aa311761.pdf', 1, '9c6b4356-33e2-45be-920c-8a0d2fd05d1f', '2024-06-15 12:35:47', NULL),
(2, '666d8d7aa8928.png', 'Refrigerated Goods', '9c4ad63c-4635-43ed-8f9d-98566a5de1a9', '9c4ae3aa-e1d3-4319-b4e5-47fd5a1849df', 'description', 300, 1, 1, 1, 1, 1, 'fragile', '{\"name\":\"Kwame Nkrumah University of Science and Technology\",\"location\":{\"lat\":6.674688,\"lng\":-1.571728}}', '{\"name\":\"Accra Mall\",\"location\":{\"lat\":5.6221003,\"lng\":-0.1733501}}', '666d8d7aa8c16.pdf', '95617161', 'Completed', 'Unpaid', 'Unassigned', '666d8d7aa8d4e.pdf', 1, NULL, '2024-06-15 12:47:54', NULL),
(3, '667e87d1e5ee5.jpg', 'Refrigerated Goods', '9c4ad63c-4635-43ed-8f9d-98566a5de1a9', '9c64d105-ff1b-4808-b8ee-9c5b4cd45ea7', 'Load description', 3000, 34, 134, 34, 34, 34, 'fragile', '{\"name\":\"Kwame Nkrumah University of Science and Technology\",\"location\":{\"lat\":6.674688,\"lng\":-1.571728}}', '{\"name\":\"Accra Mall\",\"location\":{\"lat\":5.6221003,\"lng\":-0.1733501}}', '667e87d1e6186.pdf', '95805401', 'Completed', 'Unpaid', 'Unassigned', '667e87d1e62a0.pdf', 1, NULL, '2024-06-28 09:52:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `load_types`
--

CREATE TABLE `load_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `load_types`
--

INSERT INTO `load_types` (`id`, `name`) VALUES
(1, 'General Cargo'),
(2, 'Refrigerated Goods'),
(3, 'Harzardous Materials'),
(4, 'Bulk Cargo'),
(5, 'Overweight Cargo'),
(6, 'Automobile Tranport'),
(7, 'Livestock Transport'),
(8, 'Perishable Goods'),
(9, 'Fragile Goods'),
(10, 'Construction Materials'),
(11, 'Retail Goods'),
(12, 'E-commerce Shipments'),
(13, 'Pharmaceuticals and Medical Supplies'),
(14, 'Agriculture Products'),
(15, 'Textiles and Apparel'),
(16, 'Electronics and Technology Products'),
(17, 'Furniture and Home Goods'),
(18, 'Waste and Recycling Materials'),
(19, 'Specialized Equipment');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_providers`
--

CREATE TABLE `maintenance_providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_schedule`
--

CREATE TABLE `maintenance_schedule` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` char(36) NOT NULL,
  `status` varchar(255) NOT NULL,
  `task` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `provider` varchar(255) NOT NULL,
  `frequency` varchar(255) NOT NULL,
  `cost` double NOT NULL,
  `next_visit` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maintenance_schedule`
--

INSERT INTO `maintenance_schedule` (`id`, `vehicle_id`, `status`, `task`, `date`, `provider`, `frequency`, `cost`, `next_visit`, `created_at`, `updated_at`) VALUES
(2, '9c64cf4d-e866-4df6-9663-6b6f62894ea2', 'Scheduled', 'Tire Rotation', '2024-06-22', 'Craftman Mechanics', '1 month', 9000, '2024-07-22', '2024-06-28 09:48:15', NULL),
(3, '9c711536-f96e-46df-960c-24d46264264c', 'Scheduled', 'Oil Change', '2024-07-25', 'Craftman Mechanics', '1 week', 5000, '2024-08-01', '2024-07-04 12:23:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_tasks`
--

CREATE TABLE `maintenance_tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maintenance_tasks`
--

INSERT INTO `maintenance_tasks` (`id`, `name`) VALUES
(1, 'Oil Change'),
(2, 'Tire Rotation'),
(3, 'Brake Inspection'),
(4, 'Air Filter Replacement'),
(5, 'Spark Plug Replacement');

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
(6, '2024_02_28_163608_create_organizations_table', 1),
(7, '2024_02_28_163625_create_load_types_table', 1),
(8, '2024_02_28_163633_create_routes_table', 1),
(9, '2024_02_28_163701_create_payment_methods_table', 1),
(10, '2024_02_28_163716_create_vehicles_table', 1),
(11, '2024_02_28_163725_create_vehicle_categories_table', 1),
(12, '2024_02_28_163746_create_vehicle_sub_categories_table', 1),
(13, '2024_02_28_163755_create_vehicle_owners_table', 1),
(14, '2024_02_28_163802_create_drivers_table', 1),
(15, '2024_02_28_163819_create_maintenance_schedule_table', 1),
(16, '2024_02_28_163828_create_loads_table', 1),
(17, '2024_02_28_163835_create_sub_loads_table', 1),
(18, '2024_02_28_163842_create_brokers_table', 1),
(19, '2024_02_28_163850_create_senders_table', 1),
(20, '2024_02_28_163901_create_shipments_table', 1),
(21, '2024_03_06_063123_create_vehicle_routes_table', 1),
(22, '2024_03_27_210111_create_maintenance_tasks_table', 1),
(23, '2024_04_16_011830_add_dob_to_drivers', 1),
(24, '2024_04_26_062753_add_columns_to_shipments_table', 1),
(25, '2024_05_11_003934_add_payment_status_and_shipment_status_to_loads_table', 1),
(26, '2024_05_17_173319_add_org_assigned_by_to_loads_table', 1),
(27, '2024_06_22_124155_create_chats_table', 2),
(28, '2024_06_22_124217_create_chats_participants_table', 2),
(29, '2024_06_22_124303_create_chats_threads_table', 2),
(30, '2024_06_28_124827_create_maintenance_providers_table', 2),
(31, '2024_07_03_151354_add_route_to_shipment_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `load_type` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `registration_docs` varchar(255) DEFAULT NULL,
  `insurance_docs` varchar(255) DEFAULT NULL,
  `mask` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `tax_id` varchar(255) DEFAULT NULL,
  `account_id` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `image`, `country`, `region`, `load_type`, `name`, `description`, `email`, `phone`, `address`, `registration_docs`, `insurance_docs`, `mask`, `status`, `tax_id`, `account_id`, `password`, `last_login`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Ghana', 'Greater Accra', '[\"General Cargo\",\"Refrigerated Goods\"]', 'Demo Organization', 'description', 'iamjesse75@gmail.com', '0268977129', 'KNUST', '/private/var/tmp/phpBuxAG3', '666d884d08050.pdf', '9c4ad63c-4635-43ed-8f9d-98566a5de1a9', 'Approved', '89898989', NULL, '$2y$10$9jh9YZkUuNoIjXBqC8Rxo.DauSzMtWUU.NMFqKKRVr/xka64cVxC2', '2024-06-15 12:24:17', '2024-06-15 11:52:37', '2024-06-15 12:25:49'),
(2, NULL, NULL, NULL, NULL, 'Demo Organization', NULL, 'iamjesse75@gmail.com', '0268977129', NULL, NULL, NULL, '9c4ad649-0619-4c6d-8c58-e499c4f55152', 'Pending', NULL, NULL, '$2y$10$7p14.AqgxFSfjl4EWx1MhOGhjSIXJGl/IqhHfFNxNI6q0hROlVBMq', '2024-06-15 12:24:17', '2024-06-15 11:52:46', NULL),
(3, NULL, NULL, NULL, NULL, 'New Organization', NULL, 'organization@gmail.com', '0268977129', NULL, NULL, NULL, '9c64ce45-4157-4b9f-8fd9-0f88372928ba', 'Approved', NULL, NULL, '$2y$10$bDJsX9Q.LnnKq7ZPxwDTae3EwC5HklzrUIziQGK/96ZBHyxl4Cb/q', '2024-06-28 09:58:05', '2024-06-28 09:41:53', NULL),
(4, NULL, NULL, NULL, NULL, 'Today organization', NULL, 'todayemail@gmail.com', '0268977129', NULL, NULL, NULL, '9c6b3b49-c23b-4590-a37e-64d5283643d2', 'Pending', NULL, NULL, '$2y$10$BQmCGqEIJqFfotCGyPoGZ.5GeDW6u2GaJAtKYNvxtI.WlNo2yeJxq', NULL, '2024-07-01 14:21:41', NULL),
(5, NULL, NULL, NULL, NULL, 'organization', NULL, 'organization1@gmail.com', '0268977129', NULL, NULL, NULL, '9c6b3bb8-fbfa-4267-8103-9f578dd7473a', 'Pending', NULL, NULL, '$2y$10$KBf.hRqX4Fuy4aF5IRwhgu3RXZlQSLKUUB.19FdTuJoCEEmyB9LXO', '2024-07-05 09:02:25', '2024-07-01 14:22:54', NULL),
(6, NULL, NULL, NULL, NULL, 'organization', NULL, 'organization1@gmail.com', '0268977129', NULL, NULL, NULL, '9c6b3c28-94fc-4eef-bf9d-3513539b71c7', 'Pending', NULL, NULL, '$2y$10$ekVdlmJr0zadHe6CYF24MuK8eE8zFo/FSQiL1jEn/1ol61S/OHX0.', '2024-07-05 09:02:25', '2024-07-01 14:24:07', NULL),
(7, NULL, NULL, NULL, NULL, 'New Organization', NULL, 'todayorganization@gmail.com', '0268977129', NULL, NULL, NULL, '9c6b3cd3-9e57-4b3d-9e9d-885eeeaab439', 'Pending', NULL, NULL, '$2y$10$4xzJdkRWv/UvCr571rXPquOm40wDUpSuthmt6HRwK02kZu3lxL/i6', '2024-07-01 14:26:30', '2024-07-01 14:25:59', NULL),
(8, NULL, NULL, NULL, NULL, 'New organization I', NULL, 'organization1@gmail.com', '0268997129', NULL, NULL, NULL, '9c71131b-0f5e-428f-b5fb-66c20f32453d', 'Pending', NULL, NULL, '$2y$10$86flSukq8mreisxfhbNKvem0XIYVkdQ75oN8X2yQTQ0H6ATXTV9Pu', '2024-07-05 09:02:25', '2024-07-04 12:04:17', NULL);

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
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `owner_id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `card` varchar(255) NOT NULL,
  `type` enum('Credit','Debit') NOT NULL,
  `expiry` varchar(255) NOT NULL,
  `cvv` varchar(255) NOT NULL,
  `save` varchar(255) NOT NULL,
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
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` char(36) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `senders`
--

CREATE TABLE `senders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `national_id` varchar(255) DEFAULT NULL,
  `mask` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `senders`
--

INSERT INTO `senders` (`id`, `image`, `name`, `phone`, `address`, `country`, `region`, `description`, `status`, `national_id`, `mask`, `email`, `password`, `last_login`, `created_at`, `updated_at`) VALUES
(1, '666d8bb5e8db9.jpg', 'Demo Sender', '0268977129', 'KNUST', 'Ghana', 'Greater Accra', 'about me', NULL, '/private/var/tmp/phprYwqEZ', '9c4ae3aa-e1d3-4319-b4e5-47fd5a1849df', 'iamjesse75@gmail.com', '$2y$10$xFx0JnhR2t.woqvsJ8eOVeHpuHDNkNiNylNVxp/4J1mdutFvvifCO', '2024-06-15 12:30:27', '2024-06-15 12:30:11', NULL),
(2, NULL, 'Sender Name', '0268977129', NULL, NULL, NULL, NULL, NULL, NULL, '9c64d105-ff1b-4808-b8ee-9c5b4cd45ea7', 'sender@gmail.com', '$2y$10$if.ZE/zbzia5xSIYZB7tne5Pa.YwiUVASfcfrRx5iheU/orMUCKIu', '2024-06-28 09:50:19', '2024-06-28 09:49:34', NULL),
(3, NULL, 'Sender Name', '0268977129', NULL, NULL, NULL, NULL, NULL, NULL, '9c64d10c-7171-4294-9375-0b8a44dcce43', 'sender@gmail.com', '$2y$10$POeagHAhKSuSGuH2ebwEyOORDzQzwfeDPMEVSxOn7gHGJcbGjj6.u', '2024-06-28 09:50:19', '2024-06-28 09:49:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` char(36) NOT NULL,
  `driver_id` char(36) DEFAULT NULL,
  `broker_id` char(36) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `pickup_date` date DEFAULT NULL,
  `dropoff_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pickup_address` varchar(255) DEFAULT NULL,
  `dropoff_address` varchar(255) DEFAULT NULL,
  `mask` char(36) NOT NULL,
  `approval_status` varchar(255) NOT NULL DEFAULT 'Approved',
  `loads` text NOT NULL,
  `shipment_status` varchar(255) NOT NULL,
  `route` longtext DEFAULT NULL,
  `last_location` varchar(255) DEFAULT NULL,
  `load_assignment_method` varchar(255) NOT NULL DEFAULT 'Assign Later'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_loads`
--

CREATE TABLE `sub_loads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `load_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `load_type` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_loads`
--

INSERT INTO `sub_loads` (`id`, `load_id`, `name`, `load_type`, `quantity`, `value`, `created_at`, `updated_at`) VALUES
(1, '95805401', 'Refridgement', 'Refrigerated Goods', '1', '300', '2024-06-28 09:52:19', NULL);

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
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'Super admin', 'admin@freight.com', '2024-06-15 11:51:45', '$2y$10$tQrErh2AYEf/tMLM6Mn/L.gT4bhkwrDaU4ecT3ekFwKd3KbXvLc5y', NULL, NULL, '2024-06-15 11:51:45', '2024-06-15 11:51:45');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` char(36) DEFAULT NULL,
  `driver_id` varchar(255) DEFAULT NULL,
  `owner_id` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `load_type` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `vehicle_category_id` varchar(255) NOT NULL,
  `vehicle_subcategory_id` varchar(255) NOT NULL,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `mask` varchar(255) NOT NULL,
  `gps` varchar(255) NOT NULL,
  `engine_type` varchar(255) NOT NULL,
  `transmission` varchar(255) NOT NULL,
  `fuel_consumption` varchar(255) NOT NULL,
  `axle_type` varchar(255) NOT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `max_load_weight` varchar(255) DEFAULT NULL,
  `width` varchar(255) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL,
  `length` varchar(255) DEFAULT NULL,
  `owners_documents` varchar(255) DEFAULT NULL,
  `road_worth_documents` varchar(255) DEFAULT NULL,
  `insurance_documents` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `organization_id`, `driver_id`, `owner_id`, `image`, `load_type`, `number`, `vehicle_category_id`, `vehicle_subcategory_id`, `make`, `model`, `year`, `color`, `mask`, `gps`, `engine_type`, `transmission`, `fuel_consumption`, `axle_type`, `weight`, `max_load_weight`, `width`, `height`, `length`, `owners_documents`, `road_worth_documents`, `insurance_documents`, `created_at`, `updated_at`) VALUES
(1, '9c4ad63c-4635-43ed-8f9d-98566a5de1a9', NULL, NULL, NULL, '[\"General Cargo\",\"Refrigerated Goods\"]', 'GT-9090-A', '2', '1', 'Nissan', 'Alfera', '2019', 'blue', '9c4ad6d7-7daa-4bf7-a600-9b7e7bd8a384', 'No', 'Diesel', 'Manual', '8000', '4*7*7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '9c64ce45-4157-4b9f-8fd9-0f88372928ba', NULL, '2', NULL, '[\"General Cargo\",\"Refrigerated Goods\"]', 'GT-4589-A', '1', '1', 'Make-1', 'Model-12', '2023', 'Green', '9c64cf4d-e866-4df6-9663-6b6f62894ea2', 'No', 'Diesel', 'Manual', '499', '9x7', '30', '900', '334', '4434', '343', NULL, NULL, NULL, NULL, '2024-06-28 09:45:21'),
(4, '9c6b3cd3-9e57-4b3d-9e9d-885eeeaab439', NULL, '3', NULL, '[\"Refrigerated Goods\",\"General Cargo\"]', 'GT-59090-A', '1', '1', 'Nissan', 'Almera', '2020', 'green', '9c6b404c-1baa-4244-9826-ad4be2294614', 'No', 'Diesel', 'Manual', '343', '343', '34', '3444', '34', '4', '4', NULL, NULL, '6682bed9536e0.pdf', NULL, '2024-07-01 14:36:09'),
(5, '9c6b3bb8-fbfa-4267-8103-9f578dd7473a', NULL, '4', NULL, '[\"General Cargo\",\"Refrigerated Goods\"]', 'GT-4567-A', '1', '2', 'Nissan', 'Afriq', '2020', 'green', '9c711536-f96e-46df-960c-24d46264264c', 'No', 'Petrol', 'Manual', '200', '5 x 5', '300', '300', '344', '344', '344', NULL, NULL, '6686915f9bb11.pdf', NULL, '2024-07-04 12:11:11');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_categories`
--

CREATE TABLE `vehicle_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_categories`
--

INSERT INTO `vehicle_categories` (`id`, `name`) VALUES
(1, 'Trucks'),
(2, 'Trailers'),
(3, 'Specialized Vehicles'),
(4, 'Vans'),
(5, 'Buses'),
(6, 'Specialty Vehicles'),
(7, 'Intermodal Vehicles'),
(8, 'Motorbike'),
(9, 'Tri-cycle'),
(10, 'Airfreight Containers');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_owners`
--

CREATE TABLE `vehicle_owners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_owners`
--

INSERT INTO `vehicle_owners` (`id`, `vehicle_id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(2, '9c64cf4d-e866-4df6-9663-6b6f62894ea2', 'New Organization', 'organization@gmail.com', '0268977129', NULL, NULL, NULL),
(3, '9c6b404c-1baa-4244-9826-ad4be2294614', 'New Organization', 'todayorganization@gmail.com', '0268977129', NULL, NULL, NULL),
(4, '9c711536-f96e-46df-960c-24d46264264c', 'organization', 'organization1@gmail.com', '0268977129', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_routes`
--

CREATE TABLE `vehicle_routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` char(36) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_routes`
--

INSERT INTO `vehicle_routes` (`id`, `vehicle_id`, `origin`, `destination`, `created_at`, `updated_at`) VALUES
(2, '9c64cf4d-e866-4df6-9663-6b6f62894ea2', 'Kumasi', 'Accra', '2024-06-28 09:45:14', NULL),
(3, '9c6b404c-1baa-4244-9826-ad4be2294614', 'Kumasi', 'Accra', '2024-07-01 14:36:04', NULL),
(4, '9c711536-f96e-46df-960c-24d46264264c', 'Kumasi', 'Accra', '2024-07-04 12:10:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_sub_categories`
--

CREATE TABLE `vehicle_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_sub_categories`
--

INSERT INTO `vehicle_sub_categories` (`id`, `name`) VALUES
(1, 'Box Truck'),
(2, 'Refrigerated Truck');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brokers`
--
ALTER TABLE `brokers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_participants`
--
ALTER TABLE `chat_participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_threads`
--
ALTER TABLE `chat_threads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `loads`
--
ALTER TABLE `loads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `load_types`
--
ALTER TABLE `load_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance_providers`
--
ALTER TABLE `maintenance_providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance_schedule`
--
ALTER TABLE `maintenance_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance_tasks`
--
ALTER TABLE `maintenance_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
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
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `senders`
--
ALTER TABLE `senders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_loads`
--
ALTER TABLE `sub_loads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_categories`
--
ALTER TABLE `vehicle_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_owners`
--
ALTER TABLE `vehicle_owners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_routes`
--
ALTER TABLE `vehicle_routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_sub_categories`
--
ALTER TABLE `vehicle_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brokers`
--
ALTER TABLE `brokers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_participants`
--
ALTER TABLE `chat_participants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_threads`
--
ALTER TABLE `chat_threads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loads`
--
ALTER TABLE `loads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `load_types`
--
ALTER TABLE `load_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `maintenance_providers`
--
ALTER TABLE `maintenance_providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maintenance_schedule`
--
ALTER TABLE `maintenance_schedule`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `maintenance_tasks`
--
ALTER TABLE `maintenance_tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `senders`
--
ALTER TABLE `senders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_loads`
--
ALTER TABLE `sub_loads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vehicle_categories`
--
ALTER TABLE `vehicle_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vehicle_owners`
--
ALTER TABLE `vehicle_owners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle_routes`
--
ALTER TABLE `vehicle_routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle_sub_categories`
--
ALTER TABLE `vehicle_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
