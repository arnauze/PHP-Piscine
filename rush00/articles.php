<?php
session_start();
$host = "localhost";
$user = "root";
$pw = "root";
$db = "rush00";
$conn = mysqli_connect($host, $user, $pw, $db);
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="articles.css">
	<title></title>
</head>
<body>
	<?php
	if (!$_SESSION['articles'])
		$_SESSION['articles'] = array();
	if ($_SESSION['filter'] != '')
		$result = mysqli_query($conn, "SELECT * FROM `items` WHERE type='".$_SESSION['filter']."'");
	else
		$result = mysqli_query($conn, "SELECT * FROM `items` WHERE type='Sandwich'");
	$array = array();
	foreach ($result as $key => $value)
	{
		array_push($array, $value);
	}
	$_SESSION['art1'] = $array[0]['item_id'];
	$_SESSION['art2'] = $array[1]['item_id'];
	$_SESSION['art3'] = $array[2]['item_id'];
	$_SESSION['art4'] = $array[3]['item_id'];
	?>
<div class="article">
				<?php
					echo "<p id='article_name'>".$array[0]['name']."</p><br>";
					echo "<p id='article_price'>Price: ".$array[0]['price']."$</p><br>";
					echo "<p id='article_info'>Ingrédients: ".$array[0]['ingredients']."</p><br>";
					echo "<img src='".$array[0]['url']."' id='article_photo'>";
				?>
				<form method="POST" name="add" action="add.php">
					<input id="add" type="submit" name="submit1" value="Add to basket" style="font-size: 1vw;">
				</form>
			</div><br>
			<div class="article">
				<?php
					echo "<p id='article_name'>".$array[1]['name']."</p><br>";
					echo "<p id='article_price'>Price: ".$array[1]['price']."$</p><br>";
					echo "<p id='article_info'>Ingrédients: ".$array[1]['ingredients']."</p><br>";
					echo "<img src='".$array[1]['url']."' id='article_photo'>";
				?>
				<form method="POST" name="add" action="add.php">
					<input id="add" type="submit" name="submit2" value="Add to basket" style="font-size: 1vw;">
				</form>
			</div><br>
			<div class="article">
				<?php
						echo "<p id='article_name'>".$array[2]['name']."</p><br>";
						echo "<p id='article_price'>Price: ".$array[2]['price']."$</p><br>";
						echo "<p id='article_info'>Ingrédients: ".$array[2]['ingredients']."</p><br>";
						echo "<img src='".$array[2]['url']."' id='article_photo'>";
				?>
				<form method="POST" name="add" action="add.php">
					<input id="add" type="submit" name="submit3" value="Add to basket" style="font-size: 1vw;">
				</form>
			</div><br>
			<div class="article">
				<?php
						echo "<p id='article_name'>".$array[3]['name']."</p><br>";
						echo "<p id='article_price'>Price: ".$array[3]['price']."$</p><br>";
						echo "<p id='article_info'>Ingrédients: ".$array[3]['ingredients']."</p><br>";
						echo "<img src='".$array[3]['url']."' id='article_photo'>";
				?>
				<form method="POST" name="add" action="add.php">
					<input id="add" type="submit" name="submit4" value="Add to basket" style="font-size: 1vw;">
				</form>
			</div><br>
</body>
</html>