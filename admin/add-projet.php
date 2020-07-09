<?php

include_once 'header.php';

//if not logged in redirect to login page
if(!$user->is_logged_in()){
  header('Location: login.php');
}
?>


  <div class="container pt-5 pb-5">
    <div class="row">
      <div class="col-sm-12 px-5 text-justify">
        <div class="pb-5">

          <?php
          include('menu.php');
          ?>

          <div class="pt-5"><h2>Ajouter un projet</h2></div>

          <form action='' method='post'>
             <div class="form-group">
               <label for="projetTitre">Titre</label>
               <input type="text" name="projetTitre" class="form-control" id="projetTitre" value='<?php if(isset($error)){ echo $_POST['projetTitre']; } ?>'>
             </div>
             <div class="form-group">
               <label for="ProjetTexte">Contenu</label>
               <textarea name="projetTexte" class="form-control" id="ProjetTexte" rows="10"><?php if(isset($error)){ echo $_POST['projetTexte']; } ?></textarea>
             </div>
             <div class="form-group">
               <label for="projetCat">Catégorie du projet</label>
               <input type="text" name="projetCat" class="form-control" id="projetCat" value='<?php if(isset($error)){ echo $_POST['projetCat']; } ?>'>
             </div>
             <div class="form-group">
               <label for="projetCat">Filtres du projet</label>
               <input type="text" name="projetFilter" class="form-control" id="projetFilter" value='<?php if(isset($error)){ echo $_POST['projetFilter']; } ?>'>
             </div>

              <div class="text-right"><button type='submit' class="btn btn-primary" name='submit'>Ajouter</button></div>
          </form>


          <?php
          //if form has been submitted process it
          if(isset($_POST['submit'])){

          //   $image_torrent = $_FILES['imageProjet']['name'];
          //
          //   //si erreur de transfert
					//   if ($_FILES['imageProjet']['error'] > 0) {
					// 	        $error[] = "Erreur lors du transfert";
					//   }
          //
					// // taille de l'image
					// if ($_FILES['imageProjet']['size'] > MAX_FILE_SIZE) {
					// 	$error[] = "L'image est trop grosse.";
					// }
          //
          // //$extensions_valides = array( 'jpg' , 'png' );
					// //1. strrchr renvoie l'extension avec le point (« . »).
					// //2. substr(chaine,1) ignore le premier caractère de chaine.
					// //3. strtolower met l'extension en minuscules.
					// $extension_upload = strtolower(substr(strrchr($_FILES['imageProjet']['name'], '.')  ,1)  );
          //
          // if(!in_array($extension_upload,$EXTENSIONS_VALIDES)) {
					// 	$error[] = "Extension d'image incorrecte (.png ou .jpg seulement !)";
					// }
          //
					// $image_sizes = getimagesize($_FILES['imageProjet']['tmp_name']);
					// if ($image_sizes[0] > $WIDTH_MAX OR $image_sizes[1] > $HEIGHT_MAX) {
					// 	$error[] = "Image trop grande (dimensions)";
					// }
          //
          // // On cherche si l'image n'existe pas déjà sous ce même nom
					// $target_dir = $REP_IMAGES_PROJETS;
					// $target_file = $target_dir . basename($_FILES["imageProjet"]["name"]);
					// if (file_exists($target_file)) {
					// 	$error[] = 'Désolé, cette image existe déjà. Veillez en choisir une autre ou tout simplement la renommer.';
					// }


            $_POST = array_map( 'stripslashes', $_POST );

            //collect form data
            extract($_POST);

            //very basic validation
            if($projetTitre ==''){
              $error[] = 'Veuillez entrer un titre.';
            }

            if($projetTexte ==''){
              $error[] = 'Veuillez entrer un texte';
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
                $stmt = $db->prepare('INSERT INTO projets (projetTitre, projetTexte, projetCat, projetFilter, projetDate, projetImage, projetVues) VALUES (:projetTitre, :projetTexte, :projetCat, :projetFilter, :projetDate, :projetImage, :projetVues)') ;
                $stmt->execute(array(
                  ':projetTitre' => $projetTitre,
                  ':projetTexte' => $projetTexte,
                  ':projetCat' => $projetCat,
                  ':projetFilter' => $projetFilter,
                  ':projetDate' => date('Y-m-d H:i:s'),
                  ':projetImage' => 'projet.png',
                  ':projetVues' => '1'
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
                echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
              }
            }
          }
          ?>

        </div>
      </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>
