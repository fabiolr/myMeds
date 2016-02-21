
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

	if ($_POST['action'] == "new_self_med") {

    $self_med_id = $database->insert("self_medication",[
    "added_by" => $_SESSION['user'],
    "symptoms_id" => $_POST['symptom'],
    "meds_id" => $_POST['med_id']
    ]);
  // echo "insrting description ". $_POST['description']."by: ".$_SESSION['name']." and symptoms_id: ".$syms_id." and medid: ".$_POST['med_id'];

	}

  elseif ($_POST['action'] == "new_sym") {

    $syms_id = $database->insert("symptoms",[
    "description" => $_POST['description'],
    "added_by" => $_SESSION['user']
    ]);

  }

	elseif ($_POST['action'] == "new_type") {

  	$med_id = $database->insert("med_types",[
  		"type" => $_POST['type_name']
  		]);

	}


}
       
  if ($_GET['del']) {
    $deleted_rows = $database->delete("self_medication",
    ["id" => $_GET['del']]);
} 





// query to display data

$syms = $database->query("select meds.name, meds.id, symptoms.description, symptoms.id, self_medication.id from (self_medication left join meds on self_medication.meds_id = meds.id) left join symptoms on self_medication.symptoms_id = symptoms.id where self_medication.added_by = " . $_SESSION['user'].";");

$meds = $database->select("meds",["id","name"]);

$symptoms = $database->select("symptoms",["id","description"]);


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
            <li><a href="mymeds.php">My Meds</a></li>
            <li class="active"><a href="symps.php">Treatments</a></li>
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




<div class="table-responsive">

	<form action="symps.php" method="POST">
			<input type="hidden" name="action" value="new_self_med">


<div class="row">

        <div class="form-group form-group-sm">

            <div class="col-md-4">

            
                <select name="symptom" class="form-control" id="sel1">
                  <option>Symptom</option>
                  <?php
                  foreach ($symptoms as $symptom) {
                  echo "<option value=\"".$symptom['id']."\">".$symptom['description']."</option>";
                  }
                  ?>
                  </select>
            </div>



            <div class="col-md-4">


    					  <select name="med_id" class="form-control" id="sel1">
    					    <option>Medicine</option>
    					    <?php
    					    foreach ($meds as $med) {
    					    echo "<option value=\"".$med['id']."\">".$med['name']."</option>";
    					    }
    					    ?>
    				      </select>
    		    </div>

            <div class="col-md-4">
          			<div class="input-group">
          				<button class="btn btn-default" type="submit">Add</button>
          			</div>
    		    </div>
        </div>
</div>

  </form>


</div>


            <table class="table table-striped">
              <thead>
                <tr>
					
                </tr>
                <tr>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Active Ingredient</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              	<?php
              	foreach ($syms as $sym) {
              		echo "<tr>";
              		echo "<td>".$sym[0]."</td>";
					echo "<td>".$sym["type"]."</td>";
              		echo "<td>".$sym[2]."</td>";
              		echo "<td>";
              		echo "<a href=\"symps.php?del=".$sym[4]."\">Del</a>";	
              		echo "</td>";
					echo "</tr>";
              	}?>
              </tbody>
            </table>


	<form action="symps.php" method="POST">
			<input type="hidden" name="action" value="new_sym">
				<div class="input-group">
				<input type="text" name="description" class="form-control" placeholder="New Symptom" aria-describedby="basic-addon1">
				<span class="input-group-btn">
				<button class="btn btn-default" type="submit">Add</button>
				</span> 
			</div>
	</form>


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