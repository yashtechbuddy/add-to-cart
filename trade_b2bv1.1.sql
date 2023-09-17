-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2023 at 03:01 PM
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
-- Database: `trade_b2b`
--

-- --------------------------------------------------------

--
-- Table structure for table `pagevisibility`
--

CREATE TABLE `pagevisibility` (
  `id` int(11) UNSIGNED NOT NULL,
  `page_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT 1,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pagevisibility`
--

INSERT INTO `pagevisibility` (`id`, `page_name`, `page_link`, `visibility`, `create_at`, `update_at`) VALUES
(1, 'Home', ' index.php', 1, '2023-07-24 08:40:37', '2023-07-29 06:38:53'),
(2, '    Buyers', ' buyers.php', 1, '2023-07-29 06:15:33', '2023-07-29 06:47:55'),
(3, 'Suppliers', ' supplier.php', 1, '2023-07-29 06:15:59', '2023-07-29 06:39:42'),
(4, '   Products', ' product.php', 1, '2023-07-29 06:16:45', '2023-07-29 06:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about_us`
--

CREATE TABLE `tbl_about_us` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `small_title` varchar(300) NOT NULL,
  `image` varchar(100) NOT NULL,
  `alt_tag` varchar(1000) NOT NULL,
  `description` mediumtext NOT NULL,
  `mission_title` varchar(100) NOT NULL,
  `mission_image` varchar(200) NOT NULL,
  `mission_description` varchar(500) NOT NULL,
  `vission_title` varchar(100) NOT NULL,
  `vission_image` varchar(200) NOT NULL,
  `vission_description` varchar(500) NOT NULL,
  `goals_title` varchar(100) NOT NULL,
  `goals_image` varchar(200) NOT NULL,
  `goals_description` varchar(500) NOT NULL,
  `map_image` varchar(300) NOT NULL,
  `map_title` varchar(300) NOT NULL,
  `map_description` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_about_us`
--

INSERT INTO `tbl_about_us` (`id`, `title`, `small_title`, `image`, `alt_tag`, `description`, `mission_title`, `mission_image`, `mission_description`, `vission_title`, `vission_image`, `vission_description`, `goals_title`, `goals_image`, `goals_description`, `map_image`, `map_title`, `map_description`) VALUES
(1, 'Who We Are', '<span>27</span><p>Years<br/>Experience<br/>Working</p>', 'Aboutus-6050_Untitled-2.png', '', 'Trading web site is a tech-enabled platform that facilitates raw material procurement and credit for SMEs with focus in the manufacturing and infrastructure sectors. It integrates technology to SME\'s buying behavior to make available better products, at better prices, in better timelines to customers with a comprehensive online and offline support. Key raw materials include metals, chemicals, polymers, agree commodities, petrochemicals and building materials. Trading provides SMEs access to cash flow-based financing for buying raw materials through its NBFC \'Oxyzo Financial Services\'. The Company also offers a host of tech services for SMEs including BidAssist for new growth opportunities.', 'Mission', 'Mission-3863_mission-removebg-preview.png', '<p>Our mission is to create value for all stakeholders, grow through innovation while leading good governance practices, and to use Sustainability to drive product development and enhance operational efficiencies.</p>', 'Vision', 'Vision-99629_14dcf2e24c050acc1880f06f697e490a-removebg-preview.png', '<p>Through sustainable measures, we intend to create value for the nation, enhance quality of life across the socio-economic spectrum, and aspire to be one of the global leaders in the domains where we operate.</p>', 'Goals', 'Goals-78097_achievement-icon-25.jpeg', '<p>Our goal is to develop and maintain a bond and trust with our Channel Partners and focus on continuous evolution for the long-term sustainability of the company by focusing on the strengths to deliver the promises we make.</p>', 'Aboutus-95059_newmapace.png', 'Global Footprints', '<ul class=\"list-style-one\">\r\n<li>INDIA</li>\r\n<li>AUSTRALIA</li>\r\n<li>UAE</li>\r\n<li>LONDON</li>\r\n<li>OMAN</li>\r\n<li>EUROPE</li>\r\n<li>CANADA</li>\r\n<li>MIDDLE EAST</li>\r\n<li>MANY MORE</li>\r\n</ul>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id` int(11) NOT NULL,
  `small_title` varchar(300) DEFAULT NULL,
  `banner_name` varchar(255) DEFAULT NULL,
  `alt_tag` varchar(1000) DEFAULT NULL,
  `banner_desc` varchar(5000) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `btn_name` varchar(500) DEFAULT NULL,
  `btn_link` varchar(500) DEFAULT NULL,
  `position_order` int(250) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `id` int(11) UNSIGNED NOT NULL,
  `blog_title` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_short_description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `category_name` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `category_name`, `category_image`, `visibility`, `created_at`, `updated_at`) VALUES
(1, 'Mild Steel', 'mildsteel.png', 1, '2023-06-21 07:31:15', '2023-07-24 10:40:00'),
(2, 'stainless steel', 'stainlesssteel.jpg', 1, '2023-07-17 04:19:27', '2023-07-24 10:30:07'),
(3, 'Oil Seeds & Feed', 'oil&seeds.png', 1, '2023-07-24 12:19:58', '2023-07-24 12:28:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_us`
--

CREATE TABLE `tbl_contact_us` (
  `id` int(11) UNSIGNED NOT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email1` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `phone1` int(10) DEFAULT NULL,
  `whatsapp_no` int(10) DEFAULT NULL,
  `google_map` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_contact_us`
--

INSERT INTO `tbl_contact_us` (`id`, `address`, `address1`, `email`, `email1`, `phone`, `phone1`, `whatsapp_no`, `google_map`, `description`, `title`) VALUES
(1, '280 Granite Run Drive Suite 200 Lancaster, PA 1760', '', 'trading@gmail.com', '', 1234567890, NULL, 1234567890, '', 'any description', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(190) NOT NULL,
  `email_id` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` int(10) UNSIGNED NOT NULL,
  `country` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst_number` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `email_id`, `password`, `phone_no`, `country`, `state`, `city`, `address`, `company_name`, `gst_number`, `created_at`, `updated_at`) VALUES
(1, 'Yash vali', 'yash@gmail.com', '123', 1234567890, 'India', 'GUJARAT', 'vapi', 'chala v2 signature', 'shahConstruction', '232dcsrcs432', '2023-06-27 04:48:05', '2023-07-27 03:43:10'),
(2, 'Ravi Shah', 'ravi@gmail.com', '123', 0, '', '', '', '', 'Rndtechnosoft', '', '2023-07-29 04:32:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dept`
--

CREATE TABLE `tbl_dept` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_dept`
--

INSERT INTO `tbl_dept` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Administration', '2023-06-14 09:31:43', NULL),
(2, 'Regesteration', '2023-06-19 13:27:25', '2023-06-20 10:04:25'),
(3, 'telcommunication', '2023-06-19 13:49:13', '2023-06-20 10:00:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_emp_status`
--

CREATE TABLE `tbl_emp_status` (
  `id` int(11) UNSIGNED NOT NULL,
  `emp_status` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_emp_status`
--

INSERT INTO `tbl_emp_status` (`id`, `emp_status`) VALUES
(1, 'Active'),
(2, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faqs_customer`
--

CREATE TABLE `tbl_faqs_customer` (
  `id` int(11) UNSIGNED NOT NULL,
  `question` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_faqs_customer`
--

INSERT INTO `tbl_faqs_customer` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'How to get the prices for my requirements?', 'Click on “Get Quotes” to raise an RFQ and we will get back to you with the best rates in under 24hrs', '2023-07-27 05:03:19', '2023-07-27 07:41:50'),
(2, 'Where do you supply the raw materials in India?', 'We have our presence and cater our service Pan-India', '2023-07-27 05:03:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faqs_supplier`
--

CREATE TABLE `tbl_faqs_supplier` (
  `id` int(11) UNSIGNED NOT NULL,
  `question` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_faqs_supplier`
--

INSERT INTO `tbl_faqs_supplier` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'How can I sell my products/material through Trading?', 'You can register yourself through this link and our Supplier Relations Manager will be assigned to you for further process', '2023-07-27 05:30:56', NULL),
(2, 'Do you take any charges for your services?', 'No, We do not charge any fee for onboarding or sharing enquiries from our suppliers', '2023-07-27 05:30:56', NULL),
(3, 'Do you provide financial support to Suppliers?', ' Yes, we provide working capital loans and invoice discounting facilities to our verified supplier\'s', '2023-07-27 06:15:18', '2023-07-27 07:48:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer_setting`
--

CREATE TABLE `tbl_footer_setting` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_us_des` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_footer_setting`
--

INSERT INTO `tbl_footer_setting` (`id`, `name`, `logo`, `alt_tag`, `about_us_des`, `facebook_link`, `twitter_link`, `instagram_link`, `youtube_link`, `create_at`, `update_at`) VALUES
(1, 'Trading', 'Logo-11981_logo.jpg', 'logo', 'Duty the obligations of business will frequently occur that pleasure have too repudiated annoyances endures accepted.', '', '', '', '', '2023-07-01 09:01:28', '2023-07-24 07:36:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inquiry`
--

CREATE TABLE `tbl_inquiry` (
  `id` int(11) UNSIGNED NOT NULL,
  `autogenrated_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int(11) UNSIGNED DEFAULT NULL,
  `product_id` int(11) UNSIGNED DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `volume_name` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inquiry_status_id` int(11) DEFAULT 1,
  `emp_assign_id` int(11) UNSIGNED DEFAULT 0,
  `supplier_assign_id` int(11) UNSIGNED DEFAULT 0,
  `Quotation_pdf` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_inquiry`
--

INSERT INTO `tbl_inquiry` (`id`, `autogenrated_id`, `customer_id`, `product_id`, `quantity`, `volume_name`, `inquiry_status_id`, `emp_assign_id`, `supplier_assign_id`, `Quotation_pdf`, `created_at`, `updated_at`) VALUES
(8, 'MqSft#4488238605', 1, 1, 2, 'MT', 1, 2, 2, NULL, '2023-07-28 06:24:33', '2023-07-28 06:45:02'),
(10, 'pHLES+7766800326', 1, 1, 1, 'Kg', 1, 0, 0, NULL, '2023-07-28 07:34:00', NULL),
(11, 'kqdxJ%5408590948', 1, 1, 1, 'Kg', 1, 0, 0, NULL, '2023-07-29 04:16:24', '2023-07-29 04:31:02'),
(12, 'gcPwl&5012232783', 1, 1, 1, 'Kg', 1, NULL, NULL, NULL, '2023-07-29 04:22:47', NULL),
(13, 'oViJS+5457060648', 2, 1, 1, 'Kg', 1, 0, 0, NULL, '2023-07-29 04:34:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inquiry_status`
--

CREATE TABLE `tbl_inquiry_status` (
  `id` int(11) UNSIGNED NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_inquiry_status`
--

INSERT INTO `tbl_inquiry_status` (`id`, `status`) VALUES
(1, 'pending'),
(2, 'processing'),
(3, 'Done'),
(4, 'Failed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logo`
--

CREATE TABLE `tbl_logo` (
  `id` int(11) UNSIGNED NOT NULL,
  `favicon_logo` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fav_alt` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_logo` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_alt` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_logo` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_alt` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_logo`
--

INSERT INTO `tbl_logo` (`id`, `favicon_logo`, `fav_alt`, `header_logo`, `header_alt`, `footer_logo`, `footer_alt`, `created_at`, `updated_at`) VALUES
(1, 'Logo-59580_Logo-11981_logo.jpg', 'favicon', 'Logo-11981_logo.jpg', 'header icon', 'Logo-11981_logo.jpg', 'footer icon', '2023-07-04 04:46:47', '2023-07-04 08:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `sub_category_id` int(11) UNSIGNED DEFAULT NULL,
  `product_name` varchar(201) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `volume_id` int(11) UNSIGNED NOT NULL,
  `visibility_id` int(11) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `add-to-cart` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `category_id`, `sub_category_id`, `product_name`, `product_description`, `product_image`, `volume_id`, `visibility_id`, `created_at`, `updated_at`, `add-to-cart`) VALUES
(1, 1, NULL, 'Coated Coils', 'coated coils of mild steel.', 'coated-coils.png', 5, 1, '2023-06-23 07:17:10', '2023-07-24 12:19:45', 1),
(2, 1, NULL, 'silver blade', 'silver blade\r\n', 'coated-coils.png', 9, 1, '2023-06-29 06:27:44', '2023-07-17 06:50:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_visibility`
--

CREATE TABLE `tbl_product_visibility` (
  `id` int(11) NOT NULL,
  `product_status` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product_visibility`
--

INSERT INTO `tbl_product_visibility` (`id`, `product_status`, `created_at`, `updated_at`) VALUES
(1, 'Visible', '2023-06-23 05:41:02', NULL),
(2, 'Invisible', '2023-06-23 05:41:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `name`, `dept_id`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 1, '2023-06-15 06:00:07', NULL),
(2, 'Admin', 1, '2023-06-20 10:05:54', '2023-06-20 10:43:26'),
(3, 'Caller ', 3, '2023-06-28 04:20:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_categories`
--

CREATE TABLE `tbl_sub_categories` (
  `id` int(11) UNSIGNED DEFAULT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `sub_category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_image` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id` int(11) UNSIGNED NOT NULL,
  `company_name` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` int(10) NOT NULL,
  `whatsapp_no` int(10) NOT NULL,
  `address` text NOT NULL,
  `gst_number` varchar(100) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_pdf` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `password` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id`, `company_name`, `email`, `phone_no`, `whatsapp_no`, `address`, `gst_number`, `description`, `file_pdf`, `status_id`, `password`, `created_at`, `updated_at`) VALUES
(1, 'rnd steels', 'rdnsteels@gmail.com', 1234567890, 1234567890, 'vapi chala gujarat', '232dcsrcs432', 'one of best steel producer', NULL, 1, 123, '2023-06-26 04:01:50', '2023-07-18 06:07:57'),
(2, 'Shiv steels', 'shivsteels@gmail.com', 1234567891, 1234567891, 'vapi chala gujarat', '232dcsrcs431', ' steel producer in vapi', NULL, 1, 123, '2023-06-26 04:02:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier_items`
--

CREATE TABLE `tbl_supplier_items` (
  `id` int(11) UNSIGNED NOT NULL,
  `supplier_id` int(11) UNSIGNED NOT NULL,
  `category` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_name` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier_products`
--

CREATE TABLE `tbl_supplier_products` (
  `id` int(11) UNSIGNED NOT NULL,
  `supplier_id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `product_description` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier_status`
--

CREATE TABLE `tbl_supplier_status` (
  `id` int(11) UNSIGNED NOT NULL,
  `supplier_status` varchar(101) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_supplier_status`
--

INSERT INTO `tbl_supplier_status` (`id`, `supplier_status`) VALUES
(1, 'Active'),
(2, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `dept_id` int(11) UNSIGNED NOT NULL,
  `role_id` int(11) UNSIGNED NOT NULL,
  `mobile_no` int(10) NOT NULL,
  `description` text NOT NULL,
  `emp_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `password`, `dept_id`, `role_id`, `mobile_no`, `description`, `emp_status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin@123', 1, 2, 1234567891, '', 1, '2023-06-15 06:39:33', '2023-07-04 16:05:07'),
(2, 'Ravi shah', 'ravi@gmail.com', '123', 1, 2, 1234567891, 'To manage all task.', 1, '2023-06-17 07:30:56', '2023-07-03 09:49:24'),
(3, 'Yash', 'test@gmail.com', '123', 1, 2, 1234567891, 'tester', 1, '2023-06-26 04:13:42', NULL),
(5, 'Veer', 'veer@gmail.com', '123', 3, 3, 1234567892, 'To make call and ask for quatation.', 1, '2023-06-28 09:30:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_volume`
--

CREATE TABLE `tbl_volume` (
  `id` int(11) UNSIGNED NOT NULL,
  `volume_name` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_volume`
--

INSERT INTO `tbl_volume` (`id`, `volume_name`, `created_at`, `updated_at`) VALUES
(1, 'Kg', '2023-06-23 05:06:12', NULL),
(2, 'MT', '2023-06-23 05:06:12', NULL),
(3, 'Nos', '2023-06-23 05:06:12', NULL),
(4, 'Ltr', '2023-06-23 05:06:12', NULL),
(5, 'Kg MT', '2023-06-23 05:06:12', NULL),
(6, 'Kg MT Ltr Nos', '2023-06-23 05:06:12', NULL),
(7, ' Kg Nos', '2023-06-23 05:06:12', NULL),
(8, 'Ltr Kg MT', '2023-06-23 05:06:12', NULL),
(9, 'Nos MT Tin Kg', '2023-06-23 05:06:12', NULL),
(10, 'Ltr Nos', '2023-06-23 05:06:12', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pagevisibility`
--
ALTER TABLE `pagevisibility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_about_us`
--
ALTER TABLE `tbl_about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact_us`
--
ALTER TABLE `tbl_contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dept`
--
ALTER TABLE `tbl_dept`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_emp_status`
--
ALTER TABLE `tbl_emp_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_faqs_customer`
--
ALTER TABLE `tbl_faqs_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_faqs_supplier`
--
ALTER TABLE `tbl_faqs_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_footer_setting`
--
ALTER TABLE `tbl_footer_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_inquiry`
--
ALTER TABLE `tbl_inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_inquiry_status`
--
ALTER TABLE `tbl_inquiry_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_visibility`
--
ALTER TABLE `tbl_product_visibility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_deptcn` (`dept_id`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_supplier_items`
--
ALTER TABLE `tbl_supplier_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_supplier_products`
--
ALTER TABLE `tbl_supplier_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_supplier_status`
--
ALTER TABLE `tbl_supplier_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_dept` (`dept_id`),
  ADD KEY `emp_role` (`role_id`);

--
-- Indexes for table `tbl_volume`
--
ALTER TABLE `tbl_volume`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pagevisibility`
--
ALTER TABLE `pagevisibility`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_about_us`
--
ALTER TABLE `tbl_about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_contact_us`
--
ALTER TABLE `tbl_contact_us`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_dept`
--
ALTER TABLE `tbl_dept`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_emp_status`
--
ALTER TABLE `tbl_emp_status`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_faqs_customer`
--
ALTER TABLE `tbl_faqs_customer`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_faqs_supplier`
--
ALTER TABLE `tbl_faqs_supplier`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_footer_setting`
--
ALTER TABLE `tbl_footer_setting`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_inquiry`
--
ALTER TABLE `tbl_inquiry`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_inquiry_status`
--
ALTER TABLE `tbl_inquiry_status`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_product_visibility`
--
ALTER TABLE `tbl_product_visibility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_supplier_items`
--
ALTER TABLE `tbl_supplier_items`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_supplier_products`
--
ALTER TABLE `tbl_supplier_products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_supplier_status`
--
ALTER TABLE `tbl_supplier_status`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_volume`
--
ALTER TABLE `tbl_volume`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD CONSTRAINT `role_deptcn` FOREIGN KEY (`dept_id`) REFERENCES `tbl_dept` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `emp_dept` FOREIGN KEY (`dept_id`) REFERENCES `tbl_dept` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `emp_role` FOREIGN KEY (`role_id`) REFERENCES `tbl_role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
