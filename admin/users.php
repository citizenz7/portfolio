<?php

//include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){
  header('Location: login.php');
}

$stmt = $db->query('SELECT memberID, username, email FROM membres ORDER BY username');
while($row = $stmt->fetch()){

    echo '<tr>';
    echo '<td>'.$row['username'].'</td>';
    echo '<td>'.$row['email'].'</td>';
    ?>

    <td>
        <a href="edit-user.php?id=<?php echo $row['memberID'];?>">Edit</a>
        <?php if($row['memberID'] != 1){?>
            | <a href="javascript:deluser('<?php echo $row['memberID'];?>','<?php echo $row['username'];?>')">Delete</a>
        <?php } ?>
    </td>

    <?php
    echo '</tr>';

}
?>

<script language="JavaScript" type="text/javascript">
function deluser(id, title)
{
  if (confirm("Are you sure you want to delete '" + title + "'"))
  {
      window.location.href = 'users.php?deluser=' + id;
  }
}
</script>

<?php
if(isset($_GET['deluser'])){

    //if user id is 1 ignore
    if($_GET['deluser'] !='1'){

        $stmt = $db->prepare('DELETE FROM membres WHERE memberID = :memberID') ;
        $stmt->execute(array(':memberID' => $_GET['deluser']));

        header('Location: users.php?action=deleted');
        exit;

    }
}
?>
