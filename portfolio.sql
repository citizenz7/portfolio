-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 17 juil. 2020 à 14:49
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `articleID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `articleTitre` varchar(255) NOT NULL,
  `articleTexte` text NOT NULL,
  `articleDate` datetime NOT NULL,
  `articleImage` varchar(255) DEFAULT NULL,
  `articleVues` int(11) NOT NULL,
  PRIMARY KEY (`articleID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`articleID`, `articleTitre`, `articleTexte`, `articleDate`, `articleImage`, `articleVues`) VALUES
(1, 'Obtenir les dÃ©tails du systÃ¨me et du matÃ©riel Linux par la ligne de commande', '<section><strong>Affichage des informations syst&egrave;me de base sur Linux Shell</strong><br />\r\n<pre>$ uname<br />$ uname -s (kernel name)<br />$ uname -r (kernel release)<br />$ uname -v (kernel linux version)<br />$ uname -n (hostname - Network Node Hostname)<br />$ uname -m (Machine Hardware Architecture: i386, x86_64, etc.)<br />$ uname -p (processor type)<br />$ uname -i (hardware plateforme)<br />$ uname -o (operating system informations)<br />$ uname -a (display all info)</pre>\r\n<br /><strong>Affichage d\'informations d&eacute;taill&eacute;es sur le mat&eacute;riel</strong><br />\r\n<pre>$ sudo lshw (Hardware Information)<br />$ sudo lshw -short (R&eacute;sum&eacute; des infos)<br />$ sudo lshw -html &gt; hardwareinfo.html (cr&eacute;er une page HTML des r&eacute;sultats)</pre>\r\n<br /><strong>Affichage des informations sur le CPU</strong><br />\r\n<pre>$ lscpu</pre>\r\n<br /><strong>Affichage des infos sur les p&eacute;riph&eacute;riques type disques, lecteurs</strong><br />\r\n<pre>$ lsblk<br />$ lsblk -a (informations encore plus d&eacute;taill&eacute;es - loop devices)</pre>\r\n<br /><strong>Affichage des informations sur les p&eacute;riph&eacute;riques USB</strong><br />\r\n<pre>$ lsusb<br />$ lsusb -v (informations encore plus d&eacute;taill&eacute;es : \"verbose\")</pre>\r\n<br /><strong>Affichage des informations sur les p&eacute;riph&eacute;riques PCI</strong><br />\r\n<pre>$ lspci (lspci --help pour voir toutes les options)</pre>\r\n<br /><strong>Affichage des informations sur les p&eacute;riph&eacute;riques SCSI</strong><br />\r\n<pre>$ lsscsi (vous devrez peut-&ecirc;tre installer : sudo apt install lsscsi)</pre>\r\n<br /><strong>Affichage des informations sur les p&eacute;riph&eacute;riques SATA</strong><br />\r\n<pre>$ sudo hdparm [devicelocation] ==&gt; exemple : $ sudo hdparm /dev/sda1</pre>\r\n</section>', '2020-07-16 13:47:57', 'img/articles/htop7.png', 5),
(2, '[PRESSE] Les astuces des constructeurs pour vous empÃªcher de rÃ©parer vos appareils', '<div>Je suis tomb&eacute; sur <a title=\"un excellent article de ifixit.com\" href=\"https://fr.ifixit.com/News/the-most-common-ways-manufacturers-prevent-you-from-repairing-your-devices?fbclid=IwAR21gHZGmdcae5i--a4DlkothmHt1WEdEPM0vlEvR13LiNDdG-ZWVSDtOE4\">un excellent article de fr.ifixit.com</a> (le site qui vous explique comment r&eacute;parer vos appareils num&eacute;riques).<br /> Je suis rester \"sur le cul\" car j\'ai reconnu pas mal de cas pr&eacute;sent&eacute;s. <br />Le titre de cet article \"The Most Common Ways Manufacturers Prevent You From Repairing Your Devices\" en dit d&eacute;j&agrave; long... On pourrait le traduire par \"Les astuces des constructeurs pour vous emp&ecirc;cher de r&eacute;parer vos appareils\".</div>\r\n<div>Tr&egrave;s instructif, cet article pr&eacute;sente plusieurs points &agrave; conna&icirc;tre :<br /><br />\r\n<div>- <u><strong>Le fameux autocollant \"Warranty Void If Removed\" (Annulation de la garantie en cas de suppression)</strong></u> :</div>\r\n<div>Ce sticker est ill&eacute;gal dans quelques pays, notamment aux USA, nous dit Jeff Suovanen, un ing&eacute;nieur de iFixit.</div>\r\nIl poursuit : \"Un fabricant ne peut pas refuser une r&eacute;paration sous garantie, par exemple, pour votre &eacute;cran, simplement parce que vous avez remplac&eacute; votre propre batterie...\".<br />\"Il y a beaucoup de choses que les fabricants font pour vous dissuader de mani&egrave;re passive-agressive de r&eacute;parer vos mat&eacute;riels, mais les autocollants garantissant la nullit&eacute; en cas de suppression sont beaucoup plus &eacute;vidents.\"<br />Reste &agrave; v&eacute;rifier si c\'est le cas en Europe et particuli&egrave;rement France...<br /><br />- <u><strong>L\'utilisation de vis rares ou propri&eacute;taires</strong></u><strong> :</strong><br />Certains fabricants (dont Apple) utilisent des formats de vis dont certains ing&eacute;nieurs n\'avaient jamais entendu parler. &Eacute;videmment, les mat&eacute;riels deviennent presque impossibles &agrave; r&eacute;parer lorsque qu\'on ne peut pas d&eacute;visser certaines parties...<br /><br />\r\n<div>- <u><strong>Collage au lieu d\'utiliser des vis</strong></u> :</div>\r\n<div>Il existe des raisons l&eacute;gitimes d\'utiliser de la colle, comme l\'&eacute;tanch&eacute;it&eacute;.</div>\r\n\"Mais il existe presque toujours un meilleur moyen, comme l\'utilisation de vis et de joints. La colle est tr&egrave;s difficile &agrave; \"travailler\" si vous essayez de r&eacute;parer quelque chose. Il est difficile de se s&eacute;parer certaines parties sans les casser, et c\'est p&eacute;nible &agrave; remplacer.\"<br /><br />\r\n<div>- <u><strong>Soudage des principaux composants ensemble pour rendre les mises &agrave; niveau et les r&eacute;parations impossibles</strong></u> :</div>\r\n<div>\"Les mat&eacute;riels mobiles, par exemple, on pas mal de parties \"soud&eacute;es\". Mais sur certains type d\'appareils la RAM et le stockage sont soud&eacute;s &agrave; la carte m&egrave;re, sans raison technique...\"</div>\r\n\"Lorsque vous voyez une &eacute;tiquette indiquant &laquo;aucune pi&egrave;ce r&eacute;parable par l\'utilisateur &agrave; l\'int&eacute;rieur&raquo;, vous savez que le fabricant a tout soud&eacute; et vous n\'avez aucune chance de redonner un coup de jeune &agrave; votre appareil lorsqu\'il ralentit...\"<br /><br />\r\n<div>- <u><strong>Rendre impossible le d&eacute;montage d\'un appareil sans le d&eacute;truire</strong></u> :</div>\r\n<div>Dans les cas les plus flagrants d\'obsolescence planifi&eacute;e, les fabricants rendront un appareil difficile ou impossible &agrave; ouvrir, du moins sans infliger des dommages irr&eacute;parables.</div>\r\n\"Le Surface Laptop est l\'un des seuls appareils auxquels nous avons attribu&eacute; un 0 sur 10 pour la r&eacute;parabilit&eacute;, car il &eacute;tait si &eacute;vident qu\'il &eacute;tait con&ccedil;u pour ne jamais &ecirc;tre d&eacute;mont&eacute; ou entretenu, m&ecirc;me par des professionnels...\" nous dit l\'ing&eacute;nieur de ifixit.<br /><br />\r\n<div>- <u><strong>Refuser de vendre des pi&egrave;ces de rechange</strong></u> :</div>\r\n<div>C\'est parfois une gal&egrave;re pour trouver une batterie ou une pi&egrave;ce de rechange adapt&eacute;e &agrave; votre mat&eacute;riel !</div>\r\n<br />\r\n<div>- <u><strong>Clamer haut et fort qu\'il est impossible ou trop cher de r&eacute;parer tel appareil</strong> : </u></div>\r\n<div>\"Enfin, les fabricants diront &agrave; tort aux utilisateurs que certaines r&eacute;parations ne peuvent pas &ecirc;tre effectu&eacute;es, m&ecirc;me lorsque des magasins ind&eacute;pendants sont parfaitement capables de les effectuer.\"</div>\r\n<div>&nbsp;</div>\r\n<div>SOURCES : <a title=\"fr.ifixit.com\" href=\"https://fr.ifixit.com/News/the-most-common-ways-manufacturers-prevent-you-from-repairing-your-devices?fbclid=IwAR21gHZGmdcae5i--a4DlkothmHt1WEdEPM0vlEvR13LiNDdG-ZWVSDtOE4\">fr.ifixit.com</a></div>\r\n</div>', '2020-07-16 14:31:20', 'img/articles/article2.jpg', 1),
(3, 'QAS : QuickAppsServer, un script Bash basique pour vos serveurs web', '<div>Je me suis amus&eacute;, en cette p&eacute;riode de No&euml;l, &agrave; me concocter un petit script Bash basique que j\'utilise pour installer facilement tout ce dont j\'ai besoin pour un serveur web Debian ou Ubuntu.<br />Ce que propose ce script : Installation de quelques appli basiques (vim, mc, screen, htop, git, curl, ntp, ntpdate, sudo, dnsutils), Installation de quelques appli web (Nginx, php-fpm, Mariadb, openssl, memcached), Installation de quelques appli pour la s&eacute;curit&eacute; (ufw firewall, fail2ban), Installation de Letsencrypt certbot, Ajout et configuration d\'un user syst&egrave;me (+ sudo), Configuration de /etc/hosts, Configuration de /etc/hostname, Reboot<br />Toutes les explications sont ici : <a href=\"https://github.com/citizenz7/QAS\">https://github.com/citizenz7/QAS</a>Hope it helps :D</div>', '2020-07-16 16:09:05', 'img/articles/img_5cc898db4e3d3.png', 1),
(4, 'Afficher des infos sur l\'Ã©cran d\'un ordi distant', '<div><strong><em>1/ connexion SSH :</em></strong> <br />ssh -p 10852 <a href=\"mailto:olivier@192.168.0.5\">olivier@192.168.0.5</a><br />-p est utilis&eacute; pour sp&eacute;cifier le N&deg; du port SSH sur le serveur</div>\r\n<div><strong><em><br />2/ Afficher un message sur le bureau de l\'ordinateur distant :</em></strong><br />DISPLAY=:0 zenity --info --text=\"Joyeux noel.nBonne ann&eacute;e.\"&amp;<br />NB: Se connecter avec le serveur X qui permettra de lancer pour soi toutes les applis graphiques (par sur l\'ordinateur distant mais sur son propre ordi) :<br />ssh -p 10852 -X <a href=\"mailto:olivier@192.168.0.5\">olivier@192.168.0.5</a><br />-X : serveur graphique</div>', '2020-07-16 15:53:37', 'img/articles/ssh6454.jpg', 8),
(5, 'PengolinCoin passe en version 2.0.0.2', '<p>PengolinCoin [PGO] est une crypto-monnaie ASIC-resitante, utilisant l\'algorithme PoW Cryptonight_turtle (pico). Les transactions sont rapides, la confidentialit&eacute; et la facilit&eacute; d\'utilisation rendent cette monnaie parfaite pour payer ou donner un pourboire &agrave; n\'importe qui &agrave; tout moment.<br />&Eacute;tant donn&eacute; que les pangolins sont les mammif&egrave;res les plus victimes de la traite dans le monde, PengolinCoin reversera une partie de ses b&eacute;n&eacute;fices &agrave; une &oelig;uvre caritative qui am&eacute;liore tous les aspects de la conservation des pangolins en mettant davantage l\'accent sur la lutte contre le braconnage et le trafic d\'animaux, tout en &eacute;duquant les communaut&eacute;s. Ce sera un point central pour la Roadmap &agrave; long terme.<br />PengolinCoin [PGO] devrait tr&egrave;s rapidement abandonner le Proof Of Work pour passer vers le Proof of Stake.<br />A suivre.</p>', '2020-07-16 15:51:29', 'img/articles/pgo-3.jpg', 10);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `memberID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `apropos` text CHARACTER SET utf8mb4 DEFAULT NULL,
  PRIMARY KEY (`memberID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`memberID`, `username`, `password`, `email`, `apropos`) VALUES
(1, 'olivier', '$2y$10$kZMsuXc.MLxFq1N4qLhVo.bUyUAL603yltDbXoydZ0E.lU90wV3ea', 'contact@olivierprieur.fr', '<p>Linuxien depuis le d&eacute;but des ann&eacute;es 2000, impliqu&eacute; dans plusieurs projets associatifs de promotion du Libre, de m&eacute;diation num&eacute;rique (animation, formation &agrave; destination du grand public), et ayant eu des exp&eacute;riences professionnelles requ&eacute;rant du d&eacute;veloppement back-end et des interventions sur les r&eacute;seaux de syst&egrave;me d&rsquo;informations d&rsquo;organisations associatives, j&rsquo;ai d&eacute;cid&eacute; d&rsquo;op&eacute;rer une reconvention professionnelle et de faire de la programmation informatique mon m&eacute;tier en mettant mes comp&eacute;tences pr&eacute;c&eacute;demment acquises &agrave; profit.<br /> J&rsquo;ai int&eacute;gr&eacute; l&rsquo;Access Code School de Nevers o&ugrave; je me forme au d&eacute;veloppement web.<br /> Dans ce cadre je suis &agrave; la recherche d&rsquo;un stage en entreprise du 30 novembre 2020 au 8 janvier 2021.</p>'),
(2, 'citizenz', '$2y$10$k3S2uSBySDjuI.Nbhewkpe.iaOnA7aYEVfqgkueu8DgaAdsxGMQCy', 'citizenz7@protonmail.com', 'Rien.');

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

DROP TABLE IF EXISTS `projets`;
CREATE TABLE IF NOT EXISTS `projets` (
  `projetID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `projetTitre` varchar(255) NOT NULL,
  `projetCat` varchar(255) NOT NULL,
  `projetFilter` varchar(255) NOT NULL,
  `projetTexte` text NOT NULL,
  `projetGithub` varchar(255) DEFAULT NULL,
  `projetDate` datetime NOT NULL,
  `projetImage` varchar(255) DEFAULT NULL,
  `projetVues` int(11) NOT NULL,
  PRIMARY KEY (`projetID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `projets`
--

INSERT INTO `projets` (`projetID`, `projetTitre`, `projetCat`, `projetFilter`, `projetTexte`, `projetGithub`, `projetDate`, `projetImage`, `projetVues`) VALUES
(1, 'IntÃ©gration d\'une maquette au format PSD avec HTML, CSS et Bootstrap', 'HTML / CSS / Bootstrap', 'html', '<p>Premier projet HTML/Bootstrap &agrave; l\'Acces Code School : depuis un fichier .psd, r&eacute;aliser la maquette du site web en HTML, CSS et Bootstrap</p>', 'https://github.com/citizenz7/integration-template-Interactive-Agency', '2020-06-08 12:41:14', 'img/projets/projet-maquette1.jpg', 6),
(2, 'IntÃ©gration d\'une maquette d\'un collÃ¨gue de formation sans bootstrap', 'HTML / CSS', 'html', '<p>Int&eacute;gration de la maquette d\'un coll&egrave;gue de formation en utilisant seulement HTML et CSS (flex-box et media-queries)...</p>', 'https://github.com/citizenz7/integration-oswald', '2020-07-08 13:18:31', 'img/projets/projet-maquette2.jpg', 8),
(3, 'Portfolio PHP/MySQL', 'HTML / CSS / PHP / MySQL', 'php', '<p>Projet de cr&eacute;ation d\'un portfolio avec backend PHP / MySQL dans le cadre de l\'Access Code School de Nevers.</p>', 'https://github.com/citizenz7/portfolio', '2020-07-16 13:25:19', 'img/projets/projet3-portfolio.jpg', 5),
(4, 'Projet Explorateur de fichiers en PHP', 'HTML / CSS / PHP', 'php', '<p>Projet de Files explorer r&eacute;alis&eacute; en PHP</p>', 'https://github.com/citizenz7/files-explorer', '2020-07-08 14:17:44', 'img/projets/projet4-filesexplorer.jpg', 7),
(5, 'Projet Bomberman (jeu) en Javascript', 'Javascript', 'js', '<p>Jeu Bomberman r&eacute;alis&eacute; en <strong>Javascript + HTML + CSS</strong> dans le cadre de la formation D&eacute;veloppeur web et web mobile &agrave; l\'Access Code School de Nevers</p>', 'https://github.com/citizenz7/JS-bomberman', '2020-07-16 13:13:50', 'img/projets/projet5-bomberman.jpg', 6),
(10, 'Ceci est un test', 'HTML, CSS', 'html', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure</p>', NULL, '2020-07-17 16:04:52', 'img/projets/projet.png', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
