<?php
//include config
include_once 'header.php';

//if not logged in redirect to login page
if(!$user->is_logged_in()){
  header('Location: login.php');
}

//Si on supprime l'image du projet...
		if(isset($_GET['delimage'])) {
			$delimage = $_GET['delimage'];
			//on supprime le fichier image
			$stmt = $db->prepare('SELECT projetImage FROM projets WHERE projetID = :projetID');
			$stmt->execute(array(
				':projetID' => $delimage
			));
			$sup = $stmt->fetch();
			$file = "../" . $sup['projetImage'];
			if (file_exists($file)) {
				unlink($file);
			}
			//puis on supprime l'image dans la base
			$stmt = $db->prepare('UPDATE projets SET projetImage = NULL WHERE projetID = :projetID');
			$stmt->execute(array(
        ':projetID' => $delimage
      ));
			header('Location: edit-projet.php?id='.$delimage);
		}
?>

  <div class="container pt-5 pb-5">
    <div class="row">
      <div class="col-sm-12 px-5 text-justify">
        <div class="pb-5">

	<?php

	//if form has been submitted process it
	if(isset($_POST['submit'])){

    // try {
    // 	$stmt = $db->prepare('SELECT * FROM projets WHERE projetID = :projetID');
    // 	$stmt->execute(array(':projetID' => $_GET['id']));
    // 	$rowprojet = $stmt->fetch();
    // }
    //
    // catch(PDOException $e) {
    // 	echo $e->getMessage();
    // }

    // location where initial upload will be moved to
    $target = "img/projets/" . $_FILES['projetImage']['name'];
    $path = '../'.$target;

		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data
		extract($_POST);

		//very basic validation
		if($projetID ==''){
			$error[] = 'This post is missing a valid id!.';
		}

		if($projetTitre ==''){
			$error[] = 'Please enter the title.';
		}

		if($projetTexte ==''){
			$error[] = 'Please enter the content.';
		}

    if($projetCat ==''){
      $error[] = 'Veuillez entrer une ou plusieurs catégories';
    }

    if($projetFilter ==''){
      $error[] = 'Veuillez entrer un filtre de catégorie';
    }

    if(isset($_FILES['projetImage'])){
       // find thevtype of image
        switch ($_FILES["projetImage"]["type"]) {
           case $_FILES["projetImage"]["type"] == "image/jpeg":
              move_uploaded_file($_FILES["projetImage"]["tmp_name"], $path);
              break;
           case $_FILES["projetImage"]["type"] == "image/pjpeg":
              move_uploaded_file($_FILES["projetImage"]["tmp_name"], $path);
              break;
           case $_FILES["projetImage"]["type"] == "image/png":
              move_uploaded_file($_FILES["projetImage"]["tmp_name"], $path);
              break;
           case $_FILES["projetImage"]["type"] == "image/x-png":
              move_uploaded_file($_FILES["projetImage"]["tmp_name"], $path);
              break;

           default:
              $error[] = 'Mauvais type d\'image. Seules les JPG et les PNG sont acceptées !.';
       }
     }

		if(!isset($error)){

			try {

				//insert into database
				$stmt = $db->prepare('UPDATE projets SET projetTitre = :projetTitre, projetTexte = :projetTexte, projetCat = :projetCat, projetFilter = :projetFilter, projetDate = :projetDate, projetVues = :projetVues
          WHERE projetID = :projetID');
				$stmt->execute(array(
					':projetTitre' => $projetTitre,
					':projetTexte' => $projetTexte,
          ':projetCat' => $projetCat,
          ':projetFilter' => $projetFilter,
          ':projetDate' => date('Y-m-d H:i:s'),
          ':projetVues' => '1',
          ':projetID' => $projetID
				));

        if(isset($_FILES['projetImage'])){
	         $stmt = $db->prepare('UPDATE projets SET projetImage = :projetImage WHERE projetID = :projetID');
           $stmt->execute(array(
            ':projetImage' => $target,
            ':projetID' => $projetID
           ));
        }

				//redirect to index page
				header('Location: index.php?action=updated');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}

	?>


	<?php
	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
		}
	}

		try {

			$stmt = $db->prepare('SELECT projetID, projetTitre, projetTexte, projetCat, projetFilter, projetImage FROM projets WHERE projetID = :projetID') ;
			$stmt->execute(array(':projetID' => $_GET['id']));
			$row = $stmt->fetch();

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}

	?>

  <?php
  include('menu.php');
  ?>

  <div class="pt-3"><h3>Editer le projet : "<?php echo $row['projetTitre']; ?>"</h3></div>

  <form action="" method="post" enctype="multipart/form-data">
    <input type='hidden' name='projetID' value='<?php echo $row['projetID'];?>'>
     <div class="form-group">
       <label for="projetTitre">Titre</label>
       <input type="text" name="projetTitre" class="form-control" id="projetTitre" value="<?php echo html($row['projetTitre']); ?>">
     </div>
     <div class="form-group">
       <label for="ProjetTexte">Contenu</label>
       <textarea name="projetTexte" class="form-control" id="ProjetTexte" rows="10"><?php echo html($row['projetTexte']); ?></textarea>
     </div>

     <div class="form-group">
       <label for="ProjetImage">Image <small>(images jpeg ou png seulement)</small></label><br>
       <?php
       if(!empty($row['projetImage']) && file_exists("../" . $row['projetImage'])) {
         echo '<img class="img-thumbnail" style="max-width: 150px;" src="../'.html($row['projetImage']).'" alt="Image de présentation de '.html($row['projetTitre']).'" />';
       ?>
       <a href="javascript:delimage('<?php echo html($row['projetID']);?>','<?php echo html($row['projetImage']);?>')">Supprimer l'image</a>
       <?php
				}
				else {
					echo 'Pas d\'image pour <i><b>'.html($row['projetTitre']) . '</b></i>';
				}
				?>
        <br>
        <input type="file" name="projetImage" class="form-control">

     </div>

     <div class="form-group">
       <label for="projetCat">Catégorie du projet</label>
       <input type="text" name="projetCat" class="form-control" id="projetCat" value="<?php echo $row['projetCat']; ?>">
     </div>
     <div class="form-group">
       <label for="projetCat">Filtres du projet</label>
       <input type="text" name="projetFilter" class="form-control" id="projetFilter" value="<?php echo $row['projetFilter']; ?>">
     </div>

      <div class="text-right"><button type='submit' class="btn btn-primary" name='submit'>Ajouter</button></div>
  </form>

</div>
</div>
</div>
</div>



<?php include_once 'footer.php'; ?>
