-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Lun 03 Avril 2017 à 18:21
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `rezozio`
--

-- --------------------------------------------------------

--
-- Structure de la table `citations`
--

CREATE TABLE `citations` (
  `idutilisateur` int(11) NOT NULL,
  `idpublication` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `citations`
--

INSERT INTO `citations` (`idutilisateur`, `idpublication`) VALUES
(2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `estabonnea`
--

CREATE TABLE `estabonnea` (
  `qui` int(11) NOT NULL,
  `aqui` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `estabonnea`
--

INSERT INTO `estabonnea` (`qui`, `aqui`) VALUES
(2, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `publications`
--

CREATE TABLE `publications` (
  `identifiant` int(11) NOT NULL,
  `contenu` varchar(140) NOT NULL,
  `auteur` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `publications`
--

INSERT INTO `publications` (`identifiant`, `contenu`, `auteur`, `date`) VALUES
(1, 'Bien arrivé sur Résozio !', 1, '2017-04-03 16:03:20'),
(2, 'Salut les gens !', 2, '2017-04-03 16:03:20'),
(3, 'Salut @dorne', 1, '2017-04-03 16:20:12');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `identifiant` int(11) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `presentation` varchar(2048) DEFAULT NULL,
  `imagedeprofil` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`identifiant`, `pseudo`, `nom`, `presentation`, `imagedeprofil`) VALUES
(1, 'bauduin', 'Bauduin Lucas', 'Étudiant en Licence Informatique à Lille 1, spécialisé en Développement', 0),
(2, 'dorne', 'Dorne Julien', 'Étudiant en Licence Informatique à Lille 1, spécialisé en Ecchi', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `citations`
--
ALTER TABLE `citations`
  ADD PRIMARY KEY (`idutilisateur`,`idpublication`),
  ADD KEY `idpublication` (`idpublication`);

--
-- Index pour la table `estabonnea`
--
ALTER TABLE `estabonnea`
  ADD PRIMARY KEY (`qui`,`aqui`),
  ADD KEY `estabonnea_ibfk_2` (`aqui`);

--
-- Index pour la table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`identifiant`),
  ADD KEY `auteur` (`auteur`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`identifiant`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `publications`
--
ALTER TABLE `publications`
  MODIFY `identifiant` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `identifiant` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `citations`
--
ALTER TABLE `citations`
  ADD CONSTRAINT `citations_ibfk_2` FOREIGN KEY (`idpublication`) REFERENCES `publications` (`identifiant`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `citations_ibfk_1` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateurs` (`identifiant`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `estabonnea`
--
ALTER TABLE `estabonnea`
  ADD CONSTRAINT `estabonnea_ibfk_1` FOREIGN KEY (`qui`) REFERENCES `utilisateurs` (`identifiant`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estabonnea_ibfk_2` FOREIGN KEY (`aqui`) REFERENCES `utilisateurs` (`identifiant`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `publications`
--
ALTER TABLE `publications`
  ADD CONSTRAINT `publications_ibfk_1` FOREIGN KEY (`auteur`) REFERENCES `utilisateurs` (`identifiant`) ON DELETE CASCADE ON UPDATE CASCADE;
