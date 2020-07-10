<?php
//include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){
  header('Location: login.php');
}

include_once 'header.php';
?>

  <div class="container pt-3 pb-5">
    <div class="row">
      <div class="col-sm-12 px-5 text-justify">
        <div class="pb-5">
          <div class="text-center mb-4 alert alert-primary" role="alert">Bienvenue <b><?php echo $_SESSION['username']; ?></b> !<br>Vous êtes connecté.</div>
          <?php include('menu.php');?>

            <table class="table">
              <tr>
                <td><span class="lead font-weight-bold">Projets</span></td>
                <td class="text-right"><a href="add-projet.php" class="mx-auto"><button type="button" class="btn btn-success btn-sm">Ajouter un projet</button></a></td>
              </tr>
            </table>

          <table class="table">
            <tr>
              <th>ID</th>
              <th>Titre</th>
              <th>Date d'ajout</th>
              <th>Action</th>
              </tr>
              <?php
              try {
                $stmt = $db->query('SELECT projetID, projetTitre, projetDate FROM projets ORDER BY projetID DESC');
                while($row = $stmt->fetch()){

                  echo '<tr>';
                  echo '<td>'.$row['projetID'].'</td>';
                  echo '<td>'.$row['projetTitre'].'</td>';
                  echo '<td class="small">'.date_fr('d-m-Y à H:i:s', strtotime(($row['projetDate']))).'</td>';
                  ?>
                  <td>
                    <a class="btn btn-primary btn-sm" role="button" aria-pressed="true" title="Editer le projets" href="edit-projet.php?id=<?php echo $row['projetID'];?>">Editer</a> |
                    <a class="btn btn-danger btn-sm" role="button" aria-pressed="true" title="Supprimer le projet" href="javascript:delprojet('<?php echo $row['projetID'];?>','<?php echo $row['projetTitre'];?>')">Suppr.</a>
                  </td>
                  <?php
                  echo '</tr>';
                }

              }
              catch(PDOException $e) {
                echo $e->getMessage();
              }
              ?>
            </table>

            <!-- Delete in SQL -->
            <?php
            if(isset($_GET['delprojet'])) {
              $stmt = $db->prepare('DELETE FROM projets WHERE projetID = :projetID') ;
              $stmt->execute(array(':projetID' => $_GET['delprojet']));

              header('Location: index.php?action=deleted');
              exit;
            }

            if(isset($_GET['action'])){
              echo '
              <div class="alert alert-info alert-dismissible fade show text-center font-weight-bold mt-4" role="alert">
                Projet '.$_GET['action'].' !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              ';
            }
            ?>

      </div>
    </div>
  </div>

<?php include_once 'footer.php'; ?>
