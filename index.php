<?php include_once 'includes/config.php'; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Portfolio d'Olivier Prieur</title>
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
  <link rel="stylesheet" href="css/style.css">
</head>

<body id="tothetop">

  <div id="myNav" class="overlay">
    <a href="javascript:void(0)" class="closebtn2" onclick="closeNav()">&times;</a>
    <div class="overlay-content">
      <a href="#projets">
        < Projets /></a>
      <a href="#articles">
        < Articles /></a>
      <a href="#apropos">
        < A propos /></a>
      <a href="#contact">
        < Contact /></a>
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

  <div id="projets" class="container-fluid">
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
    </div>

    <!-- Portfolio Gallery Grid -->
    <div class="container pb-5">
      <div class="row">

        <?php
        try {
          $stmt = $db->query('SELECT projetID, projetTitre, projetTexte, projetDate, projetImage, projetFilter, projetCat FROM projets ORDER BY projetID DESC');
          while($row = $stmt->fetch()){
        ?>
        <div class="column <?php echo $row['projetFilter']; ?>">
          <div class="content">
            <div class="container2">
              <img class="img-fluid img-thumbnail image2" src="img/projets/<?php echo $row['projetImage']; ?>" alt="<?php echo $row['projetTitre']; ?>">
              <div class="middle">
                <div class="text2"><?php echo $row['projetCat']; ?></div>
              </div>
            </div>
            <h4 class="title-articles"><a href="projet.php?id=<?php echo $row['projetID']; ?>"><?php echo $row['projetTitre']; ?></a></h4>
            <p class="smalltext"><?php echo nl2br($row['projetTexte']); ?></p>
            <small class="text-muted tinytext"><i class="far fa-calendar-alt"></i> Publié le : <?php echo $row['projetDate']; ?> | <i class="fas fa-tag"></i> Catégorie : Sécurité</small>

            </p>
          </div>
        </div>
        <?php
        }
      }
      catch(PDOException $e) {
        echo $e->getMessage();
      }
      ?>

        <!--
        <div class="column html">
          <div class="content">
            <div class="container2">
              <img class="img-fluid img-thumbnail image2" src="img/projet-maquette1.jpg" alt="HTML CSS Bootstrap">
              <div class="middle">
                <div class="text2">HTML / CSS / BOOTSTRAP</div>
              </div>
            </div>
            <h4 class="title-articles"><a href="projet.php">Intégration d'une maquette au format PSD avec Bootstrap</a></h4>
            <p class="smalltext">Premier projet HTML/Bootstrap à l'Acces Code School : depuis un fichier .psd, réaliser la maquette du site web en HTML, CSS et Bootstrap</p>
          </div>
        </div>

        <div class="column html">
          <div class="content">
            <div class="container2">
              <img class="img-fluid img-thumbnail image2" src="img/projet-maquette2.jpg" alt="HTML CSS">
              <div class="middle">
                <div class="text2">HTML / CSS</div>
              </div>
            </div>
            <h4 class="title-articles"><a href="projet.php">Intégration d'une maquette avec CSS flex-box et media-queries</a></h4>
            <p class="smalltext">Intégration de la maquette d'un collègue de formation en utilisant suelement HTML et CSS (flex-box et media-queries)</p>
          </div>
        </div>

        <div class="column html">
          <div class="content">
            <div class="container2">
              <img class="img-fluid img-thumbnail image2" src="img/projet3-portfolio.jpg" alt="HTML CSS Bootstrap">
              <div class="middle">
                <div class="text2">HTML / CSS / PHP</div>
              </div>
            </div>
            <h4 class="title-articles"><a href="projet.php">Portfolio</a></h4>
            <p class="smalltext">Creéation d'un portfolio avec backend PHP / MySQL</p>
          </div>
        </div>

        <div class="column php">
          <div class="content">
            <div class="container2">
              <img class="img-fluid img-thumbnail image2" src="img/projet4-filesexplorer.jpg" alt="PHP">
              <div class="middle">
                <div class="text2">HTML / CSS / PHP</div>
              </div>
            </div>
            <h4 class="title-articles"><a href="projet.php">Projet Explorateur de fichiers en PHP</a></h4>
            <p class="smalltext">Lorem ipsum dolor..</p>
          </div>
        </div>

        <div class="column js">
          <div class="content">
            <div class="container2">
              <img class="img-fluid img-thumbnail image2" src="img/projet5-bomberman.jpg" alt="Javascript">
              <div class="middle">
                <div class="text2">Javascript / CSSP</div>
              </div>
            </div>
            <h4 class="title-articles"><a href="projet.php">Projet Bomberman (jeu) en Javascript</a></h4>
            <p class="smalltext">Lorem ipsum dolor..</p>
          </div>
        </div>
        -->

      </div><!-- END GRID -->

    </div><!-- //container -->
  </div><!-- //container-fluid -->

  <div id="articles" class="container-fluid bg-dark">
    <div class="container">
      <div class="row">
        <div class="col text-center pt-3 pb-5">
          <h2 class="text-white">Articles</h2>
          <div class="card-deck">
            <div class="card">
              <img src="img/article11.jpg" class="card-img-top" alt="article 1">
              <div class="card-body">
                <h5 class="card-title"><a href="article.php">Article N°1</a></h5>
                <p class="card-text smalltext">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted tinytext"><i class="far fa-calendar-alt"></i> Publié le : 24/06/20 - 11h30<br><i class="fas fa-tag"></i> Catégorie : Opensource</small>
              </div>
            </div>
            <div class="card">
              <img src="img/article2.jpg" class="card-img-top" alt="article 2">
              <div class="card-body">
                <h5 class="card-title"><a href="article.php">Article N°2</a></h5>
                <p class="card-text smalltext">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                  aliquip ex ea commodo consequat.
                  Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted  tinytext"><i class="far fa-calendar-alt"></i> Publié le : 21/06/20 - 17h58<br><i class="fas fa-tag"></i> Catégorie : Développement web</small>
              </div>
            </div>
            <div class="card">
              <img src="img/article3.jpg" class="card-img-top" alt="article 3">
              <div class="card-body">
                <h5 class="card-title"><a href="article.php">Article N°3</a></h5>
                <p class="card-text smalltext">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                  aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted  tinytext"><i class="far fa-calendar-alt"></i> Publié le : 07/06/20 - 19h40<br><i class="fas fa-tag"></i> Catégorie : Sécurité</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="apropos2" class="container-fluid">
    <div id="apropos" class="container">
      <div class="row">
        <div class="col pt-4 pb-4">
          <div class="text-center text-white">
            <h2>A propos...</h2>
          </div>
          <p class="text-white apropostext px-5 py-5 text-justify rounded">
            <img src="img/citizenz2.png" class="img-fluid img-thumbnail rounded-circle float-left photo" alt="Olivier Prieur">
            Linuxien depuis le début des années 2000, impliqué dans plusieurs projets associatifs de promotion du Libre,
            de médiation numérique (animation, formation à destination du grand public), et ayant eu des expériences professionnelles requérant
            du développement back-end et des interventions sur les réseaux de système d’informations d’organisations associatives,
            j’ai décidé d’opérer une reconvention professionnelle et de faire de la programmation informatique mon métier en mettant
            mes compétences précédemment acquises à profit.<br>
            J’ai intégré l’Access Code School de Nevers où je me forme au développement web.<br>
            Dans ce cadre je suis à la recherche d’un stage en entreprise du 30 novembre 2020 au 8 janvier 2021.
          </p>
          <div class="text-center text-white pt-5">
            <h4>Mes projets et sites web</h4>
          </div>
          <div class="card-deck">
            <div class="card">
              <a href="https://www.citizenz.info" target="_blank"><img src="img/citizenzinfo.jpg" class="card-img-top" alt="citizenz.info"></a>
              <div class="card-body">
                <h5 class="card-title">citizenz.info <i class="fas fa-link"></i></h5>
                <p class="card-text">Blog Geek & Libre : tutoriels web, serveurs et desktop, actualités du monde du Libre, Gnu/linux, xBSD, etc.</p>
              </div>
            </div>
            <div class="card">
              <a href="https://www.ft4a.fr" target="_blank"><img src="img/ft4afr.jpg" class="card-img-top" alt="fr4a.fr"></a>
              <div class="card-body">
                <h5 class="card-title">ft4a.fr <i class="fas fa-link"></i></h5>
                <p class="">Tracker bittorrent exclusivement réservé aux médias sous licence libre ou licence de libre diffusion.</p>
              </div>
            </div>
            <div class="card">
              <a href="https://www.pengolincoin.xyz" target="_blank"><img src="img/pengolincoinxyz.jpg" class="card-img-top" alt="pengolincoin.xyz"></a>
              <div class="card-body">
                <h5 class="card-title">Pengolincoin <i class="fas fa-link"></i></h5>
                <p class="card-text">Projet de cryptomonnaie généraliste, populaire et écologique.</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">

    <div class="container">
      <div class="row">
        <div class="col pt-5">
          <h3 class="text-center">Me contacter</h3>
          <p class="text-center"><em>Merci d'utiliser le formulaire ci-dessous pour m'envoyer un message. J'y répondrai dès que possible.</em></p>
          <form class="form-group" action="" method="post">
            <div class="row">
              <div class="col">
                <div class="row">
                  <div class="col-sm-6 form-group">
                    <input class="form-control" id="name" name="name" placeholder="Votre nom" type="text" required>
                  </div>
                  <div class="col-sm-6 form-group">
                    <input class="form-control" id="email" name="from" placeholder="Votre E-mail" type="email" required>
                  </div>
                  <div class="col-sm-12 form-group">
                    <input class="form-control" id="subject" name="subject" placeholder="Sujet" type="text" required>
                  </div>
                  <div class="col-sm-12 form-group">
                    <textarea class="form-control" id="message" name="message" placeholder="Votre message" rows="6" required></textarea>
                  </div>
                </div>

                <!--<br>
                <label for="verif_box">Anti-spam : <br>
                  <div class="g-recaptcha" data-sitekey="6LfrmrUUAAAAAOU9sv-UO9A6joAVpLvrRB3sCbtt"></div>
                </label>
               -->
                <div class="row">
                  <div class="col-md-12 form-group text-right">
                    <button class="btn btn-primary mb-2 mt-3" name="submit" type="submit">Envoyer</button>
                    <button class="btn btn-secondary ml-3 mb-2 mt-3" type="reset">Annuler</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>




  <div class="container-fluid pt-3 pb-5 bg-dark">
    <div class="row">
      <div class="col text-center text-white">
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
          <a href="#tothetop" class="text-white" title="Haut de page"><i class="fas fa-chevron-up fa-3x text-white"></i><br>Top</a>
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