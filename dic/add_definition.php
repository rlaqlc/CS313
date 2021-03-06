<?php
session_start();
include('openshift.php');
	
	$id = $_POST['id'];
	$content = $_POST['definition'];
	
	$statement1 = $db->query("SELECT id FROM definition ORDER BY id DESC LIMIT 1");
	$count1 = $statement1->fetch(PDO::FETCH_ASSOC);
	
	$statement2 = $db->query("SELECT count(*) AS total from definition WHERE w_id=" . $id);
	$count2 = $statement2->fetch(PDO::FETCH_ASSOC);
	$total = $count1['id'];
	$total2 = $count2['total'];
	$total++;
	$total2++;
	header("refresh:3;url=view_definition.php?id=" . $total . "&rank=" . $total2);
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
			<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Browse <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">All</a></li>
				  <li class="divider"></li>
                  <li><a href="browse.php">Computer Science</a></li>
				  <li><a href="#">Test Category</a></li>
                </ul>
            </li>
            <li class="active"><a href="submit.php">Submit</a></li>
			<li><a href="#contact">About</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<div class="wrapper">
	<div class="category2">
	<?php
	  	$statement = $db->query("INSERT into definition (w_id, content, username, date) VALUES ('".$id."'," . "'".$content  . "', 'Annonymous'," . "'5/26/2015')");
		
		if ($statement) {
	?>
		<div class="alert alert-success" role="alert">Your definition has been submitted! Your will be redirected to your definition page in 3 seconds.</div>
	<?php
		}
	?>		
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
