-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2023 at 08:18 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yourhome`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicationstatus`
--

CREATE TABLE `applicationstatus` (
  `id` int(11) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `applicationstatus`
--

INSERT INTO `applicationstatus` (`id`, `status`) VALUES
(111111, 'under consideration'),
(222222, 'declined'),
(333333, 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `homeowner`
--

CREATE TABLE `homeowner` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homeowner`
--

INSERT INTO `homeowner` (`id`, `name`, `phone_number`, `email_address`, `password`) VALUES
(11, 'Bader Ali', 501198750, 'Bader@gmail.com', '$2y$10$AGcwSnVRhsGMprSR0y095u/qWjnmMYavsXKVgtKIWDd5rtKhtwKa.'),
(22, 'Fahad Noor', 505574354, 'Fahad@gmail.com', '$2y$10$4JOCr8XUTRmekrYvU8X/8u0tfBPEubfKTSfPJRALGZYLZBaoqSRU2'),
(33, 'Sara Faisal', 501174460, 'Sara@gmail.com', '$2y$10$hF8aeIsJtmA2vcXgj6m3SuxOrc2L.wurtyexIDCAYRDOaxpkoJJbC');

-- --------------------------------------------------------

--
-- Table structure for table `homeseeker`
--

CREATE TABLE `homeseeker` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `family_members` int(11) NOT NULL,
  `income` int(11) NOT NULL,
  `job` varchar(200) NOT NULL,
  `phone_number` int(100) NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homeseeker`
--

INSERT INTO `homeseeker` (`id`, `first_name`, `last_name`, `age`, `family_members`, `income`, `job`, `phone_number`, `email_address`, `password`) VALUES
(1, 'Abdullah', 'Othman', 25, 3, 10000, 'Teacher', 501111111, 'Abdullah@gmail.com', '$2y$10$5LzqFyvaQRZahRf6kJJi6uYCX.ddNDLEwVM8efY0itqRw5JpoHHjS'),
(2, 'Jaber', 'Ahmad', 40, 6, 20000, 'Engineer', 501123354, 'Jaber1@gmail.com', '$2y$10$DmlFJEKaQ1213UUDtwf03.30DSSbiEuQz8qWwuSGtHmNhnxQvtdVi'),
(3, 'Mohammad', 'Saleh', 30, 5, 20000, 'Software Engineering', 501176550, 'Mohammad@gmail.com', '$2y$10$uddY.ebgXXuBEH94L4UnGeZ5JOQQrFoshK4rInMNnE8jkPnYtxdTC');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` int(11) NOT NULL,
  `homeowner_id` int(11) NOT NULL,
  `property_category_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `rooms` int(11) NOT NULL,
  `rent_cost` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `max_tenants` int(11) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `homeowner_id`, `property_category_id`, `name`, `rooms`, `rent_cost`, `location`, `max_tenants`, `description`) VALUES
(1, 11, 11111, 'Home Plaza', 4, '2500/month', 'Riyadh, Al-Narjes District \r\n', 3, 'It consists of a master room, 1 bedroom, 2 bathrooms, and 1 living room'),
(2, 22, 22222, 'Holiday Villa', 6, '7000/month', 'Riyadh, Al-Aqeeq District', 5, 'The apartment is distinguished by its legendary views of the main street, it consists of a master room, 2 bedroom, 3 bathrooms, and 3 living rooms.'),
(3, 33, 33333, 'Al Nakheel home', 7, '7000/month', 'Riyadh, Al-Nakheel District', 6, 'It consists of a master room, 3 bedroom, 4 bathrooms, and 3 living rooms.');

-- --------------------------------------------------------

--
-- Table structure for table `propertycategory`
--

CREATE TABLE `propertycategory` (
  `id` int(11) NOT NULL,
  `category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `propertycategory`
--

INSERT INTO `propertycategory` (`id`, `category`) VALUES
(11111, 'Apartment'),
(22222, 'Villa'),
(33333, 'Delux');

-- --------------------------------------------------------

--
-- Table structure for table `propertyimage`
--

CREATE TABLE `propertyimage` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `path` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `propertyimage`
--

INSERT INTO `propertyimage` (`id`, `property_id`, `path`) VALUES
(1, 1, 'pro1F.jpg'),
(2, 1, 'pro1S.jpg'),
(3, 2, 'pro2F.jpg'),
(4, 2, 'pro2S.jpg'),
(5, 3, 'pro3F.jpg'),
(6, 3, 'pro3S.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rentalapplication`
--

CREATE TABLE `rentalapplication` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `home_seeker_id` int(11) NOT NULL,
  `application_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rentalapplication`
--

INSERT INTO `rentalapplication` (`id`, `property_id`, `home_seeker_id`, `application_status_id`) VALUES
(1, 1, 1, 111111),
(2, 2, 2, 222222),
(3, 3, 3, 333333);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicationstatus`
--
ALTER TABLE `applicationstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homeowner`
--
ALTER TABLE `homeowner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homeseeker`
--
ALTER TABLE `homeseeker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`),
  ADD KEY `homeowner_id` (`homeowner_id`),
  ADD KEY `property_category_id` (`property_category_id`);

--
-- Indexes for table `propertycategory`
--
ALTER TABLE `propertycategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `propertyimage`
--
ALTER TABLE `propertyimage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `rentalapplication`
--
ALTER TABLE `rentalapplication`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `home_seeker_id` (`home_seeker_id`),
  ADD KEY `application_status_id` (`application_status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `propertyimage`
--
ALTER TABLE `propertyimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rentalapplication`
--
ALTER TABLE `rentalapplication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`homeowner_id`) REFERENCES `homeowner` (`id`),
  ADD CONSTRAINT `property_ibfk_2` FOREIGN KEY (`property_category_id`) REFERENCES `propertycategory` (`id`);

--
-- Constraints for table `propertyimage`
--
ALTER TABLE `propertyimage`
  ADD CONSTRAINT `propertyimage_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `property` (`id`);

--
-- Constraints for table `rentalapplication`
--
ALTER TABLE `rentalapplication`
  ADD CONSTRAINT `rentalapplication_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `property` (`id`),
  ADD CONSTRAINT `rentalapplication_ibfk_2` FOREIGN KEY (`home_seeker_id`) REFERENCES `homeseeker` (`id`),
  ADD CONSTRAINT `rentalapplication_ibfk_3` FOREIGN KEY (`application_status_id`) REFERENCES `applicationstatus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
