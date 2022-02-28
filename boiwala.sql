-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2021 at 05:21 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boiwala`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `ID` int(11) NOT NULL,
  `donor_Name` varchar(255) NOT NULL,
  `donor_mail` varchar(255) NOT NULL,
  `donor_phone` text NOT NULL,
  `donor_area` varchar(255) NOT NULL,
  `access_title` varchar(255) NOT NULL,
  `access_details` varchar(1000) NOT NULL,
  `category` int(11) NOT NULL,
  `price` text NOT NULL DEFAULT '\'\\\'বিনামূল্যে\\\'\'',
  `accessories_pic` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accessories`
--

INSERT INTO `accessories` (`ID`, `donor_Name`, `donor_mail`, `donor_phone`, `donor_area`, `access_title`, `access_details`, `category`, `price`, `accessories_pic`, `status`) VALUES
(2222, 'Jahedul Karim', 'jahedulkarim20@gmail.com', '01687537246', '1204', 'Matador Hi-School Colors Ball Pen - 5 Color (5 Pcs)', 'nahuidshuiahd7hJNDNJADHUHWYUGWEYAGDBDAHJGHAUSBDNBQWYUASHDJHASUIDYUADJSUYASGUEWHFYUHUYSAIHIHYWQER', 0, 'বিনামূল্যে', 'access3.jfif', 1),
(2223, 'Jahedul Karim', 'jahedulkarim20@gmail.com', '01687537246', '1204', 'Matador i-teen Geometry Box', 'nahuidshuiahd7hJNDNJADHUHWYUGWEYAGDBDAHJGHAUSBDNBQWYUASHDJHASUIDYUADJSUYASGUEWHFYUHUYSAIHIHYWQER', 0, 'বিনামূল্যে', '1570375583G116A.png', 1),
(2224, 'mushi15', 'MushfiqMahin15@gmail.com', '01638537246', '1204', 'Casio FC-200V', 'jhduihaaaaaaaaaaaaaaaaaaaaiwufyhhewruiudjishfhsajkdhnakhdsuihasdhsdhiuqw', 1101, 'বিনামূল্যে', '56990_access1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_phone` varchar(11) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_phone`, `pwd`, `role`, `avatar`) VALUES
(1, 'mushfiq', 'mushfiqmahin15@gmail.com', '01687536247', '7c222fb2927d828af22f592134e8932480637c0d', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `all_posts`
--

CREATE TABLE `all_posts` (
  `post_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `posted_by` varchar(255) NOT NULL,
  `price` int(4) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `all_posts`
--

INSERT INTO `all_posts` (`post_id`, `item_name`, `category`, `posted_by`, `price`, `status`) VALUES
(2, 'Harry Potter & The Cursed Child', '1102', 'mushi15', 350, 0);

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `area_id` int(11) NOT NULL,
  `area_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`area_id`, `area_name`) VALUES
(1201, 'আন্দরকিল্লা'),
(1202, 'আগ্রাবাদ'),
(1203, 'বাকলিয়া'),
(1204, 'বহদ্দারহাট'),
(1205, 'চকবাজার'),
(1206, 'কোতোয়ালি'),
(1207, 'নাসিরাবাদ'),
(1208, 'হালিশহর'),
(1209, 'চাঁদগাঁও'),
(1210, 'মুরাদপুর'),
(1211, 'খুলশী'),
(1212, 'নিউমার্কেট');

-- --------------------------------------------------------

--
-- Table structure for table `book_exchange`
--

CREATE TABLE `book_exchange` (
  `ID` int(11) NOT NULL,
  `exchanger_Name` varchar(255) NOT NULL,
  `exchanger_mail` varchar(255) NOT NULL,
  `exchanger_phone` text NOT NULL,
  `exchanger_area` varchar(255) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `book_desc` varchar(1500) NOT NULL,
  `authorName` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `book_img1` text NOT NULL,
  `book_img2` text NOT NULL,
  `book_img3` text NOT NULL,
  `Tag` text NOT NULL DEFAULT 'শুধুমাত্র বিনিময়',
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_exchange`
--

INSERT INTO `book_exchange` (`ID`, `exchanger_Name`, `exchanger_mail`, `exchanger_phone`, `exchanger_area`, `book_title`, `book_desc`, `authorName`, `category`, `book_img1`, `book_img2`, `book_img3`, `Tag`, `status`) VALUES
(2, 'Farhan Khan', 'farhan328@gmail.com', '01970223567', '1205', 'War and Peace', '', ' Leo Tolstoy', '1102', '', '', '', 'শুধুমাত্র বিনিময়', 1),
(3, 'Farhan Khan', 'farhan328@gmail.com', '01970223567', '1205', 'ডার্ক ম্যাটার (', '', 'ব্লেইক ক্রাউচ ,  সালমান হক (অনুবাদক)', '1102', '0ceee7e08_206786.jpg', '', '', 'শুধুমাত্র বিনিময়', 1),
(4, 'Farhan Khan', 'farhan328@gmail.com', '01970223567', '1205', 'War and Peace', 'hduyhgauisdhuayshdddddddddddddyhdhsauuuuuuuuuuuuuuuuuuughywd76yyuashidugggggggggggg', ' Leo Tolstoy', '1102', 'exchange2.png', '', '', 'শুধুমাত্র বিনিময়', 1),
(5, 'farhan328', 'MushfiqMahin15@gmail.com', '01638537246', '1205', 'পাঁচ চিলতে ইউরোপ', 'In Search of Lost Time follows the narrator\'s recollections of childhood and experiences into adulthood in the late 19th century and early 20th century high society France, while reflecting on the loss of time and lack of meaning in the world. The no', ' মাহফুজুর রহমান', '1102', 'exchange1.png', '57514_book2.jpg', '5126_book3.jpg', 'শুধুমাত্র বিনিময়', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1101, 'শিক্ষা'),
(1102, 'উপন্যাস'),
(1103, 'কল্পকাহিনী'),
(1104, 'রাজনীতি'),
(1105, 'ইসলাম'),
(1106, 'কল্পবিজ্ঞান'),
(1107, 'ধর্ম'),
(1108, 'প্রোগ্রামিং'),
(1109, 'প্রকৌশল'),
(1110, 'ইতিহাস'),
(1111, 'মুক্তিযুদ্ধ');

-- --------------------------------------------------------

--
-- Table structure for table `gift`
--

CREATE TABLE `gift` (
  `ID` int(11) NOT NULL,
  `item_posted_by` varchar(255) NOT NULL,
  `donor_mail` varchar(255) NOT NULL,
  `donor_phone` text NOT NULL,
  `donor_area` varchar(255) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `authorName` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `book_img` text NOT NULL,
  `book_desc` varchar(300) NOT NULL,
  `price` text NOT NULL DEFAULT '\'বিনামূল্যে\'',
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gift`
--

INSERT INTO `gift` (`ID`, `item_posted_by`, `donor_mail`, `donor_phone`, `donor_area`, `book_title`, `authorName`, `category`, `book_img`, `book_desc`, `price`, `status`) VALUES
(2, 'Mushfiq Mahin', 'mushfiqmahin15@gmail.com', '01798537246', '1206', 'ঘরে বসে আয় করুন ', 'জয়িতা ব্যানার্জী ', 0, 'gift2.jfif', 'guydaguisaoidusaurijiodjfosujsaojaousdjojkoifdjiojsajoi', 'বিনামূল্যে', 1),
(3, 'Mushfiq Mahin', 'mushfiqmahin15@gmail.com', '01798537246', '1206', 'বিসিএস প্রিলিমিনারী অ্যানালাইসিস', 'গাজী মিজানুর রহমান', 0, 'IMG_ORG_1584023005213.jpeg', 'guydaguisaoidusaurijiodjfosujsaojaousdjojkoifdjiojsajoi', 'বিনামূল্যে', 1),
(4, 'Mushfiq Mahin', 'mushfiqmahin15@gmail.com', '01798537246', '1206', 'ইসলামী গল্প সিরিজ-১ ', ' মাওলানা মুহাম্মদ ইলিয়াছ (সম্পাদক)', 0, 'gift1.jfif', 'guydaguisaoidusaurijiodjfosujsaojaousdjojkoifdjiojsajoi', 'বিনামূল্যে', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `paid_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `fname`, `lname`, `username`, `email`, `phone`, `pwd`, `area`, `gender`, `paid_status`) VALUES
(0, 'Farhan ', 'Rahman', 'farhan328', 'farhan328@gmail.com', '01354762345', '7c222fb2927d828af22f592134e8932480637c0d', 'Chawkbazar', 'male', 0);

-- --------------------------------------------------------

--
-- Table structure for table `resell`
--

CREATE TABLE `resell` (
  `ID` int(11) NOT NULL,
  `reseller_userName` varchar(15) NOT NULL,
  `reseller_mail` varchar(255) NOT NULL,
  `reseller_phone` varchar(11) NOT NULL,
  `reseller_area` text NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `authorName` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `book_desc` varchar(1000) NOT NULL,
  `book_img1` text NOT NULL,
  `book_img2` text NOT NULL,
  `book_img3` text NOT NULL,
  `price` varchar(4) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resell`
--

INSERT INTO `resell` (`ID`, `reseller_userName`, `reseller_mail`, `reseller_phone`, `reseller_area`, `book_title`, `authorName`, `category`, `book_desc`, `book_img1`, `book_img2`, `book_img3`, `price`, `status`) VALUES
(1111, 'mushfiq15', 'mushfiqmahin15@gmail.com', '01768537246', '1201', 'দেবদাস', 'শরৎচন্দ্র চট্টোপাধ্যায় ', 1101, 'দেবদাস শরৎচন্দ্র চট্টোপাধ্যায় রচিত একটি প্রণয়ধর্মী বাংলা উপন্যাস। দেবদাস শরৎচন্দ্রের প্রথমদিককার উপন্যাস। রচনার সমাপ্তিকাল সেপ্টেম্বর ১৯০০, কিন্তু প্রকাশনার বছর ১৯১৭। উপন্যাসটি নিয়ে শরৎচন্দ্রের দ্বিধা ছিল বলে দীর্ঘ ১৭ বছর প্রকাশ করা থেকে বিরত ছিলেন।', '308652.png', '', '', '350', 1),
(1112, 'mushi15', 'MushfiqMahin15@gmail.com', '01638537246', '1205', 'শেষের কবিতা', 'রবীন্দ্রনাথ ঠাকুর', 1102, 'অমিত বললে, \'একদিন আমার সমস্ত ডানা মেলে পেয়েছিলুম আমার ওড়ার আকাশ; আজ আমি পেয়েছি আমার ছোট্টো বাসা, ডানা গুটিয়ে বসেছি। কিন্তু আমার আকাশও রইল।\'', '310271.png', '12197_book2.jpg', '96206_book3.jpg', '200', 1),
(1113, 'mushi15', 'MushfiqMahin15@gmail.com', '01638537246', '1205', '৫২টি প্রোগ্রামিং সমস্যা ও সমাধান', 'তামিম শাহরিয়ার সুবিন ,  তাহমিদ রাফি ,  তামান্না নিশাত রিনি', 1108, 'দক্ষ প্রোগ্রামার হওয়ার সহজ উপায় হচ্ছে প্রোগ্রামিং সমস্যা সমাধানের চর্চা করা। তাই যারা নতুন প্রোগ্রামিং শিখছে, তাদের জন্য উপযোগি করে ৫২টি প্রোগ্রামিং সমস্যা দেওয়া হয়েছে এবং সেগুলোর সমাধান নিয়ে আলোচনা করা হয়েছে। সমাধান দেখানোর সময় সি প্রোগ্রামিং ভাষা ব্যবহার করা হয়েছে। যারা ভবিষ্যতে বিভিন্ন প্রোগ্রামিং প্রতিযোগিতায় অংশ নিতে চায় – যেমন জাতীয় হাই স্কুল প্রোগ্রামিং প্রতিযোগিতা, ইনফরমেটিক্স অলিম্পিয়াড, এসিএম আইসিপিসি, তারা প্রোগ্রামিং সমস্যা সমাধানের চর্চা এই বই দিয়েই শুরু করতে পারে। এছাড়া বইটি প্রোগ্রামিংয়ের জগতে নতুন যে কারো জন্য উপযোগী হবে।', 'resell1.png', 'pro2.jfif', '96206_book3.jpg', '200', 1),
(11114, 'mushfiq', 'mushfiqmahin15@gmail.com', '01813469870', ' 1203', 'পথের পাঁচালী', 'বিভূতিভূষণ বন্দ্যোপাধ্যায় ', 1102, 'সমগ্র উপন্যাসটি তিনটি খণ্ড ও মোট পঁয়ত্রিশটি পরিচ্ছেদে বিভক্ত। খণ্ড তিনটি যথাক্রমে বল্লালী বালাই (পরিচ্ছেদ ১-৬; ইন্দির ঠাকরূনের বর্ণনা দেওয়া হয়েছে), আম-আঁটির ভেঁপু (পরিচ্ছেদ ৭-২৯; অপু-দুর্গার একসাথে বেড়ে ওঠা, চঞ্চল শৈশব, দুর্গার মৃত্যু, অপুর সপরিব', '58176_পথের পাঁচালী.png', '77744_book3.jpg', '92701_book2.jpg', '350', 1);

-- --------------------------------------------------------

--
-- Table structure for table `writer`
--

CREATE TABLE `writer` (
  `writer_id` int(11) NOT NULL,
  `writer_name` varchar(255) NOT NULL,
  `writer_details` varchar(255) NOT NULL,
  `writer_pic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `writer`
--

INSERT INTO `writer` (`writer_id`, `writer_name`, `writer_details`, `writer_pic`) VALUES
(1, 'কাজী নজরুল ইসলাম', 'কাজী নজরুল ইসলাম (২৪ মে[১] ১৮৯৯ – ২৯ আগস্ট ১৯৭৬; ১১ জ্যৈষ্ঠ ১৩০৬ – ১২ ভাদ্র ১৩৮৩ বঙ্গাব্দ) বিংশ শতাব্দীর প্রধান বাঙ্গালী কবি ও সঙ্গীতকার। তার মাত্র ২৩ বৎসরের সাহিত্যিক জীবনে সৃষ্টির যে প্রাচুর্য তা তুলনারহিত। সাহিত্যের নানা শাখায় বিচরণ করলেও তার প্রধান প', 'kazi.jpg'),
(2, 'রবীন্দ্রনাথ ঠাকুর', 'রবীন্দ্রনাথ ঠাকুর এফআরএএস (৭ মে ১৮৬১ - ৭ আগস্ট ১৯৪১; ২৫ বৈশাখ ১২৬৮ - ২২ শ্রাবণ ১৩৪৮ বঙ্গাব্দ)[১] ছিলেন অগ্রণী বাঙালি কবি, ঔপন্যাসিক, সংগীতস্রষ্টা, নাট্যকার, চিত্রকর, ছোটগল্পকার, প্রাবন্ধিক, অভিনেতা, কণ্ঠশিল্পী ও দার্শনিক।[২] তাকে বাংলা ভাষার সর্বশ্রেষ্ঠ স', 'Rabindranath-Tagore.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `all_posts`
--
ALTER TABLE `all_posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `book_exchange`
--
ALTER TABLE `book_exchange`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `gift`
--
ALTER TABLE `gift`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `resell`
--
ALTER TABLE `resell`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `writer`
--
ALTER TABLE `writer`
  ADD PRIMARY KEY (`writer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories`
--
ALTER TABLE `accessories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2226;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `all_posts`
--
ALTER TABLE `all_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1213;

--
-- AUTO_INCREMENT for table `book_exchange`
--
ALTER TABLE `book_exchange`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1112;

--
-- AUTO_INCREMENT for table `gift`
--
ALTER TABLE `gift`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `resell`
--
ALTER TABLE `resell`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11115;

--
-- AUTO_INCREMENT for table `writer`
--
ALTER TABLE `writer`
  MODIFY `writer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
