<?php
	try
	{
		$dbname = "php";
		$user = "adminB7ehKnn";
		$password = "4cTNSxnzxlfe";
		$dsn = 'mysql:dbname='.$dbname.';host='127.7.105.130';port='3306';
		$sdb = new PDO($dsn, $user, $password);
	}
	catch (PDOException $ex)
	{
		echo "Error: ". $ex->getMessage();
		die();
	}
	$id = $_GET['id'];
	
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
            <li class="active"><a href="#">Browse</a></li>
            <li><a href="#contact">Submit</a></li>
			<li><a href="#contact">About</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<div class="emptyspace"></div>
	  <?php
	  	$statement = $db->query("SELECT word FROM word WHERE id=". $_GET['id']);
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
	  	$statement = $db->query("SELECT votes, username, content FROM definition WHERE w_id = $id");
		$j = 1;
		while ($row = $statement->fetch(PDO::FETCH_ASSOC))
		{  
	  ?>
        <tr>
          <th scope="row"><span class="label label-primary"><?php echo $j++; ?></span></th>
          <td class="appadd"><?php echo $row['content'];?>
		  </td>
          <td><?php echo $row['username']; ?></td>
          <td><?php echo $row['votes'];?></td>
        </tr>
	<?php
		}
	?>
      </tbody>
	</table>
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
