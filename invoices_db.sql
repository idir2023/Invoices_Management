-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 04 oct. 2023 à 14:39
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `invoices_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
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
-- Structure de la table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` varchar(50) NOT NULL,
  `invoice_Date` date DEFAULT NULL,
  `Due_date` date DEFAULT NULL,
  `product` varchar(50) NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `Amount_collection` decimal(8,2) DEFAULT NULL,
  `Amount_Commission` decimal(8,2) NOT NULL,
  `Discount` decimal(8,2) NOT NULL,
  `Value_VAT` decimal(8,2) NOT NULL,
  `Rate_VAT` varchar(999) NOT NULL,
  `Total` decimal(8,2) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Value_Status` int(11) NOT NULL,
  `note` text DEFAULT NULL,
  `Payment_Date` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_number`, `invoice_Date`, `Due_date`, `product`, `section_id`, `Amount_collection`, `Amount_Commission`, `Discount`, `Value_VAT`, `Rate_VAT`, `Total`, `Status`, `Value_Status`, `note`, `Payment_Date`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '34-SD', '2023-10-03', '2023-10-24', 'BB', 1, '120000.00', '7000.00', '0.00', '700.00', '10%', '7700.00', 'مدفوعة', 1, 'hhhhhhhhhhhhhhhhh', '2023-10-03', NULL, '2023-10-03 11:03:47', '2023-10-03 11:08:31'),
(2, '54-TY', '2023-10-03', '2023-10-18', 'AA', 2, '120000.00', '120000.00', '0.00', '6000.00', '5%', '126000.00', 'مدفوعة جزئيا', 3, 'gggggg', '2023-10-04', NULL, '2023-10-03 11:17:34', '2023-10-03 14:47:13'),
(3, '45-TRF', '2023-10-03', '2023-10-10', 'BB', 1, '20000.00', '15000.00', '0.00', '750.00', '5%', '15750.00', 'غير مدفوعة', 2, 'bbbb', NULL, NULL, '2023-10-03 14:46:23', '2023-10-03 14:46:23'),
(4, 'MK-54', '2023-10-03', '2023-10-03', 'BB', 1, '230988.00', '234000.00', '0.00', '11700.00', '5%', '245700.00', 'مدفوعة', 1, NULL, NULL, NULL, '2023-10-03 17:22:20', '2023-10-03 17:41:23'),
(5, 'RE-54', '2023-10-03', '2023-10-09', 'BB', 1, '30000.00', '20000.00', '0.00', '1000.00', '5%', '21000.00', 'مدفوعة جزئيا', 3, NULL, '2023-10-02', NULL, '2023-10-03 17:26:19', '2023-10-03 17:41:48'),
(6, '23', '2023-10-03', '2023-10-10', 'AA', 2, '90000.00', '50000.00', '0.00', '2500.00', '5%', '52500.00', 'غير مدفوعة', 2, NULL, NULL, NULL, '2023-10-03 17:29:39', '2023-10-03 17:29:39'),
(7, '34', '2023-10-03', '2023-10-16', 'BB', 1, '34000.00', '23999.00', '0.00', '1199.95', '5%', '25198.95', 'غير مدفوعة', 2, NULL, NULL, NULL, '2023-10-03 17:39:05', '2023-10-03 17:39:05'),
(8, '45', '2023-10-03', '2023-10-05', 'AA', 2, '60000.00', '40000.00', '2000.00', '1900.00', '5%', '39900.00', 'مدفوعة جزئيا', 3, NULL, '2023-09-30', NULL, '2023-10-03 17:44:08', '2023-10-03 18:13:42'),
(9, '45-FG', '2023-10-03', '2023-10-11', 'BB', 1, '345000.00', '234000.00', '0.00', '11700.00', '5%', '245700.00', 'مدفوعة', 1, NULL, '2023-10-04', NULL, '2023-10-03 18:10:02', '2023-10-03 18:46:29'),
(10, '34-GH', '2023-10-03', '2023-10-08', 'AA', 2, '50000.00', '40000.00', '0.00', '2000.00', '5%', '42000.00', 'غير مدفوعة', 2, NULL, NULL, NULL, '2023-10-03 18:16:00', '2023-10-03 18:16:00'),
(11, '29-FD', '2023-10-03', '2023-10-09', 'BB', 1, '12000.00', '10000.00', '0.00', '500.00', '5%', '10500.00', 'مدفوعة جزئيا', 3, NULL, '2023-10-05', NULL, '2023-10-03 18:18:27', '2023-10-03 18:43:39'),
(12, '43-RE', '2023-10-03', '2023-10-04', 'BB', 1, '50000.00', '30000.00', '0.00', '1500.00', '5%', '31500.00', 'غير مدفوعة', 2, NULL, NULL, NULL, '2023-10-03 19:38:42', '2023-10-03 19:38:42'),
(13, '56-GT', '2023-10-03', '2023-10-03', 'BB', 1, '34000.00', '20000.00', '0.00', '1000.00', '5%', '21000.00', 'غير مدفوعة', 2, NULL, NULL, NULL, '2023-10-03 19:47:08', '2023-10-03 19:47:08'),
(14, '26-RT', '2023-10-03', '2023-10-11', 'BB', 1, '321000.00', '32000.00', '0.00', '1600.00', '5%', '33600.00', 'مدفوعة', 1, NULL, NULL, NULL, '2023-10-03 19:51:37', '2023-10-03 21:50:33'),
(15, 'RT-54', '2023-10-03', '2023-10-03', 'BB', 1, '20000.00', '15000.00', '0.00', '750.00', '5%', '15750.00', 'غير مدفوعة', 2, NULL, NULL, NULL, '2023-10-03 21:02:17', '2023-10-03 21:02:17'),
(16, '45-VC', '2023-10-03', '2023-10-04', 'BB', 1, '23000.00', '20000.00', '0.00', '1000.00', '5%', '21000.00', 'مدفوعة', 1, NULL, NULL, NULL, '2023-10-03 21:23:48', '2023-10-03 21:50:52'),
(17, 'SD-78', '2023-10-03', '2023-10-09', 'AA', 2, '23999.00', '21000.00', '0.00', '1050.00', '5%', '22050.00', 'غير مدفوعة', 2, NULL, NULL, NULL, '2023-10-03 21:27:49', '2023-10-03 21:27:49'),
(18, '43-FD', '2023-10-03', '2023-10-09', 'BB', 1, '12000.00', '12000.00', '0.00', '600.00', '5%', '12600.00', 'مدفوعة', 1, NULL, '2023-10-03', NULL, '2023-10-03 21:41:09', '2023-10-03 21:50:07'),
(19, '236-T', '2023-10-04', '2023-10-04', 'BB', 1, '20000.00', '12000.00', '0.00', '600.00', '5%', '12600.00', 'غير مدفوعة', 2, NULL, NULL, NULL, '2023-10-04 10:43:15', '2023-10-04 10:43:15'),
(20, '3', '2023-10-04', '2023-10-13', 'BB', 1, '234000.00', '21000.00', '0.00', '1050.00', '5%', '22050.00', 'غير مدفوعة', 2, NULL, NULL, NULL, '2023-10-04 10:52:41', '2023-10-04 10:52:41'),
(21, '54', '2023-10-04', '2023-10-07', 'BB', 1, '20000.00', '5000.00', '0.00', '250.00', '5%', '5250.00', 'غير مدفوعة', 2, NULL, NULL, NULL, '2023-10-04 10:59:07', '2023-10-04 10:59:07');

-- --------------------------------------------------------

--
-- Structure de la table `invoices_attachments`
--

CREATE TABLE `invoices_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(999) NOT NULL,
  `invoice_number` varchar(50) NOT NULL,
  `Created_by` varchar(999) NOT NULL,
  `invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `invoices_attachments`
--

INSERT INTO `invoices_attachments` (`id`, `file_name`, `invoice_number`, `Created_by`, `invoice_id`, `created_at`, `updated_at`) VALUES
(1, 'معاينه طباعة الفاتورة.pdf', '34-SD', 'lahcen idir', 1, '2023-10-03 11:03:47', '2023-10-03 11:03:47'),
(2, 'ccc.pdf', '34-SD', 'lahcen idir', 1, '2023-10-03 11:05:58', '2023-10-03 11:05:58'),
(3, 'Black Modern Professional Resume.pdf', '54-TY', 'lahcen idir', 2, '2023-10-03 11:17:34', '2023-10-03 11:17:34'),
(4, 'Attestation_reussite_IDIR_LAHCEN (2).pdf', '45-TRF', 'lahcen idir', 3, '2023-10-03 14:46:23', '2023-10-03 14:46:23'),
(5, 'Vinayak_Patil_Resume (3).pdf', 'MK-54', 'lahcen idir', 4, '2023-10-03 17:22:20', '2023-10-03 17:22:20'),
(6, 'christmas-1911637_1920.jpg', 'RE-54', 'lahcen idir', 5, '2023-10-03 17:26:19', '2023-10-03 17:26:19'),
(7, 'bbhhjgds.jpg', '23', 'lahcen idir', 6, '2023-10-03 17:29:39', '2023-10-03 17:29:39'),
(8, 'office-620817_1920.jpg', '34', 'lahcen idir', 7, '2023-10-03 17:39:05', '2023-10-03 17:39:05'),
(9, 'WhatsApp Image 2023-08-28 à 14.52.41.jpg', '45', 'lahcen idir', 8, '2023-10-03 17:44:08', '2023-10-03 17:44:08'),
(10, 'WhatsApp Image 2023-08-28 à 14.52.45.jpg', '45-FG', 'lahcen idir', 9, '2023-10-03 18:10:02', '2023-10-03 18:10:02'),
(11, 'Attestation_reussite_IDIR_LAHCEN (2) (1).pdf', '34-GH', 'lahcen idir', 10, '2023-10-03 18:16:00', '2023-10-03 18:16:00'),
(12, 'Valex -  Premium dashboard ui bootstrap rwd admin html5 template.pdf', '29-FD', 'lahcen idir', 11, '2023-10-03 18:18:27', '2023-10-03 18:18:27'),
(13, 'Attestation_reussite_IDIR_LAHCEN (2) (1).pdf', '43-RE', 'lahcen idir', 12, '2023-10-03 19:38:42', '2023-10-03 19:38:42'),
(14, 'Attestation_reussite_IDIR_LAHCEN (2) (1) (1).pdf', '56-GT', 'lahcen idir', 13, '2023-10-03 19:47:08', '2023-10-03 19:47:08'),
(15, 'Attestation_reussite_IDIR_LAHCEN (2) (1).pdf', '26-RT', 'lahcen idir', 14, '2023-10-03 19:51:37', '2023-10-03 19:51:37'),
(16, 'Valex -  Premium dashboard ui bootstrap rwd admin html5 template.pdf', 'RT-54', 'admin', 15, '2023-10-03 21:02:17', '2023-10-03 21:02:17'),
(17, 'Black Modern Professional Resume.pdf', '45-VC', 'lahcen idir', 16, '2023-10-03 21:23:48', '2023-10-03 21:23:48'),
(18, 'Attestation_reussite_IDIR_LAHCEN (2) (1).pdf', 'SD-78', 'lahcen idir', 17, '2023-10-03 21:27:49', '2023-10-03 21:27:49'),
(19, 'React+JS.pdf.pdf', '43-FD', 'admin', 18, '2023-10-03 21:41:09', '2023-10-03 21:41:09'),
(20, 'Valex -  Premium dashboard ui bootstrap rwd admin html5 template.pdf', '236-T', 'lahcen idir', 19, '2023-10-04 10:43:15', '2023-10-04 10:43:15'),
(21, 'Valex -  Premium dashboard ui bootstrap rwd admin html5 template.pdf', '3', 'admin', 20, '2023-10-04 10:52:41', '2023-10-04 10:52:41'),
(22, 'Attestation_reussite_IDIR_LAHCEN (2).pdf', '54', 'admin', 21, '2023-10-04 10:59:07', '2023-10-04 10:59:07');

-- --------------------------------------------------------

--
-- Structure de la table `invoices_details`
--

CREATE TABLE `invoices_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_Invoice` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` varchar(50) NOT NULL,
  `product` varchar(50) NOT NULL,
  `Section` varchar(999) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Value_Status` int(11) NOT NULL,
  `Payment_Date` date DEFAULT NULL,
  `note` text DEFAULT NULL,
  `user` varchar(300) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `invoices_details`
--

INSERT INTO `invoices_details` (`id`, `id_Invoice`, `invoice_number`, `product`, `Section`, `Status`, `Value_Status`, `Payment_Date`, `note`, `user`, `created_at`, `updated_at`) VALUES
(1, 1, '34-SD', 'BB', '1', 'غير مدفوعة', 2, NULL, 'nothing', 'lahcen idir', '2023-10-03 11:03:47', '2023-10-03 11:03:47'),
(2, 1, '34-SD', 'BB', '1', 'مدفوعة جزئيا', 3, '2023-10-03', 'nothing', 'lahcen idir', '2023-10-03 11:05:08', '2023-10-03 11:05:08'),
(3, 1, '34-SD', 'BB', '1', 'مدفوعة', 1, '2023-10-03', 'hhhhhhhhhhhhhhhhh', 'lahcen idir', '2023-10-03 11:08:31', '2023-10-03 11:08:31'),
(4, 2, '54-TY', 'AA', '2', 'غير مدفوعة', 2, NULL, 'gggggg', 'lahcen idir', '2023-10-03 11:17:34', '2023-10-03 11:17:34'),
(5, 3, '45-TRF', 'BB', '1', 'غير مدفوعة', 2, NULL, 'bbbb', 'lahcen idir', '2023-10-03 14:46:23', '2023-10-03 14:46:23'),
(6, 2, '54-TY', 'AA', '2', 'مدفوعة جزئيا', 3, '2023-10-04', 'gggggg', 'lahcen idir', '2023-10-03 14:47:13', '2023-10-03 14:47:13'),
(7, 4, 'MK-54', 'BB', '1', 'غير مدفوعة', 2, NULL, NULL, 'lahcen idir', '2023-10-03 17:22:20', '2023-10-03 17:22:20'),
(8, 5, 'RE-54', 'BB', '1', 'غير مدفوعة', 2, NULL, NULL, 'lahcen idir', '2023-10-03 17:26:19', '2023-10-03 17:26:19'),
(9, 6, '23', 'AA', '2', 'غير مدفوعة', 2, NULL, NULL, 'lahcen idir', '2023-10-03 17:29:39', '2023-10-03 17:29:39'),
(10, 7, '34', 'BB', '1', 'غير مدفوعة', 2, NULL, NULL, 'lahcen idir', '2023-10-03 17:39:05', '2023-10-03 17:39:05'),
(11, 4, 'MK-54', 'BB', '1', 'مدفوعة', 1, NULL, NULL, 'lahcen idir', '2023-10-03 17:41:23', '2023-10-03 17:41:23'),
(12, 5, 'RE-54', 'BB', '1', 'مدفوعة جزئيا', 3, '2023-10-02', NULL, 'lahcen idir', '2023-10-03 17:41:48', '2023-10-03 17:41:48'),
(13, 8, '45', 'AA', '2', 'غير مدفوعة', 2, NULL, NULL, 'lahcen idir', '2023-10-03 17:44:08', '2023-10-03 17:44:08'),
(14, 9, '45-FG', 'BB', '1', 'غير مدفوعة', 2, NULL, NULL, 'lahcen idir', '2023-10-03 18:10:02', '2023-10-03 18:10:02'),
(15, 8, '45', 'AA', '2', 'مدفوعة جزئيا', 3, '2023-09-30', NULL, 'lahcen idir', '2023-10-03 18:13:42', '2023-10-03 18:13:42'),
(16, 10, '34-GH', 'AA', '2', 'غير مدفوعة', 2, NULL, NULL, 'lahcen idir', '2023-10-03 18:16:00', '2023-10-03 18:16:00'),
(17, 11, '29-FD', 'BB', '1', 'غير مدفوعة', 2, NULL, NULL, 'lahcen idir', '2023-10-03 18:18:27', '2023-10-03 18:18:27'),
(18, 11, '29-FD', 'BB', '1', 'مدفوعة جزئيا', 3, '2023-10-05', NULL, 'lahcen idir', '2023-10-03 18:43:39', '2023-10-03 18:43:39'),
(19, 9, '45-FG', 'BB', '1', 'مدفوعة', 1, '2023-10-04', NULL, 'lahcen idir', '2023-10-03 18:46:29', '2023-10-03 18:46:29'),
(20, 12, '43-RE', 'BB', '1', 'غير مدفوعة', 2, NULL, NULL, 'lahcen idir', '2023-10-03 19:38:42', '2023-10-03 19:38:42'),
(21, 13, '56-GT', 'BB', '1', 'غير مدفوعة', 2, NULL, NULL, 'lahcen idir', '2023-10-03 19:47:08', '2023-10-03 19:47:08'),
(22, 14, '26-RT', 'BB', '1', 'غير مدفوعة', 2, NULL, NULL, 'lahcen idir', '2023-10-03 19:51:37', '2023-10-03 19:51:37'),
(23, 15, 'RT-54', 'BB', '1', 'غير مدفوعة', 2, NULL, NULL, 'admin', '2023-10-03 21:02:17', '2023-10-03 21:02:17'),
(24, 16, '45-VC', 'BB', '1', 'غير مدفوعة', 2, NULL, NULL, 'lahcen idir', '2023-10-03 21:23:48', '2023-10-03 21:23:48'),
(25, 17, 'SD-78', 'AA', '2', 'غير مدفوعة', 2, NULL, NULL, 'lahcen idir', '2023-10-03 21:27:49', '2023-10-03 21:27:49'),
(26, 18, '43-FD', 'BB', '1', 'غير مدفوعة', 2, NULL, NULL, 'admin', '2023-10-03 21:41:09', '2023-10-03 21:41:09'),
(27, 18, '43-FD', 'BB', '1', 'مدفوعة', 1, '2023-10-03', NULL, 'admin', '2023-10-03 21:50:07', '2023-10-03 21:50:07'),
(28, 14, '26-RT', 'BB', '1', 'مدفوعة', 1, NULL, NULL, 'admin', '2023-10-03 21:50:33', '2023-10-03 21:50:33'),
(29, 16, '45-VC', 'BB', '1', 'مدفوعة', 1, NULL, NULL, 'admin', '2023-10-03 21:50:52', '2023-10-03 21:50:52'),
(30, 19, '236-T', 'BB', '1', 'غير مدفوعة', 2, NULL, NULL, 'lahcen idir', '2023-10-04 10:43:15', '2023-10-04 10:43:15'),
(31, 20, '3', 'BB', '1', 'غير مدفوعة', 2, NULL, NULL, 'admin', '2023-10-04 10:52:41', '2023-10-04 10:52:41'),
(32, 21, '54', 'BB', '1', 'غير مدفوعة', 2, NULL, NULL, 'admin', '2023-10-04 10:59:07', '2023-10-04 10:59:07');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_20_121403_create_sections_table', 1),
(6, '2023_09_21_120328_create_products_table', 1),
(7, '2023_09_22_210253_create_invoices_table', 1),
(8, '2023_09_23_131908_create_invoices_details_table', 1),
(9, '2023_09_23_152153_create_invoices_attachments_table', 1),
(10, '2023_10_01_212147_create_permission_tables', 1),
(11, '2023_10_03_194917_create_notifications_table', 2);

-- --------------------------------------------------------

--
-- Structure de la table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0b522a5f-ff64-40b9-a93d-27cad237bc81', 'App\\Notifications\\Add_invoice_new', 'App\\Models\\User', 1, '{\"id\":17,\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0641\\u0627\\u062a\\u0648\\u0631\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629 :\",\"user\":\"lahcen idir\"}', '2023-10-04 09:01:54', '2023-10-03 21:27:49', '2023-10-04 09:01:54'),
('4437bcc0-f12b-4ecb-bc25-cf8f1da9da25', 'App\\Notifications\\Add_invoice_new', 'App\\Models\\User', 3, '{\"id\":19,\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0641\\u0627\\u062a\\u0648\\u0631\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629 :\",\"user\":\"lahcen idir\"}', NULL, '2023-10-04 10:43:15', '2023-10-04 10:43:15'),
('4a2b5f38-6e55-4290-8d55-5f18063aeb76', 'App\\Notifications\\Add_invoice_new', 'App\\Models\\User', 3, '{\"id\":20,\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0641\\u0627\\u062a\\u0648\\u0631\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629 :\",\"user\":\"admin\"}', NULL, '2023-10-04 10:52:41', '2023-10-04 10:52:41'),
('63f32358-c47a-4770-a29f-04d585b1e446', 'App\\Notifications\\Add_invoice_new', 'App\\Models\\User', 2, '{\"id\":21,\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0641\\u0627\\u062a\\u0648\\u0631\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629 :\",\"user\":\"admin\"}', NULL, '2023-10-04 10:59:07', '2023-10-04 10:59:07'),
('741e9127-fa9e-443f-8744-0b1f6f9d193b', 'App\\Notifications\\Add_invoice_new', 'App\\Models\\User', 3, '{\"id\":21,\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0641\\u0627\\u062a\\u0648\\u0631\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629 :\",\"user\":\"admin\"}', NULL, '2023-10-04 10:59:07', '2023-10-04 10:59:07'),
('86461424-da96-42e9-a453-f6c575348b71', 'App\\Notifications\\Add_invoice_new', 'App\\Models\\User', 1, '{\"id\":21,\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0641\\u0627\\u062a\\u0648\\u0631\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629 :\",\"user\":\"admin\"}', NULL, '2023-10-04 10:59:07', '2023-10-04 10:59:07'),
('8f546d9f-fae5-41b7-9a27-fda5ba5cc7c6', 'App\\Notifications\\Add_invoice_new', 'App\\Models\\User', 2, '{\"id\":18,\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0641\\u0627\\u062a\\u0648\\u0631\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629 :\",\"user\":\"admin\"}', NULL, '2023-10-03 21:41:09', '2023-10-03 21:41:09'),
('b89b95d9-d929-430a-b126-7374811db5ed', 'App\\Notifications\\Add_invoice_new', 'App\\Models\\User', 2, '{\"id\":19,\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0641\\u0627\\u062a\\u0648\\u0631\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629 :\",\"user\":\"lahcen idir\"}', NULL, '2023-10-04 10:43:15', '2023-10-04 10:43:15'),
('c90b6500-2be0-4e30-b339-ca28a299e12e', 'App\\Notifications\\Add_invoice_new', 'App\\Models\\User', 2, '{\"id\":20,\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0641\\u0627\\u062a\\u0648\\u0631\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629 :\",\"user\":\"admin\"}', NULL, '2023-10-04 10:52:41', '2023-10-04 10:52:41'),
('deb55ed7-2a35-448e-836b-0e89c00f2f9d', 'App\\Notifications\\Add_invoice_new', 'App\\Models\\User', 1, '{\"id\":20,\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0641\\u0627\\u062a\\u0648\\u0631\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629 :\",\"user\":\"admin\"}', '2023-10-04 10:54:14', '2023-10-04 10:52:41', '2023-10-04 10:54:14'),
('e17b645f-9da9-425c-8e71-44de72dc6cad', 'App\\Notifications\\Add_invoice_new', 'App\\Models\\User', 1, '{\"id\":19,\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0641\\u0627\\u062a\\u0648\\u0631\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629 :\",\"user\":\"lahcen idir\"}', '2023-10-04 10:54:14', '2023-10-04 10:43:15', '2023-10-04 10:54:14');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'الفواتير', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(2, 'قائمة الفواتير', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(3, 'الفواتير المدفوعة', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(4, 'الفواتير المدفوعة جزئيا', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(5, 'الفواتير الغير مدفوعة', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(6, 'ارشيف الفواتير', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(7, 'التقارير', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(8, 'تقرير الفواتير', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(9, 'تقرير العملاء', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(10, 'المستخدمين', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(11, 'قائمة المستخدمين', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(12, 'صلاحيات المستخدمين', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(13, 'الاعدادات', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(14, 'المنتجات', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(15, 'الاقسام', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(16, 'اضافة فاتورة', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(17, 'حذف الفاتورة', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(18, 'تصدير EXCEL', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(19, 'تغير حالة الدفع', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(20, 'تعديل الفاتورة', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(21, 'ارشفة الفاتورة', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(22, 'طباعةالفاتورة', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(23, 'اضافة مرفق', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(24, 'حذف المرفق', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(25, 'اضافة مستخدم', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(26, 'تعديل مستخدم', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(27, 'حذف مستخدم', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(28, 'عرض صلاحية', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(29, 'اضافة صلاحية', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(30, 'تعديل صلاحية', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(31, 'حذف صلاحية', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(32, 'اضافة منتج', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(33, 'تعديل منتج', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(34, 'حذف منتج', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(35, 'اضافة قسم', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(36, 'تعديل قسم', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(37, 'حذف قسم', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44'),
(38, 'الاشعارات', 'web', '2023-10-02 19:17:44', '2023-10-02 19:17:44');

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
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
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(999) NOT NULL,
  `description` text DEFAULT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `product_name`, `description`, `section_id`, `created_at`, `updated_at`) VALUES
(1, 'BB', NULL, 1, '2023-10-03 11:02:17', '2023-10-03 11:02:17'),
(3, 'AA', NULL, 2, '2023-10-03 11:02:31', '2023-10-03 11:02:31');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'owner', 'web', '2023-10-02 19:17:47', '2023-10-02 19:17:47'),
(2, 'admin', 'web', '2023-10-02 19:18:56', '2023-10-02 19:18:56'),
(3, 'user', 'web', '2023-10-03 11:09:21', '2023-10-03 11:09:21');

-- --------------------------------------------------------

--
-- Structure de la table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(7, 2),
(8, 1),
(9, 1),
(10, 1),
(10, 2),
(10, 3),
(11, 1),
(11, 2),
(11, 3),
(12, 1),
(12, 2),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(16, 2),
(17, 1),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(21, 1),
(22, 1),
(22, 2),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1);

-- --------------------------------------------------------

--
-- Structure de la table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_name` varchar(999) NOT NULL,
  `description` text DEFAULT NULL,
  `created_by` varchar(999) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sections`
--

INSERT INTO `sections` (`id`, `section_name`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'البنك العربي', NULL, 'lahcen idir', '2023-10-03 11:01:43', '2023-10-03 11:01:43'),
(2, 'بنك المغرب', NULL, 'lahcen idir', '2023-10-03 11:01:55', '2023-10-03 11:01:55');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_name` text NOT NULL,
  `Status` varchar(10) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_name`, `Status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'lahcen idir', 'lahcenidir700@gmail.com', NULL, '$2y$10$Iw3vGs7b5TZrI7oylfgwP.SSn6MPyNSUsfSc05eHFIYHu2ukMRvh6', '[\"owner\"]', 'مفعل', NULL, '2023-10-02 19:17:47', '2023-10-02 19:17:47'),
(2, 'admin', 'idirlh600@yahoo.com', NULL, '$2y$10$IP2c/DJcr6AiqJlHhyWHk..NEgZgHsDBsGK2BxBwtzU2kMvVCuZJu', '[\"admin\"]', 'مفعل', NULL, '2023-10-02 19:19:44', '2023-10-02 19:28:17'),
(3, 'user', 'user@gmail.com', NULL, '$2y$10$TOyvv0RTArMYLRwrb32hL.93uJ3ObjZdVbAPkKhTO96n9dkCVRg4C', '[\"user\"]', 'مفعل', NULL, '2023-10-03 11:10:07', '2023-10-03 11:10:07');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_section_id_foreign` (`section_id`);

--
-- Index pour la table `invoices_attachments`
--
ALTER TABLE `invoices_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_attachments_invoice_id_foreign` (`invoice_id`);

--
-- Index pour la table `invoices_details`
--
ALTER TABLE `invoices_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_details_id_invoice_foreign` (`id_Invoice`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_section_id_foreign` (`section_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Index pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Index pour la table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `invoices_attachments`
--
ALTER TABLE `invoices_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `invoices_details`
--
ALTER TABLE `invoices_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `invoices_attachments`
--
ALTER TABLE `invoices_attachments`
  ADD CONSTRAINT `invoices_attachments_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `invoices_details`
--
ALTER TABLE `invoices_details`
  ADD CONSTRAINT `invoices_details_id_invoice_foreign` FOREIGN KEY (`id_Invoice`) REFERENCES `invoices` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
