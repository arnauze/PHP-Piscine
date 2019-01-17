<?php
$host = "localhost";
$user = "root";
$pw = "root";
$db = "rush00";

$conn = mysqli_connect($host, $user, $pw, $db);
session_start();
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="basket.css">
</head>
<body style="background-color: SlateGray;">
	<center>
		<p id="title" style="font-size: 15vw;">Basket:</p>
		<p id="basket" style="font-size: 7vw;">
			<?php
			foreach ($_SESSION['articles'] as $key => $value)
			{
				foreach($value as $k => $v)
					echo "$k:  $v$"."<br>";
			}
			echo "<br>Total: ".$_SESSION['price']."$<br>";
			?>
		</p>
		<form method="POST" name="clear" action="handle.php">
			<input type="submit" name="clear" value="Clear basket"><br>
			<input type="submit" name="refresh" value="Refresh basket"><br>
			<input type="submit" name="order" value="Order">
		</form>
	</center>
</body>
</html>