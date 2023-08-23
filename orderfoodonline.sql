-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 24, 2021 at 10:02 PM
-- Server version: 10.2.37-MariaDB-log
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orderfoodonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL COMMENT 'ไอดีอาหาร',
  `foodtype_id` varchar(2) NOT NULL COMMENT 'ไอดีหมวดหมู่อาหาร',
  `food_name` varchar(100) NOT NULL COMMENT 'ชื่ออาหาร',
  `food_price` varchar(10) NOT NULL COMMENT 'ราคาอาหาร',
  `food_flag` varchar(1) NOT NULL COMMENT 'สถานะของอาหาร',
  `food_img` varchar(100) NOT NULL COMMENT 'รูปภาพ',
  `food_recommend` varchar(1) NOT NULL COMMENT 'สถานะเมนูแนะนำ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `foodtype_id`, `food_name`, `food_price`, `food_flag`, `food_img`, `food_recommend`) VALUES
(1, '3', 'เล็ก', '-', '1', '', ''),
(2, '3', 'ใหญ่', '', '1', '', ''),
(3, '3', 'หมี่ขาว', '-', '1', '', ''),
(4, '3', 'มาม่า', '-', '1', '', ''),
(5, '3', 'หมี่เหลือง', '-', '1', '', ''),
(6, '3', 'วุ่นเส้น', '-', '1', '', ''),
(7, '4', 'ทับทิมกรอบ', '20', '1', 'food_1606366747.jpg', '1'),
(8, '5', 'น้ำอัดลม', '15', '1', '', '1'),
(9, '6', 'กากหมูนรก', '10', '1', 'food_1605879597.jpg', '1'),
(10, '7', 'ชุดจัมโบ้', '299', '1', 'food_1605897916.jpg', '1'),
(11, '4', 'ลอดช่อง', '15', '1', 'food_1606901300.jpg', ''),
(12, '6', 'แคบหมูนรก', '10', '1', 'food_1606663287.jpg', '1'),
(13, '6', 'ตับนรก', '10', '1', 'food_1606663314.jpg', ''),
(14, '4', 'เฉาก๋วย', '20', '1', 'food_1606663337.jpg', '1'),
(15, '6', 'ชุดนรก', '199', '1', 'food_1606663382.jpg', '1'),
(16, '6', 'หมูเด้งนรก', '10', '1', 'food_1606663420.jpg', ''),
(17, '6', 'ไข่นรก', '10', '1', 'food_1606663434.jpg', ''),
(18, '6', 'หมูยอนรก', '10', '1', 'food_1606663449.jpg', ''),
(19, '6', 'หมูนรก', '10', '1', 'food_1606663465.jpg', ''),
(20, '6', 'หมูไร้มันนรก', '10', '1', 'food_1606663483.jpg', ''),
(21, '5', 'โอเลี้ยง', '15', '1', 'food_1607366782.jpg', ''),
(22, '5', 'กาแฟเย็น', '15', '1', 'food_1607366562.jpg', ''),
(23, '5', 'ชานมเย็น', '15', '1', 'food_1607366553.jpg', ''),
(24, '5', 'ชามะนาว', '15', '1', 'food_1607366539.jpg', ''),
(25, '5', 'ชาดำเย็น', '15', '1', 'food_1607366511.jpg', ''),
(26, '5', 'น้ำเก็กฮวย', '15', '1', 'food_1607366430.jpg', ''),
(27, '5', 'น้ำเปล่า', '10', '1', '', ''),
(28, '4', 'ลูกชิ้น(ไม้)', '10', '1', 'food_1609145470.jpg', '1'),
(39, '7', 'เกาเหลาบก', '40', '1', '', ''),
(40, '7', 'เกาเหลาน้ำ', '40', '1', '', ''),
(41, '7', 'เกาเหลาหม้อไฟ+ข้าวเปล่า', '129', '1', '', ''),
(42, '7', 'ลวกแซ่บ', '50', '1', '', ''),
(43, '7', 'ตุ๋นเดี่ยว...เคี่ยวเอง', '30', '1', '', ''),
(44, '7', 'ข้าวเปล่า', '10', '1', '', ''),
(46, '6', 'ไข่กระทานรก', '10', '1', 'food_1615271803.jpg', ''),
(47, '6', 'ลูกชิ้นนรก', '10', '1', 'food_1615113766.jpg', ''),
(48, '5', 'น้ำกระเจี๊ยบ', '15', '1', 'food_1615113832.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `foodflag_status`
--

CREATE TABLE `foodflag_status` (
  `foodflagstatus_id` int(11) NOT NULL,
  `foodflagstatus_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foodflag_status`
--

INSERT INTO `foodflag_status` (`foodflagstatus_id`, `foodflagstatus_name`) VALUES
(1, 'มีอยู่'),
(2, 'หมด'),
(3, 'ปิดใช้งาน');

-- --------------------------------------------------------

--
-- Table structure for table `foodtype_status`
--

CREATE TABLE `foodtype_status` (
  `foodtypestatus_id` int(11) NOT NULL COMMENT 'ไอดีหมวดหมู่อาหาร',
  `foodtypestatus_name` varchar(100) NOT NULL COMMENT 'ชื่อสถานะหมวดหมู่อาหาร'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foodtype_status`
--

INSERT INTO `foodtype_status` (`foodtypestatus_id`, `foodtypestatus_name`) VALUES
(1, 'เปิดใช้งาน'),
(2, 'ปิดใช้งาน');

-- --------------------------------------------------------

--
-- Table structure for table `food_status`
--

CREATE TABLE `food_status` (
  `food_statusid` int(11) NOT NULL COMMENT 'สเตตัสของออร์เดอร์',
  `food_statusname` varchar(50) NOT NULL COMMENT 'ชื่อของออร์เดอร์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_status`
--

INSERT INTO `food_status` (`food_statusid`, `food_statusname`) VALUES
(1, 'รอดำเนินการ'),
(2, 'รอชำระเงิน'),
(3, 'ชำระเงินแล้ว');

-- --------------------------------------------------------

--
-- Table structure for table `food_topping`
--

CREATE TABLE `food_topping` (
  `foodtopping_id` int(11) NOT NULL,
  `foodtopping_name` varchar(100) NOT NULL,
  `foodtopping_flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_topping`
--

INSERT INTO `food_topping` (`foodtopping_id`, `foodtopping_name`, `foodtopping_flag`) VALUES
(1, 'ลูกชิ้น', 1),
(2, 'หมูหมัก', 1),
(3, 'ตับ', 1),
(4, 'หมูตุ๋น', 1);

-- --------------------------------------------------------

--
-- Table structure for table `food_type`
--

CREATE TABLE `food_type` (
  `foodtype_id` int(11) NOT NULL,
  `foodtype_name` varchar(100) NOT NULL,
  `foodtype_status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_type`
--

INSERT INTO `food_type` (`foodtype_id`, `foodtype_name`, `foodtype_status`) VALUES
(1, 'เมนูแนะนำ', '1'),
(2, 'เมนูยอดนิยม', '1'),
(3, 'ก๋วยเตี๋ยว', '1'),
(4, 'ของหวาน', '1'),
(5, 'เครื่องดื่ม', '1'),
(6, 'เมนูนรก', '1'),
(7, 'เกาเหลา', '1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL COMMENT 'ไอดีของออร์เดอร์',
  `order_date` date NOT NULL COMMENT 'วันที่การสั่งออร์เดอร์',
  `table_id` int(11) NOT NULL COMMENT 'โต๊ะของออร์เดอร์',
  `food_statusid` int(11) NOT NULL COMMENT 'สเตตัสของออร์เดอร์',
  `foodstatusid_dessert_drink` int(11) NOT NULL COMMENT 'สเตตัสสถานะของหวานและเครื่องดื่ม',
  `foodstatusid_hell` int(11) NOT NULL COMMENT 'สเตตัสสถานะเมนูนรก',
  `order_price` int(11) NOT NULL COMMENT 'ยอดใช้จ่ายทั้งหมด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `table_id`, `food_statusid`, `foodstatusid_dessert_drink`, `foodstatusid_hell`, `order_price`) VALUES
(1, '2021-03-08', 1, 3, 3, 3, 768),
(2, '2021-03-10', 1, 3, 3, 3, 215),
(3, '2021-03-10', 3, 3, 3, 3, 185),
(4, '2021-03-10', 2, 3, 3, 3, 499),
(5, '2021-03-10', 5, 3, 3, 3, 180),
(6, '2021-03-19', 1, 3, 3, 3, 962),
(7, '2021-03-19', 1, 3, 3, 3, 70),
(8, '2021-03-19', 1, 3, 3, 3, 90),
(9, '2021-03-19', 1, 3, 3, 3, 130),
(10, '2021-04-02', 2, 3, 3, 3, 638);

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `list_id` int(11) NOT NULL COMMENT 'ไอดีของลิสรายการ',
  `order_id` int(11) NOT NULL COMMENT 'ไอดีของออร์เดอร์',
  `food_id` int(11) NOT NULL COMMENT 'ไอดีของอาหาร',
  `food_typeid` int(11) NOT NULL COMMENT 'ไอดีหมวดหมู่อาหาร',
  `order_unit` int(11) NOT NULL COMMENT 'จำนวนของรายการอาหาร',
  `food_statusid` int(11) NOT NULL COMMENT 'ไอดีสเตัสรายการอาหาร',
  `order_note` varchar(255) NOT NULL COMMENT 'หมายเหตุของอาหาร',
  `food_topping` varchar(255) NOT NULL COMMENT 'ท็อปปิ้งของก๋วยเตี๋ยว',
  `food_water` varchar(50) NOT NULL COMMENT 'ประเภทของก๋วยเตี๋ยว แห้ง/น้ำ',
  `price_categoryname` varchar(255) NOT NULL COMMENT 'ไอดีประเภทราคาอาหาร ธรรมดา/พิเศษ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`list_id`, `order_id`, `food_id`, `food_typeid`, `order_unit`, `food_statusid`, `order_note`, `food_topping`, `food_water`, `price_categoryname`) VALUES
(1, 1, 4, 3, 1, 3, '', '/ลูกชิ้น/หมูหมัก/ตับ/ตู๋น', 'น้ำ', 'ธรรมดา'),
(2, 1, 7, 4, 1, 3, '', '', '', ''),
(3, 1, 8, 5, 1, 3, '', '', '', ''),
(4, 1, 21, 5, 2, 3, '', '', '', ''),
(5, 1, 9, 6, 1, 3, '', '', '', ''),
(6, 1, 12, 6, 1, 3, '', '', '', ''),
(7, 1, 10, 7, 1, 3, '', '', '', ''),
(8, 1, 6, 3, 1, 3, 'ไม่ผัก', '/ลูกชิ้น/หมูหมัก/ตับ/ตู๋น', 'น้ำ', 'ธรรมดา'),
(9, 1, 7, 4, 1, 3, '', '', '', ''),
(10, 1, 8, 5, 1, 3, '', '', '', ''),
(11, 1, 9, 6, 1, 3, '', '', '', ''),
(12, 1, 10, 7, 1, 3, '', '', '', ''),
(13, 2, 4, 3, 4, 3, '', '/ลูกชิ้น/หมูหมัก/ตับ/ตู๋น', 'น้ำ', 'ธรรมดา'),
(14, 3, 4, 3, 3, 3, '', '/ลูกชิ้น/หมูหมัก/ตับ/ตู๋น', 'แห้ง', 'พิเศษ'),
(15, 3, 6, 3, 2, 3, '', '/ลูกชิ้น/ตู๋น', 'แห้ง', 'ธรรมดา'),
(16, 4, 1, 3, 2, 3, '', '/ลูกชิ้น/หมูหมัก/ตับ/ตู๋น', 'น้ำ', 'พิเศษ'),
(17, 2, 1, 3, 1, 3, '', '/ลูกชิ้น/หมูหมัก/ตับ/ตู๋น', 'แห้ง', 'ธรรมดา'),
(18, 4, 1, 3, 1, 3, '', '/ลูกชิ้น/หมูหมัก/ตับ/ตู๋น', 'น้ำ', 'ธรรมดา'),
(19, 4, 7, 4, 2, 3, '', '', '', ''),
(20, 5, 1, 3, 1, 3, '', '/ลูกชิ้น/หมูหมัก/ตับ/ตู๋น', 'น้ำ', 'ธรรมดา'),
(21, 5, 4, 3, 4, 3, '', '/ลูกชิ้น/หมูหมัก/ตับ/ตู๋น', 'น้ำ', 'ธรรมดา'),
(22, 5, 3, 3, 2, 3, '', '/ลูกชิ้น/หมูหมัก/ตับ/ตู๋น', 'น้ำ', 'ธรรมดา'),
(23, 5, 5, 3, 2, 3, '', '/ลูกชิ้น/หมูหมัก/ตับ/ตู๋น', 'น้ำ', 'ธรรมดา'),
(24, 4, 4, 3, 2, 3, '', '/ลูกชิ้น/หมูหมัก/ตับ/ตู๋น', 'แห้ง', 'ธรรมดา'),
(25, 4, 4, 3, 2, 3, '', '/ลูกชิ้น/หมูหมัก/ตับ/ตู๋น', 'แห้ง', 'ธรรมดา'),
(26, 4, 10, 7, 1, 3, '', '', '', ''),
(27, 4, 9, 6, 1, 3, '', '', '', ''),
(28, 3, 5, 3, 2, 3, '', '/ลูกชิ้น/หมูหมัก/ตับ/ตู๋น', 'น้ำ', 'ธรรมดา'),
(29, 2, 5, 3, 2, 3, 'ไม่ผัก', '/ลูกชิ้น/หมูหมัก/ตับ/หมูตุ๋น', 'น้ำ', 'ธรรมดา'),
(30, 2, 7, 4, 2, 3, '', '', '', ''),
(31, 2, 8, 5, 1, 3, '', '', '', ''),
(32, 2, 9, 6, 2, 3, '', '', '', ''),
(33, 6, 4, 3, 1, 3, 'ไม่ผัก', '/ลูกชิ้น/หมูหมัก/ตับ/หมูตุ๋น', 'น้ำ', 'ธรรมดา'),
(34, 6, 4, 3, 1, 3, 'ไม่ผัก', '/ลูกชิ้น/หมูหมัก/ตับ/หมูตุ๋น', 'น้ำ', 'ธรรมดา'),
(35, 6, 10, 7, 2, 3, '', '', '', ''),
(36, 6, 9, 6, 3, 3, '', '', '', ''),
(37, 6, 12, 6, 1, 3, '', '', '', ''),
(38, 6, 15, 6, 1, 3, '', '', '', ''),
(39, 6, 8, 5, 1, 3, '', '', '', ''),
(40, 6, 7, 4, 1, 3, '', '', '', ''),
(41, 6, 14, 4, 1, 3, '', '', '', ''),
(42, 6, 28, 4, 3, 3, '', '', '', ''),
(43, 7, 1, 3, 1, 3, 'ไม่ผัก', '/ลูกชิ้น/หมูหมัก/ตับ/หมูตุ๋น', 'น้ำ', 'พิเศษ'),
(44, 7, 1, 3, 1, 3, 'ไม่ผัก', '/ลูกชิ้น/หมูหมัก/ตับ/หมูตุ๋น', 'น้ำ', 'พิเศษ'),
(45, 8, 6, 3, 1, 3, 'เฟรน', '/ลูกชิ้น/หมูหมัก/ตับ/หมูตุ๋น', 'น้ำ', 'พิเศษ'),
(46, 8, 6, 3, 1, 3, 'เฟรน', '/ลูกชิ้น/หมูหมัก/ตับ/หมูตุ๋น', 'น้ำ', 'พิเศษ'),
(47, 8, 6, 3, 1, 3, '', '/ลูกชิ้น/หมูหมัก/ตับ/หมูตุ๋น', 'น้ำ', 'ธรรมดา'),
(48, 9, 6, 3, 1, 3, 'ไม่ใส่ผัก', '/ลูกชิ้น/หมูหมัก/ตับ/หมูตุ๋น', 'น้ำ', 'ธรรมดา'),
(49, 9, 6, 3, 1, 3, 'ไม่ใส่ผัก', '/ลูกชิ้น/หมูหมัก/ตับ/หมูตุ๋น', 'น้ำ', 'ธรรมดา'),
(50, 9, 6, 3, 1, 3, 'ไม่ใส่ผัก', '/ลูกชิ้น/หมูหมัก/ตับ/หมูตุ๋น', 'น้ำ', 'ธรรมดา'),
(51, 9, 6, 3, 1, 3, '2', '/ลูกชิ้น/หมูหมัก/ตับ/หมูตุ๋น', 'น้ำ', 'ธรรมดา'),
(52, 9, 6, 3, 1, 3, '2', '/ลูกชิ้น/หมูหมัก/ตับ/หมูตุ๋น', 'น้ำ', 'ธรรมดา'),
(53, 10, 1, 3, 1, 3, 'ไม่ใส่ผัก', '/ลูกชิ้น/หมูหมัก/ตับ/หมูตุ๋น', 'น้ำ', 'ธรรมดา'),
(54, 10, 1, 3, 1, 3, 'ไม่ใส่ผักกกกก', '/ลูกชิ้น/หมูหมัก/ตับ/หมูตุ๋น', 'แห้ง', 'พิเศษ'),
(55, 10, 10, 7, 1, 3, '', '', '', ''),
(56, 10, 9, 6, 1, 3, '', '', '', ''),
(57, 10, 12, 6, 1, 3, '', '', '', ''),
(58, 10, 15, 6, 1, 3, '', '', '', ''),
(59, 10, 8, 5, 1, 3, '', '', '', ''),
(60, 10, 7, 4, 1, 3, '', '', '', ''),
(61, 10, 28, 4, 1, 3, '', '', '', ''),
(62, 10, 14, 4, 1, 3, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `price_category`
--

CREATE TABLE `price_category` (
  `pricecategory_id` int(11) NOT NULL,
  `pricecategory_name` varchar(100) NOT NULL,
  `pricecategory_price` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `price_category`
--

INSERT INTO `price_category` (`pricecategory_id`, `pricecategory_name`, `pricecategory_price`) VALUES
(1, 'ธรรมดา', '20'),
(2, 'พิเศษ', '35');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id_restaurant` int(11) NOT NULL,
  `restaurant_name` varchar(100) NOT NULL,
  `restaurant_address` text NOT NULL,
  `restaurant_tel` varchar(10) NOT NULL,
  `restaurant_img` varchar(255) NOT NULL COMMENT 'รูปโลโก้ร้าน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id_restaurant`, `restaurant_name`, `restaurant_address`, `restaurant_tel`, `restaurant_img`) VALUES
(1, 'ร้านเตี๋ยวเรือปร๊ากแตก', '2/148 ถ.พหลโยธิน ตำบลหนองหลวง อำเภอเมือง จังหวัดตาก 63000', '0986362641', 'logo_praktaek.png');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `tables_id` int(11) NOT NULL COMMENT 'ไอดีโต๊ะอาหาร',
  `tables_number` varchar(10) NOT NULL COMMENT 'หมายเลขโต๊ะอาหาร',
  `tables_images` varchar(100) NOT NULL COMMENT 'รูปภาพ qrcode',
  `tables_status` varchar(1) NOT NULL COMMENT 'สเตตัสโต๊ะอาหาร',
  `tables_link` text NOT NULL COMMENT 'ลิ้งเว็บโต๊ะอาหาร'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`tables_id`, `tables_number`, `tables_images`, `tables_status`, `tables_link`) VALUES
(1, '1', '1.png', '1', 'https://praktaektak.com/?id_table=MQ=='),
(2, '2', '2.png', '1', 'https://praktaektak.com/?id_table=Mg=='),
(3, '3', '3.png', '1', 'https://praktaektak.com/?id_table=Mw=='),
(4, '4', '4.png', '1', 'https://praktaektak.com/?id_table=NA=='),
(5, '5', '5.png', '1', 'https://praktaektak.com/?id_table=NQ=='),
(6, '6', '6.png', '1', 'https://praktaektak.com/?id_table=Ng=='),
(7, '7', '7.png', '1', 'https://praktaektak.com/?id_table=Nw=='),
(8, '8', '8.png', '1', 'https://praktaektak.com/?id_table=OA=='),
(9, '9', '9.png', '1', 'https://praktaektak.com/?id_table=OQ=='),
(10, '10', '10.png', '1', 'https://praktaektak.com/?id_table=MTA='),
(11, '11', '11.png', '1', 'https://praktaektak.com/?id_table=MTE='),
(12, '12', '12.png', '1', 'https://praktaektak.com/?id_table=MTI='),
(13, '13', '13.png', '1', 'https://praktaektak.com/?id_table=MTM='),
(14, '14', '14.png', '1', 'https://praktaektak.com/?id_table=MTQ='),
(15, '15', '15.png', '1', 'https://praktaektak.com/?id_table=MTU='),
(16, '16', '16.png', '1', 'https://praktaektak.com/?id_table=MTY='),
(17, '17', '17.png', '1', 'https://praktaektak.com/?id_table=MTc='),
(18, '18', '18.png', '1', 'https://praktaektak.com/?id_table=MTg='),
(19, '19', '19.png', '1', 'https://praktaektak.com/?id_table=MTk='),
(20, '20', '20.png', '1', 'https://praktaektak.com/?id_table=MjA='),
(21, '21', '21.png', '1', 'https://praktaektak.com/?id_table=MjE='),
(22, '22', '22.png', '1', 'https://praktaektak.com/?id_table=MjI='),
(23, '23', '23.png', '1', 'https://praktaektak.com/?id_table=MjM='),
(24, '24', '24.png', '1', 'https://praktaektak.com/?id_table=MjQ='),
(25, '25', '25.png', '1', 'https://praktaektak.com/?id_table=MjU='),
(26, '26', '26.png', '1', 'https://praktaektak.com/?id_table=MjY='),
(27, '27', '27.png', '1', 'https://praktaektak.com/?id_table=Mjc='),
(28, '28', '28.png', '1', 'https://praktaektak.com/?id_table=Mjg='),
(29, '29', '29.png', '1', 'https://praktaektak.com/?id_table=Mjk='),
(30, '30', '30.png', '1', 'https://praktaektak.com/?id_table=MzA='),
(31, 'ทดสอบ', 'ทดสอบ.png', '1', 'https://praktaektak.com/index.php?id_table=4LiX4LiU4Liq4Lit4Lia');

-- --------------------------------------------------------

--
-- Table structure for table `tables_status`
--

CREATE TABLE `tables_status` (
  `tablestatus_id` int(11) NOT NULL,
  `tablestatus_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tables_status`
--

INSERT INTO `tables_status` (`tablestatus_id`, `tablestatus_name`) VALUES
(1, 'เปิดใช้งาน'),
(2, 'ปิดใช้งาน');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `foodflag_status`
--
ALTER TABLE `foodflag_status`
  ADD PRIMARY KEY (`foodflagstatus_id`);

--
-- Indexes for table `foodtype_status`
--
ALTER TABLE `foodtype_status`
  ADD PRIMARY KEY (`foodtypestatus_id`);

--
-- Indexes for table `food_status`
--
ALTER TABLE `food_status`
  ADD PRIMARY KEY (`food_statusid`);

--
-- Indexes for table `food_topping`
--
ALTER TABLE `food_topping`
  ADD PRIMARY KEY (`foodtopping_id`);

--
-- Indexes for table `food_type`
--
ALTER TABLE `food_type`
  ADD PRIMARY KEY (`foodtype_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `price_category`
--
ALTER TABLE `price_category`
  ADD PRIMARY KEY (`pricecategory_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id_restaurant`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`tables_id`);

--
-- Indexes for table `tables_status`
--
ALTER TABLE `tables_status`
  ADD PRIMARY KEY (`tablestatus_id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีอาหาร', AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `foodflag_status`
--
ALTER TABLE `foodflag_status`
  MODIFY `foodflagstatus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `foodtype_status`
--
ALTER TABLE `foodtype_status`
  MODIFY `foodtypestatus_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีหมวดหมู่อาหาร', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `food_status`
--
ALTER TABLE `food_status`
  MODIFY `food_statusid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'สเตตัสของออร์เดอร์', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `food_topping`
--
ALTER TABLE `food_topping`
  MODIFY `foodtopping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `food_type`
--
ALTER TABLE `food_type`
  MODIFY `foodtype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีของออร์เดอร์', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีของลิสรายการ', AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `price_category`
--
ALTER TABLE `price_category`
  MODIFY `pricecategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id_restaurant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `tables_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีโต๊ะอาหาร', AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tables_status`
--
ALTER TABLE `tables_status`
  MODIFY `tablestatus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
