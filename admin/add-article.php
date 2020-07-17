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
          //if form has been submitted process it
          if(isset($_POST['submit'])){

            // location where initial upload will be moved to
            $target = "img/articles/" . $_FILES['articleImage']['name'];
		        $path = '../'.$target;

            $_POST = array_map( 'stripslashes', $_POST );

            //collect form data
            extract($_POST);

            //very basic validation
            if($articleTitre ==''){
              $error[] = 'Veuillez entrer un titre.';
            }

            if($articleTexte ==''){
              $error[] = 'Veuillez entrer un texte';
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
                $stmt = $db->prepare('INSERT INTO articles (articleTitre, articleTexte, articleDate, articleVues) VALUES (:articleTitre, :articleTexte, :articleDate, :articleVues)') ;
                $stmt->execute(array(
                  ':articleTitre' => $articleTitre,
                  ':articleTexte' => $articleTexte,
                  ':articleDate' => date('Y-m-d H:i:s'),
                  ':articleVues' => '1'
                ));

                $articleID = $db->lastInsertId();

                if(isset($_FILES['articleImage']['name']) && !empty($_FILES['articleImage']['name'])) {
	            	    $stmt = $db->prepare('UPDATE articles SET articleImage = :articleImage WHERE articleID = :articleID') ;
		                $stmt->execute(array(
		                    ':articleID' => $articleID,
		                    ':articleImage' => $target
		                ));
	              }

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

          <?php
          include('menu.php');
          ?>

          <div class="pt-3"><h2>Ajouter un article</h2></div>

          <form action='' method='post' enctype="multipart/form-data">
             <div class="form-group">
               <label for="articleTitre">Titre</label>
               <input type="text" name="articleTitre" class="form-control" id="articleTitre" value='<?php if(isset($error)){ echo $_POST['articleTitre']; } ?>'>
             </div>
             <div class="form-group">
               <label for="articleTexte">Contenu</label>
               <textarea name="articleTexte" class="form-control" id="articleTexte" rows="10"><?php if(isset($error)){ echo $_POST['articleTexte']; } ?></textarea>
             </div>
             <div class="form-group">
               <label for="articleImage">Image <small>(images jpeg ou png seulement)</small></label>
               <input type="file" name="articleImage" class="form-control">
             </div>

              <div class="text-right"><button type='submit' class="btn btn-primary" name='submit'>Ajouter</button></div>
          </form>

        </div>
      </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>
