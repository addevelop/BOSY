-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 27 juin 2023 à 08:32
-- Version du serveur : 8.0.31
-- Version de PHP : 8.1.13

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
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` int NOT NULL,
  `city` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `modifed_at` timestamp NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `activate` tinyint(1) NOT NULL,
  `ID_user` int NOT NULL,
  PRIMARY KEY (`ID_address`),
  KEY `address_users0_FK` (`ID_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `administration`
--

DROP TABLE IF EXISTS `administration`;
CREATE TABLE IF NOT EXISTS `administration` (
  `ID_administration` int NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `administration` int NOT NULL,
  `description` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `basket`
--

INSERT INTO `basket` (`ID_basket`, `ID_product`, `ID_user`, `quantity`) VALUES
(82, 2, 4, 10),
(83, 1, 9, 0),
(84, 2, 9, 13),
(85, 1, 8, 8);

-- --------------------------------------------------------

--
-- Structure de la table `basket_order`
--

DROP TABLE IF EXISTS `basket_order`;
CREATE TABLE IF NOT EXISTS `basket_order` (
  `ID_basket_order` int NOT NULL AUTO_INCREMENT,
  `numero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_product` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `quantity` int NOT NULL,
  `ID_user` int NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`ID_basket_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `ID_brands` int NOT NULL AUTO_INCREMENT,
  `brands` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `categorie` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `numero` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `ID_user` int NOT NULL,
  `ID_status_order` int NOT NULL,
  PRIMARY KEY (`ID_order`),
  UNIQUE KEY `orders_status_orders0_AK` (`ID_status_order`),
  KEY `orders_users0_FK` (`ID_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `ID_product` int NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'Air Jordan 4', 'Air Jordan 4 retro yellow new collection', 239, '2023-06-05', '2023-06-05', 1, 3, 3, 10),
(2, 'Air force 1', 'Air force custom', 170, '2023-06-05', '2023-06-05', 1, 1, 1, 13);

-- --------------------------------------------------------

--
-- Structure de la table `status_orders`
--

DROP TABLE IF EXISTS `status_orders`;
CREATE TABLE IF NOT EXISTS `status_orders` (
  `ID_status_order` int NOT NULL AUTO_INCREMENT,
  `status` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `firstname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Contraintes pour la table `delivred_at`
--
ALTER TABLE `delivred_at`
  ADD CONSTRAINT `delivred_at_status_orders0_FK` FOREIGN KEY (`ID_status_order`) REFERENCES `status_orders` (`ID_status_order`);

--
-- Contraintes pour la table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_products0_FK` FOREIGN KEY (`ID_product`) REFERENCES `products` (`ID_product`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_status_orders1_FK` FOREIGN KEY (`ID_status_order`) REFERENCES `status_orders` (`ID_status_order`),
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
