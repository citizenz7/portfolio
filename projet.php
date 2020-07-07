<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body id="tothetop">

  <div id="myNav" class="overlay">
    <a href="javascript:void(0)" class="closebtn2" onclick="closeNav()">&times;</a>
    <div class="overlay-content">
      <a href="index.html">Accueil</a>
      <a href="index.html#articles">Articles</a>
      <a href="index.html#apropos">A propos</a>
      <a href="#contact">Contact / Réseaux sociaux</a>
    </div>
  </div>

  <div class="hero-image2">
    <div class="px-3 py-3 burger">
      <span onclick="openNav()">&#9776;</span>
    </div>

    <div class="hero-text">
      <h1>Olivier Prieur</h1>
      <p class="title1">Développeur web et web mobile</p>
    </div>
  </div>

  <div class="container pt-5 pb-5">
    <div class="row">
      <div class="col-sm-12 px-5 text-justify">
        <div class="text-center pb-5">
          <h1>Projet d'intégration d'une maquette au format PSD avec Bootstrap</h1>
          <p class="text-muted"><i class="far fa-calendar-alt"></i> Publié le : 21/06/2020, 18h24 | <i class="fas fa-tag"></i> Catégorie : HTML, CSS, Bootstrap | <i class="fas fa-eye"></i> Lectures : 87</p>
        </div>
        <img class="img-fluid img-thumbnail float-left img-article" src="img/projet-maquette1.jpg" alt="projet 1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br>
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </div>
    </div>
  </div>


  <div class="container-fluid pt-3 pb-5 bg-light">
    <div class="row">
      <div class="col text-center">
        <h2 id="contact">Réseaux sociaux</h2>
        <div>
          <!--<a class="text-decoration-none" href="mailto:oprieur@protonmail.com">
            <img src="img/email.png" class="img-fluid img-social" alt="E-mail">
          </a>-->
          <a class="text-decoration-none" href="https://www.facebook.com/oprieur.pro.7">
            <img src="img/facebook.png" class="img-fluid img-social" alt="Facebook">
          </a>
          <a class="text-decoration-none" href="https://twitter.com/citizenz58">
            <img src="img/twitter.png" class="img-fluid img-social" alt="Facebook">
          </a>
          <a class="text-decoration-none" href="https://www.linkedin.com/in/olivier-prieur">
            <img src="img/linkedin.png" class="img-fluid img-social" alt="LinkedIn">
          </a>
        </div>

        <div class="pt-5">
          <a href="#tothetop" title="Haut de page"><i class="fas fa-chevron-up fa-3x"></i></a>
        </div>

      </div>
    </div>
  </div>




  <script>
    function openNav() {
      document.getElementById("myNav").style.width = "100%";
    }

    function closeNav() {
      document.getElementById("myNav").style.width = "0%";
    }
  </script>
  <script src="js/script.js"></script>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>
