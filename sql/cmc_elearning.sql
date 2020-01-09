-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 09, 2020 at 08:30 AM
-- Server version: 5.7.21
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmc_elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

DROP TABLE IF EXISTS `about_us`;
CREATE TABLE IF NOT EXISTS `about_us` (
  `about_id` int(11) NOT NULL AUTO_INCREMENT,
  `name_page` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `meta_page_title` text COLLATE utf8_unicode_ci,
  `meta_description` text COLLATE utf8_unicode_ci,
  `meta_keyword` text COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`about_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`about_id`, `name_page`, `content`, `meta_page_title`, `meta_description`, `meta_keyword`, `created_at`, `updated_at`) VALUES
(1, 'About', '<h2><strong>OUR MISSION</strong></h2>\r\n\r\n<p>To Serve Society in Partnership with the Medical Profession by providing quality medical products and excellent services with professionalism</p>\r\n\r\n<h2><strong>OUR VISION</strong></h2>\r\n\r\n<p>To be The Leading Total Medical Equipment and Informatics&nbsp; Solution Provider in Southeast Asia</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h1><span style=\"color:#3333cc\"><strong>CORPORATE INFORMATION</strong></span></h1>\r\n\r\n<p><img alt=\"\" src=\"http://www.cmcbiotech.co.th/th/wp-content/uploads/2019/11/CMC-2.jpg\" style=\"height:255px; width:340px\" /><img alt=\"\" src=\"http://www.cmcbiotech.co.th/th/wp-content/uploads/2019/06/CMC-2.jpg\" style=\"height:255px; width:340px\" /></p>\r\n\r\n<table border=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Company :</td>\r\n			<td>CMC Biotech Co., Ltd.&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Founded&nbsp; :</td>\r\n			<td>1963</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Incorporated :&nbsp;</td>\r\n			<td>19 December 1991</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Head office :</td>\r\n			<td>364&nbsp;Soi Ladprao 94 (Panjamitr) Ladprao Road, Phlabphla, Wang Thong Lang, Bangkok 10310, Thailand</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tel :</td>\r\n			<td>+ 66 (2) 530 4995-6&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Fax :</td>\r\n			<td>+ 66 (2) 559 3261</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Call center :</td>\r\n			<td>+ 66 (2) 935 6667-8</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Email :&nbsp;</td>\r\n			<td>Sales_xr@cmcbiotech.co.th<br />\r\n			Sales_us@cmcbiotech.co.th&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h1 style=\"text-align:center\"><strong>OUR HISTORY</strong></h1>\r\n\r\n<p style=\"text-align:center\">Originally founded in 1963, CMC Biotech Co., Ltd. was joined on 19 December 1991. The company&rsquo;s core business is supplying and service for medical equipment. We are the sole distributor of Canon Medical Equipment in Thailand.</p>\r\n\r\n<p style=\"text-align:center\">Our Company believed in the experience and ability of each well trained and qualified service personnel with the objective of &ldquo;Service Excellence With Professionalism&rdquo;.</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<hr />\r\n<h2>To know more about Canon Medical Systems&nbsp;<a href=\"https://global.medical.canon/\" rel=\"noopener\" target=\"_blank\">Click Here</a></h2>\r\n\r\n<table border=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td>1963</td>\r\n			<td>Started distributing Toshiba medical equipment in Thailand (Founding Company, CMC Co., Ltd.)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>1991</td>\r\n			<td>Re- Structured the company with the establishments of CMC Biotech Co., Ltd.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>1994</td>\r\n			<td>Established Northeastern (Khon Kaen) and Southern (Hat Yai) branch offices.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>1997</td>\r\n			<td>Established Northern (Chiangmai) branch office.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>1999</td>\r\n			<td>Secured major orders for Ultrasound scanners in the Danish Loan Project and X-ray systems in OECF Loan Project.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2000</td>\r\n			<td>Awarded &ldquo;The Best Distributor of Toshiba Medical Equipment&rdquo; of the year.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2001</td>\r\n			<td>Starting-up an ICT team within the operation for ICT related business.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2003</td>\r\n			<td>Began sole distributorship of Sedecal X-ray equipment.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2004</td>\r\n			<td>First sale of Sedecal X-ray mobile units.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2005</td>\r\n			<td>Certified ISO 9001:2000</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2010</td>\r\n			<td>Certified ISO 9001:2008</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2017</td>\r\n			<td>Certified ISO 9001:2015</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2018</td>\r\n			<td>Toshiba Medical Systems Name change to Canon Medical&nbsp; Systems</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', 'About Page', 'About Page', 'About Page', '2019-11-26 11:09:36', '2019-11-28 14:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner_title` text COLLATE utf8_unicode_ci,
  `banner_url` text COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `banner_image`, `banner_title`, `banner_url`, `created_at`, `updated_at`) VALUES
(10, '251119_165243.jpg', NULL, 'http://www.cmcbiotech.co.th/th/', '2019-11-25 16:52:44', '2019-11-25 16:52:44'),
(11, '041219_102847.jpg', 'Banner 2', 'http://www.cmcbiotech.co.th/th/', '2019-12-04 10:28:48', '2019-12-27 14:37:47'),
(12, NULL, 'Banner 1', 'https://www.facebook.com/', '2019-12-11 13:51:14', '2019-12-27 14:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

DROP TABLE IF EXISTS `choices`;
CREATE TABLE IF NOT EXISTS `choices` (
  `choice_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) DEFAULT NULL,
  `choice` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `answer` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`choice_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`choice_id`, `question_id`, `choice`, `answer`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 'true', '2019-12-23 15:28:23', '2019-12-23 17:37:38'),
(2, 1, '2', NULL, '2019-12-23 15:28:23', '2019-12-23 17:37:38'),
(3, 2, '11', NULL, '2019-12-23 15:28:23', '2019-12-23 17:37:38'),
(4, 2, '22', 'true', '2019-12-23 15:28:23', '2019-12-23 17:37:38'),
(5, 3, '111', NULL, '2019-12-23 17:21:59', '2019-12-23 17:37:38'),
(6, 3, '222', 'true', '2019-12-23 17:21:59', '2019-12-23 17:37:38'),
(7, 4, '1111', 'true', '2019-12-23 17:21:59', '2019-12-23 17:37:38'),
(8, 4, '2222', NULL, '2019-12-23 17:21:59', '2019-12-23 17:37:38');

-- --------------------------------------------------------

--
-- Table structure for table `comment_lesson`
--

DROP TABLE IF EXISTS `comment_lesson`;
CREATE TABLE IF NOT EXISTS `comment_lesson` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE IF NOT EXISTS `contact_us` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `name_page` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `map_google` text COLLATE utf8_unicode_ci,
  `longitude` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latitude` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_page_title` text COLLATE utf8_unicode_ci,
  `meta_description` text COLLATE utf8_unicode_ci,
  `meta_keyword` text COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `name_page`, `address`, `email`, `map_google`, `longitude`, `latitude`, `meta_page_title`, `meta_description`, `meta_keyword`, `created_at`, `updated_at`) VALUES
(1, 'Contact us', 'Contact us', NULL, '<p><iframe frameborder=\"0\" height=\"600\" scrolling=\"no\" src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7750.243488654262!2d100.607906!3d13.771531!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xee1930fc91cbb7aa!2sCMC%20BIOTECH%20CO.%2C%20LTD.!5e0!3m2!1sen!2sth!4v1574744191863!5m2!1sen!2sth\" width=\"100%\"></iframe></p>', NULL, NULL, 'Contact us', 'Contact us', 'Contact us', '2019-11-26 11:20:19', '2019-11-26 11:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_cat_id` int(11) DEFAULT NULL,
  `course_teacher_id` int(11) DEFAULT NULL,
  `course_vdo_url` text COLLATE utf8_unicode_ci,
  `course_price` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_short_description` text COLLATE utf8_unicode_ci NOT NULL,
  `course_full_description` text COLLATE utf8_unicode_ci,
  `course_is_required` int(11) DEFAULT NULL COMMENT 'id course ที่ต้องผ่านถึงจะซื้อ course นี้ได้',
  `course_image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_view` int(11) NOT NULL DEFAULT '0',
  `course_status` int(11) NOT NULL COMMENT '1 = activate 0 = draft',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_cat_id`, `course_teacher_id`, `course_vdo_url`, `course_price`, `course_short_description`, `course_full_description`, `course_is_required`, `course_image`, `course_view`, `course_status`, `created_at`, `updated_at`) VALUES
(1, 'course1', 1, 2, 'https://www.google.com', '2500', 'Lorem ipsum dolor sit amet.', '<p>test</p>', NULL, '211119_102548.jpg', 22, 1, '2019-11-06 17:13:45', '2019-12-06 16:44:12'),
(2, 'Tested by champ', 4, 2, 'https://www.youtube.com/embed/fYlZDTru55g', '2500', 'ทดสอบ E-learning for tester', '<p style=\"text-align:center\"><iframe frameborder=\"0\" height=\"315\" src=\"https://www.youtube.com/embed/fYlZDTru55g\" width=\"560\"></iframe></p>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>Achieve the best fit for your organization is our goal.</h3>\r\n\r\n<p>&nbsp; &nbsp;All our solutions are tailored to best fit your organization. Because of this, our service contract has been designed to that precisely meets your organization&rsquo;s needs.</p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Service Contract</strong></td>\r\n			<td colspan=\"4\"><strong>Detail of each Service Contract program</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Platinum program</strong></td>\r\n			<td>Preventive Maintenance\r\n			<p>Change periodical part 3 times/ year.</p>\r\n			</td>\r\n			<td>Helpdesk service 24 hours/day, 7 day a week.</td>\r\n			<td>Service 24 hours, unlimited time at customer site.*</td>\r\n			<td>Service includes all Spare Part.</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Gold program</strong></td>\r\n			<td>Preventive Maintenance\r\n			<p>Change periodical part 3 times/ year.</p>\r\n			</td>\r\n			<td>Helpdesk service 24 hours/day, 7 day a week.</td>\r\n			<td>Service 24 hours, unlimited time at customer site.*</td>\r\n			<td>Service includes Spare Part except some Part i.e. X-ray, Tube and&nbsp;<br />\r\n			Detector.</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Silver program</strong></td>\r\n			<td>Preventive Maintenance\r\n			<p>Change periodical part 3 times/ year.</p>\r\n			</td>\r\n			<td>Helpdesk service 24 hours/day, 7 day a week.</td>\r\n			<td>Service 24 hours, unlimited time at customer site.*</td>\r\n			<td>Service excludes free Spare Part.\r\n			<p>Offer 2,000 THB discount for the first time that pay for Spare part. For the next time, 10% discount.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Blue program</strong></td>\r\n			<td>Preventive Maintenance\r\n			<p>Change periodical part 2 times/ year.</p>\r\n			</td>\r\n			<td>Helpdesk service 24 hours/day, 7 day a week.</td>\r\n			<td>Service 24 hours, unlimited time at customer site.*</td>\r\n			<td>Service excludes free Spare Part.\r\n			<p>Offer 1,000 THB discount for the first time that pay for Spare part. For the next time, 10% discount.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Economic program</strong></td>\r\n			<td>Preventive Maintenance\r\n			<p>Change periodical part 2 times/ year.</p>\r\n			</td>\r\n			<td>Helpdesk service 24 hours/day, 7 day a week.</td>\r\n			<td>Service 24 hours at customer site, 2 times a year *</td>\r\n			<td>Service excludes free Spare Part.\r\n			<p>Offer 1,000 THB discount for the first time that pay for Spare part. For the next time, 5% discount.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td colspan=\"4\">* Depends on the problem.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', NULL, '211119_103738.jpg', 25, 1, '2019-11-19 09:07:44', '2019-12-06 13:36:57'),
(3, 'Aplio 500', 5, 3, 'https://www.youtube.com/embed/fH31ecAeNnc', '5000', 'Ultrasound Aplio 500', '<p>Ultrasound Aplio 500</p>', NULL, '191119_101559.jpg', 13, 1, '2019-11-19 10:15:59', '2019-12-11 14:36:16'),
(4, 'Aplio 500', 1, 3, 'https://www.youtube.com/embed/fH31ecAeNnc', '1000', 'test', '<h4>Unparalleled Access and Coverage.</h4>\r\n\r\n<h3>Infinix-i Core +</h3>\r\n\r\n<p>The Infinix-i C-arm is designed to move around you and your patient so procedures can be performed more comfortably, safely and efficiently.</p>\r\n\r\n<ul>\r\n	<li>Achieve optimal angulations with unprecedented head-to-toe and fingertip-to-fingertip coverage</li>\r\n	<li>Continuously maintains a heads-up display during compound angles with synchronized rotating collimator and FPDs</li>\r\n	<li>Access Halo ensures unobstructed head-end work space to improve patient access for staff and ancillary equipment<img alt=\"\" src=\"http://www.cmcbiotech.co.th/th/wp-content/uploads/2019/06/Infinix-i-Core-2.jpg\" style=\"float:right; height:469px; width:640px\" /></li>\r\n</ul>\r\n\r\n<h4>5 Axis Positioner</h4>\r\n\r\n<p>Head-to-toe and fingertip-to-fingertip coverage allow you to move the C- arm and not the patient</p>\r\n\r\n<p><img alt=\"\" src=\"http://www.cmcbiotech.co.th/th/wp-content/uploads/2019/06/Infinix-i-Core-3.jpg\" style=\"float:left; height:639px; width:640px\" /></p>', NULL, '251119_155943.jpg', 31, 1, '2019-11-21 10:41:39', '2019-12-02 17:04:48'),
(5, 'Course 3', 1, 5, 'https://www.youtube.com/embed/fH31ecAeNnc', '5000', 'Aquilion lightning\r\nBetter care. Safer imaging.', '<h4>Aquilion lightning</h4>\r\n\r\n<h3>Better care. Safer imaging.</h3>\r\n\r\n<p>Aquilion Lightning&trade;, Canon Medical Systems&rsquo; 16-row 32 slice* helical CT system for whole-body imaging, employs cutting-edge technologies to optimize patient care and accelerate clinical decision making. Innovative features ensure that high-quality isotropic images are routinely acquired with low patient dose. The workflow is streamlined, increasing patient throughput. And a wide range of advanced 3D and post processing applications provide clinical flexibility.</p>\r\n\r\n<h6>*coneXact double slice reconstruction</h6>\r\n\r\n<p><img alt=\"\" src=\"http://www.cmcbiotech.co.th/th/wp-content/uploads/2019/06/CT-Product-Lightning-1.png\" /></p>\r\n\r\n<p><img alt=\"\" src=\"http://www.cmcbiotech.co.th/th/wp-content/uploads/2019/06/CT-Product-Lightning-2.jpg\" /></p>\r\n\r\n<h4>Clinical Gallery</h4>\r\n\r\n<h3>Runoff CTA</h3>\r\n\r\n<p>63-year-old male. CT Runoff Angiography was performed with&nbsp;<sup>SURE</sup>Exposure and&nbsp;<sup>SURE</sup>kV, automatic mA modulation and kV selection. Multiplanar Reconstructions (MPR) and 3D Volume Rendered images demonstrate bilateral iliac-femoral artery occlusion; right axillary femoral bypass graft and a left aortofemoral bypass graft with restored blood flow to both femoral arteries. Severe diffuse atherosclerotic disease and aortic aneurism pre-bifurcation is also demonstrated. Blood flow is seen bilaterally in the extremities.</p>\r\n\r\n<p><img alt=\"\" src=\"http://www.cmcbiotech.co.th/th/wp-content/uploads/2019/06/CT-Product-Lightning-3.png\" /></p>\r\n\r\n<h4>Minimum Space</h4>\r\n\r\n<h3>Maximum Efficiency</h3>\r\n\r\n<p>With a design also focusing on smaller installation space and power consumption, Aquilion Lightning&trade; requires a minimal footprint.</p>\r\n\r\n<p><img alt=\"\" src=\"http://www.cmcbiotech.co.th/th/wp-content/uploads/2019/06/CT-Product-Lightning-4.jpg\" /></p>\r\n\r\n<h3>Adaptive Diagnostics</h3>\r\n\r\n<p>Innovative solutions unique to Canon medical systems to solve clinical challenges. Simplified workflow with consistent quality results.</p>\r\n\r\n<h3>Low Dose by Design</h3>\r\n\r\n<p>Canon Medical Systems&rsquo; dose reducing features AIDR3D Enhanced and&nbsp;<sup>SURE</sup>Exposure 3D are fully integrated into Aquilion Lightning&rsquo;s workflow.</p>\r\n\r\n<p><img alt=\"\" src=\"http://www.cmcbiotech.co.th/th/wp-content/uploads/2019/06/CT-Product-Lightning-5.png\" /></p>', NULL, '251119_155542.jpg', 5, 1, '2019-11-21 10:53:07', '2019-12-06 13:31:27'),
(6, 'Course 4', 1, 5, 'https://www.youtube.com/embed/fH31ecAeNnc', '3000', 'Vitrea® Advanced Visualization', '<h3>Multi-Modality Image Sharing Solution</h3>\r\n\r\n<p>Image sharing is not just about moving images. It&rsquo;s about enabling access to view all images, regardless of their origin. Clinicians need real-time data access. But data, clinicians and patients are constantly in motion. And images acquired at one facility ultimately need to be viewed at another.</p>\r\n\r\n<p>Current solutions for image sharing are widely adopted but still leave a gap. Whether outside images reside on physical media such as CD/DVD or are stored within another PACS, VNA or image sharing system, there remain labor-intensive and error-prone manual processes to get the outside images into your existing PACS, VNA or other data-management solution.</p>\r\n\r\n<h4>Vitrea Image Sharing Solution</h4>\r\n\r\n<p>Our Image Sharing solution seamlessly integrates to current systems. Built on a truly content-agnostic architecture, it closes the gap, automating and unifying manual processes of getting outside images into your primary clinical systems and workflows.<br />\r\nModular and configurable services address a variety of workflows:</p>\r\n\r\n<ul>\r\n	<li>Image upload</li>\r\n	<li>Patient matching</li>\r\n	<li>Data reconciliation</li>\r\n	<li>Enterprise-wide prefetch</li>\r\n	<li>Identification of all relevant priors across multiple source archives</li>\r\n	<li>Image view and download from EMR, portal or secure URL</li>\r\n	<li>PowerShare and lifeIMAGE integration</li>\r\n</ul>\r\n\r\n<p>Our solution closes the gap and completes the image sharing workflow, benefiting the department, the enterprise and ultimately the patient.</p>\r\n\r\n<p><img alt=\"\" src=\"http://www.cmcbiotech.co.th/th/wp-content/uploads/2019/06/Automated-Stroke-Processing-01.png\" /></p>\r\n\r\n<p>Vitrea Intelligence</p>\r\n\r\n<h3>Codex</h3>\r\n\r\n<h5>With the addition of Codex, Vitrea Intelligence becomes an even more powerful tool.</h5>\r\n\r\n<p>Using Codex, you can visually analyze the data that is generated directly by your imaging equipment. It unlocks the DICOM metadata, providing the most comprehensive and accurate view of imaging operations available today, enabling your organization to make more informed decisions through convenient access to comprehensive information.</p>\r\n\r\n<p><img alt=\"\" src=\"http://www.cmcbiotech.co.th/th/wp-content/uploads/2019/06/Vitrea-Intelligence-Practice-Management.png\" style=\"height:406px; width:640px\" /></p>', NULL, '211119_105828.jpg', 8, 1, '2019-11-21 10:57:40', '2019-12-04 10:39:11'),
(7, 'Echocardiography', 1, 5, 'https://www.youtube.com/embed/fH31ecAeNnc', '2500', 'RadPRO® OMNERA® 400 Digital', '<h4>RadPRO&reg; OMNERA&reg; 400 Digital Radiographic Systems</h4>\r\n\r\n<p>Designed to meet the challenges of High-Volume Hospital Imaging Departments, the OMNERA&reg; systems are constructed of rugged, aircraft aluminum and designed with both the patient and technologist in mind.</p>\r\n\r\n<p><img alt=\"\" src=\"http://www.cmcbiotech.co.th/th/wp-content/uploads/2019/06/omnera-400A.jpg\" style=\"height:614px; width:640px\" /></p>\r\n\r\n<h6>RadPRO&reg; OMNERA&reg; 400A Auto-Positioning Digital Radiographic System</h6>\r\n\r\n<p><img alt=\"\" src=\"http://www.cmcbiotech.co.th/th/wp-content/uploads/2019/06/omnera-400T.jpg\" style=\"height:605px; width:640px\" /></p>\r\n\r\n<h6>RadPRO&reg; OMNERA&reg; 400T Manual-Positioning Digital Radiographic System</h6>', NULL, '251119_155304.jpg', 18, 1, '2019-11-21 11:01:02', '2019-12-06 15:27:10'),
(8, 'Transesophageal Echocardiography', 1, 7, 'https://www.youtube.com/embed/fH31ecAeNnc', '2300', 'Go Anywhere Anytime', '<h4>Xario 200G</h4>\r\n\r\n<p>Xario&rsquo;s proven high image quality and a full spectrum of clinical applications help you provide optimal patient care. With up to 8 hours of battery-powered, cable-free operation, the new Xario 200G combines outstanding performance with amazing mobility. With only 2 seconds boot-up time from smart standby mode Xario 200G is always ready when you are.</p>\r\n\r\n<h4>Xario 100G</h4>\r\n\r\n<p>Xario 100G combines outstanding mobility with complete functionality and a full range of proven applications in a small, versatile system. With up to 4 hours of battery and its smart standby technology the system is fully operational anyplace you need it in just 2 seconds, making it ideal for mobile work in a hospital or clinic.</p>\r\n\r\n<p><img alt=\"\" src=\"http://www.cmcbiotech.co.th/th/wp-content/uploads/2019/06/Xario-g-series-2.jpg\" /></p>', NULL, '251119_152610.jpg', 37, 1, '2019-11-21 11:09:52', '2020-01-07 15:01:35'),
(9, 'Aplio 500 USG Upper Abdomen Practice Demonstration5', 1, 7, 'https://www.youtube.com/embed/fH31ecAeNnc', '5000', 'Ultrasound Aplio 500', '<h4><strong>Aplio 500 USG Upper Abdomen Practice Demonstration</strong></h4>', NULL, '251119_160327.jpg', 62, 1, '2019-11-21 11:13:39', '2019-12-27 13:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `course_category`
--

DROP TABLE IF EXISTS `course_category`;
CREATE TABLE IF NOT EXISTS `course_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_status` int(11) DEFAULT NULL COMMENT '1 = activate 0 = draft',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course_category`
--

INSERT INTO `course_category` (`category_id`, `category_name`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'Category 01', 1, '2019-10-28 15:29:35', '2019-11-25 15:14:06'),
(3, 'Category 02', 1, '2019-11-11 00:00:00', '2019-11-25 15:14:22'),
(4, 'Category 03', 1, '2019-11-19 09:00:46', '2019-11-25 15:14:33'),
(5, 'Category 04', 1, '2019-11-19 10:11:02', '2020-01-07 15:05:28');

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

DROP TABLE IF EXISTS `email_template`;
CREATE TABLE IF NOT EXISTS `email_template` (
  `email_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `send_to_admin` int(11) DEFAULT NULL COMMENT '1 = on 0 = off',
  `send_to_teacher` int(11) DEFAULT NULL COMMENT '1 = on 0 = off',
  `send_to_user` int(11) DEFAULT NULL COMMENT '1 = on 0 = off',
  `type` int(11) NOT NULL COMMENT '0 = order 1 = subscription 2 = register',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`email_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_template`
--

INSERT INTO `email_template` (`email_id`, `subject`, `content`, `send_to_admin`, `send_to_teacher`, `send_to_user`, `type`, `created_at`, `updated_at`) VALUES
(1, 'email order', '<p>email order....</p>', 1, 1, 1, 0, '2019-12-24 16:33:03', '2019-12-24 16:39:57'),
(2, 'email subscription', '<p>email subscription....</p>', 1, NULL, NULL, 1, '2019-12-24 16:42:32', '2019-12-24 16:42:32'),
(3, 'email register', '<p>email register</p>', NULL, 1, NULL, 2, '2019-12-24 16:45:25', '2019-12-24 16:45:25');

-- --------------------------------------------------------

--
-- Table structure for table `home_page`
--

DROP TABLE IF EXISTS `home_page`;
CREATE TABLE IF NOT EXISTS `home_page` (
  `home_page_id` int(11) NOT NULL AUTO_INCREMENT,
  `logo_image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`home_page_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `home_page`
--

INSERT INTO `home_page` (`home_page_id`, `logo_image`, `created_at`, `updated_at`) VALUES
(1, '051119_162801.jpg', '2019-11-05 16:28:01', '2019-11-05 16:28:01'),
(2, '051119_171220.jpg', '2019-11-05 17:12:20', '2019-11-05 17:12:20'),
(3, '191119_154340.jpg', '2019-11-19 15:43:41', '2019-11-19 15:43:41'),
(4, '191119_173730.png', '2019-11-19 17:37:30', '2019-11-19 17:37:30'),
(5, '191119_174020.jpg', '2019-11-19 17:40:20', '2019-11-19 17:40:20'),
(6, '191119_174209.png', '2019-11-19 17:42:09', '2019-11-19 17:42:09'),
(7, '191119_174241.jpg', '2019-11-19 17:42:41', '2019-11-19 17:42:41'),
(8, '251119_095742.png', '2019-11-25 09:57:42', '2019-11-25 09:57:42'),
(9, '251119_095952.png', '2019-11-25 09:59:52', '2019-11-25 09:59:52'),
(10, '251119_100333.jpg', '2019-11-25 10:03:33', '2019-11-25 10:03:33'),
(11, '251119_105516.jpg', '2019-11-25 10:55:16', '2019-11-25 10:55:16'),
(12, '251119_105634.jpg', '2019-11-25 10:56:34', '2019-11-25 10:56:34'),
(13, '251119_161958.png', '2019-11-25 16:19:58', '2019-11-25 16:19:58'),
(14, '251119_162217.jpg', '2019-11-25 16:22:17', '2019-11-25 16:22:17'),
(15, '021219_172015.jpg', '2019-12-02 17:20:15', '2019-12-02 17:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `last_watch`
--

DROP TABLE IF EXISTS `last_watch`;
CREATE TABLE IF NOT EXISTS `last_watch` (
  `last_watch_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`last_watch_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

DROP TABLE IF EXISTS `lesson`;
CREATE TABLE IF NOT EXISTS `lesson` (
  `lesson_id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lesson_vdo_url` text COLLATE utf8_unicode_ci,
  `lesson_content` text COLLATE utf8_unicode_ci,
  `lesson_status` int(11) DEFAULT NULL COMMENT '0 = active 1 = inactive',
  `course_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`lesson_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`lesson_id`, `lesson_name`, `lesson_vdo_url`, `lesson_content`, `lesson_status`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 'test', 'https://www.google.com/', 'https://www.google.com/', 1, 1, '2019-11-07 13:40:41', '2019-11-07 15:05:02'),
(2, 'test2', 'https://www.google.com/', NULL, 1, 1, '2019-11-07 13:47:53', '2019-11-07 13:47:53'),
(3, 'test', 'https://www.youtube.com/embed/fH31ecAeNnc', 'testtt', 1, 9, '2019-12-25 13:28:56', '2020-01-07 15:34:28'),
(4, 'tttt', 'https://www.youtube.com/embed/fH31ecAeNnc', 'teete', 1, 9, '2020-01-07 14:57:50', '2020-01-07 14:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_file`
--

DROP TABLE IF EXISTS `lesson_file`;
CREATE TABLE IF NOT EXISTS `lesson_file` (
  `lesson_file_id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_id` int(11) DEFAULT NULL,
  `lesson_file` text COLLATE utf8_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`lesson_file_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lesson_file`
--

INSERT INTO `lesson_file` (`lesson_file_id`, `lesson_id`, `lesson_file`, `created_at`, `updated_at`) VALUES
(7, 3, '5e144289723c5_1.jpg', '2020-01-07 15:34:28', '2020-01-07 15:34:28'),
(8, 3, '5e14428ce7b4b_2.jpg', '2020-01-07 15:34:28', '2020-01-07 15:34:28'),
(9, 3, '5e1442907020f_3.jpg', '2020-01-07 15:34:28', '2020-01-07 15:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_short_content` text COLLATE utf8_unicode_ci,
  `news_full_content` text COLLATE utf8_unicode_ci,
  `news_page_title` text COLLATE utf8_unicode_ci,
  `news_description` text COLLATE utf8_unicode_ci,
  `news_keyword` text COLLATE utf8_unicode_ci,
  `news_image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_view` int(11) NOT NULL DEFAULT '0',
  `news_status` int(11) DEFAULT NULL COMMENT '1 = activate 0 = draft',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_short_content`, `news_full_content`, `news_page_title`, `news_description`, `news_keyword`, `news_image`, `news_view`, `news_status`, `created_at`, `updated_at`) VALUES
(2, 'เปิดโบนัส 9 บริษัท จ่ายหนัก จัดเต็ม แถมให้เงินพิเศษ ขึ้นเงินเดือน!', 'เปิดโบนัส 9 บริษัท จ่ายหนัก จัดเต็ม แถมให้เงินพิเศษ ขึ้นเงินเดือน!', '<h2><em><span style=\"font-size:12pt\">เปิดโบนัส 9 บริษัท จ่ายหนัก จัดเต็ม แถมให้เงินพิเศษ ขึ้นเงินเดือน!</span></em></h2>\r\n\r\n<p>ใกล้ปลายปีหลายบริษัทเริ่มทยอยสรุปผลประกอบการ เพื่อเป็นขวัญกำลังใจให้กับพนักงานที่ทำงานอย่างหนักมาตลอดทั้งปี โดยหลายๆ บริษัทเริ่มประกาศผลตอบแทนพนักงานกันบ้างแล้ว โดยเพจเฟซบุ๊ก <strong>ลุงตู่ตูน</strong> โพสต์ข้อความพร้อมภาพประกอบเกี่ยวกับบริษัทชื่อดังในไทยจ่ายโบนัสให้พนักงานสูงสุดถึง 8 เดือนด้วยกัน แถมบวกเงินพิเศษให้อีกหลายหมื่นบาท&nbsp; ใครได้เท่าไหร่ไปดูกัน!</p>', 'เปิดโบนัส 9 บริษัท จ่ายหนัก จัดเต็ม แถมให้เงินพิเศษ ขึ้นเงินเดือน!', 'เปิดโบนัส 9 บริษัท จ่ายหนัก จัดเต็ม แถมให้เงินพิเศษ ขึ้นเงินเดือน!', 'เปิดโบนัส 9 บริษัท จ่ายหนัก จัดเต็ม แถมให้เงินพิเศษ ขึ้นเงินเดือน!', '211119_154843.jpg', 9, 1, '2019-11-21 15:48:43', '2019-12-30 11:57:49'),
(3, 'กลุ่มบริษัท CMC Biotech & Thai GL ได้มีพิธีเปิดอาคาร 356-358 อย่างเป็นทางการ', 'กลุ่มบริษัท CMC Biotech & Thai GL ได้มีพิธีเปิดอาคาร 356-358 อย่างเป็นทางการ', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/1_PiF1nx1eE\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ยืนยันความเป็นผู้นำ ด้าน Diagnostic Imaging<br />\r\nกลุ่มบริษัทฯ CMC Biotech &amp; Thai GL Group ได้มีพิธีเปิดอาคาร 356-358 อย่างเป็นทางการ รวมถึงพิธีทำบุญถวายภัตตาหารเพล และร่วมรับประทานอาหารกลางวัน ภายใต้ชื่องานว่า</p>\r\n\r\n<p>&rdquo; The Ribbon Cutting and Opening Ceremony of Advanced Imaging Eduation Centre, Bangkok and CMC Biotech New Building</p>\r\n\r\n<p>นอกจากนี้ยังมี ทางบริษัท CMC Biotech Co., Ltd. และบริษัทฯในเครือ ได้มีการจัดสถานที่อบรมอย่างเป็นทางการโดยผนึกกำลังร่วมกับ Vital Images (Canon HIT) ได้จัดอบรม CT Course Training เพื่อเรียนรู้ฟังก์ชั่นต่างๆ ของ Software Vitrea 7.11 ณ Advanced Imaging Education Centre, Bangkok เมื่อวันที่ 28-31 ตุลาคม ที่ผ่านมาด้วย นอกจากนี้ยังมีหัวข้อการอบรมอีกมากมาย<br />\r\nโดยท่านสามารถติดตามได้ที่ www.cmcbiotech.co.th</p>\r\n\r\n<p>เราเชื่อว่าการมี Advanced Imaging Education Centre, Bangkok จะมีส่วนช่วยพัฒนาบุคคลากรทางการแพทย์ได้อย่างดียิ่ง และเราพร้อมเป็นส่วนหนึ่งของการพัฒนาด้าน Diagnostic Imaging ได้อย่างมีประสิทธิภาพมากยิ่งขึ้น</p>\r\n\r\n<p>#CMCBiotech<br />\r\n#CMCBiotechandThaiGLGroup<br />\r\n#CanonMedical<br />\r\n#AdvancedImagingEducationCentreBangkok</p>', 'CMC', 'CMC', 'CMC', '251119_094832.jpg', 23, 1, '2019-11-25 09:48:32', '2019-12-04 18:34:15'),
(4, 'ติดตั้ง CT scan 32 Slices รพ.ดำเนินสะดวก', 'ติดตั้ง CT scan 32 Slices รพ.ดำเนินสะดวก', '<p>ทางบริษัท CMC Biotech Co., Ltd. ได้ทำการติดตั้งเครื่อง CT Scan 32 Slices เพื่อการตรวจรักษาลูกค้าถือเป็นจุดมุ่งหมายสำคัญในการทำงานของเรา รวมไปถึงการให้คำแนะนำและแนวทางปฏิบัติในระยะแรกและการสนับสนุนทางด้านเทคนิค โดย CMC Biotech ที่ได้รับการฝึกอบรมมาเป็นอย่างดี ซึ่งจะทำให้ลูกค้าได้รับประโยชน์สูงสุดในการใช้</p>\r\n\r\n<p>ขอขอบพระคุณ รพ.ดำเนินสะดวก ที่ไว้วางใจในผลิตภัณฑ์ของบริษัทฯ</p>', 'CMC', 'CMC', 'CMC', '251119_095149.jpg', 17, 1, '2019-11-25 09:51:49', '2019-12-04 14:11:31'),
(5, 'โครงการก้าวคนละก้าว CMC', 'โครงการก้าวคนละก้าว CMC', '<p>ร่วมผนึกกำลังกับ โครงการ &ldquo;ก้าวคนละก้าว เพื่อ 11 โรงพยาบาลศูนย์ทั่วประเทศ &rdquo; เมื่อวันอาทิตย์ที่ 24 ธันวาคม 2561 ที่ผ่านมา</p>\r\n\r\n<p>คณะผู้บริหารและตัวแทนพนักงานของกลุ่ม บริษัท CMC &amp; Thai GL ได้นำเงินบริจาคสมทบทุนให้กับ ตูน บอดี้สแลม<br />\r\nในโครงการ ก้าวคนละก้าว เพื่อ 11 โรงพยาบาลศูนย์ทั่วประเทศ ณ วัดร่องขุ่น จ.เชียงราย โดยบรรยากาศเต็มไปด้วยความชื่นมื่น</p>\r\n\r\n<p>#CMCBIOTECH<br />\r\n#CMCANDTHAIGLGROUP</p>', 'CMC', 'CMC', 'CMC', '251119_095333.jpg', 20, 1, '2019-11-25 09:53:33', '2020-01-07 14:20:55');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_number` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_status` int(11) DEFAULT '1' COMMENT '1 = payment 2 = wait 3 = success',
  `user_id` int(11) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `order_payment_type` int(11) DEFAULT NULL COMMENT '1 = credit card 2 = transfer payment',
  `order_payment_date` date DEFAULT NULL,
  `order_payment_time` time DEFAULT NULL,
  `order_bank_transfer` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_slip_file` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_number`, `order_status`, `user_id`, `order_date`, `order_payment_type`, `order_payment_date`, `order_payment_time`, `order_bank_transfer`, `order_slip_file`, `created_at`, `updated_at`) VALUES
(1, '27122019101912', 3, 8, '2019-12-27', 2, '2019-12-27', '10:18:53', 'กสิกร (xxx-xxxx-xxx)', '271219_101912.jpg', '2019-12-27 10:19:12', '2020-01-07 14:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE IF NOT EXISTS `order_detail` (
  `order_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`order_detail_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `course_id`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 1, '2019-12-27 10:19:12', '2019-12-27 10:19:12'),
(2, 1, 8, 1, '2019-12-27 10:19:12', '2019-12-27 10:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `pravacy_policy`
--

DROP TABLE IF EXISTS `pravacy_policy`;
CREATE TABLE IF NOT EXISTS `pravacy_policy` (
  `pravacy_id` int(11) NOT NULL AUTO_INCREMENT,
  `name_page` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `meta_page_title` text COLLATE utf8_unicode_ci,
  `meta_description` text COLLATE utf8_unicode_ci,
  `meta_keyword` text COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`pravacy_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pravacy_policy`
--

INSERT INTO `pravacy_policy` (`pravacy_id`, `name_page`, `content`, `meta_page_title`, `meta_description`, `meta_keyword`, `created_at`, `updated_at`) VALUES
(1, 'Pravacy Policy', '<p>Pravacy Policy</p>', 'Pravacy Policy', 'Pravacy Policy', 'Pravacy Policy', '2019-11-26 11:19:40', '2019-11-26 11:19:45');

-- --------------------------------------------------------

--
-- Table structure for table `pre_post_test`
--

DROP TABLE IF EXISTS `pre_post_test`;
CREATE TABLE IF NOT EXISTS `pre_post_test` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `pretest_header` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `posttest_header` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `score_required` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `question_type` int(11) NOT NULL COMMENT '1 = ปรนัย 2 = อัตนัย',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pre_post_test`
--

INSERT INTO `pre_post_test` (`test_id`, `pretest_header`, `posttest_header`, `score_required`, `course_id`, `question_type`, `created_at`, `updated_at`) VALUES
(1, 'test', 'tretee', '30', 9, 1, '2019-12-23 15:28:22', '2019-12-23 17:37:38');

-- --------------------------------------------------------

--
-- Table structure for table `pre_post_test_save`
--

DROP TABLE IF EXISTS `pre_post_test_save`;
CREATE TABLE IF NOT EXISTS `pre_post_test_save` (
  `test_save_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `pretest_score` int(11) DEFAULT NULL,
  `posttest_score` int(11) DEFAULT NULL,
  `pretest_status` int(11) DEFAULT '0' COMMENT '0 = Wait 1 = Fail 2 = Pass',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`test_save_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pre_post_test_save`
--

INSERT INTO `pre_post_test_save` (`test_save_id`, `test_id`, `user_id`, `course_id`, `pretest_score`, `posttest_score`, `pretest_status`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 9, 2, 2, 1, '2019-12-27 10:19:12', '2020-01-07 14:56:54'),
(2, NULL, 8, 8, NULL, NULL, 0, '2019-12-27 10:19:12', '2019-12-27 10:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_detail` text COLLATE utf8_unicode_ci,
  `product_status` int(11) DEFAULT NULL COMMENT '1 = activate 0 = draft 	',
  `product_image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_view` int(11) DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_detail`, `product_status`, `product_image`, `product_view`, `created_at`, `updated_at`) VALUES
(2, 'Champ_test1234', 'Product detail...', 1, '181119_091914.jpg', 3, '2019-11-18 09:19:14', '2020-01-07 14:08:17');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `test_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `question`, `test_id`, `created_at`, `updated_at`) VALUES
(1, 'qqq', 1, '2019-12-23 15:28:22', '2019-12-23 17:37:38'),
(2, 'trtrt', 1, '2019-12-23 15:28:23', '2019-12-23 17:37:38'),
(3, 'www', 1, '2019-12-23 17:21:59', '2019-12-23 17:37:38'),
(4, 'eee', 1, '2019-12-23 17:21:59', '2019-12-23 17:37:38');

-- --------------------------------------------------------

--
-- Table structure for table `review_course`
--

DROP TABLE IF EXISTS `review_course`;
CREATE TABLE IF NOT EXISTS `review_course` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `review` text COLLATE utf8_unicode_ci,
  `rating` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `title_web` text COLLATE utf8_unicode_ci,
  `footer_web` text COLLATE utf8_unicode_ci,
  `email_web` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_web` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `seo_description` text COLLATE utf8_unicode_ci,
  `seo_keywords` text COLLATE utf8_unicode_ci,
  `status_web` int(11) DEFAULT NULL COMMENT '1 = on 2 = off',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `title_web`, `footer_web`, `email_web`, `phone_web`, `seo_description`, `seo_keywords`, `status_web`, `created_at`, `updated_at`) VALUES
(1, 'CMC Elearning', 'CMC Elearning', 'topza1412@gmail.com', '000-000-0000', NULL, NULL, 1, '2019-10-28 00:00:00', '2019-10-28 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `terms_condition`
--

DROP TABLE IF EXISTS `terms_condition`;
CREATE TABLE IF NOT EXISTS `terms_condition` (
  `terms_id` int(11) NOT NULL AUTO_INCREMENT,
  `name_page` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `meta_page_title` text COLLATE utf8_unicode_ci,
  `meta_description` text COLLATE utf8_unicode_ci,
  `meta_keyword` text COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`terms_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `terms_condition`
--

INSERT INTO `terms_condition` (`terms_id`, `name_page`, `content`, `meta_page_title`, `meta_description`, `meta_keyword`, `created_at`, `updated_at`) VALUES
(1, 'Terms & Condition', '<p>Terms &amp; Condition</p>', 'Terms & Condition', 'Terms & Condition', 'Terms & Condition', '2019-11-26 11:17:42', '2019-11-26 11:18:52');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `social_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` int(11) DEFAULT NULL COMMENT '1 = ชาย 2 = หญิง',
  `birthday` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `phone_number` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_card` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `occupation` text COLLATE utf8_unicode_ci,
  `company` text COLLATE utf8_unicode_ci,
  `image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_status` int(11) DEFAULT NULL COMMENT '1 = active 0 = inactive',
  `user_type` int(11) DEFAULT NULL COMMENT '1 = admin 2 = user 3 = teacher',
  `user_from` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'register,facebook,google ',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `social_id`, `first_name`, `last_name`, `email`, `password`, `sex`, `birthday`, `address`, `phone_number`, `id_card`, `occupation`, `company`, `image`, `user_status`, `user_type`, `user_from`, `created_at`, `updated_at`) VALUES
(1, NULL, 'aaa', 'bbb', 'admin@cmc.com', '25d55ad283aa400af464c76d713c07ad74e6c72bb47687b9ae8161ad200b8ebf', 1, '11/06/2019', '13123213', '1111111111', '1111111111111', NULL, 'rewrewr', '061119_133904.jpg', 1, 1, NULL, '2019-11-06 11:21:00', '2019-11-06 13:39:04'),
(2, NULL, 'อ. abc', 'defg', 'topza1412@gmail.com', '25d55ad283aa400af464c76d713c07ad74e6c72bb47687b9ae8161ad200b8ebf', 1, '11/06/2019', NULL, '1234567890', '1111111111111', NULL, NULL, '061119_163630.jpg', 1, 3, NULL, '2019-11-06 16:36:31', '2019-11-06 16:36:31'),
(3, NULL, 'Shariff', 'Benchawong', 'shariffbacom@gmail.com', '0fee5cba64f43f2e8a46caa22031458e74e6c72bb47687b9ae8161ad200b8ebf', 1, '11/19/2019', '386 Soi Ladphrao 94', '0868909090', '0000000000000', NULL, 'Service', NULL, 1, 3, NULL, '2019-11-19 10:14:12', '2019-11-19 10:14:12'),
(4, NULL, 'Karoon', 'Thepvong', 'karoon_t@innovex.co.th', '4241e9856df7f965e348d8cf004ac41474e6c72bb47687b9ae8161ad200b8ebf', 1, '07/13/1990', 'test test', '0935639874', '1570500000000', 'ADMINTs', 'INNOVEX', '191119_112847.png', 1, 1, NULL, '2019-11-19 11:28:47', '2019-11-19 11:28:47'),
(5, NULL, 'Champ', 'Tset', 'thesetup3@gmail.com', '22d7fe8c185003c98f97e5d6ced420c774e6c72bb47687b9ae8161ad200b8ebf', 1, '09/09/1986', '89/81', '0635163891', '1111111111111', NULL, NULL, NULL, 1, 3, NULL, '2019-11-21 10:49:56', '2019-11-21 10:49:56'),
(6, NULL, 'Test01', 'Test LAST', 'karoon_t@innovex.co.th', '25d55ad283aa400af464c76d713c07ad74e6c72bb47687b9ae8161ad200b8ebf', 1, '07/13/1990', NULL, '1234567890', '1570500000000', NULL, NULL, NULL, 1, 2, NULL, '2019-11-25 10:07:27', '2019-11-25 10:07:27'),
(7, NULL, 'Surachate', 'Siripongsakum', 'shariffbacom@gmail.com', '25d55ad283aa400af464c76d713c07ad74e6c72bb47687b9ae8161ad200b8ebf', 1, NULL, '386 Soi Ladphrao 94', '0868909090', '1570500000000', NULL, 'Chulabhorn Cancer Center', '251119_113919.png', 1, 3, NULL, '2019-11-25 11:39:19', '2019-11-25 11:39:19'),
(8, NULL, 'apidate', 'chareengam', 'apidate@gmail.com', '25d55ad283aa400af464c76d713c07ad74e6c72bb47687b9ae8161ad200b8ebf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 'register', '2019-11-25 13:47:22', '2019-11-25 13:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `user_course`
--

DROP TABLE IF EXISTS `user_course`;
CREATE TABLE IF NOT EXISTS `user_course` (
  `user_course_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `total_score` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_course_status` int(11) NOT NULL COMMENT '0 = wait 1 = pass 2 = false',
  `start_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_course_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `wishlist_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`wishlist_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
