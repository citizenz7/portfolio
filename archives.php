<?php
include_once 'header.php';
?>

<?php
try {
//collect month and year data
$month = $_GET['month'];
$year = $_GET['year'];

$monthName = date_fr("F", mktime(0, 0, 0, html($_GET['month']), 10));
$yearNumber = date_fr(html($_GET['year']));

//set from and to dates
$from = date_fr('Y-m-01 00:00:00', strtotime("$year-$month"));
$to = date_fr('Y-m-31 23:59:59', strtotime("$year-$month"));

$pages = new Paginator('3','p');

$stmt = $db->prepare('SELECT projetID FROM projets WHERE projetDate >= :from AND projetDate <= :to');
$stmt->execute(array(
		':from' => $from,
		':to' => $to
));

//pass number of records to
$pages->set_total($stmt->rowCount());

$stmt = $db->prepare('SELECT projetID, projetTitre, projetTexte, projetCat, projetDate FROM projets WHERE projetDate >= :from AND projetDate <= :to ORDER BY projetID DESC ' .$pages->get_limit());
$stmt->execute(array(
    ':from' => $from,
    ':to' => $to
));
?>

<div class="container pt-3 pb-5">
  <div class="row">
    <div class="col-sm-12 px-3 py-3">

          <h2 class="pt-3 pb-4">Archives mois de <?php echo $monthName; ?> <?php echo $yearNumber; ?></h2>

					<?php
					while($row = $stmt->fetch()){

						echo '<div class="border my-3">';
							  echo '<h3 class="px-3 py-3"><a href="projet.php?id='.$row['projetID'].'">'.$row['projetTitre'].'</a></h3>';
							  echo '<p class="muted smalltext px-3">publié le '.date_fr('d-m-Y H:i:s', strtotime($row['projetDate'])).' dans <em>' . $row['projetCat'] . '</em></p>';
							  echo '<div class="px-3 text-justify">';
									  echo nl2br($row['projetTexte']);
							  echo '</div>';
							  echo '<p class="px-3"><a href="projet.php?id=' . $row['projetID'] . '">Lire la suite</a></p>';
					  echo '</div>';
				}

				echo '<div class="text-center">' . $pages->page_links("archives.php?month=$month&year=$year&") . '</div>';

	}

  catch(PDOException $e) {
			echo $e->getMessage();
	}
?>

</div>
</div>
</div>

<?php include_once 'footer.php'; ?>
