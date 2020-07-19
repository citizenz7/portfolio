-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Dim 19 Juillet 2020 à 21:27
-- Version du serveur :  10.1.44-MariaDB-0ubuntu0.18.04.1
-- Version de PHP :  7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `portfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `articleID` int(11) UNSIGNED NOT NULL,
  `articleTitre` varchar(255) NOT NULL,
  `articleTexte` text NOT NULL,
  `articleDate` datetime NOT NULL,
  `articleImage` varchar(255) DEFAULT NULL,
  `articleVues` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`articleID`, `articleTitre`, `articleTexte`, `articleDate`, `articleImage`, `articleVues`) VALUES
(1, 'Obtenir les détails du système et du matériel Linux par la ligne de commande', '<p><strong>Affichage des informations syst&egrave;me de base sur Linux Shell</strong><br />$ uname<br />$ uname -s (kernel name)<br />$ uname -r (kernel release)<br />$ uname -v (kernel linux version)<br />$ uname -n (hostname - Network Node Hostname)<br />$ uname -m (Machine Hardware Architecture: i386, x86_64, etc.)<br />$ uname -p (processor type)<br />$ uname -i (hardware plateforme)<br />$ uname -o (operating system informations)<br />$ uname -a (display all info)<br /><br /><strong>Affichage d\'informations d&eacute;taill&eacute;es sur le mat&eacute;riel</strong><br />$ sudo lshw (Hardware Information)<br />$ sudo lshw -short (R&eacute;sum&eacute; des infos)<br />$ sudo lshw -html &gt; hardwareinfo.html (cr&eacute;er une page HTML des r&eacute;sultats)<br /><br /><strong>Affichage des informations sur le CPU</strong><br />$ lscpu<br /><br /><strong>Affichage des infos sur les p&eacute;riph&eacute;riques type disques, lecteurs</strong><br />$ lsblk<br />$ lsblk -a (informations encore plus d&eacute;taill&eacute;es - loop devices)<br /><br /><strong>Affichage des informations sur les p&eacute;riph&eacute;riques USB</strong><br />$ lsusb<br />$ lsusb -v (informations encore plus d&eacute;taill&eacute;es : \"verbose\")<br /><br /><strong>Affichage des informations sur les p&eacute;riph&eacute;riques PCI</strong><br />$ lspci (lspci --help pour voir toutes les options)<br /><br /><strong>Affichage des informations sur les p&eacute;riph&eacute;riques SCSI</strong><br />$ lsscsi (vous devrez peut-&ecirc;tre installer : sudo apt install lsscsi)<br /><br /><strong>Affichage des informations sur les p&eacute;riph&eacute;riques SATA</strong><br />$ sudo hdparm [devicelocation] ==&gt; exemple : $ sudo hdparm /dev/sda1</p>', '2020-07-19 13:27:00', 'img/articles/htop7.png', 1),
(2, '[PRESSE] Les astuces des constructeurs pour vous empècher de réparer vos appareils', '<p>Je suis tomb&eacute; sur un excellent article de fr.ifixit.com (le site qui vous explique comment r&eacute;parer vos appareils num&eacute;riques). Je suis rester \"sur le cul\" car j\'ai reconnu pas mal de cas pr&eacute;sent&eacute;s. Le titre de cet article \"The Most Common Ways Manufacturers Prevent You From Repairing Your Devices\" en dit d&eacute;j&agrave; long... On pourrait le traduire par \"Les astuces des constructeurs pour vous emp&ecirc;cher de r&eacute;parer vos appareils\".<br />Tr&egrave;s instructif, cet article pr&eacute;sente plusieurs points &agrave; conna&icirc;tre :<br />- Le fameux <span style=\"text-decoration: underline;\">autocollant \"Warranty Void If Removed\"</span> (Annulation de la garantie en cas de suppression) :<br />Ce sticker est ill&eacute;gal dans quelques pays, notamment aux USA, nous dit Jeff Suovanen, un ing&eacute;nieur de iFixit. Il poursuit : \"Un fabricant ne peut pas refuser une r&eacute;paration sous garantie, par exemple, pour votre &eacute;cran, simplement parce que vous avez remplac&eacute; votre propre batterie...\". \"Il y a beaucoup de choses que les fabricants font pour vous dissuader de mani&egrave;re passive-agressive de r&eacute;parer vos mat&eacute;riels, mais les autocollants garantissant la nullit&eacute; en cas de suppression sont beaucoup plus &eacute;vidents.\" Reste &agrave; v&eacute;rifier si c\'est le cas en Europe et particuli&egrave;rement France...<br />- L\'utilisation de <span style=\"text-decoration: underline;\">vis rares ou propri&eacute;taires</span> : Certains fabricants (dont Apple) utilisent des formats de vis dont certains ing&eacute;nieurs n\'avaient jamais entendu parler. &Eacute;videmment, les mat&eacute;riels deviennent presque impossibles &agrave; r&eacute;parer lorsque qu\'on ne peut pas d&eacute;visser certaines parties...<br />- <span style=\"text-decoration: underline;\">Collage</span> au lieu d\'utiliser des vis : Il existe des raisons l&eacute;gitimes d\'utiliser de la colle, comme l\'&eacute;tanch&eacute;it&eacute;. \"Mais il existe presque toujours un meilleur moyen, comme l\'utilisation de vis et de joints. La colle est tr&egrave;s difficile &agrave; \"travailler\" si vous essayez de r&eacute;parer quelque chose. Il est difficile de se s&eacute;parer certaines parties sans les casser, et c\'est p&eacute;nible &agrave; remplacer.\"<br />- Soudage des principaux composants ensemble pour rendre les mises &agrave; niveau et les r&eacute;parations impossibles : \"Les mat&eacute;riels mobiles, par exemple, on pas mal de parties \"soud&eacute;es\". Mais sur certains type d\'appareils la RAM et le stockage sont soud&eacute;s &agrave; la carte m&egrave;re, sans raison technique...\". \"Lorsque vous voyez une &eacute;tiquette indiquant &laquo;aucune pi&egrave;ce r&eacute;parable par l\'utilisateur &agrave; l\'int&eacute;rieur&raquo;, vous savez que le fabricant a tout soud&eacute; et vous n\'avez aucune chance de redonner un coup de jeune &agrave; votre appareil lorsqu\'il ralentit...\"<br />- <span style=\"text-decoration: underline;\">Rendre impossible le d&eacute;montage</span> d\'un appareil sans le d&eacute;truire : Dans les cas les plus flagrants d\'obsolescence planifi&eacute;e, les fabricants rendront un appareil difficile ou impossible &agrave; ouvrir, du moins sans infliger des dommages irr&eacute;parables. \"Le Surface Laptop est l\'un des seuls appareils auxquels nous avons attribu&eacute; un 0 sur 10 pour la r&eacute;parabilit&eacute;, car il &eacute;tait si &eacute;vident qu\'il &eacute;tait con&ccedil;u pour ne jamais &ecirc;tre d&eacute;mont&eacute; ou entretenu, m&ecirc;me par des professionnels...\" nous dit l\'ing&eacute;nieur de ifixit.<br />- Refuser de vendre des <span style=\"text-decoration: underline;\">pi&egrave;ces de rechange</span> : C\'est parfois une gal&egrave;re pour trouver une batterie ou une pi&egrave;ce de rechange adapt&eacute;e &agrave; votre mat&eacute;riel !<br />- Clamer haut et fort qu\'il est<span style=\"text-decoration: underline;\"> impossible ou trop cher de r&eacute;parer</span> tel appareil : \"Enfin, les fabricants diront &agrave; tort aux utilisateurs que certaines r&eacute;parations ne peuvent pas &ecirc;tre effectu&eacute;es, m&ecirc;me lorsque des magasins ind&eacute;pendants sont parfaitement capables de les effectuer.\"<br /><br /><strong>SOURCES : fr.ifixit.com</strong></p>', '2020-07-19 13:25:14', 'img/articles/article2.jpg', 1),
(3, 'QAS : QuickAppsServer, un script Bash basique pour vos serveurs web', '<div>Je me suis amus&eacute;, en cette p&eacute;riode de No&euml;l, &agrave; me concocter un petit script Bash basique que j\'utilise pour installer facilement tout ce dont j\'ai besoin pour un serveur web Debian ou Ubuntu.<br />Ce que propose ce script : Installation de quelques appli basiques (vim, mc, screen, htop, git, curl, ntp, ntpdate, sudo, dnsutils), Installation de quelques appli web (Nginx, php-fpm, Mariadb, openssl, memcached), Installation de quelques appli pour la s&eacute;curit&eacute; (ufw firewall, fail2ban), Installation de Letsencrypt certbot, Ajout et configuration d\'un user syst&egrave;me (+ sudo), Configuration de /etc/hosts, Configuration de /etc/hostname, Reboot<br />Toutes les explications sont ici : <a href=\"https://github.com/citizenz7/QAS\">https://github.com/citizenz7/QAS</a>Hope it helps :D</div>', '2020-07-16 16:09:05', 'img/articles/img_5cc898db4e3d3.png', 1),
(4, 'Afficher des infos sur l\'écran d\'un ordi distant', '<div><strong><em>1/ connexion SSH :</em></strong> <br />ssh -p 10852 <a href=\"mailto:olivier@192.168.0.5\">olivier@192.168.0.5</a><br />-p est utilis&eacute; pour sp&eacute;cifier le N&deg; du port SSH sur le serveur</div>\r\n<div><strong><em><br />2/ Afficher un message sur le bureau de l\'ordinateur distant :</em></strong><br />DISPLAY=:0 zenity --info --text=\"Joyeux noel.nBonne ann&eacute;e.\"&amp;<br />NB: Se connecter avec le serveur X qui permettra de lancer pour soi toutes les applis graphiques (par sur l\'ordinateur distant mais sur son propre ordi) :<br />ssh -p 10852 -X <a href=\"mailto:olivier@192.168.0.5\">olivier@192.168.0.5</a><br />-X : serveur graphique</div>', '2020-07-18 17:51:55', 'img/articles/ssh6454.jpg', 1),
(5, 'PengolinCoin passe en version 2.0.0.2', '<p>PengolinCoin [PGO] est une crypto-monnaie ASIC-resitante, utilisant l\'algorithme PoW Cryptonight_turtle (pico). Les transactions sont rapides, la confidentialit&eacute; et la facilit&eacute; d\'utilisation rendent cette monnaie parfaite pour payer ou donner un pourboire &agrave; n\'importe qui &agrave; tout moment.<br />&Eacute;tant donn&eacute; que les pangolins sont les mammif&egrave;res les plus victimes de la traite dans le monde, PengolinCoin reversera une partie de ses b&eacute;n&eacute;fices &agrave; une &oelig;uvre caritative qui am&eacute;liore tous les aspects de la conservation des pangolins en mettant davantage l\'accent sur la lutte contre le braconnage et le trafic d\'animaux, tout en &eacute;duquant les communaut&eacute;s. Ce sera un point central pour la Roadmap &agrave; long terme.<br />PengolinCoin [PGO] devrait tr&egrave;s rapidement abandonner le Proof Of Work pour passer vers le Proof of Stake.<br />A suivre.</p>', '2020-07-18 17:50:45', 'img/articles/pgo-3.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `memberID` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `apropos` text CHARACTER SET utf8mb4
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`memberID`, `username`, `password`, `email`, `apropos`) VALUES
(1, 'olivier', '$2y$10$qNPFIxOvsBDIR1JZR7XxF.s79mcJwDSnRtjM9g07m4gzQHenIXefq', 'contact@olivierprieur.fr', '<p>Linuxien depuis le d&eacute;but des ann&eacute;es 2000, impliqu&eacute; dans plusieurs projets associatifs de promotion du Libre, de m&eacute;diation num&eacute;rique (animation, formation &agrave; destination du grand public), et ayant eu des exp&eacute;riences professionnelles requ&eacute;rant du d&eacute;veloppement back-end et des interventions sur les r&eacute;seaux de syst&egrave;me d&rsquo;informations d&rsquo;organisations associatives, j&rsquo;ai d&eacute;cid&eacute; d&rsquo;op&eacute;rer une reconvention professionnelle et de faire de la programmation informatique mon m&eacute;tier en mettant mes comp&eacute;tences pr&eacute;c&eacute;demment acquises &agrave; profit.<br /> J&rsquo;ai int&eacute;gr&eacute; l&rsquo;Access Code School de Nevers o&ugrave; je me forme au d&eacute;veloppement web.<br /> Dans ce cadre je suis &agrave; la recherche d&rsquo;un stage en entreprise du 30 novembre 2020 au 8 janvier 2021.</p>'),
(2, 'citizenz', '$2y$10$k3S2uSBySDjuI.Nbhewkpe.iaOnA7aYEVfqgkueu8DgaAdsxGMQCy', 'citizenz7@protonmail.com', 'Rien.');

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

CREATE TABLE `projets` (
  `projetID` int(11) UNSIGNED NOT NULL,
  `projetTitre` varchar(255) NOT NULL,
  `projetCat` varchar(255) NOT NULL,
  `projetTexte` text NOT NULL,
  `projetGithub` varchar(255) DEFAULT NULL,
  `projetDate` datetime NOT NULL,
  `projetImage` varchar(255) DEFAULT NULL,
  `projetVues` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `projets`
--

INSERT INTO `projets` (`projetID`, `projetTitre`, `projetCat`, `projetTexte`, `projetGithub`, `projetDate`, `projetImage`, `projetVues`) VALUES
(1, 'Intégration d\'une maquette au format PSD avec HTML, CSS et Bootstrap', 'HTML-CSS', '<p>Premier projet HTML/Bootstrap &agrave; l\'Acces Code School : depuis un fichier .psd, r&eacute;aliser la maquette du site web en HTML, CSS et Bootstrap</p>', 'https://github.com/citizenz7/integration-template-Interactive-Agency', '2020-06-02 06:07:42', 'img/projets/projet-maquette1.jpg', 13),
(2, 'Intégration d\'une maquette d\'un collègue de formation sans bootstrap', 'HTML-CSS', '<p>Int&eacute;gration de la maquette d\'un coll&egrave;gue de formation en utilisant seulement HTML et CSS (flex-box et media-queries)...</p>', 'https://github.com/citizenz7/integration-oswald', '2020-06-08 06:07:29', 'img/projets/projet-maquette2.jpg', 2),
(3, 'Portfolio PHP/MySQL', 'PHP-SQL', '<p>Projet de cr&eacute;ation d\'un portfolio avec backend PHP / MySQL dans le cadre de l\'Access Code School de Nevers.</p>', 'https://github.com/citizenz7/portfolio', '2020-07-17 13:25:19', 'img/projets/projet3-portfolio.jpg', 5),
(4, 'Projet Explorateur de fichiers en PHP', 'PHP-SQL', '<p>Projet de Files explorer r&eacute;alis&eacute; en PHP</p>', 'https://github.com/citizenz7/files-explorer', '2020-07-02 17:53:01', 'img/projets/projet4-filesexplorer.jpg', 12),
(5, 'Projet Bomberman (jeu) en Javascript', 'JS', '<p>Jeu Bomberman r&eacute;alis&eacute; en <strong>Javascript + HTML + CSS</strong> dans le cadre de la formation D&eacute;veloppeur web et web mobile &agrave; l\'Access Code School de Nevers</p>', 'https://github.com/citizenz7/JS-bomberman', '2020-07-16 13:13:50', 'img/projets/projet5-bomberman.jpg', 8),
(10, 'Ceci est un test', 'HTML-CSS', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure</p>', NULL, '2020-07-18 17:51:04', 'img/projets/projet.png', 14);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`articleID`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`memberID`);

--
-- Index pour la table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`projetID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `articleID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `memberID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `projets`
--
ALTER TABLE `projets`
  MODIFY `projetID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
