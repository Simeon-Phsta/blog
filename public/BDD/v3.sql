-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 05 mai 2021 à 19:20
-- Version du serveur :  5.7.32
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `mvc_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `billet`
--

CREATE TABLE `billet` (
  `BIL_ID` varchar(20) NOT NULL,
  `BIL_DATE` varchar(50) NOT NULL,
  `BIL_TITRE` varchar(100) NOT NULL,
  `BIL_CONTENU` varchar(4000) NOT NULL,
  `BIL_LIEN` text NOT NULL,
  `BIL_IMG` varchar(40) NOT NULL,
  `BIL_TYPE` int(11) NOT NULL,
  `BIL_AUTEUR` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `billet`
--

INSERT INTO `billet` (`BIL_ID`, `BIL_DATE`, `BIL_TITRE`, `BIL_CONTENU`, `BIL_LIEN`, `BIL_IMG`, `BIL_TYPE`, `BIL_AUTEUR`) VALUES
('6005fa16bdcca', '2021-01-5 20:06:16', 'Henri Michaud', 'Qui je fus est son premier recueil \r\n\r\n\r\n\r\nLe grand combat:\r\n\r\n\r\nTrès beau texte d un affrontement entre le narrateur et deux hommes', 'https://www.youtube.com/watch?v=bt3d796ouLY', 'Henri.jpeg', 2, '34'),
('6005fa1eba375', '2021-01-5 20:28:10', 'Frédéric Lordon', 'Economiste et chercheur de gauche radical\r\n', 'https://fr.wikipedia.org/wiki/Fr%C3%A9d%C3%A9ric_Lordon', 'frederic.jpeg', 18, '34'),
('6005fa2247fe5', '2021-01-5 20:39:53', 'Gunter paeli', 'Entrepreneur belge qui est à l origine de l économie bleu qui est un modèle économique s inspirant des écosystèmes naturels, prétend suffire aux besoins de base en valorisant ce qui est disponible localement et en transposant à l échelle industrielle les prouesses de la nature. Ce concept se base sur les principes de l économie circulaire, source d emplois, où chaque déchet deviendrait une source de richesse.', 'https://www.youtube.com/watch?v=UsXzqeZ14Ig', 'Gunte.jpeg', 18, '34'),
('6005fa25b13e1', '2021-01-5 20:47:26', 'Alekseï Stakhanov', 'Mineur en URSS qui fut utilisé comme exemple pour la propagande de par son travail exemplaire. ex : un travail  stakhanovisme', '', 'alexai-3-.jpeg', 18, '34'),
('6005fa29d04de', '2021-01-5 20:59:54', 'Les sketch de dupontel', 'Dupontel est acteur humoriste ayant fait des scketchs. J&#039;ai regardé celui sur les filles qui m a plu.', 'https://www.youtube.com/watch?v=9R8hiwgE7E4', 'Fun.jpeg', 1, '34'),
('6005fa2d0c834', '2021-01-5 21:04:04', 'Le soleil vert', 'Film de Richard Fleischer sorti en 1973. Film d anticipation où la terre est ravagé par le manque de nourriture. L on suit un inspecteur qui en résolvant une enquête découvre que le haut commandement se sert des cadavres d humains pour préparer la base de la nourriture que mange la population et non plus, d algues marines comme ils le disent dans leur spot publicitaire.', '', 'soleil-vert.jpeg', 1, '34'),
('6005fa303fe79', '2021-01-6 18:05:25', 'Monsieur Trump et sa dévestiture', 'Trump sortant aujourd&#039;hui en tant que président se retrouve encore à accuser des grosses entreprises chinoises de collaborer avec son gouvernement. Trump signe donc un énième décret alors que ce dernier rentrera en vigueur quand il ne sera déjà plus président.', '', 'trump-ban.jpeg', 1, '34'),
('6005fa34b6709', '2021-01-6 18:20:29', 'Telegram a une faille !', 'Telegram qui est réputé en tant qu’une des meilleurs messageries instantanées d’un point de vue sécuritaire, se voit découvrir une fail. Il est expliqué dans l’article que cette dernière permet, pour les gens qui ont activé une fonctionnalités permettant rencontrer d’autres utilisateurs de l’application, permet aux hackers de trouver la géolocalisation des utilisateurs.\r\n', 'https://siecledigital.fr/2021/01/06/telegram-vulnerabilite-geolocalisation-hackers', 'Fail-telegram.jpeg', 1, '34'),
('6005fa3ad6af1', '2021-01-11 11:22:37', 'Fuyez what s app', 'L’article m a appris que wath s app appartenait depuis 2014 à facebook, mais surtout que ce 8 février, les deux entités passent dans un partage de données. Donc même avec ce qu on a vu vis-à-vis de Telegram cette semaine, l’application devient une bonne alternative si l on veut envoyer des messages sécurisés et non utiliser par des tierces.\r\n\r\nVoici un article qui est d’accord avec mon analyse :\r\nhttps://nordvpn.com/fr/blog/messagerie-la-plus-securisee/', 'https://siecledigital.fr/2021/01/07/bientot-il-faudra-partager-vos-donnees-whatsapp-avec-facebook-po', 'Run-away-whatsapp.jpeg', 1, '34'),
('6005fa41a70ed', '2021-01-11 11:30:36', 'Rachat de google.com', 'Histoire d’un homme qui a racheté le nom de domaine google.com pour 12 dollars en 2015. Google l’a racheté pour 6000 dollars.\r\n', 'https://siecledigital.fr/2015/10/01/il-rachete-le-nom-de-domaine-google-com-pour-12/', 'trump-ban.jpeg', 1, '34'),
('6005fa450e501', '2021-01-11 11:32:53', 'Répercutions du brexit sur les noms de domaines en Angleterre ', 'Article qui nous parle du retrait de l’UK de l’Europe, ce qui entraine le retrait de nombreux noms d’entreprises à des professionnels ayant l’extension .eu qui appartient à l’Europe. Les personnes qui veulent le récupérer doivent justifier d’avoir une autre adresse dans l’union européenne. Je trouvais cela intéressant comme impacte découlant du brexit.', 'https://siecledigital.fr/2021/01/07/brexit-suspension-81000-sites-eurid/?utm_source=Newsletter+Si%C3', 'euro-flag.png', 1, '34'),
('6005fa48dca72', '2021-01-12 11:03:16', 'Quand les GAFA font mains basses sur la démocratie', 'Après Facebook puis Twitter qui ferment définitivement les comptes de Donald Trump ce week-end, Google et Apple retirent hier de leur boutique d’applis (Apple Store et Google Play Store) le réseau social Parler où s étaient réfugiés les militants trumpistes virés eux-aussi des autres plateformes. La raison invoquée : l absence totale de modérations des contenus. Et ce matin, c’est au tour d’Amazon -- qui héberge Parler via Amazon Web Services.', 'https://www.france24.com/fr/%C3%A9co-tech/20210110-apr%C3%A8s-google-et-apple-amazon-suspend-le-r%C3', 'fr-flag.png', 1, '34'),
('6005fa4e16a73', '2021-01-15 23:47:24', 'Nouvelle présidente de l ARCEP', 'Une nouvelle présidente pour l ARCEP (ou Autorité de régulation des télécoms), avec Madame Laure de la Raudière. Critiquer par Xavier Niel pour avoir travailler chez orange, elle se défend en disant que cela fait plus de 20 ans.', 'https://siecledigital.fr/2021/01/14/laure-de-la-raudiere-assemblee-nationale/', 'new-president-1-.jpeg', 1, '34'),
('6005fa5cf21c8', '2021-01-15 23:47:55', 'La guerre Amazon/Netflix en Inde', 'En Inde, Amazon et Netflix se livrent une guerre pour le marché du service de streaming, avec dernièrement l’un comme l’autre, une offre mobile. Le marché était passé de 50 millions, en 2010, à 600 millions en 2020.', 'https://siecledigital.fr/2021/01/15/inde-amazon-prime-video-abonnemen-reduit/', 'china-flag.png', 1, '34'),
('6005fa613f1d5', '2021-01-15 23:48:25', '... pendant que l’euro commence seulement à s’y mettre et envisage la chose pour 2026. ', '', 'https://siecledigital.fr/2021/01/14/euro-numerique-la-banque-centrale-europeenne-mise-sur-2026/', 'euro_flag.png', 1, '34'),
('6005fa64ba5d6', '2021-01-15 23:48:36', 'La chine met en place les premiers distributeurs pour yuan numérique …', '', 'https://siecledigital.fr/2021/01/14/la-chine-met-en-place-les-premiers-distributeurs-de-yuan-numeriq', 'china_flag.png', 1, '34'),
('6005fa683a318', '2021-01-16 00:01:07', 'Ban def de Donald de Snap et de temps d&#039;autres', 'Ca y est, c’est au tour de Snapchat de bannir définitivement le compte de Donald. Encore une fois la question de la démocratie et de la liberté d’expression est de rigueur quand c’est des entreprises privés qui ont le rôle de juges.\r\nIl a déjà été ban de Youtube, twitter, Twitch, TikTok, Facebook et Redit. Les boutiques shopify qui lui sont reliés, ont été fermées.', 'https://siecledigital.fr/2021/01/15/snapchat-bannit-donald-trump/', 'trump-ban.jpeg', 1, '34'),
('6005fa6e807f7', '2021-01-16 00:01:49', 'Le ministère de l’intérieur épinglé par la CNIL', 'Le ministère de l’intérieur est épinglé par la CNIL pour l’utilisation de drones pendant le confinement sans cadre légal. Il enfreint la loi Informatiques et Libertés. ', 'https://siecledigital.fr/2021/01/14/drones-ministere-interieur-sanction-cnil/', 'fr_flag.png', 1, '34'),
('60324692f153d', '2021-02-21 12:40:02', 'Tendances avec le confinement pour les français', 'Il y a un boum de la cuisine de saison, du &quot;do it yourself&quot;, bricolage et couture, musique, échecs avec le confinement.', 'https://hellobiz.fr/2021/01/28/le-boum-impressionnant-de-la-cuisine-maison-en-temps-de-crise/?mc_cid', 'tendance-confinement.jpeg', 1, '34'),
('603247ccea535', '2021-02-21 12:45:16', 'Les secteurs qui montent avec le confinement', 'Les casinos en ligne, le monde de l&#039;informatique, la restauration et son évolution vers le &quot;à emporter&quot; et enfin le commerce en ligne.', 'https://hellobiz.fr/2021/01/27/les-secteurs-florissants-pendant-la-pandemie-de-covid/?mc_cid=f5e47d8', 'Secteurs-qui-montent.jpeg', 1, '34'),
('603248bf974d2', '2021-02-21 12:49:19', 'Le no code', 'Logiciels et autres sont faisables désormais, ou tout du moins, l&#039;on peut créer une maquette fonctionnelle avec des systèmes aussi simple d&#039;utilisation que Wordpress. Ici, c&#039;est avec l&#039;application web, appy pi.', 'https://hellobiz.fr/2021/01/24/appy-pie-permet-aux-entreprises-de-creer-leurs-propres-applications-e', 'Le-no-code.jpeg', 1, '34'),
('60324aafc01e8', '2021-02-21 12:57:35', 'Nouveau carburant pour l&#039;aviation', 'Des chercheurs de l’université d’Oxford en Angleterre &quot;expliquent en effet, portés à une certaine température en présence d’acide citrique, d’hydrogène et d’un catalyseur fer-manganèse-potassium, le gaz carbonique se transforme en un liquide en mesure d’alimenter des réacteurs d’avions.&quot;', 'https://hellobiz.fr/2020/12/30/des-chercheurs-travaillent-sur-un-carburant-liquide-zero-emission-et-', 'Nouveau-carburant.jpeg', 1, '34'),
('60325d094befa', '2021-02-21 14:15:53', 'Appy Pie', 'Application web cms pour faire tous types d&#039;applications web, mobile et bureau.', 'https://www.appypie.com/app-builder/appmaker', 'Appy-pie.jpeg', 19, '34');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `COM_ID` varchar(20) NOT NULL,
  `COM_DATE` varchar(50) NOT NULL,
  `COM_AUTEUR` varchar(20) NOT NULL,
  `COM_CONTENU` varchar(200) NOT NULL,
  `BIL_ID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `R_ID` varchar(20) NOT NULL,
  `R_LIBELLE` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`R_ID`, `R_LIBELLE`) VALUES
('1', 'Lecteur'),
('2', 'Rédacteur');

-- --------------------------------------------------------

--
-- Structure de la table `typeinformation`
--

CREATE TABLE `typeinformation` (
  `id` int(11) NOT NULL,
  `libelle` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typeinformation`
--

INSERT INTO `typeinformation` (`id`, `libelle`) VALUES
(1, 'News du jour'),
(2, 'Artiste'),
(3, 'Film'),
(18, 'Humain Intéressant'),
(19, 'Entreprise');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `identifiant` varchar(20) NOT NULL,
  `pseudo` varchar(25) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `motdepasse` varchar(250) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`identifiant`, `pseudo`, `mail`, `motdepasse`, `role`) VALUES
('34', 'chihiro', 'try@try.fr', 'Largentcestbien', '1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `billet`
--
ALTER TABLE `billet`
  ADD PRIMARY KEY (`BIL_ID`),
  ADD UNIQUE KEY `BIL_ID` (`BIL_ID`),
  ADD KEY `BIL_TYPE` (`BIL_TYPE`),
  ADD KEY `BIL_AUTEUR` (`BIL_AUTEUR`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`COM_ID`),
  ADD KEY `fk_com_bil` (`BIL_ID`),
  ADD KEY `COM_AUTEUR` (`COM_AUTEUR`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`R_ID`),
  ADD UNIQUE KEY `R_ID` (`R_ID`);

--
-- Index pour la table `typeinformation`
--
ALTER TABLE `typeinformation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`identifiant`),
  ADD UNIQUE KEY `id` (`identifiant`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `typeinformation`
--
ALTER TABLE `typeinformation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `billet`
--
ALTER TABLE `billet`
  ADD CONSTRAINT `billet_ibfk_1` FOREIGN KEY (`BIL_TYPE`) REFERENCES `typeinformation` (`id`),
  ADD CONSTRAINT `billet_ibfk_2` FOREIGN KEY (`BIL_AUTEUR`) REFERENCES `utilisateurs` (`identifiant`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`BIL_ID`) REFERENCES `billet` (`BIL_ID`),
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`COM_AUTEUR`) REFERENCES `utilisateurs` (`identifiant`);

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`R_ID`);
