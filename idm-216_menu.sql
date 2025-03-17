-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 17, 2025 at 07:13 PM
-- Server version: 10.6.18-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ojk25_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `idm-216_menu`
--

CREATE TABLE `idm-216_menu` (
  `id` int(2) NOT NULL,
  `name` varchar(33) DEFAULT NULL,
  `description` varchar(103) DEFAULT NULL,
  `price` decimal(4,2) DEFAULT NULL,
  `category` varchar(6) DEFAULT NULL,
  `diet` varchar(43) DEFAULT NULL,
  `community` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `idm-216_menu`
--

INSERT INTO `idm-216_menu` (`id`, `name`, `description`, `price`, `category`, `diet`, `community`) VALUES
(1, 'General Tso\'s Chicken', 'A classic sweet and tangy dish with crispy chicken and bold flavors', '9.00', 'Entree', '', ''),
(2, 'Pepper Steak', 'Tender beef stir-fried with vibrant peppers in a savory sauce', '9.00', 'Entree', '', ''),
(3, 'Sesame Chicken', 'Crispy chicken glazed with a sweet sesame sauce and topped with seeds', '9.00', 'Entree', '', ''),
(4, 'Stir-Fried Spicy Ramen', 'Spicy and flavorful ramen tossed with fresh vegetables and seasonings', '9.00', 'Entree', '', 'Y'),
(5, 'Fried Dish with Garlic Sauce', 'Crispy fried protein coated in a rich, garlicky sauce', '10.00', 'Entree', '', ''),
(6, 'Beef Chow Fun', 'Flat rice noodles stir-fried with tender beef and fresh vegetables', '10.00', 'Entree', '', ''),
(7, 'Crispy Chicken with Special Sauce', 'Crunchy chicken paired with the truck\'s signature sauce', '9.00', 'Entree', '', ''),
(8, 'Chicken with Broccoli', 'A light and healthy mix of chicken and broccoli in a savory sauce', '9.00', 'Entree', 'Gluten Free', ''),
(9, 'Combination Lo Mein', 'Savory noodles loaded with chicken, beef, shrimp, and vegetables', '10.00', 'Entree', '', ''),
(10, 'Shrimp Fried Rice', 'Fluffy fried rice tossed with succulent shrimp and veggies', '9.00', 'Entree', 'Gluten Free, Pescatarian', ''),
(11, 'Chicken Wings with Fried Rice', 'Crispy wings paired with classic fried rice for a hearty meal', '10.00', 'Entree', '', ''),
(12, 'Vegetable Tofu with Spicy Sauce', 'A zesty combination of tofu and fresh vegetables in spicy sauce', '8.00', 'Entree', 'Vegetarian, Vegan, Pescatarian, Gluten Free', ''),
(13, 'Curry Chicken', 'Chicken simmered in a rich, aromatic curry sauce', '9.00', 'Entree', 'Gluten Free', ''),
(14, 'Crispy Shrimp with Fried Rice', 'Crunchy shrimp served over perfectly seasoned fried rice', '10.00', 'Entree', 'Gluten Free, Pescatarian', ''),
(15, 'Kung Pao Chicken', 'A spicy stir-fry with chicken, peanuts, and peppers', '9.00', 'Entree', '', 'Y'),
(16, 'Chicken Fingers with Fried Rice', 'Crispy chicken strips served with fried rice for a comforting dish', '10.00', 'Entree', '', ''),
(17, 'Vegetable Lo Mein', 'Stir-fried noodles packed with a colorful medley of fresh vegetables', '7.00', 'Entree', 'Vegetarian, Vegan, Pescatarian', ''),
(18, 'Beef Broccoli', 'A flavorful mix of tender beef and fresh broccoli in a savory sauce', '9.00', 'Entree', '', ''),
(19, 'Chicken Teriyaki', 'Grilled chicken glazed with a sweet and savory teriyaki sauce', '9.00', 'Entree', '', ''),
(20, 'Shrimp and Broccoli Platter', 'Juicy shrimp and broccoli served with a rich, savory sauce', '11.00', 'Entree', 'Gluten Free, Pescatarian', ''),
(21, 'Chicken and Mushrooms', 'A hearty dish with chicken and earthy mushrooms in a savory sauce', '9.00', 'Entree', 'Gluten Free', ''),
(22, 'Beef and String Beans', 'Tender beef stir-fried with crisp string beans in a savory sauce', '9.00', 'Entree', 'Gluten Free', ''),
(23, 'Pork Lo Mein', 'Savory noodles stir-fried with tender pork and vegetables', '9.00', 'Entree', '', ''),
(24, 'Fried Dumplings', 'Six pork dumplings served in a tray', '3.50', 'Sides', '', ''),
(25, 'Steamed Dumplings', 'Six pork dumplings served in a tray', '3.00', 'Sides', '', ''),
(26, 'Vegetable Spring Rolls', 'Five spring rolls served in a tray', '3.00', 'Sides', 'Vegetarian, Vegan, Pescatarian', ''),
(27, 'Shrimp Roll', 'Two shrimp rolls served in a tray', '1.50', 'Sides', 'Pescatarian', ''),
(28, 'Rose Pork Bun', 'Three pork buns served in a tray', '3.00', 'Sides', '', ''),
(29, 'Chicken Noodle Soup', 'Chicken and beansprouts with flat rice noodles', '3.50', 'Soups', '', ''),
(30, 'Wonton Soup', 'Shredded pork with egg noodle', '3.50', 'Soups', '', 'Y'),
(31, 'Chicken Rice Soup', 'Chicken and steamed rice in a rich broth', '3.50', 'Soups', 'Gluten Free', ''),
(32, 'Mai Fun Soup', 'Chicken and vegetable with thin rice noodles', '3.50', 'Soups', 'Gluten Free', ''),
(33, 'Vegetable Soup', 'Vegetarian soup of mixed vegetables', '3.00', 'Soups', 'Vegetarian, Vegan, Pescatarian, Gluten Free', ''),
(34, 'Clear Gel Soup', 'Chicken and vegetable with thin bean thread noodles', '3.00', 'Soups', 'Gluten Free', ''),
(35, 'Dumpling Soup', 'Chicken and pork filled dumplings in a rich broth', '3.00', 'Soups', '', ''),
(36, 'House Special Soup', 'Chicken, beef, and shrimp with vegetables in a rich broth', '4.00', 'Soups', 'Pescatarian', ''),
(37, 'Homemade Lemonade', 'Homemade lemonade made fresh each morning', '1.50', 'Drinks', 'Vegetarian, Vegan, Pescatarian, Gluten Free', ''),
(38, 'Homemade Iced Tea', 'Homemade iced tea made fresh each morning', '1.50', 'Drinks', 'Vegetarian, Vegan, Pescatarian, Gluten Free', ''),
(39, 'Vietnamese Coffee', 'Freshly brewed coffee served hot or cold', '3.00', 'Drinks', 'Vegetarian, Vegan, Pescatarian, Gluten Free', 'Y'),
(40, 'Thai Coffee', 'Freshly brewed coffee served hot or cold', '4.00', 'Drinks', 'Vegetarian, Vegan, Pescatarian, Gluten Free', ''),
(41, 'Thai Iced Tea', 'Homemade Thai iced tea served with straw', '3.00', 'Drinks', 'Vegetarian, Vegan, Pescatarian, Gluten Free', ''),
(42, 'Soda', 'Choice of Coca Cola, Gatorade, Mountain Dew, Minute Maid, Canada Dry, Diet Coke, Arizona Tea, or Sprite', '4.00', 'Drinks', 'Vegetarian, Vegan, Pescatarian, Gluten Free', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `idm-216_menu`
--
ALTER TABLE `idm-216_menu`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
