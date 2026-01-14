-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 23 avr. 2025 à 21:51
-- Version du serveur : 10.11.6-MariaDB-0+deb12u1-log
-- Version de PHP : 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `e22110297_db1`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_association_ast`
--

CREATE TABLE `t_association_ast` (
  `url_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_association_ast`
--

INSERT INTO `t_association_ast` (`url_id`, `cat_id`) VALUES
(5, 2),
(6, 2);

-- --------------------------------------------------------

--
-- Structure de la table `t_categorie_cat`
--

CREATE TABLE `t_categorie_cat` (
  `cat_id` int(11) NOT NULL,
  `cat_titre` varchar(50) NOT NULL,
  `cat_statut` char(1) NOT NULL,
  `cat_date_ajout` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_categorie_cat`
--

INSERT INTO `t_categorie_cat` (`cat_id`, `cat_titre`, `cat_statut`, `cat_date_ajout`) VALUES
(2, 'Patisserie', 'G', '2025-04-18'),
(3, 'Viennoiseries', 'G', '2025-04-18'),
(4, 'Gâteaux', 'G', '2025-04-18'),
(5, 'Gateau', 'G', '2025-04-22'),
(6, 'patisserie', 'G', '2025-04-22'),
(7, 'patisserie', 'G', '2025-04-22'),
(8, 'patisserie', 'G', '2025-04-22'),
(9, 'Viennoiseries', 'G', '2025-04-22'),
(10, 'Viennoiseries', 'G', '2025-04-22'),
(11, 'Viennoiseries', 'G', '2025-04-22'),
(12, 'Gâteau', 'G', '2025-04-22'),
(13, 'Gâteau ', 'G', '2025-04-22'),
(14, 'Gâteau', 'G', '2025-04-22');

-- --------------------------------------------------------

--
-- Structure de la table `t_compte_cpt`
--

CREATE TABLE `t_compte_cpt` (
  `cpt_pseudo` varchar(100) NOT NULL,
  `cpt_mot_de_passe` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_compte_cpt`
--

INSERT INTO `t_compte_cpt` (`cpt_pseudo`, `cpt_mot_de_passe`) VALUES
('AlexT', 'f993addfbe5da30622496c7c88296592'),
('alice', '7abdccbea8473767e91378e37850d296'),
('amed122', 'c63c2205d60bdf63814e133aaead3b12'),
('CamilleD', '7eff6307d3870668ae362445a36cfdde'),
('elham', '807753657fa3e8c7391a1eefc2dd8d5e'),
('ellaR', 'elham1236'),
('ElodieF', 'fa6bf2eb4906f826b2ccd15d44c19687'),
('emili122', 'e10adc3949ba59abbe56e057f20f883e'),
('getionnaire1', '5533962e2f5addc1885fcee922524a6f'),
('JDupond', '55275abcc4761a3060c593f662197499'),
('jean ', 'b71985397688d6f1820685dde534981b'),
('kam', '11dcb8045cfadc01652fe1c694b70ccb'),
('lisa', 'ed14f4a4d7ecddb6dae8e54900300b1e'),
('LucieP', '642744ee23ffe1c609d64fd36649293f'),
('mehdi144', '1fc02971516356421ba421f2a521ad23'),
('MMartin', '2a3f48174d02f6c930d079b5bc14f3f6'),
('mv255', '7386a1fff7c09140365d22cc9d3710be'),
('NicolasR', '048ba65ab601ab4fc347d18a39ff8899'),
('PaulB', 'a0400164d37850d122b1b2cbdfa4e7ae'),
('SophieM', 'b6e648f03f7b6a0934e90ca7b4759111'),
('tamtam', '0b3ae07128c5df38748d4b75bdcc861d');

-- --------------------------------------------------------

--
-- Structure de la table `t_configuration_cfg`
--

CREATE TABLE `t_configuration_cfg` (
  `cfg_theme` char(60) NOT NULL,
  `cfg_date` date NOT NULL,
  `cfg_code` char(12) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `cfg_nom` varchar(80) NOT NULL,
  `cfg_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_configuration_cfg`
--

INSERT INTO `t_configuration_cfg` (`cfg_theme`, `cfg_date`, `cfg_code`, `cfg_nom`, `cfg_id`) VALUES
('Infoscreen de la boulangerie Paul', '2025-03-01', 'ellaR1256', 'JABER', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_information_inf`
--

CREATE TABLE `t_information_inf` (
  `inf_id` int(11) NOT NULL,
  `inf_texte` varchar(300) NOT NULL,
  `inf_date_ajout` date NOT NULL,
  `inf_fichier_image` varchar(150) NOT NULL,
  `inf_etat` char(1) NOT NULL,
  `cpt_pseudo` varchar(100) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_information_inf`
--

INSERT INTO `t_information_inf` (`inf_id`, `inf_texte`, `inf_date_ajout`, `inf_fichier_image`, `inf_etat`, `cpt_pseudo`, `cat_id`) VALUES
(1, 'Une remise de 20% sur les patisseries du moment', '2025-04-18', '', 'L', 'mv255', 2),
(2, 'Offre spéciale : 2 pains au chocolat pour le prix d\'un', '2025-04-18', '', 'L', 'ellaR', 3),
(4, 'Promotion 15% sur tous les gâteaux jusqu\'à la fin du mois', '2025-04-18', '', 'L', 'ellaR', 4),
(6, 'Découvrez nos croissants au beurre frais du matin', '2025-04-18', '', 'L', 'ellaR', 3),
(28, 'nouveau gateau aux fraises disponible en vitrine le premier juin ', '2025-04-22', '', 'L', 'ellaR', 5),
(29, 'une patiserie offerte pour tout formule étudiante ', '2025-04-22', '', 'L', 'ellaR', 6),
(30, 'Le choux Crème est arrivé!', '2025-04-22', '', 'L', 'ellaR', 7),
(32, 'la tropéziène à la framboise fait partie du produit de moment  !', '2025-04-22', '', 'L', 'ellaR', 8),
(33, 'n&#039;hésitez pas à essayer la nouvelle recette de grillé au pomme !', '2025-04-22', '', 'L', 'mv255', 9),
(34, 'la nouvelle tartes aux abricots une recette mérite d&#039;être essayée !', '2025-04-22', '', 'L', 'mv255', 10),
(35, 'Ne ratez moi la promotion sur le panier feuilleté choco-noisette ce soir !', '2025-04-22', '', 'L', 'mv255', 11),
(36, 'Le Pavlova du moment , une bonne idée pour un anniversaire !', '2025-04-22', '', 'L', 'sophieM', 12),
(37, 'le gâteau  au trois chocolats vit un grand succès! ', '2025-04-22', '', 'L', 'sophieM', 13),
(38, 'Avez-vous gouter le nouveau gâteau citron caramélé ,une recette qui éveille vos papilles !', '2025-04-22', '', 'L', 'sophieM', 14);

-- --------------------------------------------------------

--
-- Structure de la table `t_news_new`
--

CREATE TABLE `t_news_new` (
  `new_id` int(11) NOT NULL,
  `new_titre` varchar(50) NOT NULL,
  `new_texte` varchar(300) DEFAULT NULL,
  `new_date_de_publication` date NOT NULL,
  `new_etat` char(1) NOT NULL,
  `cpt_pseudo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_news_new`
--

INSERT INTO `t_news_new` (`new_id`, `new_titre`, `new_texte`, `new_date_de_publication`, `new_etat`, `cpt_pseudo`) VALUES
(2, 'fermeture ce dimanche pour des raisons technique ', ' la boulangerie Paul s’excuse pour la fermeture exceptionnelle de cette semaine ', '2025-02-19', 'A', 'AlexT'),
(3, 'Incident informatique ce matin ', 'suit à un incident informatique , nous vous prions de nous éxcuser pour la gene occasionnée !', '2025-02-19', 'A', 'AlexT'),
(4, 'Le four a rendu l\'âme : fermeture pour réparations', 'En raison d\'une maintenance prévue de nos équipements de production, la boulangerie sera fermée jusqu\'à 11h00 ce matin. Nous nous excusons pour la gêne occasionnée.', '2025-03-13', 'A', 'AlexT'),
(6, 'Nouveau partenariat ', 'Nous sommes heureux d\'annoncer notre partenariat avec la ferme \"Le Moulin Vert\" pour fournir une farine locale et bio de qualité pour la fabrication de nos pains.', '2025-03-20', 'A', 'ellaR'),
(7, 'Nouvelles normes sanitaires appliquées', 'Nous avons mis en place des normes sanitaires renforcées pour garantir la sécurité alimentaire de nos clients, incluant un nettoyage plus fréquent des espaces de préparation.', '2025-03-20', 'A', 'MMARTIN'),
(8, 'Mise à jour du système de caisse', 'Nous avons effectué une mise à jour de notre système de caisse afin de rendre les transactions plus rapides et d\'améliorer l\'expérience client. Cette mise à jour permet également un meilleur suivi des stocks.', '2025-03-20', 'A', 'MMARTIN'),
(9, 'Passage à un système  des stocks informatisé', 'Nous avons désormais un système de gestion des stocks informatisé pour mieux suivre les produits et réduire les erreurs humaines. Cela nous permet également de mieux prévoir les besoins en fonction des ventes.', '2025-03-20', 'A', 'ellaR'),
(10, 'Sécurisation  contre les cyberattaques', 'Nous avons renforcé la sécurité de notre système informatique pour protéger les données de nos clients et de notre entreprise contre les cyberattaques. Un audit de sécurité a été effectué et des mesures préventives ont été mises en place.', '2025-03-20', 'A', 'ellaR'),
(11, 'Passage à la gestion électronique des documents', 'Nous avons adopté la gestion électronique des documents (GED) pour mieux organiser et archiver nos documents. Cela nous permettra également d\'accéder plus rapidement aux informations importantes.', '2025-03-20', 'A', 'ellaR'),
(12, 'Mise en place de systèmes de caisse connectés', 'Pour améliorer l\'efficacité de nos transactions et le suivi des ventes, nous avons installé des systèmes de caisse connectés à notre réseau pour une gestion plus rapide et précise.', '2025-03-20', 'A', 'ellaR');

-- --------------------------------------------------------

--
-- Structure de la table `t_profil_pfl`
--

CREATE TABLE `t_profil_pfl` (
  `pfl_nom` varchar(80) NOT NULL,
  `pfl_prenom` varchar(80) NOT NULL,
  `pfl_adresse_email` varchar(100) NOT NULL,
  `pfl_validite_du_profil` char(1) NOT NULL,
  `pfl_statut` char(1) NOT NULL,
  `pfl_date_de_creation_du_profil` date NOT NULL,
  `cpt_pseudo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_profil_pfl`
--

INSERT INTO `t_profil_pfl` (`pfl_nom`, `pfl_prenom`, `pfl_adresse_email`, `pfl_validite_du_profil`, `pfl_statut`, `pfl_date_de_creation_du_profil`, `cpt_pseudo`) VALUES
('Thomas', 'Alex', 'alex.thomas@boulangerie.com', 'A', 'G', '2025-01-31', 'AlexT'),
('jab', 'alice', 'alice@gmail.com', 'A', 'G', '2025-04-23', 'alice'),
('borji', 'ahmed', 'amed123@gmail.com', 'D', 'R', '2025-03-24', 'amed122'),
('Dubois', 'Camille', 'camille.dubois@boulangerie.com', 'A', 'R', '2025-01-31', 'CamilleD'),
('jaber', 'elham', 'jaberilham163@gmail.com', 'D', 'R', '2025-03-24', 'elham'),
('Fournier', 'Elodie', 'elodie.fournier@boulangerie.com', 'A', 'G', '2025-01-31', 'ElodieF'),
('jaber ', 'emili', 'odisvojis@gmail.com', 'D', 'R', '2025-03-30', 'emili122'),
('Martin', 'Gestionnaire', 'contact@boulangerie.com', 'D', 'G', '2025-01-31', 'gestionnaire1'),
('Dupond', 'Jean', 'jean.dupond@boulangerie.com', 'A', 'G', '2025-01-31', 'JDupond'),
('jean', 'jean', 'jean123@gmail.com', 'D', 'R', '2025-04-23', 'jean '),
('lisa ', 'lisa', 'lisa@gmail.com', 'D', 'R', '2025-04-23', 'lisa'),
('Petit', 'Lucie', 'lucie.petit@boulangerie.com', 'D', 'R', '2025-01-31', 'LucieP'),
('Mehdi', 'borji', 'test100@gmail.com', 'D', 'R', '2025-04-22', 'mehdi144'),
('Martin', 'Marie', 'marie.martin@boulangerie.com', 'A', 'G', '2025-01-31', 'MMartin'),
('mv255', 'mv255', 'mv255@gmail.com', 'A', 'G', '2025-04-10', 'mv255'),
('Renard', 'Nicolas', 'nicolas.renard@boulangerie.com', 'D', 'R', '2025-01-31', 'NicolasR'),
('Bernard', 'Paul', 'paul.bernard@boulangerie.com', 'A', 'R', '2025-01-31', 'PaulB'),
('Meyer', 'Sophie', 'sophie.meyer@boulangerie.com', 'A', 'G', '2025-01-31', 'SophieM'),
('tamara', 'salou', 'tama1235@gmail.com', 'D', 'R', '2025-03-24', 'tamtam');

-- --------------------------------------------------------

--
-- Structure de la table `t_url_url`
--

CREATE TABLE `t_url_url` (
  `url_id` int(11) NOT NULL,
  `url_nom` varchar(80) NOT NULL,
  `url_chaine` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_url_url`
--

INSERT INTO `t_url_url` (`url_id`, `url_nom`, `url_chaine`) VALUES
(3, 'Boulangerie Paul', 'https://www.boulangeriepaul.com/'),
(4, 'Maison Kayser', 'https://www.maison-kayser.com/'),
(5, 'Formule', 'https://www.paul.fr/dejeuner'),
(6, 'Patisserie familiale', 'https://www.paul.fr/patisserie');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_association_ast`
--
ALTER TABLE `t_association_ast`
  ADD PRIMARY KEY (`url_id`,`cat_id`),
  ADD KEY `t_association_ast_FK2` (`cat_id`);

--
-- Index pour la table `t_categorie_cat`
--
ALTER TABLE `t_categorie_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Index pour la table `t_compte_cpt`
--
ALTER TABLE `t_compte_cpt`
  ADD PRIMARY KEY (`cpt_pseudo`);

--
-- Index pour la table `t_configuration_cfg`
--
ALTER TABLE `t_configuration_cfg`
  ADD PRIMARY KEY (`cfg_id`);

--
-- Index pour la table `t_information_inf`
--
ALTER TABLE `t_information_inf`
  ADD PRIMARY KEY (`inf_id`),
  ADD KEY `t_inf_t_cpt_FK` (`cpt_pseudo`),
  ADD KEY `t_inf_t_cat_FK` (`cat_id`);

--
-- Index pour la table `t_news_new`
--
ALTER TABLE `t_news_new`
  ADD PRIMARY KEY (`new_id`),
  ADD KEY `t_new_t_cpt_FK` (`cpt_pseudo`);

--
-- Index pour la table `t_profil_pfl`
--
ALTER TABLE `t_profil_pfl`
  ADD PRIMARY KEY (`cpt_pseudo`);

--
-- Index pour la table `t_url_url`
--
ALTER TABLE `t_url_url`
  ADD PRIMARY KEY (`url_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_categorie_cat`
--
ALTER TABLE `t_categorie_cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77778;

--
-- AUTO_INCREMENT pour la table `t_configuration_cfg`
--
ALTER TABLE `t_configuration_cfg`
  MODIFY `cfg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `t_information_inf`
--
ALTER TABLE `t_information_inf`
  MODIFY `inf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `t_news_new`
--
ALTER TABLE `t_news_new`
  MODIFY `new_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `t_url_url`
--
ALTER TABLE `t_url_url`
  MODIFY `url_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_association_ast`
--
ALTER TABLE `t_association_ast`
  ADD CONSTRAINT `t_association_ast_FK` FOREIGN KEY (`url_id`) REFERENCES `t_url_url` (`url_id`),
  ADD CONSTRAINT `t_association_ast_FK2` FOREIGN KEY (`cat_id`) REFERENCES `t_categorie_cat` (`cat_id`);

--
-- Contraintes pour la table `t_information_inf`
--
ALTER TABLE `t_information_inf`
  ADD CONSTRAINT `t_inf_t_cat_FK` FOREIGN KEY (`cat_id`) REFERENCES `t_categorie_cat` (`cat_id`),
  ADD CONSTRAINT `t_inf_t_cpt_FK` FOREIGN KEY (`cpt_pseudo`) REFERENCES `t_compte_cpt` (`cpt_pseudo`);

--
-- Contraintes pour la table `t_news_new`
--
ALTER TABLE `t_news_new`
  ADD CONSTRAINT `t_new_t_cpt_FK` FOREIGN KEY (`cpt_pseudo`) REFERENCES `t_compte_cpt` (`cpt_pseudo`);

--
-- Contraintes pour la table `t_profil_pfl`
--
ALTER TABLE `t_profil_pfl`
  ADD CONSTRAINT `t_pfl_t_cpt_FK` FOREIGN KEY (`cpt_pseudo`) REFERENCES `t_compte_cpt` (`cpt_pseudo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
