-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 23 Mars 2016 à 16:57
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  bdmangas
--

DROP DATABASE IF EXISTS bdmangas;
CREATE DATABASE IF NOT EXISTS bdmangas DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE bdmangas;

-- --------------------------------------------------------

--
-- Structure de la table mangas
--

DROP TABLE IF EXISTS mangas;
CREATE TABLE IF NOT EXISTS mangas (
  idManga int(11) NOT NULL AUTO_INCREMENT,
  titre varchar(60) NOT NULL,
  anneeParution int(11) NOT NULL,
  cover varchar(50) NOT NULL,
  nbVolume int(10) NOT NULL,
  synopsis longtext NOT NULL,
  PRIMARY KEY (idManga),
  UNIQUE KEY titre (titre)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=7 ;

--
-- Contenu de la table mangas
--

-- INSERT INTO mangas (idManga, titre, anneeParution, cover, nbVolume, synopsis) VALUES
-- (1, 'Dragon Ball', 1984, 'coverDragonBall.png', 42, "L'histoire de Dragon Ball suit la vie de Son Goku, un garçon à la queue de singe inspiré du conte traditionnel chinois La Pérégrination vers l'Ouest. Son Goku est un jeune garçon simple d'esprit et pur doté d'une queue de singe et d'une force extraordinaire. Il vit seul, après la mort de son grand-père adoptif, sur une montagne et en pleine nature, dans un paysage ayant les caractéristiques d'une forêt sauvage. Un jour, il rencontre Bulma, une jeune fille de la ville, très intelligente mais immature et impulsive. Elle est à la recherche des sept boules de cristal légendaires appelées Dragon Balls. Dispersées sur la Terre, ces Dragon Balls, une fois réunies, font apparaître Shenron, le Dragon sacré, un être immatériel qui exauce le souhait de la personne l'ayant invoqué. Son Goku accepte d'aider Bulma car son grand-père adoptif Son Gohan lui avait dit d'être gentil avec les filles ; de plus, le vieil homme lui avait confié l'une des sept boules (celle à quatre étoiles), que le jeune garçon a perdue et souhaite retrouver en son souvenir. Au cours de leur parcours initiatique, ils font de nombreuses rencontres. Son Goku, qui n'était jamais sorti de sa forêt, est amené à suivre un apprentissage auprès de maîtres comme Maître Muten Roshi ou Maître Karin et à participer à plusieurs championnats du monde d'arts martiaux (Tenkaichi Budokai). Il mène de nombreuses batailles et finit par devenir (vraisemblablement) le plus puissant artiste martial de l'univers. Il n’est cependant pas sans aide : le manga présente une vaste galerie d'artistes martiaux, alliés ou d'ennemis, fournissant le conflit qui anime chaque arc de la saga."),
-- (2, 'One Piece', 1997, 'coverOnePiece.jpg', 99, "Luffy, un jeune garçon, rêve de devenir le Roi des Pirates en trouvant le One Piece, le trésor ultime rassemblé par Gol D. Roger, le seul pirate à avoir jamais porté le titre de Roi des Pirates. Shanks le Roux, un pirate qui est hébergé par les villageois du village de Luffy, est le modèle de Luffy depuis que le pirate a sauvé la vie du garçon. Un jour, Luffy mange un des fruits du démon, qui était détenu par l'équipage de Shanks, ce qui fait de lui un homme-caoutchouc, pouvant étirer son corps à volonté. À son départ, Shanks donne à Luffy son chapeau de paille. Luffy ne doit lui rendre ce chapeau que lorsqu'il sera devenu un fier pirate. Bien des années plus tard, Luffy part de son village pour se constituer un équipage et trouver le One Piece. Pour échapper à la noyade, il s'enferme dans un tonneau et se fait repêcher par un jeune garçon du nom de Kobby. Ce dernier rêve de devenir un soldat de la Marine, mais par un coup du sort, s'est retrouvé enrôlé dans l'équipage de la terrible Lady Alvida. Ils rencontrent ensuite Roronoa Zoro, un terrible chasseur de primes qui est détenu par la Marine. Zoro accepte finalement de rejoindre l'équipage à condition que Luffy réussisse à trouver ses sabres qui sont détenus par le Colonel Morgan, le chef des marines de l'île. Après un combat contre Morgan, Luffy réussit à reprendre les trois épées et part avec Zoro en laissant Kobby réaliser son rêve. Roronoa Zoro devient ainsi le premier membre recruté pour son équipage.");

-- --------------------------------------------------------

--
-- Structure de la table utilisateurs
--

DROP TABLE IF EXISTS utilisateurs;
CREATE TABLE IF NOT EXISTS utilisateurs (
  idUtilisateur int(11) NOT NULL AUTO_INCREMENT,
  nom varchar(30) NOT NULL,
  mdp varchar(60) NOT NULL,
  email varchar(30) NOT NULL,
  PRIMARY KEY (idUtilisateur),
  UNIQUE KEY nom (nom)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;

--
-- Contenu de la table utilisateurs
--
--  nom: admin | mdp: Super

INSERT INTO utilisateurs (idUtilisateur, nom, mdp, email) VALUES
(1, 'admin', 'ul0X1TRlc8UHUFD7BlD3DQ==', 'test@gmail.com');



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
