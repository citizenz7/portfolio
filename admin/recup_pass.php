<?php
include_once 'header.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendors/PHPMailer/src/Exception.php';
require '../vendors/PHPMailer/src/PHPMailer.php';
require '../vendors/PHPMailer/src/SMTP.php';

$response = '';

if (isset($_POST['submit'])) {

    if(!empty($_POST['email'])) {
		    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			       $error[] = 'Cette adresse e-mail n\'est pas valide !';
		    }
		    else {
			       $email = html($_POST['email']);
		    }
	  }

    else {
		    $error[] = 'veuillez renseigner votre adresse email.';
	  }

	$stmt = $db->query("SELECT email FROM membres WHERE email = '".$email."' ");

	//si le nombre de lignes retourne par la requete != 1
	if ($stmt->rowCount() != 1) {
		$error[] = 'adresse e-mail inconnue.';
	}

        if(!isset($error)) {
                $row1 = $stmt->fetch();

                $retour = $db->query("SELECT password FROM membres WHERE email = '".$email."' ");
		            $row2 = $retour->fetch();
		            $new_password = fct_passwd(); //création d'un nouveau mot de passe
		            $hashedpassword = $user->password_hash($new_password, PASSWORD_BCRYPT); // cryptage du password

		            $subject = 'Votre nouveau mot de passe sur '.SITENAMELONG;

		            $body = "Bonjour,<br>\n";
		            $body .= "Vous avez demandé un nouveau mot de passe pour votre compte sur le " . SITENAMELONG . ".<br>\n";
		            $body .= "Votre nouveau mot de passe est : " . $new_password . "<br>\n\n";
		            $body .= "Cordialement,<br>\n\n";
		            $body .= "L'equipe de " . SITENAMELONG;

		            $emaildest = $row1['email'];


                $mail = new PHPMailer;
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();                                        // Active l'envoi via SMTP
                $mail->Host = SMTPHOST;                                 // A remplacer par le nom de votre serveur SMTP
                $mail->SMTPAuth = true;                                 // Active l'authentification par SMTP
                $mail->Username = SITEMAIL;                             // Nom d'utilisateur SMTP (votre adresse email complète)
                $mail->Password = SITEMAILPASSWORD;                     // Mot de passe de l'adresse email indiquée précédemment
                $mail->Port = SMTPPORT;                                 // Port SMTP
                $mail->SMTPSecure = 'tls';                              // Utiliser SSL / TLS
                $mail->isHTML(true);                                    // Format de l'email en HTML
                //$mail->SMTPDebug = 2;                                 // Debug perposes
                $mail->From = SITEMAIL;                                 // L'adresse mail de l'emetteur du mail
                $mail->FromName = SITENAMELONG;                         // Le nom de l'emetteur qui s'affichera dans le mail
                $mail->addAddress($emaildest);                          // Destinataire du mail
                $mail->addReplyTo(SITEMAIL);                            // Pour ajouter l'adresse à laquelle répondre (en général celle de la personne ayant rempli le formulaire)
                $mail->Subject = $subject;                              // Le sujet de l'email

                $mail->Body = $body;                                    // Le contenu du mail en HTML

                if(!$mail->send()) {
                  echo '<div class="alert-msg rnd8 error">';
			            echo '<span class="fa fa-warning"></span>&nbsp;Le message ne peut être envoyé :( <br>';
			            echo 'Erreur: ' . $mail->ErrorInfo . '</div><br><br>';
                }
                else {
                  // si tout est ok, le mail a été envoyé
			            //mise à jour BD avec le nouveau mot de passe utilisateur
                  $stmt = $db->prepare('UPDATE membres SET password = :password WHERE email = :email') ;
                  $stmt->execute(array(
                      ':password' => $hashedpassword,
                      ':email' => $email
                  ));

                	header("Location: recup_pass.php?action=ok");
                }
                // PHPMailer
        }
    }
?>

<div class="container pt-3 pb-5">
  <div class="row">
    <div class="col-sm-12 px-3 py-3 text-justify border">

      <?php
      include_once 'menu.php';

      // Affichage : message envoyé !
      if(isset($_GET['action'])){
						echo '<div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                Un mail contenant votre nouveau mot de passe vous a été envoyé.<br/>
                Veuillez le consulter avant de vous reconnecter sur le ' . SITENAMELONG . ' !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>';
					}
      ?>

      <h4 class="py-3 px-3">Vous avez oublié votre mot de passe ?</h4>

	   			<div class="small alert alert-warning text-justify rounded py-3 px-3">
        				Vous allez faire une demande de nouveau mot de passe.<br>
                Ce nouveau mot de passe vous sera envoyé par e-mail.<br>
                Une fois connecté avec vos identifiants, vous pourrez éventuellement redéfinir un mot de passe à partir de votre page profil.<br>
                Veuillez donc entrer ci-dessous l'adresse e-mail associée à votre compte :
	   			</div>

				<div class="container bg-light py-2 px-2 small">
	   				<form class="form-group" action='' method='post'>
	        					<label for="email">Entrez votre adresse e-mail :
		    						<input class="form-control" type="text" style="width:450px;" name="email" required>
	        					</label>
							<br>
							<div class="form-group">
								<button class="btn btn-primary btn-sm mb-2 mt-2" type="submit" name="submit">Envoyer</button>
								<button class="btn btn-secondary btn-sm ml-3 mb-2 mt-2" type="reset">Annuler</button>
							</div>
	   				</form>
				</div>

				<?php
				if(isset($error)){
					if (is_array($error) || is_object($error)) {
						foreach($error as $error){
							echo '<div class="alert alert-danger mt-3 alert-dismissible fade show small" role="alert">ERREUR : '.$error.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
						}
					}
				}
				?>

    </div>
  </div>
</div>


<?php
include_once 'footer.php';
?>
