-- phpMyAdmin SQL Dump
-- version 5.0.4deb2ubuntu5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 20 jan. 2022 à 16:03
-- Version du serveur :  10.5.13-MariaDB-0ubuntu0.21.10.1
-- Version de PHP : 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `raminagrobis`
--

-- --------------------------------------------------------

--
-- Structure de la table `formulaires`
--

CREATE TABLE `formulaires` (
  `id` int(11) UNSIGNED NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `imgsrc` varchar(255) NOT NULL,
  `couleur` varchar(6) NOT NULL,
  `date_evenement` date NOT NULL,
  `date_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formulaires`
--

INSERT INTO `formulaires` (`id`, `titre`, `description`, `imgsrc`, `couleur`, `date_evenement`, `date_fin`) VALUES
(1, 'Bonjour', 'bienvenue sur le journal tous sur les jeux, aujourd\'hui le prix de la XBOX 360 est baissé à cent nonante neuf euros.', 'velo.png', 'E4E4E4', '2021-12-12', '2022-12-28'),
(2, 'Aurevoir', 'AAAAAAAAAAAAA le caca lol trop marrant', 'voiture.jpg', '96ffee', '2022-01-18', '2022-01-17');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE `personnes` (
  `id` int(11) UNSIGNED NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `civilite` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `numfixe` int(10) DEFAULT NULL,
  `numportable` int(10) DEFAULT NULL,
  `nbr_personne` int(100) NOT NULL DEFAULT 1,
  `newsletter` tinyint(1) NOT NULL,
  `pro` tinyint(1) NOT NULL,
  `nom_entreprise` varchar(100) DEFAULT NULL,
  `id_formulaire` int(11) UNSIGNED NOT NULL,
  `id_secteur` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `secteur`
--

CREATE TABLE `secteur` (
  `id` int(11) UNSIGNED NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `secteur`
--

INSERT INTO `secteur` (`id`, `nom`) VALUES
(2, 'Banque et assurance'),
(3, 'Bois, papier, carton, imprimerie'),
(4, 'BTP, matériaux de construction'),
(5, 'Chimie, parachimie'),
(6, 'Commerce, négoce, distribution'),
(7, 'Edition, communication, multimédia'),
(8, 'Electronique, électricité'),
(9, 'Industrie pharmaceutique'),
(11, 'Machines et équipements, automobile'),
(12, 'Métallurgie, travail du métal'),
(13, 'Plastique, caoutchouc'),
(14, 'Service aux entreprises'),
(15, 'Textile, habillement, chaussure'),
(21, 'Agroalimentaire'),
(22, 'Informatique, télécoms'),
(23, 'Transport, logistique');

-- --------------------------------------------------------

--
-- Structure de la table `secteursparformulaires`
--

CREATE TABLE `secteursparformulaires` (
  `id_formulaires` int(10) UNSIGNED NOT NULL,
  `id_secteurs` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `secteursparformulaires`
--

INSERT INTO `secteursparformulaires` (`id_formulaires`, `id_secteurs`) VALUES
(1, 2),
(2, 14);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `formulaires`
--
ALTER TABLE `formulaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_personnes_formulaire_id` (`id_formulaire`),
  ADD KEY `FK_personnes_secteur_id` (`id_secteur`);

--
-- Index pour la table `secteur`
--
ALTER TABLE `secteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `secteursparformulaires`
--
ALTER TABLE `secteursparformulaires`
  ADD KEY `FK_spf_formulaire_id` (`id_formulaires`),
  ADD KEY `FK_spf_secteur_id` (`id_secteurs`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `formulaires`
--
ALTER TABLE `formulaires`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `personnes`
--
ALTER TABLE `personnes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `secteur`
--
ALTER TABLE `secteur`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD CONSTRAINT `FK_personnes_formulaire_id` FOREIGN KEY (`id_formulaire`) REFERENCES `formulaires` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_personnes_secteur_id` FOREIGN KEY (`id_secteur`) REFERENCES `secteur` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `secteursparformulaires`
--
ALTER TABLE `secteursparformulaires`
  ADD CONSTRAINT `FK_spf_formulaire_id` FOREIGN KEY (`id_formulaires`) REFERENCES `formulaires` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_spf_secteur_id` FOREIGN KEY (`id_secteurs`) REFERENCES `secteur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
