<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendors/PHPMailer/src/Exception.php';
require 'vendors/PHPMailer/src/PHPMailer.php';
require 'vendors/PHPMailer/src/SMTP.php';

include_once 'header.php';
?>

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

    <div class="row">

        <?php
        try {
          //Pagination : on instancie la class
          $pages = new Paginator('3','proj');

          //on collecte tous les enregistrements de la fonction
          $stmt = $db->query('SELECT projetID FROM projets');

          //On détermine le nombre total d'enregistrements
          $pages->set_total($stmt->rowCount());

          $stmt = $db->query('SELECT projetID, projetTitre, projetTexte, projetDate, projetImage, projetFilter, projetCat, projetVues FROM projets ORDER BY projetID DESC ' .$pages->get_limit());

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
              <?php
                $max = 125;
                $chaine = $row['projetTexte'];
                if (strlen($chaine) >= $max) {
	                 $chaine = substr($chaine, 0, $max);
	                 $espace = strrpos($chaine, " ");
	                 $chaine = substr($chaine, 0, $espace).' ...';
                }
                echo nl2br($chaine);
                ?>
            </p>
            <small class="text-muted tinytext">
              <i class="far fa-calendar-alt"></i> Publié le : <?php echo date_fr('d-m-Y à H:i:s', strtotime($row['projetDate'])); ?> | Lectures : <?php echo $row['projetVues']; ?>
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
    <div class="container mt-4">
      <div class="row">
        <div class="col text-center pt-4 pb-4">
          <h2 class="text-white">Articles</h2>

          <?php
          try {
            //Pagination : on instancie la class
            $pages = new Paginator('2','art');

            //on collecte tous les enregistrements de la fonction
            $stmt = $db->query('SELECT articleID FROM articles');

            //On détermine le nombre total d'enregistrements
            $pages->set_total($stmt->rowCount());

            $stmt = $db->query('SELECT articleID, articleTitre, articleTexte, articleDate, articleImage FROM articles ORDER BY articleID DESC ' .$pages->get_limit());

            while($row = $stmt->fetch()){
          ?>

            <div class="card mb-4">
              <div class="card-body text-justify">
                <h4 class="card-title"><a href="article.php?id=<?php echo $row['articleID']; ?>"><?php echo $row['articleTitre']; ?></a></h4>
                <p class="smalltext">
                  <img class="img-article" src="<?php echo $row['articleImage']; ?>" alt="<?php echo $row['articleTitre']; ?>">
                  <?php
                    $max = 500;
                    $chaine = $row['articleTexte'];
                    if (strlen($chaine) >= $max) {
    	                 $chaine = substr($chaine, 0, $max);
    	                 $espace = strrpos($chaine, " ");
    	                 $chaine = substr($chaine, 0, $espace).'<p class="text-right pt-4"><i class="fas fa-angle-double-right"></i> <a href="article.php?id=' . $row['articleID'] . '">Lire la suite</a></p>';
                    }
                    echo nl2br($chaine);
                ?>
                </p>
              </div>
              <div class="card-footer text-center">
                <small class="text-muted smalltext">
                  <i class="far fa-calendar-alt"></i> Publié le : <?php echo date_fr('d-m-Y à H:i:s', strtotime($row['articleDate'])); ?>
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

        <div class="row justify-content-center">
          <div class="col-4">
            <?php echo $pages->page_links(); ?>
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

  <div class="container-fluid py-4 bg-light">
    <div id="archives" class="container">

      <div class="row py-3 px-3 justify-content-center">
        <div class="col-sm-5 py-4 mr-2 border">
          <h3 class="text-center">Me contacter</h3>
          <p class="text-center">
            <em>Merci d'utiliser <a href="contact.php">le formulaire de contact</a> pour m'envoyer un message. J'y répondrai dès que possible.</em>
          </p>
        </div>
        <div class="col-sm-5 py-4 ml-2 border">
            <h3 class="text-center">Archives des projets</h3>
            <!-- <ul class="list-group">
              <?php
              $stmt = $db->query("SELECT Month(projetDate) as Month, Year(projetDate) as Year FROM projets GROUP BY Month(projetDate), Year(projetDate) ORDER BY projetDate DESC");
              while($row = $stmt->fetch()){
                $monthName = date_fr("F", mktime(0, 0, 0, $row['Month'], 10));
                //$slug = 'a-'.$row['Month'].'-'.$row['Year'];
                echo "<li class='list-group-item'><a href='archives.php?month=" . $row['Month'] . "&year=" . $row['Year'] . "'>" . $monthName . "-" . $row['Year'] . "</a></li>";
              }
              ?>
            </ul> -->

            <select onchange="document.location.href = this.value" class="custom-select custom-select-sm smalltext">
					         <option selected>Mois - années</option>
					         <?php
					         $stmt = $db->query("SELECT Month(projetDate) as Month, Year(projetDate) as Year FROM projets GROUP BY Month(projetDate), Year(projetDate) ORDER BY projetDate DESC");
					         while($row = $stmt->fetch()){
						            $monthName = date_fr("F", mktime(0, 0, 0, html($row['Month']), 10));
						            $year = date_fr(html($row['Year']));
						            //$slug = 'a-'.html($row['Month']).'-'.html($row['Year']);
						            echo "<option value='archives.php?month=" . $row['Month'] . "&year=" . $row['Year'] . "'>" . $monthName . "-" . $row['Year'] . "</option>";
					        }
					        ?>
				   </select>

        </div>
      </div>
    </div>
  </div>

<?php include_once 'footer.php'; ?>
