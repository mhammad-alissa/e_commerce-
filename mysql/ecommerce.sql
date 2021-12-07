-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 06:41 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(3) NOT NULL,
  `admin_img` text NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_img`, `admin_name`, `admin_email`, `admin_password`, `admin_date`) VALUES
(9, 'IMG-61abb8104d3e86.49489554.png', 'admin ', 'admin@gmail.com', 'admin123', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(3) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_img`) VALUES
(18, 'Pens', 'IMG-61aba6b0b3deb3.70126977.png'),
(19, 'Note books', 'IMG-61aba6eed7dae0.14540449.png'),
(20, 'Back Bags', 'IMG-61aba721132cd7.29058383.png'),
(21, 'Cards', 'IMG-61aba7372b1334.58060232.png'),
(22, 'Stickers', 'IMG-61aba74fb58962.56140983.png');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `user_id` int(3) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_date` date NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(3) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `product_countete` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(3) NOT NULL,
  `product_name` varchar(1000) NOT NULL,
  `product_description` text NOT NULL,
  `product_main_img` text NOT NULL,
  `product_sub1_img` text NOT NULL,
  `product_sub2_img` text NOT NULL,
  `product_price` int(64) NOT NULL,
  `product_sale_price` int(64) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_tags` varchar(255) NOT NULL,
  `product_sale_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_main_img`, `product_sub1_img`, `product_sub2_img`, `product_price`, `product_sale_price`, `product_quantity`, `category_id`, `product_color`, `product_tags`, `product_sale_status`) VALUES
(8, 'Metal Ballpoint Pen With Base ', 'Refill Specifications:0.7mm  Refill Color:	Black Material:	Plastic', 'IMG-61abab5ff1f741.44428124.png', 'IMG-61abab5ff36868.14257929.png', 'IMG-61abab5ff387a4.14104849.png', 5, 4, 50, 18, '', '  pen write writing  black  ', '1'),
(9, ' Plaid Pattern Random Ballpoint Pen', 'Refill Color:	Black Quantity:	1 piece Material:	Stainless Steel', 'IMG-61ababb4b04222.71873643.png', 'IMG-61ababb4b078d1.60275687.png', 'IMG-61ababb4b09261.62263222.png', 4, 0, 1, 18, '', '   	pen write writing black ', '0'),
(13, 'Metal Ballpoint Pen ', 'Color:	Burgundy Quantity:	1 piece Material:	Metal', 'IMG-61ababf1ceb505.99584593.png', 'IMG-61ababf1d075a0.08338381.png', 'IMG-61ababf1d0ac10.60311513.png', 3, 0, 50, 18, '', '  pen write writing  black brown ', '0'),
(14, 'Metal Gel Pen ', 'Color:	Silver Material:	Metal', 'IMG-61abac5568ee85.83828495.png', 'IMG-61abac5569d736.36871529.png', 'IMG-61abac5569fa30.26824260.png', 12, 10, 50, 18, '', '  pen write writing  black ', '1'),
(15, 'Metal Pen ', 'Color:	Black Material:	Metal', 'IMG-61abac9a00a455.37848512.png', 'IMG-61abac9a026b57.63851198.png', 'IMG-61abac9a02b461.38080260.png', 15, 0, 50, 18, '', '  pen write writing  black ', '0'),
(16, 'Solid Color Cover Spiral Notebook ', 'Color:	Black Quantity:	piece Material:	Paper', 'IMG-61abad026a2779.52692554.png', 'IMG-61abad026a8a61.22352214.png', 'IMG-61abad026ab177.19804561.png', 20, 15, 100, 19, '', '  notebook write color green  ', '1'),
(17, 'Constellation Print Cover Random Spiral Notebook ', 'Color:	Black and White Quantity:	piece Material:	Paper', 'IMG-61abad454d7858.65726711.png', 'IMG-61abad454e2587.35433506.png', 'IMG-61abad454e47a4.54042670.png', 12, 10, 50, 19, '', '  notebook write color green note ', '1'),
(18, 'Random Color Notebook ', 'Color:	Multicolor Material:	Paper', 'IMG-61abad9dc07885.58648919.png', 'IMG-61abad9dc141f7.39917294.png', 'IMG-61abad9dc16127.93023748.png', 15, 0, 50, 19, '', '  notebook write color green note ', '0'),
(20, 'Plain Cover Random Notebook ', 'Color:	Multicolor Quantity:	1 piece Material:	Paper', 'IMG-61abadefa15623.20226719.png', 'IMG-61abadefa34991.47679363.png', 'IMG-61abadefa36595.41828788.png', 6, 0, 50, 19, '', '  notebook write color green  ', '0'),
(21, 'Vintage Pattern Cover Random Notebook ', 'Color:	Multicolor Material:	Paper', 'IMG-61abae27975040.97561566.png', 'IMG-61abae2798f327.06068330.png', 'IMG-61abae279909a2.54089691.png', 8, 0, 50, 19, '', '  pen write writing  black brown ', '0'),
(27, 'Pom Pom Decor Letter Graphic Large Capacity Backpack ', 'Type:	Classic Backpack Style:	Preppy Color:	Black Magnetic:	No Composition:	100% Cotton Material:	Canvas', 'IMG-61abb049161782.24421745.png', 'IMG-61abb049177e32.21281950.png', 'IMG-61abb049182de1.40115550.png', 25, 0, 50, 20, '', '  backbags  ', '0'),
(28, 'Colorblock Release Buckle Decor School Bag ', 'Type:    Functional Backpack Style:    Preppy Color:    Multicolor', 'IMG-61abb1e91ca901.57507749.png', 'IMG-61abb1e91dc2b6.69223698.png', 'IMG-61abb1e91ec016.19625710.png', 25, 0, 50, 20, '', '  backbags school ', '0'),
(29, 'Letter Patch Graphic Backpack Set ', 'Type:    Functional Backpack Style:    Preppy Color:    Multicolor', 'IMG-61abb2428a9bf7.44731146.png', 'IMG-61abb2428b8324.95062245.png', 'IMG-61abb2428ba629.05356743.png', 35, 30, 60, 20, '', '  backbags school ', '1'),
(30, 'Minimalist Large Capacity School Bag ', 'Color:    Watermelon Pink Composition:    100% Nylon Material:    Nylon', 'IMG-61abb2f4d7fc93.19164639.png', 'IMG-61abb2f4d8fa90.65137124.png', 'IMG-61abb2f4d92536.26172701.png', 20, 0, 50, 20, '', '  backbags school ', '0'),
(31, 'Colorblock Release Buckle Decor School Bag ', 'Type:    Functional Backpack Style:    Preppy Color:    Multicolor', 'IMG-61abb3438802e8.75827783.png', 'IMG-61abb343896178.23008313.png', 'IMG-61abb343899f71.43884103.png', 50, 40, 50, 20, '', '  backbags school ', '1'),
(32, 'Slogan Graphic Random Color Greeting Card  ', 'Color:    Multicolor Material:    Paper Quantity:    1 piece', 'IMG-61abb3c5b43c85.24583148.png', 'IMG-61abb3c5b45c69.87118553.png', 'IMG-61abb3c5b4ec84.45527037.png', 5, 0, 100, 21, '', '  card party cognates ', '0'),
(33, 'Christmas Pattern Greeting Card With Envelope ', 'Color:    Multicolor Material:    Paper Quantity:    6 pcs', 'IMG-61abb40fb8f736.73413234.png', 'IMG-61abb40fb96db5.83126354.png', 'IMG-61abb40fb99563.28299932.png', 8, 5, 100, 21, '', '  card party cognates ', '1'),
(34, 'Artificial Flower Decor Random Greeting Card ', 'Color:    Multicolor Material:    Paper Quantity:    1 piece', 'IMG-61abb4837e22e2.53236261.png', 'IMG-61abb48380f520.97721541.png', 'IMG-61abb483813a76.93465229.png', 5, 0, 100, 21, '', '  card party cognates ', '0'),
(35, 'Christmas Pattern Greeting Card With Envelope ', 'Color: Multicolor Material: Paper Quantity: 6 pcs', 'IMG-61abb56e385c73.86900186.png', 'IMG-61abb56e389a42.52497689.png', 'IMG-61abb56e38d770.40505673.png', 11, 0, 100, 21, '', 'cards party  ', '0'),
(36, 'Christmas Pattern Greeting Card With Envelope ', 'Color: Multicolor Material: Paper Quantity: 6 pcs', 'IMG-61abb5ca7fd752.91832203.png', 'IMG-61abb5ca80cc52.15723853.png', 'IMG-61abb5ca8169b7.83058985.png', 10, 0, 100, 21, '', '  cards party  ', '0'),
(37, 'Butterfly Pattern Random Sticker ', 'Color:    Multicolor Type:    Decals Quantity:    pcs Material:    PET', 'IMG-61abb641940bd7.19117428.png', 'IMG-61abb64194d265.57417709.png', 'IMG-61abb64194ed48.23832813.png', 6, 4, 100, 22, '', '  Sticker Stickers  ', '1'),
(38, 'Slogan Graphic Random Sticker ', 'Color:    Multicolor Type:    Decals Quantity:    pcs Material:    Paper', 'IMG-61abb690b20dd5.08063305.png', 'IMG-61abb690b41459.32684267.png', 'IMG-61abb690b433d0.25980412.png', 10, 0, 100, 22, '', '  Sticker Stickers  ', '0'),
(39, 'Mixed Pattern Sticker ', 'Color:    Black Type:    Decals Quantity:    pcs', 'IMG-61abb7045dcad2.62452529.png', 'IMG-61abb7045f7171.66048366.png', 'IMG-61abb7045f9cb8.30393354.png', 7, 5, 100, 22, '', '  Sticker Stickers  ', '0'),
(40, 'Mixed Pattern Sticker ', 'Color:Pink  Type:    Decals Quantity:    pcs', 'IMG-61ad139b1eb897.74259516.png', 'IMG-61ad139b1ee860.41536038.png', 'IMG-61ad139b1f03b5.23504053.png', 8, 5, 100, 22, '', '  Sticker Stickers pink    ', '0'),
(41, 'Random Mixed Pattern Sticker ', 'Color:    Multicolor', 'IMG-61abb797844a45.99904901.png', 'IMG-61abb79785e968.78593938.png', 'IMG-61abb797860482.61483882.png', 6, 0, 32, 22, '', '  Sticker Stickers  ', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_img` text NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
