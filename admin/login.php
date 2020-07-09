<?php
//include config
require_once('../includes/config.php');

include_once 'header.php';
?>


  <div class="container pt-5 pb-5">
    <div class="row text-center">
      <div class="col-md-4 offset-md-4">
        <div class="card">
          <div class="card-body">

            <div class="pb-3"><h4>Connexion Espace Admin</h4></div>

            <form action="" method="post">
              <div class="form-group py-2 px-2">
                <label for="usernameInput">Pseudo</label>
                <input type="text" class="form-control" id="UsernameInput" aria-describedby="unsernameHelp" name="username" value="">
              </div>
              <div class="form-group">
                <label for="passwordInput">Mot de passe</label>
                <input type="password" class="form-control" id="passwordInput" name="password" value="">
              </div>
              <button type="submit" class="btn btn-primary btn-block" name="submit">Connexion</button>
            </form>
          </div>
          <div class="logi-forgot text-center mt-2 small">
						<a href="recup_pass.php">Mot de passe oublié ?</a></p>
					</div>
        </div>

<?php
//process login form if submitted
if(isset($_POST['submit'])){

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if($user->login($username,$password)){

        //logged in return to index page
        header('Location: index.php');
        exit;

    } else {
        $message = '<div class="alert alert-danger text-center" role="alert">Wrong username or password</div>';
    }

}//end if submit

if(isset($message)){ echo $message; }
?>

</div>
</div>
</div>

<?php include_once 'footer.php'; ?>
