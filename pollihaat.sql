-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2022 at 12:16 AM
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
-- Database: `pollihaat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `gmail` varchar(65) NOT NULL,
  `mobile` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`username`, `password`, `role`, `gmail`, `mobile`) VALUES
('nitu', '123', 0, 'nitu@gmail.com', '01882428980'),
('অনুপা', '123', 1, 'anupa@gmail.com', '01712324980'),
('আরমান', '123', 1, 'arman@gmail.com', '01882324980'),
('নকশী', '123', 1, 'nokshi@gmail.com', '01882326098'),
('মিতু', '123', 1, 'marjan12@gmail.com', '018820895370');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(8) NOT NULL,
  `customerId` int(8) NOT NULL,
  `pid` int(8) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `image` varchar(1000) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`image`, `name`) VALUES
('66045141-khelna.jpg', 'গৃহসজ্জা সরঞ্জাম'),
('72187779-tulorputul.jpg', 'ছোটদের খেলনা সামগ্রী'),
('75610463-4.jpg', 'বাঁশের তৈরি সামগ্রী'),
('75730838-misti.jpg', 'বাঙালি ভোজ'),
('25961623-bet.jpg', 'বেতের তৈরি সামগ্রী'),
('52558823-19121315-24336369-oshin-khandelwal-EQpXnijYejQ-unsplash.jpg', 'মৃৎশিল্প'),
('55970400-tftf.jpg', 'শাড়ি সমগ্র'),
('86341076-Haakpatroon Dromenvanger voor Beginners- Diagram en Werkbeschrijving.jpg', 'শৌখিন সামগ্রী'),
('61176025-golarhar.jpg', 'হাতে তৈরি গহনা');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `added_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES
(20, 'মিতু', 'marjanmitu12@gmail.com', '01880895270', 'নতুন নতুন ক্যাটাগরি গুলো আরও দেখতে চাই ।', '2022-09-20'),
(21, 'ফারিহা', 'fariha@gmail.com', '019878276376', 'আপনাদের সাইটটি যথেষ্ট সময় উপযোগী ।', '2022-09-20'),
(23, 'আলিফ', 'alif@gmail.com', '01728277368', 'পল্লীহাটের পণ্য আমাদের জন্য সব সময়ই বিশ্বাসযোগ্য , ধন্যবাদ পল্লীহাট ।', '2022-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(12) NOT NULL,
  `customerName` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `isVerified` int(8) NOT NULL,
  `vCode` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customerName`, `email`, `phone`, `password`, `isVerified`, `vCode`) VALUES
(38, 'nitu', 'sanzidasultana822@gmail.com', '01880895277', '123', 1, '0ffff14f1efbb842'),
(39, 'ফারিহা', 'fariha@gmail.com', '01456798231', '123', 1, '924a1fe0a0bc40b5'),
(41, 'আয়েশা', 'ayesha2514@student.nstu.edu.bd', '01880895279', '123', 1, 'befbf19e333ce0cd'),
(42, 'nuruzzaman sir', 'nuruzzaman.iit@nstu.edu.bd', '018211111111', '123', 1, 'a034d619a0d67e5e'),
(43, 'mitu', 'marjanmitu12@gmail.com', '01882323987', '234', 1, '769796b349720e56');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `orderId` int(8) NOT NULL,
  `customerId` int(8) NOT NULL,
  `placedOn` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `isReceived` tinyint(1) NOT NULL,
  `isDelivered` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`orderId`, `customerId`, `placedOn`, `isReceived`, `isDelivered`) VALUES
(108, 42, '2022-09-22 00:24:58', 1, 1),
(114, 38, '2022-09-22 00:59:23', 1, 0),
(115, 38, '2022-09-22 00:57:58', 0, 0),
(116, 38, '2022-09-22 01:00:22', 1, 1),
(117, 41, '2022-09-22 01:06:48', 1, 1),
(118, 41, '2022-09-22 01:06:19', 1, 1),
(119, 43, '2022-09-22 03:27:46', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `detailsId` int(8) NOT NULL,
  `orderId` int(8) NOT NULL,
  `productsId` int(8) NOT NULL,
  `orderedQuantity` int(8) NOT NULL,
  `productsPrice` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`detailsId`, `orderId`, `productsId`, `orderedQuantity`, `productsPrice`) VALUES
(153, 108, 188, 10, 6700),
(154, 108, 187, 1, 690),
(164, 114, 173, 1, 400),
(165, 114, 141, 1, 560),
(166, 115, 132, 1, 360),
(167, 115, 181, 1, 390),
(168, 115, 191, 1, 900),
(169, 116, 161, 1, 5600),
(170, 117, 159, 1, 1700),
(171, 117, 161, 2, 11200),
(172, 118, 146, 1, 230),
(173, 118, 197, 1, 250),
(174, 119, 176, 4, 800);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `quantity` varchar(11) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(256) NOT NULL,
  `entrepreneurName` varchar(256) NOT NULL,
  `category` varchar(256) NOT NULL,
  `productType` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `quantity`, `description`, `price`, `entrepreneurName`, `category`, `productType`) VALUES
(129, 'কুশন', '16429585-4mandalacushion.jpg', '300', 'টেকসই ও মজবুত বুননে তৈরি আমার এই কুশন গুলো আশা করি সকল ক্রেতার পছন্দসই হবে।', '150', 'মিতু', 'গৃহসজ্জা সরঞ্জাম', 'টি'),
(130, 'বাচ্চাদের টুপি', '50029038-বাচ্চাদের টুপি.jpg', '500', 'হাতে তৈরি এই টুপিগুলো বাচ্চাদের জন্য যথেষ্ট যুগোপযোগী আশা করি সকলের পছন্দ হবে|', '80', 'মিতু', 'ছোটদের খেলনা সামগ্রী', 'টি'),
(131, 'ঝুড়ি', '22541908-ঝুড়ি.jpg', '400', 'বাঁশের তৈরি পণ্য বাঙালির ঐতিহ্যের বাহক, আশা করবো নিত্য প্রয়োজনীয় এই বাঁশের তৈরি ঝুড়িটি আপনাদের পছন্দ হবে।', '260', 'মিতু', 'বাঁশের তৈরি সামগ্রী', 'টি'),
(132, 'সন্দেশ', '63779189-An unexpected call.jpg', '29', 'দারুণ স্বাদের এই সন্দেশ গুলো এক বার খাবেন তো এর স্বাদ মুখে লেগে থাকবে।', '360', 'মিতু', 'বাঙালি ভোজ', 'কে. জি'),
(133, 'বেতের ঝুড়ি', '91006429-12_x6_ Bun Tray _ sweetbrier.jpg', '400', 'বেতের সামগ্রী বাংলার গ্রামীণ পল্লীর অন্যতম পেশা, এতে তৈরি পণ্য এখন আপনার দোর গোড়ায় পৌঁছে দিতে সর্দা প্রস্তুত আছি আমরা।', '160', 'মিতু', 'বেতের তৈরি সামগ্রী', 'টি'),
(134, 'পটারি', '24416812-পটারি.jpg', '600', 'মাটির তৈরি পণ্য যেনো প্রকৃতির নিদর্শন। যেকোনো সময় আপনার দ্বারপ্রান্তে হাজির করতে আছি এখন আমি।', '260', 'মিতু', 'মৃৎশিল্প', 'টি'),
(135, 'শাড়ি', '38251097-Sharee.jpg', '56', 'শাড়িতে নারী, হাতে তৈরি শাড়ি যেকোরো নজর কাড়তে বাধ্য, যেকোনো সময় অর্ডার করুন আমার পণ্য।', '1200', 'মিতু', 'শাড়ি সমগ্র', 'টি'),
(136, 'ঝুলোন', '66888305-shokh.jpg', '800', 'শৌখিনতা বাঙালির রন্ধ্রে রন্ধ্রে। এই সকম পণ্য নিয়ে হাজির হয়েছি আমি আপনাদের দ্বারপ্রান্তে।শৌখিন সামগ্রি দেয়ালিকা,টেবিল ম্যাট,শো পিচ তৈরি করি আমি।', '400', 'মিতু', 'শৌখিন সামগ্রী', 'টি'),
(137, 'গলার হার', '43037760-golarhar.jpg', '456', 'গহনা নারীর সৌন্দর্য বৃদ্ধিতে অন্যতম ভূমিকা রাখে। যেকোনো সময় গহনার প্রয়োজনে আমাকে স্মরণে রাখবেন।', '700', 'মিতু', 'হাতে তৈরি গহনা', 'টি'),
(138, 'আয়না', '50746595-a.jpg', '550', 'আয়না দেখতে কে না ভালোবাসে, আর তা যদি হয় ঝিনুকের কারুকার্য সম্পন্ন তাহলেতো কথাই নেই। এমন সব পণ্য নিয়ে হাজির হয়েছি আমি।', '700', 'আরমান', 'গৃহসজ্জা সরঞ্জাম', 'টি'),
(139, 'চটের পুতুল', '78815069-kkjn.jpg', '700', 'হাতের কারুকার্য সম্পন্ন চটের পুতুল নিয়ে হাজির হয়েছি আমি।', '440', 'আরমান', 'ছোটদের খেলনা সামগ্রী', 'টি'),
(140, 'বাঁশের ফুলদানি', '22747969-uhuhu.jpg', '440', 'বাঁশের ফুলদানি ঘরের সৌন্দর্য বৃদ্ধিতে অতুলনীয় ।', '300', 'আরমান', 'বাঁশের তৈরি সামগ্রী', 'টি'),
(141, 'বোরফি', '24493131-Makbouseh.jpg', '699', 'রোজা, রমজানে সকলের পছন্দের খাবার বোরফি নিয়ে হাজির হয়েছি আমি।', '560', 'আরমান', 'বাঙালি ভোজ', 'টি'),
(142, 'চটের ব্যাগ', '27896474-a.jpg', '440', 'প্রাকৃতিক পণ্য চট দিয়ে তৈরি ব্যাগ নিয়ে হাজির হয়েছি আমি।', '320', 'আরমান', 'বেতের তৈরি সামগ্রী', 'টি'),
(143, 'মাটির ফুলদানি', '53231467-uuyuyuy.jpg', '450', 'মাটির তৈরি পণ্য যেনো প্রকৃতির নিদর্শন। যেকোনো সময় আপনার দ্বারপ্রান্তে হাজির করতে আছি এখন আমি।', '400', 'আরমান', 'মৃৎশিল্প', 'টি'),
(144, 'জামদানি শাড়ি', '69910614-iioi.jpg', '450', 'শাড়িতে নারী, হাতে তৈরি শাড়ি যেকোরো নজর কাড়তে বাধ্য, যেকোনো সময় অর্ডার করুন আমার পণ্য।', '2000', 'আরমান', 'শাড়ি সমগ্র', 'টি'),
(145, 'ওয়ালমেট', '50514337-a.jpg', '500', 'শৌখিনতা বাঙালির রন্ধ্রে রন্ধ্রে। এই সকম পণ্য নিয়ে হাজির হয়েছি আমি আপনাদের দ্বারপ্রান্তে।শৌখিন সামগ্রি ওয়ালমেট  দেয়ালিকা,টেবিল ম্যাট,শো পিচ তৈরি করি আমি।', '530', 'আরমান', 'শৌখিন সামগ্রী', 'টি'),
(146, 'কানের দুল', '31065314-4996570c-c981-4197-849c-990e15ff56a1.jpg', '699', 'গহনা নারীর সৌন্দর্য বৃদ্ধিতে অন্যতম ভূমিকা রাখে। যেকোনো সময় গহনার প্রয়োজনে আমাকে স্মরণে রাখবেন।', '230', 'আরমান', 'হাতে তৈরি গহনা', 'টি'),
(147, 'শো পিচ', '12890260-dfd.jpg', '500', 'শৌখিনতা বাঙালির রন্ধ্রে রন্ধ্রে। এই সকম পণ্য নিয়ে হাজির হয়েছি আমি আপনাদের দ্বারপ্রান্তে।', '400', 'আরমান', 'গৃহসজ্জা সরঞ্জাম', 'টি'),
(148, 'পুতুল', '54002189-kkppp.jpg', '500', 'বাচ্চাদের জন্য হাতে তৈরি খেলনার জুড়ি নেই। দারুণ সব খেলনা পেতে আমাকে স্মরণ করুন।', '230', 'আরমান', 'ছোটদের খেলনা সামগ্রী', 'টি'),
(149, 'বাশের ঝুড়ি', '82779366-pexels-teona-swift-6850730.jpg', '500', 'বাঁশের তৈরি পণ্য বাঙালির ঐতিহ্যের বাহক, আশা করবো নিত্য প্রয়োজনীয় এই বাঁশের তৈরি ঝুড়িটি আপনাদের পছন্দ হবে।', '300', 'আরমান', 'বাঁশের তৈরি সামগ্রী', 'টি'),
(150, 'বেতের ঝুড়ি', '36800236-Nantucket Baskets_.jpg', '1200', 'বেতের সামগ্রী বাংলার গ্রামীণ পল্লীর অন্যতম পেশা, এতে তৈরি পণ্য এখন আপনার দোর গোড়ায় পৌঁছে দিতে সর্দা প্রস্তুত আছি আমরা।', '400', 'আরমান', 'বেতের তৈরি সামগ্রী', 'টি'),
(151, 'চুড়ি', '96991751-mnmnmn.jpg', '1700', 'গহনা নারীর সৌন্দর্য বৃদ্ধিতে অন্যতম ভূমিকা রাখে। যেকোনো সময় গহনার প্রয়োজনে আমাকে স্মরণে রাখবেন।', '270', 'আরমান', 'হাতে তৈরি গহনা', 'টি'),
(152, 'টেবিল ম্যাট', '68042961-460 Ideias De Sousplat Em 2021 _ Sousplat, Sousplat Croche.jpg', '6000', 'শৌখিনতা বাঙালির রন্ধ্রে রন্ধ্রে। এই সকম পণ্য নিয়ে হাজির হয়েছি আমি আপনাদের দ্বারপ্রান্তে।', '300', 'নকশী', 'গৃহসজ্জা সরঞ্জাম', 'টি'),
(153, 'কাপড়ের পুতুল', '31803634-tulorputul.jpg', '6000', 'বাচ্চাদের জন্য হাতে তৈরি খেলনার জুড়ি নেই। দারুণ সব খেলনা পেতে আমাকে স্মরণ করুন।', '400', 'নকশী', 'ছোটদের খেলনা সামগ্রী', 'টি'),
(154, 'মাটির খেলনা', '95686794-download (26).jpg', '8000', 'বাচ্চাদের জন্য হাতে তৈরি খেলনার জুড়ি নেই। দারুণ সব খেলনা পেতে আমাকে স্মরণ করুন।', '470', 'নকশী', 'ছোটদের খেলনা সামগ্রী', 'টি'),
(155, 'চালনি', '75543682-bamboo food cover, West Java.jpg', '7000', 'বাঁশের তৈরি পণ্য বাঙালির ঐতিহ্যের বাহক, আশা করবো নিত্য প্রয়োজনীয় এই বাঁশের তৈরি ঝুড়িটি আপনাদের পছন্দ হবে।', '230', 'নকশী', 'বাঁশের তৈরি সামগ্রী', 'টি'),
(156, 'নকশী পিঠা', '96041558-download (1).jpg', '7000', 'দারুণ স্বাদের এই পিঠা গুলো এক বার খাবেন তো এর স্বাদ মুখে লেগে থাকবে।', '60', 'নকশী', 'বাঙালি ভোজ', 'টি'),
(157, 'বেতের কৌটা', '93892835-Handmade Rattan Weave Storage Basket Sundries Container - Etsy India.jpg', '6000', 'বেতের সামগ্রী বাংলার গ্রামীণ পল্লীর অন্যতম পেশা, এতে তৈরি পণ্য এখন আপনার দোর গোড়ায় পৌঁছে দিতে সর্দা প্রস্তুত আছি আমরা।', '400', 'নকশী', 'বেতের তৈরি সামগ্রী', 'টি'),
(158, 'কানের দুল', '54461970-Craft-o-Rama.jpg', '6000', 'কানের দুল মেয়েদের গহনার মধ্যে অন্যতম। দারুণ সব কানের দুল পাবেন আমার কাছে', '230', 'নকশী', 'হাতে তৈরি গহনা', 'টি'),
(159, 'চটের ঝুলন', '33388128-Designer Spotlight_ Handy Knit & Crochet Accessories For the Home.png', '3399', 'শৌখিনতা বাঙালির রন্ধ্রে রন্ধ্রে। এই সকম পণ্য নিয়ে হাজির হয়েছি আমি আপনাদের দ্বারপ্রান্তে।শৌখিন সামগ্রি ওয়ালমেট ,ঝুলোন দেয়ালিকা,টেবিল ম্যাট,শো পিচ তৈরি করি আমি।', '1700', 'নকশী', 'শৌখিন সামগ্রী', 'টি'),
(160, 'সন্দেশ', '65274652-Celebrate Diwali with the best Indian sweets, and learn to make them too.jpg', '400', 'রোজা, রমজানে সকলের পছন্দের সন্দেশ খাবার নিয়ে হাজির হয়েছি আমি নকশী।', '560', 'নকশী', 'বাঙালি ভোজ', 'কে. জি'),
(161, 'সুতি জামদানি শাড়ি', '24605293-download (8).jpg', '497', 'শাড়িতে নারী, হাতে তৈরি শাড়ি যেকোরো নজর কাড়তে বাধ্য, যেকোনো সময় অর্ডার করুন আমার পণ্য।', '5600', 'নকশী', 'শাড়ি সমগ্র', 'টি'),
(162, 'গয়নার সেট', '46217719-download (46).jpg', '1199', 'গহনা নারীর সৌন্দর্য বৃদ্ধিতে অন্যতম ভূমিকা রাখে। যেকোনো সময় গহনার প্রয়োজনে আমাকে স্মরণে রাখবেন।গহনা নিয়ে হাজির হয়েছি আমি উদ্দ্যোক্তা অনুপা', '700', 'অনুপা', 'হাতে তৈরি গহনা', 'টি'),
(163, 'তিলের মিষ্টি', '91197347-misti2.jpg', '700', 'রোজা, রমজানে সকলের পছন্দের খাবার মিষ্টি নিয়ে হাজির হয়েছি আমি।', '560', 'অনুপা', 'বাঙালি ভোজ', 'কে. জি'),
(164, 'সুতির শাড়ি', '15890857-download (6).jpg', '300', 'শাড়িতে নারী, হাতে তৈরি শাড়ি যেকোরো নজর কাড়তে বাধ্য, যেকোনো সময় অর্ডার করুন আমার পণ্য।', '2500', 'অনুপা', 'শাড়ি সমগ্র', 'টি'),
(165, 'জামদানি শাড়ি', '91038916-jhjh.jpg', '3000', 'শাড়িতে নারী, হাতে তৈরি শাড়ি যেকোরো নজর কাড়তে বাধ্য, যেকোনো সময় অর্ডার করুন আমার পণ্য।', '4000', 'অনুপা', 'শাড়ি সমগ্র', 'টি'),
(166, 'কাঠের খেলনা', '85188727-kather.jpg', '2000', 'বাচ্চাদের জন্য হাতে তৈরি খেলনার জুড়ি নেই। দারুণ সব খেলনা পেতে আমাকে স্মরণ করুন।', '110', 'অনুপা', 'ছোটদের খেলনা সামগ্রী', 'টি'),
(167, 'মাটির মগ', '69078213-mmmdownload (26).jpg', '4000', 'মাটির তৈরি পণ্য যেনো প্রকৃতির নিদর্শন। যেকোনো সময় আপনার দ্বারপ্রান্তে হাজির করতে আছি এখন আমি।', '110', 'অনুপা', 'মৃৎশিল্প', 'টি'),
(168, 'শীতল পাটি', '23181639-sssssdownload.jpg', '1100', 'শৌখিনতা বাঙালির রন্ধ্রে রন্ধ্রে। এই সকম পণ্য নিয়ে হাজির হয়েছি আমি আপনাদের দ্বারপ্রান্তে।', '1200', 'অনুপা', 'শৌখিন সামগ্রী', 'টি'),
(169, 'পুতির মালা', '55546442-download.png', '999', 'গহনা নারীর সৌন্দর্য বৃদ্ধিতে অন্যতম ভূমিকা রাখে। যেকোনো সময় গহনার প্রয়োজনে আমাকে স্মরণে রাখবেন।', '340', 'অনুপা', 'হাতে তৈরি গহনা', 'টি'),
(171, 'চটের কৌটা', '46221318-Bohemian Homes.jpg', '1200', 'প্রাকৃতিক পণ্য চট দিয়ে তৈরি কৌটা নিয়ে হাজির হয়েছি আমি।', '300', 'আরমান', 'শৌখিন সামগ্রী', 'টি'),
(172, 'বাটিকের শাড়ি', '62291712-download (55).jpg', '300', 'শাড়িতে নারী, হাতে তৈরি শাড়ি যেকোরো নজর কাড়তে বাধ্য, যেকোনো সময় অর্ডার করুন আমার পণ্য।', '1500', 'আরমান', 'শাড়ি সমগ্র', 'টি'),
(173, 'মিষ্টি', '11639086-colourfulMishty.jpg', '599', 'রোজা, রমজানে সকলের পছন্দের খাবার মিষ্টি নিয়ে হাজির হয়েছি আমি।', '400', 'আরমান', 'বাঙালি ভোজ', 'কে. জি'),
(175, 'ঝুড়ি', '28090335-Giving an old basket a brand new look - From Evija with Love.jpg', '1000', 'বেতের সামগ্রী বাংলার গ্রামীণ পল্লীর অন্যতম পেশা, এতে তৈরি পণ্য এখন আপনার দোর গোড়ায় পৌঁছে দিতে সর্দা প্রস্তুত আছি আমরা।', '340', 'আরমান', 'বেতের তৈরি সামগ্রী', 'টি'),
(176, 'গলার হার', '68637650-download (43).jpg', '487', 'গহনা নারীর সৌন্দর্য বৃদ্ধিতে অন্যতম ভূমিকা রাখে। যেকোনো সময় গহনার প্রয়োজনে আমাকে স্মরণে রাখবেন।', '200', 'আরমান', 'হাতে তৈরি গহনা', 'টি'),
(177, 'চটের ঝুলন', '48558582-Haakpatroon Dromenvanger voor Beginners- Diagram en Werkbeschrijving.jpg', '1000', 'হাতের কারুকার্য সম্পন্ন চটের ঝুলন নিয়ে হাজির হয়েছি আমি।', '700', 'আরমান', 'শৌখিন সামগ্রী', 'টি'),
(178, 'শোপিচ', '74644182-ka.jpg', '1200', 'শৌখিনতা বাঙালির রন্ধ্রে রন্ধ্রে। এই সকম পণ্য নিয়ে হাজির হয়েছি আমি আপনাদের দ্বারপ্রান্তে।', '400', 'আরমান', 'গৃহসজ্জা সরঞ্জাম', 'টি'),
(179, 'হাড়ি', '48392111-uyuyuyy.jpg', '1200', 'মাটির তৈরি পণ্য যেনো প্রকৃতির নিদর্শন। যেকোনো সময় আপনার দ্বারপ্রান্তে হাজির করতে আছি এখন আমি।', '400', 'আরমান', 'মৃৎশিল্প', 'টি'),
(180, 'গলার হার', '77979701-goyna.jpg', '1200', 'গহনা নারীর সৌন্দর্য বৃদ্ধিতে অন্যতম ভূমিকা রাখে। যেকোনো সময় গহনার প্রয়োজনে আমাকে স্মরণে রাখবেন', '300', 'আরমান', 'হাতে তৈরি গহনা', 'টি'),
(181, 'ডিমের পিঠা', '96949888-dim.jpg', '1198', 'রোজা, রমজানে সকলের পছন্দের খাবার পিঠা নিয়ে হাজির হয়েছি আমি।', '390', 'মিতু', 'বাঙালি ভোজ', 'কে. জি'),
(182, 'বেতের মোড়া', '33946029-nmdownload.jpg', '1200', 'বেতের সামগ্রী বাংলার গ্রামীণ পল্লীর অন্যতম পেশা, এতে তৈরি পণ্য এখন আপনার দোর গোড়ায় পৌঁছে দিতে সর্দা প্রস্তুত আছি আমরা।', '400', 'মিতু', 'বেতের তৈরি সামগ্রী', 'টি'),
(183, 'বেতের চেয়ার', '75886218-chair.png', '1000', 'বেতের সামগ্রী বাংলার গ্রামীণ পল্লীর অন্যতম পেশা, এতে তৈরি পণ্য এখন আপনার দোর গোড়ায় পৌঁছে দিতে সর্দা প্রস্তুত আছি আমরা।', '600', 'মিতু', 'বেতের তৈরি সামগ্রী', 'টি'),
(184, 'মোড়া', '14749865-kls.jpg', '1200', 'বেতের সামগ্রী বাংলার গ্রামীণ পল্লীর অন্যতম পেশা, এতে তৈরি পণ্য এখন আপনার দোর গোড়ায় পৌঁছে দিতে সর্দা প্রস্তুত আছি আমরা।', '700', 'মিতু', 'বেতের তৈরি সামগ্রী', 'টি'),
(185, 'শোপিচ', '72343916-lll.jpg', '400', 'শৌখিনতা বাঙালির রন্ধ্রে রন্ধ্রে। এই সকম পণ্য নিয়ে হাজির হয়েছি আমি আপনাদের দ্বারপ্রান্তে।শৌখিন সামগ্রি দেয়ালিকা,টেবিল ম্যাট,শো পিচ তৈরি করি আমি।', '230', 'মিতু', 'গৃহসজ্জা সরঞ্জাম', 'টি'),
(186, 'দেয়ালিকা', '26297382-jh.jpg', '1200', 'শৌখিনতা বাঙালির রন্ধ্রে রন্ধ্রে। এই সকম পণ্য নিয়ে হাজির হয়েছি আমি আপনাদের দ্বারপ্রান্তে।', '400', 'মিতু', 'গৃহসজ্জা সরঞ্জাম', 'টি'),
(187, 'দেয়ালিকা', '58468711-php.jpg', '499', 'শৌখিনতা বাঙালির রন্ধ্রে রন্ধ্রে। এই সকম পণ্য নিয়ে হাজির হয়েছি আমি আপনাদের দ্বারপ্রান্তে।', '690', 'মিতু', 'গৃহসজ্জা সরঞ্জাম', 'টি'),
(188, 'শুটকি', '69546164-jhhj.jpg', '690', 'আমার নিজের বানানো শুটকি।আশা করি সকলের পছন্দ হবে', '670', 'মিতু', 'বাঙালি ভোজ', 'কে. জি'),
(189, 'শাড়ি', '47450627-yuyuy.jpg', '2000', 'শাড়িতে নারী, হাতে তৈরি শাড়ি যেকোরো নজর কাড়তে বাধ্য, যেকোনো সময় অর্ডার করুন আমার পণ্য।', '3000', 'মিতু', 'শাড়ি সমগ্র', 'টি'),
(190, 'শাড়ি', '22908817-Exclusive new hand block printed cotton suits.jpg', '70', 'শাড়িতে নারী, হাতে তৈরি শাড়ি যেকোরো নজর কাড়তে বাধ্য, যেকোনো সময় অর্ডার করুন আমার পণ্য।', '1900', 'নকশী', 'শাড়ি সমগ্র', 'টি'),
(191, 'দেয়ালিকা', '75478099-Colgante Mandalas y flores.jpg', '399', 'শৌখিনতা বাঙালির রন্ধ্রে রন্ধ্রে। এই সকম পণ্য নিয়ে হাজির হয়েছি আমি আপনাদের দ্বারপ্রান্তে।', '900', 'নকশী', 'শৌখিন সামগ্রী', 'টি'),
(192, 'টেবিল ম্যাট', '27354862-Free Crochet Tulip Basket Patterns.jpg', '1188', 'শৌখিনতা বাঙালির রন্ধ্রে রন্ধ্রে। এই সকম পণ্য নিয়ে হাজির হয়েছি আমি আপনাদের দ্বারপ্রান্তে।শৌখিন সামগ্রি দেয়ালিকা,টেবিল ম্যাট আমি তৈরি করি', '900', 'নকশী', 'শৌখিন সামগ্রী', 'টি'),
(193, 'কাঠের খেলনা', '21731733-khelna]download.jpg', '500', 'বাচ্চাদের জন্য হাতে তৈরি খেলনার জুড়ি নেই। দারুণ সব খেলনা পেতে আমাকে স্মরণ করুন।', '120', 'নকশী', 'ছোটদের খেলনা সামগ্রী', 'টি'),
(194, 'খেলনা বাটি', '97354147-pppdownload.jpg', '1000', 'বাচ্চাদের জন্য হাতে তৈরি খেলনার জুড়ি নেই। দারুণ সব খেলনা পেতে আমাকে স্মরণ করুন।', '90', 'নকশী', 'ছোটদের খেলনা সামগ্রী', 'টি'),
(195, 'মাটির কলসি', '78475530-images (1).jpg', '299', 'মাটির তৈরি পণ্য যেনো প্রকৃতির নিদর্শন। যেকোনো সময় আপনার দ্বারপ্রান্তে হাজির করতে আছি এখন আমি।', '400', 'মিতু', 'মৃৎশিল্প', 'টি'),
(196, 'মাটির কাপ', '26875704-images (2).jpg', '1000', 'মাটির তৈরি পণ্য যেনো প্রকৃতির নিদর্শন। যেকোনো সময় আপনার দ্বারপ্রান্তে হাজির করতে আছি এখন আমি।', '95', 'মিতু', 'মৃৎশিল্প', 'টি'),
(197, 'মাটির জগ', '55572873-images.jpg', '1999', 'মাটির তৈরি পণ্য যেনো প্রকৃতির নিদর্শন। যেকোনো সময় আপনার দ্বারপ্রান্তে হাজির করতে আছি এখন আমি।', '250', 'মিতু', 'মৃৎশিল্প', 'টি'),
(198, 'মাটির ব্যাংক', '70864960-matirbankdownload.jpg', '2000', 'মাটির তৈরি পণ্য যেনো প্রকৃতির নিদর্শন। যেকোনো সময় আপনার দ্বারপ্রান্তে হাজির করতে আছি এখন আমি।', '150', 'মিতু', 'মৃৎশিল্প', 'টি');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `reviewId` int(8) NOT NULL,
  `customerId` int(8) NOT NULL,
  `productId` int(8) NOT NULL,
  `rating` varchar(200) NOT NULL,
  `feedback` varchar(300) NOT NULL,
  `placedOn` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`reviewId`, `customerId`, `productId`, `rating`, `feedback`, `placedOn`) VALUES
(52, 38, 161, 'চমৎকার', 'বাঙালি নারীর সৌন্দর্য যে শাড়ি তা \"পল্লীহাট\" থেকে কেনা শাড়িগুলো পরেই বুঝতে পেরেছি। ধন্যবাদ \"পল্লীহাট \"।', '2022-09-21 19:00:53'),
(53, 38, 161, 'চমৎকার', 'যেমনটি চেয়েছি তেমনটই পেয়েছি। ধন্যবাদ নকশী এবং \"পল্লীহাট \"কে।', '2022-09-21 19:04:14'),
(54, 41, 161, 'চমৎকার', 'অনেকদিন ধরেই এমন একটি শাড়ি খুঁজছিলাম কিন্তু অন্যান্য প্লাটফর্মের উপর বিশ্বস্ততা হারিয়ে ফেলেছি। ধন্যবাদ \"পল্লীহাট \" আমাকে এতো সুন্দর একটি শাড়ি পেতে সাহায্য করতে।', '2022-09-21 19:09:58'),
(55, 43, 176, 'চমৎকার', 'গলার হারটি অসাধারণ । এমন পণ্য আরও দেখতে চাই। ধন্যবাদ উদ্দ্যোক্তা আরমান এবং পল্লীহাটকে', '2022-09-21 21:29:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `pid` (`pid`),
  ADD KEY `customerId` (`customerId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `customerId` (`customerId`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`detailsId`),
  ADD KEY `order_details_ibfk_2` (`orderId`),
  ADD KEY `order_details_ibfk_1` (`productsId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entrepreneurName` (`entrepreneurName`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `review_ibfk_1` (`productId`),
  ADD KEY `customerId` (`customerId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=288;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `orderId` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detailsId` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `reviewId` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`customerId`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD CONSTRAINT `customer_order_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`productsId`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`orderId`) REFERENCES `customer_order` (`orderId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`entrepreneurName`) REFERENCES `admin_users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category`) REFERENCES `categories` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`customerId`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
