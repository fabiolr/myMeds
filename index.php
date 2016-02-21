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
          <a class="navbar-brand" href="index.php">myMeds</a>

        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="mailto:fabio@ribei.ro">Contact</a></li>
            <li><a href="register.php">Sign up</a></li>

          </ul>
          <form action="dashboard.php" method="POST" class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" name="email" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.nav-collapse -->

      </div>

    </nav>

        <h3 class="text-muted">myMeds</h3>
      </div>
      



     <?php if ($_GET["m"] == "login_error"):?>
    <div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  Incorrect Login
    </div>

  <?php elseif ($_GET["m"] == "just_registered"):?>
    <div class="alert alert-success" role="alert">
  <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
  <span class="sr-only">Sucess:</span>
  User Registred sucessfully. Please sign in.
    </div>

  <?php elseif ($_GET["m"] == "please_login"):?>
    <div class="alert alert-warning" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Oops:</span>
  Please sign in.
    </div>

   <?php endif;?>

      <div class="starter-template">

        <!--
        <h1>Na roubada em Miami sem seus remédios?</h1>
        <br>
        <p class="lead">Organize sua farmácia de casa.</p>
        <p class="lead">Lembre para que serve os remédios que você tem.</p>
        <p class="lead">Saiba para que os outros usam os remédios.</p>
        <p class="lead">Encontre pessoas que tenham o remédio que você precisa. </p>
        <p class="lead">Empreste os remédios que você tem para quem está na roubada.</p>
        <p class="lead">Ajude, conheça, compartilhe, se conecte com outros hipocondríacos!.</p>
      </div>

        -->

        <h1>Organize you personal pharmacy</h1>
        <br>
        <p class="lead">Organize and keep trak of what you have in your personal pharmacy.</p>
        <p class="lead">Remember on the go if you need any meds.</p>
        <p class="lead">Keep track of what doctors prescribed things for.</p>
        <p class="lead">See what your friends use their meds for. </p>
        <p class="lead">Share foreign (legal) meds with your frieds.</p>
        <p class="lead">Connect with fellow hypocondriacs!.</p>



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