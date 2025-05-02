-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2025 at 03:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `post`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(12, 'Nishant', 'nishant123@gmail.com', '12345678'),
(30, 'viken123', 'viken123@gmail.com', '163163'),
(35, 'Mahesh patil', 'maheshpatil123@gmail.com', '@Nn9726274614');

-- --------------------------------------------------------

--
-- Table structure for table `admin_home`
--

CREATE TABLE `admin_home` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_home`
--

INSERT INTO `admin_home` (`id`, `title`, `description`, `image`) VALUES
(8, 'Modi voluptatem unde', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque, corporis. Quia neque qui explicabo veritatis nostrum sequi laudantium alias quam nobis iusto, deserunt sit accusamus animi facere.', '52416693.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `food_title` varchar(250) NOT NULL,
  `food_description` varchar(250) NOT NULL,
  `food_price` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `food_title`, `food_description`, `food_price`, `type`, `image`) VALUES
(21, 'Aloo chaat', ' Chaat is a broad category of Indian street food known for its vibrant blend of sweet, sour, spicy.', '$20', 'starters', 'aloo.jpg'),
(22, 'Idli', 'Idli is a soft, spongy, steamed cake made from a fermented batter of rice and black lentils', '$13', 'Breakfast', 'idli.jpg'),
(23, 'medu vada ', ' Medu vada is a popular South Indian fritter, often described as a savory donut made with black gram.', '$25', 'Breakfast', 'Minapa Garelu _ Medu Vada (Spicy Lentil Doughnuts).jpg'),
(24, 'Toku Tikka Masala ', ' Tikka Masala, tofu chunks get marinated in a homemade spice blend and creamy yogurt.', '$100', 'Dinner', '614be13a176cd5eba7926de7c1666a6d.jpg'),
(25, 'Palak Corn', 'Lehsuni Paneer Tikka is a paneer dish where cubes of paneer are marinated .', '$120', 'Dinner', 'Lasooni Corn Palak.jpg'),
(26, 'Paneer Pasanda', 'Paneer Pasanda is a North Indian Mughlai dish featuring paneer (Indian cottage cheese).', '$170', 'Dinner', 'Paneer Pasanda Recipe.jpg'),
(27, 'French Toast', 'French toast is a breakfast dish made by soaking slices of bread in a mixture of beaten eggs.', '$80', 'Breakfast', 'Easy French Toast _ Simple Recipe for Busy Mornings.jpg'),
(29, 'Dlicious Chiken', 'Fried chicken is a dish where chicken pieces, typically bone-in, are coated in batter or breading and then deep-fried', '$26', 'Dinner', 'Delicious Chicken Tenderloin Meal Ideas.jpg'),
(30, 'Bisi Bele Bath', 'Bisi Bele Bath, a wholesome dish from Karnataka, is a flavorful one-pot meal made with rice', '$635', 'Dinner', 'Bisi bele bath (curried lentils and rice) – Kitchen Mai.jpg'),
(31, ' Hot Ham and Cheese Sliders', 'Mini sandwich rolls (Hawaiian sweet rolls are a popular choice) are layered with ham and cheese.', '$849', 'Dinner', 'Delicious Hot Ham and Cheese Sliders Recipe.jpg'),
(40, 'Herby Lentil and Burrata Salad', 'This Burrata Chopped Salad is a mash up of a cucumber and tomato salad mixed with lots of fresh herbs and a big pile of burrata on top.', '$333', 'Lunch', 'Mediterranean Lentil Salad.jpg'),
(47, 'kawab', 'Rajma Kebab, also known as Rajma Galouti Kebab, is a vegetarian kebab made from mashed kidney.', '$12', 'starters', 'Rajma Kebab.jpg'),
(48, 'Artistic Omelet', 'An \"artistic omelet\" describes an omelet that goes beyond basic cooking and emphasizes presentation and visual appeal.', '$11', 'Breakfast', 'Artistic Omelet.jpg'),
(49, 'Paneer Kathi Rolls', 'Paneer Kathi Roll is a Indian wrap with a filling of marinated and pan-fried paneer (Indian cheese), plenty of veggies and green chutney (mint chutney/ cilantro chutney).', '$110', 'Breakfast', 'Paneer Kathi Rolls Recipe - Khaddoroshik.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `chef`
--

CREATE TABLE `chef` (
  `id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `designation` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chef`
--

INSERT INTO `chef` (`id`, `image`, `title`, `designation`, `description`) VALUES
(3, 'Jisoo.jpg', 'Jisso', '  Pantry Chef', 'A pantry chef manages refrigerator stocks and prepares cold dishes.strong culinary knowledge, attention to detail, and the ability to manage.'),
(4, 'download (11).jpg', 'Ross taylor', 'Reciptionst', 'A receptionist manages the front desk, serving as the first point of contact for visitors and clients and providing essential administrative support.');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `tittle` int(11) NOT NULL,
  `detail` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hom_about`
--

CREATE TABLE `hom_about` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hom_about`
--

INSERT INTO `hom_about` (`id`, `title`, `description`, `image`) VALUES
(1, 'speggitti', 'Spaghetti are eaten with many sauces, from the classic ragù to carbonara to fish sauces.', 'delicious-spaghetti-carbonara-stockcake.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `designation` varchar(250) NOT NULL,
  `rating` varchar(100) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `description`, `username`, `designation`, `rating`, `image`) VALUES
(12, 'This is good resturant. You should visit once a time. Food is tasty and hygenic. Moreover price is average.', '@ross123', 'maker', '4', 'avatar5.png'),
(13, 'Expedita beatae nosttfhgghfh', 'jusejyhh', 'Ut cumque atque expl', 'Enim rerum suscipit ', 'avatar3.png'),
(29, 'Natus amet magni au', 'jutona', 'Ipsam facere facilis', 'Proident quibusdam ', 'Avatar Homme - Photos _ téléchargez gratuitement des images de haute qualité _ Freepik.jpg'),
(31, 'Nam aspernatur molli', 'bagekasu', 'Voluptatem consequun', 'Blanditiis soluta la', '3D Cartoon Avatar of a Woman Minimal 3D Character _ Premium AI-generated image.jpg'),
(33, 'Adipisci praesentium', 'zurywexyw', 'Maiores qui do in ne', 'Et officiis et qui n', 'man stock photo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobileno` varchar(10) NOT NULL,
  `password` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `mobileno`, `password`) VALUES
(16, 'Kuame Thomas', 'fehy@mailinator.com', '', 0),
(17, 'Wesley Hopkins', 'myvywi@mailinator.com', '', 0),
(18, 'Vikenchor', 'mazy@mailinator.com', '', 0),
(19, ' ffff', 'lume@mailinator.com', '', 0),
(20, 'viken', 'qylip@mailinator.com', '', 0),
(23, ' suryakumaryadav', 'shreyas2211@gmail.com', '', 0),
(26, 'Shaine', 'leri@mailinator.com', '', 0),
(27, 'Levi', 'teti@mailinator.com', '', 0),
(28, 'miralll', 'tufux@mailinator.com', '', 0),
(29, 'Raya', 'xutuxi@mailinator.com', '', 0),
(30, 'Lance', 'lizib@mailinator.com', '', 0),
(31, 'Belle', 'muvysavo@mailinator.com', '', 0),
(32, 'Lionel', 'lipisazome@mailinator.com', '', 0),
(33, 'Howard', 'giqi@mailinator.com', '', 0),
(34, 'Stone', 'lujeki@mailinator.com', '', 0),
(35, 'rohit', 'rohit123@gmail.com', '', 96858585),
(36, 'ee', 'rohit123@gmail.com', '', 96858585),
(37, 'tony', 'tony123@gmail.com', '', 859685),
(38, 'Karly', 'paqykudev@mailinator.com', '', 0),
(39, 'Shellie', 'limehyp@mailinator.com', '', 0),
(40, 'Raven', 'puradalo@mailinator.com', '', 0),
(41, 'Harshil', 'haeshil12@gmail.com', '', 2147483647),
(42, 'rajaram', 'naco@mailinator.com', '', 0),
(43, 'sunilbhai', 'naco@mailinator.com', '', 0),
(44, 'maheshmoment', 'wicudo@mailinator.com', '', 0),
(45, 'shyambhai', 'dupewisu@mailinator.com', '', 0),
(46, 'Ferris', 'popacatoq@mailinator.com', '', 0),
(47, 'Alexis', 'jyxijekefe@mailinator.com', '596', 0),
(48, 'Stone', 'cylevoguhu@mailinator.com', '145', 0),
(49, 'Akashpatel', 'akashpatel4614@gmail.com', '8849590074', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_home`
--
ALTER TABLE `admin_home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chef`
--
ALTER TABLE `chef`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hom_about`
--
ALTER TABLE `hom_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `admin_home`
--
ALTER TABLE `admin_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `chef`
--
ALTER TABLE `chef`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hom_about`
--
ALTER TABLE `hom_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
