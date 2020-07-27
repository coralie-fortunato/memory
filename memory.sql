-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 27 juil. 2020 à 08:51
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `memory`
--

-- --------------------------------------------------------

--
-- Structure de la table `score`
--

DROP TABLE IF EXISTS `score`;
CREATE TABLE IF NOT EXISTS `score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `niveau` varchar(255) NOT NULL,
  `nb_coup` int(11) NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `score`
--

INSERT INTO `score` (`id`, `id_utilisateur`, `niveau`, `nb_coup`, `time`) VALUES
(28, 1, '5 paires', 22, '00:00:29'),
(2, 1, '3 paires', 10, '09:30:37'),
(3, 1, '3paires', 17, '00:00:07'),
(4, 1, '3paires', 18, '00:00:07'),
(5, 1, '4paires', 14, '00:00:43'),
(6, 1, '4paires', 14, '00:00:18'),
(7, 1, '4paires', 14, '00:00:32'),
(8, 1, '4paires', 15, '00:00:32'),
(9, 1, '4paires', 16, '00:00:32'),
(10, 1, '4paires', 24, '00:00:36'),
(11, 1, '4paires', 10, '00:00:08'),
(12, 1, '4paires', 14, '00:00:12'),
(13, 1, '4paires', 14, '00:00:12'),
(14, 1, '8 paires', 24, '00:00:28'),
(15, 1, '8 paires', 24, '00:00:28'),
(16, 1, '4 paires', 12, '00:00:10'),
(17, 1, '5 paires', 18, '00:00:17'),
(18, 1, '8 paires', 42, '00:00:49'),
(19, 1, '8 paires', 42, '00:00:49'),
(20, 1, '8 paires', 50, '00:00:57'),
(21, 1, '10 paires', 46, '00:01:26'),
(22, 1, '10 paires', 46, '00:01:26'),
(23, 1, '6 paires', 30, '00:00:35'),
(24, 1, '3 paires', 10, '00:00:08'),
(25, 1, '6 paires', 26, '00:00:34'),
(26, 1, '10 paires', 50, '00:01:11'),
(27, 1, '10 paires', 50, '00:01:18'),
(29, 1, '7 paires', 24, '00:00:53'),
(30, 2, '4 paires', 10, '00:00:20'),
(31, 2, '16 paires', 76, '00:02:47'),
(32, 2, '16 paires', 76, '00:02:47'),
(33, 2, '16 paires', 76, '00:02:47'),
(34, 2, '16 paires', 76, '00:02:47'),
(35, 2, '16 paires', 76, '00:02:47'),
(36, 2, '4 paires', 12, '00:00:18'),
(37, 2, '5 paires', 22, '00:00:35'),
(38, 2, '3 paires', 10, '00:00:16'),
(39, 2, '4 paires', 16, '00:00:16'),
(40, 2, '4 paires', 17, '00:00:16'),
(41, 2, '4 paires', 18, '00:00:16'),
(42, 2, '4 paires', 19, '00:00:16'),
(43, 2, '4 paires', 13, '00:00:11'),
(44, 2, '4 paires', 14, '00:00:20'),
(45, 2, '4 paires', 14, '00:00:14'),
(46, 2, '4 paires', 12, '00:00:11'),
(47, 2, '4 paires', 18, '00:00:55'),
(48, 2, '4 paires', 12, '00:00:15'),
(49, 2, '4 paires', 12, '00:00:10'),
(50, 2, '4 paires', 13, '00:00:10'),
(51, 2, '4 paires', 22, '00:00:21'),
(52, 2, '4 paires', 16, '00:00:15'),
(53, 2, '4 paires', 17, '00:00:15'),
(54, 2, '4 paires', 16, '00:00:19'),
(55, 2, '4 paires', 16, '00:00:14'),
(56, 2, '4 paires', 14, '00:00:10'),
(57, 2, '4 paires', 16, '00:00:18'),
(58, 2, '6 paires', 30, '00:00:37'),
(59, 2, '6 paires', 22, '00:00:23'),
(60, 2, '3 paires', 10, '00:00:08'),
(61, 2, '16 paires', 74, '00:02:50'),
(62, 2, '10 paires', 56, '00:01:36'),
(63, 2, '6 paires', 20, '00:00:26'),
(64, 2, '6 paires', 22, '00:03:06'),
(65, 2, '3 paires', 16, '00:00:17'),
(66, 2, '3 paires', 16, '00:00:17'),
(67, 2, '3 paires', 10, '00:00:26'),
(68, 2, '3 paires', 10, '00:00:11'),
(69, 2, '4 paires', 12, '00:00:08'),
(70, 2, '4 paires', 12, '00:00:12'),
(71, 2, '4 paires', 12, '00:00:12'),
(72, 2, '3 paires', 14, '00:00:19'),
(73, 2, '3 paires', 14, '00:00:19'),
(74, 2, '3 paires', 10, '00:00:09'),
(75, 2, '3 paires', 11, '00:00:09'),
(76, 2, '3 paires', 8, '00:00:24'),
(77, 2, '3 paires', 8, '00:00:11'),
(78, 2, '4 paires', 10, '00:00:09'),
(79, 2, '4 paires', 11, '00:00:09'),
(80, 2, '4 paires', 12, '00:00:09'),
(81, 2, '4 paires', 12, '00:00:09'),
(82, 2, '3 paires', 8, '00:00:28'),
(83, 2, '3 paires', 8, '00:00:06'),
(84, 2, '3 paires', 8, '00:00:05'),
(85, 2, '3 paires', 9, '00:00:05'),
(86, 2, '3 paires', 10, '00:00:05'),
(87, 2, '3 paires', 11, '00:00:05'),
(88, 2, '3 paires', 8, '00:00:07'),
(89, 2, '4 paires', 16, '00:00:15'),
(90, 2, '4 paires', 12, '00:00:11'),
(91, 2, '3 paires', 8, '00:00:15'),
(92, 2, '9 paires', 36, '00:00:53'),
(93, 2, '9 paires', 60, '00:01:23'),
(94, 2, '4 paires', 16, '00:00:18'),
(95, 2, '4 paires', 16, '00:01:04'),
(96, 2, '4 paires', 14, '00:00:34'),
(97, 2, '5 paires', 12, '00:00:31'),
(98, 2, '6 paires', 26, '00:01:16'),
(99, 2, '7 paires', 30, '00:02:25'),
(100, 2, '8 paires', 40, '00:02:19'),
(101, 2, '10 paires', 46, '00:03:24'),
(102, 2, '9 paires', 44, '00:02:29'),
(103, 2, '11 paires', 66, '00:04:48'),
(104, 2, '12 paires', 82, '00:05:21'),
(105, 2, '13 paires', 110, '00:08:06'),
(106, 2, '14 paires', 94, '00:05:35'),
(107, 2, '15 paires', 92, '00:06:23'),
(108, 2, '3 paires', 8, '00:00:46');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'user_test', ' aze'),
(2, 'coco', '$2y$10$..aXxCGEPy2DJODDiLZMJe.IevAqNaNxL3RBleWca7W7pDzw7uvg.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
