<?php include_once 'header.php'; ?>

<div id="projets" class="container-fluid">
  <div class="container pb-3 mb-4 border">
    <div class="text-center pb-3">
      <h2>Projets / Portfolio</h2>
    </div>

    <div class="text-center" id="mybtn2Container">
      <button class="btn2 active" onclick="filterSelection('all')"> Tous</button>
      <button class="btn2" onclick="filterSelection('html')"> HTML/CSS</button>
      <button class="btn2" onclick="filterSelection('php')"> PHP/MySQL</button>
      <button class="btn2" onclick="filterSelection('js')"> Javascript</button>
    </div>

    <!-- Portfolio Gallery Grid -->

      <div class="row">

        <?php
        try {
          //Pagination : on instancie la class
          $pages = new Paginator('3','p');

          //on collecte tous les enregistrements de la fonction
          $stmt = $db->query('SELECT projetID FROM projets');

          //On détermine le nombre total d'enregistrements
          $pages->set_total($stmt->rowCount());

          $stmt = $db->query('SELECT projetID, projetTitre, projetTexte, projetDate, projetImage, projetFilter, projetCat FROM projets ORDER BY projetID DESC ' .$pages->get_limit());

          while($row = $stmt->fetch()){
        ?>
        <div class="column <?php echo $row['projetFilter']; ?>">
          <div class="content">
            <div class="container2">
              <img class="img-fluid img-thumbnail image2" src="<?php echo $row['projetImage']; ?>" alt="<?php echo $row['projetTitre']; ?>">
              <div class="middle">
                <div class="text2"><?php echo $row['projetCat']; ?></div>
              </div>
            </div>
            <h4 class="title-articles"><a href="projet.php?id=<?php echo $row['projetID']; ?>"><?php echo $row['projetTitre']; ?></a></h4>
            <p class="smalltext">
              <?php echo nl2br($row['projetTexte']); ?>
            </p>
            <small class="text-muted tinytext">
              <i class="far fa-calendar-alt"></i> Publié le : <?php echo date_fr('d-m-Y à H:i:s', strtotime($row['projetDate'])); ?>
              <br>
              <i class="fas fa-tag"></i> Catégorie : <?php echo $row['projetCat']; ?>
            </small>
          </div>
        </div>
        <?php
        }
      }
      catch(PDOException $e) {
        echo $e->getMessage();
      }
      ?>
      </div><!-- END GRID -->

      <!-- Pagination -->
      <div class="row justify-content-center">
        <div class="col-4">
          <?php echo $pages->page_links(); ?>
        </div>
      </div>

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

    <div id="contact" class="container">
      <div class="row">
        <div class="col pt-4 mt-4 mb-2 border">
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


<?php include_once 'footer.php'; ?>
