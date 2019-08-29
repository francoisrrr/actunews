-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 25 mars 2019 à 09:50
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `actunews`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(100) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_categorie` int(100) NOT NULL,
  `id_auteur` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `titre`, `contenu`, `image`, `date_creation`, `id_categorie`, `id_auteur`) VALUES
(31, 'Sekiro trailer!', 'AprÃ¨s Resident Evil 2 et Devil May Cry 5, le Japon offrira une nouvelle pÃ©pite du jeu d\'action, dans un style encore diffÃ©rent de ces deux titres Capcom : ce soft, vous le savez, c\'est Sekiro : Shadows Die Twice et il n\'est pas conÃ§u par n\'importe qui puisque directrement issu des studios de FromSoftware, les auteurs des franchises Dark Souls et Bloodborne. \r\n\r\nÃ vrai dire, l\'excitation est plus que palpable Ã  son sujet. Non seulement son gameplay s\'avÃ¨re dÃ©licieusement exigeant, mais sa direction artistique, doublÃ©e d\'une Ã©criture poignante et d\'un scÃ©nario particuliÃ¨rement sombre, promet une aventure sublime. D\'ailleurs, nous avons eu l\'occasion d\'y jouer un bon moment Ã  Londres et, comme nous vous le disions dans notre preview, nous l\'attendons rÃ©ellement de pied ferme. \r\n\r\nBref, Ã©tant donnÃ© que le jeu sera disponible le 22 mars prochain, soit dans un peu plus de dix jours seulement, Activision vient d\'en dÃ©voiler le trailer de lancement. Et ce dernier met tout le monde d\'accord. On a hÃ¢te, pas vous ?', 'sekiro.jpg', '2019-03-15 14:06:35', 40, 108),
(32, 'Naufrage du Â« Grande America Â» : la nappe de pÃ©trole pourrait toucher le littoral dimanche ou lun', 'Des nappes de pÃ©trole provenant du navire italien Grande America, qui a sombrÃ© mardi au large de la Bretagne, Â« pourraient toucher le littoral franÃ§ais vers dimanche ou lundi Â», a averti jeudi 14 mars sur Franceinfo le ministre de la transition Ã©cologique, FranÃ§ois de Rugy. Pour lâheure, les dÃ©partements potentiellement concernÃ©s sont la Gironde et la Charente-Maritime, Â« mais nous verrons sâil faut Ã©tendre la zone de protection Ã  terre Â».\r\n\r\nSelon M. de Rugy, la nappe dâhydrocarbure prÃ©sente Ã  la surface de la mer â dâune dizaine de kilomÃ¨tres de long pour un kilomÃ¨tre de large â est Â« trÃ¨s probablement le fioul de propulsion, qui alimentait les moteurs de ce navire Â». Le bateau transportait 365 conteneurs, dont 45 rÃ©pertoriÃ©s comme contenant des matiÃ¨res dangereuses, selon le prÃ©fet maritime de lâAtlantique, mais Â« on pense que la plupart ont brÃ»lÃ© Â», a prÃ©cisÃ© le ministre. Cependant, Â« plusieurs containers sont passÃ©s par-dessus bord avant que le navire coule Â» puis dâautres se sont dispersÃ©s quand le bateau a coulÃ©.\r\n\r\nÂ« Malheureusement, le trÃ¨s mauvais Ã©tat de la mer, la faible visibilitÃ© nâont pas permis pour lâinstant dâidentifier si ces containers avaient coulÃ© ou si certains flottent entre deux eaux aux alentours de la zone oÃ¹ le Grande America a coulÃ©. Â»\r\nAide europÃ©enne\r\n\r\nM. de Rugy assure quâun pompage sera tentÃ© avant que le pÃ©trole nâatteigne le littoral, mais cette opÃ©ration Â« est rendue extrÃªmement difficile par les conditions mÃ©tÃ©orologiques qui sont celles dâune tempÃªte dâhiver Â».\r\n\r\nMercredi, lors dâune confÃ©rence de presse, le prÃ©fet Jean-Louis Lozier a prÃ©cisÃ© que le propriÃ©taire du porte-conteneurs de 213 mÃ¨tres, lâarmateur Grimaldi Groupa, a Ã©tÃ© mis en demeure de Â« mettre fin au danger pour la navigation et lâenvironnement marin reprÃ©sentÃ© par les conteneurs et autres Ã©lÃ©ments Ã  la dÃ©rive Â» et de Â« traiter les Ã©ventuelles pollutions maritimes Â». Aussi, un bateau affrÃ©tÃ© par lâarmateur doit arriver prochainement sur place, selon M. de Rugy, qui a annoncÃ© avoir Ã©galement Â« sollicitÃ© les autoritÃ©s europÃ©ennes Â» et lâEMSA (European Maritime Safety Agency), qui Â« va dÃ©ployer au moins deux navires sur place en plus des deux navires de lâEtat franÃ§ais Â».\r\n\r\nLâassociation de dÃ©fense de lâenvironnement Robin des bois a annoncÃ© son intention de porter plainte Â« pour pollution et abandon de dÃ©chets Â».\r\nJadot critique le Â« laxisme Â» autour du transport maritime\r\n\r\nJeudi, Yannick Jadot, candidat EELV aux europÃ©ennes, a critiquÃ© sur France 2 le Â« laxisme autour du transport maritime Â» : Â« Lâorganisme maritime international est trustÃ© par tous les pavillons de complaisance qui essayent en permanence de lutter Ã  la baisse contre toutes les rÃ¨gles Ã  la fois sociales, de sÃ©curitÃ©, dâenvironnement. Câest dans ce cadre-lÃ  quâon nâarrive pas Ã  taxer le fioul lourd. Â» LâÃ©cologiste a demandÃ© une plus forte intervention de lâEurope sur le sujet :\r\n\r\nÂ« A partir du moment oÃ¹ un navire arrive sur un port europÃ©en, il faut absolument renforcer tous les contrÃ´les (â¦). Dans les ports europÃ©ens, pour ne pas se poser trop de problÃ¨mes, on nâexige rien, on prÃ©fÃ¨re quâun bateau soit Ã  la mer plutÃ´t que fixÃ© Ã  un port. Â»\r\n\r\nM de Rugy a lui niÃ© tout laxisme. Â« Nous avons une action qui est extrÃªmement dÃ©terminÃ©e pour la sÃ©curitÃ© maritime Â» , a-t-il rÃ©pondu sur Public SÃ©nat, citant la crÃ©ation de routes maritimes Â« surveillÃ©es de faÃ§on trÃ¨s stricte Â» et dâune Agence europÃ©enne pour la sÃ©curitÃ© maritime. Â« A partir du moment oÃ¹ on vient (â¦) dans un grand port europÃ©en, il y a des contrÃ´les Â», a-t-il assurÃ©.\r\n\r\nUn incendie sâÃ©tait dÃ©clarÃ© dimanche soir Ã  bord du Grande America, qui transportait des conteneurs et des vÃ©hicules depuis le port de Hambourg, en Allemagne, jusquâÃ  celui de Casablanca, au Maroc. Le commandant a dÃ©cidÃ© dâabandonner le navire dans la nuit, Ã  bord dâune seule embarcation de sauvetage. Les vingt-sept membres de lâÃ©quipage ont Ã©tÃ© Ã©vacuÃ©s sains et saufs.', 'naufrage.jpg', '2019-03-15 14:06:44', 38, 109),
(33, ' Samurai Spirits de retour en 2019 ! ', 'La rumeur circulait depuis quelques temps, SNK semblait dÃ©cidÃ© a relancer la licence Samurai Shodown (Samurai Spirits pour les intimes). Et bien voilÃ , le premier teaser vient d\'Ãªtre prÃ©sentÃ© lors de la confÃ©rence Sony au Tokyo Game Show ! Le jeu se nomme tout simplement Samurai Spirits.\r\n\r\nAdieu la 2D des jeux Neo Geo, place Ã  l\'Unreal Engine de gros kÃ©kÃ© (dans un style proche de Street Fighter 4 et 5)... Bon, faut voir, j\'ai peur que le passage Ã  la 3D tue un peu le charme ancestral de la licence... Bonne nouvelle en tout cas, surtout pour les possesseurs d\'une PS4, car c\'est le seul support annoncÃ©. Sortie en 2019.', 'samurai.jpg', '2019-03-15 14:06:56', 40, 108),
(35, 'B 737 MAX : ce scÃ©nario du pire qui pourrait coÃ»ter trÃ¨s cher a  Boeing', 'La suspension de vols de toute la flotte de B737 MAX risque d\'entraÃ®ner une interruption des livraisons d\'avions, et le paiement de compensations et de pÃ©nalitÃ©s aux compagnies aÃ©riennes. Le montant de la facture dÃ©pendra de la durÃ©e de la suspension des vols. Analyse.\r\n\r\nArrÃªt des livraisons, de la production, compensations aux clients, perte a court terme des campagnes de ventes en court au profit d\'Airbus : vingt-deux mois Ã  peine aprÃ¨s la mise en service du premier Boeing 737 MAX, la suspension des vols de l\'appareil peut, dans le pire des scenarios, coÃ»ter trÃ¨s cher Ã  l\'avionneur amÃ©ricain. Tout dÃ©pendra Ã©videmment de la durÃ©e de la suspension des vols dÃ©cidÃ©e depuis l\'accident d\'un B 737 MAX 8 d\'Ethiopian Airlines ce dimanche par les diffÃ©rentes autoritÃ©s de l\'aviation civile un peu partout dans le monde, dont celle des Etats-Unis depuis hier.\r\nAnalyse des boÃ®tes noires en France\r\n\r\nLa durÃ©e de la suspension sera liÃ©e au temps qu\'il faudra pour identifier concrÃ¨tement les dysfonctionnements de l\'avion, concevoir une solution fiable, et certifier celle-ci. Difficile en l\'absence d\'indications prÃ©cises d\'Ã©tablir un calendrier aujourd\'hui. Seule l\'analyse des boÃ®tes noires de l\'avion qui sera faite en France permettra aux autoritÃ©s d\'Ã©tablir un diagnostic prÃ©cis sur les raisons de l\'accident d\'Ethiopian Airlines, quatre mois aprÃ¨s celui d\'un avion du mÃªme type de Lion Air avec de fortes similitudes.\r\n\r\nPour autant, lors d\'une confÃ©rence tÃ©lÃ©phonique mercredi citÃ©e par l\'agence Reuters, la direction de l\'aviation civile amÃ©ricaine, la Federal Administration Agency (FAA), a lÃ¢chÃ© que cela allait prendre \"des mois\" avant que les problÃ¨mes de logiciels des Boeing 737 MAX soient rÃ©glÃ©s.\r\n\r\n    \"Une problÃ©matique de logiciels peut se rÃ©gler rapidement autour de 4 Ã  5 mois. D\'autant plus si une solution temporaire est mise en place. Si la dÃ©faillance concerne des systÃ¨mes critiques avec des design faussÃ©es, cela peut aller jusqu\'Ã  12 mois\", indique Ã  La Tribune un expert.\r\n\r\nInterruption des livraisons\r\n\r\nLa durÃ©e de la suspension des vols est donc cruciale pour Boeing. Car elle dictera la  durÃ©e de l\'interruption des livraisons. A raison d\'une cinquantaine d\'avions livrÃ©s par mois (un B737 MAX 8 ou MAX 9 valant au prix catalogue entre 125 et 130 millions de dollars), la perte de chiffre d\'affaires peut-Ãªtre considÃ©rable en cas de suspension longue. Par ailleurs, les compagnies impactÃ©es (celles qui ont reÃ§u les 371 appareils aujourd\'hui clouÃ©s au sol et celles qui devaient les recevoir prochainement) exigeront des compensations financiÃ¨res. Les nÃ©gociations porteront notamment sur les frais de location d\'avions pour remplacer les B737 MAX et sur le surcoÃ»t opÃ©rationnel de ces appareils de substitution. Norwegian a dÃ©jÃ  posÃ© le problÃ¨me sur la table.\r\n\r\nPar ailleurs, une interruption longue des livraisons entraÃ®nera un chamboulement du calendrier de livraisons. Avec Ã  la clÃ© de fortes pÃ©nalitÃ©s Ã  payer aux compagnies aÃ©riennes. Elles seraient d\'autant plus Ã©levÃ©es que le nombre d\'avions et de clients de cet avion est important. Plus de 4.000 appareils sont en commande.\r\n\r\nA cela s\'ajoute Ã©videmment le risque d\'annulation de commandes. Une telle interruption des livraisons pourrait Ã©galement faire le jeu de l\'A320Neo d\'Airbus, au moins Ã  court terme. Airbus peut en effet en profiter pour \"aller chercher des parts de marchÃ©\" sur des clients traditionnels de Boeing.\r\n\r\nEn outre, en cas d\'arrÃªt des livraisons, la question du maintien des achats auprÃ¨s des fournisseurs se posera. Pendant les dÃ©boires de la phase d\'industrialisation du B787 il y a une dizaine d\'annÃ©es, le constructeur amÃ©ricain avait maintenu les achats pour ne pas les fragiliser sur le plan financier. Plusieurs industriels franÃ§ais, notamment Safran, sont des fournisseurs du B737 MAX.', 'b737max.jpg', '2019-03-15 14:07:04', 38, 108),
(38, 'toto story', '<p>lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem</p>\r\n', '404', '2019-03-18 15:48:29', 38, 108);

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `id_auteur` int(11) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`id_auteur`, `prenom`, `nom`, `email`, `password`) VALUES
(108, 'Jean-Jacques', 'TITI', 'jj@wf3.fr', '$2y$10$ZLZ5sJK1kYTl7eBUPr1uY.GZAMVFwHdVSmrxace.vLz6LrFA/1EIK'),
(109, 'Lucette', 'TATA', 'lulu@wf3.fr', '$2y$10$.anS4mwzVrbgv4DfpA3Z1OzUYk3vr3hpGnIURc3ZyYSKsGeDMm2t2');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(100) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom`) VALUES
(38, 'News'),
(40, 'Divertissement');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `id_categorie` (`id_categorie`),
  ADD KEY `id_auteur` (`id_auteur`);

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`id_auteur`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `id_auteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `id_auteur` FOREIGN KEY (`id_auteur`) REFERENCES `auteur` (`id_auteur`),
  ADD CONSTRAINT `id_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
