<?php 
	session_start();
	
// if session is set, redirect to dashboard
if(isset($_SESSION['credit'])) {
   header("location: survey_result.php");
}

?>
<!DOCTYPE html>
<head>
	<title>Choose Your Favorites</title>
	<link rel="stylesheet" type="text/css" href="survey_style.css">
<link href='http://fonts.googleapis.com/css?family=Carrois+Gothic|Roboto:400,700,900,300' rel='stylesheet' type='text/css'>
</head>
<body>
	<h1 id="title">
		SURVEY
	</h1>
	<h1 id="sub">
		WHAT IS YOUR FAVORITE?
	</h1>
	<div class="wrapper">
		<p class="titleForChoose">1. FAVORITE CREDIT CARD</p>
		<p class="choose">PLEASE VOTE FOR ONE OF THE FOLLOWING:</p>
			<form action="survey_result.php" method="POST">
		
			<div class="cc-selector">
				<input id="visa" type="radio" name="credit" value="visa.txt" />
				<label class="drinkcard-cc visa" for="visa"></label>
				<input id="mastercard" type="radio" name="credit" value="mastercard.txt" />
				<label class="drinkcard-cc mastercard"for="mastercard"></label>
			</div>

	<p class="titleForChoose2">2. FAVORITE SEMICONDUCTOR MANUFACTURING COMPANY</p>
	<p class="choose">PLEASE VOTE FOR ONE OF THE FOLLOWING:</p>

			<div class="cc-selector">
				<input id="nvidia" type="radio" name="semiconductor" value="nvidia.txt" />
				<label class="semiconductor-cpu nvidia" for="nvidia"></label>
				<input id="amd" type="radio" name="semiconductor" value="amd.txt" />
				<label class="semiconductor-cpu amd" for="amd"></label>
			</div>
				<p class="titleForChoose3">3. FAVORITE SMARTPHONE</p>
	<p class="choose">PLEASE VOTE FOR ONE OF THE FOLLOWING:</p>

			<div class="cc-selector">
				<input id="galaxy" type="radio" name="smartphone" value="galaxy.txt" />
				<label class="smartphone-sp galaxy" for="galaxy"></label>
				<input id="iphone" type="radio" name="smartphone" value="iphone.txt" />
				<label class="smartphone-sp iphone" for="iphone"></label>
			</div>
				<p class="titleForChoose4">4. FAVORITE SPORT</p>
	<p class="choose">PLEASE VOTE FOR ONE OF THE FOLLOWING:</p>
			<div class="cc-selector">
				<input id="football" type="radio" name="sport" value="football.txt" />
				<label class="sport-st football" for="football"></label>
				<input id="basketball" type="radio" name="sport" value="basketball.txt" />
				<label class="sport-st basketball" for="basketball"></label>
			</div>
			<input type="submit" value="Submit" class="myButton"><a href="survey_result.php" class="myButton">Results</a>
		</form>
	</div>
</body>
</html>