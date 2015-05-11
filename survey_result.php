<?php 
	session_start();
	
	$visa_count = null;
	$master_count = null;
	$amd_count = null;
	$nvidia_count = null;
	$football_count = null;
	$basketball_count = null;
	$iphone_count = null;
	$galaxy_count = null;
	
	if (isset($_POST['credit']) && !empty($_POST['credit'])) {
		$_SESSION['credit']  = $_POST['credit'];
		
		$file = $_POST['credit'];
		$fdata = file_get_contents ( $file ); // read file data

		// parse $fdata if needed and extract number
		$fdata = intval($fdata) + 1;
	

		file_put_contents($file, $fdata); // write it back to file
		
		if ($file == 'visa.txt')
			$visa_count = $fdata;
		else
			$master_count = $fdata;
	}
	
	if (isset($_POST['semiconductor']) && !empty($_POST['semiconductor'])) {
		$file = $_POST['semiconductor'];
		$fdata = file_get_contents ( $file ); // read file data

		// parse $fdata if needed and extract number
		$fdata = intval($fdata) + 1;
	

		file_put_contents($file, $fdata); // write it back to file
		
			
	}
	
	if (isset($_POST['smartphone']) && !empty($_POST['smartphone'])) {
		$file = $_POST['smartphone'];
		$fdata = file_get_contents ( $file ); // read file data

		// parse $fdata if needed and extract number
		$fdata = intval($fdata) + 1;
	

		file_put_contents($file, $fdata); // write it back to file
	
	}
	
	if (isset($_POST['sport']) && !empty($_POST['sport'])) {
		$file = $_POST['sport'];
		$fdata = file_get_contents ( $file ); // read file data

		// parse $fdata if needed and extract number
		$fdata = intval($fdata) + 1;
	

		file_put_contents($file, $fdata); // write it back to file
				
	}
?>

<!DOCTYPE html>
<head>
	<title>Survey Result</title>
		<link rel="stylesheet" type="text/css" href="survey_style.css">
<link href='http://fonts.googleapis.com/css?family=Carrois+Gothic|Roboto:400,700,900,300' rel='stylesheet' type='text/css'>
</head>
<body>
		<h1 id="title2">
		SURVEY
	</h1>
	<h1 id="sub2">
		RESULTS
	</h1>
	<table>
		<tr>
			<td><div class="visa"></div></td>
			<td>
			<p class="boldNum">
			<?php  
				$file = "visa.txt";
				$fdata = file_get_contents ( $file ); // read file data

				echo $fdata;			
			?>
			</p>
			</td>
		</tr>
		<tr>
			<td><div class="mastercard"></div></td>
			<td><p class="boldNum">
			<?php 
 				$file = "mastercard.txt";
				$fdata = file_get_contents ( $file ); // read file data

				echo $fdata;	
			?></p></td>
		</tr>
				<tr>
			<td><div class="nvidia"></td>
			<td><p class="boldNum">
			<?php 
 				$file = "nvidia.txt";
				$fdata = file_get_contents ( $file ); // read file data

				echo $fdata;	
			?>
			</p></td>
		</tr>
		<tr>
			<td><div class="amd"></td>
			<td><p class="boldNum">
			<?php 
 				$file = "amd.txt";
				$fdata = file_get_contents ( $file ); // read file data

				echo $fdata;	
			?>
			</p></td>
		</tr>
		<tr>
			<td><div class="galaxy"></td>
			<td><p class="boldNum">
			<?php 
 				$file = "galaxy.txt";
				$fdata = file_get_contents ( $file ); // read file data

				echo $fdata;	
			?>
			</p></td>
		</tr>
		<tr>
			<td><div class="iphone"></td>
			<td><p class="boldNum">
			<?php 
 				$file = "iphone.txt";
				$fdata = file_get_contents ( $file ); // read file data

				echo $fdata;	
			?>			
			</p></td>
		</tr>
		<tr>
			<td><div class="football"></td>
			<td><p class="boldNum">
			<?php 
 				$file = "football.txt";
				$fdata = file_get_contents ( $file ); // read file data

				echo $fdata;	
			?>			
			</p></td>
		</tr>
		<tr>
			<td><div class="basketball"></td>
			<td><p class="boldNum">
						<?php 
 				$file = "basketball.txt";
				$fdata = file_get_contents ( $file ); // read file data

				echo $fdata;	
			?>
			</p></td>
		</tr>
	</table>
</body>
</html>