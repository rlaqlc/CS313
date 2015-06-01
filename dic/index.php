<?php
session_start();
	try
	{
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

    <title>WeDefine</title>

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
            <li class="active"><a href="#">Home</a></li>
			<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Browse <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">All</a></li>
				  <li class="divider"></li>
                  <li><a href="browse.php">Computer Science</a></li>
				  <li><a href="#">Test Category</a></li>
                </ul>
            </li>
            <li><a href="submit.php">Submit</a></li>
			<li>
			<?php
			if (isset($_SESSION['last_name']))
			{
			?>
			<a href="#"><?php echo "You are signed in as <strong>" . $_SESSION['last_name'] . "</strong>";?></a>
			<?php
			}
			else
			{
			?>
			<a href="signin.php"><?php echo 'Sign in';?></a>
			<?php
			}
			?>
			</li>
          </ul>
		  	<ul class="nav navbar-nav navbar-right">

			<form class="navbar-form" role="search">
				<div class="form-group">
				<div class="input-group-sm">
				<input type="text" class="form-control">
				</div>
				</div>
				<button type="submit" class="btn btn-default btn-sm">Search</button>
			</form>	
			</ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>One Word, Multiple Definitions</h1>
        <p>Tired of finding the best (easy to understand) definition over the Internet? WeDefine lets you find and write the best definition. Hop in and join our community now! Share your knowledge with the world.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
    </div>
	<?php
		$number = mt_rand(1, 13);
	  	$statement = $db->query("SELECT word FROM word WHERE id=4");
		$row = $statement->fetch(PDO::FETCH_ASSOC);
	?>
	<div class="category">
		<h4 class="inlineh3"><strong>Category:</strong></h4>
	  <button type="button" class="btn btn-info btn-sm">All</button>
	  <span><strong>/</strong></span>
	  <button type="button" class="btn btn-info btn-sm">Computer Science</button>
	  <span><strong>/</strong></span>
	  <button type="button" class="btn btn-info btn-sm"><?php echo $row['word']; ?></button>
	</div>
	<div class="table-responsive">
	<table class="table table-hover">
		<thead>
        <tr>
          <th class="rank">Rank</th>
          <th class="definition">Definition</th>
          <th>Username</th>
          <th>Votes</th>
        </tr>
      </thead>
	  <tbody>
	  
	  <?php
		
	  	$statement = $db->query('SELECT id, votes, username, content FROM definition WHERE w_id = 4 ORDER BY votes DESC');
		
		for($j = 0; $j < 5; $j++)
		{	  
			$row = $statement->fetch(PDO::FETCH_ASSOC);
		
	  ?>
        <tr>
          <th scope="row"><span class="label label-primary"><?php echo $j + 1; ?></span></th>
          <td class="appadd"><a class="definition" href="view_definition.php?id=<?php echo $row['id']; ?>&rank=<?php echo $j + 1; ?>"><?php echo $row['content'];?></a>
		  </td>
          <td><?php echo $row['username']; ?></td>
          <td><?php echo $row['votes'];?></td>
        </tr>
	<?php
		}
		
		$statement = $db->query("SELECT id FROM word WHERE word='Applet'");
		$row = $statement->fetch(PDO::FETCH_ASSOC);
	?>	
      </tbody>
	</table>
	</div>
	<div class="viewMoreWrapper">
	<a href="view_word.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-lg btn-block" role="button">View More Definitions</a>
	</div>
	<br />
	<br />
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
