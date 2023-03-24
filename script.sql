-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 24 mars 2023 à 21:42
-- Version du serveur : 5.7.24
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion médiathèque`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherant`
--

CREATE TABLE `adherant` (
  `id_client` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `prenom_client` text NOT NULL,
  `nom_client` text NOT NULL,
  `adresse_client` varchar(40) NOT NULL,
  `email_client` varchar(50) NOT NULL,
  `tele_client` varchar(10) NOT NULL,
  `cin_client` varchar(20) NOT NULL,
  `naissance_client` date NOT NULL,
  `date_inscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type_client` text NOT NULL,
  `penalties` int(10) NOT NULL,
  `reservation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adherant`
--

INSERT INTO `adherant` (`id_client`, `username`, `password`, `prenom_client`, `nom_client`, `adresse_client`, `email_client`, `tele_client`, `cin_client`, `naissance_client`, `date_inscription`, `type_client`, `penalties`, `reservation`) VALUES
(1, 'username', 'password2', 'prenom_client', 'nom_client', 'adresse_client', 'email_client', '09876543', 'h76567', '2022-03-22', '2023-03-22 16:19:31', 'type_client', 0, 0),
(6, 'youssef2', 'trey', 'youssef', 'h2', 'dfgjhkm,l m', '2004072200191@ofppt-edu.ma', '0698989898', 'k567800', '2023-02-28', '2023-03-22 16:36:35', 'etudiant', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `gerant`
--

CREATE TABLE `gerant` (
  `id_gerant` int(11) NOT NULL,
  `nom_gerant` text NOT NULL,
  `prenom_gerant` text NOT NULL,
  `email_gerant` varchar(50) NOT NULL,
  `password_gerant` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gerant`
--

INSERT INTO `gerant` (`id_gerant`, `nom_gerant`, `prenom_gerant`, `email_gerant`, `password_gerant`) VALUES
(1, 'elbarodii', 'Rida', 'rida7@gmail.com', 'youssef2020'),
(2, 'bouyez', 'youssef', 'youssef@gmail.com', 'youssef');

-- --------------------------------------------------------

--
-- Structure de la table `ouvrage`
--

CREATE TABLE `ouvrage` (
  `id_ouvrage` int(11) NOT NULL,
  `titre_ouvrage` text NOT NULL,
  `auteur_ouvrage` text NOT NULL,
  `image_ouvrage` varchar(50) NOT NULL,
  `prix` int(10) NOT NULL,
  `etat_ouvrage` text NOT NULL,
  `type_ouvrage` text NOT NULL,
  `date_achat` date NOT NULL,
  `date_edition` date NOT NULL,
  `nombre_pages` int(50) NOT NULL,
  `situation` text NOT NULL,
  `id_gerant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ouvrage`
--

INSERT INTO `ouvrage` (`id_ouvrage`, `titre_ouvrage`, `auteur_ouvrage`, `image_ouvrage`, `prix`, `etat_ouvrage`, `type_ouvrage`, `date_achat`, `date_edition`, `nombre_pages`, `situation`, `id_gerant`) VALUES
(3, 'candide', 'pongloss', 'uploads/Screenshot (86).png', 400, 'bien', 'roman', '2023-03-17', '2023-03-02', 40, 'disponible', 1),
(4, 'dernière jour ', 'victor hugo', 'uploads/Screenshot (94).png', 809, 'bien', 'roman', '2023-03-22', '2023-03-24', 124, 'disponible', 1),
(5, 'split', 'fred', 'uploads/images (20).jpg', 345, 'bien', 'roman', '2023-03-22', '2023-03-20', 45, 'disponible', 2);

-- --------------------------------------------------------

--
-- Structure de la table `reserve`
--

CREATE TABLE `reserve` (
  `id_reserve` int(11) NOT NULL,
  `date_reserv` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_validation` datetime DEFAULT NULL,
  `date_retour` datetime DEFAULT NULL,
  `id_client` int(11) NOT NULL,
  `id_ouvrage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherant`
--
ALTER TABLE `adherant`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `gerant`
--
ALTER TABLE `gerant`
  ADD PRIMARY KEY (`id_gerant`);

--
-- Index pour la table `ouvrage`
--
ALTER TABLE `ouvrage`
  ADD PRIMARY KEY (`id_ouvrage`),
  ADD KEY `id_gerant` (`id_gerant`);

--
-- Index pour la table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`id_reserve`),
  ADD KEY `reserve_ibfk_1` (`id_ouvrage`),
  ADD KEY `id_client` (`id_client`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adherant`
--
ALTER TABLE `adherant`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `gerant`
--
ALTER TABLE `gerant`
  MODIFY `id_gerant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `ouvrage`
--
ALTER TABLE `ouvrage`
  MODIFY `id_ouvrage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `id_reserve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ouvrage`
--
ALTER TABLE `ouvrage`
  ADD CONSTRAINT `ouvrage_ibfk_1` FOREIGN KEY (`id_gerant`) REFERENCES `gerant` (`id_gerant`);

--
-- Contraintes pour la table `reserve`
--
ALTER TABLE `reserve`
  ADD CONSTRAINT `reserve_ibfk_1` FOREIGN KEY (`id_ouvrage`) REFERENCES `ouvrage` (`id_ouvrage`),
  ADD CONSTRAINT `reserve_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `adherant` (`id_client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
