<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>myMeds</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
 
 
    <script  src="empresta.js"></script>
    <script  src="jquery/jquery-2.2.0.min.js"></script>
    <script  src="bootstrap/js/bootstrap.min.js"></script>

  </head>
<?php

  require 'medoo.php';
  require 'database.php';
  if($_POST) {
    $user_id = $database->insert("users", [
      "email" => $_POST['email'],
      "name" => $_POST['name'],
      "password" => $_POST['password']
    ]);
    session_start();
    $_SESSION["user"] = $user_id;
    $_SESSION["newuser"] = true;

  }
?>
  <body>
<br><br>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">myMeds</a>

        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="about.php">About</a></li>
            <li><a href="mailto:fabio@ribei.ro">Contact</a></li>
            <li class="active"><a href="register.php">Sign up</a></li>

          </ul>
        </div><!--/.nav-collapse -->

      </div>

    </nav>
 
    <div class="container">

      <div class="starter-template">
        <br>
        <h1>Register</h1>
        <br>

      </div>

<?php if ($_SESSION["newuser"]):?>

<script>Redirect("index.php?m=just_registered");</script>

<?php else:?>

<div class="row">
        <div class="col-xs-6">       
          <form action="register.php" method="POST">

            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1"></span>
              <input type="text" name="email" class="form-control" placeholder="E-Mail" aria-describedby="basic-addon1">
            </div>
            <br>
       <div class="input-group">
              <span class="input-group-addon" id="basic-addon1"></span>
              <input type="text" name="name" class="form-control" placeholder="Full Name" aria-describedby="basic-addon1">
            </div>
            <br>

              <div class="input-group">
              <span class="input-group-addon" id="basic-addon1"></span>
              <input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1">

            </div>
            <br>

            <button type="submit" class="btn btn-primary btn-md">
            Create Account
            </button>

          </form>

        </div>

        <div class="col-xs-6"></div>


      </div>


<?php endif;?>



    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  

</body></html>