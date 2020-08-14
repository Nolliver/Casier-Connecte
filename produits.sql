-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 10 août 2020 à 18:48
-- Version du serveur :  5.7.17
-- Version de PHP :  7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `InventaireAntoine`
--

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(2) DEFAULT NULL,
  `nom` varchar(22) DEFAULT NULL,
  `emplacement` int(2) DEFAULT NULL,
  `categorie` varchar(25) DEFAULT NULL,
  `sous_categorie` varchar(23) DEFAULT NULL,
  `longueur` varchar(4) DEFAULT NULL,
  `quantite` int(1) DEFAULT NULL,
  `taille` varchar(4) DEFAULT NULL,
  `type` varchar(12) DEFAULT NULL,
  `nom_icone` varchar(16) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `emplacement`, `categorie`, `sous_categorie`, `longueur`, `quantite`, `taille`, `type`, `nom_icone`) VALUES
(1, 'Vis', 1, 'Quincaillerie', 'vis a filetage metrique', '16', 1, 'M3', 'tete fraisee', 'tete fraisee.jpg'),
(2, 'Vis', 1, 'Quincaillerie', 'vis a filetage metrique', '20', 1, 'M4', 'tete fraisee', 'tete fraisee.jpg'),
(3, 'Vis', 1, 'Quincaillerie', 'vis a filetage metrique', '20', 1, 'M5', 'tete fraisee', 'tete fraisee.jpg'),
(4, 'Vis', 2, 'Quincaillerie', 'vis a filetage metrique', '80', 1, 'M6', 'tete CHC', 'CHC.jpg'),
(5, 'Vis', 3, 'Quincaillerie', 'vis a filetage metrique', '30', 1, 'M12', 'tete BHC', 'BHC.jpg'),
(6, 'Rondelle', 4, 'Quincaillerie', 'Rondelle', '', 1, 'M8', '', 'rondelle.jpg'),
(7, 'Vis', 5, 'Quincaillerie', 'vis a bois', '80', 1, '6', 'tete fraisee', 'tete fraisee.jpg'),
(8, 'Vis', 6, 'Quincaillerie', 'vis a filetage metrique', '70', 1, 'M4', 'tete fendue', 'sans photo.jpg'),
(9, 'Vis', 7, 'Quincaillerie', 'vis a filetage metrique', '45', 1, 'M8', 'tete CHC', 'CHC.jpg'),
(10, 'Vis', 9, 'Quincaillerie', 'vis a filetage metrique', 'Vrac', 1, 'M3', 'Vrac', 'sans photo.jpg'),
(11, 'Ecrou', 10, 'Quincaillerie', 'Ecrou Nylstop', '', 1, 'M10', '', ''),
(12, 'Ecrou', 10, 'Quincaillerie', 'Ecrou', '', 1, 'M6', '', ''),
(13, 'Ecrou', 11, 'Quincaillerie', 'Manchon', '20', 1, 'M5', '', ''),
(14, 'Ecrou', 11, 'Quincaillerie', 'Manchon', '20', 1, 'M4', '', ''),
(15, 'Ecrou', 11, 'Quincaillerie', 'Manchon', '30', 1, 'M6', '', ''),
(16, 'Chaine', 12, 'Transmission de puissance', 'Chaine', '', 1, '', '', ''),
(17, 'Accouplement elastique', 13, 'Transmission de puissance', 'Accouplement elastique', '', 1, '6-8', '', ''),
(18, 'Roulement lineaire', 13, 'Transmission de puissance', 'Roulement lineaire', '', 1, '10', '', ''),
(19, 'Roulement lineaire', 13, 'Transmission de puissance', 'Roulement lineaire', '', 1, '8', '', ''),
(20, 'Vis pression', 13, 'Quincaillerie', 'vis pression', 'Vrac', 1, 'Vrac', 'Vrac', ''),
(21, 'Files rapportes', 14, 'Outils', 'Filets rapportes', '', 1, 'M6', '', ''),
(22, 'Dominos', 15, 'Composants electroniques', 'Dominos', 'Vrac', 1, 'Vrac', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
