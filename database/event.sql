-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2023 at 01:22 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(3) NOT NULL,
  `adminname` varchar(15) NOT NULL,
  `adminid` varchar(30) DEFAULT NULL,
  `pwd` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminname`, `adminid`, `pwd`) VALUES
(1, 'gautam', 'gautam209@gmail.com', 'Gautam@2009'),
(2, 'pratixa', 'pratixa@gmail.com', 'Pratixa@2002'),
(3, 'kenil', 'kenil@gmail.com', 'Knil@132');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `customerid` int(100) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `ename` varchar(100) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `venue` varchar(100) NOT NULL,
  `phoneno` bigint(100) NOT NULL,
  `pay_status` varchar(100) NOT NULL,
  `payment_id` varchar(100) NOT NULL,
  `payment_date` date NOT NULL,
  `order_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(20) NOT NULL,
  `customerid` int(20) NOT NULL,
  `cname` text NOT NULL,
  `ename` text NOT NULL,
  `pname` text NOT NULL,
  `date` date NOT NULL,
  `venue` varchar(150) NOT NULL,
  `phoneno` text NOT NULL,
  `status` varchar(30) NOT NULL,
  `payment_id` varchar(50) NOT NULL,
  `payment_date` date NOT NULL,
  `price` int(10) NOT NULL,
  `order_status` varchar(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `customerid`, `cname`, `ename`, `pname`, `date`, `venue`, `phoneno`, `status`, `payment_id`, `payment_date`, `price`, `order_status`) VALUES
(38, 12, 'kenil', 'Wedding', 'Platinum', '2023-03-31', 'rajkot', '9385858585', 'complete', 'pay_LWUCKgIzFKxM3O', '2023-03-27', 500000, '1'),
(39, 12, 'kenil', 'Wedding', 'Silver', '2023-03-30', 'ahmedabad', '9825952057', 'complete', 'pay_LWxpkfMhbWyJvb', '2023-03-28', 200000, '2'),
(40, 13, 'pratixa', 'Wedding', 'Gold', '2023-04-01', 'surat', '8511000214', 'complete', 'pay_LX4CW7Uew7sMo8', '2023-03-28', 300000, '3'),
(45, 12, 'kenil', 'Wedding', 'Platinum', '2023-04-13', 'amreli', '9825952057', 'complete', 'pay_LYpbjdQHYvRfST', '2023-04-02', 500000, '0');

-- --------------------------------------------------------

--
-- Table structure for table `bp`
--

CREATE TABLE `bp` (
  `id` int(20) NOT NULL,
  `ename` varchar(20) NOT NULL,
  `package` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bp`
--

INSERT INTO `bp` (`id`, `ename`, `package`, `price`) VALUES
(1, 'Birthday Party', 'Silver', '5000'),
(2, 'Birthday Party', 'Gold', '10000'),
(3, 'Birthday Party', 'Platinum', '15000');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(6) NOT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `msg` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fname`, `email`, `msg`) VALUES
(2, 'pratixa', 'gautam@gmail.com', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `custom_event`
--

CREATE TABLE `custom_event` (
  `id` int(20) NOT NULL,
  `customerid` int(30) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `ename` varchar(30) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `selected_service` varchar(400) NOT NULL,
  `venue` varchar(150) NOT NULL,
  `phoneno` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `payment_id` varchar(30) NOT NULL,
  `payment_date` date NOT NULL,
  `price` varchar(10) NOT NULL,
  `order_status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `custom_event`
--

INSERT INTO `custom_event` (`id`, `customerid`, `cname`, `ename`, `pname`, `date`, `selected_service`, `venue`, `phoneno`, `status`, `payment_id`, `payment_date`, `price`, `order_status`) VALUES
(24, 12, 'kenil', 'Engagement', 'custom', '2023-04-29', 'Catering,Lighting', 'sjsjsj', '85858585858', 'complete', 'pay_LYttd6Qfe57YqJ', '2023-04-02', '95000', 3),
(31, 0, 'kenil', 'Wedding', 'Customed', '2023-04-13', 'Decoration,Catering', 'surat', '9313449023', 'complete', 'pay_La2OFSEokKZgow', '2023-04-05', '140000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `eng`
--

CREATE TABLE `eng` (
  `id` int(20) NOT NULL,
  `ename` varchar(20) NOT NULL,
  `package` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eng`
--

INSERT INTO `eng` (`id`, `ename`, `package`, `price`) VALUES
(1, 'Engagement', 'Silver', '15000'),
(2, 'Engagement', 'Gold', '20000'),
(3, 'Engagement', 'Platinum', '25000');

-- --------------------------------------------------------

--
-- Table structure for table `eventname`
--

CREATE TABLE `eventname` (
  `id` int(6) NOT NULL,
  `events` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eventname`
--

INSERT INTO `eventname` (`id`, `events`) VALUES
(1, 'Wedding'),
(2, 'Engagement'),
(3, 'Birthday Party'),
(4, 'Music Concert');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(20) NOT NULL,
  `e_id` int(20) NOT NULL,
  `ename` varchar(30) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `price` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `e_id`, `ename`, `pname`, `price`) VALUES
(1, 1, 'Wedding', 'Silver', 200000),
(2, 1, 'Wedding', 'Gold', 350000),
(3, 1, 'Wedding', 'Platinum', 500000),
(4, 2, 'Engagement', 'Silver', 150000),
(5, 2, 'Engagement', 'Gold', 220000),
(6, 2, 'Engagement', 'Platinum', 300000),
(7, 3, 'Birthday Party', 'Silver', 40000),
(8, 3, 'Birthday Party', 'Gold', 65000),
(9, 3, 'Birthday Party', 'Platinum', 80000),
(10, 4, 'Music Concert', 'Silver', 275000),
(11, 4, 'Music Concert', 'Gold', 350000),
(12, 4, 'Music Concert', 'Platinum', 600000);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(6) NOT NULL,
  `customerid` int(20) NOT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `phoneno` bigint(20) NOT NULL,
  `fb` varchar(1000) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `star` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `customerid`, `fname`, `phoneno`, `fb`, `email`, `star`, `date`) VALUES
(11, 13, 'pratixa', 8511000214, 'Very good event company… good co-ordination between team and very well organised team with a good leadership of Tushar Patel… they managed my wedding event perfectly.', 'pratixa@gmail.com', 4, '2023-04-04'),
(12, 13, 'Sonali', 9886523568, 'I had arranged DJ for my engagement and I had really good experience, Tusharbhai was really amazing on that day and played amazing music ! He was even involved in the dance with us. I would definitely recommend ArtCore Event for any occasion.', 'sonali123@gmail.com', 5, '2023-04-04'),
(13, 12, 'Jimin', 6589254756, 'it was an amazing event organized by artcore team. superb decoration…amazing children playing area and games. Moreover, the food was delicious. I enjoyed the event.', 'jiminpark@gmail.com', 5, '2023-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(30) NOT NULL,
  `event` varchar(100) NOT NULL,
  `filename` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `event`, `filename`) VALUES
(31, 'wedding', 'pexels-asad-photo-maldives-169185 (1).jpg'),
(32, 'engagement', 'Indian Wedding Decor Inspiration.jfif'),
(33, 'birthday party', 'pexels-agung-pandit-wiguna-2970291.jpg'),
(34, 'birthday party', 'pexels-davide-de-giovanni-3171823.jpg'),
(35, 'wedding', 'pexels-atul-maurya-1042152.jpg'),
(36, 'birthday party', '40b3cf9f-203e-445b-bb8d-1ef79c54185f.jfif'),
(37, 'wedding', 'pexels-banu-film-ads-12718058.jpg'),
(39, 'engagement', 'pexels-joel-paim-2291462.jpg'),
(40, 'wedding', 'pexels-mayur-gawade-10565875.jpg'),
(41, 'engagement', 'pexels-nicole-michalou-5774923.jpg'),
(42, 'wedding', 'pexels-philbert-pembani-2099021.jpg'),
(43, 'engagement', 'pexels-tubarones-photography-11450799.jpg'),
(44, 'birthday party', 'pexels-r-langstang-9801096.jpg'),
(45, 'birthday party', 'pexels-vidal-balielo-jr-4005393.jpg'),
(46, 'wedding', 'Subtle Mandap Designs That Will Add Charm To Your Pheras.jfif'),
(47, 'birthday party', 'pexels-vlada-karpovich-7100327.jpg'),
(48, 'engagement', 'pexels-edward-eyer-1045541.jpg'),
(49, 'music concert', 'tomorrowland-around-the-world-review-1-696x392.jpg'),
(51, 'music concert', 'download (1).jpg'),
(52, 'music concert', 'AVB+16.jpg'),
(53, 'music concert', 'download.jpg'),
(55, 'music concert', 'Sunburn-Goa-2014-1024x683.webp'),
(56, 'music concert', 'Sunburn-8.jpg'),
(57, 'music concert', 'chennai-concert.jpg'),
(59, 'engagement', '03-Engagement-1.jpg'),
(60, 'wedding', '16809-creative-wedding-photography-avinash-dhoundhiyal-photography-lead-image.jpeg'),
(61, 'engagement', '105728-wedding-songs.webp'),
(62, 'birthday party', 'S5M5AR1Yyq5NkizcFaaxzBjntM2y2p5fp1cHD0dl.jpeg'),
(64, 'engagement', 'slide_376472_4431440_free.jpg'),
(66, 'wedding', 'a8750450d804b074d7bf7020b1e0867a.jpg'),
(67, 'birthday party', 'fa66d719c28cfba53d5b750fb09c0c72.jpg'),
(68, 'birthday party', '432d13e55ef7d5f6c4f470f3766c9b3e.jpg'),
(69, 'birthday party', '2c8146180041aa024b7387f8b43a1502.jpg'),
(70, 'wedding', '616ea3e6bc581c233770b8d143d73634.jpg'),
(71, 'engagement', '60d2f70e6f95ab3a78ed73919bc8d4ae.jpg'),
(72, 'engagement', '638ee012c38863e147c848f846f36a0c.jpg'),
(73, 'wedding', 'ff42c3ac0dc863a974bae22cd71dfe9a.jpg'),
(74, 'wedding', '1db405587367e0adbfd392b7d124a3b9.jpg'),
(75, 'engagement', '492347df3e1a31f47d0726fca6ee5bcb.jpg'),
(76, 'engagement', '5702fce69353c07424377bcb73d56ca1.jpg'),
(77, 'wedding', 'c100ab3a2f3b9b504c11810b9f9c9eb5.jpg'),
(78, 'engagement', '87a9848a00f202df73dbedb96b86318e.jpg'),
(79, 'birthday party', 'Nickelodeon-partners-with-Smile-Foundation-to-celebrate-Motu-Patlus-10th-birthday-.jpg'),
(80, 'wedding', 'make-useless-use.jpg'),
(81, 'birthday party', 'pexels-jonathan-borba-4599123.jpg'),
(82, 'engagement', 'whatsapp-image-2022-08-04-at-7-46-48-pm-1_15_416608-165994968651727.jpeg'),
(83, 'wedding', 'fireworks.jpg'),
(84, 'engagement', '71viRwy+e3L.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mc`
--

CREATE TABLE `mc` (
  `id` int(20) NOT NULL,
  `ename` varchar(20) NOT NULL,
  `package` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mc`
--

INSERT INTO `mc` (`id`, `ename`, `package`, `price`) VALUES
(1, 'Music Concert', 'Silver', '20000'),
(2, 'Music Concert', 'Gold', '25000'),
(3, 'Music Concert', 'Platinum', '30000');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(20) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `services` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `pname`, `services`) VALUES
(1, 'Silver', 'Decoration'),
(2, 'Silver', 'Chairs & sofa'),
(3, 'Silver', 'Lighting'),
(4, 'Silver', 'Sound System'),
(5, 'Silver', 'Manager(2) & Staff(10)'),
(6, 'Gold', 'Decoration'),
(7, 'Gold', 'Food'),
(8, 'Gold', 'Sound System & Host'),
(9, 'Gold', 'Photography'),
(10, 'Gold', 'Chairs & Sofa'),
(11, 'Gold', 'Firework & Lighting'),
(12, 'Gold', 'Manager(4) & Staff(15)'),
(13, 'Platinum', 'Decoration'),
(14, 'Platinum', 'Food'),
(15, 'Platinum', 'Sound System & Host'),
(16, 'Platinum', 'Photography & Selfie spot'),
(17, 'Platinum', 'Firework & Lighting'),
(18, 'Platinum', 'Children Playing area'),
(19, 'Platinum', 'Smoger'),
(21, 'Platinum', 'Manager(8) & Staff(25)');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `payment_id` varchar(30) NOT NULL,
  `added_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(6) NOT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phoneno` text DEFAULT NULL,
  `pwd` varchar(20) DEFAULT NULL,
  `bdate` date DEFAULT NULL,
  `city` varchar(25) DEFAULT NULL,
  `question` varchar(50) DEFAULT NULL,
  `ans` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fname`, `email`, `phoneno`, `pwd`, `bdate`, `city`, `question`, `ans`) VALUES
(12, 'kenil', 'kenillathiya2003@gmail.com', '9825952057', '12345', '2003-02-13', 'surat', 'What is your mothers maiden name?', 'nanubhai'),
(13, 'pratixa', 'pratixa@gmail.com', '8511000214', '123456', '2002-11-30', 'surat', 'What is your favorite color?', 'manju'),
(26, 'kenil', 'gopal@gmail.com', '9313449023', 'Knil@132', '2023-03-30', 'ahmedabad', 'What is your mothers maiden name?', 'nanubhai'),
(27, 'pratixa', 'pratixa1@gmail.com', '8511000214', 'Pratixa@130', '2002-11-30', 'surat', 'What is your favorite color?', 'bhaveshsir'),
(28, 'mittal', 'Mittal@gmail.com', '8789654778', 'Mittal@2002', '2023-03-29', 'bhavnagar', 'What is your mothers maiden name?', 'manju'),
(29, 'manisha', 'manisha@gmail.com', '7874051194', 'Manisha@81', '1981-01-03', 'palitana', 'What is your mothers maiden name?', 'nanubhai'),
(30, 'karan', 'karan@gmail.com', '7412563478', 'Kk@12345', '2020-02-20', 'jakatnaka', 'What is your mothers maiden name?', 'sonda sir'),
(31, 'gautam', 'gautam@gmail.com', '7698366864', 'Gautam@2009', '2002-09-20', 'surat', 'What is your favorite god?', 'hanumandada');

-- --------------------------------------------------------

--
-- Table structure for table `try`
--

CREATE TABLE `try` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `try`
--

INSERT INTO `try` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'kenillathiya2003@gmail.com', '123456123'),
(2, '', '', ''),
(3, '', '', ''),
(4, '', '', ''),
(5, '', '', ''),
(6, '', '', ''),
(7, '', '', ''),
(8, '', '', ''),
(9, '', '', ''),
(10, '', '', ''),
(11, 'admin', 'gautam@gmail.com', '11111111'),
(12, 'admin', 'gautam@gmail.com', '11111111'),
(13, 'admin', 'pratixa@gmail.com', '11111111');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `customerid` int(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneno` bigint(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `bdate` date NOT NULL,
  `city` varchar(100) NOT NULL,
  `question` varchar(100) NOT NULL,
  `ans` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`customerid`, `fname`, `email`, `phoneno`, `pwd`, `bdate`, `city`, `question`, `ans`) VALUES
(1, 'kenil', 'kenil@gmail.com', 9313449023, '12345', '2003-02-13', 'surat', 'what is your favourite food ? ', 'coco'),
(2, 'pratixa', 'pratixa@gmail.com', 8469155780, '123', '2023-03-22', 'bhavnagar', 'what is mothers middel name  ?', 'nanubhai');

-- --------------------------------------------------------

--
-- Table structure for table `wed`
--

CREATE TABLE `wed` (
  `id` int(20) NOT NULL,
  `ename` varchar(20) NOT NULL,
  `package` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wed`
--

INSERT INTO `wed` (`id`, `ename`, `package`, `price`) VALUES
(1, 'Wedding', 'Silver', '200000'),
(2, 'Wedding', 'Gold', '300000'),
(3, 'Wedding', 'Platinum', '500000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_event`
--
ALTER TABLE `custom_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventname`
--
ALTER TABLE `eventname`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `try`
--
ALTER TABLE `try`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`customerid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `custom_event`
--
ALTER TABLE `custom_event`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `try`
--
ALTER TABLE `try`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `customerid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
