<html>
<head>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"/>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
	<title>Debug #2</title>
</head>

<body>
<?php
	
	$choices = array("Vanilla", "Strawberry",
					 "Chocolate");


	$cups = array("Cone", "Small Cup", "Big Cup");

?>


    <div class="container">

      <div class="row">

        <h1>Ice Cream!</h1>

        <?php if($_POST):?>
	        <h2>Your Order</h2>
	        <p>You ordered a <?php echo $_POST['cup'];?> of
	       	<?php echo $choices[$_POST['flavor']];?>
	        </p>
        <?php else:?>
	        <p class="lead">Tell us what kind of ice cream you want.</p>
        <?php endif;?>
      </div>


      <div class="row">
      	<?php if($_POST):?>
		      
		<?php else:?>

		<form method="POST">
		  		<div class="col-md-6">
					<div class="form-group">
					    <label for="flavor">Flavor</label>
			        	<select name="flavor" class="form-control">
							
							<?php

								for ($i = 0; $i < count($choices); $i++) {
									
									echo "<option value=".$i.">".$choices[$i]."</option>";
								}
								
							?>


						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">

					    <label for="cup">Cup Size</label>
			        	<select name="cup" class="form-control">
							<?php
								foreach($cups as $cup) {
									echo "<option value=".$cup.">".$cup."</option>";
									}
								
								
							?>
						</select>
					</div>
				</div>
				<div class="col-md-12">
					<button type="submit" class="btn btn-primary btn-block">Gimme Ice Cream</button>
				</div>
			</form>
		  </div>
        <?php endif;?>
