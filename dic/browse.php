<?php
	try{
define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
define('DB_PORT',getenv('OPENSHIFT_MYSQL_DB_PORT')); 
define('DB_USER',getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
define('DB_PASS',getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
define('DB_NAME',getenv('OPENSHIFT_GEAR_NAME'));

$dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';port='.DB_PORT;
$db = new PDO($dsn, DB_USER, DB_PASS);
	}
	catch (PDOException $ex)
	{
		echo "Error: ". $ex->getMessage();
		die();
	}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fixed Top Navbar Example for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <!-- Custom styles for this template -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">WeDefine</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
			<li><a href="index.php">Home</a></li>
            <li class="active"><a href="browse.php">Browse</a></li>
            <li><a href="submit.php">Submit</a></li>
			<li><a href="#contact">About</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
  <div class="wrapper">
  	<div class="category2">
	  <h4 class="inlineh3"><strong>Category:</strong></h4>
	  <button type="button" class="btn btn-info btn-sm">All</button>
	  <span><strong>/</strong></span>
	  <button type="button" class="btn btn-info btn-sm">Computer Science</button>
	</div>
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-12">
          <h2>A</h2>
   <ul class="list-group">
	  <?php
	  	$statement = $db->query('SELECT * FROM word where word like "A%"');
		while ($row = $statement->fetch(PDO::FETCH_ASSOC))
		{ 
			$statement0 = $db->query("SELECT count(*) AS total from definition WHERE w_id=". $row['id']);
			$count = $statement0->fetch(PDO::FETCH_ASSOC);
		?>
	  <li class="list-group-item"><span class="badge"><?php echo $count['total']; ?></span><a href="view_word.php?id=<?php echo $row['id']; ?>"><?php echo $row['word']?></a></li>
	  <?php
	
		}
	  ?>   
	</ul>
        </div>
        <div class="col-md-12">
          <h2>B</h2>
   <ul class="list-group">
	  <?php
	  	$statement = $db->query('SELECT * FROM word where word like "B%"');
		while ($row = $statement->fetch(PDO::FETCH_ASSOC))
		{ 
			$statement0 = $db->query("SELECT count(*) AS total from definition WHERE w_id=". $row['id']);
			$count = $statement0->fetch(PDO::FETCH_ASSOC);
		?>
	  <li class="list-group-item"><span class="badge"><?php echo $count['total']; ?></span><a href="view_word.php?id=<?php echo $row['id']; ?>"><?php echo $row['word']?></a></li>
	  <?php
	
		}
	  ?>     
	</ul>
        </div>      
        <div class="col-md-12">
          <h2>C</h2>
   <ul class="list-group">
	  <?php
	  	$statement = $db->query('SELECT * FROM word where word like "C%"');
		while ($row = $statement->fetch(PDO::FETCH_ASSOC))
		{ 
			$statement0 = $db->query("SELECT count(*) AS total from definition WHERE w_id=". $row['id']);
			$count = $statement0->fetch(PDO::FETCH_ASSOC);
		?>
	  <li class="list-group-item"><span class="badge"><?php echo $count['total']; ?></span><a href="view_word.php?id=<?php echo $row['id']; ?>"><?php echo $row['word']?></a></li>
	  <?php
	
		}
	  ?> 
	</ul>
        </div>  
		        <div class="col-md-12">
          <h2>D</h2>
   <ul class="list-group">
	  <?php
	  	$statement = $db->query('SELECT * FROM word where word like "D%"');
		while ($row = $statement->fetch(PDO::FETCH_ASSOC))
		{ 
			$statement0 = $db->query("SELECT count(*) AS total from definition WHERE w_id=". $row['id']);
			$count = $statement0->fetch(PDO::FETCH_ASSOC);
		?>
	  <li class="list-group-item"><span class="badge"><?php echo $count['total']; ?></span><a href="view_word.php?id=<?php echo $row['id']; ?>"><?php echo $row['word']?></a></li>
	  <?php
	
		}
	  ?> 	  
	</ul>
        </div>  
      </div>
      </div>
	</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
