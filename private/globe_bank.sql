-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 02 déc. 2019 à 00:17
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `globe_bank`
--

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
                         `id` int(11) NOT NULL,
                         `subject_id` int(11) DEFAULT NULL,
                         `menu_name` varchar(255) DEFAULT NULL,
                         `position` int(3) DEFAULT NULL,
                         `visible` tinyint(1) DEFAULT NULL,
                         `content` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pages`
--

INSERT INTO `pages` (`id`, `subject_id`, `menu_name`, `position`, `visible`, `content`) VALUES
(1, 1, 'Globe Bank', 1, 1, NULL),
(2, 1, 'History', 2, 1, NULL),
(3, 1, 'Leadership', 3, 1, NULL),
(4, 1, 'Contact Us', 4, 1, NULL),
(5, 2, 'Banking', 1, 1, NULL),
(6, 2, 'Credit Cards', 2, 1, NULL),
(7, 2, 'Mortgages', 3, 1, NULL),
(8, 3, 'Checking', 1, 1, NULL),
(9, 3, 'Loans', 2, 1, NULL),
(10, 3, 'Merchant Services', 3, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `subjects`
--

CREATE TABLE `subjects` (
                            `id` int(11) NOT NULL,
                            `menu_name` varchar(255) DEFAULT NULL,
                            `position` int(3) DEFAULT NULL,
                            `visible` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `subjects`
--

INSERT INTO `subjects` (`id`, `menu_name`, `position`, `visible`) VALUES
(1, 'About Globe Bank', 1, 1),
(2, 'Consumer', 2, 1),
(3, 'Small Business', 3, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
    ADD PRIMARY KEY (`id`),
    ADD KEY `fk_subject_id` (`subject_id`);

--
-- Index pour la table `subjects`
--
ALTER TABLE `subjects`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `subjects`
--
ALTER TABLE `subjects`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
