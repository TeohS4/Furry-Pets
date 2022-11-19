-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2022 at 02:11 PM
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
-- Database: `furrypets`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cust_id`) VALUES
(30, 2),
(28, 4);

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `cartdetails_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`cartdetails_id`, `item_id`, `item_qty`, `cart_id`) VALUES
(28, 1, 3, 30);

-- --------------------------------------------------------

--
-- Table structure for table `chatusers`
--

CREATE TABLE `chatusers` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chatusers`
--

INSERT INTO `chatusers` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `status`) VALUES
(5, 587222259, 'Teoh', 'Wei Jie', 'weijieteoh26@gmail.com', '6c7d617aaa43faea44b9f509068f2c6d', 'Active now'),
(6, 1204016844, 'Admin', 'admin', 'admin123@gmail.com', '0192023a7bbd73250516f069df18b500', 'Active now');

-- --------------------------------------------------------

--
-- Table structure for table `creditcard`
--

CREATE TABLE `creditcard` (
  `card_id` int(11) NOT NULL,
  `card_name` varchar(255) NOT NULL,
  `card_number` int(16) NOT NULL,
  `expire` int(5) NOT NULL,
  `cvv` int(3) NOT NULL,
  `cust_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `creditcard`
--

INSERT INTO `creditcard` (`card_id`, `card_name`, `card_number`, `expire`, `cvv`, `cust_id`) VALUES
(1, 'Tommytan', 2147483647, 23, 344, 4),
(2, '阿辉', 2147483647, 67, 766, 2),
(4, 'Teoh', 2147483647, 245678, 546, 2);

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `donation_id` int(11) NOT NULL,
  `donation_amount` int(11) NOT NULL,
  `donation_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cust_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`donation_id`, `donation_amount`, `donation_datetime`, `cust_id`) VALUES
(2, 15, '2022-10-18 11:12:28', 2),
(3, 15, '2022-10-18 11:19:00', 2),
(4, 15, '2022-10-18 11:36:17', 3),
(5, 40, '2022-10-18 11:40:27', 3);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, 594534911, 154679975, 'hi'),
(2, 1204016844, 587222259, 'Hello I would like to adopt this pet'),
(3, 587222259, 1204016844, 'Sure can you provide us your contact number?');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `payment_date` datetime NOT NULL,
  `payment_amount` double(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `cart_id`, `cust_id`, `card_id`, `payment_date`, `payment_amount`) VALUES
(7, 30, 2, 2, '2022-11-16 22:56:15', 9.00),
(8, 30, 2, 2, '2022-11-16 22:58:09', 9.00),
(9, 30, 2, 2, '2022-11-16 22:59:20', 9.00),
(10, 30, 2, 2, '2022-11-16 22:59:38', 45.00),
(11, 30, 2, 2, '2022-11-16 23:03:39', 44.50),
(12, 30, 2, 2, '2022-11-16 23:39:19', 44.50),
(13, 30, 2, 2, '2022-11-16 23:43:38', 8.50);

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `pet_id` int(11) NOT NULL,
  `pet_name` varchar(255) NOT NULL,
  `pet_age` varchar(255) NOT NULL,
  `pet_breed` varchar(255) NOT NULL,
  `pet_condition` varchar(255) NOT NULL,
  `adopt_fee` int(11) NOT NULL,
  `pet_des` varchar(255) NOT NULL,
  `pet_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`pet_id`, `pet_name`, `pet_age`, `pet_breed`, `pet_condition`, `adopt_fee`, `pet_des`, `pet_image`) VALUES
(1, 'Milo', '2 year 6 months', 'Toy Poodle, Female, Dog', 'Healthy', 260, 'Family pets, toy poodles are charming creatures who enjoy being the focus of attention. They are highly clever and respond well to obedience training, but because of their companionable temperament, they sometimes have separation anxiety.', 'poodle.jpg'),
(2, 'Cookies', '1 year 5 months', 'Siamese, Male, Cat', 'Healthy', 120, 'Siamese cats are quite communicative, gregarious, and intelligent. With their owners, they enjoy \"chit-chatting,\" speaking in a deep, loud voice. They are frequently compared to dogs in terms of their affectionate nature and love of fetch.', 'siamese.jpg'),
(3, 'Orchid', '3 year 1 months', 'Singapura, Male, Cat', 'Healthy', 250, 'The Singapura cat might be little, but the breed is certainly not delicate! This cat has a high-energy personality that shines. She is a curious, highly intelligent, and frisky breed that thrives on the attention of her family. Singapura cats are muscular', 'singapura.jpg'),
(4, 'Lucy', '6 months', 'Maltese, Female, Dog', 'Healthy', 400, 'The Maltese breed is kind, affectionate, sharp, adaptable, and trustworthy. Maltese are energetic, playful, and active dogs who make excellent family pets. They also like picking up new tricks. When dealing with noisy kids, they can be snarky.', 'maltese2.jpg'),
(5, 'Leo', '3 years 1 months', 'Ragdoll, Female, Cat', 'Healthy', 480, 'The Ragdoll is a large, impressive and luxuriantly coated cat breed. Underneath an impressive silky, dense and semi-long to long haired coat, there is a long, muscular cat with a broad chest, short neck and sturdy legs. The tail is long and bushy, and the', 'ragdoll.jpg'),
(6, 'Charlie', '5 year 1 months', 'Border Collie, Male, Dog', 'Healthy', 380, 'The Border Collie is still seen performing the task for which it was bred, working sheep (and cattle) and its fitness for function is seen in its speed, its innate herding instinct and its stealthy gait and carriage.', 'border.jpg'),
(8, 'FenFry', '7 Months', 'Pomeranian, Male, Dog', 'Healthy', 800, 'Pomeranians are renowned for their intelligence, curiosity, vigour, feistiness, and boldness. They frequently enjoy being the centre of attention and are quite lively. They can be wonderful family pets, but perhaps not the ideal option for parents with yo', 'pomeranian.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` varchar(255) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_des` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`item_id`, `item_name`, `item_price`, `item_image`, `item_des`) VALUES
(1, 'Applaws Tin Tuna Fillet 156g', '8.50', 'applaws.jpg', 'Applaws Tuna Fillet is a 100% natural complementary pet food for adult cats made with nothing more than the 3 ingredients listed and contains sea caught fish which can be rich in essential amino acids and fatty acids such as Omega 3 â€“ Omega 6. We guaran'),
(2, 'Daily Multi for Cats', '32', 'catfood.jpg', 'Daily Multi is a fantastic supplement to a homemade or raw diet and helps the health of the heart, brain, immune system, skin, and coat.'),
(3, 'Dog Food for Adult (Chicken)', '36', 'dogfood.jpg', 'Adult Dog Pound is a balanced food for adult dogs. benefits: - optimal digestion derived from the presence of whole grains. - Strong muscles for high quality protein. - healthy teeth and bones due to the equilibrium content of calcium, phosphorus and vita'),
(4, 'Dog Bite Toy', '4.60', 'dogtoy.jpg', 'Fun Toy for your pet dog'),
(6, 'Cat Toy Remote Control', '8.50', 'cattoy.jpg', 'Funny electronic mouse toy with remote control. Cute electronic mouse toy with 2 modes: -go forward -backward. With realistic appearance, good for playing tricks on others. Has a remote controller for convenient controlling.'),
(7, 'IQ Dog Chicken 15KG Dry Dog Food', '55', 'iqdog.jpg', 'IQ chicken dog food is a hygienic completed nutritious diet, fortified with suitable amount of vitamin and minerals to maintain the good health of your dogs.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `cust_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`cust_id`, `username`, `email`, `password`, `gender`, `dob`, `address`) VALUES
(2, 'Ghostly', 'weijieteoh26@gmail.com', '#Teoh123', 'male', '2022-10-16', '1, lorong jambu madu, taman jambu madu'),
(3, 'Ghostly', 'teohs4@hotmail.com', '#Teoh123', 'male', '2022-10-06', '1, LORONG JAMBU MADU 4'),
(4, 'Lee Jowyn', 'jowyn2002@gmail.com', 'Jowyn@123', 'female', '2022-11-02', '1, LORONG JAMBU MADU 4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cust_fk` (`cust_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`cartdetails_id`),
  ADD KEY `item_fk` (`item_id`),
  ADD KEY `fk_cart` (`cart_id`);

--
-- Indexes for table `chatusers`
--
ALTER TABLE `chatusers`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `creditcard`
--
ALTER TABLE `creditcard`
  ADD PRIMARY KEY (`card_id`),
  ADD KEY `cust-Fk` (`cust_id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`donation_id`),
  ADD KEY `fk_cust` (`cust_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `cart_fk` (`cart_id`),
  ADD KEY `user_fk` (`cust_id`),
  ADD KEY `card_fk` (`card_id`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`pet_id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`cust_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `cartdetails_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `chatusers`
--
ALTER TABLE `chatusers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `creditcard`
--
ALTER TABLE `creditcard`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cust_fk` FOREIGN KEY (`cust_id`) REFERENCES `user` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD CONSTRAINT `fk_cart` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_fk` FOREIGN KEY (`item_id`) REFERENCES `shop` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `fk_cust` FOREIGN KEY (`cust_id`) REFERENCES `user` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `card_fk` FOREIGN KEY (`card_id`) REFERENCES `creditcard` (`card_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_fk` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`cust_id`) REFERENCES `user` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
