<?php
//include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){
  header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
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
      <a href="index.html">< Accueil /></a>
      <a href="index.html#articles">< Articles /></a>
      <a href="index.html#apropos">< A propos /></a>
      <a href="#contact">< Contact /></a>
    </div>
  </div>

  <div class="hero-image2">
    <div class="px-3 py-3 burger">
      <span onclick="openNav()">&#9776;</span>
    </div>

    <div class="hero-text2">
      <h1>< Olivier Prieur /></h1>
      <p class="title1">Développeur web et web mobile</p>
    </div>
  </div>

  <div class="container pt-5 pb-5">
    <div class="row">
      <div class="col-sm-12 px-5 text-justify">
        <div class="pb-5">

          <form action='' method='post'>
            <p><label>Titre</label><br />
              <input type='text' name='projetTitre' value='<?php if(isset($error)){ echo $_POST['projetTitre']; } ?>'>
            </p>

            <p>
              <label>Contenu</label>
              <br />
              <textarea name='projetTexte' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['projetTexte']; } ?></textarea>
            </p>

            <p>
              <input type='submit' name='submit' value='Submit'>
            </p>
          </form>

          <?php
          //if form has been submitted process it
          if(isset($_POST['submit'])){
            $_POST = array_map( 'stripslashes', $_POST );

            //collect form data
            extract($_POST);

            //very basic validation
            if($projetTitre ==''){
              $error[] = 'Veuillez entrer un titre.';
            }

            if($TitreTexte ==''){
              $error[] = 'Please enter the content.';
            }

            if($projetCat ==''){
              $error[] = 'Veuillez entrer une ou plusieurs catégories';
            }

            if($projetFilter ==''){
              $error[] = 'Veuillez entrer un filtre de catégorie';
            }

            if(!isset($error)){
              try {

                //insert into database
                $stmt = $db->prepare('INSERT INTO projets (projetTitre, projetTexte, projetCat, projetFilter, projetDate) VALUES (:projetTitre, :projetTexte, :projetCat, :projetFilter, :projetDate)') ;
                $stmt->execute(array(
                  ':projetTitre' => $projetTitre,
                  ':projetTexte' => $projectTexte,
                  ':projetCat' => $projetCat,
                  ':projetFilter' => $projetFilter,
                  ':postDate' => date('Y-m-d H:i:s')
                ));

                //redirect to index page
                header('Location: index.php?action=added');
                exit;
              }

              catch(PDOException $e) {
                echo $e->getMessage();
              }
            }

            if(isset($error)){
              foreach($error as $error){
                echo '<p class="error">'.$error.'</p>';
              }
            }
          }
          ?>

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
