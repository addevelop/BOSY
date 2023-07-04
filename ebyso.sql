-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 04 juil. 2023 à 15:39
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ebyso`
--

-- --------------------------------------------------------

--
-- Structure de la table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `ID_address` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` int NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modifed_at` timestamp NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `activate` int NOT NULL,
  `ID_user` int NOT NULL,
  PRIMARY KEY (`ID_address`),
  KEY `address_users0_FK` (`ID_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `address`
--

INSERT INTO `address` (`ID_address`, `title`, `address`, `zip_code`, `city`, `country`, `created_at`, `modifed_at`, `description`, `activate`, `ID_user`) VALUES
(2, 'home', '15 rue fleur', 75001, 'Paris', 'France', '2023-06-27', '0000-00-00 00:00:00', '', 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `administration`
--

DROP TABLE IF EXISTS `administration`;
CREATE TABLE IF NOT EXISTS `administration` (
  `ID_administration` int NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `administration` int NOT NULL,
  `description` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_administration`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `administration`
--

INSERT INTO `administration` (`ID_administration`, `title`, `administration`, `description`) VALUES
(1, 'Membre', 1, 'Membre');

-- --------------------------------------------------------

--
-- Structure de la table `basket`
--

DROP TABLE IF EXISTS `basket`;
CREATE TABLE IF NOT EXISTS `basket` (
  `ID_basket` int NOT NULL AUTO_INCREMENT,
  `ID_product` int NOT NULL,
  `ID_user` int NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`ID_basket`),
  KEY `ID_product` (`ID_product`),
  KEY `ID_user` (`ID_user`)
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `basket`
--

INSERT INTO `basket` (`ID_basket`, `ID_product`, `ID_user`, `quantity`) VALUES
(83, 1, 9, 0),
(84, 2, 9, 13),
(85, 1, 8, 8),
(144, 2, 4, 1),
(145, 1, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `basket_order`
--

DROP TABLE IF EXISTS `basket_order`;
CREATE TABLE IF NOT EXISTS `basket_order` (
  `ID_basket_order` int NOT NULL AUTO_INCREMENT,
  `numero` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_product` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `quantity` int NOT NULL,
  `ID_user` int NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_basket_order`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `basket_order`
--

INSERT INTO `basket_order` (`ID_basket_order`, `numero`, `ID_product`, `title`, `price`, `quantity`, `ID_user`, `created_at`) VALUES
(1, '9835653395', 2, 'Air force 1', 170, 10, 4, '2023-06-27'),
(2, '8109338813', 1, 'Air Jordan 4', 239, 1, 4, '2023-06-27'),
(3, '8109338813', 2, 'Air force 1', 170, 11, 4, '2023-06-27'),
(4, '7322208532', 1, 'Air Jordan 4', 239, 1, 4, '2023-06-27'),
(5, '4868054768', 1, 'Air Jordan 4', 239, 1, 4, '2023-06-27'),
(6, '0403369511', 1, 'Air Jordan 4', 239, 1, 4, '2023-06-27'),
(7, '9587378423', 1, 'Air Jordan 4', 239, 1, 4, '2023-06-27'),
(8, '9587378423', 2, 'Air force 1', 170, 11, 4, '2023-06-27'),
(9, '3309923268', 1, 'Air Jordan 4', 239, 9, 4, '2023-06-27'),
(10, '3309923268', 2, 'Air force 1', 170, 11, 4, '2023-06-27'),
(11, '3154415015', 1, 'Air Jordan 4', 239, 9, 4, '2023-06-27'),
(12, '3154415015', 2, 'Air force 1', 170, 11, 4, '2023-06-27'),
(13, '0433469963', 1, 'Air Jordan 4', 239, 1, 4, '2023-06-27'),
(14, '8404999956', 1, 'Air Jordan 4', 239, 1, 4, '2023-06-27'),
(15, '0821723630', 1, 'Air Jordan 4', 239, 1, 4, '2023-06-27'),
(16, '0821723630', 2, 'Air force 1', 170, 3, 4, '2023-06-27'),
(17, '2448383677', 1, 'Air Jordan 4', 239, 1, 4, '2023-06-27'),
(18, '0850067493', 1, 'Air Jordan 4', 239, 2, 4, '2023-06-27'),
(19, '0850067493', 2, 'Air force 1', 170, 2, 4, '2023-06-27'),
(20, '0791170735', 1, 'Air Jordan 4', 239, 1, 4, '2023-06-27'),
(21, '0791170735', 2, 'Air force 1', 170, 1, 4, '2023-06-27'),
(22, '0229904294', 1, 'Air Jordan 4', 239, 3, 4, '2023-06-27'),
(23, '0229904294', 2, 'Air force 1', 170, 6, 4, '2023-06-27'),
(24, '3115153385', 1, 'Air Jordan 4', 239, 1, 4, '2023-06-27'),
(25, '3115153385', 2, 'Air force 1', 170, 1, 4, '2023-06-27'),
(26, '1496881362', 1, 'Air Jordan 4', 239, 1, 4, '2023-06-28'),
(27, '1496881362', 2, 'Air force 1', 170, 1, 4, '2023-06-28'),
(28, '7049626975', 1, 'Air Jordan 4', 239, 1, 4, '2023-06-28'),
(29, '7049626975', 2, 'Air force 1', 170, 1, 4, '2023-06-28'),
(30, '3973731410', 1, 'Air Jordan 4', 239, 1, 4, '2023-06-28'),
(31, '3973731410', 2, 'Air force 1', 170, 1, 4, '2023-06-28'),
(32, '3786417298', 2, 'Air force 1', 170, 2, 4, '2023-06-29'),
(33, '1856228198', 1, 'Air Jordan 4', 239, 1, 4, '2023-06-29'),
(34, '1856228198', 2, 'Air force 1', 170, 2, 4, '2023-06-29'),
(35, '0551217876', 1, 'Air Jordan 4', 239, 1, 4, '2023-06-29'),
(36, '0551217876', 2, 'Air force 1', 170, 1, 4, '2023-06-29'),
(37, '0554674857', 1, 'Air Jordan 4', 239, 1, 4, '2023-06-29'),
(38, '0554674857', 2, 'Air force 1', 170, 1, 4, '2023-06-29'),
(39, '0853512511', 1, 'Air Jordan 4', 239, 1, 4, '2023-06-29'),
(40, '0853512511', 2, 'Air force 1', 170, 1, 4, '2023-06-29'),
(41, '5585916696', 1, 'Air Jordan 4', 239, 1, 4, '2023-06-29'),
(42, '5585916696', 2, 'Air force 1', 170, 1, 4, '2023-06-29'),
(43, '8001426976', 1, 'Air Jordan 4', 239, 1, 4, '2023-06-29'),
(44, '8001426976', 2, 'Air force 1', 170, 2, 4, '2023-06-29'),
(45, '4736880494', 1, 'Air Jordan 4', 239, 1, 4, '2023-06-29'),
(46, '4736880494', 2, 'Air force 1', 170, 1, 4, '2023-06-29'),
(47, '4039753249', 1, 'Air Jordan 4', 239, 1, 4, '2023-06-29'),
(48, '4039753249', 2, 'Air force 1', 170, 1, 4, '2023-06-29'),
(49, '6645444841', 1, 'Air Jordan 4', 239, 1, 4, '2023-06-29'),
(50, '6645444841', 2, 'Air force 1', 170, 1, 4, '2023-06-29'),
(51, '1594621479', 1, 'Air Jordan 4', 239, 1, 4, '2023-06-29'),
(52, '1594621479', 2, 'Air force 1', 170, 1, 4, '2023-06-29'),
(53, '2438137165', 1, 'Air Jordan 4', 239, 1, 4, '2023-06-29'),
(54, '2438137165', 2, 'Air force 1', 170, 1, 4, '2023-06-29'),
(55, '6182029390', 1, 'Air Jordan 4', 239, 1, 4, '2023-06-29'),
(56, '6182029390', 2, 'Air force 1', 170, 1, 4, '2023-06-29'),
(57, '2662699658', 1, 'Air Jordan 4', 239, 1, 4, '2023-06-29'),
(58, '2662699658', 2, 'Air force 1', 170, 1, 4, '2023-06-29'),
(59, '0268741907', 1, 'Air Jordan 4', 239, 2, 4, '2023-06-29'),
(60, '0268741907', 2, 'Air force 1', 170, 2, 4, '2023-06-29'),
(61, '9036159893', 1, 'Air Jordan 4', 239, 1, 4, '2023-06-29'),
(62, '9036159893', 2, 'Air force 1', 170, 1, 4, '2023-06-29'),
(63, '6180158828', 1, 'Air Jordan 4', 239, 3, 4, '2023-06-29'),
(64, '6180158828', 2, 'Air force 1', 170, 1, 4, '2023-06-29'),
(65, '9389731649', 1, 'Air Jordan 4', 239, 2, 4, '2023-06-30'),
(66, '9389731649', 2, 'Air force 1', 170, 1, 4, '2023-06-30'),
(67, '9693958721', 1, 'Air Jordan 4', 239, 1, 4, '2023-06-30'),
(68, '9693958721', 2, 'Air force 1', 170, 1, 4, '2023-06-30');

-- --------------------------------------------------------

--
-- Structure de la table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `ID_brands` int NOT NULL AUTO_INCREMENT,
  `brands` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`ID_brands`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `brands`
--

INSERT INTO `brands` (`ID_brands`, `brands`, `created_at`) VALUES
(1, 'nike', '2023-06-05 18:34:34'),
(2, 'adidas', '2023-06-05 18:34:40'),
(3, 'jordan', '2023-06-05 18:34:46');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `ID_categorie` int NOT NULL AUTO_INCREMENT,
  `categorie` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`ID_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`ID_categorie`, `categorie`, `created_at`) VALUES
(1, 'custom', '2023-06-05 18:32:00'),
(2, 'Off-white', '2023-06-05 18:32:15'),
(3, 'classique', '2023-06-05 18:32:22');

-- --------------------------------------------------------

--
-- Structure de la table `delivred`
--

DROP TABLE IF EXISTS `delivred`;
CREATE TABLE IF NOT EXISTS `delivred` (
  `ID_delivred` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivred` int NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`ID_delivred`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `delivred`
--

INSERT INTO `delivred` (`ID_delivred`, `title`, `delivred`, `price`) VALUES
(1, 'A domicile (standart)', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `delivred_at`
--

DROP TABLE IF EXISTS `delivred_at`;
CREATE TABLE IF NOT EXISTS `delivred_at` (
  `ID_delivred` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `creadted_at` date NOT NULL,
  `modifed_at` date NOT NULL,
  `ID_status_order` int NOT NULL,
  PRIMARY KEY (`ID_delivred`),
  UNIQUE KEY `delivred_at_status_orders0_AK` (`ID_status_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `ID_image` int NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_product` int NOT NULL,
  PRIMARY KEY (`ID_image`),
  KEY `images_products0_FK` (`ID_product`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`ID_image`, `name`, `path`, `ID_product`) VALUES
(1, 'Air Jordan 4', 'AirJordan4RetroThunder_2023_5000x.png', 1),
(2, 'Air force 1', 'Nami5-Site.jpg', 2);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `ID_order` int NOT NULL AUTO_INCREMENT,
  `numero` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `ID_user` int NOT NULL,
  `status` int NOT NULL,
  `delivery` int NOT NULL,
  `total` float NOT NULL,
  `promo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID_order`),
  KEY `orders_users0_FK` (`ID_user`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`ID_order`, `numero`, `created_at`, `ID_user`, `status`, `delivery`, `total`, `promo`) VALUES
(1, '3191334858', '2023-06-27', 4, 0, 0, 0, ''),
(5, '7522743565', '2023-06-27', 4, 1, 0, 0, ''),
(6, '2153009081', '2023-06-27', 4, 1, 0, 0, ''),
(7, '5834792190', '2023-06-27', 4, 1, 0, 0, ''),
(8, '8109338813', '2023-06-27', 4, 1, 0, 0, ''),
(9, '9587378423', '2023-06-27', 4, 1, 0, 0, ''),
(10, '3309923268', '2023-06-27', 4, 1, 0, 0, ''),
(11, '3154415015', '2023-06-27', 4, 1, 0, 0, ''),
(12, '0821723630', '2023-06-27', 4, 1, 0, 0, ''),
(13, '2448383677', '2023-06-27', 4, 1, 0, 0, ''),
(14, '2926324270', '2023-06-27', 4, 1, 0, 0, ''),
(15, '4679004756', '2023-06-27', 4, 1, 0, 0, ''),
(16, '9119297977', '2023-06-27', 4, 1, 0, 0, ''),
(17, '6007132328', '2023-06-27', 4, 1, 0, 0, ''),
(18, '6582973076', '2023-06-27', 4, 1, 0, 0, ''),
(19, '0856576659', '2023-06-27', 4, 1, 0, 0, ''),
(20, '0925748461', '2023-06-27', 4, 1, 0, 0, ''),
(21, '5070016576', '2023-06-27', 4, 1, 0, 0, ''),
(22, '3243930495', '2023-06-27', 4, 1, 0, 0, ''),
(23, '0355970959', '2023-06-27', 4, 1, 0, 0, ''),
(24, '9480024144', '2023-06-27', 4, 1, 0, 0, ''),
(25, '7076341599', '2023-06-27', 4, 1, 0, 0, ''),
(26, '9205439846', '2023-06-27', 4, 1, 0, 0, ''),
(27, '5512576308', '2023-06-27', 4, 1, 0, 0, ''),
(28, '9137222503', '2023-06-27', 4, 1, 0, 0, ''),
(29, '6852503013', '2023-06-27', 4, 1, 0, 0, ''),
(30, '4493615900', '2023-06-27', 4, 1, 0, 0, ''),
(31, '8512831304', '2023-06-27', 4, 1, 0, 0, ''),
(32, '5827313645', '2023-06-27', 4, 1, 0, 0, ''),
(33, '2532027288', '2023-06-27', 4, 1, 0, 0, ''),
(34, '3318150846', '2023-06-27', 4, 1, 0, 0, ''),
(35, '1009669117', '2023-06-27', 4, 1, 0, 0, ''),
(36, '2073573647', '2023-06-27', 4, 1, 0, 0, ''),
(37, '5479123265', '2023-06-27', 4, 1, 0, 0, ''),
(38, '7808690245', '2023-06-27', 4, 1, 0, 0, ''),
(39, '3263489296', '2023-06-27', 4, 1, 0, 0, ''),
(40, '5729215871', '2023-06-27', 4, 1, 0, 0, ''),
(41, '3851738973', '2023-06-27', 4, 1, 0, 0, ''),
(42, '3608060072', '2023-06-27', 4, 1, 0, 0, ''),
(43, '9417570000', '2023-06-27', 4, 1, 0, 0, ''),
(44, '6993806137', '2023-06-27', 4, 1, 0, 0, ''),
(45, '3054233638', '2023-06-27', 4, 1, 0, 0, ''),
(46, '0850067493', '2023-06-27', 4, 1, 0, 0, ''),
(47, '3337117521', '2023-06-27', 4, 1, 0, 0, ''),
(48, '3368029966', '2023-06-27', 4, 1, 0, 0, ''),
(49, '8215916430', '2023-06-27', 4, 1, 0, 0, ''),
(50, '4883505603', '2023-06-27', 4, 1, 0, 0, ''),
(51, '0791170735', '2023-06-27', 4, 1, 0, 0, ''),
(52, '0229904294', '2023-06-27', 4, 1, 0, 0, ''),
(53, '0744883300', '2023-06-27', 4, 1, 0, 0, ''),
(54, '3115153385', '2023-06-27', 4, 1, 0, 0, ''),
(55, '1496881362', '2023-06-28', 4, 1, 0, 0, ''),
(56, '7049626975', '2023-06-28', 4, 1, 1, 0, ''),
(57, '3973731410', '2023-06-28', 4, 1, 1, 0, ''),
(58, '3786417298', '2023-06-29', 4, 1, 1, 0, ''),
(59, '1856228198', '2023-06-29', 4, 1, 1, 0, ''),
(60, '0551217876', '2023-06-29', 4, 1, 1, 0, ''),
(61, '0554674857', '2023-06-29', 4, 1, 1, 0, ''),
(62, '0853512511', '2023-06-29', 4, 1, 1, 0, ''),
(63, '5585916696', '2023-06-29', 4, 1, 1, 0, ''),
(64, '1266997875', '2023-06-29', 4, 1, 1, 0, ''),
(65, '8001426976', '2023-06-29', 4, 1, 1, 0, ''),
(66, '2888626238', '2023-06-29', 4, 1, 1, 0, ''),
(67, '4736880494', '2023-06-29', 4, 1, 1, 0, ''),
(68, '4039753249', '2023-06-29', 4, 1, 1, 0, ''),
(69, '6645444841', '2023-06-29', 4, 1, 1, 0, 'PROMO2022'),
(70, '1594621479', '2023-06-29', 4, 1, 1, 0, ''),
(71, '2438137165', '2023-06-29', 4, 1, 1, 0, NULL),
(72, '3833912791', '2023-06-29', 4, 1, 1, 0, NULL),
(73, '6371714620', '2023-06-29', 4, 1, 1, 0, NULL),
(74, '0573416273', '2023-06-29', 4, 1, 1, 0, NULL),
(75, '1859291219', '2023-06-29', 4, 1, 1, 0, NULL),
(76, '5870997255', '2023-06-29', 4, 1, 1, 0, NULL),
(77, '3807931274', '2023-06-29', 4, 1, 1, 0, NULL),
(78, '0688202599', '2023-06-29', 4, 1, 1, 0, NULL),
(79, '0268741907', '2023-06-29', 4, 1, 1, 0, 'PROMO2022'),
(80, '9036159893', '2023-06-29', 4, 1, 1, 0, 'PROMO2022'),
(81, '4084711218', '2023-06-29', 4, 1, 1, 0, 'PROMO2022'),
(82, '6180158828', '2023-06-29', 4, 1, 1, 887, NULL),
(83, '9389731649', '2023-06-30', 4, 1, 1, 648, NULL),
(84, '9693958721', '2023-06-30', 4, 1, 1, 409, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `ID_product` int NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `created_at` date NOT NULL,
  `modified_at` date NOT NULL,
  `activate` tinyint(1) NOT NULL,
  `ID_categorie` int NOT NULL,
  `ID_brands` int NOT NULL,
  `stock` int NOT NULL,
  PRIMARY KEY (`ID_product`),
  KEY `products_categories0_FK` (`ID_categorie`),
  KEY `products_brands1_FK` (`ID_brands`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`ID_product`, `title`, `description`, `price`, `created_at`, `modified_at`, `activate`, `ID_categorie`, `ID_brands`, `stock`) VALUES
(1, 'Air Jordan 4', 'Air Jordan 4 retro yellow new collection', 239, '2023-06-05', '2023-06-05', 1, 3, 3, 0),
(2, 'Air force 1', 'Air force custom', 170, '2023-06-05', '2023-06-05', 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `promo`
--

DROP TABLE IF EXISTS `promo`;
CREATE TABLE IF NOT EXISTS `promo` (
  `ID_promo` int NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promo` float NOT NULL,
  PRIMARY KEY (`ID_promo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `promo`
--

INSERT INTO `promo` (`ID_promo`, `code`, `promo`) VALUES
(1, 'PROMO2022', 10);

-- --------------------------------------------------------

--
-- Structure de la table `status_orders`
--

DROP TABLE IF EXISTS `status_orders`;
CREATE TABLE IF NOT EXISTS `status_orders` (
  `ID_status_order` int NOT NULL AUTO_INCREMENT,
  `status` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_status_order`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `status_orders`
--

INSERT INTO `status_orders` (`ID_status_order`, `status`, `title`) VALUES
(1, 1, 'En cours chez le fournisseur');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID_user` int NOT NULL AUTO_INCREMENT,
  `firstname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `activate` tinyint(1) NOT NULL,
  `created_at` date NOT NULL,
  `ID_administration` int NOT NULL,
  PRIMARY KEY (`ID_user`),
  KEY `users_administration0_FK` (`ID_administration`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID_user`, `firstname`, `lastname`, `email`, `mobile_phone`, `password`, `activate`, `created_at`, `ID_administration`) VALUES
(1, 'test', 'test', 'admin@gmail.com', '0606060606', 'Admin123!', 1, '2023-06-06', 1),
(2, 'test', 'test', 'admin@gmail.com', '0606060606', 'Admin123!', 1, '2023-06-06', 1),
(4, 'hello', 'hello', 'test@gmail.com', '0606060606', 'Admin123!', 1, '2023-06-07', 1),
(5, 'test', 'test', 'test1@gmail.com', '0606060606', 'Admin123!', 1, '2023-06-07', 1),
(6, 'test', 'test', 'yolo@gmail.com', '0606060606', 'Admin123!', 1, '2023-06-07', 1),
(7, 'test', 'test', 'test9000@gmail.com', '0606060606', 'Admin123!', 1, '2023-06-07', 1),
(8, 'adrien', 'adrien', 'adrien2001.rodrigues@gmail.com', '0606060606', 'Admin123!', 1, '2023-06-12', 1),
(9, 'first', 'last', 'first@gmail.com', '0606060606', 'Admin123!', 1, '2023-06-12', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_users0_FK` FOREIGN KEY (`ID_user`) REFERENCES `users` (`ID_user`);

--
-- Contraintes pour la table `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `users` (`ID_user`),
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`ID_product`) REFERENCES `products` (`ID_product`);

--
-- Contraintes pour la table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_products0_FK` FOREIGN KEY (`ID_product`) REFERENCES `products` (`ID_product`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_users0_FK` FOREIGN KEY (`ID_user`) REFERENCES `users` (`ID_user`);

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brands1_FK` FOREIGN KEY (`ID_brands`) REFERENCES `brands` (`ID_brands`),
  ADD CONSTRAINT `products_categories0_FK` FOREIGN KEY (`ID_categorie`) REFERENCES `categories` (`ID_categorie`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_administration0_FK` FOREIGN KEY (`ID_administration`) REFERENCES `administration` (`ID_administration`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
