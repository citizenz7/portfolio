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
define('SITENAME','xxxxxxxxxxxxxxxxxxx');
define('SITENAMELONG','xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');
define('SITESLOGAN','xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');
define('SITEDESCRIPTION','xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');
define('SITEKEYWORDS','Nevers,'.SITENAME.'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');
//define('SITEURL','http://www.'.SITENAMELONG);
//define('SITEURLHTTPS','https://www.'.SITENAMELONG);
define('SITEOWNORNAME','xxxxxxxxxxxxxxxxxxxxxxx');
define('SITEAUTOR','xxxxxxxxxxxxxxxx');
define('SITEOWNORADDRESS','xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');
define('SITEVERSION','xxxxx');
define('SITEDATE','xxxxxxxxxxxxxxxxx');
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
define('SITEMAIL','xxxxxxxxxxxxxxxxxxxxxxxxxxx');
define('SITEMAILPASSWORD','xxxxxxxxxxxxxxxxxxxxxxxx');
define('SMTPHOST','xxxxxxxxxxxxxxxxx');
define('SMTPPORT','xxxxxxxxxx');


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
