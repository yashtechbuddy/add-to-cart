-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 18, 2023 at 07:30 AM
-- Server version: 10.3.39-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rndtd_trading_db`
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
(2, 'Buyers', ' buyers.php', 1, '2023-07-29 06:15:33', '2023-09-16 06:08:54'),
(3, 'Suppliers', ' supplier.php', 1, '2023-07-29 06:15:59', '2023-07-29 06:39:42'),
(4, 'Products', ' product.php', 1, '2023-07-29 06:16:45', '2023-09-16 06:09:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about_us`
--

CREATE TABLE `tbl_about_us` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `small_title` varchar(300) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image2` varchar(200) NOT NULL,
  `second_desc` text NOT NULL,
  `icon1_img` text NOT NULL,
  `icon1_title` text NOT NULL,
  `icon2_img` text NOT NULL,
  `icon2_title` text NOT NULL,
  `btn_name` varchar(191) NOT NULL,
  `alt_tag` varchar(1000) NOT NULL,
  `description` mediumtext NOT NULL,
  `mission_title` varchar(100) NOT NULL,
  `mission_icon` varchar(100) NOT NULL,
  `mission_image` varchar(200) NOT NULL,
  `mission_description` varchar(500) NOT NULL,
  `vission_title` varchar(100) NOT NULL,
  `vission_icon` varchar(100) NOT NULL,
  `vission_image` varchar(200) NOT NULL,
  `vission_description` varchar(500) NOT NULL,
  `goals_title` varchar(100) NOT NULL,
  `goals_icon` varchar(100) NOT NULL,
  `goals_image` varchar(200) NOT NULL,
  `goals_description` varchar(500) NOT NULL,
  `map_image` varchar(300) NOT NULL,
  `map_title` varchar(300) NOT NULL,
  `map_description` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_about_us`
--

INSERT INTO `tbl_about_us` (`id`, `title`, `small_title`, `image`, `image2`, `second_desc`, `icon1_img`, `icon1_title`, `icon2_img`, `icon2_title`, `btn_name`, `alt_tag`, `description`, `mission_title`, `mission_icon`, `mission_image`, `mission_description`, `vission_title`, `vission_icon`, `vission_image`, `vission_description`, `goals_title`, `goals_icon`, `goals_image`, `goals_description`, `map_image`, `map_title`, `map_description`) VALUES
(1, 'Who We Are', 'Leaders in HR Solution', 'about-56895_about-6.png', '', '', '', '', '', '', '', 'about us image', 'The great explorer of the truth, the master-builder of human happiness no one rejects dislikes avoids pleasure itself because it is pleasure but because know who do not those how to pursue pleasures rationally encounter consequences that are extremely painful desires to obtain.', 'Our Mission', 'icon-bow-and-arrow', 'Mission-3863_mission-removebg-preview.png', 'Our mission is to create value for all stakeholders, grow through innovation while leading good governance practices.', 'Our Vision', 'icon-binoculars', 'Vision-99629_14dcf2e24c050acc1880f06f697e490a-removebg-preview.png', 'Through sustainable measures, we intend to create value for the nation, enhance quality of life across the socio-economic spectrum.', 'Our Goals', 'icon-growth', 'Goals-78097_achievement-icon-25.jpeg', 'Our goal is to develop and maintain a bond and trust with our Channel Partners and focus on continuous evolution.', 'Aboutus-95059_newmapace.png', 'Global Footprints', '<ul class=\"list-style-one\">\r\n<li>INDIA</li>\r\n<li>AUSTRALIA</li>\r\n<li>UAE</li>\r\n<li>LONDON</li>\r\n<li>OMAN</li>\r\n<li>EUROPE</li>\r\n<li>CANADA</li>\r\n<li>MIDDLE EAST</li>\r\n<li>MANY MORE</li>\r\n</ul>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id` int(11) NOT NULL,
  `small_title` varchar(300) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `short_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag` varchar(1000) DEFAULT NULL,
  `banner_desc` varchar(5000) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `btn_name` varchar(500) DEFAULT NULL,
  `btn_link` varchar(500) DEFAULT NULL,
  `position_order` int(250) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`id`, `small_title`, `title`, `short_desc`, `alt_tag`, `banner_desc`, `banner_image`, `btn_name`, `btn_link`, `position_order`) VALUES
(1, ' Our Vision to Grow Better ', ' Inspired <br>  Performances', ' Duty obligations of business it will frequently occur that pleasures <br>  have to be repudiated and annoyances accepted. ', 'banner image', '', 'banner_image_slider-1-1.jpg', 'Get Quotes', 'product.php', 0),
(3, 'Best Supplier', 'We bring best supplier', 'We connect businesses with top-tier suppliers to deliver exceptional products and services.', '', '', 'banner_image_slider-1-1.jpg', 'Read More', 'https://rndtd.com/demos/trading/working/', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `id` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `alt_tag` varchar(1000) NOT NULL,
  `sort_desc` varchar(2000) NOT NULL,
  `long_desc` mediumtext NOT NULL,
  `page_name` varchar(500) NOT NULL,
  `meta_tag_id` int(100) NOT NULL,
  `create_date` varchar(100) NOT NULL,
  `credit_name` varchar(1000) NOT NULL,
  `credit_link` varchar(1000) NOT NULL,
  `position_order` int(250) NOT NULL DEFAULT 0,
  `no_of_click` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`id`, `title`, `image`, `alt_tag`, `sort_desc`, `long_desc`, `page_name`, `meta_tag_id`, `create_date`, `credit_name`, `credit_link`, `position_order`, `no_of_click`) VALUES
(5, 'Talent Management', 'Blog-77552_service-image-2.png', 'blog-image', 'Once your company has hired the best employees, the next step.', '', 'talent-management.php', 22, '03-09-2023', '', '', 3, 0),
(6, 'Risk Management', 'Blog-73031_service-image-6.jpg', 'blog-image', 'Mitigate workplace issues before they escalate ,Shared Time Human.', '', 'risk-management.php', 23, '03-09-2023', '', '', 4, 0),
(7, 'Most Employees Support', 'Blog-47852_service-image-5.jpg', '', '', '', 'most-employees-support-measures.php', 24, '04-09-2023', '', '', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buyer_benefite`
--

CREATE TABLE `tbl_buyer_benefite` (
  `id` int(11) NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_b1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `benefite1_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_b2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `benefite2_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_b3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag3` text NOT NULL,
  `benefite3_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_b4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag4` text NOT NULL,
  `benefite4_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_buyer_benefite`
--

INSERT INTO `tbl_buyer_benefite` (`id`, `title`, `description`, `image_b1`, `alt_tag1`, `benefite1_title`, `image_b2`, `alt_tag2`, `benefite2_title`, `image_b3`, `alt_tag3`, `benefite3_title`, `image_b4`, `alt_tag4`, `benefite4_title`) VALUES
(1, 'Get Best Quotation', 'Choose from a wide range of Raw Material Categories and Get the right material in the size, finish, and quantity you need - when you need it.', 'image_b1_010-job-search.png', 'icon png', 'Lowest Rates', 'image_b2_24-hours-support.png', 'icon png', 'Assured Quality', 'image_b3_exchange.png', 'icon png', 'On-Time Delivery ', 'image_b4_check.png', '', 'Buy on Credite');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buyer_whychoose`
--

CREATE TABLE `tbl_buyer_whychoose` (
  `id` int(11) NOT NULL,
  `background_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text NOT NULL,
  `background_image1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag1` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_buyer_whychoose`
--

INSERT INTO `tbl_buyer_whychoose` (`id`, `background_image`, `alt_tag`, `title`, `background_image1`, `alt_tag1`) VALUES
(1, 'background_image_contact-bg-6.jpg', 'background image', 'Why Partnering with OfBusiness is a smart move?', 'background_image1_contact-man-1.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buyer_whychooseb`
--

CREATE TABLE `tbl_buyer_whychooseb` (
  `id` int(11) NOT NULL,
  `benefite` text NOT NULL,
  `whychoose_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_buyer_whychooseb`
--

INSERT INTO `tbl_buyer_whychooseb` (`id`, `benefite`, `whychoose_id`) VALUES
(1, 'Lowest Quotations for all Raw Materials', 1),
(2, 'Credit Facilities Available for Purchases', 1),
(3, 'Widest Range of Raw Materials', 1),
(4, 'Stringent Quality Assurance of Deliveries', 1),
(5, 'In-App Tracking of Orders', 1),
(6, 'Logistics Support for Deliveries', 1);

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
(1, '280 Granite Run Drive Suite 200 Lancaster, PA 1760', '', 'trading@gmail.com', '', 1234567890, NULL, 1234567890, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29918.12930911184!2d72.87812757170867!3d20.39252904052265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be0d035a3377e53%3A0x68b46ced9811a463!2sChala%2C%20Vapi%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1693804861423!5m2!1sen!2sin', 'any description', '');

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
(2, 'Ravi Shah', 'yashkhuble.rndtechnosoft@gmail.com', '1234', 0, '', '', '', '', 'Rndtechnosoft', '', '2023-07-29 04:32:28', '2023-09-02 12:59:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_default_seo_detail`
--

CREATE TABLE `tbl_default_seo_detail` (
  `id` int(250) NOT NULL,
  `banner_image` varchar(1000) NOT NULL,
  `banner_alt_tag` varchar(1000) NOT NULL,
  `meta_title` varchar(1000) NOT NULL,
  `meta_desc` varchar(1000) NOT NULL,
  `meta_url` varchar(1000) NOT NULL,
  `meta_image` varchar(1000) NOT NULL,
  `meta_keyword` varchar(1000) NOT NULL,
  `meta_author` varchar(1000) NOT NULL,
  `meta_publisher` varchar(1000) NOT NULL,
  `meta_canonical` varchar(1000) NOT NULL,
  `meta_language` varchar(1000) NOT NULL,
  `meta_revisit` varchar(1000) NOT NULL,
  `meta_owner` varchar(1000) NOT NULL,
  `meta_copyright` varchar(1000) NOT NULL,
  `meta_contact_addr` varchar(1000) NOT NULL,
  `meta_expires` varchar(1000) NOT NULL,
  `meta_google_verification` varchar(1000) NOT NULL,
  `meta_domain_verification` varchar(1000) NOT NULL,
  `meta_safeweb_verification` varchar(1000) NOT NULL,
  `meta_content_type` varchar(1000) NOT NULL,
  `meta_rating` varchar(1000) NOT NULL,
  `meta_robots` varchar(1000) NOT NULL,
  `meta_googlebot` varchar(1000) NOT NULL,
  `meta_distribution` varchar(1000) NOT NULL,
  `meta_classification` varchar(1000) NOT NULL,
  `meta_reply` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_default_seo_detail`
--

INSERT INTO `tbl_default_seo_detail` (`id`, `banner_image`, `banner_alt_tag`, `meta_title`, `meta_desc`, `meta_url`, `meta_image`, `meta_keyword`, `meta_author`, `meta_publisher`, `meta_canonical`, `meta_language`, `meta_revisit`, `meta_owner`, `meta_copyright`, `meta_contact_addr`, `meta_expires`, `meta_google_verification`, `meta_domain_verification`, `meta_safeweb_verification`, `meta_content_type`, `meta_rating`, `meta_robots`, `meta_googlebot`, `meta_distribution`, `meta_classification`, `meta_reply`) VALUES
(1, '', 'SANDRA SHROFF ROFEL COLLEGE OF NURSING', 'this is tesat', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

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
(2, 'Where do you supply the raw materials in India?', 'We have our presence and cater our service Pan-India.', '2023-07-27 05:03:19', '2023-08-26 10:20:37');

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
(1, 'How can I sell my products/material through Trading?', 'You can register yourself through this link and our Supplier Relations Manager will be assigned to you for further process.', '2023-07-27 05:30:56', '2023-08-26 10:21:59'),
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
  `background_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag1` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `tbl_footer_setting` (`id`, `name`, `logo`, `alt_tag`, `background_image`, `alt_tag1`, `about_us_des`, `facebook_link`, `twitter_link`, `instagram_link`, `youtube_link`, `create_at`, `update_at`) VALUES
(1, 'Trading', 'Logo-91439_logo-default.png', '', 'background_image-6439_home-16-contact-bg.jpg', '', 'Duty the obligations of business will frequently occur that pleasure have too repudiated annoyances endures accepted.', '', '', '', '', '2023-07-01 09:01:28', '2023-08-26 09:27:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_general_inquiry`
--

CREATE TABLE `tbl_general_inquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `company_name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone_no` int(11) NOT NULL DEFAULT 0,
  `message` text NOT NULL,
  `note` text NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT 1,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_general_inquiry`
--

INSERT INTO `tbl_general_inquiry` (`id`, `name`, `company_name`, `email`, `phone_no`, `message`, `note`, `status_id`, `create_at`, `update_at`) VALUES
(10, 'demo', 'text company', 'ravi@gmail.com', 1234567890, 'dsfresdf', 'sdsdsd', 2, '2023-09-02 09:31:01', '2023-09-02 15:24:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_general_inquiry_status`
--

CREATE TABLE `tbl_general_inquiry_status` (
  `id` int(11) NOT NULL,
  `status` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_general_inquiry_status`
--

INSERT INTO `tbl_general_inquiry_status` (`id`, `status`) VALUES
(1, 'Pending'),
(2, 'Done');

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
  `sent_request` tinyint(1) NOT NULL DEFAULT 1,
  `assigned_status` tinyint(1) NOT NULL DEFAULT 0,
  `emp_assign_id` int(11) UNSIGNED DEFAULT 0,
  `supplier_assign_id` int(11) UNSIGNED DEFAULT 0,
  `cust_po` varchar(200) NOT NULL,
  `cust_quotation_pdf` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sup_quotation_pdf` text DEFAULT NULL,
  `amount` text NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_inquiry`
--

INSERT INTO `tbl_inquiry` (`id`, `autogenrated_id`, `customer_id`, `product_id`, `quantity`, `volume_name`, `inquiry_status_id`, `sent_request`, `assigned_status`, `emp_assign_id`, `supplier_assign_id`, `cust_po`, `cust_quotation_pdf`, `sup_quotation_pdf`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'EVKTJ_4675795318', 2, 1, 1, 'Kg', 5, 1, 0, 0, 0, 'goal.png', NULL, NULL, '120', '2023-09-16 04:24:38', '2023-09-16 13:15:44'),
(2, 'PCnwV_9525848881', 2, 1, 82, 'Kg', 1, 1, 0, 0, 0, '', NULL, NULL, '0', '2023-09-16 13:35:11', NULL),
(3, 'PCnwV_9525848881', 2, 2, 97, 'Nos', 1, 1, 0, 0, 0, '', NULL, NULL, '0', '2023-09-16 13:35:11', NULL);

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
(3, 'supplier done'),
(4, 'customer done'),
(5, 'Finish'),
(6, 'Cancel'),
(7, 'Too high'),
(8, 'Too Late');

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
-- Table structure for table `tbl_manage_inquiry`
--

CREATE TABLE `tbl_manage_inquiry` (
  `id` int(200) NOT NULL,
  `customer_id` int(200) NOT NULL DEFAULT 0,
  `supplier_id` int(200) NOT NULL DEFAULT 0,
  `inquiry_id` text NOT NULL,
  `assign_id` int(191) NOT NULL DEFAULT 0,
  `product_id` int(191) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL,
  `volume_name` text NOT NULL,
  `cust_amount` int(191) NOT NULL DEFAULT 0,
  `sup_amount` int(200) NOT NULL DEFAULT 0,
  `cust_po` varchar(200) NOT NULL,
  `sup_quotation_pdf` text NOT NULL,
  `cust_quotation_pdf` text NOT NULL,
  `status_id` tinyint(1) NOT NULL DEFAULT 1,
  `send_status` tinyint(1) NOT NULL DEFAULT 1,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_manage_inquiry`
--

INSERT INTO `tbl_manage_inquiry` (`id`, `customer_id`, `supplier_id`, `inquiry_id`, `assign_id`, `product_id`, `quantity`, `volume_name`, `cust_amount`, `sup_amount`, `cust_po`, `sup_quotation_pdf`, `cust_quotation_pdf`, `status_id`, `send_status`, `create_at`, `update_at`) VALUES
(1, 2, 2, 'EVKTJ_4675795318', 1, 1, 1, 'Kg', 0, 0, '', '', '', 8, 0, '2023-09-16 12:37:03', '2023-09-16 12:37:03'),
(2, 2, 1, 'EVKTJ_4675795318', 1, 1, 1, 'Kg', 120, 100, 'goal.png', '', '', 5, 1, '2023-09-16 13:15:44', '2023-09-16 13:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meta_tag`
--

CREATE TABLE `tbl_meta_tag` (
  `id` int(100) NOT NULL,
  `page_name` varchar(100) NOT NULL,
  `page_type` varchar(100) NOT NULL,
  `banner_image` varchar(1000) NOT NULL,
  `alt_tag` varchar(1000) NOT NULL,
  `meta_title` varchar(5000) NOT NULL,
  `meta_desc` mediumtext NOT NULL,
  `meta_url` varchar(2000) NOT NULL,
  `meta_image` varchar(2000) NOT NULL,
  `meta_keyword` mediumtext NOT NULL,
  `meta_author` varchar(100) NOT NULL,
  `meta_publisher` varchar(100) NOT NULL,
  `meta_canonical` varchar(200) NOT NULL,
  `meta_language` varchar(50) NOT NULL,
  `meta_revisit` varchar(50) NOT NULL,
  `meta_owner` varchar(100) NOT NULL,
  `meta_copyright` varchar(100) NOT NULL,
  `meta_contact_addr` varchar(100) NOT NULL,
  `meta_expires` varchar(50) NOT NULL,
  `meta_google_verification` varchar(500) NOT NULL,
  `meta_domain_verification` varchar(500) NOT NULL,
  `meta_safeweb_verification` varchar(500) NOT NULL,
  `meta_content_type` varchar(100) NOT NULL,
  `meta_rating` varchar(50) NOT NULL,
  `meta_robots` varchar(50) NOT NULL,
  `meta_googlebot` varchar(50) NOT NULL,
  `meta_distribution` varchar(50) NOT NULL,
  `meta_classification` varchar(500) NOT NULL,
  `meta_reply` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_meta_tag`
--

INSERT INTO `tbl_meta_tag` (`id`, `page_name`, `page_type`, `banner_image`, `alt_tag`, `meta_title`, `meta_desc`, `meta_url`, `meta_image`, `meta_keyword`, `meta_author`, `meta_publisher`, `meta_canonical`, `meta_language`, `meta_revisit`, `meta_owner`, `meta_copyright`, `meta_contact_addr`, `meta_expires`, `meta_google_verification`, `meta_domain_verification`, `meta_safeweb_verification`, `meta_content_type`, `meta_rating`, `meta_robots`, `meta_googlebot`, `meta_distribution`, `meta_classification`, `meta_reply`) VALUES
(23, 'risk-management.php', 'blog', 'default/default-banner.jpg', 'Trading', 'Risk Management | Trading', '', 'blogs/risk-management.php', '', 'TRADING', '', '', 'blogs/risk-management.php', 'en-us', '15 days', '', 'Copyright © 2023 trading, All Right Reserved', 'mailto:hello@rndtechnosoft.com', '', 'bEvdCfLJlm7YR-k4P0mhjufrNr9s0ZaRpyJBMty5Vh0', '0b71dcfb0745b4aa46d64272390a63aa', '', 'text/html; charset=utf-8', 'general', 'index, follow', 'index, follow', 'global', 'trading', ''),
(24, 'most-employees-support-measures.php', 'blog', 'default/default-banner.jpg', 'Trading', 'Most Employees Support Measures | Trading', '', 'blogs/most-employees-support-measures.php', '', '', '', '', '', 'en-us', '15 days', '', 'Copyright © 2023 trading, All Right Reserved', 'mailto:hello@rndtechnosoft.com', '', 'bEvdCfLJlm7YR-k4P0mhjufrNr9s0ZaRpyJBMty5Vh0', '0b71dcfb0745b4aa46d64272390a63aa', '', 'text/html; charset=utf-8', 'general', 'index, follow', 'index, follow', 'global', 'trading', ''),
(25, 'products.php', 'none', 'Banner-92630_Banner-97244_page-header-default.jpg', 'trading', 'Products', 'TRADING', 'https://rndtd.com/demos/trading/working/products.php', '', 'TRADING', 'https://plus.google.com/u/0/104702639923819063296', 'https://plus.google.com/u/0/104702639923819063296', 'https://rndtd.com/demos/trading/working/products.php', 'en-us', '15 days', '', 'Copyright © 2023 trading, All Right Reserved', 'mailto:hello@rndtechnosoft.com', '30', '', '0b71dcfb0745b4aa46d64272390a63aa', '', 'text/html; charset=utf-8', 'general', 'index, follow', 'index, follow', 'global', 'trading', ''),
(26, 'account-setting.php', 'none', 'default/default-banner.jpg', 'trading', 'account-setting', 'TRADING', 'https://rndtd.com/demos/trading/working/account-setting.php', '', 'TRADING', 'https://plus.google.com/u/0/104702639923819063296', 'https://plus.google.com/u/0/104702639923819063296', 'https://rndtd.com/demos/trading/working/account-setting.php', 'en-us', '15 days', '', 'Copyright © 2023 trading, All Right Reserved', 'mailto:hello@rndtechnosoft.com', '30', '', '0b71dcfb0745b4aa46d64272390a63aa', '', 'text/html; charset=utf-8', 'general', 'index, follow', 'index, follow', 'global', 'trading', ''),
(21, 'product.php', 'none', 'Banner-97244_page-header-default.jpg', 'trading', 'Product', 'TRADING', 'https://rndtd.com/demos/trading/working/product.php', '', 'TRADING', 'https://plus.google.com/u/0/104702639923819063296', 'https://plus.google.com/u/0/104702639923819063296', 'https://rndtd.com/demos/trading/working/product.php', 'en-us', '15 days', '', 'Copyright © 2023 trading, All Right Reserved', 'mailto:hello@rndtechnosoft.com', '30', '', '0b71dcfb0745b4aa46d64272390a63aa', '', 'text/html; charset=utf-8', 'general', 'index, follow', 'index, follow', 'global', 'trading', ''),
(22, 'talent-management.php', 'blog', 'default/default-banner.jpg', 'Trading', 'Talent Management | Trading', '', 'blogs/talent-management.php', '', 'TRADING', '', '', 'blogs/talent-management.php', 'en-us', '15 days', '', 'Copyright © 2023 trading, All Right Reserved', 'mailto:hello@rndtechnosoft.com', '', 'bEvdCfLJlm7YR-k4P0mhjufrNr9s0ZaRpyJBMty5Vh0', '0b71dcfb0745b4aa46d64272390a63aa', '', 'text/html; charset=utf-8', 'general', 'index, follow', 'index, follow', 'global', 'trading', ''),
(18, 'index.php', 'none', 'default/default-banner.jpg', 'trading', 'Home', 'TRADING', 'http://www.sscnvapi.org/index.php', '', 'TRADING', 'https://plus.google.com/u/0/104702639923819063296', 'https://plus.google.com/u/0/104702639923819063296', 'http://www.sscnvapi.org/index.php', 'en-us', '15 days', '', 'Copyright © 2023 trading, All Right Reserved', 'mailto:hello@rndtechnosoft.com', '30', '', '0b71dcfb0745b4aa46d64272390a63aa', '', 'text/html; charset=utf-8', 'general', 'index, follow', 'index, follow', 'global', 'trading', ''),
(19, 'buyers.php', 'none', 'Banner-59107_page-header-default.jpg', 'trading', 'Buyers', 'TRADING', 'https://rndtd.com/demos/trading/working/buyers.php', '', 'TRADING', 'https://plus.google.com/u/0/104702639923819063296', 'https://plus.google.com/u/0/104702639923819063296', 'https://rndtd.com/demos/trading/working/buyers.php', 'en-us', '15 days', '', 'Copyright © 2023 trading, All Right Reserved', 'mailto:hello@rndtechnosoft.com', '30', '', '0b71dcfb0745b4aa46d64272390a63aa', '', 'text/html; charset=utf-8', 'general', 'index, follow', 'index, follow', 'global', 'trading', ''),
(20, 'supplier.php', 'none', 'Banner-12101_page-header-default.jpg', 'trading', 'Supplier', 'TRADING', 'https://rndtd.com/demos/trading/working/supplier.php', '', 'TRADING', 'https://plus.google.com/u/0/104702639923819063296', 'https://plus.google.com/u/0/104702639923819063296', 'https://rndtd.com/demos/trading/working/supplier.php', 'en-us', '15 days', '', 'Copyright © 2023 trading, All Right Reserved', 'mailto:hello@rndtechnosoft.com', '30', '', '0b71dcfb0745b4aa46d64272390a63aa', '', 'text/html; charset=utf-8', 'general', 'index, follow', 'index, follow', 'global', 'trading', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meta_tag_static`
--

CREATE TABLE `tbl_meta_tag_static` (
  `id` int(100) NOT NULL,
  `banner_image` varchar(1000) NOT NULL,
  `alt_tag` varchar(1000) NOT NULL,
  `meta_title` varchar(5000) NOT NULL,
  `meta_desc` mediumtext NOT NULL,
  `meta_url` varchar(2000) NOT NULL,
  `meta_image` varchar(2000) NOT NULL,
  `meta_keyword` mediumtext NOT NULL,
  `meta_author` varchar(100) NOT NULL,
  `meta_publisher` varchar(100) NOT NULL,
  `meta_canonical` varchar(200) NOT NULL,
  `meta_language` varchar(50) NOT NULL,
  `meta_revisit` varchar(50) NOT NULL,
  `meta_owner` varchar(100) NOT NULL,
  `meta_copyright` varchar(100) NOT NULL,
  `meta_contact_addr` varchar(100) NOT NULL,
  `meta_expires` varchar(50) NOT NULL,
  `meta_google_verification` varchar(500) NOT NULL,
  `meta_domain_verification` varchar(500) NOT NULL,
  `meta_safeweb_verification` varchar(500) NOT NULL,
  `meta_content_type` varchar(100) NOT NULL,
  `meta_rating` varchar(50) NOT NULL,
  `meta_robots` varchar(50) NOT NULL,
  `meta_googlebot` varchar(50) NOT NULL,
  `meta_distribution` varchar(50) NOT NULL,
  `meta_classification` varchar(500) NOT NULL,
  `meta_reply` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_meta_tag_static`
--

INSERT INTO `tbl_meta_tag_static` (`id`, `banner_image`, `alt_tag`, `meta_title`, `meta_desc`, `meta_url`, `meta_image`, `meta_keyword`, `meta_author`, `meta_publisher`, `meta_canonical`, `meta_language`, `meta_revisit`, `meta_owner`, `meta_copyright`, `meta_contact_addr`, `meta_expires`, `meta_google_verification`, `meta_domain_verification`, `meta_safeweb_verification`, `meta_content_type`, `meta_rating`, `meta_robots`, `meta_googlebot`, `meta_distribution`, `meta_classification`, `meta_reply`) VALUES
(1, 'Banner-74827_imageedit_1_2598854143.jpg', 'trading', 'TRADING', 'TRADING', '', '', 'TRADING', 'https://plus.google.com/u/0/104702639923819063296', 'https://plus.google.com/u/0/104702639923819063296', '', 'en-us', '15 days', '', 'Copyright © 2023 trading, All Right Reserved', 'mailto:hello@rndtechnosoft.com', '30', 'bEvdCfLJlm7YR-k4P0mhjufrNr9s0ZaRpyJBMty5Vh0', '0b71dcfb0745b4aa46d64272390a63aa', '', 'text/html; charset=utf-8', 'general', 'index, follow', 'index, follow', 'global', 'trading', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `transection_id` text NOT NULL,
  `sup_id` int(150) NOT NULL,
  `cust_id` int(191) NOT NULL,
  `assign_id` int(191) NOT NULL,
  `product_id` int(191) NOT NULL,
  `quantity` int(191) NOT NULL,
  `cust_amount` int(191) NOT NULL,
  `sup_amount` int(191) NOT NULL,
  `volume_name` text NOT NULL,
  `cust_po` text NOT NULL,
  `order_status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `transection_id`, `sup_id`, `cust_id`, `assign_id`, `product_id`, `quantity`, `cust_amount`, `sup_amount`, `volume_name`, `cust_po`, `order_status`) VALUES
(1, 'EVKTJ_4675795318', 1, 2, 1, 1, 0, 120, 100, 'Kg', 'goal.png', 0);

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
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL,
  `app_name` varchar(255) NOT NULL,
  `app_logo` varchar(255) NOT NULL,
  `loader_bg_image` varchar(500) NOT NULL,
  `bg_image_alt_tag` varchar(1000) NOT NULL,
  `app_icon` varchar(200) NOT NULL,
  `theme_color` varchar(100) NOT NULL,
  `client_theme_color` varchar(100) NOT NULL,
  `app_email` varchar(255) NOT NULL,
  `app_version` varchar(255) NOT NULL,
  `app_author` varchar(255) NOT NULL,
  `app_contact` varchar(255) NOT NULL,
  `app_website` varchar(255) NOT NULL,
  `app_description` text NOT NULL,
  `app_developed_by` varchar(255) NOT NULL,
  `app_privacy_policy` longtext NOT NULL,
  `app_term_condition` longtext NOT NULL,
  `mail_from` varchar(250) NOT NULL,
  `client_msg` longtext NOT NULL,
  `owner_msg` longtext NOT NULL,
  `gallery_limit` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `app_name`, `app_logo`, `loader_bg_image`, `bg_image_alt_tag`, `app_icon`, `theme_color`, `client_theme_color`, `app_email`, `app_version`, `app_author`, `app_contact`, `app_website`, `app_description`, `app_developed_by`, `app_privacy_policy`, `app_term_condition`, `mail_from`, `client_msg`, `owner_msg`, `gallery_limit`) VALUES
(1, 'TRADING', 'Logo-52892_logo-default.png', 'Loader_BG-21949_ace.png', '', 'Favicon-9778_favicon.ico', '', '', '', '1.0.0', 'RnD Technosoft', '+91-7304945823  / +91-9870472873', 'Trading.com', '', 'RnD Technosoft', '<h1><strong>R&amp;D Technosoft Privacy Policy</strong></h1>\r\n\r\n<p>R&amp;D Technosoft &nbsp;values your privacy and we are committed to protecting your privacy. So we&#39;ve developed a Privacy Policy. When you use our services (including mobile applications), we may collect and use your related information. Important, you should not install R&amp;D Technosoft Apps&nbsp;products in the event that you do not consent with this privacy policy. Please take a moment to familiarize yourself with our privacy practices and let us know if you have any questions.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Personal Information</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We DO NOT collect, store or use any personal information while you visit, download or upgrade our products, your personal information like your first name and last name, physical addresses, email addresses, telephone numbers, media files and information stored within your device. We will not collect or store your Personal Information and we will not use, transfer or disclose your Personal Information, excepting the personal information that you submit to us when you send an error report or participate in online surveys and other activities. In the following circumstances, we may disclose your personal information according to your wish or regulations by law:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Your prior permission.</strong></p>\r\n\r\n<p>By the applicable law within or outside your country of residence, legal process, litigation requests.</p>\r\n\r\n<p>By requests from public and governmental authorities.</p>\r\n\r\n<p>To protect our legal rights and interests.</p>\r\n\r\n<p>Non-Personal Information</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We collect your non-personal information when you are using our, including your device information, operation system, logs. We may collect the information you provided to us. Please make sure that you will not send us or disclose any sensitive information such as information related to racial or ethnic origin, political opinions, religious or other beliefs, health information, sexual orientation, criminal background or membership of past organizations, including trade union memberships. We will not sell, trade, or transfer your information to any third party. We will not combine Non-Personal Information with Personal Information, such as combining your unique User Device number with your name. We may use your Information for the following purposes:</p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>To provide our services to you.</strong></p>\r\n\r\n<p>To assure the safety of products and services we offer via using your information on identification-check, customer services, security, fraud-detection, archives and backups when we are providing you with our services.</p>\r\n\r\n<p>To help us develop new services and improve our existing services.</p>\r\n\r\n<p>To better understand how you access and use our services, for the purposes of improving and personalizing our services to better respond your desires and preferences, including language and location setting, personalized services, help and instructions, or other responses to you and other customers on other aspects of our services.</p>\r\n\r\n<p>To evaluate the effect of advertisements and other marketing scheme we put in our services and improve it.</p>\r\n\r\n<p>To verify software or administer software upgrades.</p>\r\n\r\n<p>To allow you to participate in surveys about our products and services.</p>\r\n\r\n<p>Information Security</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>R&amp;D Technosoft Apps are very concerned about safeguarding the confidentiality of your information. We will not collect Personal Information, in the meanwhile we employ administrative, physical and electronic measures designed to protect your Non-Personal Information from unauthorized access and use.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Children</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We do not collect, use or disclose personal information from children. If you are under 13, you may use our applications when you are with a parent or guardian. We do not provide service focus on Children.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Changes to our Privacy Policy</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Our Privacy Policy may change from time to time, we will post any privacy policy changes on this page, so please review it periodically.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Contacting Us</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>If you have any questions or concerns about our Privacy Policy or data processing, please contact us at:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"mailto:rndtechnosoft@gmail.com\" target=\"_blank\">rndtechnosoft@gmail.com</a></p>\r\n', '<h1><strong>R&amp;D Technosoft Term &amp; Condition</strong></h1>\r\n\r\n<p>R&amp;D Technosoft &nbsp;values your privacy and we are committed to protecting your privacy. So we&#39;ve developed a Privacy Policy. When you use our services (including mobile applications), we may collect and use your related information. Important, you should not install R&amp;D Technosoft Apps&nbsp;products in the event that you do not consent with this privacy policy. Please take a moment to familiarize yourself with our privacy practices and let us know if you have any questions.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Personal Information</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We DO NOT collect, store or use any personal information while you visit, download or upgrade our products, your personal information like your first name and last name, physical addresses, email addresses, telephone numbers, media files and information stored within your device. We will not collect or store your Personal Information and we will not use, transfer or disclose your Personal Information, excepting the personal information that you submit to us when you send an error report or participate in online surveys and other activities. In the following circumstances, we may disclose your personal information according to your wish or regulations by law:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Your prior permission.</strong></p>\r\n\r\n<p>By the applicable law within or outside your country of residence, legal process, litigation requests.</p>\r\n\r\n<p>By requests from public and governmental authorities.</p>\r\n\r\n<p>To protect our legal rights and interests.</p>\r\n\r\n<p>Non-Personal Information</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We collect your non-personal information when you are using our, including your device information, operation system, logs. We may collect the information you provided to us. Please make sure that you will not send us or disclose any sensitive information such as information related to racial or ethnic origin, political opinions, religious or other beliefs, health information, sexual orientation, criminal background or membership of past organizations, including trade union memberships. We will not sell, trade, or transfer your information to any third party. We will not combine Non-Personal Information with Personal Information, such as combining your unique User Device number with your name. We may use your Information for the following purposes:</p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>To provide our services to you.</strong></p>\r\n\r\n<p>To assure the safety of products and services we offer via using your information on identification-check, customer services, security, fraud-detection, archives and backups when we are providing you with our services.</p>\r\n\r\n<p>To help us develop new services and improve our existing services.</p>\r\n\r\n<p>To better understand how you access and use our services, for the purposes of improving and personalizing our services to better respond your desires and preferences, including language and location setting, personalized services, help and instructions, or other responses to you and other customers on other aspects of our services.</p>\r\n\r\n<p>To evaluate the effect of advertisements and other marketing scheme we put in our services and improve it.</p>\r\n\r\n<p>To verify software or administer software upgrades.</p>\r\n\r\n<p>To allow you to participate in surveys about our products and services.</p>\r\n\r\n<p>Information Security</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>R&amp;D Technosoft Apps are very concerned about safeguarding the confidentiality of your information. We will not collect Personal Information, in the meanwhile we employ administrative, physical and electronic measures designed to protect your Non-Personal Information from unauthorized access and use.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Children</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We do not collect, use or disclose personal information from children. If you are under 13, you may use our applications when you are with a parent or guardian. We do not provide service focus on Children.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Changes to our Privacy Policy</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Our Privacy Policy may change from time to time, we will post any privacy policy changes on this page, so please review it periodically.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Contacting Us</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>If you have any questions or concerns about our Privacy Policy or data processing, please contact us at:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"mailto:rndtechnosoft@gmail.com\" target=\"_blank\">rndtechnosoft@gmail.com</a></p>\r\n', 'yashkhuble.rndtechnosoft@gmail.com', '<p>Thank you for contacting TRADING, We will be calling you soon.</p>', '', '8');

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
-- Table structure for table `tbl_superadmin_setting`
--

CREATE TABLE `tbl_superadmin_setting` (
  `id` int(250) NOT NULL,
  `page_title` varchar(2000) NOT NULL,
  `page_name` varchar(2000) NOT NULL,
  `visibility_status` int(20) NOT NULL DEFAULT 0,
  `position_order` int(250) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_superadmin_setting`
--

INSERT INTO `tbl_superadmin_setting` (`id`, `page_title`, `page_name`, `visibility_status`, `position_order`) VALUES
(1, 'Manage Home', 'manage_home.php', 0, 5),
(2, 'Manage Banner', 'manage_banner.php', 0, 7),
(3, 'Manage About Us', 'manage_about_us.php', 0, 10),
(4, 'Manage Products', 'manage_products.php', 0, 11),
(5, 'Manage Services', 'manage_services.php', 0, 14),
(6, 'Achivements', 'manage_achivement.php', 0, 17),
(7, 'Add/Edit Super Admin', 'add_superadmin.php', 1, 2),
(8, 'Dashboard', 'home.php', 0, 4),
(9, 'Manage Superadmin', 'manage_superadmin.php', 1, 1),
(10, 'Manage Image Categories', 'manage_image_category.php', 0, 20),
(11, 'Manage Image Gallery', 'manage_image_gallery.php', 0, 23),
(12, 'Manage Video Categories', 'manage_video_category.php', 1, 27),
(13, 'Manage Video Gallery', 'manage_video_gallery.php', 1, 30),
(14, 'Manage Blogs', 'manage_blog.php', 0, 33),
(15, 'Manage News', 'manage_news.php', 1, 36),
(16, 'Manage Team', 'manage_team.php', 0, 39),
(17, 'Manage Features', 'manage_feature.php', 0, 42),
(18, 'Manage Testimonial', 'manage_testimonial.php', 0, 45),
(19, 'Manage Choose Us', 'manage_chooseus.php', 0, 48),
(20, 'Manage Client', 'manage_client.php', 0, 51),
(21, 'Manage Pages', 'manage_pages.php', 0, 54),
(22, 'Manage Career', 'manage_career.php', 0, 57),
(23, 'Manage Contact Us', 'manage_contact_us.php', 0, 60),
(24, 'Total Visitors', 'visitors.php', 0, 61),
(25, 'Manage SEO', 'manage_seo.php', 0, 62),
(26, 'Header Settings', 'header_setting.php', 0, 70),
(27, 'Footer Settings', 'footer_setting.php', 0, 72),
(28, 'Settings', 'settings.php', 0, 73),
(29, 'Add/Edit Home Section', 'add_section.php', 0, 6),
(30, 'Add/Edit Banner', 'add_banner.php', 0, 8),
(31, 'Arrange Banner Position', 'banner-position-order.php', 0, 9),
(32, 'Arrange Product Position', 'product-position-order.php', 1, 13),
(33, 'Arrange Service Position', 'services-position-order.php', 0, 16),
(34, 'Arrange Achivement Position', 'achivement-position-order.php', 0, 19),
(35, 'Arrange Image Category Position', 'image-cat-position-order.php', 0, 22),
(36, 'Arrange Image Position', 'image-position-order.php', 0, 26),
(37, 'Arrange Video Category Position', 'video-cat-position-order.php', 1, 29),
(38, 'Arrange Video Position', 'video-position-order.php', 1, 32),
(39, 'Arrange Blog Position', 'blog-position-order.php', 0, 35),
(40, 'Arrange News Position', 'news-position-order.php', 1, 38),
(41, 'Arrange Team Position', 'team-position-order.php', 0, 41),
(42, 'Arrange Feature Position', 'feature-position-order.php', 0, 44),
(43, 'Arrange Testimonial Position', 'testimonial-position-order.php', 0, 47),
(44, 'Arrange Choose Us Position', 'chooseus-position-order.php', 0, 50),
(45, 'Arrange Client Position', 'client-position-order.php', 0, 53),
(46, 'Arrange Pages Position', 'pages-position-order.php', 0, 56),
(47, 'Arrange Career Position', 'career-position-order.php', 0, 59),
(48, 'Add/Edit Product', 'add_products.php', 0, 12),
(49, 'Add/Edit Services', 'add_services.php', 0, 15),
(50, 'Add/Edit Achivement', 'add_achivement.php', 0, 18),
(51, 'Add/Edit Image Category', 'add_image_category.php', 0, 21),
(52, 'Add Image Gallery', 'add_image_gallery.php', 0, 24),
(53, 'Edit Image Gallery', 'edit_image_gallery.php', 0, 25),
(54, 'Add/Edit Video Category', 'add_video_category.php', 1, 28),
(55, 'Add/Edit Video Gallery', 'add_video_gallery.php', 1, 31),
(56, 'Add/Edit Blog', 'add_blog.php', 0, 34),
(57, 'Add/Edit News', 'add_news.php', 1, 37),
(58, 'Add/Edit Team', 'add_team.php', 0, 40),
(59, 'Add/Edit Feature', 'add_feature.php', 0, 43),
(60, 'Add/Edit Testimonial', 'add_testimonial.php', 0, 46),
(61, 'Add/Edit Choose Us', 'add_chooseus.php', 0, 49),
(62, 'Add/Edit Client', 'add_client.php', 0, 52),
(63, 'Add/Edit Pages', 'add_pages.php', 0, 55),
(64, 'Add/Edit Career', 'add_career.php', 0, 58),
(65, 'Add/Edit SEO Page', 'add_seo.php', 0, 63),
(66, 'Add/Edit Menu', 'add_menu.php', 0, 71),
(67, 'Manage Website Demo Categories', 'manage_demo_category.php', 0, 64),
(68, 'Arrange Website Demo Category Position', 'demo-cat-position-order.php', 0, 66),
(69, 'Add/Edit Website Demo Category', 'add_demo_category.php', 0, 65),
(70, 'Manage Website Demo', 'manage_website_demo.php', 0, 67),
(71, 'Add/Edit Website Demo', 'add_website_demo.php', 0, 68),
(73, 'Arrange Website Demo Position', 'website-demo-position-order.php', 0, 69),
(74, 'Manage Static Data', 'manage_static_data.php', 0, 3),
(75, 'Mission, Vision, Core Value', 'manage_mivigo.php', 0, 0),
(76, 'Process', 'manage_process.php', 0, 0),
(86, 'Add/Edit Course', 'add_course.php', 0, 0),
(85, 'Add/Edit Course', 'add_course.php', 0, 0),
(84, 'Add/Edit Facility', 'add_facility.php', 0, 0),
(83, 'Add/Edit Facility', 'add_facility.php', 0, 0),
(81, 'Manage Courses', 'manage_courses.php', 0, 0),
(82, 'Manage Facility', 'manage_facility.php', 0, 0),
(87, 'Manage Choose Us', 'manage_choose_us.php', 0, 0),
(88, 'Manage Choose Us', 'manage_choose_us.php', 0, 0),
(89, 'Manage Certificate', 'manage_certificate.php', 0, 0),
(90, 'Manage Certificate', 'manage_certificate.php', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `company_name` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` int(10) NOT NULL,
  `whatsapp_no` int(10) NOT NULL,
  `address` text NOT NULL,
  `gst_number` varchar(100) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_pdf` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT 2,
  `verified` int(11) NOT NULL DEFAULT 0,
  `password` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id`, `name`, `company_name`, `email`, `phone_no`, `whatsapp_no`, `address`, `gst_number`, `description`, `file_pdf`, `status_id`, `verified`, `password`, `created_at`, `updated_at`) VALUES
(1, NULL, 'rnd steels', 'amee.rndtechnosoft@gmail.com', 1234567890, 1234567890, 'vapi chala gujarat', '232dcsrcs432', 'one of best steel producer', NULL, 1, 1, 123, '2023-06-26 04:01:50', '2023-09-01 13:12:47'),
(2, NULL, 'Shiv steels', 'mansi.rndtechnosoft@gmail.com', 1234567891, 1234567891, 'vapi chala gujarat', '232dcsrcs431', ' steel producer in vapi', NULL, 1, 1, 123, '2023-06-26 04:02:57', '2023-09-01 06:39:35'),
(14, NULL, 'demo Company', 'yashkhuble.rndtechnosoft@gmail.com', 1234567890, 1234567890, 'kjihubuub', 'jjbhygyvtgb', 'jbbggtthhnvf', NULL, 1, 1, 52310635, '2023-09-01 16:04:57', '2023-09-01 16:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier_benefite`
--

CREATE TABLE `tbl_supplier_benefite` (
  `id` int(11) NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_b1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `benefite1_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_b2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `benefite2_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_b3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag3` text NOT NULL,
  `benefite3_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_b4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag4` text NOT NULL,
  `benefite4_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_supplier_benefite`
--

INSERT INTO `tbl_supplier_benefite` (`id`, `title`, `description`, `image_b1`, `alt_tag1`, `benefite1_title`, `image_b2`, `alt_tag2`, `benefite2_title`, `image_b3`, `alt_tag3`, `benefite3_title`, `image_b4`, `alt_tag4`, `benefite4_title`) VALUES
(1, ' Partner with Us', 'Acquire more business and increase exposure to OFBusiness’s customer network and receive requests for quotation within your specified locations ', 'image_b1_010-job-search.png', 'icon png', 'Advance Payments', 'image_b2_service-ico-2.png', 'icon png', 'High Order Volume', 'image_b3_fun-2.png', 'icon png', 'Bigger Client Base', 'image_b4_fun-3.png', 'icon png', 'PAN India Orders');

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
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_supplier_products`
--

INSERT INTO `tbl_supplier_products` (`id`, `supplier_id`, `category_id`, `product_id`, `product_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '', 1, '2023-08-28 11:05:41', '2023-09-01 17:23:49'),
(2, 1, 1, 1, '', 1, '2023-08-31 05:12:10', NULL),
(3, 1, 1, 2, '', 1, '2023-08-31 12:39:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier_request`
--

CREATE TABLE `tbl_supplier_request` (
  `id` int(11) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` int(11) NOT NULL,
  `whatsapp_no` int(15) NOT NULL DEFAULT 0,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst_no` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_address` varchar(290) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `send_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_supplier_request`
--

INSERT INTO `tbl_supplier_request` (`id`, `name`, `phone_no`, `whatsapp_no`, `email`, `company_name`, `supplier_message`, `gst_no`, `company_address`, `status_id`, `send_date`) VALUES
(1, 'test', 123456789, 123456789, 'test@gmail.com', 'text company', 'i want be supplier at side\r\n', 'dfdfdc34533', 'dfdfd dfdferd', '4', '2023-08-24 10:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier_request_status`
--

CREATE TABLE `tbl_supplier_request_status` (
  `id` int(11) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_supplier_request_status`
--

INSERT INTO `tbl_supplier_request_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'In process'),
(3, 'Delaying '),
(4, 'Verified');

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
-- Table structure for table `tbl_supplier_whychoose`
--

CREATE TABLE `tbl_supplier_whychoose` (
  `id` int(11) NOT NULL,
  `background_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text NOT NULL,
  `background_image1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag1` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_supplier_whychoose`
--

INSERT INTO `tbl_supplier_whychoose` (`id`, `background_image`, `alt_tag`, `title`, `background_image1`, `alt_tag1`) VALUES
(1, 'background_image_contact-bg-6.jpg', 'background image', 'Why Partnering with OfBusiness is a smart move?', 'background_image1_contact-man-1.png', 'right side image');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier_whychooseb`
--

CREATE TABLE `tbl_supplier_whychooseb` (
  `id` int(11) NOT NULL,
  `benefite` text NOT NULL,
  `whychoose_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_supplier_whychooseb`
--

INSERT INTO `tbl_supplier_whychooseb` (`id`, `benefite`, `whychoose_id`) VALUES
(1, ' Get Advance Payments', 1),
(2, 'Get unlimited Enquiries from Pan India', 1),
(3, 'Dedicated Portal for Tracking', 1),
(4, 'Hassle-Free Registration Process', 1),
(5, 'Logistics Support for Deliveries', 1),
(6, 'Get Access to 10 Lakh+ SMEs', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team`
--

CREATE TABLE `tbl_team` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `page_name` varchar(2000) NOT NULL,
  `design` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `alt_tag` varchar(1000) NOT NULL,
  `sort_desc` varchar(5000) NOT NULL,
  `long_desc` mediumtext NOT NULL,
  `facebook_link` varchar(1000) NOT NULL,
  `twitter_link` varchar(1000) NOT NULL,
  `linkedin_link` varchar(1000) NOT NULL,
  `googleplus_link` varchar(1000) NOT NULL,
  `instagram_link` varchar(1000) NOT NULL,
  `youtube_link` varchar(1000) NOT NULL,
  `meta_tag_id` int(100) NOT NULL,
  `position_order` int(250) NOT NULL DEFAULT 0,
  `performance_per` int(11) NOT NULL,
  `performance_per1` int(11) NOT NULL,
  `performance_per2` int(11) NOT NULL,
  `performance_per3` int(11) NOT NULL,
  `performance_text` varchar(300) NOT NULL,
  `performance_text1` varchar(300) NOT NULL,
  `performance_text2` varchar(300) NOT NULL,
  `performance_text3` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_team`
--

INSERT INTO `tbl_team` (`id`, `name`, `page_name`, `design`, `image`, `alt_tag`, `sort_desc`, `long_desc`, `facebook_link`, `twitter_link`, `linkedin_link`, `googleplus_link`, `instagram_link`, `youtube_link`, `meta_tag_id`, `position_order`, `performance_per`, `performance_per1`, `performance_per2`, `performance_per3`, `performance_text`, `performance_text1`, `performance_text2`, `performance_text3`) VALUES
(1, 'Mike Dooley', '', 'CEO', 'team-1.jpg', 'team-image', 'CEO', '', '', '', '', '', '', '', 0, 1, 0, 0, 0, 0, '', '', '', ''),
(2, 'Akshaya rastogi ', '', 'MD', 'team-2.jpg', 'team-image', 'Best MD', '', '', '', '', '', '', '', 0, 2, 0, 0, 0, 0, '', '', '', ''),
(3, 'Maria Andaloro', '', 'HR', 'team-3.png', 'team-image', 'Andaloro graduated from medical school and completed 3 years residency program in pediatrics. She passed rigorous exams by the American Board of Pediatrics.\r\n                                    							 ', '', '', '', '', '', '', '', 0, 3, 0, 0, 0, 0, '', '', '', '');

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
(1, 'super admin', 'admin@gmail.com', 'admin@123', 1, 2, 1234567891, '', 1, '2023-06-15 06:39:33', '2023-08-24 04:51:21'),
(2, 'admin', 'ravi@gmail.com', '123', 1, 2, 1234567891, 'To manage all task.', 1, '2023-06-17 07:30:56', '2023-08-24 05:33:49'),
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
-- Indexes for table `tbl_buyer_benefite`
--
ALTER TABLE `tbl_buyer_benefite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_buyer_whychoose`
--
ALTER TABLE `tbl_buyer_whychoose`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_buyer_whychooseb`
--
ALTER TABLE `tbl_buyer_whychooseb`
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
-- Indexes for table `tbl_default_seo_detail`
--
ALTER TABLE `tbl_default_seo_detail`
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
-- Indexes for table `tbl_general_inquiry`
--
ALTER TABLE `tbl_general_inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_general_inquiry_status`
--
ALTER TABLE `tbl_general_inquiry_status`
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
-- Indexes for table `tbl_manage_inquiry`
--
ALTER TABLE `tbl_manage_inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_meta_tag`
--
ALTER TABLE `tbl_meta_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_meta_tag_static`
--
ALTER TABLE `tbl_meta_tag_static`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
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
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_superadmin_setting`
--
ALTER TABLE `tbl_superadmin_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_supplier_benefite`
--
ALTER TABLE `tbl_supplier_benefite`
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
-- Indexes for table `tbl_supplier_request`
--
ALTER TABLE `tbl_supplier_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_supplier_request_status`
--
ALTER TABLE `tbl_supplier_request_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_supplier_status`
--
ALTER TABLE `tbl_supplier_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_supplier_whychoose`
--
ALTER TABLE `tbl_supplier_whychoose`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_supplier_whychooseb`
--
ALTER TABLE `tbl_supplier_whychooseb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_team`
--
ALTER TABLE `tbl_team`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_buyer_benefite`
--
ALTER TABLE `tbl_buyer_benefite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_buyer_whychoose`
--
ALTER TABLE `tbl_buyer_whychoose`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_buyer_whychooseb`
--
ALTER TABLE `tbl_buyer_whychooseb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT for table `tbl_default_seo_detail`
--
ALTER TABLE `tbl_default_seo_detail`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `tbl_general_inquiry`
--
ALTER TABLE `tbl_general_inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_general_inquiry_status`
--
ALTER TABLE `tbl_general_inquiry_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_inquiry`
--
ALTER TABLE `tbl_inquiry`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_inquiry_status`
--
ALTER TABLE `tbl_inquiry_status`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_manage_inquiry`
--
ALTER TABLE `tbl_manage_inquiry`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_meta_tag`
--
ALTER TABLE `tbl_meta_tag`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_meta_tag_static`
--
ALTER TABLE `tbl_meta_tag_static`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_superadmin_setting`
--
ALTER TABLE `tbl_superadmin_setting`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_supplier_benefite`
--
ALTER TABLE `tbl_supplier_benefite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_supplier_items`
--
ALTER TABLE `tbl_supplier_items`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_supplier_products`
--
ALTER TABLE `tbl_supplier_products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_supplier_request`
--
ALTER TABLE `tbl_supplier_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_supplier_request_status`
--
ALTER TABLE `tbl_supplier_request_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_supplier_status`
--
ALTER TABLE `tbl_supplier_status`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_supplier_whychoose`
--
ALTER TABLE `tbl_supplier_whychoose`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_supplier_whychooseb`
--
ALTER TABLE `tbl_supplier_whychooseb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_team`
--
ALTER TABLE `tbl_team`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
