-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 28 août 2023 à 20:56
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
-- Base de données : `mini-jeu`
--

-- --------------------------------------------------------

--
-- Structure de la table `pwdreset`
--

DROP TABLE IF EXISTS `pwdreset`;
CREATE TABLE IF NOT EXISTS `pwdreset` (
  `pwdResetId` int NOT NULL AUTO_INCREMENT,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` text NOT NULL,
  `pwdResetExpires` text NOT NULL,
  PRIMARY KEY (`pwdResetId`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `pwdreset`
--

INSERT INTO `pwdreset` (`pwdResetId`, `pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES
(4, 'fsgfs@gmail.fr', '534c95a43ddd3500', '$2y$10$.84tSfbLD9AVO8Bz5Y3SmOUatkW7caMbNWxdS7HOOMLcn92tWqcWK', '1692968969');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `usersId` int NOT NULL AUTO_INCREMENT,
  `usersName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersUid` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL,
  PRIMARY KEY (`usersId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersUid`, `usersPwd`) VALUES
(1, 'Mika Manttari', 'mika348@live.fr', 'mika348', '$2y$10$RO5br7LnTnoQdscalbkwM.MmCV3LQsHlFbU6PED3CD3HCqf3wxVV6'),
(7, 'Emeline Flores', 'flores.emeline@gmail.com', 'emystere', '$2y$10$aUZKXbuI/Exami60PdqIieYTKl2CM4oi6Nvsr.A/PkvezT/Eu.vja');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
