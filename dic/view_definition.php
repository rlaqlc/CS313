<?php
session_start();
include('openshift.php');
	
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
			<li class="dropdown active">
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
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	  <?php
	  	$statement = $db->query("SELECT w_id FROM definition WHERE id=". $_GET['id']);
		$row = $statement->fetch(PDO::FETCH_ASSOC);
		$wordID = $row['w_id'];
		
		$statement = $db->query("SELECT word FROM word WHERE id=" . $wordID);
		$row = $statement->fetch(PDO::FETCH_ASSOC);
	  ?>		
	<div class="wrapper">
	<div class="category2">
	<div id="notification">
	<?php
	if (isset($_POST['notify']))
	{
		if (isset($_SESSION['last_name'])){
			echo "<div class=\"alert alert-success\" role=\"alert\">You have successfully voted for this definition!</div>";
		}
		else 
		{
			echo "<div class=\"alert alert-danger\" role=\"alert\">You are not allowed to vote!</div>";
		}
	}
	?>
	</div>
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
	<form action="" method="POST">
		<div class="voteWrapper">
			<button type="submit" class="btn btn-success btn-sm">
			  <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Favorite
			</button>
			<button type="submit" name="vote" onclick="notify()" class="btn btn-warning btn-sm">
			  <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> Vote
			</button>
			<input type="hidden" name="notify" value="dummy" />
		</div>
	</form>
	<?php 
		if (isset($_POST['vote']))
		{
				if (isset($_SESSION['last_name'])){
			$statement = $db->query("UPDATE definition SET votes = votes + 1 WHERE id = " . $_GET['id']);
				}
		}
		
		if (isset($_POST['comment']))
		{
				if (isset($_SESSION['last_name'])){
					$db->query("INSERT INTO comment (comment, date, d_id, u_id) VALUES ('" . $_POST['comments'] . "', '" . date("Y-m-d") . "', " .  "'" . $id . "', " . "'" . $_SESSION['id'] . "')");
				}
		}
	?>
	<hr />
	<!-- comment text area -->
	<form action="" method="POST">
		<div class="commentWrapper">
			<textarea name="comments" placeholder="Share your thoughts" class="form-control" rows="2"></textarea>
		</div>
		<div class="commentButtonWrapper">
			<button type="submit" name="comment" onclick="notify()" class="btn btn-primary btn-lg btn-block">Submit Comment</button>
			<input type="hidden" name="notifyComment" value="dummy" />
		</div>
	</form>
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
	  <?php
			$statement1 = $db->query("SELECT comment.comment, comment.date, person.user_name
									 FROM comment
                                     INNER JOIN person
                                     ON comment.u_id=person.id
									 WHERE comment.d_id=" . $id);
			
			
			$index = 1;
			while ($myRow = $statement1->fetch(PDO::FETCH_ASSOC)){
				
		?>
		<tr>
			<td><?php echo $index++ ?></td>
			<td><?php echo $myRow['comment']; ?></td>
			<td><?php echo $myRow['date']; ?></td>
			<td><?php echo $myRow['user_name']; ?></td>
		</tr>
		<?php
		}
		?>
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
