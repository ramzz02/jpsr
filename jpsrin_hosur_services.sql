-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2022 at 06:43 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jpsrin_hosur_services`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus_details`
--

CREATE TABLE `aboutus_details` (
  `id` int(11) NOT NULL,
  `content` text CHARACTER SET utf8 DEFAULT NULL,
  `image_path` text CHARACTER SET utf8 DEFAULT NULL,
  `image_path2` text CHARACTER SET utf8 DEFAULT NULL,
  `image_path3` text CHARACTER SET utf8 DEFAULT NULL,
  `video_path` text CHARACTER SET utf8 DEFAULT NULL,
  `video_code` text CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aboutus_details`
--

INSERT INTO `aboutus_details` (`id`, `content`, `image_path`, `image_path2`, `image_path3`, `video_path`, `video_code`) VALUES
(1, '<span style=\"font-family: Nunito, sans-serif; font-size: 16px; text-align: center;\">With gods grace and all your blessings, We have completed 21 years of our business life since 1998 and 10 years of news paper publishing since 2009.</span><div><div style=\"text-align: center;\"><font face=\"Nunito, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></div><div><ul><li><span style=\"font-family: Nunito, sans-serif; font-size: 15px;\">First Hosur yellow pages in 1998.</span></li><li><span style=\"font-family: Nunito, sans-serif; font-size: 15px;\">First Hosur Map in 1999.</span></li><li><span style=\"font-family: Nunito, sans-serif; font-size: 15px;\">First Hosur cell phone service provider in 2000.</span></li><li><span style=\"font-family: Nunito, sans-serif; font-size: 15px;\">First Hosur successful news paper print media in 2009.</span></li><li><span style=\"font-family: Nunito, sans-serif; font-size: 15px;\">We are also in to&nbsp;</span><b style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-weight: bold; font-family: Nunito, sans-serif; font-size: 15px;\">property management service &amp; Interior designing with 500+ Happy customers</b><span style=\"font-family: Nunito, sans-serif; font-size: 15px;\">.</span></li><li><span style=\"font-family: Nunito, sans-serif; font-size: 15px;\">CSR activities House Sparrow Certified Trainer for Tamilnadu Police Well being from Nimhans.</span></li></ul></div></div>', 'about_file/713541826indica1.png', 'about_file/10057313APP_Wall_Final_(1).png', 'about_file/403384429tavera.png', 'about_file/1405770425big_buck_bunny_720p_1mb.mp4', 'https://www.youtube.com/embed/HIC3Z6QDv1s');

-- --------------------------------------------------------

--
-- Table structure for table `add_help_videos`
--

CREATE TABLE `add_help_videos` (
  `id` int(11) NOT NULL,
  `language` int(11) NOT NULL,
  `page` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `video_code` varchar(700) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(100) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_help_videos`
--

INSERT INTO `add_help_videos` (`id`, `language`, `page`, `video_code`, `status`) VALUES
(1, 1, 'home', 'https://www.youtube.com/embed/HIC3Z6QDv1s', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `add_languages`
--

CREATE TABLE `add_languages` (
  `id` int(11) NOT NULL,
  `language` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(500) CHARACTER SET utf8 DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_languages`
--

INSERT INTO `add_languages` (`id`, `language`, `status`) VALUES
(1, 'Tamil', 'active'),
(2, 'English', 'active'),
(3, 'Telugu', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `ads_payment_period`
--

CREATE TABLE `ads_payment_period` (
  `id` int(11) NOT NULL,
  `period` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `premium_order` int(11) DEFAULT NULL,
  `period_days` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads_payment_period`
--

INSERT INTO `ads_payment_period` (`id`, `period`, `status`, `premium_order`, `period_days`) VALUES
(1, '1 Month', 2, 2, '30'),
(2, '2 Months', 2, 3, '60'),
(3, '3 Months', 1, 4, '90'),
(4, '4 Months', 2, 5, '120'),
(5, '5 Months', 2, 6, '150'),
(6, '6 Months', 1, 7, '180'),
(7, '7 Months', 2, 8, '210'),
(8, '8 Months', 2, 9, '240'),
(9, '9 Months', 1, 10, '270'),
(10, '10 Months', 2, 11, '300'),
(11, '11 Months', 2, 12, '330'),
(12, '1 Year', 1, 13, '360');

-- --------------------------------------------------------

--
-- Table structure for table `ads_payment_subscription`
--

CREATE TABLE `ads_payment_subscription` (
  `id` int(11) NOT NULL,
  `period` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `amount` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads_payment_subscription`
--

INSERT INTO `ads_payment_subscription` (`id`, `period`, `amount`, `status`) VALUES
(1, '3', '200', 1),
(2, '6', '500', 1),
(3, '9', '700', 1);

-- --------------------------------------------------------

--
-- Table structure for table `advertisement_list`
--

CREATE TABLE `advertisement_list` (
  `id` int(11) NOT NULL,
  `business_id` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `person_name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `mobile_no` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(700) CHARACTER SET utf8 DEFAULT NULL,
  `page_details` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `image_position` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `advertisement_image` text CHARACTER SET utf8 DEFAULT NULL,
  `subscription_type` varchar(600) DEFAULT NULL,
  `subscription_order` varchar(600) DEFAULT NULL,
  `amount` varchar(600) DEFAULT NULL,
  `payment_type` varchar(600) DEFAULT NULL,
  `start_date` varchar(600) DEFAULT NULL,
  `end_date` varchar(600) DEFAULT NULL,
  `reg_date` varchar(600) DEFAULT NULL,
  `enter_by` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisement_list`
--

INSERT INTO `advertisement_list` (`id`, `business_id`, `person_name`, `mobile_no`, `email`, `address`, `page_details`, `image_position`, `advertisement_image`, `subscription_type`, `subscription_order`, `amount`, `payment_type`, `start_date`, `end_date`, `reg_date`, `enter_by`, `status`) VALUES
(1, 'bngfhg', 'fhgfdug', '8838272618', '', 'hvhvhjv', '2', '1', 'ad_images/1618055237muruga.jpg', '3 Months', '2', '200', 'online', '2020/10/31', '2021/01/29', '2020/10/31', NULL, 'deactive'),
(2, 'bvv', 'vvvg', '8220559784', '', ' nm n n ', '3', 'service2', 'ad_images/1919560446i.jpg', '3 Months', '2', '200', 'gpay', '2020/11/06', '2021/02/04', '2020/11/06', NULL, 'deactive'),
(3, 'ncvbdhfbd', 'dbfhdb', '8220559784', '', 'chennai, 69048', '1', 'banner2', 'ad_images/629802786Banner_Image.png', '3 Months', '2', '200', 'gpay', '2020/11/10', '2021/02/08', '2020/11/10', '1', 'deactive'),
(5, '', '', '', '', '', NULL, NULL, 'ad_images/1779151236UJSc7l.jpg', NULL, NULL, NULL, NULL, '2020/12/03', NULL, '2020/12/03', 'admin', 'deactive'),
(6, '', '', '', '', '', NULL, NULL, 'ad_images/517619001UJSc7l.jpg', NULL, NULL, NULL, NULL, '2020/12/03', NULL, '2020/12/03', 'admin', 'deactive'),
(7, 'test ads name', 'testing name', '9876543210', '', 'ccccc', '3', 'doctorappointment', 'ad_images/889814259tavera.png', '6 Months', '7', '500', 'gpay', '2020/12/09', '2021/06/07', '2020/12/07', '1', 'active'),
(8, 'raj', 'raj', '9844910198', '', 'b', '1', 'logo1', 'ad_images/484916100WhatsApp_Image_2020-12-12_at_8.55.37_PM.jpeg', '1 Year', '13', '1000', 'online', '2020/12/12', '2021/12/07', '2020/12/12', '5', 'active'),
(9, 'raj', 'raj', '9844910198', '', 'sfd', '1', 'banner1', 'ad_images/1737722360WhatsApp_Image_2020-12-12_at_8.55.37_PM.jpeg', '9 Months', '10', '700', 'gpay', '2020/12/12', '2021/09/08', '2020/12/12', 'admin', 'active'),
(10, 'Ramesh @ Co', 'Ramesh Kumar', '8220559785', 'test@gmail.com', 'Mylapore, Chennai', '1', 'banner3', 'ad_images/978922522Books.png', '6 Months', '7', '600', 'online', '2021/03/07', '2021/09/03', '2021/03/07', '1', 'deactive'),
(11, 'data business', 'buz', '6666666666', 'test@gmail.com', 'chennai', '1', 'logo4', 'logo/850879989cash.png', '9 Months', '7', '700', 'gpay', '2021/03/15', '2021/12/10', '2021/03/14', '1', 'active'),
(12, 'business name 1', 'test name', '1234567890', '', 'Chennai main road ', '1', 'banner4', 'logo/1087379231ad_1.jpg', '3 Months', NULL, '200', 'online', '2021/03/29', '2021/06/27', '2021/03/29', 'admin', 'deactive'),
(16, 'data business', 'buz', '6666666666', 'test@gmail.com', 'chennai', '1', 'banner5', 'logo/603010140person2.jpg', '3 Months', NULL, '200', 'online', '2021/03/29', '2021/06/27', '2021/03/29', '1', 'deactive'),
(17, '21', 'Thamodharan', '9043176235', 'ramesh02cse@gmail.com', 'Aminjikarai, Chennai', '1', 'logo3', 'ad_images/1327019486xcent.png', '6 Months', NULL, '600', 'online', '2021/04/12', '2021/10/09', '2021/04/12', '7', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `agent_personal_information`
--

CREATE TABLE `agent_personal_information` (
  `id` int(11) NOT NULL,
  `agent_code` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `person_name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `mobile_no` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `address` text CHARACTER SET utf8 DEFAULT NULL,
  `landmark` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `area` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `city` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `district` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `state` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `pincode` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `alternative_mobile_no` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `aadhaar_no` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `aadhaar_image_front` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `aadhaar_image_back` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `account_no` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `ifsc_code` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `holder_name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `branch_name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `year` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `reg_date` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `reg_time` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `enter_by` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `profile_pic` text CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(500) CHARACTER SET utf8 NOT NULL DEFAULT 'pending',
  `status_view` varchar(500) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_date` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent_personal_information`
--

INSERT INTO `agent_personal_information` (`id`, `agent_code`, `person_name`, `mobile_no`, `email`, `address`, `landmark`, `area`, `city`, `district`, `state`, `pincode`, `alternative_mobile_no`, `aadhaar_no`, `aadhaar_image_front`, `aadhaar_image_back`, `account_no`, `ifsc_code`, `holder_name`, `branch_name`, `year`, `reg_date`, `reg_time`, `enter_by`, `profile_pic`, `status`, `status_view`, `updated_by`, `updated_date`) VALUES
(1, 'JPSR1221', 'Ramesh K', '8220559784', 'ramesh@gmail.com', '18, ratha manipuram', 'Hotel Saravana bavan', 'Anna nagar', 'Madurai', '12', '31', '837638', '', '837638828275', 'agent_details/1868654272Screenshot_20220107-014312.png', 'agent_details/218398088Screenshot_20220107-015854.png', '8372662627', 'NHD836NDH', 'Testing', 'Anna nagar', '2022', '2022-01-10', '10:11 PM', '3', 'agent_details/841721354+91_82205_59784_20191011_232141.jpg', 'approved', '1', '1', '2022/01/10'),
(2, 'JPSR1222', 'JPSR', '9715020000', 'hemasripower@gmail.com', '11/4 prakash Nagar 1st cross, Dinnur', '', 'Shanti Nagar West', 'Hosur', '11', '31', '635109', '', '256787634308', 'agent_details/1060620944IMG-20220118-WA0003.jpg', 'agent_details/1558818221IMG-20220118-WA0004.jpg', '67253023374', 'Sbin0070843', 'Hemalatha', 'State Bank of India Hosur', '2022', '2022-01-18', '01:15 PM', '5', 'agent_details/748298622IMG-20220118-WA0017.jpg', 'pending', '0', NULL, NULL),
(3, 'JPSR1223', 'Ramesh', '8838272618', 'rameshkamaraj02@gmail.com', '14, Ramanujapuram 1st Main Road', 'Near by hotel anjapar', 'Anna Nagar', 'Madurai', '12', '31', '454545', '', '987452234356', 'agent_details/336240681By1Kj.png', 'agent_details/1516470194sai_silk_logo.png', '7463845354', 'MVYU7567VV', 'Ramesh K', 'Anna Nagar', '2022', '2022-01-23', '09:37 PM', '1', '', 'approved', '1', '1', '2022/01/23');

-- --------------------------------------------------------

--
-- Table structure for table `all_pages_list`
--

CREATE TABLE `all_pages_list` (
  `id` int(11) NOT NULL,
  `page_name` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `page_url` text CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_pages_list`
--

INSERT INTO `all_pages_list` (`id`, `page_name`, `page_url`, `status`) VALUES
(1, 'Home', 'home', 'active'),
(2, 'Register your business', 'register-ur-business', 'active'),
(3, 'Register your ad', 'register-ur-ad', 'active'),
(4, 'Business Directory', 'business-directory', 'active'),
(5, 'Offers', 'offers', 'active'),
(6, 'News', 'news', 'active'),
(7, 'Birthday wishes', 'birthday-wishes', 'active'),
(8, 'Kids Articles', 'show-your-talent', 'active'),
(9, 'JPSR Services', 'jpsr-services', 'active'),
(10, 'Referral Income', 'referral-income', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `area_list`
--

CREATE TABLE `area_list` (
  `id` int(11) NOT NULL,
  `location` int(11) DEFAULT NULL,
  `ward_no` int(11) DEFAULT NULL,
  `area_name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `area_list`
--

INSERT INTO `area_list` (`id`, `location`, `ward_no`, `area_name`, `status`) VALUES
(1, 1, 1, 'Balaji Nagar', '1'),
(2, 1, 1, 'Check Post', '1'),
(3, 1, 1, 'Durga Nagar', '1'),
(4, 1, 1, 'Jaibeem Nagar', '1'),
(5, 1, 1, 'Jaibeem Nagar 1st Cross', '1'),
(6, 1, 1, 'Kamaraj Nagar', '1'),
(7, 1, 1, 'MG Road (Zuzuvadi)', '1'),
(8, 1, 1, 'MG Road 1st Cross', '1'),
(9, 1, 1, 'MG Road 2nd Cross', '1'),
(10, 1, 1, 'MG Road 3rd Cross', '1'),
(11, 1, 1, 'Maruthi Nagar 1st Main', '1'),
(12, 1, 1, 'Maruthi Nagar 2nd Cross', '1'),
(13, 1, 1, 'Muthumariyamman Koil\nStreet', '1'),
(14, 1, 1, 'Poonga Nagar', '1'),
(15, 1, 1, 'Poonga Nagar 1st Cross', '1'),
(16, 1, 1, 'Poonga Nagar 2nd Cross', '1'),
(17, 1, 1, 'Rajaji Nagar', '1'),
(18, 1, 1, 'Sakthivel Nagar 1st Main', '1'),
(19, 1, 1, 'Sakthivel Nagar 1st Cross', '1'),
(20, 1, 1, 'Sakthivel Nagar 2nd Cross', '1'),
(21, 1, 1, 'Senthil Nagar', '1'),
(22, 1, 1, 'Thiruvalluvar Nagar', '1'),
(23, 1, 1, 'Vinayaka Nagar', '1'),
(24, 1, 1, 'Vivekananda Nagar', '1'),
(25, 1, 1, 'Upkar Royal Garden', '1'),
(26, 1, 1, 'Sipcot', '1'),
(27, 1, 1, 'Anumeypalli', '1'),
(28, 1, 2, 'Anjenayar Kovil Street', '1'),
(29, 1, 2, 'BTR Nagar 1st Cross', '1'),
(30, 1, 2, 'BTR Nagar 2nd Cross', '1'),
(31, 1, 2, 'BTR Nagar 3rd Cross', '1'),
(32, 1, 2, 'Check Post', '1'),
(33, 1, 2, 'Gandhi Street', '1'),
(34, 1, 2, 'Gandhi Street 2nd\nCross', '1'),
(35, 1, 2, 'Jai Beem Nagar', '1'),
(36, 1, 2, 'Kottai Nagar 1st Cross', '1'),
(37, 1, 2, 'Kottai Nagar 2nd Cross', '1'),
(38, 1, 2, 'MG Road', '1'),
(39, 1, 2, 'MG Road 3rd Cross', '1'),
(40, 1, 2, 'Mariyamman Koil St', '1'),
(41, 1, 2, 'Maruthi 2nd Main Rd', '1'),
(42, 1, 2, 'Maruthi 2nd Main Rd 2nd Cross', '1'),
(43, 1, 2, 'Maruthi 2nd Main Rd 3rd Cross', '1'),
(44, 1, 2, 'Muslim Area', '1'),
(45, 1, 2, 'Nethaji Nagar', '1'),
(46, 1, 2, 'Nethaji Nagar 2nd\nCross', '1'),
(47, 1, 2, 'Nethaji Nagar 3rd Cross', '1'),
(48, 1, 2, 'Nethaji Nagar 4th Cross', '1'),
(49, 1, 2, 'NTR Circle', '1'),
(50, 1, 2, 'Officer Colony', '1'),
(51, 1, 2, 'Periyar Salai End', '1'),
(52, 1, 2, 'Poonga Nagar', '1'),
(53, 1, 2, 'Rajaji Nagar', '1'),
(54, 1, 2, 'Roja Nagar', '1'),
(55, 1, 2, 'Senthil Nagar', '1'),
(56, 1, 2, 'SLV Nagar', '1'),
(57, 1, 2, 'TG Nagar', '1'),
(58, 1, 2, 'Thiruvalluvar Nagar', '1'),
(59, 1, 2, 'Venkateshwara Nagar', '1'),
(60, 1, 2, 'Vinayaka Nagar', '1'),
(61, 1, 2, 'Vivekanandar Nagar', '1'),
(62, 1, 3, 'Anna Nagar', '1'),
(63, 1, 3, 'Balaji Nagar', '1'),
(64, 1, 3, 'Bederapalli', '1'),
(65, 1, 3, 'Bharathi Nagar', '1'),
(66, 1, 3, 'Ganga Nagar', '1'),
(67, 1, 3, 'Indhira Nagar', '1'),
(68, 1, 3, 'MGR Nagar', '1'),
(69, 1, 3, 'MG Road', '1'),
(70, 1, 3, 'Muneeshwara Nagar', '1'),
(71, 1, 3, 'Rajaji Nagar', '1'),
(72, 1, 3, 'Rajiv Gandhi Nagar', '1'),
(73, 1, 3, 'Rajiv Nagar', '1'),
(74, 1, 3, 'Shanthapuram Rd', '1'),
(75, 1, 4, 'Chinna Elasagiri', '1'),
(76, 1, 4, 'Suvesh Nagar To\nLakshmaiyya Nagar', '1'),
(77, 1, 4, 'Lakshmaiyya Nagar', '1'),
(78, 1, 4, 'Chinna Palaniyappa\nNagar', '1'),
(79, 1, 4, 'Ambedkar Nagar', '1'),
(80, 1, 4, 'VOC Nagar', '1'),
(81, 1, 4, 'Anumanth Nagar', '1'),
(82, 1, 4, 'OFF IVC Compound', '1'),
(83, 1, 4, 'Titan Main Rd', '1'),
(84, 1, 4, 'Adi Dravidar Colony', '1'),
(85, 1, 4, 'Thayappa Nagar', '1'),
(86, 1, 4, 'Kempegowda Nagar', '1'),
(87, 1, 4, 'Basaveswara Street', '1'),
(88, 1, 4, 'Anna Nagar', '1'),
(89, 1, 4, 'Sipcot', '1'),
(90, 1, 4, 'Maruthi Nagar', '1'),
(91, 1, 4, 'Kamaraj Nagar', '1'),
(92, 1, 4, 'Santhapuram', '1'),
(93, 1, 4, 'Anumanth Nagar', '1'),
(94, 1, 4, 'Bala Vinayakar Temple\nSt', '1'),
(95, 1, 4, 'Thayappa Nagar', '1'),
(96, 1, 4, 'Bellaiyappa Nagar', '1'),
(97, 1, 5, 'Balaji Nagar', '1'),
(98, 1, 5, 'Abirami Industries', '1'),
(99, 1, 5, 'Tirumalai Nagar', '1'),
(100, 1, 5, 'Thanikai Nagar', '1'),
(101, 1, 5, 'Chinna Elasagiri\nAnnamalai Nagar', '1'),
(102, 1, 5, 'Annamalai Nagar 1st\nStreet', '1'),
(103, 1, 5, 'Annamalai Nagar 1st\nStreet', '1'),
(104, 1, 5, 'Annamalai Nagar 2nd\nStreet', '1'),
(105, 1, 5, 'Annamalai Nagar 3rd\nStreet', '1'),
(106, 1, 5, 'Annamalai Nagar 3rd Street', '1'),
(107, 1, 5, 'Annamalai Nagar 1st,\n2nd, 3rd Cross', '1'),
(108, 1, 5, 'Anand Nagar 2nd Cross', '1'),
(109, 1, 5, 'Anand Nagar 3rd Cross', '1'),
(110, 1, 5, 'Anand Nagar 2st', '1'),
(111, 1, 5, 'Street, 4th Street', '1'),
(112, 1, 5, 'Anand Nagar 4th Street', '1'),
(113, 1, 5, 'Anand Nagar', '1'),
(114, 1, 5, 'Balaji Nagar', '1'),
(115, 1, 5, 'Eswari Garden', '1'),
(116, 1, 5, 'Thanikai Nagar', '1'),
(117, 1, 5, 'Silver Gastal Layout', '1'),
(118, 1, 5, 'Church Road', '1'),
(119, 1, 5, '2nd , 3rd Street', '1'),
(120, 1, 5, '3rd & 1st Street', '1'),
(121, 1, 5, 'Anna Nagar', '1'),
(122, 1, 6, 'K.C.C.Nagar - Chinna\nElasagiri', '1'),
(123, 1, 6, 'K.C.C.Nagar -\nNanjappa Nagar', '1'),
(124, 1, 6, 'K.C.C.Nagar -\nJ.K.Nagar', '1'),
(125, 1, 6, 'K.C.C.Nagar -\nThiruvallur Nagar', '1'),
(126, 1, 6, 'K.C.C.Nagar - Pasumai\nNagar', '1'),
(127, 1, 6, 'K.C.C.Nagar - Suvarna\nNagar', '1'),
(128, 1, 6, 'Mullai Vendan Nagar', '1'),
(129, 1, 6, 'NGGOs Colony', '1'),
(130, 1, 6, 'Nanjappa Kuttai', '1'),
(131, 1, 6, 'Vannar Colony', '1'),
(132, 1, 6, 'New K.C.C.Nagar', '1'),
(133, 1, 7, 'Moovendhar Nagar', '1'),
(134, 1, 7, 'Avalapalli Hudco', '1'),
(135, 1, 7, 'Munidevi Nagar', '1'),
(136, 1, 7, 'Kittappakuttai', '1'),
(137, 1, 7, 'Govindharaj Nagar', '1'),
(138, 1, 7, 'Millath Nagar', '1'),
(139, 1, 7, 'GKD Nagar', '1'),
(140, 1, 7, 'J.J Nagar', '1'),
(141, 1, 7, 'Phase 6 Avalapalli\nHudco', '1'),
(142, 1, 7, 'Sadhasivam Colony', '1'),
(143, 1, 8, 'Basthi', '1'),
(144, 1, 8, 'Basthi 3rd Cross', '1'),
(145, 1, 8, 'Basthi 2nd Cross', '1'),
(146, 1, 8, 'Basthi 1st Cross', '1'),
(147, 1, 8, 'Basthi 4th Cross', '1'),
(148, 1, 8, 'Chamundi Nagar', '1'),
(149, 1, 8, 'Indhira Gandhi Nagar', '1'),
(150, 1, 8, 'Maharishi Nagar', '1'),
(151, 1, 8, 'Raghavendra Colony', '1'),
(152, 1, 8, 'Sakthi Nagar', '1'),
(153, 1, 8, 'Thirupathi Nagar', '1'),
(154, 1, 8, 'Anbu Nagar', '1'),
(155, 1, 8, 'Basthi Garden', '1'),
(156, 1, 8, 'Vinayakapuram', '1'),
(157, 1, 9, 'Ashok Garden', '1'),
(158, 1, 9, 'Avalapalli', '1'),
(159, 1, 9, 'Bharathiyar Nagar', '1'),
(160, 1, 9, 'Thirumalai Nagar', '1'),
(161, 1, 9, 'Bismilla Nagar', '1'),
(162, 1, 9, 'Golden City', '1'),
(163, 1, 9, 'Golden City (Kurinji\nNagar)', '1'),
(164, 1, 9, 'Golden City (RK\nNagar)', '1'),
(165, 1, 9, 'Golden City Thendral\nAvenue', '1'),
(166, 1, 9, 'Raja City', '1'),
(167, 1, 9, 'Star Enclave', '1'),
(168, 1, 9, 'Thimmasandhiram', '1'),
(169, 1, 9, 'Thottagiri', '1'),
(170, 1, 9, 'Vasthusala', '1'),
(171, 1, 10, 'Venkatesh Nagar', '1'),
(172, 1, 10, 'Venkatesh Nagar\nAlasanatham Rd', '1'),
(173, 1, 10, 'Alasanatham', '1'),
(174, 1, 10, 'Adi Dravidar St', '1'),
(175, 1, 10, 'Thottagiri Rd', '1'),
(176, 1, 10, 'Lakshmi Narasimma\nNagar', '1'),
(177, 1, 10, 'Akshaya Garden', '1'),
(178, 1, 10, 'Karpagam Nagar', '1'),
(179, 1, 11, 'Indira Nagar', '1'),
(180, 1, 11, 'Indira Nagar 2nd Cross', '1'),
(181, 1, 11, 'Krishnagiri Byepass', '1'),
(182, 1, 11, 'Lake View Street', '1'),
(183, 1, 11, 'Old Vasanth Nagar', '1'),
(184, 1, 11, 'Philipis Pettai', '1'),
(185, 1, 11, 'Rajeshwari Nagar', '1'),
(186, 1, 11, 'Rajiv Nagar', '1'),
(187, 1, 11, 'Thayappa Thottam', '1'),
(188, 1, 11, 'Vasanth Nagar', '1'),
(189, 1, 11, 'Bagalur Road', '1'),
(190, 1, 12, 'TNHB Bagalur Hudco', '1'),
(191, 1, 12, 'TNHB Phase 7', '1'),
(192, 1, 12, 'Rajiv Colony', '1'),
(193, 1, 13, 'Kalainnar nagar', '1'),
(194, 1, 13, 'Krishna nagar', '1'),
(195, 1, 13, 'Venkateswara nagar', '1'),
(196, 1, 13, 'Anand nagar phase 2', '1'),
(197, 1, 13, 'Gopi garden', '1'),
(198, 1, 13, 'Kurunji nagar', '1'),
(199, 1, 13, 'Kurunji nagar exetern', '1'),
(200, 1, 13, 'Vivek garden', '1'),
(201, 1, 13, 'Teacher colony', '1'),
(202, 1, 13, 'Sapthagiri nagar', '1'),
(203, 1, 14, 'VAISHNAVI NAGAR -1', '1'),
(204, 1, 14, 'VAISHNAVI NAGAR -2', '1'),
(205, 1, 14, 'ANNASAMI PILLAI NAGAR', '1'),
(206, 1, 14, 'DEVI NAGAR', '1'),
(207, 1, 14, 'SUNNAMBU JEEBI', '1'),
(208, 1, 14, 'DURGA NAGAR', '1'),
(209, 1, 14, 'Eswar nagar', '1'),
(210, 1, 14, 'Lakshmi Devi Nagar', '1'),
(211, 1, 14, 'Lakshmi Narayana\nNagar', '1'),
(212, 1, 14, 'electrical and\nelectronic', '1'),
(213, 1, 14, 'industrial estate\nbehind srinagar', '1'),
(214, 1, 14, 'Bsnl Quarters', '1'),
(215, 1, 14, 'Sri nagar', '1'),
(216, 1, 14, 'Bangalore Bye –pass\nRoad', '1'),
(217, 1, 15, 'Sipcot Housing\nColony', '1'),
(218, 1, 15, 'Dharga', '1'),
(219, 1, 15, 'Step Colony', '1'),
(220, 1, 15, 'Samadhanapuram', '1'),
(221, 1, 15, 'Om Santhi Nagar', '1'),
(222, 1, 15, 'Semmozhi Nagar', '1'),
(223, 1, 15, 'Sri Manjunatha\nNagar', '1'),
(224, 1, 15, 'Dharani Nagar', '1'),
(225, 1, 15, 'Dwaraka Nagar', '1'),
(226, 1, 15, 'Dwaraga Nagar\nExtn', '1'),
(227, 1, 15, 'Abdulkalam Nagar', '1'),
(228, 1, 15, 'Thiruvalluvar\nNagar', '1'),
(229, 1, 16, 'Amirtha Nagar', '1'),
(230, 1, 16, 'Arasanatty Green\nGarden', '1'),
(231, 1, 16, 'Bharathi Nagar', '1'),
(232, 1, 16, 'Bharathi Nagar Extn', '1'),
(233, 1, 16, 'Surya Nagar', '1'),
(234, 1, 17, 'LAL Sipcot Quarters', '1'),
(235, 1, 17, 'Gandhi Nagar', '1'),
(236, 1, 17, 'M.M.Nagar', '1'),
(237, 1, 17, 'Manjunatha Residency', '1'),
(238, 1, 17, 'Vijaya Nagar', '1'),
(239, 1, 17, 'Rajaji Nagar', '1'),
(240, 1, 17, 'Desingu Nagar', '1'),
(241, 1, 18, 'Nethaji Nagar', '1'),
(242, 1, 18, 'Annai Sathya Nagar', '1'),
(243, 1, 18, 'Podhigai Nagar', '1'),
(244, 1, 18, 'Sivaji Nagar', '1'),
(245, 1, 18, 'Manikkavasagar Nagar', '1'),
(246, 1, 19, 'MGR Nagar', '1'),
(247, 1, 19, 'Vishnu Street', '1'),
(248, 1, 19, 'Kanakadasa Layout', '1'),
(249, 1, 19, 'Athiyaman Street', '1'),
(250, 1, 19, 'Thirunavukarasar Street', '1'),
(251, 1, 19, 'Poojaiamman Koil Street', '1'),
(252, 1, 19, 'MGR Nagar North', '1'),
(253, 1, 19, 'Nagamma Devi Street', '1'),
(254, 1, 20, 'MOOKANDAPPALLI', '1'),
(255, 1, 20, 'VENUGOPAL SWAMY\nSTREET', '1'),
(256, 1, 20, 'NTR STREET', '1'),
(257, 1, 20, 'THOPPU MARIAMMAN KOIL\nSTREET', '1'),
(258, 1, 20, 'UPPLIAPPAN STREET', '1'),
(259, 1, 20, 'NTR STREET', '1'),
(260, 1, 20, 'GRAPES GARDEN', '1'),
(261, 1, 20, 'SIVAM NAGAR', '1'),
(262, 1, 20, 'CARDNAL ENCLAVE', '1'),
(263, 1, 20, 'MANJUNATHALAYOUT', '1'),
(264, 1, 20, 'VASANTHAM GARDEN', '1'),
(265, 1, 20, 'SIPCOT EXECUTIVE\nCOLONY', '1'),
(266, 1, 20, 'EWS COLONY', '1'),
(267, 1, 20, 'ESI QUARTERS', '1'),
(268, 1, 20, 'MICRO LAB STREET', '1'),
(269, 1, 21, 'Kothur', '1'),
(270, 1, 21, 'SM Nagar', '1'),
(271, 1, 21, 'TT Nagar', '1'),
(272, 1, 21, 'Motham Agraharam', '1'),
(273, 1, 21, 'AVS Housing Colony', '1'),
(274, 1, 21, 'AVS Residency Colony', '1'),
(275, 1, 21, 'Sri Manjunatha Villa', '1'),
(276, 1, 22, 'Muneeswar Nagar', '1'),
(277, 1, 22, 'Muneeswar Nagar Extn', '1'),
(278, 1, 22, 'Annai Nagar', '1'),
(279, 1, 22, 'Pooncholai Nagar', '1'),
(280, 1, 22, 'Nathan Nagar', '1'),
(281, 1, 22, 'Sivakumar Nagar', '1'),
(282, 1, 23, 'Old ASTC Hudco', '1'),
(283, 1, 23, 'Mahalakshmi Phase -1', '1'),
(284, 1, 23, 'Mahalakshmi Phase -2', '1'),
(285, 1, 23, 'Phase-12 HIG', '1'),
(286, 1, 23, 'Thirumala nagar', '1'),
(287, 1, 23, 'Palayam 1st Street', '1'),
(288, 1, 23, 'Palayam 2nd Street', '1'),
(289, 1, 23, 'Palayam 3rd Street', '1'),
(290, 1, 23, 'Phase -8 LIG Avvai\nNagar', '1'),
(291, 1, 24, 'ASTC Road Ram Nagar\n2nd Street', '1'),
(292, 1, 24, 'Concordia School\nStreet', '1'),
(293, 1, 24, 'Ram Nagar Down-1', '1'),
(294, 1, 24, 'Ram Nagar Down-2', '1'),
(295, 1, 24, 'Ram Nagar 1st Street', '1'),
(296, 1, 24, 'Ram Nagar 2nd Street', '1'),
(297, 1, 24, 'Ram Nagar 3rd Street', '1'),
(298, 1, 24, 'Ganapathi Nagar', '1'),
(299, 1, 24, 'Mariyamman Koil\nStreet', '1'),
(300, 1, 24, 'Old Bangalore Road', '1'),
(301, 1, 24, 'Venkateshwara\nTheatre Backside', '1'),
(302, 1, 24, 'Tank Street 1st Cross', '1'),
(303, 1, 24, 'Tank Street 2nd Cross', '1'),
(304, 1, 24, 'Tank Street 3rd Cross', '1'),
(305, 1, 24, 'Tank Street 4th Cross', '1'),
(306, 1, 24, 'Tank Street', '1'),
(307, 1, 24, 'Vasavi Road', '1'),
(308, 1, 25, 'Bagalur Road', '1'),
(309, 1, 25, 'Janaffer Street', '1'),
(310, 1, 25, 'Kajilubanda', '1'),
(311, 1, 25, 'Kalyanappa Lane', '1'),
(312, 1, 25, 'Muthulakshmi Street', '1'),
(313, 1, 25, 'Namalpet', '1'),
(314, 1, 25, 'Nethaji Road', '1'),
(315, 1, 25, 'Vaisiyar Street', '1'),
(316, 1, 25, 'Post Office Street', '1'),
(317, 1, 25, 'Nanjundeswar Street', '1'),
(318, 1, 25, 'Puttusaibu Street', '1'),
(319, 1, 25, 'Savithriammal Street', '1'),
(320, 1, 25, 'Tailor Street', '1'),
(321, 1, 25, 'Somasundaram Street', '1'),
(322, 1, 25, 'Thirupalli Raja Street', '1'),
(323, 1, 25, 'Vannar Street', '1'),
(324, 1, 25, 'Vannar Street II', '1'),
(325, 1, 25, 'Weavers Street', '1'),
(326, 1, 25, 'Downgollar Street', '1'),
(327, 1, 25, 'Sembadavar Street', '1'),
(328, 1, 25, 'Sowdeswari Street', '1'),
(329, 1, 25, 'Thilagar Pettai', '1'),
(330, 1, 25, 'Vinayakar Kovil Street', '1'),
(331, 1, 25, 'New Pet MG Road', '1'),
(332, 1, 25, 'Chathiram Street', '1'),
(333, 1, 25, 'Bose Bazaar Street', '1'),
(334, 1, 25, 'Ramar Kovil Street', '1'),
(335, 1, 25, 'Village Municif Street', '1'),
(336, 1, 25, 'Ayyasamy Pillai Street', '1'),
(337, 1, 25, 'Sugagnana Murthy\nMadam', '1'),
(338, 1, 26, 'Adi Dravidar Street', '1'),
(339, 1, 26, 'Alwarayya Lane', '1'),
(340, 1, 26, 'Godown Street', '1'),
(341, 1, 26, 'Jaffer Street', '1'),
(342, 1, 26, 'Kumbarpettai', '1'),
(343, 1, 26, 'Jawahar Nagar', '1'),
(344, 1, 26, 'Krishnagiri Road 1st\nCross', '1'),
(345, 1, 26, 'Kaalekunta', '1'),
(346, 1, 26, 'Parvathi Nagar', '1'),
(347, 1, 26, 'Parvathi Nagar East', '1'),
(348, 1, 27, 'Seetharam Nagar', '1'),
(349, 1, 27, 'Annamalai Nagar', '1'),
(350, 1, 27, 'Lakshmi Nagar', '1'),
(351, 1, 27, 'Meenakshi Nagar', '1'),
(352, 1, 27, 'Maruthi Nagar\nAnnex', '1'),
(353, 1, 27, 'Ganga Nagar', '1'),
(354, 1, 27, 'Narasamma Colony', '1'),
(355, 1, 27, 'Alasanatham Road', '1'),
(356, 1, 27, 'Thiruvalluvar Nagar', '1'),
(357, 1, 27, 'Kairali Nagar', '1'),
(358, 1, 27, 'Brindhavan Garden', '1'),
(359, 1, 27, 'Senthamizh Nagar', '1'),
(360, 1, 27, 'Varuna Gold', '1'),
(361, 1, 27, 'Jalagandeswarar\nNagar', '1'),
(362, 1, 27, 'Ranga Nagar', '1'),
(363, 1, 27, 'Kamban Nagar', '1'),
(364, 1, 28, 'Chennathur', '1'),
(365, 1, 28, 'Kasavagatta', '1'),
(366, 1, 28, 'Soodachandiram', '1'),
(367, 1, 28, 'Vakil Hills', '1'),
(368, 1, 28, 'Maruthi Green Field', '1'),
(369, 1, 28, 'Nakshathra Homes', '1'),
(370, 1, 28, 'Ashley Garden', '1'),
(371, 1, 28, 'V.O.C. Nagar', '1'),
(372, 1, 28, 'Gandhi Nagar', '1'),
(373, 1, 28, 'S.L.V.Nagar', '1'),
(374, 1, 29, 'Mullai Nagar', '1'),
(375, 1, 29, 'Sanasandhiram', '1'),
(376, 1, 29, 'Sanasandhiram Sidco', '1'),
(377, 1, 29, 'Subramaniya Siva\nNagar', '1'),
(378, 1, 29, 'TNHB Sanasandhiram', '1'),
(379, 1, 29, 'Thiru.Vi.Ka Nagar', '1'),
(380, 1, 29, 'Rajaganapathi Nagar', '1'),
(381, 1, 29, 'Indhirapuri Layout', '1'),
(382, 1, 29, 'Old RK Hudco', '1'),
(383, 1, 29, 'Thriveni Garden', '1'),
(384, 1, 29, 'Govt Quarters', '1'),
(385, 1, 29, 'Nanjundeswara Nagar', '1'),
(386, 1, 29, 'Bharathiyar Nagar', '1'),
(387, 1, 30, 'Min Nagar', '1'),
(388, 1, 30, 'Old Krishnagiri Road', '1'),
(389, 1, 30, 'Theppakulam Nagar', '1'),
(390, 1, 30, 'Therpettai East', '1'),
(391, 1, 30, 'Therpettai West', '1'),
(392, 1, 30, 'TNHB Hudco', '1'),
(393, 1, 30, 'Rajaji Nagar', '1'),
(394, 1, 30, 'Rayakottai Road Part', '1'),
(395, 1, 30, 'Rayakottai Road', '1'),
(396, 1, 30, 'Police Line', '1'),
(397, 1, 30, 'RayakottaiRoad', '1'),
(398, 1, 31, 'Seven house Street', '1'),
(399, 1, 31, 'Raju Street', '1'),
(400, 1, 31, 'Dhasari pettai', '1'),
(401, 1, 31, 'Mugamathiyar Street', '1'),
(402, 1, 31, 'Imambada', '1'),
(403, 1, 31, 'Kamaraj Colony 1st\ncross', '1'),
(404, 1, 31, 'Kamaraj Colony 2nd\ncross', '1'),
(405, 1, 31, 'Kamaraj Colony 3rd\nCross', '1'),
(406, 1, 31, 'Taluk Office Road', '1'),
(407, 1, 31, 'Dhasari pettai (Taluk\nOffice Road)', '1'),
(408, 1, 31, 'IYAPPAN KOVIL STREET', '1'),
(409, 1, 31, 'UMASHANKAR NAGAR', '1'),
(410, 1, 31, 'OLD TEMPLE LAND\nHUDCO', '1'),
(411, 1, 31, 'Tb Road', '1'),
(412, 1, 32, 'Anna Colony', '1'),
(413, 1, 32, 'Periya Gollar Street', '1'),
(414, 1, 32, 'Vaniyar Street', '1'),
(415, 1, 32, 'Nagarathpettai', '1'),
(416, 1, 32, 'Vellalar Street', '1'),
(417, 1, 32, 'Singara Mudhaliyar St', '1'),
(418, 1, 32, 'Anna Nagar', '1'),
(419, 1, 32, 'Alamaram Street', '1'),
(420, 1, 32, 'Ganapathipillai St', '1'),
(421, 1, 32, 'Jaishankar Colony', '1'),
(422, 1, 32, 'Jaishankar Colony Main\nRd', '1'),
(423, 1, 32, 'Jaishankar Colony 1st\nMain', '1'),
(424, 1, 32, 'Anna Nagar 2nd Cross', '1'),
(425, 1, 32, 'Kullappa Sandhu', '1'),
(426, 1, 32, 'Muthumariyamman\nTemple St', '1'),
(427, 1, 32, 'Rangasamypillai St', '1'),
(428, 1, 32, 'Anna Nagar Part', '1'),
(429, 1, 32, 'Anna Nagar 1st Cross', '1'),
(430, 1, 33, 'CC Nagar 3rd Cross', '1'),
(431, 1, 33, 'CC Nagar 2nd Cross', '1'),
(432, 1, 33, 'CC Nagar 1st Cross', '1'),
(433, 1, 33, 'CC Nagar Main', '1'),
(434, 1, 33, 'Denkanikottai Road', '1'),
(435, 1, 33, 'Santhi Nagar', '1'),
(436, 1, 33, 'Santhi Nagar East 5th\nCross', '1'),
(437, 1, 33, 'Santhi Nagar West 7th\nCross', '1'),
(438, 1, 33, 'Santhi Nagar West Ring\nRoad', '1'),
(439, 1, 33, 'Santhi Nagar West 2nd\nCross', '1'),
(440, 1, 33, 'Santhi Nagar West 3rd\nCross', '1'),
(441, 1, 33, 'Santhi Nagar West 4th A\nCross', '1'),
(442, 1, 33, 'Santhi Nagar West 4th B\nCross', '1'),
(443, 1, 33, 'Santhi Nagar West 4th C\nCross', '1'),
(444, 1, 33, 'Santhi Nagar West 4th\nCross', '1'),
(445, 1, 33, 'Santhi Nagar West 5th Cross', '1'),
(446, 1, 33, 'Santhi Nagar West 6th\nCross', '1'),
(447, 1, 33, 'Santhi Nagar West 1st\nCross', '1'),
(448, 1, 33, 'Santhi Nagar East 3rd', '1'),
(449, 1, 33, 'Cross', '1'),
(450, 1, 33, 'Santhi Nagar East 2nd Cr', '1'),
(451, 1, 33, 'Santhi Nagar East 1st\nCross', '1'),
(452, 1, 33, 'Santhi Nagar East 4th\nCross', '1'),
(453, 1, 33, 'Santhi Nagar East Ring\nRd', '1'),
(454, 1, 33, 'Telephone Exchange Rd', '1'),
(455, 1, 34, 'Appavu Nagar', '1'),
(456, 1, 34, 'Eden Garden', '1'),
(457, 1, 34, 'Thally Hudco', '1'),
(458, 1, 34, 'Om Sakthi Nagar', '1'),
(459, 1, 34, 'Ramji Colony', '1'),
(460, 1, 34, 'Opp Sericulture Ins', '1'),
(461, 1, 34, 'Muthurayan Jeebi 1st\nMain Rd', '1'),
(462, 1, 34, 'Thally Rd Part', '1'),
(463, 1, 34, 'Amman Nagar 1st St', '1'),
(464, 1, 34, 'Thally Rd 1st St', '1'),
(465, 1, 34, 'Thally Rd 2nd St', '1'),
(466, 1, 34, 'Amman Nagar 2nd St', '1'),
(467, 1, 34, 'Lake View Garden 2nd St', '1'),
(468, 1, 34, 'Muthurayan Jeebi 1st St', '1'),
(469, 1, 34, 'Muthurayan Jeebi 2nd St', '1'),
(470, 1, 34, 'Muthurayan Jeebi 3rd St', '1'),
(471, 1, 34, 'Muthurayan Jeebi 4th St', '1'),
(472, 1, 35, 'Phase VIII LIG', '1'),
(473, 1, 35, 'Muneshwar Nagar', '1'),
(474, 1, 35, 'Classic Homes', '1'),
(475, 1, 35, 'Jai Sakthi Nagar', '1'),
(476, 1, 35, 'Phase VIII MIG', '1'),
(477, 1, 36, 'Andivadi', '1'),
(478, 1, 36, 'Lake Avenue 1st Cross', '1'),
(479, 1, 36, 'Lake Avenue 2nd Cross', '1'),
(480, 1, 36, 'Lake Avenue 3rd Cross', '1'),
(481, 1, 36, 'Lake Avenue 4th Cross', '1'),
(482, 1, 36, 'Lake Avenue 5th Cross', '1'),
(483, 1, 36, 'Vikas Nagar 1st Cross', '1'),
(484, 1, 36, 'Vikas Nagar 2nd Cross', '1'),
(485, 1, 36, 'Manjusri Nagar', '1'),
(486, 1, 36, 'Jay Pee Gateway', '1'),
(487, 1, 36, 'M.S.Garden', '1'),
(488, 1, 37, 'TVS K & L Block', '1'),
(489, 1, 37, 'TVS Nagar 1st Phase', '1'),
(490, 1, 37, 'TVS Nagar 2nd Phase', '1'),
(491, 1, 37, 'Jawahar Nagar', '1'),
(492, 1, 37, 'Jawahar Nagar 1st Cross', '1'),
(493, 1, 37, 'Jawahar Nagar 2nd Cross', '1'),
(494, 1, 37, 'Ambal Nagar', '1'),
(495, 1, 37, 'SBM Colony 1st Cross', '1'),
(496, 1, 37, 'SBM Colony 2nd Cross', '1'),
(497, 1, 37, 'SBM Colony 3rd Cross', '1'),
(498, 1, 37, 'SBM Colony 4th Cross', '1'),
(499, 1, 37, 'SBM Colony 5th Cross', '1'),
(500, 1, 37, 'CSB Quarters', '1'),
(501, 1, 37, 'Midugirapalli', '1'),
(502, 1, 37, 'Maranathan Colony', '1'),
(503, 1, 37, 'Bharath Nagar', '1'),
(504, 1, 37, 'Sadhasiva Nagar', '1'),
(505, 1, 37, 'Jubilee Homes', '1'),
(506, 1, 37, 'Littlewood Residency', '1'),
(507, 1, 38, 'Venkateshwara Layout Phase I & Phase II and\nCrosses', '1'),
(508, 1, 38, 'Guruvayurappan Nagar', '1'),
(509, 1, 38, 'Vidhya Nagar', '1'),
(510, 1, 38, 'C.S.Nagar', '1'),
(511, 1, 38, 'Prakash Nagar 3rd Crosses', '1'),
(512, 1, 38, 'Rajaji Nagar', '1'),
(513, 1, 38, 'Dinnur', '1'),
(514, 1, 38, 'Jeeva Nagar', '1'),
(515, 1, 38, 'Vasavi Nagar', '1'),
(516, 1, 38, 'Gayathri Garden', '1'),
(517, 1, 39, 'Gandhi Nagar', '1'),
(518, 1, 39, 'Nehru Nagar + Crosses', '1'),
(519, 1, 39, 'Ramakrishna Nagar\n1rd Cross to 6th Cross', '1'),
(520, 1, 39, 'Phase IX', '1'),
(521, 1, 39, 'Sub-Collector Bunglow\nCompound & Opposite', '1'),
(522, 1, 39, 'Denkanikotta Road', '1'),
(523, 1, 39, 'Police Quarters', '1'),
(524, 1, 40, 'BHARATHIDASAN\nNAGAR 1ST CROSS', '1'),
(525, 1, 40, 'BHARATHIDASAN\nNAGAR IIND CROSS', '1'),
(526, 1, 40, 'BHARATHIDASAN\nNAGAR IIIRD CROSS', '1'),
(527, 1, 40, 'NEW TEMPLE LAND\nHUDCO HIG', '1'),
(528, 1, 40, 'SIVASAKTHI NAGAR', '1'),
(529, 1, 40, 'PERIYAR NAGAR EAST', '1'),
(530, 1, 40, 'RAILWAYSTATION\nROAD MAIN', '1'),
(531, 1, 40, 'RAILWAY STATION\nROAD IST CROSS', '1'),
(532, 1, 40, 'RAILWAY STATION\nROAD IIND CROSS', '1'),
(533, 1, 40, 'MANOHAR NAGAR', '1'),
(534, 1, 40, 'KOMBERIKUTTA', '1'),
(535, 1, 40, 'Balaji Nagar-1st cross', '1'),
(536, 1, 40, 'Balaji Nagar-2nd stcross', '1'),
(537, 1, 40, 'Neelamega Nagar', '1'),
(538, 1, 40, 'RK Road Near\n(Murugan Koil)', '1'),
(539, 1, 40, 'PERIYAR NAGAR WEST', '1'),
(540, 1, 41, 'Phase X Rayakottai\nHousing Board', '1'),
(541, 1, 41, 'Phase X Rayakottai\nHousing Board', '1'),
(542, 1, 42, 'Gopikrishna Colony', '1'),
(543, 1, 42, 'Kuppusamy Nagar', '1'),
(544, 1, 42, 'Phase XVI', '1'),
(545, 1, 42, 'Valluvar Nagar', '1'),
(546, 1, 42, 'Bharathidasan Nagar 9th\nCross', '1'),
(547, 1, 42, 'Bharathidasan Nagar 10th\nCross', '1'),
(548, 1, 42, 'Bharathidasan Nagar 11th\nCross', '1'),
(549, 1, 42, 'Bharathidasan Nagar 12th\nCross', '1'),
(550, 1, 42, 'Bharathidasan Nagar 13th\nCross', '1'),
(551, 1, 42, 'Bharathidasan Nagar 13\n‘A’ Cross', '1'),
(552, 1, 42, 'Bharathidasan Nagar 14th\nCross', '1'),
(553, 1, 42, 'Bharathidasan Nagar 15th\nCross', '1'),
(554, 1, 42, 'Bharathidasan Nagar 16th\nCross', '1'),
(555, 1, 42, 'Bharathidasan Nagar 17th\nCross', '1'),
(556, 1, 42, 'Bharathidasan Nagar 18th Cross', '1'),
(557, 1, 42, 'Bharathidasan Nagar 19th\nCross', '1'),
(558, 1, 42, 'Bharathidasan Nagar 20th\nCross', '1'),
(559, 1, 42, 'Bharathidasan Nagar\n21rd Cross', '1'),
(560, 1, 42, 'Bharathidasan Nagar\n22nd Cross', '1'),
(561, 1, 42, 'Bharathidasan Nagar\n23rd Cross', '1'),
(562, 1, 42, 'Bharathidasan Nagar 4th\nCross', '1'),
(563, 1, 42, 'Bharathidasan Nagar 5th\nCross', '1'),
(564, 1, 42, 'Bharathidasan Nagar 6th\nCross', '1'),
(565, 1, 42, 'Bharathidasan Nagar 7th\nCross', '1'),
(566, 1, 42, 'Bharathidasan Nagar 9th\nCross', '1'),
(567, 1, 42, 'Bharathidasan Nagar 9\n‘A’ Cross', '1'),
(568, 1, 42, 'Bharathidasan Nagar 9\n‘B’ Cross', '1'),
(569, 1, 42, 'Bharathidasan Nagar 9\n‘C’ Cross', '1'),
(570, 1, 42, 'Bharathidasan Nagar 1st\nMain Road', '1'),
(571, 1, 42, 'Bharathidasan Nagar 2nd\nMain Road', '1'),
(572, 1, 42, 'Janakapuri Layout', '1'),
(573, 1, 42, 'Krishnappa Nagar', '1'),
(574, 1, 42, 'Kumaran Nagar 1st Cross', '1'),
(575, 1, 42, 'Kumaran Nagar 1st Main\nRoad', '1'),
(576, 1, 42, 'Kumaran Nagar 2nd Cross', '1'),
(577, 1, 42, 'Kumaran Nagar 3rd Cross', '1'),
(578, 1, 42, 'Kumaran Nagar 4th Cross', '1'),
(579, 1, 42, 'St.Mary’s Nagar', '1'),
(580, 1, 42, 'St.Mary’s Nagar\nExtension', '1'),
(581, 1, 42, 'VOC Nagar', '1'),
(582, 1, 42, 'Kurinji Nagar', '1'),
(583, 1, 43, 'Amman Nagar', '1'),
(584, 1, 43, 'Amman Nagar 1st Cross', '1'),
(585, 1, 43, 'Amman Nagar 2nd Cross', '1'),
(586, 1, 43, 'Amman Nagar 3rd Cross', '1'),
(587, 1, 43, 'Amman Nagar 4th Cross', '1'),
(588, 1, 43, 'Amman Nagar 5th Cross', '1'),
(589, 1, 43, 'Amman Nagar 6th Cross', '1'),
(590, 1, 43, 'Amman Nagar 8th Cross', '1'),
(591, 1, 43, 'Amman Nagar 11th Cross', '1'),
(592, 1, 43, 'Amman Nagar 17th Cross', '1'),
(593, 1, 43, 'Chamundi Nagar', '1'),
(594, 1, 43, 'G.K.S.Nagar', '1'),
(595, 1, 43, 'Green Valley', '1'),
(596, 1, 43, 'Kamaraj Nagar', '1'),
(597, 1, 43, 'Kurupatti', '1'),
(598, 1, 43, 'Royal Town', '1'),
(599, 1, 43, 'S.D.A.Nagar', '1'),
(600, 1, 43, 'Seventh Day Colony', '1'),
(601, 1, 43, 'Subhiksha Colony', '1'),
(602, 1, 44, 'Karnoor', '1'),
(603, 1, 44, 'Shanthinekethan Colony', '1'),
(604, 1, 44, 'Abirami Garden', '1'),
(605, 1, 44, 'Kuthiraipalayam', '1'),
(606, 1, 44, 'Nethaji Nagar', '1'),
(607, 1, 44, 'Old Mathigiri', '1'),
(608, 1, 44, 'Pothigai Nagar', '1'),
(609, 1, 44, 'Royal Arcade', '1'),
(610, 1, 45, 'Sippaipalayam', '1'),
(611, 1, 45, 'Kadipalayam', '1'),
(612, 1, 45, 'Sippaipalayam', '1'),
(613, 1, 45, 'Titan Township', '1'),
(614, 1, 45, 'Swarnabhoomi', '1');

-- --------------------------------------------------------

--
-- Table structure for table `article_details`
--

CREATE TABLE `article_details` (
  `id` int(11) NOT NULL,
  `location` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `user_id` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `student_name` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `student_age` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `school_name` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `photo_path` text CHARACTER SET utf8 DEFAULT NULL,
  `city` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `area` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `article_title` text CHARACTER SET utf8 DEFAULT NULL,
  `article_photo` text CHARACTER SET utf8 DEFAULT NULL,
  `article_description` text CHARACTER SET utf8 DEFAULT NULL,
  `reg_date` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `reg_time` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(500) CHARACTER SET utf8 NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article_details`
--

INSERT INTO `article_details` (`id`, `location`, `user_id`, `student_name`, `student_age`, `school_name`, `photo_path`, `city`, `area`, `article_title`, `article_photo`, `article_description`, `reg_date`, `reg_time`, `status`) VALUES
(4, '', '0', 'hbhfb', '25', 'bjk', 'article_images/1683604706resize-1603870556237424994croppedimage.png', 'dfdfdcity', 'ddfdfdarea', 'testing articlesss', 'article_images/2026659659corona-logo.5e7ca5e7008de5.29566408.png', 'testing covid articlesssssss', '2020-12-09', '02:45 AM', 'active'),
(5, '', '0', 'RAJ_TEST', '5', 'RR', 'article_images/1473517156raj_trend.jpeg', 'R', 'R', 'RAJ_TEST', 'article_images/1529179899raj_trend.jpeg', 'TEST', '2020-12-13', '08:59 AM', 'active'),
(6, '2', '5', 'RAJ_TEST1', '8', 'F', 'article_images/301361824RAJ_TEMPLE.jpeg', 'G', 'G', 'TEST FROM FRONT END', 'article_images/867397945raj-fashion.jpeg', 'TEST FROM FRONT END', '2020-12-13', '09:00 AM', 'active'),
(7, '2', '7', 'Thamodharan', '30', 'Private School', 'article_images/1421650216logo_(1).png', 'Chennai', 'Mylapore', 'Kids Articles News', 'article_images/2053631275Banner_Image.png', 'testing articles news', '2021-04-10', '10:48 PM', 'deactive');

-- --------------------------------------------------------

--
-- Table structure for table `available_location`
--

CREATE TABLE `available_location` (
  `id` int(11) NOT NULL,
  `location_name` varchar(600) DEFAULT NULL,
  `location_code` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `available_location`
--

INSERT INTO `available_location` (`id`, `location_name`, `location_code`, `status`) VALUES
(1, 'Hosur', 'HSR', 1);

-- --------------------------------------------------------

--
-- Table structure for table `banner_details`
--

CREATE TABLE `banner_details` (
  `id` int(11) NOT NULL,
  `image_path` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner_details`
--

INSERT INTO `banner_details` (`id`, `image_path`) VALUES
(3, 'banner_images/1557510065slider9.jpg'),
(4, 'banner_images/1868648925slider11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `birthday_wishes`
--

CREATE TABLE `birthday_wishes` (
  `id` int(11) NOT NULL,
  `location` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `user_id` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `person_name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `birthday_date` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `sender_name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `sender_image_path` text CHARACTER SET utf8 DEFAULT NULL,
  `image_path` text CHARACTER SET utf8 DEFAULT NULL,
  `wishes_detail` text CHARACTER SET utf8 DEFAULT NULL,
  `reg_date` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `reg_time` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(500) NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `birthday_wishes`
--

INSERT INTO `birthday_wishes` (`id`, `location`, `user_id`, `person_name`, `birthday_date`, `sender_name`, `sender_image_path`, `image_path`, `wishes_detail`, `reg_date`, `reg_time`, `status`) VALUES
(1, '2', '1', 'Ramesh', '2020-12-09', 'Thamodharan', 'birthday_images/1200219395muruga.png', 'birthday_images/1510766756image_(1).png', 'wish u many more happy returns of the day my dear brother.. God bless you.. stay blessed', '2020-12-06', '09:57 PM', 'active'),
(2, '', '0', 'Ramesh Kumar', '2020-12-09', 'Dinesh Kumar', 'birthday_images/186468039APP_Wall_Final_(3).png', 'birthday_images/1159605481i.jpg', 'happy birthday machan. Marakama treat kuduthurudaaaaaaaa', '2020-12-06', '10:26 PM', 'active'),
(3, '', '0', 'raj_test', '2020-12-13', 'raj_test', 'birthday_images/35112223raj-fashion.jpeg', 'birthday_images/1700613541Screenshot_2020-12-07_at_10.42.06_PM.png', 'happy birthday', '2020-12-13', '08:49 AM', 'active'),
(4, '', '0', 'RAJ_TEST_ADMIN', '2020-12-13', 'RAJ_TEST_ADMIN', 'birthday_images/1051190903raj_trend.jpeg', 'birthday_images/1433526854raj_food.png', 'FOODY TREAT_ADMIN', '2020-12-13', '08:52 AM', 'active'),
(5, '', '0', 'Rams', '2021-04-10', 'Thamu', 'birthday_images/791879327new_blink.gif', 'birthday_images/17249495051433526854raj_food.png', 'Wish you many more happieeee returns of the day my dear friend', '2021-03-29', '01:36 AM', 'active'),
(6, '2', '7', 'Ramesh Kumar', '2021-04-10', 'Thamodharan', 'birthday_images/964713237resize-1603870556237424994croppedimage.png', 'birthday_images/1914206662resize-16038707871972206374dzire.png', 'happy birthday my dear friend', '2021-04-10', '10:10 PM', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `business_category_list`
--

CREATE TABLE `business_category_list` (
  `id` int(11) NOT NULL,
  `category_name` varchar(500) DEFAULT NULL,
  `category_image` text CHARACTER SET utf8 DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `count` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_category_list`
--

INSERT INTO `business_category_list` (`id`, `category_name`, `category_image`, `status`, `count`) VALUES
(1, 'Automotive Products', NULL, 1, '0'),
(2, 'Medical Surgical Instruments', NULL, 1, '0'),
(3, 'Abacus Classes', NULL, 1, '0'),
(4, 'Abrasive Dealers', NULL, 1, '0'),
(5, 'Abrasives & Adhesives', NULL, 1, '0'),
(6, 'Abrasives,Cutting Tools', NULL, 1, '0'),
(7, 'Ac Repairs &Services', NULL, 1, '0'),
(8, 'Accommodation', NULL, 1, '0'),
(9, 'Acrylic Plastics & Sheets', NULL, 1, '0'),
(10, 'Acupuncture', 'category_images/1399610142p4_Accupuncture_NL1706_ts92028888.jpg', 1, '1'),
(11, 'Adhesive', NULL, 1, '0'),
(12, 'Adoption Centres', NULL, 1, '0'),
(13, 'Adventure Clubs', NULL, 1, '0'),
(14, 'Advertising', 'category_images/759544352advertising-concept-web.jpg', 1, '3'),
(15, 'Advertising Agencies', NULL, 1, '0'),
(16, 'Advocates', NULL, 1, '0'),
(17, 'Aero Space Products', NULL, 1, '0'),
(18, 'Aerobics', NULL, 1, '0'),
(19, 'Aeronautical Engineering Colleges', NULL, 1, '0'),
(20, 'Agriculture Fabrication', NULL, 1, '0'),
(21, 'Agriculture Inputs, Seeds & Fertilizers', NULL, 1, '0'),
(22, 'Air & Train', NULL, 1, '0'),
(23, 'Air And Train Ambulance Services', NULL, 1, '0'),
(24, 'Air Bubble Sheets & Packaging Materials', NULL, 1, '0'),
(25, 'Air Cargo Agents', NULL, 1, '0'),
(26, 'Air Conditioners, Refrigerators Sales & Service', NULL, 1, '0'),
(27, 'Air Coolers', NULL, 1, '0'),
(28, 'Air Curtains', NULL, 1, '0'),
(29, 'Air Pollution Control Equipment Dealers', NULL, 1, '0'),
(30, 'Alloy, Iron & Steel Industries', NULL, 1, '0'),
(31, 'Alternative Medicines', NULL, 1, '0'),
(32, 'Aluminium Capacitors ,Conductors& Castings', NULL, 1, '0'),
(33, 'Aluminium Dye Casting', NULL, 1, '0'),
(34, 'Aluminium Extrusion Industry', NULL, 1, '0'),
(35, 'Aluminium Metalised Films&Yarns', NULL, 1, '0'),
(36, 'Aluminium Oxide', NULL, 1, '0'),
(37, 'Aluminium Partition & Industrial Work', NULL, 1, '0'),
(38, 'Aluminium Products', NULL, 1, '0'),
(39, 'Ambulance Services', NULL, 1, '0'),
(40, 'Ammonia Gas Dealers', NULL, 1, '0'),
(41, 'Amusement Parks', NULL, 1, '0'),
(42, 'Animation Training Institutes', NULL, 1, '0'),
(43, 'Apparels & Accessories', NULL, 1, '0'),
(44, 'Apple Product Repair', 'category_images/376972816apple_repair-service-expansion_iphone-repair_07072020.jpg.landing-big_2x.jpg', 1, '1'),
(45, 'Aquarium', NULL, 1, '0'),
(46, 'Architects, Interior Designers, Landscapers', NULL, 1, '0'),
(47, 'Art Gallery', NULL, 1, '0'),
(48, 'Art Paintings', NULL, 1, '0'),
(49, 'Artists ,Sticker Cutting , Digital & Flex Boards', NULL, 1, '0'),
(50, 'Arts & Craft Classes', NULL, 1, '0'),
(51, 'Ashram & Meditation & Yoga Centres', NULL, 1, '0'),
(52, 'Astrologers', NULL, 1, '0'),
(53, 'Atm Centres', NULL, 1, '0'),
(54, 'Audio,Video,Cd , (Musicals)', NULL, 1, '0'),
(55, 'Auditoriums', NULL, 1, '0'),
(56, 'Auditors - Chartered Accountants', NULL, 1, '0'),
(57, 'Auditors & Cost Accountants', NULL, 1, '0'),
(58, 'Auditors & Tax Consultants', NULL, 1, '0'),
(59, 'Auto Cad - Civil & Machinery', NULL, 1, '0'),
(60, 'Auto Components', NULL, 1, '0'),
(61, 'Auto Dealers', NULL, 1, '0'),
(62, 'Auto Finance', NULL, 1, '0'),
(63, 'Auto Liners( Leather & Rexine Works)', NULL, 1, '0'),
(64, 'Auto Service Centres', NULL, 1, '0'),
(65, 'Auto Works - Four Wheelers', NULL, 1, '0'),
(66, 'Auto Works - Two Wheelers', NULL, 1, '0'),
(67, 'Automatic Room Refresher', NULL, 1, '0'),
(68, 'Automative Filters & Perferating Works', NULL, 1, '0'),
(69, 'Automobile Components', NULL, 1, '0'),
(70, 'Automobile Engine Oil Dealers', NULL, 1, '0'),
(71, 'Automobile Gears', NULL, 1, '0'),
(72, 'Automobiles', NULL, 1, '0'),
(73, 'Automobiles, Oils & Lubricants ( 2,3,4,6 Wheeler', NULL, 1, '0'),
(74, 'Automotive Filters', NULL, 1, '0'),
(75, 'Aviation Academies', NULL, 1, '0'),
(76, 'Axle Beam', NULL, 1, '0'),
(77, 'Ayurvedic Food', NULL, 1, '0'),
(78, 'Ayurvedic Medicines', NULL, 1, '0'),
(79, 'Ayurvedic Treatment', NULL, 1, '0'),
(80, 'B.Ed. Colleges', NULL, 1, '0'),
(81, 'Baby Foods', NULL, 1, '0'),
(82, 'Baby Store', NULL, 1, '0'),
(83, 'Bakeries', NULL, 1, '0'),
(84, 'Bakery Products', NULL, 1, '0'),
(85, 'Balloon Decorations', NULL, 1, '0'),
(86, 'Bamboo Flooring', NULL, 1, '0'),
(87, 'Bangles', NULL, 1, '0'),
(88, 'Banks', NULL, 1, '0'),
(89, 'Banquet Halls', NULL, 1, '0'),
(90, 'Bars', NULL, 1, '0'),
(91, 'Battery Dealers', NULL, 1, '0'),
(92, 'Battery Sales & Service', NULL, 1, '0'),
(93, 'Bearings', NULL, 1, '0'),
(94, 'Beautician Training Institutes', NULL, 1, '0'),
(95, 'Beauty & Wellness', NULL, 1, '0'),
(96, 'Beauty And Cosmetic Products', NULL, 1, '0'),
(97, 'Beauty Parlour - Gents', NULL, 1, '0'),
(98, 'Beauty Parlour - Ladies', NULL, 1, '0'),
(99, 'Beauty Parlours', NULL, 1, '0'),
(100, 'Bed Linen', NULL, 1, '0'),
(101, 'Bed Room Furniture', NULL, 1, '0'),
(102, 'Belts & Wallets', NULL, 1, '0'),
(103, 'Bicycle Stores', NULL, 1, '0'),
(104, 'Bike Rentals', NULL, 1, '0'),
(105, 'Billing Machine Dealers', NULL, 1, '0'),
(106, 'Binding', NULL, 1, '0'),
(107, 'Birth Certificate Offices', NULL, 1, '0'),
(108, 'Blood Donation Centres', NULL, 1, '0'),
(109, 'Blow Moulding Machine Dealer', NULL, 1, '0'),
(110, 'Body Building Work Shops', NULL, 1, '0'),
(111, 'Body Massage Parlours', NULL, 1, '0'),
(112, 'Boilers', NULL, 1, '0'),
(113, 'Bolts & Nuts', NULL, 1, '0'),
(114, 'Book Publishers', NULL, 1, '0'),
(115, 'Book Shops', NULL, 1, '0'),
(116, 'Book Stalls', NULL, 1, '0'),
(117, 'Borewells', NULL, 1, '0'),
(118, 'Bottle Shops', NULL, 1, '0'),
(119, 'Boutiques', NULL, 1, '0'),
(120, 'Brick Materials', NULL, 1, '0'),
(121, 'Brite Bars', NULL, 1, '0'),
(122, 'Broadband - Wireless & Internet', NULL, 1, '0'),
(123, 'Broilers & Egg Shops', NULL, 1, '0'),
(124, 'Building And Construction', NULL, 1, '0'),
(125, 'Building Demolition', NULL, 1, '0'),
(126, 'Building Materials Suppliers(Bricks,Blue Metals &', NULL, 1, '0'),
(127, 'Bulk Sms Services', NULL, 1, '0'),
(128, 'Bulk Sms Solutions', NULL, 1, '0'),
(129, 'Burners & Recuperator Controls', NULL, 1, '0'),
(130, 'Bus Service & Bus Owners', NULL, 1, '0'),
(131, 'Bus Travels', NULL, 1, '0'),
(132, 'Business Consultants', NULL, 1, '0'),
(133, 'C.N.C Machining', NULL, 1, '0'),
(134, 'Ca & Icwa Training Institutes', NULL, 1, '0'),
(135, 'Cable Filling Components', NULL, 1, '0'),
(136, 'Cable Manufacturers', NULL, 1, '0'),
(137, 'Cable Tv Operators', NULL, 1, '0'),
(138, 'Cabs Services', NULL, 1, '0'),
(139, 'Cadd Design & Development', NULL, 1, '0'),
(140, 'Cafes', NULL, 1, '0'),
(141, 'Cake Shops', NULL, 1, '0'),
(142, 'Calendars', NULL, 1, '0'),
(143, 'Call Centre Training', NULL, 1, '0'),
(144, 'Calligraphy Centre', NULL, 1, '0'),
(145, 'Camera Accessories', NULL, 1, '0'),
(146, 'Camera Lens', NULL, 1, '0'),
(147, 'Cameras', NULL, 1, '0'),
(148, 'Candles', NULL, 1, '0'),
(149, 'Caps & Hats', NULL, 1, '0'),
(150, 'Car Ac Repairs', NULL, 1, '0'),
(151, 'Car Accessories', NULL, 1, '0'),
(152, 'Car Dealers', NULL, 1, '0'),
(153, 'Car Rentals', NULL, 1, '0'),
(154, 'Car Repairs & Services', NULL, 1, '0'),
(155, 'Carbon Dioxide Gas Dealers', NULL, 1, '0'),
(156, 'Cargo & Logistics', NULL, 1, '0'),
(157, 'Cargo Agents', NULL, 1, '0'),
(158, 'Carpenters', NULL, 1, '0'),
(159, 'Carpet & Rugs', NULL, 1, '0'),
(160, 'Carpet And Carpet Tiles', NULL, 1, '0'),
(161, 'Castings', NULL, 1, '0'),
(162, 'Catering Services & Cooking Contractors', NULL, 1, '0'),
(163, 'Cement Design Works', NULL, 1, '0'),
(164, 'Central Silk Board', NULL, 1, '0'),
(165, 'Centreing Materials', NULL, 1, '0'),
(166, 'Ceramics & Hardwares', NULL, 1, '0'),
(167, 'Ceramics Insulators', NULL, 1, '0'),
(168, 'Chairs', NULL, 1, '0'),
(169, 'Chandeliers', NULL, 1, '0'),
(170, 'Charitable Trusts', NULL, 1, '0'),
(171, 'Chartered Accountants', NULL, 1, '0'),
(172, 'Chartered Bus', NULL, 1, '0'),
(173, 'Chartered Engineers & Corporate Valuers', NULL, 1, '0'),
(174, 'Chat & Snacks', NULL, 1, '0'),
(175, 'Chemical Labs', NULL, 1, '0'),
(176, 'Chemicals', NULL, 1, '0'),
(177, 'Chess Coachers', NULL, 1, '0'),
(178, 'Chicken & Mutton Stalls', NULL, 1, '0'),
(179, 'Chicken Shops', NULL, 1, '0'),
(180, 'Children Wear', NULL, 1, '0'),
(181, 'Chimneys', NULL, 1, '0'),
(182, 'Chips & Snacks Shops', NULL, 1, '0'),
(183, 'Chit Funds', NULL, 1, '0'),
(184, 'Chocolate Shops', NULL, 1, '0'),
(185, 'Churches', NULL, 1, '0'),
(186, 'Cinema Theaters', NULL, 1, '0'),
(187, 'Civil Architecturals & Trainings', NULL, 1, '0'),
(188, 'Civil Engineers & Contractors', NULL, 1, '0'),
(189, 'Cleaning Tools & Accessories', NULL, 1, '0'),
(190, 'Clinical Labs & X - Ray Centres', NULL, 1, '0'),
(191, 'Clinics', NULL, 1, '0'),
(192, 'Clocks', NULL, 1, '0'),
(193, 'Clubs', NULL, 1, '0'),
(194, 'Clutches', NULL, 1, '0'),
(195, 'Cnc Training Centre', NULL, 1, '0'),
(196, 'Cng Pump Stations', NULL, 1, '0'),
(197, 'Coarse Aggregates', NULL, 1, '0'),
(198, 'Coconut Merchants', NULL, 1, '0'),
(199, 'Coffee (Bru)', NULL, 1, '0'),
(200, 'Coffee Tea Vending Machine', NULL, 1, '0'),
(201, 'Coffee Works', NULL, 1, '0'),
(202, 'Coin Phones', NULL, 1, '0'),
(203, 'Cold Extrusions & Powder Mettalurgy', NULL, 1, '0'),
(204, 'Colleges - Arts', NULL, 1, '0'),
(205, 'Colleges - Engineering', NULL, 1, '0'),
(206, 'Colour Labs', NULL, 1, '0'),
(207, 'Commercial Kitchen Equipment Dealers', NULL, 1, '0'),
(208, 'Communication', NULL, 1, '0'),
(209, 'Competitive Exams', NULL, 1, '0'),
(210, 'Components', NULL, 1, '0'),
(211, 'Computer Accessories & Peripherals', NULL, 1, '0'),
(212, 'Computer D.T.P Centres', NULL, 1, '0'),
(213, 'Computer Education Centres', NULL, 1, '0'),
(214, 'Computer Printer Components', NULL, 1, '0'),
(215, 'Computer Sales & Services ( Computer Consumables&', NULL, 1, '0'),
(216, 'Computerised Accounting,Vat Consultant', NULL, 1, '0'),
(217, 'Computers', NULL, 1, '0'),
(218, 'Computers, Tablets & Mobiles', NULL, 1, '0'),
(219, 'Concrete Cover Blocks', NULL, 1, '0'),
(220, 'Conference Hall', NULL, 1, '0'),
(221, 'Construction & Renovation', NULL, 1, '0'),
(222, 'Construction Companies', NULL, 1, '0'),
(223, 'Consultant - Labour Law', NULL, 1, '0'),
(224, 'Consultant - Safety', NULL, 1, '0'),
(225, 'Consultant - Automation', NULL, 1, '0'),
(226, 'Consultant - Business', NULL, 1, '0'),
(227, 'Consultant - Central Exercise', NULL, 1, '0'),
(228, 'Consultant - Esi & Pf', NULL, 1, '0'),
(229, 'Consultant - Iso-Quality Aspects', NULL, 1, '0'),
(230, 'Consultant - Quality Aspects', NULL, 1, '0'),
(231, 'Consultant - Security & Detective Agency', NULL, 1, '0'),
(232, 'Consumer Council', NULL, 1, '0'),
(233, 'Consumer Products & General Agents', NULL, 1, '0'),
(234, 'Contact Lenses', NULL, 1, '0'),
(235, 'Content Writers', NULL, 1, '0'),
(236, 'Contractors', NULL, 1, '0'),
(237, 'Convention Centres', NULL, 1, '0'),
(238, 'Conveyors', NULL, 1, '0'),
(239, 'Cooking Classes', NULL, 1, '0'),
(240, 'Cooks On Hire', NULL, 1, '0'),
(241, 'Cookware', NULL, 1, '0'),
(242, 'Cool Drinks, Fruit Stalls&Ice Cream', NULL, 1, '0'),
(243, 'Corporate Catering Services', NULL, 1, '0'),
(244, 'Corporate Gifts', NULL, 1, '0'),
(245, 'Cosmetic Surgery', NULL, 1, '0'),
(246, 'Cotton Waste', NULL, 1, '0'),
(247, 'Counselling - Academic & Career', NULL, 1, '0'),
(248, 'Couplings', NULL, 1, '0'),
(249, 'Courier & Cargo Services', NULL, 1, '0'),
(250, 'Couriers', NULL, 1, '0'),
(251, 'Courts', NULL, 1, '0'),
(252, 'Crackers', NULL, 1, '0'),
(253, 'Crane Services', NULL, 1, '0'),
(254, 'Cranes Fork Lift - Hirers', NULL, 1, '0'),
(255, 'Crank Shaft Machinaries', NULL, 1, '0'),
(256, 'Crank Shaft Machinaries', NULL, 1, '0'),
(257, 'Creches', NULL, 1, '0'),
(258, 'Cremation Grounds', NULL, 1, '0'),
(259, 'Cremation Services', NULL, 1, '0'),
(260, 'Cryogenics', NULL, 1, '0'),
(261, 'Curtain Accessories', NULL, 1, '0'),
(262, 'Cushion & Cushion Covers', NULL, 1, '0'),
(263, 'Customs Clearing & Forwarding Agents', NULL, 1, '0'),
(264, 'Cutlery', NULL, 1, '0'),
(265, 'Cycle Shops', NULL, 1, '0'),
(266, 'D.T.P Coaching Center', NULL, 1, '0'),
(267, 'Dance Academies', NULL, 1, '0'),
(268, 'Dead Body Freezer Box On Hire', NULL, 1, '0'),
(269, 'Decor & Lightings', NULL, 1, '0'),
(270, 'Decor & Show Pieces', NULL, 1, '0'),
(271, 'Decoration Materials', NULL, 1, '0'),
(272, 'Dental Clinics', NULL, 1, '0'),
(273, 'Designing & Wood Carving', NULL, 1, '0'),
(274, 'Detective Agencies', NULL, 1, '0'),
(275, 'Dhaba', NULL, 1, '0'),
(276, 'Diagnostic Centres', NULL, 1, '0'),
(277, 'Dial , Vernier , Caliper , Micmeter', NULL, 1, '0'),
(278, 'Diary', NULL, 1, '0'),
(279, 'Die Casting', NULL, 1, '0'),
(280, 'Diesel Engine Works', NULL, 1, '0'),
(281, 'Diesel Engines & Spare Parts', NULL, 1, '0'),
(282, 'Diesel Gas Stations', NULL, 1, '0'),
(283, 'Dietician', NULL, 1, '0'),
(284, 'Digital Cameras', NULL, 1, '0'),
(285, 'Digital Printers', NULL, 1, '0'),
(286, 'Digital Weighing Scale Dealers', NULL, 1, '0'),
(287, 'Dining', NULL, 1, '0'),
(288, 'Dining Room Furniture', NULL, 1, '0'),
(289, 'Dining Sets', NULL, 1, '0'),
(290, 'Doctors - Accupunture & Accupressure', NULL, 1, '0'),
(291, 'Doctors - Anaesthesiologist', NULL, 1, '0'),
(292, 'Doctors - Ayurveda', NULL, 1, '0'),
(293, 'Doctors - Cardiologist', NULL, 1, '0'),
(294, 'Doctors - Child Specialist', NULL, 1, '0'),
(295, 'Doctors - Dentist', NULL, 1, '0'),
(296, 'Doctors - Diabetologist', NULL, 1, '0'),
(297, 'Doctors - Ent', NULL, 1, '0'),
(298, 'Doctors - Eye Specialist(Opthamalogist)', NULL, 1, '0'),
(299, 'Doctors - Gastro Enterologist', NULL, 1, '0'),
(300, 'Doctors - General Practitioner', NULL, 1, '0'),
(301, 'Doctors - General Surgeon', NULL, 1, '0'),
(302, 'Doctors - Homeopathy', NULL, 1, '0'),
(303, 'Doctors - Magnatotherapist', NULL, 1, '0'),
(304, 'Doctors - Neurologist', NULL, 1, '0'),
(305, 'Doctors - Obestrectician & Gynaecologist', NULL, 1, '0'),
(306, 'Doctors - Ortho (Bone)', NULL, 1, '0'),
(307, 'Doctors - Physiotheraphist', NULL, 1, '0'),
(308, 'Doctors - Piles', NULL, 1, '0'),
(309, 'Doctors - Siddha', NULL, 1, '0'),
(310, 'Doctors - Skin Specialist', NULL, 1, '0'),
(311, 'Doctors - Veterinary', NULL, 1, '0'),
(312, 'Document Writers', NULL, 1, '0'),
(313, 'Doors, Windows & Partitions', NULL, 1, '0'),
(314, 'Dress Materials', NULL, 1, '0'),
(315, 'Drilling Equipments', NULL, 1, '0'),
(316, 'Driver Service Agents', NULL, 1, '0'),
(317, 'Driving Schools', NULL, 1, '0'),
(318, 'Drum Motor', NULL, 1, '0'),
(319, 'Dry Cleaners', NULL, 1, '0'),
(320, 'Dry Fruits', NULL, 1, '0'),
(321, 'Dry Ice Dealer', NULL, 1, '0'),
(322, 'Dslr Cameras', NULL, 1, '0'),
(323, 'Dth Sales & Service', NULL, 1, '0'),
(324, 'Dtp Services', NULL, 1, '0'),
(325, 'Duplicate Key Makers', NULL, 1, '0'),
(326, 'Earth Movers', NULL, 1, '0'),
(327, 'Earth Moving Equipment Spares', NULL, 1, '0'),
(328, 'Eddy Curent Drives', NULL, 1, '0'),
(329, 'Edible Oil Stores & Food Grains', NULL, 1, '0'),
(330, 'Education', NULL, 1, '0'),
(331, 'Education Colleges', NULL, 1, '0'),
(332, 'Education Consultants', NULL, 1, '0'),
(333, 'Education Councils & Board Offices', NULL, 1, '0'),
(334, 'Education Schools', NULL, 1, '0'),
(335, 'Educational Trust', NULL, 1, '0'),
(336, 'Egg Shops', NULL, 1, '0'),
(337, 'Electrical Products - Pannel , Switch', NULL, 1, '0'),
(338, 'Electrical & Electronics Sales & Service', NULL, 1, '0'),
(339, 'Electrical Consultants & Contractors', NULL, 1, '0'),
(340, 'Electrical Contractors', NULL, 1, '0'),
(341, 'Electrical Control Pannels&Switches', NULL, 1, '0'),
(342, 'Electrical Panel Boards', NULL, 1, '0'),
(343, 'Electrical Products', NULL, 1, '0'),
(344, 'Electrical Products - Pannel Boards', NULL, 1, '0'),
(345, 'Electrical Products(Cables & Wires)', NULL, 1, '0'),
(346, 'Electrical Shops', NULL, 1, '0'),
(347, 'Electrical Sub-Stations', NULL, 1, '0'),
(348, 'Electrical Suppliers', NULL, 1, '0'),
(349, 'Electricals&Rewindings', NULL, 1, '0'),
(350, 'Electricians', NULL, 1, '0'),
(351, 'Electronic Accessories', NULL, 1, '0'),
(352, 'Electronic Components', NULL, 1, '0'),
(353, 'Electronic Display Boards Manufacturer', NULL, 1, '0'),
(354, 'Electronic Weighing Scale Dealers', NULL, 1, '0'),
(355, 'Electronics', NULL, 1, '0'),
(356, 'Electronics Sales&Service', NULL, 1, '0'),
(357, 'Electronics Spares Sales', NULL, 1, '0'),
(358, 'Electronics&Home Appliances', NULL, 1, '0'),
(359, 'Elevators', NULL, 1, '0'),
(360, 'Email Marketing', NULL, 1, '0'),
(361, 'Embroidery Works', NULL, 1, '0'),
(362, 'Emergency Services', NULL, 1, '0'),
(363, 'Emission Testing Centre', NULL, 1, '0'),
(364, 'Engineering & Job Works', NULL, 1, '0'),
(365, 'Engineering - Industry', NULL, 1, '0'),
(366, 'Engineering & Fabrication', NULL, 1, '0'),
(367, 'Engineering & Job Works', NULL, 1, '0'),
(368, 'Engineering & Tooling', NULL, 1, '0'),
(369, 'Engineering Colleges', NULL, 1, '0'),
(370, 'Engineering Components', NULL, 1, '0'),
(371, 'Entrance Exams Coaching Centres', NULL, 1, '0'),
(372, 'Event Management', NULL, 1, '0'),
(373, 'Event Organizers', NULL, 1, '0'),
(374, 'Event Venues', NULL, 1, '0'),
(375, 'Events Catering Services', NULL, 1, '0'),
(376, 'Eye Hospitals', NULL, 1, '0'),
(377, 'Eyeglasses', NULL, 1, '0'),
(378, 'Fabrication', NULL, 1, '0'),
(379, 'Fabrication - Industries Rd.,Hsr', NULL, 1, '0'),
(380, 'Fabrication & Engineering', NULL, 1, '0'),
(381, 'Fabrication & Job Works', NULL, 1, '0'),
(382, 'Fabrication & Welding Works', NULL, 1, '0'),
(383, 'False Ceiling', NULL, 1, '0'),
(384, 'Family Clubs', NULL, 1, '0'),
(385, 'Family Counselling', NULL, 1, '0'),
(386, 'Fancy Stores Decoration &Gift Palace', NULL, 1, '0'),
(387, 'Farm Houses', NULL, 1, '0'),
(388, 'Fashion Designers', NULL, 1, '0'),
(389, 'Fashion Designing Training Institutes', NULL, 1, '0'),
(390, 'Fertility & Infertility Clinics', NULL, 1, '0'),
(391, 'Fertilizer & Soil', NULL, 1, '0'),
(392, 'Fibre Glass & Plastic Fabrication', NULL, 1, '0'),
(393, 'Film And Television Institute Of India', NULL, 1, '0'),
(394, 'Finance & Finanacial Institutions', NULL, 1, '0'),
(395, 'Financial Advisors', NULL, 1, '0'),
(396, 'Financial Planner', NULL, 1, '0'),
(397, 'Financial Services', NULL, 1, '0'),
(398, 'Fine Arts', NULL, 1, '0'),
(399, 'Fine Dining', NULL, 1, '0'),
(400, 'Finished Leather & Leather Shoes', NULL, 1, '0'),
(401, 'Fire Alarms', NULL, 1, '0'),
(402, 'Fire And Safety Course Training', NULL, 1, '0'),
(403, 'Fire Extinguishers', NULL, 1, '0'),
(404, 'Fire Safety Equipments', NULL, 1, '0'),
(405, 'Fire Stations', NULL, 1, '0'),
(406, 'Fish & Sea Food Shops', NULL, 1, '0'),
(407, 'Fitness Centres', NULL, 1, '0'),
(408, 'Flex Printing Services', NULL, 1, '0'),
(409, 'Flooring', NULL, 1, '0'),
(410, 'Flooring Installations', NULL, 1, '0'),
(411, 'Flooring Tools & Materials', NULL, 1, '0'),
(412, 'Floriculture', NULL, 1, '0'),
(413, 'Florists', NULL, 1, '0'),
(414, 'Flower Decorations', NULL, 1, '0'),
(415, 'Foam Products', NULL, 1, '0'),
(416, 'Food & Beverages', NULL, 1, '0'),
(417, 'Food Courts', NULL, 1, '0'),
(418, 'Food Machinery Manufacturer', NULL, 1, '0'),
(419, 'Food Processing Equipment Manufacturer', NULL, 1, '0'),
(420, 'Food Stores', NULL, 1, '0'),
(421, 'Foot Wears & Shoe Marts', NULL, 1, '0'),
(422, 'Foreign Exchange', NULL, 1, '0'),
(423, 'Forgings', NULL, 1, '0'),
(424, 'Forklift Service', NULL, 1, '0'),
(425, 'Four Wheeler Sales&Services', NULL, 1, '0'),
(426, 'Four Wheeler Stand', NULL, 1, '0'),
(427, 'Frame Works', NULL, 1, '0'),
(428, 'Freezer Box', NULL, 1, '0'),
(429, 'Fruit Juice Processing Machine Manufacture', NULL, 1, '0'),
(430, 'Fruits', NULL, 1, '0'),
(431, 'Function Halls', NULL, 1, '0'),
(432, 'Funeral Materials', NULL, 1, '0'),
(433, 'Furnace & Heat Treament', NULL, 1, '0'),
(434, 'Furniture', NULL, 1, '0'),
(435, 'Furniture Marts (Plastic,Wooden & Steel)', NULL, 1, '0'),
(436, 'Furniture On Hire', NULL, 1, '0'),
(437, 'Furniture Storage', NULL, 1, '0'),
(438, 'Gaming Centres', NULL, 1, '0'),
(439, 'Gardening Tools', NULL, 1, '0'),
(440, 'Garments', NULL, 1, '0'),
(441, 'Gas Bottlers', NULL, 1, '0'),
(442, 'Gas Candles & Fillings', NULL, 1, '0'),
(443, 'Gas Dealers ( Domestic )', NULL, 1, '0'),
(444, 'Gas Dealers (Commercial )', NULL, 1, '0'),
(445, 'Gas Stations', NULL, 1, '0'),
(446, 'Gas Stove Works', NULL, 1, '0'),
(447, 'Gas Water Geyser Sales & Service', NULL, 1, '0'),
(448, 'Gears & Sprockets', NULL, 1, '0'),
(449, 'Gemological Institute Of India', NULL, 1, '0'),
(450, 'Gems & Pearls', NULL, 1, '0'),
(451, 'General Merchants', NULL, 1, '0'),
(452, 'General Merchants - Cosmetics', NULL, 1, '0'),
(453, 'General Pharmacies', NULL, 1, '0'),
(454, 'Generator Suppliers,Spares & Service Centres', NULL, 1, '0'),
(455, 'Genset Sales & Service', NULL, 1, '0'),
(456, 'Ghee', NULL, 1, '0'),
(457, 'Ghee & Milk Products', NULL, 1, '0'),
(458, 'Gi Pipe Dealer', NULL, 1, '0'),
(459, 'Gifts And Novelties', NULL, 1, '0'),
(460, 'Glass & Ply Woods', NULL, 1, '0'),
(461, 'Glasswares', NULL, 1, '0'),
(462, 'Goldsmiths', NULL, 1, '0'),
(463, 'Government Hospitals', NULL, 1, '0'),
(464, 'Government Offices', NULL, 1, '0'),
(465, 'Govt.Approved Herbal Medicines', NULL, 1, '0'),
(466, 'Granite Surface Plates', NULL, 1, '0'),
(467, 'Granites', NULL, 1, '0'),
(468, 'Graphic Designers', NULL, 1, '0'),
(469, 'Gre & Toefl Coaching Centres', NULL, 1, '0'),
(470, 'Grinding Tools', NULL, 1, '0'),
(471, 'Grinding Wheel', NULL, 1, '0'),
(472, 'Groceries', NULL, 1, '0'),
(473, 'Guest Houses', NULL, 1, '0'),
(474, 'Gunny & Plastic Bags Merchant', NULL, 1, '0'),
(475, 'Gunny Merchants', NULL, 1, '0'),
(476, 'Gyeser/Water Heater Repair', NULL, 1, '0'),
(477, 'Gym & Health Clubs', NULL, 1, '0'),
(478, 'Gymnasium Equipments', NULL, 1, '0'),
(479, 'Hair Fall Treatments', NULL, 1, '0'),
(480, 'Hair Stylists', NULL, 1, '0'),
(481, 'Hair Transplantation', NULL, 1, '0'),
(482, 'Hair Treatments', NULL, 1, '0'),
(483, 'Hall Decorations', NULL, 1, '0'),
(484, 'Handicraft Items', NULL, 1, '0'),
(485, 'Handlooms', NULL, 1, '0'),
(486, 'Hard Wares & Electricals', NULL, 1, '0'),
(487, 'Hardware And Network Training Institutes', NULL, 1, '0'),
(488, 'Hardware And Networking', NULL, 1, '0'),
(489, 'Hardware Stores', NULL, 1, '0'),
(490, 'Hardware Tools', NULL, 1, '0'),
(491, 'Hardwares & Paints', NULL, 1, '0'),
(492, 'Hardwares & Tools', NULL, 1, '0'),
(493, 'Hardwood Flooring', NULL, 1, '0'),
(494, 'Hatcheries, Poultry Marketing & Sales', NULL, 1, '0'),
(495, 'Hd Cameras', NULL, 1, '0'),
(496, 'Health', NULL, 1, '0'),
(497, 'Health - Thermal Accupressure', NULL, 1, '0'),
(498, 'Health Clinic', NULL, 1, '0'),
(499, 'Health Clubs', NULL, 1, '0'),
(500, 'Health Insurance', NULL, 1, '0'),
(501, 'Heat Treatment&Machining', NULL, 1, '0'),
(502, 'Heavy Commercial Vechicles', NULL, 1, '0'),
(503, 'Heavy Fabrication', NULL, 1, '0'),
(504, 'Heavy Vehicle Dealers', NULL, 1, '0'),
(505, 'Helmet Dealers', NULL, 1, '0'),
(506, 'Home Appliances', NULL, 1, '0'),
(507, 'Home Builders', NULL, 1, '0'),
(508, 'Home Delivery Restaurants', NULL, 1, '0'),
(509, 'Home Furniture', NULL, 1, '0'),
(510, 'Home Needs', NULL, 1, '0'),
(511, 'Home Services', NULL, 1, '0'),
(512, 'Home Theater Systems', NULL, 1, '0'),
(513, 'Homeopathy Clinics', NULL, 1, '0'),
(514, 'Homeopathy Medicines', NULL, 1, '0'),
(515, 'Horti Culture', NULL, 1, '0'),
(516, 'Hosiery Store', NULL, 1, '0'),
(517, 'Hospitals - Diabetes', NULL, 1, '0'),
(518, 'Hospitals & Nursing Homes', NULL, 1, '0'),
(519, 'Hot Chips', NULL, 1, '0'),
(520, 'Hotels & Restaurants', NULL, 1, '0'),
(521, 'House Keeping Materials', NULL, 1, '0'),
(522, 'House Painters', NULL, 1, '0'),
(523, 'Housekeeping Services', NULL, 1, '0'),
(524, 'Housing & Land Developers', NULL, 1, '0'),
(525, 'Housing Loans', NULL, 1, '0'),
(526, 'Hr Consultancies', NULL, 1, '0'),
(527, 'Hydraulic & Pulley Equipment Dealers', NULL, 1, '0'),
(528, 'Hydraulic Cylinders & Pumps', NULL, 1, '0'),
(529, 'Hydraulics & Pneumatics', NULL, 1, '0'),
(530, 'Hypermarkets', NULL, 1, '1'),
(531, 'I.T.I', NULL, 1, '0'),
(532, 'Ice Cream & Dessert Parlors', NULL, 1, '0'),
(533, 'Income Tax Offices', NULL, 1, '0'),
(534, 'Induction Stove', NULL, 1, '0'),
(535, 'Industrial Association', NULL, 1, '0'),
(536, 'Industrial Automation', NULL, 1, '0'),
(537, 'Industrial Bearing Dealers', NULL, 1, '0'),
(538, 'Industrial Belt Dealers', NULL, 1, '0'),
(539, 'Industrial Burner Dealers', NULL, 1, '0'),
(540, 'Industrial Chemical Dealers', NULL, 1, '0'),
(541, 'Industrial Electronic Components Dealers', NULL, 1, '0'),
(542, 'Industrial Equipments', NULL, 1, '0'),
(543, 'Industrial Fan Dealers', NULL, 1, '0'),
(544, 'Industrial Fire Extinguisher Dealers', NULL, 1, '0'),
(545, 'Industrial Machine Dealers', NULL, 1, '0'),
(546, 'Industrial Needs', NULL, 1, '0'),
(547, 'Industrial Safety Equipment Dealers', NULL, 1, '0'),
(548, 'Industrial Services', NULL, 1, '0'),
(549, 'Industrial Spring Dealers', NULL, 1, '0'),
(550, 'Industrial Suppliers - All', NULL, 1, '0'),
(551, 'Industrial Training', NULL, 1, '0'),
(552, 'Industrial Trolleys Manufacturer', NULL, 1, '0'),
(553, 'Industries', NULL, 1, '0'),
(554, 'Injectable Medicines', NULL, 1, '0'),
(555, 'Instrument Service Centres', NULL, 1, '0'),
(556, 'Insurance Agents', NULL, 1, '0'),
(557, 'Insurance Offices', NULL, 1, '0'),
(558, 'Interior Designers', NULL, 1, '0'),
(559, 'Internet Browsing Centres', NULL, 1, '0'),
(560, 'Internet Service Providers', NULL, 1, '0'),
(561, 'Inverters', NULL, 1, '0'),
(562, 'Investment&Tax Savings Consultants', NULL, 1, '0'),
(563, 'Iron & Steels', NULL, 1, '0'),
(564, 'Jewellery Box Manufacturers', NULL, 1, '0'),
(565, 'Jewellery Marts', NULL, 1, '0'),
(566, 'Job Works, Turning, Tool & Die Making Etc.', NULL, 1, '0'),
(567, 'Jop Works And Spray Paintings', NULL, 1, '0'),
(568, 'Kalyana Mandapam', NULL, 1, '0'),
(569, 'Karate', NULL, 1, '0'),
(570, 'Khadi Shops', NULL, 1, '0'),
(571, 'Kids Play Homes', NULL, 1, '0'),
(572, 'Kitchen & Dining', NULL, 1, '0'),
(573, 'L.I.C Development Officers', NULL, 1, '0'),
(574, 'Laboratories', NULL, 1, '0'),
(575, 'Labour Contractors & House Keeping', NULL, 1, '0'),
(576, 'Ladies Hostels', NULL, 1, '0'),
(577, 'Land Scaping Designer & Maintenance', NULL, 1, '0'),
(578, 'Landscaping Lawn & Gardening', NULL, 1, '0'),
(579, 'Language Training Institutes', NULL, 1, '0'),
(580, 'Laptops', NULL, 1, '0'),
(581, 'Laundry Services', NULL, 1, '0'),
(582, 'Leather Products', NULL, 1, '0'),
(583, 'Leather Shoes', NULL, 1, '0'),
(584, 'Legal & Financial Services', NULL, 1, '0'),
(585, 'Legal Services', NULL, 1, '0'),
(586, 'Libraries', NULL, 1, '0'),
(587, 'Load Body Manufacturers', NULL, 1, '0'),
(588, 'Loan Agents', NULL, 1, '0'),
(589, 'Lodges', NULL, 1, '0'),
(590, 'M.L.A', NULL, 1, '0'),
(591, 'Main Frames & Mufflers', NULL, 1, '0'),
(592, 'Man Power Suppliers,Labour Contract', NULL, 1, '0'),
(593, 'Management Development Centre', NULL, 1, '0'),
(594, 'Maps', NULL, 1, '0'),
(595, 'Marriage ,Conference & Reception Halls', NULL, 1, '0'),
(596, 'Marriage Bureaus', NULL, 1, '0'),
(597, 'Material Handling Equipments', NULL, 1, '0'),
(598, 'Matresses & Pillows', NULL, 1, '0'),
(599, 'Matrimonial Centres', NULL, 1, '0'),
(600, 'Meat Industry', NULL, 1, '0'),
(601, 'Meat,Mutton & Poultry Shops', NULL, 1, '0'),
(602, 'Media Advertising', NULL, 1, '0'),
(603, 'Medical Colleges', NULL, 1, '0'),
(604, 'Medical Equipments', NULL, 1, '0'),
(605, 'Medical Shops', NULL, 1, '0'),
(606, 'Meditation Centres', NULL, 1, '0'),
(607, 'Mehandi Artists', NULL, 1, '0'),
(608, 'Mens Hostels', NULL, 1, '0'),
(609, 'Mesh Dealers', NULL, 1, '0'),
(610, 'Metal Castings', NULL, 1, '0'),
(611, 'Metal Finishers', NULL, 1, '0'),
(612, 'Metal Industries', NULL, 1, '0'),
(613, 'Metal Sheets', NULL, 1, '0'),
(614, 'Milk ,Suppliers , Depots & Products', NULL, 1, '0'),
(615, 'Mineral Water Suppliers', NULL, 1, '0'),
(616, 'Mixie Motors', NULL, 1, '0'),
(617, 'Mobile Phones', NULL, 1, '0'),
(618, 'Mobile Repairs', NULL, 1, '0'),
(619, 'Mobile Sales & Service', NULL, 1, '0'),
(620, 'Modular Furniture', NULL, 1, '0'),
(621, 'Modular Kitchen Dealers', NULL, 1, '0'),
(622, 'Money Transfer Agencies', NULL, 1, '0'),
(623, 'Montessori Training Institutes', NULL, 1, '0'),
(624, 'Mosaic Tiles, Sanitary, Granites & Marble', NULL, 1, '0'),
(625, 'Mosques', NULL, 1, '0'),
(626, 'Mosquito Coils', NULL, 1, '0'),
(627, 'Motor Driving Schools', NULL, 1, '0'),
(628, 'Motors & Diesel Engine Works', NULL, 1, '0'),
(629, 'Motors, Pumpsets, Pipes & Fittings', NULL, 1, '0'),
(630, 'Mould Dies Manufacturer', NULL, 1, '0'),
(631, 'Moving Media Ads', NULL, 1, '0'),
(632, 'Ms Pipe Dealer', NULL, 1, '0'),
(633, 'Multispecialty Hospitals', NULL, 1, '0'),
(634, 'Museums', NULL, 1, '0'),
(635, 'Music Academies', NULL, 1, '0'),
(636, 'Musical Instruments', NULL, 1, '0'),
(637, 'Mutton Shops', NULL, 1, '0'),
(638, 'Nature Cure Centers', NULL, 1, '0'),
(639, 'Naturopathy', NULL, 1, '0'),
(640, 'Ndt Training Centre', NULL, 1, '0'),
(641, 'Network Securities', NULL, 1, '0'),
(642, 'Networking Devices', NULL, 1, '0'),
(643, 'News Paper Agents', NULL, 1, '0'),
(644, 'Newspaper Ads', NULL, 1, '0'),
(645, 'Ngos & Social Service Organisations', NULL, 1, '0'),
(646, 'Number Plate Manufacturers', NULL, 1, '0'),
(647, 'Numerology', NULL, 1, '0'),
(648, 'Nursery Farms & Plants', NULL, 1, '0'),
(649, 'Office Furniture', NULL, 1, '0'),
(650, 'Offices', NULL, 1, '0'),
(651, 'Offset Printers', NULL, 1, '0'),
(652, 'Old Age Homes', NULL, 1, '0'),
(653, 'Optics & Eyewear', NULL, 1, '0'),
(654, 'Orchestra', NULL, 1, '0'),
(655, 'Organ Donation Centres', NULL, 1, '0'),
(656, 'Orphanages & Shelters', NULL, 1, '0'),
(657, 'Outdoor Advertising', NULL, 1, '0'),
(658, 'Overseas Education Consultants', NULL, 1, '0'),
(659, 'Oxygen Gas Dealers', NULL, 1, '0'),
(660, 'Packaging & Corrugated Boxes', NULL, 1, '0'),
(661, 'Packaging Adhesives', NULL, 1, '0'),
(662, 'Packaging Materials', NULL, 1, '0'),
(663, 'Packaging Tours', NULL, 1, '0'),
(664, 'Packers And Movers', NULL, 1, '0'),
(665, 'Packing Machine Manufacturers', NULL, 1, '0'),
(666, 'Painters', NULL, 1, '0'),
(667, 'Painting Suppliers', NULL, 1, '0'),
(668, 'Pan Shops', NULL, 1, '0'),
(669, 'Pancards', NULL, 1, '0'),
(670, 'Paper Gaskets', NULL, 1, '0'),
(671, 'Paper Carry Bags', NULL, 1, '0'),
(672, 'Paper Rolls Manufacturers', NULL, 1, '0'),
(673, 'Paper Stores', NULL, 1, '0'),
(674, 'Parcel Services', NULL, 1, '0'),
(675, 'Parks', NULL, 1, '0'),
(676, 'Party Halls', NULL, 1, '0'),
(677, 'Passport & Travel Agents', NULL, 1, '0'),
(678, 'Passport Offices', NULL, 1, '0'),
(679, 'Pattern Works', NULL, 1, '0'),
(680, 'Pawn Brokers', NULL, 1, '0'),
(681, 'Pedicure & Manicure', NULL, 1, '0'),
(682, 'Perfumes', NULL, 1, '0'),
(683, 'Personality Development Training Institutes', NULL, 1, '0'),
(684, 'Pest Control Services', NULL, 1, '0'),
(685, 'Pet Shops', NULL, 1, '0'),
(686, 'Petrol Bunks', NULL, 1, '0'),
(687, 'Pets', NULL, 1, '0'),
(688, 'Pharamaceuticals', NULL, 1, '0'),
(689, 'Pharmaceutical ( Drugs ) Lab', NULL, 1, '0'),
(690, 'Pharmaceutical Companies', NULL, 1, '0'),
(691, 'Pharmaceutical Distributors', NULL, 1, '0'),
(692, 'Pharmaceutical Packaging Material Dealers', NULL, 1, '0'),
(693, 'Photo & Video Studios,Photographers', NULL, 1, '0'),
(694, 'Photo Frames', NULL, 1, '0'),
(695, 'Physiotherapist', NULL, 1, '0'),
(696, 'Physiotherapy Clinics', NULL, 1, '0'),
(697, 'Piercing', NULL, 1, '0'),
(698, 'Pillows & Beds', NULL, 1, '0'),
(699, 'Pipes & Pipe Fittings', NULL, 1, '0'),
(700, 'Pizza Restaurants', NULL, 1, '0'),
(701, 'Placement & Hrd Consultants', NULL, 1, '0'),
(702, 'Plantain Leaf & Banana Merchants', NULL, 1, '0'),
(703, 'Plastic & Disposable Items', NULL, 1, '0'),
(704, 'Plastic Components', NULL, 1, '0'),
(705, 'Plastic Components - Industries', NULL, 1, '0'),
(706, 'Plastic Covers & Carry Bags', NULL, 1, '0'),
(707, 'Plastic Covers And Bags', NULL, 1, '0'),
(708, 'Plastic Injection Moulding Machine Dealer', NULL, 1, '0'),
(709, 'Plastic Office Stationery', NULL, 1, '0'),
(710, 'Plastic Products', NULL, 1, '0'),
(711, 'Plastic Products Manufacturers', NULL, 1, '0'),
(712, 'Plastic Raw Materials', NULL, 1, '0'),
(713, 'Plastic Reprocessing', NULL, 1, '0'),
(714, 'Plastic Tarpaulins', NULL, 1, '0'),
(715, 'Play Schools', NULL, 1, '0'),
(716, 'Playground Equipments', NULL, 1, '0'),
(717, 'Playgrounds', NULL, 1, '0'),
(718, 'Plumbers', NULL, 1, '0'),
(719, 'Plumbing', NULL, 1, '0'),
(720, 'Plywood & Laminates', NULL, 1, '0'),
(721, 'Police Stations', NULL, 1, '0'),
(722, 'Polishing & Buffing', NULL, 1, '0'),
(723, 'Political Party Offices', NULL, 1, '0'),
(724, 'Pollution Control Equipments', NULL, 1, '0'),
(725, 'Polyster Films & Capacitor Elements', NULL, 1, '0'),
(726, 'Polyster Films & Capacitor Elements - Industries', NULL, 1, '0'),
(727, 'Polytechnic Colleges', NULL, 1, '0'),
(728, 'Pooja Stores', NULL, 1, '0'),
(729, 'Post Offices', NULL, 1, '0'),
(730, 'Poultry Farm Feeds', NULL, 1, '0'),
(731, 'Powder Coating & Paintings', NULL, 1, '0'),
(732, 'Power Brake', NULL, 1, '0'),
(733, 'Power Generator Suppliers', NULL, 1, '0'),
(734, 'Power Stations', NULL, 1, '0'),
(735, 'Power Tools Dealers', NULL, 1, '0'),
(736, 'Precasting', NULL, 1, '0'),
(737, 'Press & Press Components', NULL, 1, '0'),
(738, 'Press Components & Press Products', NULL, 1, '0'),
(739, 'Press Reporters', NULL, 1, '0'),
(740, 'Pressure Cookers&Pans', NULL, 1, '0'),
(741, 'Printed Circuit Board Dealers', NULL, 1, '0'),
(742, 'Printer Catridge Refilling', NULL, 1, '0'),
(743, 'Printing & Stationaries', NULL, 1, '0'),
(744, 'Printing Inks', NULL, 1, '0'),
(745, 'Printing Machines', NULL, 1, '0'),
(746, 'Printing Materials', NULL, 1, '0'),
(747, 'Printing Press', NULL, 1, '0'),
(748, 'Progitham & Sasthrigal', NULL, 1, '0'),
(749, 'Property Consultants', NULL, 1, '0'),
(750, 'Property Dealers', NULL, 1, '0'),
(751, 'Providers Of Comprehensive Corrosion Management So', NULL, 1, '0'),
(752, 'Provision & Departmental Stores', NULL, 1, '0'),
(753, 'Public Safety Offices', NULL, 1, '0'),
(754, 'Puffed Rice', NULL, 1, '0'),
(755, 'Pumps & Controllers', NULL, 1, '0'),
(756, 'Puncture Shops', NULL, 1, '0'),
(757, 'Puttur Bone Setter', NULL, 1, '0'),
(758, 'R.T.O Office', NULL, 1, '0'),
(759, 'Radiator Sales & Service', NULL, 1, '0'),
(760, 'Railway Stations', NULL, 1, '0'),
(761, 'Ready Made Garments', NULL, 1, '0'),
(762, 'Ready Mix Concrete', NULL, 1, '0'),
(763, 'Real Estate', NULL, 1, '0'),
(764, 'Real Estate Consultants, Agents', NULL, 1, '0'),
(765, 'Real Estate Developers', NULL, 1, '0'),
(766, 'Recording Studios', NULL, 1, '0'),
(767, 'Refrigerator Repair', NULL, 1, '0'),
(768, 'Refrigerators', NULL, 1, '0'),
(769, 'Registry Offices', NULL, 1, '0'),
(770, 'Rehabilitation Centres', NULL, 1, '0'),
(771, 'Relays&Devices', NULL, 1, '0'),
(772, 'Research Institutes', NULL, 1, '0'),
(773, 'Resorts', NULL, 1, '0'),
(774, 'Restaurants', NULL, 1, '0'),
(775, 'Rice Merchants & Food Grains', NULL, 1, '0'),
(776, 'Rings & Ring Travellers', NULL, 1, '0'),
(777, 'Ro System ( Domestic & Commercial)', NULL, 1, '0'),
(778, 'Ro Water Purifier', NULL, 1, '0'),
(779, 'Road Cargo Agents', NULL, 1, '0'),
(780, 'Robotics Training Institutes', NULL, 1, '0'),
(781, 'Roofing Sheets', NULL, 1, '0'),
(782, 'Rto Office', NULL, 1, '0'),
(783, 'Rubber Lining & Rubber Products', NULL, 1, '0'),
(784, 'Rubber Lining Products', NULL, 1, '0'),
(785, 'Rubber Moulded Components', NULL, 1, '0'),
(786, 'Rubber Oil Seals Dealer', NULL, 1, '0'),
(787, 'Rubber Product Dealer', NULL, 1, '0'),
(788, 'Rubber Product Manufacturers', NULL, 1, '0'),
(789, 'Rubber Products', NULL, 1, '0'),
(790, 'Rubber Stamps', NULL, 1, '0'),
(791, 'Safety Shoes', NULL, 1, '0'),
(792, 'Safety, Banian &Cotton Wastes,Gloves Suppliers', NULL, 1, '0'),
(793, 'Sanitary Items', NULL, 1, '0'),
(794, 'Sanitaryware & Bathroom Accessories', NULL, 1, '0'),
(795, 'Saw Mill & Timbers', NULL, 1, '0'),
(796, 'Saw Mill Machineries & Accessories', NULL, 1, '0'),
(797, 'School For Mentally Challenged', NULL, 1, '0'),
(798, 'Schools - Cbsc', NULL, 1, '0'),
(799, 'Schools - State Boards', NULL, 1, '0'),
(800, 'Scientific Glass Instruments', NULL, 1, '0'),
(801, 'Scrap Dealers', NULL, 1, '0'),
(802, 'Screen Printers', NULL, 1, '0'),
(803, 'Sculptures', NULL, 1, '0'),
(804, 'Sea Cargo Agents', NULL, 1, '0'),
(805, 'Seat', NULL, 1, '0'),
(806, 'Seat Cover & Rexine Works', NULL, 1, '0'),
(807, 'Security & Detective Agencies,Services', NULL, 1, '0'),
(808, 'Security Systems', NULL, 1, '0'),
(809, 'Senior Citizen Home', NULL, 1, '0'),
(810, 'Septic Tank Cleaning', NULL, 1, '0'),
(811, 'Serviced Apartments', NULL, 1, '0'),
(812, 'Services - Domestic', NULL, 1, '0'),
(813, 'Sewing Machine Dealers', NULL, 1, '0'),
(814, 'Share Brokers,Consultants & Online Trading', NULL, 1, '0'),
(815, 'Sheet Shearing & Bending', NULL, 1, '0'),
(816, 'Shields & Momentos & Trophies', NULL, 1, '0'),
(817, 'Shock Absorbers', NULL, 1, '0'),
(818, 'Shopping Malls', NULL, 1, '0'),
(819, 'Sidco Office', NULL, 1, '0'),
(820, 'Sign Boards', NULL, 1, '0'),
(821, 'Sipcot Project Office', NULL, 1, '0'),
(822, 'Skin Care Clinics', NULL, 1, '0'),
(823, 'Snake Catchers', NULL, 1, '0'),
(824, 'Snooker Parlours', NULL, 1, '0'),
(825, 'Social Clubs, Institutions&Welfare Associations', NULL, 1, '0'),
(826, 'Software & It Services', NULL, 1, '0'),
(827, 'Software Training Institutes', NULL, 1, '0'),
(828, 'Solar Products Manufacturers', NULL, 1, '0'),
(829, 'Sound Systems', NULL, 1, '0'),
(830, 'Spa & Saloon', NULL, 1, '0'),
(831, 'Special Purpose Machines', NULL, 1, '0'),
(832, 'Spinning Mill', NULL, 1, '0'),
(833, 'Spiritual And Pooja Accessories', NULL, 1, '0'),
(834, 'Spoken English Institutes', NULL, 1, '0'),
(835, 'Sports Academies', NULL, 1, '0'),
(836, 'Sports Clubs', NULL, 1, '0'),
(837, 'Sports Equipments', NULL, 1, '0'),
(838, 'Sports Shops', NULL, 1, '0'),
(839, 'Springs & Wire Products', NULL, 1, '0'),
(840, 'Stadiums', NULL, 1, '0'),
(841, 'Stamp Papers', NULL, 1, '0'),
(842, 'Stationery & Paper Marts', NULL, 1, '0'),
(843, 'Steel Tubes&Cables&Strips', NULL, 1, '0'),
(844, 'Steel Wires & Ropes Manufacturers', NULL, 1, '0'),
(845, 'Steels & Cement', NULL, 1, '0'),
(846, 'Stove Sales & Services', NULL, 1, '0'),
(847, 'Study Centres', NULL, 1, '0'),
(848, 'Submersible Motors', NULL, 1, '0'),
(849, 'Submersible Pipes', NULL, 1, '0'),
(850, 'Sub-Registrar Office', NULL, 1, '0'),
(851, 'Suits And Blazers', NULL, 1, '0'),
(852, 'Sulphuric Acid Dealers', NULL, 1, '0'),
(853, 'Sunglasses', NULL, 1, '0'),
(854, 'Super Specialty Hospitals', NULL, 1, '0'),
(855, 'Surgical Instruments', NULL, 1, '0'),
(856, 'Sweet Shops', NULL, 1, '0'),
(857, 'Swimming Pools', NULL, 1, '0'),
(858, 'Switches', NULL, 1, '0'),
(859, 'Systems Services & Sales', NULL, 1, '0'),
(860, 'Tailoring Machines Sales & Services', NULL, 1, '0'),
(861, 'Tailoring Materials', NULL, 1, '0'),
(862, 'Tailoring Training Institute', NULL, 1, '0'),
(863, 'Tailors', NULL, 1, '0'),
(864, 'Tailors - Gents', NULL, 1, '0'),
(865, 'Tailors - Ladies', NULL, 1, '0'),
(866, 'Tattoo Makers', NULL, 1, '0'),
(867, 'Tea Traders', NULL, 1, '0'),
(868, 'Teacher Training', NULL, 1, '0'),
(869, 'Teaching Material Shops', NULL, 1, '0'),
(870, 'Temples', NULL, 1, '0'),
(871, 'Testing Labs ( All)', NULL, 1, '0'),
(872, 'Textile Accessories', NULL, 1, '0'),
(873, 'Textile Machinery Parts', NULL, 1, '0'),
(874, 'Textiles', NULL, 1, '0'),
(875, 'Textiles & Readymades', NULL, 1, '0'),
(876, 'Theaters', NULL, 1, '0'),
(877, 'Thermocol Dealers', NULL, 1, '0'),
(878, 'Timing Belt / V Belt / Pulley/Grease / Accessories', NULL, 1, '0'),
(879, 'Tinkering Works', NULL, 1, '0'),
(880, 'Tissue Culture', NULL, 1, '0'),
(881, 'Tmt Iron & Steel Bars', NULL, 1, '0'),
(882, 'Tours & Travels', NULL, 1, '0'),
(883, 'Toy Shops', NULL, 1, '0'),
(884, 'Tractors Sales & Spares', NULL, 1, '0'),
(885, 'Tractors Service Centres', NULL, 1, '0'),
(886, 'Trading Consultants', NULL, 1, '0'),
(887, 'Trainers And Training Institutes', NULL, 1, '0'),
(888, 'Transformer', NULL, 1, '0'),
(889, 'Transports', NULL, 1, '0'),
(890, 'Travel Agencies', NULL, 1, '0'),
(891, 'Travelling Goods & School Bags', NULL, 1, '0'),
(892, 'Travels', NULL, 1, '0'),
(893, 'Trollers & Plough Equipments', NULL, 1, '0'),
(894, 'Trolleys & Pallets', NULL, 1, '0'),
(895, 'Trophy & Momento Dealers', NULL, 1, '0'),
(896, 'Tuition Centers', NULL, 1, '0'),
(897, 'Turning Components', NULL, 1, '0'),
(898, 'Two Wheeler Manufacturers', NULL, 1, '0'),
(899, 'Two Wheelers Dealers', NULL, 1, '0'),
(900, 'Two Wheelers Seat Covers', NULL, 1, '0'),
(901, 'Two Wheelers Service Centres', NULL, 1, '0'),
(902, 'Two Wheelers Stand', NULL, 1, '0'),
(903, 'Typing Institutes', NULL, 1, '0'),
(904, 'Tyre Dealers', NULL, 1, '0'),
(905, 'Tyres Retreading', NULL, 1, '0'),
(906, 'U.P.S & Inverters', NULL, 1, '0'),
(907, 'Uniforms', NULL, 1, '0'),
(908, 'Ups & Invertors', NULL, 1, '0'),
(909, 'Upsc & Ias Coaching Centres', NULL, 1, '0'),
(910, 'Used Bike Dealers', NULL, 1, '0'),
(911, 'Used Cars Dealers', NULL, 1, '0'),
(912, 'Uv Water Purifier', NULL, 1, '0'),
(913, 'V Belt & Hoses', NULL, 1, '0'),
(914, 'Vasthu Shop (Aquarium & Pets)', NULL, 1, '0'),
(915, 'Vegetable Merchants', NULL, 1, '0'),
(916, 'Vehicle Glass Dealers', NULL, 1, '0'),
(917, 'Vessel Shops', NULL, 1, '0'),
(918, 'Vessels,Shamiyana , Furniture&Sound Systems Suppli', NULL, 1, '0'),
(919, 'Veterinary Hospitals', NULL, 1, '0'),
(920, 'Veterinary Medicines', NULL, 1, '0'),
(921, 'Video Editing Studios', NULL, 1, '0'),
(922, 'Video Gaming Centres', NULL, 1, '0'),
(923, 'Videographers', NULL, 1, '0'),
(924, 'Wall Papers', NULL, 1, '0'),
(925, 'Washing Machines', NULL, 1, '0'),
(926, 'Watch Manufacturers', NULL, 1, '0'),
(927, 'Watch Shops', NULL, 1, '0'),
(928, 'Watch Straps', NULL, 1, '0'),
(929, 'Water Cooler Suppliers', NULL, 1, '0'),
(930, 'Water Diviners', NULL, 1, '0'),
(931, 'Water Heaters', NULL, 1, '0'),
(932, 'Water Proofing And Industrial Flooring', NULL, 1, '0'),
(933, 'Water Purifier Repairs', NULL, 1, '0'),
(934, 'Water Service Station', NULL, 1, '0'),
(935, 'Water Softeners', NULL, 1, '0'),
(936, 'Water Suppliers', NULL, 1, '0'),
(937, 'Water Tank Suppliers', NULL, 1, '0'),
(938, 'Water Treatment', NULL, 1, '0'),
(939, 'Water Treatment Plants', NULL, 1, '0'),
(940, 'Water Treatment Plants Spares & Services', NULL, 1, '0'),
(941, 'Waterproofing', NULL, 1, '0'),
(942, 'Waterproofing Materials', NULL, 1, '0'),
(943, 'Weaving Machines', NULL, 1, '0'),
(944, 'Weaving Works', NULL, 1, '0'),
(945, 'Web Designing Companies', NULL, 1, '0'),
(946, 'Web Hosting Companies', NULL, 1, '0'),
(947, 'Wedding & Events', NULL, 1, '0'),
(948, 'Wedding Cards', NULL, 1, '0'),
(949, 'Wedding Cards', NULL, 1, '0'),
(950, 'Wedding Catering Services', NULL, 1, '0'),
(951, 'Wedding Decorations', NULL, 1, '0'),
(952, 'Wedding Planners', NULL, 1, '0'),
(953, 'Weigh Bridge', NULL, 1, '0'),
(954, 'Weighing Electronic Machines & Scales', NULL, 1, '0'),
(955, 'Wire Mesh Dealers', NULL, 1, '0'),
(956, 'Wire Products', NULL, 1, '0'),
(957, 'Wiring Harness', NULL, 1, '0'),
(958, 'Wiring Harness - Assembling', NULL, 1, '0'),
(959, 'Womens Hostels', NULL, 1, '0'),
(960, 'Wood Industries', NULL, 1, '0'),
(961, 'Wood Works & Carpenters', NULL, 1, '0'),
(962, 'Xerox , Fax & Job Typing Centers', NULL, 1, '0'),
(963, 'Xerox Paper Dealer', NULL, 1, '0'),
(964, 'Xerox Shops', NULL, 1, '0'),
(965, 'Yellow Pages Office', NULL, 1, '0'),
(966, 'Yellowpages Online Business Directory', NULL, 1, '0'),
(967, 'Yoga Centres', NULL, 1, '0'),
(968, 'test_11', 'category_images/1930747912sai_silk_logo.png', 1, '0'),
(969, 'Digital Networking & Marketing ', 'category_images/522005154digital-marketing-strategies.jpg', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `business_directory_image_activation`
--

CREATE TABLE `business_directory_image_activation` (
  `id` int(11) NOT NULL,
  `business_id` varchar(100) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `type` varchar(500) DEFAULT NULL,
  `status` varchar(500) NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_directory_image_activation`
--

INSERT INTO `business_directory_image_activation` (`id`, `business_id`, `name`, `type`, `status`) VALUES
(1, '21', 'logo', '1', 'active'),
(2, '21', 'gallery', '2', 'deactive'),
(3, '21', 'video', '3', 'deactive'),
(4, '22', 'logo', '1', 'deactive'),
(5, '22', 'gallery', '2', 'deactive'),
(6, '22', 'video', '3', 'active'),
(7, '23', 'logo', '1', 'deactive'),
(8, '23', 'gallery', '2', 'deactive'),
(9, '23', 'video', '3', 'deactive'),
(10, '24', 'logo', '1', 'deactive'),
(11, '24', 'gallery', '2', 'deactive'),
(12, '24', 'video', '3', 'deactive'),
(13, '25', 'logo', '1', 'deactive'),
(14, '25', 'gallery', '2', 'deactive'),
(15, '25', 'video', '3', 'deactive'),
(16, '26', 'logo', '1', 'deactive'),
(17, '26', 'gallery', '2', 'deactive'),
(18, '26', 'video', '3', 'deactive'),
(19, '27', 'logo', '1', 'deactive'),
(20, '27', 'gallery', '2', 'deactive'),
(21, '27', 'video', '3', 'deactive'),
(22, '28', 'logo', '1', 'deactive'),
(23, '28', 'gallery', '2', 'deactive'),
(24, '28', 'video', '3', 'deactive'),
(25, '29', 'logo', '1', 'deactive'),
(26, '29', 'gallery', '2', 'deactive'),
(27, '29', 'video', '3', 'deactive'),
(28, '30', 'logo', '1', 'deactive'),
(29, '30', 'gallery', '2', 'deactive'),
(30, '30', 'video', '3', 'deactive'),
(31, '31', 'logo', '1', 'deactive'),
(32, '31', 'gallery', '2', 'deactive'),
(33, '31', 'video', '3', 'deactive');

-- --------------------------------------------------------

--
-- Table structure for table `business_directory_list`
--

CREATE TABLE `business_directory_list` (
  `id` int(11) NOT NULL,
  `business_name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `person_name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `login_user_mobile_no` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `user_mobile_no` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `mobile_no` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `address` text CHARACTER SET utf8 DEFAULT NULL,
  `landmark` text CHARACTER SET utf8 DEFAULT NULL,
  `area` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `ward_no` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `city` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `location` varchar(700) CHARACTER SET utf8 DEFAULT NULL,
  `district` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `state` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `pincode` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `alternative_mobile_no` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `landline_no` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  `website` varchar(700) CHARACTER SET utf8 DEFAULT NULL,
  `working_hour` varchar(700) CHARACTER SET utf8 DEFAULT NULL,
  `category` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `logo` text CHARACTER SET utf8 DEFAULT NULL,
  `video` text CHARACTER SET utf8 DEFAULT NULL,
  `refered_by` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `refered_by_code` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `business_description` text CHARACTER SET utf8 DEFAULT NULL,
  `special_offer` text CHARACTER SET utf8 DEFAULT NULL,
  `payment_type` varchar(500) DEFAULT NULL,
  `subscription_order` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `plan` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `amount` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `subscription_start_date` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `subscription_end_date` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `reg_date` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `payment_status` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(500) CHARACTER SET utf8 NOT NULL DEFAULT 'deactive',
  `enter_by` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `type` varchar(400) CHARACTER SET utf8 NOT NULL DEFAULT '1',
  `txn_id` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `updated_by` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `updated_by_date` varchar(500) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_directory_list`
--

INSERT INTO `business_directory_list` (`id`, `business_name`, `person_name`, `login_user_mobile_no`, `user_mobile_no`, `mobile_no`, `email`, `address`, `landmark`, `area`, `ward_no`, `city`, `location`, `district`, `state`, `pincode`, `alternative_mobile_no`, `landline_no`, `website`, `working_hour`, `category`, `logo`, `video`, `refered_by`, `refered_by_code`, `business_description`, `special_offer`, `payment_type`, `subscription_order`, `plan`, `amount`, `subscription_start_date`, `subscription_end_date`, `reg_date`, `payment_status`, `status`, `enter_by`, `type`, `txn_id`, `updated_by`, `updated_by_date`) VALUES
(1, 'Ramesh Enterprises ', 'Ramesh K', '', '8838272618', '8838272618', '', '', '', '', '', '', NULL, NULL, NULL, '', '', '', '', '', '14', '', '', '', '', '<br>', '<br>', '', '', '', '', '', '', '2021/12/21', '', 'active', 'Admin', '1', NULL, NULL, NULL),
(2, 'test', 't', '', '1234567890', '1234567890', '', '', '', '', '', '', NULL, NULL, NULL, '', '', '', '', '-', '10', 'logo/1832199174photo1jpg.jpg', '', '', '', '<br>', '', '', '3', '1', '1000', '2022/01/17', '2023/01/17', '2021/12/22', '', 'active', 'Admin', '1', NULL, 'Admin', NULL),
(3, 'Ram', 'Ramu', '', '8220559784', '8220559784', '', '', '', '', '', '', NULL, NULL, NULL, '', '', '', '', '', '14', '', '', '', '', '<br>', '<br>', '', '', '', '', '', '', '2021/12/23', '', 'active', 'Admin', '1', NULL, NULL, NULL),
(4, 'JPSR Enterprisess', 'Sivaraaman N S ', '', '9842784234', '9842784234', 'jpsrhosur@gmail.com', 'JPSR Enterprisess', '', 'Shanthi Nagar West', '', 'Hosur', '1', '11', '31', '635109', '9842811558', '04344611298', 'http://www.jpsr.in', '10:00-18:00', '969', 'logo/195735074IMG-20220108-WA0014.jpg', 'videos/1564937152VID-20220119-WA0004.mp4', '', '', '<div><b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;JPSR&nbsp;</b></div><div><b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Know Your Neighbours</b></div><div><b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Hosur App &amp; Web portal</b></div><div><b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Icon of Hosur&nbsp;</b></div><div><b><br></b></div><div><b>MISSION :</b></div><div><b>To connect Hosur With The People Of Hosur in every way possible including but not limited to the latest happenings in the form of user-posted news, up-to-date business directory and fulfillment of everyone’s requirements in Hosur by featuring all types of services and products offered by the Hosur Business Community.</b></div><div><b>Know Your Neighbours aspires to make every business in Hosur easily accessible to customers regardless of the size of the Business and regardless of the nature of the Business as long as it is under legal compliance.</b></div><div><b><br></b></div><div><b>VISION :</b></div><div><b>To be that ultimate platform which connects Hosur Businesses (both B2B &amp; B2C) And Customers under a single hood.</b></div><div><b>To bring everything users would want to know about Hosur at one’s fingertips through an easy to access, transparent and user-friendly platform.</b></div><div><b style=\"font-size: 0.875rem;\"><br></b></div><div><b style=\"font-size: 0.875rem;\">Detailed Description :</b><br></div><div><b>Know Your Neighbours is a JPSR initiative!</b></div><div><b>Know Your Neighbours takes pride in bringing to the people of Hosur this most comprehensive Web Portal &amp; Web App.</b></div><div><b>You will find everything you would want to know about Hosur in a single platform. No need to waste your time making multiple searches online! Access information about Hosur under these four broad categories in a matter of a few clicks or swipes:&nbsp;</b></div><div><b style=\"font-size: 0.875rem;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Hosur Business Directory</b></div><div><b style=\"font-size: 0.875rem;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Hosur Services</b></div><div><b style=\"font-size: 0.875rem;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Hosur News&nbsp;</b></div><div><b style=\"font-size: 0.875rem;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Hosur Offers&nbsp;</b></div><div><b style=\"font-size: 0.875rem;\"><br></b></div><div><b style=\"font-size: 0.875rem;\">For Consumers</b></div><div><b>Regardless of the size of the business and regardless of the industry or niche, every business would be featured here. You can instantly find where to buy a product or whom to contact when you need a service (electrician, plumber, building contractor, etc.,) close to your home.</b></div><div><b><br></b></div><div><b>For Businesses</b></div><div><b>Know Your Neighbours Web Portal And Web App will be your new digital Visiting Card / Business Card containing all your business details. You can register and provide all your business-related information in one place. The best part is that, we will put this Visiting Card/Business Card in everyone’s pocket, which means more visibility and more business. This web portal will make customers come in search of you and you do not have to hunt for customers as we are building this portal to be the IDENTITY OF HOSUR.</b></div><div><b><br></b></div><div><b>I have registered on Know Your Neighbours, have you? What are you waiting for?&nbsp;</b></div><div><b><br></b></div><div><b>Register Now!&nbsp;</b></div><div><b>Visit www.jpsr.in</b></div>', '', 'upi', '3', '3', '6000', '2022/01/21', '2023/01/21', '2021/12/23', 'success', 'active', '2', '1', 'Txn63128212', 'Admin', '2022/01/19'),
(5, 'Ramesh K', 'Ramesh', '', '8838272618', '8838272618', '', '1st main road', '', 'Anna nagar', '', 'Chennai', NULL, '12', '31', '', '', '', '', '', '14', 'logo/622597977Logo.jpg', '', '', '', '<br>', '<br>', '', '2', '1', '', '2021/12/23', '2022/01/22', '2021/12/23', '', 'deactive', 'Admin', '1', NULL, NULL, NULL),
(6, 'Ramesh Enterprises Co', 'Ramesh K', '', '8220559784', '8220559784', 'ramesh@gmail.com', '1st main Road, Anna nagar', 'Near Saravana Bhavan', 'Anna nagar', '1', 'Madurai', '1', '12', '31', '736536', '', '', '', '10:00-18:00', '14', 'logo/1839301868sai_silk_logo.png', '', '', '', 'business Description with new content<div>Newly data added</div>', '', 'upi', '3', '2', '3300', '2021/12/27', '2022/12/27', '2021/12/27', '', 'active', 'Admin', '1', NULL, 'Admin', NULL),
(7, 'Business New Ramesh', 'Ramesh', '8838272618', '8838272618', '8838272618', 'newramesh@gmail.com', '1st main road, 2nd cross street', '', 'Anna nagar', '12', 'Madurai', '1', '2', '31', '736473', '', '', 'http://newramesh.com/', '10:00-17:00', '44', '', '', '', '', 'New Testing Description with content<div>some order of the content</div>', '', 'upi', '1', 'free', '270', '', '', '2021/12/27', '', 'active', '1', '1', NULL, '1', '2021/12/27'),
(8, 'JPSR', 'JPSR', '9715020000', '9715020000', '9715020000', 'jpsrapp3@gmail.com', '1st floor GRM COMPLEX OPP CSI CHURCH, DENKANIKOTTAI ROAD,', '', 'HOSUR', '', 'HOSUR', '1', '11', '31', '635109', '', '', '', '-', '14', '', '', '', '', '<br>', '', 'online', '1', 'free', '270', '', '', '2022/01/12', NULL, 'deactive', '5', '1', NULL, NULL, NULL),
(9, 'jpsr app', 'JPSR', '9715020000', '9715020000', '9715020000', 'jpsrapp3@gmail.com', '1st floor GRM complex ,opp CSI church,', 'opp csi church ', 'santhinagar', '', 'hosur', '1', '11', '31', '635109', '9994586474', '04344677298', '', '-', '14', '', '', '', '', '<br>', '', 'online', '1', 'free', '270', '', '', '2022/01/17', NULL, 'deactive', '5', '1', NULL, NULL, NULL),
(10, 'advertising', 'JPSR', '9715020000', '9715020000', '9715020000', 'jpsrapp3@gmail.com', '1st floor GRM Complex, opp CSI church', '', 'shanthi nagar', '', 'hosur', '1', '11', '31', '635109', '', '', '', '-', '14', '', '', '', '', '<br>', '', 'online', '1', 'free', '270', '', '', '2022/01/17', NULL, 'deactive', '5', '1', NULL, NULL, NULL),
(11, 'agriculture', 'SOUNDARYA N', '9994822082', '9994822082', '9994822082', '', '#13/10,barath nagar,hosur', '', 'dinnur', '', 'bangalore', '1', '11', '31', '635109', '9842811558', '', '', '-', '915', '', '', '', '', '<br>', '', 'upi', '1', 'free', '270', '', '', '2022/01/17', NULL, 'deactive', '7', '1', NULL, NULL, NULL),
(12, 'Ramesh Super Market', 'Ramesh', '8838272618', '8838272618', '8838272618', '', 'No 11, 1st cross street', '', 'Anna nagar', '', 'Madurai', '1', '12', '31', '863491', '8220559784', '', 'https://rameshmarket.com', '10:00-18:00', '530', 'logo/1895278268Planet9_3840x2160.jpg', 'videos/87108141478919720sample_video.mp4', 'Ramesh K', 'JPSR1221', 'new business description record<div>then new data found</div>', '', 'upi', '4', '3', '6000', '2022/01/23', '2023/01/23', '2022/01/23', NULL, 'active', '1', '1', NULL, '1', '2022/01/23');

-- --------------------------------------------------------

--
-- Table structure for table `business_payment_images`
--

CREATE TABLE `business_payment_images` (
  `id` int(11) NOT NULL,
  `business_id` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `subscription_no` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `file_path` text CHARACTER SET utf8 DEFAULT NULL,
  `subscription_type` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `amount` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `start_date` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `end_date` varchar(500) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_payment_images`
--

INSERT INTO `business_payment_images` (`id`, `business_id`, `subscription_no`, `file_path`, `subscription_type`, `amount`, `start_date`, `end_date`) VALUES
(1, '18', '1', 'logo/1724760687Welcome_Scan.jpg', '3 Months', '300', '2021/02/14', '2021/05/15'),
(2, '18', '2', '', '3 Months', '350', '2021/02/14', '2021/05/15'),
(3, '19', '1', 'logo/313048315resize-1603870556237424994croppedimage.png', '6 Months', '600', '2021/03/07', '2021/09/03'),
(4, '19', '2', '', '3 Months', '350', '2021/03/07', '2021/06/05'),
(6, '21', '1', 'logo/62999820ad_1.jpg', '3 Months', '300', '2021/03/11', '2021/06/09'),
(7, '21', '2', '', '3 Months', '350', '2021/03/11', '2021/06/09'),
(9, '21', '3', 'videos/1879711487sample_video.mp4', '3 Months', '1000', '2021/03/11', '2021/06/09'),
(11, '22', '1', 'logo/1848659951new_blink.gif', '3 Months', '300', '2021/03/29', '2021/06/27'),
(12, '22', '3', 'videos/627844106sample_video.mp4', '3 Months', '1000', '2021/03/29', '2021/06/27'),
(13, '22', '2', '', '3 Months', '350', '2021/03/29', '2021/06/27'),
(14, '24', '2', '', '3 Months', '350', '2021/04/18', '2021/07/17'),
(15, '25', '1', 'logo/358543876Hydrangeas.jpg', '3 Months', '300', '2021/04/20', '2021/07/19'),
(16, '25', '2', '', '3 Months', '350', '2021/04/20', '2021/07/19'),
(17, '26', '1', 'logo/553429521Penguins.jpg', '3 Months', '300', '2021/04/20', '2021/07/19'),
(18, '26', '2', '', '3 Months', '350', '2021/04/20', '2021/07/19'),
(19, '30', '1', 'logo/2492432581.jpg', '3 Months', '300', '2021/06/07', '2021/09/05'),
(20, '30', '2', '', '3 Months', '350', '2021/06/07', '2021/09/05');

-- --------------------------------------------------------

--
-- Table structure for table `business_payment_period`
--

CREATE TABLE `business_payment_period` (
  `id` int(11) NOT NULL,
  `period` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `premium_order` int(11) DEFAULT NULL,
  `period_days` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_payment_period`
--

INSERT INTO `business_payment_period` (`id`, `period`, `status`, `premium_order`, `period_days`) VALUES
(1, '1 Month', 2, 2, '30'),
(2, '2 Months', 2, 3, '60'),
(3, '3 Months', 1, 4, '90'),
(4, '4 Months', 2, 5, '120'),
(5, '5 Months', 2, 6, '150'),
(6, '6 Months', 1, 7, '180'),
(7, '7 Months', 2, 8, '210'),
(8, '8 Months', 2, 9, '240'),
(9, '9 Months', 1, 10, '270'),
(10, '10 Months', 2, 11, '300'),
(11, '11 Months', 2, 12, '330'),
(12, '1 Year', 1, 13, '360');

-- --------------------------------------------------------

--
-- Table structure for table `business_payment_subscription`
--

CREATE TABLE `business_payment_subscription` (
  `id` int(11) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `period` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `amount` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_payment_subscription`
--

INSERT INTO `business_payment_subscription` (`id`, `type`, `period`, `amount`, `status`) VALUES
(1, '1', '3', '300', 1),
(2, '1', '6', '600', 1),
(3, '2', '3', '350', 1),
(4, '3', '3', '1000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `business_period`
--

CREATE TABLE `business_period` (
  `id` int(11) NOT NULL,
  `period` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(500) CHARACTER SET utf8 NOT NULL DEFAULT '1',
  `premium_order` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `period_days` varchar(500) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_period`
--

INSERT INTO `business_period` (`id`, `period`, `status`, `premium_order`, `period_days`) VALUES
(1, 'PER YEAR', '1', '4', '360'),
(2, 'PER MONTH', '1', '3', '30');

-- --------------------------------------------------------

--
-- Table structure for table `business_personal_chat_details`
--

CREATE TABLE `business_personal_chat_details` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `business_id` varchar(100) DEFAULT NULL,
  `business_enter_by` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `user_code` varchar(200) DEFAULT NULL,
  `reg_date` varchar(100) DEFAULT NULL,
  `reg_time` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_personal_chat_details`
--

INSERT INTO `business_personal_chat_details` (`id`, `user_id`, `business_id`, `business_enter_by`, `message`, `user_code`, `reg_date`, `reg_time`) VALUES
(1, '1', '21', '7', 'Hi', 'JPSR20001', '2021/03/12', '09:50 PM'),
(2, '1', '21', '7', 'How are you', 'JPSR20001', '2021/03/12', '09:50 PM'),
(3, '1', '21', '7', 'How are you', 'JPSR20001', '2021/03/12', '09:51 PM'),
(4, '1', '21', '7', 'How are you', 'JPSR20001', '2021/03/12', '09:52 PM'),
(5, '1', '21', '7', 'How are you', 'JPSR20001', '2021/03/12', '09:53 PM'),
(6, '1', '21', '7', 'thank you', 'JPSR20001', '2021/03/12', '09:53 PM'),
(7, '1', '21', '7', 'gud night', 'JPSR20001', '2021/03/12', '09:53 PM'),
(8, '1', '21', '7', 'gudd', 'JPSR20001', '2021/03/12', '09:55 PM'),
(9, '1', '21', '7', 'good morning all', 'JPSR20001', '2021/03/13', '12:27 AM'),
(13, '7', '21', '7', 'good morning frineds !', 'JPSR20001', '2021/03/13', '01:01 AM');

-- --------------------------------------------------------

--
-- Table structure for table `business_plan`
--

CREATE TABLE `business_plan` (
  `id` int(11) NOT NULL,
  `plan_code` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `plan_name` varchar(800) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_plan`
--

INSERT INTO `business_plan` (`id`, `plan_code`, `plan_name`, `status`) VALUES
(1, 'CODE 06', 'CODE 01 + LOGO or DISPLAY PICTURE(DP)', '1'),
(2, 'CODE 10', 'CODE 01 + CODE 06 + 5 IMAGES', '1'),
(3, 'CODE 15', 'CODE 01 + CODE 06 + CODE 10 + VIDEO', '1'),
(4, 'CODE 19', 'CODE 01 + CODE 06 + CODE 10 + CODE 15 + 5 TIMES EDIT ', '1'),
(5, 'CODE 24', 'CODE 01 + CODE 06 + CODE 10 + CODE 15 + CODE 19 + UNLIMITED EDITING OPTION ALONG WITH ONE BANNER IN BUSINESS DIRECTORY MODULE ', '1');

-- --------------------------------------------------------

--
-- Table structure for table `business_subscription`
--

CREATE TABLE `business_subscription` (
  `id` int(11) NOT NULL,
  `period` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `plan` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `amount` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_subscription`
--

INSERT INTO `business_subscription` (`id`, `period`, `plan`, `amount`, `status`) VALUES
(1, '1', '1', '1000', '1'),
(2, '2', '1', '150', '1'),
(3, '2', '2', '360', '1'),
(4, '1', '2', '3300', '1'),
(5, '1', '3', '6000', '1'),
(6, '2', '3', '690', '1'),
(7, '1', '4', '10000', '1'),
(8, '2', '4', '1050', '1'),
(9, '1', '5', '18000', '1'),
(10, '2', '5', '1800', '1');

-- --------------------------------------------------------

--
-- Table structure for table `bus_timings`
--

CREATE TABLE `bus_timings` (
  `id` int(11) NOT NULL,
  `location` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `bus_type` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `bus_name` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `days` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `departure_place` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `departure_time` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `arrival_place` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `arrival_time` varchar(600) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_timings`
--

INSERT INTO `bus_timings` (`id`, `location`, `bus_type`, `bus_name`, `days`, `departure_place`, `departure_time`, `arrival_place`, `arrival_time`) VALUES
(2, '2', 'Private Bus', 'Amarnath', 'All days', 'Hosur Bus Stand', '5:00 AM', 'Madurai', '2:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `chat_history`
--

CREATE TABLE `chat_history` (
  `id` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `message` text CHARACTER SET utf8 DEFAULT NULL,
  `reg_date` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `reg_time` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_history`
--

INSERT INTO `chat_history` (`id`, `location`, `user_id`, `message`, `reg_date`, `reg_time`, `status`) VALUES
(1, '2', '1', 'testing message', '2020/11/22', '01:36 PM', '1'),
(2, '2', '1', 'testing 2', '2020/11/22', '02:31 PM', '1'),
(3, '2', '1', 'testing 3', '2020/11/22', '02:33 PM', '1'),
(4, '2', '1', 'testing 4', '2020/11/22', '02:34 PM', '1'),
(5, '2', '1', 'today update 06/12/2020', '2020/12/06', '06:18 PM', '1'),
(6, '2', '1', 'dbfhdbf', '2020/12/06', '06:18 PM', '1'),
(7, '2', '1', 'dfbdhfbdhf', '2020/12/06', '06:18 PM', '1'),
(8, '2', '1', 'fbdfbdf', '2020/12/06', '06:18 PM', '1'),
(9, '2', '1', 'fbdhfbdf', '2020/12/06', '06:18 PM', '1'),
(10, '2', '5', 'hi this is ', '2020/12/12', '08:33 PM', '1'),
(11, '2', '5', 'testing', '2020/12/12', '08:33 PM', '1'),
(12, '2', '5', 'checking out', '2020/12/12', '08:33 PM', '1'),
(13, '2', '5', 'checking out', '2020/12/12', '08:35 PM', '1'),
(14, '2', '6', 'rgdfh', '2020/12/17', '09:48 PM', '1'),
(15, '2', '6', 'ghgg', '2020/12/17', '09:48 PM', '1'),
(16, '2', '6', 'xbxdfhdf', '2020/12/17', '09:48 PM', '1'),
(17, '2', '6', 'god success', '2020/12/17', '09:49 PM', '1'),
(18, '2', '1', 'check it now', '2021/03/07', '10:37 PM', '1'),
(19, '2', '1', 'call back later', '2021/03/07', '10:37 PM', '1'),
(20, '2', '1', 'okay bye', '2021/03/07', '10:37 PM', '1'),
(21, '2', '1', 'bye', '2021/03/07', '10:38 PM', '1'),
(22, '2', '1', 'Good night', '2021/03/07', '10:48 PM', '1'),
(23, '2', '1', 'bye', '2021/03/07', '10:48 PM', '1'),
(24, '2', '1', 'bye', '2021/03/07', '10:50 PM', '1'),
(25, '2', '1', 'bye', '2021/03/07', '10:50 PM', '1'),
(26, '2', '1', 'Hiiii', '2021/03/07', '10:51 PM', '1'),
(27, '2', '11', 'hi ', '2021/04/19', '07:47 PM', '1'),
(28, '2', '11', 'ksdjalsjdljasldh', '2021/04/19', '07:57 PM', '1'),
(29, '2', '11', 'hi', '2021/04/19', '07:58 PM', '1'),
(30, '2', '11', 'how are you', '2021/04/19', '07:58 PM', '1');

-- --------------------------------------------------------

--
-- Table structure for table `contact_feedback_details`
--

CREATE TABLE `contact_feedback_details` (
  `id` int(11) NOT NULL,
  `f_name` varchar(500) DEFAULT NULL,
  `l_name` varchar(500) DEFAULT NULL,
  `mobile_no` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `category` varchar(500) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `reg_date` varchar(500) DEFAULT NULL,
  `reg_time` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_feedback_details`
--

INSERT INTO `contact_feedback_details` (`id`, `f_name`, `l_name`, `mobile_no`, `email`, `category`, `comments`, `reg_date`, `reg_time`) VALUES
(1, 'Ramesh Kumar', 'K', NULL, 'test@gmail.com', 'Complaints', '', '26/12/2020', '12:55 AM'),
(2, 'Ramesh Kumar', '', NULL, 'test@gmail.com', 'Ideas', '', '26/12/2020', '12:56 AM'),
(3, 'Ramesh Kumar', 'K', '8220559785', 'test@gmail.com', 'Ideas', 'testing message', '26/12/2020', '01:02 AM'),
(4, 'Ramesh Kumar', 'K', '8220559785', 'test@gmail.com', 'Ideas', 'nooooooo', '26/12/2020', '01:04 AM'),
(5, 'Ramesh Kumar', 'K', '8220559785', 'test@gmail.com', 'Ideas', 'vghv', '26/12/2020', '01:10 AM'),
(6, 'Ramesh Kumar', 'K', '8220559785', 'test@gmail.com', 'Ideas', 'datas', '26/12/2020', '01:11 AM');

-- --------------------------------------------------------

--
-- Table structure for table `contact_information`
--

CREATE TABLE `contact_information` (
  `id` int(11) NOT NULL,
  `address` text DEFAULT NULL,
  `mobile_no` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_information`
--

INSERT INTO `contact_information` (`id`, `address`, `mobile_no`, `email`) VALUES
(1, '2nd main road, CIT Colony,<div>Mylapore,</div><div>Chennai - 600004.</div>', '9876543210', 'example@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `directory_gallery_images`
--

CREATE TABLE `directory_gallery_images` (
  `id` int(11) NOT NULL,
  `business_id` varchar(400) DEFAULT NULL,
  `image_path` text DEFAULT NULL,
  `type` varchar(500) DEFAULT NULL,
  `size` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `directory_gallery_images`
--

INSERT INTO `directory_gallery_images` (`id`, `business_id`, `image_path`, `type`, `size`) VALUES
(7, '6', 'business_gallery_images/20211227010532_banner2.jpg', 'image/jpeg', '1778360'),
(8, '6', 'business_gallery_images/20211227010532_banner1.jpg', 'image/jpeg', '1268246'),
(9, '6', 'business_gallery_images/20211227010532_sai_silk_logo.png', 'image/png', '61644'),
(21, '4', 'business_gallery_images/20220119181732_2.jpg', 'image/jpeg', '775554'),
(22, '4', 'business_gallery_images/20220119181733_3.jpg', 'image/jpeg', '761455'),
(23, '4', 'business_gallery_images/20220119181733_4.jpg', 'image/jpeg', '737663'),
(24, '4', 'business_gallery_images/20220119181733_5.jpg', 'image/jpeg', '695655'),
(25, '4', 'business_gallery_images/20220119181734_6.jpg', 'image/jpeg', '707175'),
(26, '12', 'business_gallery_images/20220123165742_Sample-jpg-image-5mb (1).png', 'image/png', '4537376'),
(28, '12', 'business_gallery_images/20220123165744_apple_repair-service-expansion_iphone-repair_07072020.jpg.landing-big_2x.jpg', 'image/jpeg', '238019'),
(29, '12', 'business_gallery_images/20220123165744_advertising-concept-web.jpg', 'image/jpeg', '57355'),
(30, '12', 'business_gallery_images/20220123165744_p4_Accupuncture_NL1706_ts92028888.jpg', 'image/jpeg', '113275'),
(31, '12', 'business_gallery_images/20220123171201_digital-marketing-strategies.jpg', 'image/jpeg', '63378');

-- --------------------------------------------------------

--
-- Table structure for table `disclaimer_details`
--

CREATE TABLE `disclaimer_details` (
  `id` int(11) NOT NULL,
  `chat` text DEFAULT NULL,
  `birthday_wishes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disclaimer_details`
--

INSERT INTO `disclaimer_details` (`id`, `chat`, `birthday_wishes`) VALUES
(1, 'If you chat any unwanted messages our company not responsible', 'Birthday wishes should be sent three days before telecast');

-- --------------------------------------------------------

--
-- Table structure for table `district_list`
--

CREATE TABLE `district_list` (
  `id` int(11) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `district_name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(500) CHARACTER SET utf8 NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district_list`
--

INSERT INTO `district_list` (`id`, `state_id`, `district_name`, `status`) VALUES
(1, 31, 'Ariyalur', '1'),
(2, 31, 'Chennai', '1'),
(3, 31, 'Coimbatore', '1'),
(4, 31, 'Cuddalore', '1'),
(5, 31, 'Dharmapuri', '1'),
(6, 31, 'Dindigul', '1'),
(7, 31, 'Erode', '1'),
(8, 31, 'Kanchipuram', '1'),
(9, 31, 'Kanyakumari', '1'),
(10, 31, 'Karur', '1'),
(11, 31, 'Krishnagiri', '1'),
(12, 31, 'Madurai', '1'),
(13, 31, 'Mandapam', '1'),
(14, 31, 'Nagapattinam', '1'),
(15, 31, 'Nilgiris', '1'),
(16, 31, 'Namakkal', '1'),
(17, 31, 'Perambalur', '1'),
(18, 31, 'Pudukkottai', '1'),
(19, 31, 'Ramanathapuram', '1'),
(20, 31, 'Salem', '1'),
(21, 31, 'Sivaganga', '1'),
(22, 31, 'Thanjavur', '1'),
(23, 31, 'Thiruvallur', '1'),
(24, 31, 'Tirupur', '1'),
(25, 31, 'Tiruchirapalli', '1'),
(26, 31, 'Theni', '1'),
(27, 31, 'Tirunelveli', '1'),
(28, 31, 'Thanjavur', '1'),
(29, 31, 'Thoothukudi', '1'),
(30, 31, 'Tiruvallur', '1'),
(31, 31, 'Tiruvannamalai', '1'),
(32, 31, 'Vellore', '1'),
(33, 31, 'Villupuram', '1'),
(34, 31, 'Virudhunagar', '1');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_services`
--

CREATE TABLE `emergency_services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `contact_number` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(600) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emergency_services`
--

INSERT INTO `emergency_services` (`id`, `service_name`, `contact_number`, `status`) VALUES
(7, 'Police Station', '100', 'active'),
(8, 'Ambulance', '108', 'active'),
(9, 'Fire Station', '101', 'active'),
(10, 'test_raj', '1234567890', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `gold_list`
--

CREATE TABLE `gold_list` (
  `id` int(11) NOT NULL,
  `gold_price_18` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `gold_price_22` varchar(500) DEFAULT NULL,
  `gold_price_24` varchar(500) DEFAULT NULL,
  `silver_price` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `platinum_price` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `image_path` text CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gold_list`
--

INSERT INTO `gold_list` (`id`, `gold_price_18`, `gold_price_22`, `gold_price_24`, `silver_price`, `platinum_price`, `image_path`) VALUES
(1, '3,428', '4,190', '4,525', '69.30', '3,676', 'news_images/2139767155Banner_Image.png');

-- --------------------------------------------------------

--
-- Table structure for table `government_offices_list`
--

CREATE TABLE `government_offices_list` (
  `id` int(11) NOT NULL,
  `location` int(11) DEFAULT NULL,
  `ward_no` int(11) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `office_name` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `person_name` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `mobile_no` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `timing` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `days` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8 DEFAULT NULL,
  `office_image` text CHARACTER SET utf8 DEFAULT NULL,
  `reg_date` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(600) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `government_offices_list`
--

INSERT INTO `government_offices_list` (`id`, `location`, `ward_no`, `area`, `office_name`, `person_name`, `mobile_no`, `email`, `address`, `timing`, `days`, `description`, `office_image`, `reg_date`, `status`) VALUES
(1, 2, 1, 1, 'test 1', 'dffdfdfdfdf', '8838272618', '', ' bhnb jhbjhb', 'njkbhjbh', 'hjbhjb', 'bshdbshdbsd<div>sdbshdbsd</div><div>sdbshdbsd</div>', 'offices/1857593027banner1.jpg', '2020/11/18', 'active'),
(2, 2, 1, 1, 'testing data', 'ramesh', '8220559784', 'test@gmail.com', 'chennai', '9.30 AM to 06.00 PM', 'All Days', '', 'offices/1620910551Background.png', '2020/11/18', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `home_page_ads`
--

CREATE TABLE `home_page_ads` (
  `id` int(11) NOT NULL,
  `ads_title` varchar(700) CHARACTER SET utf8 DEFAULT NULL,
  `ads_size` varchar(700) CHARACTER SET utf8 DEFAULT NULL,
  `page` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `ads_value` varchar(500) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_page_ads`
--

INSERT INTO `home_page_ads` (`id`, `ads_title`, `ads_size`, `page`, `ads_value`) VALUES
(1, 'Banner 1', 'Width: 1350px, Height: 250px', 'Home', 'banner1'),
(2, 'Banner 2', 'Width: 1350px, Height: 250px', 'Home', 'banner2'),
(3, 'Banner 3', 'Width: 1350px, Height: 250px', 'Home', 'banner3'),
(4, 'Banner 4', 'Width: 1350px, Height: 250px', 'Home', 'banner4'),
(5, 'Banner 5', 'Width: 1350px, Height: 250px', 'Home', 'banner5'),
(6, 'Premium Business Logo 1', 'Width: 200px, Height: 80px', 'Home', 'logo1'),
(7, 'Premium Business Logo 2', 'Width: 200px, Height: 80px', 'Home', 'logo2'),
(8, 'Premium Business Logo 3', 'Width: 200px, Height: 80px', 'Home', 'logo3'),
(9, 'Premium Business Logo 4', 'Width: 200px, Height: 80px', 'Home', 'logo4'),
(10, 'Premium Business Logo 5', 'Width: 200px, Height: 80px', 'Home', 'logo5'),
(11, 'Home Services', 'Width: 950px, Height: 250px', 'Services', 'service1'),
(12, 'Business Services', 'Width: 950px, Height: 250px', 'Services', 'service2'),
(13, 'Property Management Services', 'Width: 950px, Height: 250px', 'Services', 'service3'),
(14, 'Groceries', 'Width: 950px, Height: 250px', 'Services', 'groceries'),
(15, 'Renting', 'Width: 950px, Height: 250px', 'Services', 'renting'),
(16, 'Reselling', 'Width: 950px, Height: 250px', 'Services', 'reselling'),
(17, 'Doctor Appointment', 'Width: 950px, Height: 250px', 'Services', 'doctorappointment'),
(18, 'Other Personal Services', 'Width: 950px, Height: 250px', 'Services', 'service4');

-- --------------------------------------------------------

--
-- Table structure for table `home_premium_ad`
--

CREATE TABLE `home_premium_ad` (
  `id` int(11) NOT NULL,
  `ad_1` text CHARACTER SET utf8 DEFAULT NULL,
  `ad_2` text CHARACTER SET utf8 DEFAULT NULL,
  `ad_3` text CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_premium_ad`
--

INSERT INTO `home_premium_ad` (`id`, `ad_1`, `ad_2`, `ad_3`) VALUES
(1, 'home_ads_images/1024334403premium_ad.jpg', 'home_ads_images/871144059banner1.jpg', 'home_ads_images/717589430brand_logo_03.png');

-- --------------------------------------------------------

--
-- Table structure for table `industry_offers`
--

CREATE TABLE `industry_offers` (
  `id` int(11) NOT NULL,
  `image_path` text CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industry_offers`
--

INSERT INTO `industry_offers` (`id`, `image_path`) VALUES
(1, 'offer_images/887703937hanuman.jpg'),
(2, 'offer_images/981874284utf_listing_item-06.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jpsr_business_services`
--

CREATE TABLE `jpsr_business_services` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `mobile_no` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `category_id` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `category_name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `description` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `image_path` text CHARACTER SET utf8 DEFAULT NULL,
  `audio_path` text CHARACTER SET utf8 DEFAULT NULL,
  `reg_date` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `reg_time` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(300) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jpsr_doctor_appointment`
--

CREATE TABLE `jpsr_doctor_appointment` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `mobile_no` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `category_id` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `category_name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `specialist` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `doctor_name` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `appointment_date` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `timings` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `description` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `image_path` text CHARACTER SET utf8 DEFAULT NULL,
  `audio_path` text CHARACTER SET utf8 DEFAULT NULL,
  `reg_date` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `reg_time` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(300) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jpsr_doctor_appointment`
--

INSERT INTO `jpsr_doctor_appointment` (`id`, `user_id`, `name`, `mobile_no`, `email`, `category_id`, `category_name`, `specialist`, `doctor_name`, `appointment_date`, `timings`, `address`, `description`, `image_path`, `audio_path`, `reg_date`, `reg_time`, `status`) VALUES
(1, '1', 'Ramesh Kumar', '8220559785', 'test@gmail.com', '39', 'Doctor Appointment', 'dentist ', 'Dr. Ramesh Kumar', '2021-03-27', '10:00 AM', 'chennai', 'testing details', 'service_images/599310555Background.png', 'service_images/1537057020sample_audio.mp3', '2021-03-21', '01:23 PM', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `jpsr_groceries`
--

CREATE TABLE `jpsr_groceries` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `name` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `mobile_no` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `category_id` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `category_name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `file_path` text CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8 DEFAULT NULL,
  `reg_date` varchar(500) DEFAULT NULL,
  `reg_time` varchar(500) DEFAULT NULL,
  `status` varchar(300) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jpsr_groceries`
--

INSERT INTO `jpsr_groceries` (`id`, `user_id`, `name`, `mobile_no`, `category_id`, `category_name`, `file_path`, `description`, `reg_date`, `reg_time`, `status`) VALUES
(2, '1', 'Ramesh Kumar', '8220559785', '11', 'Groceries', 'about_file/9654053Tesamm_Corrections_03jun2020.xlsx', 'testing data', '2020-12-25', '04:07 AM', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `jpsr_home_services`
--

CREATE TABLE `jpsr_home_services` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `mobile_no` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `category_id` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `category_name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `description` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `image_path` text CHARACTER SET utf8 DEFAULT NULL,
  `audio_path` text CHARACTER SET utf8 DEFAULT NULL,
  `reg_date` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `reg_time` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(300) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jpsr_home_services`
--

INSERT INTO `jpsr_home_services` (`id`, `user_id`, `name`, `mobile_no`, `email`, `category_id`, `category_name`, `address`, `description`, `image_path`, `audio_path`, `reg_date`, `reg_time`, `status`) VALUES
(2, '1', 'Ramesh Kumar', '8220559785', 'test@gmail.com', '2', 'Electrical', '1st main road', 'testing details', 'service_images/797845523scroll-top.png', 'service_images/731933202sample_audio.mp3', '2021-03-21', '12:37 PM', 'completed'),
(3, '1', 'Ramesh Kumar', '8220559785', 'test@gmail.com', '3', 'Painting', 'Chennai', 'home services', 'service_images/164708721hanuman.jpg', '', '2021-03-29', '11:55 PM', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `jpsr_other_services`
--

CREATE TABLE `jpsr_other_services` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `mobile_no` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `category_id` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `category_name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `description` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `image_path` text CHARACTER SET utf8 DEFAULT NULL,
  `audio_path` text CHARACTER SET utf8 DEFAULT NULL,
  `reg_date` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `reg_time` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(300) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jpsr_other_services`
--

INSERT INTO `jpsr_other_services` (`id`, `user_id`, `name`, `mobile_no`, `email`, `category_id`, `category_name`, `address`, `description`, `image_path`, `audio_path`, `reg_date`, `reg_time`, `status`) VALUES
(1, '1', 'Ramesh Kumar', '8220559785', 'test@gmail.com', '45', 'License', 'Koripalayam, Madurai', 'license apply details', 'service_images/2118257523Background.png', 'service_images/334704342sample_audio.mp3', '2021-03-21', '12:58 PM', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `jpsr_property_services`
--

CREATE TABLE `jpsr_property_services` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `mobile_no` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `category_id` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `category_name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `description` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `image_path` text CHARACTER SET utf8 DEFAULT NULL,
  `audio_path` text CHARACTER SET utf8 DEFAULT NULL,
  `reg_date` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `reg_time` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(300) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jpsr_property_services`
--

INSERT INTO `jpsr_property_services` (`id`, `user_id`, `name`, `mobile_no`, `email`, `category_id`, `category_name`, `address`, `description`, `image_path`, `audio_path`, `reg_date`, `reg_time`, `status`) VALUES
(1, '1', 'Ramesh Kumar', '8220559785', 'test@gmail.com', '36', 'Plan Approval', 'Mandeveli, Chennai', 'approval services', 'service_images/427581113user.png', 'service_images/1293292430sample_audio.mp3', '2021-03-21', '12:51 PM', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `jpsr_query_details`
--

CREATE TABLE `jpsr_query_details` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `mobile_no` varchar(100) DEFAULT NULL,
  `category` varchar(500) DEFAULT NULL,
  `other_category` varchar(500) DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `reg_date` varchar(100) DEFAULT NULL,
  `reg_time` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jpsr_query_details`
--

INSERT INTO `jpsr_query_details` (`id`, `user_id`, `name`, `mobile_no`, `category`, `other_category`, `feedback`, `reg_date`, `reg_time`) VALUES
(1, '1', 'Ramesh Kumar', '8220559785', 'Electrical', '', 'testing comments', '2021-03-16', '10:48 PM'),
(2, '1', 'Ramesh Kumar', '8220559785', 'Gardening', '', 'tested', '2021-03-16', '10:51 PM'),
(3, '1', 'Ramesh Kumar', '8220559785', 'Vegetables', '', 'testing comments', '2021-03-16', '10:56 PM'),
(4, '1', 'Ramesh Kumar', '8220559785', 'Others', 'test service', 'success', '2021-03-16', '11:19 PM'),
(5, NULL, 'Thamu', '9043176235', 'Electrical', '', 'electricl services', '2021-03-16', '11:22 PM'),
(6, NULL, 'pavani', '9066838657', 'Vegetables', '', 'need the prices', '2021-04-17', '12:51 PM');

-- --------------------------------------------------------

--
-- Table structure for table `jpsr_renting_services`
--

CREATE TABLE `jpsr_renting_services` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `mobile_no` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `category_id` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `category_name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `renting` varchar(700) DEFAULT NULL,
  `property_address` varchar(700) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `description` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `image_path` text CHARACTER SET utf8 DEFAULT NULL,
  `audio_path` text CHARACTER SET utf8 DEFAULT NULL,
  `reg_date` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `reg_time` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(300) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jpsr_renting_services`
--

INSERT INTO `jpsr_renting_services` (`id`, `user_id`, `name`, `mobile_no`, `email`, `category_id`, `category_name`, `renting`, `property_address`, `address`, `description`, `image_path`, `audio_path`, `reg_date`, `reg_time`, `status`) VALUES
(1, '1', 'Ramesh Kumar', '8220559785', 'test@gmail.com', '28', 'Renting', 'commercial', 'property address', 'latest address', 'test details', 'service_images/1212418832AD_Space.png', 'service_images/500578650sample_audio.mp3', '2021-03-21', '01:27 PM', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `jpsr_reselling_services`
--

CREATE TABLE `jpsr_reselling_services` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `mobile_no` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `category_id` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `category_name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `reselling` varchar(700) DEFAULT NULL,
  `property_address` varchar(700) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `description` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `image_path` text CHARACTER SET utf8 DEFAULT NULL,
  `audio_path` text CHARACTER SET utf8 DEFAULT NULL,
  `reg_date` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `reg_time` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(300) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jpsr_services`
--

CREATE TABLE `jpsr_services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(600) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jpsr_services`
--

INSERT INTO `jpsr_services` (`id`, `service_name`) VALUES
(1, 'Home Services'),
(2, 'Business Services'),
(3, 'Property Management Services'),
(4, 'Other Personal Services');

-- --------------------------------------------------------

--
-- Table structure for table `jpsr_services_category`
--

CREATE TABLE `jpsr_services_category` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `category_name` varchar(600) DEFAULT NULL,
  `status` varchar(500) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jpsr_services_category`
--

INSERT INTO `jpsr_services_category` (`id`, `service_id`, `category_name`, `status`) VALUES
(1, 1, 'Plumbing', 'active'),
(2, 1, 'Electrical', 'active'),
(3, 1, 'Painting', 'active'),
(4, 1, 'Masonry', 'active'),
(5, 1, 'Gardening', 'active'),
(6, 1, 'House Keeping', 'active'),
(7, 1, 'Pest Control', 'active'),
(8, 1, 'Carpentry', 'active'),
(9, 1, 'Packers & Movers', 'active'),
(10, 1, 'Gas Connection', 'active'),
(11, 1, 'Groceries', 'active'),
(12, 1, 'Medicine (Tablets)', 'active'),
(13, 1, 'Vegetables', 'active'),
(14, 1, 'Ration', 'active'),
(15, 1, 'Bill Payments', 'active'),
(16, 1, 'TNEB', 'active'),
(17, 1, 'Property & Water tax', 'active'),
(18, 1, 'Civil Works', 'active'),
(19, 2, 'Financial Services', 'active'),
(20, 2, 'Advertisement Services', 'active'),
(21, 2, 'Establishment & Expansion', 'active'),
(22, 2, 'Flyers', 'active'),
(23, 2, 'Auto', 'active'),
(24, 2, 'Flex', 'active'),
(25, 2, 'Iron', 'active'),
(26, 2, 'Event Arrangements', 'active'),
(27, 2, 'Others', 'active'),
(28, 3, 'Renting', 'active'),
(29, 3, 'Reselling', 'active'),
(30, 3, 'Documentation', 'active'),
(31, 3, 'Legal Opinion', 'active'),
(32, 3, 'Property Valuation', 'active'),
(33, 3, 'TNEB Name Transfer', 'active'),
(34, 3, 'Property & Water tax Name Transfer', 'active'),
(35, 3, 'Patta Name Transfer', 'active'),
(36, 3, 'Plan Approval', 'active'),
(37, 3, 'Annual Maintenance', 'active'),
(38, 3, 'Others', 'active'),
(39, 4, 'Doctor Appointment', 'active'),
(40, 4, 'Medical Lab Test', 'active'),
(41, 4, 'Pan', 'active'),
(42, 4, 'Aadhaar', 'active'),
(43, 4, 'Passport', 'active'),
(44, 4, 'Voters ID', 'active'),
(45, 4, 'License', 'active'),
(46, 4, 'Income Tax', 'active'),
(47, 4, 'Emergency Service', 'active'),
(48, 4, 'House Warming (A - Z)', 'active'),
(49, 4, 'Catering Service', 'active'),
(50, 4, 'Birthday Party', 'active'),
(51, 4, 'Marriage', 'active'),
(52, 4, 'Others', 'active'),
(53, 1, 'RAJ_SOFTWARE', 'active'),
(54, 1, 'Others', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `jpsr_videos`
--

CREATE TABLE `jpsr_videos` (
  `id` int(11) NOT NULL,
  `video_path` text DEFAULT NULL,
  `video_code` varchar(700) DEFAULT NULL,
  `status` varchar(400) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jpsr_videos`
--

INSERT INTO `jpsr_videos` (`id`, `video_path`, `video_code`, `status`) VALUES
(1, 'videos/240556252big_buck_bunny_720p_1mb.mp4', '', 'active'),
(3, '', 'https://www.youtube.com/embed/HIC3Z6QDv1s', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `login_access_details`
--

CREATE TABLE `login_access_details` (
  `id` int(11) NOT NULL,
  `access_name` varchar(500) DEFAULT NULL,
  `username` varchar(500) DEFAULT NULL,
  `password` varchar(700) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_access_details`
--

INSERT INTO `login_access_details` (`id`, `access_name`, `username`, `password`) VALUES
(1, 'Admin', 'superadmin', 'sN82ubnB1GoXpMEFmwhLpQ==');

-- --------------------------------------------------------

--
-- Table structure for table `news_category_list`
--

CREATE TABLE `news_category_list` (
  `id` int(11) NOT NULL,
  `category_name` varchar(500) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_category_list`
--

INSERT INTO `news_category_list` (`id`, `category_name`, `status`) VALUES
(1, 'Industry News', 1),
(2, 'Business News', 1),
(3, 'Social News', 1),
(4, 'Spiritual News', 1),
(5, 'Events', 1),
(6, 'Classifieds', 1),
(7, 'RAJ_MEMES', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_list`
--

CREATE TABLE `news_list` (
  `id` int(11) NOT NULL,
  `location` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `user_id` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `language` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `category` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `title` varchar(800) CHARACTER SET utf8 DEFAULT NULL,
  `image_path` text CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8 DEFAULT NULL,
  `reg_date` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `reg_time` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(200) CHARACTER SET utf8 DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_list`
--

INSERT INTO `news_list` (`id`, `location`, `user_id`, `language`, `category`, `title`, `image_path`, `description`, `reg_date`, `reg_time`, `status`) VALUES
(1, '2', '1', '1', 'type3', 'testing state news of content', 'news_images/1767243204APP_Wall_Final_(1).png', 'Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic type setting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing.\r\n\r\nLorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic type setting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing.', '2020-11-23', '10:49 PM', 'active'),
(2, '', '0', '1', 'type2', 'testing national', 'news_images/224311704user.png', 'Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic type setting, remaining essentially unchanged.', '2020-11-23', '11:20 PM', 'active'),
(3, '2', '1', '1', 'type2', 'national test message', 'news_images/1040809597APP_Wall_Final_(3)_(1).png', 'dfdbfdbfhdbfhdbfd\r\ndfjkdbfjdbfjkbdhfbdbjbcjbjcbv\r\ndfdjfjdf', '2020-12-06', '08:47 PM', 'active'),
(4, '2', '1', '1', 'type2', 'dfvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv', 'news_images/1445371405APP_Wall_Final_(1).jpg', 'bhjvjhvhj\r\nhvhjv', '2020-12-06', '08:57 PM', 'deactive'),
(5, '2', '1', '1', 'type1', 'bbb international news', 'news_images/1989964432business_logo.jpg', 'bvvhjvjhvhhhhhhhhhhhhhhhhhhh\r\nbhvgvgvhvjhvhj\r\nvvhvh', '2020-12-06', '08:57 PM', 'deactive'),
(6, '', '0', '1', 'type1', 'testing state news of content testing state news of content testing state news of content', 'news_images/70703674resize-16038707871972206374dzire.png', 'sdsdsd', '2020-12-08', '12:38 AM', 'active'),
(7, '', '0', '1', '7', 'RAJ_TODAY TRENDING', 'news_images/586989723WhatsApp_Image_2020-12-13_at_8.33.40_AM.jpeg', 'RAJ_TEST', '2020-12-13', '08:35 AM', 'active'),
(8, '', '0', '1', '7', 'RAJ_HEALTH TIP', 'news_images/1597124592WhatsApp_Image_2020-12-13_at_8.39.18_AM.jpeg', 'RAJ_HEALTH TIP', '2020-12-13', '08:40 AM', 'active'),
(9, '', '1', '1', '7', 'testing news', 'news_images/1644469294resize-1603870556237424994croppedimage.png', 'Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic type setting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing.\r\n', '2021-03-20', '10:40 PM', 'active'),
(10, '2', '1', '1', 'type2', 'national news', 'news_images/1976763705premium_ad1.jpg', 'testing news', '2021-03-29', '11:31 PM', 'active'),
(11, '2', '7', '1', '3', 'social news', 'news_images/1307328107APP_Wall_Final_(1).png', 'social news description', '2021-04-10', '11:40 PM', 'deactive'),
(12, '2', '11', '1', '5', 'Saving life\'s of Pandas', 'news_images/753884262Koala.jpg', 'The most important work to save the giant panda is to protect their habitat. Without this, pandas could only survive in captivity. To protect giant panda\'s habitat, China government has set 13 panda nature reserve areas. In the areas, farming fields have been left to grow back as forest.', '2021-04-19', '10:54 PM', 'deactive');

-- --------------------------------------------------------

--
-- Table structure for table `offers_list`
--

CREATE TABLE `offers_list` (
  `id` int(11) NOT NULL,
  `location` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `user_id` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `business_id` varchar(100) DEFAULT NULL,
  `category` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `title` varchar(800) CHARACTER SET utf8 DEFAULT NULL,
  `image_path` text CHARACTER SET utf8 DEFAULT NULL,
  `offer_description` text CHARACTER SET utf8 DEFAULT NULL,
  `amount` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `period_start_date` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `period_end_date` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `payment_type` varchar(500) DEFAULT NULL,
  `reg_date` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `reg_time` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(200) CHARACTER SET utf8 DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offers_list`
--

INSERT INTO `offers_list` (`id`, `location`, `user_id`, `business_id`, `category`, `title`, `image_path`, `offer_description`, `amount`, `period_start_date`, `period_end_date`, `payment_type`, `reg_date`, `reg_time`, `status`) VALUES
(1, '2', '1', NULL, '1', 'testing offer', 'offer_images/808421942business_logo.jpg', NULL, '50', '2021-04-15', '2021-04-21', NULL, '2020-11-22', '09:22 PM', 'active'),
(2, '', '0', NULL, '2', 'Jewell Data', 'offer_images/1403623717banner1.jpg', NULL, '50', '2020-11-22', '2020-11-28', NULL, '2020-11-22', '09:50 PM', 'active'),
(3, '2', '1', NULL, '2', 'user textiles1', 'offer_images/1789468738Background.png', NULL, '50', '2020-12-09', '2020-12-18', NULL, '2020-12-06', '06:08 PM', 'deactive'),
(4, '2', '1', NULL, '1', 'new Jewellery ads ', 'offer_images/453510599vaccant-land.png', NULL, '50', '2020-12-06', '2020-12-13', NULL, '2020-12-06', '06:14 PM', 'active'),
(5, '', '0', NULL, '7', 'TAKE-HOME', 'offer_images/2045863283raj_food.png', NULL, '50', '2020-12-13', '2020-12-21', NULL, '2020-12-13', '08:21 AM', 'active'),
(6, '2', '5', NULL, '2', 'RAJ_TRND', 'offer_images/395923755raj_trend.jpeg', NULL, '50', '2020-12-13', '2020-12-31', NULL, '2020-12-13', '08:25 AM', 'active'),
(7, '2', '1', '7', '1', 'Testing textiles', 'offer_images/1467030659view_icon.png', 'vghvhgvhgv', '50', '17--', '24--', '', '2021-03-07', '10:25 PM', 'deactive'),
(8, '2', '1', '8', '2', 'GRT Jewellery', 'offer_images/1209330983ad_1.jpg', NULL, '50', '2021-03-17', '2021-03-25', '', '2021-03-15', '11:37 PM', 'active'),
(9, '2', '1', '9', '1', 'Textiles Offers', 'offer_images/872762121hanuman.jpg', 'Special Offer trending now .. Today offersss', '50', '2021-03-19', '2021-03-26', 'online', '2021-03-19', '09:47 PM', 'active'),
(10, '', '0', '10', '1', 'textiles new admin title', 'offer_images/1733535660premium_ad1.jpg', 'testing admin offer description', '50', '2021-03-29', '2021-03-29', 'gpay', '2021-03-29', '01:12 AM', 'active'),
(11, '2', '1', '10', '2', 'new title ads jewellery', 'offer_images/20416633531051190903raj_trend.jpeg', 'new offer description offers available', '50', '2021-03-29', '2021-03-31', 'online', '2021-03-29', '10:45 PM', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `offer_amount`
--

CREATE TABLE `offer_amount` (
  `id` int(11) NOT NULL,
  `amount` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer_amount`
--

INSERT INTO `offer_amount` (`id`, `amount`) VALUES
(1, '50');

-- --------------------------------------------------------

--
-- Table structure for table `offer_banners`
--

CREATE TABLE `offer_banners` (
  `id` int(11) NOT NULL,
  `image_path` text CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer_banners`
--

INSERT INTO `offer_banners` (`id`, `image_path`) VALUES
(4, 'offer_images/1591398954error-page-bg.jpg'),
(5, 'offer_images/1058985137hp.jpg'),
(6, 'offer_images/94054086raj-fashion.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `offer_category_list`
--

CREATE TABLE `offer_category_list` (
  `id` int(11) NOT NULL,
  `category_name` varchar(500) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer_category_list`
--

INSERT INTO `offer_category_list` (`id`, `category_name`, `status`) VALUES
(1, 'Textiles', 1),
(2, 'Jewellery', 1),
(3, 'Hotels & Restaurants', 1),
(4, 'Dept. Stores', 1),
(5, 'Bakery & Sweet Stalls', 1),
(6, 'Mobiles', 2),
(7, 'RAJ_FOOD', 1),
(8, 'Real Estates', 1);

-- --------------------------------------------------------

--
-- Table structure for table `otp_services`
--

CREATE TABLE `otp_services` (
  `id` int(11) NOT NULL,
  `mobile_no` varchar(400) DEFAULT NULL,
  `otp` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otp_services`
--

INSERT INTO `otp_services` (`id`, `mobile_no`, `otp`) VALUES
(1, '9842784234', '764630'),
(2, '8838272618', '355900'),
(3, '9626061921', '946190'),
(4, '9626061924', '568244'),
(5, '8220559784', '878638'),
(6, '1235566688', '674037'),
(7, '9668666666', '114068'),
(8, '9715020000', '468109'),
(9, '9994586474', '250951'),
(10, '9894459918', '164327'),
(11, '9994822082', '377733'),
(12, '9443101806', '393179'),
(13, '9842811558', '598521'),
(14, '5776783375', '515521'),
(15, '4454545454', '560610');

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateway_list`
--

CREATE TABLE `payment_gateway_list` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `purpose` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `amount` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8 DEFAULT NULL,
  `reg_date` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `reg_time` varchar(600) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_gateway_list`
--

INSERT INTO `payment_gateway_list` (`id`, `user_id`, `name`, `phone`, `purpose`, `amount`, `description`, `reg_date`, `reg_time`) VALUES
(1, 1, 'Ramesh Kumar', '8220559785', '1', '100', 'testing content', '2020-11-11', '11:25 PM'),
(2, 5, 'raj', '9844910198', '1', '100', 'adfaf', '2020-12-12', '08:42 PM'),
(3, 1, 'Ramesh Kumar', '8220559785', '1', '300', 'testing pay', '2020-12-25', '10:52 PM');

-- --------------------------------------------------------

--
-- Table structure for table `petrol_list`
--

CREATE TABLE `petrol_list` (
  `id` int(11) NOT NULL,
  `petrol_price` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `diesel_price` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `image_path` text CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petrol_list`
--

INSERT INTO `petrol_list` (`id`, `petrol_price`, `diesel_price`, `image_path`) VALUES
(1, '92.77', '87.07', '');

-- --------------------------------------------------------

--
-- Table structure for table `policy_details`
--

CREATE TABLE `policy_details` (
  `id` int(11) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `content` text CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `policy_details`
--

INSERT INTO `policy_details` (`id`, `type`, `content`) VALUES
(1, '1', '<div>Terms and Conditions agreements act as a legal contract between you www.jpsrhosur.in who has the website or mobile app and the user who access your website and mobile app.</div><div><br></div><div>Having a Terms and Conditions agreement is completely optional. No laws require you to have one. Not even the super-strict and wide-reaching General Data Protection Regulation (GDPR).</div><div><br></div><div>It\'s up to you to set the rules and guidelines that the user must agree to. You can think of your Terms and Conditions agreement as the legal agreement where you maintain your rights to exclude users from your app in the event that they abuse your app, where you maintain your legal rights against potential app abusers, and so on.</div><div><br></div><div>Terms and Conditions are also known as Terms of Service or Terms of Use.</div>'),
(2, '2', '<div>Today\'s business world is largely dependent on data and the information that is derived from that data.</div><div><br></div><div>Data is critical for businesses that process that information to provide services and products to their customers. From a corporate context, in a company - from the top executive level right down to the operational level - just about everyone relies heavily on information.</div><div><br></div><div>In a complex environment where so much depends on the data that businesses collect and process, protecting that information becomes increasingly important. Among the steps business owners take to protect the data of their users, drafting a clear and concise Privacy Policy agreement holds central importance.</div><div><br></div><div>In this article, we will discuss the elements of a Privacy Policy to help you better understand the constructs of an effective Privacy Policy agreement that instills faith and trust in your customers and protects you from a number of liability issues.</div>');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` int(11) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `product_name` varchar(600) DEFAULT NULL,
  `product_desc` text DEFAULT NULL,
  `mrp_price` varchar(500) DEFAULT NULL,
  `sell_price` varchar(500) DEFAULT NULL,
  `available_qty` varchar(500) DEFAULT NULL,
  `video_path` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `category`, `product_name`, `product_desc`, `mrp_price`, `sell_price`, `available_qty`, `video_path`) VALUES
(1, '2', 'cvcv', 'cvcvcvcvcvcv', '1', '1', '1', NULL),
(3, '1', 'Cotton double dhoti', 'Prakasam Cotton is the leading sale brand online dhotis in india. Our Premium quality vip\'s double ( 8 Mulam) dhoties are 1.30 x 3.80 mtrs dhoti looking very smart look to all functions. The golden Jari looks very attract all colour shirts.', '450', '445', '10', 'videos/54796622'),
(4, '1', 'bvhv', 'b b', '687678', '4545', '10', ''),
(5, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(6, NULL, NULL, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `referral_income`
--

CREATE TABLE `referral_income` (
  `id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cash` varchar(200) DEFAULT NULL,
  `reg_date` varchar(100) DEFAULT NULL,
  `reg_time` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referral_income`
--

INSERT INTO `referral_income` (`id`, `business_id`, `user_id`, `cash`, `reg_date`, `reg_time`, `status`) VALUES
(1, 12, 1, '500', '2020/12/08', '01:34 AM', 'approved'),
(2, 13, 1, '200', '2020/12/08', '09:48 PM', 'approved'),
(3, 14, 5, '1000', '2020/12/12', '08:28 PM', 'approved'),
(4, 17, 1, '', '2020/12/25', '02:20 AM', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `social_media_list`
--

CREATE TABLE `social_media_list` (
  `id` int(11) NOT NULL,
  `location` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `facebook` text CHARACTER SET utf8 DEFAULT NULL,
  `twitter` text CHARACTER SET utf8 DEFAULT NULL,
  `instagram` text CHARACTER SET utf8 DEFAULT NULL,
  `linkedin` text CHARACTER SET utf8 DEFAULT NULL,
  `whatsapp` text CHARACTER SET utf8 DEFAULT NULL,
  `youtube` text CHARACTER SET utf8 DEFAULT NULL,
  `enter_by` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `enter_date` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `updated_by` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `update_date` varchar(500) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_media_list`
--

INSERT INTO `social_media_list` (`id`, `location`, `facebook`, `twitter`, `instagram`, `linkedin`, `whatsapp`, `youtube`, `enter_by`, `enter_date`, `updated_by`, `update_date`) VALUES
(1, '1', 'https://www.facebook.com/JPSR-Hosur-107112471013146/', 'https://twitter.com/JPSRHOSUR1', 'https://www.instagram.com/jpsrhosur/', 'https://www.linkedin.com/in/jpsr-hosur-know-your-neighbours-82032922a/?lipi=urn%3Ali%3Apage%3Ad_flagship3_feed%3BaJMgQImJQgCsU%2Br99mVilw%3D%3D', 'https://wa.me/919715020000', 'https://youtube.com/channel/UCUZG44CbM1-ahZPv2JEE-jg', 'Admin', '22/01/2022', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `state_list`
--

CREATE TABLE `state_list` (
  `id` int(11) NOT NULL,
  `state_name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(200) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state_list`
--

INSERT INTO `state_list` (`id`, `state_name`, `status`) VALUES
(1, 'Andaman and Nicobar Islands', '1'),
(2, 'Andhra Pradesh', '1'),
(3, 'Arunachal Pradesh', '1'),
(4, 'Assam', '1'),
(5, 'Bihar', '1'),
(6, 'Chandigarh', '1'),
(7, 'Chhattisgarh', '1'),
(8, 'Dadra and Nagar Haveli', '1'),
(9, 'Daman and Diu', '1'),
(10, 'Delhi', '1'),
(11, 'Goa', '1'),
(12, 'Gujarat', '1'),
(13, 'Haryana', '1'),
(14, 'Himachal Pradesh', '1'),
(15, 'Jammu and Kashmir', '1'),
(16, 'Jharkhand', '1'),
(17, 'Karnataka', '1'),
(18, 'Kerala', '1'),
(19, 'Lakshadweep', '1'),
(20, 'Madhya Pradesh', '1'),
(21, 'Maharashtra', '1'),
(22, 'Manipur', '1'),
(23, 'Meghalaya', '1'),
(24, 'Mizoram', '1'),
(25, 'Nagaland', '1'),
(26, 'Orissa', '1'),
(27, 'Pondicherry', '1'),
(28, 'Punjab', '1'),
(29, 'Rajasthan', '1'),
(30, 'Sikkim', '1'),
(31, 'Tamil Nadu', '1'),
(32, 'Telangana', '1'),
(33, 'Tripura', '1'),
(34, 'Uttar Pradesh', '1'),
(35, 'Uttaranchal', '1'),
(36, 'West Bengal', '1');

-- --------------------------------------------------------

--
-- Table structure for table `store_list`
--

CREATE TABLE `store_list` (
  `id` int(11) NOT NULL,
  `file_path` text CHARACTER SET utf8 DEFAULT NULL,
  `image_path` text CHARACTER SET utf8 DEFAULT NULL,
  `type` varchar(200) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_list`
--

INSERT INTO `store_list` (`id`, `file_path`, `image_path`, `type`) VALUES
(1, 'news_images/751581367121233.pdf', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sub_popup_ad`
--

CREATE TABLE `sub_popup_ad` (
  `id` int(11) NOT NULL,
  `ad_1` text CHARACTER SET utf8 DEFAULT NULL,
  `ad_2` text CHARACTER SET utf8 DEFAULT NULL,
  `ad_3` text CHARACTER SET utf8 DEFAULT NULL,
  `ad_4` text CHARACTER SET utf8 DEFAULT NULL,
  `ad_5` text CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_popup_ad`
--

INSERT INTO `sub_popup_ad` (`id`, `ad_1`, `ad_2`, `ad_3`, `ad_4`, `ad_5`) VALUES
(1, '', '', '', 'home_ads_images/2066927979ad_1.jpg', 'home_ads_images/503265337coming_soon_bg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `temples_list`
--

CREATE TABLE `temples_list` (
  `id` int(11) NOT NULL,
  `location` int(11) DEFAULT NULL,
  `ward_no` int(11) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `temple_name` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `person_name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `mobile_no` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `landmark` varchar(800) CHARACTER SET utf8 DEFAULT NULL,
  `city` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `district` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `state` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `pincode` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `alternative_mobile_no` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `landline_no` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `website` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `working_hour` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `temple_description` text CHARACTER SET utf8 DEFAULT NULL,
  `special_offer` text CHARACTER SET utf8 DEFAULT NULL,
  `temple_image` text CHARACTER SET utf8 DEFAULT NULL,
  `video` text CHARACTER SET utf8 DEFAULT NULL,
  `reg_date` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `enter_by` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `updated_by` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `updated_date` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(600) CHARACTER SET utf8 DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temples_list`
--

INSERT INTO `temples_list` (`id`, `location`, `ward_no`, `area`, `temple_name`, `person_name`, `mobile_no`, `email`, `address`, `landmark`, `city`, `district`, `state`, `pincode`, `alternative_mobile_no`, `landline_no`, `website`, `working_hour`, `temple_description`, `special_offer`, `temple_image`, `video`, `reg_date`, `enter_by`, `updated_by`, `updated_date`, `status`) VALUES
(1, 1, 1, 17, 'Chandra Choodaswarar Temple', 'Ramesh Kumar', '8838272618', '', 'Chandra Choodeswarar Temple', '', 'Hosur', '11', '31', '635109', '', '', 'https://krishnagiri.nic.in/tourist-place/chandra-choodaswarar-temple/', '06:00-17:00', '<p style=\"box-sizing: inherit; padding: 0px 0px 15px; margin-bottom: 0px; outline: 0px; list-style-type: none; border: 0px; font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" vertical-align:=\"\" baseline;=\"\" line-height:=\"\" 1.7em;=\"\" color:=\"\" rgb(51,=\"\" 51,=\"\" 51);=\"\" text-align:=\"\" justify;\"=\"\">Chandra choodeswarar temple (lord siva temple) is famous for its hill temple where presiding deity lord Siva is Arul migu maragathambal samadha (Sreee Chandra Choodeswarar) it is located 40kms from Bangalore 52 kms from Krishnagiri in National High ways NH-7 Daily 500-1000 Devotees are visiting this temple most of them from hosur, Bangalore, Krishnagri, and neibouring states like Karnataka, and Anthrapradesh. it is very famous temple like Mysore Samundeeswari temple. stone inscription is witnessed 11th century AD Chola period temple the Glory of Raja Raja cholan and Gulothunga cholan also found in this temple stone documents.</p><p style=\"box-sizing: inherit; padding: 0px 0px 15px; margin-bottom: 0px; outline: 0px; list-style-type: none; border: 0px; font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" vertical-align:=\"\" baseline;=\"\" line-height:=\"\" 1.7em;=\"\" color:=\"\" rgb(51,=\"\" 51,=\"\" 51);=\"\" text-align:=\"\" justify;\"=\"\">Chandra Choodeswarar temple car festivals is very famous festivals in city most of the people from hosur, mangaluru part of Karnataka are participated in this festivals every year in the month of Mar-April. Temple maintained by HR&amp;CE, Garden, telescope house maintained by Municipal Corporation, Hosur.</p>', 'We will update soon', 'temples/11510068272019030496.jpg', 'temples/574143363', '2022/01/11', '1', 'Admin', '2022/01/17', 'active'),
(2, 1, NULL, NULL, 'GANAPATHI TEMPLE', 'SOUNDARYA N', '9994822082', '', 'BHARATH NAGAR, DINNUR', '', 'HOSUR', '11', '31', '635109', '', '', '', '-', 'VIDYA GANAPATHI TEMPLE', '<br>', '', '', '2022/01/17', '7', NULL, NULL, 'deactive');

-- --------------------------------------------------------

--
-- Table structure for table `temple_images`
--

CREATE TABLE `temple_images` (
  `id` int(11) NOT NULL,
  `temple_id` int(11) NOT NULL,
  `image_path` text CHARACTER SET utf8 DEFAULT NULL,
  `type` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `size` varchar(600) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temple_images`
--

INSERT INTO `temple_images` (`id`, `temple_id`, `image_path`, `type`, `size`) VALUES
(1, 1, 'temple_gallery_images/20220111022405_20190809-091829-largejpg.jpg', 'image/jpeg', '232767'),
(2, 1, 'temple_gallery_images/20220111022405_2018060695.jpg', 'image/jpeg', '285089'),
(3, 1, 'temple_gallery_images/20220111022405_2019020816.jpg', 'image/jpeg', '223107'),
(4, 1, 'temple_gallery_images/20220111022405_photo1jpg.jpg', 'image/jpeg', '217018'),
(6, 1, 'temple_gallery_images/20220111033843_2019030496.jpg', 'image/jpeg', '296815'),
(10, 1, 'temple_gallery_images/20220117225524_photo1jpg.jpg', 'image/jpeg', '217018');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_list`
--

CREATE TABLE `testimonial_list` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `services` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `feedback` text CHARACTER SET utf8 DEFAULT NULL,
  `reg_date` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `reg_time` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(400) NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial_list`
--

INSERT INTO `testimonial_list` (`id`, `user_id`, `name`, `phone`, `services`, `feedback`, `reg_date`, `reg_time`, `status`) VALUES
(6, 1, 'Ramesh Kumar', '8220559785', '10', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.', '2020-11-12', '10:22 PM', 'active'),
(7, 1, 'Ramesh Kumar', '8220559785', '6', 'Second content of the purpose, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.', '2020-11-12', '10:23 PM', 'active'),
(8, 5, 'raj', '9844910198', '1', 'good', '2020-12-12', '08:36 PM', 'active'),
(9, 7, 'Thamodharan', '9043176235', '9', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla.', '2021-04-12', '10:24 PM', 'active'),
(10, 11, 'pavani', '9066838657', '3', 'I am very much thankful to the services provided by JPSR services. This is single platform for all your needs near by and very useful for searching and finding people near you. I appreciate the work and dedication by the people to bring this platform to make things just one click away. I am very happy by the services. Thank you somuch. ', '2021-04-19', '08:05 PM', 'active'),
(11, NULL, 'Donaldhix', '81716879391', '20', 'Hello!  jpsrhosur.in \r\n \r\nDid you know that it is possible to send business proposal totally legally? \r\nWe offer a new unique way of sending business offer through contact forms. Such forms are located on many sites. \r\nWhen such messages are sent, no personal data is used, and messages are sent to forms specifically designed to receive messages and appeals. \r\nalso, messages sent through communication Forms do not get into spam because such messages are considered important. \r\nWe offer you to test our service for free. We will send up to 50,000 messages for you. \r\nThe cost of sending one million messages is 49 USD. \r\n \r\nThis letter is created automatically. Please use the contact details below to contact us. \r\n \r\nContact us. \r\nTelegram - @FeedbackMessages \r\nSkype  live:contactform_18 \r\nWhatsApp - +375259112693 \r\n \r\nWe only use chat.', '2021-05-03', '06:44 PM', 'deactive'),
(12, NULL, 'Mike Neal\r\n', '82119458447', '20', 'Greetings \r\n \r\nI have just verified your SEO on  jpsrhosur.in for its Local SEO Trend and seen that your website could use a push. \r\n \r\nWe will increase your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our plans here, we offer SEO at cheap rates. \r\nhttps://speed-seo.net/product/local-seo-package/ \r\n \r\nStart increasing your local visibility with us, today! \r\n \r\nregards \r\nMike Neal\r\n \r\nSpeed SEO Digital Agency \r\nsupport@speed-seo.net', '2021-05-11', '04:11 AM', 'deactive'),
(13, NULL, 'Mike Shackley\r\n', '89287538698', '20', 'Hi there \r\n \r\nDo you want a quick boost in ranks and sales for your jpsrhosur.in website? \r\nHaving a high DA score, always helps \r\n \r\nGet your jpsrhosur.in to have a DA between 50 to 60 points in Moz with us today and rip the benefits of such a great feat. \r\n \r\nSee our offers here: \r\nhttps://www.monkeydigital.co/product/moz-da50-seo-plan/ \r\n \r\nNEW: \r\nhttps://www.monkeydigital.co/product/ahrefs-DR50-UR70/ \r\n \r\n \r\nthank you \r\nMike Shackley\r\n \r\nsupport@monkeydigital.co', '2021-05-12', '02:01 AM', 'deactive'),
(14, NULL, 'fgfjhkhlkllopp https://google.com dgdgd', 'fgfjhkhlkllopp https://google.com dgdgdl', '23', 'fgfjhkhlkllopp https://google.com dgdgdl', '2021-05-12', '03:48 PM', 'deactive'),
(15, NULL, 'Mazlan Selvi', '86718263945', '20', 'Dear Friend, \r\n \r\nMy names are Mr. Mezlan Selvi, a lawyer base in Kuala Lumpur - Malaysia. I have previously sent you an email regarding a transaction of US$13.5 Million left behind by my late client before his tragic death but no response from you. \r\n \r\nHowever, I am contacting you once again with strong believe that you will work /partner with me to execute this business transaction in good faith. Please if you are interested in proceeding with me, kindly respond to me via my private email mselvi@ponnusamylawassociates-my.com for more detailed information. \r\n \r\nAs a matter of fact, this transaction is 100% risk free and I look forward to your acknowledgement. \r\n \r\nRegards, \r\nMr. Mazlan Selvi \r\nEmail: mselvi@ponnusamylawassociates-my.com', '2021-05-13', '02:01 AM', 'deactive'),
(16, NULL, 'Mike Thomson\r\n', '83733745899', '20', 'Good Day \r\n \r\nI have just verified your SEO on  jpsrhosur.in for its SEO Trend and saw that your website could use a push. \r\n \r\nWe will increase your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our plans here, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart increasing your sales and leads with us, today! \r\n \r\nregards \r\nMike Thomson\r\n \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de', '2021-05-14', '04:59 PM', 'deactive'),
(17, NULL, 'Yahoo', '81852795962', '20', 'Most profitable cryptocurrency miners has been released : \r\nDBT Miner: $7,500 (Bitcoin), $13,000 (Litecoin), $13,000 (Ethereum), and $15,000 (Monero) \r\n \r\nGBT Miner: $22,500 (Bitcoin), $39,000 (Litecoin), $37,000 (Ethereum), and $45,000 (Monero) \r\nRead more here : \r\nhttps://www.yahoo.com/now/bitwats-release-most-profitable-asic-195600764.html', '2021-05-14', '10:02 PM', 'deactive'),
(18, NULL, 'Sambo Dasuki', '83135456764', '20', 'Dear Partner; \r\n \r\nI came across your email contact on Database; Where i was searching for a competent Partner who can handle a lucrative business for me as trustee and manager. I anticipate to read from you soon so I can provide you with more details. \r\n \r\nYours Sincerely, \r\nAlh. Sambo Dasuki \r\nmmzxxz288@gmail.com', '2021-05-19', '07:04 PM', 'deactive'),
(19, NULL, 'Mike Babcock\r\n', '88946684884', '20', 'Greetings \r\n \r\nI have just analyzed  jpsrhosur.in for its Local SEO Trend and seen that your website could use a push. \r\n \r\nWe will improve your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our plans here, we offer SEO at cheap rates. \r\nhttps://speed-seo.net/product/local-seo-package/ \r\n \r\nStart increasing your local visibility with us, today! \r\n \r\nregards \r\nMike Babcock\r\n \r\nSpeed SEO Digital Agency \r\nsupport@speed-seo.net', '2021-05-21', '10:28 AM', 'deactive'),
(20, NULL, 'Rajiv Michael', '88326853859', '20', 'Hello Dear, \r\n \r\nI am working directly with a private family portfolio that can provide funding for credible clients with feasible projects. Currently, we have investment funds for viable projects. \r\n \r\nThey are interested in the following: Institution, Library, Hospitals, Green energy, \r\nPower projects, Agriculture and Real Estate. They can also partner with your company on other projects of value. The interest rate and tenure are fantastic. \r\n \r\nYour response is most anticipated if this is of interest to you. Reach me on email: financial@eurocleargroups.email or rajiindian3@gmail.com \r\n \r\n \r\nKind regards, \r\n \r\nRajiv Michael \r\nFinancial Consultant \r\nWhatsApp: +15183802182 \r\nTelegram@ +12092482370 \r\nEuroclear Groups \r\nfinancial@eurocleargroups.email \r\nUrl: http://euroclear.com', '2021-05-26', '03:29 AM', 'deactive'),
(21, NULL, 'Mike Morrison\r\n', '85436846316', '20', 'Greetings \r\n \r\nI have just analyzed  jpsrhosur.in for the ranking keywords and saw that your website could use an upgrade. \r\n \r\nWe will improve your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our pricelist here, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart enhancing your sales and leads with us, today! \r\n \r\nregards \r\nMike Morrison\r\n \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de', '2021-05-27', '12:37 AM', 'deactive'),
(22, NULL, 'Taylor Binney', '86545399569', '20', 'Good Day, \r\n \r\nWe went through your website and discovered there\'s a potential for investment as we currently have a client who\'s interested in investing in your country. \r\n \r\nCould you get back to us about your company and areas you think we can invest for profit. \r\n \r\nTo understand our mission, please click here https://loginliveoffice.alliancenyunion.com/index.html to view our company profile: \r\n \r\nTaylor Binney \r\nFinance Officer \r\nVB Investments', '2021-06-10', '01:49 AM', 'deactive'),
(23, NULL, 'Mike Reynolds\r\n', '85199692336', '20', 'Hi there \r\n \r\nIncrease your jpsrhosur.in SEO metrics values with us and get more visibility and exposure for your website. \r\n \r\nMore info: \r\nhttps://www.monkeydigital.org/product/moz-da50-seo-plan/ \r\n \r\nNEW: \r\nhttps://www.monkeydigital.org/product/ahrefs-dr50-ur70-seo-plan/ \r\nhttps://www.monkeydigital.org/product/trust-flow-seo-package/ \r\n \r\n \r\nthank you \r\nMike Reynolds\r\n', '2021-06-10', '03:29 PM', 'deactive'),
(24, NULL, 'Tom Martino', '84969579665', '20', 'We have business partners who are willing to invest any amount into your business. \r\nFor more information contact: invest@baasim.com \r\nwhatsApp: +84923754944', '2021-06-11', '02:09 PM', 'deactive'),
(25, NULL, 'Ashlay Hazalton', '87676956423', '20', 'Hi, this is Chris. \r\nWho win all online casinos by using FREE BONUS. \r\n \r\nWitch mean, I don’t really spend money in online casinos. \r\n \r\nBut I win every time, and actually, everybody can win by following my directions. \r\n \r\neven you can win! \r\n \r\nSo, if you’re the person, who can listen to someone really smart, you should just try!! \r\n \r\nThe best online casino, that I really recommend is, Vera&John. \r\nEstablished in 2010 and became best online casino in the world. \r\n \r\nThey give you free bonus when you charge more than $50. \r\nIf you charge $50, your bonus is going to be $50. \r\n \r\nIf you charge $500, you get $500 Free bonus. \r\nYou can bet up to $1000. \r\n \r\nJust try roulette, poker, black jack…any games with dealers. \r\nBecause dealers always have to make some to win and, only thing you need to do is to be chosen. \r\n \r\nDon’t ever spend your bonus at slot machines. \r\nYOU’RE GONNA LOSE YOUR MONEY!! \r\n \r\nNext time, I will let you know how to win in online casino against dealers!! \r\n \r\nDon’t forget to open your VERA&JOHN account, otherwise you’re gonna miss even more chances!! \r\n \r\n \r\n \r\nOpen Vera&John account (free) \r\nhttps://bit.ly/3wZkpco', '2021-06-14', '09:41 AM', 'deactive'),
(26, NULL, 'AL SAEED CORPORATION LLC', '87398679766', '20', 'We are AL SAEED CORPORATION LLC \r\nWe give out loans to individuals/companies at 2% interest rate annually. We are interested in financing projects of large volume. The repayment period is 1 year to 30 years. \r\nCONTACT US: \r\nE-mail: adelhamad@alsaeedcorp.com', '2021-06-17', '01:23 AM', 'deactive'),
(27, NULL, 'Mike Chapman\r\n', '85957332349', '20', 'Hello \r\n \r\nWe will improve your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our plans here, we offer Local SEO at cheap rates. \r\nhttps://speed-seo.net/product/local-seo-package/ \r\n \r\nNEW: \r\nhttps://www.speed-seo.net/product/zip-codes-gmaps-citations/ \r\n \r\nregards \r\nMike Chapman\r\n \r\nSpeed SEO Digital Agency', '2021-06-17', '02:05 PM', 'deactive'),
(28, NULL, 'Mike Walker\r\n', '88297316319', '20', 'Good Day \r\n \r\nI have just took an in depth look on your  jpsrhosur.in for  the current search visibility and saw that your website could use a boost. \r\n \r\nWe will enhance your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our pricelist here, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart enhancing your sales and leads with us, today! \r\n \r\nregards \r\nMike Walker\r\n \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de', '2021-06-24', '09:39 PM', 'deactive'),
(29, NULL, 'Yasuhiro Yamada', '84385428631', '20', 'Hello, \r\n \r\n \r\nWith all due respect. If you are based in United States or Canada, I write to inform you that we need you to serve as our Spokesperson/Financial Coordinator for our company ROHTO PHARMACEUTICAL CO., LTD. and its clients in the United States and Canada. It\'s a part-time job and will only take few minutes of your time daily and it will not bring any conflict of interest in case you are working with another company. If interested reply me using this email address: admin@rohtopharmaceutical.jp \r\n \r\n \r\nYasuhiro Yamada \r\nSenior Executive Officer, \r\nROHTO Pharmaceutical Co.,Ltd. \r\n1-8-1 Tatsumi-nishi, \r\nIkuno-Ku, Osaka, 544-8666, \r\nJapan.', '2021-06-29', '04:37 PM', 'deactive'),
(30, NULL, 'JamesCrect', '81164427887', '20', 'Hello!  jpsrhosur.in \r\n \r\nDo you know the simplest way to talk about your merchandise or services? Sending messages through contact forms can allow you to easily enter the markets of any country (full geographical coverage for all countries of the world).  The advantage of such a mailing  is that the emails which will be sent through it\'ll find yourself in the mailbox that\'s intended for such messages. Sending messages using Contact forms is not blocked by mail systems, which means it\'s absolute to reach the recipient. You may be able to send your offer to potential customers who were antecedently unavailable due to email filters. \r\nWe offer you to check our service at no cost. We are going to send up to 50,000 message for you. \r\nThe cost of sending one million messages is us $ 49. \r\n \r\nThis message is created automatically. Please use the contact details below to contact us. \r\n \r\nContact us. \r\nTelegram - @FeedbackMessages \r\nSkype  live:contactform_18 \r\nWhatsApp - +375259112693 \r\nWe only use chat.', '2021-06-30', '05:19 PM', 'deactive'),
(31, NULL, 'SEO X Press Digital Agency', '87459947524', '20', 'Hello \r\n \r\n \r\nI have just took an in depth look on your  jpsrhosur.in for its SEO ranks and saw that your website could use a push. \r\n \r\n \r\nWe will increase your Ranks organically and safely, using only whitehat methods, \r\n \r\n \r\nIf interested, please email us \r\n \r\nsupport@digital-x-press.com \r\n \r\n \r\nregards \r\nMike Gustman\r\n \r\nSEO X Press Digital Agency \r\nhttps://www.digital-x-press.com', '2021-07-07', '12:19 PM', 'deactive'),
(32, NULL, 'Mike Gilbert\r\n', '84242672982', '20', 'Hi there \r\n \r\nDo you want a quick boost in ranks and sales for your jpsrhosur.in website? \r\nHaving a high DA score, always helps \r\n \r\nGet your jpsrhosur.in to have a DA between 50 to 60 points in Moz with us today and rip the benefits of such a great feat. \r\n \r\nSee our offers here: \r\nhttps://www.monkeydigital.co/product/moz-da50-seo-plan/ \r\n \r\nNEW: \r\nhttps://www.monkeydigital.co/product/ahrefs-dr60/ \r\n \r\n \r\nthank you \r\nMike Gilbert\r\n \r\nsupport@monkeydigital.co', '2021-07-08', '02:12 PM', 'deactive'),
(33, NULL, 'Nick Wilson', '88683246911', '20', 'Hi Its Nick, \r\n \r\nWe have a business texting platform that will help your team engage customers, leads & past clients through texting. \r\n \r\nRates are $49 for 30,000 texts, which is under 0.002 per message. \r\n \r\nYou can bulk text your WHOLE LIST or send two-way texts and get replies. \r\n \r\n \r\nCheck it out @ http://SaayText.com \r\n \r\nThank you, \r\nNick', '2021-07-14', '07:34 AM', 'deactive'),
(34, NULL, 'Mike MacDonald\r\n', '87395544317', '20', 'Greetings \r\n \r\nWe will enhance your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our services below, we offer Local SEO at cheap rates. \r\nhttps://speed-seo.net/product/local-seo-package/ \r\n \r\nNEW: \r\nhttps://www.speed-seo.net/product/zip-codes-gmaps-citations/ \r\n \r\nregards \r\nMike MacDonald\r\n \r\nSpeed SEO Digital Agency', '2021-07-18', '05:13 AM', 'deactive'),
(35, NULL, 'Mike MacAdam\r\n', '88453689897', '20', 'Good Day \r\n \r\nI have just analyzed  jpsrhosur.in for its SEO Trend and saw that your website could use a push. \r\n \r\nWe will enhance your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our services below, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart enhancing your sales and leads with us, today! \r\n \r\nregards \r\nMike MacAdam\r\n \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de', '2021-07-19', '08:18 PM', 'deactive'),
(36, NULL, 'Mike Gardner\r\n', '88357852987', '20', 'Hi there \r\n \r\nDo you want a quick boost in ranks and sales for your jpsrhosur.in website? \r\nHaving a high DA score, always helps \r\n \r\nGet your jpsrhosur.in to have a DA between 50 to 60 points in Moz with us today and rip the benefits of such a great feat. \r\n \r\nSee our offers here: \r\nhttps://www.monkeydigital.co/product/moz-da50-seo-plan/ \r\n \r\nNEW: \r\nhttps://www.monkeydigital.co/product/ahrefs-dr60/ \r\n \r\n \r\nthank you \r\nMike Gardner\r\n \r\nsupport@monkeydigital.co', '2021-08-02', '06:37 PM', 'deactive'),
(37, NULL, 'SEO X Press Digital Agency', '83114148249', '20', 'Hi \r\n \r\n \r\nI have just verified your SEO on  jpsrhosur.in for  the current search visibility and saw that your website could use a push. \r\n \r\n \r\nWe will improve your Ranks organically and safely, using only whitehat methods, \r\n \r\n \r\nIf interested, please email us \r\n \r\nsupport@digital-x-press.com \r\n \r\n \r\nregards \r\nMike Jones\r\n \r\nSEO X Press Digital Agency \r\nhttps://www.digital-x-press.com', '2021-08-03', '08:59 PM', 'deactive'),
(38, NULL, 'Mike Ford\r\n', '88735518518', '20', 'Hi \r\n \r\nWe will enhance your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our services below, we offer Local SEO at cheap rates. \r\nhttps://speed-seo.net/product/local-seo-package/ \r\n \r\nNEW: \r\nhttps://www.speed-seo.net/product/zip-codes-gmaps-citations/ \r\n \r\nregards \r\nMike Ford\r\n \r\nSpeed SEO Digital Agency', '2021-08-09', '03:54 PM', 'deactive'),
(39, NULL, 'David Song', '85961368547', '20', 'Dear Sir/Madam, \r\nThis is a consultancy and brokerage Firm specializing in Growth Financial Loan. We wish to invest in any viable Project presented by your Management after reviews on your Business Project Presentation Plan. We look forward to your Swift response. \r\nEmail:davidsong2030@gmail.com. \r\n \r\nRegards, \r\nMr.David Song', '2021-08-14', '01:50 AM', 'deactive'),
(40, NULL, 'Mike Larkins\r\n', '88693356448', '20', 'Greetings \r\n \r\nI have just checked  jpsrhosur.in for its SEO Trend and saw that your website could use a boost. \r\n \r\nWe will enhance your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our plans here, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart improving your sales and leads with us, today! \r\n \r\nregards \r\nMike Larkins\r\n \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de', '2021-08-19', '05:17 PM', 'deactive'),
(41, NULL, 'Mike Haig\r\n', '87271479117', '20', 'Hi \r\n \r\nGet your jpsrhosur.in ranks back, fix your SEO trend with the best clean-up service ever. \r\n \r\nOur 3 way clean up strategy: \r\n  \r\nWe will check all pages of your website for plagiarism \r\nWe will check all linking domains for indexing, \r\nWe`ll check all linking domains for the TF/CF Ratio \r\n \r\nThen, we`ll assemble your final disavow file and submit it to the google disavow tool \r\n \r\nOrder this service today and in just few weeks time your ranks will be fully restored \r\nhttps://www.digital-x-press.com/product/clean-up-service/ \r\n \r\nIt works and its very effective, email us to send you examples of trend reversals. \r\n \r\nMike Haig\r\n \r\nSEO X Press \r\nsupport@digital-x-press.com', '2021-09-02', '09:28 AM', 'deactive'),
(42, NULL, 'Mohammed Kuwari', '82169429832', '20', 'Greetings. \r\n \r\nI have an interesting business proposal to discuss with you/your company. \r\n \r\nMore details will follow upon your reply to  drmohammedalkuwari003@gmail.com   or WhatsApp: +971554845309 \r\n \r\nRegards, \r\n \r\nDr. M. Kuwari \r\nWhatsapp: +971554845309', '2021-09-03', '11:31 AM', 'deactive'),
(43, NULL, 'Mike Kingsman\r\n', '81372422692', '20', 'Hi there \r\n \r\nDo you want a quick boost in ranks and sales for your jpsrhosur.in website? \r\nHaving a high DA score, always helps \r\n \r\nGet your jpsrhosur.in to have a DA between 50 to 60 points in Moz with us today and rip the benefits of such a great feat. \r\n \r\nSee our offers here: \r\nhttps://www.monkeydigital.co/product/moz-da50-seo-plan/ \r\n \r\nNEW: \r\nhttps://www.monkeydigital.co/product/ahrefs-dr60/ \r\n \r\n \r\nthank you \r\nMike Kingsman\r\n \r\nsupport@monkeydigital.co', '2021-09-03', '01:59 PM', 'deactive'),
(44, NULL, 'Mike Osborne\r\n', '82142421963', '20', 'Hi \r\n \r\nWe will improve your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our plans here, we offer Local SEO at cheap rates. \r\nhttps://speed-seo.net/product/local-seo-package/ \r\n \r\nNEW: \r\nhttps://www.speed-seo.net/product/zip-codes-gmaps-citations/ \r\n \r\nregards \r\nMike Osborne\r\n \r\nSpeed SEO Digital Agency', '2021-09-06', '09:37 PM', 'deactive'),
(45, NULL, 'Mike King\r\n', '81121469823', '20', 'Howdy \r\n \r\nI have just analyzed  jpsrhosur.in for  the current search visibility and saw that your website could use a boost. \r\n \r\nWe will enhance your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our services below, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart enhancing your sales and leads with us, today! \r\n \r\nregards \r\nMike King\r\n \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de', '2021-09-14', '02:32 AM', 'deactive'),
(46, NULL, 'Adam Bright', '89769911137', '20', 'Need Facebook likes or Instagram followers? \r\nWe can help you. For more Info, please visit https://1000-likes.com', '2021-09-17', '03:31 AM', 'deactive'),
(47, NULL, 'Mike Stephen\r\n', '83423695553', '20', 'Hello \r\n \r\nWe all know the importance that dofollow link have on any website`s ranks. \r\nHaving most of your linkbase filled with nofollow ones is of no good for your ranks and SEO metrics. \r\n \r\nBuy quality dofollow links from us, that will impact your ranks in a positive way \r\nhttps://www.digital-x-press.com/product/150-dofollow-backlinks/ \r\n \r\nBest regards \r\nMike Stephen\r\n \r\nsupport@digital-x-press.com', '2021-09-21', '01:56 AM', 'deactive'),
(48, NULL, 'Jason Ward', '84349862382', '20', 'Hello, \r\n \r\nOur company, RatingsKing, specializes in posting 5-star testimonials on all major review sites. This way people can find you much easier and get a good impression of your business. \r\nJust go on our website and choose the package that best fits your needs at https://ratingsking.com/packages.php \r\n \r\nOur packages start from $49/month. \r\nDepending on your package you will have a number of positive reviews that we will do for you. You will have reports monthly with the work that has been done in your account. \r\n \r\nUsually, we are posting on all major reviews sites or other listings you may have.', '2021-09-22', '09:35 AM', 'deactive'),
(49, NULL, 'JamesCrect', '83171695496', '20', 'Hi!  jpsrhosur.in \r\n \r\nDo you know the simplest way to state your products or services? Sending messages exploitation feedback forms can permit you to easily enter the markets of any country (full geographical coverage for all countries of the world).  The advantage of such a mailing  is that the emails that may be sent through it\'ll find yourself within the mailbox that is intended for such messages. Sending messages using Feedback forms is not blocked by mail systems, which means it is bound to reach the client. You may be ready to send your supply to potential customers who were antecedently inaccessible because of spam filters. \r\nWe offer you to test our service for free of charge. We\'ll send up to 50,000 message for you. \r\nThe cost of sending one million messages is us $ 49. \r\n \r\nThis message is created automatically. Please use the contact details below to contact us. \r\n \r\nContact us. \r\nTelegram - @FeedbackMessages \r\nSkype  live:contactform_18 \r\nWhatsApp - +375259112693 \r\nWe only use chat.', '2021-09-23', '05:18 PM', 'deactive'),
(50, NULL, 'Roberts Zuluf', '88168999214', '20', 'Hi \r\nHow are you? I wanted to reach out to you and verify that email was a good way to reach you or We can discuss this via the telephone,WhatsApp only. +90 555 140 8097 or contact@frzuluf.com \r\nI count in your honor for a quick response for a good deal. \r\nRegards, \r\nRoberts Zuluf', '2021-09-28', '08:42 AM', 'deactive'),
(51, NULL, 'Mike Kendal\r\n', '87231123397', '20', 'Hi there \r\n \r\nDo you want a quick boost in ranks and sales for your jpsrhosur.in website? \r\nHaving a high DA score, always helps \r\n \r\nGet your jpsrhosur.in to have a DA between 50 to 60 points in Moz with us today and reap the benefits of such a great feat. \r\n \r\nSee our offers here: \r\nhttps://www.monkeydigital.co/product/moz-da50-seo-plan/ \r\n \r\nNEW: \r\nhttps://www.monkeydigital.co/product/ahrefs-dr60/ \r\n \r\n \r\nthank you \r\nMike Kendal\r\n \r\nsupport@monkeydigital.co', '2021-09-30', '01:03 AM', 'deactive'),
(52, NULL, 'Mike Paterson\r\n', '83594961838', '20', 'Greetings \r\n \r\nWe will increase your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our plans here, we offer Local SEO at cheap rates. \r\nhttps://speed-seo.net/product/local-seo-package/ \r\n \r\nNEW: \r\nhttps://www.speed-seo.net/product/zip-codes-gmaps-citations/ \r\n \r\nregards \r\nMike Paterson\r\n \r\nSpeed SEO Digital Agency', '2021-10-04', '08:08 PM', 'deactive'),
(53, NULL, 'Mike Turner\r\n', '86715556734', '20', 'Hi \r\n \r\nI have just took a look on your SEO for  jpsrhosur.in for its SEO Trend and saw that your website could use a push. \r\n \r\nWe will improve your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our services below, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart improving your sales and leads with us, today! \r\n \r\nregards \r\nMike Turner\r\n \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de', '2021-10-12', '02:33 AM', 'deactive'),
(54, NULL, 'Randallnuh', '87838917385', '20', 'You want a website Example http://markcheap.com  adsense approval , website design , seo content many to many more idea then success your company', '2021-10-14', '01:34 PM', 'deactive'),
(55, NULL, 'Crypto Friend', '83737737521', '20', 'Hello, \r\nBy now you must have surely heard of the term ‘crypto’ once in your lifetime. All of it yet sounds scary, while also making you feel like you are missing out on something. \r\nSafety? Security? Knowledge? Trust? These are many other doubts that may pop into your head. What if there is an all-in-one solution for this? Click here (https://bit.ly/3aGcuI3) to know more about Crypto Friend. \r\nThe world of crypto awaits you. Let us hold your hand, and guide you through your path of success, determination and financial freedom. \r\nFor more info click here: https://bit.ly/3aGcuI3 \r\nTeam Crypto Friend.', '2021-10-18', '11:51 PM', 'deactive'),
(56, NULL, 'Toby Knows', '88965556155', '20', '“We didn’t buy from you because of your reviews.\" \r\n \r\n \r\nWouldn’t it be great if people told you the reason that they did NOT buy? \r\n \r\n \r\nOf course, that doesn’t happen in the real world. \r\n \r\n \r\nThey just buy from your competitors instead (the ones that have better reviews). \r\n \r\n \r\nUnless you have a perfect review profile, you are losing sales and you don’t even know it. \r\n \r\n \r\nLuckily this is easily fixed. \r\n \r\n \r\nReview Spark generates reviews on autopilot for less than $1 a day. \r\n \r\n \r\nIt\'s fast, effective and guaranteed to work. \r\n \r\n \r\nNow On Sale at 50% Off: https://tobyknows.com/review-spark \r\n \r\n \r\nWe’ll even GIVE YOU our Social Media Toolkit absolutely FREE just for looking! \r\n \r\n \r\nCLICK HERE TO CHECK IT OUT: https://tobyknows.com/review-spark', '2021-10-20', '10:51 AM', 'deactive'),
(57, NULL, 'Mike Davidson\r\n', '85186772866', '20', 'Hello \r\n \r\nWe all know the importance that dofollow link have on any website`s ranks. \r\nHaving most of your linkbase filled with nofollow ones is of no good for your ranks and SEO metrics. \r\n \r\nBuy quality dofollow links from us, that will impact your ranks in a positive way \r\nhttps://www.digital-x-press.com/product/150-dofollow-backlinks/ \r\n \r\nBest regards \r\nMike Davidson\r\n \r\nsupport@digital-x-press.com', '2021-10-22', '08:02 PM', 'deactive'),
(58, NULL, 'Mike Faber\r\n', '82998344891', '20', 'Hi there \r\n \r\nDo you want a quick boost in ranks and sales for your website? \r\nHaving a high DA score, always helps \r\n \r\nGet your jpsrhosur.in to have a DA between 50 to 60 points in Moz with us today and reap the benefits of such a great feat. \r\n \r\nSee our offers here: \r\nhttps://www.strictlydigital.net/product/moz-da50-seo-plan/ \r\n \r\nOn SALE: \r\nhttps://www.strictlydigital.net/product/ahrefs-dr60/ \r\n \r\n \r\nThank you \r\nMike Faber\r\n', '2021-10-27', '06:07 AM', 'deactive'),
(59, NULL, 'Mike Forman\r\n', '86963969464', '20', 'Greetings \r\n \r\nWe will improve your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our pricelist here, we offer Local SEO at cheap rates. \r\nhttps://speed-seo.net/product/local-seo-package/ \r\n \r\nNEW: \r\nhttps://www.speed-seo.net/product/zip-codes-gmaps-citations/ \r\n \r\nregards \r\nMike Forman\r\n \r\nSpeed SEO Digital Agency', '2021-11-03', '09:46 PM', 'deactive'),
(60, NULL, 'Charlesantap', '86327938853', '20', 'jpsrhosur.in gbuihswdiwyfuwhdiwfbujdaodhwifwjdaqidhwufwudjqvbcnxsiwdui', '2021-11-09', '07:22 AM', 'deactive'),
(61, NULL, 'David Holman', '82562999811', '20', 'We are a Team of IT Experts specialized in the production of Real and Novelty Documents such as Passport, Driving License , IELTS Certificate,  NCLEX Certificate, ID Cards, Diplomas, SS Cards, University Certificates, Green Cards, Death Certificate, Working Permits, Visa\'s etc. Contact us on WhatsApp for more information +49 1590 2969018. or Email us at... documentsservicesexperts@gmail.com', '2021-11-12', '02:08 PM', 'deactive'),
(62, NULL, 'Mike MacAlister\r\n', '81311857789', '20', 'Hello \r\n \r\nI have just took a look on your SEO for  jpsrhosur.in for its SEO Trend and saw that your website could use an upgrade. \r\n \r\nWe will improve your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our plans here, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart increasing your sales and leads with us, today! \r\n \r\nregards \r\nMike MacAlister\r\n \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de', '2021-11-12', '08:30 PM', 'deactive'),
(63, NULL, 'Georgeinits', '82773897917', '20', 'Passive income from $ 9989 per day >>>>>>>>>>>>>>  https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc7Wvjo&sa=D&27=38&usg=AFQjCNHj_a66ufJc5MfSABppuo4GGGxh6w   <<<<<<<<<<<', '2021-11-17', '02:13 AM', 'deactive'),
(64, NULL, 'JamesMounk', '81587771311', '20', 'Change your life and get passive income from $ 7989 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc7Wvjo&sa=D&12=94&usg=AFQjCNHj_a66ufJc5MfSABppuo4GGGxh6w <<<<<<<<<<<<<<<<<<<<<<<<', '2021-11-17', '10:16 PM', 'deactive'),
(65, NULL, 'Georgeinits', '87392773763', '20', 'Confessions of a Bitcoin billionaire or passive income more $ 6889 in a day >>>>>>>>>>>>>>  https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc7Wvjo&sa=D&46=20&usg=AFQjCNHj_a66ufJc5MfSABppuo4GGGxh6w   <<<<<<<<<<<', '2021-11-17', '11:37 PM', 'deactive'),
(66, NULL, 'Mike Timmons\r\n', '87161262282', '20', 'Hello \r\n \r\nWe all know the importance that dofollow link have on any website`s ranks. \r\nHaving most of your linkbase filled with nofollow ones is of no good for your ranks and SEO metrics. \r\n \r\nBuy quality dofollow links from us, that will impact your ranks in a positive way \r\nhttps://www.digital-x-press.com/product/150-dofollow-backlinks/ \r\n \r\nBest regards \r\nMike Timmons\r\n \r\nsupport@digital-x-press.com', '2021-11-19', '12:56 PM', 'deactive'),
(67, NULL, 'Stevencoems', '85276486882', '20', 'A few weeks ago, Elon Musk, in an interview, accidentally blabbed about a cryptocurrency trading robot that brings him passive income from $ 13,000 to $ 135,000 per day and asked to remove this moment from the video after filming. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8aMsu&sa=D&87=89&usg=AFQjCNGiMsVvcKCjtUl1s1o9fbbu24TnPA \r\nBut the operator who filmed all this remembered the name of the trading robot and tried to make money. \r\nOn the same day, he made a deposit of $ 500 and launched a trading robot and after 3 hours his account had $ 3750 and a week later $ 563700. \r\nOn the robot, you earn in the currency of your country, Europe - EUR, Australia - AUD, Canada - CAD, Sweden - SEC and so on. \r\nHurry up to register as after the influx of new users, the administrators decided to stop registering new users from next week. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8aMsu&sa=D&13=28&usg=AFQjCNGiMsVvcKCjtUl1s1o9fbbu24TnPA', '2021-11-19', '09:46 PM', 'deactive'),
(68, NULL, 'JamesMounk', '81556723411', '20', 'Launch Artificial Intelligence with one button and earn from $ 7686 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8efyS&sa=D&63=50&usg=AFQjCNE19L0R90htG4gSNamEaeldZ-6c8g <<<<<<<<<<<<<<<<<<<<<<<<', '2021-11-22', '01:17 PM', 'deactive'),
(69, NULL, 'JamesMounk', '82424734516', '20', 'Quit your job and get passive income from $ 7555 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8h3ls&sa=D&50=00&usg=AFQjCNHU-F0QOtn7o9CQDrCg8wi_ek2Ntw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-11-24', '03:01 AM', 'deactive'),
(70, NULL, 'Daniel', '87984638711', '20', 'Poor website experiences lead 50% of consumers to shop with competitors. Is your website driving sales? \r\n \r\nUpgrade your online presence with big savings and bigger benefits, such as: \r\n \r\n1. Custom branding \r\n2. Sleek, modern codebase for optimal speed \r\n3. Memorable customer experience \r\n4. Improved website CTR \r\n5. Modern visual design \r\n \r\nOur Black Friday deal is the best time to get a custom website at an affordable rate. We’re offering an astounding 30% off. Hurry, this offer ends November 29. \r\n \r\nAlready have a high-performing website and just need more traffic? Get 30% off the first 6 months of content and SEO management. These services can provide the following benefits. \r\n \r\n- Generate relevant and quality organic traffic long term \r\n- Engage website visitors with helpful content \r\n- Build an in-bound marketing strategy \r\n- Educate consumers about the value you provide \r\n \r\nFor best results, you can combine the custom website offer with the content and SEO deal! \r\n \r\nLearn more about us here: https://bit.ly/3CMTbbm', '2021-11-24', '08:09 PM', 'deactive'),
(71, NULL, 'Mike Howard\r\n', '85289441944', '20', 'Hi there \r\n \r\nDo you want a quick boost in ranks and sales for your website? \r\nHaving a high DA score, always helps \r\n \r\nGet your jpsrhosur.in to have a DA between 50 to 60 points in Moz with us today and reap the benefits of such a great feat. \r\n \r\nSee our offers here: \r\nhttps://www.strictlydigital.net/product/moz-da50-seo-plan/ \r\n \r\nOn SALE: \r\nhttps://www.strictlydigital.net/product/ahrefs-dr60/ \r\n \r\nThank you \r\nMike Howard\r\n', '2021-11-27', '02:22 AM', 'deactive'),
(72, NULL, 'Princeget', '81551151372', '20', 'According to Binance, this is the best trading robot in the world №*\"- \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&08=62&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ \r\nBecause he is able to make 200% profit every day \"_\"= \r\nFor example, you replenished your brokerage account with $ 500 (EUR, GBP, etc.) and he earned you from $ 1000 in net income within a day !^%( \r\nBinance recommends using this particular trading robot for automated trading ();= \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&18=94&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ', '2021-11-27', '10:43 PM', 'deactive'),
(73, NULL, 'Les Scadding', '81233845654', '20', 'Can you devote your time to run a humanitarian charity project in helping the needy and less privileged people around your community ? please reply to Mr Les:   Lesscadding2001@gmail.com', '2021-11-29', '05:37 PM', 'deactive'),
(74, NULL, 'Leon Bonnet', '82628233733', '20', 'Hello \r\n \r\nMy main objective here, is to help increase revenue for you by producing an animated video that will generate leads and sales for your business 24/7, for just $97. \r\n \r\nBut this offer is only good this week, so get your video before the deadline. \r\n \r\nWatch Our Video Now! ( https://bit.ly/Xpress97offer ) \r\n \r\nFor less than you spend on coffee each month you get an American Owned Video company that can write your script, create your story board, lay-in a good soundtrack and produce an awesome video that brings home the bacon. \r\n \r\nAgain, this $97 promotion is for this week only. Don’t miss out!!! \r\n \r\nWatch Our Video Now! ( https://bit.ly/Xpress97offer )', '2021-11-30', '04:15 AM', 'deactive'),
(75, NULL, 'PatrickceapE', '82988538663', '20', 'Blockchain recommends to all people who are interested in additional permanent passive income of $ 5000 per day with a cryptocurrency trading robot. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&46=59&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ \r\nA trading robot is capable of making from 750% to 15000% profit per day №^:) \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&29=32&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ \r\nThis success was achieved thanks to the advanced developments in the field of artificial intelligence ;+!# \r\nTens of thousands of people around the world are already using this trading robot, so start you %*)( \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&01=53&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ \r\nTo start, you need to do just three things: \r\n1. Make a deposit to your brokerage account from $ 500 \"-\"* \r\n2. Launch the trading robot ;%:* \r\n3. Receive passive income from $ 5000 per day \"+*# \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&91=25&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ', '2021-11-30', '01:18 PM', 'deactive');

-- --------------------------------------------------------

--
-- Table structure for table `train_timings`
--

CREATE TABLE `train_timings` (
  `id` int(11) NOT NULL,
  `location` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `train_name` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `train_no` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `days` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `departure_place` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `departure_time` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `arrival_place` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `arrival_time` varchar(600) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train_timings`
--

INSERT INTO `train_timings` (`id`, `location`, `train_name`, `train_no`, `days`, `departure_place`, `departure_time`, `arrival_place`, `arrival_time`) VALUES
(5, '2', 'Spl Train', '232878', 'All days', 'Hosur', '7:00 AM', 'Madurai', '5:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `transformation_list`
--

CREATE TABLE `transformation_list` (
  `id` int(11) NOT NULL,
  `location` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 DEFAULT NULL,
  `image_path` text CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8 DEFAULT NULL,
  `reg_date` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `reg_time` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(500) NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transformation_list`
--

INSERT INTO `transformation_list` (`id`, `location`, `user_id`, `title`, `image_path`, `description`, `reg_date`, `reg_time`, `status`) VALUES
(1, '2', 1, 'hbdhdbfdf', 'news_images/305734308dzire.png', 'nbxhcbxhycbxc\r\nsdbhfbdf\r\ndfbdhjfbdf\r\ndfjndjfdnfdbfbdfbdfbdfdf', '2020-11-11', '11:55 PM', 'active'),
(2, '2', 1, 'testing 4', 'news_images/1503641949Home-Banner.jpg', 'hbhjjhvjhvh', '2020-11-22', '03:17 PM', 'active'),
(3, '2', 5, 'RAJ_TEST', 'news_images/39723543MyCutesyDonut_1607704903140.png', 'RAJ TEST TRANFORMATION', '2020-12-13', '08:43 AM', 'active'),
(4, '2', 1, 'testing Hosur', 'news_images/11682189441597124592WhatsApp_Image_2020-12-13_at_8.39.18_AM.jpeg', 'testing purpose news', '2020-12-25', '10:43 PM', 'deactive'),
(5, '2', 1, 'testing news', 'news_images/32010677239723543MyCutesyDonut_1607704903140.png', 'purpose of news', '2020-12-25', '10:46 PM', 'deactive'),
(6, '2', 1, 'news', 'news_images/13292489081040809597APP_Wall_Final_(3)_(1).png', 'latest testing news', '2020-12-25', '10:53 PM', 'deactive'),
(7, '2', 11, 'electric wires', 'news_images/52480659Tulips.jpg', 'wires are hanging and not properly alligned. please look into it.A wire is a single usually cylindrical, flexible strand or rod of metal. Wires are used to bear mechanical loads or electricity and telecommunications signals. Wire is commonly formed by drawing the metal through a hole in a die or draw plate. Wire gauges come in various standard sizes, as expressed in terms of a gauge number. The term \'wire\' is also used more loosely to refer to a bundle of such strands, as in \"multistranded wire\", which is more correctly termed a wire rope in mechanics, or a cable in electricity.\r\n\r\nWire comes in solid core, stranded, or braided forms. Although usually circular in cross-section, wire can be made in square, hexagonal, flattened rectangular, or other cross-sections, either for decorative purposes, or for technical purposes such as high-efficiency voice coils in loudspeakers. Edge-wound[1] coil springs, such as the Slinky toy, are made of special flattened wire.n Antiquity, jewelry often contains, in the form of chains and applied decoration, large amounts of wire that is accurately made and which must have been produced by some efficient, if not technically advanced, means. In some cases, strips cut from metal sheet were made into wire by pulling them through perforations in stone beads. This causes the strips to fold round on themselves to form thin tubes. This strip drawing technique was in use in Egypt by the 2nd Dynasty. From the middle of the 2nd millennium BCE most of the gold wires in jewellery are characterised by seam lines that follow a spiral path along the wire. Such twisted strips can be converted into solid round wires by rolling them between flat surfaces or the strip wire drawing method. The strip twist wire manufacturing method was superseded by drawing in the ancient Old World sometime between about the 8th and 10th centuries AD.[2] There is some evidence for the use of drawing further East prior to this period.[3]\r\n\r\nSquare and hexagonal wires were possibly made using a swaging technique. In this method a metal rod was struck between grooved metal blocks, or between a grooved punch and a grooved metal anvil. Swaging is of great antiquity, possibly dating to the beginning of the 2nd millennium BCE in Egypt and in the Bronze and Iron Ages in Europe for torcs and fibulae. Twisted square-section wires are a very common filigree decoration in early Etruscan jewelry.\r\n\r\nIn about the middle of the 2nd millennium BCE, a new category of decorative tube was introduced which imitated a line of granules. True beaded wire, produced by mechanically distorting a round-section wire, appeared in the Eastern Mediterranean and Italy in the seventh century BCE, perhaps disseminated by the Phoenicians. Beaded wire continued to be used in jewellery into modern times, although it largely fell out of favour in about the tenth century CE when two drawn round wires, twisted together to form what are termed \'ropes\', provided a simpler-to-make alternative. A forerunner to beaded wire may be the notched strips and wires which first occur from around 2000 BCE in Anatolia.\r\n\r\n\r\nSophie Ryder\'s galvanised wire sculpture Sitting at the Yorkshire Sculpture Park\r\nWire was drawn in England from the medieval period. The wire was used to make wool cards and pins, manufactured goods whose import was prohibited by Edward IV in 1463.[4] The first wire mill in Great Britain was established at Tintern in about 1568 by the founders of the Company of Mineral and Battery Works, who had a monopoly on this.[5] Apart from their second wire mill at nearby Whitebrook,[6] there were no other wire mills before the second half of the 17th century. Despite the existence of mills, the drawing of wire down to fine sizes continued to be done manually.\r\n\r\nAccording to a description in the early 20th century, \"[w]ire is usually drawn of cylindrical form; but it may be made of any desired section by varying the outline of the holes in the draw-plate through which it is passed in the process of manufacture. The draw-plate or die is a piece of hard cast-iron or hard steel, or for fine work it may be a diamond or a ruby. The object of utilising precious stones is to enable the dies to be used for a considerable period without losing their size, and so producing wire of incorrect diameter. Diamond dies must be rebored when they have lost their original diameter of hole, but metal dies are brought down to size again by hammering up the hole and then drifting it out to correct diameter with a punch.\"[7]\r\n\r\nUses\r\n\r\nSee also: Copper wire and cable\r\n\r\nThis section is largely based on an article in the out-of-copyright Encyclopædia Britannica Eleventh Edition, which was produced in 1911. It should be brought up to date to reflect subsequent history or scholarship (including the references, if any). When you have completed the review, replace this notice with a simple note on this article\'s talk page. (August 2020)\r\n\r\nClose-up of strings for a piano shows \"overspun\" helical wire wrapping added to main carrier wires\r\nWire has many uses. It forms the raw material of many important manufacturers, such as the wire netting industry, engineered springs, wire-cloth making and wire rope spinning, in which it occupies a place analogous to a textile fiber. Wire-cloth of all degrees of strength and fineness of mesh is used for sifting and screening machinery, for draining paper pulp, for window screens, and for many other purposes. Vast quantities of aluminium, copper, nickel and steel wire are employed for telephone and data cables, and as conductors in electric power transmission, and heating. It is in no less demand for fencing, and much is consumed in the construction of suspension bridges, and cages, etc. In the manufacture of stringed musical instruments and scientific instruments, wire is again largely used. Carbon and stainless spring steel wire have significant applications in engineered springs for critical automotive or industrial manufactured parts/components. Pin and hairpin making; the needle and fish-hook industries; nail, peg, and rivet making; and carding machinery consume large amounts of wire as feedstock.[7]\r\n\r\nNot all metals and metallic alloys possess the physical properties necessary to make useful wire. The metals must in the first place be ductile and strong in tension, the quality on which the utility of wire principally depends. The principal metals suitable for wire, possessing almost equal ductility, are platinum, silver, iron, copper, aluminium, and gold; and it is only from these and certain of their alloys with other metals, principally brass and bronze, that wire is prepared.[7]\r\n\r\nBy careful treatment, extremely thin wire can be produced. Special purpose wire is however made from other metals (e.g. tungsten wire for light bulb and vacuum tube filaments, because of its high melting temperature). Copper wires are also plated with other metals, such as tin, nickel, and silver to handle different temperatures, provide lubrication, and provide easier stripping of rubber insulation from copper.\r\n\r\nMetallic wires are often used for the lower-pitched sound-producing \"strings\" in stringed instruments, such as violins, cellos, and guitars, and percussive string instruments such as pianos, dulcimers, dobros, and cimbaloms. To increase the mass per unit length (and thus lower the pitch of the sound even further), the main wire may sometimes be helically wrapped with another, finer strand of wire. Such musical strings are said to be \"overspun\"; the added wire may be circular in cross-section (\"round-wound\"), or flattened before winding (\"flat-wound\").', '2021-04-19', '07:47 PM', 'deactive');

-- --------------------------------------------------------

--
-- Table structure for table `trust_category`
--

CREATE TABLE `trust_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trust_category`
--

INSERT INTO `trust_category` (`id`, `category_name`) VALUES
(3, 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `trust_details`
--

CREATE TABLE `trust_details` (
  `id` int(11) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image_path` text DEFAULT NULL,
  `video_path` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upload_photos`
--

CREATE TABLE `upload_photos` (
  `id` int(11) NOT NULL,
  `image_path` text DEFAULT NULL,
  `type` varchar(600) DEFAULT NULL,
  `size` varchar(600) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_photos`
--

INSERT INTO `upload_photos` (`id`, `image_path`, `type`, `size`) VALUES
(3, 'photos/20200904135221_blog1.jpg', 'image/jpeg', '177288'),
(4, 'photos/20200904135221_blog2.jpg', 'image/jpeg', '88146'),
(5, 'photos/20200904135221_blog3.jpg', 'image/jpeg', '118771'),
(6, 'photos/20200904135221_blog4.jpg', 'image/jpeg', '86811'),
(7, 'photos/20200904135221_blog6.jpg', 'image/jpeg', '22738');

-- --------------------------------------------------------

--
-- Table structure for table `upload_videos`
--

CREATE TABLE `upload_videos` (
  `id` int(11) NOT NULL,
  `video_path` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_videos`
--

INSERT INTO `upload_videos` (`id`, `video_path`) VALUES
(5, 'videos/414813805video.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `user_member_details`
--

CREATE TABLE `user_member_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `member_name` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `member_dob` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `member_relationship` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `member_wedding_day` varchar(600) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_member_details`
--

INSERT INTO `user_member_details` (`id`, `user_id`, `member_name`, `member_dob`, `member_relationship`, `member_wedding_day`) VALUES
(19, 3, 'Thamu', '1990-10-10', 'Me', '2020-11-11'),
(22, 5, 'hemalatha', '1976-12-06', '', '1998-12-09'),
(25, 7, 'NAGARAJ', '', 'FATHER', ''),
(26, 1, 'Ramesh', '1993-05-11', 'Me', '2222-11-11'),
(27, 1, 'Thamu', '1991-11-22', 'Brother', '2021-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `user_registration_details`
--

CREATE TABLE `user_registration_details` (
  `id` int(11) NOT NULL,
  `user_code` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `name` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(800) CHARACTER SET utf8 DEFAULT NULL,
  `city` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `business_display_city` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `area` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `ward_no` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `aadhaar_no` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `occupation_type` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `company_name` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `business_name` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `salary_income` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `business_income` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `year` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `reg_date` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `reg_time` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `ip_address` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `profile_pic` text CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(500) CHARACTER SET utf8 NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_registration_details`
--

INSERT INTO `user_registration_details` (`id`, `user_code`, `name`, `phone`, `email`, `password`, `city`, `business_display_city`, `area`, `ward_no`, `aadhaar_no`, `occupation_type`, `company_name`, `business_name`, `salary_income`, `business_income`, `year`, `reg_date`, `reg_time`, `ip_address`, `profile_pic`, `status`) VALUES
(1, 'JPSR21001', 'Ramesh', '8838272618', 'ramesh@gmail.com', 'Nrzvh8GC+HhYuUfeVI55eA==', 'Madurai', '1', '17', '1', '123456789012', 'self employee', '', 'JPSR Business', '', 'Above 50,000', '2021', '2021-12-14', '09:26 PM', NULL, '', 'active'),
(2, 'JPSR21002', 'sivaraaman', '9842784234', 'jpsrbusiness@gmail.com', 'UJK+WhubWgw1e7Tf4Pk1Vw==', 'Hosur ', '1', '527', '40', '383594167138', NULL, NULL, NULL, NULL, NULL, '2021', '2021-12-23', '09:29 PM', NULL, NULL, 'active'),
(3, 'JPSR21003', 'Thamodharan', '8220559784', 'thamu@gmail.com', 'Nrzvh8GC+HhYuUfeVI55eA==', 'Madurai', '1', NULL, NULL, '123456789012', 'self employee', '', 'JPSR Business', '', 'Above 50,000', '2021', '2021-12-26', '11:14 PM', NULL, 'profile_pictures/1456322293gallery1.jfif', 'active'),
(4, 'JPSR22001', 'Hemalatha', '9994586474', 'hemasripower@gmail.com', 'bt2MTFtKZGtOIOfpB1II9Q==', 'Hosur', '1', NULL, NULL, '256787634308', NULL, NULL, NULL, NULL, NULL, '2022', '2022-01-08', '12:54 PM', NULL, NULL, 'active'),
(5, 'JPSR22002', 'JPSR', '9715020000', 'jpsrapp3@gmail.com', 'Pra+cc3V8v71Rw3CxoO1KQ==', 'hosur', '1', '355', '27', '', 'self employee', '', 'ADVERTING', '', 'Below 25,000', '2022', '2022-01-11', '10:24 AM', NULL, NULL, 'active'),
(6, 'JPSR22003', 'LGM23E www.telegra.ph/Your-Win-01-14#', 'LGM23E www.telegra.ph/Your-Win-01-14#', 'muscotamik1982@mail.ru', 'vq0Oi4JBp/e14FPHyMljo0b6j2CmSPDf4Jpb/AIw17GGrNTlDB3Ds2sc8MepGhnS', 'LGM23E www.telegra.ph/Your-Win-01-14#', NULL, NULL, NULL, 'LGM23E www.telegra.ph/Your-Win-01-14#', NULL, NULL, NULL, NULL, NULL, '2022', '2022-01-15', '04:23 PM', NULL, NULL, 'active'),
(7, 'JPSR22004', 'SOUNDARYA N', '9842811558', 'vidhya@gmail.com', 'UJK+WhubWgw1e7Tf4Pk1Vw==', 'Hosur', '1', NULL, '2', '', 'salaried', 'JPSR ENTERPRISESS', '', 'Below 10,000', '', '2022', '2022-01-17', '01:08 PM', NULL, 'profile_pictures/2110128113cfeaab3e6bc92776cf164707bba714e5.jpg', 'active'),
(8, 'JPSR22005', 'Despi', '9443101806', 'despinashree2003@gmail.com', '3qIXekpc3dWflpribdECtA==', 'Hosur', '1', NULL, NULL, '316176393278', NULL, NULL, NULL, NULL, NULL, '2022', '2022-01-17', '07:05 PM', NULL, NULL, 'active'),
(9, 'JPSR226', 'Ramesh Ravi', '9626061921', 'rameshrbsc@gmail.com', 'Nrzvh8GC+HhYuUfeVI55eA==', 'Selam', '1', '227', '15', '875457438458', 'salaried', 'Ramesh & company', '', 'Below 25,000', '', '2022', '2022-01-22', '10:48 PM', NULL, NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `wardno_list`
--

CREATE TABLE `wardno_list` (
  `id` int(11) NOT NULL,
  `location` int(11) DEFAULT NULL,
  `ward_no` int(11) DEFAULT NULL,
  `area_name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wardno_list`
--

INSERT INTO `wardno_list` (`id`, `location`, `ward_no`, `area_name`, `status`) VALUES
(1, 1, 1, 'Zuzuvadi', '1'),
(2, 1, 2, 'Zuzuvadi', '1'),
(3, 1, 3, 'Bedarapalli', '1'),
(4, 1, 4, 'Chinna Elasagiri, Maruthi Nagar, Santhapuram, Sipcot', '1'),
(5, 1, 5, 'Chinna Elasagiri & Annamalai Nagar', '1'),
(6, 1, 6, 'K.C.C.Nagar', '1'),
(7, 1, 7, 'Moovendhar Nagar,Avalapalli Hudco,GKD Nagar,JJ Nagar', '1'),
(8, 1, 8, 'Basthi, Basthi Garden, Vinayakapuram, Indhiragandhi Nagar', '1'),
(9, 1, 9, 'Avalapalli ,Thirumalai Nagar ,Bharathiyar Nagar, Thottagiri', '1'),
(10, 1, 10, 'Venkatesh Nagar, Alasanatham , Thottagiri Rd', '1'),
(11, 1, 11, 'Indhira Nagar , Old Vasanth Nagar , Vasanth Nagar ,Bagalur\nRd', '1'),
(12, 1, 12, 'TNHB Bagalur Hudco ,Phase VII, Rajiv Colony', '1'),
(13, 1, 13, 'KRISHNA NAGAR ,VENKATESWARA NAGAR ,KURNJI NAGAR\nTEACHERS COLONY', '1'),
(14, 1, 14, 'VAISHNAVI NAGAR, Lakshmi Narayana Nagar, Bangalore\nBye –pass Road', '1'),
(15, 1, 15, 'Dharga , Sipcot Housing Colony ,Samadhanapuram,\nDwaraka Nagar', '1'),
(16, 1, 16, 'Bharathi Nagar, Suriya Nagar, Arasanatty Green Garden', '1'),
(17, 1, 17, 'Mookandapalli', '1'),
(18, 1, 18, 'Nethaji Nagar, Annai Sathya Nagar, Sivaji Nagar', '1'),
(19, 1, 19, 'Mookandapalli', '1'),
(20, 1, 20, 'Mookandapalli', '1'),
(21, 1, 21, 'Kothur, Motham Agraharam, AVS Housing Colony', '1'),
(22, 1, 22, 'Muneeswar Nagar , Muneeswar Nagar Extn, Annai Nagar\nSivakumar Nagar', '1'),
(23, 1, 23, 'Old ASCT Hudco, Mahalakshmi Nagar, Palayam', '1'),
(24, 1, 24, 'Ram Nagar, Tank Street', '1'),
(25, 1, 25, 'Nethaji Road,Namalpet,Weavers Street', '1'),
(26, 1, 26, 'Parvathi Nagar, Adi Dravidar Street, Kumbarpettai,\nKaalekunta', '1'),
(27, 1, 27, 'Seetharam Nagar ,Narasamma Colony , Alsanatham Road', '1'),
(28, 1, 28, 'Chennathur', '1'),
(29, 1, 29, 'Sanasandhiram, Mullai Nagar, Old RK Hudco, Rajaganapathi\nNagar', '1'),
(30, 1, 30, 'Min Nagar,Therpettai East , Rajaji Nagar, Rayakottai\nRoad', '1'),
(31, 1, 31, 'Seven house Street, Mugamathiyar Street, Kamaraj\nColony , OLD TEMPLE LAND HUDCO', '1'),
(32, 1, 32, 'Anna Nagar , Jai Shankar Colony , Alamaram Street,\nVellalar Street', '1'),
(33, 1, 33, 'CC Nagar, Santhi Nagar, Denkanikottai Rd', '1'),
(34, 1, 34, 'Appavu Nagar, Thally Hudco, Muthurayan Jeebi', '1'),
(35, 1, 35, 'New ASTC Hudco,Muneeshwar Nagar,Jai Sakthi Nagar', '1'),
(36, 1, 36, 'Andivadi', '1'),
(37, 1, 37, 'TVS Nagar, SBM Colony, Midigarapalli', '1'),
(38, 1, 38, 'Dinnur', '1'),
(39, 1, 39, 'Denkanikotta Road', '1'),
(40, 1, 40, 'BHARATHIDASAN NAGAR 1ST CROSS, PERIYAR NAGAR\nEAST, MANOHAR NAGAR', '1'),
(41, 1, 41, 'Rayakottai Housing Board', '1'),
(42, 1, 42, 'Bharathidasan Nagar', '1'),
(43, 1, 43, 'Amman Nagar, Mathigiri', '1'),
(44, 1, 44, 'Karnoor, Mathigiri', '1'),
(45, 1, 45, 'Titan Township, Mathigiri', '1');

-- --------------------------------------------------------

--
-- Table structure for table `wishes_comments_list`
--

CREATE TABLE `wishes_comments_list` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wishes_id` int(11) NOT NULL,
  `comments` text CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'active',
  `reg_date` varchar(100) DEFAULT NULL,
  `reg_time` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishes_comments_list`
--

INSERT INTO `wishes_comments_list` (`id`, `user_id`, `wishes_id`, `comments`, `status`, `reg_date`, `reg_time`) VALUES
(1, 1, 2, 'Hi ', 'active', '2020-12-09', '03:34 AM'),
(2, 1, 1, 'Happy Birthday', 'active', '2020-12-09', '03:35 AM'),
(3, 1, 1, 'treat Kuduthuru', 'active', '2020-12-09', '03:35 AM'),
(4, 1, 5, 'Happy birthday da', 'active', '2021-03-29', '01:37 AM');

-- --------------------------------------------------------

--
-- Table structure for table `wishes_like_list`
--

CREATE TABLE `wishes_like_list` (
  `id` int(11) NOT NULL,
  `user_id` varchar(500) DEFAULT NULL,
  `wishes_id` varchar(500) DEFAULT NULL,
  `likes` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishes_like_list`
--

INSERT INTO `wishes_like_list` (`id`, `user_id`, `wishes_id`, `likes`) VALUES
(15, '1', '2', '1'),
(16, '1', '1', '1'),
(18, '1', '5', '1'),
(19, '7', '6', '1'),
(20, '7', '5', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus_details`
--
ALTER TABLE `aboutus_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_help_videos`
--
ALTER TABLE `add_help_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_languages`
--
ALTER TABLE `add_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ads_payment_period`
--
ALTER TABLE `ads_payment_period`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ads_payment_subscription`
--
ALTER TABLE `ads_payment_subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisement_list`
--
ALTER TABLE `advertisement_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_personal_information`
--
ALTER TABLE `agent_personal_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_pages_list`
--
ALTER TABLE `all_pages_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area_list`
--
ALTER TABLE `area_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_details`
--
ALTER TABLE `article_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `available_location`
--
ALTER TABLE `available_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_details`
--
ALTER TABLE `banner_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `birthday_wishes`
--
ALTER TABLE `birthday_wishes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_category_list`
--
ALTER TABLE `business_category_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_directory_image_activation`
--
ALTER TABLE `business_directory_image_activation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_directory_list`
--
ALTER TABLE `business_directory_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_payment_images`
--
ALTER TABLE `business_payment_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_payment_period`
--
ALTER TABLE `business_payment_period`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_payment_subscription`
--
ALTER TABLE `business_payment_subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_period`
--
ALTER TABLE `business_period`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_personal_chat_details`
--
ALTER TABLE `business_personal_chat_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_plan`
--
ALTER TABLE `business_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_subscription`
--
ALTER TABLE `business_subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_timings`
--
ALTER TABLE `bus_timings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_history`
--
ALTER TABLE `chat_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_feedback_details`
--
ALTER TABLE `contact_feedback_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_information`
--
ALTER TABLE `contact_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `directory_gallery_images`
--
ALTER TABLE `directory_gallery_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disclaimer_details`
--
ALTER TABLE `disclaimer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district_list`
--
ALTER TABLE `district_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergency_services`
--
ALTER TABLE `emergency_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gold_list`
--
ALTER TABLE `gold_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `government_offices_list`
--
ALTER TABLE `government_offices_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page_ads`
--
ALTER TABLE `home_page_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_premium_ad`
--
ALTER TABLE `home_premium_ad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industry_offers`
--
ALTER TABLE `industry_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jpsr_business_services`
--
ALTER TABLE `jpsr_business_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jpsr_doctor_appointment`
--
ALTER TABLE `jpsr_doctor_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jpsr_groceries`
--
ALTER TABLE `jpsr_groceries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jpsr_home_services`
--
ALTER TABLE `jpsr_home_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jpsr_other_services`
--
ALTER TABLE `jpsr_other_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jpsr_property_services`
--
ALTER TABLE `jpsr_property_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jpsr_query_details`
--
ALTER TABLE `jpsr_query_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jpsr_renting_services`
--
ALTER TABLE `jpsr_renting_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jpsr_reselling_services`
--
ALTER TABLE `jpsr_reselling_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jpsr_services`
--
ALTER TABLE `jpsr_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jpsr_services_category`
--
ALTER TABLE `jpsr_services_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jpsr_videos`
--
ALTER TABLE `jpsr_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_access_details`
--
ALTER TABLE `login_access_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_category_list`
--
ALTER TABLE `news_category_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_list`
--
ALTER TABLE `news_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers_list`
--
ALTER TABLE `offers_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_amount`
--
ALTER TABLE `offer_amount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_banners`
--
ALTER TABLE `offer_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_category_list`
--
ALTER TABLE `offer_category_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp_services`
--
ALTER TABLE `otp_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_gateway_list`
--
ALTER TABLE `payment_gateway_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petrol_list`
--
ALTER TABLE `petrol_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policy_details`
--
ALTER TABLE `policy_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_income`
--
ALTER TABLE `referral_income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media_list`
--
ALTER TABLE `social_media_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_list`
--
ALTER TABLE `state_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_list`
--
ALTER TABLE `store_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_popup_ad`
--
ALTER TABLE `sub_popup_ad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temples_list`
--
ALTER TABLE `temples_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temple_images`
--
ALTER TABLE `temple_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial_list`
--
ALTER TABLE `testimonial_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `train_timings`
--
ALTER TABLE `train_timings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transformation_list`
--
ALTER TABLE `transformation_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trust_category`
--
ALTER TABLE `trust_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trust_details`
--
ALTER TABLE `trust_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_photos`
--
ALTER TABLE `upload_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_videos`
--
ALTER TABLE `upload_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_member_details`
--
ALTER TABLE `user_member_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_registration_details`
--
ALTER TABLE `user_registration_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wardno_list`
--
ALTER TABLE `wardno_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishes_comments_list`
--
ALTER TABLE `wishes_comments_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishes_like_list`
--
ALTER TABLE `wishes_like_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus_details`
--
ALTER TABLE `aboutus_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `add_help_videos`
--
ALTER TABLE `add_help_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `add_languages`
--
ALTER TABLE `add_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ads_payment_period`
--
ALTER TABLE `ads_payment_period`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ads_payment_subscription`
--
ALTER TABLE `ads_payment_subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `advertisement_list`
--
ALTER TABLE `advertisement_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `agent_personal_information`
--
ALTER TABLE `agent_personal_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `all_pages_list`
--
ALTER TABLE `all_pages_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `area_list`
--
ALTER TABLE `area_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=615;

--
-- AUTO_INCREMENT for table `article_details`
--
ALTER TABLE `article_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `available_location`
--
ALTER TABLE `available_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banner_details`
--
ALTER TABLE `banner_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `birthday_wishes`
--
ALTER TABLE `birthday_wishes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `business_category_list`
--
ALTER TABLE `business_category_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=970;

--
-- AUTO_INCREMENT for table `business_directory_image_activation`
--
ALTER TABLE `business_directory_image_activation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `business_directory_list`
--
ALTER TABLE `business_directory_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `business_payment_images`
--
ALTER TABLE `business_payment_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `business_payment_period`
--
ALTER TABLE `business_payment_period`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `business_payment_subscription`
--
ALTER TABLE `business_payment_subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `business_period`
--
ALTER TABLE `business_period`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `business_personal_chat_details`
--
ALTER TABLE `business_personal_chat_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `business_plan`
--
ALTER TABLE `business_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `business_subscription`
--
ALTER TABLE `business_subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bus_timings`
--
ALTER TABLE `bus_timings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chat_history`
--
ALTER TABLE `chat_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `contact_feedback_details`
--
ALTER TABLE `contact_feedback_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_information`
--
ALTER TABLE `contact_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `directory_gallery_images`
--
ALTER TABLE `directory_gallery_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `disclaimer_details`
--
ALTER TABLE `disclaimer_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `district_list`
--
ALTER TABLE `district_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `emergency_services`
--
ALTER TABLE `emergency_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gold_list`
--
ALTER TABLE `gold_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `government_offices_list`
--
ALTER TABLE `government_offices_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `home_page_ads`
--
ALTER TABLE `home_page_ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `home_premium_ad`
--
ALTER TABLE `home_premium_ad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `industry_offers`
--
ALTER TABLE `industry_offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jpsr_business_services`
--
ALTER TABLE `jpsr_business_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jpsr_doctor_appointment`
--
ALTER TABLE `jpsr_doctor_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jpsr_groceries`
--
ALTER TABLE `jpsr_groceries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jpsr_home_services`
--
ALTER TABLE `jpsr_home_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jpsr_other_services`
--
ALTER TABLE `jpsr_other_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jpsr_property_services`
--
ALTER TABLE `jpsr_property_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jpsr_query_details`
--
ALTER TABLE `jpsr_query_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jpsr_renting_services`
--
ALTER TABLE `jpsr_renting_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jpsr_reselling_services`
--
ALTER TABLE `jpsr_reselling_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jpsr_services`
--
ALTER TABLE `jpsr_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jpsr_services_category`
--
ALTER TABLE `jpsr_services_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `jpsr_videos`
--
ALTER TABLE `jpsr_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_access_details`
--
ALTER TABLE `login_access_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news_category_list`
--
ALTER TABLE `news_category_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `news_list`
--
ALTER TABLE `news_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `offers_list`
--
ALTER TABLE `offers_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `offer_amount`
--
ALTER TABLE `offer_amount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offer_banners`
--
ALTER TABLE `offer_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `offer_category_list`
--
ALTER TABLE `offer_category_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `otp_services`
--
ALTER TABLE `otp_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payment_gateway_list`
--
ALTER TABLE `payment_gateway_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `petrol_list`
--
ALTER TABLE `petrol_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `policy_details`
--
ALTER TABLE `policy_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `referral_income`
--
ALTER TABLE `referral_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `social_media_list`
--
ALTER TABLE `social_media_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `state_list`
--
ALTER TABLE `state_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `store_list`
--
ALTER TABLE `store_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_popup_ad`
--
ALTER TABLE `sub_popup_ad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `temples_list`
--
ALTER TABLE `temples_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `temple_images`
--
ALTER TABLE `temple_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `testimonial_list`
--
ALTER TABLE `testimonial_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `train_timings`
--
ALTER TABLE `train_timings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transformation_list`
--
ALTER TABLE `transformation_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trust_category`
--
ALTER TABLE `trust_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trust_details`
--
ALTER TABLE `trust_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upload_photos`
--
ALTER TABLE `upload_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `upload_videos`
--
ALTER TABLE `upload_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_member_details`
--
ALTER TABLE `user_member_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_registration_details`
--
ALTER TABLE `user_registration_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wardno_list`
--
ALTER TABLE `wardno_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `wishes_comments_list`
--
ALTER TABLE `wishes_comments_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishes_like_list`
--
ALTER TABLE `wishes_like_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
