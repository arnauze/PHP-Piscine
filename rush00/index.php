<?php
$host = "localhost";
$user = "root";
$pw = "root";
$db = "rush00";

$conn = mysqli_connect($host, $user, $pw, $db);
session_start();
$_SESSION['filter'] = $_POST['submit'];
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="index.css">
	<title></title>
</head>
<body>
	<div id="top_bar">
		<center><p id="title">ACHETE_TA_BOUFFE.COM</p></center>
	</div>
	<div id="middle">
		<div id="left_bar">
			<form method="POST" name="refresh" action="index.php">
				<ul>
					<li style="list-style-type: none; margin-top: 0;"><input type="submit" name="submit" value="Sandwich" style="width: 8vw;"></li>
					<li style="list-style-type: none; margin-top: 5vw;"><input type="submit" name="submit" value="Salade" style="width: 8vw;"></li>
					<li style="list-style-type: none; margin-top: 5vw;"><input type="submit" name="submit" value="Dessert" style="width: 8vw;"></li>
					<li style="list-style-type: none; margin-top: 5vw;"><input type="submit" name="submit" value="Boisson" style="width: 8vw;"></li>
				</ul>
			</form>
		</div>
		<div id="right_bar">
			<center>
				<div class="iframe-container">
					<?php
					if ($_SESSION['loggued_in_user'] == '')
						echo "<iframe src='login.php'></iframe>";
					else
						echo "<iframe src='loggued_in.php'></iframe>";
					?>
				</div>
				<div class="iframe-container" style="height: 50vw;">
					<iframe src="basket.php"></iframe>
				</div>
			</center>
		</div>
		<center>
			<iframe src="articles.php" id="middle-middle" name="articles"></iframe>
		</center>
	</div>
</body>
</html>