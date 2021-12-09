-- --------------------------------------------------------
-- Hôte:                         localhost
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour bdmangas
CREATE DATABASE IF NOT EXISTS `bdmangas` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `bdmangas`;

-- Listage de la structure de la table bdmangas. maisonedition
CREATE TABLE IF NOT EXISTS `maisonedition` (
  `idMaison` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(60) CHARACTER SET utf8 NOT NULL,
  `img` varchar(60) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`idMaison`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table bdmangas.maisonedition : ~19 rows (environ)
DELETE FROM `maisonedition`;
/*!40000 ALTER TABLE `maisonedition` DISABLE KEYS */;
INSERT INTO `maisonedition` (`idMaison`, `nom`, `img`) VALUES
	(1, 'Glenat', 'glenat.jpg'),
	(9, 'Ki-oon', 'kioon.jpg'),
	(10, 'Kaze', 'kaze.jpg'),
	(11, 'Akata', 'akata.jpg'),
	(12, 'Black Box', 'blackBox.jpg'),
	(13, 'Casterman', 'casterman.jpg'),
	(14, 'Delcourt ', 'delcourt .jpg'),
	(15, 'Doki-Doki ', 'dokiDoki .jpg'),
	(16, 'Kana', 'kana.jpg'),
	(17, 'Komikku', 'komikku.jpg'),
	(18, 'Kurokawa', 'kurokawa.jpg'),
	(19, 'Le Lezard Noir', 'leLezardNoir.jpg'),
	(20, 'Nobi Nobi!', 'nobiNobi.jpg'),
	(21, 'Panini', 'panini.jpg'),
	(22, 'Pika', 'pika.jpg'),
	(23, 'Soleil', 'soleil.jpg'),
	(24, 'Ototo', 'ototo.jpg'),
	(25, 'Meian', 'meian.jpg'),
	(26, 'Tonkam', 'tonkam.jpg');
/*!40000 ALTER TABLE `maisonedition` ENABLE KEYS */;

-- Listage de la structure de la table bdmangas. mangas
CREATE TABLE IF NOT EXISTS `mangas` (
  `idManga` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(60) NOT NULL,
  `anneeParution` int(11) NOT NULL,
  `cover` varchar(50) NOT NULL,
  `nbVolume` int(10) NOT NULL,
  `auteur` text CHARACTER SET utf8 NOT NULL,
  `maisonEdition` int(11) NOT NULL,
  `synopsis` longtext NOT NULL,
  PRIMARY KEY (`idManga`),
  UNIQUE KEY `titre` (`titre`),
  KEY `FK_mangas_maisonedition` (`maisonEdition`),
  CONSTRAINT `FK_mangas_maisonedition` FOREIGN KEY (`maisonEdition`) REFERENCES `maisonedition` (`idMaison`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table bdmangas.mangas : ~12 rows (environ)
DELETE FROM `mangas`;
/*!40000 ALTER TABLE `mangas` DISABLE KEYS */;
INSERT INTO `mangas` (`idManga`, `titre`, `anneeParution`, `cover`, `nbVolume`, `auteur`, `maisonEdition`, `synopsis`) VALUES
	(7, 'Dragon Ball', 1984, 'dragonBall1.jpg', 42, 'Akira Toriyama', 1, 'L&#39;histoire de Dragon Ball suit la vie de Son Goku, un garÃ§on Ã  la queue de singe inspirÃ© du conte traditionnel chinois La PÃ©rÃ©grination vers l&#39;Ouest. Son Goku est un jeune garÃ§on simple d&#39;esprit et pur dotÃ© d&#39;une queue de singe et d&#39;une force extraordinaire. Il vit seul, aprÃ¨s la mort de son grand-pÃ¨re adoptif, sur une montagne et en pleine nature, dans un paysage ayant les caractÃ©ristiques d&#39;une forÃªt sauvage. Un jour, il rencontre Bulma, une jeune fille de la ville, trÃ¨s intelligente mais immature et impulsive. Elle est Ã  la recherche des sept boules de cristal lÃ©gendaires appelÃ©es Dragon Balls. DispersÃ©es sur la Terre, ces Dragon Balls, une fois rÃ©unies, font apparaÃ®tre Shenron, le Dragon sacrÃ©, un Ãªtre immatÃ©riel qui exauce le souhait de la personne l&#39;ayant invoquÃ©. Son Goku accepte d&#39;aider Bulma car son grand-pÃ¨re adoptif Son Gohan lui avait dit d&#39;Ãªtre gentil avec les filles ; de plus, le vieil homme lui avait confiÃ© l&#39;une des sept boules (celle Ã  quatre Ã©toiles), que le jeune garÃ§on a perdue et souhaite retrouver en son souvenir. Au cours de leur parcours initiatique, ils font de nombreuses rencontres. Son Goku, qui n&#39;Ã©tait jamais sorti de sa forÃªt, est amenÃ© Ã  suivre un apprentissage auprÃ¨s de maÃ®tres comme MaÃ®tre Muten Roshi ou MaÃ®tre Karin et Ã  participer Ã  plusieurs championnats du monde d&#39;arts martiaux (Tenkaichi Budokai). Il mÃ¨ne de nombreuses batailles et finit par devenir (vraisemblablement) le plus puissant artiste martial de l&#39;univers. Il nâ€™est cependant pas sans aide : le manga prÃ©sente une vaste galerie d&#39;artistes martiaux, alliÃ©s ou d&#39;ennemis, fournissant le conflit qui anime chaque arc de la saga.'),
	(8, 'One Piece', 1997, 'onePiece1.jpg', 10, ' EiichirÅ Oda', 1, 'Luffy, un jeune garÃ§on, rÃªve de devenir le Roi des Pirates en trouvant le One Piece, le trÃ©sor ultime rassemblÃ© par Gol D. Roger, le seul pirate Ã  avoir jamais portÃ© le titre de Roi des Pirates. Shanks le Roux, un pirate qui est hÃ©bergÃ© par les villageois du village de Luffy, est le modÃ¨le de Luffy depuis que le pirate a sauvÃ© la vie du garÃ§on. Un jour, Luffy mange un des fruits du dÃ©mon, qui Ã©tait dÃ©tenu par l&#39;Ã©quipage de Shanks, ce qui fait de lui un homme-caoutchouc, pouvant Ã©tirer son corps Ã  volontÃ©. Ã€ son dÃ©part, Shanks donne Ã  Luffy son chapeau de paille. Luffy ne doit lui rendre ce chapeau que lorsqu&#39;il sera devenu un fier pirate.\r\n\r\nBien des annÃ©es plus tard, Luffy part de son village pour se constituer un Ã©quipage et trouver le One Piece. Pour Ã©chapper Ã  la noyade, il s&#39;enferme dans un tonneau et se fait repÃªcher par un jeune garÃ§on du nom de Kobby. Ce dernier rÃªve de devenir un soldat de la Marine, mais par un coup du sort, s&#39;est retrouvÃ© enrÃ´lÃ© dans l&#39;Ã©quipage de la terrible Lady Alvida. Ils rencontrent ensuite Roronoa Zoro, un terrible chasseur de primes qui est dÃ©tenu par la Marine. Zoro accepte finalement de rejoindre l&#39;Ã©quipage Ã  condition que Luffy rÃ©ussisse Ã  trouver ses sabres qui sont dÃ©tenus par le Colonel Morgan, le chef des marines de l&#39;Ã®le. AprÃ¨s un combat contre Morgan, Luffy rÃ©ussit Ã  reprendre les trois Ã©pÃ©es et part avec Zoro en laissant Kobby rÃ©aliser son rÃªve. Roronoa Zoro devient ainsi le premier membre recrutÃ© pour son Ã©quipage.'),
	(9, 'Akira', 1982, 'akira1.jpg', 6, 'Katsuhiro ÅŒtomo', 1, 'Tokyo est dÃ©truite par une mystÃ©rieuse explosion le 6 dÃ©cembre 1982, et cela dÃ©clenche la TroisiÃ¨me Guerre mondial, avec la destruction de nombreuses citÃ©s par des armes nuclÃ©aires.\r\n\r\nEn 2019, Neo-Tokyo est une mÃ©gapole corrompue et sillonnÃ©e par des bandes de jeunes motards dÃ©sÅ“uvrÃ©s et droguÃ©s. Une nuit, lâ€™un d&#39;eux, Tetsuo, a un accident de moto en essayant d&#39;Ã©viter un Ã©trange garÃ§on qui se trouve sur son chemin. BlessÃ©, Tetsuo est capturÃ© par lâ€™armÃ©e japonaise. Il est lâ€™objet de nombreux tests dans le cadre dâ€™un projet militaire ultra secret visant Ã  repÃ©rer et former des Ãªtres possÃ©dant des prÃ©dispositions Ã  des pouvoirs psychiques (tÃ©lÃ©pathie, tÃ©lÃ©portation, tÃ©lÃ©kinÃ©sie, etc.). Les amis de Tetsuo, dont leur chef Kaneda, veulent savoir ce qui lui est arrivÃ©, car quand il sâ€™Ã©vade et se retrouve en libertÃ©, il nâ€™est plus le mÃªmeâ€¦ Tetsuo teste ses nouveaux pouvoirs et veut sâ€™imposer comme un leader parmi les junkies, ce qui ne plaÃ®t pas Ã  tout le monde, en particulier Ã  Kaneda.\r\n\r\nEn parallÃ¨le se nouent des intrigues politiques : lâ€™armÃ©e essaye par tous les moyens de continuer le projet en espÃ©rant percer le secret de la puissance dâ€™Akira, un enfant dotÃ© de pouvoirs psychiques extraordinaires (et de la maÃ®triser pour s&#39;en servir par la suite), tandis que les dirigeants politiques ne voient pas lâ€™intÃ©rÃªt de continuer Ã  allouer de lâ€™argent Ã  un projet de plus de 30 ans qui n&#39;a jamais rien rapportÃ©. Le phÃ©nomÃ¨ne Akira suscite Ã©galement lâ€™intÃ©rÃªt dâ€™un mouvement rÃ©volutionnaire qui veut se lâ€™approprier Ã  des fins religieuses (Akira serait considÃ©rÃ© comme un Â« sauveur Â» par ses fidÃ¨les). Tetsuo va se retrouver malgrÃ© lui au centre dâ€™une lutte entre les rÃ©volutionnaires et le pouvoir en place.'),
	(10, 'Ippo', 1989, 'ippo1.jpg', 1, 'George Morikawa', 18, 'Ippo Makunouchi est un jeune et timide lycÃ©en de 16 ans qui nâ€™a pas dâ€™amis car il consacre tout son temps libre Ã  aider sa mÃ¨re, qui l&#39;Ã©lÃ¨ve seule, dans lâ€™entreprise familiale de location de bateaux de pÃªche. Il est couramment victime de brutalitÃ©s et dâ€™humiliations par une bande de voyous menÃ©e par Umezawa, un de ses camarades de classe. Un jour, un boxeur professionnel tÃ©moin de la scÃ¨ne, Mamoru Takamura, le sauve de ses bourreaux et emmÃ¨ne Ippo blessÃ© au club de boxe Kamogawa, tenu par le boxeur retraitÃ© Genji Kamogawa, pour le soigner.\r\n\r\nUne fois Ippo rÃ©veillÃ©, Takamura tente de lui remonter le moral en le persuadant de se dÃ©fouler sur un sac de sable, expÃ©rience qui rÃ©vÃ¨le chez lui une grande puissance de frappe et un talent innÃ© pour la boxe. Se dÃ©couvrant une passion pour ce sport et poussÃ© par le dÃ©sir de devenir fort, le jeune Ippo dÃ©cide de devenir boxeur professionnel et commence son entraÃ®nement au sein du club vers les plus hauts niveaux.'),
	(11, 'Black Clover', 2015, 'blackClover1.jpg', 27, 'YÅ«ki Tabata', 10, 'Asta est un jeune garÃ§on dÃ©terminÃ© qui vit avec son ami dâ€™enfance, Yuno, dans un orphelinat du royaume de Clover. Depuis tout petit, Asta a pour ambition de devenir le magicien le plus puissant du royaume, &#34;lâ€™Empereur-Mage&#34;, ce qui a aussi inspirÃ© Yuno Ã  vouloir la mÃªme chose. Mais malheureusement, Asta est nÃ© sans aucun talent magique, alors que Yuno possÃ¨de des prÃ©dispositions spectaculaires.\r\n\r\nLorsqu&#39;ils atteignent leurs 15 ans, tous les jeunes du royaume sont conviÃ©s Ã  une cÃ©rÃ©monie oÃ¹ leur est remis leur grimoire : alors que Yuno reÃ§oit le lÃ©gendaire grimoire avec un trÃ¨fle Ã  quatre feuilles, considÃ©rÃ© comme un mythe puisque la lÃ©gende prÃ©tend que le premier Empereur-Mage utilisait Ã©galement un grimoire portant un trÃ¨fle Ã  quatre feuilles, Asta ne reÃ§oit rien. AprÃ¨s la cÃ©rÃ©monie, Yuno est attaquÃ© par un brigand qui souhaite lui voler son grimoire pour ensuite tenter de le revendre.\r\n\r\nAsta part pour le sauver mais se retrouve en difficultÃ©, heureusement il est sauvÃ© par un mystÃ©rieux grimoire avec un trÃ¨fle Ã  cinq feuilles et une grande Ã©pÃ©e rouillÃ©e, qui symbolise le dÃ©mon.\r\n\r\nAsta et Yuno se font la promesse de se battre tous les deux pour le titre dâ€™Empereur-Mage. Alors que leurs chemins se sÃ©parent sur la route des Chevaliers-Mages, leur objectif est toujours le mÃªme : devenir le prochain Empereur-Mage.'),
	(12, 'Sun-Ken Rock', 2006, 'sun-kenRock1.jpg', 25, 'Boichi', 15, 'Ken Kitano, un jeune Japonais, dÃ©barque Ã  SÃ©oul afin d&#39;intÃ©grer les forces de police comme Yumin, la fille quâ€™il aime. Les mÃ©saventures vont alors s&#39;enchaÃ®ner pour lui et alors quâ€™il noie son dÃ©sespoir dans l&#39;alcool au comptoir dâ€™un restaurant ambulant, des mafieux agressent le patron, mais Ken dÃ©cide de dÃ©fendre le pauvre homme. Tae-Soo, le boss d&#39;un gang de quartier, assiste Ã  la scÃ¨ne et apprÃ©cie fortement sa rÃ©action ainsi que ses qualitÃ©s de combattant. Il lui propose donc d&#39;intÃ©grer sa bande. C&#39;est une nouvelle vie tourmentÃ©e et pleine d&#39;aventures qui commence pour Ken.'),
	(13, 'Kenshin le vagabond', 1994, 'kenshinLeVagabond1.jpg', 1, ' Nobuhiro Watsuki', 1, 'L&#39;histoire se passe en 1878 Ã  Tokyo. Kenshin Himura, ancien assassin surnommÃ© BattosaÃ¯, littÃ©ralement Â« maÃ®tre dans le dÃ©gainage de l&#39;Ã©pÃ©e Â», durant l&#39;Ã©poque du rÃ¨gne des Tokugawa, cache un passÃ© trÃ¨s lourd.\r\n\r\nDevenu un vagabond depuis l&#39;instauration de l&#39;Ã¨re Meiji, il parcourt le pays muni de son sabre Ã  lame inversÃ©e, avec le dÃ©sir de ne plus tuer. Il rencontre une jeune fille qui cherche Ã  protÃ©ger son dÅjÅ, Kaoru Kamiya, et finit par s&#39;installer chez elle aprÃ¨s l&#39;avoir aidÃ©e. Peu Ã  peu, ils vont rencontrer leurs futurs compagnons : Yahiko MyÃ´jin, un garÃ§on issu de la classe des samouraÃ¯s qui devient le disciple de Kaoru, et Sanosuke Sagara un adepte en bagarre de rue.\r\n\r\nMalgrÃ© son dÃ©sir de ne plus tuer, Kenshin se fait rattraper par son passÃ© et le gouvernement a souvent besoin de lui. En effet, mÃªme si la paix est rÃ©tablie dans le Japon, certains hommes cherchent encore leur place dans cette nouvelle sociÃ©tÃ© loin d&#39;Ãªtre parfaite. De plus, malgrÃ© la nouvelle place de Kenshin aux cÃ´tÃ©s de Kaoru, persiste en lui une pensÃ©e sombre et douloureuse.\r\n\r\nLe premier combat qui va rÃ©ellement mobiliser toutes les forces de la bande de Kenshin est celui menÃ© contre Aoshi Shinomori et les Oniwabanshu. Puis, le Japon est convoitÃ© par Shishio Makoto, lui aussi un ancien assassin, que le gouvernement Meiji a tentÃ© d&#39;Ã©liminer lorsqu&#39;il n&#39;en a plus eu besoin, et qui garde des brÃ»lures sur tout le corps comme sÃ©quelles. Kenshin doit alors se rendre Ã  Kyoto, il semblerait qu&#39;il soit difficile pour lui de ne pas rompre son vÅ“u de ne plus tuer. Mais Kenshin remporte la victoire. Quelque temps plus tard, un homme du nom de Enishi Yukishiro convoite une vengeance particuliÃ¨re pour BattosaÃ¯. En effet il est le frÃ¨re de la dÃ©funte Ã©pouse de Kenshin Himura, Tomoe Yukishiro, ou Tomoe Himura, morte des mains du BattosaÃ¯ par accident.'),
	(14, 'Vagabond', 1998, 'vagabond1.jpg', 1, 'Takehiko Inoue', 26, 'En 1600 a lieu la terrible bataille de Sekigahara, qui assied le pouvoir du shÃ´gun Tokugawa. Parmi les combattants, Shinmen Takezo, fils d&#39;un grand samurai, qui est prÃªt Ã  tout pour survivre. Revenant Ã  son village natal, il est rejetÃ© par les habitants pour avoir dÃ©sertÃ©. PourchassÃ©, il commence alors une longue errance, avec un unique objectif : devenir le plus grand samouraÃ¯ du Japon.\r\n\r\nVagabond est un long manga d&#39;initiation, qui amÃ¨ne le hÃ©ros Ã  dÃ©couvrir, Ã  comprendre, le monde qui l&#39;entoure et lui-mÃªme, se dÃ©diant Ã  la voie du sabre. Changeant son nom pour Miyamoto Musashi, il dÃ©fie et affronte les plus puissants samurais, emportÃ© par une spirale meurtriÃ¨re, et tiraillÃ© par son amour pour Otsu, son amie d&#39;enfance.'),
	(15, 'Gannibal', 2018, 'gannibal1.jpg', 5, 'Masaki Ninomiya', 25, 'Daigo Agawa, policier de son Ã©tat, a Ã©tÃ© dÃ©tachÃ© Ã  Kuge, un village de montagne reculÃ©. Bien que la communautÃ© l&#39;accueille chaleureusement lui et sa famille, la mort d&#39;une vieille villageoise fait jaillir des doutes quant Ã  la normalitÃ© de ce lieu...'),
	(16, 'My Hero Academia', 2014, 'myHeroAcademia1.jpg', 28, 'K?hei Horikoshi', 9, 'Dans un monde oÃ¹ 80 % de la population mondiale possÃ¨de des super-pouvoirs, ici nommÃ©s Â« Alters Â» (å€‹æ€§, Kosei?), on suit les aventures de Izuku Midoriya, Â« Deku Â», l&#39;un des rares humains ne possÃ©dant pas d&#39;Alter. MalgrÃ© cela, Izuku rÃªve pourtant de rejoindre la filiÃ¨re super-hÃ©roÃ¯que de la grande acadÃ©mie Yuei (å‹‡äº•é«˜æ ¡, YÅ«ei KÅkÅ?) et de devenir un jour un des plus grands hÃ©ros de son Ã©poque.\r\n\r\nUn jour, Midoriya a la chance de rencontrer son idole de toujours, All Might, numÃ©ro 1 des supers-hÃ©ros. Celui-ci va lÃ©guer Ã  Izuku son Alter, le One For All.'),
	(17, 'Naruto', 1999, 'naruto1.jpg', 1, 'Masashi Kishimoto', 16, 'L&#39;histoire commence pendant l&#39;adolescence de Naruto, vers ses douze ans. Orphelin cancre et grand farceur, il fait toutes les bÃªtises possibles pour se faire remarquer. Son rÃªve : devenir le meilleur Hokage afin d&#39;Ãªtre reconnu par les habitants de son village. En effet, le dÃ©mon renard Ã  neuf queues scellÃ© en lui a attisÃ© la crainte et le mÃ©pris des autres villageois, qui, avec le temps, ne font plus de diffÃ©rence entre KyÃ»bi et Naruto. MalgrÃ© cela, Naruto s&#39;entraÃ®ne dur afin de devenir genin, le premier niveau chez les ninjas. AprÃ¨s avoir ratÃ© l&#39;examen genin 3 fois, il arrive finalement Ã  recevoir son bandeau frontal de Konoha. Il est alors inclus dans une Ã©quipe de trois apprentis ninjas, avec Sakura Haruno et le talentueux Sasuke Uchiwa qui veut venger les personnes chÃ¨res Ã  ses yeux, en tuant son frÃ¨re Itachi Uchiha. Peu aprÃ¨s, ils rencontrent leur jÅnin (ninja de classe supÃ©rieure), celui qui s&#39;occupera de leur formation : le mystÃ©rieux Kakashi Hatake.\r\n\r\nAu dÃ©but craint et mÃ©prisÃ© par ses pairs, Naruto va peu Ã  peu monter en puissance et gagner le respect et l&#39;affection des villageois grÃ¢ce, notamment, aux combats dantesques qu&#39;il remportera face aux ennemis les plus puissants de Konoha.'),
	(18, 'Bleach', 2001, 'bleach1.jpg', 1, 'Tite Kubo', 1, 'Le rÃ©cit commence en 2001 au Japon dans la ville fictive de Karakura. Ichigo Kurosaki, lycÃ©en de 15 ans, arrive Ã  voir, entendre et toucher les Ã¢mes des morts depuis qu&#39;il est tout petit. Un soir, sa routine quotidienne vient Ã  Ãªtre bouleversÃ©e Ã  la suite de sa rencontre avec une shinigami (æ­»ç¥ž?, littÃ©ralement Â« dieu de la mort Â»), Rukia Kuchiki, et la venue d&#39;un monstre appelÃ© hollow. Ce dernier Ã©tant venu dÃ©vorer les Ã¢mes de sa famille et la shinigami venue le protÃ©ger ayant Ã©tÃ© blessÃ©e par sa faute, Ichigo accepte de devenir lui-mÃªme un shinigami afin de les sauver.\r\n\r\nCependant, le transfert de pouvoir, censÃ© Ãªtre temporaire et partiel, est complet et ne s&#39;achÃ¨ve pas. Ichigo est forcÃ© de prendre la responsabilitÃ© de la tÃ¢che incombant Ã  Rukia Kuchiki. Il commence donc la chasse aux hollows tout en protÃ©geant les Ã¢mes humaines.\r\n\r\nLe dÃ©but est centrÃ© sur une chasse aux mauvais esprits relativement peu puissants, avec un simple sabre. L&#39;histoire va peu Ã  peu se diriger vers un vaste complot mystico-politique aprÃ¨s l&#39;apparition des premiers autres shinigami. Les batailles au sabre du commencement vont alors se mÃ©tamorphoser en combats dantesques avec des armes aux pouvoirs surprenants et variÃ©s, et parfois aux proportions gigantesques.');
/*!40000 ALTER TABLE `mangas` ENABLE KEYS */;

-- Listage de la structure de la table bdmangas. utilisateurs
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `mdp` varchar(60) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`idUtilisateur`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table bdmangas.utilisateurs : ~2 rows (environ)
DELETE FROM `utilisateurs`;
/*!40000 ALTER TABLE `utilisateurs` DISABLE KEYS */;
INSERT INTO `utilisateurs` (`idUtilisateur`, `nom`, `mdp`, `email`) VALUES
	(1, 'admin', 'ul0X1TRlc8UHUFD7BlD3DQ==', 'test@gmail.com'),
	(2, 'alec.ptt', 'klHdDCUgTWDWJEHAjfAF9A==', 'alecpiettepro@gmail.com');
/*!40000 ALTER TABLE `utilisateurs` ENABLE KEYS */;

-- Listage de la structure de la table bdmangas. volumes
CREATE TABLE IF NOT EXISTS `volumes` (
  `idVolume` int(11) NOT NULL AUTO_INCREMENT,
  `idManga` int(11) NOT NULL,
  `titre` varchar(60) NOT NULL,
  `volume` int(11) NOT NULL,
  `cover` varchar(50) NOT NULL,
  `nbPage` int(8) NOT NULL,
  `dateSortie` date NOT NULL,
  PRIMARY KEY (`idVolume`,`idManga`),
  UNIQUE KEY `idVolume` (`idVolume`),
  KEY `idManga` (`idManga`),
  CONSTRAINT `volumes_ibfk_1` FOREIGN KEY (`idManga`) REFERENCES `mangas` (`idManga`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table bdmangas.volumes : ~148 rows (environ)
DELETE FROM `volumes`;
/*!40000 ALTER TABLE `volumes` DISABLE KEYS */;
INSERT INTO `volumes` (`idVolume`, `idManga`, `titre`, `volume`, `cover`, `nbPage`, `dateSortie`) VALUES
	(1, 9, 'Part 1', 1, 'akira1.jpg', 356, '2016-06-01'),
	(2, 9, 'Part 2', 2, 'akira2.jpg', 296, '2017-05-10'),
	(3, 9, 'Part 3', 3, 'akira3.jpg', 278, '2018-03-28'),
	(4, 9, 'Part 4', 4, 'akira4.jpg', 390, '2018-09-22'),
	(5, 9, 'Part 5', 5, 'akira5.jpg', 409, '2019-05-02'),
	(6, 9, 'Part 6', 6, 'akira6.jpg', 431, '2019-06-19'),
	(7, 7, 'Sangoku', 1, 'dragonBall1.jpg', 197, '2010-02-15'),
	(8, 7, 'Kamehameha', 2, 'dragonBall2.jpg', 192, '2010-02-15'),
	(9, 7, 'L&#39;initiation', 3, 'dragonBall3.jpg', 192, '2010-02-15'),
	(10, 7, 'Le tournoi', 4, 'dragonBall4.jpg', 192, '2010-02-15'),
	(11, 7, 'L&#39;ultime combat', 5, 'dragonBall5.jpg', 192, '2010-02-15'),
	(12, 7, 'Sangoku', 6, 'dragonBall6.jpg', 197, '2010-02-15'),
	(13, 7, 'La menace', 7, 'dragonball7.jpg', 192, '2010-02-15'),
	(14, 7, 'Le duel', 8, 'dragonBall8.jpg', 192, '2010-02-15'),
	(15, 7, 'Son Gohan', 9, 'dragonBall9.jpg', 192, '2010-02-15'),
	(16, 7, 'Le miraculÃ©', 10, 'dragonBall10.jpg', 192, '2010-02-15'),
	(17, 7, 'Le grand dÃ©fi', 11, 'dragonBall11.jpg', 192, '2010-02-15'),
	(18, 7, 'Les forces du mal', 12, 'dragonBall12.jpg', 192, '2010-02-15'),
	(19, 7, 'L&#39;empire du chaos', 13, 'dragonBall13.jpg', 192, '2010-02-15'),
	(20, 7, 'Le dÃ©mon', 14, 'dragonBall14.jpg', 192, '2010-02-15'),
	(21, 7, 'Chi-Chi', 15, 'dragonBall15.jpg', 192, '2010-02-15'),
	(22, 7, 'L&#39;hÃ©ritier', 16, 'dragonBall16.jpg', 192, '2010-02-15'),
	(23, 8, 'Ã€ l&#39;aube d&#39;une grande aventure', 1, 'onePiece1.jpg', 208, '2013-07-03'),
	(24, 10, 'La rage de vaincre', 1, 'ippo1.jpg', 192, '2007-09-13'),
	(25, 11, 'Black Clover', 1, 'blackClover1.jpg', 192, '2016-09-07'),
	(26, 12, 'vol. 01', 1, 'sun-kenRock1.jpg', 192, '2008-06-01'),
	(27, 13, 'Kenshin dit BattosaÃ¯ Himura', 1, 'kenshinLeVagabond1.jpg', 208, '1998-09-01'),
	(28, 14, 'Vagabond', 1, 'vagabond1.jpg', 240, '2002-01-01'),
	(29, 15, 'Gannibal', 1, 'gannibal1.jpg', 216, '2020-07-08'),
	(30, 16, 'Izuku Midoriya : les origines', 1, 'myHeroAcademia1.jpg', 288, '2016-04-14'),
	(31, 17, 'Naruto', 1, 'naruto1.jpg', 192, '2002-03-01'),
	(32, 18, 'The Death and the strawberry', 1, 'bleach1.jpg', 192, '2003-07-01'),
	(33, 7, 'Les SaÃ¯yens', 17, 'dragonBall17.jpg', 192, '2013-05-24'),
	(34, 7, 'MaÃ®tre KaÃ¯o', 18, 'dragonBall18.jpg', 192, '2013-05-24'),
	(35, 7, 'VÃ©gÃ©ta', 19, 'dragonBall19.jpg', 192, '2010-02-05'),
	(36, 7, 'YajirobÃ©', 20, 'dragonBall20.jpg', 192, '2010-02-15'),
	(37, 7, 'Freezer', 21, 'dragonBall21.jpg', 192, '2010-02-15'),
	(38, 7, 'Zabon & Dodoria', 22, 'dragonBall22.jpg', 192, '2010-02-15'),
	(39, 7, 'Recoom & Guldo', 23, 'dragonBall23.jpg', 192, '2010-02-15'),
	(40, 7, 'Le capitaine GinuÃ©', 24, 'dragonBall24.jpg', 192, '2010-02-15'),
	(41, 7, 'Piccolo', 25, 'dragonBall25.jpg', 192, '2010-02-15'),
	(42, 7, 'Le petit Dende', 26, 'dragonBall26.jpg', 192, '2010-02-15'),
	(43, 7, 'Le Super SaÃ¯yen', 27, 'dragonBall27.jpg', 192, '2010-02-15'),
	(44, 7, 'Trunks', 28, 'dragonBall28.jpg', 192, '2010-02-15'),
	(45, 7, 'Les AndroÃ¯des', 29, 'dragonBall29.jpg', 192, '2010-02-15'),
	(46, 7, 'RÃ©unification', 30, 'dragonBall30.jpg', 192, '2010-02-15'),
	(47, 7, 'Cell se rapproche Ã  pas de loup', 31, 'dragonBall31.jpg', 192, '2013-05-24'),
	(48, 7, 'Cell obtient le corps parfait', 32, 'dragonBall32.jpg', 192, '2013-05-24'),
	(49, 7, 'DÃ©but du Cell Game', 33, 'dragonBall33.jpg', 192, '2010-02-15'),
	(50, 7, 'Le guerrier qui a surpassÃ© GokÃ»', 34, 'dragonBall34.jpg', 192, '2010-02-15'),
	(51, 7, 'Adeux, valeureux guerriers', 35, 'dragonBall35.jpg', 192, '2010-02-15'),
	(52, 7, 'La naissance d&#39;un nouvel hÃ©ros', 36, 'dragonBall36.jpg', 192, '2010-02-15'),
	(53, 7, 'Le plan d&#39;attaque est lancÃ©', 37, 'dragonBall37.jpg', 192, '2013-05-24'),
	(54, 7, 'Le duel fatidique Son GokÃ» contre Vegeta', 38, 'dragonBall38.jpg', 192, '2013-05-24'),
	(55, 7, 'Adieu, guerrier Ã  la force inÃ©galÃ©e', 39, 'dragonBall39.jpg', 192, '2013-05-24'),
	(56, 7, 'La derniÃ¨re arme secrÃ¨te de l&#39;armÃ©e terrienne', 40, 'dragonBall40.jpg', 192, '2013-05-24'),
	(57, 7, 'Courage, Super Gotenks', 41, 'dragonBall41.jpg', 240, '2013-05-24'),
	(58, 7, 'Bye bye Dragon World', 42, 'dragonBall42.jpg', 256, '2013-05-24'),
	(59, 11, 'Black Clover', 2, 'blackClover2.jpg', 192, '2016-09-07'),
	(60, 11, 'Black Clover', 3, 'blackClover3.jpg', 188, '2016-11-09'),
	(61, 11, 'Black Clover', 4, 'blackClover4.jpg', 180, '2017-01-18'),
	(62, 11, 'Black Clover', 5, 'blackClover5.jpg', 192, '2017-03-22'),
	(63, 11, 'Black Clover', 6, 'blackClover6.jpg', 192, '2017-05-24'),
	(64, 11, 'Black Clover', 7, 'blackClover7.jpg', 192, '2017-07-05'),
	(65, 11, 'Black Clover', 8, 'blackClover8.jpg', 192, '2017-09-27'),
	(66, 11, 'Black Clover', 9, 'blackClover9.jpg', 180, '2017-11-02'),
	(67, 11, 'Black Clover', 10, 'blackClover10.jpg', 192, '2018-01-17'),
	(68, 11, 'Black Clover', 11, 'blackClover11.jpg', 193, '2018-03-14'),
	(69, 11, 'Black Clover', 12, 'blackClover12.jpg', 180, '2018-05-16'),
	(70, 11, 'Black Clover', 13, 'blackClover13.jpg', 193, '2018-07-04'),
	(71, 11, 'Black Clover', 14, 'blackClover14.jpg', 193, '2018-09-19'),
	(72, 11, 'Black Clover', 15, 'blackClover15.jpg', 193, '2018-11-07'),
	(73, 11, 'Black Clover', 16, 'blackClover16.jpg', 192, '2019-01-09'),
	(74, 11, 'Black Clover', 17, 'blackClover17.jpg', 192, '2019-03-20'),
	(75, 11, 'Black Clover', 18, 'blackClover18.jpg', 200, '2019-05-15'),
	(76, 11, 'Black Clover', 19, 'blackClover19.jpg', 194, '2019-07-03'),
	(77, 11, 'Black Clover', 20, 'blackClover20.jpg', 193, '2019-09-11'),
	(78, 11, 'Black Clover', 21, 'blackClover21.jpg', 193, '2019-11-13'),
	(79, 11, 'Black Clover', 22, 'blackClover22.jpg', 208, '2020-02-12'),
	(80, 11, 'Black Clover', 23, 'blackClover23.jpg', 192, '2020-06-24'),
	(81, 11, 'Black Clover', 24, 'blackClover24.jpg', 192, '2020-08-19'),
	(82, 11, 'Black Clover', 25, 'blackClover25.jpg', 192, '2020-11-04'),
	(83, 11, 'Black Clover', 26, 'blackClover26.jpg', 192, '2021-02-17'),
	(84, 11, 'Black Clover', 27, 'blackClover27.jpg', 192, '2021-05-19'),
	(85, 12, 'vol. 02', 2, 'sun-kenRock2.jpg', 192, '2008-08-01'),
	(86, 12, 'vol. 03', 3, 'sun-kenRock3.jpg', 192, '2008-12-01'),
	(87, 12, 'vol. 04', 4, 'sun-kenRock4.jpg', 192, '2009-03-11'),
	(88, 12, 'vol. 05', 5, 'sun-kenRock5.jpg', 192, '2009-07-01'),
	(89, 12, 'vol. 06', 6, 'sun-kenRock6.jpg', 192, '2009-09-01'),
	(90, 12, 'vol. 07', 7, 'sun-kenRock7.jpg', 192, '2009-12-01'),
	(91, 12, 'vol. 08', 8, 'sun-kenRock8.jpg', 192, '2010-03-01'),
	(92, 12, 'vol. 09', 9, 'sun-kenRock9.jpg', 192, '2010-09-08'),
	(93, 12, 'vol. 10', 10, 'sun-kenRock10.jpg', 192, '2011-01-01'),
	(94, 12, 'vol. 11', 11, 'sun-kenRock11.jpg', 192, '2011-06-08'),
	(95, 12, 'vol. 12', 12, 'sun-kenRock12.jpg', 192, '2011-11-09'),
	(96, 12, 'vol. 13', 13, 'sun-kenRock13.jpg', 192, '2012-04-11'),
	(97, 12, 'vol. 14', 14, 'sun-kenRock14.jpg', 192, '2012-07-04'),
	(98, 12, 'vol. 15', 15, 'sun-kenRock15.jpg', 192, '2012-11-28'),
	(99, 12, 'vol. 16', 16, 'sun-kenRock16.jpg', 192, '2013-03-13'),
	(100, 12, 'vol. 17', 17, 'sun-kenRock17.jpg', 192, '2013-07-03'),
	(101, 12, 'vol. 18', 18, 'sun-kenRock18.jpg', 192, '2013-10-02'),
	(102, 12, 'vol. 19', 19, 'sun-kenRock19.jpg', 192, '2014-02-05'),
	(103, 12, 'vol. 20', 20, 'sun-kenRock20.jpg', 192, '2014-07-02'),
	(104, 12, 'vol. 21', 21, 'sun-kenRock21.jpg', 192, '2014-11-05'),
	(105, 12, 'vol. 22', 22, 'sun-kenRock22.jpg', 192, '2015-06-03'),
	(106, 12, 'vol. 23', 23, 'sun-kenRock23.jpg', 192, '2016-01-13'),
	(107, 12, 'vol. 24', 24, 'sun-kenRock24.jpg', 192, '2016-07-06'),
	(108, 12, 'vol. 25', 25, 'sun-kenRock25.jpg', 192, '2016-11-09'),
	(109, 15, 'Gannibal', 2, 'gannibal2.jpg', 212, '2020-10-14'),
	(110, 15, 'Gannibal', 3, 'gannibal3.jpg', 208, '2020-12-18'),
	(111, 15, 'Gannibal', 4, 'gannibal4.jpg', 192, '2021-02-24'),
	(112, 15, 'Gannibal', 5, 'gannibal5.jpg', 192, '2021-05-21'),
	(113, 16, 'DÃ©chaine-toi, maudit nerf', 2, 'myHeroAcademia2.jpg', 196, '2016-04-14'),
	(114, 16, 'All Might', 3, 'myHeroAcademia3.jpg', 192, '2016-06-09'),
	(115, 16, 'Celui qui avait tout', 4, 'myHeroAcademia4.jpg', 192, '2016-07-07'),
	(116, 16, 'Shoto Todoroki : les origines', 5, 'myHeroAcademia5.jpg', 192, '2019-09-08'),
	(117, 16, 'FrÃ©missements', 6, 'myHeroAcademia6.jpg', 192, '2016-11-10'),
	(118, 16, 'Katsuki Bakugo : les orginines', 7, 'myHeroAcademia7.jpg', 192, '2017-01-12'),
	(119, 16, 'Momo Yaoyorozu : l&#39;envol', 8, 'myHeroAcademia8.jpg', 188, '2017-04-13'),
	(120, 16, 'My hero', 9, 'myHeroAcademia9.jpg', 192, '2017-07-06'),
	(121, 16, 'All for one', 10, 'myHeroAcademia10.jpg', 192, '2017-09-07'),
	(122, 16, 'La fin du commencement et le commencement de la fin', 11, 'myHeroAcademia11.jpg', 205, '2017-11-09'),
	(123, 16, 'L&#39;examen', 12, 'myHeroAcademia12.jpg', 192, '2018-01-11'),
	(124, 16, 'On va causer de ton alter ! ', 13, 'myHeroAcademia13.jpg', 192, '2018-04-05'),
	(125, 16, 'Overhaul', 14, 'myHeroAcademia14.jpg', 192, '2018-07-05'),
	(126, 16, 'Lutte contre le destin', 15, 'myHeroAcademia15.jpg', 192, '2018-09-06'),
	(127, 16, 'Red Riot', 16, 'myHeroAcademia16.jpg', 208, '2018-11-07'),
	(128, 16, 'Lemillion', 17, 'myHeroAcademia17.jpg', 208, '2019-01-03'),
	(129, 16, 'Un avenir radieux', 18, 'myHeroAcademia18.jpg', 190, '2019-04-04'),
	(130, 16, 'La fÃªte de Yuei', 19, 'myHeroAcademia19.jpg', 192, '2019-07-04'),
	(131, 16, 'La fÃªte de Yuei commence !', 20, 'myHeroAcademia20.jpg', 192, '2019-09-05'),
	(132, 16, 'L&#39;Ã©toffe des hÃ©ros', 21, 'myHeroAcademia21.jpg', 208, '2019-11-07'),
	(133, 16, 'L&#39;hÃ©ritage', 22, 'myHeroAcademia22.jpg', 187, '2020-01-02'),
	(134, 16, 'MÃªlÃ©e gÃ©nÃ©rale', 23, 'myHeroAcademia23.jpg', 192, '2020-06-04'),
	(135, 16, 'All it takes is one bad day', 24, 'myHeroAcademia24.jpg', 192, '2020-07-02'),
	(136, 16, 'Tomura Shigaraki : les origines', 25, 'myHeroAcademia25.jpg', 192, '2020-09-03'),
	(137, 16, 'Sous un ciel d&#39;azur', 26, 'myHeroAcademia26.jpg', 192, '2020-11-05'),
	(138, 16, 'One&#39;s justice', 27, 'myHeroAcademia27.jpg', 192, '2021-01-07'),
	(139, 16, 'Destruction massive', 28, 'myHeroAcademia28.jpg', 192, '2021-04-01'),
	(140, 8, 'Luffy versus la bande Ã  Baggy !!', 2, 'onePiece2.jpg', 208, '2013-07-01'),
	(141, 8, 'Une vÃ©ritÃ© qui blesse', 3, 'onePiece3.jpg', 208, '2013-07-03'),
	(142, 8, 'Attaque au clair de lune', 4, 'onePiece4.jpg', 192, '2013-07-03'),
	(143, 8, 'Pour qui sonne le glas', 5, 'onePiece5.jpg', 192, '2013-07-03'),
	(144, 8, 'Le serment', 6, 'onePiece6.jpg', 192, '2013-07-03'),
	(145, 8, 'Vieux machin', 7, 'onePiece7.jpg', 192, '2013-07-03'),
	(146, 8, 'Je ne mourrai pas !', 8, 'onePiece8.jpg', 192, '2013-07-03'),
	(147, 8, 'Larmes', 9, 'onePiece9.jpg', 208, '2013-07-03'),
	(148, 8, 'OK, Let&#39;s STAND UP !', 10, 'onePiece10.jpg', 192, '2013-07-03');
/*!40000 ALTER TABLE `volumes` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
