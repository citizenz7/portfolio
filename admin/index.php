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
          <div class="text-center mb-4 alert alert-primary lead" role="alert">Bienvenue <b><?php echo $_SESSION['username']; ?></b> ! Vous êtes connecté.</div>
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
              <th>Date</th>
              <th>Action</th>
              </tr>
              <?php
              try {
                $stmt = $db->query('SELECT projetID, projetTitre, projetDate FROM projets ORDER BY projetID DESC');
                while($row = $stmt->fetch()){

                  echo '<tr>';
                  echo '<td>'.$row['projetID'].'</td>';
                  echo '<td>'.$row['projetTitre'].'</td>';
                  echo '<td>'.date('j M Y', strtotime($row['projetDate'])).'</td>';
                  ?>
                  <td>
                    <a title="Editer le projets" href="edit-projet.php?id=<?php echo $row['projetID'];?>"><button type="button" class="btn btn-sm btn-primary">Editer</button></a> |
                    <a title="Supprimer le projet" href="javascript:supprprojet('<?php echo $row['projetID'];?>','<?php echo $row['projetTitre'];?>')"><button type="button" class="btn btn-secondary btn-sm">Suppr.</button></a>
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

            <!-- Delete javascript alert -->
            <script language="JavaScript" type="text/javascript">
              function supprprojet(id, title) {
                if (confirm("Etes-vous certain de vouloir supprimer le projet " + title + " ?")) {
                  window.location.href = 'index.php?delprojet=' + id;
                }
              }
            </script>

            <!-- Delete in SQL -->
            <?php
            if(isset($_GET['delpost'])) {
              $stmt = $db->prepare('DELETE FROM blog_posts WHERE postID = :postID') ;
              $stmt->execute(array(':postID' => $_GET['delpost']));

              header('Location: index.php?action=deleted');
              exit;
            }

            if(isset($_GET['action'])){
              echo '<div class="alert alert-success text-center font-weight-bold mt-4" role="alert">Projet '.$_GET['action'].' !</div>';
            }
            ?>

      </div>
    </div>
  </div>

<?php include_once 'footer.php'; ?>
