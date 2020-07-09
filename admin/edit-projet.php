<?php
//include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){
  header('Location: login.php');
}

include('menu.php');
?>
	<p><a href="./">Blog Admin Index</a></p>

	<h2>Editer le projet</h2>


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

		<p><label>Title</label><br />
		<input type='text' name='projetTitre' value='<?php echo $row['projetTitre'];?>'></p>

		<p><label>Content</label><br />
		<textarea name='projetTexte' cols='60' rows='10'><?php echo $row['projetTexte'];?></textarea></p>

		<p><input type='submit' name='submit' value='Update'></p>

	</form>
