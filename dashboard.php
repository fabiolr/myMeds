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

  <body>

<?php
session_start();

require_once 'medoo.php';
require_once 'database.php';


if ($_POST) {



  if ($database->has("users", [
    "AND" => [
      "email" => $_POST[email],
     "password" => $_POST[password]
   ]
  ])) { 

  $user_names = $database->select("users",["name","id"], [
  "email[=]" =>  $_POST[email]
  ]);

  $_SESSION['user'] = $user_names[0]["id"];
  $_SESSION['name'] = $user_names[0]["name"];


  }
  else
  {

  echo"<script>Redirect(\"index.php?m=login_error\");</script>";

  }
}


?>


<?php if (!isset($_SESSION['user'])):?>

<script>Redirect("index.php?m=please_login");
</script>


<?php endif;?>

<?php

$c_users = $database->count("users");
$c_meds = $database->count("meds");
$c_symps = $database->count("symptoms");
$c_self = $database->count("self_medication");
$c_friendships = $database->count("friendships");

?>


   <div class="container">
    <div class="header clearfix">
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="dashboard.php">myMeds</a>

        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="dashboard.php">Dash</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="meds.php">Meds</a></li>
            <li><a href="mymeds.php">My Meds</a></li>
            <li><a href="symps.php">Treatments</a></li>
            <li><a href="friends.php">Friends</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="logout.php">Sign Out</a></li>

          </ul>
          <p class="navbar-text navbar-right"><a href="#" class="navbar-link"><?=$user_names[0][name]?></a></p>

        </div><!--/.nav-collapse -->

      </div>
    </nav>
                    <h3 class="text-muted">myMeds</h3>
              <br>

  </div>

  <div class="starter-template">


      <div class="row">
              <div class="col-md-4">


                    <ul class="list-group">
                      <li class="list-group-item">
                        <span class="badge"><?=$c_users?></span>
                        Users
                      </li>
                      <li class="list-group-item">
                        <span class="badge"><?=$c_meds?></span>
                        Meds
                      </li>
                      <li class="list-group-item">
                        <span class="badge"><?=$c_symps?></span>
                        Symptoms
                      </li>
                      <li class="list-group-item">
                        <span class="badge"><?=$c_self?></span>
                        Uses
                      </li>
                      <li class="list-group-item">
                        <span class="badge"><?=$c_friendships?></span>
                        Friendships
                      </li>
                    </ul>
              </div>

              <div class="col-md-4">


              </div>


              <div class="col-md-4">



              </div>
      </div>

  </div>



      

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