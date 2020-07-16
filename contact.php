<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendors/PHPMailer/src/Exception.php';
require 'vendors/PHPMailer/src/PHPMailer.php';
require 'vendors/PHPMailer/src/SMTP.php';

$response = '';

if (isset($_POST['submit'])) {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $response = "Votre e-mail n'est pas valide";
        }
        else if (empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['name']) || empty($_POST['msg'])) {
                $response = "Veuillez remplir tous les champs";
        }
        else {
                $name = htmlspecialchars($_POST["name"]);
                $subject = htmlspecialchars(strip_tags($_POST["subject"]));
                $message = htmlspecialchars(strip_tags($_POST["msg"]));
                $from = htmlspecialchars($_POST["email"]);

                $mail = new PHPMailer;
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();                                        // Active l'envoi via SMTP
                $mail->Host = 'xxxxxxxxxxxxx';                          // À remplacer par le nom de votre serveur SMTP
                $mail->SMTPAuth = true;                                 // Active l'authentification par SMTP
                $mail->Username = 'xxxxxxxxxxxxxxxxxxxxxxxx';           // Nom d'utilisateur SMTP (votre adresse email complète)
                $mail->Password = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxx';      // Mot de passe de l'adresse email indiquée précédemment
                $mail->Port = 587;                                      // Port SMTP
                $mail->SMTPSecure = 'tls';                              // Utiliser SSL / TLS
                $mail->isHTML(true);                                    // Format de l'email en HTML
                //$mail->SMTPDebug = 2;                                 // Debug perposes
                $mail->From = $from;                                    // L'adresse mail de l'emetteur du mail
                $mail->FromName = $name;                                // Le nom de l'emetteur qui s'affichera dans le mail
                $mail->addAddress('contact@olivierprieur.fr');          // Destinataire du mail
                $mail->Subject = 'Message depuis portfolio.olivierprieur.fr : '.$subject;  // Le sujet de l'email

                $message = "Nom: ".$name."<br><br>".$message;
                $message = "De: ".$from."<br>".$message;

                $mail->Body = nl2br($message);                          // Le contenu du mail en HTML

                if(!$mail->send()) {
                        header("Location: contact.php?action=notok");
                        //echo '<div>';
                        //echo '<span class="fa fa-warning"></span>&nbsp;Le message ne peut être envoyé :( <br>';
                        //echo 'Erreur: ' . $mail->ErrorInfo;
                        //echo '</div>';
                }
                else {
                        header("Location: contact.php?action=ok");
                }

                // PHPMailer
        }
    }

    include_once 'header.php';
?>

<div class="container pt-3 pb-5">
  <div class="row">
    <div class="col-sm-12 px-3 py-3 text-justify border">
      <?php
      // Affichage : message envoyé !
          if(isset($_GET['action']) && $_GET['action'] == "ok"){
              echo '<div class="alert-success" style="font-weight:bold; font-size:19px; text-align:center;">Votre message a bien été envoyé.<br>Merci.</div><br>';
          }
          if(isset($_GET['action']) && $_GET['action'] == "notok"){
              echo '<div class="alert-danger">';
              echo '<span class="fa fa-warning"></span>&nbsp;Le message ne peut être envoyé :( <br>';
              echo 'Erreur: ' . $mail->ErrorInfo;
              echo '</div>';
          }
      ?>

        <div class="card-body">
           <div class="h4 mt-0 title">Me contacter</div>
              <form class="contact" method="post" action="contact.php">
                  <div class="form-group">
                    <label for="email">Votre adresse e-mail</label>
                    <input class="form-control" type="email" id="email" name="email">
                  </div>
                  <div class="form-group">
                    <label for="name">Votre nom/pseudo</label>
                    <input class="form-control" type="text" id="name" name="name">
                  </div>
                  <div class="form-group">
                    <label for="subject">Sujet du message</label>
                    <input class="form-control" type="text" id="subject" name="subject">
                  </div>
                  <div class="form-group">
                    <label for="msg">Message</label>
                    <textarea class="form-control" id="msg" name="msg" rows="7"></textarea>
                  </div>
                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">Envoyer</button>
                    <button type="reset" class="btn btn-secondary">Annuler</button>
                  </div>
              </form>
        </div>

    </div>
  </div>
</div>


<?php
include_once 'footer.php';
?>
