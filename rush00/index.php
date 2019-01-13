<?php
$host = "localhost";
$user = "amagnan";
$pw = "password";
$db = "rush00";

$conn = mysqli_connect($host, $user, $pw, $db);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="index.css">
	<title></title>
</head>
<body>
	<div id="top_bar">
		
	</div>
	<div id="middle">
		<div id="left_bar">
			
		</div>
		<div id="right_bar">
			
		</div>
		<center>
			<div class="article">
				<?php
					$result = mysqli_query($conn, "SELECT * FROM `items` WHERE item_id=1");
					foreach ($result as $key => $value)
					{
						echo "<p id='article_name'>".$value['name']."</p><br>";
						echo "<p id='article_price'>".$value['price']."</p><br>";
						echo "<p id='article_info'>".$value['ingredients']."</p><br>";
						echo "<img src='".$value['url']."' id='article_photo'>";
					}
				?>
			</div><br>
			<div class="article">
				<?php
					$result = mysqli_query($conn, "SELECT * FROM `items` WHERE item_id=16");
					foreach ($result as $key => $value)
					{
						echo "<p id='article_name'>".$value['name']."</p><br>";
						echo "<p id='article_price'>".$value['price']."</p><br>";
						echo "<p id='article_info'>".$value['ingredients']."</p><br>";
						echo "<img src='".$value['url']."' id='article_photo'>";
					}
				?>
			</div><br>
			<div class="article">
				<?php
					$result = mysqli_query($conn, "SELECT * FROM `items` WHERE item_id=11");
					foreach ($result as $key => $value)
					{
						echo "<p id='article_name'>".$value['name']."</p><br>";
						echo "<p id='article_price'>".$value['price']."</p><br>";
						echo "<p id='article_info'>".$value['ingredients']."</p><br>";
						echo "<img src='".$value['url']."' id='article_photo'>";
					}
				?>
			</div><br>
			<div class="article">
				<?php
					$result = mysqli_query($conn, "SELECT * FROM `items` WHERE item_id=6");
					foreach ($result as $key => $value)
					{
						echo "<p id='article_name'>".$value['name']."</p><br>";
						echo "<p id='article_price'>".$value['price']."</p><br>";
						echo "<p id='article_info'>".$value['ingredients']."</p><br>";
						echo "<img src='".$value['url']."' id='article_photo'>";
					}
				?>
			</div><br>
		</center>
	</div>
</body>
</html>