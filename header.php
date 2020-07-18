<?php include_once 'includes/config.php'; ?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <title><?php echo SITENAMELONG; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="apple-touch-icon" sizes="57x57" href="img/icons/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="img/icons/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="img/icons/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="img/icons/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="img/icons/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="img/icons/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="img/icons/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="img/icons/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="img/icons/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="img/icons/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="img/icons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="img/icons/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="img/icons/favicon-16x16.png">
  <link rel="manifest" href="img/icons/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="img/icons/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <meta name="author" content="<?php echo SITEAUTOR; ?>">
  <meta name="description" content="<?php echo SITEDESCRIPTION; ?>">
  <meta name="keywords" content="<?php echo SITEKEYWORDS; ?>">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
  <script>
    tinymce.init({
      selector: "textarea",
      plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });
</script>
</head>

<body id="tothetop">

  <div id="myNav" class="overlay">
    <a href="javascript:void(0)" class="closebtn2" onclick="closeNav()">&times;</a>
    <div class="overlay-content">
      <a href="./">
        < Accueil /></a>
      <a href="index.php#projets">
        < Projets /></a>
      <a href="index.php#articles">
        < Articles /></a>
      <a href="index.php#apropos">
        < A propos /></a>
      <a href="contact.php">
        < Contact /></a>
      <a href="index.php#archives">
        < Archives /></a>
    </div>
  </div>

  <div class="hero-image">
    <div class="px-3 py-3 burger">
      <span onclick="openNav()">&#9776;</span>
    </div>
    <div class="hero-text">
      <div class="type-writer-text pb-5">
        Je suis un <span class="barre">Dave</span> <i class="fas fa-music barre"></i> ... dev !
      </div>
      <h1>
        < Olivier Prieur />
      </h1>
      <p class="title1">Développeur web et web mobile</p>
    </div>
  </div>

  <!-- <div id="projets" class="container-fluid">
    <div class="container pb-3">
      <div class="text-center">
        <h2>Projets / Portfolio</h2>
      </div>

      <div class="text-center" id="mybtn2Container">
        <button class="btn2 active" onclick="filterSelection('all')"> Tous</button>
        <button class="btn2" onclick="filterSelection('html')"> HTML/CSS</button>
        <button class="btn2" onclick="filterSelection('php')"> PHP/MySQL</button>
        <button class="btn2" onclick="filterSelection('js')"> Javascript</button>
      </div>
    </div> -->
