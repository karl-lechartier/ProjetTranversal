-- phpMyAdmin SQL Dump
-- version 5.0.4deb2ubuntu5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 03 fév. 2022 à 19:18
-- Version du serveur :  10.5.13-MariaDB-0ubuntu0.21.10.1
-- Version de PHP : 8.0.15

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
  `couleur` varchar(7) NOT NULL,
  `date_evenement` date NOT NULL,
  `date_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formulaires`
--

INSERT INTO `formulaires` (`id`, `titre`, `description`, `imgsrc`, `couleur`, `date_evenement`, `date_fin`) VALUES
(78, 'La ville du 21ème siècle', 'Rejoignez-nous pour participez à cette journée de conférences et d\'ateliers à propos des villes de demain. Le jeudi 15 septembre 2022 de 14h à 20h à la cité des Congrès Nantes. De l\'immobilier aux réseaux de transport en passant par l\'écologie et l\'urbanisation venez parlez, vous entretenir et partager vos avis avec des professionnelles du domaine.', '78-fond.jpg', '#5df8ca', '2022-09-15', '2022-04-10'),
(79, 'Webisland', 'Conférences dans la chambre magmatique, déjeuner au bord du cratère & networking les pieds dans la roche volcanique… le volcan de Webisland vous ouvre ses portes !\r\n\r\nLaissez-vous guider par nos speakers, experts de leur domaine, qui vous partageront retour d’expérience et meilleurs tips autour de nos 3 thèmes phares : l’Acquisition, la Transformation et la Data. Annonceurs, agences, freelances, étudiants, on vous attend !', '79-webisland.png', '#ff4d55', '2022-04-01', '2022-03-20'),
(80, 'Banque, finance et assurance : enjeux et perspectives de l\'innovation', 'Le secteur bancaire et assurantiel fait face à un renouveau. Alors que l’ère du numérique laisse progressivement place à l’ère du cognitif, le succès est intrinsèquement lié à une transformation qui permet l’intégration d’outils d’analyse avancés, de l’intelligence artificielle, du machine learning, de la robotique, des blockchains, et bien d’autres encore.', '80-banque.jpg', '#e6e6e6', '2022-03-11', '2022-03-11'),
(81, 'Eurobois', 'Vous êtes agenceur, charpentier, ébéniste, menuisiers, exploitant forestier, une collectivité, un prescripteur, un industriel du meuble... visiter ce salon d\'affaires afin de développer vos réseaux, rencontrer des professionnels qualifiés et générer des opportunités de business. TROUVEZ TOUTES LES SOLUTIONS SUR EUROBOIS !', '81-eurobois.jpg', '#ff6633', '2022-06-14', '2022-04-13'),
(82, 'Faire construire sa maison', 'Vous rêvez de Faire construire votre Maison c\'est LE rendez-vous à ne pas manquer\r\n\r\nVous rencontrerez les acteurs majeurs du marché : constructeurs, aménageurs fonciers, architectes, banques et organismes de prêt.\r\n\r\nTrois jours exclusivement dédiés à  la maison neuve qui seront également rythmés par des conférences. Ces sessions d\'informations sont organisées sous forme d\'échange avec le public, sur les thêmes essentiels de la maison.', '82-maison.jpg', '#81db7b', '2022-09-27', '2022-07-18'),
(83, 'Avantex', 'Avantex Paris est le 1er salon international dédié à l\'innovation dans l\'industrie du textile et de la mode.\r\n\r\nIl intègre, de la conception à la vente au détail: tissus, matériaux, composants, produits et services innovants pour la mode.', '83-avantex.jpg', '#f4f745', '2022-02-07', '2022-02-07'),
(84, 'JEC World', 'JEC World vous invite à rejoindre le plus grand salon des composites au monde couvrant toute la chaîne de valeur des composites, des matières premières aux processeurs, en passant par les produits finis.\r\n\r\nSi votre entreprise travaille dans les domaines de l\'automobile, de l\'aérospatiale, du ferroviaire, du bâtiment et génie civil, de l\'énergie durable, des sports et loisirs, de la médecine…', '84-jecworld.png', '#549bde', '2022-03-09', '2022-03-07'),
(85, 'Automedon', 'Venez découvrir les plus beaux véhicules de collection du 20ème siècle. \r\n\r\nCitroen, Peugeot, Ford... Le salon célèbre l\'histoire de ces multi-nationales françaises et étrangères et nous fait redécouvrir les voitures et motos que conduisaient nos grands-parents. Les modèles oubliés ressortent du garage, le temps de deux jours d\'octobre.\r\n\r\nAmbiance rétro et vintage assurée, pour émerveiller les grands et les petits !', '85-Automedon.jpg', '#fd4949', '2022-10-10', '2022-10-07');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE `personnes` (
  `id` int(100) UNSIGNED NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `civilite` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `numportable` int(100) DEFAULT NULL,
  `nbr_personne` int(100) NOT NULL DEFAULT 1,
  `newsletter` tinytext DEFAULT NULL,
  `pro` tinytext DEFAULT NULL,
  `nom_entreprise` varchar(100) DEFAULT NULL,
  `id_formulaire` int(11) UNSIGNED DEFAULT NULL,
  `id_secteur` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`id`, `nom`, `prenom`, `civilite`, `email`, `numportable`, `nbr_personne`, `newsletter`, `pro`, `nom_entreprise`, `id_formulaire`, `id_secteur`) VALUES
(1, 'Bernard', 'Jean', 'homme', 'jean.bernard@gmail.com', 647612548, 1, 'true', NULL, '', 83, 1),
(2, 'Rolland', 'Cassandre', 'femme', 'cassandre.rolland@gmail.com', 743175888, 3, NULL, 'true', 'Au Bon Coton', 83, 15),
(3, 'Leger', 'Henri', 'homme', 'henri.pro@gmail.com', 684956284, 1, 'true', 'true', 'Eastpak', 83, 15),
(4, 'Pichon', 'Camille', 'homme', 'caPi@outlook.com', 644558437, 5, NULL, NULL, '', 83, 1);

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
(1, 'Aucun secteur'),
(2, 'Banque et assurance'),
(3, 'Bois, papier, carton, imprimerie'),
(4, 'BTP, matériaux de construction'),
(5, 'Chimie, parachimie'),
(6, 'Commerce, négoce, distribution'),
(7, 'Edition, communication, multimédia'),
(8, 'Electronique, électricité'),
(9, 'Industrie pharmaceutique'),
(12, 'Métallurgie, travail du métal'),
(13, 'Plastique, caoutchouc'),
(14, 'Service aux entreprises'),
(15, 'Textile, habillement, chaussure'),
(21, 'Agroalimentaire'),
(22, 'Informatique, télécoms'),
(23, 'Transport, logistique'),
(31, 'Machines et équipements, automobile	');

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
(78, 4),
(79, 22),
(80, 2),
(81, 3),
(82, 4),
(83, 15),
(84, 13),
(85, 31);

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT pour la table `personnes`
--
ALTER TABLE `personnes`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `secteur`
--
ALTER TABLE `secteur`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
