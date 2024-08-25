-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 28, 2024 at 06:34 PM
-- Server version: 10.6.18-MariaDB
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apcserv7_daloadmaster`
--

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` char(36) NOT NULL,
  `broker_id` char(36) DEFAULT NULL,
  `load_id` varchar(255) NOT NULL,
  `status` enum('Not Started','Pending','Completed') NOT NULL DEFAULT 'Not Started',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bids_history`
--

CREATE TABLE `bids_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bid_id` bigint(20) UNSIGNED NOT NULL,
  `offer_from` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `offer` double(8,2) NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brokers`
--

CREATE TABLE `brokers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `organization_id` char(36) DEFAULT NULL,
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

INSERT INTO `brokers` (`id`, `image`, `organization_id`, `name`, `phone`, `address`, `country`, `region`, `description`, `status`, `national_id`, `mask`, `email`, `password`, `last_login`, `created_at`, `updated_at`) VALUES
(1, NULL, '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', 'Mr. Adams Ansah', '0268977129', NULL, NULL, NULL, NULL, NULL, NULL, '9c87b9ef-ee1d-40c8-a789-dabe9e70aa6c', 'iamjesse75+broker@gmail.com', 'M2Yhjtxg', NULL, '2024-07-15 18:19:00', NULL);

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
  `last_location` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`last_location`)),
  `shipment_status` varchar(255) NOT NULL DEFAULT 'Unassigned',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `organization_id`, `image`, `name`, `phone`, `dob`, `address`, `description`, `country`, `region`, `status`, `license_number`, `license_image`, `mask`, `email`, `password`, `last_login`, `last_location`, `shipment_status`, `created_at`, `updated_at`) VALUES
(1, '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '6695207522ef2.jpg', 'Mrs. Esther Smith', '+233268977129', '2024-07-01', 'Madina', 'I like cars and driiving', 'Ghana', 'Greater Accra', 'Approved', 'LI-45454', '6695207523116.pdf', '9c874ca6-bfcb-4e18-84c1-9ca4736a399c', 'iamjesse75@gmail.com', '$2y$10$qzSI2.DIwT1tV2rnRIOG7Ogpq39mAeZHQH8WX5E3G.j8olNioAXXO', '2024-07-17 16:49:47', '{\"lat\":6.7979385,\"lng\":-1.0796785}', 'Assigned', NULL, NULL),
(2, '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '666d83a1ef052.jpg', 'Kwame Asante', '+233 24 123 4567', '1985-05-15', '25 High Street, Accra', 'Experienced driver with 10 years in logistics and transportation.', 'Ghana', 'Greater Accra', 'Approved', 'KA19850515-23', '66641bbd3d80a.png', '9c80e190-e928-4930-8232-0c', 'kwame.asante@gmail.com', '$2y$10$qzSI2.DIwT1tV2rnRIOG7Ogpq39mAeZHQH8WX5E3G.j8olNioAXXO', '2024-07-17 16:50:49', '{\"lat\":5.6037168,\"lng\":-0.1869644}', 'Assigned', '2024-07-15 13:16:27', '2024-07-15 13:16:27'),
(3, '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '66951ff8a8581.jpg', 'Ama Boateng', '+233 20 987 6543', '1990-08-22', '10 Cocoa Road, Kumasi', 'Skilled driver specializing in long-distance hauls.', 'Ghana', 'Ashanti', 'Pending', 'AB19900822-47', '66641bbd3d81b.png', '8d70f191-f039-5041-9343-1d', 'ama.boateng@yahoo.com', '$2y$10$qzSI2.DIwT1tV2rnRIOG7Ogpq39mAeZHQH8WX5E3G.j8olNioAXXO', NULL, '{\"lat\":6.6885442,\"lng\":-1.6244654}', 'Assigned', '2024-07-15 13:16:27', '2024-07-15 13:16:27'),
(4, '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '6695207522ef2.jpg', 'Kofi Mensah', '+233 26 345 6789', '1988-11-30', '5 Harbor Street, Takoradi', 'Experienced in transporting petroleum products.', 'Ghana', 'Western', 'Approved', 'KM19881130-65', '66641bbd3d82c.png', '7e60e20c-g140-6152-0454-2e', 'kofi.mensah@hotmail.com', '$2y$10$qzSI2.DIwT1tV2rnRIOG7Ogpq39mAeZHQH8WX5E3G.j8olNioAXXO', '2024-07-17 09:31:27', '{\"lat\":4.8979339,\"lng\":-1.7591571}', 'Assigned', '2024-07-15 13:16:27', '2024-07-15 13:16:27'),
(5, '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '66641bbd3d82d.png', 'Abena Owusu', '+233 27 567 8901', '1992-03-18', '15 Tamale Road, Tamale', 'Specialized in transporting agricultural products.', 'Ghana', 'Northern', 'Approved', 'AO19920318-89', '66641bbd3d83d.png', '6f50d21d-h251-7263-1565-3f', 'abena.owusu@gmail.com', '$2y$10$qzSI2.DIwT1tV2rnRIOG7Ogpq39mAeZHQH8WX5E3G.j8olNioAXXO', NULL, '{\"lat\":9.4051728,\"lng\":-0.8422714}', 'Unassigned', '2024-07-15 13:16:27', '2024-07-15 13:16:27'),
(6, '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '66641bbd3d83e.png', 'Yaw Darko', '+233 23 678 9012', '1987-07-05', '20 Volta Street, Ho', 'Expert in delivering perishable goods.', 'Ghana', 'Volta', 'Pending', 'YD19870705-12', '66641bbd3d84e.png', '5e40c22e-i362-8374-2676-4g', 'yaw.darko@yahoo.com', '$2y$10$qzSI2.DIwT1tV2rnRIOG7Ogpq39mAeZHQH8WX5E3G.j8olNioAXXO', NULL, '{\"lat\":6.6016888,\"lng\":0.4692608}', 'Unassigned', '2024-07-15 13:16:27', '2024-07-15 13:16:27'),
(7, '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '66641bbd3d84f.png', 'Akua Sarpong', '+233 24 789 0123', '1991-12-10', '8 Castle Road, Cape Coast', 'Skilled in transporting construction materials.', 'Ghana', 'Central', 'Approved', 'AS19911210-36', '66641bbd3d85f.png', '4d30b23f-j473-9485-3787-5h', 'akua.sarpong@gmail.com', '$2y$10$qzSI2.DIwT1tV2rnRIOG7Ogpq39mAeZHQH8WX5E3G.j8olNioAXXO', NULL, '{\"lat\":5.1053828,\"lng\":-1.2462776}', 'Unassigned', '2024-07-15 13:16:27', '2024-07-15 13:16:27'),
(8, '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '66641bbd3d85g.png', 'Kwesi Adu', '+233 20 890 1234', '1989-09-25', '12 Akuapem Road, Koforidua', 'Experienced in retail goods distribution.', 'Ghana', 'Eastern', 'Approved', 'KA19890925-78', '66641bbd3d86g.png', '3c20a24g-k584-0596-4898-6i', 'kwesi.adu@hotmail.com', '$2y$10$qzSI2.DIwT1tV2rnRIOG7Ogpq39mAeZHQH8WX5E3G.j8olNioAXXO', NULL, '{\"lat\":6.0941468,\"lng\":-0.2579849}', 'Unassigned', '2024-07-15 13:16:27', '2024-07-15 13:16:27'),
(9, '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '66641bbd3d86h.png', 'Adwoa Nyame', '+233 26 901 2345', '1993-06-08', '30 Cocoa Avenue, Sunyani', 'Specialized in transporting agricultural and general cargo.', 'Ghana', 'Bono', 'Pending', 'AN19930608-54', '66641bbd3d87h.png', '2b10925h-l695-1607-5909-7j', 'adwoa.nyame@gmail.com', '$2y$10$qzSI2.DIwT1tV2rnRIOG7Ogpq39mAeZHQH8WX5E3G.j8olNioAXXO', NULL, '{\"lat\":7.3349414,\"lng\":-2.3123012}', 'Unassigned', '2024-07-15 13:16:27', '2024-07-15 13:16:27'),
(10, '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '66641bbd3d87i.png', 'Kojo Baffoe', '+233 27 012 3456', '1986-02-14', '5 Gold Street, Bolgatanga', 'Expert in transporting mining equipment.', 'Ghana', 'Upper East', 'Approved', 'KB19860214-91', '66641bbd3d88i.png', '1a00826i-m706-2718-6010-8k', 'kojo.baffoe@yahoo.com', '$2y$10$qzSI2.DIwT1tV2rnRIOG7Ogpq39mAeZHQH8WX5E3G.j8olNioAXXO', NULL, '{\"lat\":10.7859565,\"lng\":-0.8459632}', 'Unassigned', '2024-07-15 13:16:27', '2024-07-15 13:16:27'),
(11, '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '66641bbd3d88j.png', 'Efua Tawiah', '+233 23 123 4567', '1994-10-20', '18 Wala Avenue, Wa', 'Skilled in transporting retail goods and perishables.', 'Ghana', 'Upper West', 'Approved', 'ET19941020-67', '66641bbd3d89j.png', '0900727j-n817-3829-7121-9l', 'efua.tawiah@gmail.com', '$2y$10$qzSI2.DIwT1tV2rnRIOG7Ogpq39mAeZHQH8WX5E3G.j8olNioAXXO', NULL, '{\"lat\":10.0601928,\"lng\":-2.5099796}', 'Unassigned', '2024-07-15 13:16:27', '2024-07-15 13:16:27');

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
  `description` longtext DEFAULT NULL,
  `budget` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `length` int(11) NOT NULL,
  `weight` double NOT NULL,
  `height` double NOT NULL,
  `breadth` double NOT NULL,
  `handling` varchar(255) NOT NULL,
  `pickup_address` varchar(255) DEFAULT NULL,
  `dropoff_address` varchar(255) DEFAULT NULL,
  `insurance_docs` varchar(255) DEFAULT NULL,
  `mask` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'Unpaid',
  `shipment_status` varchar(255) NOT NULL DEFAULT 'Unassigned',
  `other_docs` varchar(255) DEFAULT NULL,
  `completed` int(11) NOT NULL DEFAULT 0,
  `org_assigned_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` double(8,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loads`
--

INSERT INTO `loads` (`id`, `image`, `load_type`, `organization_id`, `sender_id`, `description`, `budget`, `quantity`, `length`, `weight`, `height`, `breadth`, `handling`, `pickup_address`, `dropoff_address`, `insurance_docs`, `mask`, `status`, `payment_status`, `shipment_status`, `other_docs`, `completed`, `org_assigned_by`, `created_at`, `updated_at`, `price`) VALUES
(1, '669529d211084.jpeg', 'Bulk Cargo', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '9c87513c-abfb-48cd-9cc0-f388531ca5c6', 'furniture', 200, 1, 1, 1, 1, 1, 'fragile', '{\"name\":\"KNUST Commercial Area\",\"location\":{\"lat\":6.6832115,\"lng\":-1.5761814}}', '{\"name\":\"Accra Mall\",\"location\":{\"lat\":5.6221003,\"lng\":-0.1733501}}', '669529d211b00.pdf', '80385849', 'Completed', 'Unpaid', 'Unassigned', NULL, 0, NULL, '2024-07-15 05:53:22', NULL, 0.00),
(5, '66952b8b6f47f.jpeg', 'Electronics and Technology Products', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '9c87513c-abfb-48cd-9cc0-f388531ca5c6', 'Electrical appliances', 2000, 1, 1, 1, 1, 1, 'fragile', '{\"name\":\"Kejetia Road\",\"location\":{\"lat\":6.6999001,\"lng\":-1.6246492}}', '{\"name\":\"Spintex Road\",\"location\":{\"lat\":5.6376136,\"lng\":-0.1266064}}', '66952b8b6f933.pdf', '23209166', 'Completed', 'Unpaid', 'Unassigned', '66952b8b6fa4d.pdf', 0, NULL, '2024-07-15 06:00:43', NULL, 0.00),
(6, '66952c0b64962.jpeg', 'Furniture and Home Goods', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '9c87513c-abfb-48cd-9cc0-f388531ca5c6', 'Furniture', 5000, 1, 1, 1, 1, 1, 'fragile', '{\"name\":\"Kumasi - Ejisu Road\",\"location\":{\"lat\":6.7162468,\"lng\":-1.5036723}}', '{\"name\":\"Tema Harbour\",\"location\":{\"lat\":5.633333299999999,\"lng\":0.0166667}}', '66952c0b64f80.pdf', '32980612', 'Completed', 'Unpaid', 'Assigned', '66952c0b650af.pdf', 0, NULL, '2024-07-15 06:02:51', NULL, 0.00),
(7, '66952d054f885.jpeg', 'Agriculture Products', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '9c87513c-abfb-48cd-9cc0-f388531ca5c6', 'Plaintain', 200, 1, 1, 1, 1, 1, 'food', '{\"name\":\"Nsawam Government Hospital\",\"location\":{\"lat\":5.8107117,\"lng\":-0.3372342}}', '{\"name\":\"Tema Harbour\",\"location\":{\"lat\":5.633333299999999,\"lng\":0.0166667}}', '66952d054fd07.pdf', '63446105', 'Completed', 'Unpaid', 'Delivered', '66952d054fdd5.pdf', 0, NULL, '2024-07-15 06:07:01', NULL, 0.00),
(8, '66952dcbaddfa.jpeg', 'Electronics and Technology Products', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '9c87513c-abfb-48cd-9cc0-f388531ca5c6', 'Electrical appliances', 3000, 1, 1, 1, 1, 1, 'fragile', '{\"name\":\"Accra International Conference Centre\",\"location\":{\"lat\":5.554560200000001,\"lng\":-0.1930416}}', '{\"name\":\"Hohoe\",\"location\":{\"lat\":7.1518505,\"lng\":0.4738293}}', '66952dcbae2dc.pdf', '52554339', 'Completed', 'Unpaid', 'Unassigned', NULL, 0, NULL, '2024-07-15 06:10:19', NULL, 0.00),
(20, '669539851768e.jpeg', 'Overweight Cargo', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '9c87513c-abfb-48cd-9cc0-f388531ca5c6', 'Overweight cargo', 30000, 1, 1, 1, 1, 1, 'fragile', '{\"name\":\"Techiman Municipal\",\"location\":{\"lat\":7.564071999999999,\"lng\":-1.8708613}}', '{\"name\":\"Dambai\",\"location\":{\"lat\":8.0601167,\"lng\":0.1846217}}', '66953985178a2.pdf', '57367718', 'Completed', 'Unpaid', 'Unassigned', '66953985179bf.pdf', 0, NULL, '2024-07-15 07:00:21', NULL, 0.00),
(21, '66953a0456cb1.jpeg', 'Retail Goods', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '9c87513c-abfb-48cd-9cc0-f388531ca5c6', 'Retail goods', 15000, 1, 1, 1, 1, 1, 'handle with care', '{\"name\":\"Kenyasi\",\"location\":{\"lat\":6.9817219,\"lng\":-2.3879058}}', '{\"name\":\"Kpando\",\"location\":{\"lat\":6.990628,\"lng\":0.2948797}}', '66953a04570a0.pdf', '59204887', 'Completed', 'Unpaid', 'Unassigned', '66953a04571ed.pdf', 0, NULL, '2024-07-15 07:02:28', NULL, 0.00),
(22, '66953a56677b3.jpeg', 'Waste and Recycling Materials', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '9c87513c-abfb-48cd-9cc0-f388531ca5c6', 'Recycling materials', 19000, 1, 1, 1, 1, 1, 'corrosive', '{\"name\":\"Axim\",\"location\":{\"lat\":4.8665091,\"lng\":-2.240888}}', '{\"name\":\"Dambai\",\"location\":{\"lat\":8.0601167,\"lng\":0.1846217}}', '66953a56679c4.pdf', '24063422', 'Completed', 'Unpaid', 'Unassigned', '66953a5667a80.pdf', 0, NULL, '2024-07-15 07:03:50', NULL, 0.00),
(23, '66953ab99396f.jpeg', 'Automobile Tranport', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '9c87513c-abfb-48cd-9cc0-f388531ca5c6', 'Automobile', 28000, 1, 1, 1, 1, 1, 'sharp, handle carefully', '{\"name\":\"Walewale\",\"location\":{\"lat\":10.3516129,\"lng\":-0.7984595000000001}}', '{\"name\":\"Yendi\",\"location\":{\"lat\":9.445043799999999,\"lng\":-0.009326599999999999}}', '66953ab993e77.pdf', '24855569', 'Completed', 'Unpaid', 'Unassigned', '66953ab993fd7.pdf', 0, NULL, '2024-07-15 07:05:29', NULL, 0.00),
(24, '66953b000eec8.jpeg', 'Livestock Transport', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '9c87513c-abfb-48cd-9cc0-f388531ca5c6', 'Livestock', 48000, 1, 1, 1, 1, 1, 'livestock', '{\"name\":\"Bole\",\"location\":{\"lat\":9.0321625,\"lng\":-2.4851463}}', '{\"name\":\"Yeji\",\"location\":{\"lat\":8.2262386,\"lng\":-0.6535913999999999}}', '66953b000f287.pdf', '52007773', 'Completed', 'Unpaid', 'Unassigned', '66953b000f37d.pdf', 0, NULL, '2024-07-15 07:06:40', NULL, 0.00),
(25, '66953b4e49157.jpeg', 'Perishable Goods', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '9c87513c-abfb-48cd-9cc0-f388531ca5c6', 'Perishable goods', 43000, 1, 1, 1, 1, 1, 'perishable', '{\"name\":\"Obuasi\",\"location\":{\"lat\":6.2012073,\"lng\":-1.6912512}}', '{\"name\":\"ANLOGA JUNCTION TotalEnergies Service Station\",\"location\":{\"lat\":6.688939700000001,\"lng\":-1.5968537}}', '66953b4e49431.pdf', '11152444', 'Completed', 'Unpaid', 'Assigned', '66953b4e494f8.pdf', 0, NULL, '2024-07-15 07:07:58', NULL, 0.00),
(26, '66953be6beaaf.jpeg', 'Fragile Goods', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '9c87513c-abfb-48cd-9cc0-f388531ca5c6', 'Fragile goods', 19000, 1, 1, 1, 1, 1, 'fragile, handle with care', '{\"name\":\"Winneba\",\"location\":{\"lat\":5.3622295,\"lng\":-0.6298922}}', '{\"name\":\"Prestea\",\"location\":{\"lat\":5.437319899999999,\"lng\":-2.1401139}}', '66953be6bee71.pdf', '37868811', 'Completed', 'Unpaid', 'Delivered', '66953be6bf0be.pdf', 0, NULL, '2024-07-15 07:10:30', NULL, 0.00),
(27, '66953c3c3d821.jpeg', 'Construction Materials', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '9c87513c-abfb-48cd-9cc0-f388531ca5c6', 'Contruction materials', 50000, 1, 1, 1, 1, 1, 'hazardous', '{\"name\":\"Mampong\",\"location\":{\"lat\":7.053137,\"lng\":-1.3999969}}', '{\"name\":\"Garu\",\"location\":{\"lat\":10.8535609,\"lng\":-0.1799368}}', '66953c3c3dd74.pdf', '23435810', 'Completed', 'Unpaid', 'Unassigned', '66953c3c3de6a.pdf', 0, NULL, '2024-07-15 07:11:56', NULL, 0.00),
(28, '669564a56c7e8.jpeg', 'Pharmaceuticals and Medical Supplies', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '9c87513c-abfb-48cd-9cc0-f388531ca5c6', 'Pharmaceutical and medical', 27000, 1, 1, 1, 1, 1, 'handle with care', '{\"name\":\"Goaso\",\"location\":{\"lat\":6.8018106,\"lng\":-2.514842}}', '{\"name\":\"Nkawkaw New Station\",\"location\":{\"lat\":6.5420375,\"lng\":-0.7582344}}', '669564a56d202.pdf', '74957956', 'Completed', 'Unpaid', 'Unassigned', '669564a56d305.pdf', 0, NULL, '2024-07-15 18:04:21', NULL, 0.00),
(29, '6695651ab6fa5.jpeg', 'Agriculture Products', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '9c87513c-abfb-48cd-9cc0-f388531ca5c6', 'Agricultural Products', 38000, 1, 1, 1, 1, 1, 'perishable', '{\"name\":\"Drobo\",\"location\":{\"lat\":7.583581499999999,\"lng\":-2.7854502}}', '{\"name\":\"Bibiani Government Hospital\",\"location\":{\"lat\":6.4564716,\"lng\":-2.3226344}}', '6695651ab7503.pdf', '42862813', 'Completed', 'Unpaid', 'Unassigned', '6695651ab764b.pdf', 0, NULL, '2024-07-15 18:06:18', NULL, 0.00),
(30, '669565da2dfe3.jpeg', 'Textiles and Apparel', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '9c87513c-abfb-48cd-9cc0-f388531ca5c6', 'Texttile and Fashion', 46000, 1, 1, 1, 1, 1, 'plenty', '{\"name\":\"Atebubu\",\"location\":{\"lat\":7.754120899999999,\"lng\":-0.9844566999999999}}', '{\"name\":\"Keta Senior High School\",\"location\":{\"lat\":5.5913683,\"lng\":-0.2498089999999999}}', '669565da2e654.pdf', '99883346', 'Completed', 'Unpaid', 'Unassigned', '669565da2e81c.pdf', 0, NULL, '2024-07-15 18:09:30', NULL, 0.00),
(31, '6695663606290.jpeg', 'Waste and Recycling Materials', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '9c87513c-abfb-48cd-9cc0-f388531ca5c6', 'recyclable material', 5000, 1, 1, 1, 1, 1, 'smelly', '{\"name\":\"Ho\",\"location\":{\"lat\":6.6101493,\"lng\":0.4785495}}', '{\"name\":\"Dambai\",\"location\":{\"lat\":8.0601167,\"lng\":0.1846217}}', '66956636068f0.pdf', '55843987', 'Completed', 'Unpaid', 'Unassigned', '6695663606c19.pdf', 0, NULL, '2024-07-15 18:11:02', NULL, 0.00),
(32, '669566bbab83a.jpeg', 'Perishable Goods', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '9c87513c-abfb-48cd-9cc0-f388531ca5c6', 'Plantain', 7800, 1, 1, 1, 1, 1, 'perishable', '{\"name\":\"Nandom\",\"location\":{\"lat\":10.8525941,\"lng\":-2.7605585}}', '{\"name\":\"Accra\",\"location\":{\"lat\":5.559284600000001,\"lng\":-0.1974306}}', '669566bbabcf7.pdf', '70721173', 'Completed', 'Unpaid', 'Unassigned', '669566bbabfe2.pdf', 0, NULL, '2024-07-15 18:13:15', NULL, 0.00),
(33, '6695aa8f11ba2.jpeg', 'Waste and Recycling Materials', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '9c87513c-abfb-48cd-9cc0-f388531ca5c6', 'Corrosive material', 890000, 1, 1, 1, 1, 1, 'corrrosive', '{\"name\":\"Nandom\",\"location\":{\"lat\":10.8525941,\"lng\":-2.7605585}}', '{\"name\":\"Accra Technical University\",\"location\":{\"lat\":5.5542469,\"lng\":-0.2059627}}', '6695aa8f13cb2.pdf', '51907240', 'Completed', 'Unpaid', 'Assigned', NULL, 0, NULL, '2024-07-15 23:02:39', NULL, 0.00);

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
-- Table structure for table `login_activity`
--

CREATE TABLE `login_activity` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `mask` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login_activity`
--

INSERT INTO `login_activity` (`id`, `type`, `mask`, `created_at`) VALUES
(1, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-15 04:56:18'),
(2, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-15 05:23:49'),
(3, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-15 05:26:30'),
(4, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-15 05:57:58'),
(5, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-15 06:23:17'),
(6, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-15 06:48:06'),
(7, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-15 09:34:09'),
(8, 'organizations', '9c87bab4-0173-4324-b4fd-2257a6c8fe36', '2024-07-15 18:22:47'),
(9, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-15 18:23:51'),
(10, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-15 19:17:49'),
(11, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-15 19:18:39'),
(12, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-15 20:27:09'),
(13, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-15 22:03:52'),
(14, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-16 00:40:12'),
(15, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-16 00:43:24'),
(16, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-16 01:04:03'),
(17, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-16 08:42:50'),
(18, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-16 09:11:58'),
(19, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-16 09:21:53'),
(20, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-16 10:25:24'),
(21, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-16 10:33:51'),
(22, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-16 10:37:34'),
(23, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-16 17:10:45'),
(24, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-17 08:44:59'),
(25, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-17 09:14:14'),
(26, 'drivers', '9c874ca6-bfcb-4e18-84c1-9ca4736a399c', '2024-07-17 09:29:43'),
(27, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-17 09:30:27'),
(28, 'drivers', '7e60e20c-g140-6152-0454-2e', '2024-07-17 09:31:27'),
(29, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-17 09:35:57'),
(30, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-17 09:40:52'),
(31, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-17 09:54:29'),
(32, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-17 10:39:48'),
(33, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-17 10:41:13'),
(34, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-17 10:54:03'),
(35, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-17 10:55:53'),
(36, 'drivers', '9c80e190-e928-4930-8232-0c', '2024-07-17 11:00:03'),
(37, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-17 11:01:57'),
(38, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-17 11:35:49'),
(39, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-17 11:59:57'),
(40, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-17 12:03:25'),
(41, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-17 12:20:18'),
(42, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-17 12:34:13'),
(43, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-17 14:57:41'),
(44, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-17 15:03:56'),
(45, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-17 15:08:40'),
(46, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-17 15:09:35'),
(47, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-17 15:42:12'),
(48, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-17 16:38:09'),
(49, 'senders', '9c87513c-abfb-48cd-9cc0-f388531ca5c6', '2024-07-17 16:46:54'),
(50, 'drivers', '9c874ca6-bfcb-4e18-84c1-9ca4736a399c', '2024-07-17 16:48:12'),
(51, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-17 16:48:52'),
(52, 'drivers', '9c874ca6-bfcb-4e18-84c1-9ca4736a399c', '2024-07-17 16:49:47'),
(53, 'drivers', '9c80e190-e928-4930-8232-0c', '2024-07-17 16:50:49'),
(54, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-17 16:51:32'),
(55, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-17 17:14:50'),
(56, 'senders', '9c87513c-abfb-48cd-9cc0-f388531ca5c6', '2024-07-17 17:18:51'),
(57, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-17 17:20:25'),
(58, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-20 15:23:28'),
(59, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-22 11:13:46'),
(60, 'organizations', '9c9773c2-8b2b-49f1-b11e-b7500253f5ec', '2024-07-23 13:56:19'),
(61, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-23 19:30:49'),
(62, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-25 13:00:06'),
(63, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-27 17:02:33'),
(64, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-27 17:06:48'),
(65, 'organizations', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '2024-07-27 21:12:02');

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

--
-- Dumping data for table `maintenance_providers`
--

INSERT INTO `maintenance_providers` (`id`, `name`, `email`, `phone`, `location`, `created_at`, `updated_at`) VALUES
(1, 'Accra Auto Care Center', 'info@accraautocenter.com', '0302123456', 'Plot 15, Spintex Road, Accra', '2024-07-15 13:02:28', '2024-07-15 13:02:28'),
(2, 'Kumasi Truck Repairs Ltd', 'service@kumasitruckrepairs.com', '0322987654', '7 Bekwai Road, Kumasi', '2024-07-15 13:02:28', '2024-07-15 13:02:28'),
(3, 'Takoradi Fleet Services', 'contact@takoradifleet.com', '0312765432', 'Harbor Area, Near GPHA, Takoradi', '2024-07-15 13:02:28', '2024-07-15 13:02:28'),
(4, 'Tamale Vehicle Maintenance', 'support@tamalevehicle.com', '0372345678', 'Plot 22, Bolgatanga Road, Tamale', '2024-07-15 13:02:28', '2024-07-15 13:02:28'),
(5, 'Cape Coast Auto Clinic', 'info@capecoastauto.com', '0332876543', '5 Kotokoraba Road, Cape Coast', '2024-07-15 13:02:28', '2024-07-15 13:02:28'),
(6, 'Tema Port Truck Care', 'service@tematruckcare.com', '0303987654', 'Near Tema Port, Community 1, Tema', '2024-07-15 13:02:28', '2024-07-15 13:02:28'),
(7, 'Sunyani Mobile Mechanics', 'info@sunyanimobile.com', '0352234567', '10 Cocoa House Road, Sunyani', '2024-07-15 13:02:28', '2024-07-15 13:02:28'),
(8, 'Koforidua Engine Experts', 'support@kofoengine.com', '0342876543', 'Plot 8, Adweso Estate, Koforidua', '2024-07-15 13:02:28', '2024-07-15 13:02:28'),
(9, 'Ho Transmission Specialists', 'info@hotransmission.com', '0362345678', '15 Civic Centre Street, Ho', '2024-07-15 13:02:28', '2024-07-15 13:02:28'),
(10, 'Wa Auto Electric Services', 'contact@waautoelectric.com', '0382987654', 'Near Wa Polytechnic, Wa', '2024-07-15 13:02:28', '2024-07-15 13:02:28'),
(11, 'Bolgatanga Brake Masters', 'service@bolgabrakes.com', '0392765432', 'Plot 3, Commercial Area, Bolgatanga', '2024-07-15 13:02:28', '2024-07-15 13:02:28'),
(12, 'Nkawkaw Truck Stop Services', 'info@nkawkawtruck.com', '0342234567', 'Nkawkaw Bypass, Near Shell Station, Nkawkaw', '2024-07-15 13:02:28', '2024-07-15 13:02:28'),
(13, 'Tarkwa Mining Vehicle Repairs', 'support@tarkwamining.com', '0312876543', 'Near Goldfields, Tarkwa', '2024-07-15 13:02:28', '2024-07-15 13:02:28'),
(14, 'Techiman Agro-Machine Care', 'contact@techimanagro.com', '0352987654', 'Techiman Market Area, Techiman', '2024-07-15 13:02:28', '2024-07-15 13:02:28'),
(15, 'Obuasi Gold City Auto Services', 'info@obuasiauto.com', '0322765432', 'Near AngloGold Ashanti, Obuasi', '2024-07-15 13:02:28', '2024-07-15 13:02:28');

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
(5, 'Spark Plug Replacement'),
(6, 'Battery Check'),
(7, 'Transmission Fluid Change'),
(8, 'Coolant System Flush'),
(9, 'Wheel Alignment'),
(10, 'Fuel Filter Replacement'),
(11, 'Timing Belt Replacement'),
(12, 'Suspension Check'),
(13, 'Exhaust System Inspection'),
(14, 'Power Steering Fluid Check'),
(15, 'Windshield Wiper Replacement'),
(16, 'Headlight and Taillight Check'),
(17, 'Belt Inspection (Serpentine, Drive)'),
(18, 'Cabin Air Filter Replacement'),
(19, 'Engine Diagnostics'),
(20, 'Brake Fluid Flush'),
(21, 'Tire Pressure Check and Adjustment'),
(22, 'Alternator Inspection'),
(23, 'Starter Motor Check'),
(24, 'Radiator Inspection'),
(25, 'Shock Absorber Inspection'),
(26, 'Clutch Adjustment (for manual transmissions)'),
(27, 'Differential Fluid Change'),
(28, 'Engine Mount Inspection'),
(29, 'CV Joint and Boot Inspection'),
(30, 'Thermostat Replacement'),
(31, 'Oxygen Sensor Check'),
(32, 'Fuel Injector Cleaning'),
(33, 'Hose Inspection (Coolant, Vacuum, Fuel)'),
(34, 'PCV Valve Check'),
(35, 'Timing Chain Inspection'),
(36, 'Catalytic Converter Inspection'),
(37, 'Turbocharger Inspection (for turbocharged engines)'),
(38, 'Mass Air Flow Sensor Cleaning'),
(39, 'Throttle Body Cleaning'),
(40, 'EGR Valve Cleaning');

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
(27, '2024_06_22_124155_create_chats_table', 1),
(28, '2024_06_22_124217_create_chats_participants_table', 1),
(29, '2024_06_22_124303_create_chats_threads_table', 1),
(30, '2024_06_28_124827_create_maintenance_providers_table', 1),
(31, '2024_07_03_151354_add_route_to_shipment_table', 1),
(32, '2024_07_09_064137_create_login_activity_table', 1),
(33, '2024_07_11_033310_add_last_location_to_vehicles_table', 1),
(34, '2024_07_11_233217_add_starting_point_name_and_destination_name_to_shipments_table', 1),
(35, '2024_07_13_182843_add_last_location_to_drivers_table', 1),
(36, '2024_07_13_191724_add_shipment_status_to_vehicles_table', 1),
(37, '2024_07_17_063908_add_price_to_loads_table', 2),
(38, '2024_07_17_063204_create_bids_table', 3),
(39, '2024_07_17_064249_create_bids_history_table', 3);

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
(1, '66956157ca60c.jpg', 'Ghana', 'Greater Accra', '[]', 'Jess Freight Organization', '**Jess Freight Organization** is a dynamic and reliable logistics company dedicated to moving loads efficiently from one place to another. Specializing in the transportation of various types of goods, Jess Freight Organization ensures timely, secure, and cost-effective delivery solutions. Our experienced team and modern fleet are equipped to handle everything from perishable goods to waste and recycling materials, providing tailored services to meet the unique needs of our clients. At Jess Freight Organization, we prioritize customer satisfaction, safety, and environmental responsibility in every shipment we undertake.', 'iamjesse75@gmail.com', '0268977129', 'KNUST, Ghana', NULL, NULL, '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', 'Approved', 'TA9090923453', NULL, '$2y$10$qzSI2.DIwT1tV2rnRIOG7Ogpq39mAeZHQH8WX5E3G.j8olNioAXXO', '2024-07-27 21:12:02', '2024-07-15 04:55:59', '2024-07-27 21:13:04'),
(2, NULL, NULL, NULL, NULL, 'Gislason PLC', NULL, 'iamjesse75+organization@gmail.com', '0268977129', NULL, NULL, NULL, '9c87bab4-0173-4324-b4fd-2257a6c8fe36', 'Approved', NULL, NULL, '$2y$10$qzSI2.DIwT1tV2rnRIOG7Ogpq39mAeZHQH8WX5E3G.j8olNioAXXO', '2024-07-15 18:22:47', '2024-07-15 18:21:08', NULL),
(8, NULL, NULL, NULL, NULL, 'Salma Freight Co', NULL, 'animjesse75@gmail.com', '0268977129', NULL, NULL, NULL, '9c884a78-aeae-4484-8588-a8bcd18f93b8', 'Approved', NULL, NULL, '$2y$10$86Nyew0puEqKqW0sZXDmlO0i0VmzH.BOo/fh4QdiFiKTui38U1tAi', NULL, '2024-07-16 01:03:09', NULL),
(9, NULL, NULL, NULL, NULL, 'Evans Amoah', NULL, 'eachapi@gmail.com', '0207351000', NULL, NULL, NULL, '9c89ca74-49a8-45c1-970b-3da71a9732c6', 'Approved', NULL, NULL, '$2y$10$DGMK.c38I4FENHYF7nXKMuU.P.TsLgLZuPBiMYZ9SGxWF7eC1tMzy', NULL, '2024-07-16 18:56:50', NULL),
(10, NULL, NULL, NULL, NULL, 'Alma Testing', NULL, 'alma.telibecirevic@asu.edu', '6024818425', NULL, NULL, NULL, '9c9773c2-8b2b-49f1-b11e-b7500253f5ec', 'Approved', NULL, NULL, '$2y$10$D4sMf55WJJJg185ADUw00eshlnr5djJVFVvRKlhanU5PGepiRc9SK', '2024-07-23 13:56:19', '2024-07-23 13:56:00', NULL);

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
(1, '6697f5b5142e5.jpg', 'Jesse Anim', '0268977129', NULL, 'Ghana', 'Ashanti Region', NULL, 'Approved', '/tmp/phpU7TwIy', '9c87513c-abfb-48cd-9cc0-f388531ca5c6', 'iamjesse75@gmail.com', '$2y$10$DobA8qZ7D8mhoNi3qGjmt.frp3PKcQxbYvb3Qa2iGoro3Y3ea7ofe', '2024-07-17 17:18:51', '2024-07-15 05:26:14', NULL);

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
  `starting_point` varchar(255) NOT NULL,
  `pickup_address` varchar(255) DEFAULT NULL,
  `destination` varchar(255) NOT NULL,
  `dropoff_address` varchar(255) DEFAULT NULL,
  `mask` char(36) NOT NULL,
  `approval_status` varchar(255) NOT NULL DEFAULT 'Approved',
  `loads` text NOT NULL,
  `shipment_status` varchar(255) NOT NULL,
  `route` longtext DEFAULT NULL,
  `last_location` varchar(255) DEFAULT NULL,
  `load_assignment_method` varchar(255) NOT NULL DEFAULT 'Assign Later'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipments`
--

INSERT INTO `shipments` (`id`, `organization_id`, `driver_id`, `broker_id`, `description`, `pickup_date`, `dropoff_date`, `created_at`, `updated_at`, `starting_point`, `pickup_address`, `destination`, `dropoff_address`, `mask`, `approval_status`, `loads`, `shipment_status`, `route`, `last_location`, `load_assignment_method`) VALUES
(6, '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '9c874ca6-bfcb-4e18-84c1-9ca4736a399c', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', 'This shipment contains a variety of goods, including waste and recycling materials, as well as perishable items. The waste and recycling materials comprise paper, plastic, glass, and metal scraps, all securely packaged and labeled for safe transport to the designated recycling facility. Proper handling and disposal procedures should be followed to ensure compliance with environmental regulations. The perishable goods include fresh fruits, vegetables, dairy products, and meat, all packaged in temperature-controlled containers to maintain freshness during transit. Prompt delivery is essential to prevent spoilage and ensure the highest quality of the products upon arrival. Adherence to proper handling and disposal procedures is crucial to meet environmental standards and regulations.', NULL, NULL, '2024-07-17 10:57:32', NULL, 'Winneba', '{\"lat\":5.3622295,\"lng\":-0.6298922}', 'Prestea', '{\"lat\":5.437319899999999,\"lng\":-2.1401139}', '39168616', 'Approved', '[\"37868811\"]', 'Delivered', '[]', NULL, 'Assign Later'),
(7, '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '9c80e190-e928-4930-8232-0c', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', 'This shipment contains a variety of goods, including waste and recycling materials, as well as perishable items. The waste and recycling materials comprise paper, plastic, glass, and metal scraps, all securely packaged and labeled for safe transport to the designated recycling facility. Proper handling and disposal procedures should be followed to ensure compliance with environmental regulations. The perishable goods include fresh fruits, vegetables, dairy products, and meat, all packaged in temperature-controlled containers to maintain freshness during transit. Prompt delivery is essential to prevent spoilage and ensure the highest quality of the products upon arrival. Adherence to proper handling and disposal procedures is crucial to meet environmental standards and regulations.', NULL, NULL, '2024-07-17 10:59:22', NULL, 'Obuasi', '{\"lat\":6.2012073,\"lng\":-1.6912512}', 'Tema Harbour', '{\"lat\":5.633333299999999,\"lng\":0.0166667}', '17913322', 'Approved', '[\"11152444\",\"63446105\"]', 'Delivered', '[{\"lat\":6.688939700000001,\"lng\":-1.5968537},{\"lat\":5.8107117,\"lng\":-0.3372342}]', NULL, 'Assign Later'),
(8, '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '9c874ca6-bfcb-4e18-84c1-9ca4736a399c', '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', NULL, NULL, NULL, '2024-07-17 17:23:53', NULL, 'Kumasi - Ejisu Road', '{\"lat\":6.7162468,\"lng\":-1.5036723}', 'Tema Harbour', '{\"lat\":5.633333299999999,\"lng\":0.0166667}', '54156021', 'Approved', '[\"51907240\",\"11152444\",\"32980612\"]', 'Assigned', '[{\"lat\":6.688939700000001,\"lng\":-1.5968537},{\"lat\":10.8525941,\"lng\":-2.7605585},{\"lat\":6.2012073,\"lng\":-1.6912512},{\"lat\":5.5542469,\"lng\":-0.2059627}]', NULL, 'Assign Later');

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
  `last_location` varchar(255) DEFAULT NULL,
  `shipment_status` varchar(255) NOT NULL DEFAULT 'Unassigned',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `organization_id`, `driver_id`, `owner_id`, `image`, `load_type`, `number`, `vehicle_category_id`, `vehicle_subcategory_id`, `make`, `model`, `year`, `color`, `mask`, `gps`, `engine_type`, `transmission`, `fuel_consumption`, `axle_type`, `weight`, `max_load_weight`, `width`, `height`, `length`, `owners_documents`, `road_worth_documents`, `insurance_documents`, `last_location`, `shipment_status`, `created_at`, `updated_at`) VALUES
(1, '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '9c874ca6-bfcb-4e18-84c1-9ca4736a399c', '1', '66956989757d2.jpg', '[\"General Cargo\",\"Dry Bulk\"]', 'GT-1234-20', '1', '1', 'Scania', 'R500', '2022', '#0047AB', '9c80fa9c-b243-487b-b409-0046a478ef10', 'Yes', 'Diesel', 'Manual', '40', 'Tandem', '8000', '30000', '2', '3', '12', '669569fb53efa.pdf', '66641bbd3d92a.pdf', '66641bbd3d93a.pdf', '5.6037, -0.1870', 'Unassigned', '2024-07-15 12:58:26', '2024-07-17 12:28:25'),
(2, '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '9c80e190-e928-4930-8232-0c', '1', '669588b87bd9e.jpg', '[\"Refrigerated Goods\",\"Perishables\"]', 'GW-5678-21', '2', '2', 'Volvo', 'FH16', '2021', '#FF4500', '8d70fa9d-c354-598c-c510-1157b589fg21', 'Yes', 'Diesel', 'Automatic', '38', 'Tridem', '9000', '25000', '2', '4', '13', '66641bbd3d91b.pdf', '66641bbd3d92b.pdf', '66641bbd3d93b.pdf', '6.6885, -1.6244', 'Unassigned', '2024-07-15 12:58:26', '2024-07-15 05:18:25'),
(3, '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '7e60e20c-g140-6152-0454-2e', '1', '66641bbd3d90c.png', '[\"Tanker\",\"Liquid Bulk\"]', 'GE-9012-22', '3', '1', 'Mercedes-Benz', 'Actros', '2023', '#32CD32', '7e60fa0e-d465-609d-d621-2268c690gh32', 'Yes', 'Diesel', 'Automatic', '42', 'Tandem', '7500', '28000', '2', '3', '11', '66641bbd3d91c.pdf', '66641bbd3d92c.pdf', '66641bbd3d93c.pdf', '4.8963, -1.7555', 'Unassigned', '2024-07-15 12:58:26', '2024-07-15 12:58:26'),
(4, '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '8d70f191-f039-5041-9343-1d', '1', '66641bbd3d90d.png', '[\"Container\",\"General Cargo\"]', 'GN-3456-23', '4', '2', 'MAN', 'TGX', '2022', '#4B0082', '6f50fa1f-e576-710e-e732-3379d701hi43', 'Yes', 'Diesel', 'Manual', '39', 'Tridem', '8500', '32000', '2.48', '3.9', '14', '66641bbd3d91d.pdf', '66641bbd3d92d.pdf', '66641bbd3d93d.pdf', '9.4075, -0.8533', 'Unassigned', '2024-07-15 12:58:26', '2024-07-15 12:58:26'),
(5, '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', '5e40c22e-i362-8374-2676-4g', '1', '66641bbd3d90e.png', '[\"Flatbed\",\"Construction Materials\"]', 'GR-7890-24', '5', '1', 'DAF', 'XF', '2021', '#B8860B', '5e40fa2g-f687-821f-f843-4480e812ij54', 'Yes', 'Diesel', 'Manual', '41', 'Tandem', '7800', '29000', '2.52', '3.6', '12.5', '66641bbd3d91e.pdf', '66641bbd3d92e.pdf', '66641bbd3d93e.pdf', '6.6016, 0.4675', 'Unassigned', '2024-07-15 12:58:26', '2024-07-15 12:58:26'),
(6, '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', NULL, '1', '66641bbd3d90f.png', '[\"General Cargo\",\"Dry Bulk\"]', 'GC-2345-25', '6', '2', 'Iveco', 'Stralis', '2023', '#8B4513', '4d30fa3h-g798-932g-g954-5591f923jk65', 'Yes', 'Diesel', 'Automatic', '37', 'Tandem', '8200', '27000', '2.45', '3.8', '11.8', '66641bbd3d91f.pdf', '66641bbd3d92f.pdf', '66641bbd3d93f.pdf', '5.1053, -1.2466', 'Unassigned', '2024-07-15 12:58:26', '2024-07-15 12:58:26'),
(7, '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', NULL, '1', '66641bbd3d90g.png', '[\"Refrigerated Goods\",\"Perishables\"]', 'GE-6789-26', '7', '1', 'Renault', 'T High', '2022', '#008080', '3c20fa4i-h809-043h-h065-6602g034kl76', 'Yes', 'Diesel', 'Manual', '40', 'Tridem', '8800', '26000', '2.53', '3.9', '13.2', '66641bbd3d91g.pdf', '66641bbd3d92g.pdf', '66641bbd3d93g.pdf', '6.0941, -0.2591', 'Unassigned', '2024-07-15 12:58:26', '2024-07-15 12:58:26'),
(8, '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', NULL, '1', '66641bbd3d90h.png', '[\"Tanker\",\"Liquid Bulk\"]', 'GW-0123-27', '8', '2', 'Hino', '700 Series', '2021', '#800080', '2b10fa5j-i910-154i-i176-7713h145lm87', 'Yes', 'Diesel', 'Automatic', '38', 'Tandem', '7700', '31000', '2.5', '3.7', '12.8', '66641bbd3d91h.pdf', '66641bbd3d92h.pdf', '66641bbd3d93h.pdf', '7.3349, -2.3296', 'Unassigned', '2024-07-15 12:58:26', '2024-07-15 12:58:26'),
(9, '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', NULL, '1', '66641bbd3d90i.png', '[\"Container\",\"General Cargo\"]', 'GN-4567-28', '9', '1', 'Isuzu', 'Giga', '2023', '#006400', '1a00fa6k-j021-265j-j287-8824i256mn98', 'Yes', 'Diesel', 'Manual', '39', 'Tridem', '8300', '28000', '2.47', '3.8', '13.8', '66641bbd3d91i.pdf', '66641bbd3d92i.pdf', '66641bbd3d93i.pdf', '10.7865, -0.8521', 'Unassigned', '2024-07-15 12:58:26', '2024-07-15 12:58:26'),
(10, '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', NULL, '1', '66641bbd3d90j.png', '[\"Flatbed\",\"Construction Materials\"]', 'GR-8901-29', '10', '2', 'UD Trucks', 'Quon', '2022', '#8B0000', '0900fa7l-k132-376k-k398-9935j367no09', 'Yes', 'Diesel', 'Automatic', '41', 'Tandem', '8100', '30000', '2.51', '3.6', '12.2', '66641bbd3d91j.pdf', '66641bbd3d92j.pdf', '66641bbd3d93j.pdf', '10.0601, -2.5099', 'Unassigned', '2024-07-15 12:58:26', '2024-07-15 12:58:26'),
(11, '9c87466b-e193-4f5b-b1b4-4d59ce6d039b', NULL, '1', '669587313d685.jpg', '[\"General Cargo\",\"Refrigerated Goods\",\"Overweight Cargo\"]', 'GT-9980-A', '2', '5', 'Heartland', 'RV', '2000', '#6a2424', '9c87e969-8cf5-4433-b149-4881c69acbf9', 'No', 'Petrol', 'Manual', '3000', '7x7', '1', '1', '1', '1', '1', '6695874823bb4.pdf', NULL, NULL, NULL, 'Unassigned', NULL, '2024-07-15 20:32:08');

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
(10, 'Airfreight Containers'),
(11, 'Trucks'),
(12, 'Trailers'),
(13, 'Specialized Vehicles'),
(14, 'Vans'),
(15, 'Buses'),
(16, 'Specialty Vehicles'),
(17, 'Intermodal Vehicles'),
(18, 'Motorbike'),
(19, 'Tri-cycle'),
(20, 'Airfreight Containers'),
(21, 'Light Commercial Vehicles'),
(22, 'Heavy Equipment'),
(23, 'Emergency Vehicles'),
(24, 'Agricultural Vehicles'),
(25, 'Recreational Vehicles');

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
(1, '9c87e969-8cf5-4433-b149-4881c69acbf9', 'Jess Freight Organization', 'iamjesse75@gmail.com', '0268977129', NULL, NULL, NULL),
(2, '9c8b80ec-1c3d-4fb7-9f2f-a12ee2f59074', 'ladybird logistics', 'iamjesse75@gmail.com', '0268977129', 'KNUST, Ghana', NULL, NULL);

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
(2, 'Refrigerated Truck'),
(3, 'Box Truck'),
(4, 'Refrigerated Truck'),
(5, 'Flatbed Truck'),
(6, 'Dump Truck'),
(7, 'Tanker Truck'),
(8, 'Logging Truck'),
(9, 'Concrete Mixer Truck'),
(10, 'Flatbed Trailer'),
(11, 'Lowboy Trailer'),
(12, 'Reefer Trailer'),
(13, 'Dry Van Trailer'),
(14, 'Step Deck Trailer'),
(15, 'Crane Truck'),
(16, 'Garbage Truck'),
(17, 'Street Sweeper'),
(18, 'Snow Plow'),
(19, 'Cargo Van'),
(20, 'Passenger Van'),
(21, 'Panel Van'),
(22, 'Minivan'),
(23, 'School Bus'),
(24, 'City Bus'),
(25, 'Coach Bus'),
(26, 'Minibus'),
(27, 'Food Truck'),
(28, 'Armored Vehicle'),
(29, 'Mobile Library'),
(30, 'Mobile Medical Unit'),
(31, 'Container Chassis'),
(32, 'Skeletal Trailer'),
(33, 'Swap Body'),
(34, 'Scooter'),
(35, 'Motorcycle'),
(36, 'Moped'),
(37, 'Cargo Tricycle'),
(38, 'Passenger Tricycle'),
(39, 'LD3 Container'),
(40, 'LD7 Container'),
(41, 'LD11 Container'),
(42, 'Pickup Truck'),
(43, 'Delivery Van'),
(44, 'Utility Vehicle'),
(45, 'Excavator'),
(46, 'Bulldozer'),
(47, 'Wheel Loader'),
(48, 'Backhoe'),
(49, 'Ambulance'),
(50, 'Fire Truck'),
(51, 'Police Vehicle'),
(52, 'Tractor'),
(53, 'Combine Harvester'),
(54, 'Sprayer'),
(55, 'Motorhome'),
(56, 'Travel Trailer'),
(57, 'Camper Van');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bids_history`
--
ALTER TABLE `bids_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bids_history_bid_id_foreign` (`bid_id`);

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
-- Indexes for table `login_activity`
--
ALTER TABLE `login_activity`
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
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bids_history`
--
ALTER TABLE `bids_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brokers`
--
ALTER TABLE `brokers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loads`
--
ALTER TABLE `loads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `load_types`
--
ALTER TABLE `load_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `login_activity`
--
ALTER TABLE `login_activity`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `maintenance_providers`
--
ALTER TABLE `maintenance_providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `maintenance_schedule`
--
ALTER TABLE `maintenance_schedule`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maintenance_tasks`
--
ALTER TABLE `maintenance_tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sub_loads`
--
ALTER TABLE `sub_loads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vehicle_categories`
--
ALTER TABLE `vehicle_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `vehicle_owners`
--
ALTER TABLE `vehicle_owners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle_routes`
--
ALTER TABLE `vehicle_routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle_sub_categories`
--
ALTER TABLE `vehicle_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bids_history`
--
ALTER TABLE `bids_history`
  ADD CONSTRAINT `bids_history_bid_id_foreign` FOREIGN KEY (`bid_id`) REFERENCES `bids` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
