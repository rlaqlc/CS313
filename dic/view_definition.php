<?php
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
	
	$id = $_GET['id'];
	$rank = $_GET['rank'];
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
            <li><a href="#contact">Submit</a></li>
			<li><a href="#contact">About</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<div class="emptyspace"></div>
	  <?php
	  	$statement = $db->query("SELECT w_id FROM definition WHERE id=". $_GET['id']);
		$row = $statement->fetch(PDO::FETCH_ASSOC);
		$wordID = $row['w_id'];
		
		$statement = $db->query("SELECT word FROM word WHERE id=" . $wordID);
		$row = $statement->fetch(PDO::FETCH_ASSOC);
	  ?>		
	<div class="category">
	<div class="row">
	  <div class="col-md-10">
	  <h4 class="inlineh3"><strong>Category:</strong></h4>
	  <button type="button" class="btn btn-info btn-sm">All</button>
	  <span><strong>/</strong></span>
	  <button type="button" class="btn btn-info btn-sm">Computer Science</button>
	  <span><strong>/</strong></span>
	  <button type="button" class="btn btn-info btn-sm"><?php echo $row['word']; ?></button>
	  <span><strong>/</strong></span>
	  <button type="button" class="btn btn-info btn-sm"><?php echo "#" . $rank; ?></button>
	  </div>
	</div>
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
	  	$statement = $db->query("SELECT votes, username, content FROM definition WHERE id = $id");
		$row = $statement->fetch(PDO::FETCH_ASSOC);
	  ?>
        <tr>
          <th scope="row"><span class="label label-primary"><?php echo $rank; ?></span></th>
          <td><?php echo $row['content'];?>
		  </td>
          <td><?php echo $row['username']; ?></td>
          <td><?php echo $row['votes'];?></td>
        </tr>
		
      </tbody> 
	</table>
	</div>
	<div class="voteWrapper">
		<button type="button" class="btn btn-success btn-sm">
		  <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Favorite
		</button>
		<button type="button" class="btn btn-warning btn-sm">
		  <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> Vote
		</button>
	</div>
	<hr />
	<!-- comment text area -->
	<div class="commentWrapper">
		<textarea placeholder="Share your thoughts" class="form-control" rows="2"></textarea>
	</div>
	<div class="commentButtonWrapper">
		<a href="view_word.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-lg btn-block" role="button">Submit Comment</a>
	</div>
	<div class="panel panel-default">
	  <!-- Default panel contents -->
	  <div class="panel-body"><strong>User Comments</strong></div>
	  <!-- Table -->
	  <div class="table-responsive">
	  <table class="table">
		<thead>
        <tr>
          <th class="rank">#</th>
          <th class="definition">Comments</th>
          <th>Date</th>
          <th>Username</th>
        </tr>
      </thead>
	  <tbody>
		<tr>
			<td>1</td>
			<td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ac ex sodales justo gravida imperdiet eget sit amet nulla. Morbi a justo nec nunc finibus placerat sit amet eu nunc. Ut convallis scelerisque massa, id ultricies est maximus nec. Fusce turpis lectus, volutpat nec vestibulum non, ullamcorper volutpat massa. Sed tincidunt lorem arcu, a condimentum orci condimentum pulvinar. Nunc laoreet dictum lacus at fringilla. Cras vehicula pretium urna eget sodales.</td>
			<td>5/25/2015</td>
			<td>semperfi.jay</td>
			
		</tr>
		<tr>
			<td>2</td>
			<td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ac ex sodales justo gravida imperdiet eget sit amet nulla. Morbi a justo nec nunc finibus placerat sit amet eu nunc. Ut convallis scelerisque massa, id ultricies est maximus nec. Fusce turpis lectus, volutpat nec vestibulum non, ullamcorper volutpat massa. Sed tincidunt lorem arcu, a condimentum orci condimentum pulvinar. Nunc laoreet dictum lacus at fringilla. Cras vehicula pretium urna eget sodales.</td>
			<td>5/26/2015</td>
			<td>rlaqlc</td>
			
		</tr>
	  </tbody>
	  </table>
	</div>
	</div>
	<br />
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
