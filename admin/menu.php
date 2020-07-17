<nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-4">
  <div class="collapse navbar-collapse titre-menu" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"><i class="fas fa-users-cog"></i> Page admin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../" target="_blank"><i class="fas fa-home"></i> Page d'accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="users.php"><i class="fas fa-users"></i> Utilisateurs</a>
      </li>
    </ul>
	<?php
	if(!$user->is_logged_in()){
  		echo '<a class="nav-link text-white" href="login.php"><i class="fas fa-sign-in-alt"></i> Connexion</a>';
	}
	else {
	?>
        	<a class="nav-link text-white" href="logout.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
	<?php } ?> 
  </div>
</nav>
