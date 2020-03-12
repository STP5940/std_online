-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 06, 2018 at 08:09 AM
-- Server version: 5.6.32
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `ID` int(15) NOT NULL,
  `Name` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`ID`, `Name`) VALUES
(1, 'ช่างยนต์'),
(2, 'ช่างกลโรงงาน'),
(3, 'เขียนแบบการผลิต'),
(4, 'เทคนิคการผลิต'),
(5, 'ช่างเชื่อมโลหะ'),
(6, 'ช่างไฟฟ้ากำลัง'),
(7, 'ช่างอิเล็กทรอนิกส์'),
(8, 'ช่างก่อสร้าง'),
(9, 'เทคนิคสถาปัตย์'),
(10, 'เทคโนโลยีอุตสาหกรรม'),
(11, 'เทคนิคพื้นฐาน'),
(12, 'อาหารและโภชนาการ'),
(13, 'การบริหารคหกรรมศาสตร์'),
(14, 'ผ้าและเครื่องแต่งกาย'),
(15, 'วิจิตรศิลป์'),
(16, 'ออกแบบ'),
(17, 'เครื่องเคลือบดินเผา'),
(18, 'การบัญชี'),
(19, 'การเลขานุการ'),
(20, 'การตลาด'),
(21, 'คอมพิวเตอร์ธุรกิจ'),
(22, 'คอมพิวเตอร์กราฟิก'),
(23, 'การจัดการโลจิสติกส์'),
(24, 'การโรงแรมและบริการ'),
(25, 'ธุรกิจค้าปลีก'),
(26, 'สามัญสัมพันธ์');

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `ID` int(11) NOT NULL,
  `Day` varchar(20) NOT NULL,
  `Day_holiday` varchar(15) CHARACTER SET utf8mb4 NOT NULL,
  `Detail_holiday` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`ID`, `Day`, `Day_holiday`, `Detail_holiday`) VALUES
(11, 'Tuesday', '01/01/2561', 'วันปีใหม่'),
(12, 'Tuesday', '02/01/2561', 'ชดเชยวันปีใหม่'),
(13, 'Friday', '10/01/2561', 'ทดสอบวันหยุด'),
(15, 'Friday', '17/08/2560', 'ทดสอบจ้าาา 2');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `ID` int(10) NOT NULL,
  `St_id` varchar(15) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `Subjects_ID` int(10) NOT NULL,
  `Status` int(10) NOT NULL,
  `Hours` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`ID`, `St_id`, `Date`, `Time`, `Subjects_ID`, `Status`, `Hours`) VALUES
(262, '', '2018-01-05', '', 46, 5, '7200');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` int(10) NOT NULL,
  `St_id` varchar(15) NOT NULL,
  `St_rfid` varchar(10) NOT NULL,
  `St_sex` varchar(10) NOT NULL,
  `St_firstname` varchar(50) NOT NULL,
  `St_lastname` varchar(50) NOT NULL,
  `St_class` varchar(20) NOT NULL,
  `St_department` varchar(50) NOT NULL,
  `Birthday` varchar(20) NOT NULL,
  `Pw` varchar(200) NOT NULL,
  `Userlevel` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `St_id`, `St_rfid`, `St_sex`, `St_firstname`, `St_lastname`, `St_class`, `St_department`, `Birthday`, `Pw`, `Userlevel`) VALUES
(2, '5932041028', '00000028', 'นางสาว', 'สิริภัทร', 'เถาว์น้อย', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '06/07/2540', 'f65dedde2453dade998067e1578718a2', 'S'),
(4, '5932041030', '00000030', 'นางสาว', 'สุชาดา', 'เต็กสุวรรณ', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '18/04/2541', 'bf0ba46f49168aa10e7efb2180d77880', 'S'),
(5, '5932041031', '00000031', 'นางสาว', 'สุพรรษา', 'จิตอ่ำ', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '22/10/2539', '43752ae90418bfc2d806bee77c6772f1', 'S'),
(6, '5932041034', '00000034', 'นางสาว', 'อุรัสยา', 'พูลสวัสดิ์', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '05/11/2540', '6fa6d5a9c06b3d01b8ecf4446e41fff2', 'S'),
(7, '5932041001', '00000001', 'นาย', 'กรอบทอง', 'ศรีพิจารย์', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '23/02/2541', 'e42ea480e019203830e144fcad2532c7', 'S'),
(8, '5932041002', '00000002', 'นางสาว', 'กัญญารัตน์', 'เกิดดี', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '17/09/2540', '9ef27422a1ef27f050f646e2c2883b1c', 'S'),
(9, '5932041003', '00000003', 'นาย', 'จิติวัฒนา', 'รุ่งพิทยานนท์', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '12/01/2541', 'a78893c8cd2e4778b6fd0a18c84c9cca', 'S'),
(10, '5932041004', '00000004', 'นางสาว', 'จิราภรณ์', 'พวงเข็มแดง', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '16/01/2540', 'e9cd35b0ca08126cbe7c71218d4a57ce', 'S'),
(11, '5932041005', '00000005', 'นางสาว', 'จุฑามาศ', 'ทับยาง', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '17/02/2541', '9c75235dbf0bcf9e4b59f5ba88f03e79', 'S'),
(12, '5932041006', '00000006', 'นาย', 'เจษฎา', 'ซิ่วเกษร', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '10/09/2540', 'd4386c2b2774bdb9fdb13d75dacfaa7c', 'S'),
(13, '5932041007', '00000007', 'นางสาว', 'ชญานี', 'เอื้อนไธสง', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '17/04/2541', '8ea1387fe2b651dcb24108b2c3c39a2f', 'S'),
(14, '5932041008', '00000008', 'นางสาว', 'ฐิดาภรณ์', 'ขุนอาวุธ', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '30/07/2540', '1b66012cf1582b2f394016ee2803c574', 'S'),
(15, '5932041009', '00000009', 'นางสาว', 'ณัฏฐณิชา', 'จุ่นเจิม', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '18/12/2537', 'c3eac51674b1d24350510be53e27589e', 'S'),
(16, '5932041010', '00000010', 'นาย', 'ถิรวัฒน์', 'ตันเปรมวงษ์', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '25/08/2540', '2e28e82b7a8aa5e31120478febaa7c64', 'S'),
(17, '5932041011', '00000012', 'นางสาว', 'ทรายเพชร', 'อุทัยฤกษ์', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '22/06/2540', 'f166173945f508dde6c5f09640be264c', 'S'),
(18, '5932041012', '00000012', 'นาย', 'ธเนศ', 'ประนอมอนุรักษ์', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '13/12/2539', '65fb5da1edf2eccefeb2571f9cd27b47', 'S'),
(19, '5932041013', '00000013', 'นางสาว', 'ธันยพร', 'โพธิทอง', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '08/06/2541', 'f563038764133e01ff909304e8736867', 'S'),
(20, '5932041014', '00000014', 'นางสาว', 'นันทพร', 'พึ่งศรี', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '03/12/2537', '4374dda36dafd399b13876681f25fc51', 'S'),
(21, '5932041016', '00000016', 'นางสาว', 'พรนภา', 'ประเสริฐ', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '28/05/2540', 'c359ea27c9b12452850252e408f55dab', 'S'),
(22, '5932041017', '00000017', 'นาย', 'พันธุ์แกร่ง', 'วัฒนพงษ์', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '12/03/2540', 'ce8493308cf9236b85036c1a589075d3', 'S'),
(23, '5932041018', '00000018', 'นาย', 'พีรณัฐ', 'อ่วมบุญมี', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '09/10/2540', '18e4edee6c496fb2585368072959303c', 'S'),
(24, '5932041019', '00000019', 'นาย', 'ภูวดล', 'นิลอ่างทอง', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '03/04/2540', '5ce0b5f3e2df1cc3f9724c05ffcf55ef', 'S'),
(25, '5932041020', '00000020', 'นางสาว', 'มัณฑนา', 'ไชยรัชต์', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '22/02/2541', '5f59ee4eadaa76a1dde208024fc9e60d', 'S'),
(26, '5932041021', '00000021', 'นาย', 'ฤทธิพร', 'อุทก', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '28/10/2539', 'ea5f6ec48ea2620d65e5c815010c1c79', 'S'),
(27, '5932041022', '00000022', 'นางสาว', 'ลลิตา', 'ศิริองอาจ', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '19/07/2540', 'a07313ff9d485f01c036425ea5047f54', 'S'),
(28, '5932041023', '00000023', 'นาย', 'วิศิษฏ์', 'ฤทธิ์คง', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '04/09/2540', '4828d45c1e5d2da19cac797724d57999', 'S'),
(29, '5932041024', '00000024', 'นาย', 'ศรชัย', 'อยู่สถิตย์', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '23/02/2540', '6a8684902952bd72139019c85de10360', 'S'),
(30, '5932041025', '00000025', 'นางสาว', 'ศิริกัญญา', 'ตะบุบผา', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '10/01/2541', '7c16b36b10ad78638085fe24023536c9', 'S'),
(31, '5932041026', '00000026', 'นาย', 'ศุภมิตร', 'หิรัญอนุสรณ์', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '21/06/2539', '59ba80154639b2bb4dc7fed169555f98', 'S'),
(32, '5932041101', '00000101', 'นาย', 'ธนพนธ์', 'จำปาดี', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '01/09/2540', 'b37f5851f2782d0343b288ab39a7d53c', 'S'),
(33, '5932041100', '00000100', 'นาย', 'จาตุรนต์', 'เปี่ยมบุญน้อย', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '04/05/2541', 'f7c07ed0ff832cd6e664a60b86c2fe05', 'S'),
(34, '5932041027', '00000027', 'นาย', 'สิทธิพงษ์', 'เส็งดอนไพร', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '05/09/2540', '46324c38dba7d60dd85d6f8a41d3a846', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `ID` int(10) NOT NULL,
  `Subjects_code` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Time_start` varchar(20) NOT NULL,
  `Time_end` varchar(20) NOT NULL,
  `Time_all` varchar(10) NOT NULL,
  `Teacher_id` varchar(10) NOT NULL,
  `Day` varchar(10) NOT NULL,
  `St_class` varchar(20) NOT NULL,
  `St_department` varchar(50) NOT NULL,
  `Late` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`ID`, `Subjects_code`, `Name`, `Time_start`, `Time_end`, `Time_all`, `Teacher_id`, `Day`, `St_class`, `St_department`, `Late`) VALUES
(40, '2204-2103', 'โปรแกรมตารางคำนวณ', '37800', '55800', '72', '1', 'Monday', 'ปวช.2/3', 'คอมพิวเตอร์ธุรกิจ', '600'),
(41, '2204-2103', 'โปรแกรมตารางคำนวณ', '30600', '45000', '72', '1', 'Tuesday', 'ปวช.2/2', 'คอมพิวเตอร์ธุรกิจ', '600'),
(42, '3204-2006', 'การวิเคราะห์และออกแบบระบบ', '30600', '43920', '72', '1', 'Wednesday', 'ปวส.1/1', 'คอมพิวเตอร์ธุรกิจ', '600'),
(43, '3204-2006', 'การวิเคราะห์และออกแบบระบบ', '28800', '45000', '72', '1', 'Thursday', 'ปวส.1/2', 'คอมพิวเตอร์ธุรกิจ', '600'),
(44, '2701-2009', 'คอมพิวเตอร์ในงานโรงแรม', '52200', '59400', '54', '1', 'Thursday', 'ปวช.2/1', 'การโรงแรมและบริการ', '600'),
(45, '2204-2103', 'โปรแกรมตารางคำนวณ', '30600', '45000', '72', '1', 'Friday', 'ปวช.2/1', 'คอมพิวเตอร์ธุรกิจ', '600'),
(46, '3204-8503', 'โครงการ 2', '48600', '55800', '36', '1', 'Friday', 'ปวส.2/1', 'คอมพิวเตอร์ธุรกิจ', '600');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(10) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `Userlevel` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Username`, `Password`, `sex`, `Firstname`, `Lastname`, `email`, `phone`, `Userlevel`) VALUES
(1, '3720600068232', 'd5da7c78015a456ee2257d8ec31aaec2', 'นางสาว', 'อารยา', 'โพธิ์พันธุ์', 'araya_popan@hotmail.com', '081-8313272', 'T'),
(2, '3710100916102', 'ca3784feb3d70ec4d0cd51f251daf81d', 'นาง', 'จันทนา', 'สกูลคง', 'tojun50@gmail.com', '085-3455244', 'T'),
(3, 'admin', 'da5571055949067d6632477330e6b616', '', 'Admin', '', '', '', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
