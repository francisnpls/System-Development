<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('home.php', false);}
?>
<?php include_once('layouts/header.php'); ?>

<div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
      <img src="libs/css/dmntkicks.png" class="img-fluid dmntkicks" alt="dmntlogo">
      </div>
      <div class="col-md-3">
      <span class="Tagline">
        Top grade quality kicks that will knock your socks off.
      </span>
      </div>
    </div>
  </div>
</div>
<div class="login-page admin-login">
    <div class="text-center">
       <h1>Welcome</h1>
       <p>Sign in to start your session</p>
     </div>
     <?php echo display_msg($msg); ?>
      <form method="post" action="auth.php" class="clearfix">
        <div class="form-group">
              <label for="username" class="control-label">Username</label>
              <input type="name" class="form-control" name="username" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="Password" class="control-label">Password</label>
            <input type="password" name= "password" class="form-control" placeholder="password">
        </div>
        <div class="form-group">
                <button type="submit" class="btn btn-info  pull-right">Login</button>
        </div>
    </form>
</div>
<?php include_once('layouts/footer.php'); ?>

