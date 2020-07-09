<?php
//include config
require_once 'header.php';

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

	<div class="pt-5"><h2>Editer le projet</h2></div>


	<?php

	//if form has been submitted process it
	if(isset($_POST['submit'])){

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

		if(!isset($error)){

			try {

				//insert into database
				$stmt = $db->prepare('UPDATE projets SET projetTitre = :projetTitre, projetTexte = :projetTexte WHERE projetID = :projetID') ;
				$stmt->execute(array(
					':projetTitre' => $projetTitre,
					':projetTexte' => $projetTexte,
					':projetID' => $projetID
				));

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
			echo $error.'<br />';
		}
	}

		try {

			$stmt = $db->prepare('SELECT projetID, projetTitre, projetTexte FROM projets WHERE projetID = :projetID') ;
			$stmt->execute(array(':projetID' => $_GET['id']));
			$row = $stmt->fetch();

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}

	?>

	<form action='' method='post'>
      <input type='hidden' name='projetID' size='18' value='<?php echo $row['projetID'];?>'>
        <div class="form-group">
		      <label for="titreProjet">Titre</label>
		      <input type='text' class="form-control" id="projetTitre" name='projetTitre' value='<?php echo $row['projetTitre'];?>'>
        </div>

        <div class="form-group">
		        <label for="textProjet">Texte</label>
		        <textarea name='projetTexte' class="form-control" rows="10"><?php echo $row['projetTexte'];?></textarea>
        </div>

		    <div class="text-right"><button type='submit' class="btn btn-primary" name='submit'>Mettre à jour</button></div>

	</form>

</div>
</div>
</div>
</div>



<?php include_once 'footer.php'; ?>
