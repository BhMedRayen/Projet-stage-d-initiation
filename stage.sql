-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 06 mars 2023 à 12:59
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `stage`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `mail`, `password`) VALUES
(0, '', '123'),
(1, 'rayenmohamed2310@gmail.com', '123');

-- --------------------------------------------------------

--
-- Structure de la table `produit_magasin`
--

DROP TABLE IF EXISTS `produit_magasin`;
CREATE TABLE IF NOT EXISTS `produit_magasin` (
  `id_produit` int NOT NULL AUTO_INCREMENT,
  `code_article` varchar(50) NOT NULL,
  `Emplacement` varchar(20) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `code_mag` varchar(20) NOT NULL,
  `prix` double NOT NULL,
  `date_entree` date NOT NULL,
  `quantité` int NOT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produit_magasin`
--

INSERT INTO `produit_magasin` (`id_produit`, `code_article`, `Emplacement`, `designation`, `code_mag`, `prix`, `date_entree`, `quantité`) VALUES
(2, '5465468', 'dle,AGdzde', 'ezttesrbtrtgb', 'qfvreztbstrb', 16, '0006-12-13', 15),
(3, 'hhdsfbvljrsth ', 'LV.12.8', 'jeu coupelle extracteur sediment ref 10739', 'LAB', 102, '2023-03-13', 33),
(8, '656ze4dezd', 'fzeefj', 'fze!fkevugrtziuvb', 'LABzerze', 0, '0000-00-00', 15445);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
