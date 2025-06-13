-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2025 at 07:34 AM
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
-- Database: `furry_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `adopt`
--

CREATE TABLE `adopt` (
  `ID` char(36) NOT NULL,
  `Animal_type` text NOT NULL,
  `Breed` text NOT NULL,
  `Description` text NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adopt`
--

INSERT INTO `adopt` (`ID`, `Animal_type`, `Breed`, `Description`, `Price`) VALUES
('ad6a41cd-1bac-11f0-a16b-30e1718b7983', 'DOG', 'Labrador Retriever', 'Known for their friendly, sweet-faced appearance and loveable nature. They come in various colors, including black, yellow, and chocolate.', 20000),
('ad6a584f-1bac-11f0-a16b-30e1718b7983', 'DOG', 'German Shepherd', 'These dogs have a wolf-like appearance with a strong, muscular build. German Shepherds are intelligent, loyal, and protective, making them excellent guard dogs and working companions.', 20000),
('ad6a598a-1bac-11f0-a16b-30e1718b7983', 'CAT', 'Persian Cat', 'Long-haired, calm, and affectionate. Ideal for indoor environments and low-energy households.', 15999),
('ad6a5a2e-1bac-11f0-a16b-30e1718b7983', 'CAT', 'Maine Coon', 'One of the largest cat breeds; friendly, intelligent, and great with families.', 9999),
('ad6a5a9d-1bac-11f0-a16b-30e1718b7983', 'BIRD', 'Budgerigar (Budgie)', ' Small, colorful, and easy to train. Perfect for first-time bird owners.', 4000),
('ad6a68b1-1bac-11f0-a16b-30e1718b7983', 'BIRD', 'Cockatiel', 'Friendly and social. Known for their cute crests and whistling.', 1999),
('ad6a6971-1bac-11f0-a16b-30e1718b7983', 'FISH', 'Betta Fish', 'Brightly colored with long flowing fins. Best kept alone due to aggression toward other males.', 599),
('ad6a69f4-1bac-11f0-a16b-30e1718b7983', 'FISH', 'Goldfish (Fancy)', 'Hardy and low-maintenance. Popular for beginners and aquariums.', 699);

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID` char(36) NOT NULL,
  `Name` text NOT NULL,
  `Email` text NOT NULL,
  `Password` text NOT NULL,
  `Phone_Number` bigint(20) NOT NULL,
  `Address` text NOT NULL,
  `State` text NOT NULL,
  `Pincode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `Name`, `Email`, `Password`, `Phone_Number`, `Address`, `State`, `Pincode`) VALUES
('cust_6803392ff17da2.16494296', 'dinesh', 'bt24csa062@iiitn.ac.in', '$2y$10$X1LjpADfAKYpoAxBvDDizeNe7jiR6molmkTfoIHzq7fPSobLBFCcC', 0, '', '', 0),
('cust_68033a4c8b82f1.12617934', 'vedhansh', 'vedanshshukla@gmail.com', '$2y$10$kMQK/qMlF0JxAfn.xND0Z.dn8QKjO.voVNM/8UPy2boeqHTIxWKve', 0, '', '', 0),
('cust_68033d0acaccc1.48127233', 'shiva', 'sivakrishnamanchineella@gmail.com', '$2y$10$/g8MPu1jVGbq2kK9o9AaG.Ob0fuKN5uNcwDXkYj/.INpIWxZxcJva', 0, '', '', 0),
('cust_680477334cd558.47417278', 'surendra', 'surendrareddy@gmail.com', '$2y$10$tiqr4HuCrPn7Wo4XZWRnBeB.OLJUSwlb5okNhGfRQ76GTohgX/yy2', 0, '', '', 0),
('cust_6804c0aaae0278.33811161', 'krishna', 'krishna@gmail.com', '$2y$10$Suv9CgIh9BWzQxNeTRx3lecklYxCYJ73Ja292FJm9mBuwb01KoCWW', 0, '', '', 0),
('cust_680657d3bbb166.70728661', 'Dinesh', 'dineswarakumarowk@gmail.com', '$2y$10$cD/kyM4JBS4/5qMOFKdiE.4xPhs46q3OUDfjifsY88rNeQqanyQTa', 0, '', '', 0),
('cust_6806957ba66949.07388798', 'lekh verma', 'uselessdimag@gmail.com', '$2y$10$DRoVZP42A.ofxs3b/kxmI.asfslzQ1CcMTQxIwDV9KWvEjkqRexT.', 0, '', '', 0),
('cust_680735d542b307.01714596', 'aravind', 'aravind@gmail.com', '$2y$10$paNic.9oeerIhaMpTnXzs.h99gAuT7PTjNPhd5VvG2AE96I0gX80S', 0, '', '', 0),
('cust_6807f9e5a4f344.73613263', 'johar', 'bt23ian@gmail.com', '$2y$10$q3LOc5MozBg.CJriWQIiqeC.hBFequs0BEmfXh6Jw57rlQ0y2h.xu', 0, '', '', 0),
('cust_68086fa257c865.08891896', 'nikhil', 'nikhil@gmail.com', '$2y$10$d2Awln2NiIZ3ic.PC9hEyOjzrlSkYm29ooHBnpm1Fe1la8GU51pZa', 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` char(36) NOT NULL,
  `Product_ID` char(36) DEFAULT NULL,
  `Customer_ID` char(36) NOT NULL,
  `Adopt_ID` char(36) DEFAULT NULL,
  `STATUS` enum('PENDING','APPROVED','ON THE WAY','OUT FOR DELEVERY','DELIVERED','CANCELLED','RETURN','REPLACEMENT') NOT NULL DEFAULT 'PENDING',
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID`, `Product_ID`, `Customer_ID`, `Adopt_ID`, `STATUS`, `Quantity`) VALUES
('138f711b-1bb1-11f0-a16b-30e1718b7983', '07df70cd-1baa-11f0-a16b-30e1718b7983', 'f7842c94-1bae-11f0-a16b-30e1718b7983', NULL, 'PENDING', 1),
('138f858d-1bb1-11f0-a16b-30e1718b7983', NULL, 'f7842c94-1bae-11f0-a16b-30e1718b7983', 'ad6a41cd-1bac-11f0-a16b-30e1718b7983', 'OUT FOR DELEVERY', 2),
('138f8746-1bb1-11f0-a16b-30e1718b7983', '07df853d-1baa-11f0-a16b-30e1718b7983', 'f7844886-1bae-11f0-a16b-30e1718b7983', NULL, 'APPROVED', 5),
('8507a041-1bb0-11f0-a16b-30e1718b7983', '07df70cd-1baa-11f0-a16b-30e1718b7983', 'f7842c94-1bae-11f0-a16b-30e1718b7983', NULL, 'PENDING', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Description` text DEFAULT NULL,
  `ImagePath` varchar(255) DEFAULT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `Stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` char(36) NOT NULL,
  `Name` text NOT NULL,
  `Description` text DEFAULT NULL,
  `Price` float NOT NULL,
  `Image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `Name`, `Description`, `Price`, `Image`) VALUES
('07df70cd-1baa-11f0-a16b-30e1718b7983', 'PEDIGREE Puppy Chicken Dog Food', ' Milk 1.2 kg Dry New Born Dog Food', 400, 'C:\\xampp\\htdocs\\html\\EndSemProj\\PRODUCTS\\dog\\dog_food.jpg'),
('07df8416-1baa-11f0-a16b-30e1718b7983', 'Barks & Wags Tuxedo for Dog, Cat  (Yellow & Black)', 'Help your dog look spiffy with our selection of formal attire. Your dog can be the best-dressed pooch at any formal gathering. Our tuxedo has a tux-inspired shirt jacket with buttons, attached to a black bow tie.', 1400, 'C:\\xampp\\htdocs\\html\\EndSemProj\\PRODUCTS\\dog\\dog_cloth.jpg'),
('07df853d-1baa-11f0-a16b-30e1718b7983', 'Barks & Wags Tuxedo for Dog, Cat  (Dark Blue, Black)', ' Help your dog look spiffy with our selection of formal attire. Your dog can be best-dressed pooch at any formal gathering.', 1000, 'C:\\xampp\\htdocs\\html\\EndSemProj\\PRODUCTS\\dog\\dog_cloth2.jpg'),
('07df8620-1baa-11f0-a16b-30e1718b7983', 'Drools Focus booster Pet Health Supplements  (300 g)', 'Puppy weaning Diet for all breeds', 400, 'C:\\xampp\\htdocs\\html\\EndSemProj\\PRODUCTS\\dog\\dog_pet.jpg'),
('07df86aa-1baa-11f0-a16b-30e1718b7983', 'HIMALAYA Liv 52 Syrup For increase food,', ' Himalaya Dog Supplements Liv 52 200 Ml work as a appetite stimulant. It helps to protect the liver from chemical toxin and drugs', 500, 'C:\\xampp\\htdocs\\html\\EndSemProj\\PRODUCTS\\dog\\dog_medicene.jpg'),
('0d557dbf-1f99-11f0-901e-30e1718b7983', 'combo pet food (Dog&cat)', 'special offer quality food', 800, 'C:\\xampp\\htdocs\\html\\EndSemProj\\PRODUCTS\\combo_pet_food.png'),
('1d99487b-1f4d-11f0-884d-30e1718b7983', 'Chicken premium-(Loaf Kitten)', 'chicken food for the cat special dish', 500, 'C:\\xampp\\htdocs\\html\\EndSemProj\\PRODUCTS\\cat\\cat_food.jpg'),
('2219b39d-1f52-11f0-884d-30e1718b7983', 'bird cage2', 'bird home to make beautiful', 500, 'C:\\xampp\\htdocs\\html\\EndSemProj\\PRODUCTS\\bird\\bird_cage2.jpg'),
('54214634-1f4e-11f0-884d-30e1718b7983', 'sea look aquarium(Fish) real sea look', 'a see type aquarium feels a real one to the fish', 1500, 'C:\\xampp\\htdocs\\html\\EndSemProj\\PRODUCTS\\fish\\fish_aquariem_2.jpg'),
('5ecb0547-1f9a-11f0-901e-30e1718b7983', 'pet bowl', 'food storage for pet', 300, 'C:\\xampp\\htdocs\\html\\EndSemProj\\PRODUCTS\\pet_bowl.jpg'),
('955edb8c-1ee3-11f0-ae5e-30e1718b7983', 'Cat Chain (Pure Gold) colored into pink ', NULL, 10000, 'C:\\xampp\\htdocs\\html\\EndSemProj\\PRODUCTS\\cat\\cat chain.jpg'),
('9b4ac45e-1f4f-11f0-884d-30e1718b7983', 'white spot cure (fish medicine)', 'cures the diseases of fishes and also disorders or infection sdue to eggs', 600, 'C:\\xampp\\htdocs\\html\\EndSemProj\\PRODUCTS\\fish\\fish medicine.jpg'),
('b77f46f5-1f52-11f0-884d-30e1718b7983', 'wild bird food', 'Kaytee', 300, 'C:\\xampp\\htdocs\\html\\EndSemProj\\PRODUCTS\\bird\\Bird_food.jpg'),
('bea371f2-1fb6-11f0-86e3-30e1718b7983', 'dog play items', 'plaing items', 800, 'C:\\xampp\\htdocs\\html\\EndSemProj\\PRODUCTS\\dog\\dog play items.jpg'),
('c03ef59d-1f50-11f0-884d-30e1718b7983', 'Elfins -fish protien food', 'The Healthy guppy bits \r\nfish and sea protien', 500, 'C:\\xampp\\htdocs\\html\\EndSemProj\\PRODUCTS\\fish\\fish_protien.jpg'),
('c81f22ad-1f9a-11f0-901e-30e1718b7983', 'maxi junior foodie dog (select gold)', 'select gold company where quality and quantity matters', 300, 'C:\\xampp\\htdocs\\html\\EndSemProj\\PRODUCTS\\dog_food32.jpg'),
('cbd51207-1f4d-11f0-884d-30e1718b7983', 'fish Aquarium', 'Beautiful goodlooking glass aquarium', 1300, 'C:\\xampp\\htdocs\\html\\EndSemProj\\PRODUCTS\\fish\\fish_aquarium.jpg'),
('db5fea4a-1f51-11f0-884d-30e1718b7983', 'bird cage ', 'bird home ', 800, 'C:\\xampp\\htdocs\\html\\EndSemProj\\PRODUCTS\\bird\\bird_cage.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adopt`
--
ALTER TABLE `adopt`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `adopt_id_fk` (`Adopt_ID`),
  ADD KEY `product_id_fk` (`Product_ID`),
  ADD KEY `customer_id_fk` (`Customer_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `adopt_id_fk` FOREIGN KEY (`Adopt_ID`) REFERENCES `adopt` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_id_fk` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`ID`),
  ADD CONSTRAINT `product_id_fk` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
