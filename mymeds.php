
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
?>

<?php if (!isset($_SESSION['user'])):?>
	<script>Redirect("index.php?m=please_login");</script>
<?php endif;?>

<?php

// input data into table if present




if ($_POST) {

	if ($_POST['action'] == "new_med") {

	$meds_id = $database->insert("meds",[
	"active_ingredient" => $_POST['active_ingredient'],
	"name" => $_POST['name'],
	"med_types_id" => $_POST['type']

	]);
	}
	elseif ($_POST['action'] == "new_type") {

	$med_id = $database->insert("med_types",[
		"type" => $_POST['type_name']
		]);

	}


}

if ($_GET) {


        if ($_GET['have']) {
      $last_ind_id = $database->insert("inventory",[
        "qty" => 1,
        "meds_id" => $_GET['have'],
        "user_id" => $_SESSION['user']
        ]);
      // echo "<BR><BR>Just added med_id: ".$_GET['have']." for user: ".$_SESSION['user'];
    } 

        if ($_GET['plus']) {
      $last_ind_id = $database->update("inventory",[
          "qty[+]" => 1
          ],[
          "id" => $_GET['plus']

        ]);
    } 


        if ($_GET['minus']) {
      $last_ind_id = $database->update("inventory",[
          "qty[-]" => 1
          ],[
          "id" => $_GET['minus']

        ]);
    } 


        if ($_GET['del']) {
      $deleted_rows = $database->delete("inventory",
          ["id" => $_GET['del']]);
    } 


        if ($_GET['need']) {
      $last_ind_id = $database->update("inventory",[
          "need" => 1
          ],[
          "id" => $_GET['need']

        ]);
    } 

        if ($_GET['noneed']) {
      $last_ind_id = $database->update("inventory",[
          "need" => 0
          ],[
          "id" => $_GET['noneed']

        ]);
    } 
 } 




// query to display data


$inventory = $database->select("inventory",[
  "[><]meds" => ["meds_id" => "id"]
  ],[
  "meds_id",
  "inventory.id",
  "qty",
  "name",
  "active_ingredient",
  "dose",
  "need"
  ],[
    "user_id" => $_SESSION['user']
  ]);



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
          	<li><a href="dashboard.php">Dash</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="meds.php">Meds</a></li>
            <li class="active"><a href="mymeds.php">My Meds</a></li>
            <li><a href="symps.php">Treatments</a></li>
            <li><a href="friends.php">Friends</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="logout.php">Sign Out</a></li>


          </ul>
          <p class="navbar-text navbar-right"><a href="#" class="navbar-link"><?=$_SESSION["name"];?></a></p>

        </div><!--/.nav-collapse -->

      </div>
    </nav>
            <h3 class="text-muted">myMeds</h3>
            	<br>
   </div>







            <table class="table table-striped">
              <thead>
                <tr>
					
                </tr>
                <tr>
                  <th>Med</th>
                  <th>Active Ingredient</th>
                  <th>Dosage</th>
                  <th>Need?</th>
                  <th>Stock</th>
                  <th>Del</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              	<?php
              	foreach ($inventory as $item) {
              		echo "<tr>";
                  echo "<td>".$item["name"]."</td>";
                  echo "<td>".$item["active_ingredient"]."</td>";
                  echo "<td>".$item["dose"]."</td>";
                  echo "<td>";
                  if ($item['need']) { 
                     echo "<a href=\"mymeds.php?noneed=".$item['id']."\">Needed</a>";  
                    }
                  else {
                     echo "<a href=\"mymeds.php?need=".$item['id']."\">Not Needed</a>";  
                    }
                  echo "</td><td>";                 
                  echo "<a href=\"mymeds.php?minus=".$item['id']."\">-</a>"; 
                  echo " | ".$item["qty"]." | ";
                  echo "<a href=\"mymeds.php?plus=".$item['id']."\">+</a>"; 
                  echo "</td><td>";                 
                  echo "<a href=\"mymeds.php?del=".$item['id']."\">Del</a>"; 
                  echo "</td>";

					echo "</tr>";
              	}?>
              </tbody>
            </table>




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