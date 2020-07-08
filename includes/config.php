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
define('SITENAME','Portfolio');
define('SITENAMELONG','Portfolio d\'Olivier Prieur');
//define('WEBPATH','/var/www/'.SITENAMELONG.'/web/'); //Chemin complet pour les fichiers du site
define('SITESLOGAN','Je suis un dev...');
define('SITEDESCRIPTION','Portfolio d\'Olivier Prieur');
define('SITEKEYWORDS','Nevers,'.SITENAME.',libre,free,opensource,gnu,téléchargement,download,upload,xbt,tracker,php,mysql,linux,bsd,os,système,system,exploitation,debian,arch,fedora,ubuntu,manjaro,mint,film,movie,picture,video,mp3,musique,music,mkv,avi,mpeg,gpl,creativecommons,cc,mit,apache,cecill,artlibre');
//define('SITEURL','http://www.'.SITENAMELONG);
//define('SITEURLHTTPS','https://www.'.SITENAMELONG);
define('SITEOWNORNAME','OLivier Prieur');
define('SITEAUTOR','citizenz7');
define('SITEOWNORADDRESS','xxxxxxxxxxxxxxxxxxxxxxxxxxxxx');
define('SITEVERSION','1.0.1');
define('SITEDATE','08/07/20');
define('COPYDATE','2020');
define('CHARSET','UTF-8');

//set timezone
date_default_timezone_set('Europe/Paris');

//-----------------------------------------------------
//MAIL
//-----------------------------------------------------
define('SITEMAIL','contact@olivierprieur.fr');
define('SITEMAILPASSWORD','xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');
define('SMTPHOST','mail.example.com');
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
