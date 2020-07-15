<?php include_once 'header.php'; ?>

<?php
$stmt = $db->prepare('SELECT articleID, articleTitre, articleTexte, articleDate, articleImage, articleVues FROM articles WHERE articleID = :articleID');
$stmt->execute(array(':articleID' => $_GET['id']));
$row = $stmt->fetch();

if($row['articleID'] == ''){
    header('Location: ./');
    exit;
}
?>

  <div class="container pt-5 pb-5">
    <div class="row">
      <div class="col-sm-12 px-3 py-3 text-justify border">
        <div class="pb-3">
          <h2 class="titre-article"><?php echo html($row['articleTitre']); ?></h2>
          <p class="text-muted">
            <i class="far fa-calendar-alt"></i> Publié le : <?php echo date_fr('d-m-Y à H:i:s', strtotime($row['articleDate'])); ?> |
            <i class="fas fa-eye"></i> Lectures : <?php echo $row['articleVues']; ?>
          </p>
        </div>
        <img class="img-fluid img-thumbnail float-left img-article" src="<?php echo $row['articleImage']; ?>" alt="<?php html($row['articleTitre']); ?>">
          <?php echo $row['articleTexte']; ?>
      </div>
    </div>
  </div>

<?php include_once 'footer.php'; ?>
