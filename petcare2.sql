-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2023 at 10:01 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petcare2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `uname` varchar(20) NOT NULL,
  `upassword` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uname`, `upassword`) VALUES
('fay', 123456),
('ghadah', 123456),
('norah', 123456),
('shahad', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `pic` varchar(40) NOT NULL,
  `price` double NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `stock`, `pic`, `price`, `name`, `description`) VALUES
(1, 20, 'pic.JPG', 9, 'Golden Yellow Dog', 'Golden retrievers are smart, loyal dogs that are ideal family companions. With their gentle nature, shining coats.'),
(2, 44, 'dogfeeder.JPG', 11, 'Trixie Stainless Steel Bowl with rubber', 'Stainless Steel Bowl with rubber base 21cm base keep your pets food in one place with this sturdy stainless steel bowl.'),
(3, 50, 'dogfood.JPG', 25, 'Solid gold Dog Dry Food For Adults', 'Solid Gold Fit and Fabulous weight control dog food is a special product that offers a gluten-free and grain-free.'),
(4, 100, 'cattoy.JPG', 2, 'Penn Plax Cat 2\" Tennis ball', 'Keep your cats active with the Penn Plax Tennis Ball cat toy. Each toy has a rattle inside to keep your cats entertained'),
(5, 20, 'cattoy2.JPG', 30, 'Zolux Scratcher With Fishing Pole', 'Free-standing corner wall scratching post . This accessory will prevent your pet from scratching sofas or curtains.'),
(6, 30, 'catfood.JPG', 20, 'Kit Cat Complete Premium Dry Food', 'Omega3 & Omega6 - Supports Skin And Coat Health Hairball Control and no artificial colouring.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`uname`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
