
<?php include_once 'header.php'; ?>

<?php
$id = html($_GET['id']);

// on met à jour le nb de vues de l'article
$stmt2 = $db->query('UPDATE projets SET projetVues = projetVues+1 WHERE projetID = '.$id);

$stmt = $db->prepare('SELECT projetID, projetTitre, projetTexte, projetGithub, projetDate, projetCat, projetImage, projetVues FROM projets WHERE projetID = :projetID');
$stmt->execute(array(':projetID' => $id));
$row = $stmt->fetch();

if($row['projetID'] == ''){
    header('Location: ./');
    exit;
}
?>

  <div class="container pt-5 pb-5">
    <div class="row">
      <div class="col-sm-12 px-3 py-3 text-justify border">
        <div class="pb-3">
          <h2 class="titre-projet"><?php echo html($row['projetTitre']); ?></h2>
          <p class="text-muted">
            <i class="far fa-calendar-alt"></i> Publié le : <?php echo date_fr('d-m-Y à H:i:s', strtotime($row['projetDate'])); ?> |
            <i class="fas fa-tag"></i> Catégorie : <?php echo html($row['projetCat']); ?> |
            <i class="fas fa-eye"></i> Lectures : <?php echo $row['projetVues']; ?>
          </p>
        </div>
        <img class="img-fluid img-thumbnail float-left img-article" src="<?php echo $row['projetImage']; ?>" alt="<?php html($row['projetTitre']); ?>">
          <?php echo $row['projetTexte']; ?>

          <?php
          if(!empty($row['projetGithub'])) {
          ?>
            <br>
            <a class="text-dark" href="<?php echo $row['projetGithub']; ?>" target="_blank"><i class="fab fa-github fa-2x"></i> <?php echo $row['projetGithub']; ?></a>
          <?php
          }
          ?>

	<div id="disqus_thread" class="pt-5"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://portfolio-shh9xt0mnz.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

      </div>
    </div>
  </div>

<?php include_once 'footer.php'; ?>
