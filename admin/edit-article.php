<?php
//include config
include_once 'header.php';

//if not logged in redirect to login page
if(!$user->is_logged_in()){
  header('Location: login.php');
}

//Si on supprime l'image du article...
		if(isset($_GET['delimage'])) {
			$delimage = $_GET['delimage'];
			//on supprime le fichier image
			$stmt = $db->prepare('SELECT articleImage FROM articles WHERE articleID = :articleID');
			$stmt->execute(array(
				':articleID' => $delimage
			));
			$sup = $stmt->fetch();
			$file = "../" . $sup['articleImage'];
			if (file_exists($file)) {
				unlink($file);
			}
			//puis on supprime l'image dans la base
			$stmt = $db->prepare('UPDATE articles SET articleImage = NULL WHERE articleID = :articleID');
			$stmt->execute(array(
        ':articleID' => $delimage
      ));
			header('Location: edit-article.php?id='.$delimage);
		}
?>

  <div class="container pt-5 pb-5">
    <div class="row">
      <div class="col-sm-12 px-5 text-justify">
        <div class="pb-5">

	<?php

	//if form has been submitted process it
	if(isset($_POST['submit'])){

    // location where initial upload will be moved to
    $target = "img/articles/" . $_FILES['articleImage']['name'];
    $path = '../'.$target;

		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data
		extract($_POST);

		//very basic validation
		if($articleID ==''){
			$error[] = 'This post is missing a valid id!.';
		}

		if($articleTitre ==''){
			$error[] = 'Please enter the title.';
		}

		if($articleTexte ==''){
			$error[] = 'Please enter the content.';
		}


    if(isset($_FILES['articleImage'])){
       // find thevtype of image
        switch ($_FILES["articleImage"]["type"]) {
           case $_FILES["articleImage"]["type"] == "image/jpeg":
              move_uploaded_file($_FILES["articleImage"]["tmp_name"], $path);
              break;
           case $_FILES["articleImage"]["type"] == "image/pjpeg":
              move_uploaded_file($_FILES["articleImage"]["tmp_name"], $path);
              break;
           case $_FILES["articleImage"]["type"] == "image/png":
              move_uploaded_file($_FILES["articleImage"]["tmp_name"], $path);
              break;
           case $_FILES["articleImage"]["type"] == "image/x-png":
              move_uploaded_file($_FILES["articleImage"]["tmp_name"], $path);
              break;

           default:
              $error[] = 'Mauvais type d\'image. Seules les JPG et les PNG sont acceptées !.';
       }
     }

		if(!isset($error)){

			try {

				//insert into database
				$stmt = $db->prepare('UPDATE articles SET articleTitre = :articleTitre, articleTexte = :articleTexte, articleDate = :articleDate, articleVues = :articleVues
          WHERE articleID = :articleID');
				$stmt->execute(array(
					':articleTitre' => $articleTitre,
					':articleTexte' => $articleTexte,
          ':articleDate' => date('Y-m-d H:i:s'),
          ':articleVues' => '1',
          ':articleID' => $articleID
				));

        if(isset($_FILES['articleImage']) && !empty($articleImage)){
	     $stmt = $db->prepare('UPDATE articles SET articleImage = :articleImage WHERE articleID = :articleID');
             $stmt->execute(array(
                 ':articleImage' => $target,
                 ':articleID' => $articleID
             ));
        }

				//redirect to index page
				header('Location: index.php?actionA=updated');
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

			$stmt = $db->prepare('SELECT articleID, articleTitre, articleTexte, articleImage FROM articles WHERE articleID = :articleID') ;
			$stmt->execute(array(':articleID' => $_GET['id']));
			$row = $stmt->fetch();

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}

	?>

  <?php
  include('menu.php');
  ?>

  <div class="pt-3"><h3>Editer l'article : "<?php echo $row['articleTitre']; ?>"</h3></div>

  <form action="" method="post" enctype="multipart/form-data">
    <input type='hidden' name='articleID' value='<?php echo $row['articleID'];?>'>
     <div class="form-group">
       <label for="articleTitre">Titre</label>
       <input type="text" name="articleTitre" class="form-control" id="articleTitre" value="<?php echo html($row['articleTitre']); ?>">
     </div>
     <div class="form-group">
       <label for="articleTexte">Contenu</label>
       <textarea name="articleTexte" class="form-control" id="articleTexte" rows="10"><?php echo html($row['articleTexte']); ?></textarea>
     </div>

     <div class="form-group">
       <label for="articleImage">Image <small>(images jpeg ou png seulement)</small></label><br>
       <?php
       if(!empty($row['articleImage']) && file_exists("../" . $row['articleImage'])) {
         echo '<img class="img-thumbnail" style="max-width: 150px;" src="../'.html($row['articleImage']).'" alt="Image de présentation de '.html($row['articleTitre']).'" />';
       ?>
       <a href="javascript:delimage('<?php echo html($row['articleID']);?>','<?php echo html($row['articleImage']);?>')">Supprimer l'image</a>
       <?php
				}
				else {
					echo 'Pas d\'image pour <i><b>'.html($row['articleTitre']) . '</b></i>';
				}
				?>
        <br>
        <input type="file" name="articleImage" class="form-control">

     </div>

      <div class="text-right pt-5"><button type='submit' class="btn btn-primary" name='submit'>Editer l'article</button></div>
  </form>

</div>
</div>
</div>
</div>



<?php include_once 'footer.php'; ?>
