<?php
//Sessions
ob_start();
session_start();

//-----------------------------------------------------
//SQL
//-----------------------------------------------------
include_once 'sql.php';

//-----------------------------------------------------
//Paramètres du site
//-----------------------------------------------------
define('SITENAME','Port folio');
define('SITENAMELONG','Portfolio d\'Olivier Prieur');
define('SITESLOGAN','');
define('SITEDESCRIPTION','Portfolio d\'Olivier Prieur');
define('SITEKEYWORDS','Nevers, '.SITENAME.', ACS, HTML, PHP, MySQL, Javascript, Bootstrap, PC, C, C++');
//define('SITEURL','http://www.'.SITENAMELONG);
define('SITEURL','127.0.0.1/olivier/portfolio/');
define('SITEURLHTTPS','https://www.'.SITENAMELONG);
define('SITEOWNORNAME','Olivier Prieur');
define('SITEAUTOR','citizenz7');
define('SITEOWNORADDRESS','');
define('SITEVERSION','1.0.2');
define('SITEDATE','17/07/20');
define('COPYDATE','2020');
define('CHARSET','UTF-8');

//----------------------------------------------------
//Images
//----------------------------------------------------
$EXTENSIONS_VALIDES = array( 'jpg' , 'png' ); //extensions d'images valides
define('MAX_FILE_SIZE', 1048576); //Taille maxi en octets du fichier .torrent
$WIDTH_MAX = 500; //Largeur max de l'image en pixels
$HEIGHT_MAX = 400; //Hauteur max de l'image en pixels
$REP_IMAGES_PROJETS = 'img/projets'; //Répertoires des images projets
$REP_IMAGES_ARTICLES = 'img/articles'; //Répertoires des images projets

//set timezone
date_default_timezone_set('Europe/Paris');

//-----------------------------------------------------
//MAIL
//-----------------------------------------------------
define('SITEMAIL','contact@olivierprieur.fr');
define('SITEMAILPASSWORD','7T=u82VPzp!f8Ns2mS');
define('SMTPHOST','mail.s2ii.xyz');
define('SMTPPORT','587');


//-----------------------------------------------------
//FUNCTIONS
//-----------------------------------------------------
//load classes as needed
function my_autoloader($class) {

   $class = strtolower($class);

   //if call from within assets adjust the path
   $classpath = 'classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
   }

   //if call from within admin adjust the path
   $classpath = '../classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
   }

   //if call from within admin adjust the path
   $classpath = '../../classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
   }
}

spl_autoload_register('my_autoloader');

$user = new User($db);


require_once('functions.php');
