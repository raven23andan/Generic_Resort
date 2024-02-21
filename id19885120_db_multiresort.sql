-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2024 at 11:36 AM
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
-- Database: `id19885120_db_multiresort`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladdons`
--

CREATE TABLE `tbladdons` (
  `AddonsID` int(11) NOT NULL,
  `Addons` varchar(90) NOT NULL,
  `Price` double NOT NULL,
  `AddonsType` varchar(90) NOT NULL,
  `ResortID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladdons`
--

INSERT INTO `tbladdons` (`AddonsID`, `Addons`, `Price`, `AddonsType`, `ResortID`) VALUES
(2, 'pillows', 200, 'Room', 14),
(3, 'PILLOW', 50, 'Room', 12),
(4, 'REFRIGIRATOR', 100, 'Room', 12),
(5, 'PILLOW', 1, 'Room', 19),
(6, 'REFRIGIRATOR', 1, 'Room', 19),
(7, 'BATH TOWEL', 1, 'Room', 19),
(8, 'BED', 1, 'Room', 19),
(9, 'MAT', 1, 'Room', 19),
(10, 'KTV', 5, 'Room', 19),
(11, 'CHAIRS', 200, 'Cottage', 20),
(12, 'pillows', 200, 'Room', 21),
(13, 'chairs', 100, 'Cottage', 21),
(14, 'KTV', 5, 'Cottage', 19),
(15, 'Pillows', 10, 'Room', 22),
(16, 'Extra Bed', 100, 'Room', 23),
(17, 'Pillow', 30, 'Room', 23),
(18, 'Towel', 40, 'Room', 23),
(19, 'pillows', 20, 'Room', 24),
(20, 'KTV', 500, 'Room', 12),
(21, 'BATH TOWL', 100, 'Room', 12),
(22, 'EXTRA BED', 500, 'Room', 12),
(23, 'KTV', 500, 'Room', 25),
(25, 'Extra Bed', 150, 'Room', 29),
(26, 'Extra Person Adult', 250, 'Room', 29),
(27, 'Extra Pillow', 100, 'Room', 29),
(28, 'Extra Person Child', 150, 'Room', 29),
(29, 'pillows', 10, 'Room', 30),
(30, 'Pillows', 20, 'Room', 33),
(31, 'Electric Fan', 60, 'Room', 33),
(32, 'Blanket', 20, 'Room', 33),
(33, 'Towel', 20, 'Room', 33),
(34, 'Towel', 20, 'Room', 36),
(35, 'Pillows', 20, 'Room', 36),
(36, 'Addon Room', 1000, 'Room', 49),
(37, 'MATTS', 100, 'Room', 12),
(38, 'speaker', 200, 'Room', 56),
(39, 'Rice cooker', 200, 'Room', 56),
(40, 'Electric fan', 200, 'Room', 56);

-- --------------------------------------------------------

--
-- Table structure for table `tblamenities`
--

CREATE TABLE `tblamenities` (
  `amen_id` int(11) NOT NULL,
  `amen_name` varchar(125) NOT NULL DEFAULT '0',
  `amen_desp` varchar(9999) NOT NULL DEFAULT '0',
  `amen_image` varchar(255) NOT NULL DEFAULT '0',
  `amen_type` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'Public',
  `pax` int(11) DEFAULT NULL,
  `Price` double NOT NULL DEFAULT 0,
  `Free` tinyint(1) NOT NULL DEFAULT 0,
  `ResortID` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblamenities`
--

INSERT INTO `tblamenities` (`amen_id`, `amen_name`, `amen_desp`, `amen_image`, `amen_type`, `type`, `pax`, `Price`, `Free`, `ResortID`) VALUES
(3, 'Private Pool', '<br>                 ', 'pics/xzx.jpg', NULL, 'Public', NULL, 0, 0, 19),
(5, 'Spa and wellness', '<br>                 ', 'pics/images.jpg', NULL, 'Public', NULL, 0, 0, 19),
(6, 'Free Wi-Fi', '<br>', 'pics/Free wifi.jpg', NULL, 'Public', NULL, 0, 0, 19),
(7, 'Free Parking Area', '<br>                 ', 'pics/ada.jpg', NULL, 'Public', NULL, 0, 0, 19),
(8, 'Pool', '<span style=\"color: rgb(32, 33, 36); font-family: arial, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\">a structure designed to hold water to enable swimming or other leisure activities</span><span style=\"color: rgb(32, 33, 36); font-family: arial, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\">.</span>                 ', 'pics/zccc.jpg', NULL, 'Public', NULL, 0, 0, 12),
(9, 'Kids Playground', '<br>', 'pics/Smart-Bro-5G-Rocket-Wifi-Review-Philippines-12.jpg', NULL, 'Public', NULL, 0, 0, 23),
(10, 'Spa', '<span style=\"color: rgb(32, 33, 36); font-family: arial, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\">The spa and wellness facilities include a sauna and treatment rooms. The spa and wellness facilities include a sauna and gym.</span>                 ', 'pics/spaz.jpg', NULL, 'Public', NULL, 0, 0, 12),
(11, 'Parking Area', 'Free Parking Space', 'pics/park.jpg', NULL, 'Public', NULL, 0, 0, 12),
(12, 'Pool', '                 ', 'pics/zx1.jpg', NULL, 'Public', NULL, 0, 0, 29),
(13, 'Restaurant', '<br>', 'pics/xz.jpg', NULL, 'Public', NULL, 0, 0, 29),
(15, 'pool', '<br>', 'pics/p.jpg20230107_07:41:48', NULL, 'Public', NULL, 0, 0, 30),
(16, 'tree house', '<br>', 'pics/p.jpg20230107_07:42:12', NULL, 'Public', NULL, 0, 0, 30),
(19, 'Swimming Pool', '<br>', 'pics/IMG20230109112410.jpg', NULL, 'Public', NULL, 0, 0, 36),
(21, 'Zip Line', '<br>', 'pics/IMG20230109105942.jpg', NULL, 'Public', NULL, 0, 0, 36),
(25, 'Pillow', '1 Pillow', './pics/kikubnw.png', NULL, 'Public', NULL, 0, 0, 49),
(27, 'Pool', '<br>', './pics/523940_437297236328236_224341981_n.jpg', NULL, 'Public', NULL, 0, 0, 54),
(28, 'PlayGround', '<br>                 ', './pics/548673_439057272818899_1072805371_n.jpg', NULL, 'Public', NULL, 0, 0, 54),
(29, 'Restaurant', '<br>', './pics/126055234_3661583217232939_851315883572759845_n.jpg', NULL, 'Public', NULL, 0, 0, 54),
(30, 'Kayak', '<br>', './pics/IMG20230109110152.jpg', NULL, 'Public', NULL, 0, 0, 36),
(31, 'Pool', '<br>', './pics/386778224_834047602055392_1392572003630871277_n.jpg', NULL, 'Public', NULL, 0, 0, 56),
(32, 'Santiago\'s Store', '<br>', './pics/126233498_2837681846503905_3992286292025997047_n.jpg', NULL, 'Public', NULL, 0, 0, 56),
(33, 'Pool', '<br>', './pics/hqdefault.jpg', NULL, 'Public', NULL, 0, 0, 57),
(34, 'Bucana', '<br>', './pics/271943387_459281222404033_5873730928902920793_n.jpg', NULL, 'Public', NULL, 0, 0, 59),
(35, 'Bucana', '<br>', './pics/b.jpg', NULL, 'Public', NULL, 0, 0, 61),
(36, 'Pool', '<br>', 'pics/362284948_742551397675142_7082521937572608738_n.jpg', NULL, 'Public', NULL, 0, 0, 62);

-- --------------------------------------------------------

--
-- Table structure for table `tblbookingaddons`
--

CREATE TABLE `tblbookingaddons` (
  `ID` int(11) NOT NULL,
  `BookingNo` varchar(90) NOT NULL DEFAULT '-',
  `RoomID` int(11) NOT NULL DEFAULT 0,
  `AddOns` varchar(255) NOT NULL DEFAULT '-',
  `Price` double NOT NULL DEFAULT 0,
  `Qty` int(11) NOT NULL DEFAULT 1,
  `Total` double NOT NULL DEFAULT 0,
  `DateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `ResortID` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbookingaddons`
--

INSERT INTO `tblbookingaddons` (`ID`, `BookingNo`, `RoomID`, `AddOns`, `Price`, `Qty`, `Total`, `DateCreated`, `ResortID`) VALUES
(1, 'aarin4x2', 67, 'pillows', 10, 6, 60, '2023-01-07 07:23:06', 0),
(2, 'oig6wbgb', 67, 'pillows', 10, 10, 100, '2023-01-07 07:32:27', 0),
(3, 'dia8h063', 2, 'PILLOW', 50, 1, 50, '2023-01-08 06:28:43', 0),
(4, 'dia8h063', 2, 'KTV', 500, 1, 500, '2023-01-08 06:28:43', 0),
(5, '2w2074st', 56, 'Extra Bed', 150, 2, 300, '2023-01-09 04:06:35', 0),
(6, '2w2074st', 56, 'Extra Person Adult', 250, 1, 250, '2023-01-09 04:06:35', 0),
(7, '2w2074st', 56, 'Extra Pillow', 100, 1, 100, '2023-01-09 04:06:35', 0),
(8, '2w2074st', 56, 'Extra Person Child', 150, 1, 150, '2023-01-09 04:06:35', 0),
(9, '0x530nbd', 56, 'Extra Pillow', 100, 1, 100, '2023-08-30 04:11:43', 0),
(10, '0x530nbd', 56, 'Extra Person Child', 150, 1, 150, '2023-08-30 04:11:43', 0),
(11, 'frvqan82', 83, 'Addon Room', 1000, 1, 1000, '2023-08-31 01:50:56', 0),
(12, 'e58tye46', 83, 'Addon Room', 1000, 1, 1000, '2023-09-01 04:38:09', 0),
(13, 'dn5w5wkk', 83, 'Addon Room', 1000, 1, 1000, '2023-09-01 04:57:42', 0),
(14, 'cmo6cksv', 88, 'Addon Room', 1000, 1, 1000, '2023-09-01 23:03:58', 0),
(15, 'jeveeu3g', 88, 'Addon Room', 1000, 1, 1000, '2023-09-03 21:50:16', 0),
(16, '3y8tzyyx', 2, 'PILLOW', 50, 12, 600, '2023-09-18 15:54:27', 0),
(17, '3y8tzyyx', 2, 'REFRIGIRATOR', 100, 12, 1200, '2023-09-18 15:54:27', 0),
(18, '3y8tzyyx', 2, 'KTV', 500, 12, 6000, '2023-09-18 15:54:27', 0),
(19, '3y8tzyyx', 2, 'BATH TOWL', 100, 12, 1200, '2023-09-18 15:54:27', 0),
(20, '3y8tzyyx', 2, 'EXTRA BED', 500, 12, 6000, '2023-09-18 15:54:27', 0),
(21, '3y8tzyyx', 2, 'MATTS', 100, 12, 1200, '2023-09-18 15:54:27', 0),
(22, 'u2iizi5s', 40, 'PILLOW', 50, 1, 50, '2023-09-26 02:32:46', 0),
(23, 'u2iizi5s', 40, 'REFRIGIRATOR', 100, 1, 100, '2023-09-26 02:32:46', 0),
(24, 'u2iizi5s', 40, 'KTV', 500, 1, 500, '2023-09-26 02:32:46', 0),
(25, 'u2iizi5s', 40, 'BATH TOWL', 100, 1, 100, '2023-09-26 02:32:46', 0),
(26, 'u2iizi5s', 40, 'EXTRA BED', 500, 1, 500, '2023-09-26 02:32:46', 0),
(27, 'u2iizi5s', 40, 'MATTS', 100, 1, 100, '2023-09-26 02:32:46', 0),
(28, '4rzbzqhh', 40, 'MATTS', 100, 1, 100, '2023-10-26 05:44:09', 0),
(29, 'zoycr03w', 2, 'PILLOW', 50, 1, 50, '2024-02-16 14:39:34', 0),
(30, 'zoycr03w', 2, 'REFRIGIRATOR', 100, 1, 100, '2024-02-16 14:39:34', 0),
(31, 'zhs07aqf', 2, 'PILLOW', 50, 1, 50, '2024-02-17 14:16:02', 0),
(32, 'zhs07aqf', 2, 'REFRIGIRATOR', 100, 1, 100, '2024-02-17 14:16:02', 0),
(33, 'x5jq6vqm', 2, 'PILLOW', 50, 1, 50, '2024-02-18 22:37:09', 0),
(34, 'x5jq6vqm', 2, 'REFRIGIRATOR', 100, 1, 100, '2024-02-18 22:37:09', 0),
(35, 'x5jq6vqm', 2, 'KTV', 500, 1, 500, '2024-02-18 22:37:09', 0),
(36, 'x5jq6vqm', 2, 'BATH TOWL', 100, 1, 100, '2024-02-18 22:37:09', 0),
(37, 'x5jq6vqm', 2, 'EXTRA BED', 500, 1, 500, '2024-02-18 22:37:09', 0),
(38, 'x5jq6vqm', 2, 'MATTS', 100, 1, 100, '2024-02-18 22:37:09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbldamages`
--

CREATE TABLE `tbldamages` (
  `id` int(11) NOT NULL,
  `damage_name` varchar(255) NOT NULL,
  `damage_amount` int(11) NOT NULL,
  `confirmation_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbldamages`
--

INSERT INTO `tbldamages` (`id`, `damage_name`, `damage_amount`, `confirmation_code`) VALUES
(1, 'Plate', 500, 'r7kengkt'),
(2, 'Pillow', 100, 'r7kengkt'),
(5, 'Plate', 599, '88u773tx'),
(6, 'Pillow', 500, '88u773tx'),
(7, 'Vase', 500, '88u773tx'),
(8, 'Sofa', 1000, '88u773tx'),
(9, 'Plate', 500, 'a2ess2ij'),
(10, 'Plate', 100, 'a2ess2ij');

-- --------------------------------------------------------

--
-- Table structure for table `tblfood`
--

CREATE TABLE `tblfood` (
  `id` int(11) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `resort_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblfood`
--

INSERT INTO `tblfood` (`id`, `food_name`, `price`, `description`, `img`, `resort_id`) VALUES
(1, 'Isda', 100, 'Prito Isda', 'food/Fried-Tilapia.jpg', 49),
(2, 'Egg', 30, 'Prito Egg', 'food/fry_egg.jpg', 49),
(5, 'Dog', 2000, 'Dog', './food/El8KLnoX0AEJzQW.jpg', 49),
(9, 'kari-kari', 1000, '<br>', './food/7_88741bcf-5c32-4e03-8403-12a24e68e492.png', 52),
(10, 'pancit', 1000, '<br>', './food/DESKTOP-TABLET_be_kind_to_yourself.png', 52),
(11, 'Kare-kare', 100, '<br>', './food/ulun bali.jpg', 66),
(12, 'Crispy pata', 100, '<br>', './food/Screenshot (1).png', 66),
(13, 'adobo', 100, '<br>', './food/Screenshot (2).png', 66),
(15, 'Kari-Kari Chicken', 100, '<br>', './food/chicken-kare-kare-recipe.jpg', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tblfoodorders`
--

CREATE TABLE `tblfoodorders` (
  `id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblfoodorders`
--

INSERT INTO `tblfoodorders` (`id`, `food_id`, `quantity`, `total_price`, `room_id`, `code`, `status`, `order_date`) VALUES
(5, 2, 1, 30, 88, 'jeveeu3g', 'Pending', '2023-09-05 00:31:28'),
(12, 1, 3, 300, 88, 'jeveeu3g', 'Disapproved', '2023-09-06 02:18:09'),
(19, 9, 1, 1000, 94, 'axv8hwpw', 'Approved', '2023-09-29 05:40:58'),
(20, 10, 1, 1000, 94, 'axv8hwpw', 'Approved', '2023-09-29 05:40:58'),
(25, 11, 1, 100, 116, 'mgkowt65', 'Approved', '2023-10-17 04:22:23'),
(26, 12, 1, 100, 116, 'mgkowt65', 'Approved', '2023-10-17 04:22:23'),
(27, 13, 1, 100, 116, 'mgkowt65', 'Approved', '2023-10-17 04:22:23'),
(28, 11, 1, 100, 115, 'bseazxtf', 'Pending', '2023-10-17 05:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `tblgallery`
--

CREATE TABLE `tblgallery` (
  `GalleryID` int(11) NOT NULL,
  `RoomID` int(11) NOT NULL,
  `RoomImages` varchar(1000) NOT NULL,
  `Caption` varchar(3000) NOT NULL,
  `Category` varchar(90) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblgallery`
--

INSERT INTO `tblgallery` (`GalleryID`, `RoomID`, `RoomImages`, `Caption`, `Category`) VALUES
(1, 2, 'rooms/20221218593116pexels-jonathan-borba-3101547.jpg', '', 'Rooms'),
(2, 2, 'rooms/20221218001727istockphoto-1129777688-612x612.jpg', '', 'Rooms'),
(4, 25, 'rooms/20230103440122pexels-markus-spiske-97047.jpg', '', 'Rooms'),
(5, 25, 'rooms/20230103450814pexels-pixabay-261388.jpg', '', 'Rooms'),
(6, 26, 'rooms/20230103460317Z.jpg', '', 'Rooms'),
(7, 3, 'pics/20230103475113zcv.jpg', '', 'Amenities'),
(8, 3, 'pics/20230103475916zcccc.jpg', '', 'Amenities'),
(9, 3, 'pics/20230103480421zccc.jpg', '', 'Amenities'),
(10, 25, 'rooms/20230103501212images.jpg', '', 'Rooms'),
(11, 33, 'rooms/2023010421145zcccc.jpg', 'Pool', 'Rooms'),
(12, 8, 'pics/20230104334812zcccc.jpg', '', 'Amenities'),
(13, 8, 'pics/2023010433555zcv.jpg', '', 'Amenities'),
(14, 2, 'rooms/20230105534411zcccc.jpg', 'Pool', 'Rooms'),
(15, 2, 'rooms/20230105535530spa.jpg', 'Spa', 'Rooms'),
(16, 56, 'rooms/2023010616031570978473_1572770786180932_5756487908835983360_n.jpg', '', 'Rooms'),
(17, 56, 'rooms/2023010620038Role2.jpg', '', 'Rooms'),
(18, 56, 'rooms/20230106203622ROLE1.jpg', '', 'Rooms'),
(19, 56, 'rooms/20230106254327118072260_2229337623857575_4795321390282055232_n.jpg', '', 'Rooms'),
(20, 56, 'rooms/20230106260225xz.jpg', '', 'Rooms'),
(21, 17, 'pics/20230107430510pool.jpg', '', 'Amenities'),
(25, 83, 'rooms/20230830335421images_13.jpg', '', 'Rooms'),
(26, 83, 'rooms/20230830340724pxfuel.jpg', 'Room', 'Rooms'),
(27, 73, 'rooms/20230901315911kikubnw.png', 'Room1', 'Rooms'),
(28, 88, 'rooms/20230902435429desktop-wallpaper-stewie-griffin-family-guy-supreme.jpg', '', 'Rooms'),
(29, 90, 'rooms/20230928085525Thunder_Lake_resort,_Remer,_Minnesota-1955.jpg', 'test', 'Rooms'),
(30, 39, 'rooms/2023092943159278041086_1396217407489275_8341787299417052974_n.png', '', 'Rooms');

-- --------------------------------------------------------

--
-- Table structure for table `tblguest`
--

CREATE TABLE `tblguest` (
  `GUESTID` int(11) NOT NULL,
  `REFNO` int(11) NOT NULL DEFAULT 0,
  `G_FNAME` varchar(30) NOT NULL DEFAULT '_',
  `G_MNAME` varchar(255) DEFAULT NULL,
  `G_LNAME` varchar(30) NOT NULL DEFAULT '_',
  `G_CITY` varchar(90) NOT NULL DEFAULT '_',
  `G_ADDRESS` varchar(90) DEFAULT '_',
  `DBIRTH` date DEFAULT NULL,
  `G_PHONE` varchar(20) NOT NULL DEFAULT '_',
  `G_NATIONALITY` varchar(30) DEFAULT '_',
  `G_COMPANY` varchar(90) DEFAULT '_',
  `G_CADDRESS` varchar(90) DEFAULT '_',
  `EMAILADDRESS` varchar(90) NOT NULL DEFAULT '_',
  `G_TERMS` tinyint(4) NOT NULL,
  `G_UNAME` varchar(255) NOT NULL DEFAULT '_',
  `G_PASS` varchar(255) NOT NULL DEFAULT '_',
  `ZIP` int(11) DEFAULT 0,
  `LOCATION` varchar(125) DEFAULT '_',
  `DELETED` tinyint(1) NOT NULL DEFAULT 0,
  `AUTH` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblguest`
--

INSERT INTO `tblguest` (`GUESTID`, `REFNO`, `G_FNAME`, `G_MNAME`, `G_LNAME`, `G_CITY`, `G_ADDRESS`, `DBIRTH`, `G_PHONE`, `G_NATIONALITY`, `G_COMPANY`, `G_CADDRESS`, `EMAILADDRESS`, `G_TERMS`, `G_UNAME`, `G_PASS`, `ZIP`, `LOCATION`, `DELETED`, `AUTH`) VALUES
(3, 0, 'Mark', NULL, 'Emata', '_', '123BRGY', '2001-12-22', '90870890980', '_', '_', '_', 'martematas87654321@gmail.com', 1, 'Mark12345', '89377a66aad15cd790df7e01ef99340b5512d2e8', 7000, '_', 0, ''),
(4, 0, 'play', NULL, 'son', '_', 'mercedes', '1999-01-01', '123456789', '_', '_', '_', 'play@gmail.com', 1, 'play', '77738c6430eeed4df13d10366b478af0b4fc18e1', 7000, '_', 0, ''),
(5, 0, 'Zs', NULL, 'z', '_', 'z', '2005-01-03', '213123', '_', '_', '_', 'genericresort2022@gmail.com', 1, 'q', '22ea1c649c82946aa6e479e1ffd321e4a318b1b0', 6111, '_', 0, '929247'),
(6, 0, 'son', NULL, 'go', '_', 'mercedes', '1999-08-11', '09155255121', '_', '_', '_', 'play@gmail.com', 1, 'son123', '7e0800291e987313858af340e66e89c3d06c2e9a', 7000, '_', 0, ''),
(7, 0, 'Mark Ronnie', NULL, 'Emata', '_', 'AVW PHIL ZAM', '2001-02-22', '0987722123', '_', '_', '_', 'martematas87654321@gmail.com', 1, 'Mark Ronnie', '7e63c62c549c00da43ec5cd311b2817e176c67b1', 7000, '_', 0, ''),
(9, 0, 'thr', NULL, 'mrk', '_', 'mercedes', '1996-01-02', '12345678901', '_', '_', '_', 'mrk123@gmail.com', 1, 'mrk123456', '80e126659c008667cb626baef0c86e7b7dd00e20', 7000, '_', 0, ''),
(10, 0, 'Jon', NULL, 'Andjr', '_', 'mercedes', '1996-01-03', '12304534598', '_', '_', '_', 'jon@gmail.com', 1, 'jon', '4d1e056810467f4f0530b8e52545eee50888439c', 7000, '_', 0, ''),
(11, 0, 'sad', NULL, 'asd', '_', 'sad', '2005-01-01', '21313', '_', '_', '_', 'as@sss.com', 1, 's', 'd4b937209c7a7963ac98bfee954cc15faa4d5cb7', 6111, '_', 0, ''),
(12, 0, 'sdaasd', NULL, 'sadasd', '_', 'asdasdas', '2005-01-04', '21313213123', '_', '_', '_', 'aaas@sss.com', 1, 'ss', 'bbbd20a7ef3a96570b86bbd896904b2796111576', 6111, '_', 0, ''),
(13, 0, 'Owie', NULL, 'Gonzales', '_', 'Mampang ', '2005-01-04', '09090909099', '_', '_', '_', 'ggaa@email.com', 1, 'Owie', '362d0bb1a94f77d466c9b05ca25d532582976c46', 7000, '_', 0, ''),
(14, 0, 'lkjhgfds', NULL, 'gfdsa', '_', 'sdfaS', '2005-01-01', '21313213123', '_', '_', '_', 'aaasaaas@sss.com', 1, 'aaa', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 6111, '_', 0, ''),
(16, 0, 'JHON', NULL, 'sin', '_', 'tetuan', '1995-01-05', '06954153132', '_', '_', '_', 'jon@gmail.com', 1, 'pogi1234', '1f11f0795bf91f1229adcc3fe88cadd8ca05ab4b', 7000, '_', 0, ''),
(17, 0, 'Johnny', NULL, 'Sins', '_', 'Mercedes', '1996-01-11', '09532654322', '_', '_', '_', 'johnny@gmail.com', 1, 'johnny', '420d109fa353fe8b6e29f41f63c62fd098e33041', 7000, '_', 0, ''),
(18, 0, 'morfydd', NULL, 'alar', '_', 'alya alya', '2000-01-05', '09665419414', '_', '_', '_', 'morfydduwu@gmail.com', 1, 'uwu123', 'fd2d425c9e38eca3d14c9782d1c47d246fdf3cc8', 7000, '_', 0, ''),
(19, 0, 'Juan', NULL, 'DelaCruz', '_', 'Ayala, Zamboanga City', '2001-01-03', '09555909748', '_', '_', '_', 'juan@gmail.com', 1, 'Juan Dela Cruz', 'c230972cf2c698ecc228c7fd155ad1b1d4b56ea5', 7000, '_', 0, ''),
(21, 0, 'johhny', NULL, 'S', '_', 'mercedes', '2005-01-05', '09756565612', '_', '_', '_', 'jonny1234@gmail.com', 1, 'nec1234', 'f5a6017e4cc398a4ae5c4b15a782ca0f2c32513f', 7000, '_', 0, ''),
(22, 0, 'Juan', NULL, 'dela cruz', '_', 'ZC', '2005-01-03', '09912535687', '_', '_', '_', 'juan@gmail.com', 1, 'juandc', 'd1b40a6aa23bc57d2a24feaef0d085a9f91d2a56', 7000, '_', 0, ''),
(23, 0, 'jon', NULL, 'de', '_', 'mercedes', '1995-01-04', '09858532321', '_', '_', '_', 'jon@gmail.com', 1, 'jon123', '4233137d1c510f2e55ba5cb220b864b11033f156', 7000, '_', 0, ''),
(24, 0, 'Mark', NULL, 'Emata', '_', '123BRGY', '2001-01-17', '90870890980', '_', '_', '_', 'martematas87654321@gmail.com', 1, 'Mark Ronnie1', '89377a66aad15cd790df7e01ef99340b5512d2e8', 7000, '_', 0, ''),
(27, 0, 'John ', NULL, 'CCS', '_', 'MERCEDES', '1996-01-04', '08654687498', '_', '_', '_', 'johnccs@gmail.com', 1, 'john123', '7417dc1d4bc6dbea938551560e3fc183d16ffe0e', 7000, '_', 0, ''),
(28, 0, 'Mark', NULL, 'Emata', '_', '123BRGY', '2001-01-22', '90870890980', '_', '_', '_', 'martematas87654321@gmail.com', 1, 'MRE123456', '348463813d364e4e872ff32580a2b008b8f80e6f', 7000, '_', 0, ''),
(29, 0, 'Mark Ronnie', NULL, 'Emata', '_', 'AVW PHIL ZAM', '2001-02-22', '0987722123', '_', '_', '_', 'martematas87654321@gmail.com', 1, 'MRE12345678', '89377a66aad15cd790df7e01ef99340b5512d2e8', 7000, '_', 0, ''),
(37, 0, 'John', NULL, 'Doe', '_', 'kayawan', '1996-08-01', '1234', '_', '_', '_', 'johndoe@wmsu.edu.ph', 1, 'johndoe123', '19485e369c691fa8ece1fabc8a6ceabfb5666b79', 1111, '_', 0, ''),
(38, 0, 'Jake', NULL, 'Doe', '_', 'Est nisi quibusdam a', '2000-09-05', '09661573159', '_', '_', '_', 'jakedoe@email.com', 1, 'jakedoe123', '19485e369c691fa8ece1fabc8a6ceabfb5666b79', 1111, '_', 0, ''),
(39, 0, 'Sisis', NULL, 'Jssjsj', '_', 'Jsjsjs', '2005-09-02', '171881', '_', '_', '_', 'jajaj@hahaj.com', 1, 'Qqqqq', '9478aeb68330f3a99ef4ddd9c0e45d18481b239d', 7000, '_', 0, ''),
(40, 0, 'test', NULL, 'test', '_', 'kayawan', '2005-09-14', '123123', '_', '_', '_', 'test@wmsu.edu.ph', 1, 'kayawan', '5e3c77000aa7c4e4c7f99ad57a33d92c459d98af', 6000, '_', 0, ''),
(41, 0, 'ruth', NULL, 'cruz', '_', 'labuan', '1995-09-01', '09751468625', '_', '_', '_', 'ruth@gmail.com', 1, 'ruth12345', 'c8783644e448177d4bb349912619865ea635d8e3', 7000, '_', 0, ''),
(42, 0, 'harisson', NULL, 'nix', '_', 'baliwasan', '1995-09-01', '09750000000', '_', '_', '_', 'nix@gmail.com', 1, 'haris12345', '6ee7fe588facd462e1f45d50a50b8356890d0886', 7000, '_', 0, ''),
(43, 0, 'Mark Ronnie', NULL, 'Emata', '_', 'E.Perez Drive 1st Street Zamboanga City', '2001-02-22', '09651283893', '_', '_', '_', 'martematas87654321@gmail.com', 1, 'Bozmark', 'e74fb6c6b16bcbd01f8cc749959a77ffd72a297e', 7000, '_', 0, ''),
(44, 0, 'cardo', NULL, 'cardo', '_', 'mercedes', '2005-09-01', '09947374989', '_', '_', '_', 'cardo@gmail.com', 1, 'cardo12345', '01d9e0bf82a0c2fa2d676daa10ef0f53a7bdbd50', 7000, '_', 0, ''),
(45, 0, 'Edward ', NULL, 'Cullin', '_', 'GUIWAN ZAMBOANGA CITY', '1998-10-08', '09651283893', '_', '_', '_', 'martematas87654321@gmail.com', 1, 'edward', '26c7efd8e5f5fc7655e9c92c11f4219b78ee4b5e', 7000, '_', 0, ''),
(46, 0, 'John', NULL, 'Doe', '_', 'ASD', '2005-10-05', '7395056032', '_', '_', '_', 'johndoe@email.com', 1, 'johndoe999', '5cec175b165e3d5e62c9e13ce848ef6feac81bff', 0, '_', 0, ''),
(49, 0, 'Jane', NULL, 'Doe', '_', 'Est nisi quibusdam a', '2023-10-21', '09661573159', '_', '_', '_', 'jane.doe@gmail.com', 1, 'janedoe123', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1111, '_', 0, ''),
(50, 0, 'Mark Ronnie', NULL, 'Emata', '_', 'Guiwan, Zamboanga City', '2001-02-22', '09651283893', '_', '_', '_', 'martematas87654321@gmail.com', 1, 'MarkRonnieEmata', '4a723a5a90d573e6047f6b36b923cfb0e490bee2', 7000, '_', 0, ''),
(51, 0, 'Markyy', NULL, 'Markky', '_', 'Est nisi quibusdam a', '1996-10-09', '09661573159', '_', '_', '_', 'markyyzs165@gmail.com', 1, 'markyy', '671b7b9cb80dbf141517669b66a22121c9cface6', 1111, '_', 0, '784554'),
(52, 0, 'Markyy', NULL, 'Markky', '_', 'Est nisi quibusdam a', '2005-10-05', '09661573159', '_', '_', '_', 'markyyzs165@gmail.com', 1, 'marky123', 'da9fa2b943355d4f1ebd11b2357ae62eb02fe73e', 1111, '_', 0, ''),
(54, 0, 'John', 'Dee', 'Doe', '_', 'kayawan', '2023-11-20', '1234', '_', '_', '_', 'johndoe1@gmail.com', 1, 'doe123john', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1111, '_', 0, ''),
(55, 0, 'Satr', 'hello', 'raven', '_', '', '2024-02-16', '0988888888', '_', '_', '_', 'raven@email.com', 1, 'raven', '8ab27b4c308251492196b43e89bc3975683c0a0e', 0, '_', 0, ''),
(56, 0, 'ric', 'a', 'asa', '_', '', '2024-02-20', '0988888888', '_', '_', '_', 'ric@email.com', 1, 'ric', '5a2ff7718b08b7dcb26c2b3197dcb883232312d9', 0, '_', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

CREATE TABLE `tblpayment` (
  `SUMMARYID` int(11) NOT NULL,
  `TransactionNo` varchar(90) NOT NULL DEFAULT '-',
  `TRANSDATE` datetime NOT NULL DEFAULT current_timestamp(),
  `CONFIRMATIONCODE` varchar(30) NOT NULL DEFAULT '-',
  `TotalAmount` double NOT NULL DEFAULT 0,
  `PaidAmount` double NOT NULL DEFAULT 0,
  `CB` double NOT NULL DEFAULT 0 COMMENT 'Change or Balance',
  `PQTY` int(11) NOT NULL DEFAULT 0,
  `GUESTID` int(11) NOT NULL DEFAULT 0,
  `DPRICE` int(11) NOT NULL DEFAULT 0,
  `SPRICE` double NOT NULL DEFAULT 0,
  `MSGVIEW` tinyint(1) NOT NULL DEFAULT 0,
  `STATUS` varchar(30) NOT NULL DEFAULT '-',
  `Completed` tinyint(1) NOT NULL DEFAULT 0,
  `CheckedOut` tinyint(1) NOT NULL DEFAULT 0,
  `ResortID` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpayment`
--

INSERT INTO `tblpayment` (`SUMMARYID`, `TransactionNo`, `TRANSDATE`, `CONFIRMATIONCODE`, `TotalAmount`, `PaidAmount`, `CB`, `PQTY`, `GUESTID`, `DPRICE`, `SPRICE`, `MSGVIEW`, `STATUS`, `Completed`, `CheckedOut`, `ResortID`) VALUES
(1, '-', '2023-01-03 11:24:56', '24fqnmwt', 0, 0, 0, 1, 7, 0, 150, 0, 'Cancelled', 0, 0, 12),
(2, '-', '2023-01-03 12:10:29', 'zjsxtjw8', 0, 0, 0, 1, 3, 0, 150, 0, 'Checkedout', 0, 0, 12),
(3, '-', '2023-01-03 01:05:04', 'ovmmksty', 0, 0, 0, 1, 9, 0, 2, 1, 'Checkedout', 0, 0, 16),
(4, '-', '2023-01-03 01:28:45', 'bm708aru', 0, 0, 0, 1, 10, 0, 352, 1, 'Checkedout', 0, 0, 17),
(5, '-', '2023-01-03 02:45:47', 'rtaiykd6', 0, 0, 0, 3, 7, 0, 4, 1, 'Checkedout', 0, 0, 19),
(6, '-', '2023-01-03 04:39:50', 'y8d4awit', 0, 0, 0, 1, 7, 0, 2, 1, 'Checkedout', 0, 0, 19),
(7, '-', '2023-01-04 12:28:47', '20mftn3x', 0, 0, 0, 1, 12, 0, 600, 0, 'Checkedout', 0, 0, 12),
(8, '-', '2023-01-04 12:35:01', 'mi8q2av2', 0, 0, 0, 1, 14, 0, 150, 0, 'Confirmed', 0, 0, 12),
(9, '-', '2023-01-04 12:39:16', 'nfyjdc74', 0, 0, 0, 1, 13, 0, 10, 1, 'Checkedout', 0, 0, 19),
(10, '-', '2023-01-04 12:44:13', 'yywfxgqq', 0, 0, 0, 1, 14, 0, 300, 0, 'Cancelled', 0, 0, 12),
(11, '-', '2023-01-04 01:34:14', 'is2vsmaw', 0, 0, 0, 1, 16, 0, 1200, 1, 'Checkedout', 0, 0, 20),
(12, '-', '2023-01-04 01:37:58', '06awne3f', 0, 0, 0, 2, 16, 0, 1202, 0, 'Checkedin', 0, 0, 20),
(13, '-', '2023-01-04 02:17:43', '7vca3tsr', 0, 0, 0, 1, 7, 0, 1, 1, 'Checkedout', 0, 0, 19),
(14, '-', '2023-01-04 02:33:28', 'nb8b5k8f', 0, 0, 0, 1, 17, 0, 1200, 1, 'Cancelled', 0, 0, 21),
(15, '-', '2023-01-04 02:37:06', '2mk4b75k', 0, 0, 0, 1, 17, 0, 2, 1, 'Confirmed', 0, 0, 21),
(16, '-', '2023-01-04 02:41:25', 'epvoiimu', 0, 0, 0, 1, 7, 0, 1, 1, 'Cancelled', 0, 0, 19),
(17, '-', '2023-01-04 05:12:11', 'e7f574vq', 0, 0, 0, 1, 7, 0, 31, 1, 'Cancelled', 0, 0, 19),
(18, '-', '2023-01-04 05:44:00', 'qjvsendz', 0, 0, 0, 1, 18, 0, 5, 0, 'Confirmed', 0, 0, 19),
(19, '-', '2023-01-04 05:49:39', 'dabywbeg', 0, 0, 0, 1, 19, 0, 365, 1, 'Checkedout', 0, 0, 19),
(20, '-', '2023-01-04 05:58:21', 'e4ve7wb8', 0, 0, 0, 1, 19, 0, 150, 0, 'Checkedout', 0, 0, 12),
(21, '-', '2023-01-04 06:01:18', 'kvtgjirn', 0, 0, 0, 1, 19, 0, 150, 0, 'Checkedout', 0, 0, 12),
(22, '-', '2023-01-05 02:13:14', 'hqqcq37c', 0, 0, 0, 1, 21, 0, 300, 1, 'Cancelled', 0, 0, 22),
(23, '-', '2023-01-05 02:19:26', 'cn3p86c7', 0, 0, 0, 1, 21, 0, 210, 1, 'Checkedout', 0, 0, 22),
(24, '-', '2023-01-05 03:18:31', 'okaar68x', 0, 0, 0, 1, 7, 0, 11, 1, 'Confirmed', 0, 0, 19),
(25, '-', '2023-01-05 05:12:46', '72muajmo', 0, 0, 0, 1, 7, 0, 3, 0, 'Confirmed', 0, 0, 19),
(26, '-', '2023-01-05 08:45:32', 'bf822sb0', 0, 0, 0, 1, 7, 0, 460, 1, 'Confirmed', 0, 0, 23),
(27, '-', '2023-01-05 08:57:38', 'yhxqunxj', 0, 0, 0, 2, 22, 0, 1200, 1, 'Cancelled', 0, 0, 23),
(28, '-', '2023-01-05 09:03:40', 'dkzqvpxf', 0, 0, 0, 2, 22, 0, 13600, 1, 'Checkedout', 0, 0, 23),
(29, '-', '2023-01-05 02:48:20', 'msj0bn0g', 0, 0, 0, 2, 23, 0, 1560, 1, 'Pending', 0, 0, 24),
(30, '-', '2023-01-05 04:37:02', '7swzmm58', 0, 0, 0, 1, 7, 0, 200, 1, 'Checkedin', 0, 0, 25),
(31, '-', '2023-01-05 04:40:10', 'esqvnutk', 0, 0, 0, 1, 24, 0, 100, 0, 'Checkedin', 0, 0, 25),
(32, '-', '2023-01-05 04:41:57', 'zjivj6jq', 0, 0, 0, 1, 24, 0, 600, 1, 'Pending', 0, 0, 25),
(33, '-', '2023-01-05 05:20:43', 'emsnwdee', 0, 0, 0, 1, 23, 0, 100, 1, 'Confirmed', 0, 0, 28),
(34, '-', '2023-01-06 02:46:17', 'sz7vussa', 0, 0, 0, 1, 7, 0, 11250, 1, 'Confirmed', 0, 0, 29),
(38, '-', '2023-01-09 03:12:04', 'sb62zbci', 0, 0, 0, 1, 7, 0, 150, 0, 'Checkedout', 0, 0, 12),
(39, '-', '2023-01-09 04:06:35', '2w2074st', 0, 0, 0, 1, 7, 0, 2600, 0, 'Checkedout', 0, 0, 29),
(40, '-', '2023-01-11 08:35:18', 'he52myx4', 0, 0, 0, 1, 27, 0, 150, 0, 'Confirmed', 0, 0, 12),
(41, '-', '2023-01-29 12:00:04', '2zayy6kt', 0, 0, 0, 1, 23, 0, 2, 0, 'Checkedout', 0, 0, 38),
(42, '-', '2023-02-16 04:47:46', '2ge85hxq', 0, 0, 0, 2, 5, 0, 2200, 0, 'Checkedout', 0, 0, 12),
(43, '-', '2023-02-19 03:13:53', 'dmwodtoo', 0, 0, 0, 2, 5, 0, 2100, 1, 'Pending', 0, 0, 29),
(50, '-', '2023-08-31 10:45:37', 'orqtzudq', 0, 0, 0, 1, 37, 0, 2981.68, 1, 'Checkedout', 0, 0, 49),
(52, '-', '2023-09-01 05:03:58', 'cmo6cksv', 0, 0, 0, 1, 38, 0, 1300, 0, 'Checkedout', 0, 0, 49),
(53, '-', '2023-09-01 06:01:50', 'nd38stbp', 0, 0, 0, 1, 37, 0, 4500, 1, 'Checkedout', 0, 0, 49),
(54, '-', '2023-09-01 06:02:52', '2kp2qbyq', 0, 0, 0, 1, 37, 19, 2981.68, 1, 'Checkedout', 0, 0, 49),
(55, '-', '2023-09-01 06:03:02', '8pryycqw', 0, 0, 0, 1, 37, 300, 4200, 1, 'Checkedout', 0, 0, 49),
(56, '-', '2023-09-01 06:20:07', '6qtdqfhu', 0, 0, 0, 1, 37, 0, 977.6, 1, 'Checkedout', 0, 0, 49),
(57, '-', '2023-09-01 06:25:44', 'fb40u6rg', 0, 0, 0, 1, 37, 0, 977.6, 1, 'Checkedout', 0, 0, 49),
(58, '-', '2023-09-01 06:26:40', 'nygdn703', 0, 0, 0, 2, 37, 0, 3377.6, 1, 'Checkedout', 0, 0, 49),
(59, '-', '2023-09-02 06:14:09', '66tojwo0', 0, 0, 0, 1, 37, 600, 300, 1, 'Checkedout', 0, 0, 49),
(60, '-', '2023-09-03 03:50:16', 'jeveeu3g', 0, 0, 0, 1, 37, 0, 1240, 0, 'Checkedout', 0, 0, 49),
(61, '-', '2023-09-18 02:57:43', 'pwonj4yq', 0, 0, 0, 1, 41, 20000, 12750, 1, 'Checkedout', 0, 0, 12),
(62, '-', '2023-09-18 03:54:27', '3y8tzyyx', 0, 0, 0, 2, 41, 1000, 37100, 1, 'Checkedout', 0, 0, 12),
(63, '-', '2023-09-26 02:32:46', 'u2iizi5s', 0, 0, 0, 2, 43, 5000, 18550, 0, 'Checkedout', 0, 0, 12),
(64, '-', '2023-09-29 04:31:55', '46abfwrp', 0, 0, 0, 1, 41, 0, 300, 1, 'Cancelled', 0, 0, 12),
(65, '-', '2023-09-29 04:36:03', 'h3v4rfpo', 0, 0, 0, 1, 41, 0, 0, 1, 'Checkedout', 0, 0, 12),
(66, '-', '2023-09-29 05:30:41', 'scqaeiec', 0, 0, 0, 1, 41, 0, 0, 1, 'Checkedout', 0, 0, 52),
(67, '-', '2023-09-29 05:33:52', 'ft8oo2oy', 0, 0, 0, 1, 44, 0, 0, 0, 'Checkedout', 0, 0, 52),
(68, '-', '2023-09-29 05:36:32', 'axv8hwpw', 0, 0, 0, 1, 41, 0, 0, 1, 'Checkedout', 0, 0, 52),
(69, '-', '2023-09-29 05:44:55', 'xnpajf77', 0, 0, 0, 1, 41, 0, 1000, 1, 'Checkedout', 0, 0, 52),
(70, '-', '2023-10-12 03:19:06', 'xqs2ct47', 0, 0, 0, 1, 41, 0, 150, 1, 'Checkedout', 0, 0, 12),
(71, '-', '2023-10-12 04:02:24', '4qq2kmwv', 0, 0, 0, 1, 41, 0, 150, 1, 'Checkedout', 0, 0, 12),
(72, '-', '2023-10-16 05:19:19', '0mooncws', 0, 0, 0, 1, 41, 5000, 150, 1, 'Checkedout', 0, 0, 12),
(73, '-', '2023-10-17 02:18:25', 'jynbufic', 0, 0, 0, 1, 41, 0, 150, 1, 'Checkedout', 0, 0, 12),
(74, '-', '2023-10-17 04:10:54', '5p7dkk2g', 0, 0, 0, 1, 45, 0, 1000, 0, 'Cancelled', 0, 0, 66),
(75, '-', '2023-10-17 04:15:58', 'mgkowt65', 0, 0, 0, 1, 45, 1000, 3000, 1, 'Checkedout', 0, 0, 66),
(76, '-', '2023-10-17 05:12:55', 'bseazxtf', 0, 0, 0, 1, 46, 0, 100, 1, 'Pending', 0, 0, 66),
(77, '-', '2023-10-21 01:57:39', 'hv0er35z', 0, 0, 0, 1, 49, 0, 150, 1, 'Cancelled', 0, 0, 12),
(78, '-', '2023-10-21 02:04:17', 'dbkwgy25', 0, 0, 0, 1, 49, 0, 500, 0, 'Cancelled', 0, 0, 12),
(79, '-', '2023-10-21 02:15:28', '7c0daudi', 0, 0, 0, 1, 41, 0, 1250, 0, 'Checkedout', 0, 0, 12),
(80, '-', '2023-10-21 02:37:53', 'p8n8vbzx', 0, 0, 0, 1, 49, 5, 150, 0, 'Checkedout', 0, 0, 12),
(81, '-', '2023-10-21 04:12:17', 'r7kengkt', 0, 0, 0, 1, 41, 100, 650, 0, 'Checkedout', 0, 0, 12),
(82, '-', '2023-10-21 04:19:10', '88u773tx', 0, 0, 0, 1, 41, 2599, 150, 0, 'Checkedout', 0, 0, 12),
(83, '-', '2023-10-21 04:30:49', 'a2ess2ij', 0, 0, 0, 1, 41, 600, 500, 0, 'Checkedout', 0, 0, 12),
(84, '-', '2023-10-25 11:44:09', '4rzbzqhh', 0, 0, 0, 1, 52, 0, 1100, 0, 'Checkedout', 0, 0, 12),
(85, '-', '2023-12-02 12:56:37', 'ahvzffws', 0, 0, 0, 1, 54, 0, 1000, 1, 'Checkedout', 0, 0, 12),
(86, '-', '2023-12-03 06:02:56', 'sca85eee', 0, 0, 0, 1, 54, 0, 2250, 0, 'Checkedout', 0, 0, 12),
(87, '-', '2024-02-15 07:48:10', 'h0inu8ut', 0, 0, 0, 1, 41, 0, 2500, 1, 'Checkedout', 0, 0, 12),
(88, '-', '2024-02-16 05:25:08', 'g87mzhy6', 0, 0, 0, 1, 55, 0, 2050, 1, 'Checkedout', 0, 0, 12),
(89, '-', '2024-02-16 05:39:02', 'i2ous30z', 0, 0, 0, 1, 55, 0, 5500, 1, 'Checkedout', 0, 0, 12),
(90, '-', '2024-02-16 07:39:34', 'zoycr03w', 0, 0, 0, 1, 55, 0, 5300, 1, 'Checkedout', 0, 0, 12),
(91, '-', '2024-02-16 03:19:30', 'mjdmgow0', 0, 0, 0, 1, 55, 0, 2650, 1, 'Checkedout', 0, 0, 12),
(92, '-', '2024-02-16 04:42:01', 'utmsnvi7', 0, 0, 0, 1, 55, 0, 600, 1, 'Checkedout', 0, 0, 12),
(93, '-', '2024-02-17 07:16:02', 'zhs07aqf', 0, 0, 0, 1, 55, 0, 1400, 1, 'Checkedout', 0, 0, 12),
(94, '-', '2024-02-17 09:57:34', 't2kvkpbu', 0, 0, 0, 1, 55, 0, 2400, 1, 'Checkedout', 0, 0, 12),
(95, '-', '2024-02-17 10:05:38', '8xfhrb0e', 0, 0, 0, 2, 55, 0, 2500, 1, 'Checkedout', 0, 0, 12),
(96, '-', '2024-02-17 10:06:22', 'bocecmqy', 0, 0, 0, 3, 55, 0, 7600, 1, 'Checkedout', 0, 0, 12),
(97, '-', '2024-02-18 02:00:24', '3kasqnf6', 0, 0, 0, 1, 55, 0, 1250, 1, 'Checkedout', 0, 0, 12),
(98, '-', '2024-02-18 02:49:39', '36dk5rcb', 0, 0, 0, 1, 55, 0, 1250, 1, 'Checkedout', 0, 0, 12),
(99, '-', '2024-02-18 03:08:20', 'juxr478w', 0, 0, 0, 1, 55, 0, 150, 1, 'Checkedout', 0, 0, 12),
(100, '-', '2024-02-18 03:37:09', 'x5jq6vqm', 0, 0, 0, 1, 55, 0, 2600, 1, 'Checkedout', 0, 0, 12),
(101, '-', '2024-02-18 03:46:31', '0b0wam4x', 0, 0, 0, 1, 55, 0, 350, 1, 'Checkedout', 0, 0, 12),
(102, '-', '2024-02-18 04:07:18', 'o3g3xwxe', 0, 0, 0, 1, 55, 0, 350, 1, 'Checkedout', 0, 0, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tblpricing`
--

CREATE TABLE `tblpricing` (
  `PricingID` int(11) NOT NULL,
  `RoomID` int(11) NOT NULL DEFAULT 0,
  `Description` varchar(90) NOT NULL DEFAULT ' ',
  `Prices` double NOT NULL DEFAULT 0,
  `ConsumeHour` double NOT NULL DEFAULT 0,
  `RatesType` varchar(90) NOT NULL DEFAULT 'Single' COMMENT 'Day, Night, Single',
  `AccomodationType` varchar(90) NOT NULL DEFAULT '-',
  `WeekRates` varchar(90) NOT NULL DEFAULT 'NotApplicable' COMMENT 'WeekDays,WeekEnds,NotApplicable'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpricing`
--

INSERT INTO `tblpricing` (`PricingID`, `RoomID`, `Description`, `Prices`, `ConsumeHour`, `RatesType`, `AccomodationType`, `WeekRates`) VALUES
(5, 2, '3 hours', 150, 3, 'Single', 'Room', 'NotApplicable'),
(6, 2, '6 hours', 350, 6, 'Single', 'Room', 'NotApplicable'),
(7, 2, '12 hours', 650, 12, 'Single', 'Room', 'NotApplicable'),
(8, 2, '24 hours', 1250, 24, 'Single', 'Room', 'NotApplicable'),
(9, 6, '3 hours', 400, 3, 'Single', 'Room', 'NotApplicable'),
(10, 6, '6 hours', 600, 6, 'Single', 'Room', 'NotApplicable'),
(11, 6, '12 hours', 800, 12, 'Single', 'Room', 'NotApplicable'),
(12, 6, '24 hours', 1000, 24, 'Single', 'Room', 'NotApplicable'),
(14, 16, '3 hours', 2, 3, 'Single', 'Room', 'NotApplicable'),
(15, 16, '6 hours', 4, 6, 'Single', 'Room', 'NotApplicable'),
(16, 16, '12 hours', 6, 12, 'Single', 'Room', 'NotApplicable'),
(17, 16, '24 hours', 8, 24, 'Single', 'Room', 'NotApplicable'),
(18, 18, '3 hours', 4, 3, 'Single', 'Room', 'NotApplicable'),
(19, 18, '6 hours', 8, 6, 'Single', 'Room', 'NotApplicable'),
(20, 18, '12 hours', 12, 12, 'Single', 'Room', 'NotApplicable'),
(21, 18, '24 hours', 16, 24, 'Single', 'Room', 'NotApplicable'),
(22, 19, '3 hours', 25, 3, 'Single', 'Room', 'NotApplicable'),
(23, 19, '6 hours', 30, 6, 'Single', 'Room', 'NotApplicable'),
(24, 19, '12 hours', 35, 12, 'Single', 'Room', 'NotApplicable'),
(25, 19, '24 hours', 40, 24, 'Single', 'Room', 'NotApplicable'),
(26, 20, '3 hours', 12, 3, 'Single', 'Room', 'NotApplicable'),
(27, 20, '6 hours', 14, 6, 'Single', 'Room', 'NotApplicable'),
(28, 20, '12 hours', 16, 12, 'Single', 'Room', 'NotApplicable'),
(29, 20, '24 hours', 18, 24, 'Single', 'Room', 'NotApplicable'),
(30, 21, '3 hours', 1, 3, 'Single', 'Room', 'NotApplicable'),
(31, 21, '6 hours', 2, 6, 'Single', 'Room', 'NotApplicable'),
(32, 21, '12 hours', 3, 12, 'Single', 'Room', 'NotApplicable'),
(33, 21, '24 hours', 4, 24, 'Single', 'Room', 'NotApplicable'),
(34, 22, '3 hours', 7, 3, 'Single', 'Room', 'NotApplicable'),
(35, 22, '6 hours', 8, 6, 'Single', 'Room', 'NotApplicable'),
(36, 22, '12 hours', 9, 12, 'Single', 'Room', 'NotApplicable'),
(37, 22, '24 hours', 10, 24, 'Single', 'Room', 'NotApplicable'),
(38, 23, '3 hours', 3, 3, 'Single', 'Room', 'NotApplicable'),
(39, 23, '6 hours', 6, 6, 'Single', 'Room', 'NotApplicable'),
(40, 23, '12 hours', 9, 12, 'Single', 'Room', 'NotApplicable'),
(41, 23, '24 hours', 12, 24, 'Single', 'Room', 'NotApplicable'),
(63, 33, ' ', 5, 0, 'Single', 'Cottage', 'NotApplicable'),
(64, 34, '3 hours', 1, 3, 'Single', 'Room', 'NotApplicable'),
(65, 34, '6 hours', 2, 6, 'Single', 'Room', 'NotApplicable'),
(66, 34, '12 hours', 3, 12, 'Single', 'Room', 'NotApplicable'),
(67, 34, '24 hours', 4, 24, 'Single', 'Room', 'NotApplicable'),
(68, 35, ' ', 1200, 0, 'Single', 'Cottage', 'NotApplicable'),
(69, 36, '3 hours', 2, 3, 'Single', 'Room', 'NotApplicable'),
(70, 36, '6 hours', 4, 6, 'Single', 'Room', 'NotApplicable'),
(71, 36, '12 hours', 6, 12, 'Single', 'Room', 'NotApplicable'),
(72, 36, '24 hours', 8, 24, 'Single', 'Room', 'NotApplicable'),
(73, 37, ' ', 1200, 0, 'Single', 'Cottage', 'NotApplicable'),
(74, 38, '3 hours', 2, 3, 'Single', 'Room', 'NotApplicable'),
(75, 38, '6 hours', 4, 6, 'Single', 'Room', 'NotApplicable'),
(76, 38, '12 hours', 6, 12, 'Single', 'Room', 'NotApplicable'),
(77, 38, '24 hours', 8, 24, 'Single', 'Room', 'NotApplicable'),
(78, 39, ' ', 500, 0, 'Single', 'Cottage', 'NotApplicable'),
(79, 0, '3 hours', 1000, 3, 'Single', 'Room', 'NotApplicable'),
(80, 0, '6 hours', 2000, 6, 'Single', 'Room', 'NotApplicable'),
(81, 0, '12 hours', 3000, 12, 'Single', 'Room', 'NotApplicable'),
(82, 0, '24 hours', 4000, 24, 'Single', 'Room', 'NotApplicable'),
(83, 0, '3 hours', 1000, 3, 'Single', 'Room', 'NotApplicable'),
(84, 0, '6 hours', 2000, 6, 'Single', 'Room', 'NotApplicable'),
(85, 0, '12 hours', 3000, 12, 'Single', 'Room', 'NotApplicable'),
(86, 0, '24 hours', 4000, 24, 'Single', 'Room', 'NotApplicable'),
(87, 0, '3 hours', 1000, 3, 'Single', 'Room', 'NotApplicable'),
(88, 0, '6 hours', 2000, 6, 'Single', 'Room', 'NotApplicable'),
(89, 0, '12 hours', 3000, 12, 'Single', 'Room', 'NotApplicable'),
(90, 0, '24 hours', 4000, 24, 'Single', 'Room', 'NotApplicable'),
(91, 0, '3 hours', 1000, 3, 'Single', 'Room', 'NotApplicable'),
(92, 0, '6 hours', 2000, 6, 'Single', 'Room', 'NotApplicable'),
(93, 0, '12 hours', 3000, 12, 'Single', 'Room', 'NotApplicable'),
(94, 0, '24 hours', 4000, 24, 'Single', 'Room', 'NotApplicable'),
(95, 0, '3 hours', 1000, 3, 'Single', 'Room', 'NotApplicable'),
(96, 0, '6 hours', 2000, 6, 'Single', 'Room', 'NotApplicable'),
(97, 0, '12 hours', 3000, 12, 'Single', 'Room', 'NotApplicable'),
(98, 0, '24 hours', 4000, 24, 'Single', 'Room', 'NotApplicable'),
(99, 40, '3 hours', 300, 3, 'Single', 'Room', 'NotApplicable'),
(100, 40, '6 hours', 600, 6, 'Single', 'Room', 'NotApplicable'),
(101, 40, '12 hours', 1200, 12, 'Single', 'Room', 'NotApplicable'),
(102, 40, '24 hours', 2400, 24, 'Single', 'Room', 'NotApplicable'),
(103, 41, ' ', 100, 0, 'Single', 'Cottage', 'NotApplicable'),
(104, 42, '3 hours', 200, 3, 'Single', 'Room', 'NotApplicable'),
(105, 42, '6 hours', 300, 6, 'Single', 'Room', 'NotApplicable'),
(106, 42, '12 hours', 400, 12, 'Single', 'Room', 'NotApplicable'),
(107, 42, '24 hours', 500, 24, 'Single', 'Room', 'NotApplicable'),
(108, 43, '3 hours', 200, 3, 'Single', 'Room', 'NotApplicable'),
(109, 43, '6 hours', 400, 6, 'Single', 'Room', 'NotApplicable'),
(110, 43, '12 hours', 800, 12, 'Single', 'Room', 'NotApplicable'),
(111, 43, '24 hours', 1600, 24, 'Single', 'Room', 'NotApplicable'),
(112, 44, '3 hours', 1000, 3, 'Single', 'Room', 'NotApplicable'),
(113, 44, '6 hours', 2000, 6, 'Single', 'Room', 'NotApplicable'),
(114, 44, '12 hours', 4000, 12, 'Single', 'Room', 'NotApplicable'),
(115, 44, '24 hours', 6000, 24, 'Single', 'Room', 'NotApplicable'),
(116, 45, '3 hours', 200, 3, 'Single', 'Room', 'NotApplicable'),
(117, 45, '6 hours', 400, 6, 'Single', 'Room', 'NotApplicable'),
(118, 45, '12 hours', 600, 12, 'Single', 'Room', 'NotApplicable'),
(119, 45, '24 hours', 800, 24, 'Single', 'Room', 'NotApplicable'),
(120, 46, ' ', 1200, 0, 'Single', 'Cottage', 'NotApplicable'),
(121, 47, ' ', 1000, 0, 'Single', 'Cottage', 'NotApplicable'),
(123, 49, '3 hours', 1000, 3, 'Single', 'Room', 'NotApplicable'),
(124, 49, '6 hours', 2000, 6, 'Single', 'Room', 'NotApplicable'),
(125, 49, '12 hours', 4000, 12, 'Single', 'Room', 'NotApplicable'),
(126, 49, '24 hours', 8000, 24, 'Single', 'Room', 'NotApplicable'),
(127, 50, ' ', 2000, 0, 'Single', 'Cottage', 'NotApplicable'),
(128, 51, '3 hours', 100, 3, 'Single', 'Room', 'NotApplicable'),
(129, 51, '6 hours', 200, 6, 'Single', 'Room', 'NotApplicable'),
(130, 51, '12 hours', 400, 12, 'Single', 'Room', 'NotApplicable'),
(131, 51, '24 hours', 800, 24, 'Single', 'Room', 'NotApplicable'),
(132, 52, '3 hours', 200, 3, 'Single', 'Room', 'NotApplicable'),
(133, 52, '6 hours', 400, 6, 'Single', 'Room', 'NotApplicable'),
(134, 52, '12 hours', 800, 12, 'Single', 'Room', 'NotApplicable'),
(135, 52, '24 hours', 1600, 24, 'Single', 'Room', 'NotApplicable'),
(136, 53, '3 hours', 200, 3, 'Single', 'Room', 'NotApplicable'),
(137, 53, '6 hours', 400, 6, 'Single', 'Room', 'NotApplicable'),
(138, 53, '12 hours', 800, 12, 'Single', 'Room', 'NotApplicable'),
(139, 53, '24 hours', 1600, 24, 'Single', 'Room', 'NotApplicable'),
(140, 54, '3 hours', 200, 3, 'Single', 'Room', 'NotApplicable'),
(141, 54, '6 hours', 400, 6, 'Single', 'Room', 'NotApplicable'),
(142, 54, '12 hours', 800, 12, 'Single', 'Room', 'NotApplicable'),
(143, 54, '24 hours', 1600, 24, 'Single', 'Room', 'NotApplicable'),
(144, 55, '3 hours', 100, 3, 'Single', 'Room', 'NotApplicable'),
(145, 55, '6 hours', 200, 6, 'Single', 'Room', 'NotApplicable'),
(146, 55, '12 hours', 300, 12, 'Single', 'Room', 'NotApplicable'),
(147, 55, '24 hours', 400, 24, 'Single', 'Room', 'NotApplicable'),
(148, 56, '3 hours', 1800, 3, 'Single', 'Room', 'NotApplicable'),
(149, 56, '6 hours', 1800, 6, 'Single', 'Room', 'NotApplicable'),
(150, 56, '12 hours', 1800, 12, 'Single', 'Room', 'NotApplicable'),
(151, 56, '24 hours', 1800, 24, 'Single', 'Room', 'NotApplicable'),
(152, 57, '3 hours', 1300, 3, 'Single', 'Room', 'NotApplicable'),
(153, 57, '6 hours', 1300, 6, 'Single', 'Room', 'NotApplicable'),
(154, 57, '12 hours', 1300, 12, 'Single', 'Room', 'NotApplicable'),
(155, 57, '24 hours', 1300, 24, 'Single', 'Room', 'NotApplicable'),
(156, 58, '3 hours', 1300, 3, 'Single', 'Room', 'NotApplicable'),
(157, 58, '6 hours', 1300, 6, 'Single', 'Room', 'NotApplicable'),
(158, 58, '12 hours', 1300, 12, 'Single', 'Room', 'NotApplicable'),
(159, 58, '24 hours', 1300, 24, 'Single', 'Room', 'NotApplicable'),
(160, 59, '3 hours', 3500, 3, 'Single', 'Room', 'NotApplicable'),
(161, 59, '6 hours', 3500, 6, 'Single', 'Room', 'NotApplicable'),
(162, 59, '12 hours', 3500, 12, 'Single', 'Room', 'NotApplicable'),
(163, 59, '24 hours', 3500, 24, 'Single', 'Room', 'NotApplicable'),
(164, 60, '3 hours', 5000, 3, 'Single', 'Room', 'NotApplicable'),
(165, 60, '6 hours', 5000, 6, 'Single', 'Room', 'NotApplicable'),
(166, 60, '12 hours', 5000, 12, 'Single', 'Room', 'NotApplicable'),
(167, 60, '24 hours', 5000, 24, 'Single', 'Room', 'NotApplicable'),
(168, 61, '3 hours', 3500, 3, 'Single', 'Room', 'NotApplicable'),
(169, 61, '6 hours', 3500, 6, 'Single', 'Room', 'NotApplicable'),
(170, 61, '12 hours', 3500, 12, 'Single', 'Room', 'NotApplicable'),
(171, 61, '24 hours', 3500, 24, 'Single', 'Room', 'NotApplicable'),
(172, 62, '3 hours', 2000, 3, 'Single', 'Room', 'NotApplicable'),
(173, 62, '6 hours', 2000, 6, 'Single', 'Room', 'NotApplicable'),
(174, 62, '12 hours', 2000, 12, 'Single', 'Room', 'NotApplicable'),
(175, 62, '24 hours', 2000, 24, 'Single', 'Room', 'NotApplicable'),
(176, 63, '3 hours', 6000, 3, 'Single', 'Room', 'NotApplicable'),
(177, 63, '6 hours', 6000, 6, 'Single', 'Room', 'NotApplicable'),
(178, 63, '12 hours', 6000, 12, 'Single', 'Room', 'NotApplicable'),
(179, 63, '24 hours', 6000, 24, 'Single', 'Room', 'NotApplicable'),
(180, 64, '3 hours', 1300, 3, 'Single', 'Room', 'NotApplicable'),
(181, 64, '6 hours', 1300, 6, 'Single', 'Room', 'NotApplicable'),
(182, 64, '12 hours', 1300, 12, 'Single', 'Room', 'NotApplicable'),
(183, 64, '24 hours', 1300, 24, 'Single', 'Room', 'NotApplicable'),
(184, 65, '3 hours', 2000, 3, 'Single', 'Room', 'NotApplicable'),
(185, 65, '6 hours', 2000, 6, 'Single', 'Room', 'NotApplicable'),
(186, 65, '12 hours', 2000, 12, 'Single', 'Room', 'NotApplicable'),
(187, 65, '24 hours', 2000, 24, 'Single', 'Room', 'NotApplicable'),
(188, 66, '3 hours', 2000, 3, 'Single', 'Room', 'NotApplicable'),
(189, 66, '6 hours', 2000, 6, 'Single', 'Room', 'NotApplicable'),
(190, 66, '12 hours', 2000, 12, 'Single', 'Room', 'NotApplicable'),
(191, 66, '24 hours', 2000, 24, 'Single', 'Room', 'NotApplicable'),
(192, 67, '3 hours', 200, 3, 'Single', 'Room', 'NotApplicable'),
(193, 67, '6 hours', 250, 6, 'Single', 'Room', 'NotApplicable'),
(194, 67, '12 hours', 300, 12, 'Single', 'Room', 'NotApplicable'),
(195, 67, '24 hours', 400, 24, 'Single', 'Room', 'NotApplicable'),
(196, 68, ' ', 1200, 0, 'Single', 'Cottage', 'NotApplicable'),
(197, 69, '3 hours', 600, 3, 'Single', 'Room', 'NotApplicable'),
(198, 69, '6 hours', 600, 6, 'Single', 'Room', 'NotApplicable'),
(199, 69, '12 hours', 600, 12, 'Single', 'Room', 'NotApplicable'),
(200, 69, '24 hours', 600, 24, 'Single', 'Room', 'NotApplicable'),
(201, 70, '3 hours', 600, 3, 'Single', 'Room', 'NotApplicable'),
(202, 70, '6 hours', 600, 6, 'Single', 'Room', 'NotApplicable'),
(203, 70, '12 hours', 600, 12, 'Single', 'Room', 'NotApplicable'),
(204, 70, '24 hours', 600, 24, 'Single', 'Room', 'NotApplicable'),
(205, 71, '3 hours', 600, 3, 'Single', 'Room', 'NotApplicable'),
(206, 71, '6 hours', 600, 6, 'Single', 'Room', 'NotApplicable'),
(207, 71, '12 hours', 600, 12, 'Single', 'Room', 'NotApplicable'),
(208, 71, '24 hours', 600, 24, 'Single', 'Room', 'NotApplicable'),
(213, 73, ' ', 1222, 0, 'Single', 'Cottage', 'NotApplicable'),
(263, 88, '3 hours', 300, 3, 'Single', 'Room', 'NotApplicable'),
(264, 88, '6 hours', 600, 6, 'Single', 'Room', 'NotApplicable'),
(265, 88, '12 hours', 1000, 12, 'Single', 'Room', 'NotApplicable'),
(266, 88, '24 hours', 1800, 24, 'Single', 'Room', 'NotApplicable'),
(268, 90, '3 hours', 280, 3, 'Single', 'Room', 'NotApplicable'),
(269, 90, '6 hours', 350, 6, 'Single', 'Room', 'NotApplicable'),
(270, 90, '12 hours', 500, 12, 'Single', 'Room', 'NotApplicable'),
(271, 90, '24 hours', 900, 24, 'Single', 'Room', 'NotApplicable'),
(276, 95, '3 hours', 650, 3, 'Single', 'Room', 'NotApplicable'),
(277, 95, '6 hours', 650, 6, 'Single', 'Room', 'NotApplicable'),
(278, 95, '12 hours', 650, 12, 'Single', 'Room', 'NotApplicable'),
(279, 95, '24 hours', 650, 24, 'Single', 'Room', 'NotApplicable'),
(280, 96, '3 hours', 1250, 3, 'Single', 'Room', 'NotApplicable'),
(281, 96, '6 hours', 1250, 6, 'Single', 'Room', 'NotApplicable'),
(282, 96, '12 hours', 1250, 12, 'Single', 'Room', 'NotApplicable'),
(283, 96, '24 hours', 1250, 24, 'Single', 'Room', 'NotApplicable'),
(284, 97, '3 hours', 1850, 3, 'Single', 'Room', 'NotApplicable'),
(285, 97, '6 hours', 1850, 6, 'Single', 'Room', 'NotApplicable'),
(286, 97, '12 hours', 1850, 12, 'Single', 'Room', 'NotApplicable'),
(287, 97, '24 hours', 1850, 24, 'Single', 'Room', 'NotApplicable'),
(288, 98, '3 hours', 1650, 3, 'Single', 'Room', 'NotApplicable'),
(289, 98, '6 hours', 1650, 6, 'Single', 'Room', 'NotApplicable'),
(290, 98, '12 hours', 1650, 12, 'Single', 'Room', 'NotApplicable'),
(291, 98, '24 hours', 1650, 24, 'Single', 'Room', 'NotApplicable'),
(292, 99, '3 hours', 450, 3, 'Single', 'Room', 'NotApplicable'),
(293, 99, '6 hours', 450, 6, 'Single', 'Room', 'NotApplicable'),
(294, 99, '12 hours', 450, 12, 'Single', 'Room', 'NotApplicable'),
(295, 99, '24 hours', 450, 24, 'Single', 'Room', 'NotApplicable'),
(296, 100, ' ', 2500, 0, 'Single', 'Cottage', 'NotApplicable'),
(297, 101, '3 hours', 650, 3, 'Single', 'Room', 'NotApplicable'),
(298, 101, '6 hours', 650, 6, 'Single', 'Room', 'NotApplicable'),
(299, 101, '12 hours', 650, 12, 'Single', 'Room', 'NotApplicable'),
(300, 101, '24 hours', 650, 24, 'Single', 'Room', 'NotApplicable'),
(301, 102, '3 hours', 1250, 3, 'Single', 'Room', 'NotApplicable'),
(302, 102, '6 hours', 1250, 6, 'Single', 'Room', 'NotApplicable'),
(303, 102, '12 hours', 1250, 12, 'Single', 'Room', 'NotApplicable'),
(304, 102, '24 hours', 1250, 24, 'Single', 'Room', 'NotApplicable'),
(305, 103, ' ', 300, 0, 'Single', 'Cottage', 'NotApplicable'),
(306, 104, ' ', 250, 0, 'Single', 'Cottage', 'NotApplicable'),
(307, 105, ' ', 500, 0, 'Single', 'Cottage', 'NotApplicable'),
(308, 106, '3 hours', 1250, 3, 'Single', 'Room', 'NotApplicable'),
(309, 106, '6 hours', 1250, 6, 'Single', 'Room', 'NotApplicable'),
(310, 106, '12 hours', 1250, 12, 'Single', 'Room', 'NotApplicable'),
(311, 106, '24 hours', 1250, 24, 'Single', 'Room', 'NotApplicable'),
(312, 107, ' ', 700, 0, 'Single', 'Cottage', 'NotApplicable'),
(313, 108, ' ', 1300, 0, 'Single', 'Cottage', 'NotApplicable'),
(314, 109, ' ', 500, 0, 'Single', 'Cottage', 'NotApplicable'),
(315, 110, ' ', 700, 0, 'Single', 'Cottage', 'NotApplicable'),
(316, 111, ' ', 1300, 0, 'Single', 'Cottage', 'NotApplicable'),
(317, 112, ' ', 500, 0, 'Single', 'Cottage', 'NotApplicable'),
(318, 113, ' ', 2000, 0, 'Single', 'Cottage', 'NotApplicable'),
(319, 114, ' ', 2000, 0, 'Single', 'Cottage', 'NotApplicable'),
(320, 115, ' ', 100, 0, 'Single', 'Cottage', 'NotApplicable'),
(321, 116, ' ', 1000, 0, 'Single', 'Cottage', 'NotApplicable'),
(322, 117, ' ', 1000, 0, 'Single', 'Amenity', 'NotApplicable'),
(323, 118, ' ', 1200, 0, 'Single', 'Amenity', 'NotApplicable'),
(324, 119, ' ', 500, 0, 'Single', 'Amenity', 'NotApplicable'),
(325, 120, ' ', 1200, 0, 'Single', 'Amenity', 'NotApplicable'),
(326, 121, ' ', 600, 0, 'Single', 'Cottage', 'NotApplicable'),
(327, 122, ' ', 200, 0, 'Single', 'Amenity', 'NotApplicable'),
(328, 123, '3 hours', 650, 3, 'Single', 'Room', 'NotApplicable'),
(329, 123, '6 hours', 650, 6, 'Single', 'Room', 'NotApplicable'),
(330, 123, '12 hours', 650, 12, 'Single', 'Room', 'NotApplicable'),
(331, 123, '24 hours', 650, 24, 'Single', 'Room', 'NotApplicable'),
(332, 124, ' ', 600, 0, 'Single', 'Amenity', 'NotApplicable'),
(333, 125, ' ', 200, 0, 'Single', 'Cottage', 'NotApplicable'),
(334, 126, ' ', 600, 0, 'Single', 'Amenity', 'NotApplicable'),
(335, 127, ' ', 800, 0, 'Single', 'Amenity', 'NotApplicable'),
(336, 128, '3 hours', 1200, 3, 'Single', 'Room', 'NotApplicable'),
(337, 128, '6 hours', 1200, 6, 'Single', 'Room', 'NotApplicable'),
(338, 128, '12 hours', 1200, 12, 'Single', 'Room', 'NotApplicable'),
(339, 128, '24 hours', 1200, 24, 'Single', 'Room', 'NotApplicable');

-- --------------------------------------------------------

--
-- Table structure for table `tblrating`
--

CREATE TABLE `tblrating` (
  `RatingID` int(11) NOT NULL,
  `RatingNo` int(11) NOT NULL,
  `StoreID` int(11) NOT NULL,
  `Customer_Username` varchar(90) NOT NULL,
  `RateDate` date NOT NULL,
  `FeedBack` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblrating`
--

INSERT INTO `tblrating` (`RatingID`, `RatingNo`, `StoreID`, `Customer_Username`, `RateDate`, `FeedBack`) VALUES
(10, 4, 12, 'doe123john', '2023-11-21', 'nice'),
(11, 5, 12, 'doe123john', '2023-11-21', '1'),
(12, 5, 12, 'raven', '2024-02-16', ''),
(13, 5, 12, 'raven', '2024-02-18', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblreservation`
--

CREATE TABLE `tblreservation` (
  `RESERVEID` int(11) NOT NULL,
  `BookingNo` varchar(90) NOT NULL DEFAULT '-',
  `CONFIRMATIONCODE` varchar(50) NOT NULL DEFAULT '-',
  `TRANSDATE` date NOT NULL DEFAULT current_timestamp(),
  `ROOMID` int(11) NOT NULL DEFAULT 0,
  `ARRIVAL` datetime NOT NULL DEFAULT current_timestamp(),
  `DEPARTURE` datetime NOT NULL DEFAULT current_timestamp(),
  `RPRICE` double NOT NULL DEFAULT 0,
  `GUESTID` int(11) NOT NULL DEFAULT 0,
  `PRORPOSE` varchar(30) NOT NULL DEFAULT '-',
  `STATUS` varchar(11) NOT NULL DEFAULT '-',
  `BOOKDATE` datetime NOT NULL DEFAULT current_timestamp(),
  `REMARKS` varchar(9999) NOT NULL DEFAULT '-',
  `ResortID` int(11) NOT NULL DEFAULT 0,
  `OCCUPANTS` text DEFAULT NULL,
  `PARTIAL` int(11) NOT NULL DEFAULT 0,
  `PAYMENT_STATUS` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblreservation`
--

INSERT INTO `tblreservation` (`RESERVEID`, `BookingNo`, `CONFIRMATIONCODE`, `TRANSDATE`, `ROOMID`, `ARRIVAL`, `DEPARTURE`, `RPRICE`, `GUESTID`, `PRORPOSE`, `STATUS`, `BOOKDATE`, `REMARKS`, `ResortID`, `OCCUPANTS`, `PARTIAL`, `PAYMENT_STATUS`) VALUES
(1, '-', '24fqnmwt', '2023-01-03', 2, '2023-01-03 06:19:00', '2023-01-03 05:19:00', 150, 7, 'Travel', 'Cancelled', '0000-00-00 00:00:00', '1 hr and 0 min', 12, NULL, 0, NULL),
(2, '-', 'zjsxtjw8', '2023-01-03', 2, '2023-01-03 12:07:00', '2023-01-03 11:07:00', 150, 3, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1 hr and 0 min', 12, NULL, 0, NULL),
(3, '-', 'ovmmksty', '2023-01-03', 16, '2023-01-03 13:04:00', '2023-01-03 12:04:00', 2, 9, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1 hr and 0 min', 16, NULL, 0, NULL),
(4, '-', 'bm708aru', '2023-01-03', 18, '2023-01-03 13:24:00', '2023-01-25 15:00:00', 352, 10, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '22day(s) and 1 hr(s) and 36 min(s)', 17, NULL, 0, NULL),
(5, '-', 'rtaiykd6', '2023-01-03', 25, '2023-01-03 14:44:00', '2023-01-03 13:44:00', 2, 7, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1 hr and 0 min', 19, NULL, 0, NULL),
(6, '-', 'rtaiykd6', '2023-01-03', 26, '2023-01-03 14:44:00', '2023-01-03 13:44:00', 1, 7, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1 hr and 0 min', 19, NULL, 0, NULL),
(7, '-', 'rtaiykd6', '2023-01-03', 27, '2023-01-03 14:44:00', '2023-01-03 13:44:00', 1, 7, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1 hr and 0 min', 19, NULL, 0, NULL),
(8, '-', 'y8d4awit', '2023-01-03', 25, '2023-01-03 14:51:00', '2023-01-03 13:51:00', 2, 7, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1 hr and 0 min', 19, NULL, 0, NULL),
(9, '-', '20mftn3x', '2023-01-04', 2, '2023-01-04 15:00:00', '2023-01-04 22:00:00', 600, 12, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '7 hr and 0 min', 12, NULL, 0, NULL),
(10, '-', 'mi8q2av2', '2023-01-04', 2, '2023-01-04 12:32:00', '2023-01-04 11:32:00', 150, 14, 'Travel', 'Cancelled', '0000-00-00 00:00:00', '1 hr and 0 min', 12, NULL, 0, NULL),
(11, '-', 'nfyjdc74', '2023-01-04', 33, '2023-01-05 09:00:00', '2023-01-06 09:00:00', 10, 13, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '2day(s)', 19, NULL, 0, NULL),
(12, '-', 'yywfxgqq', '2023-01-04', 2, '2023-01-04 10:00:00', '2023-01-04 14:00:00', 300, 14, 'Travel', 'Cancelled', '0000-00-00 00:00:00', '4 hr and 0 min', 12, NULL, 0, NULL),
(13, '-', 'is2vsmaw', '2023-01-04', 35, '2023-01-04 13:34:00', '2023-01-04 12:34:00', 1200, 16, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1day', 20, NULL, 0, NULL),
(14, '-', '06awne3f', '2023-01-04', 35, '2023-01-04 13:36:00', '2023-01-04 12:36:00', 1200, 16, 'Travel', 'Checkedin', '0000-00-00 00:00:00', '1day', 20, NULL, 0, NULL),
(15, '-', '06awne3f', '2023-01-04', 36, '2023-01-04 13:36:00', '2023-01-04 12:36:00', 2, 16, 'Travel', 'Checkedin', '0000-00-00 00:00:00', '1 hr and 0 min', 20, NULL, 0, NULL),
(16, '-', '7vca3tsr', '2023-01-04', 34, '2023-01-04 14:09:00', '2023-01-04 13:09:00', 1, 7, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1 hr and 0 min', 19, NULL, 0, NULL),
(17, '-', 'nb8b5k8f', '2023-01-04', 37, '2023-01-04 14:30:00', '2023-01-04 13:30:00', 1200, 17, 'Travel', 'Cancelled', '0000-00-00 00:00:00', '1day', 21, NULL, 0, NULL),
(18, '-', '2mk4b75k', '2023-01-04', 38, '2023-01-04 14:36:00', '2023-01-04 13:36:00', 2, 17, 'Travel', 'Confirmed', '0000-00-00 00:00:00', '1 hr and 0 min', 21, NULL, 0, NULL),
(19, '-', 'epvoiimu', '2023-01-04', 34, '2023-01-04 14:17:00', '2023-01-04 13:17:00', 1, 7, 'Travel', 'Cancelled', '0000-00-00 00:00:00', '1 hr and 0 min', 19, NULL, 0, NULL),
(20, '-', 'e7f574vq', '2023-01-04', 34, '2023-01-04 14:57:00', '2023-01-04 13:57:00', 1, 7, 'Travel', 'Cancelled', '0000-00-00 00:00:00', '1 hr and 0 min', 19, NULL, 0, NULL),
(21, '-', 'qjvsendz', '2023-01-04', 33, '2023-01-04 17:43:00', '2023-01-04 16:43:00', 5, 18, 'Travel', 'Confirmed', '0000-00-00 00:00:00', '1day', 19, NULL, 0, NULL),
(22, '-', 'dabywbeg', '2023-01-04', 33, '2023-01-25 17:00:00', '2023-04-07 16:43:00', 365, 19, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '73day(s)', 19, NULL, 0, NULL),
(23, '-', 'e4ve7wb8', '2023-01-04', 2, '2023-01-04 17:57:00', '2023-01-04 16:57:00', 150, 19, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1 hr and 0 min', 12, NULL, 0, NULL),
(24, '-', 'kvtgjirn', '2023-01-04', 2, '2023-01-04 18:00:00', '2023-01-04 17:00:00', 150, 19, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1 hr and 0 min', 12, NULL, 0, NULL),
(25, '-', 'hqqcq37c', '2023-01-05', 41, '2023-01-05 01:56:00', '2023-01-05 00:56:00', 100, 21, 'Travel', 'Cancelled', '0000-00-00 00:00:00', '1day', 22, NULL, 0, NULL),
(26, '-', 'cn3p86c7', '2023-01-05', 42, '2023-01-05 02:15:00', '2023-01-05 01:15:00', 200, 21, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1 hr and 0 min', 22, NULL, 0, NULL),
(27, '-', 'okaar68x', '2023-01-05', 34, '2023-01-05 03:17:00', '2023-01-05 02:17:00', 1, 7, 'Travel', 'Confirmed', '0000-00-00 00:00:00', '1 hr and 0 min', 19, NULL, 0, NULL),
(28, '-', '72muajmo', '2023-01-05', 34, '2023-01-05 05:11:00', '2023-01-05 04:11:00', 1, 7, 'Travel', 'Confirmed', '0000-00-00 00:00:00', '1 hr and 0 min', 19, NULL, 0, NULL),
(29, '-', 'bf822sb0', '2023-01-05', 43, '2023-01-05 08:41:00', '2023-01-05 07:41:00', 200, 7, 'Travel', 'Confirmed', '0000-00-00 00:00:00', '1 hr and 0 min', 23, NULL, 0, NULL),
(30, '-', 'yhxqunxj', '2023-01-05', 43, '2023-01-05 13:00:00', '2023-01-05 15:00:00', 200, 22, 'Travel', 'Cancelled', '0000-00-00 00:00:00', '2 hr and 0 min', 23, NULL, 0, NULL),
(31, '-', 'yhxqunxj', '2023-01-05', 44, '2023-01-05 13:00:00', '2023-01-05 15:00:00', 1000, 22, 'Travel', 'Cancelled', '0000-00-00 00:00:00', '2 hr and 0 min', 23, NULL, 0, NULL),
(32, '-', 'dkzqvpxf', '2023-01-05', 43, '2023-01-06 10:00:00', '2023-01-07 10:00:00', 1600, 22, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1day(s) and 0 hr(s) and 0 min(s)', 23, NULL, 0, NULL),
(33, '-', 'dkzqvpxf', '2023-01-05', 44, '2023-01-06 10:00:00', '2023-01-08 10:00:00', 12000, 22, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '2day(s) and 0 hr(s) and 0 min(s)', 23, NULL, 0, NULL),
(34, '-', 'msj0bn0g', '2023-01-05', 45, '2023-01-05 14:45:00', '2023-01-05 13:45:00', 200, 23, 'Travel', 'Pending', '0000-00-00 00:00:00', '1 hr and 0 min', 24, NULL, 0, NULL),
(35, '-', 'msj0bn0g', '2023-01-05', 46, '2023-01-05 14:45:00', '2023-01-05 13:45:00', 1200, 23, 'Travel', 'Pending', '0000-00-00 00:00:00', '1day', 24, NULL, 0, NULL),
(36, '-', '7swzmm58', '2023-01-05', 52, '2023-01-05 15:08:00', '2023-01-05 14:08:00', 200, 7, 'Travel', 'Checkedin', '0000-00-00 00:00:00', '1 hr and 0 min', 25, NULL, 0, NULL),
(37, '-', 'esqvnutk', '2023-01-05', 51, '2023-01-05 16:39:00', '2023-01-05 15:39:00', 100, 24, 'Travel', 'Checkedin', '0000-00-00 00:00:00', '1 hr and 0 min', 25, NULL, 0, NULL),
(38, '-', 'zjivj6jq', '2023-01-05', 51, '2023-01-05 16:40:00', '2023-01-05 15:40:00', 100, 24, 'Travel', 'Pending', '0000-00-00 00:00:00', '1 hr and 0 min', 25, NULL, 0, NULL),
(39, '-', 'emsnwdee', '2023-01-05', 55, '2023-01-05 17:19:00', '2023-01-05 16:19:00', 100, 23, 'Travel', 'Confirmed', '0000-00-00 00:00:00', '1 hr and 0 min', 28, NULL, 0, NULL),
(40, '-', 'sz7vussa', '2023-01-06', 59, '2023-01-16 12:00:00', '2023-01-19 12:00:00', 10500, 7, 'Travel', 'Confirmed', '0000-00-00 00:00:00', '3day(s) and 0 hr(s) and 0 min(s)', 29, NULL, 0, NULL),
(41, '-', 'aarin4x2', '2023-01-07', 67, '2023-01-07 07:21:00', '2023-01-07 06:21:00', 200, 23, 'Travel', 'Pending', '0000-00-00 00:00:00', '1 hr and 0 min', 30, NULL, 0, NULL),
(42, '-', 'oig6wbgb', '2023-01-07', 67, '2023-01-07 07:32:00', '2023-01-07 06:32:00', 200, 23, 'Travel', 'Pending', '0000-00-00 00:00:00', '1 hr and 0 min', 30, NULL, 0, NULL),
(43, '-', 'oig6wbgb', '2023-01-07', 68, '2023-01-07 07:32:00', '2023-01-07 06:32:00', 1200, 23, 'Travel', 'Pending', '0000-00-00 00:00:00', '1day', 30, NULL, 0, NULL),
(45, '-', 'sb62zbci', '2023-01-09', 2, '2023-01-09 03:00:00', '2023-01-09 02:00:00', 150, 7, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1 hr and 0 min', 12, NULL, 0, NULL),
(46, '-', '2w2074st', '2023-01-09', 56, '2023-01-09 03:58:00', '2023-01-09 02:58:00', 1800, 7, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1 hr and 0 min', 29, NULL, 0, NULL),
(47, '-', 'he52myx4', '2023-01-11', 2, '2023-01-11 20:32:00', '2023-01-11 19:32:00', 150, 27, 'Travel', 'Cancelled', '0000-00-00 00:00:00', '1 hr and 0 min', 12, NULL, 0, NULL),
(48, '-', '2zayy6kt', '2023-01-29', 72, '2023-01-28 23:57:00', '2023-01-28 22:57:00', 2, 23, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1 hr and 0 min', 38, NULL, 0, NULL),
(49, '-', '2ge85hxq', '2023-02-16', 2, '2023-02-16 16:45:00', '2023-02-17 16:45:00', 1200, 5, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1day(s) and 0 hr(s) and 0 min(s)', 12, NULL, 0, NULL),
(50, '-', '2ge85hxq', '2023-02-16', 39, '2023-02-16 16:45:00', '2023-02-17 16:45:00', 1000, 5, 'Travel', 'Cancelled', '0000-00-00 00:00:00', '2day(s)', 12, NULL, 0, NULL),
(51, '-', 'dmwodtoo', '2023-02-19', 2, '2023-02-19 09:00:00', '2023-02-19 15:00:00', 300, 5, 'Travel', 'Pending', '0000-00-00 00:00:00', '6 hr and 0 min', 29, NULL, 0, NULL),
(52, '-', 'dmwodtoo', '2023-02-19', 56, '2023-02-19 09:00:00', '2023-02-19 15:00:00', 1800, 5, 'Travel', 'Pending', '0000-00-00 00:00:00', '6 hr and 0 min', 29, NULL, 0, NULL),
(60, '-', 'orqtzudq', '2023-08-31', 73, '2023-08-31 22:45:00', '2023-09-02 23:45:00', 2981.68, 37, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1 day(s) and 0 hour(s) and 0 mins', 49, NULL, 0, NULL),
(62, '-', 'cmo6cksv', '2023-09-01', 88, '2023-09-01 17:00:00', '2023-09-01 18:00:00', 300, 38, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1 hr and 0 min', 49, NULL, 0, NULL),
(63, '-', 'nd38stbp', '2023-09-01', 88, '2023-09-01 18:00:00', '2023-09-03 21:00:00', 4500, 37, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1 day(s) and 1 hour(s) and 0 mins', 49, NULL, 0, NULL),
(64, '-', '2kp2qbyq', '2023-09-01', 73, '2023-09-01 18:02:00', '2023-09-03 20:02:00', 2981.68, 37, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1 day(s) and 1 hour(s) and 0 mins', 49, NULL, 0, NULL),
(65, '-', '8pryycqw', '2023-09-01', 88, '2023-09-01 18:02:00', '2023-09-03 20:02:00', 4200, 37, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '2 day(s) and 1 hour(s) and 0 mins', 49, NULL, 0, NULL),
(66, '-', '6qtdqfhu', '2023-09-01', 73, '2023-09-01 18:08:00', '2023-09-01 19:08:00', 1222, 37, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1day', 49, NULL, 0, NULL),
(67, '-', 'fb40u6rg', '2023-09-01', 73, '2023-09-01 18:20:00', '2023-09-01 19:20:00', 1222, 37, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1day', 49, NULL, 0, NULL),
(68, '-', 'nygdn703', '2023-09-01', 73, '2023-09-01 18:26:00', '2023-09-02 20:26:00', 3377.6, 37, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1 day(s) and 1 hour(s) and 0 mins', 49, NULL, 0, NULL),
(69, '-', 'nygdn703', '2023-09-01', 88, '2023-09-01 18:26:00', '2023-09-02 20:26:00', 3377.6, 37, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1 day(s) and 1 hour(s) and 0 mins', 49, NULL, 0, NULL),
(70, '-', '66tojwo0', '2023-09-02', 88, '2023-09-02 18:09:00', '2023-09-02 19:09:00', 300, 37, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1 hr and 0 min', 49, NULL, 0, NULL),
(71, '-', 'jeveeu3g', '2023-09-03', 88, '2023-09-03 15:44:00', '2023-09-03 16:44:00', 300, 37, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1 hr and 0 min', 49, NULL, 0, NULL),
(72, '-', 'pwonj4yq', '2023-09-18', 2, '2023-09-18 14:55:00', '2023-09-29 01:55:00', 12750, 41, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '10 day(s) and 12 hour(s) and 0 mins', 12, NULL, 0, NULL),
(73, '-', '3y8tzyyx', '2023-09-18', 2, '2023-09-18 15:05:00', '2023-09-30 14:05:00', 14400, 41, 'Travel', 'Cancelled', '0000-00-00 00:00:00', '12day(s) and 23 hr(s) and 0 min(s)', 12, NULL, 0, NULL),
(74, '-', '3y8tzyyx', '2023-09-18', 39, '2023-09-18 15:05:00', '2023-09-30 14:05:00', 6500, 41, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '13day(s)', 12, NULL, 0, NULL),
(75, '-', 'u2iizi5s', '2023-09-26', 39, '2023-10-12 12:00:00', '2023-10-18 16:00:00', 17200, 43, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '2 day(s) and 3 hour(s) and 0 mins', 12, NULL, 0, NULL),
(76, '-', 'u2iizi5s', '2023-09-26', 40, '2023-10-12 12:00:00', '2023-10-18 16:00:00', 17200, 43, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '2 day(s) and 3 hour(s) and 0 mins', 12, NULL, 0, NULL),
(77, '-', '46abfwrp', '2023-09-29', 40, '2023-09-29 04:31:00', '2023-09-29 03:31:00', 300, 41, 'Travel', 'Cancelled', '0000-00-00 00:00:00', '1 hr and 0 min', 12, NULL, 0, NULL),
(78, '-', 'h3v4rfpo', '2023-09-29', 91, '2023-09-29 04:33:00', '2023-09-29 03:33:00', 0, 41, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1day', 12, NULL, 0, NULL),
(79, '-', 'scqaeiec', '2023-09-29', 94, '2023-09-29 15:00:00', '2023-09-29 05:00:00', 0, 41, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1day', 52, NULL, 0, NULL),
(80, '-', 'ft8oo2oy', '2023-09-29', 94, '2023-09-29 16:00:00', '2023-09-29 06:00:00', 0, 44, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1day', 52, NULL, 0, NULL),
(81, '-', 'axv8hwpw', '2023-09-29', 94, '2023-09-29 15:00:00', '2023-09-29 05:00:00', 0, 41, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1day', 52, NULL, 0, NULL),
(82, '-', 'xnpajf77', '2023-09-29', 92, '2023-09-29 05:44:00', '2023-09-29 04:44:00', 1000, 41, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1day', 52, NULL, 0, NULL),
(83, '-', 'xqs2ct47', '2023-10-12', 2, '2023-10-12 15:18:00', '2023-10-12 14:18:00', 150, 41, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1 hr and 0 min', 12, NULL, 0, NULL),
(84, '-', '4qq2kmwv', '2023-10-12', 2, '2023-10-12 15:59:00', '2023-10-12 14:59:00', 150, 41, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1 hr and 0 min', 12, NULL, 0, NULL),
(85, '-', '0mooncws', '2023-10-16', 2, '2023-10-16 17:18:00', '2023-10-16 16:18:00', 150, 41, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1 hr and 0 min', 12, NULL, 0, NULL),
(86, '-', 'jynbufic', '2023-10-17', 2, '2023-10-17 02:17:00', '2023-10-17 01:17:00', 150, 41, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1 hr and 0 min', 12, NULL, 0, NULL),
(87, '-', '5p7dkk2g', '2023-10-17', 116, '2023-10-17 04:10:00', '2023-10-17 03:10:00', 1000, 45, 'Travel', 'Cancelled', '0000-00-00 00:00:00', '1day', 66, NULL, 0, NULL),
(88, '-', 'mgkowt65', '2023-10-17', 116, '2023-10-17 14:00:00', '2023-10-19 14:00:00', 3000, 45, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '3day(s)', 66, NULL, 0, NULL),
(89, '-', 'bseazxtf', '2023-10-17', 115, '2023-10-17 05:12:00', '2023-10-17 04:12:00', 100, 46, 'Travel', 'Pending', '0000-00-00 00:00:00', '1day', 66, NULL, 0, NULL),
(90, '-', 'hv0er35z', '2023-10-21', 2, '2023-10-21 13:57:00', '2023-10-21 12:57:00', 150, 49, 'Travel', 'Cancelled', '0000-00-00 00:00:00', '1 hr and 0 min', 12, NULL, 0, NULL),
(91, '-', 'dbkwgy25', '2023-10-21', 39, '2023-10-21 14:02:00', '2023-10-21 13:02:00', 500, 49, 'Travel', 'Cancelled', '0000-00-00 00:00:00', '1day', 12, NULL, 0, NULL),
(92, '-', '7c0daudi', '2023-10-21', 2, '2023-10-21 22:30:00', '2023-10-22 23:00:00', 1250, 41, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1day(s) and 0 hr(s) and 30 min(s)', 12, NULL, 0, NULL),
(93, '-', 'p8n8vbzx', '2023-10-21', 2, '2023-10-21 14:36:00', '2023-10-21 13:36:00', 150, 49, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1 hr and 0 min', 12, NULL, 0, NULL),
(94, '-', 'r7kengkt', '2023-10-21', 2, '2023-10-22 00:30:00', '2023-10-22 13:00:00', 650, 41, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '12 hr and 30 min', 12, NULL, 0, NULL),
(95, '-', '88u773tx', '2023-10-21', 2, '2023-10-21 16:19:00', '2023-10-21 15:19:00', 150, 41, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1 hr and 0 min', 12, NULL, 0, NULL),
(96, '-', 'a2ess2ij', '2023-10-21', 39, '2023-10-21 16:30:00', '2023-10-21 15:30:00', 500, 41, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '1day', 12, NULL, 0, NULL),
(97, '-', '4rzbzqhh', '2023-10-25', 39, '2023-10-27 13:00:00', '2023-10-28 15:00:00', 1000, 52, 'Travel', 'Checkedout', '0000-00-00 00:00:00', '2day(s)', 12, NULL, 0, NULL),
(98, '-', 'ahvzffws', '2023-12-02', 2, '2023-12-02 11:33:00', '2023-12-03 11:33:00', 1250, 54, 'Travel', 'Checkedout', '2023-12-02 19:56:37', '1day(s) and 0 hr(s) and 0 min(s)', 12, 'Me', 250, NULL),
(99, '-', 'sca85eee', '2023-12-03', 2, '2023-12-11 18:02:00', '2023-12-13 18:02:00', 2500, 54, 'Travel', 'Checkedout', '2023-12-04 01:02:56', '2day(s) and 0 hr(s) and 0 min(s)', 12, '1', 2500, 'Full Done'),
(100, '-', 'h0inu8ut', '2024-02-15', 2, '2024-02-15 19:47:00', '2024-02-17 19:47:00', 2500, 41, 'Travel', 'Checkedout', '2024-02-16 02:48:10', '2day(s) and 0 hr(s) and 0 min(s)', 12, 'hjb', 2500, 'Full Done'),
(101, '-', 'g87mzhy6', '2024-02-16', 2, '2024-02-16 05:17:00', '2024-02-17 16:00:00', 2050, 55, 'Travel', 'Checkedout', '2024-02-16 12:25:08', '1 day(s) and 1 hour(s) and 0 mins', 12, 'ghjgh', 650, 'Full Done'),
(102, '-', 'i2ous30z', '2024-02-16', 39, '2024-02-17 11:00:00', '2024-02-27 10:00:00', 5500, 55, 'Travel', 'Checkedout', '2024-02-16 12:39:02', '1 day(s) and 0 hour(s) and 0 mins', 12, 'uyu', 6500, 'Full Done'),
(103, '-', 'zoycr03w', '2024-02-16', 2, '2024-02-16 11:00:00', '2024-02-20 15:00:00', 5150, 55, 'Travel', 'Checkedout', '2024-02-16 14:39:34', '1 day(s) and 0 hour(s) and 0 mins', 12, 'hgjh', 7300, 'Full Done'),
(104, '-', 'mjdmgow0', '2024-02-16', 2, '2024-02-16 15:10:00', '2024-02-18 15:10:00', 2650, 55, 'Travel', 'Checkedout', '2024-02-16 22:19:30', '1 day(s) and 0 hour(s) and 0 mins', 12, 'opiop[io', 1250, 'Full Done'),
(105, '-', 'utmsnvi7', '2024-02-16', 131, '2024-02-16 15:21:00', '2024-02-18 15:21:00', 600, 55, 'Travel', 'Checkedout', '2024-02-16 23:42:01', '3day(s)', 12, 'ihou', 600, 'Full Done'),
(106, '-', 'zhs07aqf', '2024-02-17', 2, '2024-02-16 16:43:00', '2024-02-17 16:43:00', 1250, 55, 'Travel', 'Checkedout', '2024-02-17 14:16:02', '1day(s) and 0 hr(s) and 0 min(s)', 12, 'hello', 1400, 'Full Done'),
(107, '-', 't2kvkpbu', '2024-02-17', 40, '2024-02-17 09:57:00', '2024-02-18 15:00:00', 2400, 55, 'Travel', 'Checkedout', '2024-02-17 16:57:34', '1day(s) and 5 hr(s) and 3 min(s)', 12, 'jklk', 2400, 'Full Done'),
(108, '-', '8xfhrb0e', '2024-02-17', 47, '2024-02-17 10:04:00', '2024-02-18 10:04:00', 2000, 55, 'Travel', 'Checkedout', '2024-02-17 17:05:38', '2day(s)', 12, '[p]p[]', 2500, 'Full Done'),
(109, '-', '8xfhrb0e', '2024-02-17', 39, '2024-02-17 10:04:00', '2024-02-17 10:04:00', 500, 55, 'Travel', 'Checkedout', '2024-02-17 17:05:38', '1day', 12, '[p]p[]', 2500, 'Full Done'),
(110, '-', 'bocecmqy', '2024-02-17', 47, '2024-02-17 10:05:00', '2024-02-18 10:05:00', 2000, 55, 'Travel', 'Checkedout', '2024-02-17 17:06:22', '2day(s)', 12, '[po]', 7600, 'Full Done'),
(111, '-', 'bocecmqy', '2024-02-17', 50, '2024-02-17 10:05:00', '2024-02-18 10:05:00', 4000, 55, 'Travel', 'Checkedout', '2024-02-17 17:06:22', '2day(s)', 12, '[po]', 7600, 'Full Done'),
(112, '-', 'bocecmqy', '2024-02-17', 54, '2024-02-17 10:05:00', '2024-02-18 10:05:00', 1600, 55, 'Travel', 'Cancelled', '2024-02-17 17:06:22', '1day(s) and 0 hr(s) and 0 min(s)', 12, '[po]', 7600, 'Full Done'),
(113, '-', '3kasqnf6', '2024-02-18', 2, '2024-02-17 16:11:00', '2024-02-18 16:11:00', 1250, 55, 'Travel', 'Checkedout', '2024-02-18 21:00:24', '1day(s) and 0 hr(s) and 0 min(s)', 12, 'uoi', 1250, 'Full Done'),
(114, '-', '36dk5rcb', '2024-02-18', 2, '2024-02-18 12:00:00', '2024-02-19 12:00:00', 1250, 55, 'Travel', 'Checkedout', '2024-02-18 21:49:39', '1day(s) and 0 hr(s) and 0 min(s)', 12, 'iouio', 1250, 'Full Done'),
(115, '-', 'juxr478w', '2024-02-18', 2, '2024-02-19 10:00:00', '2024-02-19 13:00:00', 150, 55, 'Travel', 'Checkedout', '2024-02-18 22:08:20', '3 hr and 0 min', 12, 'uiuyoi', 150, 'Full Done'),
(116, '-', 'x5jq6vqm', '2024-02-18', 2, '2024-02-18 15:09:00', '2024-02-19 15:09:00', 1250, 55, 'Travel', 'Checkedout', '2024-02-18 22:37:09', '1day(s) and 0 hr(s) and 0 min(s)', 12, 'ipiup', 2600, 'Full Done'),
(117, '-', '0b0wam4x', '2024-02-18', 2, '2024-02-18 15:42:00', '2024-02-18 22:00:00', 350, 55, 'Travel', 'Checkedout', '2024-02-18 22:46:31', '6 hr and 18 min', 12, 'ouiouip', 350, 'Full Done'),
(118, '-', 'o3g3xwxe', '2024-02-18', 2, '2024-02-18 15:48:00', '2024-02-18 22:00:00', 350, 55, 'Travel', 'Checkedout', '2024-02-18 23:07:18', '6 hr and 12 min', 12, 'hihj', 350, 'Full Done');

-- --------------------------------------------------------

--
-- Table structure for table `tblresort`
--

CREATE TABLE `tblresort` (
  `ResortID` int(11) NOT NULL,
  `ResortName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblresortrating`
--

CREATE TABLE `tblresortrating` (
  `id` int(11) NOT NULL,
  `food` int(11) NOT NULL,
  `rooms` int(11) NOT NULL,
  `amenity` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `resort_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblresortrating`
--

INSERT INTO `tblresortrating` (`id`, `food`, `rooms`, `amenity`, `code`, `resort_id`, `guest_id`) VALUES
(2, 5, 4, 5, 'ahvzffws', 12, 54),
(4, 5, 5, 4, 'sca85eee', 12, 54),
(5, 5, 5, 5, 'h0inu8ut', 12, 41),
(6, 5, 5, 5, 'i2ous30z', 12, 55),
(7, 5, 5, 5, 'zoycr03w', 12, 55),
(8, 5, 5, 5, 'x5jq6vqm', 12, 55),
(9, 1, 1, 1, 'juxr478w', 12, 55);

-- --------------------------------------------------------

--
-- Table structure for table `tblroom`
--

CREATE TABLE `tblroom` (
  `ROOMID` int(11) NOT NULL,
  `ROOMNUM` int(11) NOT NULL DEFAULT 0,
  `ROOM` varchar(30) NOT NULL DEFAULT '-',
  `ROOMDESC` text NOT NULL DEFAULT '-',
  `type` varchar(255) NOT NULL DEFAULT 'Public',
  `NUMPERSON` int(11) NOT NULL DEFAULT 0,
  `AccomodationType` varchar(90) NOT NULL DEFAULT '-',
  `ROOMIMAGE` varchar(255) NOT NULL DEFAULT '-',
  `OROOMNUM` int(11) NOT NULL DEFAULT 1,
  `ResortID` int(11) NOT NULL DEFAULT 0,
  `Discount` double NOT NULL DEFAULT 0,
  `ShowRoom` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblroom`
--

INSERT INTO `tblroom` (`ROOMID`, `ROOMNUM`, `ROOM`, `ROOMDESC`, `type`, `NUMPERSON`, `AccomodationType`, `ROOMIMAGE`, `OROOMNUM`, `ResortID`, `Discount`, `ShowRoom`) VALUES
(2, -10, 'Single Room', '<div class=\"bui-spacer--medium\" style=\"color: rgb(0, 128, 9); font-family: BlinkMacSystemFont, -apple-system, \" segoe=\"\" ui\",=\"\" roboto,=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 11.9px;=\"\" background-color:=\"\" rgb(250,=\"\" 252,=\"\" 255);=\"\" margin-bottom:=\"\" var(--bui_unit_medium)=\"\" !important;\"=\"\"><div class=\"bui-spacer--medium\" segoe=\"\" ui\",=\"\" roboto,=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 11.9px;=\"\" background-color:=\"\" rgb(250,=\"\" 252,=\"\" 255);=\"\" margin-bottom:=\"\" var(--bui_unit_medium)=\"\" !important;\"=\"\"><font face=\"georgia\" size=\"2\"><div class=\"hprt-facilities-facility\" data-name-en=\"room size\" data-facility-id=\"0\" data-facility-type=\"0\" style=\"line-height: 20px; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" bui-badge bui-badge--outline room_highlight_badge--without_borders\" style=\"font-weight: var(--DO_NOT_USE_bui_large_font_small_1_font-weight); line-height: var(--DO_NOT_USE_bui_large_font_small_1_line-height); background: var(--bui_color_background_elevation_one); border-color: transparent; border-radius: var(--bui_border_radius_100); color: var(--bui_color_foreground); display: inline-flex; -webkit-box-align: center; align-items: center; padding: calc(var(--bui_spacing_half) - var(--bui_border_width_100)) var(--bui_spacing_1x); vertical-align: middle;\"><br></span></div></font></div><div class=\"bui-spacer--medium\" segoe=\"\" ui\",=\"\" roboto,=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 11.9px;=\"\" background-color:=\"\" rgb(250,=\"\" 252,=\"\" 255);=\"\" margin-bottom:=\"\" var(--bui_unit_medium)=\"\" !important;\"=\"\"><font face=\"georgia\" size=\"2\"><div class=\"hprt-facilities-facility\" data-name-en=\"room size\" data-facility-id=\"0\" data-facility-type=\"0\" style=\"line-height: 20px; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" bui-badge bui-badge--outline room_highlight_badge--without_borders\" style=\"font-weight: var(--DO_NOT_USE_bui_large_font_small_1_font-weight); line-height: var(--DO_NOT_USE_bui_large_font_small_1_line-height); background: var(--bui_color_background_elevation_one); border-color: transparent; border-radius: var(--bui_border_radius_100); color: var(--bui_color_foreground); display: inline-flex; -webkit-box-align: center; align-items: center; padding: calc(var(--bui_spacing_half) - var(--bui_border_width_100)) var(--bui_spacing_1x); vertical-align: middle;\">17 m²</span></div><div class=\"hprt-facilities-facility\" data-name-en=\"\" data-facility-id=\"113\" data-facility-type=\"1\" style=\"line-height: 20px; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" bui-badge bui-badge--outline room_highlight_badge--without_borders\" style=\"font-weight: var(--DO_NOT_USE_bui_large_font_small_1_font-weight); line-height: var(--DO_NOT_USE_bui_large_font_small_1_line-height); background: var(--bui_color_background_elevation_one); border-color: transparent; border-radius: var(--bui_border_radius_100); color: var(--bui_color_foreground); display: inline-flex; -webkit-box-align: center; align-items: center; padding: calc(var(--bui_spacing_half) - var(--bui_border_width_100)) var(--bui_spacing_1x); vertical-align: middle;\"><svg class=\"bk-icon -streamline-landmark\" height=\"16\" width=\"16\" viewBox=\"0 0 24 24\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M4.5 8.911h3l-.75-.75v9l.75-.75h-3l.75.75v-9l-.75.75zm0-1.5a.75.75 0 0 0-.75.75v9c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-9a.75.75 0 0 0-.75-.75h-3zm6 1.5h3l-.75-.75v9l.75-.75h-3l.75.75v-9l-.75.75zm0-1.5a.75.75 0 0 0-.75.75v9c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-9a.75.75 0 0 0-.75-.75h-3zm6 1.5h3l-.75-.75v9l.75-.75h-3l.75.75v-9l-.75.75zm0-1.5a.75.75 0 0 0-.75.75v9c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-9a.75.75 0 0 0-.75-.75h-3zm4.5 12H3l.75.75v-2.25h16.5v2.25l.75-.75zm0 1.5a.75.75 0 0 0 .75-.75v-2.25a1.5 1.5 0 0 0-1.5-1.5H3.75a1.5 1.5 0 0 0-1.5 1.5v2.25c0 .414.336.75.75.75h18zm-19.5 3h21a.75.75 0 0 0 0-1.5h-21a.75.75 0 0 0 0 1.5zm0-3h21a.75.75 0 0 0 0-1.5h-21a.75.75 0 0 0 0 1.5zm18.75-15.75v2.25H3.75v-2.25l-.415.67L12 1.5l8.665 4.332-.415-.671zm1.5 0a.75.75 0 0 0-.415-.67L12.67.157a1.503 1.503 0 0 0-1.34 0L2.666 4.49a.75.75 0 0 0-.415.671v2.25a1.5 1.5 0 0 0 1.5 1.5h16.5a1.5 1.5 0 0 0 1.5-1.5v-2.25zM3 5.911h18a.75.75 0 0 0 0-1.5H3a.75.75 0 0 0 0 1.5z\"></path></svg>Landmark view</span></div><div class=\"hprt-facilities-facility\" data-name-en=\"\" data-facility-id=\"121\" data-facility-type=\"1\" style=\"line-height: 20px; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" bui-badge bui-badge--outline room_highlight_badge--without_borders\" style=\"font-weight: var(--DO_NOT_USE_bui_large_font_small_1_font-weight); line-height: var(--DO_NOT_USE_bui_large_font_small_1_line-height); background: var(--bui_color_background_elevation_one); border-color: transparent; border-radius: var(--bui_border_radius_100); color: var(--bui_color_foreground); display: inline-flex; -webkit-box-align: center; align-items: center; padding: calc(var(--bui_spacing_half) - var(--bui_border_width_100)) var(--bui_spacing_1x); vertical-align: middle;\"><svg class=\"bk-icon -streamline-city\" height=\"16\" width=\"16\" viewBox=\"0 0 24 24\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M2.75 6h9.5a.25.25 0 0 1-.25-.25v17.5l.75-.75H2.25l.75.75V5.75a.25.25 0 0 1-.25.25zm0-1.5c-.69 0-1.25.56-1.25 1.25v17.5c0 .414.336.75.75.75h10.5a.75.75 0 0 0 .75-.75V5.75c0-.69-.56-1.25-1.25-1.25h-9.5zm3-1.5h3.5A.25.25 0 0 1 9 2.75v2.5l.75-.75h-4.5l.75.75v-2.5a.25.25 0 0 1-.25.25zm0-1.5c-.69 0-1.25.56-1.25 1.25v2.5c0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75v-2.5c0-.69-.56-1.25-1.25-1.25h-3.5zM5.25 9h4.5a.75.75 0 0 0 0-1.5h-4.5a.75.75 0 0 0 0 1.5zm0 3h4.5a.75.75 0 0 0 0-1.5h-4.5a.75.75 0 0 0 0 1.5zm0 3h4.5a.75.75 0 0 0 0-1.5h-4.5a.75.75 0 0 0 0 1.5zm0 3h4.5a.75.75 0 0 0 0-1.5h-4.5a.75.75 0 0 0 0 1.5zm0 3h4.5a.75.75 0 0 0 0-1.5h-4.5a.75.75 0 0 0 0 1.5zM7.5.75v1.5a.75.75 0 0 0 1.5 0V.75a.75.75 0 0 0-1.5 0zM15.75 24h6a.75.75 0 0 0 .75-.75V10.5A1.5 1.5 0 0 0 21 9h-4.5a1.5 1.5 0 0 0-1.5 1.5v12.75a.75.75 0 0 0 1.5 0V10.5H21v12.75l.75-.75h-6a.75.75 0 0 0 0 1.5zM19.5 8.25v1.5a.75.75 0 0 0 1.5 0v-1.5a.75.75 0 0 0-1.5 0zM.75 24h22.5a.75.75 0 0 0 0-1.5H.75a.75.75 0 0 0 0 1.5z\"></path></svg>City view</span></div><div class=\"hprt-facilities-facility\" data-name-en=\"\" data-facility-id=\"11\" data-facility-type=\"1\" style=\"line-height: 20px; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" bui-badge bui-badge--outline room_highlight_badge--without_borders\" style=\"font-weight: var(--DO_NOT_USE_bui_large_font_small_1_font-weight); line-height: var(--DO_NOT_USE_bui_large_font_small_1_line-height); background: var(--bui_color_background_elevation_one); border-color: transparent; border-radius: var(--bui_border_radius_100); color: var(--bui_color_foreground); display: inline-flex; -webkit-box-align: center; align-items: center; padding: calc(var(--bui_spacing_half) - var(--bui_border_width_100)) var(--bui_spacing_1x); vertical-align: middle;\"><svg class=\"bk-icon -streamline-weather_snowflake\" height=\"16\" width=\"16\" viewBox=\"0 0 24 24\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M11.25.75v7.5a.75.75 0 0 0 1.5 0V.75a.75.75 0 0 0-1.5 0zm4.031.914l-3.75 3h.938l-3.75-3a.75.75 0 1 0-.938 1.172l3.75 3a.75.75 0 0 0 .938 0l3.75-3a.75.75 0 1 0-.938-1.172zM1.883 7.024l6.495 3.75a.75.75 0 0 0 .75-1.299l-6.495-3.75a.75.75 0 1 0-.75 1.3zM4.69 3.99l.723 4.748.468-.812-4.473 1.748a.75.75 0 0 0 .546 1.398l4.473-1.748a.75.75 0 0 0 .468-.812l-.723-4.748a.75.75 0 1 0-1.482.226zM2.632 18.274l6.495-3.75a.75.75 0 1 0-.75-1.298l-6.495 3.75a.75.75 0 1 0 .75 1.299zm-1.224-3.948l4.473 1.748-.468-.812-.723 4.748a.75.75 0 0 0 1.482.226l.723-4.748a.75.75 0 0 0-.468-.812l-4.473-1.748a.75.75 0 0 0-.546 1.398zM12.75 23.25v-7.5a.75.75 0 0 0-1.5 0v7.5a.75.75 0 0 0 1.5 0zm-4.031-.914l3.75-3h-.938l3.75 3a.75.75 0 0 0 .937-1.172l-3.75-3a.75.75 0 0 0-.937 0l-3.75 3a.75.75 0 0 0 .938 1.172zm13.399-5.36l-6.495-3.75a.75.75 0 0 0-.75 1.298l6.495 3.75a.75.75 0 0 0 .75-1.299zm-2.807 3.034l-.724-4.748-.468.812 4.473-1.748a.75.75 0 0 0-.546-1.398l-4.473 1.748a.75.75 0 0 0-.468.812l.723 4.748a.75.75 0 0 0 1.483-.226zm2.057-14.285l-6.495 3.75a.75.75 0 0 0 .75 1.3l6.495-3.75a.75.75 0 0 0-.75-1.3zm1.224 3.95l-4.473-1.749.468.812.724-4.748a.75.75 0 0 0-1.483-.226l-.723 4.748a.75.75 0 0 0 .468.812l4.473 1.748a.75.75 0 0 0 .546-1.398zM11.625 7.6L8.377 9.475a.75.75 0 0 0-.375.65v3.75a.75.75 0 0 0 .375.65l3.248 1.874a.75.75 0 0 0 .75 0l3.248-1.875a.75.75 0 0 0 .375-.649v-3.75a.75.75 0 0 0-.375-.65L12.375 7.6a.75.75 0 0 0-.75 0zm.75 1.3h-.75l3.248 1.874-.375-.649v3.75l.375-.65-3.248 1.876h.75l-3.248-1.876.375.65v-3.75l-.375.65L12.375 8.9z\"></path></svg>Air conditioning</span></div><div class=\"hprt-facilities-facility\" data-name-en=\"\" data-facility-id=\"38\" data-facility-type=\"1\" style=\"line-height: 20px; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" bui-badge bui-badge--outline room_highlight_badge--without_borders\" style=\"font-weight: var(--DO_NOT_USE_bui_large_font_small_1_font-weight); line-height: var(--DO_NOT_USE_bui_large_font_small_1_line-height); background: var(--bui_color_background_elevation_one); border-color: transparent; border-radius: var(--bui_border_radius_100); color: var(--bui_color_foreground); display: inline-flex; -webkit-box-align: center; align-items: center; padding: calc(var(--bui_spacing_half) - var(--bui_border_width_100)) var(--bui_spacing_1x); vertical-align: middle;\"><svg class=\"bk-icon -streamline-shower\" height=\"16\" width=\"16\" viewBox=\"0 0 24 24\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M15.375 10.875a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0zm1.5 0a3.375 3.375 0 1 0-6.75 0 3.375 3.375 0 0 0 6.75 0zm.375 12.375V18.7l-.667.745C20.748 18.98 24 15.925 24 10.5a2.25 2.25 0 0 0-4.5 0c0 1.945-.609 3.154-1.64 3.848a3.973 3.973 0 0 1-2.132.652H9a3.75 3.75 0 1 0 0 7.5h3a2.25 2.25 0 0 0 0-4.5H9a.75.75 0 0 0 0 1.5h3a.75.75 0 0 1 0 1.5H9a2.25 2.25 0 0 1 0-4.5h6.74a5.426 5.426 0 0 0 2.957-.908C20.154 14.613 21 12.932 21 10.5a.75.75 0 0 1 1.5 0c0 4.6-2.628 7.069-6.083 7.455a.75.75 0 0 0-.667.745v4.55a.75.75 0 0 0 1.5 0zm-7.5-1.5v1.5a.75.75 0 0 0 1.5 0v-1.5a.75.75 0 0 0-1.5 0zM.75 1.5h1.5l-.53-.22 1.402 1.402a.75.75 0 0 0 1.06-1.06L2.78.22A.75.75 0 0 0 2.25 0H.75a.75.75 0 1 0 0 1.5zm2.983 3.754a.01.01 0 0 1 .016.002c-.542-1.072-.1-2.426 1.008-2.988a2.25 2.25 0 0 1 2.037 0c-.041-.022-.043-.029-.04-.034l.002-.002-3.013 3.012zm1.07 1.05l3.002-3A1.489 1.489 0 0 0 7.51.951 3.766 3.766 0 0 0 4.079.929 3.75 3.75 0 0 0 2.43 5.971a1.49 1.49 0 0 0 2.382.323zm3.408-.968l1.116.62a.75.75 0 1 0 .728-1.312l-1.116-.62a.75.75 0 1 0-.728 1.312zm1.964-2.233l1.615.44a.75.75 0 1 0 .394-1.448l-1.615-.44a.75.75 0 1 0-.394 1.448zm4.217 1.15l1.615.44a.75.75 0 0 0 .396-1.447l-1.615-.44a.75.75 0 0 0-.396 1.447zM5.697 7.388l.577 1.038a.75.75 0 1 0 1.312-.728L7.009 6.66a.75.75 0 1 0-1.312.728zM3.284 8.94l.44 1.615a.75.75 0 1 0 1.448-.394l-.44-1.615a.75.75 0 1 0-1.448.394zm1.15 4.219l.246.896a.75.75 0 1 0 1.446-.396l-.245-.896a.75.75 0 1 0-1.446.396z\"></path></svg>Private bathroom</span></div><div class=\"hprt-facilities-facility\" data-name-en=\"\" data-facility-id=\"75\" data-facility-type=\"1\" style=\"line-height: 20px; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" bui-badge bui-badge--outline room_highlight_badge--without_borders\" style=\"font-weight: var(--DO_NOT_USE_bui_large_font_small_1_font-weight); line-height: var(--DO_NOT_USE_bui_large_font_small_1_line-height); background: var(--bui_color_background_elevation_one); border-color: transparent; border-radius: var(--bui_border_radius_100); color: var(--bui_color_foreground); display: inline-flex; -webkit-box-align: center; align-items: center; padding: calc(var(--bui_spacing_half) - var(--bui_border_width_100)) var(--bui_spacing_1x); vertical-align: middle;\"><svg class=\"bk-icon -streamline-tv_flat_screen\" height=\"16\" width=\"16\" viewBox=\"0 0 24 24\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M22.5 10.375v6.5a.25.25 0 0 1-.25.25H1.75a.25.25 0 0 1-.25-.25v-13a.25.25 0 0 1 .25-.25h20.5a.25.25 0 0 1 .25.25v6.5zm1.5 0v-6.5a1.75 1.75 0 0 0-1.75-1.75H1.75A1.75 1.75 0 0 0 0 3.875v13c0 .966.784 1.75 1.75 1.75h20.5a1.75 1.75 0 0 0 1.75-1.75v-6.5zm-16.5 12h9a.75.75 0 0 0 0-1.5h-9a.75.75 0 0 0 0 1.5zm3.75-4.5v3.75a.75.75 0 0 0 1.5 0v-3.75a.75.75 0 0 0-1.5 0z\"></path></svg>Flat-screen TV</span></div><div class=\"hprt-facilities-facility\" data-name-en=\"\" data-facility-id=\"wifi\" data-facility-type=\"2\" style=\"line-height: 20px; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" bui-badge bui-badge--outline room_highlight_badge--without_borders\" style=\"font-weight: var(--DO_NOT_USE_bui_large_font_small_1_font-weight); line-height: var(--DO_NOT_USE_bui_large_font_small_1_line-height); background: var(--bui_color_background_elevation_one); border-color: transparent; border-radius: var(--bui_border_radius_100); color: var(--bui_color_foreground); display: inline-flex; -webkit-box-align: center; align-items: center; padding: calc(var(--bui_spacing_half) - var(--bui_border_width_100)) var(--bui_spacing_1x); vertical-align: middle;\"><svg class=\"bk-icon -streamline-wifi\" height=\"16\" width=\"16\" viewBox=\"0 0 24 24\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M14.25 18.75a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0zm1.5 0a3.75 3.75 0 1 0-7.5 0 3.75 3.75 0 0 0 7.5 0zm2.08-5.833a8.25 8.25 0 0 0-11.666 0 .75.75 0 0 0 1.06 1.06 6.75 6.75 0 0 1 9.546 0 .75.75 0 0 0 1.06-1.06zm3.185-3.182c-4.979-4.98-13.051-4.98-18.03 0a.75.75 0 1 0 1.06 1.06c4.394-4.393 11.516-4.393 15.91 0a.75.75 0 1 0 1.06-1.06zm2.746-3.603C17.136-.043 6.864-.043.24 6.132A.75.75 0 1 0 1.26 7.23c6.05-5.638 15.429-5.638 21.478 0a.75.75 0 0 0 1.022-1.098z\"></path></svg>Free WiFi</span></div></font></div><ul class=\"hprt-facilities-others\" segoe=\"\" ui\",=\"\" roboto,=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 11.9px;=\"\" background-color:=\"\" rgb(250,=\"\" 252,=\"\" 255);\"=\"\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><ul class=\"hprt-facilities-others\" segoe=\"\" ui\",=\"\" roboto,=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 11.9px;=\"\" background-color:=\"\" rgb(250,=\"\" 252,=\"\" 255);\"=\"\" style=\"margin-right: 0px; margin-left: 0px; padding: 0px;\"><font face=\"georgia\" size=\"2\"><li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Free Toiletries\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\">Free toiletries</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Shower\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Shower</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Bidet\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Bidet</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Toilet\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Toilet</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Towels\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Towels</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Linen\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Linen</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"socket near the bed\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Socket near the bed</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Desk\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Desk</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Slippers\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Slippers</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Interconnecting Room(s) available\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Interconnected room(s) available</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Wake Up Service\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Wake-up service</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Wardrobe/Closet\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Wardrobe or closet</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Upper floor reachable by lift\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Upper floors accessible by elevator</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Clothes Rack\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Clothes rack</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Toilet paper\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Toilet paper</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"individual_air_conditioning\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Single-room air conditioning for guest accommodation</span></span></li></font></ul></ul></div>', 'None', 1, 'Room', 'rooms/20221218013822istockphoto-1129777688-612x612.jpg', 1, 12, 0, 1),
(6, 1, 'resort', '<br>', 'Public', 2, 'Room', 'rooms/20230103113614placeholder-image.png', 1, 13, 0, 1),
(16, 0, 'cel', '<br>', 'Public', 2, 'Room', 'rooms/2023010303498placeholder-image.png', 1, 16, 0, 1),
(17, 1, 'cottage', '<br>', 'Public', 10, 'Cottage', 'rooms/20230103252717placeholder-image.png', 1, 17, 0, 1),
(18, 0, 'cel', '<br>', 'Public', 6, 'Room', 'rooms/2023010328048placeholder-image.png', 1, 17, 0, 1),
(19, 1, 'cells', '<br>', 'Public', 4, 'Room', 'rooms/20230103020027placeholder-image.png', 1, 18, 0, 1),
(20, 1, 'lll', '<br>', 'Public', 6, 'Room', 'rooms/2023010302276placeholder-image.png', 1, 18, 0, 1),
(21, 1, 'qww', '<br>', 'Public', 2, 'Room', 'rooms/2023010304125placeholder-image.png', 1, 18, 0, 1),
(22, 1, '1', '<br>', 'Public', 4, 'Room', 'rooms/20230103043116placeholder-image.png', 1, 18, 0, 1),
(23, 1, 'uio', '<br>', 'Public', 3, 'Room', 'rooms/20230103045228placeholder-image.png', 1, 18, 0, 1),
(24, 1, 'ert', '<br>', 'Public', 10, 'Cottage', 'rooms/20230103064714placeholder-image.png', 1, 18, 0, 1),
(33, -2, 'HUT', 'Big Hut', 'Public', 8, 'Cottage', 'rooms/2023010355005download.jpg', 1, 19, 0, 1),
(34, -2, 'Single Bedroom', '<br>', 'Public', 1, 'Room', 'rooms/20230104590410istockphoto-1129777688-612x612.jpg', 1, 19, 0, 1),
(35, -1, 'cottage 1', '<br>', 'Public', 10, 'Cottage', 'rooms/2023010429038placeholder-image.png', 1, 20, 0, 1),
(36, 0, 'room1', '<br>', 'Public', 2, 'Room', 'rooms/20230104373217placeholder-image.png', 1, 20, 0, 1),
(37, 0, 'cottage 2', '<br>', 'Public', 15, 'Cottage', 'rooms/20230104273829placeholder-image.png', 1, 21, 0, 1),
(38, 0, 'Room 1', '<br>', 'Public', 2, 'Room', 'rooms/20230104360430placeholder-image.png', 1, 21, 0, 1),
(39, 1, 'Small Hut', '<div class=\"hprt-roomtype-bed\" style=\"margin: 14px 0px 12px 5px;\" segoe=\"\" ui\",=\"\" roboto,=\"\" helvetica,=\"\" arial,=\"\" sans-serif;\"=\"\"><div class=\"bed-types-wrapper\r\n\" style=\"margin: 8px 0px; line-height: 1.4;\"><ul style=\"\"><li style=\"\"><font color=\"#009900\">Well Ventilated</font></li><li style=\"\"><font color=\"#009900\">With Table</font></li><li style=\"\"><font color=\"#009900\">Good for 5 Pax chairs</font></li></ul></div></div>', 'None', 5, 'Cottage', 'rooms/202310220348112023010427112320230103180827download.jpg', 1, 12, 0, 1);
INSERT INTO `tblroom` (`ROOMID`, `ROOMNUM`, `ROOM`, `ROOMDESC`, `type`, `NUMPERSON`, `AccomodationType`, `ROOMIMAGE`, `OROOMNUM`, `ResortID`, `Discount`, `ShowRoom`) VALUES
(40, 1, 'Deluxe Triple Room', '<div class=\"bui-spacer--medium\" style=\"color: rgb(0, 128, 9); margin-bottom: var(--bui_unit_medium)  !important;\"><font face=\"georgia\" style=\"\" size=\"2\"><div class=\"hprt-facilities-facility\" data-name-en=\"privacy\" data-facility-id=\"0\" data-facility-type=\"0\" style=\"line-height: 20px; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" bui-badge bui-badge--outline room_highlight_badge--without_borders\" style=\"font-weight: var(--DO_NOT_USE_bui_large_font_small_1_font-weight); line-height: var(--DO_NOT_USE_bui_large_font_small_1_line-height); background: var(--bui_color_background_elevation_one); border-color: transparent; border-radius: var(--bui_border_radius_100); color: var(--bui_color_foreground); display: inline-flex; -webkit-box-align: center; align-items: center; padding: calc(var(--bui_spacing_half) - var(--bui_border_width_100)) var(--bui_spacing_1x); vertical-align: middle;\"><br></span></div></font></div><div class=\"bui-spacer--medium\" style=\"color: rgb(0, 128, 9); margin-bottom: var(--bui_unit_medium)  !important;\"><font face=\"georgia\" style=\"\" size=\"2\"><div class=\"hprt-facilities-facility\" data-name-en=\"privacy\" data-facility-id=\"0\" data-facility-type=\"0\" style=\"line-height: 20px; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" bui-badge bui-badge--outline room_highlight_badge--without_borders\" style=\"font-weight: var(--DO_NOT_USE_bui_large_font_small_1_font-weight); line-height: var(--DO_NOT_USE_bui_large_font_small_1_line-height); background: var(--bui_color_background_elevation_one); border-color: transparent; border-radius: var(--bui_border_radius_100); color: var(--bui_color_foreground); display: inline-flex; -webkit-box-align: center; align-items: center; padding: calc(var(--bui_spacing_half) - var(--bui_border_width_100)) var(--bui_spacing_1x); vertical-align: middle;\">Room</span></div><div class=\"hprt-facilities-facility\" data-name-en=\"room size\" data-facility-id=\"0\" data-facility-type=\"0\" style=\"line-height: 20px; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" bui-badge bui-badge--outline room_highlight_badge--without_borders\" style=\"font-weight: var(--DO_NOT_USE_bui_large_font_small_1_font-weight); line-height: var(--DO_NOT_USE_bui_large_font_small_1_line-height); background: var(--bui_color_background_elevation_one); border-color: transparent; border-radius: var(--bui_border_radius_100); color: var(--bui_color_foreground); display: inline-flex; -webkit-box-align: center; align-items: center; padding: calc(var(--bui_spacing_half) - var(--bui_border_width_100)) var(--bui_spacing_1x); vertical-align: middle;\"><svg class=\"bk-icon -streamline-room_size\" height=\"16\" width=\"16\" viewBox=\"0 0 24 24\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M3.75 23.25V7.5a.75.75 0 0 0-1.5 0v15.75a.75.75 0 0 0 1.5 0zM.22 21.53l2.25 2.25a.75.75 0 0 0 1.06 0l2.25-2.25a.75.75 0 1 0-1.06-1.06l-2.25 2.25h1.06l-2.25-2.25a.75.75 0 0 0-1.06 1.06zM5.78 9.22L3.53 6.97a.75.75 0 0 0-1.06 0L.22 9.22a.75.75 0 1 0 1.06 1.06l2.25-2.25H2.47l2.25 2.25a.75.75 0 1 0 1.06-1.06zM7.5 3.75h15.75a.75.75 0 0 0 0-1.5H7.5a.75.75 0 0 0 0 1.5zM9.22.22L6.97 2.47a.75.75 0 0 0 0 1.06l2.25 2.25a.75.75 0 1 0 1.06-1.06L8.03 2.47v1.06l2.25-2.25A.75.75 0 1 0 9.22.22zm12.31 5.56l2.25-2.25a.75.75 0 0 0 0-1.06L21.53.22a.75.75 0 1 0-1.06 1.06l2.25 2.25V2.47l-2.25 2.25a.75.75 0 0 0 1.06 1.06zM10.5 13.05v7.2a2.25 2.25 0 0 0 2.25 2.25h6A2.25 2.25 0 0 0 21 20.25v-7.2a.75.75 0 0 0-1.5 0v7.2a.75.75 0 0 1-.75.75h-6a.75.75 0 0 1-.75-.75v-7.2a.75.75 0 0 0-1.5 0zm13.252 2.143l-6.497-5.85a2.25 2.25 0 0 0-3.01 0l-6.497 5.85a.75.75 0 0 0 1.004 1.114l6.497-5.85a.75.75 0 0 1 1.002 0l6.497 5.85a.75.75 0 0 0 1.004-1.114z\"></path></svg>27 m²</span></div><div class=\"hprt-facilities-facility\" data-name-en=\"\" data-facility-id=\"38\" data-facility-type=\"1\" style=\"line-height: 20px; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" bui-badge bui-badge--outline room_highlight_badge--without_borders\" style=\"font-weight: var(--DO_NOT_USE_bui_large_font_small_1_font-weight); line-height: var(--DO_NOT_USE_bui_large_font_small_1_line-height); background: var(--bui_color_background_elevation_one); border-color: transparent; border-radius: var(--bui_border_radius_100); color: var(--bui_color_foreground); display: inline-flex; -webkit-box-align: center; align-items: center; padding: calc(var(--bui_spacing_half) - var(--bui_border_width_100)) var(--bui_spacing_1x); vertical-align: middle;\"><svg class=\"bk-icon -streamline-shower\" height=\"16\" width=\"16\" viewBox=\"0 0 24 24\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M15.375 10.875a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0zm1.5 0a3.375 3.375 0 1 0-6.75 0 3.375 3.375 0 0 0 6.75 0zm.375 12.375V18.7l-.667.745C20.748 18.98 24 15.925 24 10.5a2.25 2.25 0 0 0-4.5 0c0 1.945-.609 3.154-1.64 3.848a3.973 3.973 0 0 1-2.132.652H9a3.75 3.75 0 1 0 0 7.5h3a2.25 2.25 0 0 0 0-4.5H9a.75.75 0 0 0 0 1.5h3a.75.75 0 0 1 0 1.5H9a2.25 2.25 0 0 1 0-4.5h6.74a5.426 5.426 0 0 0 2.957-.908C20.154 14.613 21 12.932 21 10.5a.75.75 0 0 1 1.5 0c0 4.6-2.628 7.069-6.083 7.455a.75.75 0 0 0-.667.745v4.55a.75.75 0 0 0 1.5 0zm-7.5-1.5v1.5a.75.75 0 0 0 1.5 0v-1.5a.75.75 0 0 0-1.5 0zM.75 1.5h1.5l-.53-.22 1.402 1.402a.75.75 0 0 0 1.06-1.06L2.78.22A.75.75 0 0 0 2.25 0H.75a.75.75 0 1 0 0 1.5zm2.983 3.754a.01.01 0 0 1 .016.002c-.542-1.072-.1-2.426 1.008-2.988a2.25 2.25 0 0 1 2.037 0c-.041-.022-.043-.029-.04-.034l.002-.002-3.013 3.012zm1.07 1.05l3.002-3A1.489 1.489 0 0 0 7.51.951 3.766 3.766 0 0 0 4.079.929 3.75 3.75 0 0 0 2.43 5.971a1.49 1.49 0 0 0 2.382.323zm3.408-.968l1.116.62a.75.75 0 1 0 .728-1.312l-1.116-.62a.75.75 0 1 0-.728 1.312zm1.964-2.233l1.615.44a.75.75 0 1 0 .394-1.448l-1.615-.44a.75.75 0 1 0-.394 1.448zm4.217 1.15l1.615.44a.75.75 0 0 0 .396-1.447l-1.615-.44a.75.75 0 0 0-.396 1.447zM5.697 7.388l.577 1.038a.75.75 0 1 0 1.312-.728L7.009 6.66a.75.75 0 1 0-1.312.728zM3.284 8.94l.44 1.615a.75.75 0 1 0 1.448-.394l-.44-1.615a.75.75 0 1 0-1.448.394zm1.15 4.219l.246.896a.75.75 0 1 0 1.446-.396l-.245-.896a.75.75 0 1 0-1.446.396z\"></path></svg>Private bathroom</span></div><div class=\"hprt-facilities-facility\" data-name-en=\"\" data-facility-id=\"75\" data-facility-type=\"1\" style=\"line-height: 20px; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" bui-badge bui-badge--outline room_highlight_badge--without_borders\" style=\"font-weight: var(--DO_NOT_USE_bui_large_font_small_1_font-weight); line-height: var(--DO_NOT_USE_bui_large_font_small_1_line-height); background: var(--bui_color_background_elevation_one); border-color: transparent; border-radius: var(--bui_border_radius_100); color: var(--bui_color_foreground); display: inline-flex; -webkit-box-align: center; align-items: center; padding: calc(var(--bui_spacing_half) - var(--bui_border_width_100)) var(--bui_spacing_1x); vertical-align: middle;\"><svg class=\"bk-icon -streamline-tv_flat_screen\" height=\"16\" width=\"16\" viewBox=\"0 0 24 24\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M22.5 10.375v6.5a.25.25 0 0 1-.25.25H1.75a.25.25 0 0 1-.25-.25v-13a.25.25 0 0 1 .25-.25h20.5a.25.25 0 0 1 .25.25v6.5zm1.5 0v-6.5a1.75 1.75 0 0 0-1.75-1.75H1.75A1.75 1.75 0 0 0 0 3.875v13c0 .966.784 1.75 1.75 1.75h20.5a1.75 1.75 0 0 0 1.75-1.75v-6.5zm-16.5 12h9a.75.75 0 0 0 0-1.5h-9a.75.75 0 0 0 0 1.5zm3.75-4.5v3.75a.75.75 0 0 0 1.5 0v-3.75a.75.75 0 0 0-1.5 0z\"></path></svg>Flat-screen TV</span></div><div class=\"hprt-facilities-facility\" data-name-en=\"\" data-facility-id=\"wifi\" data-facility-type=\"2\" style=\"line-height: 20px; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" bui-badge bui-badge--outline room_highlight_badge--without_borders\" style=\"font-weight: var(--DO_NOT_USE_bui_large_font_small_1_font-weight); line-height: var(--DO_NOT_USE_bui_large_font_small_1_line-height); background: var(--bui_color_background_elevation_one); border-color: transparent; border-radius: var(--bui_border_radius_100); color: var(--bui_color_foreground); display: inline-flex; -webkit-box-align: center; align-items: center; padding: calc(var(--bui_spacing_half) - var(--bui_border_width_100)) var(--bui_spacing_1x); vertical-align: middle;\"><svg class=\"bk-icon -streamline-wifi\" height=\"16\" width=\"16\" viewBox=\"0 0 24 24\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M14.25 18.75a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0zm1.5 0a3.75 3.75 0 1 0-7.5 0 3.75 3.75 0 0 0 7.5 0zm2.08-5.833a8.25 8.25 0 0 0-11.666 0 .75.75 0 0 0 1.06 1.06 6.75 6.75 0 0 1 9.546 0 .75.75 0 0 0 1.06-1.06zm3.185-3.182c-4.979-4.98-13.051-4.98-18.03 0a.75.75 0 1 0 1.06 1.06c4.394-4.393 11.516-4.393 15.91 0a.75.75 0 1 0 1.06-1.06zm2.746-3.603C17.136-.043 6.864-.043.24 6.132A.75.75 0 1 0 1.26 7.23c6.05-5.638 15.429-5.638 21.478 0a.75.75 0 0 0 1.022-1.098z\"></path></svg>Free WiFi</span></div></font></div><hr class=\"bui-divider bui-spacer--medium\" style=\"box-sizing: border-box; margin: 0px; border-top: var(--bui_border_width_100) solid var(--bui_color_border_alt); color: rgb(0, 128, 9);\"><ul class=\"hprt-facilities-others\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(0, 128, 9); padding: 0px;\"><font face=\"georgia\" style=\"\" size=\"2\"><li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Free Toiletries\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Free toiletries</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Shower\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Shower</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Washing machine\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Washing machine</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Toilet\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Toilet</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Sofa\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Sofa</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Wooden / Parquet floor\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Hardwood or parquet floors</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Towels\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Towels</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Linen\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Linen</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"socket near the bed\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Socket near the bed</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Cleaning products\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Cleaning products</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Tiled / Marble floor\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Tile/marble floor</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Desk\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Desk</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Private Entrance\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Private entrance</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"TV\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>TV</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Slippers\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Slippers</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Refrigerator\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Refrigerator</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Ironing facilities\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Ironing facilities</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Clothing Iron\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Iron</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Microwave\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Microwave</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Heating\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Heating</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Hair Dryer\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Hairdryer</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Fan\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Fan</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Dressing room\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Dressing room</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Electric Kettle\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Electric kettle</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Tumble dryer (machine)\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Tumble dryer</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Wardrobe/Closet\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Wardrobe or closet</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Toaster\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Toaster</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Entire property on ground floor\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Entire unit located on ground floor</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Clothes Rack\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Clothes rack</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Toilet paper\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Toilet paper</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"hand_sanitizer_in_room\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Hand sanitizer</span></span></li></font></ul>', 'None', 3, 'Room', 'rooms/2023010426306de.jpg', 1, 12, 0, 1),
(41, 0, 'cottage 1', '<br>', 'Public', 10, 'Cottage', 'rooms/20230105124322placeholder-image.png', 1, 22, 0, 1),
(42, 0, 'room 1', '<br>', 'Public', 4, 'Room', 'rooms/20230105145724placeholder-image.png', 1, 22, 0, 1),
(43, -2, 'Single Bed', 'Single Bed with Aircon', 'Public', 2, 'Room', 'rooms/20230105361220220905160020304280-300x300.jpg', 1, 23, 0, 1),
(44, -1, 'Family Room', 'Room with 5 beds, 1 aircon, 1 refrigerator, 1 television for family or group of friends', 'Public', 10, 'Room', 'rooms/2023010554341191-o+984YvL._AC_SL1500_.jpg', 1, 23, 0, 1),
(45, 1, 'room 1', '<br>', 'Public', 2, 'Room', 'rooms/20230105463522placeholder-image.png', 1, 24, 0, 1),
(46, 1, 'cot', '<br>', 'Public', 10, 'Cottage', 'rooms/20230105472714placeholder-image.png', 1, 24, 0, 1),
(47, 1, 'Medium Hut', '<div><br></div><div><ul><li><font color=\"#009900\">Well Ventilated</font></li><li><font color=\"#009900\">With Table</font></li><li><font color=\"#009900\">Good for 10 Pax chairs</font></li></ul></div>', 'None', 10, 'Cottage', 'rooms/20230105562830zz1.jpg', 1, 12, 0, 1);
INSERT INTO `tblroom` (`ROOMID`, `ROOMNUM`, `ROOM`, `ROOMDESC`, `type`, `NUMPERSON`, `AccomodationType`, `ROOMIMAGE`, `OROOMNUM`, `ResortID`, `Discount`, `ShowRoom`) VALUES
(49, 1, 'Family Room', '<div class=\"bui-spacer--medium\" style=\"color: rgb(0, 128, 9); margin-bottom: var(--bui_unit_medium)  !important;\"><font face=\"georgia\" size=\"2\"><div class=\"hprt-facilities-facility\" data-name-en=\"privacy\" data-facility-id=\"0\" data-facility-type=\"0\" style=\"line-height: 20px; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" bui-badge bui-badge--outline room_highlight_badge--without_borders\" style=\"font-weight: var(--DO_NOT_USE_bui_large_font_small_1_font-weight); line-height: var(--DO_NOT_USE_bui_large_font_small_1_line-height); background: var(--bui_color_background_elevation_one); border-color: transparent; border-radius: var(--bui_border_radius_100); color: var(--bui_color_foreground); display: inline-flex; -webkit-box-align: center; align-items: center; padding: calc(var(--bui_spacing_half) - var(--bui_border_width_100)) var(--bui_spacing_1x); vertical-align: middle;\"><br></span></div></font></div><div class=\"bui-spacer--medium\" style=\"color: rgb(0, 128, 9); margin-bottom: var(--bui_unit_medium)  !important;\"><font face=\"georgia\" size=\"2\"><div class=\"hprt-facilities-facility\" data-name-en=\"privacy\" data-facility-id=\"0\" data-facility-type=\"0\" style=\"line-height: 20px; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" bui-badge bui-badge--outline room_highlight_badge--without_borders\" style=\"font-weight: var(--DO_NOT_USE_bui_large_font_small_1_font-weight); line-height: var(--DO_NOT_USE_bui_large_font_small_1_line-height); background: var(--bui_color_background_elevation_one); border-color: transparent; border-radius: var(--bui_border_radius_100); color: var(--bui_color_foreground); display: inline-flex; -webkit-box-align: center; align-items: center; padding: calc(var(--bui_spacing_half) - var(--bui_border_width_100)) var(--bui_spacing_1x); vertical-align: middle;\">Room</span></div><div class=\"hprt-facilities-facility\" data-name-en=\"room size\" data-facility-id=\"0\" data-facility-type=\"0\" style=\"line-height: 20px; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" bui-badge bui-badge--outline room_highlight_badge--without_borders\" style=\"font-weight: var(--DO_NOT_USE_bui_large_font_small_1_font-weight); line-height: var(--DO_NOT_USE_bui_large_font_small_1_line-height); background: var(--bui_color_background_elevation_one); border-color: transparent; border-radius: var(--bui_border_radius_100); color: var(--bui_color_foreground); display: inline-flex; -webkit-box-align: center; align-items: center; padding: calc(var(--bui_spacing_half) - var(--bui_border_width_100)) var(--bui_spacing_1x); vertical-align: middle;\"><svg class=\"bk-icon -streamline-room_size\" height=\"16\" width=\"16\" viewBox=\"0 0 24 24\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M3.75 23.25V7.5a.75.75 0 0 0-1.5 0v15.75a.75.75 0 0 0 1.5 0zM.22 21.53l2.25 2.25a.75.75 0 0 0 1.06 0l2.25-2.25a.75.75 0 1 0-1.06-1.06l-2.25 2.25h1.06l-2.25-2.25a.75.75 0 0 0-1.06 1.06zM5.78 9.22L3.53 6.97a.75.75 0 0 0-1.06 0L.22 9.22a.75.75 0 1 0 1.06 1.06l2.25-2.25H2.47l2.25 2.25a.75.75 0 1 0 1.06-1.06zM7.5 3.75h15.75a.75.75 0 0 0 0-1.5H7.5a.75.75 0 0 0 0 1.5zM9.22.22L6.97 2.47a.75.75 0 0 0 0 1.06l2.25 2.25a.75.75 0 1 0 1.06-1.06L8.03 2.47v1.06l2.25-2.25A.75.75 0 1 0 9.22.22zm12.31 5.56l2.25-2.25a.75.75 0 0 0 0-1.06L21.53.22a.75.75 0 1 0-1.06 1.06l2.25 2.25V2.47l-2.25 2.25a.75.75 0 0 0 1.06 1.06zM10.5 13.05v7.2a2.25 2.25 0 0 0 2.25 2.25h6A2.25 2.25 0 0 0 21 20.25v-7.2a.75.75 0 0 0-1.5 0v7.2a.75.75 0 0 1-.75.75h-6a.75.75 0 0 1-.75-.75v-7.2a.75.75 0 0 0-1.5 0zm13.252 2.143l-6.497-5.85a2.25 2.25 0 0 0-3.01 0l-6.497 5.85a.75.75 0 0 0 1.004 1.114l6.497-5.85a.75.75 0 0 1 1.002 0l6.497 5.85a.75.75 0 0 0 1.004-1.114z\"></path></svg>27 m²</span></div><div class=\"hprt-facilities-facility\" data-name-en=\"\" data-facility-id=\"38\" data-facility-type=\"1\" style=\"line-height: 20px; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" bui-badge bui-badge--outline room_highlight_badge--without_borders\" style=\"font-weight: var(--DO_NOT_USE_bui_large_font_small_1_font-weight); line-height: var(--DO_NOT_USE_bui_large_font_small_1_line-height); background: var(--bui_color_background_elevation_one); border-color: transparent; border-radius: var(--bui_border_radius_100); color: var(--bui_color_foreground); display: inline-flex; -webkit-box-align: center; align-items: center; padding: calc(var(--bui_spacing_half) - var(--bui_border_width_100)) var(--bui_spacing_1x); vertical-align: middle;\"><svg class=\"bk-icon -streamline-shower\" height=\"16\" width=\"16\" viewBox=\"0 0 24 24\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M15.375 10.875a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0zm1.5 0a3.375 3.375 0 1 0-6.75 0 3.375 3.375 0 0 0 6.75 0zm.375 12.375V18.7l-.667.745C20.748 18.98 24 15.925 24 10.5a2.25 2.25 0 0 0-4.5 0c0 1.945-.609 3.154-1.64 3.848a3.973 3.973 0 0 1-2.132.652H9a3.75 3.75 0 1 0 0 7.5h3a2.25 2.25 0 0 0 0-4.5H9a.75.75 0 0 0 0 1.5h3a.75.75 0 0 1 0 1.5H9a2.25 2.25 0 0 1 0-4.5h6.74a5.426 5.426 0 0 0 2.957-.908C20.154 14.613 21 12.932 21 10.5a.75.75 0 0 1 1.5 0c0 4.6-2.628 7.069-6.083 7.455a.75.75 0 0 0-.667.745v4.55a.75.75 0 0 0 1.5 0zm-7.5-1.5v1.5a.75.75 0 0 0 1.5 0v-1.5a.75.75 0 0 0-1.5 0zM.75 1.5h1.5l-.53-.22 1.402 1.402a.75.75 0 0 0 1.06-1.06L2.78.22A.75.75 0 0 0 2.25 0H.75a.75.75 0 1 0 0 1.5zm2.983 3.754a.01.01 0 0 1 .016.002c-.542-1.072-.1-2.426 1.008-2.988a2.25 2.25 0 0 1 2.037 0c-.041-.022-.043-.029-.04-.034l.002-.002-3.013 3.012zm1.07 1.05l3.002-3A1.489 1.489 0 0 0 7.51.951 3.766 3.766 0 0 0 4.079.929 3.75 3.75 0 0 0 2.43 5.971a1.49 1.49 0 0 0 2.382.323zm3.408-.968l1.116.62a.75.75 0 1 0 .728-1.312l-1.116-.62a.75.75 0 1 0-.728 1.312zm1.964-2.233l1.615.44a.75.75 0 1 0 .394-1.448l-1.615-.44a.75.75 0 1 0-.394 1.448zm4.217 1.15l1.615.44a.75.75 0 0 0 .396-1.447l-1.615-.44a.75.75 0 0 0-.396 1.447zM5.697 7.388l.577 1.038a.75.75 0 1 0 1.312-.728L7.009 6.66a.75.75 0 1 0-1.312.728zM3.284 8.94l.44 1.615a.75.75 0 1 0 1.448-.394l-.44-1.615a.75.75 0 1 0-1.448.394zm1.15 4.219l.246.896a.75.75 0 1 0 1.446-.396l-.245-.896a.75.75 0 1 0-1.446.396z\"></path></svg>Private bathroom</span></div><div class=\"hprt-facilities-facility\" data-name-en=\"\" data-facility-id=\"75\" data-facility-type=\"1\" style=\"line-height: 20px; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" bui-badge bui-badge--outline room_highlight_badge--without_borders\" style=\"font-weight: var(--DO_NOT_USE_bui_large_font_small_1_font-weight); line-height: var(--DO_NOT_USE_bui_large_font_small_1_line-height); background: var(--bui_color_background_elevation_one); border-color: transparent; border-radius: var(--bui_border_radius_100); color: var(--bui_color_foreground); display: inline-flex; -webkit-box-align: center; align-items: center; padding: calc(var(--bui_spacing_half) - var(--bui_border_width_100)) var(--bui_spacing_1x); vertical-align: middle;\"><svg class=\"bk-icon -streamline-tv_flat_screen\" height=\"16\" width=\"16\" viewBox=\"0 0 24 24\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M22.5 10.375v6.5a.25.25 0 0 1-.25.25H1.75a.25.25 0 0 1-.25-.25v-13a.25.25 0 0 1 .25-.25h20.5a.25.25 0 0 1 .25.25v6.5zm1.5 0v-6.5a1.75 1.75 0 0 0-1.75-1.75H1.75A1.75 1.75 0 0 0 0 3.875v13c0 .966.784 1.75 1.75 1.75h20.5a1.75 1.75 0 0 0 1.75-1.75v-6.5zm-16.5 12h9a.75.75 0 0 0 0-1.5h-9a.75.75 0 0 0 0 1.5zm3.75-4.5v3.75a.75.75 0 0 0 1.5 0v-3.75a.75.75 0 0 0-1.5 0z\"></path></svg>Flat-screen TV</span></div><div class=\"hprt-facilities-facility\" data-name-en=\"\" data-facility-id=\"wifi\" data-facility-type=\"2\" style=\"line-height: 20px; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" bui-badge bui-badge--outline room_highlight_badge--without_borders\" style=\"font-weight: var(--DO_NOT_USE_bui_large_font_small_1_font-weight); line-height: var(--DO_NOT_USE_bui_large_font_small_1_line-height); background: var(--bui_color_background_elevation_one); border-color: transparent; border-radius: var(--bui_border_radius_100); color: var(--bui_color_foreground); display: inline-flex; -webkit-box-align: center; align-items: center; padding: calc(var(--bui_spacing_half) - var(--bui_border_width_100)) var(--bui_spacing_1x); vertical-align: middle;\"><svg class=\"bk-icon -streamline-wifi\" height=\"16\" width=\"16\" viewBox=\"0 0 24 24\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M14.25 18.75a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0zm1.5 0a3.75 3.75 0 1 0-7.5 0 3.75 3.75 0 0 0 7.5 0zm2.08-5.833a8.25 8.25 0 0 0-11.666 0 .75.75 0 0 0 1.06 1.06 6.75 6.75 0 0 1 9.546 0 .75.75 0 0 0 1.06-1.06zm3.185-3.182c-4.979-4.98-13.051-4.98-18.03 0a.75.75 0 1 0 1.06 1.06c4.394-4.393 11.516-4.393 15.91 0a.75.75 0 1 0 1.06-1.06zm2.746-3.603C17.136-.043 6.864-.043.24 6.132A.75.75 0 1 0 1.26 7.23c6.05-5.638 15.429-5.638 21.478 0a.75.75 0 0 0 1.022-1.098z\"></path></svg>Free WiFi</span></div></font></div><hr class=\"bui-divider bui-spacer--medium\" style=\"box-sizing: border-box; margin: 0px; border-top: var(--bui_border_width_100) solid var(--bui_color_border_alt); color: rgb(0, 128, 9);\"><ul class=\"hprt-facilities-others\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(0, 128, 9); padding: 0px;\"><font face=\"georgia\" size=\"2\"><li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Free Toiletries\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Free toiletries</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Shower\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Shower</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Washing machine\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Washing machine</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Toilet\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Toilet</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Sofa\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Sofa</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Wooden / Parquet floor\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Hardwood or parquet floors</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Towels\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Towels</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Linen\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Linen</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"socket near the bed\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Socket near the bed</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Cleaning products\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Cleaning products</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Tiled / Marble floor\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Tile/marble floor</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Desk\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Desk</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Private Entrance\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Private entrance</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"TV\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>TV</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Slippers\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Slippers</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Refrigerator\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Refrigerator</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Ironing facilities\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Ironing facilities</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Clothing Iron\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Iron</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Microwave\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Microwave</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Heating\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Heating</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Hair Dryer\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Hairdryer</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Fan\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Fan</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Dressing room\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Dressing room</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Electric Kettle\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Electric kettle</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Tumble dryer (machine)\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Tumble dryer</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Wardrobe/Closet\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Wardrobe or closet</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Toaster\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Toaster</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Entire property on ground floor\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Entire unit located on ground floor</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Clothes Rack\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Clothes rack</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Toilet paper\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Toilet paper</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"hand_sanitizer_in_room\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Hand sanitizer</span></span></li></font></ul>', 'None', 10, 'Room', 'rooms/2023010520535Family.jpg', 1, 12, 0, 1),
(50, 1, 'Big Hut', '<div><font color=\"#009900\"><br></font></div><ul><li><font color=\"#009900\">Well Ventilated</font></li><li><font color=\"#009900\">With Table</font></li><li><font color=\"#009900\">Good for 20 Pax chairs</font></li></ul>', 'None', 20, 'Cottage', 'rooms/2023010529062720pax.jpg', 1, 12, 0, 1),
(51, 0, 'Single ', '', 'Public', 1, 'Room', 'rooms/20230105330824istockphoto-1129777688-612x612.jpg', 1, 25, 0, 1),
(52, 0, 'Twin Room', '1', 'Public', 2, 'Room', 'rooms/20230105345925Twin.jpg', 1, 25, 0, 1),
(53, 1, 'Twin Room', '2', 'Public', 2, 'Room', 'rooms/20230105350213Twin.jpg', 1, 25, 0, 1);
INSERT INTO `tblroom` (`ROOMID`, `ROOMNUM`, `ROOM`, `ROOMDESC`, `type`, `NUMPERSON`, `AccomodationType`, `ROOMIMAGE`, `OROOMNUM`, `ResortID`, `Discount`, `ShowRoom`) VALUES
(54, 1, 'Twin Room', '<br><div><div class=\"bui-spacer--medium\" segoe=\"\" ui\",=\"\" roboto,=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 11.9px;=\"\" background-color:=\"\" rgb(250,=\"\" 252,=\"\" 255);=\"\" margin-bottom:=\"\" var(--bui_unit_medium)=\"\" !important;\"=\"\" style=\"color: rgb(0, 128, 9);\"><font face=\"georgia\" size=\"2\"><div class=\"hprt-facilities-facility\" data-name-en=\"room size\" data-facility-id=\"0\" data-facility-type=\"0\" style=\"line-height: 20px; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" bui-badge bui-badge--outline room_highlight_badge--without_borders\" style=\"font-weight: var(--DO_NOT_USE_bui_large_font_small_1_font-weight); line-height: var(--DO_NOT_USE_bui_large_font_small_1_line-height); background: var(--bui_color_background_elevation_one); border-color: transparent; border-radius: var(--bui_border_radius_100); color: var(--bui_color_foreground); display: inline-flex; -webkit-box-align: center; align-items: center; padding: calc(var(--bui_spacing_half) - var(--bui_border_width_100)) var(--bui_spacing_1x); vertical-align: middle;\">17 m²</span></div><div class=\"hprt-facilities-facility\" data-name-en=\"\" data-facility-id=\"113\" data-facility-type=\"1\" style=\"line-height: 20px; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" bui-badge bui-badge--outline room_highlight_badge--without_borders\" style=\"font-weight: var(--DO_NOT_USE_bui_large_font_small_1_font-weight); line-height: var(--DO_NOT_USE_bui_large_font_small_1_line-height); background: var(--bui_color_background_elevation_one); border-color: transparent; border-radius: var(--bui_border_radius_100); color: var(--bui_color_foreground); display: inline-flex; -webkit-box-align: center; align-items: center; padding: calc(var(--bui_spacing_half) - var(--bui_border_width_100)) var(--bui_spacing_1x); vertical-align: middle;\"><svg class=\"bk-icon -streamline-landmark\" height=\"16\" width=\"16\" viewBox=\"0 0 24 24\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M4.5 8.911h3l-.75-.75v9l.75-.75h-3l.75.75v-9l-.75.75zm0-1.5a.75.75 0 0 0-.75.75v9c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-9a.75.75 0 0 0-.75-.75h-3zm6 1.5h3l-.75-.75v9l.75-.75h-3l.75.75v-9l-.75.75zm0-1.5a.75.75 0 0 0-.75.75v9c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-9a.75.75 0 0 0-.75-.75h-3zm6 1.5h3l-.75-.75v9l.75-.75h-3l.75.75v-9l-.75.75zm0-1.5a.75.75 0 0 0-.75.75v9c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-9a.75.75 0 0 0-.75-.75h-3zm4.5 12H3l.75.75v-2.25h16.5v2.25l.75-.75zm0 1.5a.75.75 0 0 0 .75-.75v-2.25a1.5 1.5 0 0 0-1.5-1.5H3.75a1.5 1.5 0 0 0-1.5 1.5v2.25c0 .414.336.75.75.75h18zm-19.5 3h21a.75.75 0 0 0 0-1.5h-21a.75.75 0 0 0 0 1.5zm0-3h21a.75.75 0 0 0 0-1.5h-21a.75.75 0 0 0 0 1.5zm18.75-15.75v2.25H3.75v-2.25l-.415.67L12 1.5l8.665 4.332-.415-.671zm1.5 0a.75.75 0 0 0-.415-.67L12.67.157a1.503 1.503 0 0 0-1.34 0L2.666 4.49a.75.75 0 0 0-.415.671v2.25a1.5 1.5 0 0 0 1.5 1.5h16.5a1.5 1.5 0 0 0 1.5-1.5v-2.25zM3 5.911h18a.75.75 0 0 0 0-1.5H3a.75.75 0 0 0 0 1.5z\"></path></svg>Landmark view</span></div><div class=\"hprt-facilities-facility\" data-name-en=\"\" data-facility-id=\"121\" data-facility-type=\"1\" style=\"line-height: 20px; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" bui-badge bui-badge--outline room_highlight_badge--without_borders\" style=\"font-weight: var(--DO_NOT_USE_bui_large_font_small_1_font-weight); line-height: var(--DO_NOT_USE_bui_large_font_small_1_line-height); background: var(--bui_color_background_elevation_one); border-color: transparent; border-radius: var(--bui_border_radius_100); color: var(--bui_color_foreground); display: inline-flex; -webkit-box-align: center; align-items: center; padding: calc(var(--bui_spacing_half) - var(--bui_border_width_100)) var(--bui_spacing_1x); vertical-align: middle;\"><svg class=\"bk-icon -streamline-city\" height=\"16\" width=\"16\" viewBox=\"0 0 24 24\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M2.75 6h9.5a.25.25 0 0 1-.25-.25v17.5l.75-.75H2.25l.75.75V5.75a.25.25 0 0 1-.25.25zm0-1.5c-.69 0-1.25.56-1.25 1.25v17.5c0 .414.336.75.75.75h10.5a.75.75 0 0 0 .75-.75V5.75c0-.69-.56-1.25-1.25-1.25h-9.5zm3-1.5h3.5A.25.25 0 0 1 9 2.75v2.5l.75-.75h-4.5l.75.75v-2.5a.25.25 0 0 1-.25.25zm0-1.5c-.69 0-1.25.56-1.25 1.25v2.5c0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75v-2.5c0-.69-.56-1.25-1.25-1.25h-3.5zM5.25 9h4.5a.75.75 0 0 0 0-1.5h-4.5a.75.75 0 0 0 0 1.5zm0 3h4.5a.75.75 0 0 0 0-1.5h-4.5a.75.75 0 0 0 0 1.5zm0 3h4.5a.75.75 0 0 0 0-1.5h-4.5a.75.75 0 0 0 0 1.5zm0 3h4.5a.75.75 0 0 0 0-1.5h-4.5a.75.75 0 0 0 0 1.5zm0 3h4.5a.75.75 0 0 0 0-1.5h-4.5a.75.75 0 0 0 0 1.5zM7.5.75v1.5a.75.75 0 0 0 1.5 0V.75a.75.75 0 0 0-1.5 0zM15.75 24h6a.75.75 0 0 0 .75-.75V10.5A1.5 1.5 0 0 0 21 9h-4.5a1.5 1.5 0 0 0-1.5 1.5v12.75a.75.75 0 0 0 1.5 0V10.5H21v12.75l.75-.75h-6a.75.75 0 0 0 0 1.5zM19.5 8.25v1.5a.75.75 0 0 0 1.5 0v-1.5a.75.75 0 0 0-1.5 0zM.75 24h22.5a.75.75 0 0 0 0-1.5H.75a.75.75 0 0 0 0 1.5z\"></path></svg>City view</span></div><div class=\"hprt-facilities-facility\" data-name-en=\"\" data-facility-id=\"11\" data-facility-type=\"1\" style=\"line-height: 20px; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" bui-badge bui-badge--outline room_highlight_badge--without_borders\" style=\"font-weight: var(--DO_NOT_USE_bui_large_font_small_1_font-weight); line-height: var(--DO_NOT_USE_bui_large_font_small_1_line-height); background: var(--bui_color_background_elevation_one); border-color: transparent; border-radius: var(--bui_border_radius_100); color: var(--bui_color_foreground); display: inline-flex; -webkit-box-align: center; align-items: center; padding: calc(var(--bui_spacing_half) - var(--bui_border_width_100)) var(--bui_spacing_1x); vertical-align: middle;\"><svg class=\"bk-icon -streamline-weather_snowflake\" height=\"16\" width=\"16\" viewBox=\"0 0 24 24\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M11.25.75v7.5a.75.75 0 0 0 1.5 0V.75a.75.75 0 0 0-1.5 0zm4.031.914l-3.75 3h.938l-3.75-3a.75.75 0 1 0-.938 1.172l3.75 3a.75.75 0 0 0 .938 0l3.75-3a.75.75 0 1 0-.938-1.172zM1.883 7.024l6.495 3.75a.75.75 0 0 0 .75-1.299l-6.495-3.75a.75.75 0 1 0-.75 1.3zM4.69 3.99l.723 4.748.468-.812-4.473 1.748a.75.75 0 0 0 .546 1.398l4.473-1.748a.75.75 0 0 0 .468-.812l-.723-4.748a.75.75 0 1 0-1.482.226zM2.632 18.274l6.495-3.75a.75.75 0 1 0-.75-1.298l-6.495 3.75a.75.75 0 1 0 .75 1.299zm-1.224-3.948l4.473 1.748-.468-.812-.723 4.748a.75.75 0 0 0 1.482.226l.723-4.748a.75.75 0 0 0-.468-.812l-4.473-1.748a.75.75 0 0 0-.546 1.398zM12.75 23.25v-7.5a.75.75 0 0 0-1.5 0v7.5a.75.75 0 0 0 1.5 0zm-4.031-.914l3.75-3h-.938l3.75 3a.75.75 0 0 0 .937-1.172l-3.75-3a.75.75 0 0 0-.937 0l-3.75 3a.75.75 0 0 0 .938 1.172zm13.399-5.36l-6.495-3.75a.75.75 0 0 0-.75 1.298l6.495 3.75a.75.75 0 0 0 .75-1.299zm-2.807 3.034l-.724-4.748-.468.812 4.473-1.748a.75.75 0 0 0-.546-1.398l-4.473 1.748a.75.75 0 0 0-.468.812l.723 4.748a.75.75 0 0 0 1.483-.226zm2.057-14.285l-6.495 3.75a.75.75 0 0 0 .75 1.3l6.495-3.75a.75.75 0 0 0-.75-1.3zm1.224 3.95l-4.473-1.749.468.812.724-4.748a.75.75 0 0 0-1.483-.226l-.723 4.748a.75.75 0 0 0 .468.812l4.473 1.748a.75.75 0 0 0 .546-1.398zM11.625 7.6L8.377 9.475a.75.75 0 0 0-.375.65v3.75a.75.75 0 0 0 .375.65l3.248 1.874a.75.75 0 0 0 .75 0l3.248-1.875a.75.75 0 0 0 .375-.649v-3.75a.75.75 0 0 0-.375-.65L12.375 7.6a.75.75 0 0 0-.75 0zm.75 1.3h-.75l3.248 1.874-.375-.649v3.75l.375-.65-3.248 1.876h.75l-3.248-1.876.375.65v-3.75l-.375.65L12.375 8.9z\"></path></svg>Air conditioning</span></div><div class=\"hprt-facilities-facility\" data-name-en=\"\" data-facility-id=\"38\" data-facility-type=\"1\" style=\"line-height: 20px; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" bui-badge bui-badge--outline room_highlight_badge--without_borders\" style=\"font-weight: var(--DO_NOT_USE_bui_large_font_small_1_font-weight); line-height: var(--DO_NOT_USE_bui_large_font_small_1_line-height); background: var(--bui_color_background_elevation_one); border-color: transparent; border-radius: var(--bui_border_radius_100); color: var(--bui_color_foreground); display: inline-flex; -webkit-box-align: center; align-items: center; padding: calc(var(--bui_spacing_half) - var(--bui_border_width_100)) var(--bui_spacing_1x); vertical-align: middle;\"><svg class=\"bk-icon -streamline-shower\" height=\"16\" width=\"16\" viewBox=\"0 0 24 24\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M15.375 10.875a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0zm1.5 0a3.375 3.375 0 1 0-6.75 0 3.375 3.375 0 0 0 6.75 0zm.375 12.375V18.7l-.667.745C20.748 18.98 24 15.925 24 10.5a2.25 2.25 0 0 0-4.5 0c0 1.945-.609 3.154-1.64 3.848a3.973 3.973 0 0 1-2.132.652H9a3.75 3.75 0 1 0 0 7.5h3a2.25 2.25 0 0 0 0-4.5H9a.75.75 0 0 0 0 1.5h3a.75.75 0 0 1 0 1.5H9a2.25 2.25 0 0 1 0-4.5h6.74a5.426 5.426 0 0 0 2.957-.908C20.154 14.613 21 12.932 21 10.5a.75.75 0 0 1 1.5 0c0 4.6-2.628 7.069-6.083 7.455a.75.75 0 0 0-.667.745v4.55a.75.75 0 0 0 1.5 0zm-7.5-1.5v1.5a.75.75 0 0 0 1.5 0v-1.5a.75.75 0 0 0-1.5 0zM.75 1.5h1.5l-.53-.22 1.402 1.402a.75.75 0 0 0 1.06-1.06L2.78.22A.75.75 0 0 0 2.25 0H.75a.75.75 0 1 0 0 1.5zm2.983 3.754a.01.01 0 0 1 .016.002c-.542-1.072-.1-2.426 1.008-2.988a2.25 2.25 0 0 1 2.037 0c-.041-.022-.043-.029-.04-.034l.002-.002-3.013 3.012zm1.07 1.05l3.002-3A1.489 1.489 0 0 0 7.51.951 3.766 3.766 0 0 0 4.079.929 3.75 3.75 0 0 0 2.43 5.971a1.49 1.49 0 0 0 2.382.323zm3.408-.968l1.116.62a.75.75 0 1 0 .728-1.312l-1.116-.62a.75.75 0 1 0-.728 1.312zm1.964-2.233l1.615.44a.75.75 0 1 0 .394-1.448l-1.615-.44a.75.75 0 1 0-.394 1.448zm4.217 1.15l1.615.44a.75.75 0 0 0 .396-1.447l-1.615-.44a.75.75 0 0 0-.396 1.447zM5.697 7.388l.577 1.038a.75.75 0 1 0 1.312-.728L7.009 6.66a.75.75 0 1 0-1.312.728zM3.284 8.94l.44 1.615a.75.75 0 1 0 1.448-.394l-.44-1.615a.75.75 0 1 0-1.448.394zm1.15 4.219l.246.896a.75.75 0 1 0 1.446-.396l-.245-.896a.75.75 0 1 0-1.446.396z\"></path></svg>Private bathroom</span></div><div class=\"hprt-facilities-facility\" data-name-en=\"\" data-facility-id=\"75\" data-facility-type=\"1\" style=\"line-height: 20px; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" bui-badge bui-badge--outline room_highlight_badge--without_borders\" style=\"font-weight: var(--DO_NOT_USE_bui_large_font_small_1_font-weight); line-height: var(--DO_NOT_USE_bui_large_font_small_1_line-height); background: var(--bui_color_background_elevation_one); border-color: transparent; border-radius: var(--bui_border_radius_100); color: var(--bui_color_foreground); display: inline-flex; -webkit-box-align: center; align-items: center; padding: calc(var(--bui_spacing_half) - var(--bui_border_width_100)) var(--bui_spacing_1x); vertical-align: middle;\"><svg class=\"bk-icon -streamline-tv_flat_screen\" height=\"16\" width=\"16\" viewBox=\"0 0 24 24\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M22.5 10.375v6.5a.25.25 0 0 1-.25.25H1.75a.25.25 0 0 1-.25-.25v-13a.25.25 0 0 1 .25-.25h20.5a.25.25 0 0 1 .25.25v6.5zm1.5 0v-6.5a1.75 1.75 0 0 0-1.75-1.75H1.75A1.75 1.75 0 0 0 0 3.875v13c0 .966.784 1.75 1.75 1.75h20.5a1.75 1.75 0 0 0 1.75-1.75v-6.5zm-16.5 12h9a.75.75 0 0 0 0-1.5h-9a.75.75 0 0 0 0 1.5zm3.75-4.5v3.75a.75.75 0 0 0 1.5 0v-3.75a.75.75 0 0 0-1.5 0z\"></path></svg>Flat-screen TV</span></div><div class=\"hprt-facilities-facility\" data-name-en=\"\" data-facility-id=\"wifi\" data-facility-type=\"2\" style=\"line-height: 20px; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" bui-badge bui-badge--outline room_highlight_badge--without_borders\" style=\"font-weight: var(--DO_NOT_USE_bui_large_font_small_1_font-weight); line-height: var(--DO_NOT_USE_bui_large_font_small_1_line-height); background: var(--bui_color_background_elevation_one); border-color: transparent; border-radius: var(--bui_border_radius_100); color: var(--bui_color_foreground); display: inline-flex; -webkit-box-align: center; align-items: center; padding: calc(var(--bui_spacing_half) - var(--bui_border_width_100)) var(--bui_spacing_1x); vertical-align: middle;\"><svg class=\"bk-icon -streamline-wifi\" height=\"16\" width=\"16\" viewBox=\"0 0 24 24\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M14.25 18.75a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0zm1.5 0a3.75 3.75 0 1 0-7.5 0 3.75 3.75 0 0 0 7.5 0zm2.08-5.833a8.25 8.25 0 0 0-11.666 0 .75.75 0 0 0 1.06 1.06 6.75 6.75 0 0 1 9.546 0 .75.75 0 0 0 1.06-1.06zm3.185-3.182c-4.979-4.98-13.051-4.98-18.03 0a.75.75 0 1 0 1.06 1.06c4.394-4.393 11.516-4.393 15.91 0a.75.75 0 1 0 1.06-1.06zm2.746-3.603C17.136-.043 6.864-.043.24 6.132A.75.75 0 1 0 1.26 7.23c6.05-5.638 15.429-5.638 21.478 0a.75.75 0 0 0 1.022-1.098z\"></path></svg>Free WiFi</span></div></font></div><ul class=\"hprt-facilities-others\" segoe=\"\" ui\",=\"\" roboto,=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 11.9px;=\"\" background-color:=\"\" rgb(250,=\"\" 252,=\"\" 255);\"=\"\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(0, 128, 9); padding: 0px;\"><ul class=\"hprt-facilities-others\" segoe=\"\" ui\",=\"\" roboto,=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 11.9px;=\"\" background-color:=\"\" rgb(250,=\"\" 252,=\"\" 255);\"=\"\" style=\"margin-right: 0px; margin-left: 0px; padding: 0px;\"><font face=\"georgia\" size=\"2\"><li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Free Toiletries\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\">Free toiletries</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Shower\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Shower</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Bidet\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Bidet</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Toilet\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Toilet</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Towels\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Towels</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Linen\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Linen</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"socket near the bed\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Socket near the bed</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Desk\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Desk</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Slippers\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Slippers</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Interconnecting Room(s) available\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Interconnected room(s) available</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Wake Up Service\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Wake-up service</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Wardrobe/Closet\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Wardrobe or closet</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Upper floor reachable by lift\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Upper floors accessible by elevator</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Clothes Rack\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Clothes rack</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"Toilet paper\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Toilet paper</span></span></li>&nbsp;<li style=\"display: inline-block; line-height: 20px;\"><span class=\"hprt-facilities-facility\" data-name-en=\"individual_air_conditioning\" style=\"line-height: 1em; margin: 3px 3px 0px 0px; display: inline-block;\"><span class=\" other_facility_badge--default_color\" style=\"color: var(--bui_color_foreground);\"><svg class=\"bk-icon -streamline-checkmark\" fill=\"#008009\" height=\"14\" width=\"14\" viewBox=\"0 0 128 128\" role=\"presentation\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M56.33 100a4 4 0 0 1-2.82-1.16L20.68 66.12a4 4 0 1 1 5.64-5.65l29.57 29.46 45.42-60.33a4 4 0 1 1 6.38 4.8l-48.17 64a4 4 0 0 1-2.91 1.6z\"></path></svg>Single-room air conditioning for guest accommodation</span></span></li></font></ul></ul></div>', 'None', 2, 'Room', 'rooms/20230105503511Twin.jpg', 1, 12, 0, 1),
(55, 0, 'room 1', '<br>', 'Public', 2, 'Room', 'rooms/20230105200510placeholder-image.png', 1, 28, 0, 1),
(56, 1, 'DELUXE ROOM', 'Good For 2-3 Pax', 'Public', 2, 'Room', 'rooms/20230106093830285177057_3995215763936410_3132285907778367416_n.jpg', 1, 29, 0, 1),
(57, 1, 'STANDARD ROOM', 'Good For 2 pax', 'Public', 2, 'Room', 'rooms/20230106104830285332394_3995215623936424_7740334914835160828_n.jpg', 1, 29, 0, 1),
(58, 1, 'STANDARD ROOM', 'Good For 2 Pax', 'Public', 2, 'Room', 'rooms/20230106152321285200774_3995215607269759_8300977997154013453_n.jpg', 1, 29, 0, 1),
(59, 0, 'HOUSE ROOM', 'Good For 4-6 Pax', 'Public', 6, 'Room', 'rooms/20230106202225284247587_3995212193936767_8611616862451159929_n.jpg', 1, 29, 0, 1),
(60, 1, 'FAMILY/BARKADA ROOM', 'Good For 6-10 Pax', 'Public', 10, 'Room', 'rooms/20230106214023284107485_3995212163936770_1322198971302144850_n.jpg', 1, 29, 0, 1),
(61, 1, 'HOUSE ROOM', 'Good For 4-6 Pax', 'Public', 6, 'Room', 'rooms/20230106240512284136844_3995212097270110_7980789628355867570_n.jpg', 1, 29, 0, 1),
(62, 1, 'STANDARD ROOM', 'STANDARD ROOM', 'Public', 4, 'Room', 'rooms/2023010625318284073165_3995212070603446_8420838602089809755_n.jpg', 1, 29, 0, 1),
(63, 1, 'FAMILY/BARKADA ROOM', 'Good For 8-12 Pax', 'Public', 12, 'Room', 'rooms/20230106264321285664055_3995212000603453_7671995461110690080_n.jpg', 1, 29, 0, 1),
(64, 1, 'STANDARD ROOM', 'Good For 2 Pax', 'Public', 2, 'Room', 'rooms/20230106273210283727364_3995211970603456_2308720410178113255_n.jpg', 1, 29, 0, 1),
(65, 1, 'STANDARD ROOM', 'Good For 4 Pax', 'Public', 4, 'Room', 'rooms/20230106282620285179869_3995211957270124_8287948975479839857_n.jpg', 1, 29, 0, 1),
(66, 1, 'DELUXE ROOM', 'Good For 2-3 Pax', 'Public', 3, 'Room', 'rooms/20230106292622284694907_3995211893936797_4568436134323672612_n.jpg', 1, 29, 0, 1),
(67, 1, 'single room', '<br>', 'Public', 1, 'Room', 'rooms/20230107210812p.jpg', 1, 30, 0, 1),
(68, 1, 'group', '<br>', 'Public', 10, 'Cottage', 'rooms/20230107315815p.jpg', 1, 30, 0, 1),
(69, 1, 'House Room', 'Good for 5 People', 'Public', 5, 'Room', 'rooms/202301070324205.jpg', 1, 33, 0, 1),
(70, 1, 'Emerald Room', 'Good for 2 People', 'Public', 2, 'Room', 'rooms/20230107035527Emerald room.jpg', 1, 33, 0, 1),
(71, 1, 'Standard Room', 'Good for 4 People', 'Public', 4, 'Room', 'rooms/202301070446164.jpg', 1, 33, 0, 1),
(73, 1, 'Big Cottage', '12', 'Public', 12, 'Cottage', 'rooms/20230829285310ab67616d0000b273568654abb7a3ce84c3f11251.jpg', 1, 49, 0.2, 1),
(88, 1, 'Medium Room', 'Medium Room', 'Public', 8, 'Room', 'rooms/20230901025818194074-stewie.jpg', 1, 49, 0.2, 1),
(90, 1, 'Alpha', 'Deluxe Room&nbsp;', 'Public', 4, 'Room', 'rooms/2023092828102061sG3S43voL._SL1197_.jpg', 1, 51, 0, 1),
(95, 1, 'Single Bed', '<br>', 'Public', 2, 'Room', 'rooms/20231016524220175324_434308926627067_1519002404_o.jpg', 1, 54, 0, 1),
(96, 1, 'Double bed', '<br>', 'Public', 2, 'Room', 'rooms/20231016504114229049_174268482631114_6869187_n.jpg', 1, 54, 0, 1),
(97, 1, 'Triple bed', '<br>', 'Public', 6, 'Room', 'rooms/2023101651132727990_445703818820911_2089073289_n.jpg', 1, 54, 0, 1),
(98, 1, 'Deluxe ', '<br>', 'Public', 5, 'Room', 'rooms/2023101651486406863_445703025487657_117175495_n.jpg', 1, 54, 0, 1),
(99, 1, 'Small 01', '<br>', 'Public', 5, 'Room', 'rooms/20231016543920IMG20230109112251.jpg', 1, 36, 0, 1),
(100, 1, 'Large 24', '<br>', 'Public', 15, 'Cottage', 'rooms/20231016563118IMG20230109112320.jpg', 1, 36, 0, 1),
(101, 1, 'Single Bed', '<br>', 'Public', 2, 'Room', 'rooms/202310165724512079844_841697229261283_8559220464444566277_o.jpg', 1, 36, 0, 1),
(102, 1, 'Double bed', '<br>', 'Public', 4, 'Room', 'rooms/2023101657532712095273_841697285927944_1837849165727616640_o.jpg', 1, 36, 0, 1),
(103, 1, 'Kubo', '<br>', 'Public', 10, 'Cottage', 'rooms/20231016042818119138463_2775045029434254_744453576976535179_n.jpg', 1, 56, 0, 1),
(104, 1, 'Cottage near gate', '<br>', 'Public', 10, 'Cottage', 'rooms/20231016045520119138463_2775045029434254_744453576976535179_n.jpg', 1, 56, 0, 1),
(105, 1, 'New Cottage', '<br>', 'Public', 10, 'Cottage', 'rooms/20231016051419119138463_2775045029434254_744453576976535179_n.jpg', 1, 56, 0, 1),
(106, 1, 'Room ', '<br>', 'Public', 15, 'Room', 'rooms/2023101626362571287558_OwT4UWHDHBRkltFM6tcN33RqZ7tAqMNwZqY4fQICe3I.jpg', 1, 57, 0, 1),
(107, 1, 'Barkada Cottage', '<br>', 'Public', 10, 'Cottage', 'rooms/20231016575814274945787_481723926826429_5347867302271970201_n.jpg', 1, 59, 0, 1),
(108, 1, 'Family Cottage', '<br>', 'Public', 15, 'Cottage', 'rooms/20231016582113274987350_481724766826345_4567743787682920379_n.jpg', 1, 59, 0, 1),
(109, 1, 'Medium cottage ', '<br>', 'Public', 10, 'Cottage', 'rooms/2023101659057274795278_481723846826437_5642681209218702004_n.jpg', 1, 59, 0, 1),
(110, 1, 'Barkada Cottage', '<br>', 'Public', 10, 'Cottage', 'rooms/20231016052518274945787_481723926826429_5347867302271970201_n.jpg', 1, 61, 0, 1),
(111, 1, 'Family Cottage', '<br>', 'Public', 15, 'Cottage', 'rooms/20231016054519274987350_481724766826345_4567743787682920379_n.jpg', 1, 61, 0, 1),
(112, 1, 'Medium Cottage', '<br>', 'Public', 10, 'Cottage', 'rooms/2023101606087274795278_481723846826437_5642681209218702004_n.jpg', 1, 61, 0, 1),
(113, 1, 'Hall A', '<br>', 'Public', 10, 'Cottage', 'rooms/20231016175620338174888_232387642610068_5411754260830699343_n.jpg', 1, 62, 0, 1),
(114, 1, 'Hall B', '<br>', 'Public', 15, 'Cottage', 'rooms/2023101618236338554662_893350918388618_5597405358843595305_n.jpg', 1, 62, 0, 1),
(115, 1, 'medium cottage', '<br>', 'Public', 10, 'Cottage', 'rooms/20231017025918keep_going.png', 1, 66, 0, 1),
(116, 1, 'villa ', '<br>', 'Public', 20, 'Cottage', 'rooms/20231017033027DESKTOP-TABLET_be_kind_to_yourself.png', 1, 66, 0, 1),
(117, 1, 'function hall', '<br>', 'Public', 20, 'Amenity', 'rooms/202310170405147_88741bcf-5c32-4e03-8403-12a24e68e492.png', 1, 66, 0, 1),
(118, 1, 'Pool', '<br>', 'Exclusive', 12, 'Amenity', 'rooms/20231021081727pool.jpg', 1, 12, 0, 1),
(119, 1, 'Basketball Court ', '<br>', 'Exclusive', 20, 'Amenity', 'rooms/20231025581913download (6).jpg', 1, 67, 0, 1),
(120, 1, 'Pool', '<br>', 'Exclusive', 20, 'Amenity', 'rooms/20231025591425pool.jpg', 1, 68, 0, 1),
(121, 1, 'Villa', '<br>', 'None', 21, 'Cottage', 'rooms/202310250018102023010427112320230103180827download.jpg', 1, 68, 0, 1),
(122, 1, 'PlayGround', '<br>', 'Exclusive', 20, 'Amenity', 'rooms/2023102501585PLAY (2).jpg', 1, 69, 0, 1),
(123, 1, 'Single bed', '<br>', 'None', 2, 'Room', 'rooms/2023102503548rm405-pdsprintelement-c010-kp8asidn.jpg', 1, 70, 0, 1),
(124, 1, 'Pool', '<br>', 'Exclusive', 10, 'Amenity', 'rooms/20231025054725pool.jpg', 1, 71, 0, 1),
(125, 1, 'Medium Cottage', '<br>', 'Public', 6, 'Cottage', 'rooms/20231025074172023010427112320230103180827download.jpg', 1, 72, 0, 1),
(126, 1, 'PlayGround', '<br>', 'Exclusive', 10, 'Amenity', 'rooms/20231025100620PLAY (2).jpg', 1, 73, 0, 1),
(127, 1, 'Pool', '<br>', 'Exclusive', 10, 'Amenity', 'rooms/2023102510259placeholder-2.webp', 1, 73, 0, 1),
(128, 1, 'Large Room', '<br>', 'None', 10, 'Room', 'rooms/20231025121718rm405-pdsprintelement-c010-kp8asidn.jpg', 1, 74, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblsettings`
--

CREATE TABLE `tblsettings` (
  `ID` int(11) NOT NULL,
  `DESCRIPTION` mediumtext NOT NULL DEFAULT '-',
  `TYPE` varchar(90) NOT NULL DEFAULT '-',
  `ChatKeyword` varchar(255) NOT NULL DEFAULT '-',
  `ResortID` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblsettings`
--

INSERT INTO `tblsettings` (`ID`, `DESCRIPTION`, `TYPE`, `ChatKeyword`, `ResortID`) VALUES
(10, 's', 'Contact Us', '', 6),
(16, '<div style=\"background-color:#eee;\"><br><h1 style=\"text-align: center;\"><font color=\"#000000\" style=\"\" face=\"georgia\"><b style=\"\">&nbsp;Contact Us</b></font></h1></div><div><h2 style=\"text-align: center;\"><font size=\"3\" style=\"\" face=\"georgia\"> Wanna connect with us? <br><br> You can do so through the below mentioned links.</font></h2></div><div><br></div><div><br></div><div><div></div><div><center><div class=\"container\" style=\"display: flex; justify-content: space-evenly; max-width:fit-content; margin: auto;\"></div><div><div style=\"flex:1; margin-left:16px;max-width:100%;\"><img src=\"https://cdn-icons-png.flaticon.com/512/4213/4213968.png\" alt=\"\" height=\"80\" width=\"70\"></div><div><p style=\"\"><font color=\"#000000\" style=\"\" face=\"georgia\"><b style=\"\">&nbsp; &nbsp; &nbsp; &nbsp; GenericSample@gmail.com</b></font></p></div><div></div></div><div><div style=\"flex:1;margin-left:16px;max-width:100%\"><img loading=\"lazy\" src=\"https://cdn-icons-png.flaticon.com/512/0/191.png\" alt=\"\" height=\"80\" width=\"70\"></div><div><p style=\"\"><font color=\"#000000\" face=\"georgia\"><b style=\"\">&nbsp; &nbsp; &nbsp; <font size=\"2\">09xx-xxx-xxxx</font></b></font></p></div></div></center></div></div><div></div><div><div style=\"text-align: center;\"><b><br></b></div><div style=\"text-align: center;\"><br></div></div>', 'Contact Us', 'N/A', 12),
(18, '<h1 style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 40px; border: none; padding: 0px;\"><ul><li><span style=\"font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 16px;\"=\"\"><font face=\"georgia\" size=\"3\" color=\"#000000\"><b>How can I locate hotels that are open at the time I wish to stay there?</b></font></span></li></ul></h1><h1 style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 40px; border: none; padding: 0px;\"><font face=\"georgia\" size=\"3\" color=\"#000000\">Please choose the dates of your stay and check the box next to \"Show only available hotels\" in the search menu on the left that contains the check-in and check-out information.</font></h1><h1 style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 40px; border: none; padding: 0px;\"><ul><li><font face=\"georgia\" size=\"3\" color=\"#000000\"><b>How can I do a price-based hotel search?</b></font></li></ul></h1><h1 style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 40px; border: none; padding: 0px;\"><font face=\"georgia\" size=\"3\" color=\"#000000\">When looking for hotels open on a particular day, you may filter the list of hotels by price, popularity, class, or name using the selection box at the top left of the search page.</font></h1>', 'FAQ', 'N/A', 12),
(19, 'https://web.facebook.com/profile.php?id=100088568079032', 'Facebook', 'N/A', 12),
(20, 'https://web.facebook.com/profile.php?id=100088568079032', 'Instagram', '', 12),
(23, '<br>', 'Contact Us', '', 13),
(24, 'hello', 'About Us', '', 13),
(25, '<h2><div class=\"hp-description k2-hp_main_desc--collapsed\" data-et-view=\"goal:hp_property_description_seen\" style=\"color: rgb(38, 38, 38); font-family: BlinkMacSystemFont, -apple-system, \" segoe=\"\" ui\",=\"\" roboto,=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><div class=\"hp_desc_main_content\"><div id=\"summary\" class=\"\" data-et-view=\"\"><div id=\"property_description_content\"><p style=\"text-align: justify; line-height: var(--DO_NOT_USE_bui_large_font_body_2_line-height);\"><font face=\"georgia\" size=\"3\">You\'re eligible for a Genius discount at Generic Sample! To save at this property, all you have to do is&nbsp;<a href=\"https://account.booking.com/auth/oauth2?response_type=code&amp;state=UqEH57d3aXWsSLIeLBh-u0uuMN9sqkdAtTp9p4CQGJ7qksouvS53zFyJ7l1R6QBdN1HnpMhm5PbDUwQL4E1SbDkxQh9fjKshcdffmXIt7RGX_gayDZUYMqjbML4Ti3eC4mTqDMDO8yODxVfz48boQt_z8mKjDi8EwgozSq5bCXhGsmaIrCgViiuovTjfuWX-co5cJBI-vOqCrtFRdlkhtH4lIvYmE45O8isfmceclAOc6EIJyXLaCxdOfdkqgjHX_91ycV8S9pF0Aw3AxcV0S1tSahnD5ffxhlVrGMfaYN5s6Di51ypiK4FLJmhwEM7Vr7Q5poUDhZU_eWIg-qzn7uWUYBQIjonJ5XGDW8BDGIiQ-Vwfjh6Bnux6a9LRoN7wNxZR0V_5I51gXMH-6lYyopTHGGY8fgXa21jDWNxzE6g9k2EBHwW5MNEUqUHlQvpVreumvmzHgWxo7bHqOef7ALZQS9T9IMgPRcRUq9qql_SWnmdL_1O1v0GkEpu2O-S1xYQ2izuV50cKT3L7x7dNVtbA6SYdkvH_ZIUKs61yyZ_gmIL0zIsO2lgowS3RRjSGPONC9F7un4MVvooO0ONJcLhGR-c0AgsuMMX-9ZtMbWkEFuSh0l4ggb6lhMZ0mBSm4McC4c9CreuQTI7E6plMhwppcDASGpzfNo1Exvut4ubDmJQHWZiX7G0LtyaJZUXhO9uRFdzVhXz1lifNd6YUBm83ohXATYYju9rI_sXRjW97DTexXhmMiQpy-eIw6532d7VlTstK2SjYfIUeGEtor2h5TcEMLXp7z1awnV20G368okvq2-tMUhPec_fIcjLjR-oW_MflwX0wZstpbueN3fvFmHUZhj3LjcxXh2FNTQ3cmjV7Wl0a9fns2eWm93MCgpR3tFSO5DSJu2y-uZeNEWDzOm8DJJm3fKZqs485FT3BEIW1hlwCeUDQjjfgNWZlqJjmpFEvqbXcjSsI_nUZoER_FWbGdywgaizwibdIgs2W_ufNOXL8u_9xEGFrM2HNhmkQFHpTHF6LKT1QuAT9Sj_su5ScZb_Qevg_gyHKfUylFGFLicNY3XiaV0U558TsQwYwy-C4YNFcXoWpuNHnZb8kGE_Iy23PAppMn2VIeDSzvFep9yldMW5DneVpoo9KerkZ2TXc9DmKBa7u8y_VMFfwVd0gVvktksAGB9Svew3YxPRif8qghUYBmT8DpG1vuCOD2f7qK3npMTnViK96DsaDnA8&amp;aid=304142&amp;redirect_uri=https%3A%2F%2Fsecure.booking.com%2Flogin.html%3Fop%3Doauth_return&amp;lang=en-gb&amp;dt=1672846257&amp;client_id=vO1Kblk7xX9tUn2cpZLS&amp;bkng_action=hotel\" class=\"bui-link\" style=\"color: var(--bui_color_action_foreground); text-decoration-line: underline; cursor: pointer; display: inline;\">sign in</a>.</font></p><p style=\"text-align: justify; line-height: var(--DO_NOT_USE_bui_large_font_body_2_line-height);\"><font face=\"georgia\" size=\"3\">Located in Zamboanga City, 2.6 km from the city of Zamboanga and 3.6 km away from&nbsp;</font></p></div></div></div></div></h2><div style=\"text-align: justify;\"><font face=\"georgia\" size=\"3\">Pasonanca Grassland<span style=\"color: rgb(38, 38, 38);\">, Generic Sample&nbsp;provides accommodation with free WiFi and a garden with a terrace and city views.</span></font></div><h2><div class=\"hp-description k2-hp_main_desc--collapsed\" data-et-view=\"goal:hp_property_description_seen\" style=\"color: rgb(38, 38, 38); font-family: BlinkMacSystemFont, -apple-system, \" segoe=\"\" ui\",=\"\" roboto,=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><div class=\"hp_desc_main_content\"><div class=\"\" data-et-view=\"\"><p style=\"text-align: justify; line-height: var(--DO_NOT_USE_bui_large_font_body_2_line-height);\"><font face=\"georgia\" size=\"3\">Every unit features a private bathroom and bidet, air conditioning, a flat-screen TV and a fridge. For added convenience, the property can provide towels and bed linen for an extra charge.</font></p><p style=\"text-align: justify; line-height: var(--DO_NOT_USE_bui_large_font_body_2_line-height);\"><font face=\"georgia\" size=\"3\">A car rental service is available at the aparthotel.</font></p><p style=\"text-align: justify; line-height: var(--DO_NOT_USE_bui_large_font_body_2_line-height);\"><font face=\"georgia\" size=\"3\">SM Mindpro Zamboanga&nbsp; is 4.3 km from Generic Sample, while Fort Pilar Shrine&nbsp; is 5 km away. The nearest airport is Zamboanga City International Airport, 6 km from the accommodation, and the property offers a paid airport shuttle service.</font></p><p style=\"text-align: justify; line-height: var(--DO_NOT_USE_bui_large_font_body_2_line-height);\"><font face=\"georgia\" size=\"3\">Couples particularly like the location — they rated it&nbsp;<strong>8.9</strong>&nbsp;for a two-person trip.</font></p><p style=\"text-align: justify; line-height: var(--DO_NOT_USE_bui_large_font_body_2_line-height);\"><font face=\"georgia\" size=\"3\">Distance in property description is calculated using © OpenStreetMap</font></p><p style=\"text-align: justify; line-height: var(--DO_NOT_USE_bui_large_font_body_2_line-height);\"><font face=\"georgia\" size=\"3\"><b>Most popular facilities</b><br></font></p><p></p><pre><ul><li><span style=\"font-weight: var(--DO_NOT_USE_bui_large_font_body_2_font-weight); color: var(--bui_color_foreground);\"><font face=\"georgia\" size=\"3\">Airport shuttle</font></span></li></ul><ul><li><span style=\"font-weight: var(--DO_NOT_USE_bui_large_font_body_2_font-weight); color: var(--bui_color_foreground);\"><font face=\"georgia\" size=\"3\">Non-smoking rooms</font></span></li></ul><ul><li><span style=\"color: var(--bui_color_foreground); font-weight: var(--DO_NOT_USE_bui_large_font_body_2_font-weight);\"><font face=\"georgia\" size=\"3\">Free parking</font></span></li></ul><ul><li><span style=\"color: var(--bui_color_foreground); font-weight: var(--DO_NOT_USE_bui_large_font_body_2_font-weight);\"><font face=\"georgia\" size=\"3\">Free WiFi&nbsp;</font></span></li></ul><ul><li><span style=\"color: var(--bui_color_foreground); font-weight: var(--DO_NOT_USE_bui_large_font_body_2_font-weight);\"><font face=\"georgia\" size=\"3\">Family rooms&nbsp;</font></span></li></ul><ul><li><span style=\"color: var(--bui_color_foreground); font-weight: var(--DO_NOT_USE_bui_large_font_body_2_font-weight);\"><font face=\"georgia\" style=\"\" size=\"3\">24-hour front desk</font><font face=\"var(--DO_NOT_USE_bui_large_font_body_2_font-family)\" style=\"font-size: small;\"><br></font></span></li></ul></pre><p></p><p></p></div></div><div data-et-view=\"bNXGDJdLTLScXQOVWe:1\"></div></div><div class=\"hp--popular_facilities js-k2-hp--block\" style=\"margin: var(--bui_spacing_4x) 0 0;\" segoe=\"\" ui\",=\"\" roboto,=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><div data-et-view=\"eWHMcCcCcCWEYcZbCWBadDZEOTOCaIDJNMTaRbdFIKe:1 eWHMcCcCcCWEYcZbCWBadDZEOTOCaIDJNMTaRbdFIKe:4\" style=\"color: rgb(38, 38, 38);\"></div><div data-capla-component=\"b-property-web-property-page/PropertyMostPopularFacilities\" data-capla-namespace=\"b-property-web-property-pageOdJLWPFX\" style=\"\"><div data-testid=\"property-most-popular-facilities-wrapper\" style=\"\"><div data-testid=\"facility-list-most-popular-facilities\" class=\"e5e0727360\" style=\"display: flex; flex-flow: row wrap;\"><div class=\"a815ec762e ab06168e66\" style=\"align-items: center; display: flex; margin: 0 var(--bui_spacing_3x) var(--bui_spacing_3x) 0;\"><span data-testid=\"facility-icon\" class=\"b6dc9a9e69 dc8024efa6 fa1e9d582b e6c50852bd a29c17443f\" aria-hidden=\"true\" style=\"color: var(--bui_color_constructive_foreground); fill: var(--bui_color_constructive_foreground); display: flex; height: calc(var(--bui_spacing_1x)*5); align-self: center; margin-right: var(--bui_spacing_3x);\"><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 128 128\"></svg><path d=\"M108.42 55.84H44.26a9 9 0 0 0-8.94 8.94v20.67H19.58a9 9 0 0 0-8.93 8.94v14.8a9 9 0 0 0 8.93 8.94h6.47c2.2 7.332 9.928 11.491 17.26 9.291a13.861 13.861 0 0 0 9.29-9.291h22.8c2.2 7.332 9.928 11.491 17.26 9.291a13.861 13.861 0 0 0 9.29-9.291h1.53c7.658-.006 13.864-6.212 13.87-13.87V64.78a9 9 0 0 0-8.93-8.94zm.93 8.94v20.67H92.68V63.84h15.74a.94.94 0 0 1 .93.94zM68 85.45V63.84h16.68v21.61zM44.26 63.84H60v21.61H43.32V64.78c0-.52.42-.94.94-.94zM39.32 120a5.87 5.87 0 1 1 5.87-5.87 5.88 5.88 0 0 1-5.87 5.87zm49.36 0a5.87 5.87 0 1 1 5.87-5.87 5.87 5.87 0 0 1-5.87 5.87zm14.8-9.87H102c-2.2-7.332-9.928-11.491-17.26-9.291a13.861 13.861 0 0 0-9.29 9.291H52.6c-2.2-7.332-9.928-11.491-17.26-9.291a13.861 13.861 0 0 0-9.29 9.291h-6.47a.94.94 0 0 1-.93-.94v-14.8a.94.94 0 0 1 .93-.94h89.77v10.81a5.87 5.87 0 0 1-5.87 5.87zm-92.29-82a4 4 0 0 1 5.467-1.451l.003.001 6.69 3.88 12.33-6-13.79-8a4 4 0 0 1 4-6.91l18.4 10.73 13.07-6.4a4.003 4.003 0 1 1 3.52 7.19l-36 17.6a4 4 0 0 1-3.76-.13l-8.54-5a4 4 0 0 1-1.39-5.52z\"></path></span></div><div class=\"a815ec762e ab06168e66\" style=\"color: rgb(38, 38, 38); align-items: center; display: flex; margin: 0 var(--bui_spacing_3x) var(--bui_spacing_3x) 0;\"><span data-testid=\"facility-icon\" class=\"b6dc9a9e69 dc8024efa6 fa1e9d582b e6c50852bd a29c17443f\" aria-hidden=\"true\" style=\"fill: var(--bui_color_constructive_foreground); display: flex; height: calc(var(--bui_spacing_1x)*5); color: var(--bui_color_constructive_foreground); align-self: center; margin-right: var(--bui_spacing_3x);\"><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><path d=\"M21.75 5.25a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0zm1.5 0a3.75 3.75 0 1 0-7.5 0 3.75 3.75 0 0 0 7.5 0zm-6.182 15.093l.188 1.5A.75.75 0 0 0 18 22.5h3a.75.75 0 0 0 .744-.657l.75-6-.744.657h1.5a.75.75 0 0 0 .75-.75V13.5a4.5 4.5 0 0 0-7.2-3.6.75.75 0 1 0 .9 1.2 3 3 0 0 1 4.8 2.4v2.25l.75-.75h-1.5a.75.75 0 0 0-.744.657l-.75 6L21 21h-3l.744.657-.188-1.5a.75.75 0 0 0-1.488.186zM6.75 5.25a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0zm1.5 0a3.75 3.75 0 1 0-7.5 0 3.75 3.75 0 0 0 7.5 0zM5.444 20.157l-.188 1.5L6 21H3l.744.657-.75-6A.75.75 0 0 0 2.25 15H.75l.75.75V13.5a3 3 0 0 1 4.8-2.4.75.75 0 1 0 .9-1.2A4.5 4.5 0 0 0 0 13.5v2.25c0 .414.336.75.75.75h1.5l-.744-.657.75 6A.75.75 0 0 0 3 22.5h3a.75.75 0 0 0 .744-.657l.188-1.5a.75.75 0 0 0-1.488-.186zM13.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zM15 9a3 3 0 1 0-6 0 3 3 0 0 0 6 0zm-3 3a4.5 4.5 0 0 0-4.5 4.5v.75c0 .414.336.75.75.75h1.5l-.74-.627.75 4.5a.75.75 0 0 0 .74.627H12a.75.75 0 0 0 0-1.5h-1.5l.74.627-.75-4.5a.75.75 0 0 0-.74-.627h-1.5l.75.75v-.75a3 3 0 0 1 3-3 .75.75 0 0 0 0-1.5zm0 1.5a3 3 0 0 1 3 3v.75l.75-.75h-1.5a.75.75 0 0 0-.74.627l-.75 4.5.74-.627H12a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 .74-.627l.75-4.5-.74.627h1.5a.75.75 0 0 0 .75-.75v-.75A4.5 4.5 0 0 0 12 12a.75.75 0 0 0 0 1.5z\"></path></svg></span></div><div class=\"a815ec762e ab06168e66\" style=\"color: rgb(38, 38, 38); align-items: center; display: flex; margin: 0 var(--bui_spacing_3x) var(--bui_spacing_3x) 0;\"><span data-testid=\"facility-icon\" class=\"b6dc9a9e69 dc8024efa6 fa1e9d582b e6c50852bd a29c17443f\" aria-hidden=\"true\" style=\"fill: var(--bui_color_constructive_foreground); display: flex; height: calc(var(--bui_spacing_1x)*5); color: var(--bui_color_constructive_foreground); align-self: center; margin-right: var(--bui_spacing_3x);\"><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><path d=\"M14.244 14.156a6.75 6.75 0 0 0-6.75-5.906A6.747 6.747 0 0 0 .73 14.397a.75.75 0 0 0 1.494.134 5.25 5.25 0 0 1 5.27-4.781 5.253 5.253 0 0 1 5.262 4.594.75.75 0 1 0 1.488-.188zM10.125 4.125a2.625 2.625 0 1 1-5.25 0V1.5h5.25v2.625zm1.5 0V1.5a1.5 1.5 0 0 0-1.5-1.5h-5.25a1.5 1.5 0 0 0-1.5 1.5v2.625a4.125 4.125 0 0 0 8.25 0zM23.25 22.5H.75l.75.75v-7.5a.75.75 0 0 1 .75-.75h19.5a.75.75 0 0 1 .75.75v7.5l.75-.75zm0 1.5a.75.75 0 0 0 .75-.75v-7.5a2.25 2.25 0 0 0-2.25-2.25H2.25A2.25 2.25 0 0 0 0 15.75v7.5c0 .414.336.75.75.75h22.5zM4.376 5.017a9.42 9.42 0 0 1 3.12-.517 9.428 9.428 0 0 1 3.133.519.75.75 0 0 0 .49-1.418A10.917 10.917 0 0 0 7.498 3a10.91 10.91 0 0 0-3.611.6.75.75 0 0 0 .49 1.417zM15.75 14.27a3.001 3.001 0 0 1 6 .16.75.75 0 1 0 1.5.04 4.501 4.501 0 1 0-9-.24.75.75 0 1 0 1.5.04zm3.75-3.77V8.25a.75.75 0 0 0-1.5 0v2.25a.75.75 0 0 0 1.5 0zM17.25 9h3a.75.75 0 0 0 0-1.5h-3a.75.75 0 0 0 0 1.5z\"></path></svg></span></div></div></div></div></div></h2>', 'About Us', 'N/A', 12),
(26, '<br>', 'Contact Us', '', 14),
(27, '<br>', 'Facebook', '', 14),
(31, '<br>', 'Facebook', '', 16),
(32, 'Name<div>address</div>', 'Contact Us', '', 17),
(35, '<br>', 'Facebook', '', 20),
(36, 'hello', 'About Us', '', 21),
(37, 'Name<div>Email</div><div>Number</div>', 'Contact Us', '', 21),
(38, 'Hello?', 'FAQ', '', 21),
(40, '<p style=\"margin-bottom: 1.66667em; padding: 0px; line-height: inherit; font-size: 18px; color: rgb(33, 35, 38); font-family: ShopifySans, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif;\">We STARTED THE GENERIC RESORT BECAUSE MOST OF THE RESORT IN OUR AREA HAS NO ONLINE RESERVATION OR BOOKING SYSTEM.</p><p style=\"margin-bottom: 1.66667em; padding: 0px; line-height: inherit; font-size: 18px; color: rgb(33, 35, 38); font-family: ShopifySans, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif;\">THAT\'S WHY THE GENERIC RESORT RESERVATION SYSTEM IS THE KEY TO THE PROBLEM OF THE RESORTS IN OUR COMMUNITY.</p><p style=\"margin-bottom: 1.66667em; padding: 0px; line-height: inherit; font-size: 18px; color: rgb(33, 35, 38); font-family: ShopifySans, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif;\">ALONG THE WAY, WE HOPE TO ACHIEVE A LONG MILESTONE IN THIS JOURNEY.</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: inherit; font-size: 18px; color: rgb(33, 35, 38); font-family: ShopifySans, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif;\">MISSION</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: inherit; font-size: 18px; color: rgb(33, 35, 38); font-family: ShopifySans, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif;\">VISSION</p>', 'About Us', '', 19),
(41, 'hello', 'About Us', '', 22),
(43, 'This is the about us of nice resort - edited', 'About Us', 'N/A', 23),
(44, '0999999999', 'Contact Us', '', 23),
(45, 'This is the terms and conditions<div><br></div>', 'Terms', '', 23),
(46, '<p style=\"\"></p><div style=\"text-align: justify;\"><font face=\"georgia\" size=\"2\"><b style=\"color: rgb(0, 0, 0);\">Casa Teodora Resort</b><span style=\"color: rgb(0, 0, 0);\"> offers day tour, overnight stays, event places, party package.</span></font></div><div style=\"text-align: justify;\"><font face=\"georgia\" size=\"2\"><span style=\"color: rgb(0, 0, 0);\"><br></span></font></div><div style=\"text-align: justify;\"><font face=\"georgia\" size=\"2\"><span style=\"color: rgb(0, 0, 0);\"><br></span></font></div><font face=\"georgia\" size=\"2\"><div style=\"text-align: justify;\"><b style=\"color: rgb(0, 0, 0);\">Casa Teodora Resort House Rules</b></div><b style=\"color: rgb(0, 0, 0);\"><div style=\"text-align: justify;\"><b><font color=\"#000000\">&nbsp; &nbsp; &nbsp; &nbsp;1. NOLOUD NOISE NUISANCES OR DISTURBANCE&nbsp;</font></b></div></b><span style=\"color: rgb(0, 0, 0);\"><div style=\"text-align: justify;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Are alloweed from 10:00 PM to 5:00 AM</div></span><b style=\"color: rgb(0, 0, 0);\"><div style=\"text-align: justify;\"><b>&nbsp; &nbsp; &nbsp; &nbsp;2. SMOKING IN THE ROOM</b></div></b><span style=\"color: rgb(0, 0, 0);\"><div style=\"text-align: justify;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Shall be charged penalty PHP 1,000 for cleaning fee, We have designated smoking areas around the resort.</div></span><b style=\"color: rgb(0, 0, 0);\"><div style=\"text-align: justify;\"><b>&nbsp; &nbsp; &nbsp; &nbsp;3. LOST OR DAMAGED KEYS, KEY BAGS, REMOTE, TOWELS,</b><b>&nbsp;ETC&nbsp;</b></div></b><span style=\"color: rgb(0, 0, 0);\"><div style=\"text-align: justify;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Shall be charged PHP 500 for the key and the other items such as TV remote, AC remote, etc. are subject to be charged accordingly with its corresponding price.</div></span><b style=\"color: rgb(0, 0, 0);\"><div style=\"text-align: justify;\"><b>&nbsp; &nbsp; &nbsp; &nbsp;4. STOLEN, DAMAGED, LOST ITEMS</b>&nbsp;</div></b><span style=\"color: rgb(0, 0, 0);\"><div style=\"text-align: justify;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Management is not reliable for any lost, stolen, damaged belongs or valuables in the resort. Please be mindful of your belonging. You may ask assistance in front of the office in case of occurrence for a view of CCTV footage.</div></span><span style=\"color: rgb(0, 0, 0);\"><div style=\"text-align: justify;\">&nbsp; &nbsp; &nbsp; &nbsp;<b>5. NO PETS ALLOWED&nbsp;</b></div></span><b style=\"color: rgb(0, 0, 0);\"><div style=\"text-align: justify;\"><b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;CONSERVE WATER AND ENERGY</b></div></b><b style=\"color: rgb(0, 0, 0);\"><div style=\"text-align: justify;\"><b>&nbsp; &nbsp; &nbsp; &nbsp;6. STANDARD TIME</b></div></b><b style=\"color: rgb(0, 0, 0);\"><div style=\"text-align: justify;\"><b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;CHECK-IN&nbsp;</b>2:00PM</div></b><span style=\"color: rgb(0, 0, 0); font-weight: bold;\"><div style=\"text-align: justify;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;CHECK-OUT&nbsp;12:00NN</div></span><span style=\"color: rgb(0, 0, 0);\"><div style=\"text-align: justify;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Early/Late check-in or check-out are for special arrangements&nbsp; and charges apply.</div></span><b style=\"color: rgb(0, 0, 0);\"><div style=\"text-align: justify;\"><b>&nbsp; &nbsp; &nbsp; &nbsp;7.&nbsp;OPERATING HOURS&nbsp;</b></div></b><span style=\"color: rgb(0, 0, 0);\"><div style=\"text-align: justify;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; GATE&nbsp;CLOSES at 10:00 PM to 6:00AM.&nbsp;</div></span><span style=\"color: rgb(0, 0, 0);\"><div style=\"text-align: justify;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Give notice ahead for special arrangements in front of the office.</div></span></font><p></p><pre><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: georgia; font-size: small;\">    -  Swimming Pool: 7:00AM - 10:00PM</span></div><font face=\"georgia\" size=\"2\"><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0);\">    -  Restaurant: 7:00AM - 8:00PM</span></div><span style=\"color: rgb(0, 0, 0);\"><div style=\"text-align: justify;\">    -  Front Office: 7:00AM - 8:00PM</div></span><span style=\"color: rgb(0, 0, 0);\"><div style=\"text-align: justify;\">    - Canteen: 7:00AM - 10:00PM</div></span></font></pre><font face=\"georgia\" size=\"2\"><div style=\"text-align: justify;\"><b style=\"color: rgb(0, 0, 0);\">&nbsp; &nbsp; &nbsp; &nbsp;8.</b><b style=\"color: rgb(0, 0, 0);\">&nbsp;DAMAGE TO ROOMS, STAINS ON MATRESSES, LINENS,&nbsp; BEDDINGS, ETC.&nbsp;</b></div><span style=\"color: rgb(0, 0, 0);\"><div style=\"text-align: justify;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Will result in a charge for special repair, cleaning, or replacement of the damaged item with corresponding cost.</div></span><span style=\"color: rgb(0, 0, 0);\"><div style=\"text-align: justify;\">&nbsp; &nbsp; &nbsp; &nbsp;<b>9</b><b>. EXTRAS&nbsp;</b></div></span><span style=\"color: rgb(0, 0, 0);\"><div style=\"text-align: justify;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; No extra towels are allowed.</div></span></font><pre><div style=\"text-align: justify;\"><span style=\"font-family: georgia; font-size: small;\">    - Extra Bed: PHP 150</span></div><font face=\"georgia\" size=\"2\"><div style=\"text-align: justify;\">    - Extra Pillow: PHP 100</div><div style=\"text-align: justify;\">    - Extra Person Adult: PHP 250</div><div style=\"text-align: justify;\">    - Extra Person Child 150</div></font></pre><font face=\"georgia\" size=\"2\"><div style=\"text-align: justify;\"><b style=\"color: rgb(0, 0, 0);\">&nbsp; &nbsp; &nbsp; &nbsp;10. FOR ASSITANCE/CONCERNS, YOU MAY CONTACT:</b></div><span style=\"color: rgb(0, 0, 0);\"><div style=\"text-align: justify;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;09171466555 / 993 6835 ( 7:00AM - 8:00PM ONLY.)</div></span></font><p></p>', 'About Us', 'N/A', 29),
(47, '<div style=\"text-align: center;\"><img class=\"x1b0d499 xuo83w3\" src=\"https://static.xx.fbcdn.net/rsrc.php/v3/y4/r/HNzy6p26p_d.png?_nc_eui2=AeHRgBjaRwYkVjyZwE237-wI2AXno-ddgDLYBeej512AMpaNpJFhZ0Ag8Iy48oaNr9rRofaIhLPq6fLkXMdV8D5q\" alt=\"\" height=\"24\" width=\"24\" segoe=\"\" ui=\"\" historic\",=\"\" \"segoe=\"\" ui\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" background-color:=\"\" rgb(36,=\"\" 37,=\"\" 38);=\"\" animation-name:=\"\" none=\"\" !important;=\"\" transition-property:=\"\" !important;\"=\"\" style=\"font-family: georgia; vertical-align: -0.25em; filter: var(--filter-placeholder-icon); color: rgb(28, 30, 33);\"><span style=\"font-family: georgia;\">&nbsp;&nbsp;</span><b style=\"font-family: georgia; font-size: small;\">Saavedra Street, Sta. Maria, Zamboanga City, Philippines, 7000&nbsp;</b></div><div><div style=\"text-align: center;\"><font size=\"1\" face=\"georgia\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Address&nbsp;</font></div><div style=\"text-align: center;\"><font size=\"1\" face=\"georgia\"><br></font></div><div style=\"text-align: center;\"><font face=\"georgia\"><img class=\"x1b0d499 xuo83w3\" src=\"https://static.xx.fbcdn.net/rsrc.php/v3/yU/r/P1gdNPNhMhn.png?_nc_eui2=AeGBSinfhudA6IikHbXy9dsd9bBj5MW43z71sGPkxbjfPn7wbrP0Lmjrvj8CTG2SYEzeDtWNqLtYR4hwY884_rze\" alt=\"\" height=\"24\" width=\"24\" style=\"vertical-align: -0.25em; filter: var(--filter-placeholder-icon); color: rgb(28, 30, 33); font-family: \" segoe=\"\" ui=\"\" historic\",=\"\" \"segoe=\"\" ui\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" background-color:=\"\" rgb(36,=\"\" 37,=\"\" 38);=\"\" animation-name:=\"\" none=\"\" !important;=\"\" transition-property:=\"\" !important;\"=\"\"><b>&nbsp;&nbsp;<span style=\"font-size: small;\">0917 146 6555&nbsp;</span></b></font></div><div style=\"text-align: center;\"><font size=\"1\" style=\"\" face=\"georgia\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Mobile</font></div><div style=\"text-align: center;\"><font size=\"1\" style=\"\" face=\"georgia\"><br></font></div><div style=\"text-align: center;\"><font face=\"georgia\"><img class=\"x1b0d499 xuo83w3\" src=\"https://static.xx.fbcdn.net/rsrc.php/v3/y9/r/pkb66zeUlly.png?_nc_eui2=AeGPVs1rOQBSm3BP2ywslJE04iY7wScWTcriJjvBJxZNylLjd6g1jwlFn9ZgCxEE35Ycbx3vilcLDcXe_eo6xVxf\" alt=\"\" height=\"24\" width=\"24\" style=\"vertical-align: -0.25em; filter: var(--filter-placeholder-icon); color: rgb(28, 30, 33); font-family: \" segoe=\"\" ui=\"\" historic\",=\"\" \"segoe=\"\" ui\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" background-color:=\"\" rgb(36,=\"\" 37,=\"\" 38);=\"\" animation-name:=\"\" none=\"\" !important;=\"\" transition-property:=\"\" !important;\"=\"\">&nbsp;&nbsp;<font size=\"2\"><b>casateodoraresort.zc@gmail.com&nbsp;</b></font></font></div><div style=\"text-align: center;\"><font size=\"1\" style=\"\" face=\"georgia\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Email</font></div></div><div style=\"text-align: center;\"><font face=\"georgia\"><img class=\"x1b0d499 xuo83w3\" src=\"https://static.xx.fbcdn.net/rsrc.php/v3/yf/r/EzO5YKuJljX.png?_nc_eui2=AeFf1nIC0D4Wxo8JzJyic2XOEnOIZVu8IDUSc4hlW7wgNWwTEOPbHU_XfXuU-nyVwQ5HMjw93QU6bSJ33Wk4peSr\" alt=\"\" height=\"24\" width=\"24\" style=\"vertical-align: -0.25em; filter: var(--filter-placeholder-icon); color: rgb(28, 30, 33); font-size: 12px; background-color: rgb(36, 37, 38); animation-name: none !important; transition-property: none !important;\">&nbsp; <font size=\"2\"><b>Always Open</b></font></font></div><div style=\"text-align: center;\"><font face=\"georgia\" size=\"1\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Hours</font></div><div style=\"text-align: center;\"><font face=\"georgia\" size=\"1\"><br></font></div><div style=\"text-align: center;\"><img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC8AAAAeCAYAAAC8AUekAAAC/0lEQVRYha2XTUgUYRiAn9FRc3WDlfKgoYErhSSRobF1KPIHPIT4AwalHqUf6NLFqA4GQVAgdo0OhVRgdOgghdIlCJLa8BBEdhByyXbVxRTNnd2vg+2Pszuz883Mc9rhm+99n++db/Z7RxFCCByyEE5w8l7Y8v3jvRX0BoqcpkWRkVcu/6LKozhOerii3HDs4WAxDQesLcxU/uvPGO1jK/J2OYglBI37vNLzZm6UGY4ZyldfX5JOZIRZpa1gtIAs+XhokZXBbgCmGq4xUtxmK6HdShuxsiUIju4uQko+9v0b0UsDhpOfNt7kQeGJvEncltYT3hTM3dlZhCKEEGJjnUjXWakglU1vqUr8TV97yvhwq5w9ed611rsb0sIAa3VDqd+r2gbzF6YoAIh0npIO9vtzB6GCktR1cDS/OJi/gEZkigP41J0YylKLXyhen3RAgP3TH23Ny8TsSeil9ah2xCtuzyJiqvS8XGxqUKoLtVDbl6quGQWyyXwjQdfEs2J7FNbqhiyJA1iycLPSekpVWPX3UCi8rEnOVZaaaoXiq8w5WBL4g+fMvGkAtTUmmTJN+8QYUfW97fmKEEKE21qyBnwjQetREhpqu/X+bnT6Cq+XnZ3gi9vRHfnMUxUkxXOR0CjwP0Lx1gMQ/3Qa1P/brvgwgdAhR+EXt6OEBqbTJ2z8yzBi+bEzaQNqwr1UK5orsTQRJ3j+FZCjt9HeKOkqOWR4vYe5rbgrsQBm+yd3XefsKrUZ5x8KgUiX4xiZ6MXBpCW2s4AfHOFipE7eLA+5xMHCl5TVRbhdaTCWTpL3hFVbY6AZv2wqGjXhXnmzPOQTB8lvWEg/CRWN5oi70s867uP3HbR8v7R8kmPPu1GVQjtTs7BS5VxIN2ZJkv+1TrErDg4qn4l/otNyJ5hkyH+Oq8fN+/V8uCIP0Pyiz/K9Tqqdie1to8eq0LueJ26ldE8e4GXnuOn44naU8iKPa/lcla/ZW8Vs/ySayO5njvrqCQ1Mu5nOvT2vJ/MdcGuP6/kH+04oEx0UAK0AAAAASUVORK5CYII=\" alt=\"\"><b><font size=\"2\" face=\"georgia\">Casa Teodora Resort, W3H9+9WP, Zamboanga, Zamboanga del Sur</font></b></div><div style=\"text-align: center;\"><font face=\"georgia\" size=\"1\" style=\"\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Google Map</font></div><div style=\"text-align: center;\"><br></div>', 'Contact Us', 'N/A', 29),
(52, 'https://web.facebook.com/profile.php?id=100064874763015', 'Instagram', 'N/A', 29),
(53, 'https://web.facebook.com/profile.php?id=100064874763015', 'Facebook', 'N/A', 29),
(55, '<h3 style=\"color: rgb(5, 5, 5); font-size: inherit; margin-top: 0px; margin-bottom: 0px; padding: 0px; outline: none; font-family: \"><b><font face=\"times new roman\">Cecille\'s Hotel&nbsp;</font></b></h3><h6><ul><li><font size=\"4\">Warm-Friendly Service- At Cecille\'s it\'s like your home away from home. You can be assured of safe and superior service from our friendly staff.</font><br style=\"font-size: 16px;\"></li></ul><div><font size=\"4\"><br></font></div><ul><li><font size=\"4\">Delicious Food- We have a good selection of delicious recipes on the menu that will fit your budget and even the more discriminating taste.</font></li></ul><div><font size=\"4\"><br></font></div><ul><li><font size=\"4\">Reasonable Rates- At Cecille\'s everything is reasonably priced for your satisfaction. You will surely get your money\'s worth and even more.</font></li></ul><div><font size=\"4\"><br></font></div><div><font size=\"4\"><br></font></div></h6>', 'About Us', 'N/A', 33),
(56, '<div style=\"text-align: center;\"><br></div><div style=\"text-align: center;\"><br></div><div style=\"text-align: center;\"><span style=\"color: rgb(5, 5, 5); font-family: \" segoe=\"\" ui=\"\" historic\",=\"\" \"segoe=\"\" ui\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><font size=\"2\" style=\"\"><b>Address</b></font></span></div><div style=\"text-align: center;\"><span style=\"color: rgb(5, 5, 5); font-family: \" segoe=\"\" ui=\"\" historic\",=\"\" \"segoe=\"\" ui\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><font size=\"2\" style=\"\"><br></font></span></div><div style=\"text-align: center;\"><br></div><div style=\"text-align: center;\"><br></div><div style=\"text-align: center;\"><font size=\"2\"><b>Contact Number</b></font></div><div style=\"text-align: center;\"><font size=\"2\"><br></font></div><div style=\"text-align: center;\"><font size=\"2\"><br></font></div><div style=\"text-align: center;\"><font size=\"2\"><br></font></div><div style=\"text-align: center;\"><font size=\"2\"><b>Email</b></font></div>', 'Contact Us', 'N/A', 33),
(57, 'https://www.facebook.com/people/Cecilles-Hotel-and-Catering-Service/100063804412698/', 'Facebook', 'N/A', 33),
(61, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d26644.770492443706!2d122.06955218466646!3d6.918216985446864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sph!4v1673196140092!5m2!1sen!2sph\" width=\"100%\" height=\"600\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Map', 'N/A', 3),
(63, '<div style=\"text-align: center;\"><font color=\"#000000\"><span style=\"font-family: sans-serif;\"><font size=\"4\" style=\"\">Lutong pinoy resort, Waling-Waling Drive, tugbungan,&nbsp;</font></span><span itemprop=\"addressLocality\" style=\"font-family: sans-serif; font-size: large; margin: 0px;\">Zamboanga City</span><span style=\"font-family: sans-serif; font-size: large;\">,</span></font></div><span itemprop=\"addressCountry\" style=\"margin: 0px; font-family: sans-serif;\"><div style=\"text-align: center; font-size: large;\"><font color=\"#000000\">Philippines, 7000</font></div><div style=\"text-align: center;\"><font size=\"3\" style=\"\" color=\"#000000\"><b style=\"\">Address</b></font></div><div style=\"color: rgb(110, 125, 137); text-align: center;\"><b style=\"\"><font size=\"3\"><br></font></b></div><div style=\"color: rgb(110, 125, 137); text-align: center;\"><b style=\"\"><font size=\"3\"><br></font></b></div><div style=\"text-align: center;\"><b style=\"\"><font size=\"3\" style=\"\" color=\"#000000\"><br></font></b></div><div style=\"text-align: center;\"><b style=\"\"><font size=\"3\" style=\"\" color=\"#000000\">Contact Number</font></b></div><div style=\"color: rgb(110, 125, 137); text-align: center;\"><b style=\"\"><font size=\"3\"><br></font></b></div><div style=\"color: rgb(110, 125, 137); text-align: center;\"><b style=\"\"><font size=\"3\"><br></font></b></div><div style=\"text-align: center;\"><b style=\"\"><font size=\"3\" style=\"\" color=\"#000000\"><br></font></b></div><div style=\"text-align: center;\"><b style=\"\"><font size=\"3\" style=\"\" color=\"#000000\">Email</font></b></div></span>', 'Contact Us', 'N/A', 36),
(64, 'https://www.facebook.com/zclutongpinoyresort/?ref=page_internal', 'Facebook', '', 36),
(65, '<div style=\"text-align: center;\"><br></div><div style=\"text-align: center;\"><b><br></b></div><div style=\"text-align: center;\"><b><br></b></div><div style=\"text-align: center;\"><b>Email</b></div><div style=\"text-align: center;\"><b>Genericresort2024@gmail.com</b></div><div style=\"text-align: center;\"><b><br></b></div><div style=\"text-align: center;\"><b><br></b></div><div style=\"text-align: center;\"><b><br></b></div><div style=\"text-align: center;\"><b>Mobile Number</b></div><div style=\"text-align: center;\"><b>09XX-XXX-XXXX</b></div><div style=\"text-align: center;\"><b><br></b></div><div style=\"text-align: center;\"><b><br></b></div><div style=\"text-align: center;\"><b><br></b></div><div style=\"text-align: center;\"><b>Telephone Number</b></div><div style=\"text-align: center;\"><b>975-XXXX</b></div>', 'Contact Us', 'N/A', 3),
(66, 'https://web.facebook.com/people/Generic-Resort/100088568079032/', 'Facebook', '', 3),
(68, 'https://web.facebook.com/people/Generic-Resort/100088568079032/', 'Instagram', 'N/A', 3),
(69, '<div style=\"text-align: center;\"><b><font size=\"4\">Open 9:00 Morning to 8:00 in the Evening only.</font></b></div><div style=\"text-align: center;\"><b><font size=\"4\"><br></font></b></div><div style=\"text-align: center;\"><b><font size=\"4\"><br></font></b></div><div style=\"text-align: center;\"><b><font size=\"4\">Entrance Fee 100 pesos</font></b></div><div style=\"text-align: center;\"><b><br></b></div><div style=\"text-align: left;\"><b><font size=\"4\">ADMISSION:</font></b></div><div style=\"text-align: left;\"><font size=\"3\" style=\"\">Ticket are valid for one guest for a day no ticket, NO ENTRY policy in pool area.</font></div><div style=\"text-align: left;\"><b><br></b></div><div style=\"text-align: left;\"><b><font size=\"4\">RIDES AND POOL:</font></b></div><div style=\"text-align: left;\"><font size=\"3\" style=\"\">All water activities here corresponding rules such as physical capability and height requirements under management\'s discussion.</font></div><div style=\"text-align: left;\"><b><br></b></div><div style=\"text-align: left;\"><b><font size=\"4\">SWIMWEAR:</font></b></div><div style=\"text-align: left;\"><font size=\"3\" style=\"\">Wearing if proper swimwear is strictly imposed when engaging with all water rides and pool activities.</font></div><div style=\"text-align: left;\"><br></div><div style=\"text-align: left;\"><font size=\"4\" style=\"\"><b>FOOD AND BEVERAGES:</b></font></div><div style=\"text-align: left;\"><font size=\"3\" style=\"\">Strictly no eating in the swimming pool areas and water rides. Restaurant and canteen maybe found through out the park for your convenience.</font></div><div style=\"text-align: left;\"><font size=\"3\" style=\"\"><br></font></div><div style=\"text-align: left;\"><font size=\"4\"><b>No Smoking:</b></font></div><div style=\"text-align: left;\"><font size=\"3\">In compliance with city ANTI SMOKING Ordinance No.2014-547, Smoking is strictly prohibited in all areas of the park.</font></div><div style=\"text-align: left;\"><br></div>', 'About Us', 'N/A', 36),
(70, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d31680.864219097577!2d122.15269709210597!3d6.996557452823339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sph!4v1695051780925!5m2!1sen!2sph\" width=\"1200\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>\r\n\r\n\r\n\r\n', 'Map', 'N/A', 12),
(71, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d126773.8726587011!2d126.05713480791195!3d6.808297468277054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sph!4v1674950827810!5m2!1sen!2sph\" width=\"1200\" height=\"500\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Map', 'N/A', 38),
(73, 'Test', 'About Us', '', 42),
(74, '<div><font size=\"6\"><b><br></b></font></div><div style=\"font-size: xx-large; text-align: center;\"><b>THIS IS A TEST SYSTEM!!!</b></div><div style=\"font-size: xx-large; text-align: center;\"><b><br></b></div><div style=\"text-align: center;\"><font size=\"4\"><b>The Generic Resort Reservation System conducting a thesis about this system.</b></font></div>', 'About Us', 'N/A', 3),
(75, '<h1 style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 40px; padding: 0px; font-family: &quot;Open Sans&quot;, arial, sans-serif; color: rgb(44, 52, 59); letter-spacing: normal; background-color: rgb(240, 243, 243); border: none;\"><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none;\"><li style=\"margin: 0px; padding: 0px;\"><span open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 16px;\"=\"\" style=\"margin: 0px; padding: 0px;\"><font color=\"#000000\" style=\"margin: 0px; padding: 0px;\" size=\"5\"><span style=\"margin: 0px; padding: 0px;\"><b>How can I locate hotels that are open at the time I wish to stay there?</b></span></font></span></li></ul></h1><h1 style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 40px; padding: 0px; font-family: &quot;Open Sans&quot;, arial, sans-serif; color: rgb(44, 52, 59); letter-spacing: normal; background-color: rgb(240, 243, 243); border: none;\"><font color=\"#000000\" style=\"margin: 0px; padding: 0px;\" size=\"5\">Please choose the dates of your stay and check the box next to \"Show only available hotels\" in the search menu on the left that contains the check-in and check-out information.</font></h1>', 'FAQ', '', 3),
(76, '<div style=\"font-size: medium;\"><h2><strong>Terms and Conditions</strong></h2></div><div style=\"font-size: medium;\"><br></div><div style=\"font-size: medium;\"><p>Welcome to Generic Resort Reservation System!</p></div><div style=\"font-size: medium;\"><br></div><div style=\"font-size: medium;\"><p>These terms and conditions outline the rules and regulations for the use of Generic Resort Reservation System&nbsp;Website.</p></div><div style=\"font-size: medium;\"><br></div><div style=\"font-size: medium;\"><p>By accessing this website we assume you accept these terms and conditions. Do not continue to use Generic Resort if you do not agree to take all of the terms and conditions stated on this page.</p></div><div style=\"font-size: medium;\"><br></div><div style=\"font-size: medium;\"><p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: \"Client\", \"You\" and \"Your\" refers to you, the person log on this website and compliant to the Company’s terms and conditions. \"The Company\", \"Ourselves\", \"We\", \"Our\" and \"Us\", refers to our Company. \"Party\", \"Parties\", or \"Us\", refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client’s needs in respect of provision of the Company’s stated services, in accordance with and subject to. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p></div><div style=\"font-size: medium;\"><h3><strong>Cookies</strong></h3></div><div style=\"font-size: medium;\"><br></div><div style=\"font-size: medium;\"><p>We employ the use of cookies. By accessing Generic Resort Reservation System, you agreed to use cookies in agreement with the Generic Resort Reservation System&nbsp;Privacy Policy.</p></div><div style=\"font-size: medium;\"><br></div><div style=\"font-size: medium;\"><p>Most interactive websites use cookies to let us retrieve the user’s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p></div><div style=\"font-size: medium;\"><br></div><div style=\"font-size: medium;\"><h3><strong>License</strong></h3></div><div style=\"font-size: medium;\"><br></div><div style=\"font-size: medium;\"><p>Unless otherwise stated, Generic Resort Reservation System&nbsp;and/or its licensors own the intellectual property rights for all material on Generic Resort Reservation System. All intellectual property rights are reserved. You may access this from Generic Resort Reservation System&nbsp;for your own personal use subjected to restrictions set in these terms and conditions.</p></div><div style=\"font-size: medium;\"></div><div style=\"font-size: medium;\"><br></div><div style=\"font-size: medium;\"><br></div><div style=\"font-size: medium;\"><p>Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. Generic Resort Reservation System&nbsp;does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of Generic Resort Reservation System or it\'s affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, Generic Resort Reservation System&nbsp;shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.</p></div><div style=\"font-size: medium;\"><br></div><div style=\"font-size: medium;\"><p>Generic Resort Reservation System reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.</p></div><div style=\"font-size: medium;\"><br></div><div style=\"font-size: medium;\"><p>You warrant and represent that:</p></div><div style=\"font-size: medium;\"><li>You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;</li></div><div style=\"font-size: medium;\"><li>The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;</li></div><div style=\"font-size: medium;\"><li>The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy&nbsp;&nbsp;</li></div><div style=\"font-size: medium;\"><li>The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.</li></div><div style=\"font-size: medium;\"></div><div style=\"font-size: medium;\"><br></div><div style=\"font-size: medium;\"><p>You hereby grant Generic Resort Reservation System&nbsp;a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms.</p><p><br></p></div><div style=\"font-size: medium;\"><h3><strong>Hyperlinking to our Content</strong></h3></div><div style=\"font-size: medium;\"><br></div><div style=\"font-size: medium;\"><p>If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to Generic Resort Reservation System. Please include your name, your organization name, contact information. Wait 1-2 weeks for a response.</p></div><div style=\"font-size: medium;\"><br></div><div style=\"font-size: medium;\"><p>Approved organizations may hyperlink to our website as follows:&nbsp;&nbsp;</p></div><div style=\"font-size: medium;\"><li>By use of our business name; or</li></div><div style=\"font-size: medium;\"><li>By use of the uniform resource locator being linked to.</li></div><div style=\"font-size: medium;\"></div><div style=\"font-size: medium;\"><br></div><div style=\"font-size: medium;\"><p>No use of Generic Resort Reservation System&nbsp;or other artwork will be allowed for linking absent a trademark license agreement.</p></div><div style=\"font-size: medium;\"><br></div><div style=\"font-size: medium;\"><h3><strong>Content Liability</strong></h3></div><div style=\"font-size: medium;\"><br></div><div style=\"font-size: medium;\"><p>We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.</p></div><div style=\"font-size: medium;\"><br></div><div style=\"font-size: medium;\"><h3><strong>Your Privacy</strong></h3></div><p style=\"font-size: medium;\">We the Generic Resort Reservation System&nbsp;is made available to the customer we guarantee your safety and privacy as a Admin of the system. We will not sell your personal data to anyone it is stored safely and secured, don\'t worry about your personal information it is safe with us. Our Generic Resort Reservation System&nbsp;are only accessible to 18 years old and above. We assure you that this Generic Resort Reservation System&nbsp;are safe to use 24/7. If you find or experience any error or glitch from the system rest assured that our IT Staff will fix it and update the system and also improving it.</p><div style=\"font-size: medium;\"><br></div><div style=\"font-size: medium;\"><h3><strong>Disclaimer</strong></h3></div><div style=\"font-size: medium;\"><br></div><div style=\"font-size: medium;\"><p>To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:</p></div><div style=\"font-size: medium;\"><li>limit or exclude our or your liability for death or personal injury;</li></div><div style=\"font-size: medium;\"><li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;&nbsp;&nbsp;</li></div><div style=\"font-size: medium;\"><li>limit any of our or your liabilities in any way that is not permitted under applicable law; or</li></div><div style=\"font-size: medium;\"><li>exclude any of our or your liabilities that may not be excluded under applicable law.</li></div><div style=\"font-size: medium;\"></div><div style=\"font-size: medium;\"><br></div><div style=\"font-size: medium;\"><br></div><div style=\"font-size: medium;\"><p>As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p></div>', 'Terms', 'N/A', 3),
(77, '<div style=\"text-align: center;\"><b><font size=\"5\">Entrance Fee</font></b></div><div style=\"text-align: center;\"><b><font size=\"2\">Adult - 100</font></b></div><div style=\"text-align: center;\"><b><font size=\"2\">Children (3-12 yrs old) - 50</font></b></div><div style=\"text-align: center;\"><b><font size=\"2\">Senior / PWD - 20% Discount</font></b></div><div style=\"text-align: center;\"><b><font size=\"2\"><br></font></b></div><div style=\"text-align: center;\"><b><font size=\"2\"><br></font></b></div>', 'About Us', '', 56),
(78, '<ol><li><font size=\"2\" face=\"georgia\">The time for check-in and check-out is noon.</font></li><li><font size=\"2\" face=\"georgia\">After Mid-Night, guests are not permitted in the rooms.</font></li><li><font size=\"2\" face=\"georgia\">Any valuables left in a guest room are the exclusive responsibility of the visitor and not the hotel.</font></li><li><font size=\"2\" face=\"georgia\">The cashier at the bank offers complimentary safe deposit boxes.</font></li><li><font size=\"2\" face=\"georgia\">Unless other agreements have been made in advance, I hereby agree to pay any fees incurred by me while I am a guest at the hotel and to settle my account whenever it reaches [Mention Floor Limit].</font></li></ol>', 'Terms', 'N/A', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbltitle`
--

CREATE TABLE `tbltitle` (
  `TItleID` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Subtitle` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbltitle`
--

INSERT INTO `tbltitle` (`TItleID`, `Title`, `Subtitle`) VALUES
(1, 'Generic Sample Resort', '24Hrs.');

-- --------------------------------------------------------

--
-- Table structure for table `tbltransaction`
--

CREATE TABLE `tbltransaction` (
  `TransactionID` int(11) NOT NULL,
  `TransactionNo` varchar(90) NOT NULL,
  `TransactionDate` datetime NOT NULL DEFAULT current_timestamp(),
  `Subtotal` double NOT NULL,
  `Discount` double NOT NULL,
  `TotalAmount` double NOT NULL,
  `CreatedBy` varchar(90) NOT NULL,
  `DateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccount`
--

CREATE TABLE `tbluseraccount` (
  `USERID` int(11) NOT NULL,
  `UNAME` varchar(255) NOT NULL DEFAULT '-',
  `USER_NAME` varchar(90) NOT NULL DEFAULT '-',
  `UPASS` varchar(90) NOT NULL DEFAULT '-',
  `ROLE` varchar(30) NOT NULL DEFAULT '-',
  `PHONE` varchar(255) NOT NULL DEFAULT '0',
  `User_Email` varchar(90) NOT NULL DEFAULT '-',
  `Logo` text NOT NULL DEFAULT 'logo/2023010833039c9f1649441b649a7b0194f861540dbfb.png',
  `ADDRESS` varchar(255) NOT NULL,
  `VALID_ID` varchar(255) NOT NULL,
  `BIR` varchar(255) NOT NULL,
  `ResortAuth` tinyint(1) NOT NULL DEFAULT 0,
  `twoWayAuth` tinyint(1) NOT NULL DEFAULT 0,
  `twoWayCode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`USERID`, `UNAME`, `USER_NAME`, `UPASS`, `ROLE`, `PHONE`, `User_Email`, `Logo`, `ADDRESS`, `VALID_ID`, `BIR`, `ResortAuth`, `twoWayAuth`, `twoWayCode`) VALUES
(3, 'Generic Resort', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', '2147483647', 'genericresort@gmail.com', 'logo/20230108131724a-holiday-hut-by-the-sea-1638697.jpg', '', '', '', 0, 0, NULL),
(12, 'Generic Sample', 'MRE12345', '6d367042124d9cd448cc6c88e15679e967a16043', 'Resort', '0', 'genericresort2024@gmail.com', 'logo/2023010833039c9f1649441b649a7b0194f861540dbfb.png', '', '', '', 1, 0, '020p8y'),
(29, 'Casa Teodora Resort', 'CasaTeodoraResort', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Resort', '1234', '-', 'logo/20230106032322309339053_471619685010520_8100252138228119926_n.jpg', '', '', '', 0, 0, NULL),
(36, 'Lutong Pinoy Resort', 'lutongpinoy', '35e4eeb27b2ded997e89dc509d2851ab8cfae4b3', 'Resort', '0', '-', 'logo/20230111500825215304365_4039991379431836_4995537959883970889_n.jpg', '', '', '', 0, 0, NULL),
(48, 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', '999', 'admin@gmail.com', '-', '999', 'kiku.png', 'kiku.png', 0, 0, NULL),
(49, 'Kayawan Beach Resort', 'kayawan', '0a4a47029526b185bb14ba5205945697c7ab266d', '', '', 'kayawan@gmail.com', 'logo/2023010833039c9f1649441b649a7b0194f861540dbfb.png', 'Kayawan', 'kikubnw.png', 'kiku.png', 0, 0, NULL),
(52, 'Rio Grande', 'unireort', '649a9baf2e1aa48c8bdcdbd4e1710719e83d4e04', '', '', 'uniresort@gmail.com', 'logo/2023092957507dream_believe_achieve.png', 'labuan', 'keep_going.png', 'DESKTOP-TABLET_be_kind_to_yourself.png', 0, 0, NULL),
(53, 'Lutong Pinoy Resort', 'lutongpinoy', '35e4eeb27b2ded997e89dc509d2851ab8cfae4b3', '', '', 'lutong@gmail.com', 'logo/2023010833039c9f1649441b649a7b0194f861540dbfb.png', 'Tugbungan', 'IMG20230109110928.jpg', 'IMG20230109110928.jpg', 0, 0, NULL),
(54, 'Cecille\'s Catering and Pension House', 'cecilleshotel', '6e60e03021e8fb93aea0c6da5e33f79427c6c6b2', 'Resort', '0999999999', 'cecilles@gmail.com', 'logo/20231016014014306961672_494026342734175_7114791482820673691_n.jpg', 'Tumaga Por Centro, Zamboanga, Zamboanga del Sur', 'elementor-placeholder-image.webp', 'elementor-placeholder-image.webp', 0, 0, NULL),
(55, 'Casa Teodora Resort', 'CasaTeodoraResort', '17f8ba14ed913ee5fd611e37e62883f6e51c9298', '', '', 'casa@gmail.com', 'logo/20231016111415309339053_471619685010520_8100252138228119926_n.jpg', 'Brgy. Santa Maria, Zamboanga City', 'elementor-placeholder-image.webp', 'elementor-placeholder-image.webp', 0, 0, NULL),
(56, 'Santiago Resort', 'santiago', '88a28c2452d5e6b7294a5d9be5b63e42b4e01a05', 'Resort', '0999999999', 'santiago@gmail.com', 'logo/20231016034210277524728_3200810650191021_4045986803332049461_n.jpg', 'Cabatangan, Zamboanga City', 'placeholder-2.webp', 'placeholder-2.webp', 0, 0, NULL),
(57, 'Virnell Farm & Resort', 'virnellresort', '2de2251f20bb88b9c3c6de34b4c04d26c06a88d5', 'Resort', '099999999', 'virnell@gmail.com', 'logo/2023010833039c9f1649441b649a7b0194f861540dbfb.png', 'Cacao, Zamboanga City', 'placeholder-2.webp', 'placeholder-2.webp', 0, 0, NULL),
(58, 'Hill Top Resort', 'hilltop', '180dde65022772936ee57b84fcc5c188103870d6', 'Resort', '0999999999', 'hill@gmail.com', 'logo/2023010833039c9f1649441b649a7b0194f861540dbfb.png', 'San Roque, Zamboanga City', 'PLAY.jpg', 'PLAY.jpg', 0, 0, NULL),
(59, 'Kayawan Beach Resort', 'Kayawan', '0a4a47029526b185bb14ba5205945697c7ab266d', '', '', 'kayawan@gmail.com', 'logo/20231016564825321929864_518453860244127_987363978751341691_n.jpg', 'Patalon, Zamboanga City', 'placeholder-2.webp', 'placeholder-2.webp', 0, 0, NULL),
(61, 'kayawan Beach Resort', 'kayawanresort', '0a4a47029526b185bb14ba5205945697c7ab266d', 'Resort', '0999999999', 'kayawan@gmail.com', 'logo/20231016033812321929864_518453860244127_987363978751341691_n.jpg', 'Patalon, Zamboanga City', 'placeholder-2.webp', 'placeholder-2.webp', 0, 0, NULL),
(62, 'Margareeta Family Resort', 'margareeta', '7ff16413306c4f5920523d4e1c380180e975f2ae', 'Resort', '0999999999', 'margareeta@gmail.com', 'logo/20231016171214243213581_310111124252507_9070823597533234929_n.jpg', 'Cabaluay, Zamboanga city', 'placeholder-2.webp', 'placeholder-2.webp', 0, 0, NULL),
(66, 'twilight resort', 'twilight', '7868b0cab599e2dd01f7ca26eb175e94f3182a3b', 'Resort', '099999999', 'twilight@gmail.com', 'logo/20231017091920keep_going.png', 'GUIWAN ZAMBOANGA CITY', '7_88741bcf-5c32-4e03-8403-12a24e68e492.png', 'keep_going.png', 0, 0, NULL),
(67, 'Mark Resort', 'MarkRonnieEmata', '4a723a5a90d573e6047f6b36b923cfb0e490bee2', 'Resort', '09651283893', 'martematas87654321@gmail.com', 'logo/2023010833039c9f1649441b649a7b0194f861540dbfb.png', 'Guiwan, Zamboanga City', 'ID1.jpg', 'BIR.jpg', 0, 0, NULL),
(70, 'Love Resort', 'love1234', '1785bf0ed0f6346210af2d64b310a99b4024ce44', 'Resort', '0000000000', 'love@gmail.com', 'logo/2023010833039c9f1649441b649a7b0194f861540dbfb.png', 'tumaga', 'placeholder-2.webp', 'placeholder-2.webp', 0, 0, NULL),
(71, 'Sample Resort', 'sample1234', 'fdad378c71f09711285e6a64ffb0d5234e8ae68b', 'Resort', '00000000000', 'sample@email.com', 'logo/2023010833039c9f1649441b649a7b0194f861540dbfb.png', 'luyahan, Zamboanga city', 'placeholder-2.webp', 'placeholder-2.webp', 0, 0, NULL),
(72, 'Thesis Resort', 'thesis1234', '7bb079ecebbd43b36c893d3e274c8589e155c1d2', 'Resort', '000000000', 'thesis@email.com', 'logo/2023010833039c9f1649441b649a7b0194f861540dbfb.png', 'Sta. Maria, Zamboanga City', 'placeholder-2.webp', 'placeholder-2.webp', 0, 0, NULL),
(73, 'Edward Resort', 'edward1234', '85a75b9f84ea3d129a8d77123639873f94b81847', 'Resort', '000000000', 'edward@email.com', 'logo/2023010833039c9f1649441b649a7b0194f861540dbfb.png', 'Canelar, Zamboanga City', 'placeholder-2.webp', 'placeholder-2.webp', 0, 0, NULL),
(74, 'Uni Resort', 'uni123', '59d324d313b4e9bb538c06311426efdc2165dbcf', 'Resort', '00000', 'uni@email.com', 'logo/2023010833039c9f1649441b649a7b0194f861540dbfb.png', 'Campaner, Zamboanga City', 'placeholder-2.webp', 'placeholder-2.webp', 0, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladdons`
--
ALTER TABLE `tbladdons`
  ADD PRIMARY KEY (`AddonsID`);

--
-- Indexes for table `tblamenities`
--
ALTER TABLE `tblamenities`
  ADD PRIMARY KEY (`amen_id`) USING BTREE;

--
-- Indexes for table `tblbookingaddons`
--
ALTER TABLE `tblbookingaddons`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbldamages`
--
ALTER TABLE `tbldamages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblfood`
--
ALTER TABLE `tblfood`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foodcons` (`resort_id`);

--
-- Indexes for table `tblfoodorders`
--
ALTER TABLE `tblfoodorders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fdid` (`food_id`);

--
-- Indexes for table `tblgallery`
--
ALTER TABLE `tblgallery`
  ADD PRIMARY KEY (`GalleryID`);

--
-- Indexes for table `tblguest`
--
ALTER TABLE `tblguest`
  ADD PRIMARY KEY (`GUESTID`),
  ADD UNIQUE KEY `G_UNAME` (`G_UNAME`);

--
-- Indexes for table `tblpayment`
--
ALTER TABLE `tblpayment`
  ADD PRIMARY KEY (`SUMMARYID`),
  ADD UNIQUE KEY `CONFIRMATIONCODE` (`CONFIRMATIONCODE`),
  ADD KEY `GUESTID` (`GUESTID`);

--
-- Indexes for table `tblpricing`
--
ALTER TABLE `tblpricing`
  ADD PRIMARY KEY (`PricingID`);

--
-- Indexes for table `tblrating`
--
ALTER TABLE `tblrating`
  ADD PRIMARY KEY (`RatingID`);

--
-- Indexes for table `tblreservation`
--
ALTER TABLE `tblreservation`
  ADD PRIMARY KEY (`RESERVEID`),
  ADD KEY `ROOMID` (`ROOMID`),
  ADD KEY `GUESTID` (`GUESTID`),
  ADD KEY `CONFIRMATIONCODE` (`CONFIRMATIONCODE`);

--
-- Indexes for table `tblresort`
--
ALTER TABLE `tblresort`
  ADD PRIMARY KEY (`ResortID`);

--
-- Indexes for table `tblresortrating`
--
ALTER TABLE `tblresortrating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblroom`
--
ALTER TABLE `tblroom`
  ADD PRIMARY KEY (`ROOMID`);

--
-- Indexes for table `tblsettings`
--
ALTER TABLE `tblsettings`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltitle`
--
ALTER TABLE `tbltitle`
  ADD PRIMARY KEY (`TItleID`);

--
-- Indexes for table `tbltransaction`
--
ALTER TABLE `tbltransaction`
  ADD PRIMARY KEY (`TransactionID`);

--
-- Indexes for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  ADD PRIMARY KEY (`USERID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladdons`
--
ALTER TABLE `tbladdons`
  MODIFY `AddonsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tblamenities`
--
ALTER TABLE `tblamenities`
  MODIFY `amen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tblbookingaddons`
--
ALTER TABLE `tblbookingaddons`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbldamages`
--
ALTER TABLE `tbldamages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblfood`
--
ALTER TABLE `tblfood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblfoodorders`
--
ALTER TABLE `tblfoodorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tblgallery`
--
ALTER TABLE `tblgallery`
  MODIFY `GalleryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tblguest`
--
ALTER TABLE `tblguest`
  MODIFY `GUESTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tblpayment`
--
ALTER TABLE `tblpayment`
  MODIFY `SUMMARYID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `tblpricing`
--
ALTER TABLE `tblpricing`
  MODIFY `PricingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=344;

--
-- AUTO_INCREMENT for table `tblrating`
--
ALTER TABLE `tblrating`
  MODIFY `RatingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblreservation`
--
ALTER TABLE `tblreservation`
  MODIFY `RESERVEID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `tblresort`
--
ALTER TABLE `tblresort`
  MODIFY `ResortID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblresortrating`
--
ALTER TABLE `tblresortrating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblroom`
--
ALTER TABLE `tblroom`
  MODIFY `ROOMID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `tblsettings`
--
ALTER TABLE `tblsettings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `tbltransaction`
--
ALTER TABLE `tbltransaction`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  MODIFY `USERID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblfood`
--
ALTER TABLE `tblfood`
  ADD CONSTRAINT `foodcons` FOREIGN KEY (`resort_id`) REFERENCES `tbluseraccount` (`USERID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblfoodorders`
--
ALTER TABLE `tblfoodorders`
  ADD CONSTRAINT `fdid` FOREIGN KEY (`food_id`) REFERENCES `tblfood` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblreservation`
--
ALTER TABLE `tblreservation`
  ADD CONSTRAINT `tblreservation_ibfk_2` FOREIGN KEY (`GUESTID`) REFERENCES `tblguest` (`GUESTID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
